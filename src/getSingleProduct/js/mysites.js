GetSingleProduct_mysites = {};


/*  CUSTOM SETTINGS THERE */
GetSingleProduct_mysites.rootLocation = "";
GetSingleProduct_mysites.adminLocation = "admin";
GetSingleProduct_mysites.imageFolderName = "mystores - ";
/*  END OF CUSTOM SETTINGS */




/* SYSTEM SETTINGS */
GetSingleProduct_mysites.marketName = "MY STORES";
GetSingleProduct_mysites.ParsingScriptName = "mysites";
GetSingleProduct_mysites.IDENTIFIER = "mysites";
GetSingleProduct_mysites.semafor = 0;
GetSingleProduct_mysites.tempStore = "";
GetSingleProduct_mysites.lastImageNum = 0;
GetSingleProduct_mysites.ocVersion = 5;
// unique for each donor market
GetSingleProduct_mysites.fields = {
								"title" : 'Get Product Name (will appear in the "General" tab)',
								"spec" : 'Get Product Specification (will appear in the "General" tab)',
								"desc" : 'Get Meta Tag Description (will appear in the "General" tab)',
								"keywords" : 'Get Meta Tag Keywords (will appear in the "General" tab)',
								"price" : 'Get Price (will appear in the "Data" tab)',
								"model" : 'Get Model (will appear in the "Data" tab)',
								"images" : 'Get All Images (will appear in the "Image" tab)',
								};



/*
 *  при обновлении модулей этот блок копируется только с заменой IDENTIFIER
 */
/**************************  PROTOTYPE BLOCK  *************************************/


GetSingleProduct_mysites.initialForm_mysites = '<div><p id="SPS_dialog_body_mysites">URL: <input type="text" id="mysites_import_parse_url" style="width:400px;" /><br /><br /><br />';
$.each( GetSingleProduct_mysites.fields, function( key, value ) {
	GetSingleProduct_mysites.initialForm_mysites += '<input type="checkbox" id="mysites_import_parse_' + key + '" checked="checked"/>&nbsp;&nbsp;&nbsp;';
	GetSingleProduct_mysites.initialForm_mysites += '<label for="mysites_import_parse_' + key + '">' + value + '</label><br /><br />';
	});
GetSingleProduct_mysites.initialForm_mysites += '</p></div>';



$(document).ready(function(){
	GetSingleProduct_mysites.tabGeneral = "tab-general";
	if($("#" + GetSingleProduct_mysites.tabGeneral).html() == null){
		GetSingleProduct_mysites.tabGeneral = "tab_general";
	}
	GetSingleProduct_mysites.tabData = "tab-data";
	if($("#" + GetSingleProduct_mysites.tabData).html() == null){
		GetSingleProduct_mysites.tabData = "tab_data";
	}
	$("#" + GetSingleProduct_mysites.tabGeneral + " span.required").parent().append('<br />&nbsp;<a onclick="parse_mysites($(this).parent().parent().parent().parent().parent().attr(\'id\'));" >Get product from ' + GetSingleProduct_mysites.marketName + '</a>');
	
	$("#" + GetSingleProduct_mysites.tabData).append('<div id="dialog_mysites_import" title="Copy product URL from ' + GetSingleProduct_mysites.marketName + '">'+
							'</div>');
	
	// get token
	var href = $("li#dashboard a").attr("href");
	GetSingleProduct_mysites.token = href.substr( href.indexOf("token=") + 6);
	
	
	// get oc version
	var ver = $("div#footer").html().indexOf("rsion 1.4");
	if(ver > 1){
		GetSingleProduct_mysites.ocVersion = 4;
	}
	

});


function parse_mysites(id){
	var id = id.substr(8);
	if(id < 2 || id == "undefined"){
		id = 1;
	}
	$( "#dialog_mysites_import" ).html(GetSingleProduct_mysites.initialForm_mysites);
	if(GetSingleProduct_mysites.ocVersion > 4){
		$( "#dialog_mysites_import" ).dialog({ width: 530 ,
												buttons: [{
		                                                  	text: "Get this product",
		                                                  	click: function() { get_form_data_mysites(id); }
		                                                  },{
		                                                	text: "Cancel",
		                                                    click: function() { if(GetSingleProduct_mysites.semafor < 1){ $(this).dialog("close");} }
		                                       }]});
		
	}else{
		$( "#dialog_mysites_import" ).dialog({ width: 530 ,
											buttons: {
		                                    	"Get this product": function() { get_form_data_mysites(id); },
		                                        "Cancel" : function() { if(GetSingleProduct_mysites.semafor < 1){ $(this).dialog("close");} }
		                                    }
										});
	}
}





