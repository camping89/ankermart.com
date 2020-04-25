GetSingleProduct_swansonvitamins = {};


/*  CUSTOM SETTINGS THERE */
GetSingleProduct_swansonvitamins.rootLocation = "";
GetSingleProduct_swansonvitamins.adminLocation = "admin";
GetSingleProduct_swansonvitamins.imageFolderName = "from swansonvitamins - ";
/*  END OF CUSTOM SETTINGS */




/* SYSTEM SETTINGS */
GetSingleProduct_swansonvitamins.marketName = "swansonvitamins";
GetSingleProduct_swansonvitamins.ParsingScriptName = "swansonvitamins";
GetSingleProduct_swansonvitamins.IDENTIFIER = "swansonvitamins";
GetSingleProduct_swansonvitamins.semafor = 0;
GetSingleProduct_swansonvitamins.tempStore = "";
GetSingleProduct_swansonvitamins.lastImageNum = 0;
GetSingleProduct_swansonvitamins.ocVersion = 5;
// unique for each donor market
GetSingleProduct_swansonvitamins.fields = {
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


GetSingleProduct_swansonvitamins.initialForm_swansonvitamins = '<div><p id="SPS_dialog_body_swansonvitamins">URL: <input type="text" id="swansonvitamins_import_parse_url" style="width:400px;" /><br /><br /><br />';
$.each( GetSingleProduct_swansonvitamins.fields, function( key, value ) {
	GetSingleProduct_swansonvitamins.initialForm_swansonvitamins += '<input type="checkbox" id="swansonvitamins_import_parse_' + key + '" checked="checked"/>&nbsp;&nbsp;&nbsp;';
	GetSingleProduct_swansonvitamins.initialForm_swansonvitamins += '<label for="swansonvitamins_import_parse_' + key + '">' + value + '</label><br /><br />';
	});
GetSingleProduct_swansonvitamins.initialForm_swansonvitamins += '</p></div>';



$(document).ready(function(){
	GetSingleProduct_swansonvitamins.tabGeneral = "tab-general";
	if($("#" + GetSingleProduct_swansonvitamins.tabGeneral).html() == null){
		GetSingleProduct_swansonvitamins.tabGeneral = "tab_general";
	}
	GetSingleProduct_swansonvitamins.tabData = "tab-data";
	if($("#" + GetSingleProduct_swansonvitamins.tabData).html() == null){
		GetSingleProduct_swansonvitamins.tabData = "tab_data";
	}
	$("#" + GetSingleProduct_swansonvitamins.tabGeneral + " span.required").parent().append('<br />&nbsp;<a onclick="parse_swansonvitamins($(this).parent().parent().parent().parent().parent().attr(\'id\'));" >Get product from ' + GetSingleProduct_swansonvitamins.marketName + '</a>');
	
	$("#" + GetSingleProduct_swansonvitamins.tabData).append('<div id="dialog_swansonvitamins_import" title="Copy product URL from ' + GetSingleProduct_swansonvitamins.marketName + '">'+
							'</div>');
	
	// get token
	var href = $("li#dashboard a").attr("href");
	GetSingleProduct_swansonvitamins.token = href.substr( href.indexOf("token=") + 6);
	
	
	// get oc version
	var ver = $("div#footer").html().indexOf("rsion 1.4");
	if(ver > 1){
		GetSingleProduct_swansonvitamins.ocVersion = 4;
	}
	

});


function parse_swansonvitamins(id){
	var id = id.substr(8);
	if(id < 2 || id == "undefined"){
		id = 1;
	}
	$( "#dialog_swansonvitamins_import" ).html(GetSingleProduct_swansonvitamins.initialForm_swansonvitamins);
	if(GetSingleProduct_swansonvitamins.ocVersion > 4){
		$( "#dialog_swansonvitamins_import" ).dialog({ width: 530 ,
												buttons: [{
		                                                  	text: "Get this product",
		                                                  	click: function() { get_form_data_swansonvitamins(id); }
		                                                  },{
		                                                	text: "Cancel",
		                                                    click: function() { if(GetSingleProduct_swansonvitamins.semafor < 1){ $(this).dialog("close");} }
		                                       }]});
		
	}else{
		$( "#dialog_swansonvitamins_import" ).dialog({ width: 530 ,
											buttons: {
		                                    	"Get this product": function() { get_form_data_swansonvitamins(id); },
		                                        "Cancel" : function() { if(GetSingleProduct_swansonvitamins.semafor < 1){ $(this).dialog("close");} }
		                                    }
										});
	}
}





function get_form_data_swansonvitamins(id){
	if(GetSingleProduct_swansonvitamins.semafor < 1){
		
		var url = $("#swansonvitamins_import_parse_url").val();
		//console.log("url:" + url);
		if(GetSingleProduct_swansonvitamins.ocVersion > 4){
			$.each( GetSingleProduct_swansonvitamins.fields, function( key, value ) {
				eval('window.' + key + ' = $("#swansonvitamins_import_parse_' + key + '").attr("checked") == "checked"?"on":"off";');
			});
		}else{
			$.each( GetSingleProduct_swansonvitamins.fields, function( key, value ) {
				eval('window.' + key + ' = $("#swansonvitamins_import_parse_' + key + '").attr("checked") == true?"on":"off";');
			});
		}
		
		if(images == "on"){
			// COUNT IMAGES EXISTS 
			var img_exists = $("div.image img");
			$.each( img_exists, function( key, value ) {
				var id = this.id;
				if(id.length > 5){
					var num_id = id.substr(5);
					GetSingleProduct_swansonvitamins.lastImageNum = GetSingleProduct_swansonvitamins.lastImageNum + 1;
					//$('#image-row'+num_id).remove();
				}
			});
		}
		
		
		
		var product_name = parseName_swansonvitamins(url);
		if(product_name !== false){
			GetSingleProduct_swansonvitamins.tempStore = $("#SPS_dialog_body_swansonvitamins").html();
			GetSingleProduct_swansonvitamins.semafor = 1;
			$("#SPS_dialog_body_swansonvitamins").html('<div style="width:100%;text-align:center;">Please, wait. This may take several minutes...</div>');
			
			// create  product images folder from here
			var folder = GetSingleProduct_swansonvitamins.imageFolderName + get_folder_name_swansonvitamins(product_name) + ' ' + Math.floor(Math.random()* 100000);
			var folderPath = GetSingleProduct_swansonvitamins.rootLocation+"/" + GetSingleProduct_swansonvitamins.adminLocation + "/index.php?route=common/filemanager/create&token="+GetSingleProduct_swansonvitamins.token;
			var folderData = {"directory" : "" , "name" : folder};
			
			// CREATE FOLDER QUERY
			$.post(folderPath , folderData , function(data){
				eval("var oData = " + data + ";");
				if(oData.success !== undefined){
					var parsingPath = GetSingleProduct_swansonvitamins.rootLocation + "/getSingleProduct/" + GetSingleProduct_swansonvitamins.ParsingScriptName + ".php";
					var parsingData = {
								"token" : GetSingleProduct_swansonvitamins.token ,
								"tempdir" : folder,
								"data[url]" : url,
								};
					$.each( GetSingleProduct_swansonvitamins.fields, function( key, value ) {
								eval('parsingData["data[" + key + "]"] = window.' + key + ';');
							});
					//console.log(parsingData);
					
					// SCRAPE DONOR MARKET QUERY
					$.post(parsingPath , parsingData , function(data){
						//eval("var oData = " + data + ";");
						var oData = data;
						if(oData.title.length > 0){
							// INSERT DATA INTO PRODUCT FORM
							$.each( GetSingleProduct_swansonvitamins.fields, function( key, value ) {
								eval("var datakey = oData." + key + ";"); 
								eval("var windowkey = window." + key + ";"); 
								if(datakey !== undefined && windowkey == "on"){
									switch(key){
										// TITLE
										case 'title':
											$("input[name='product_description["+id+"][name]']").val(oData.title);
											break;
										// META DESCRIPTION
										case 'desc':
											$("textarea[name='product_description["+id+"][meta_description]']").html(oData.desc);
											break;
										// META KEYWORDS
										case 'keywords':
											if(GetSingleProduct_swansonvitamins.ocVersion > 4){
												$("textarea[name='product_description["+id+"][meta_keyword]']").html(oData.keywords);
											}else{
												$("textarea[name='product_description["+id+"][meta_keywords]']").html(oData.keywords);
											}
											$("input[name='keyword']").val(oData.keywords);
											$("input[name='product_description["+id+"][tag]']").val(oData.keywords);
											if(GetSingleProduct_swansonvitamins.ocVersion > 4){
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
									var main_path = GetSingleProduct_swansonvitamins.rootLocation+"/image/data/" + folder + "/main." + oData.main_image;
									$("img#thumb").attr("src" , main_path);
									$("img#preview").attr("src" , main_path);
									$("input#image").val("data/" + folder + "/main." + oData.main_image);
								}
							}
							// other images
							var other_images = oData.other_images;
							if(other_images !== undefined && images == "on"){
								if(other_images.length > 0){
									var last_image_num = GetSingleProduct_swansonvitamins.lastImageNum;
									for(var oth = last_image_num; oth < (other_images.length + last_image_num); oth++){
										addImage();
										var other_path = GetSingleProduct_swansonvitamins.rootLocation+"/image/data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num];
										$("img#thumb"+oth).attr("src"  , other_path);
										$("img#preview"+oth).attr("src"  , other_path);
										$("input#image"+oth).val("data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num]);
									}
								}
							}
							$( "#dialog_swansonvitamins_import" ).dialog('close');
							
						}else{
							alert("Cannot grab this product. Contact the developer for help.");
							$("#SPS_dialog_body_swansonvitamins").html(GetSingleProduct_swansonvitamins.tempStore);
						}
						GetSingleProduct_swansonvitamins.semafor = 0;
					});
				}else{
					// TODO: cant create directory
					alert("Can`t create directory for images!");
					$( "#dialog_swansonvitamins_import" ).dialog('close');
				}
			});
		}else{
			alert("Can`t parse from this Url. Try another one.");
			$( "#dialog_swansonvitamins_import" ).dialog('close');
		}
	}
	GetSingleProduct_swansonvitamins.semafor = 0;
}


function get_folder_name_swansonvitamins(name){
	var out = name;
	var res = SPS_focal_parse_explode(" " , name);
	if(res.length > 5){
		out = res[0] + ' ' + res[1] + ' ' + res[2] + ' ' + res[3] + ' ' + res[4] + ' ' + res[5];
	}
	out = out.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
	return out;
}



function SPS_swansonvitamins_parse_explode( delimiter, string ) {

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


function SPS_swansonvitamins_parse_str_replace(search, replace, subject) {
	return subject.split(search).join(replace);
}

/************************** END OF PROTOTYPE BLOCK  *************************************/


/*
 * достаём название товара для имени папки с изображениями
 */
function parseName_swansonvitamins(url){
	var res = SPS_swansonvitamins_parse_explode("swansonvitamins.com/" , url);
	if(res.length > 1){
		// normal
		res = res[1];
		if(res.length > 2){
			res = SPS_swansonvitamins_parse_str_replace("-" , " " , res);
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

