<?php
ini_set("max_execution_time","0"); 
require_once('nokogiri.php');
require_once('phpQuery/phpQuery.php');

function curl_redirect_exec($ch, $redirects = 0, $curlopt_returntransfer = true, $curlopt_maxredirs = 20, $curlopt_header = false) {
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $exceeded_max_redirects = $curlopt_maxredirs > $redirects;
    $exist_more_redirects = false;
    if ($http_code == 301 || $http_code == 302) {
        if ($exceeded_max_redirects) {
            list($header) = explode("\r\n\r\n", $data, 2);
            $matches = array();
            preg_match('/(Location:|URI:)(.*?)\n/', $header, $matches);
            $url = trim(array_pop($matches));
            $url_parsed = parse_url($url);
            if (isset($url_parsed)) {
                curl_setopt($ch, CURLOPT_URL, $url);
                $redirects++;
                return curl_redirect_exec($ch, $redirects, $curlopt_returntransfer, $curlopt_maxredirs, $curlopt_header);
            }
        }
        else {
            $exist_more_redirects = true;
        }
    }
    if ($data !== false) {
        if (!$curlopt_header)
            list(,$data) = explode("\r\n\r\n", $data, 2);
        if ($exist_more_redirects) return false;
        if ($curlopt_returntransfer) {
            return $data;
        }
        else {
            echo $data;
            if (curl_errno($ch) === 0) return true;
            else return false;
        }
    }
    else {
        return false;
    }
}