function get_form_data_mysites(id){
	if(GetSingleProduct_mysites.semafor < 1){
		
		var url = $("#mysites_import_parse_url").val();
		//console.log("url:" + url);
		if(GetSingleProduct_mysites.ocVersion > 4){
			$.each( GetSingleProduct_mysites.fields, function( key, value ) {
				eval('window.' + key + ' = $("#mysites_import_parse_' + key + '").attr("checked") == "checked"?"on":"off";');
			});
		}else{
			$.each( GetSingleProduct_mysites.fields, function( key, value ) {
				eval('window.' + key + ' = $("#mysites_import_parse_' + key + '").attr("checked") == true?"on":"off";');
			});
		}
		
		if(images == "on"){
			// COUNT IMAGES EXISTS 
			var img_exists = $("div.image img");
			$.each( img_exists, function( key, value ) {
				var id = this.id;
				if(id.length > 5){
					var num_id = id.substr(5);
					GetSingleProduct_mysites.lastImageNum = GetSingleProduct_mysites.lastImageNum + 1;
					//$('#image-row'+num_id).remove();
				}
			});
		}
		
		
		
		var product_name = parseName_mysites(url);
		if(product_name !== false){
			GetSingleProduct_mysites.tempStore = $("#SPS_dialog_body_mysites").html();
			GetSingleProduct_mysites.semafor = 1;
			$("#SPS_dialog_body_mysites").html('<div style="width:100%;text-align:center;">Please, wait. This may take several minutes...</div>');
			
			// create  product images folder from here
			var folder = GetSingleProduct_mysites.imageFolderName + get_folder_name_mysites(product_name) + ' ' + Math.floor(Math.random()* 100000);
			var folderPath = GetSingleProduct_mysites.rootLocation+"/" + GetSingleProduct_mysites.adminLocation + "/index.php?route=common/filemanager/create&token="+GetSingleProduct_mysites.token;
			var folderData = {"directory" : "" , "name" : folder};
			
			// CREATE FOLDER QUERY
			$.post(folderPath , folderData , function(data){
				eval("var oData = " + data + ";");
				if(oData.success !== undefined){
					var parsingPath = GetSingleProduct_mysites.rootLocation + "/getSingleProduct/" + GetSingleProduct_mysites.ParsingScriptName + ".php";
					var parsingData = {
								"token" : GetSingleProduct_mysites.token ,
								"tempdir" : folder,
								"data[url]" : url,
								};
					$.each( GetSingleProduct_mysites.fields, function( key, value ) {
								eval('parsingData["data[" + key + "]"] = window.' + key + ';');
							});
					//console.log(parsingData);
					
					// SCRAPE DONOR MARKET QUERY
					$.post(parsingPath , parsingData , function(data){
						//eval("var oData = " + data + ";");
						var oData = data;
						if(oData.title.length > 0){
							// INSERT DATA INTO PRODUCT FORM
							$.each( GetSingleProduct_mysites.fields, function( key, value ) {
								eval("var datakey = oData." + key + ";"); 
								eval("var windowkey = window." + key + ";"); 
								if(datakey !== undefined && windowkey == "on"){
									switch(key){
										// TITLE
										case 'title':
											$("input[name='product_description["+id+"][name]']").val(oData.title);
											$("input[name='keyword']").val( SPS_mysites_prepare_seokeys(oData.title) );
											break;
										// META DESCRIPTION
										case 'desc':
											$("textarea[name='product_description["+id+"][meta_description]']").html(oData.desc);
											break;
										// META KEYWORDS
										case 'keywords':
											if(GetSingleProduct_mysites.ocVersion > 4){
												$("textarea[name='product_description["+id+"][meta_keyword]']").html(oData.keywords);
											}else{
												$("textarea[name='product_description["+id+"][meta_keywords]']").html(oData.keywords);
											}
											$("input[name='product_description["+id+"][tag]']").val(oData.keywords);
											if(GetSingleProduct_mysites.ocVersion > 4){
												$("input[name='product_tag["+id+"]']").val(oData.keywords);
											}else{
												$("input[name='product_tags["+id+"]']").val(oData.keywords);
											}
											break;
										// DESCRIPTION
										case 'spec':
											try { 
												$("td#cke_contents_description"+id+" iframe").contents().find("body").html(oData.spec);
												$("iframe").contents().find("body").html(oData.spec); 
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
											$("input[name='upc']").val(oData.model);
											break;
										// SKU
										case 'sku':
											$("input[name='sku']").val(oData.sku);
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
									var main_path = GetSingleProduct_mysites.rootLocation+"/image/data/" + folder + "/main." + oData.main_image;
									$("img#thumb").attr("src" , main_path);
									$("img#preview").attr("src" , main_path);
									$("input#image").val("data/" + folder + "/main." + oData.main_image);
								}
							}
							// other images
							var other_images = oData.other_images;
							if(other_images !== undefined && images == "on"){
								if(other_images.length > 0){
									var last_image_num = GetSingleProduct_mysites.lastImageNum;
									for(var oth = last_image_num; oth < (other_images.length + last_image_num); oth++){
										addImage();
										var other_path = GetSingleProduct_mysites.rootLocation+"/image/data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num];
										$("img#thumb"+oth).attr("src"  , other_path);
										$("img#preview"+oth).attr("src"  , other_path);
										$("input#image"+oth).val("data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num]);
									}
								}
							}
							$( "#dialog_mysites_import" ).dialog('close');
							
						}else{
							alert("Cannot grab this product. Contact the developer for help.");
							$("#SPS_dialog_body_mysites").html(GetSingleProduct_mysites.tempStore);
						}
						GetSingleProduct_mysites.semafor = 0;
					});
				}else{
					// TODO: cant create directory
					alert("Can`t create directory for images!");
					$( "#dialog_mysites_import" ).dialog('close');
				}
			});
		}else{
			alert("Can`t parse from this Url. Try another one.");
			$( "#dialog_mysites_import" ).dialog('close');
		}
	}
	GetSingleProduct_mysites.semafor = 0;
}


function get_folder_name_mysites(name){
	var out = name;
	var res = SPS_mysites_parse_explode(" " , name);
	if(res.length > 5){
		out = res[0] + ' ' + res[1] + ' ' + res[2] + ' ' + res[3] + ' ' + res[4] + ' ' + res[5];
	}
	out = out.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
	return out;
}



function SPS_mysites_parse_explode( delimiter, string ) {

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


function SPS_mysites_parse_str_replace(search, replace, subject) {
	return subject.split(search).join(replace);
}


function SPS_mysites_prepare_seokeys(name) {
	var res = SPS_mysites_parse_str_replace(" " , "-" , name);
	return res.replace(/[^a-z0-9-\s]/gi, '');
}

/************************** END OF PROTOTYPE BLOCK  *************************************/


/*
 * достаём название товара для имени папки с изображениями
 */



function parseName_mysites(url){
	var res = SPS_mysites_parse_explode("universonotte" , url);
	if(res.length > 1){
		res = SPS_mysites_parse_explode("/" , res[1]);
		if(res.length > 1){
			res = res[res.length - 1];
			res = SPS_mysites_parse_str_replace("-" , " " , res);
			if(res.length > 3){
				return res;
			}else{
				return 'product ';
			}
		}else{
			return false;
		}
	}
	
	var res = SPS_mysites_parse_explode("universocasa" , url);
	if(res.length > 1){
		res = SPS_mysites_parse_explode("/" , res[1]);
		if(res.length > 1){
			res = res[res.length - 1];
			res = SPS_mysites_parse_str_replace("-" , " " , res);
			if(res.length > 3){
				return res;
			}else{
				return 'product ';
			}
		}else{
			return false;
		}
	}
	
	var res = SPS_mysites_parse_explode("universobagno" , url);
	if(res.length > 1){
		res = SPS_mysites_parse_explode("/" , res[1]);
		if(res.length > 1){
			res = res[res.length - 1];
			res = SPS_mysites_parse_str_replace("-" , " " , res);
			if(res.length > 3){
				return res;
			}else{
				return 'product ';
			}
		}else{
			return false;
		}
	}
	
	var res = SPS_mysites_parse_explode("cucinaworld" , url);
	if(res.length > 1){
		res = SPS_mysites_parse_explode("/" , res[1]);
		if(res.length > 1){
			res = res[res.length - 1];
			res = SPS_mysites_parse_str_replace("-" , " " , res);
			if(res.length > 3){
				return res;
			}else{
				return 'product ';
			}
		}else{
			return false;
		}
	}
	
	
	
	
	return false
}
