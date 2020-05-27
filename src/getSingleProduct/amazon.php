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
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_ENCODING , "");
		$html = curl_redirect_exec($ch);
		curl_close($ch);
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
	if(strpos($data['url'] , "amazon")){


	
	
		// try to get this url
		$output = _curl($data['url']);
		
		
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
			$out["spec"] = get_spec($output , $data['url']);
			//$out["spec"] = processSpecImages($out["spec"]);
		}
		
		
		/********************/
		/*  GET META TAGS   */
		/********************/
		if($data["keywords"] == "on"){
			$out['keywords'] = get_keywords($output ,  $data['url']);
		}
		
		if($data["desc"] == "on"){
			$out['desc'] = get_desc($output , $data['url']);
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
						$image_data_type = false;
						// try to download
						if(strpos($image , "ta:image") > 0){
							$image = substr($image ,  strpos($image,",")+1 );
  							$img_res =  base64_decode(str_replace(' ','+',$image));
  							$image_data_type = true;
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
							if($image_data_type){
								//echo $img_name;exit;
								@file_put_contents("../image/data/".$_POST['tempdir']."/".$img_name.".jpeg" , $img_res);
							}else{
								@file_put_contents("../image/data/".$_POST['tempdir']."/".$img_name.".".$img_ext , $img_res);
							}
							if($key < 1){
								if($image_data_type){
									$out['main_image'] = "jpeg";
								}else{
									$out['main_image'] = $img_ext;
								}
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
	echo json_encode($out);exit;
}else{
	echo 'foad';exit;
}


	
function get_title($html){
			
		$instruction = 'span#btAsinTitle';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    //echo '<pre>'.print_r($data , 1).'</pre>';
	    unset($parser);
		if (isset($data[0]['span'][0]['#text']) && !is_array($data[0]['span'][0]['#text']) && strlen(trim($data[0]['span'][0]['#text'])) > 3  ) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['span'][0]['#text']));
        }
	    if (isset($data[0]['#text']) && !is_array($data[0]['#text']) && strlen(trim($data[0]['#text'])) > 3  ) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
        }
 		if (isset($data[0]['#text'][0]) && !is_array($data[0]['#text'][0]) && strlen(trim($data[0]['#text'][0])) > 3 ) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text'][0]));
        }
		if (isset($data[0]['span'][0]['#text'][0]) && !is_array($data[0]['span'][0]['#text'][0]) && strlen(trim($data[0]['span'][0]['#text'][0])) > 5 ) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['span'][0]['#text'][0]));
        }
        
        
		$instruction = 'h1#title';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	    // echo '<pre>'.print_r($data , 1).'</pre>';exit;
	    unset($parser);
 		if (isset($data[0]['span'][0]['#text']) && !is_array($data[0]['span'][0]['#text'])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['span'][0]['#text']));
        }
	    if (isset($data[0]['#text']) && !is_array($data[0]['#text'])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
        }
 		if (isset($data[0]['#text'][0]) && !is_array($data[0]['#text'][0])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text'][0]));
        }
        
        $instruction = 'span#productTitle';
	    $parser = new nokogiri($html);
	    $data = $parser->get($instruction)->toArray();
	     // echo '<pre>'.print_r($data , 1).'</pre>';exit;
		unset($parser);
 		if (isset($data[0]['span'][0]['#text']) && !is_array($data[0]['span'][0]['#text'])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['span'][0]['#text']));
        }
	    if (isset($data[0]['#text']) && !is_array($data[0]['#text'])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
        }
 		if (isset($data[0]['#text'][0]) && !is_array($data[0]['#text'][0])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text'][0]));
        }
        
        
        
        
        return '';
}



function get_model($html){
	$res = explode('<b>Item model number:</b>' , $html , 2);
	if(count($res) > 1){
		$res = explode('</li>' ,$res[1] , 2);
		if(count($res) > 1){
			return trim($res[0]); 
		}
	}
	return '';
}


