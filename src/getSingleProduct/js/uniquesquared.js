GetSingleProduct_us = {};
GetSingleProduct_us.semafor = 0;
GetSingleProduct_us.tempStore = "";
GetSingleProduct_us.rootLocation = "";
GetSingleProduct_us.adminLocation = "admin";
GetSingleProduct_us.imageFolderName = "from  uniquesquared - ";
GetSingleProduct_us.lastImageNum = 0;
GetSingleProduct_us.initialForm_us = '<div><p id="SPS_dialog_body_us">URL: <input type="text" id="us_import_parse_url" style="width:400px;" /><br /><br /><br />'+
										'<input type="checkbox" id="us_import_parse_title" checked="checked"/>&nbsp;&nbsp;&nbsp;'+
										'<label for="us_import_parse_title">Get Product Name (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="us_import_parse_spec" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="us_import_parse_spec">Get Product Specification (will appear in the "General" tab)</label><br /><br />'+
											
										
											'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
											'<input type="checkbox" id="us_import_parse_spec_feat" />&nbsp;&nbsp;&nbsp;'+
											'<label for="us_import_parse_spec_feat">Get "Features" tab</label><br /><br />'+
											'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
											'<input type="checkbox" id="us_import_parse_spec_desc" />&nbsp;&nbsp;&nbsp;'+
											'<label for="us_import_parse_spec_desc">Get "Description" tab</label><br /><br />'+
											'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
											'<input type="checkbox" id="us_import_parse_spec_spec" />&nbsp;&nbsp;&nbsp;'+
											'<label for="us_import_parse_spec_spec">Get "Specification" tab</label><br /><br />'+
											'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
											'<input type="checkbox" id="us_import_parse_spec_medi" />&nbsp;&nbsp;&nbsp;'+
											'<label for="us_import_parse_spec_medi">Get "Media" tab</label><br /><br />'+
											'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
											'<input type="checkbox" id="us_import_parse_spec_sysr" />&nbsp;&nbsp;&nbsp;'+
											'<label for="us_import_parse_spec_sysr">Get "Sys. Req." tab</label><br /><br />'+
											'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
											'<input type="checkbox" id="us_import_parse_spec_warr" />&nbsp;&nbsp;&nbsp;'+
											'<label for="us_import_parse_spec_warr">Get "Warranty" tab</label><br /><br />'+
											
											'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
											'<input type="checkbox" id="us_import_parse_spec_pack" checked="checked" />&nbsp;&nbsp;&nbsp;'+
											'<label for="us_import_parse_spec_pack">Get "Package Contents" tab </label><br /><br />'+
											
										'<input type="checkbox" id="us_import_parse_desc" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="us_import_parse_desc">Get Meta Tag Description (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="us_import_parse_keywords" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="us_import_parse_keywords">Get Meta Tag Keywords (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="us_import_parse_images" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="us_import_parse_images">Get All Images (will appear in the "Image" tab)</label><br /><br /><br />'+
									'</p></div>';



$(document).ready(function(){
	$("#tab-general span.required").parent().append('<br />&nbsp;<a onclick="parse_us($(this).parent().parent().parent().parent().parent().attr(\'id\'));" >Get product from US.com</a>');
	
	$("#tab-data").append('<div id="dialog_us_import" title="Copy product URL from UniqueSquared.com">'+
							'</div>');
	var href = $("li#dashboard a").attr("href");
	GetSingleProduct_us.token = href.substr( href.indexOf("token=") + 6);

});

function parse_us(id){
	$( "#dialog_us_import" ).html(GetSingleProduct_us.initialForm_us);
	$( "#dialog_us_import" ).dialog({ width: 530 , buttons: [
	                                                           {
	                                                               text: "Get this product",
	                                                               click: function() { get_form_data_us(id); }
	                                                           },{
	                                                        	   text: "Cancel",
	                                                               click: function() { if(GetSingleProduct.semafor < 1){ $(this).dialog("close");} }
	                                                           }]});
    
}

