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


function _curl($url) {
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
		curl_setopt($ch, CURLOPT_ENCODING , "");
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
	
	// watermark setting
	$no_watermark = false;
	if($data["nowater"] == "on"){
		$no_watermark = true;
	}
	
	// check url
	if(strpos($data['url'] , "pandawill")){


	
	
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
			$out["spec"] = processSpecImages($out["spec"] , $no_watermark);
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
		/*  GET SKU         */
		/********************/
		if($data["sku"] == "on"){
			$out['sku'] = get_sku($output);
		}
		
		/********************/
		/*  GET MODEL        */
		/********************/
		if($data["model"] == "on"){
			$out['model'] = get_model($output);
		}
		
		
		/********************/
		/*  GET PRICE         */
		/********************/
		if($data["price"] == "on"){
			$out['price'] = get_price($output);
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
		$instruction = '.product-shop .product-name h1';
        $parser = new nokogiri($html);
        $data = $parser->get($instruction)->toArray();
        unset($parser);
	    if (isset($data['#text']) && !is_array($data['#text'])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data['#text']));
        }
 		if (isset($data[0]['#text']) && !is_array($data[0]['#text'])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
        }
        
        
		$instruction = '.cjpro_name h1';
        $parser = new nokogiri($html);
        $data = $parser->get($instruction)->toArray();
        unset($parser);
	    if (isset($data['#text']) && !is_array($data['#text'])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data['#text']));
        }
 		if (isset($data[0]['#text']) && !is_array($data[0]['#text'])) {
	    	return trim(str_replace(array("&nbsp;" , "&amp;") , array(" " , "`" ) ,$data[0]['#text']));
        }
        
        return '';
}


function get_spec($html){
		$res = '';
		
		preg_match_all('|<div class="std">(.*)</div>|isU', $html, $result, PREG_SET_ORDER);
		if(isset( $result[0][0])){
        	$res .= $result[0][0];
		}
	
	    preg_match_all('|<div class="cjpro_wen">(.*)</div>|isU', $html, $result, PREG_SET_ORDER);
	    if(isset( $result[0][0])){
        	$res .= $result[0][0];
	    }
        
        
        /* хак для вот такик приколов на панде <img style="width: 650px; height: 448px;" alt="ONDA V975m" taikoo_lazy_src="http://pic.pandawill.com/media/banner/650x448x2014-01-07_17_15_52ONDA,P20V975m.jpg.=U36_=T83Wi7p+dWsQKG044Hl.jpg" src="/taikoo_static/1.Hy2LQaukh5.gif" onload="taikoo.lazyLoadImages.loadIfVisible(this);"> */
        preg_match_all('/(<img[^<]+>)/Usi', $res, $images);
        if(isset($images[0]) && is_array($images[0]) && count($images[0]) > 0){
        	foreach($images[0] as $index => $img){
        		$src = strpos($img, ' src="');
        		$lazy_src = strpos($img, 'taikoo_lazy_src="');
        		$lazy_check = strpos($img, 'onload="taikoo.lazyLoadImages.loadIfVisible(this);"');
        		if($src > 5 && $lazy_src > 5 && $lazy_check > 5){
        			// убираем onload
        			$new_img = str_replace('onload="taikoo.lazyLoadImages.loadIfVisible(this);"' , "", $img);
        			// находим адрес реального img
        			$real_src_start = $lazy_src + 17;
        			$real_src_end = strpos($img, '"', $real_src_start + 1);
        			$real_src = substr($img, $real_src_start , $real_src_end - $real_src_start);
        			// находим адрес фейкового img
        			$fuck_src_start = $src + 6;
        			$fuck_src_end = strpos($img, '"', $fuck_src_start + 1);
        			$fuck_src = substr($img, $fuck_src_start , $fuck_src_end - $fuck_src_start);
        			// удаляем то что в taikoo_lazy_src
        			$string_to_delete = substr($img, $lazy_src , strlen($real_src) + 18);
        			$new_img = str_replace($string_to_delete , "", $new_img); 
        			// меняем то что в src на то что в taikoo_lazy_src
        			$new_img = str_replace($fuck_src , $real_src, $new_img);
        			$res = str_replace($img , $new_img, $res);
        		}
        	}
        } 
        
        
        return $res;
}

