GetSingleProduct_wsdeal = {};
if (window.isset == undefined) {
    window.isset = function(val) {
        try {
            eval('window.isset.tmp='+val);
            return (window.isset.tmp != undefined && window.isset.tmp != null);
        } catch(e) {
            return false;
        }
    }

}

/*  CUSTOM SETTINGS THERE */
if(!isset("GetSingleProduct_assembly") || !isset("GetSingleProduct_assembly.rootLocation") || !isset("GetSingleProduct_assembly.adminLocation") ){
	GetSingleProduct_wsdeal.rootLocation = "";
	GetSingleProduct_wsdeal.adminLocation = "admin";
}else{
	GetSingleProduct_wsdeal.rootLocation = GetSingleProduct_assembly.rootLocation;
	GetSingleProduct_wsdeal.adminLocation = GetSingleProduct_assembly.adminLocation;
}
GetSingleProduct_wsdeal.imageFolderName = "";
/*  END OF CUSTOM SETTINGS */




/* SYSTEM SETTINGS */
GetSingleProduct_wsdeal.marketName = "Wsdeal";
GetSingleProduct_wsdeal.ParsingScriptName = "wsdeal";
GetSingleProduct_wsdeal.IDENTIFIER = "wsdeal";
GetSingleProduct_wsdeal.semafor = 0;
GetSingleProduct_wsdeal.tempStore = "";
GetSingleProduct_wsdeal.lastImageNum = 0;
GetSingleProduct_wsdeal.ocVersion = 5;
// unique for each donor market
GetSingleProduct_wsdeal.fields = {
								"title" : 'Get Product Name (will appear in the "General" tab)',
								"spec" : 'Get Product Specification (will appear in the "General" tab)',
								"desc" : 'Get Meta Tag Description (will appear in the "General" tab)',
								"keywords" : 'Get Meta Tag Keywords (will appear in the "General" tab)',
								"price" : 'Get Price (will appear in the "Data" tab)',
								"sku" : 'Get SKU (will appear in the "Data" tab)',
								"images" : 'Get All Images (will appear in the "Image" tab)',
								};



/*
 *  при обновлении модулей этот блок копируется только с заменой IDENTIFIER
 */
/**************************   BEGIN OF PROTOTYPE BLOCK  *************************************/
GetSingleProduct_wsdeal.LANG_IDS = new Array();

GetSingleProduct_wsdeal.initialForm_wsdeal = '<div><p id="SPS_dialog_body_wsdeal">URL: <input type="text" id="wsdeal_import_parse_url" style="width:400px;" /><br /><br /><br />';
$.each( GetSingleProduct_wsdeal.fields, function( key, value ) {
	GetSingleProduct_wsdeal.initialForm_wsdeal += '<input type="checkbox" id="wsdeal_import_parse_' + key + '" checked="checked"/>&nbsp;&nbsp;&nbsp;';
	GetSingleProduct_wsdeal.initialForm_wsdeal += '<label for="wsdeal_import_parse_' + key + '">' + value + '</label><br /><br />';
	});
GetSingleProduct_wsdeal.initialForm_wsdeal += '<br /><input type="checkbox" id="wsdeal_import_allLanguages" checked="checked"/>&nbsp;&nbsp;&nbsp;'
	GetSingleProduct_wsdeal.initialForm_wsdeal += '<label for="wsdeal_import_allLanguages"><b>Insert grabbed data in ALL language tabs</b></label><br /><br />';
GetSingleProduct_wsdeal.initialForm_wsdeal += '</p></div>';



$(document).ready(function(){
	GetSingleProduct_wsdeal.tabGeneral = "tab-general";
	if($("#" + GetSingleProduct_wsdeal.tabGeneral).html() == null){
		GetSingleProduct_wsdeal.tabGeneral = "tab_general";
	}
	GetSingleProduct_wsdeal.tabData = "tab-data";
	if($("#" + GetSingleProduct_wsdeal.tabData).html() == null){
		GetSingleProduct_wsdeal.tabData = "tab_data";
	}
	$("#" + GetSingleProduct_wsdeal.tabGeneral + " span.required").parent().append('<br />&nbsp;<a onclick="parse_wsdeal($(this));" >Get product from ' + GetSingleProduct_wsdeal.marketName + '</a>');
	
	$("#" + GetSingleProduct_wsdeal.tabData).append('<div id="dialog_wsdeal_import" title="Copy product URL from ' + GetSingleProduct_wsdeal.marketName + '">'+
							'</div>');
	
	// get token
	var href = $("li#dashboard a").attr("href");
	GetSingleProduct_wsdeal.token = href.substr( href.indexOf("token=") + 6);
	
	
	// get oc version
	var ver = $("div#footer").html().indexOf("rsion 1.4");
	if(ver > 1){
		GetSingleProduct_wsdeal.ocVersion = 4;
	}
	

});


