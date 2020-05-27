GetSingleProduct_wdress = {};
GetSingleProduct_wdress.semafor = 0;
GetSingleProduct_wdress.tempStore = "";
GetSingleProduct_wdress.rootLocation = "";
GetSingleProduct_wdress.lastImageNum = 0;
GetSingleProduct_wdress.initialForm_wdress = '<div><p id="SPS_dialog_body_wdress">URL: <input type="text" id="wdress_import_parse_url" style="width:400px;" /><br /><br /><br />'+
										'<input type="checkbox" id="wdress_import_parse_title" checked="checked"/>&nbsp;&nbsp;&nbsp;'+
										'<label for="wdress_import_parse_title">Get Product Name (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="wdress_import_parse_spec" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="wdress_import_parse_spec">Get Product Specification (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="wdress_import_parse_price" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="wdress_import_parse_price">Get Product Price (will appear in the "Data" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="wdress_import_parse_desc" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="wdress_import_parse_desc">Get Meta Tag Description (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="wdress_import_parse_keywords" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="wdress_import_parse_keywords">Get Meta Tag Keywords (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="wdress_import_parse_images" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="wdress_import_parse_images">Get All Images (will appear in the "Image" tab)</label><br /><br /><br />'+
									
										
										''+
										'</p></div>';


$(document).ready(function(){
	$("#tab-general span.required").parent().append('<br />&nbsp;<a onclick="parse_wdress($(this).parent().parent().parent().parent().parent().attr(\'id\'));" >Get product from wDress.net</a>');
	
	$("#tab-data").append('<div id="dialog_wdress_import" title="Copy product URL from wholesale-dress.net">'+
							'</div>');
	var href = $("li#dashboard a").attr("href");
	GetSingleProduct_wdress.token = href.substr( href.indexOf("token=") + 6);

});


function parse_wdress(id){
	$( "#dialog_wdress_import" ).html(GetSingleProduct_wdress.initialForm_wdress);
	$( "#dialog_wdress_import" ).dialog({ width: 530 , buttons: [
	                                                           {
	                                                               text: "Get this product",
	                                                               click: function() { get_form_data_wdress(id); }
	                                                           },{
	                                                        	   text: "Cancel",
	                                                               click: function() { if(GetSingleProduct_wdress.semafor < 1){ $(this).dialog("close");} }
	                                                           }]});
    
}

