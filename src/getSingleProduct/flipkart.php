<?php
ini_set("max_execution_time","0"); 
require_once('nokogiri.php');
require_once('phpQuery/phpQuery.php');


function curl_redirect_exec($ch, $redirects = 0, $curlopt_returntransfer = true, $curlopt_maxredirs = 10, $curlopt_header = false) {
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
	$out['err'] = '';
	$out['title'] = '';
	$out['keywords'] = '';
	$out['spec'] = '';
	$out['desc'] = '';
	$out["price"] = '';
	
	
	
	// check url
	if(strpos($data['url'] , "flipkart")){


	
	
		// try to get this url
		$output = _curl($data['url']);
		
		
		//echo $output;exit;
		
		/********************/
		/*  GET NAME        */
		/********************/
		if($data["title"] == "on"){
			$out['title'] = get_title($output);
		}
		
		
		/***********************/
		/*  GET SPECIFICATION  */
		/***********************/
		if($data["spec"] == "on"){
			$out["spec"] = get_spec($output);
		}
		
		/********************/
		/*  GET PRICE        */
		/********************/
		if($data["price"] == "on"){
			$out["price"] = get_price($output);
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
		
		
		
		
		
		/*******************/
		/*  GET MAIN IMAGE */
		/*********************/
		
		$out['images'] = array();
		$main_image = false;
		$main_image = get_main_image($output);
	
		if($main_image){
			$out['images'][] = $main_image;
		}
		
		
		
		
		
		
		/*********************/
		/*  GET OTHER IMAGES */
		/*********************/
		if($data["images"] == "on"){
			$out['images'] = array_merge($out['images']  , get_other_images($output));
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
							//$img_res = _curl($image);
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
		
		
	}
	$out['spec'] = utf8_encode($out['spec']);
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($out);exit;

	
}else{
	echo 'foad';exit;
}
	


	
function get_title($html){
			
		$instruction = 'h1[itemprop=name]';
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

function get_price($html){
		// FOR THE Rajineesh Rohan HUILO
		/*$instruction = 'span.old-price';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    //echo '<pre>'.print_r($data , 1).'</pre>';exit;
		if (isset($data[0]['#text']) && !is_array($data[0]['#text'])) {
	    	return trim( str_ireplace(array("Rs" , ".") , array("" , "") , trim($data[0]['#text']) ) ); 
        }*/
	
	
		$instruction = 'meta[itemprop=price]';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    //echo '<pre>'.print_r($data , 1).'</pre>';exit;	
	    unset($parser);
	    if (isset($data[0]['content']) && !is_array($data[0]['content'])) {
	    	return trim($data[0]['content']);
        }

        return '';
}


function get_spec($html){
		
		$res = '';
		
		$pq = phpQuery::newDocumentHTML($html);
		
		
		$temp  = $pq->find('div#description');
		foreach ($temp as $block){
			$res .= $temp->html().'<br />';
		}
		
		$temp  = $pq->find('div#keyFeatures');
		foreach ($temp as $block){
			$res .= $temp->html().'<br />';
		}
		
		$temp  = $pq->find('div#specifications');
		foreach ($temp as $block){
			$res .= $temp->html().'<br />';
		}
	
		return $res;
}

function get_keywords($html) {
	 $res =  explode('<meta name="Keywords" content="' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[1]);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[0]);	
       		}
       		 
       }
       return get_desc($html);
    }

function get_desc($html) {
       $res =  explode('<meta name="Description" content="' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[1]);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[0]);	
       		}
       		 
       }
       return '';
    }
    
function get_main_image($html){
		$instruction = 'div.image-wrapper img';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    //echo '<pre>'.print_r($res , 1).'</pre>';exit;	
	    unset($parser);
		if (isset($res[0]['src'])) {
	    	$main_image = trim($res[0]['src']);
	    	return $main_image;
        }
		 if (isset($res[0]['data-zoom-src']) && !empty($res[0]['data-zoom-src'])) {
	    	$main_image = trim($res[0]['data-zoom-src']);
	    	return $main_image;
        }
        
        $instruction = 'div#mprodimg-id img';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    //echo '<pre>'.print_r($res , 1).'</pre>';exit;	
	    unset($parser);
		if (isset($res[0]['data-src'])) {
	    	$main_image = trim($res[0]['data-src']);
	    	return $main_image;
        }
	    
        return false;	
}



function get_other_images($output){
			$out = array();
			$instruction = 'div#multi-images img';
		    $parser = new nokogiri($output);
		    $res = $parser->get($instruction)->toArray();
		    //echo '<pre>'.print_r($res , 1).'</pre>';	
		    unset($parser);
			if (isset($res[0]['src'])) {
		    	foreach($res as $oth_imgs){
		    		if(isset($oth_imgs['src']) && strpos($oth_imgs['src'] , 'ajax-loader') < 1){
		    			$out[] = try_get_bigger($oth_imgs['src']);
		    		}
		    	}
	        }
			if (isset($res[0]['data-carousel-src'])) {
		    	foreach($res as $oth_imgs){
		    		if(isset($oth_imgs['data-carousel-src']) && strpos($oth_imgs['data-carousel-src'] , 'ajax-loader') < 1){
		    			$out[] = try_get_bigger($oth_imgs['data-carousel-src']);
		    		}
		    	}
	        }
	        //echo '<pre>'.print_r($out , 1).'</pre>';exit;
	        if(count($out) > 0){
	        	return $out;
	        	exit;
	        }
	        return $out;
}

    
 function try_get_bigger($src){
 	return str_replace(array("100x100") , array("400x400") , $src);
 }

?>
