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

function _curl($url, $tmall = false) {
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
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		if($tmall){
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		}
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		if($tmall){
			$html = curl_exec($ch);
		}else{
			$html = curl_redirect_exec($ch);
		}
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
	if(strpos($data['url'] , "tmall.com") || strpos($data['url'] , "taobao.com")){


	
	
		// try to get this url 
		if(strpos($data['url'] , "tmall.com")){
			$output = _curl($data['url'] , true);
		}else{
			$output = _curl($data['url']);	
		}
		
		//echo $output;exit;
		
		//$output = utf8_encode($output);
		//echo  '<pre>'.print_r(curl_getinfo($ch) , 1).'</pre>';exit;
		//$output = iconv('GBK', 'UTF-8 ', $output);
		//header('Content-type: application/json; charset=GBK');
		//echo $output;exit;
		
		/********************/
		/*  GET NAME        */
		/********************/
		if($data["title"] == "on"){
			$out['title'] = get_title($output);
		}
		//header('Content-type: text/html; charset=gbk');
		//echo $out['name'];exit;
		
		
		/********************/
		/*  GET SPECIFICATION        */
		/********************/
		if($data["spec"] == "on"){
			$out["spec"] = get_spec($output);
			// !!!!!!!!!!!! GET IMAGES FROM spec, upload them to server and change paths in spec
			$out["spec"] = processSpecImages($out["spec"]);
		}
		
		
		/********************/
		/*  GET META TAGS   */
		/********************/
		if($data["keywords"] == "on"){
			$out['keywords'] = get_keywords($output);
		}
		//echo $out['keys'];exit;
		
		if($data["desc"] == "on"){
			$out['desc'] = get_desc($output);
		}
		
		
		
		
		
		/*******************/
		/*  GET MAIN IMAGE */
		/*********************/
		
		$out['images'] = array();
		$main_image = false;
		
		
		$output_images = get_images_arr($output);
		$main_image = get_main_image($output_images);
	
		if($main_image){
			$out['images'][] = $main_image;
		}
		
		
		
		
		
		
		/*********************/
		/*  GET OTHER IMAGES */
		/*********************/
		if($data["images"] == "on"){
			$out['images'] = array_merge($out['images']  , get_other_images($output_images));
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
	//$out['name'] = utf8_encode($out['name']);
	//echo $out['keys'];exit;
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($out);exit;

}else{
	echo 'foad';exit;
}



	
function get_title($html){
	
		// TITLE  SCRAPING
		$res =  explode('<title>' , $html , 2);
       	if(count($res) > 1){
       		$res = explode('</title>' , $res[1] , 2);
       		if(count($res) > 1){
       			$res = enc($res[0]);
       			$res_n = explode('-tmall.com' , $res , 2);
       			if(count($res_n) > 1){
       				return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res_n[0]);
       			}else{
       				return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res);
       			}	
       		}
       		 
       	}
       	return '';
		
		
        return '';
}


function get_spec($html){
		$out = '';
		
		// DIV#J_AttrList  SCRAPING
		$res =  explode('<ul id="J_AttrUL">' , $html , 2);
       	if(count($res) > 1){
       		$res = explode('</ul>' , $res[1] , 2);
       		if(count($res) > 1){
       			$res = enc($res[0]);
       			$out .= '<ul>'.str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res).'</ul>';
       		}
       		 
       	}
       	
       	
		$res =  explode('<ul class="attributes-list">' , $html , 2);
       	if(count($res) > 1){
       		$res = explode('</ul>' , $res[1] , 2);
       		if(count($res) > 1){
       			$res = enc($res[0]);
       			$out .= str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res);
       		}
       		 
       	}
		
       	
       	
		// Item Description
		$pq = phpQuery::newDocumentHTML($html);
		$temp  = $pq->find('div#tab_description');
		foreach ($temp as $block){
			$out .= enc($temp->html());
		}
		
		
		// Item Description
		$pq = phpQuery::newDocumentHTML($html);
		$temp  = $pq->find('div#description');
		foreach ($temp as $block){
			$out .= enc($temp->html());
		}
	
		
		
		$additional_result = explode("window, document,['" , $html , 2);
    	if(count($additional_result) > 1){
    		$additional_result = explode("']);" , $additional_result[1] , 2);
    	}else{
    		$additional_result = explode("s=document.createElement('script');s.async = true;s.src=" , $html , 2);
    		if(count($additional_result) > 1){
    			$additional_result = explode('";' , $additional_result[1] , 2);
    			if(count($additional_result) > 1){
    				$additional_result = str_ireplace(array('"') , array("") , $additional_result[0]);
    			}else{
    				$additional_result = false;
    			}
    		}else{
    			$additional_result = false;
    		}
    	}
    	
    	
    	if($additional_result){
    		$additional_result = _curl($additional_result);
    		
    		$additional_result = str_ireplace(array("var desc='") , array("") ,$additional_result);
    		$additional_result = substr( $additional_result , 0 , -2);
    		//echo 'add:'.$additional_result;exit;
    		$out .= enc($additional_result);
    	}
    	//echo 'add:'.$additional_result;exit;
		
		
		// get #J_DivItemDesc div content 
    	$pq = phpQuery::newDocumentHTML($html);
    	$temp  = $pq->find('div#J_DivItemDesc');
		foreach ($temp as $block){
				$out .= enc(pq($block)->html()).'<br />';
		}
		
		//echo $out;exit;
		
        return $out;
}


