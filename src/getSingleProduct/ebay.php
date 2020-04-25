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
	
	
	
	// check url
	if(strpos($data['url'] , "ebay")){
	
	
		// try to get this url
		$url = $data['url']; 
		$output = _curl($url);
		//echo $output;exit;
		
		/********************/
		/*  GET NAME        */
		/********************/
		if($data["title"] == "on"){
			$out['title'] = get_title($output);
		}
		
		
		/********************/
		/*  GET PRICE      */
		/********************/
		if($data["price"] == "on"){
			$out['price'] = get_price($output);
		}
		
		
		
		/********************/
		/*  GET MODEL      */
		/********************/
		if($data["model"] == "on"){
			$out['model'] = get_model($output);
		}
		
		
		
		/********************/
		/*  GET SPECIFICATION        */
		/********************/
		if($data["spec"] == "on"){
			$out["spec"] = get_spec($output);
			$out["spec"] = processSpecImages($out["spec"]);
		}
		
		//echo $out["spec"] ;exit;
		
		
		/********************/
		/*  GET META TAGS   */
		/********************/
		if($data["keywords"] == "on"){
			$out['keywords'] = get_keyword($output);
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
		
		
		// DELETE STATIC IMAGES
		foreach($out['images'] as $key => $img){
			if( strpos($img , "ebaystatic.com") > 0){
				unset($out['images'][$key]);
			}
			if( strpos($img , "url+") > 0){
				unset($out['images'][$key]);
			}
			if( strpos($img , "banners") > 0){
				unset($out['images'][$key]);
			}
		    if( strpos($img , "flash_required.gif") > 0){
				unset($out['images'][$key]);
			}
			if( strpos($img , "rc =") > 0){
				unset($out['images'][$key]);
			}
			if( strpos($img , "tagline.gif") > 0){
				unset($out['images'][$key]);
			}
			if( strpos($img , "elcellonline.com/templateimages/") > 0){
				unset($out['images'][$key]);
			}
			if( $img == "id=" ){
				unset($out['images'][$key]);
			}
		}
		
		$temps_imgs = array();
		foreach($out['images'] as $img){
			$temps_imgs[] = $img;
		}
		$out['images'] = $temps_imgs;
	
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
						if(strpos($image , "ttps") > 0){
							try{
								$img_res = getSslImg($image);
							} catch (Exception $e) {}
						}else{
							try{
								$img_res = _curl($image);
							} catch (Exception $e) {}
						}
						// if first image -> main image
						$img_name = $cnt_others;
						if($key < 1){
							$img_name = 'main';
						}
						// try to upload
						if($img_res){
							$img_ext = explode("." , $image);
							$img_ext = $img_ext[count($img_ext) - 1];
							// remove ?set_id=89040003C1
							$img_ext_res = explode('?' , $img_ext);
							if(count($img_ext_res) > 1){
								$img_ext = $img_ext[0];
							}
							//echo $img_ext;exit;
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
	header('Content-type: application/json; charset=utf-8');
	//echo '<pre>'.print_r($out , 1).'</pre>';exit;
	echo json_encode($out);
	
}else{
	echo 'foad';exit;
}


function get_title($html){
	
	
		$instruction = 'span#vi-lkhdr-itmTitl';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    ///echo '<pre>'.print_r($data , 1).'</pre>';exit;
	    unset($parser);
	    if (isset($data[0]['#text'])) {
	    	if(is_array($data[0]['#text'])){
	    		$text = '';
	    		foreach($data[0]['#text'] as $block){
	    			if(!is_array($block)){
	    				$text .= $block;
	    			}
	    		}
	    		return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) , $text));
	    	}else{
	    		return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
	    	}
        }
			
		$instruction = 'h1#itemTitle';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    unset($parser);
		if (isset($data[0]['#text'][0]) && !is_array($data[0]['#text'][0]) ) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text'][0]));
        }
	    if (isset($data[0]['#text']) && !is_array($data[0]['#text']) ) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
        }
        
		$instruction = 'h1.vi-is1-titleH1';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    unset($parser);
	    if (isset($data[0]['#text']) && !is_array($data[0]['#text']) ) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
        }
        
		$instruction = 'h1.vi-it-itHd';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    unset($parser);
	    if (isset($data[0]['#text']) && !is_array($data[0]['#text']) ) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
        }
        
        
		$instruction = 'h3.tpc-titr';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    unset($parser);
	    if (isset($data[0]['#text']) && !is_array($data[0]['#text']) ) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
        }
        
        
        
        return '';
}


