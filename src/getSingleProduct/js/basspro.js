GetSingleProduct_basspro = {};
GetSingleProduct_basspro.semafor = 0;
GetSingleProduct_basspro.tempStore = "";
GetSingleProduct_basspro.rootLocation = "";
GetSingleProduct_basspro.adminFolderName = "admin";
GetSingleProduct_basspro.imageFolderName = "from basspro - ";
GetSingleProduct_basspro.lastImageNum = 0;
GetSingleProduct_basspro.initialForm_basspro = '<div><p id="SPS_dialog_body_basspro">URL: <input type="text" id="basspro_import_parse_url" style="width:400px;" /><br /><br /><br />'+
										'<input type="checkbox" id="basspro_import_parse_title" checked="checked"/>&nbsp;&nbsp;&nbsp;'+
										'<label for="basspro_import_parse_title">Get Product Name (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="basspro_import_parse_spec" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="basspro_import_parse_spec">Get Product Specification (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="basspro_import_parse_desc" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="basspro_import_parse_desc">Get Meta Tag Description (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="basspro_import_parse_keywords" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="basspro_import_parse_keywords">Get Meta Tag Keywords (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="basspro_import_parse_price" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="basspro_import_parse_price">Get Price (will appear in the "Data" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="basspro_import_parse_images" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="basspro_import_parse_images">Get All Images (will appear in the "Image" tab)</label><br /><br /><br />'+
									
										
										''+
										'</p></div>';


$(document).ready(function(){
	$("#tab-general span.required").parent().append('<br />&nbsp;<a onclick="parse_basspro($(this).parent().parent().parent().parent().parent().attr(\'id\'));" >Get product from basspro.com</a>');
	
	$("#tab-data").append('<div id="dialog_basspro_import" title="Copy product URL from basspro.com">'+
							'</div>');
	var href = $("li#dashboard a").attr("href");
	GetSingleProduct_basspro.token = href.substr( href.indexOf("token=") + 6);

});


function parse_basspro(id){
	$( "#dialog_basspro_import" ).html(GetSingleProduct_basspro.initialForm_basspro);
	$( "#dialog_basspro_import" ).dialog({ width: 530 , buttons: [
	                                                           {
	                                                               text: "Get this product",
	                                                               click: function() { get_form_data_basspro(id); }
	                                                           },{
	                                                        	   text: "Cancel",
	                                                               click: function() { if(GetSingleProduct.semafor < 1){ $(this).dialog("close");} }
	                                                           }]});
    
}

