GetSingleProduct_bhp = {};
GetSingleProduct_bhp.semafor = 0;
GetSingleProduct_bhp.tempStore = "";
GetSingleProduct_bhp.rootLocation = "";
GetSingleProduct_bhp.adminLocation = "admin";
GetSingleProduct_bhp.imageFolderName = "from bhphotovideo - ";
GetSingleProduct_bhp.lastImageNum = 0;
GetSingleProduct_bhp.initialForm_bhp = '<div><p id="SPS_dialog_body_bhp">URL: <input type="text" id="bhp_import_parse_url" style="width:400px;" /><br /><br /><br />'+
										'<input type="checkbox" id="bhp_import_parse_title" checked="checked"/>&nbsp;&nbsp;&nbsp;'+
										'<label for="bhp_import_parse_title">Get Product Name (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="bhp_import_parse_spec" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="bhp_import_parse_spec">Get Product Specification (will appear in the "General" tab)</label><br /><br />'+
											
											
											'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
											'<input type="checkbox" id="bhp_import_parse_spec_over" />&nbsp;&nbsp;&nbsp;'+
											'<label for="bhp_import_parse_spec_over">Get Overview</label><br /><br />'+
										
											'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
											'<input type="checkbox" id="bhp_import_parse_spec_high" />&nbsp;&nbsp;&nbsp;'+
											'<label for="bhp_import_parse_spec_high">Get Highlights</label><br /><br />'+
											
											'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
											'<input type="checkbox" id="bhp_import_parse_spec_spec" />&nbsp;&nbsp;&nbsp;'+
											'<label for="bhp_import_parse_spec_spec">Get "Specification" tab</label><br /><br />'+
											
											'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
											'<input type="checkbox" id="bhp_import_parse_spec_what" checked="checked" />&nbsp;&nbsp;&nbsp;'+
											'<label for="bhp_import_parse_spec_what">Get "Whats in the box" tab </label><br /><br />'+
											
										'<input type="checkbox" id="bhp_import_parse_desc" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="bhp_import_parse_desc">Get Meta Tag Description (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="bhp_import_parse_keywords" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="bhp_import_parse_keywords">Get Meta Tag Keywords (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="bhp_import_parse_images" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="bhp_import_parse_images">Get All Images (will appear in the "Image" tab)</label><br /><br /><br />'+
									'</p></div>';



$(document).ready(function(){
	$("#tab-general span.required").parent().append('<br />&nbsp;<a onclick="parse_bhp($(this).parent().parent().parent().parent().parent().attr(\'id\'));" >Get product from Bhphotovideo.com</a>');
	
	$("#tab-data").append('<div id="dialog_bhp_import" title="Copy product URL from BHphotovideo.com">'+
							'</div>');
	var href = $("li#dashboard a").attr("href");
	GetSingleProduct_bhp.token = href.substr( href.indexOf("token=") + 6);

});

function parse_bhp(id){
	$( "#dialog_bhp_import" ).html(GetSingleProduct_bhp.initialForm_bhp);
	$( "#dialog_bhp_import" ).dialog({ width: 530 , buttons: [
	                                                           {
	                                                               text: "Get this product",
	                                                               click: function() { get_form_data_bhp(id); }
	                                                           },{
	                                                        	   text: "Cancel",
	                                                               click: function() { if(GetSingleProduct.semafor < 1){ $(this).dialog("close");} }
	                                                           }]});
    
}