function _curl($url , $post = false) {
        $user_agent = array();
        $user_agent[] = 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_7; en-US) AppleWebKit/534.16 (KHTML, like Gecko) Chrome/10.0.648.205 Safari/534.16';
        $user_agent[] = 'Mozilla/5.0 (X11; U; Linux i686 (x86_64); en-US; rv:1.8.1.6) Gecko/2007072300 Iceweasel/2.0.0.6 (Debian-2.0.0.6-0etch1+lenny1)';
        $user_agent[] = 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0)';
        $user_agent[] = 'Mozilla/5.0 (X11; U; Linux i686; cs-CZ; rv:1.7.12) Gecko/20050929';
        $user_agent[] = 'Opera/9.80 (Windows NT 5.1; U; ru) Presto/2.9.168 Version/11.51';
        $user_agent[] = 'Mozilla/5.0 (Windows; I; Windows NT 5.1; ru; rv:1.9.2.13) Gecko/20100101 Firefox/4.0';
        $user_agent[] = 'Opera/9.80 (Windows NT 6.1; U; ru) Presto/2.8.131 Version/11.10';
        $user_agent[] = 'Opera/9.80 (Macintosh; Intel Mac OS X 10.6.7; U; ru) Presto/2.8.131 Version/11.10';
        $user_agent[] = 'Mozilla/5.0 (Macintosh; I; Intel Mac OS X 10_6_7; ru-ru) AppleWebKit/534.31+ (KHTML, like Gecko) Version/5.0.5 Safari/533.21.1';

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent[array_rand($user_agent)]);
 		if ($post) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        curl_setopt($ch, CURLOPT_ENCODING, "");
		$html = curl_redirect_exec($ch);
		curl_close($ch);
		if(!$html || empty($html) || strlen($html) < 2 ){
			if(function_exists('file_get_contents')){
				$html = file_get_contents($url);
			}
		}
		return $html;
}

	
	// check for ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
	&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' && isset($_POST['data'])
	&& isset($_POST['token']) && isset($_POST['data']['url'])
	) {


	$data = array();
	foreach($_POST['data'] as $key => $value){
		$data[$key] = $value;
	}
	
	
	$out = array();
	
	
	
	// check url
	if(strpos($data['url'] , "bestbuy")){


	
	
		// try to get this url
		$output = _curl($data['url']);
		//$output = utf8_encode($output);
		
		
		//echo $output;exit;
		
		/********************/
		/*  GET NAME        */
		/********************/
		if($data["title"] == "on"){
			$out['title'] = get_title($output);
		}
		
		
		/********************/
		/*  GET SPECIFICATION        */
		/********************/
		$spec_html = '';
		if($data["spec"] == "on" || $data["upc"] == "on"){
			$spec_html = get_spec_html($output);
		}
		
		
		if($data["spec"] == "on"){
			$out["spec"] = get_spec($output , $spec_html , $data['url']);
		}
		
		
		/********************/
		/*  GET META TAGS   */
		/********************/
		if($data["keywords"] == "on"){
			$out['keywords'] = get_keywords($output);
		}
		
		if($data["desc"] == "on"){
			$out['desc'] = get_desc($output);
		}
		
		if($data["price"] == "on"){
			$out['price'] = get_price($output);
		}
		
		if($data["sku"] == "on"){
			$out['sku'] = get_sku($output);
		}
		
		if($data["upc"] == "on"){
			$out['upc'] = get_upc($spec_html);
		}
		
		if($data["model"] == "on"){
			$out['model'] = get_model($output);
		}
		

		
		
		
		
		/*******************/
		/*  GET MAIN IMAGE */
		/*********************/
		
		
		// GET IMGS_ARRAY
		$imgs_array = get_imgs_array($output , $data['url']);
		
		$out['images'] = array();
		$main_image = false;
		$main_image = get_main_image($imgs_array);
	
		if($main_image){
			$out['images'][] = $main_image;
		}
		
		
		
		
		
		
		/*********************/
		/*  GET OTHER IMAGES */
		/*********************/
		if($data["images"] == "on"){
			$out['images'] = array_merge($out['images']  , get_other_images($imgs_array));
		}
		
		
	
		
	
		/*******************/
		/*  UPLOAD IMAGES */
		/*********************/
		$out['images'] = array_unique($out['images']); 
		//echo '<pre>'.print_r($out['images'] , 1).'</pre>';exit;
		
		// upload images
		$out['other_images'] = array();
		if($data["images"] == "on"){
			$cnt_others = 1;
			if(count($out['images']) > 0){
				foreach($out['images'] as $key => $image){
					if(!empty($image)){
						$img_res = false;
						// try to download
						try{
							$img_res = _curl($image);
						} catch (Exception $e) {}
						// if first image -> main image
						$img_name = $cnt_others;
						if($key < 1){
							$img_name = 'main';
						}
						// try to upload
						if($img_res){
							$img_ext = explode("." , $image);
							$img_ext = $img_ext[count($img_ext) - 1];
							if(!in_array($img_ext , array("jpg" , "jpeg" , "JPEG" , "JPG" , "svg" , "gif" , "PNG" , "png" , "BMP" , "bmp"))){
								$img_ext = 'jpg';
							}
							@file_put_contents("../image/data/".$_POST['tempdir']."/".$img_name.".".$img_ext , $img_res);
							if($key < 1){
								$out['main_image'] = $img_ext;
							}else{
								$out['other_images'][] = $img_ext;
								$cnt_others++;
							}
						}
					}
				}
				$out['other_images_cnt'] = $cnt_others;
			}
		}
		unset($out['images']);
		
		// ADD SKU
		$out['sku'] =  get_sku($output);
		
		
		
	}
	//$out['spec'] = utf8_encode($out['spec']);
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($out);exit;

}else{
	echo 'foad';exit;
}


	
function get_title($html){
			
		$instruction = 'div#sku-title h1';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    //echo '<pre>'.print_r($data , 1).'</pre>';exit;
	    unset($parser);
	    if (isset($data[0]['#text']) && !is_array($data[0]['#text'])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
        }
 		if (isset($data[0]['#text'][0]) && !is_array($data[0]['#text'][0])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text'][0]));
        }
        
		$instruction = 'h1[itemprop=name] span';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    //echo '<pre>'.print_r($data , 1).'</pre>';exit;
	    unset($parser);
	    if (isset($data[0]['#text']) && !is_array($data[0]['#text'])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
        }
 		if (isset($data[0]['#text'][0]) && !is_array($data[0]['#text'][0])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text'][0]));
        }
        
        
		$instruction = 'h1.product-title span';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    //echo '<pre>'.print_r($data , 1).'</pre>';exit;
	    unset($parser);
	    if (isset($data[0]['#text']) && !is_array($data[0]['#text'])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
        }
 		if (isset($data[0]['#text'][0]) && !is_array($data[0]['#text'][0])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text'][0]));
        }
        
        return '';
}


