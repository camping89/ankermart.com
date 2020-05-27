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
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent[array_rand($user_agent)]);
		curl_setopt($ch, CURLOPT_ENCODING , "");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
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
	$out['name'] = '';
	$out['keys'] = '';
	$out['desc'] = '';
	$out["spec"] = '';
	
	
	
	// check url
	if(strpos($data['url'] , "overstock")){


	
	
		// try to get this url
		$url = $data['url']; 
		$ch = curl_init ($url); 
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec ($ch);
		
		
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
		
		/********************/
		/*  GET PRICE        */
		/********************/
		if($data["price"] == "on"){
			$out['price'] = get_price($output);
		}
		
		
		
	
		//echo  file_get_contents('http://ak1.ostkcdn.com/images/products/78/372/L13982627.jpg');exit;
		
		
		
		
		/*********************/
		/*  GET IMAGES */
		/*********************/
		$out['images'] = array();
		if($data["images"] == "on"){
			$out['images'] = get_images_arr($output);
		}
		foreach($out['images'] as $key => $val ){
			$out['images'][$key] = str_replace("'" , "" , $val);
		}
		
	
		/*******************/
		/*  UPLOAD IMAGES */
		/*********************/
		$out['images'] = array_unique($out['images']); 
		//echo '<pre>'.print_r($out , 1).'</pre>';exit;
		
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
							file_put_contents("../image/data/".$_POST['tempdir']."/".$img_name.".".$img_ext , $img_res);
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
	echo json_encode($out);exit;

}else{
	echo 'foad';exit;
}

	

	
function get_title($html){
			
		$instruction = 'div[itemprop=name] h1';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    unset($parser);
	    if (isset($data[0]['#text'])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
        }
        
        
        
        return '';
}


function get_spec($html){
		
		$res = '';
		
		//echo '<pre>'.print_r( $temp->text() , 1).'</pre>';exit;
			
		// 
		$pq = phpQuery::newDocumentHTML($html);
		
		$temp  = $pq->find('ul#details_descFull');
		foreach ($temp as $block){
					$res .= $temp->html().'<br />';
		}
		
		
		$temp  = $pq->find('div#specContainer div.col6span3');
		foreach ($temp as $block){
			$block = str_ireplace(array("<caption>" , "</caption>") , array("<h2>", "</h2>") , $temp->html());
			$res .= $block.'<br />';
		}
		
		

		return $res;
}

function get_keywords($html) {
       $res =  explode('Content="' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[2]);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[0]);	
       		}
       		 
       }
       $res = explode('" name="keyword">' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[0]);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[count($res) - 1]);	
       		}
       		 
       }
       return '';
    }

function get_desc($html) {
       $res =  explode('Content="' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[1]);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[0]);	
       		}
       		 
       }
	 $res = explode('" name="description">' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[0]);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[count($res) - 1]);	
       		}
       		 
       }
       return '';
}

function get_price($html) {
	$res = explode("productPrice: '$" , $html);
       if(count($res) > 1){
       		$res = explode("'" , $res[1]);
       		if(count($res) > 1){
       			return (float) trim($res[0]);	
       		}
       		 
       }
       return '';
}
 


function get_images_arr($output){
	$out = array();
	
			// try to find out image from 
			// http://www.overstock.com/Home-Garden/Ethan-Home-Canterbury-White-Twin-size-Bed/6748692/product.html
			$res = explode("fullImagesJson=eval(" , $output);
			if(count($res) > 1){
				$res = explode(");" , $res[1]);
				if(count($res) > 1){
					$res = json_decode($res[0]);
					if($res && is_object($res)){
						if(isset($res->images) && is_array($res->images)){
							foreach($res->images as $img){
								$im = $img->childImages;
								if(is_array($im)){
									$im = $im[0];
									$im = $im->imagePath;
									$im = str_replace(array("_80" , "_320" , "_600" , "_1000"), array("" , "", "" , "") , $im);
									$out[] = "http://ak1.ostkcdn.com/images/products/".$im;
								}
								
							}
							
						}
						
					}
				}
			}
		
		if(count($out) > 0){
			return $out;
		}	
		
		
		 // default variation
        // http://www.overstock.com/Electronics/CyberpowerPC-Gamer-Xtreme-GUA250-w-AMD-FX-4100-3.6GHz-Gaming-Computer/6325729/product.html?recSet=a2ac3608-fbae-4de0-a4b0-a8a3a7ab3e9e#
		$res = explode("var imageHolder = " , $output);
		if(count($res) > 1){
			$res = explode(";" , $res[1]);
			if(count($res) > 1){
				$res = str_replace(array("[" , "]") , array("" , "") , $res[0]);
				$res = explode("," , $res);
				if(count($res > 0)){
					foreach($res as $img){
						if(strlen($img) > 5 && strpos($img , "imagenot") < 2){
							$out[] = $img;
						}
					}
				}
		
		
			}
		}
		
		usort($out, "sort_images");
		if(count($out) > 0){
			return $out;
		}
		
		return $out;
}


function sort_images($a, $b) {
	
	$sort_array = array("L" => 1 , "M" => 2 , "P" => 3);
	
	
	$a = explode("/" , $a);
	$a = $a[count($a) - 1];
	$a = 3;
	if (array_key_exists(substr($a , 0 , 1) , $sort_array)) {
		$a = (int) $sort_array[$a];
	}
	
	$b = explode("/" , $b);
	$b = $b[count($b) - 1];
	$b = 3;
	if (array_key_exists(substr($b , 0 , 1) , $sort_array)) {
		$b = (int) $sort_array[$b];
	}
	
	
	
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}
    
?>