function get_form_data_us(id){
	var id = id.substr(8);
	if(GetSingleProduct_us.semafor < 1){
		// open image upload dialog
		//image_upload('image', 'thumb');
		
		var url = $("#us_import_parse_url").val();
		//console.log("url:" + url);
		var title = $("#us_import_parse_title").attr("checked") == "checked"?"on":"off";
		//console.log(title);
		var spec = $("#us_import_parse_spec").attr("checked") == "checked"?"on":"off";
		var spec_feat = $("#us_import_parse_spec_feat").attr("checked") == "checked"?"on":"off";
		var spec_desc = $("#us_import_parse_spec_desc").attr("checked") == "checked"?"on":"off";
		var spec_spec = $("#us_import_parse_spec_spec").attr("checked") == "checked"?"on":"off";
		var spec_medi = $("#us_import_parse_spec_medi").attr("checked") == "checked"?"on":"off";
		var spec_sysr = $("#us_import_parse_spec_sysr").attr("checked") == "checked"?"on":"off";
		var spec_warr = $("#us_import_parse_spec_warr").attr("checked") == "checked"?"on":"off";
		var spec_pack = $("#us_import_parse_spec_pack").attr("checked") == "checked"?"on":"off";
		//console.log(spec);
		var desc = $("#us_import_parse_desc").attr("checked") == "checked"?"on":"off";
		//console.log("desc:" + desc);
		var keys = $("#us_import_parse_keywords").attr("checked") == "checked"?"on":"off";
		//console.log("keys:" + keys);
		var images = $("#us_import_parse_images").attr("checked") == "checked"?"on":"off";
		//console.log("images:" + images);
		var product_name = parseName_us(url);
		
		
		if(images == "on"){
			// COUNT IMAGES EXISTS 
			var img_exists = $("div.image img");
			$.each( img_exists, function( key, value ) {
				var id = this.id;
				if(id.length > 5){
					var num_id = id.substr(5);
					GetSingleProduct_us.lastImageNum = GetSingleProduct_us.lastImageNum + 1;
					//$('#image-row'+num_id).remove();
				}
			});
		}
		
		
		if(product_name !== false){
			GetSingleProduct_us.tempStore = $("#SPS_dialog_body_us").html();
			GetSingleProduct_us.semafor = 1;
			$("#SPS_dialog_body_us").html('<div style="width:100%;text-align:center;">Please, wait. This may take several minutes...</div>');
			// create  product images folder from here
			var folder = GetSingleProduct_us.imageFolderName + get_folder_name_us(product_name) + ' ' + Math.floor(Math.random()* 100000);
			//console.log("folder:" + folder);
			
			$.post(GetSingleProduct_us.rootLocation + "/" + GetSingleProduct_us.adminLocation + "/index.php?route=common/filemanager/create&token="+GetSingleProduct_us.token , {"directory" : "" , "name" : folder} , function(data){
				eval("var oData = " + data + ";");
				if(oData.success !== undefined){
					$.post("/getSingleProduct/uniquesquared.php" , {
																	"data[url]" : url ,
																	"data[images]" : images ,
																	"data[title]" : title ,
																	"data[desc]" :  desc ,
																	"data[spec]" : spec ,
																	"data[spec_feat]" : spec_feat ,
																	"data[spec_desc]" : spec_desc ,
																	"data[spec_spec]" : spec_spec ,
																	"data[spec_medi]" : spec_medi ,
																	"data[spec_sysr]" : spec_sysr ,
																	"data[spec_warr]" : spec_warr ,
																	"data[spec_pack]" : spec_pack ,
																	"data[keys]" : keys ,
																	"token" : GetSingleProduct.token ,
																	"tempdir" : folder
																} , function(data){
						$( "#dialog_us_import" ).dialog('close');
						//eval("var oData = " + data + ";");
						var oData = data;
						//console.log(oData);
						if(oData.err.length > 0){
							//alert(oData.err);
							$( "#dialog_us_import" ).dialog('close');
						}else{
							// insert meta description
							if(oData.desc !== undefined && desc == "on"){
								$("textarea[name='product_description["+id+"][meta_description]']").html(oData.desc);
							}
							// insert meta keys
							if(oData.keys !== undefined && keys == "on"){
								$("textarea[name='product_description["+id+"][meta_keyword]']").html(oData.keys);
								$("input[name='keyword']").val(oData.keys);
								$("input[name='product_description["+id+"][tag]']").val(oData.keys);
								$("input[name='product_tag["+id+"]']").val(oData.keys);
							}
							// insert product name
							if(oData.name !== undefined && title == "on"){
								$("input[name='product_description["+id+"][name]']").val(oData.name);
							}
							// insert product spec
							if(oData.spec !== undefined && spec == "on"){
								try { 
									$("td#cke_contents_description"+id+" iframe").contents().find("body").html(oData.spec);
									$("iframe").contents().find("body").html(oData.spec); 
								} 
								catch(err){}
							}
							// main image
							var main_image = oData.main_image;
							if(main_image !== undefined){
								if(main_image.length > 0){
									var main_path = GetSingleProduct_us.rootLocation+"/image/data/" + folder + "/main." + oData.main_image;
									$("img#thumb").attr("src" , main_path);
									$("img#preview").attr("src" , main_path);
									$("input#image").val("data/" + folder + "/main." + oData.main_image);
								}
							}
							// other images
							var other_images = oData.other_images;
							if(other_images !== undefined && images == "on"){
								if(other_images.length > 0){
									var last_image_num = GetSingleProduct_us.lastImageNum;
									for(var oth = last_image_num; oth < (other_images.length + last_image_num); oth++){
										addImage();
										var other_path = GetSingleProduct_us.rootLocation+"/image/data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num];
										$("img#thumb"+oth).attr("src"  , other_path);
										$("img#preview"+oth).attr("src"  , other_path);
										$("input#image"+oth).val("data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num]);
									}
								}
							}
							$( "#dialog_us_import" ).dialog('close');
							
						}
						GetSingleProduct_us.semafor = 0;
					});
				}else{
					// TODO: cant create directory
					alert("Can`t create directory for images!");
					$( "#dialog_us_import" ).dialog('close');
				}
			});
		}else{
			alert("Can`t parse from this Url. Try another one.");
			$( "#dialog_us_import" ).dialog('close');
		}
	}
	GetSingleProduct_us.semafor = 0;
}


function parseName_us(url){
	var res = SPS_us_parse_explode("uniquesquared" , url);
	if(res.length > 1){
		res = SPS_us_parse_explode("/" , res[1]);
		if(res.length > 1){
			res = res[1];
			res = SPS_us_parse_str_replace("_" , " " , res);
			res = SPS_us_parse_str_replace(".html" , "" , res);
			if(res.length > 3){
				return res;
			}else{
				return 'product ';
			}
		}else{
			return false;
		}
	}else{
		return false;
	}
}

function get_folder_name_us(name){
	var res = SPS_us_parse_explode(" " , name);
	if(res.length < 7){
		return name;
	}else{
		return res[0] + ' ' + res[1] + ' ' + res[2] + ' ' + res[3] + ' ' + res[4] + ' ' + res[5];
	}
}



function SPS_us_parse_explode( delimiter, string ) {

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


function SPS_us_parse_str_replace(search, replace, subject) {
	return subject.split(search).join(replace);
}