function get_spec($html){		
		$res = '';

		$pq = phpQuery::newDocumentHTML($html);
		$temp  = $pq->find('div.itemAttr');
		foreach ($temp as $block){
			if(strpos($temp->text() , "Item specifics") > 0  || strpos($temp->text() , "Artikelmerkmale") > 0 ){
					$res .= $temp->html().'<br />';
			}
		}
		
		$temp  = $pq->find('div.prodDetailDesc');
		foreach ($temp as $block){
			if(strpos($temp->text() , "Detailed item info") > 0 ){
					$res .= $temp->html().'<br />';
			}
		}
		
		$temp  = $pq->find('div.vi-ia-attrTitle');
		foreach ($temp as $block){
				$res .= $temp->html().'<br />';
		}

		$temp  = $pq->find('div.vi-iw');
		foreach ($temp as $block){
				$res .= $temp->html().'<br />';
		}
		
		$temp_p  = $pq->find('div#ProductDesc');
		if (is_object($temp_p)){
				$res .= $temp_p->html().'<br />';
		}
		
		$temp_p  = $pq->find('div#itemdetails');
		if (is_object($temp_p)){
				$res .= $temp_p->html().'<br />';
		}
		
		// example: http://www.ebay.co.uk/itm/GENUINE-SAMSUNG-I9300-GALAXY-S3-REPLACEMENT-LCD-AMOLED-HD-DISPLAY-FRAME-WHITE-/161015082000?pt=UK_Replacement_Parts_Tools&hash=item257d3f2c10        
		$temp_p  = $pq->find('div#desc_div');
		if (is_object($temp_p)){
				//echo '<pre>'.print_r($temp_p , 1).'</pre>';exit;
				$res .= $temp_p->html().'<br />';
		}
		
		$res = preg_replace(array("'<script[^>]*?>.*?</script>'si"), Array(""), $res);
		$res = preg_replace(array("'<iframe[^>]*?>.*?</iframe>'si"), Array(""), $res);
		
		
		

		return $res;
}

function get_keyword($html) {
		$res =  explode('<meta  name="keywords" content="' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[1]);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[0]);	
       		}
       		 
       }
	
       $res =  explode('<meta name="keywords" content="' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[1]);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[0]);	
       		}
       		 
       }
       
	   $res =  explode('" name="keywords" ' , $html);
       if(count($res) > 1){
       		$res = explode('<meta  content="' , $res[0]);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[count($res) - 1]);	
       		}
       		 
       }
       
       return '';
    }

function get_desc($html) {
	$res =  explode('<meta  name="description" content="' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[1]);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[0]);	
       		}
       		 
       }
       
       $res =  explode('<meta name="description" content="' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[1]);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[0]);	
       		}
       		 
       }
       
	   $res =  explode('" name="description" ' , $html);
       if(count($res) > 1){
       		$res = explode('<meta  content="' , $res[0]);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[count($res) - 1]);	
       		}
       		 
       }
       
       return '';
    }
    
    
function get_price($html){
		$instruction = 'span[itemprop=price]';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    //echo '<pre>'.print_r($data , 1).'</pre>';exit;
	    unset($parser);
	    if (isset($data[0]['#text'])) {
	    	$price = trim($data[0]['#text']);
	    	$price = trim(str_replace(array("&nbsp;" , "&amp;" , "US" , "$" , "GBP" , "EUR" , "C") , array(" " , "`" , "" , "" , "" , "" , "") , $price ));
	    	if(strpos($price , ",") > 0 && strpos($price , ".") > 0){
	    		$price = str_replace(array(",") , array("") , $price);
	    	}
	    	return (float) $price;
        }
        //exit;
        $res = explode('"discountedPrice":"US $' , $html , 2);
        if(count($res) > 1){
        	$res = explode('"' , $res[1] , 2);
        	if(count($res) > 1){
        		return (float) trim($res[0]);
        	}
        	
        }
        return '';
}
    

function get_model($html){
		$instruction = 'h2[itemprop=model]';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    //echo '<pre>'.print_r($data , 1).'</pre>';exit;
	    unset($parser);
	    if (isset($data[0]['#text']) && !is_array($data[0]['#text']) ) {
	    	return trim($data[0]['#text']);
        }
        
        return '';
}

    
    
function get_main_image($html){
	
		$main_image = false;
	
		$instruction = 'center img';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    unset($parser);
	    if (isset($res[0]['src'])) {
	    	$main_image = trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$res[0]['src']));
        }
        // another variation 
		$instruction = 'img#icImg';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    unset($parser);
	    if (isset($res[0]['src'])) {
	    	$main_image = trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$res[0]['src']));
        }
		
		// try to find out large image
		$temp = explode('enlargeZoomUrl":"' , $html);
		if(count($temp) > 1){
			$temp1 = explode('"}' , $temp[1]);
			if(count($temp1) > 1){ 
				$main_image = $temp1[0];
			}
		}
		
		return $main_image;		
}