function parse_wsdeal(obj){
	var lang_id = get_current_lang_wsdeal(obj);
	$( "#dialog_wsdeal_import" ).html(GetSingleProduct_wsdeal.initialForm_wsdeal);
	if(GetSingleProduct_wsdeal.ocVersion > 4){
		$( "#dialog_wsdeal_import" ).dialog({ width: 530 ,
												buttons: [{
		                                                  	text: "Get this product",
		                                                  	click: function() { get_form_data_wsdeal(lang_id); }
		                                                  },{
		                                                	text: "Cancel",
		                                                    click: function() { if(GetSingleProduct_wsdeal.semafor < 1){ $(this).dialog("close");} }
		                                       }]});
		
	}else{
		$( "#dialog_wsdeal_import" ).dialog({ width: 530 ,
											buttons: {
		                                    	"Get this product": function() { get_form_data_wsdeal(lang_id); },
		                                        "Cancel" : function() { if(GetSingleProduct_wsdeal.semafor < 1){ $(this).dialog("close");} }
		                                    }
										});
	}
}


function get_current_lang_wsdeal(obj){
	var attrName = obj.parent().parent().parent().find("td input:first").attr("name");
	var res = SPS_wsdeal_parse_explode("description[" , attrName);
	if(res.length > 1){
		res = SPS_wsdeal_parse_explode("]" , res[1]);
		if(res.length > 1){
			return res[0];
		}
	}
	return 1;
}


function get_all_langsIDS_wsdeal(){
	var RES_LANG_IDS = [];
	$("div#languages a").each(function(){
		var href = $(this).attr("href");
		var id = href.substr(9);
		if(parseInt(id) > 0){
			RES_LANG_IDS.push(id);
		}
	});
	return RES_LANG_IDS;
}


