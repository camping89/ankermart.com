<?php
/*
 *  1) запускаем http://cart/getSingleProduct/refresh_prototype.php
 *  
 */

$dir = "js/";


// get prototype block from ebay
$ebay_contents = file_get_contents('js/ebay.js');
$p_block = find_prototype($ebay_contents);
if(!$p_block){
	echo "can't find prototype block for ebay.js ";exit;
}



if (is_dir($dir)) {
	echo 'DIR OPENED <br />';
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            echo "File: $file : \n";
            $res = explode(".js" , $file , 2);
            if(count($res) > 1){
            	$market_name = $res[0];
            	echo 'market_name - ' .$market_name. '<br />';
            	
            	//if($market_name == "6pm" ){
            	if($market_name !== "initAssembly" && $market_name !== "ebay"){
            		$contents = file_get_contents('js/' . $file);
            		// find prototype block
            		$res_t = find_prototype($contents);
            		if(!$res_t){
            			echo "can't find prototype block for " . $market_name . ".js <br />";
            		}else{
	            		// get new block
	            		$res_new = str_ireplace(array("ebay") , array($market_name) , $p_block);	            		
	            		// replace the block in the content
	            		$new_content = str_ireplace(array($res_t) , array($res_new), $contents);
	            		//echo $new_content;
	            		// save the file with new block
	            		file_put_contents('js/'. $market_name .'.js' , $new_content);
	            		echo 'prototype block for market ' . $market_name . ' CHANGED <br />';
            		}
            	}
            }else{
            	echo 'not a js file - '.$file.'<br />';
            }
        }
        closedir($dh);
    }
}


function find_prototype($content){
	$res = explode('BEGIN OF PROTOTYPE BLOCK' , $content);
	if(count($res) > 1){
		$res = explode('END OF PROTOTYPE BLOCK' , $res[1]);
		if(count($res) > 1){
			return $res[0];
		}
	}
	return false;
}


?>