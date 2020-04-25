<?php
/*
 *   обновляет js и php файлы всех модулей
 *   переносим файлы с xampp/htdocs/cart в /OPENCART EXTENSIONS/SINGLE PRODUCT SCRAPERS/
 *   
 *   нужно в случае массового обновления prototype block чтобы обновить все файлы в packages
 *    или просто переноса большого колличесва изменений
 *    
 *    после запуска заново нужно делать зипы
 *    
 *    запуск: http://cart/getSingleProduct/update_all_exts.php
 * 
 */

$markets = array(
					array("pandawill" , "Pandawill"),
					array("ebay" , "eBay"),
					array("aliexpress" , "Aliexpress"),
					array("amazon" , "Amazon"),
					array("focalprice" , "Focalprice"),
					array("flipkart" , "Flipkart"),
					array("banggood" , "Banggood"),
					array("etsy" , "Etsy"),
					array("alibaba" , "Alibaba"),
					array("overstock" , "Overstock"),
					array("sportsdirect" , "Sportsdirect"),
					array("snapdeal" , "Snapdeal"),
					array("tmart" , "Tmart"),
					array("microcenter" , "Microcenter"),
					array("sunsky" , "Sunsky-online"),
					array("walmart" , "Walmart"),
					array("ecrater" , "eCrater"),
					array("wsdeal" , "Wsdeal"),
					array("ekey" , "eKey"),
					array("ioffer" , "iOffer"),
					array("bestbuy" , "Bestbuy"),
					array("qvc" , "Qvc"),
					array("play" , "Play.com"),
					array("taobao" , "Taobao"),
					array("target" , "Target"),
					array("miniinthebox" , "Miniinthebox/Lightinthebox"),
					array("buy" , "Buy/Rakuten"),
					array("6pm" , "6pm"),
					
);


$dir = "../../../../OPENCART EXTENSIONS/SINGLE PRODUCT SCRAPERS/";


if (is_dir($dir)) {
	chdir($dir);
	echo 'come in the SINGLE PRODUCT SCRAPERS folder <br />';
	// сейчас находимся в папке SINGLE PRODUCT SCRAPERS
	foreach($markets as $market){
		echo 'choose market: ' .$market[0]. ', market name: ' . $market[1] . '<br />';
		copy("../../xampp/htdocs/cart/getSingleProduct/js/" . $market[0] . ".js" , "Get the product from " . $market[1] . "/Get product from " . $market[1] . " extension for opencart/for VQMOD Installation/getSingleProduct/js/" . $market[0] . ".js");
		copy("../../xampp/htdocs/cart/getSingleProduct/" . $market[0] . ".php" , "Get the product from " . $market[1] . "/Get product from " . $market[1] . " extension for opencart/for VQMOD Installation/getSingleProduct/" . $market[0] . ".php");
		copy("../../xampp/htdocs/cart/getSingleProduct/js/" . $market[0] . ".js" , "Get the product from " . $market[1] . "/Get product from " . $market[1] . " extension for opencart/for MANUAL Installation/getSingleProduct/js/" . $market[0] . ".js");
		copy("../../xampp/htdocs/cart/getSingleProduct/" . $market[0] . ".php" , "Get the product from " . $market[1] . "/Get product from " . $market[1] . " extension for opencart/for MANUAL Installation/getSingleProduct/" . $market[0] . ".php");
		echo 'DONE<br />';
	}
	
}



?>