function get_form_data_wsdeal(lang_id){
	if(GetSingleProduct_wsdeal.semafor < 1){
		
		var url = $("#wsdeal_import_parse_url").val();
		//console.log("url:" + url);
		if(GetSingleProduct_wsdeal.ocVersion > 4){
			$.each( GetSingleProduct_wsdeal.fields, function( key, value ) {
				eval('window.' + key + ' = $("#wsdeal_import_parse_' + key + '").attr("checked") == "checked"?"on":"off";');
			});
		}else{
			$.each( GetSingleProduct_wsdeal.fields, function( key, value ) {
				eval('window.' + key + ' = $("#wsdeal_import_parse_' + key + '").attr("checked") == true?"on":"off";');
			});
		}
		
		// получаем настройку с формы
		var import_allLanguages_wsdeal = $("#wsdeal_import_allLanguages").attr("checked") == "checked"?1:0;
		GetSingleProduct_wsdeal.LANG_IDS = [];
		if(import_allLanguages_wsdeal > 0){
			GetSingleProduct_wsdeal.LANG_IDS = get_all_langsIDS_wsdeal();
		}else{
			GetSingleProduct_wsdeal.LANG_IDS.push(lang_id);
		}
		
		if(images == "on"){
			// COUNT IMAGES EXISTS 
			var img_exists = $("div.image img");
			$.each( img_exists, function( key, value ) {
				var id = this.id;
				if(id.length > 5){
					var num_id = id.substr(5);
					if($.isNumeric(num_id) == true){
						GetSingleProduct_wsdeal.lastImageNum = GetSingleProduct_wsdeal.lastImageNum + 1;
					}
					//$('#image-row'+num_id).remove();
				}
			});
		}
		
		
		
		var product_name = parseName_wsdeal(url);
		if(product_name !== false){
			GetSingleProduct_wsdeal.tempStore = $("#SPS_dialog_body_wsdeal").html();
			GetSingleProduct_wsdeal.semafor = 1;
			$("#SPS_dialog_body_wsdeal").html('<div style="width:100%;text-align:center;">Please, wait. This may take several minutes...</div>');
			
			// create  product images folder from here
			var folder = GetSingleProduct_wsdeal.imageFolderName + get_folder_name_wsdeal(product_name) + ' ' + Math.floor(Math.random()* 100000);
			var folderPath = GetSingleProduct_wsdeal.rootLocation+"/" + GetSingleProduct_wsdeal.adminLocation + "/index.php?route=common/filemanager/create&token="+GetSingleProduct_wsdeal.token;
			var folderData = {"directory" : "" , "name" : folder};
			
			// CREATE FOLDER QUERY
			$.post(folderPath , folderData , function(data){
				var oData = data;
				/* для такой ошибки: <b>Warning</b>: mkdir(): Permission denied in <b>vq2-admin_controller_common_filemanager.php</b> on line <b>190</b>{"success":"Success: Directory created!"} */
				var error_on_creating_folder = 0
				if( typeof oData == "string" && oData.indexOf('success":"Success: Directory created!"}') > 1){
					error_on_creating_folder = 1;
				}
				if(oData.success == undefined  && error_on_creating_folder < 1 ){
					//console.log(data);
					eval("var oData = " + data + ";");
				}
				if(oData.success !== undefined || error_on_creating_folder > 0 ){
					var parsingPath = GetSingleProduct_wsdeal.rootLocation + "/getSingleProduct/" + GetSingleProduct_wsdeal.ParsingScriptName + ".php";
					var parsingData = {
								"token" : GetSingleProduct_wsdeal.token ,
								"tempdir" : folder,
								"data[url]" : url,
								};
					$.each( GetSingleProduct_wsdeal.fields, function( key, value ) {
								eval('parsingData["data[" + key + "]"] = window.' + key + ';');
							});
					//console.log(parsingData);
					
					// SCRAPE DONOR MARKET QUERY
					$.post(parsingPath , parsingData , function(data){
						var oData = data;
						if(oData.title == undefined && oData.spec == undefined && oData.main_image == undefined && oData.desc == undefined && oData.price == undefined && oData.keywords == undefined && oData.model == undefined && oData.sku == undefined){
							//console.log("beg");
							eval('var oData = ' + data + ';');
						}
						if(oData.title == undefined && oData.spec == undefined && oData.main_image == undefined && oData.desc == undefined && oData.price == undefined && oData.keywords == undefined && oData.model == undefined && oData.sku == undefined){
								alert("Cannot grab this product. Contact the developer for help.");
								$("#SPS_dialog_body_wsdeal").html(GetSingleProduct_wsdeal.tempStore);
						}else{
							// INSERT DATA INTO PRODUCT FORM
							$.each( GetSingleProduct_wsdeal.fields, function( key, value ) {
								eval("var datakey = oData." + key + ";"); 
								eval("var windowkey = window." + key + ";"); 
								if(datakey !== undefined && windowkey == "on"){
									switch(key){
										// TITLE
										case 'title':
											$.each( GetSingleProduct_wsdeal.LANG_IDS, function( key, val ) {
												$("input[name='product_description["+val+"][name]']").val(oData.title);
											});
											$("input[name='keyword']").val( SPS_wsdeal_prepare_seokeys(oData.title) );
											break;
										// META DESCRIPTION
										case 'desc':
											$.each( GetSingleProduct_wsdeal.LANG_IDS, function( key, val ) {
												$("textarea[name='product_description["+val+"][meta_description]']").html(oData.desc);
											});
											break;
										// META KEYWORDS
										case 'keywords':
											if(GetSingleProduct_wsdeal.ocVersion > 4){
												$.each( GetSingleProduct_wsdeal.LANG_IDS, function( key, val ) {
													$("textarea[name='product_description["+val+"][meta_keyword]']").html(oData.keywords);
												});
											}else{
												$.each( GetSingleProduct_wsdeal.LANG_IDS, function( key, val ) {
													$("textarea[name='product_description["+val+"][meta_keywords]']").html(oData.keywords);
												});
											}
											$.each( GetSingleProduct_wsdeal.LANG_IDS, function( key, val ) {
												$("input[name='product_description["+val+"][tag]']").val(oData.keywords);
											});
											if(GetSingleProduct_wsdeal.ocVersion > 4){
												$.each( GetSingleProduct_wsdeal.LANG_IDS, function( key, val ) {
													$("input[name='product_tag["+val+"]']").val(oData.keywords);
												});
											}else{
												$.each( GetSingleProduct_wsdeal.LANG_IDS, function( key, val ) {
													$("input[name='product_tags["+val+"]']").val(oData.keywords);
												});
											}
											break;
										// DESCRIPTION
										case 'spec':
											try { 
												$.each( GetSingleProduct_wsdeal.LANG_IDS, function( key, val ) {
													$("td#cke_contents_description"+val+" iframe").contents().find("body").html(oData.spec);
												});
												if(import_allLanguages_wsdeal > 0){
													$("iframe").contents().find("body").html(oData.spec);
												}else{
													try {
														var findID = 0;
														$("iframe").each(function(){ 
															var ifrTITLE = $(this).attr("title");
															var ifrID = SPS_wsdeal_parse_explode("description" , ifrTITLE);
															if(ifrID.length > 1){
																ifrID = ifrTITLE.substr(ifrTITLE.indexOf("description") + 11);
																if(ifrID == lang_id){
																	$(this).contents().find("body").html(oData.spec);
																	findID = 1;
																}
															}
														});
														// не нашли ар
														if(findID < 1){
															$("iframe").contents().find("body").html(oData.spec);
														}
													}catch(err){}
												}
											} 
											catch(err){}
											break;
										// PRICE
										case 'price':
											$("input[name='price']").val(oData.price);
											break;
										// MODEL
										case 'model':
											$("input[name='model']").val(oData.model);
											break;
										// SKU
										case 'sku':
											$("input[name='sku']").val(oData.sku);
											break;
										// UPC
										case 'upc':
											$("input[name='upc']").val(oData.upc);
											break;
											
										// WEIGHT
										case 'weight':
											$("input[name='weight']").val(oData.weight);
											break;
										// LENGTH
										case 'length_':
											$("input[name='length']").val(oData.length_);
											break;
										// WIDTH
										case 'width':
											$("input[name='width']").val(oData.width);
											break;
										// HEIGHT
										case 'height':
											$("input[name='height']").val(oData.height);
											break;
											
										/*case 'sku':
											$("input[name='sku']").val(oData.sku);
											break;
											*/
										default:
											break;
									}
								}
							});
			
							// main image
							var main_image = oData.main_image;
							if(main_image !== undefined){
								if(main_image.length > 0){
									var main_path = GetSingleProduct_wsdeal.rootLocation+"/image/data/" + folder + "/main." + oData.main_image;
									$("img#thumb").attr("src" , main_path);
									$("img#preview").attr("src" , main_path);
									$("input#image").val("data/" + folder + "/main." + oData.main_image);
								}
							}
							// other images
							var other_images = oData.other_images;
							if(other_images !== undefined && images == "on"){
								if(other_images.length > 0){
									var last_image_num = GetSingleProduct_wsdeal.lastImageNum;
									for(var oth = last_image_num; oth < (other_images.length + last_image_num); oth++){
										addImage();
										var other_path = GetSingleProduct_wsdeal.rootLocation+"/image/data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num];
										$("img#thumb"+oth).attr("src"  , other_path);
										$("img#preview"+oth).attr("src"  , other_path);
										$("input#image"+oth).val("data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num]);
									}
								}
							}
							$( "#dialog_wsdeal_import" ).dialog('close');
							
						}
						GetSingleProduct_wsdeal.semafor = 0;
					});
				}else{
					// TODO: cant create directory
					alert("Can`t create directory for images!");
					$( "#dialog_wsdeal_import" ).dialog('close');
				}
			});
		}else{
			alert("Can`t parse from this Url. Try another one.");
			$( "#dialog_wsdeal_import" ).dialog('close');
		}
	}
	GetSingleProduct_wsdeal.semafor = 0;
}


function get_folder_name_wsdeal(name){
	var out = name;
	var res = SPS_wsdeal_parse_explode(" " , name);
	if(res.length > 5){
		out = res[0] + ' ' + res[1] + ' ' + res[2] + ' ' + res[3] + ' ' + res[4] + ' ' + res[5];
	}
	out = out.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
	return out;
}



function SPS_wsdeal_parse_explode( delimiter, string ) {

	var emptyArray = { 0: '' };

	if ( arguments.length != 2
		|| typeof arguments[0] == 'undefined'
		|| typeof arguments[1] == 'undefined' )
	{
		return null;
	}

	if ( delimiter === ''
		|| delimiter === false
		|| delimiter === null )
	{
		return false;
	}

	if ( typeof delimiter == 'function'
		|| typeof delimiter == 'object'
		|| typeof string == 'function'
		|| typeof string == 'object' )
	{
		return emptyArray;
	}

	if ( delimiter === true ) {
		delimiter = '1';
	}

	return string.toString().split ( delimiter.toString() );
}


function SPS_wsdeal_parse_str_replace(search, replace, subject) {
	return subject.split(search).join(replace);
}

function SPS_wsdeal_prepare_seokeys(name) {
	var res = SPS_wsdeal_parse_str_replace(" " , "-" , name);
	return res.replace(/[^a-z0-9-\s]/gi, '');
}

/************************** END OF PROTOTYPE BLOCK  *************************************/


/*
 * достаём название товара для имени папки с изображениями
 */
function parseName_wsdeal(url){
	var res = SPS_wsdeal_parse_explode("wsdeal" , url);
	console.log(res);
	if(res.length > 1){
		res = SPS_wsdeal_parse_explode("/" , res[1]);
		if(res.length > 2){
			res = res[2];
			if(res.length > 3){
				res = SPS_wsdeal_parse_str_replace(".ws" , "" , res);
				res = SPS_wsdeal_parse_str_replace("_" , " " , res);
				return res;
			}else{
				return 'product ';
			}
		}else{
			return 'product';
		}
	}else{
		return false;
	}
}