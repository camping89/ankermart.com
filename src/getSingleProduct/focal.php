<?php
 
require_once('nokogiri.php');
require_once('phpQuery/phpQuery.php');
require_once('curlnofollow.php');



function _curl($url, $post = '') {
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
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_ENCODING , "deflate");
		$html = curl_redirect_exec($ch);
		curl_close($ch);
		return $html;
}


	/*
	POST
		data[url]:http://cgi.ebay.com/LALALA
		data[images]:on/off
		data[title]:on/off
		data[desc]:on/off
		data[spec]:on/off
		data[keys]:on/off
	*/
/*
 *   PARSE LOGIC
 */


	$data = array();
	foreach($_POST['data'] as $key => $value){
		$data[$key] = $value;
	}
	
	
	$out = array();
	$out['err'] = '';
	$out['name'] = '';
	$out['keys'] = '';
	$out['desc'] = '';
	$out["spec"] = '';
	
	// awtermark setting
	$no_watermark = false;
	if($data["no_watermark"] == "on"){
		$no_watermark = true;
	}
	
	
	
	// check url
	if(strpos($data['url'] , "focalprice")){


	
		// try to get this url
		/*$url = $data['url']; 
		$ch = curl_init ($url); 
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec ($ch);*/
		$output = _curl($data['url']);
		//$output = utf8_encode($output);
		
		
		//echo $output;exit;
		
		/********************/
		/*  GET NAME        */
		/********************/
		if($data["title"] == "on"){
			$out['name'] = get_name($output);
		}
		
		
		/********************/
		/*  GET SPECIFICATION        */
		/********************/
		if($data["spec"] == "on"){
			$out["spec"] = get_spec($output);
		}
		
		
		/********************/
		/*  GET META TAGS   */
		/********************/
		if($data["keys"] == "on"){
			$out['keys'] = get_keyword($output);
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
		
		
		
		
		
		/*******************/
		/*  GET MAIN IMAGE */
		/*********************/
		
		$out['images'] = array();
		$main_image = false;
		$main_image = get_main_image($output , $no_watermark);
	
		if($main_image){
			$out['images'][] = $main_image;
		}
		
		
		
		
		
		
		/*********************/
		/*  GET OTHER IMAGES */
		/*********************/
		if($data["images"] == "on"){
			$out['images'] = array_merge($out['images']  , get_other_images($output , $no_watermark));
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
							$img_res = file_get_contents($image);
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
	//$out['spec'] = utf8_encode($out['spec']);
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($out);exit;




	
function get_name($html){
			
		$instruction = 'h1#productName';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    unset($parser);
	    if (isset($data[0]['#text']) && !is_array($data[0]['#text'])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
        }
 		if (isset($data[0]['#text'][0]) && !is_array($data[0]['#text'][0])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text'][0]));
        }
        
        return '';
}


function get_spec($html){
		$res = '';
		
		$pq = phpQuery::newDocumentHTML($html);
		$temp  = $pq->find('div.description_m:first');
		foreach ($temp as $block){
			$res .= $temp->html();
		}
		return $res;
}

function get_keyword($html) {       
       return get_desc($html);
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
    
 function get_price($html){
 	$price = '';
 	
 	$instruction = 'span#nowprice';
	$parser = new nokogiri($html);
	$res = $parser->get($instruction)->toArray();
	if(isset($res[0]['#text'][0]) && !is_array($res[0]['#text'][0]) ){
		//$price .= str_ireplace(array("") , array("") , $res[0]['#text'][0]);
		$price .= $res[0]['#text'][0];
	}
 	if(isset($res[0]['sup'][0]['#text']) && !is_array($res[0]['sup'][0]['#text']) ){
		$price .= $res[0]['sup'][0]['#text'];
	}
	return (float) $price;
	//echo '<pre>'.print_r($res , 1).'</pre>';exit;
 }
    
function get_sku($html){
		$instruction = 'em#sku';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    unset($parser);
	    if (isset($res[0]['#text'])) {
	    	return trim($res[0]['#text']);
        }
		return ''; 
}
    
function get_main_image($html , $no_watermark = false){
	
		$instruction = 'ul#imgs li img';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    unset($parser);
	    if (isset($res[0]['jqimg2'])) {
	    	$main_image = trim($res[0]['jqimg2']);
	    	return get_image($main_image , $no_watermark);
        }
		
}



function get_other_images($html , $no_watermark = false){
		$out = array();
		
		$instruction = 'ul#imgs li img';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    unset($parser);
	    if (is_array($res) && count($res) > 1) {
	    	unset($res[0]);
	    	foreach($res as $k => $v){
	    		if(isset($res[$k]["jqimg2"])){
	    			$out[] = get_image($res[$k]["jqimg2"] , $no_watermark);
	    		}
	    	}
        }
	    return $out;
}

function get_image($src , $no_watermark){
	if($no_watermark){
		return str_ireplace(array("860x666") , array("550x426") , $src); 
	}else{
		return $src;
	}
}


    

?>