function get_other_images($html){
			$out = array();
			// try to find out image from 
			// http://www.ebay.com/ctg/Vizio-E321VL-32-720p-HD-LCD-Television-/102546991?_pcatid=40&LH_ItemCondition=1000
			$instruction = 'div.pds-i table img';
		    $parser = new nokogiri($html);
		    $res = $parser->get($instruction)->toArray();
		    unset($parser);
		    if (isset($res) && is_array($res)) {
		    	foreach($res as $oth_imgs){
		    		$out[] = try_get_bigger($oth_imgs['src']);
		    	}
	        }
	       
			
			// try to find out other images
			$temp = explode('mnImgData":[' , $html);
			if(count($temp) > 1){
				$temp = explode('],' , $temp[1]);
					if(count($temp) > 1){
						//print_r(json_decode('['.$temp[0].']'));
						$ims = json_decode('['.$temp[0].']');
						foreach($ims as $valObj){
							if(!strpos($valObj->src , "imgNoImg")){
								$out[] = $valObj->src;
							}
						}
					}
			}
			
			
 			// another variation 
	        $res = explode('"maxImageUrl":"' , $html);
	        if(count($res) > 1){
	        	unset($res[0]);
	        	foreach($res as $pos_img){
	        		$res_t = explode('"' , $pos_img , 2);
	        		if(count($res_t) > 1){
	        			$out[] = try_get_bigger( str_ireplace(array("u002F") , array("") , $res_t[0] ) );
	        		}
	        	}
	        }
	        
			//print_r($out);
			
			// another variation 
			$instruction = 'td.tdThumb div img';
		    $parser = new nokogiri($html);
		    $res = $parser->get($instruction)->toArray();
		    unset($parser);
		    if (isset($res) && is_array($res)) {
		    	foreach($res as $oth_imgs){
		    		$out[] = try_get_bigger($oth_imgs['src']);
		    	}
	        }
	        
	        
	        // from seller's iframe dasc
			// example: http://www.ebay.co.uk/itm/GENUINE-SAMSUNG-I9300-GALAXY-S3-REPLACEMENT-LCD-AMOLED-HD-DISPLAY-FRAME-WHITE-/161015082000?pt=UK_Replacement_Parts_Tools&hash=item257d3f2c10
			$pq = phpQuery::newDocumentHTML($html);        
			$temp_p  = $pq->find('div#desc_div');
			if (is_object($temp_p)){
					$res = $temp_p->html();
					// get images array
					preg_match_all('/(<img[^<]+>)/Usi', $res, $images);
				    foreach ($images[0] as $index => $value) {
				    	$s = strpos($value, 'src="') + 5;
				        $e = strpos($value, '"', $s + 1);
				        $out[] =   substr($value, $s, $e - $s);
				    }
			}
			
			//echo '<pre>'.print_r($out , 1).'</pre>';
			return $out;

}
    
 function try_get_bigger($src){
 	if(strpos($src , "60_")){
 		$temp = explode("60_" , $src);
 		// get extension
 		$ext = explode("." , $temp[1] , 2);
 		return $temp[0].'60_12.'.$ext[1];
 	}
 	
 	$src = str_ireplace(array('\\') , array("/") , $src);
 	
 	if(strpos($src , '$_14')){
 		return str_ireplace(array('$_14') , array('$_57') , $src);
 	}else{
 		return $src;
 	}
 }
 
 
 //// SEPECIAL FUNC
function processSpecImages($spec){
		
		// get images array
		preg_match_all('/(<img[^<]+>)/Usi', $spec, $images);
		//echo '<pre>'.print_r($images , 1).'</pre>';exit;
		$image = array();
        foreach ($images[0] as $index => $value) {
        	if(strpos($value , ".php") < 1){
	            $s = strpos($value, 'src="') + 5;
	            $e = strpos($value, '"', $s + 1);
	            $image[substr($value, $s, $e - $s)] =   substr($value, $s, $e - $s);
        	}
        }
        
        
        //echo '<pre>'.print_r($image , 1).'</pre>';exit;
        // [media/banner/2013-01-25_17_46_34sku20708-k.jpg] => /media/banner/2013-01-25_17_46_34sku20708-k.jpg
        $cnt_others = 0; 
        foreach ($image as $index => $value) {
        	
        	
        	
        	// get image
        	$img_res = false;
			try{
				$img_res = getSslImg($value);
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
        /*
         $spec = preg_replace(array("'<table[^>]*?>.*?</table>'si"), Array(""), $spec);
         */
        $spec = str_ireplace(array("Posted with" , "eBay Mobile") , array("" , "") , $spec);
        return $spec;
       
}


function getSslImg($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_HEADER, false);
	//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_REFERER, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$result = curl_redirect_exec($ch);
	curl_close($ch);
	return $result;
}



?>