GetSingleProduct_colibri = {};
GetSingleProduct_colibri.semafor = 0;
GetSingleProduct_colibri.tempStore = "";
GetSingleProduct_colibri.rootLocation = "";
GetSingleProduct_colibri.adminFolderName = "admin";
GetSingleProduct_colibri.imageFolderName = "";
GetSingleProduct_colibri.lastImageNum = 0;
GetSingleProduct_colibri.initialForm_colibri = '<div><p id="SPS_dialog_body_colibri">URL: <input type="text" id="colibri_import_parse_url" style="width:400px;" /><br /><br /><br />'+
										'<input type="checkbox" id="colibri_import_parse_title" checked="checked"/>&nbsp;&nbsp;&nbsp;'+
										'<label for="colibri_import_parse_title">Get Product Name (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="colibri_import_parse_spec" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="colibri_import_parse_spec">Get Product Specification (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="colibri_import_parse_desc" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="colibri_import_parse_desc">Get Meta Tag Description (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="colibri_import_parse_keywords" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="colibri_import_parse_keywords">Get Meta Tag Keywords (will appear in the "General" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="colibri_import_parse_model" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="colibri_import_parse_model">Get Model (will appear in the "Data" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="colibri_import_parse_isbn" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="colibri_import_parse_isbn">Get ISBN (will appear in the "Data" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="colibri_import_parse_date" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="colibri_import_parse_date">Get Date (will appear in the "Data" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="colibri_import_parse_price" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="colibri_import_parse_price">Get Price (will appear in the "Data" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="colibri_import_parse_weight" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="colibri_import_parse_weight">Get Weight (will appear in the "Data" tab)</label><br /><br />'+
										
										'<input type="checkbox" id="colibri_import_parse_mpn" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="colibri_import_parse_mpn">Get MPN (will appear in the "Data" tab)</label><br /><br />'+
										
										
										'<input type="checkbox" id="colibri_import_parse_dims" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="colibri_import_parse_dims">Get Dimensions (will appear in the "Data" tab)</label><br /><br />'+
										
										
										'<input type="checkbox" id="colibri_import_parse_images" checked="checked" />&nbsp;&nbsp;&nbsp;'+
										'<label for="colibri_import_parse_images">Get All Images (will appear in the "Image" tab)</label><br /><br /><br />'+
									
										
										''+
										'</p></div>';


$(document).ready(function(){
	$("#tab-general span.required").parent().append('<br />&nbsp;<a onclick="parse_colibri($(this).parent().parent().parent().parent().parent().attr(\'id\'));" >Get product from colibri.bg</a>');
	
	$("#tab-data").append('<div id="dialog_colibri_import" title="Copy product URL from colibri.bg">'+
							'</div>');
	var href = $("li#dashboard a").attr("href");
	GetSingleProduct_colibri.token = href.substr( href.indexOf("token=") + 6);

});


function parse_colibri(id){
	$( "#dialog_colibri_import" ).html(GetSingleProduct_colibri.initialForm_colibri);
	$( "#dialog_colibri_import" ).dialog({ width: 530 , buttons: [
	                                                           {
	                                                               text: "Get this product",
	                                                               click: function() { get_form_data_colibri(id); }
	                                                           },{
	                                                        	   text: "Cancel",
	                                                               click: function() { if(GetSingleProduct.semafor < 1){ $(this).dialog("close");} }
	                                                           }]});
    
}