function get_keywords($html) {
	   $res =  explode('<meta name="keywords" content="' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[1] , 2);
       		if(count($res) > 1){
       			$res = enc($res[0]);
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res);	
       		}
       		 
       }
       return '';
}

function get_desc($html) {
       $res =  explode('<meta name="description" content="' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[1]);
       		if(count($res) > 1){
       			$res = enc($res[0]);
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res);	
       		}
       		 
       }
       return '';
    }
    
function get_sku($html){
        return '';
}
    
function get_main_image($res){
		if(isset($res[0])){
			return $res[0];
		}
        return '';
		
}



function get_other_images($res){
		$out = array();	
		if(count($res) > 1){
			unset($res[0]);
			return $res;
		}

        return $out;
}


function get_images_arr($html){
		//echo $html;exit;
		$out = array();
		
		
		$instruction = 'ul#J_UlThumb li a img';
		$parser = new nokogiri($html);
		$data = $parser->get($instruction)->toArray();
		//echo '<pre>'.print_r($data , 1).'</pre>';exit;
		if(is_array($data) && count($data) > 0){
		   	foreach($data as $im){
		    		if(isset($im['src'])){
		        		$out[] = taobao_prepare_img($im['src']);
		      		}elseif(isset($im['data-src'])){
		        		$out[] = taobao_prepare_img($im['data-src']);
		       		}
		       	}
		}
       	
		//echo '<pre>'.print_r($out , 1).'</pre>';
	    if(count($out) < 1){
		    $res =  explode('class="tb-gallery"' , $html , 2);
	       	if(count($res) > 1){
	       		$res = explode('</div>' , $res[1] , 2);
	       		if(count($res) > 1){
	       			$res = explode('background-image:url(' , $res[0]);
	       			unset($res[0]);
	       			if(count($res) > 0){
	       				foreach($res as $bl){
	       					$r = explode(')"' , $bl , 2);
	       					if(count($r) > 1){
	       						if(strpos($r[0] , 'ttp://') > 0){
	       							$out[] = taobao_prepare_img($r[0]);
	       						}
	       					}
	       				}
	       			}
	       		}
	       		 
	       	}	
	    }
	       	
	       	
	    //echo '<pre>'.print_r($out , 1).'</pre>';exit;  	
       	return $out;
}


function prepare_img($img){
	$img = str_ireplace(array("_60x60.jpg" , "_360x360.jpg" , " ") , array("" , "" , "%20") , $img);
	$img = str_ireplace(array("_60x60q") , array("_460x460q") , $img);
	//return rawurlencode($img);
	return $img;
}


function taobao_prepare_img($img){
		$img = str_ireplace(array("_60x60.jpg" , "_360x360.jpg" , "_40x40.jpg",  " ") , array("" , "" , "" , "%20") , $img);
		$img = str_ireplace(array("_60x60q") , array("_460x460q") , $img);
		//return rawurlencode($img);
		return $img;
}

function enc($text){
	//return $text;
	return iconv('GBK', 'UTF-8', $text);
}




//// SEPECIAL FUNC
function processSpecImages($spec){
		
		// get images array
		preg_match_all('/(<img[^<]+>)/Usi', $spec, $images);
		$image = array();
        foreach ($images[0] as $index => $value) {
            $s = strpos($value, 'src="') + 5;
            $e = strpos($value, '"', $s + 1);
            $image[substr($value, $s, $e - $s)] =   substr($value, $s, $e - $s);
        }
        
        
        //echo '<pre>'.print_r($image , 1).'</pre>';exit;
        // [media/banner/2013-01-25_17_46_34sku20708-k.jpg] => /media/banner/2013-01-25_17_46_34sku20708-k.jpg
        $cnt_others = 0; 
        foreach ($image as $index => $value) {
        	
        	
        	
        	// get image
        	$img_res = false;
			try{
				$img_res = _curl($value);
			} catch (Exception $e) {}
			
			
        	 
			if($img_res){
				// try to upload images
	        	$img_ext = explode("." , $value);
				$img_ext = $img_ext[count($img_ext) - 1];
				$img_name = 'descriptionImage'.$cnt_others;
				
				$image_new_path = "../image/data/".$_POST['tempdir']."/".$img_name.".".$img_ext;
				
				@file_put_contents($image_new_path , $img_res);
				$cnt_others++;
				
				// replace path in spec
				 $spec = str_replace($index, $image_new_path, $spec);
			}else{
				// just add "pandawill.com" to image path
				$spec = str_replace($index, $value , $spec);
			}
        	
        }
        
         $spec = preg_replace(array("'<table[^>]*?>.*?</table>'si"), Array(""), $spec);
        return $spec;
       
}


    

?>
