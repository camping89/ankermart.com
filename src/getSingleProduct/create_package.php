<?php
/*
 *  как пользоваться:
 *  
 *  1) если не уверены в структуре каталогов - прибиваем имеющуюся папку (тогда она заново будет создана со структуры папки для ebay)
 *  
 *  2) в этом скрипте заполняем $market = ''; и $marketName = '';
 *  
 *  3) запускаем http://cart/getSingleProduct/create_package.php
 *  	будет создана структура папок 
 *  	будут записаны файлы .php , .js , .xml
 *  
 *  
 *  4) архивируем, ГОТОВО
 *  
 */

// $market = 'ebay';
$market = 'ebay';
// $marketName = 'eBay';
$marketName = 'eBay';

if(strlen($market) < 2 || strlen($marketName) < 2){
	echo 'no market name';
	exit;
}


$dir = "../../../../OPENCART EXTENSIONS/SINGLE PRODUCT SCRAPERS/";


if (is_dir($dir)) {
	$dscan = scandir($dir);
	chdir($dir);
	// сейчас находимся в папке SINGLE PRODUCT SCRAPERS
	
	// создаём структуру папок если нет такого ext
	if(!in_array('Get the product from '.$marketName , $dscan)){
		// копируем папку Get the product from eBay
		copy_folder('Get the product from eBay' , 'Get the product from '.$marketName);
		// заходим в папку и переименовум вложенную папку Get product from eBay extension for opencart
		chdir('Get the product from '.$marketName);
		rename("Get product from eBay extension for opencart" , "Get product from " . $marketName . " extension for opencart");
		// удаляем js, php, xml файлы
		unlink("Get product from eBay extension for opencart.zip");
		unlink("Get product from " . $marketName . " extension for opencart/for VQMOD Installation/getSingleProduct/ebay.php");
		unlink("Get product from " . $marketName . " extension for opencart/for VQMOD Installation/getSingleProduct/js/ebay.js");
		unlink("Get product from " . $marketName . " extension for opencart/for VQMOD Installation/vqmod/xml/get_the_product_from_ebay.xml");
		unlink("Get product from " . $marketName . " extension for opencart/for MANUAL Installation/getSingleProduct/ebay.php");
		unlink("Get product from " . $marketName . " extension for opencart/for MANUAL Installation/getSingleProduct/js/ebay.js");
		// заменяем ReadMe.txt file
		$content = file_get_contents("Get product from " . $marketName . " extension for opencart/ReadMe.txt");
		$content = str_replace( array("ebay" , "eBay") , array($market , $marketName) , $content);
		file_put_contents("Get product from " . $marketName . " extension for opencart/ReadMe.txt" , $content);
	}
	
	// возвращаемся в папку SINGLE PRODUCT SCRAPERS
	chdir($dir);
	// копируем  js, php, xml файлы
	copy("../../xampp/htdocs/cart/vqmod/xml/get_the_product_from_" . $market . ".xml" , "Get the product from " . $marketName . "/Get product from " . $marketName . " extension for opencart/for VQMOD Installation/vqmod/xml/get_the_product_from_" . $market . ".xml");
	copy("../../xampp/htdocs/cart/getSingleProduct/js/" . $market . ".js" , "Get the product from " . $marketName . "/Get product from " . $marketName . " extension for opencart/for VQMOD Installation/getSingleProduct/js/" . $market . ".js");
	copy("../../xampp/htdocs/cart/getSingleProduct/" . $market . ".php" , "Get the product from " . $marketName . "/Get product from " . $marketName . " extension for opencart/for VQMOD Installation/getSingleProduct/" . $market . ".php");
	copy("../../xampp/htdocs/cart/getSingleProduct/js/" . $market . ".js" , "Get the product from " . $marketName . "/Get product from " . $marketName . " extension for opencart/for MANUAL Installation/getSingleProduct/js/" . $market . ".js");
	copy("../../xampp/htdocs/cart/getSingleProduct/" . $market . ".php" , "Get the product from " . $marketName . "/Get product from " . $marketName . " extension for opencart/for MANUAL Installation/getSingleProduct/" . $market . ".php");

}

















function copy_folder($d1, $d2, $upd = true, $force = true) {
    if ( is_dir( $d1 ) ) {
        $d2 = mkdir_safe( $d2, $force );
        if (!$d2) {fs_log("!!fail $d2"); return;}
        $d = dir( $d1 );
        while ( false !== ( $entry = $d->read() ) ) {
            if ( $entry != '.' && $entry != '..' ) 
                copy_folder( "$d1/$entry", "$d2/$entry", $upd, $force );
        }
        $d->close();
    }
    else {
        $ok = copy_safe( $d1, $d2, $upd );
        $ok = ($ok) ? "ok-- " : " -- ";
        fs_log("{$ok}$d1"); 
    }
}


function mkdir_safe( $dir, $force ) { 
    if (file_exists($dir)) { 
        if (is_dir($dir)) return $dir; 
        else if (!$force) return false; 
        unlink($dir); 
    } 
    return (mkdir($dir, 0777, true)) ? $dir : false; 
} //function mkdir_safe 

function copy_safe ($f1, $f2, $upd) { 
    $time1 = filemtime($f1); 
    if (file_exists($f2)) { 
        $time2 = filemtime($f2); 
        if ($time2 >= $time1 && $upd) return false; 
    } 
    $ok = copy($f1, $f2); 
    if ($ok) touch($f2, $time1); 
    return $ok; 
} //function copy_safe  

function fs_log($str) { 
    $log = fopen("./fs_log.txt", "a"); 
    $time = date("Y-m-d H:i:s"); 
    fwrite($log, "$str ($time)\n"); 
    fclose($log); 
}


?>