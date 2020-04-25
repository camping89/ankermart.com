GetSingleProduct_play = {};
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
	GetSingleProduct_play.rootLocation = "";
	GetSingleProduct_play.adminLocation = "admin";
}else{
	GetSingleProduct_play.rootLocation = GetSingleProduct_assembly.rootLocation;
	GetSingleProduct_play.adminLocation = GetSingleProduct_assembly.adminLocation;
}
GetSingleProduct_play.imageFolderName = "";
/*  END OF CUSTOM SETTINGS */




/* SYSTEM SETTINGS */
GetSingleProduct_play.marketName = "Play.com";
GetSingleProduct_play.ParsingScriptName = "play";
GetSingleProduct_play.IDENTIFIER = "play";
GetSingleProduct_play.semafor = 0;
GetSingleProduct_play.tempStore = "";
GetSingleProduct_play.lastImageNum = 0;
GetSingleProduct_play.ocVersion = 5;
// unique for each donor market
GetSingleProduct_play.fields = {
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
GetSingleProduct_play.LANG_IDS = new Array();

GetSingleProduct_play.initialForm_play = '<div><p id="SPS_dialog_body_play">URL: <input type="text" id="play_import_parse_url" style="width:400px;" /><br /><br /><br />';
$.each( GetSingleProduct_play.fields, function( key, value ) {
	GetSingleProduct_play.initialForm_play += '<input type="checkbox" id="play_import_parse_' + key + '" checked="checked"/>&nbsp;&nbsp;&nbsp;';
	GetSingleProduct_play.initialForm_play += '<label for="play_import_parse_' + key + '">' + value + '</label><br /><br />';
	});
GetSingleProduct_play.initialForm_play += '<br /><input type="checkbox" id="play_import_allLanguages" checked="checked"/>&nbsp;&nbsp;&nbsp;'
	GetSingleProduct_play.initialForm_play += '<label for="play_import_allLanguages"><b>Insert grabbed data in ALL language tabs</b></label><br /><br />';
GetSingleProduct_play.initialForm_play += '</p></div>';



$(document).ready(function(){
	GetSingleProduct_play.tabGeneral = "tab-general";
	if($("#" + GetSingleProduct_play.tabGeneral).html() == null){
		GetSingleProduct_play.tabGeneral = "tab_general";
	}
	GetSingleProduct_play.tabData = "tab-data";
	if($("#" + GetSingleProduct_play.tabData).html() == null){
		GetSingleProduct_play.tabData = "tab_data";
	}
	$("#" + GetSingleProduct_play.tabGeneral + " span.required").parent().append('<br />&nbsp;<a onclick="parse_play($(this));" >Get product from ' + GetSingleProduct_play.marketName + '</a>');
	
	$("#" + GetSingleProduct_play.tabData).append('<div id="dialog_play_import" title="Copy product URL from ' + GetSingleProduct_play.marketName + '">'+
							'</div>');
	
	// get token
	var href = $("li#dashboard a").attr("href");
	GetSingleProduct_play.token = href.substr( href.indexOf("token=") + 6);
	
	
	// get oc version
	var ver = $("div#footer").html().indexOf("rsion 1.4");
	if(ver > 1){
		GetSingleProduct_play.ocVersion = 4;
	}
	

});


function parse_play(obj){
	var lang_id = get_current_lang_play(obj);
	$( "#dialog_play_import" ).html(GetSingleProduct_play.initialForm_play);
	if(GetSingleProduct_play.ocVersion > 4){
		$( "#dialog_play_import" ).dialog({ width: 530 ,
												buttons: [{
		                                                  	text: "Get this product",
		                                                  	click: function() { get_form_data_play(lang_id); }
		                                                  },{
		                                                	text: "Cancel",
		                                                    click: function() { if(GetSingleProduct_play.semafor < 1){ $(this).dialog("close");} }
		                                       }]});
		
	}else{
		$( "#dialog_play_import" ).dialog({ width: 530 ,
											buttons: {
		                                    	"Get this product": function() { get_form_data_play(lang_id); },
		                                        "Cancel" : function() { if(GetSingleProduct_play.semafor < 1){ $(this).dialog("close");} }
		                                    }
										});
	}
}


function get_current_lang_play(obj){
	var attrName = obj.parent().parent().parent().find("td input:first").attr("name");
	var res = SPS_play_parse_explode("description[" , attrName);
	if(res.length > 1){
		res = SPS_play_parse_explode("]" , res[1]);
		if(res.length > 1){
			return res[0];
		}
	}
	return 1;
}


function get_all_langsIDS_play(){
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


function get_form_data_play(lang_id){
	if(GetSingleProduct_play.semafor < 1){
		
		var url = $("#play_import_parse_url").val();
		//console.log("url:" + url);
		if(GetSingleProduct_play.ocVersion > 4){
			$.each( GetSingleProduct_play.fields, function( key, value ) {
				eval('window.' + key + ' = $("#play_import_parse_' + key + '").attr("checked") == "checked"?"on":"off";');
			});
		}else{
			$.each( GetSingleProduct_play.fields, function( key, value ) {
				eval('window.' + key + ' = $("#play_import_parse_' + key + '").attr("checked") == true?"on":"off";');
			});
		}
		
		// получаем настройку с формы
		var import_allLanguages_play = $("#play_import_allLanguages").attr("checked") == "checked"?1:0;
		GetSingleProduct_play.LANG_IDS = [];
		if(import_allLanguages_play > 0){
			GetSingleProduct_play.LANG_IDS = get_all_langsIDS_play();
		}else{
			GetSingleProduct_play.LANG_IDS.push(lang_id);
		}
		
		if(images == "on"){
			// COUNT IMAGES EXISTS 
			var img_exists = $("div.image img");
			$.each( img_exists, function( key, value ) {
				var id = this.id;
				if(id.length > 5){
					var num_id = id.substr(5);
					if($.isNumeric(num_id) == true){
						GetSingleProduct_play.lastImageNum = GetSingleProduct_play.lastImageNum + 1;
					}
					//$('#image-row'+num_id).remove();
				}
			});
		}
		
		
		
		var product_name = parseName_play(url);
		if(product_name !== false){
			GetSingleProduct_play.tempStore = $("#SPS_dialog_body_play").html();
			GetSingleProduct_play.semafor = 1;
			$("#SPS_dialog_body_play").html('<div style="width:100%;text-align:center;">Please, wait. This may take several minutes...</div>');
			
			// create  product images folder from here
			var folder = GetSingleProduct_play.imageFolderName + get_folder_name_play(product_name) + ' ' + Math.floor(Math.random()* 100000);
			var folderPath = GetSingleProduct_play.rootLocation+"/" + GetSingleProduct_play.adminLocation + "/index.php?route=common/filemanager/create&token="+GetSingleProduct_play.token;
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
					var parsingPath = GetSingleProduct_play.rootLocation + "/getSingleProduct/" + GetSingleProduct_play.ParsingScriptName + ".php";
					var parsingData = {
								"token" : GetSingleProduct_play.token ,
								"tempdir" : folder,
								"data[url]" : url,
								};
					$.each( GetSingleProduct_play.fields, function( key, value ) {
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
								$("#SPS_dialog_body_play").html(GetSingleProduct_play.tempStore);
						}else{
							// INSERT DATA INTO PRODUCT FORM
							$.each( GetSingleProduct_play.fields, function( key, value ) {
								eval("var datakey = oData." + key + ";"); 
								eval("var windowkey = window." + key + ";"); 
								if(datakey !== undefined && windowkey == "on"){
									switch(key){
										// TITLE
										case 'title':
											$.each( GetSingleProduct_play.LANG_IDS, function( key, val ) {
												$("input[name='product_description["+val+"][name]']").val(oData.title);
											});
											$("input[name='keyword']").val( SPS_play_prepare_seokeys(oData.title) );
											break;
										// META DESCRIPTION
										case 'desc':
											$.each( GetSingleProduct_play.LANG_IDS, function( key, val ) {
												$("textarea[name='product_description["+val+"][meta_description]']").html(oData.desc);
											});
											break;
										// META KEYWORDS
										case 'keywords':
											if(GetSingleProduct_play.ocVersion > 4){
												$.each( GetSingleProduct_play.LANG_IDS, function( key, val ) {
													$("textarea[name='product_description["+val+"][meta_keyword]']").html(oData.keywords);
												});
											}else{
												$.each( GetSingleProduct_play.LANG_IDS, function( key, val ) {
													$("textarea[name='product_description["+val+"][meta_keywords]']").html(oData.keywords);
												});
											}
											$.each( GetSingleProduct_play.LANG_IDS, function( key, val ) {
												$("input[name='product_description["+val+"][tag]']").val(oData.keywords);
											});
											if(GetSingleProduct_play.ocVersion > 4){
												$.each( GetSingleProduct_play.LANG_IDS, function( key, val ) {
													$("input[name='product_tag["+val+"]']").val(oData.keywords);
												});
											}else{
												$.each( GetSingleProduct_play.LANG_IDS, function( key, val ) {
													$("input[name='product_tags["+val+"]']").val(oData.keywords);
												});
											}
											break;
										// DESCRIPTION
										case 'spec':
											try { 
												$.each( GetSingleProduct_play.LANG_IDS, function( key, val ) {
													$("td#cke_contents_description"+val+" iframe").contents().find("body").html(oData.spec);
												});
												if(import_allLanguages_play > 0){
													$("iframe").contents().find("body").html(oData.spec);
												}else{
													try {
														var findID = 0;
														$("iframe").each(function(){ 
															var ifrTITLE = $(this).attr("title");
															var ifrID = SPS_play_parse_explode("description" , ifrTITLE);
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
									var main_path = GetSingleProduct_play.rootLocation+"/image/data/" + folder + "/main." + oData.main_image;
									$("img#thumb").attr("src" , main_path);
									$("img#preview").attr("src" , main_path);
									$("input#image").val("data/" + folder + "/main." + oData.main_image);
								}
							}
							// other images
							var other_images = oData.other_images;
							if(other_images !== undefined && images == "on"){
								if(other_images.length > 0){
									var last_image_num = GetSingleProduct_play.lastImageNum;
									for(var oth = last_image_num; oth < (other_images.length + last_image_num); oth++){
										addImage();
										var other_path = GetSingleProduct_play.rootLocation+"/image/data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num];
										$("img#thumb"+oth).attr("src"  , other_path);
										$("img#preview"+oth).attr("src"  , other_path);
										$("input#image"+oth).val("data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num]);
									}
								}
							}
							$( "#dialog_play_import" ).dialog('close');
							
						}
						GetSingleProduct_play.semafor = 0;
					});
				}else{
					// TODO: cant create directory
					alert("Can`t create directory for images!");
					$( "#dialog_play_import" ).dialog('close');
				}
			});
		}else{
			alert("Can`t parse from this Url. Try another one.");
			$( "#dialog_play_import" ).dialog('close');
		}
	}
	GetSingleProduct_play.semafor = 0;
}


function get_folder_name_play(name){
	var out = name;
	var res = SPS_play_parse_explode(" " , name);
	if(res.length > 5){
		out = res[0] + ' ' + res[1] + ' ' + res[2] + ' ' + res[3] + ' ' + res[4] + ' ' + res[5];
	}
	out = out.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
	return out;
}



function SPS_play_parse_explode( delimiter, string ) {

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


function SPS_play_parse_str_replace(search, replace, subject) {
	return subject.split(search).join(replace);
}

function SPS_play_prepare_seokeys(name) {
	var res = SPS_play_parse_str_replace(" " , "-" , name);
	return res.replace(/[^a-z0-9-\s]/gi, '');
}

/************************** END OF PROTOTYPE BLOCK  *************************************/


/*
 * достаём название товара для имени папки с изображениями
 */
function parseName_play(url){
	var res = SPS_play_parse_explode("play." , url);
	//console.log(res);
	if(res.length > 1){
		res_first = SPS_play_parse_explode("/Product.html" , res[1]);
		//console.log(res_first);
		if(res_first.length > 1){
			res = res_first[0];
			res = SPS_play_parse_explode("/" , res);
			if(res.length > 1){
				res_final = res[res.length - 1];
				if(res_final == "-"){
					res_final = res[res.length - 2];
				}
				res = SPS_play_parse_str_replace("-" , " " , res_final);
				res = SPS_play_parse_str_replace("_" , " " , res_final);
				if(res.length > 6){
					return res;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			//ListingDetails.html
			res_first = SPS_play_parse_explode("/ListingDetails.html" , res[1]);
			//console.log(res_first);
			if(res_first.length > 1){
				res = res_first[0];
				res = SPS_play_parse_explode("/" , res);
				if(res.length > 1){
					res_final = res[res.length - 1];
					if(res_final == "-"){
						res_final = res[res.length - 2];
					}
					res = SPS_play_parse_str_replace("-" , " " , res_final);
					res = SPS_play_parse_str_replace("_" , " " , res_final);
					if(res.length > 6){
						return res;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	}else{
		return false;
	}
}