function get_form_data_wdress(id){
	var id = id.substr(8);
	if(GetSingleProduct_wdress.semafor < 1){
		// open image upload dialog
		//image_upload('image', 'thumb');
		
		var url = $("#wdress_import_parse_url").val();
		//console.log("url:" + url);
		var title = $("#wdress_import_parse_title").attr("checked") == "checked"?"on":"off";
		//console.log(title);
		var spec = $("#wdress_import_parse_spec").attr("checked") == "checked"?"on":"off";
		//console.log(spec);
		var price = $("#wdress_import_parse_price").attr("checked") == "checked"?"on":"off";
		//console.log(price);
		var desc = $("#wdress_import_parse_desc").attr("checked") == "checked"?"on":"off";
		//console.log("desc:" + desc);
		var keys = $("#wdress_import_parse_keywords").attr("checked") == "checked"?"on":"off";
		//console.log("keys:" + keys);
		var images = $("#wdress_import_parse_images").attr("checked") == "checked"?"on":"off";
		//console.log("images:" + images);
		
		if(images == "on"){
			// COUNT IMAGES EXISTS 
			var img_exists = $("div.image img");
			$.each( img_exists, function( key, value ) {
				var id = this.id;
				if(id.length > 5){
					var num_id = id.substr(5);
					GetSingleProduct_wdress.lastImageNum = GetSingleProduct_wdress.lastImageNum + 1;
					//$('#image-row'+num_id).remove();
				}
			});
		}
		
		
		var product_name = parseName_wdress(url);
		if(product_name !== false){
			GetSingleProduct_wdress.tempStore = $("#SPS_dialog_body_wdress").html();
			GetSingleProduct_wdress.semafor = 1;
			$("#SPS_dialog_body_wdress").html('<div style="width:100%;text-align:center;">Please, wait. This may take several minutes...</div>');
			// create  product images folder from here
			var folder = 'from wdress - ' + get_folder_name_wdress(product_name) + ' ' + Math.floor(Math.random()* 100000);
			//console.log("folder:" + folder);
			
			$.post(GetSingleProduct_wdress.rootLocation+"/admin/index.php?route=common/filemanager/create&token="+GetSingleProduct_wdress.token , {"directory" : "" , "name" : folder} , function(data){
				eval("var oData = " + data + ";");
				if(oData.success !== undefined){
					$.post(GetSingleProduct_wdress.rootLocation+"/getSingleProduct/wdress.php" , {"data[url]" : url , "data[images]" : images , "data[title]" : title , "data[desc]" :  desc , "data[spec]" : spec , "data[price]" : price ,  "data[keys]" : keys , "token" : GetSingleProduct_wdress.token , "tempdir" : folder } , function(data){
						$( "#dialog_wdress_import" ).dialog('close');
						//eval("var oData = " + data + ";");
						var oData = data;
						//console.log(oData);
						if(oData.err.length > 0){
							//alert(oData.err);
							$( "#dialog_wdress_import" ).dialog('close');
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
							}
							// insert product name
							if(oData.name !== undefined && title == "on"){
								$("input[name='product_description["+id+"][name]']").val(oData.name);
							}
							// insert product spec
							if(oData.spec !== undefined && spec == "on"){
								$("td#cke_contents_description"+id+" iframe").contents().find("body").html(oData.spec);
								$("iframe").contents().find("body").html(oData.spec);
							}
							// PRICE
							if(oData.price !== undefined && price == "on"){
								$("input[name='price']").val(oData.price);
							}
							// main image
							var main_image = oData.main_image;
							if(main_image !== undefined){
								if(main_image.length > 0){
									var main_path = GetSingleProduct_wdress.rootLocation+"/image/data/" + folder + "/main." + oData.main_image;
									$("#thumb").attr("src" , main_path);
									$("#preview").attr("src" , main_path);
									$("input#image").val("data/" + folder + "/main." + oData.main_image);
								}
							}
							// other images
							var other_images = oData.other_images;
							if(other_images !== undefined && images == "on"){
								if(other_images.length > 0){
									var last_image_num = GetSingleProduct_wdress.lastImageNum;
									for(var oth = last_image_num; oth < (other_images.length + last_image_num); oth++){
										addImage();
										var other_path = GetSingleProduct_wdress.rootLocation+"/image/data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num];
										$("#thumb"+oth).attr("src"  , other_path);
										$("#preview"+oth).attr("src"  , other_path);
										$("input#image"+oth).val("data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num]);
									}
								}
							}
							$( "#dialog_wdress_import" ).dialog('close');
							
						}
						GetSingleProduct_wdress.semafor = 0;
					});
				}else{
					// TODO: cant create directory
					alert("Can`t create directory for images!");
					$( "#dialog_wdress_import" ).dialog('close');
				}
			});
		}else{
			alert("Can`t parse from this Url. Try another one.");
			$( "#dialog_wdress_import" ).dialog('close');
		}
	}
	GetSingleProduct_wdress.semafor = 0;
}


function parseName_wdress(url){
	var res = SPS_wdress_parse_explode("wholesale-dress.net/" , url);
	if(res.length > 1){
		res = SPS_wdress_parse_explode(".html" , res[1]);
		if(res.length > 1){
			res = res[0];
			return res;
			/*res = SPS_wdress_parse_explode("-" , res[1]);
			if(res.length > 3){
				
			}else{
				return false;
			}*/
		}else{
			return false;
		}
	}else{
		return false;
	}
}

function get_folder_name_wdress(name){
	var res = SPS_wdress_parse_explode(" " , name);
	if(res.length < 9){
		return name
	}else{
		return res[0] + ' ' + res[1] + ' ' + res[2] + ' ' + res[3] + ' ' + res[4] + ' ' + res[5] + ' ' + res[6] + ' ' + res[7];
	}
}





function SPS_wdress_parse_explode( delimiter, string ) {

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


function SPS_wdress_parse_str_replace(search, replace, subject) {
	return subject.split(search).join(replace);
}