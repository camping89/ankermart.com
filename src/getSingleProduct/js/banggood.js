GetSingleProduct_banggood = {};
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
	GetSingleProduct_banggood.rootLocation = "";
	GetSingleProduct_banggood.adminLocation = "admin";
}else{
	GetSingleProduct_banggood.rootLocation = GetSingleProduct_assembly.rootLocation;
	GetSingleProduct_banggood.adminLocation = GetSingleProduct_assembly.adminLocation;
}
GetSingleProduct_banggood.imageFolderName = "";
/*  END OF CUSTOM SETTINGS */




/* SYSTEM SETTINGS */
GetSingleProduct_banggood.marketName = "Banggood";
GetSingleProduct_banggood.ParsingScriptName = "banggood";
GetSingleProduct_banggood.IDENTIFIER = "banggood";
GetSingleProduct_banggood.semafor = 0;
GetSingleProduct_banggood.tempStore = "";
GetSingleProduct_banggood.lastImageNum = 0;
GetSingleProduct_banggood.ocVersion = 5;
// unique for each donor market
GetSingleProduct_banggood.fields = {
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
GetSingleProduct_banggood.LANG_IDS = new Array();

GetSingleProduct_banggood.initialForm_banggood = '<div><p id="SPS_dialog_body_banggood">URL: <input type="text" id="banggood_import_parse_url" style="width:400px;" /><br /><br /><br />';
$.each( GetSingleProduct_banggood.fields, function( key, value ) {
	GetSingleProduct_banggood.initialForm_banggood += '<input type="checkbox" id="banggood_import_parse_' + key + '" checked="checked"/>&nbsp;&nbsp;&nbsp;';
	GetSingleProduct_banggood.initialForm_banggood += '<label for="banggood_import_parse_' + key + '">' + value + '</label><br /><br />';
	});
GetSingleProduct_banggood.initialForm_banggood += '<br /><input type="checkbox" id="banggood_import_allLanguages" checked="checked"/>&nbsp;&nbsp;&nbsp;'
	GetSingleProduct_banggood.initialForm_banggood += '<label for="banggood_import_allLanguages"><b>Insert grabbed data in ALL language tabs</b></label><br /><br />';
GetSingleProduct_banggood.initialForm_banggood += '</p></div>';



$(document).ready(function(){
	GetSingleProduct_banggood.tabGeneral = "tab-general";
	if($("#" + GetSingleProduct_banggood.tabGeneral).html() == null){
		GetSingleProduct_banggood.tabGeneral = "tab_general";
	}
	GetSingleProduct_banggood.tabData = "tab-data";
	if($("#" + GetSingleProduct_banggood.tabData).html() == null){
		GetSingleProduct_banggood.tabData = "tab_data";
	}
	$("#" + GetSingleProduct_banggood.tabGeneral + " span.required").parent().append('<br />&nbsp;<a onclick="parse_banggood($(this));" >Get product from ' + GetSingleProduct_banggood.marketName + '</a>');
	
	$("#" + GetSingleProduct_banggood.tabData).append('<div id="dialog_banggood_import" title="Copy product URL from ' + GetSingleProduct_banggood.marketName + '">'+
							'</div>');
	
	// get token
	var href = $("li#dashboard a").attr("href");
	GetSingleProduct_banggood.token = href.substr( href.indexOf("token=") + 6);
	
	
	// get oc version
	var ver = $("div#footer").html().indexOf("rsion 1.4");
	if(ver > 1){
		GetSingleProduct_banggood.ocVersion = 4;
	}
	

});


function parse_banggood(obj){
	var lang_id = get_current_lang_banggood(obj);
	$( "#dialog_banggood_import" ).html(GetSingleProduct_banggood.initialForm_banggood);
	if(GetSingleProduct_banggood.ocVersion > 4){
		$( "#dialog_banggood_import" ).dialog({ width: 530 ,
												buttons: [{
		                                                  	text: "Get this product",
		                                                  	click: function() { get_form_data_banggood(lang_id); }
		                                                  },{
		                                                	text: "Cancel",
		                                                    click: function() { if(GetSingleProduct_banggood.semafor < 1){ $(this).dialog("close");} }
		                                       }]});
		
	}else{
		$( "#dialog_banggood_import" ).dialog({ width: 530 ,
											buttons: {
		                                    	"Get this product": function() { get_form_data_banggood(lang_id); },
		                                        "Cancel" : function() { if(GetSingleProduct_banggood.semafor < 1){ $(this).dialog("close");} }
		                                    }
										});
	}
}


function get_current_lang_banggood(obj){
	var attrName = obj.parent().parent().parent().find("td input:first").attr("name");
	var res = SPS_banggood_parse_explode("description[" , attrName);
	if(res.length > 1){
		res = SPS_banggood_parse_explode("]" , res[1]);
		if(res.length > 1){
			return res[0];
		}
	}
	return 1;
}


function get_all_langsIDS_banggood(){
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


function get_form_data_banggood(lang_id){
	if(GetSingleProduct_banggood.semafor < 1){
		
		var url = $("#banggood_import_parse_url").val();
		//console.log("url:" + url);
		if(GetSingleProduct_banggood.ocVersion > 4){
			$.each( GetSingleProduct_banggood.fields, function( key, value ) {
				eval('window.' + key + ' = $("#banggood_import_parse_' + key + '").attr("checked") == "checked"?"on":"off";');
			});
		}else{
			$.each( GetSingleProduct_banggood.fields, function( key, value ) {
				eval('window.' + key + ' = $("#banggood_import_parse_' + key + '").attr("checked") == true?"on":"off";');
			});
		}
		
		// получаем настройку с формы
		var import_allLanguages_banggood = $("#banggood_import_allLanguages").attr("checked") == "checked"?1:0;
		GetSingleProduct_banggood.LANG_IDS = [];
		if(import_allLanguages_banggood > 0){
			GetSingleProduct_banggood.LANG_IDS = get_all_langsIDS_banggood();
		}else{
			GetSingleProduct_banggood.LANG_IDS.push(lang_id);
		}
		
		if(images == "on"){
			// COUNT IMAGES EXISTS 
			var img_exists = $("div.image img");
			$.each( img_exists, function( key, value ) {
				var id = this.id;
				if(id.length > 5){
					var num_id = id.substr(5);
					if($.isNumeric(num_id) == true){
						GetSingleProduct_banggood.lastImageNum = GetSingleProduct_banggood.lastImageNum + 1;
					}
					//$('#image-row'+num_id).remove();
				}
			});
		}
		
		
		
		var product_name = parseName_banggood(url);
		if(product_name !== false){
			GetSingleProduct_banggood.tempStore = $("#SPS_dialog_body_banggood").html();
			GetSingleProduct_banggood.semafor = 1;
			$("#SPS_dialog_body_banggood").html('<div style="width:100%;text-align:center;">Please, wait. This may take several minutes...</div>');
			
			// create  product images folder from here
			var folder = GetSingleProduct_banggood.imageFolderName + get_folder_name_banggood(product_name) + ' ' + Math.floor(Math.random()* 100000);
			var folderPath = GetSingleProduct_banggood.rootLocation+"/" + GetSingleProduct_banggood.adminLocation + "/index.php?route=common/filemanager/create&token="+GetSingleProduct_banggood.token;
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
					var parsingPath = GetSingleProduct_banggood.rootLocation + "/getSingleProduct/" + GetSingleProduct_banggood.ParsingScriptName + ".php";
					var parsingData = {
								"token" : GetSingleProduct_banggood.token ,
								"tempdir" : folder,
								"data[url]" : url,
								};
					$.each( GetSingleProduct_banggood.fields, function( key, value ) {
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
								$("#SPS_dialog_body_banggood").html(GetSingleProduct_banggood.tempStore);
						}else{
							// INSERT DATA INTO PRODUCT FORM
							$.each( GetSingleProduct_banggood.fields, function( key, value ) {
								eval("var datakey = oData." + key + ";"); 
								eval("var windowkey = window." + key + ";"); 
								if(datakey !== undefined && windowkey == "on"){
									switch(key){
										// TITLE
										case 'title':
											$.each( GetSingleProduct_banggood.LANG_IDS, function( key, val ) {
												$("input[name='product_description["+val+"][name]']").val(oData.title);
											});
											$("input[name='keyword']").val( SPS_banggood_prepare_seokeys(oData.title) );
											break;
										// META DESCRIPTION
										case 'desc':
											$.each( GetSingleProduct_banggood.LANG_IDS, function( key, val ) {
												$("textarea[name='product_description["+val+"][meta_description]']").html(oData.desc);
											});
											break;
										// META KEYWORDS
										case 'keywords':
											if(GetSingleProduct_banggood.ocVersion > 4){
												$.each( GetSingleProduct_banggood.LANG_IDS, function( key, val ) {
													$("textarea[name='product_description["+val+"][meta_keyword]']").html(oData.keywords);
												});
											}else{
												$.each( GetSingleProduct_banggood.LANG_IDS, function( key, val ) {
													$("textarea[name='product_description["+val+"][meta_keywords]']").html(oData.keywords);
												});
											}
											$.each( GetSingleProduct_banggood.LANG_IDS, function( key, val ) {
												$("input[name='product_description["+val+"][tag]']").val(oData.keywords);
											});
											if(GetSingleProduct_banggood.ocVersion > 4){
												$.each( GetSingleProduct_banggood.LANG_IDS, function( key, val ) {
													$("input[name='product_tag["+val+"]']").val(oData.keywords);
												});
											}else{
												$.each( GetSingleProduct_banggood.LANG_IDS, function( key, val ) {
													$("input[name='product_tags["+val+"]']").val(oData.keywords);
												});
											}
											break;
										// DESCRIPTION
										case 'spec':
											try { 
												$.each( GetSingleProduct_banggood.LANG_IDS, function( key, val ) {
													$("td#cke_contents_description"+val+" iframe").contents().find("body").html(oData.spec);
												});
												if(import_allLanguages_banggood > 0){
													$("iframe").contents().find("body").html(oData.spec);
												}else{
													try {
														var findID = 0;
														$("iframe").each(function(){ 
															var ifrTITLE = $(this).attr("title");
															var ifrID = SPS_banggood_parse_explode("description" , ifrTITLE);
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
									var main_path = GetSingleProduct_banggood.rootLocation+"/image/data/" + folder + "/main." + oData.main_image;
									$("img#thumb").attr("src" , main_path);
									$("img#preview").attr("src" , main_path);
									$("input#image").val("data/" + folder + "/main." + oData.main_image);
								}
							}
							// other images
							var other_images = oData.other_images;
							if(other_images !== undefined && images == "on"){
								if(other_images.length > 0){
									var last_image_num = GetSingleProduct_banggood.lastImageNum;
									for(var oth = last_image_num; oth < (other_images.length + last_image_num); oth++){
										addImage();
										var other_path = GetSingleProduct_banggood.rootLocation+"/image/data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num];
										$("img#thumb"+oth).attr("src"  , other_path);
										$("img#preview"+oth).attr("src"  , other_path);
										$("input#image"+oth).val("data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num]);
									}
								}
							}
							$( "#dialog_banggood_import" ).dialog('close');
							
						}
						GetSingleProduct_banggood.semafor = 0;
					});
				}else{
					// TODO: cant create directory
					alert("Can`t create directory for images!");
					$( "#dialog_banggood_import" ).dialog('close');
				}
			});
		}else{
			alert("Can`t parse from this Url. Try another one.");
			$( "#dialog_banggood_import" ).dialog('close');
		}
	}
	GetSingleProduct_banggood.semafor = 0;
}


function get_folder_name_banggood(name){
	var out = name;
	var res = SPS_banggood_parse_explode(" " , name);
	if(res.length > 5){
		out = res[0] + ' ' + res[1] + ' ' + res[2] + ' ' + res[3] + ' ' + res[4] + ' ' + res[5];
	}
	out = out.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
	return out;
}



function SPS_banggood_parse_explode( delimiter, string ) {

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


function SPS_banggood_parse_str_replace(search, replace, subject) {
	return subject.split(search).join(replace);
}

function SPS_banggood_prepare_seokeys(name) {
	var res = SPS_banggood_parse_str_replace(" " , "-" , name);
	return res.replace(/[^a-z0-9-\s]/gi, '');
}

/************************** END OF PROTOTYPE BLOCK  *************************************/



function parseName_banggood(url){
	var res = SPS_banggood_parse_explode("banggood." , url);
	//console.log(res);
	if(res.length > 1){
		res_first = SPS_banggood_parse_explode("/" , res[1]);
		//console.log(res_first);
		if(res_first.length > 1){
			res = res_first[1];
			res = SPS_banggood_parse_explode(".html" , res);
			if(res.length > 1){
				res = SPS_banggood_parse_str_replace("-" , " " , res[0]);
				res = SPS_banggood_parse_str_replace("_" , " " , res);
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
	}else{
		return false;
	}
}
