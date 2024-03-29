$(document).ready(function(){
	$("#tab-general span.required").parent().append('<br />&nbsp;<a onclick="parse_sdirect($(this).parent().parent().parent().parent().parent().attr(\'id\'));" >Get product from SportsDirect.com</a>');
	
	$("#tab-data").append('<div id="dialog_sdirect_import" title="Copy product URL from SportsDirect.com">'+
							'</div>');
	var href = $("li#dashboard a").attr("href");
	GetSingleProduct.token = href.substr( href.indexOf("token=") + 6);
	GetSingleProduct.rootLocation = "";
});

function parse_sdirect(id){
	$( "#dialog_sdirect_import" ).html(GetSingleProduct.initialForm);
	$( "#dialog_sdirect_import" ).dialog({ width: 530 , buttons: [
	                                                           {
	                                                               text: "Get this product",
	                                                               click: function() { get_form_data_sdirect(id); }
	                                                           },{
	                                                        	   text: "Cancel",
	                                                               click: function() { if(GetSingleProduct.semafor < 1){ $(this).dialog("close");} }
	                                                           }]});
    
}

function get_form_data_sdirect(id){
	var id = id.substr(8);
	if(GetSingleProduct.semafor < 1){
		// open image upload dialog
		//image_upload('image', 'thumb');
		
		var url = $("#import_parse_url").val();
		//console.log("url:" + url);
		var title = $("#import_parse_title").attr("checked") == "checked"?"on":"off";
		//console.log(title);
		var spec = $("#import_parse_spec").attr("checked") == "checked"?"on":"off";
		//console.log(spec);
		var desc = $("#import_parse_desc").attr("checked") == "checked"?"on":"off";
		//console.log("desc:" + desc);
		var keys = $("#import_parse_keywords").attr("checked") == "checked"?"on":"off";
		//console.log("keys:" + keys);
		var images = $("#import_parse_images").attr("checked") == "checked"?"on":"off";
		//console.log("images:" + images);
		var product_name = parseName_sdirect(url);
		if(product_name !== false){
			GetSingleProduct.tempStore = $("#dialog_body").html();
			GetSingleProduct.semafor = 1;
			$("#dialog_body").html('<div style="width:100%;text-align:center;">Please, wait. This may take several minutes...</div>');
			// create  product images folder from here
			var folder =  get_folder_name_sdirect(product_name)+ ' ' + Math.floor(Math.random()* 10000);
			//console.log("folder:" + folder);
			
			$.post(GetSingleProduct.rootLocation+"/admin/index.php?route=common/filemanager/create&token="+GetSingleProduct.token , {"directory" : "" , "name" : folder} , function(data){
				eval("var oData = " + data + ";");
				if(oData.success !== undefined){
					$.post(GetSingleProduct.rootLocation+"/getSingleProduct/sdirect.php" , {"data[url]" : url , "data[images]" : images , "data[title]" : title , "data[desc]" :  desc , "data[spec]" : spec , "data[keys]" : keys , "token" : GetSingleProduct.token , "tempdir" : folder } , function(data){
						$( "#dialog_sdirect_import" ).dialog('close');
						//eval("var oData = " + data + ";");
						var oData = data;
						//console.log(oData);
						if(oData.err.length > 0){
							//alert(oData.err);
							$( "#dialog_sdirect_import" ).dialog('close');
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
							// main image
							var main_image = oData.main_image;
							if(main_image !== undefined){
								if(main_image.length > 0){
									var main_path = GetSingleProduct.rootLocation+"/image/data/" + folder + "/main." + oData.main_image;
									$("#thumb").attr("src" , main_path);
									$("#preview").attr("src" , main_path);
									$("input#image").val("data/" + folder + "/main." + oData.main_image);
								}
							}
							// other images
							var other_images = oData.other_images;
							if(other_images !== undefined && images == "on"){
								if(other_images.length > 0){
									for(var oth = 0; oth < other_images.length; oth++){
										addImage();
										var other_path = GetSingleProduct.rootLocation+"/image/data/" + folder + "/" + parseInt(oth + 1) + "." + oData.other_images[oth];
										$("#thumb"+oth).attr("src"  , other_path);
										$("#preview"+oth).attr("src"  , other_path);
										$("input#image"+oth).val("data/" + folder + "/" + parseInt(oth + 1) + "." + oData.other_images[oth]);
									}
								}
							}
							$( "#dialog_sdirect_import" ).dialog('close');
							
						}
						GetSingleProduct.semafor = 0;
					});
				}else{
					// TODO: cant create directory
					alert("Can`t create directory for images!");
					$( "#dialog_sdirect_import" ).dialog('close');
				}
			});
		}else{
			alert("Can`t parse from this Url. Try another one.");
			$( "#dialog_sdirect_import" ).dialog('close');
		}
	}
	GetSingleProduct.semafor = 0;
}


function parseName_sdirect(url){
	var res = parse_explode("sportsdirect" , url);
	if(res.length > 1){
		res = parse_explode("/" , res[1]);
		if(res.length > 1){
			res = parse_str_replace("-" , " " , res[1]);
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

function get_folder_name_sdirect(name){
	var res = parse_explode("?" , name);
	if(res.length > 1){
		res = res[0];
	}else{
		res = name;
	}
	res_n = parse_explode(" " , res);
	if(res_n.length < 8){
		return res;
	}else{
		return res_n[0] + ' ' + res_n[1] + ' ' + res_n[2] + ' ' + res_n[3] + ' ' + res_n[4] + ' ' + res_n[5]+ ' ' + res_n[6];
	}
}

