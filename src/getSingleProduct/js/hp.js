$(document).ready(function(){
	$("#tab-general span.required").parent().append('<br />&nbsp;<a onclick="parse_hp($(this).parent().parent().parent().parent().parent().attr(\'id\'));" >Get product from Shopping.hp.com</a>');
	
	$("#tab-data").append('<div id="dialog_hp_import" title="Copy product URL from Shopping.hp.com">'+
							'</div>');
	var href = $("li#dashboard a").attr("href");
	GetSingleProduct.token = href.substr( href.indexOf("token=") + 6);
	GetSingleProduct.rootLocation = "";
});

function parse_hp(id){
	var id = id.substr(8);
	if(id < 2 || id == "undefined"){
		id = 1;
	}
	$( "#dialog_hp_import" ).html(GetSingleProduct.initialForm);
	$( "#dialog_hp_import" ).dialog({ width: 530 , buttons: [
	                                                           {
	                                                               text: "Get this product",
	                                                               click: function() { get_form_data_hp(id); }
	                                                           },{
	                                                        	   text: "Cancel",
	                                                               click: function() { if(GetSingleProduct.semafor < 1){ $(this).dialog("close");} }
	                                                           }]});
    
}






function get_form_data_hp(id){
	if(GetSingleProduct.semafor < 1){
		
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
		var product_name = parseName_hp(url);
		if(product_name !== false){
			GetSingleProduct.tempStore = $("#dialog_body").html();
			GetSingleProduct.semafor = 1;
			$("#dialog_body").html('<div style="width:100%;text-align:center;">Please, wait. This may take several minutes...</div>');
			// create  product images folder from here
			var folder = 'from Shopping.hp.com - ' + get_folder_name_hp(product_name) + ' ' + Math.floor(Math.random()* 100000);
			
			$.post(GetSingleProduct.rootLocation+"/admin/index.php?route=common/filemanager/create&token="+GetSingleProduct.token , {"directory" : "" , "name" : folder} , function(data){
				eval("var oData = " + data + ";");
				if(oData.success !== undefined){
					$.post(GetSingleProduct.rootLocation+"/getSingleProduct/hp.php" , {"data[url]" : url , "data[images]" : images , "data[title]" : title , "data[desc]" :  desc , "data[spec]" : spec , "data[keys]" : keys , "token" : GetSingleProduct.token , "tempdir" : folder } , function(data){
						var oData = data;
						//console.log(oData);
						if(oData.err.length > 0){
							//alert(oData.err);
							$("#dialog_body").html(GetSingleProduct.tempStore);
						}else{
							// insert meta description
							if(oData.desc !== undefined){
								$("textarea[name='product_description["+id+"][meta_description]']").html(oData.desc);
							}
							// insert meta keys
							if(oData.keys !== undefined){
								$("textarea[name='product_description["+id+"][meta_keyword]']").html(oData.keys);
							}
							// insert product name
							if(oData.name !== undefined){
								$("input[name='product_description["+id+"][name]']").val(oData.name);
							}
							// insert product spec
							if(oData.spec !== undefined){
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
							if(other_images !== undefined){
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
							$( "#dialog_hp_import" ).dialog('close');
							
						}
						GetSingleProduct.semafor = 0;
					});
				}else{
					// TODO: cant create directory
					alert("Can`t create directory for images!");
					$( "#dialog_hp_import" ).dialog('close');
				}
			});
		}else{
			alert("Can`t parse from this Url. Try another one.");
			$( "#dialog_hp_import" ).dialog('close');
		}
	}
	GetSingleProduct.semafor = 0;
}


function parseName_hp(url){
	var res = parse_explode("shopping.hp." , url);
	if(res.length > 1){
		res_first = parse_explode("/" , res[1]);
		if(res_first.length > 7){
			res = res_first[7];
			res = parse_str_replace("-" , " " , res);
			res = parse_str_replace("_" , " " , res);
			res_t = parse_explode("?" , res);
			if(res_t.length > 1){
				res = res_t[1];
			}
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

function get_folder_name_hp(name){
	var res = parse_explode(" " , name);
	if(res.length < 6){
		return name
	}else{
		return res[0] + ' ' + res[1] + ' ' + res[2] + ' ' + res[3] + ' ' + res[4];
	}
}