function get_price($html) {
        $instruction = 'span#actualPriceValue b';
        $parser = new nokogiri($html);
        $data = $parser->get($instruction)->toArray();
        $data = reset($data);
        unset($parser);
        if (isset($data['#text'])) return clear_price(substr($data['#text'] , 1));
        
        $instruction = 'span.olpCondLink span.price';
        $parser = new nokogiri($html);
        $data = $parser->get($instruction)->toArray();
        $data = reset($data);
        unset($parser);
        if (isset($data[0]['#text'])) return clear_price(substr($data[0]['#text'] , 1));
        if (isset($data['#text'])) return clear_price(substr($data['#text'] , 1));
        
        
        $instruction = 'div#priceBlock span.pa_price';
        $parser = new nokogiri($html);
        $data = $parser->get($instruction)->toArray();
        $data = reset($data);
        unset($parser);
        if (isset($data[0]['#text'])) return clear_price(substr($data[0]['#text'] , 1));
        if (isset($data['#text'])) return clear_price(substr($data['#text'] , 1));
        
 		$instruction = 'span#priceblock_ourprice';
        $parser = new nokogiri($html);
        $data = $parser->get($instruction)->toArray();
        $data = reset($data);
        //echo '<pre>'.print_r($data , 1).'</pre>';exit;
		if (isset($data[0]['#text']) && !is_array($data[0]['#text']) ){
        	return clear_price(substr($data[0]['#text'] , 1));
        }
        if (isset($data['#text']) && !is_array($data['#text']) ){
        	return (float) clear_price(trim(substr($data['#text'] , 1)));
        }
        
        
         $instruction = 'span.price';
        $parser = new nokogiri($html);
        $data = $parser->get($instruction)->toArray();
        $data = reset($data);
        //echo '<pre>'.print_r($data , 1).'</pre>';exit;
        unset($parser);
        if (isset($data[0]['#text']) && !is_array($data[0]['#text']) ){
        	return clear_price(substr($data[0]['#text'] , 1));
        }
        if (isset($data['#text']) && !is_array($data['#text']) ){
        	return (float) clear_price(trim(substr($data['#text'] , 1)));
        }
        
        
        $instruction = 'b.priceLarge';
        $parser = new nokogiri($html);
        $data = $parser->get($instruction)->toArray();
        $data = reset($data);
        //echo '<pre>'.print_r($data , 1).'</pre>';exit;
        unset($parser);
        if (isset($data[0]['#text']) && !is_array($data[0]['#text']) ){
        	return clear_price(substr($data[0]['#text'] , 1));
        }
        if (isset($data['#text']) && !is_array($data['#text']) ){
        	return (float) clear_price(trim(substr($data['#text'] , 1)));
        }
        
        
       
        
        return '';

        
    }
    
function clear_price($price){
	return str_ireplace(array(",") , array("") , $price);
}


function get_spec($html , $url){
		
		$res = '';
		
		$pq = phpQuery::newDocumentHTML($html);
		
		$temp  = $pq->find('td.bucket');
		foreach ($temp as $block){
			$te1 = pq($block)->find('h2');
			$te2 = pq($block)->find('strong');
			$t = pq($block)->find('div.content');
			if(	strpos(pq($te1)->text() , "Features") > 0  || strpos(pq($te2)->text() , "Features") > 0  ){
				$res .= '<h2>Product Features</h2><br />'.pq($t)->html().'<br />';
			}
		}
		
		
		
		$temp  = $pq->find('div.bucket');
		foreach ($temp as $block){
			$te1 = pq($block)->find('h2');
			$te2 = pq($block)->find('strong');
			//echo pq($te1)->text();
			//echo pq($te2)->text();
			$t = pq($block)->find('div.content');
			$t_info = pq($block)->find('div.buying');
			if(	strpos(pq($te1)->text() , "Specifications") > 0  || strpos(pq($te2)->text() , "Specifications") > 0  ){
				$res .= '<h2>Product Specifications</h2><br />'.pq($t)->html().'<br />';
			}
			if(	strpos(pq($te1)->text() , "ook Description") > 0  || strpos(pq($te2)->text() , "ook Description") > 0  ){
				$res .= '<h2>Book Description</h2><br />'.pq($t_info)->html().'<br />'.pq($t)->html().'<br />';
			}
		}
		//echo $res;exit;
		
		
		
		// http://www.amazon.com/Nixon-A083-000-Stainless-Steel-Analog-Black/dp/B001IX88W0/ref=lp_5777489011_1_4/185-6766368-8608223?s=watches&ie=UTF8&qid=1386084399&sr=1-4
		$temp  = $pq->find('div#technicalSpecifications_feature_div');
		foreach ($temp as $block){
			$res .= $temp->html().'<br />';
		}
		
		
		
		$temp  = $pq->find('div#productDescription');
		foreach ($temp as $block){
			$res .= $temp->html().'<br />';
		}
		
		
    	$temp  = $pq->find('div#technical-data');
		foreach ($temp as $block){
			$res .= $temp->html().'<br />';
		}
		
		
		$temp  = $pq->find('div#dp_productDescription_container_div');
		foreach ($temp as $block){
			$res .= '<h2>Product Description</h2>' . $temp->html().'<br />';
		}
		
		$temp  = $pq->find('div#detailBullets_feature_div ul.a-vertical');
		foreach ($temp as $block){
			$res .= $temp->html().'<br />';
		}
		
		$temp  = $pq->find('div.techD div.pdClearfix div.pdTab');
		foreach ($temp as $block){
			$res .= $temp->html().'<br />';
		}
		
		
		//echo count($temp);exit;
		
		
		// kmd-section-container
		/*$temp  = $pq->find('table.kmd-section-container');
		foreach ($temp as $block){
			$res .= $temp->html().'<br />';
		}*/
		$res = preg_replace(array("'<a [^>]*?.*?>'si"), Array(""), $res);
		$res = str_ireplace(array("<noscript>" , "</noscript>") , array("" , "") , $res);
		
		
		if(strpos($url , "zon.co.jp/") > 0){
			return enc_jp($res);
		}else{
			return utf8_encode($res);
		}
}