function get_form_data_colibri(id){
	var id = id.substr(8);
	if(GetSingleProduct_colibri.semafor < 1){
		// open image upload dialog
		//image_upload('image', 'thumb');
		
		var url = $("#colibri_import_parse_url").val();
		//console.log("url:" + url);
		var title = $("#colibri_import_parse_title").attr("checked") == "checked"?"on":"off";
		//console.log(title);
		var spec = $("#colibri_import_parse_spec").attr("checked") == "checked"?"on":"off";
		//console.log(spec);
		var desc = $("#colibri_import_parse_desc").attr("checked") == "checked"?"on":"off";
		//console.log("desc:" + desc);
		var keys = $("#colibri_import_parse_keywords").attr("checked") == "checked"?"on":"off";
		//console.log("keys:" + keys);
		var model = $("#colibri_import_parse_model").attr("checked") == "checked"?"on":"off";
		//console.log("model:" + model);
		var isbn = $("#colibri_import_parse_isbn").attr("checked") == "checked"?"on":"off";
		//console.log("isbn:" + isbn);
		var date = $("#colibri_import_parse_date").attr("checked") == "checked"?"on":"off";
		//console.log("date:" + date);
		var price = $("#colibri_import_parse_price").attr("checked") == "checked"?"on":"off";
		//console.log("price:" + price);
		var weight = $("#colibri_import_parse_weight").attr("checked") == "checked"?"on":"off";
		//console.log("weight:" + weight);
		var mpn = $("#colibri_import_parse_mpn").attr("checked") == "checked"?"on":"off";
		//console.log("mpn:" + mpn);
		var dims = $("#colibri_import_parse_dims").attr("checked") == "checked"?"on":"off";
		//console.log("dims:" + dims);
		
		var images = $("#colibri_import_parse_images").attr("checked") == "checked"?"on":"off";
		//console.log("images:" + images);
		
		
		if(images == "on"){
			// COUNT IMAGES EXISTS 
			var img_exists = $("div.image img");
			$.each( img_exists, function( key, value ) {
				var id = this.id;
				if(id.length > 5){
					var num_id = id.substr(5);
					GetSingleProduct_colibri.lastImageNum = GetSingleProduct_colibri.lastImageNum + 1;
					//$('#image-row'+num_id).remove();
				}
			});
		}
		
		
		
		var product_name = parseName_colibri(url);
		if(product_name !== false){
			GetSingleProduct_colibri.tempStore = $("#SPS_dialog_body_colibri").html();
			GetSingleProduct_colibri.semafor = 1;
			$("#SPS_dialog_body_colibri").html('<div style="width:100%;text-align:center;">Please, wait. This may take several minutes...</div>');
			// create  product images folder from here
			var folder = GetSingleProduct_colibri.imageFolderName + get_folder_name_colibri(product_name)+ ' ' + Math.floor(Math.random()* 10000);;
			//console.log("folder:" + folder);
			
			$.post(GetSingleProduct_colibri.rootLocation + "/" + GetSingleProduct_colibri.adminFolderName + "/index.php?route=common/filemanager/create&token="+GetSingleProduct_colibri.token , {"directory" : "" , "name" : folder} , function(data){
				eval("var oData = " + data + ";");
				if(oData.success !== undefined){
					$.post(GetSingleProduct_colibri.rootLocation+"/getSingleProduct/colibri.php" , {"data[url]" : url , "data[images]" : images , "data[title]" : title , "data[desc]" :  desc , "data[spec]" : spec , "data[keys]" : keys , "data[model]" : model, "data[isbn]" : isbn, "data[date]" : date, "data[price]" : price, "data[weight]" : weight, "data[mpn]" : mpn, "data[dims]" : dims, "token" : GetSingleProduct_colibri.token , "tempdir" : folder } , function(data){
						$( "#dialog_colibri_import" ).dialog('close');
						//eval("var oData = " + data + ";");
						var oData = data;
						//console.log(oData);
						if(oData.err.length > 0){
							//alert(oData.err);
							$( "#dialog_colibri_import" ).dialog('close');
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
							if(oData.model !== undefined && model == "on"){
								$("input[name='model']").val(oData.model);
							}
							// SKU
							if(oData.sku !== undefined){
								$("input[name='sku']").val(oData.sku);
							}
							// PRICE
							if(oData.price !== undefined && price == "on"){
								$("input[name='price']").val(oData.price);
							}
							// ISBN
							if(oData.isbn !== undefined && isbn == "on"){
								$("input[name='isbn']").val(oData.isbn);
							}
							// DATE
							if(oData.date !== undefined && date == "on"){
								$("input[name='date_available']").val(oData.date);
							}
							// WEIGHT
							if(oData.weight !== undefined && weight == "on"){
								$("input[name='weight']").val(oData.weight);
							}
							// MPN
							if(oData.mpn !== undefined && mpn == "on"){
								$("input[name='mpn']").val(oData.mpn);
							}
							// MPN
							if(oData.dimsx !== undefined && oData.dimsy !== undefined && dims == "on"){
								$("input[name='length']").val(oData.dimsx);
								$("input[name='width']").val(oData.dimsy);
							}
							// QUANTITY
							$("input[name='quantity']").val("200");
							
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
									var main_path = GetSingleProduct_colibri.rootLocation+"/image/data/" + folder + "/main." + oData.main_image;
									$("img#thumb").attr("src" , main_path);
									$("img#preview").attr("src" , main_path);
									$("input#image").val("data/" + folder + "/main." + oData.main_image);
								}
							}
							// other images
							var other_images = oData.other_images;
							if(other_images !== undefined && images == "on"){
								if(other_images.length > 0){
									var last_image_num = GetSingleProduct_colibri.lastImageNum;
									for(var oth = last_image_num; oth < (other_images.length + last_image_num); oth++){
										addImage();
										var other_path = GetSingleProduct_colibri.rootLocation+"/image/data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num];
										$("img#thumb"+oth).attr("src"  , other_path);
										$("img#preview"+oth).attr("src"  , other_path);
										$("input#image"+oth).val("data/" + folder + "/" + parseInt(oth - last_image_num  + 1) + "." + oData.other_images[oth - last_image_num]);
									}
								}
							}
							$( "#dialog_colibri_import" ).dialog('close');
							
						}
						GetSingleProduct_colibri.semafor = 0;
					});
				}else{
					// TODO: cant create directory
					alert("Can`t create directory for images!");
					$( "#dialog_colibri_import" ).dialog('close');
				}
			});
		}else{
			alert("Can`t parse from this Url. Try another one.");
			$( "#dialog_colibri_import" ).dialog('close');
		}
	}
	GetSingleProduct_colibri.semafor = 0;
}


function parseName_colibri(url){	
	var res = SPS_colibri_parse_explode("colibri" , url);
	if(res.length > 1){
		res = SPS_colibri_parse_explode("/" , res[1]);
		if(res.length > 3){
			res = res[3];
			res = SPS_colibri_parse_str_replace("-" , " " , res);
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

function get_folder_name_colibri(name){
	var res = SPS_colibri_parse_explode(" " , name);
	if(res.length < 8){
		return name
	}else{
		return res[0] + ' ' + res[1] + ' ' + res[2] + ' ' + res[3] + ' ' + res[4] + ' ' + res[5]+ ' ' + res[6];
	}
}




function SPS_colibri_parse_explode( delimiter, string ) {

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


function SPS_colibri_parse_str_replace(search, replace, subject) {
	return subject.split(search).join(replace);
}
