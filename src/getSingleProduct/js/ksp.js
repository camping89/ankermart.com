GetSingleProduct_ksp = {};
GetSingleProduct_ksp.semafor = 0;
GetSingleProduct_ksp.tempStore = "";
GetSingleProduct_ksp.rootLocation = "";
GetSingleProduct_ksp.lastImageNum = 0;
GetSingleProduct_ksp.initialForm_ksp = '<div><p id="SPS_dialog_body_ksp">URL: <input type="text" id="ksp_import_parse_url" style="width:400px;" /><br /><br /><br />'+
										'<input type="checkbox" id="ksp_import_parse_title" checked="checked"/>&nbsp;&nbsp;&nbsp;'+
										'<label for="ksp_import_parse_title">Get Product Name (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="ksp_import_parse_spec" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="ksp_import_parse_spec">Get Product Specification (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="ksp_import_parse_price" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="ksp_import_parse_price">Get Product Price (will appear in the "Data" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="ksp_import_parse_desc" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="ksp_import_parse_desc">Get Meta Tag Description (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="ksp_import_parse_keywords" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="ksp_import_parse_keywords">Get Meta Tag Keywords (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="ksp_import_parse_images" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="ksp_import_parse_images">Get All Images (will appear in the "Image" tab)</label><br /><br /><br />'+
									
										
										''+
										'</p></div>';


$(document).ready(function(){
	$("#tab-general span.required").parent().append('<br />&nbsp;<a onclick="parse_ksp($(this).parent().parent().parent().parent().parent().attr(\'id\'));" >Get product from ksp.co.il</a>');
	
	$("#tab-data").append('<div id="dialog_ksp_import" title="Copy product URL from ksp.co.il">'+
							'</div>');
	var href = $("li#dashboard a").attr("href");
	GetSingleProduct_ksp.token = href.substr( href.indexOf("token=") + 6);

});


function parse_ksp(id){
	$( "#dialog_ksp_import" ).html(GetSingleProduct_ksp.initialForm_ksp);
	$( "#dialog_ksp_import" ).dialog({ width: 530 , buttons: [
	                                                           {
	                                                               text: "Get this product",
	                                                               click: function() { get_form_data_ksp(id); }
	                                                           },{
	                                                        	   text: "Cancel",
	                                                               click: function() { if(GetSingleProduct_ksp.semafor < 1){ $(this).dialog("close");} }
	                                                           }]});
    
}

function get_form_data_ksp(id){
	var id = id.substr(8);
	if(GetSingleProduct_ksp.semafor < 1){
		// open image upload dialog
		//image_upload('image', 'thumb');
		
		var url = $("#ksp_import_parse_url").val();
		//console.log("url:" + url);
		var title = $("#ksp_import_parse_title").attr("checked") == "checked"?"on":"off";
		//console.log(title);
		var spec = $("#ksp_import_parse_spec").attr("checked") == "checked"?"on":"off";
		//console.log(spec);
		var price = $("#ksp_import_parse_price").attr("checked") == "checked"?"on":"off";
		//console.log(price);
		var desc = $("#ksp_import_parse_desc").attr("checked") == "checked"?"on":"off";
		//console.log("desc:" + desc);
		var keys = $("#ksp_import_parse_keywords").attr("checked") == "checked"?"on":"off";
		//console.log("keys:" + keys);
		var images = $("#ksp_import_parse_images").attr("checked") == "checked"?"on":"off";
		//console.log("images:" + images);
		
		if(images == "on"){
			// COUNT IMAGES EXISTS 
			var img_exists = $("div.image img");
			$.each( img_exists, function( key, value ) {
				var id = this.id;
				if(id.length > 5){
					var num_id = id.substr(5);
					GetSingleProduct_ksp.lastImageNum = GetSingleProduct_ksp.lastImageNum + 1;
					//$('#image-row'+num_id).remove();
				}
			});
		}
		
		
		var product_name = parseName_ksp(url);
		if(product_name !== false){
			GetSingleProduct_ksp.tempStore = $("#SPS_dialog_body_ksp").html();
			GetSingleProduct_ksp.semafor = 1;
			$("#SPS_dialog_body_ksp").html('<div style="width:100%;text-align:center;">Please, wait. This may take several minutes...</div>');
			// create  product images folder from here
			var folder = 'from ksp - ' + get_folder_name_ksp(product_name) + ' ' + Math.floor(Math.random()* 100000);
			//console.log("folder:" + folder);
			
			$.post(GetSingleProduct_ksp.rootLocation+"/admin/index.php?route=common/filemanager/create&token="+GetSingleProduct_ksp.token , {"directory" : "" , "name" : folder} , function(data){
				eval("var oData = " + data + ";");
				if(oData.success !== undefined){
					$.post(GetSingleProduct_ksp.rootLocation+"/getSingleProduct/ksp.php" , {"data[url]" : url , "data[images]" : images , "data[title]" : title , "data[desc]" :  desc , "data[spec]" : spec , "data[price]" : price ,  "data[keys]" : keys , "token" : GetSingleProduct_ksp.token , "tempdir" : folder } , function(data){
						$( "#dialog_ksp_import" ).dialog('close');
						//eval("var oData = " + data + ";");
						var oData = data;
						//console.log(oData);
						if(oData.err.length > 0){
							//alert(oData.err);
							$( "#dialog_ksp_import" ).dialog('close');
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
									var main_path = GetSingleProduct_ksp.rootLocation+"/image/data/" + folder + "/main." + oData.main_image;
									$("#thumb").attr("src" , main_path);
									$("#preview").attr("src" , main_path);
									$("input#image").val("data/" + folder + "/main." + oData.main_image);
								}
							}
							// other images
							var other_images = oData.other_images;
							if(other_images !== undefined && images == "on"){
								if(other_images.length > 0){
									var last_image_num = GetSingleProduct_ksp.lastImageNum;
									for(var oth = last_image_num; oth < (other_images.length + last_image_num); oth++){
										addImage();
										var other_path = GetSingleProduct_ksp.rootLocation+"/image/data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num];
										$("#thumb"+oth).attr("src"  , other_path);
										$("#preview"+oth).attr("src"  , other_path);
										$("input#image"+oth).val("data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num]);
									}
								}
							}
							$( "#dialog_ksp_import" ).dialog('close');
							
						}
						GetSingleProduct_ksp.semafor = 0;
					});
				}else{
					// TODO: cant create directory
					alert("Can`t create directory for images!");
					$( "#dialog_ksp_import" ).dialog('close');
				}
			});
		}else{
			alert("Can`t parse from this Url. Try another one.");
			$( "#dialog_ksp_import" ).dialog('close');
		}
	}
	GetSingleProduct_ksp.semafor = 0;
}


function parseName_ksp(url){
	var res = SPS_ksp_parse_explode("ksp" , url);
	//console.log(res);
	if(res.length > 1){
		res = SPS_ksp_parse_explode("uin=" , res[1]);
		if(res.length > 1){
			res = res[1];
			if(res.length > 3){
				var res_t = SPS_ksp_parse_explode("&" , res);
				if(res_t.length > 1){
					return res_t[0];
				}else{
					return res;
				}
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

function get_folder_name_ksp(name){
	var res = SPS_ksp_parse_explode(" " , name);
	if(res.length < 6){
		return name
	}else{
		return res[0] + ' ' + res[1] + ' ' + res[2] + ' ' + res[3] + ' ' + res[4];
	}
}





function SPS_ksp_parse_explode( delimiter, string ) {

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


function SPS_ksp_parse_str_replace(search, replace, subject) {
	return subject.split(search).join(replace);
}