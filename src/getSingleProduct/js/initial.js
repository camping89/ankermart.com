GetSingleProduct = {};
GetSingleProduct.semafor = 0;
GetSingleProduct.tempStore = "";
GetSingleProduct.initialForm = '<div><p id="dialog_body">URL: <input type="text" id="import_parse_url" style="width:400px;" /><br /><br /><br />'+
									'<input type="checkbox" id="import_parse_title" checked="checked"/>&nbsp;&nbsp;&nbsp;'+
									'<label for="import_parse_title">Get Product Name (will appear in the "General" tab)</label><br /><br />'+
									
									'<input type="checkbox" id="import_parse_spec" checked="checked" />&nbsp;&nbsp;&nbsp;'+
									'<label for="import_parse_spec">Get Product Specification (will appear in the "General" tab)</label><br /><br />'+
									
								'<input type="checkbox" id="import_parse_desc" checked="checked" />&nbsp;&nbsp;&nbsp;'+
								'<label for="import_parse_desc">Get Meta Tag Description (will appear in the "General" tab)</label><br /><br />'+
								
								'<input type="checkbox" id="import_parse_keywords" checked="checked" />&nbsp;&nbsp;&nbsp;'+
								'<label for="import_parse_keywords">Get Meta Tag Keywords (will appear in the "General" tab)</label><br /><br />'+
								
								'<input type="checkbox" id="import_parse_images" checked="checked" />&nbsp;&nbsp;&nbsp;'+
								'<label for="import_parse_images">Get All Images (will appear in the "Image" tab)</label><br /><br /><br />'+
								
								''+
								'</p></div>';


function parse_explode( delimiter, string ) {

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


function parse_str_replace(search, replace, subject) {
	return subject.split(search).join(replace);
	}