function get_spec($html , $spec_html , $url){
		$out = '';
		
		$pq = phpQuery::newDocumentHTML($html);
		$temp  = $pq->find('div#long-description');
		foreach ($temp as $block){
			$out .= $temp->html();
		}
		
		$temp  = $pq->find('div#features');
		foreach ($temp as $block){
			$out .= "<h2>Product Features</h2>".$temp->html();
		}
		

		$temp  = $pq->find('div.description');
		foreach ($temp as $block){
			$out .= "<h2>Details</h2>".$temp->html();
		}
		
		//Specification by AJAX
		$res = _curl($url , array("__ASYNCPOST" => true , "__EVENTARGUMENT" => "[Tab=Tab_specs]" ));
		if($res){
			$pq = phpQuery::newDocumentHTML($res);
			$temp  = $pq->find('div#divTab_specs');
			foreach ($temp as $block){
				$out .= "<b>Specification</b> <br /><br />" . $temp->html();
			}
		}
		//echo $out;exit;
		
		$out .= $spec_html;
		
		//echo $res;exit;
		return $out;
}


function get_spec_html($html){
		// GET FULL SPECIFICATION
		$tres = explode('data-fragment-id="specifications-tab" data-fragment-href="'  , $html);
		if(count($tres) > 1){
			$tres = $tres[1];
			$tres = explode('"' , $tres , 2);
			if(count($tres) > 1){
				$tres = $tres[0];
				if(strpos($tres , 'p://www.bestbuy.com') > 1){
					return _curl($tres); 
				}
			}
		}
		return '';
}

function get_keywords($html) {       
       $res =  explode('<meta name="keywords" content="' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[1]);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[0]);	
       		}
       		 
       }
       return '';
}

function get_desc($html) {
       $res =  explode('<meta name="description" content="' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[1]);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[0]);	
       		}
       		 
       }
       return '';
    }
    
function get_sku($html){
		$instruction = 'span#sku-value';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    //echo '<pre>'.print_r($res , 1).'</pre>';exit;
	    unset($parser);
	    if (isset($res[0]['#text'])) {
	    	return trim($res[0]['#text']);
        }
		return ''; 
}


function get_upc($spec_html){
	$res = explode('UPC</th>', $spec_html);
	if(count($res) > 1){
		$res = explode('</td>' , $res[1] , 2);
		if(count($res) > 1){
			return str_ireplace(array('<td>') , array("") , $res[0]);
		}
	}
	return '';
}


function get_model($html){
		$instruction = 'span#model-value';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    //echo '<pre>'.print_r($res , 1).'</pre>';exit;
	    unset($parser);
	    if (isset($res[0]['#text'])) {
	    	return trim($res[0]['#text']);
        }
		return ''; 
}


function get_price($html){
		$instruction = 'div.item-price';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    //echo '<pre>'.print_r($res , 1).'</pre>';exit;
	    unset($parser);
	    if (isset($res[0]['#text'][0])) {
	    	return (float) trim($res[0]['#text'][0]);
	    }
	    
	    $instruction = 'span.amount';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    //echo '<pre>'.print_r($res , 1).'</pre>';exit;
 		if (isset($res[0]['#text']) && !is_array($res[0]['#text']) ) {
	    	return (float) trim( str_ireplace(array("$" , ",") , array("" , ".") , $res[0]['#text']) );
	    }
	    return ''; 
}


/*
<div class="image-gallery" id="image-gallery" data-images='[{
"path": "BestBuy_US/images/products/1167/1167489_sa.jpg", "altText": "Larger Front", "width": "", "height": ""},
{"path": "BestBuy_US/images/products/1167/1167489cv1a.jpg", "altText": "Alternate View 1", "width": "", "height": ""},
{"path": "BestBuy_US/images/products/1167/1167489cv3a.jpg", "altText": "Alternate View 3", "width": "", "height": ""},
{"path": "BestBuy_US/images/products/1167/1167489cv4a.jpg", "altText": "Alternate View 4", "width": "", "height": ""},
{"path": "BestBuy_US/images/products/1167/1167489cv5a.jpg", "altText": "Alternate View 5", "width": "", "height": ""},
{"path": "BestBuy_US/images/products/1167/1167489cv6a.jpg", "altText": "Alternate View 6", "width": "", "height": ""}]'>
 */