function get_form_data_basspro(id){
	var id = id.substr(8);
	if(GetSingleProduct_basspro.semafor < 1){
		// open image upload dialog
		//image_upload('image', 'thumb');
		
		var url = $("#basspro_import_parse_url").val();
		//console.log("url:" + url);
		var title = $("#basspro_import_parse_title").attr("checked") == "checked"?"on":"off";
		//console.log(title);
		var spec = $("#basspro_import_parse_spec").attr("checked") == "checked"?"on":"off";
		//console.log(spec);
		var desc = $("#basspro_import_parse_desc").attr("checked") == "checked"?"on":"off";
		//console.log("desc:" + desc);
		var keys = $("#basspro_import_parse_keywords").attr("checked") == "checked"?"on":"off";
		//console.log("keys:" + keys);
		var price = $("#basspro_import_parse_price").attr("checked") == "checked"?"on":"off";
		//console.log("price:" + price);
		var images = $("#basspro_import_parse_images").attr("checked") == "checked"?"on":"off";
		//console.log("images:" + images);
		
		
		if(images == "on"){
			// COUNT IMAGES EXISTS 
			var img_exists = $("div.image img");
			$.each( img_exists, function( key, value ) {
				var id = this.id;
				if(id.length > 5){
					var num_id = id.substr(5);
					GetSingleProduct_basspro.lastImageNum = GetSingleProduct_basspro.lastImageNum + 1;
					//$('#image-row'+num_id).remove();
				}
			});
		}
		
		
		
		var product_name = parseName_basspro(url);
		if(product_name !== false){
			GetSingleProduct_basspro.tempStore = $("#SPS_dialog_body_basspro").html();
			GetSingleProduct_basspro.semafor = 1;
			$("#SPS_dialog_body_basspro").html('<div style="width:100%;text-align:center;">Please, wait. This may take several minutes...</div>');
			// create  product images folder from here
			var folder = GetSingleProduct_basspro.imageFolderName + get_folder_name_basspro(product_name)+ ' ' + Math.floor(Math.random()* 10000);;
			//console.log("folder:" + folder);
			
			$.post(GetSingleProduct_basspro.rootLocation + "/" + GetSingleProduct_basspro.adminFolderName + "/index.php?route=common/filemanager/create&token="+GetSingleProduct_basspro.token , {"directory" : "" , "name" : folder} , function(data){
				eval("var oData = " + data + ";");
				if(oData.success !== undefined){
					$.post(GetSingleProduct_basspro.rootLocation+"/getSingleProduct/basspro.php" , {"data[url]" : url , "data[images]" : images , "data[title]" : title , "data[desc]" :  desc , "data[spec]" : spec , "data[keys]" : keys , "data[price]" : price,  "token" : GetSingleProduct_basspro.token , "tempdir" : folder } , function(data){
						$( "#dialog_basspro_import" ).dialog('close');
						//eval("var oData = " + data + ";");
						var oData = data;
						//console.log(oData);
						if(oData.err.length > 0){
							//alert(oData.err);
							$( "#dialog_basspro_import" ).dialog('close');
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
							// SKU
							if(oData.sku !== undefined){
								$("input[name='sku']").val(oData.sku);
							}
							// PRICE
							if(oData.price !== undefined && price == "on"){
								$("input[name='price']").val(oData.price);
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
									var main_path = GetSingleProduct_basspro.rootLocation+"/image/data/" + folder + "/main." + oData.main_image;
									$("img#thumb").attr("src" , main_path);
									$("img#preview").attr("src" , main_path);
									$("input#image").val("data/" + folder + "/main." + oData.main_image);
								}
							}
							// other images
							var other_images = oData.other_images;
							if(other_images !== undefined && images == "on"){
								if(other_images.length > 0){
									var last_image_num = GetSingleProduct_basspro.lastImageNum;
									for(var oth = last_image_num; oth < (other_images.length + last_image_num); oth++){
										addImage();
										var other_path = GetSingleProduct_basspro.rootLocation+"/image/data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num];
										$("img#thumb"+oth).attr("src"  , other_path);
										$("img#preview"+oth).attr("src"  , other_path);
										$("input#image"+oth).val("data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num]);
									}
								}
							}
							$( "#dialog_basspro_import" ).dialog('close');
							
						}
						GetSingleProduct_basspro.semafor = 0;
					});
				}else{
					// TODO: cant create directory
					alert("Can`t create directory for images!");
					$( "#dialog_basspro_import" ).dialog('close');
				}
			});
		}else{
			alert("Can`t parse from this Url. Try another one.");
			$( "#dialog_basspro_import" ).dialog('close');
		}
	}
	GetSingleProduct_basspro.semafor = 0;
}


function parseName_basspro(url){	
	var res = SPS_basspro_parse_explode("basspro" , url);
	if(res.length > 1){
		res = SPS_basspro_parse_explode("/" , res[1]);
		if(res.length > 1){
			res = res[1];
			res = SPS_basspro_parse_str_replace("-" , " " , res);
			if(res.length > 5){
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

function get_folder_name_basspro(name){
	var res = SPS_basspro_parse_explode(" " , name);
	if(res.length < 8){
		return name
	}else{
		return res[0] + ' ' + res[1] + ' ' + res[2] + ' ' + res[3] + ' ' + res[4] + ' ' + res[5]+ ' ' + res[6];
	}
}




function SPS_basspro_parse_explode( delimiter, string ) {

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


function SPS_basspro_parse_str_replace(search, replace, subject) {
	return subject.split(search).join(replace);
}
