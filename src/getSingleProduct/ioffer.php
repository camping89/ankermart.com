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
	
	
	// check url
	if(strpos($data['url'] , "ioffer")){


	
	
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
		if($data["spec"] == "on"){
			$out["spec"] = get_spec($output);
			// !!!!!!!!!!!! GET IMAGES FROM spec, upload them to server and change paths in spec
			//$out["spec"] = processSpecImages($out["spec"]);
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
			//$out['images'] = array();
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
		
	}
	//$out['spec'] = utf8_encode($out['spec']);
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($out);exit;

}else{
	echo 'foad';exit;
}



	
function get_title($html){
		$instruction = 'h1.item-title';
        $parser = new nokogiri($html);
        $data = $parser->get($instruction)->toArray();
        //echo '<pre>'.print_r($data , 1).'</pre>';exit;
        unset($parser);
		if (isset($data[0]['#text']) && !is_array($data[0]['#text'])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
        }
	    if (isset($data['#text']) && !is_array($data['#text'])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data['#text']));
        }
 		
        return '';
}

function merge_desc($val, $key, $res){
    	if($key === "#text"){
    		$res .= $val."<br />";
    	}
    }


function get_spec($html){
		$res = '';
	    
	    
		$pq = phpQuery::newDocumentHTML($html);
		$temp  = $pq->find('div#item-description');
		foreach ($temp as $block){
				$res .= pq($block)->html();
				break;
		}
		
		
	    return strip_tags ($res , '<div><p><table><br>') ;
}

function get_keywords($html) {
	   $res =  explode('<meta content="' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[2] , 2);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[0]);	
       		}
       		 
       }
       return '';
}

function get_desc($html) {
       $res =  explode('<meta content="' , $html);
       if(count($res) > 2){
       		$res = explode('"' , $res[3] , 2);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[0]);	
       		}
       		 
       }
       return '';
}
    
function get_main_image($html){
	
		$instruction = 'div.main-image img';
        $parser = new nokogiri($html);
        $data = $parser->get($instruction)->toArray();
        //echo '<pre>'.print_r($data , 1).'</pre>';exit;
        unset($parser);

        if ($data) {
            $data = reset($data);
            return prepare_image($data['src']);
        }
        
        
        return '';
		
}



function get_other_images($html){
		$result = array();
        
        $instruction = 'div.other-images ul li';
        $parser = new nokogiri($html);
        $data = $parser->get($instruction)->toArray();
        //echo '<pre>'.print_r($data , 1).'</pre>';exit;
   		if(count($data) > 1 && isset($data[0]) ){
   			reset($data);
   			unset($data[0]);
   			foreach($data as $img){
   				if(isset($img['data-src'])){
   					$result[] = prepare_image($img['data-src']);
   				}	
   			}
        }

        return $result;
}



function prepare_image($src){
    	return str_replace(array("cdn104") , array("cdn102")  , $src);
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
        
         /*$spec = preg_replace(array("'<table[^>]*?>.*?</table>'si"), Array(""), $spec);*/
        return $spec;
       
}


    

?>