function get_imgs_array($html , $url){
	$domain = get_domain($url);
	
	$out = array();
	$res = explode('id="image-gallery" data-images=' , $html);
	if(count($res) > 1){
		$res = explode('"path": "' , $res[1]);
		if(count($res) > 1){
			unset($res[0]);
			foreach($res as $k => $value){
				$tres = explode('",' , $value , 2);
				$out[] = 'http://pisces.bbystatic.com/image2/'.$tres[0].';canvasHeight=500;canvasWidth=500';
			}
		}
	}
	
	if(count($out) < 1){
		$res = explode('initPdpImgGallery([{description' , $html);
		if(count($res) > 1){
			$res = explode("path: '" , $res[1]);
			if(count($res) > 1){
				foreach($res as $k => $v){
					$r = explode("', popup" , $v);
					if(count($r) > 1){
						$out[] = $r[0];
					}
				}
			}
		}
	}
	
	// get first image
	$instruction = 'div.image-gallery-main-slide a img';
	$parser = new nokogiri($html);
	$res = $parser->get($instruction)->toArray();
	//echo '<pre>'.print_r($res , 1).'</pre>';exit;
 	if (isset($res[0]['src'])) {
	    	$out[] = $res[0]['src'];
	}elseif (isset($res[0]['data-retina-src'])) {
	    	$out[] = $res[0]['data-retina-src'];
	}
	
	// get other images
	$res = explode('path&quot;:&quot;' , $html);
	if(is_array($res) && count($res) > 1){
		unset($res[0]);
		foreach($res as $pos_img){
			$res_t = explode('&quot;' , $pos_img , 2);
			if(count($res_t) > 1){
				$out[] = 'http://pisces.bbystatic.com/image2/'.$res_t[0].';canvasHeight=500;canvasWidth=500';
			}
		}
	}
	
	
	// ANOTHER
	// main
	$instruction = 'img.product-image';
	$parser = new nokogiri($html);
	$res = $parser->get($instruction)->toArray();
	//echo '<pre>'.print_r($res , 1).'</pre>';exit;
	if(isset($res[0]['src'])){
		$out[] = $domain . $res[0]['src'];
	}
	
	// others (ajax gallery)
	$instruction = 'div.alt-images a';
	$parser = new nokogiri($html);
	$res = $parser->get($instruction)->toArray();
	//echo '<pre>'.print_r($res , 1).'</pre>';exit;
	if(isset($res[0]['href']) && !is_array($res[0]['href'])){
		$res = explode("popUp('" , $res[0]['href']);
		if(count($res) > 1){
			$res = explode("'," , $res[1] , 2);
			if(count($res) > 1 && strlen($res[0]) > 5){
				if($domain){ 
					//echo $domain . $res[0];
					$res = _curl($domain . $res[0]);
					// parse result
					if($res){
						$instruction = 'div.large-image img';
						$parser = new nokogiri($res);
						$data = $parser->get($instruction)->toArray();
						//echo '<pre>'.print_r($data , 1).'</pre>';exit;
						if(isset($data[0]['src'])){
							$out[] = $domain . $data[0]['src'];
						}
						
						$instruction = 'div.tumb-images a img';
						$parser = new nokogiri($res);
						$data = $parser->get($instruction)->toArray();
						//echo '<pre>'.print_r($data , 1).'</pre>';exit;
						if(isset($data) && is_array($data) && count($data) > 0){
							foreach($data as $pos_image){
								if(isset($pos_image['src'])){
									$out[] = $domain . str_ireplace(array("55x55") , array("500x500") ,  $pos_image['src'] );
								}
							}
							
						}
						
					}
				}
			}
		}
	} 
	
	//print_r(array_unique($out)) ;exit;
	
	return $out;	
}


function get_domain($url){
	$res = parse_url($url);
	if(isset($res['host'])){
		return $res['host'];
	}
	return false;
}
    
function get_main_image($imgs_arr){
	if(is_array($imgs_arr) && count($imgs_arr) > 0){
		return $imgs_arr[0];
	}
	return '';	
}



function get_other_images($imgs_arr){
	if(is_array($imgs_arr) && count($imgs_arr) > 1){
		unset($imgs_arr[0]);
		return $imgs_arr;
	}
	return array();
}



function prepare_img($img){
	return str_ireplace(array('?$uslarge$') , array("") , $img);
}

    

?>