function enc_jp($text){
	//return $text;
	return iconv('SHIFT_JIS', 'UTF-8', $text);
}


function get_keywords($html , $url) {
       $res =  explode('<meta name="keywords" content="' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[1]);
       		if(count($res) > 1){
       			return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $res[0]);	
       		}
       		 
       }
       return  get_desc($html , $url);
    }

function get_desc($html , $url) {
       $res =  explode('<meta name="description" content="' , $html);
       if(count($res) > 1){
       		$res = explode('"' , $res[1]);
       		if(count($res) > 1){
       			if(strpos($url , "zon.co.jp/") > 0){
       				return enc_jp($res[0]);
       			}else{
       				$out = preg_replace("/[^a-zA-Z0-9_\-\s]/", "" ,  $res[0]); 
       				return str_replace(array("&nbsp;" , "&amp;") , array(" " , "`") , $out);
       			}	
			}	 
       }
       return '';
    }
    
function get_main_image($html){
	
		// сразу проверяем вариант когда только 1 главное изображение через data:image/jpeg;base64,
		$instruction = 'img#imgBlkFront';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    unset($parser);
	    //echo '<pre>'.print_r($res , 1).'</pre>';exit;
		if (isset($res[0]['src']) && !is_array($res[0]['src']) ) {
	    	return $res[0]['src'];
        }
	    
	
		$instruction = 'td#prodImageCell a img';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    unset($parser);
	    if (isset($res[0]['src']) && !is_array($res[0]['src']) ) {
	    	$main_image = trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$res[0]['src']));
	    	return try_get_bigger($main_image);
        }
	
		$instruction = 'div.thumbs-bottom img';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    unset($parser);
	    if (isset($res[0]['src']) &&  !is_array($res[0]['src']) ) {
	    	$main_image = trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$res[0]['src']));
	    	return try_get_bigger($main_image);
        }
        
        // another variation 
		$instruction = 'img#main-image';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    unset($parser);
	    if (isset($res[0]['src']) &&  !is_array($res[0]['src']) ) {
	    	$main_image = trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$res[0]['src']));
	    	return try_get_bigger($main_image);
        }
        
        
		// another variation
	    $res = explode('"large":"' , $html);
	    if(count($res) > 1){
	    	unset($res[0]);
	       	foreach($res as $img){
	       		$res_t = explode('"' , $img , 2);
	       		if(count($res_t) > 1){
	       			return try_get_bigger($res_t[0]);break;
	       		}
	       	}
	    }
  
        // another variation
        $res = explode('<img src="http://ecx.images-amazon.com/images/', $html ); 
        if(count($res) > 1){
        	$res = $res[1];
        	$res = explode('"' , $res);
        	return try_get_bigger("http://ecx.images-amazon.com/images/".$res[0]);
        }
        
		$instruction = 'div.kib-ma-container img';
	    $parser = new nokogiri($html);
	    $res = $parser->get($instruction)->toArray();
	    unset($parser);
	    if (isset($res[0]['src']) &&  !is_array($res[0]['src']) ) {
	    	$main_image = trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$res[0]['src']));
	    	return try_get_bigger($main_image);
        }
        
        
		
        
        return false;
		
}