function get_keywords($html) {       
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
    
function get_sku($html){
		$instruction = 'p.product-model';
        $parser = new nokogiri($html);
        $data = $parser->get($instruction)->toArray();
        unset($parser);
		if (isset($data[0]['#text']) ) {
            return str_ireplace('Model#:sku', '', $data[0]['#text']);
        }
        
        $res = explode('item#: sku' , $html , 2);
        if(count($res) > 1){
        	$res = explode('</div>' , $res[1] , 2);
        	return (int) $res[0];
        }
        
		$res = explode('item#:</a>sku' , $html , 2);
        if(count($res) > 1){
        	$res = explode('</div>' , $res[1] , 2);
        	return (int) $res[0];
        }
        return '';
}

function get_model($html){
		return get_sku($html);
}

function get_price($html){
	$res = explode('<span class="price">' , $html , 2);
	if(count($res) > 1){
        $res = explode('</span>' , $res[1] , 2);
        return (float) str_ireplace(array("$") , array("") , trim($res[0]) );
    }
	return '';
}
    
function get_main_image($html , $no_watermark){
	if($no_watermark){
		$instruction = 'p.product-image a img';
        $parser = new nokogiri($html);
        $data = $parser->get($instruction)->toArray();
        //echo '<pre>'.print_r($data , 1).'</pre>';exit;
        if(isset($data[0]['taikoo_lazy_src'])){
        	return $data[0]['taikoo_lazy_src'];
        }
	}else{
		$instruction = 'p.product-image a';
        $parser = new nokogiri($html);
        $data = $parser->get($instruction)->toArray();
        unset($parser);
        if ($data) {
            $data = reset($data);
            return $data['href'];
        }
	}
        return '';
		
}



function get_other_images($html , $no_watermark){
		$instruction = 'ul.gallery-media-slider li a';
        $parser = new nokogiri($html);
        $data = $parser->get($instruction)->toArray();

        unset($parser);

        $result = array();

        if ($data)
        foreach ($data as $value) {
            $start = strpos($value['onclick'], "'") + 1;
            $end = strrpos($value['onclick'], "'");
            if (($start !== false) and ($end !== false) and ($end > $start)){
            	$t_res = substr($value['onclick'], $start, $end - $start);
            	$tt_res = explode("', '" , $t_res);
            	$tt_res = $no_watermark?$tt_res[0]:$tt_res[1];
            	if(count($tt_res) > 0 && strpos($tt_res , "ttp://") > 0){
            		$result[] = $tt_res;
            	}else{
            		$result[] = $t_res;
            	}
            }
        }
        //echo '<pre>'.print_r($result , 1).'</pre>';exit;
        

        return $result;
}




//// SEPECIAL FUNC
function processSpecImages($spec , $no_watermark){
		// get images array
		preg_match_all('/(<img[^<]+>)/Usi', $spec, $images);
		$image = array();
        foreach ($images[0] as $index => $value) {
            $s = strpos($value, 'src="') + 5;
            $e = strpos($value, '"', $s + 1);
            if(strpos(substr($value, $s, $e - $s) , "andawill.com/") > 0){
            	$val = substr($value, $s, $e - $s);
            }else{
            	$val = 'http://www.pandawill.com/' . substr($value, $s, $e - $s);
            } 
            $image[substr($value, $s, $e - $s)] =   $val;
        }
        
        
         //echo '<pre>'.print_r($images[0] , 1).'</pre>';
         //echo '<pre>'.print_r($image , 1).'</pre>';exit;
        // [media/banner/2013-01-25_17_46_34sku20708-k.jpg] => /media/banner/2013-01-25_17_46_34sku20708-k.jpg
        $cnt_others = 0; 
        foreach ($image as $index => $value) {
        	
        	
        	
        	// get image
        	$img_res = false;
        	//echo $value;exit;
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
        
        return $spec;
       
}


    

?>