function get_form_data_bhp(id){
	var id = id.substr(8);
	if(GetSingleProduct_bhp.semafor < 1){
		// open image upload dialog
		//image_upload('image', 'thumb');
		
		var url = $("#bhp_import_parse_url").val();
		//console.log("url:" + url);
		var title = $("#bhp_import_parse_title").attr("checked") == "checked"?"on":"off";
		//console.log(title);
		var spec = $("#bhp_import_parse_spec").attr("checked") == "checked"?"on":"off";
		var spec_over = $("#bhp_import_parse_spec_over").attr("checked") == "checked"?"on":"off";
		var spec_high = $("#bhp_import_parse_spec_high").attr("checked") == "checked"?"on":"off";
		var spec_spec = $("#bhp_import_parse_spec_spec").attr("checked") == "checked"?"on":"off";
		var spec_what = $("#bhp_import_parse_spec_what").attr("checked") == "checked"?"on":"off";
		//console.log(spec);
		var desc = $("#bhp_import_parse_desc").attr("checked") == "checked"?"on":"off";
		//console.log("desc:" + desc);
		var keys = $("#bhp_import_parse_keywords").attr("checked") == "checked"?"on":"off";
		//console.log("keys:" + keys);
		var images = $("#bhp_import_parse_images").attr("checked") == "checked"?"on":"off";
		//console.log("images:" + images);
		
		
		if(images == "on"){
			// COUNT IMAGES EXISTS 
			var img_exists = $("div.image img");
			$.each( img_exists, function( key, value ) {
				var id = this.id;
				if(id.length > 5){
					var num_id = id.substr(5);
					GetSingleProduct_bhp.lastImageNum = GetSingleProduct_bhp.lastImageNum + 1;
					//$('#image-row'+num_id).remove();
				}
			});
		}
		
		
		
		var product_name = parseName_bhp(url);
		if(product_name !== false){
			GetSingleProduct_bhp.tempStore = $("#SPS_dialog_body_bhp").html();
			GetSingleProduct_bhp.semafor = 1;
			$("#SPS_dialog_body_bhp").html('<div style="width:100%;text-align:center;">Please, wait. This may take several minutes...</div>');
			// create  product images folder from here
			var folder = GetSingleProduct_bhp.imageFolderName + get_folder_name_bhp(product_name) + ' ' + Math.floor(Math.random()* 100000);
			//console.log("folder:" + folder);
			
			$.post(GetSingleProduct_bhp.rootLocation + "/" + GetSingleProduct_bhp.adminLocation + "/index.php?route=common/filemanager/create&token="+GetSingleProduct.token , {"directory" : "" , "name" : folder} , function(data){
				eval("var oData = " + data + ";");
				if(oData.success !== undefined){
					$.post("/getSingleProduct/bhp.php" , {"data[url]" : url , "data[images]" : images , "data[title]" : title , "data[desc]" :  desc , "data[spec]" : spec , "data[spec_over]" : spec_over , "data[spec_high]" : spec_high , "data[spec_spec]" : spec_spec , "data[spec_what]" : spec_what , "data[keys]" : keys , "token" : GetSingleProduct.token , "tempdir" : folder } , function(data){
						$( "#dialog_bhp_import" ).dialog('close');
						//eval("var oData = " + data + ";");
						var oData = data;
						//console.log(oData);
						if(oData.err.length > 0){
							//alert(oData.err);
							$( "#dialog_bhp_import" ).dialog('close');
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
									var main_path = GetSingleProduct_bhp.rootLocation+"/image/data/" + folder + "/main." + oData.main_image;
									$("img#thumb").attr("src" , main_path);
									$("img#preview").attr("src" , main_path);
									$("input#image").val("data/" + folder + "/main." + oData.main_image);
								}
							}
							// other images
							var other_images = oData.other_images;
							if(other_images !== undefined && images == "on"){
								if(other_images.length > 0){
									var last_image_num = GetSingleProduct_bhp.lastImageNum;
									for(var oth = last_image_num; oth < (other_images.length + last_image_num); oth++){
										addImage();
										var other_path = GetSingleProduct_bhp.rootLocation+"/image/data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num];
										$("img#thumb"+oth).attr("src"  , other_path);
										$("img#preview"+oth).attr("src"  , other_path);
										$("input#image"+oth).val("data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num]);
									}
								}
							}
							$( "#dialog_bhp_import" ).dialog('close');
							
						}
						GetSingleProduct_bhp.semafor = 0;
					});
				}else{
					// TODO: cant create directory
					alert("Can`t create directory for images!");
					$( "#dialog_bhp_import" ).dialog('close');
				}
			});
		}else{
			alert("Can`t parse from this Url. Try another one.");
			$( "#dialog_bhp_import" ).dialog('close');
		}
	}
	GetSingleProduct_bhp.semafor = 0;
}


function parseName_bhp(url){
	var res = SPS_bhp_parse_explode("bhphotovideo" , url);
	if(res.length > 1){
		res = SPS_bhp_parse_explode("/" , res[1]);
		if(res.length > 4){
			res = res[4];
			res = SPS_bhp_parse_str_replace("_" , " " , res);
			res = SPS_bhp_parse_str_replace(".html" , "" , res);
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

function get_folder_name_bhp(name){
	var res = SPS_bhp_parse_explode(" " , name);
	if(res.length < 6){
		return name
	}else{
		return res[0] + ' ' + res[1] + ' ' + res[2] + ' ' + res[3] + ' ' + res[4];
	}
}



function SPS_bhp_parse_explode( delimiter, string ) {

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


function SPS_bhp_parse_str_replace(search, replace, subject) {
	return subject.split(search).join(replace);
}