function get_other_images($output){
			$out = array();
			
			// another variation
			$instruction = 'div.tiny a[target=AmazonHelp]';
		    $parser = new nokogiri($output);
		    $res = $parser->get($instruction)->toArray();
		    unset($parser);
		    //print_r($res);exit;
		    if (isset($res[0]['href'])) {
		    	$ch = curl_init ($res[0]['href']); 
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
				$images_html = curl_exec ($ch);
				
				$temp = explode('fetchImage("alt' , $images_html);
				if(count($temp) > 1){
					foreach($temp as $t_key => $t_val){
						if($t_key > 0){
							$tt_temp= explode('" )' , $t_val);
							if(count($tt_temp) > 1){
								$ttt_temp = explode('", "' , $tt_temp[0]);
								if(count($ttt_temp) > 1){
									$out[] = try_get_bigger($ttt_temp[1]);
								}
							}
						}
					}
				}
		    	
	        }
			if(count($out) > 0){
	        	return $out;
	        }
	        
	      
	
			$instruction = 'div.thumbs-bottom img';
		    $parser = new nokogiri($output);
		    $res = $parser->get($instruction)->toArray();
		    unset($parser);
		    if (isset($res[0]['src'])) {
		    	foreach($res as $oth_imgs){
		    		$out[] = try_get_bigger($oth_imgs['src']);
		    	}
	        }
	        if(count($out) > 0){
	        	return $out;
	        }
	        
	        // another variation
			$instruction = 'div.thumb-strip img';
		    $parser = new nokogiri($output);
		    $res = $parser->get($instruction)->toArray();
		    unset($parser);
		    if (isset($res[0]['src'])) {
		    	foreach($res as $oth_imgs){
		    		$out[] = try_get_bigger($oth_imgs['src']);
		    	}
	        }
			if(count($out) > 0){
	        	return $out;
	        }
	        
			$res = explode("setRgAg('" , $output);
			unset($res[0]);
			if(count($res) > 0){
				foreach($res as $peace){
					if(substr($peace , 0 , 4) == "http"){
						$tech = explode("'" , $peace);
						if(count($tech) > 1){
							$out[] = try_get_bigger($tech[0]);
						}
					}
				}
			}
			
			
			if(count($out) > 0){
	        	return $out;
	        }
	        
	        
	        
	        // another variation
			$instruction = '.thumb-strip img';
		    $parser = new nokogiri($output);
		    $res = $parser->get($instruction)->toArray();
		    unset($parser);
		    if (isset($res[0]['src'])) {
		    	foreach($res as $oth_imgs){
		    		$out[] = try_get_bigger($oth_imgs['src']);
		    	}
	        }
			if(count($out) > 0){
	        	return $out;
	        }
	        
	        
	        
	        // another variation
			$instruction = 'div#thumbs-image img';
	        $parser = new nokogiri($output);
	        $res = $parser->get($instruction)->toArray();
	        //echo '<pre>'.print_r($data , 1).'</pre>';exit;
	        if (isset($res) && is_array($res) && count($res) > 0){
	        	foreach($res as $oth_imgs){
	        		$out[] = try_get_bigger($oth_imgs['src']);
	        	}
	        }
	        
 			// another variation
			$instruction = 'div.kib-ma-container img';
	        $parser = new nokogiri($output);
	        $res = $parser->get($instruction)->toArray();
	        //echo '<pre>'.print_r($data , 1).'</pre>';exit;
	        if (isset($res) && is_array($res) && count($res) > 0){
	        	foreach($res as $oth_imgs){
	        		$out[] = try_get_bigger($oth_imgs['src']);
	        	}
	        }
	        
	        // another variation
	        $res = explode('"hiRes":"' , $output);
	        if(count($res) > 1){
	        	unset($res[0]);
	        	foreach($res as $img){
	        		$res_t = explode('"' , $img , 2);
	        		if(count($res_t) > 1){
	        			$out[] = $res_t[0];
	        		}
	        	}
	        }
	        
	        
 			// another variation
	        $res = explode('"large":"' , $output);
	        if(count($res) > 1){
	        	unset($res[0]);
	        	foreach($res as $img){
	        		$res_t = explode('"' , $img , 2);
	        		if(count($res_t) > 1){
	        			$out[] = $res_t[0];
	        		}
	        	}
	        }
	        
	        
			// another variation
	        $res = explode('registerImage(' , $output);
	        if(count($res) > 1){
	        	unset($res[0]);
	        	foreach($res as $img){
	        		$res_t = explode('"' , $img);
	        		if(count($res_t) > 3){
	        			// echo $res_t[3];
	        			if(strpos($res_t[3] , 'ttp') > 0){
	        				$out[] = $res_t[3];
	        			}
	        		}
	        	}
	        }
	        
	       // echo '<pre>'.print_r(array_unique($out) , 1).'</pre>';exit;
	        
	        return $out;
	        
}


    
 function try_get_bigger($src){
 	$res = explode("." , $src);
 	$out = array();
 	foreach($res as $part){
 		if(substr($part , 0 , 1) !== "_" && substr($part , -1) !== "_"){
 			$out[] = $part;
 		}
 	}
 	return implode("." , $out);
 }
 
 
 function cut_similar($html){
 	$res = explode('<div class="simsWrapper">' , $html);
 	if(count($res) > 1){
 		$res1 = explode('<a name="moreAboutThisProduct" id="moreAboutThisProduct"></a>' , $res[1]);
 		if(count($res1) > 1){
 			return $res[0] . $res1[1];
 		}else{
 			return $html;
 		}
 	}else{
 		$res = explode('<div class="bucket cpsims"' , $html);
	 	if(count($res) > 1){
	 		$res1 = explode('<a name="moreAboutThisProduct" id="moreAboutThisProduct"></a>' , $res[1]);
	 		if(count($res1) > 1){
	 			return $res[0] . $res1[1];
	 		}else{
	 			return $html;
	 		}
	 	}else{
 			return $html;
	 	}
 	}
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
