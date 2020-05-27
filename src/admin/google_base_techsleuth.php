<?php 
//////////////////////////////////
// Author:  Joshua J. Gomes
// E-mail:  josh@techsleuth.com
// Web:  http://www.techsleuth.com
//////////////////////////////////
?>
<?php 
header('Content-Type:text/html; charset=UTF-8');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: Fri, 1 Jan 1999 05:00:00 GMT');
define('IS_MIJOSHOP', 0); //mijoshop: set to 1 if this is a mijoshop store, 0 if not
$original_error_reporting_value=ini_get('error_reporting');
error_reporting(0); //temporarily disable error reporting so warnings are not displayed
ini_set('max_execution_time', 18000); //3600=1 hour
ini_set('memory_limit', '2048M'); //2048M=maximum number of megabytes
ini_set('error_reporting',$original_error_reporting_value); //return error reporting to original value
?>
<?php
if(!IS_MIJOSHOP==1){
$config_file_path=getcwd().'/config.php';
}
else
{
$config_file_path=getcwd().'/config_techsleuth_mijoshop.php';
if (!file_exists($config_file_path))
{
if(defined('DIR_APPLICATION')){
$config_file_path=DIR_APPLICATION.'/config_techsleuth_mijoshop.php';
}
else
{
$config_file_path=getcwd().'/config.php';
echo 'For Mijoshop installations please:<br/>1.  Rename the alternate config file "/admin/config_techsleuth_mijoshop.php.bak" to "/admin/config_techsleuth_mijoshop.php"<br/>2.  Edit the file and supply the parameters for your store.';
}
}
}
error_reporting(-1);
require $config_file_path;
define('THIS_SERVER_URL', get_server_url()); /* server url */
define('THIS_CATALOG_URL', get_catalog_url()); /* catalog url */
define('THIS_IMAGE_URL', get_image_url()); /* image url */
define('THIS_ADMIN_IMAGE_URL', get_admin_image_url()); /* admin image url */
define("JG_9VCMQ", 'Electronics');
define("JG_ZXZFK", 'google.merchant.center.feed.attribute.assignments.xml');
define("JG_3Z28H", 'google.merchant.center.feed.custom.product.fields.xml');
$jg_kme4n='google.merchant.center.feed.data.feeds.xml';
$jg_5od28='google.merchant.center.feed.default.data.feed.format.xml';
$jg_y74wl='google.merchant.center.feed.taxonomy.language.xml';
define("JG_1EOBZ", 'google.merchant.center.feed.default.google.product.category.xml');
define("JG_CKTS5", 'google.merchant.center.feed.default.google.product.category.au.xml');
define("JG_SNFAC", 'google.merchant.center.feed.default.google.product.category.br.xml');
define("JG_JGZWR", 'google.merchant.center.feed.default.google.product.category.ca.xml');
define("JG_10B21", 'google.merchant.center.feed.default.google.product.category.ch.xml');
define("JG_DSZN2", 'google.merchant.center.feed.default.google.product.category.cn.xml');
define("JG_YIFIC", 'google.merchant.center.feed.default.google.product.category.cz.xml');
define("JG_J6HFQ", 'google.merchant.center.feed.default.google.product.category.de.xml');
define("JG_2KFA1", 'google.merchant.center.feed.default.google.product.category.es.xml');
define("JG_OVACZ", 'google.merchant.center.feed.default.google.product.category.fr.xml');
define("JG_835CW", 'google.merchant.center.feed.default.google.product.category.gb.xml');
define("JG_92IPM", 'google.merchant.center.feed.default.google.product.category.it.xml');
define("JG_110X9", 'google.merchant.center.feed.default.google.product.category.jp.xml');
define("JG_M4SF1", 'google.merchant.center.feed.default.google.product.category.nl.xml');
define("JG_31IVA", 'google.merchant.center.feed.default.google.product.category.us.xml');
define("JG_DLWFA", 'google.merchant.center.feed.default.availability.xml');
define("JG_LO8LF", 'google.merchant.center.feed.default.availability.zero.xml');
define("JG_9KTKK", 'google.merchant.center.feed.default.color.xml');
define("JG_E8HJW", 'google.merchant.center.feed.default.condition.xml');
define("JG_FJS32", 'google.merchant.center.feed.default.size.xml');
define("JG_3TKNC", 'google.merchant.center.feed.default.age.group.xml');
define("JG_814I3", 'google.merchant.center.feed.default.gender.xml');
define("JG_BSN5E", 'google.merchant.center.feed.default.link.suffix.xml');
define("JG_ISA10", 'google.merchant.center.feed.default.special.time.of.day.xml');
define("JG_UW2NQ", 'google.merchant.center.feed.default.special.time.zone.offset.xml');
define("JG_J10PP", 'google.merchant.center.feed.default.do.not.use.a.cached.image.for.product.image.link.xml');
define("JG_41T9S", 'google.merchant.center.feed.default.do.not.use.model.field.for.mpn.xml');
define("JG_DKRDK", 'google.merchant.center.feed.default.do.not.use.upc.field.for.gtin.xml');
define("JG_WQN9M", 'google.merchant.center.feed.default.do.not.use.product.id.field.for.id.xml');
define("JG_GVXFY", 'google.merchant.center.feed.default.do.not.use.manufacturer.field.for.brand.xml');
define("JG_GM95P", 'google.merchant.center.feed.default.lengthen.upc.field.xml');
$jg_n4vej='google.merchant.center.feed.default.convert.non.compliant.characters.xml';
$jg_10nm2='google.merchant.center.feed.default.use.sef.urls.for.data.feed.urls.list.xml';
$jg_510jc='google.merchant.center.feed.default.remove.html.tags.from.product.descriptions.xml';
$jg_ee103o='google.merchant.center.feed.default.shorten.product.descriptions.to.10000.characters.or.less.xml';
define("JG_JIRQW", 'google.merchant.center.feed.default.enclose.xml.data.feed.attributes.within.cdata.sections.xml');
define("JG_CJPFR", 'google.merchant.center.feed.default.use.weight.for.shipping.weight.xml');
$jg_2am32='google.merchant.center.feed.default.correct.lone.ampersands.in.product.names.and.descriptions.xml';
$jg_lyk62='google.merchant.center.feed.default.do.not.merge.custom.attribute.assignments.xml';
$jg_dxqm4='google.merchant.center.feed.automatic.sef.urls.disabled.stores.xml';
$jg_ynta5='google.merchant.center.feed.automatic.sef.urls.collapsed.stores.xml';
$jg_etlc6='google.product.categories.xml';
define("JG_7VC6V",'use_opencart_field_value');
define("JG_1Q42V",'skip_product');
define("JG_JNAMF",'14');
define("JG_9TVQEW", 'google_base_techsleuth');
define("JG_GQ9ZI",jg_cse4yo());
define("JG_8CYYC",32);
define("JG_WJBSF",28);
define("JG_92RJX",32);
jg_c6iht();
$jg_u2x1u="";
if (isset($_POST["jg_bfrx10"])){$jg_u2x1u=$_POST["jg_bfrx10"];}
if ($jg_u2x1u=="update_extension_status")
{
echo 'started update_extension_status...';
$jg_nmefe="";
if (isset($_POST["extension_status"])){$jg_nmefe=$_POST["extension_status"];}
$jg_nmefe=jg_m1t10($jg_nmefe);
save_extension_status_now($jg_nmefe);
echo 'done update_extension_status...';
}
if ($jg_u2x1u=="update_cache")
{
$jg_w4nnq="";
if (isset($_POST["cache_object_name"])){$jg_w4nnq=$_POST["cache_object_name"];}
$jg_w4nnq=jg_m1t10($jg_w4nnq);
jg_jx263($jg_w4nnq);
}
if ($jg_u2x1u=="save_select_product_for_editing")
{
$jg_3o9hb="";
if (isset($_POST["product_for_editing_to_save"])){$jg_3o9hb=$_POST["product_for_editing_to_save"];}
$jg_3o9hb=jg_m1t10($jg_3o9hb);
if(get_magic_quotes_gpc())
{
$jg_3o9hb=stripslashes($jg_3o9hb);
}
$jg_i1bmk=jg_dhr3l($jg_3o9hb);
if($jg_i1bmk=='')
{
}
else
{
echo $jg_i1bmk;
}
}
if ($jg_u2x1u=="send_update_view_product_link")
{
$jg_3o9hb="";
if (isset($_POST["product_id"])){$jg_3o9hb=$_POST["product_id"];}
$jg_3o9hb=jg_m1t10($jg_3o9hb);
$jg_d410tc="";
if (isset($_POST["language_code"])){$jg_d410tc=$_POST["language_code"];}
$jg_d410tc=jg_m1t10($jg_d410tc);
if(get_magic_quotes_gpc())
{
$jg_3o9hb=stripslashes($jg_3o9hb);
}
$jg_i1bmk=get_product_url($jg_3o9hb,$jg_d410tc);
if($jg_i1bmk=='')
{
}
else
{
echo $jg_i1bmk;
}
}
if ($jg_u2x1u=="add_custom_product_field")
{
$jg_zsbqn="";
if (isset($_POST["field_title_sent"])){$jg_zsbqn=$_POST["field_title_sent"];}
$jg_zsbqn=jg_m1t10($jg_zsbqn);
$jg_hax6g="";
if (isset($_POST["jg_byh10s"])){$jg_hax6g=$_POST["jg_byh10s"];}
$jg_hax6g=jg_m1t10($jg_hax6g);
$jg_o12oq="";
if (isset($_POST["data_type_sent"])){$jg_o12oq=$_POST["data_type_sent"];}
$jg_o12oq=jg_m1t10($jg_o12oq);
$jg_j681o="";
if (isset($_POST["data_length_sent"])){$jg_j681o=$_POST["data_length_sent"];}
$jg_j681o=jg_m1t10($jg_j681o);
$jg_es58i="";
if (isset($_POST["attribute_name_sent"])){$jg_es58i=$_POST["attribute_name_sent"];}
$jg_es58i=jg_m1t10($jg_es58i);
$jg_q2467="";
if (isset($_POST["attribute_prefix_sent"])){$jg_q2467=$_POST["attribute_prefix_sent"];}
$jg_q2467=jg_m1t10($jg_q2467);
$jg_hax6g=clean_up_column_name($jg_hax6g);
$jg_o12oq=clean_up_data_type($jg_o12oq);
$jg_j681o=jg_3ebyg($jg_j681o);
$jg_hax6g=mysql_real_escape_string($jg_hax6g);
if(get_magic_quotes_gpc())
{
$jg_zsbqn=stripslashes($jg_zsbqn);
$jg_hax6g=stripslashes($jg_hax6g);
$jg_o12oq=stripslashes($jg_o12oq);
$jg_j681o=stripslashes($jg_j681o);
$jg_es58i=stripslashes($jg_es58i);
$jg_q2467=stripslashes($jg_q2467);
}
$jg_opf82=jg_2hx9u($jg_zsbqn,$jg_hax6g,$jg_o12oq,$jg_j681o,$jg_es58i,$jg_q2467);
if($jg_opf82=='')
{
jg_3jx10($jg_zsbqn,$jg_hax6g,$jg_es58i,$jg_q2467);
}
else
{
echo $jg_opf82;
}
}
function clean_up_data_type($jg_46tp9)
{
$jg_46tp9=mysql_real_escape_string($jg_46tp9);
$jg_46tp9=preg_replace('/[^a-zA-Z0-9_%\[\]\.\(\)%&-]/s', '', $jg_46tp9);
$jg_46tp9=strtoupper($jg_46tp9);
switch($jg_46tp9)
{
case ($jg_46tp9=='INT' ||
$jg_46tp9=='VARCHAR' ||
$jg_46tp9=='TEXT' ||
$jg_46tp9=='TINYINT'):
break;
default:
$jg_46tp9='VARCHAR';
break;
}
return $jg_46tp9;
}
function jg_3ebyg($jg_46tp9)
{
$jg_46tp9=mysql_real_escape_string($jg_46tp9);
$jg_46tp9=preg_replace('/[^0-9]/s', '', $jg_46tp9);
$jg_f10bn=intval($jg_46tp9);
if($jg_f10bn>65535)
{
$jg_46tp9='65535';
}
return $jg_46tp9;
}
function clean_up_column_name($jg_46tp9)
{
$jg_46tp9=mysql_real_escape_string($jg_46tp9);
$jg_46tp9=preg_replace('/[^a-zA-Z0-9_%\[\]\.\(\)%&-]/s', '', $jg_46tp9);
return $jg_46tp9;
}
if ($jg_u2x1u=="jg_l10w25")
{
echo jg_baxsj(JG_1EOBZ,'default_google_product_category',JG_9VCMQ);
}
if ($jg_u2x1u=="save_default_google_product_category")
{
$jg_5dcum="";
if (isset($_POST["jg_dw98hq"])){$jg_5dcum=$_POST["jg_dw98hq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
if (isset($_POST["id_of_element_to_populate"])){$this_default_setting_name=$_POST["id_of_element_to_populate"];}
$this_default_setting_name=jg_m1t10($this_default_setting_name);
$this_default_setting_name=jg_ecfq2($this_default_setting_name);
jg_jkr8b(JG_1EOBZ,$this_default_setting_name,$jg_5dcum);
}
if ($jg_u2x1u=="save_default_google_product_category_au")
{
$jg_5dcum="";
if (isset($_POST["jg_dw98hq"])){$jg_5dcum=$_POST["jg_dw98hq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_CKTS5,'default_google_product_category_au',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_google_product_category_br")
{
$jg_5dcum="";
if (isset($_POST["jg_dw98hq"])){$jg_5dcum=$_POST["jg_dw98hq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_SNFAC,'default_google_product_category_br',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_google_product_category_ca")
{
$jg_5dcum="";
if (isset($_POST["jg_dw98hq"])){$jg_5dcum=$_POST["jg_dw98hq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_JGZWR,'default_google_product_category_ca',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_google_product_category_ch")
{
$jg_5dcum="";
if (isset($_POST["jg_dw98hq"])){$jg_5dcum=$_POST["jg_dw98hq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_10B21,'default_google_product_category_ch',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_google_product_category_cn")
{
$jg_5dcum="";
if (isset($_POST["jg_dw98hq"])){$jg_5dcum=$_POST["jg_dw98hq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_DSZN2,'default_google_product_category_cn',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_google_product_category_cz")
{
$jg_5dcum="";
if (isset($_POST["jg_dw98hq"])){$jg_5dcum=$_POST["jg_dw98hq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_YIFIC,'default_google_product_category_cz',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_google_product_category_de")
{
$jg_5dcum="";
if (isset($_POST["jg_dw98hq"])){$jg_5dcum=$_POST["jg_dw98hq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_J6HFQ,'default_google_product_category_de',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_google_product_category_es")
{
$jg_5dcum="";
if (isset($_POST["jg_dw98hq"])){$jg_5dcum=$_POST["jg_dw98hq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_2KFA1,'default_google_product_category_es',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_google_product_category_fr")
{
$jg_5dcum="";
if (isset($_POST["jg_dw98hq"])){$jg_5dcum=$_POST["jg_dw98hq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_OVACZ,'default_google_product_category_fr',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_google_product_category_gb")
{
$jg_5dcum="";
if (isset($_POST["jg_dw98hq"])){$jg_5dcum=$_POST["jg_dw98hq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_835CW,'default_google_product_category_gb',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_google_product_category_it")
{
$jg_5dcum="";
if (isset($_POST["jg_dw98hq"])){$jg_5dcum=$_POST["jg_dw98hq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_92IPM,'default_google_product_category_it',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_google_product_category_jp")
{
$jg_5dcum="";
if (isset($_POST["jg_dw98hq"])){$jg_5dcum=$_POST["jg_dw98hq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_110X9,'default_google_product_category_jp',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_google_product_category_nl")
{
$jg_5dcum="";
if (isset($_POST["jg_dw98hq"])){$jg_5dcum=$_POST["jg_dw98hq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_M4SF1,'default_google_product_category_nl',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_google_product_category_us")
{
$jg_5dcum="";
if (isset($_POST["jg_dw98hq"])){$jg_5dcum=$_POST["jg_dw98hq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_31IVA,'default_google_product_category_us',$jg_5dcum);
}
if ($jg_u2x1u=="load_default_do_not_use_a_cached_image_for_product_image_link")
{
echo jg_baxsj(JG_J10PP,'default_do_not_use_a_cached_image_for_product_image_link','false');
}
if ($jg_u2x1u=="save_default_do_not_use_a_cached_image_for_product_image_link")
{
$jg_5dcum="";
if (isset($_POST["do_not_use"])){$jg_5dcum=$_POST["do_not_use"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_J10PP,'default_do_not_use_a_cached_image_for_product_image_link',$jg_5dcum);
}
if ($jg_u2x1u=="load_default_do_not_use_model_field_for_mpn")
{
echo jg_baxsj(JG_41T9S,'default_do_not_use_model_field_for_mpn','false');
}
if ($jg_u2x1u=="save_default_do_not_use_model_field_for_mpn")
{
$jg_5dcum="";
if (isset($_POST["do_not_use"])){$jg_5dcum=$_POST["do_not_use"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_41T9S,'default_do_not_use_model_field_for_mpn',$jg_5dcum);
}
if ($jg_u2x1u=="load_default_do_not_use_product_id_field_for_id")
{
echo jg_baxsj(JG_WQN9M,'default_do_not_use_product_id_field_for_id','false');
}
if ($jg_u2x1u=="save_default_do_not_use_product_id_field_for_id")
{
$jg_5dcum="";
if (isset($_POST["do_not_use"])){$jg_5dcum=$_POST["do_not_use"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_WQN9M,'default_do_not_use_product_id_field_for_id',$jg_5dcum);
}
if ($jg_u2x1u=="load_default_do_not_use_manufacturer_field_for_brand")
{
echo jg_baxsj(JG_GVXFY,'default_do_not_use_manufacturer_field_for_brand','false');
}
if ($jg_u2x1u=="load_default_lengthen_upc_field")
{
echo jg_dngng('upc');
}
if ($jg_u2x1u=="save_default_do_not_use_manufacturer_field_for_brand")
{
$jg_5dcum="";
if (isset($_POST["do_not_use"])){$jg_5dcum=$_POST["do_not_use"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_GVXFY,'default_do_not_use_manufacturer_field_for_brand',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_lengthen_upc_field")
{
$jg_dgjit="";
if (isset($_POST["newsize"])){$jg_dgjit=$_POST["newsize"];}
$jg_dgjit=jg_m1t10($jg_dgjit);
$jg_dgjit=jg_ecfq2($jg_dgjit);
$jg_310rn=jg_3ebyg($jg_dgjit);
$jg_310rn=intval($jg_310rn);
jg_vkcar('upc',$jg_310rn);
}
if ($jg_u2x1u=="save_this_field_length")
{
$this_value_columnname="";
if (isset($_POST["columnname"])){$this_value_columnname=$_POST["columnname"];}
$this_value_columnname=jg_m1t10($this_value_columnname);
$this_value_columnname=jg_ecfq2($this_value_columnname);
$jg_dgjit="";
if (isset($_POST["newsize"])){$jg_dgjit=$_POST["newsize"];}
$jg_dgjit=jg_m1t10($jg_dgjit);
$jg_dgjit=jg_ecfq2($jg_dgjit);
$jg_310rn=intval($jg_dgjit);
jg_vkcar($this_value_columnname,$jg_310rn);
}
if ($jg_u2x1u=="load_default_do_not_use_upc_field_for_gtin")
{
echo jg_baxsj(JG_DKRDK,'default_do_not_use_upc_field_for_gtin','false');
}
if ($jg_u2x1u=="save_default_do_not_use_upc_field_for_gtin")
{
$jg_5dcum="";
if (isset($_POST["do_not_use"])){$jg_5dcum=$_POST["do_not_use"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_DKRDK,'default_do_not_use_upc_field_for_gtin',$jg_5dcum);
}
if ($jg_u2x1u=="jg_10zfhu")
{
$jg_5dcum="";
if (isset($_POST["jg_zh1fn5"])){$jg_5dcum=$_POST["jg_zh1fn5"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_DLWFA,'default_availability',$jg_5dcum);
}
if ($jg_u2x1u=="jg_bwl1bw")
{
$jg_5dcum="";
if (isset($_POST["jg_5u651g"])){$jg_5dcum=$_POST["jg_5u651g"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_LO8LF,'default_availability_zero',$jg_5dcum);
}
if ($jg_u2x1u=="jg_gqoqsw")
{
$jg_5dcum="";
if (isset($_POST["jg_6vb9a6"])){$jg_5dcum=$_POST["jg_6vb9a6"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_9KTKK,'default_color',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_condition")
{
$jg_5dcum="";
if (isset($_POST["default_condition_to_save"])){$jg_5dcum=$_POST["default_condition_to_save"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_E8HJW,'default_condition',$jg_5dcum);
}
if ($jg_u2x1u=="jg_7s8hrh")
{
$jg_5dcum="";
if (isset($_POST["jg_oj1gr1"])){$jg_5dcum=$_POST["jg_oj1gr1"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_FJS32,'default_size',$jg_5dcum);
}
if ($jg_u2x1u=="jg_nxxcp6")
{
$jg_5dcum="";
if (isset($_POST["jg_5w10aq"])){$jg_5dcum=$_POST["jg_5w10aq"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_3TKNC,'default_age_group',$jg_5dcum);
}
if ($jg_u2x1u=="jg_9dxpfv")
{
$jg_5dcum="";
if (isset($_POST["jg_dlne43"])){$jg_5dcum=$_POST["jg_dlne43"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_814I3,'default_gender',$jg_5dcum);
}
if ($jg_u2x1u=="jg_8zf8w9")
{
$jg_5dcum="";
if (isset($_POST["jg_gyvbjh"])){$jg_5dcum=$_POST["jg_gyvbjh"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_BSN5E,'default_link_suffix',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_special_time_of_day")
{
$jg_5dcum="";
if (isset($_POST["time_of_day"])){$jg_5dcum=$_POST["time_of_day"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_ISA10,'default_special_time_of_day',$jg_5dcum);
}
if ($jg_u2x1u=="save_default_special_time_zone_offset")
{
$jg_5dcum="";
if (isset($_POST["offset"])){$jg_5dcum=$_POST["offset"];}
$jg_5dcum=jg_m1t10($jg_5dcum);
$jg_5dcum=jg_ecfq2($jg_5dcum);
jg_jkr8b(JG_UW2NQ,'default_special_time_zone_offset',$jg_5dcum);
}
if ($jg_u2x1u=="jg_9ywkh9")
{
$jg_fobbk='';
if (isset($_GET["jg_y96zcl"])){$jg_fobbk=$_GET["jg_y96zcl"];}
define("VERSION", $jg_fobbk);
jg_qi1k6();
}
if ($jg_u2x1u=="load_custom_product_fields_section")
{
jg_18df6();
}
if ($jg_u2x1u=="load_custom_product_fields_list")
{
jg_aquit();
}
if ($jg_u2x1u=="jg_7dvyi6")
{
jg_7u758();
}
if ($jg_u2x1u=="jg_xs2gcu")
{
$jg_i5s61="";
if (isset($_POST["jg_rmf9jl"])){$jg_i5s61=$_POST["jg_rmf9jl"];}
$jg_i5s61=jg_m1t10($jg_i5s61);
save_db_setting_password_protect_the_data_feed($jg_i5s61);
}
if ($jg_u2x1u=="jg_h6gr62")
{
jg_6nwzw();
}
if ($jg_u2x1u=="jg_rfctm3")
{
$jg_k2zye='';
if (isset($_POST["jg_wj2fzj"])){$jg_k2zye=$_POST["jg_wj2fzj"];}
jg_qrqyn($jg_k2zye);
}
if ($jg_u2x1u=="jg_1ax3r8")
{
$jg_cyfnb='';
if (isset($_POST["jg_rfcpqv"])){$jg_cyfnb=$_POST["jg_rfcpqv"];}
jg_lufy1($jg_cyfnb);
}
if ($jg_u2x1u=="save_setting_custom_product_field")
{
$jg_iisbw="";
if (isset($_POST["field_title_original"])){$jg_iisbw=$_POST["field_title_original"];}
$jg_iisbw=jg_ecfq2(jg_m1t10($jg_iisbw));
$jg_16z4j="";
if (isset($_POST["column_name_original"])){$jg_16z4j=$_POST["column_name_original"];}
$jg_16z4j=jg_ecfq2(jg_m1t10($jg_16z4j));
$jg_5e8tr="";
if (isset($_POST["attribute_name_original"])){$jg_5e8tr=$_POST["attribute_name_original"];}
$jg_5e8tr=jg_ecfq2(jg_m1t10($jg_5e8tr));
$jg_b11do="";
if (isset($_POST["attribute_prefix_original"])){$jg_b11do=$_POST["attribute_prefix_original"];}
$jg_b11do=jg_ecfq2(jg_m1t10($jg_b11do));
$jg_v10ht="";
if (isset($_POST["field_title_new"])){$jg_v10ht=$_POST["field_title_new"];}
$jg_v10ht=jg_ecfq2(jg_m1t10($jg_v10ht));
$jg_8aomp="";
if (isset($_POST["column_name_new"])){$jg_8aomp=$_POST["column_name_new"];}
$jg_8aomp=jg_ecfq2(jg_m1t10($jg_8aomp));
$jg_rr1qb="";
if (isset($_POST["attribute_name_new"])){$jg_rr1qb=$_POST["attribute_name_new"];}
$jg_rr1qb=jg_ecfq2(jg_m1t10($jg_rr1qb));
$jg_tdl6r="";
if (isset($_POST["attribute_prefix_new"])){$jg_tdl6r=$_POST["attribute_prefix_new"];}
$jg_tdl6r=jg_ecfq2(jg_m1t10($jg_tdl6r));
jg_47xys($jg_iisbw, $jg_16z4j, $jg_5e8tr, $jg_b11do, $jg_v10ht, $jg_8aomp, $jg_rr1qb, $jg_tdl6r);
}
if ($jg_u2x1u=="save_setting_custom_product_field_value")
{
$jg_gulpw="";
if (isset($_POST["value_sent"])){$jg_gulpw=$_POST["value_sent"];}
$jg_gulpw=jg_4ghsp(jg_ecfq2(jg_m1t10($jg_gulpw)));
$jg_e10w1="";
if (isset($_POST["id_sent"])){$jg_e10w1=$_POST["id_sent"];}
$jg_e10w1=jg_4ghsp(jg_ecfq2(jg_m1t10($jg_e10w1)));
$jg_10ak9="";
if (isset($_POST["column_sent"])){$jg_10ak9=$_POST["column_sent"];}
$jg_10ak9=jg_4ghsp(jg_ecfq2(jg_m1t10($jg_10ak9)));
save_data_custom_product_field_value($jg_gulpw,$jg_e10w1,$jg_10ak9);
}
if ($jg_u2x1u=="load_google_categories_hovered")
{
echo jg_u8gad('');
}
if ($jg_u2x1u=="load_field_length_hovered")
{
$jg_hax6g='';
if (isset($_POST["jg_byh10s"])){$jg_hax6g=$_POST["jg_byh10s"];}
$jg_hax6g=clean_up_column_name($jg_hax6g);
$jg_hax6g=mysql_real_escape_string($jg_hax6g);
echo jg_4u8q3($jg_hax6g);
}
$jg_lhkoo="";
if (isset($_GET["jg_ftyqkn"])){$jg_lhkoo=$_GET["jg_ftyqkn"];}
if ($jg_lhkoo=="remove_custom_product_field_sent")
{
$jg_zsbqn="";
if (isset($_GET["field_title_sent"])){$jg_zsbqn=$_GET["field_title_sent"];}
$jg_zsbqn=jg_m1t10($jg_zsbqn);
$jg_hax6g="";
if (isset($_GET["jg_byh10s"])){$jg_hax6g=$_GET["jg_byh10s"];}
$jg_hax6g=jg_m1t10($jg_hax6g);
$jg_es58i="";
if (isset($_GET["attribute_name_sent"])){$jg_es58i=$_GET["attribute_name_sent"];}
$jg_es58i=jg_m1t10($jg_es58i);
$jg_q2467="";
if (isset($_GET["attribute_prefix_sent"])){$jg_q2467=$_GET["attribute_prefix_sent"];}
$jg_q2467=jg_m1t10($jg_q2467);
if(get_magic_quotes_gpc())
{
$jg_zsbqn=stripslashes($jg_zsbqn);
$jg_hax6g=stripslashes($jg_hax6g);
$jg_es58i=stripslashes($jg_es58i);
$jg_q2467=stripslashes($jg_q2467);
}
jg_l284p($jg_zsbqn, $jg_hax6g, $jg_es58i, $jg_q2467);
}
if ($jg_lhkoo=="jg_2kecjb")
{
$jg_fobbk='';
if (isset($_GET["jg_y96zcl"])){$jg_fobbk=$_GET["jg_y96zcl"];}
define("VERSION", $jg_fobbk);
if ((!file_exists($jg_kme4n))||(jg_jlfyq('0')!=JG_JNAMF)){jg_610hc($jg_kme4n,'0');}
jg_iphg3();
}
if ($jg_lhkoo=="jg_8rpt6y")
{
$jg_fobbk='';
if (isset($_GET["jg_y96zcl"])){$jg_fobbk=$_GET["jg_y96zcl"];}
define("VERSION", $jg_fobbk);
jg_tfl10();
}
if ($jg_lhkoo=="jg_318m1z")
{
$jg_5atm6="";
if (isset($_GET["jg_zaom91"])){$jg_5atm6=$_GET["jg_zaom91"];}
$jg_ggk77="";
if (isset($_GET["jg_fa93ip"])){$jg_ggk77=$_GET["jg_fa93ip"];}
require JG_GQ9ZI;
if (($jg_ggk77==$_['text_default'])||(!jg_uhxtk($jg_ggk77)))
{
$jg_ggk77='default';
}
$jg_xxtmi="";
if (isset($_GET["jg_a61gyq"])){$jg_xxtmi=$_GET["jg_a61gyq"];}
$jg_6v7hp="";
if (isset($_GET["jg_kpskdu"])){$jg_6v7hp=$_GET["jg_kpskdu"];}
jg_1jol2($jg_5atm6,$jg_ggk77,$jg_xxtmi,$jg_6v7hp);
}
if ($jg_lhkoo=="jg_y81021")
{
$jg_10dvna="";
if (isset($_GET["jg_xey9ok"])){$jg_10dvna=$_GET["jg_xey9ok"];}
$jg_m9rcxi="";
if (isset($_GET["jg_pdq24d"])){$jg_m9rcxi=$_GET["jg_pdq24d"];}
$jg_mjczqn="";
if (isset($_GET["jg_s1q10z"])){$jg_mjczqn=$_GET["jg_s1q10z"];}
$jg_d410tc="";
if (isset($_GET["language_code"])){$jg_d410tc=$_GET["language_code"];}
if(jg_dgqfm($jg_d410tc)==''){$jg_d410tc=jg_2ykgz();}
define("JG_M5D6Q", $jg_d410tc);
define("JG_RBM6Z", jg_s7xf6(JG_M5D6Q));
echo jg_rq7ci($jg_10dvna,$jg_m9rcxi,$jg_mjczqn,$jg_d410tc);
}
if ($jg_lhkoo=="jg_cncqy5")
{
$jg_10dvna="";
if (isset($_GET["jg_xey9ok"])){$jg_10dvna=$_GET["jg_xey9ok"];}
$jg_m9rcxi="";
if (isset($_GET["jg_pdq24d"])){$jg_m9rcxi=$_GET["jg_pdq24d"];}
$jg_mjczqn="";
if (isset($_GET["jg_s1q10z"])){$jg_mjczqn=$_GET["jg_s1q10z"];}
$jg_rirb1="";
if (isset($_GET["jg_y96zcl"])){$jg_rirb1=$_GET["jg_y96zcl"];}
define("VERSION",$jg_rirb1);
$jg_d410tc="";
if (isset($_GET["language_code"])){$jg_d410tc=$_GET["language_code"];}
if(jg_dgqfm($jg_d410tc)==''){$jg_d410tc=jg_2ykgz();}
define("JG_M5D6Q", $jg_d410tc);
define("JG_RBM6Z", jg_s7xf6(JG_M5D6Q));
echo jg_lonuu($jg_10dvna,$jg_m9rcxi,$jg_mjczqn,$jg_d410tc);
}
if ($jg_lhkoo=="jg_mq104x")
{
$jg_10dvna="";
if (isset($_GET["jg_xey9ok"])){$jg_10dvna=$_GET["jg_xey9ok"];}
$jg_m9rcxi="";
if (isset($_GET["jg_pdq24d"])){$jg_m9rcxi=$_GET["jg_pdq24d"];}
$jg_mjczqn="";
if (isset($_GET["jg_s1q10z"])){$jg_mjczqn=$_GET["jg_s1q10z"];}
$jg_d410tc="";
if (isset($_GET["language_code"])){$jg_d410tc=$_GET["language_code"];}
if(jg_dgqfm($jg_d410tc)==''){$jg_d410tc=jg_2ykgz();}
define("JG_M5D6Q", $jg_d410tc);
define("JG_RBM6Z", jg_s7xf6(JG_M5D6Q));
echo jg_vkycn($jg_10dvna,$jg_m9rcxi,$jg_mjczqn,$jg_d410tc);
}
if ($jg_lhkoo=="jg_yg5lr2")
{
$jg_10dvna="";
if (isset($_GET["jg_xey9ok"])){$jg_10dvna=$_GET["jg_xey9ok"];}
$jg_m9rcxi="";
if (isset($_GET["jg_pdq24d"])){$jg_m9rcxi=$_GET["jg_pdq24d"];}
$jg_mjczqn="";
if (isset($_GET["jg_s1q10z"])){$jg_mjczqn=$_GET["jg_s1q10z"];}
$jg_d410tc="";
if (isset($_GET["language_code"])){$jg_d410tc=$_GET["language_code"];}
if(jg_dgqfm($jg_d410tc)==''){$jg_d410tc=jg_2ykgz();}
define("JG_M5D6Q", $jg_d410tc);
define("JG_RBM6Z", jg_s7xf6(JG_M5D6Q));
echo jg_q137i($jg_10dvna,$jg_m9rcxi,$jg_mjczqn,$jg_d410tc);
}
if ($jg_lhkoo=="update_list_contents_opencart_product_names_list_for_editing")
{
$jg_10dvna="";
if (isset($_GET["jg_xey9ok"])){$jg_10dvna=$_GET["jg_xey9ok"];}
$jg_m9rcxi="";
if (isset($_GET["jg_pdq24d"])){$jg_m9rcxi=$_GET["jg_pdq24d"];}
$jg_mjczqn="";
if (isset($_GET["jg_s1q10z"])){$jg_mjczqn=$_GET["jg_s1q10z"];}
$jg_d410tc="";
if (isset($_GET["language_code"])){$jg_d410tc=$_GET["language_code"];}
if(jg_dgqfm($jg_d410tc)==''){$jg_d410tc=jg_2ykgz();}
define("JG_M5D6Q", $jg_d410tc);
define("JG_RBM6Z", jg_s7xf6(JG_M5D6Q));
echo jg_3gyyq($jg_10dvna,$jg_m9rcxi,$jg_mjczqn,$jg_d410tc);
}
if ($jg_lhkoo=="jg_np5cza")
{
$jg_6v7hp="";
if (isset($_GET["jg_k51rvb"])){$jg_6v7hp=$_GET["jg_k51rvb"];}
jg_a6w4c($jg_6v7hp);
}
if ($jg_lhkoo=="jg_igcbkg")
{
$jg_6v7hp="";
if (isset($_GET["jg_k51rvb"])){$jg_6v7hp=$_GET["jg_k51rvb"];}
jg_x2mru($jg_6v7hp);
}
if ($jg_lhkoo=="jg_ot2a8w")
{
$jg_6v7hp="";
if (isset($_GET["jg_k51rvb"])){$jg_6v7hp=$_GET["jg_k51rvb"];}
jg_9xioq($jg_6v7hp);
}
if ($jg_lhkoo=="jg_iw106n")
{
$jg_6v7hp="";
if (isset($_GET["jg_k51rvb"])){$jg_6v7hp=$_GET["jg_k51rvb"];}
jg_10bqg($jg_6v7hp);
}
if ($jg_lhkoo=="jg_8twrsx")
{
$jg_h3as2="";
if (isset($_GET["jg_xhbkea"])){$jg_h3as2=$_GET["jg_xhbkea"];}
$jg_6v7hp="";
if (isset($_GET["jg_k51rvb"])){$jg_6v7hp=$_GET["jg_k51rvb"];}
$jg_fobbk='';
if (isset($_GET["jg_y96zcl"])){$jg_fobbk=$_GET["jg_y96zcl"];}
define("VERSION", $jg_fobbk);
jg_isazwy($jg_h3as2,$jg_6v7hp);
}
if ($jg_lhkoo=="jg_39j2i1")
{
$jg_h3as2="";
if (isset($_GET["jg_xhbkea"])){$jg_h3as2=$_GET["jg_xhbkea"];}
$jg_6v7hp="";
if (isset($_GET["jg_k51rvb"])){$jg_6v7hp=$_GET["jg_k51rvb"];}
$jg_fobbk='';
if (isset($_GET["jg_y96zcl"])){$jg_fobbk=$_GET["jg_y96zcl"];}
define("VERSION", $jg_fobbk);
jg_2qkvn($jg_h3as2,$jg_6v7hp);
}
if ($jg_lhkoo=="jg_l1s1nb")
{
$jg_h3as2="";
if (isset($_GET["jg_xhbkea"])){$jg_h3as2=$_GET["jg_xhbkea"];}
$jg_6v7hp="";
if (isset($_GET["jg_k51rvb"])){$jg_6v7hp=$_GET["jg_k51rvb"];}
$jg_fobbk='';
if (isset($_GET["jg_y96zcl"])){$jg_fobbk=$_GET["jg_y96zcl"];}
define("VERSION", $jg_fobbk);
jg_n3m2h($jg_h3as2,$jg_6v7hp);
}
if ($jg_lhkoo=="jg_o21lva")
{
$jg_pmcic="";
if (isset($_GET["jg_nmhchk"])){$jg_pmcic=$_GET["jg_nmhchk"];}
if ($jg_pmcic==$jg_etlc6)
{
jg_m9lsz($jg_pmcic);
}
}
if ($jg_lhkoo=="jg_4xzfa9")
{
$jg_pmcic="";
if (isset($_GET["jg_nmhchk"])){$jg_pmcic=$_GET["jg_nmhchk"];}
if ($jg_pmcic==$jg_etlc6)
{
jg_tr78o($jg_pmcic);
}
}
if ($jg_lhkoo=="jg_1tvtzo")
{
$jg_6o1l1="";
if (isset($_GET["jg_1ji4rm"])){$jg_6o1l1=$_GET["jg_1ji4rm"];}
$jg_6o1l1=jg_m1t10($jg_6o1l1);
$jg_lerkz="";
if (isset($_GET["jg_zslnd1"])){$jg_lerkz=$_GET["jg_zslnd1"];}
$jg_lerkz=jg_m1t10($jg_lerkz);
$jg_10aik="";
if (isset($_GET["jg_lbv6og"])){$jg_10aik=$_GET["jg_lbv6og"];}
$jg_10aik=jg_m1t10($jg_10aik);
$jg_a6822="";
if (isset($_GET["jg_9aws9q"])){$jg_a6822=$_GET["jg_9aws9q"];}
$jg_a6822=jg_m1t10($jg_a6822);
if(get_magic_quotes_gpc())
{
$jg_6o1l1=stripslashes($jg_6o1l1);
$jg_lerkz=stripslashes($jg_lerkz);
$jg_10aik=stripslashes($jg_10aik);
$jg_a6822=stripslashes($jg_a6822);
}
jg_tlwth($jg_6o1l1, $jg_lerkz, $jg_10aik, $jg_a6822);
}
if ($jg_lhkoo=="jg_p4fpcw")
{
$jg_ugsw6="";
if (isset($_GET["jg_gb2dfx"])){$jg_ugsw6=$_GET["jg_gb2dfx"];}
$jg_ugsw6=jg_ecfq2(jg_m1t10($jg_ugsw6));
$jg_njlma="";
if (isset($_GET["jg_52tlxt"])){$jg_njlma=$_GET["jg_52tlxt"];}
$jg_njlma=jg_ecfq2(jg_m1t10($jg_njlma));
$jg_xfq10="";
if (isset($_GET["jg_c1f2zq"])){$jg_xfq10=$_GET["jg_c1f2zq"];}
$jg_xfq10=jg_ecfq2(jg_m1t10($jg_xfq10));
$jg_rua3g="";
if (isset($_GET["jg_2u3dzr"])){$jg_rua3g=$_GET["jg_2u3dzr"];}
$jg_rua3g=jg_ecfq2(jg_m1t10($jg_rua3g));
$jg_xalz1="";
if (isset($_GET["jg_jf3vhy"])){$jg_xalz1=$_GET["jg_jf3vhy"];}
$jg_xalz1=jg_ecfq2(jg_m1t10($jg_xalz1));
$jg_6iwrc="";
if (isset($_GET["jg_fnkjkh"])){$jg_6iwrc=$_GET["jg_fnkjkh"];}
$jg_6iwrc=jg_ecfq2(jg_m1t10($jg_6iwrc));
$jg_110df="";
if (isset($_GET["jg_wy649z"])){$jg_110df=$_GET["jg_wy649z"];}
$jg_110df=jg_ecfq2(jg_m1t10($jg_110df));
$jg_57rrx="";
if (isset($_GET["jg_9zx7ef"])){$jg_57rrx=$_GET["jg_9zx7ef"];}
$jg_57rrx=jg_ecfq2(jg_m1t10($jg_57rrx));
jg_zxqw2($jg_ugsw6, $jg_njlma, $jg_xfq10, $jg_rua3g, $jg_xalz1, $jg_6iwrc, $jg_110df, $jg_57rrx);
}
if ($jg_lhkoo=="jg_x2d4q4")
{
jg_i2b41(jg_lh56j());
}
if ($jg_lhkoo=="jg_76lewf")
{
echo jg_brack();
}
if ($jg_lhkoo=="jg_6ib95k")
{
echo jg_hqoa1y();
}
if ($jg_lhkoo=="jg_2126tm")
{
echo jg_6cr4sw();
}
if ($jg_lhkoo=="jg_nlzpsr")
{
echo jg_uu10dt();
}
if ($jg_lhkoo=="load_default_surround_xml_data_feed_attributes_with_cdata_tags")
{
echo load_xml_default_enclose_xml_data_feed_attributes_within_cdata_sections();
}
if ($jg_lhkoo=="jg_10ssx7")
{
$jg_i5s61="";
if (isset($_GET["jg_sobg57"])){$jg_i5s61=$_GET["jg_sobg57"];}
$jg_i5s61=jg_m1t10($jg_i5s61);
if (file_exists($jg_n4vej))
{
jg_zxeqn($jg_i5s61);
}
else
{
jg_zxeqn('false');
}
}
if ($jg_lhkoo=="jg_1dewra")
{
$jg_i5s61="";
if (isset($_GET["use_sef_urls"])){$jg_i5s61=$_GET["use_sef_urls"];}
$jg_i5s61=jg_m1t10($jg_i5s61);
if (file_exists($jg_10nm2))
{
jg_odx7c($jg_i5s61);
}
else
{
jg_odx7c('false');
}
}
if ($jg_lhkoo=="jg_47mkra")
{
$jg_i5s61="";
if (isset($_GET["jg_1vxoq2"])){$jg_i5s61=$_GET["jg_1vxoq2"];}
$jg_i5s61=jg_m1t10($jg_i5s61);
if (file_exists($jg_510jc))
{
jg_msvji1($jg_i5s61);
}
else
{
jg_msvji1('false');
}
}
if ($jg_lhkoo=="save_default_surround_xml_data_feed_attributes_with_cdata_tags")
{
$jg_i5s61="";
if (isset($_GET["use_cdata_tags"])){$jg_i5s61=$_GET["use_cdata_tags"];}
$jg_i5s61=jg_m1t10($jg_i5s61);
if (file_exists(JG_JIRQW))
{
save_xml_default_enclose_xml_data_feed_attributes_within_cdata_sections($jg_i5s61);
}
else
{
save_xml_default_enclose_xml_data_feed_attributes_within_cdata_sections('true');
}
}
if ($jg_lhkoo=="save_default_use_weight_for_shipping_weight")
{
$jg_i5s61="";
if (isset($_GET["use_weight"])){$jg_i5s61=$_GET["use_weight"];}
$jg_i5s61=jg_m1t10($jg_i5s61);
if (file_exists(JG_CJPFR))
{
save_xml_default_use_weight_for_shipping_weight($jg_i5s61);
}
else
{
save_xml_default_use_weight_for_shipping_weight('true');
}
}
if ($jg_lhkoo=="jg_6lytnb")
{
$jg_i5s61="";
if (isset($_GET["jg_3rvsef"])){$jg_i5s61=$_GET["jg_3rvsef"];}
$jg_i5s61=jg_m1t10($jg_i5s61);
jg_gk3eeq($jg_i5s61);
}
if ($jg_lhkoo=="jg_710ksu")
{
$jg_i5s61="";
if (isset($_GET["jg_cdd5bq"])){$jg_i5s61=$_GET["jg_cdd5bq"];}
$jg_i5s61=jg_m1t10($jg_i5s61);
jg_jdoht3($jg_i5s61);
}
if ($jg_lhkoo=="jg_lnnwqp")
{
$jg_i5s61="";
if (isset($_GET["jg_oxw34h"])){$jg_i5s61=$_GET["jg_oxw34h"];}
$jg_i5s61=jg_m1t10($jg_i5s61);
jg_t7jqd($jg_i5s61);
}
if ($jg_lhkoo=="load_default_do_not_merge_custom_attribute_assignments")
{
echo jg_th4x8();
}
if ($jg_lhkoo=="jg_ok8pon")
{
echo jg_8h1h9();
}
if ($jg_lhkoo=="jg_fx8d9o")
{
jg_lh56j();
}
if ($jg_lhkoo=="jg_2s97d4")
{
$jg_7qg2b="";
if (isset($_GET["jg_4n37iv"])){$jg_7qg2b=$_GET["jg_4n37iv"];}
$jg_7qg2b=jg_m1t10($jg_7qg2b);
if (file_exists($jg_5od28))
{
jg_u62g7($jg_7qg2b);
}
else
{
jg_u62g7("xml");
}
}
if ($jg_lhkoo=="jg_dvhcd2")
{
$jg_taxb1="";
if (isset($_GET["jg_qb8vjr"])){$jg_taxb1=$_GET["jg_qb8vjr"];}
$jg_taxb1=jg_m1t10($jg_taxb1);
if (file_exists($jg_y74wl))
{
jg_pi753($jg_taxb1);
}
else
{
jg_pi753("en");
}
}
if ($jg_lhkoo=="jg_5goxc3")
{
jg_bd44n();
}
if ($jg_lhkoo=="jg_sl8o4g")
{
$jg_10nnx="";
if (isset($_GET["jg_41cxen"])){$jg_10nnx=$_GET["jg_41cxen"];}
$jg_6o1l1="";
if (isset($_GET["jg_1ji4rm"])){$jg_6o1l1=$_GET["jg_1ji4rm"];}
$jg_6o1l1=jg_ecfq2(jg_m1t10($jg_6o1l1));
$jg_lerkz="";
if (isset($_GET["jg_zslnd1"])){$jg_lerkz=$_GET["jg_zslnd1"];}
$jg_lerkz=jg_ecfq2(jg_m1t10($jg_lerkz));
$jg_10aik="";
if (isset($_GET["jg_lbv6og"])){$jg_10aik=$_GET["jg_lbv6og"];}
$jg_10aik=jg_ecfq2(jg_m1t10($jg_10aik));
$jg_a6822="";
if (isset($_GET["jg_9aws9q"])){$jg_a6822=$_GET["jg_9aws9q"];}
$jg_a6822=jg_ecfq2(jg_m1t10($jg_a6822));
jg_4p1hn($jg_10nnx, $jg_6o1l1, $jg_lerkz, $jg_10aik, $jg_a6822);
}
function jg_4p1hn($jg_10nnx, $jg_6o1l1, $jg_lerkz, $jg_10aik, $jg_a6822)
{
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( JG_ZXZFK );
$jg_dfwlk=$jg_9dug9->getElementsByTagName( "assignment" );
foreach( $jg_dfwlk as $jg_h110l )
{
$jg_dg1rc=$jg_h110l->getElementsByTagName( "opencart_field" );
$jg_o9x93=$jg_dg1rc->item(0)->nodeValue;
$jg_o9x93=jg_ecfq2($jg_o9x93);
$jg_6h107=$jg_h110l->getElementsByTagName( "opencart_field_value" );
$jg_eogqr=$jg_6h107->item(0)->nodeValue;
$jg_eogqr=jg_ecfq2($jg_eogqr);
$jg_8nfqg=$jg_h110l->getElementsByTagName( "google_attribute" );
$jg_lxz4r=$jg_8nfqg->item(0)->nodeValue;
$jg_lxz4r=jg_ecfq2($jg_lxz4r);
$jg_qxsuv=$jg_h110l->getElementsByTagName( "google_attribute_value" );
$jg_1fshj=$jg_qxsuv->item(0)->nodeValue;
$jg_1fshj=jg_ecfq2($jg_1fshj);
if (jg_esmiy($jg_6o1l1,$jg_o9x93)&&jg_esmiy($jg_lerkz,$jg_eogqr)&&jg_esmiy($jg_10aik,$jg_lxz4r)&&jg_esmiy($jg_a6822,$jg_1fshj))
{
if ($jg_10nnx=="up")
{
$jg_h110l->parentNode->insertBefore($jg_h110l, $jg_h110l->previousSibling);
}
else
{
if ($jg_h110l->nextSibling!=null)
{
$jg_h110l->parentNode->insertBefore($jg_h110l, $jg_h110l->nextSibling->nextSibling);
}
else
{
do{
$jg_h110l->parentNode->insertBefore($jg_h110l, $jg_h110l->previousSibling);
} while ($jg_h110l->previousSibling!=null);
}
}
break;
}
}
$jg_9dug9->save(JG_ZXZFK);
}
if ($jg_lhkoo=="move_custom_product_field")
{
$jg_10nnx="";
if (isset($_GET["jg_41cxen"])){$jg_10nnx=$_GET["jg_41cxen"];}
$jg_zsbqn="";
if (isset($_GET["field_title_sent"])){$jg_zsbqn=$_GET["field_title_sent"];}
$jg_zsbqn=jg_ecfq2(jg_m1t10($jg_zsbqn));
$jg_hax6g="";
if (isset($_GET["jg_byh10s"])){$jg_hax6g=$_GET["jg_byh10s"];}
$jg_hax6g=jg_ecfq2(jg_m1t10($jg_hax6g));
$jg_es58i="";
if (isset($_GET["attribute_name_sent"])){$jg_es58i=$_GET["attribute_name_sent"];}
$jg_es58i=jg_ecfq2(jg_m1t10($jg_es58i));
$jg_q2467="";
if (isset($_GET["attribute_prefix_sent"])){$jg_q2467=$_GET["attribute_prefix_sent"];}
$jg_q2467=jg_ecfq2(jg_m1t10($jg_q2467));
jg_koqjv($jg_10nnx, $jg_zsbqn, $jg_hax6g, $jg_es58i, $jg_q2467);
}
function jg_koqjv($jg_10nnx, $jg_zsbqn, $jg_hax6g, $jg_es58i, $jg_q2467)
{
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( JG_3Z28H );
$jg_102m8=$jg_9dug9->getElementsByTagName( "custom_product_field" );
foreach( $jg_102m8 as $jg_k5stx )
{
$jg_br6hz=$jg_k5stx->getElementsByTagName( "field_title" );
$jg_kxe4i=$jg_br6hz->item(0)->nodeValue;
$jg_kxe4i=jg_ecfq2($jg_kxe4i);
$jg_jfc6g=$jg_k5stx->getElementsByTagName( "column_name" );
$jg_vag4j=$jg_jfc6g->item(0)->nodeValue;
$jg_vag4j=jg_ecfq2($jg_vag4j);
$jg_e1v1g=$jg_k5stx->getElementsByTagName( "attribute_name" );
$jg_jfjwh=$jg_e1v1g->item(0)->nodeValue;
$jg_jfjwh=jg_ecfq2($jg_jfjwh);
$jg_ezrde=$jg_k5stx->getElementsByTagName( "attribute_prefix" );
$jg_5rqod=$jg_ezrde->item(0)->nodeValue;
$jg_5rqod=jg_ecfq2($jg_5rqod);
if (jg_esmiy($jg_zsbqn,$jg_kxe4i)&&jg_esmiy($jg_hax6g,$jg_vag4j)&&jg_esmiy($jg_es58i,$jg_jfjwh)&&jg_esmiy($jg_q2467,$jg_5rqod))
{
if ($jg_10nnx=="up")
{
$jg_k5stx->parentNode->insertBefore($jg_k5stx, $jg_k5stx->previousSibling);
}
else
{
if ($jg_k5stx->nextSibling!=null)
{
$jg_k5stx->parentNode->insertBefore($jg_k5stx, $jg_k5stx->nextSibling->nextSibling);
}
else
{
do{
$jg_k5stx->parentNode->insertBefore($jg_k5stx, $jg_k5stx->previousSibling);
} while ($jg_k5stx->previousSibling!=null);
}
}
break;
}
}
$jg_9dug9->save(JG_3Z28H);
}
if ($jg_lhkoo=="jg_ku10s9")
{
$jg_6o1l1="";
if (isset($_GET["jg_1ji4rm"])){$jg_6o1l1=$_GET["jg_1ji4rm"];}
$jg_6o1l1=jg_ecfq2(jg_m1t10($jg_6o1l1));
$jg_lerkz="";
if (isset($_GET["jg_zslnd1"])){$jg_lerkz=$_GET["jg_zslnd1"];}
$jg_lerkz=jg_ecfq2(jg_m1t10($jg_lerkz));
$jg_10aik="";
if (isset($_GET["jg_lbv6og"])){$jg_10aik=$_GET["jg_lbv6og"];}
$jg_10aik=jg_ecfq2(jg_m1t10($jg_10aik));
$jg_a6822="";
if (isset($_GET["jg_9aws9q"])){$jg_a6822=$_GET["jg_9aws9q"];}
$jg_a6822=jg_ecfq2(jg_m1t10($jg_a6822));
if(get_magic_quotes_gpc())
{
$jg_6o1l1=stripslashes($jg_6o1l1);
$jg_lerkz=stripslashes($jg_lerkz);
$jg_10aik=stripslashes($jg_10aik);
$jg_a6822=stripslashes($jg_a6822);
}
jg_lvlq9($jg_6o1l1, $jg_lerkz, $jg_10aik, $jg_a6822);
}
function jg_rq7ci($jg_10dvna,$jg_m9rcxi,$jg_mjczqn,$jg_d410tc)
{
$jg_9a1fb=0;
if($jg_m9rcxi!=0){$jg_9a1fb=$jg_m9rcxi-1;}
$jg_7uvbk=array();
$jg_npdbc=$jg_9a1fb+$jg_mjczqn;
$jg_lrcjj=DB_PREFIX."product";
$jg_i8por=DB_PREFIX."product_description";
$column_name="name";
$jg_b4tsh="product_id";
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT ".$jg_lrcjj.".".$jg_b4tsh." FROM ".$jg_lrcjj." LIMIT ".$jg_m9rcxi.",".$jg_mjczqn.";") or die (mysql_error());
while($jg_sj5e8=mysql_fetch_array($jg_xrpiy))
{
$jg_yudgc=array();
$jg_lalgi=jg_q3jf1($jg_sj5e8[$jg_b4tsh]);
foreach ($jg_lalgi as $attribute_group) {
foreach ($attribute_group['attribute'] as $attribute) {
$jg_7uvbk[]=$attribute_group['name'].": ".$attribute['name'].": ".$attribute['text'];
}
}
}
require JG_GQ9ZI;
if($jg_d410tc==jg_2ykgz())
{
$jg_d410tc=$_['text_default'];
}
$jg_nqk5p="<div style=\"margin-top: 5px;\">".$_['text_opencart_product_attribute'].":</div>";
$jg_nqk5p.="<table class=\"list\" style=\"margin-bottom: 0px; margin-top: 5px; width: auto;\"><tr><td style=\"margin-top: 5px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\">";
$jg_nqk5p.="<span style=\"margin-top: 8px;\">".$_['text_start'].":</span>";
$jg_nqk5p.="<select style=\"margin-top: 0px; margin-left: 5px;\" title=\"".$_['text_starting_product']."\" onchange=\"jg_r2bm16(1,this.options[this.selectedIndex].value,".$jg_mjczqn.",'".$jg_d410tc."');\">";
$jg_qgf4x=0;
$jg_tjni3=0;
$jg_usasb=0;
$jg_evt1n=jg_skyjq();
for ($jg_c4g3o=0; $jg_c4g3o<$jg_evt1n; $jg_c4g3o++)
{
$jg_qgf4x+=1;
$jg_tjni3+=1;
if($jg_tjni3==$jg_m9rcxi)
{
$jg_nqk5p.="<option selected>".$jg_tjni3."</option>\r\n";
$jg_usasb=1;
}
else
{
$jg_nqk5p.="<option>".$jg_tjni3."</option>\r\n";
}
$jg_qgf4x=0;
}
$jg_nqk5p.="</select>";
$jg_nqk5p.="<span style=\"margin-left: 5px; margin-top: 0px;\">".$_['text_limit'].":</span>";
$jg_nqk5p.="<select style=\"margin-top: 0px; margin-left: 5px; margin-right: 5px;\" title=\"".$_['text_limit_number_of_products_queried']."\" onchange=\"jg_r2bm16(1,".$jg_m9rcxi.",this.options[this.selectedIndex].value,'".$jg_d410tc."');\">";
$jg_qhf77=0;
$jg_q5kd1=0;
for ($jg_c4g3o=0; $jg_c4g3o<10; $jg_c4g3o++)
{
$jg_qhf77+=1;
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<100; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=10)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<1000; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=100)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<20000; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=1000)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<100000; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=5000)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nqk5p.="</select>";
$jg_nqk5p.=jg_4abab($jg_d410tc,$jg_mjczqn);
$jg_nqk5p.="<span id=\"img-refresh-list-products-attributes-selection-for-attribute-assignments\"><img title=\"".$_['text_refresh']."\" onclick=\"jg_r2bm16(1,0,".$jg_mjczqn.",'".$jg_d410tc."');return false;\"style=\"vertical-align: middle; cursor: pointer; margin-left: 6px; margin-right: 0px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/reset.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/reset.png\" /></span>";
$jg_nqk5p.="</td></tr></table>";
$jg_nqk5p.="<select multiple=\"multiple\" name=\"jg_l2i9ve\" id=\"jg_l2i9ve\" style=\"height: 200px; margin-top: 8px; margin-bottom: 8px;\">\r\n";
for ($jg_4ps78=0; $jg_4ps78<count($jg_7uvbk); $jg_4ps78++)
{
$jg_nqk5p.="<option>".$jg_7uvbk[$jg_4ps78]."</option>";
}
$jg_nqk5p.="</select>";
return $jg_nqk5p;
}
function jg_vkycn($jg_10dvna,$jg_m9rcxi,$jg_mjczqn,$jg_d410tc)
{
$jg_9a1fb=0;
if($jg_m9rcxi!=0){$jg_9a1fb=$jg_m9rcxi-1;}
$jg_7uvbk=array();
$jg_npdbc=$jg_9a1fb+$jg_mjczqn;
$jg_lrcjj=DB_PREFIX."product";
$jg_i8por=DB_PREFIX."product_description";
$column_name="name";
$jg_b4tsh="product_id";
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT ".$jg_lrcjj.".".$jg_b4tsh." FROM ".$jg_lrcjj." LIMIT ".$jg_m9rcxi.",".$jg_mjczqn.";") or die (mysql_error());
$jg_7uvbk=array();
while($jg_sj5e8=mysql_fetch_array($jg_xrpiy))
{
$categories=jg_6zcda6($jg_sj5e8[$jg_b4tsh]);
if($categories)
{
foreach ($categories as $category) {
$path=getPath($category['category_id']);
if ($path) {
$jg_46tp9='';
foreach (explode('_', $path) as $path_id) {
$category_info=jg_b3102q($path_id);
if ($category_info) {
if (!$jg_46tp9) {
$jg_46tp9=$category_info['name'];
}else{
$jg_46tp9.=' &gt; '.$category_info['name'];
}
}
}
$jg_7uvbk[]=$jg_46tp9;
}
}
}
}
require JG_GQ9ZI;
if($jg_d410tc==jg_2ykgz())
{
$jg_d410tc=$_['text_default'];
}
$jg_nqk5p="<div style=\"margin-top: 5px;\">".$_['text_opencart_product_category'].":</div>";
$jg_nqk5p.="<table class=\"list\" style=\"margin-bottom: 0px; margin-top: 5px; width: auto;\"><tr><td style=\"margin-top: 5px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\">";
$jg_nqk5p.="<span style=\"margin-top: 8px;\">".$_['text_start'].":</span>";
$jg_nqk5p.="<select style=\"margin-top: 0px; margin-left: 5px;\" title=\"".$_['text_starting_product']."\" onchange=\"jg_h10gc8(1,this.options[this.selectedIndex].value,".$jg_mjczqn.",'".$jg_d410tc."');\">";
$jg_qgf4x=0;
$jg_tjni3=0;
$jg_usasb=0;
$jg_evt1n=jg_skyjq();
for ($jg_c4g3o=0; $jg_c4g3o<$jg_evt1n; $jg_c4g3o++)
{
$jg_qgf4x+=1;
$jg_tjni3+=1;
if($jg_tjni3==$jg_m9rcxi)
{
$jg_nqk5p.="<option selected>".$jg_tjni3."</option>\r\n";
$jg_usasb=1;
}
else
{
$jg_nqk5p.="<option>".$jg_tjni3."</option>\r\n";
}
$jg_qgf4x=0;
}
$jg_nqk5p.="</select>";
$jg_nqk5p.="<span style=\"margin-left: 5px; margin-top: 0px;\">".$_['text_limit'].":</span>";
$jg_nqk5p.="<select style=\"margin-top: 0px; margin-left: 5px; margin-right: 5px;\" title=\"".$_['text_limit_number_of_products_queried']."\" onchange=\"jg_h10gc8(1,".$jg_m9rcxi.",this.options[this.selectedIndex].value,'".$jg_d410tc."');\">";
$jg_qhf77=0;
$jg_q5kd1=0;
for ($jg_c4g3o=0; $jg_c4g3o<10; $jg_c4g3o++)
{
$jg_qhf77+=1;
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<100; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=10)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<1000; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=100)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<20000; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=1000)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<100000; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=5000)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nqk5p.="</select>";
$jg_nqk5p.=jg_lhlza($jg_d410tc,$jg_mjczqn);
$jg_nqk5p.="<span id=\"img-refresh-list-products-categories-selection-for-attribute-assignments\"><img title=\"".$_['text_refresh']."\" onclick=\"jg_h10gc8(1,0,".$jg_mjczqn.",'".$jg_d410tc."');return false;\"style=\"vertical-align: middle; cursor: pointer; margin-left: 6px; margin-right: 0px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/reset.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/reset.png\" /></span>";
$jg_nqk5p.="</td></tr></table>";
$jg_nqk5p.="<select multiple=\"multiple\" name=\"jg_pydq7r\" id=\"jg_pydq7r\" style=\"height: 200px; margin-top: 8px; margin-bottom: 8px;\">\r\n";
$jg_7uvbk=array_unique($jg_7uvbk);
sort($jg_7uvbk);
for ($jg_4ps78=0; $jg_4ps78<count($jg_7uvbk); $jg_4ps78++)
{
$jg_nqk5p.="<option>".$jg_7uvbk[$jg_4ps78]."</option>";
}
$jg_nqk5p.="</select>";
return $jg_nqk5p;
}
function jg_kkyro($jg_46tp9)
{
$jg_46tp9=html_entity_decode($jg_46tp9, ENT_QUOTES, 'UTF-8');
$jg_46tp9=html_entity_decode($jg_46tp9, ENT_QUOTES, 'UTF-8');
$jg_46tp9=str_replace("\r", " ", $jg_46tp9);
$jg_46tp9=str_replace("\n", " ", $jg_46tp9);
$jg_46tp9=str_replace("\t", " ", $jg_46tp9);
return $jg_46tp9;
}
function jg_esmiy($jg_k4ucu,$jg_bqimt)
{
$jg_h3wfs=false;
$jg_k4ucu=trim($jg_k4ucu);
$jg_bqimt=trim($jg_bqimt);
$jg_k4ucu=jg_kkyro($jg_k4ucu);
$jg_bqimt=jg_kkyro($jg_bqimt);
if ($jg_k4ucu==$jg_bqimt)
{
$jg_h3wfs=true;
}
return $jg_h3wfs;
}
function jg_lonuu($jg_10dvna,$jg_m9rcxi,$jg_mjczqn,$jg_d410tc)
{
$jg_9a1fb=0;
if($jg_m9rcxi!=0){$jg_9a1fb=$jg_m9rcxi-1;}
$jg_7uvbk=array();
$jg_lrcjj=DB_PREFIX."product";
$jg_i8por=DB_PREFIX."product_description";
$column_name="name";
$jg_b4tsh="product_id";
$jg_sj1x1="";
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT ".$jg_lrcjj.".".$jg_b4tsh." FROM ".$jg_lrcjj." LIMIT ".$jg_m9rcxi.",".$jg_mjczqn.";") or die (mysql_error());
$jg_vszip=array();
while($jg_sj5e8=mysql_fetch_array($jg_xrpiy))
{
$jg_7uvbk=array();
$jg_53xhj='';
switch (VERSION)
{
case (VERSION=='1.4.7'||VERSION=='1.4.8'||VERSION=='1.4.9'||VERSION=='1.4.9.1'||VERSION=='1.4.9.2'||VERSION=='1.4.9.3'||VERSION=='1.4.9.4'||VERSION=='1.4.9.5'||VERSION=='1.4.9.6'):
$options=jg_lsq3s($jg_sj5e8[$jg_b4tsh]);
foreach ($options as $option) { 
$jg_r85v5=array();
foreach ($option['option_value'] as $option_value) {
$jg_r85v5[]=array(
'option_value_id' => $option_value['product_option_value_id'],
'name'            => $option_value['name'],
'prefix'          => $option_value['prefix']
);
$jg_sj1x1=$jg_sj1x1.$option_value['name'].",";
}
$data['options'][]=array(
'option_id'    => $option['product_option_id'],
'name'         => $option['name'],
'option_value' => $jg_r85v5
);
$jg_pztk6=explode(",",$jg_sj1x1);
$jg_iiyl8=0;
$jg_9jo87="";
foreach($jg_pztk6 as $jg_i6vo2)
{
if ($jg_i6vo2!="")
{
if ($jg_iiyl8==0)
{
$jg_9jo87.=$jg_i6vo2;
}
else
{
$jg_9jo87.=",".$jg_i6vo2;
}
}
$jg_iiyl8=$jg_iiyl8+1;
}
$jg_sj1x1=$jg_9jo87;
$jg_vszip[]=$option['name'].": ".$jg_sj1x1;
$jg_sj1x1="";
}
break;
case (VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'||VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$jg_53xhj=jg_1012z($jg_sj5e8[$jg_b4tsh]);
foreach ($jg_53xhj as $option) {
if ($option['type']=='select'||$option['type']=='radio'||$option['type']=='checkbox') { 
$jg_r85v5=array();
foreach ($option['product_option_value'] as $option_value) {
if (!$option_value['subtract']||($option_value['quantity']>0)) {
$jg_r85v5[]=array(
'product_option_value_id' => $option_value['product_option_value_id'],
'option_value_id'         => $option_value['option_value_id'],
'name'                    => $option_value['name']
);
$jg_sj1x1.=$option_value['name'].",";
}
}
$jg_7uvbk[]=array(
'product_option_id' => $option['product_option_id'],
'option_id'         => $option['option_id'],
'name'              => $option['name'],
'type'              => $option['type'],
'option_value'      => $jg_r85v5,
'required'          => $option['required']
);
} elseif ($option['type']=='text'||$option['type']=='textarea'||$option['type']=='file'||$option['type']=='date'||$option['type']=='datetime'||$option['type']=='time') {
$jg_7uvbk[]=array(
'product_option_id' => $option['product_option_id'],
'option_id'         => $option['option_id'],
'name'              => $option['name'],
'type'              => $option['type'],
'option_value'      => $option['option_value'],
'required'          => $option['required']
);
$jg_sj1x1.=$option['option_value'].",";
}
$jg_pztk6=explode(",",$jg_sj1x1);
$jg_iiyl8=0;
$jg_9jo87="";
foreach($jg_pztk6 as $jg_i6vo2)
{
if ($jg_i6vo2!="")
{
if ($jg_iiyl8==0)
{
$jg_9jo87.=$jg_i6vo2;
}
else
{
$jg_9jo87.=",".$jg_i6vo2;
}
}
$jg_iiyl8=$jg_iiyl8+1;
}
$jg_sj1x1=$jg_9jo87;
if ($option['type']!="file")
{
$jg_vszip[]=$option['name'].": ".$jg_sj1x1;
}
$jg_sj1x1="";
}
break;
default:
break;
}
}
require JG_GQ9ZI;
if($jg_d410tc==jg_2ykgz())
{
$jg_d410tc=$_['text_default'];
}
$jg_nqk5p="<div style=\"margin-top: 5px;\">".$_['text_opencart_product_option'].":</div>";
$jg_nqk5p.="<table class=\"list\" style=\"margin-bottom: 0px; margin-top: 5px; width: auto;\"><tr><td style=\"margin-top: 5px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\">";
$jg_nqk5p.="<span style=\"margin-top: 0px;\">".$_['text_start'].":</span>";
$jg_nqk5p.="<select style=\"margin-top: 0px; margin-left: 5px;\" title=\"".$_['text_starting_product']."\" onchange=\"jg_3razlp(1,this.options[this.selectedIndex].value,".$jg_mjczqn.",'".VERSION."','".$jg_d410tc."');\">";
$jg_qgf4x=0;
$jg_tjni3=0;
$jg_usasb=0;
$jg_evt1n=jg_skyjq();
for ($jg_c4g3o=0; $jg_c4g3o<$jg_evt1n; $jg_c4g3o++)
{
$jg_qgf4x+=1;
$jg_tjni3+=1;
if($jg_tjni3==$jg_m9rcxi)
{
$jg_nqk5p.="<option selected>".$jg_tjni3."</option>\r\n";
$jg_usasb=1;
}
else
{
$jg_nqk5p.="<option>".$jg_tjni3."</option>\r\n";
}
$jg_qgf4x=0;
}
$jg_nqk5p.="</select>";
$jg_nqk5p.="<span style=\"margin-left: 5px; margin-top: 0px;\">".$_['text_limit'].":</span>";
$jg_nqk5p.="<select style=\"margin-top: 0px; margin-left: 5px; margin-right: 5px;\" title=\"".$_['text_limit_number_of_products_queried']."\" onchange=\"jg_3razlp(1,".$jg_m9rcxi.",this.options[this.selectedIndex].value,'".VERSION."','".$jg_d410tc."');\">";
$jg_qhf77=0;
$jg_q5kd1=0;
for ($jg_c4g3o=0; $jg_c4g3o<10; $jg_c4g3o++)
{
$jg_qhf77+=1;
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<100; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=10)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<1000; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=100)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<20000; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=1000)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<100000; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=5000)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nqk5p.="</select>";
$jg_nqk5p.=jg_n10y8($jg_d410tc,$jg_mjczqn);
$jg_nqk5p.="<span id=\"img-refresh-list-products-options-selection-for-attribute-assignments\"><img title=\"".$_['text_refresh']."\" onclick=\"jg_3razlp(1,0,".$jg_mjczqn.",'".VERSION."','".$jg_d410tc."');return false;\"style=\"vertical-align: middle; cursor: pointer; margin-left: 6px; margin-right: 0px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/reset.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/reset.png\" /></span>";
$jg_nqk5p.="</td></tr></table>";
$jg_nqk5p.="<select multiple=\"multiple\" name=\"opencart_product_option\" id=\"opencart_product_option\" style=\"height: 200px; margin-top: 8px; margin-bottom: 8px;\">\r\n";
for ($jg_4ps78=0; $jg_4ps78<count($jg_vszip); $jg_4ps78++)
{
$jg_nqk5p.="<option>".$jg_vszip[$jg_4ps78]."</option>";
}
$jg_vszip=array_keys(array_count_values($jg_vszip));
$jg_nqk5p.=implode($jg_vszip);
$jg_nqk5p.="</select>";
return $jg_nqk5p;
}
function jg_q137i($jg_10dvna,$jg_m9rcxi,$jg_mjczqn,$jg_d410tc)
{
$jg_lrcjj=DB_PREFIX."product";
$jg_i8por=DB_PREFIX."product_description";
$jg_b4tsh="product_id";
$column_name="name";
$jg_9a1fb=($jg_10dvna-1)*$jg_mjczqn;
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_i8por." , ".$jg_lrcjj." WHERE ".$jg_lrcjj.".".$jg_b4tsh."=".$jg_i8por.".".$jg_b4tsh." AND ".$jg_i8por.".language_id=".JG_RBM6Z." ORDER BY ".$jg_i8por.".".$column_name." ASC LIMIT ".$jg_9a1fb.",".$jg_mjczqn.";") or die (mysql_error());
$jg_3103v=array();
while($jg_sj5e8=mysql_fetch_array($jg_xrpiy))
{
$jg_k10wi=$jg_sj5e8[$column_name];
$jg_3o9hb=$jg_sj5e8[$jg_b4tsh];
$jg_3103v[]=jg_zu9x1($jg_3o9hb,$jg_k10wi);
}
require JG_GQ9ZI;
if($jg_d410tc==jg_2ykgz())
{
$jg_d410tc=$_['text_default'];
}
$jg_nqk5p="<div style=\"margin-top: 5px;\">".$_['text_opencart_product_name'].":</div>";
$jg_nqk5p.="<table class=\"list\" style=\"margin-bottom: 0px; margin-top: 5px; width: auto;\"><tr><td style=\"margin-top: 5px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\">";
$jg_nqk5p.="<span style=\"margin-top: 8px;\">".$_['text_page'].":</span>";
$jg_nqk5p.="<select style=\"margin-top: 0px; margin-left: 5px;\" title=\"".$_['text_page_number']."\" onchange=\"jg_xylwf1(this.options[this.selectedIndex].value,".$jg_10dvna.",".$jg_mjczqn.",'".$jg_d410tc."');\">";
$jg_qgf4x=0;
$jg_tjni3=0;
$jg_usasb=0;
$jg_evt1n=jg_skyjq();
for ($jg_c4g3o=0; $jg_c4g3o<=$jg_evt1n; $jg_c4g3o++)
{
$jg_qgf4x+=1;
if($jg_qgf4x>=$jg_mjczqn)
{
$jg_tjni3+=1;
if($jg_tjni3==$jg_10dvna)
{
$jg_nqk5p.="<option selected>".$jg_tjni3."</option>\r\n";
$jg_usasb=1;
}
else
{
$jg_nqk5p.="<option>".$jg_tjni3."</option>\r\n";
}
$jg_qgf4x=0;
}
}
if($jg_tjni3==0)
{
if($jg_usasb==1)
{
$jg_nqk5p.="<option>".((string)$jg_tjni3+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option selected>".((string)$jg_tjni3+1)."</option>\r\n";
}
}
$jg_nqk5p.="</select>";
$jg_nqk5p.="<span style=\"margin-left: 8px; margin-top: 0px;\">".$_['text_limit'].":</span>";
$jg_nqk5p.="<select style=\"margin-top: 0px; margin-left: 5px; margin-right: 5px;\" title=\"".$_['text_limit_number_of_products_displayed']."\" onchange=\"jg_xylwf1(".$jg_10dvna.",".$jg_m9rcxi.",this.options[this.selectedIndex].value,'".$jg_d410tc."');\">";
$jg_qhf77=0;
$jg_q5kd1=0;
for ($jg_c4g3o=0; $jg_c4g3o<10; $jg_c4g3o++)
{
$jg_qhf77+=1;
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<100; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=10)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<1000; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=100)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<20000; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=1000)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<100000; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=5000)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nqk5p.="</select>";
$jg_nqk5p.=jg_16twt($jg_d410tc,$jg_mjczqn);
$jg_nqk5p.="<span id=\"img-refresh-list-products-names-selection-for-attribute-assignments\"><img title=\"".$_['text_refresh']."\" onclick=\"jg_xylwf1(1,0,".$jg_mjczqn.",'".$jg_d410tc."');return false;\"style=\"vertical-align: middle; cursor: pointer; margin-left: 6px; margin-right: 0px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/reset.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/reset.png\" /></span>";
$jg_nqk5p.="</td></tr></table>";
$jg_nqk5p=$jg_nqk5p."<select multiple=\"multiple\" name=\"opencart_product\" id=\"opencart_product\" style=\"height: 200px; margin-top: 8px; margin-bottom: 8px;\">\r\n";
foreach($jg_3103v as $jg_1w4l9=>$jg_9jo87)
{
$jg_nqk5p.="<option id=".$jg_9jo87['id'].">".$jg_9jo87['name']."</option>\r\n";
}
$jg_nqk5p.="</select>";
return $jg_nqk5p;
}
function jg_3gyyq($jg_10dvna,$jg_m9rcxi,$jg_mjczqn,$jg_d410tc)
{
$jg_lrcjj=DB_PREFIX."product";
$jg_i8por=DB_PREFIX."product_description";
$jg_b4tsh="product_id";
$column_name="name";
$jg_9a1fb=($jg_10dvna-1)*$jg_mjczqn;
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_i8por." , ".$jg_lrcjj." WHERE ".$jg_lrcjj.".".$jg_b4tsh."=".$jg_i8por.".".$jg_b4tsh." AND ".$jg_i8por.".language_id=".jg_s7xf6($jg_d410tc)." ORDER BY ".$jg_i8por.".".$column_name." ASC LIMIT ".$jg_9a1fb.",".$jg_mjczqn.";") or die (mysql_error());
$jg_3103v=array();
while($jg_sj5e8=mysql_fetch_array($jg_xrpiy))
{
$jg_k10wi=$jg_sj5e8[$column_name];
$jg_3o9hb=$jg_sj5e8[$jg_b4tsh];
$jg_3103v[]=jg_zu9x1($jg_3o9hb,$jg_k10wi);
}
require JG_GQ9ZI;
if($jg_d410tc==jg_2ykgz())
{
$jg_d410tc=$_['text_default'];
}
$jg_nqk5p="<table class=\"list\" style=\"margin-bottom: 0px; margin-top: 0px; width: auto;\"><tr><td style=\"margin-top: 5px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\">";
$jg_nqk5p.="<span style=\"margin-top: 8px;\">".$_['text_page'].":</span>";
$jg_nqk5p.="<select style=\"margin-top: 0px; margin-left: 5px;\" title=\"".$_['text_page_number']."\" onchange=\"jg_wnke9v(this.options[this.selectedIndex].value,".$jg_10dvna.",".$jg_mjczqn.",'".$jg_d410tc."');\">";
$jg_qgf4x=0;
$jg_tjni3=0;
$jg_usasb=0;
$jg_evt1n=jg_skyjq();
for ($jg_c4g3o=0; $jg_c4g3o<=$jg_evt1n; $jg_c4g3o++)
{
$jg_qgf4x+=1;
if($jg_qgf4x>=$jg_mjczqn)
{
$jg_tjni3+=1;
if($jg_tjni3==$jg_10dvna)
{
$jg_nqk5p.="<option selected>".$jg_tjni3."</option>\r\n";
$jg_usasb=1;
}
else
{
$jg_nqk5p.="<option>".$jg_tjni3."</option>\r\n";
}
$jg_qgf4x=0;
}
}
if($jg_tjni3==0)
{
if($jg_usasb==1)
{
$jg_nqk5p.="<option>".((string)$jg_tjni3+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option selected>".((string)$jg_tjni3+1)."</option>\r\n";
}
}
$jg_nqk5p.="</select>";
$jg_nqk5p.="<span style=\"margin-left: 8px; margin-top: 0px;\">".$_['text_limit'].":</span>";
$jg_nqk5p.="<select style=\"margin-top: 0px; margin-left: 5px; margin-right: 5px;\" title=\"".$_['text_limit_number_of_products_displayed']."\" onchange=\"jg_wnke9v(".$jg_10dvna.",".$jg_m9rcxi.",this.options[this.selectedIndex].value,'".$jg_d410tc."');\">";
$jg_qhf77=0;
$jg_q5kd1=0;
for ($jg_c4g3o=0; $jg_c4g3o<10; $jg_c4g3o++)
{
$jg_qhf77+=1;
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<100; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=10)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<1000; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=100)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<20000; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=1000)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nkm1f=$jg_qhf77;
for ($jg_c4g3o=$jg_nkm1f; $jg_c4g3o<100000; $jg_c4g3o++)
{
$jg_qhf77+=1;
$jg_q5kd1+=1;
if($jg_q5kd1>=5000)
{
if($jg_qhf77==$jg_mjczqn)
{
$jg_nqk5p.="<option selected>".((string)$jg_c4g3o+1)."</option>\r\n";
}
else
{
$jg_nqk5p.="<option>".((string)$jg_c4g3o+1)."</option>\r\n";
}
$jg_q5kd1=0;
}
}
$jg_nqk5p.="</select>";
$jg_nqk5p.=jg_qft35($jg_d410tc,$jg_mjczqn);
$jg_nqk5p.="<span id=\"refresh_products_names_selection_for_editing\">";
$jg_nqk5p.="<img title=\"".$_['text_refresh']."\" onclick=\"jg_wnke9v(1,0,".$jg_mjczqn.",'".$jg_d410tc."');return false;\"style=\"vertical-align: middle; cursor: pointer; margin-left: 6px; margin-right: 0px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/reset.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/reset.png\" />";
$jg_nqk5p.="</span>";
$jg_nqk5p.="</td></tr></table>";
$jg_nqk5p=$jg_nqk5p."<select name=\"opencart_product_for_editing\" id=\"opencart_product_for_editing\" style=\"margin-top: 8px; margin-bottom: 8px;\" onchange=\"jg_ezoexo(this);\">\r\n";
foreach($jg_3103v as $jg_1w4l9=>$jg_9jo87)
{
$jg_nqk5p.="<option id=".$jg_9jo87['id'].">".$jg_9jo87['name']."</option>\r\n";
}
$jg_nqk5p.="</select>";
$this_first_product_id='';
foreach($jg_3103v as $jg_1w4l9=>$jg_9jo87)
{
$this_first_product_id=$jg_9jo87['id'];
break;
}
$jg_nqk5p.="<img title=\"".$_['text_previous']."\" style=\"cursor:pointer; border:none; vertical-align: middle; margin-left: 6px; margin-right: 6px;\" onclick=\"jg_v510dd();\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/back.png\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/back.png\" />";
$jg_nqk5p.="<img title=\"".$_['text_next']."\" style=\"cursor:pointer; border:none; vertical-align: middle; margin-left: 0px; margin-right: 6px;\" onclick=\"jg_ix92ag();\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/forward.png\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/forward.png\" />";
$jg_nqk5p.="<img title=\"".$_['text_view_product']."\" style=\"cursor:pointer; border:none; vertical-align: middle; margin-left: 0px; margin-right: 6px;\" onclick=\"jg_eb9z8l();return false;\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/product-label.png\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/product-label.png\" />";
$jg_nqk5p.="<img title=\"".$_['text_products_feed_specification']."\" style=\"cursor:pointer; border:none; vertical-align: middle; margin-right: 6px;\" onclick=\"window.open('http://www.google.com/support/merchants/bin/answer.py?answer=188494', '_blank');return false;\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" />";
return $jg_nqk5p;
}
function get_product_url($jg_3o9hb,$jg_d410tc)
{
$jg_iicyz='';
if($jg_d410tc=='default'){
$jg_iicyz=jg_2ykgz();
}else{
$jg_iicyz=$jg_d410tc;
}
$jg_iicyz='&language='.$jg_iicyz;
$this_product_url='';
$this_seo_alias='';
if(seo_urls_are_enabled()=='1'){$this_seo_alias=get_seo_alias($jg_3o9hb);}
if ($this_seo_alias=='')
{
$this_store_url=jg_z7dd7(get_first_assigned_store_id($jg_3o9hb));
$this_product_url=$this_store_url.'index.php?route=product/product&product_id='.$jg_3o9hb.$jg_iicyz;
}
else
{
$this_product_url=THIS_CATALOG_URL.$this_seo_alias.$jg_iicyz;
}
return $this_product_url;
}
function seo_urls_are_enabled()
{
$jg_46tp9='';
$jg_4s8uo=DB_PREFIX."setting";
$jg_ogto3=0;
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_4s8uo." WHERE ".$jg_4s8uo.".group='config' AND ".$jg_4s8uo.".key='config_seo_url'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46tp9=$jg_hu8lx["value"];
}
return $jg_46tp9;
}
function get_seo_alias($jg_3o9hb)
{
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."url_alias WHERE ".DB_PREFIX."url_alias.query='product_id=".$jg_3o9hb."'", $jg_9ul65) or die (mysql_error());
$jg_pbnd1=mysql_num_rows($jg_xrpiy);
$jg_i1bmk='';
if( $jg_pbnd1>0 )
{
while($jg_wu10r=mysql_fetch_array($jg_xrpiy))
{
$jg_i1bmk=$jg_wu10r["keyword"];
}
}
return $jg_i1bmk;
}
function get_first_assigned_store_id($jg_3o9hb)
{
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."product_to_store WHERE `product_id`='".$jg_3o9hb."'", $jg_9ul65) or die (mysql_error());
$jg_pbnd1=mysql_num_rows($jg_xrpiy);
$jg_i1bmk='';
if( $jg_pbnd1>0 )
{
while($jg_wu10r=mysql_fetch_array($jg_xrpiy))
{
$jg_i1bmk=$jg_wu10r["store_id"];
}
}
return $jg_i1bmk;
}
function jg_zu9x1($jg_3o9hb,$jg_k10wi)
{
$jg_y3yh5=array();
$jg_y3yh5=array(
'id' => $jg_3o9hb,
'name' => $jg_k10wi
);
return $jg_y3yh5;
}
function jg_i2b41($jg_elcrx)
{
$jg_qzfrd="en-AU";
$jg_wfjqr="cs-CZ";
$jg_j6kab="de-DE";
$jg_owj57="es-ES";
$jg_el8ke="fr-FR";
$jg_dfj51="en-GB";
$jg_jrswg="en-US";
$jg_rudi7="it-IT";
$jg_tgat3="nl-NL";
$jg_9fr8i="pt-BR";
$jg_xghsk="zh-CN";
$jg_ro3da="ja-JP";
$jg_d410tc=$jg_jrswg;
if ($jg_elcrx=="")
{
$jg_elcrx="en";
$jg_d410tc=$jg_jrswg;
}
if ($jg_elcrx=="pt-BR")
{
$jg_d410tc=$jg_9fr8i;
}
if ($jg_elcrx=="cs-CZ")
{
$jg_d410tc=$jg_wfjqr;
}
if ($jg_elcrx=="de")
{
$jg_d410tc=$jg_j6kab;
}
if ($jg_elcrx=="en-AU")
{
$jg_d410tc=$jg_qzfrd;
}
if ($jg_elcrx=="en")
{
$jg_d410tc=$jg_jrswg;
}
if ($jg_elcrx=="en-GB")
{
$jg_d410tc=$jg_dfj51;
}
if ($jg_elcrx=="en")
{
$jg_d410tc=$jg_jrswg;
}
if ($jg_elcrx=="es")
{
$jg_d410tc=$jg_owj57;
}
if ($jg_elcrx=="fr")
{
$jg_d410tc=$jg_el8ke;
}
if ($jg_elcrx=="it")
{
$jg_d410tc=$jg_rudi7;
}
if ($jg_elcrx=="nl")
{
$jg_d410tc=$jg_tgat3;
}
if ($jg_elcrx=="cn")
{
$jg_d410tc=$jg_xghsk;
}
if ($jg_elcrx=="jp")
{
$jg_d410tc=$jg_ro3da;
}
switch ($jg_d410tc)
{
case ($jg_d410tc=='cs-CZ' ||
$jg_d410tc=='de-DE' ||
$jg_d410tc=='en-AU' ||
$jg_d410tc=='en-GB' ||
$jg_d410tc=='en-US' ||
$jg_d410tc=='es-ES' ||
$jg_d410tc=='fr-FR' ||
$jg_d410tc=='it-IT' ||
$jg_d410tc=='ja-JP' ||
$jg_d410tc=='nl-NL' ||
$jg_d410tc=='pt-BR' ||
$jg_d410tc=='zh-CN'):
break;
default:
$jg_d410tc='en-US';
break;
}
$jg_3qmya='<div style="width: auto; height: auto; font-family: Arial,Helvetica,sans-serif;">';
$jg_3qmya.='<style type="text/css">';
$jg_3qmya.='<!--';
$jg_3qmya.='#itemclass_searchable_root span {';
$jg_3qmya.='font-size: 12px;';
$jg_3qmya.='}';
$jg_3qmya.='-->';
$jg_3qmya.='</style> ';
$jg_3qmya.='<table style="margin-top: 0px; margin-bottom: 6px; table-layout: fixed; height: auto; width: auto;" border="0" cellpadding="0" cellspacing="0"><tbody><tr>';
$jg_3qmya.='<td style="border: 1px solid #dddddd; font-size: 12px; vertical-align: top; width: auto; padding-right: 0px; background: #ffffff url(\''.THIS_ADMIN_IMAGE_URL.'field.png\') repeat-x;">';
$jg_3qmya.='<link href="http://www.techsleuth.com/google-merchant-center-feed-for-opencart-files/taxonomy/treestyle.css" rel="stylesheet" type="text/css">';
$jg_3qmya.='<table class="expanded" style="margin-top: 0px; margin-bottom: 0px; margin-left: 0px; margin-right: 0px;"><tr><td style="border-width: 0px; padding: 0px; background-color: transparent;">';
$jg_3qmya.='<div id="selected_category" style="min-width: 280px; white-space: nowrap; overflow: visible; clear: both; height: 16px; border: 1px solid #cccccc; margin-top: 6px; margin-bottom: 0px; margin-left: 6px; margin-right: 6px; padding-left: 2px; padding-right: 2px; font: 12px Arial,Verdana,Helvetica,sans-serif;"></div>';
$jg_3qmya.='</td></tr></table>';
$jg_3qmya.='<div id="search_div" style="display: inline-block; margin-bottom: 0px; margin-left: 6px; vertical-align: middle;">';
$jg_3qmya.='<span style="vertical-align: middle;">';
$jg_3qmya.='Search:';
$jg_3qmya.='</span>';
$jg_3qmya.='<span style="vertical-align: middle;">';
$jg_3qmya.='<input style="margin-bottom: 8px; margin-top: 8px; margin-left: 8px; width: 147px;" id="typotree" type="text">';
$jg_3qmya.='</span>';
$jg_3qmya.='<span style="vertical-align: middle;">';
$jg_3qmya.='<span class="expandall" onclick="expandAll(ic_config);" style="margin-left: 8px; margin-right: 6px;">Expand all &raquo;</span>';
$jg_3qmya.='</span>';
$jg_3qmya.='<div id="itemclass_searchable_root" style="margin-right: 6px; font-size: 12px;"></div>';
$jg_3qmya.='</td>';
$jg_3qmya.='</tr></tbody></table>';
$jg_3qmya.='</div>';
echo $jg_3qmya;
}
function jg_9xioq($jg_6v7hp)
{
global $jg_dxqm4;
if (!file_exists($jg_dxqm4)){jg_53vxi();}
$jg_9dug9=new DOMDocument("1.0");
$jg_9dug9->load( $jg_dxqm4 );
$jg_x2fz9=$jg_9dug9->getElementsByTagName( "automatic_sef_urls_disabled_stores" );
$jg_ogto3=0;
foreach( $jg_x2fz9 as $jg_exarv )
{
$jg_gg9ln=$jg_exarv->getElementsByTagName( "disabled_store" );
foreach( $jg_gg9ln as $jg_d1egs )
{
if($jg_6v7hp==$jg_gg9ln->item($jg_ogto3)->nodeValue)
{
$jg_d1egs->parentNode->removeChild($jg_d1egs);
}
$jg_ogto3=$jg_ogto3+1;
}
break;
}
$jg_9dug9->save($jg_dxqm4);
}
function jg_a6w4c($jg_6v7hp)
{
global $jg_ynta5;
if (!file_exists($jg_ynta5)){jg_udlr9();}
if(jg_jyft8($jg_6v7hp)==false)
{
$jg_9dug9=new DOMDocument("1.0");
$jg_9dug9->load( $jg_ynta5 );
$jg_q4h1i=$jg_9dug9->getElementsByTagName( "automatic_sef_urls_collapsed_stores" );
foreach( $jg_q4h1i as $jg_r9f81 )
{
$jg_gvghm=$jg_9dug9->createElement("collapsed_store");
$jg_r9f81->appendChild($jg_gvghm);
$jg_t9aje=$jg_9dug9->createTextNode($jg_6v7hp);
$jg_gvghm->appendChild($jg_t9aje);
$jg_9dug9->save($jg_ynta5);
break;
}
}
}
function jg_x2mru($jg_6v7hp)
{
global $jg_ynta5;
if (!file_exists($jg_ynta5)){jg_udlr9();}
if(jg_jyft8($jg_6v7hp)!==false)
{
global $jg_ynta5;
$jg_9dug9=new DOMDocument("1.0");
$jg_9dug9->load( $jg_ynta5 );
$jg_x2fz9=$jg_9dug9->getElementsByTagName( "automatic_sef_urls_collapsed_stores" );
$jg_ogto3=0;
foreach( $jg_x2fz9 as $jg_exarv )
{
$jg_q4h1i=$jg_exarv->getElementsByTagName( "collapsed_store" );
foreach( $jg_q4h1i as $jg_r9f81 )
{
if($jg_6v7hp==$jg_q4h1i->item($jg_ogto3)->nodeValue)
{
$jg_r9f81->parentNode->removeChild($jg_r9f81);
}
$jg_ogto3=$jg_ogto3+1;
}
break;
}
$jg_9dug9->save($jg_ynta5);
}
}
function jg_4ram9($jg_6v7hp)
{
global $jg_dxqm4;
if (!file_exists($jg_dxqm4)){
jg_53vxi();
}
$jg_9dug9=new DOMDocument("1.0");
$jg_9dug9->load( $jg_dxqm4 );
$jg_x2fz9=$jg_9dug9->getElementsByTagName( "automatic_sef_urls_disabled_stores" );
$jg_ogto3=0;
$jg_v105w=false;
foreach( $jg_x2fz9 as $jg_exarv )
{
$jg_gg9ln=$jg_exarv->getElementsByTagName( "disabled_store" );
foreach( $jg_gg9ln as $jg_d1egs )
{
$jg_9jo87=$jg_gg9ln->item($jg_ogto3)->nodeValue;
if ($jg_6v7hp==$jg_9jo87)
{
$jg_v105w=true;
}
$jg_ogto3=$jg_ogto3+1;
}
break;
}
return $jg_v105w;
}
function jg_jyft8($jg_6v7hp)
{
global $jg_ynta5;
if (!file_exists($jg_ynta5)){
jg_udlr9();
}
$jg_9dug9=new DOMDocument("1.0");
$jg_9dug9->load( $jg_ynta5 );
$jg_x2fz9=$jg_9dug9->getElementsByTagName( "automatic_sef_urls_collapsed_stores" );
$jg_ogto3=0;
$jg_v105w=false;
foreach( $jg_x2fz9 as $jg_exarv )
{
$jg_q4h1i=$jg_exarv->getElementsByTagName( "collapsed_store" );
foreach( $jg_q4h1i as $jg_r9f81 )
{
$jg_9jo87=$jg_q4h1i->item($jg_ogto3)->nodeValue;
if ($jg_6v7hp==$jg_9jo87)
{
$jg_v105w=true;
}
$jg_ogto3=$jg_ogto3+1;
}
break;
}
return $jg_v105w;
}
function jg_dzd61()
{
global $jg_dxqm4;
if (!file_exists($jg_dxqm4)){jg_53vxi();}
$jg_9dug9=new DOMDocument("1.0");
$jg_9dug9->load( $jg_dxqm4 );
$jg_x2fz9=$jg_9dug9->getElementsByTagName( "automatic_sef_urls_disabled_stores" );
$jg_ogto3=0;
foreach( $jg_x2fz9 as $jg_exarv )
{
$jg_gg9ln=$jg_exarv->getElementsByTagName( "disabled_store" );
foreach( $jg_gg9ln as $jg_d1egs )
{
$jg_ogto3=$jg_ogto3+1;
}
break;
}
return $jg_ogto3;
}
function jg_10bqg($jg_6v7hp)
{
global $jg_dxqm4;
if (!file_exists($jg_dxqm4)){jg_53vxi();}
$jg_9dug9=new DOMDocument("1.0");
$jg_9dug9->load( $jg_dxqm4 );
$jg_gg9ln=$jg_9dug9->getElementsByTagName( "automatic_sef_urls_disabled_stores" );
foreach( $jg_gg9ln as $jg_d1egs )
{
$jg_gvghm=$jg_9dug9->createElement("disabled_store");
$jg_d1egs->appendChild($jg_gvghm);
$jg_t9aje=$jg_9dug9->createTextNode($jg_6v7hp);
$jg_gvghm->appendChild($jg_t9aje);
$jg_9dug9->save($jg_dxqm4);
break;
}
}
function jg_tz3k1($jg_6v7hp)
{
global $jg_kme4n;
if($jg_6v7hp==0)
{
$jg_46tp9=$jg_kme4n;
}
else
{
$jg_46tp9=str_replace('.xml', '.store.id.'.$jg_6v7hp.'.xml', $jg_kme4n);
}
return $jg_46tp9;
}
function jg_1jol2($jg_5atm6,$jg_ggk77,$jg_xxtmi,$jg_6v7hp)
{
$jg_pmcic=jg_tz3k1($jg_6v7hp);
if ((!file_exists($jg_pmcic))||(jg_jlfyq($jg_6v7hp)!=JG_JNAMF)){jg_610hc($jg_pmcic,$jg_6v7hp);}
jg_7j2fe(jg_n36ho($jg_5atm6));
require JG_GQ9ZI;
if (($jg_xxtmi=="all")||($jg_xxtmi==$_['text_all'])){$jg_xxtmi="";}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( $jg_pmcic );
$jg_10b3n=$jg_9dug9->getElementsByTagName( "google_merchant_center_feed_data_feeds" );
foreach( $jg_10b3n as $jg_pw4n1 )
{
$jg_bvxyd=$jg_pw4n1->getElementsByTagName( "data_feed" ); 
foreach( $jg_bvxyd as $jg_l910j )
{
$jg_ot998=$jg_l910j->getElementsByTagName( "target_country" );
if ($jg_5atm6==$jg_ot998->item(0)->nodeValue)
{
if($jg_ggk77!='undefined')
{
$jg_clswf=$jg_l910j->getElementsByTagName( "language_code" );
$jg_ho93z=0;
foreach( $jg_clswf as $jg_oiolx )
{
$jg_oiolx->nodeValue=jg_4ghsp($jg_ggk77);
$jg_ho93z+=1;
break;
}
if($jg_ho93z==0)
{
$jg_ugeis=$jg_9dug9->createElement("language_code");
$jg_l910j->appendChild($jg_ugeis);
$jg_ugeis->nodeValue=jg_dgsqr($jg_ggk77);
}
}
if($jg_xxtmi!='undefined')
{
$jg_l910j->getElementsByTagName( "items_per_page" )->item(0)->nodeValue=jg_dgsqr($jg_xxtmi);
}
$jg_l910j->getElementsByTagName( "feed_url" )->item(0)->nodeValue="";
}
}
}
$jg_9dug9->save($jg_pmcic);
jg_vb104($jg_pmcic);
}
function jg_610hc($jg_kme4n,$jg_6v7hp)
{
$jg_9dug9=new DOMDocument("1.0");
$jg_cjdy7=$jg_9dug9->createElement("google_merchant_center_feed_data_feeds");
$jg_9dug9->appendChild($jg_cjdy7);
$jg_9dug9->save($jg_kme4n);
jg_vb104($jg_kme4n);
require JG_GQ9ZI;
jg_wb5m2($jg_kme4n,'Australia', 'AUD', 'default', '');
jg_wb5m2($jg_kme4n,'Brazil', 'BRL', 'default', '');
jg_wb5m2($jg_kme4n,'Canada', 'CAD', 'default', '');
jg_wb5m2($jg_kme4n,'China', 'CNY', 'default', '');
jg_wb5m2($jg_kme4n,'Czech Republic', 'CZK', 'default', '');
jg_wb5m2($jg_kme4n,'France', 'EUR', 'default', '');
jg_wb5m2($jg_kme4n,'Germany', 'EUR', 'default', '');
jg_wb5m2($jg_kme4n,'Italy', 'EUR', 'default', '');
jg_wb5m2($jg_kme4n,'Japan', 'JPY', 'default', '');
jg_wb5m2($jg_kme4n,'Netherlands', 'EUR', 'default', '');
jg_wb5m2($jg_kme4n,'Spain', 'EUR', 'default', '');
jg_wb5m2($jg_kme4n,'Switzerland', 'CHF', 'default', '');
jg_wb5m2($jg_kme4n,'United Kingdom', 'GBP', 'default', '');
jg_wb5m2($jg_kme4n,'United States', 'USD', 'default', '');
}
function jg_jkr8b($jg_jbr5e,$jg_v4r4h,$jg_uz4ft)
{
$jg_uz4ft=jg_10sbg($jg_uz4ft);
$jg_uz4ft=jg_4ghsp(jg_dgsqr($jg_uz4ft));
$jg_9dug9=new DOMDocument("1.0");
$jg_cjdy7=$jg_9dug9->createElement($jg_v4r4h);
$jg_9dug9->appendChild($jg_cjdy7);
$jg_t9aje=$jg_9dug9->createTextNode($jg_uz4ft);
$jg_cjdy7->appendChild($jg_t9aje);
$jg_9dug9->save($jg_jbr5e);
jg_vb104($jg_jbr5e);
}
function jg_53vxi()
{
global $jg_dxqm4;
$jg_9dug9=new DOMDocument("1.0");
$jg_cjdy7=$jg_9dug9->createElement("automatic_sef_urls_disabled_stores");
$jg_9dug9->appendChild($jg_cjdy7);
$jg_t9aje=$jg_9dug9->createTextNode("");
$jg_cjdy7->appendChild($jg_t9aje);
$jg_9dug9->save($jg_dxqm4);
jg_vb104($jg_dxqm4);
}
function jg_udlr9()
{
global $jg_ynta5;
$jg_9dug9=new DOMDocument("1.0");
$jg_cjdy7=$jg_9dug9->createElement("automatic_sef_urls_collapsed_stores");
$jg_9dug9->appendChild($jg_cjdy7);
$jg_t9aje=$jg_9dug9->createTextNode("");
$jg_cjdy7->appendChild($jg_t9aje);
$jg_9dug9->save($jg_ynta5);
jg_vb104($jg_ynta5);
}
function jg_zxeqn($jg_46tp9)
{
global $jg_n4vej;
$jg_9dug9=new DOMDocument("1.0");
$jg_cjdy7=$jg_9dug9->createElement("default_convert_non_compliant_characters");
$jg_9dug9->appendChild($jg_cjdy7);
$jg_t9aje=$jg_9dug9->createTextNode($jg_46tp9);
$jg_cjdy7->appendChild($jg_t9aje);
$jg_9dug9->save($jg_n4vej);
jg_vb104($jg_n4vej);
}
function jg_odx7c($jg_46tp9)
{
global $jg_10nm2;
$jg_9dug9=new DOMDocument("1.0");
$jg_cjdy7=$jg_9dug9->createElement("default_use_sef_urls_for_data_feed_urls_list");
$jg_9dug9->appendChild($jg_cjdy7);
$jg_t9aje=$jg_9dug9->createTextNode($jg_46tp9);
$jg_cjdy7->appendChild($jg_t9aje);
$jg_9dug9->save($jg_10nm2);
jg_vb104($jg_10nm2);
}
function jg_msvji1($jg_46tp9)
{
global $jg_510jc;
$jg_9dug9=new DOMDocument("1.0");
$jg_cjdy7=$jg_9dug9->createElement("default_remove_html_tags_from_product_descriptions");
$jg_9dug9->appendChild($jg_cjdy7);
$jg_t9aje=$jg_9dug9->createTextNode($jg_46tp9);
$jg_cjdy7->appendChild($jg_t9aje);
$jg_9dug9->save($jg_510jc);
jg_vb104($jg_510jc);
}
function save_xml_default_enclose_xml_data_feed_attributes_within_cdata_sections($jg_46tp9)
{
$jg_9dug9=new DOMDocument("1.0");
$jg_cjdy7=$jg_9dug9->createElement("default_surround_xml_data_feed_attributes_with_cdata_tags");
$jg_9dug9->appendChild($jg_cjdy7);
$jg_t9aje=$jg_9dug9->createTextNode($jg_46tp9);
$jg_cjdy7->appendChild($jg_t9aje);
$jg_9dug9->save(JG_JIRQW);
jg_vb104(JG_JIRQW);
}
function save_xml_default_use_weight_for_shipping_weight($jg_46tp9)
{
$jg_9dug9=new DOMDocument("1.0");
$jg_cjdy7=$jg_9dug9->createElement("default_use_weight_for_shipping_weight");
$jg_9dug9->appendChild($jg_cjdy7);
$jg_t9aje=$jg_9dug9->createTextNode($jg_46tp9);
$jg_cjdy7->appendChild($jg_t9aje);
$jg_9dug9->save(JG_CJPFR);
jg_vb104(JG_CJPFR);
}
function jg_gk3eeq($jg_46tp9)
{
global $jg_ee103o;
$jg_9dug9=new DOMDocument("1.0");
$jg_cjdy7=$jg_9dug9->createElement("default_shorten_product_descriptions_to_10000_characters_or_less");
$jg_9dug9->appendChild($jg_cjdy7);
$jg_t9aje=$jg_9dug9->createTextNode($jg_46tp9);
$jg_cjdy7->appendChild($jg_t9aje);
$jg_9dug9->save($jg_ee103o);
jg_vb104($jg_ee103o);
}
function jg_jdoht3($jg_46tp9)
{
global $jg_2am32;
$jg_9dug9=new DOMDocument("1.0");
$jg_cjdy7=$jg_9dug9->createElement("default_correct_lone_ampersands_in_product_names_and_descriptions");
$jg_9dug9->appendChild($jg_cjdy7);
$jg_t9aje=$jg_9dug9->createTextNode($jg_46tp9);
$jg_cjdy7->appendChild($jg_t9aje);
$jg_9dug9->save($jg_2am32);
jg_vb104($jg_2am32);
}
function jg_t7jqd($jg_46tp9)
{
global $jg_lyk62;
$jg_9dug9=new DOMDocument("1.0");
$jg_cjdy7=$jg_9dug9->createElement("default_do_not_merge_custom_attribute_assignments");
$jg_9dug9->appendChild($jg_cjdy7);
$jg_t9aje=$jg_9dug9->createTextNode($jg_46tp9);
$jg_cjdy7->appendChild($jg_t9aje);
$jg_9dug9->save($jg_lyk62);
jg_vb104($jg_lyk62);
}
function jg_vkcar($jg_mrd8g,$jg_5pky2)
{
require JG_GQ9ZI;
$jg_kbsy5=intval(jg_exioi('product',$jg_mrd8g));
if($jg_5pky2>=$jg_kbsy5){}else{
echo $_['text_the_new_length'].' '.(string)$jg_5pky2.' '.$_['text_is_shorter_than_the_longest_value_in_the_column'].' '.$jg_kbsy5.'.'."\r\n";
echo $_['text_unable_to_continue_or_data_would_be_truncated']."\r\n";
echo $_['text_please_shorten_the_values_or_choose_a_longer_column_length'];
exit;
}
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("ALTER TABLE ".DB_PREFIX."product MODIFY `".$jg_mrd8g."` VARCHAR(".(string)$jg_5pky2.");", $jg_9ul65) or die (mysql_error());
}
function jg_dngng($jg_mrd8g)
{
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_i1bmk='';
$jg_xrpiy=mysql_query("SHOW COLUMNS  FROM ".DB_PREFIX."product");
while($jg_9mzuk=mysql_fetch_assoc($jg_xrpiy)){
if($jg_9mzuk['Field']==$jg_mrd8g)
{
$jg_i1bmk=$jg_9mzuk['Type'];
$jg_3q2si=trim($jg_i1bmk);
if(strpos($jg_i1bmk, '(') !== false){
$jg_3q2si=explode('(',trim($jg_i1bmk));
$jg_3q2si=explode(')',trim($jg_3q2si[1]));
}
$jg_i1bmk=$jg_3q2si[0];
}
}
return $jg_i1bmk;
}
function jg_exioi($jg_a4dkn,$jg_hax6g)
{
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_46tp9='';
$jg_xrpiy=mysql_query("SELECT MAX(LENGTH(".DB_PREFIX."product.".$jg_hax6g.")) FROM ".DB_PREFIX."product;", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46tp9=$jg_hu8lx[0];
}
return $jg_46tp9;
}
function save_db_setting_password_protect_the_data_feed($jg_i5s61)
{
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_ogto3=0;
$jg_46tp9='';
$jg_p6ntr=$jg_i5s61;
$jg_3ww98='password_protect_the_data_feed';
$jg_xrpiy=mysql_query("SELECT * FROM ".DB_PREFIX."setting WHERE ".DB_PREFIX."setting.group='google_merchant_center_feed' AND ".DB_PREFIX."setting.key='".$jg_3ww98."'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46tp9=$jg_hu8lx["value"];
$jg_ogto3+=1;
}
if($jg_ogto3>1)
{
$jg_xrpiy=mysql_query("DELETE FROM ".DB_PREFIX."setting WHERE ".DB_PREFIX."setting.group='google_merchant_center_feed' AND `key`='".$jg_3ww98."'", $jg_9ul65) or die (mysql_error());
$jg_ogto3=0;
}
if($jg_ogto3==0)
{
$jg_xrpiy=mysql_query("INSERT INTO ".DB_PREFIX."setting SET ".DB_PREFIX."setting.group='google_merchant_center_feed', `key`='".$jg_3ww98."', `value`='".$jg_p6ntr."'", $jg_9ul65) or die (mysql_error());
}
else
{
if($jg_46tp9!==$jg_p6ntr)
{
$jg_xrpiy=mysql_query("UPDATE ".DB_PREFIX."setting SET `value`='".$jg_p6ntr."' WHERE ".DB_PREFIX."setting.group='google_merchant_center_feed' AND ".DB_PREFIX."setting.key='".$jg_3ww98."'", $jg_9ul65) or die (mysql_error());
}
}
}
function jg_qrqyn($jg_i5s61)
{
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_ogto3=0;
$jg_46tp9='';
$jg_p6ntr=$jg_i5s61;
$jg_3ww98='jg_wj2fzj';
$jg_xrpiy=mysql_query("SELECT * FROM ".DB_PREFIX."setting WHERE ".DB_PREFIX."setting.group='google_merchant_center_feed' AND ".DB_PREFIX."setting.key='".$jg_3ww98."'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46tp9=$jg_hu8lx["value"];
$jg_ogto3+=1;
}
if($jg_ogto3>1)
{
$jg_xrpiy=mysql_query("DELETE FROM ".DB_PREFIX."setting WHERE ".DB_PREFIX."setting.group='google_merchant_center_feed' AND `key`='".$jg_3ww98."'", $jg_9ul65) or die (mysql_error());
$jg_ogto3=0;
}
if($jg_ogto3==0)
{
$jg_xrpiy=mysql_query("INSERT INTO ".DB_PREFIX."setting SET ".DB_PREFIX."setting.group='google_merchant_center_feed', `key`='".$jg_3ww98."', `value`='".$jg_p6ntr."'", $jg_9ul65) or die (mysql_error());
}
else
{
if($jg_46tp9!==$jg_p6ntr)
{
$jg_xrpiy=mysql_query("UPDATE ".DB_PREFIX."setting SET `value`='".$jg_p6ntr."' WHERE ".DB_PREFIX."setting.group='google_merchant_center_feed' AND ".DB_PREFIX."setting.key='".$jg_3ww98."'", $jg_9ul65) or die (mysql_error());
}
}
}
function jg_lufy1($jg_i5s61)
{
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_ogto3=0;
$jg_46tp9='';
$jg_p6ntr=$jg_i5s61;
$jg_3ww98='jg_rfcpqv';
$jg_xrpiy=mysql_query("SELECT * FROM ".DB_PREFIX."setting WHERE ".DB_PREFIX."setting.group='google_merchant_center_feed' AND ".DB_PREFIX."setting.key='".$jg_3ww98."'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46tp9=$jg_hu8lx["value"];
$jg_ogto3+=1;
}
if($jg_ogto3>1)
{
$jg_xrpiy=mysql_query("DELETE FROM ".DB_PREFIX."setting WHERE ".DB_PREFIX."setting.group='google_merchant_center_feed' AND `key`='".$jg_3ww98."'", $jg_9ul65) or die (mysql_error());
$jg_ogto3=0;
}
if($jg_ogto3==0)
{
$jg_xrpiy=mysql_query("INSERT INTO ".DB_PREFIX."setting SET ".DB_PREFIX."setting.group='google_merchant_center_feed', `key`='".$jg_3ww98."', `value`='".$jg_p6ntr."'", $jg_9ul65) or die (mysql_error());
}
else
{
if($jg_46tp9!==$jg_p6ntr)
{
$jg_xrpiy=mysql_query("UPDATE ".DB_PREFIX."setting SET `value`='".$jg_p6ntr."' WHERE ".DB_PREFIX."setting.group='google_merchant_center_feed' AND ".DB_PREFIX."setting.key='".$jg_3ww98."'", $jg_9ul65) or die (mysql_error());
}
}
}
function jg_u62g7($jg_7qg2b)
{
global $jg_5od28;
$jg_9dug9=new DOMDocument("1.0");
$jg_cjdy7=$jg_9dug9->createElement("data_feed_format");
$jg_9dug9->appendChild($jg_cjdy7);
$jg_t9aje=$jg_9dug9->createTextNode($jg_7qg2b);
$jg_cjdy7->appendChild($jg_t9aje);
$jg_9dug9->save($jg_5od28);
jg_vb104($jg_5od28);
}
function jg_pi753($jg_taxb1)
{
global $jg_y74wl;
$jg_9dug9=new DOMDocument("1.0");
$jg_cjdy7=$jg_9dug9->createElement("taxonomy_language");
$jg_9dug9->appendChild($jg_cjdy7);
$jg_t9aje=$jg_9dug9->createTextNode($jg_taxb1);
$jg_cjdy7->appendChild($jg_t9aje);
$jg_9dug9->save($jg_y74wl);
jg_vb104($jg_y74wl);
}
function save_data_custom_product_field_value($jg_gulpw,$jg_e10w1,$jg_10ak9)
{
$jg_gulpw=jg_10sbg($jg_gulpw);
$jg_gulpw=jg_4ghsp(jg_dgsqr($jg_gulpw));
$jg_gulpw=str_replace("'", "&#39;", $jg_gulpw);
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_ogto3=0;
$jg_46tp9='';
$jg_p6ntr=$jg_gulpw;
$jg_3ww98='jg_wj2fzj';
$jg_xrpiy=mysql_query("SELECT ".DB_PREFIX."product.product_id FROM ".DB_PREFIX."product WHERE ".DB_PREFIX."product.product_id='".$jg_e10w1."'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46tp9=$jg_hu8lx["product_id"];
$jg_ogto3+=1;
}
if($jg_ogto3==0)
{
}
else
{
if($jg_46tp9!==$jg_p6ntr)
{
$jg_xrpiy=mysql_query("UPDATE ".DB_PREFIX."product SET `".$jg_10ak9."`='".$jg_p6ntr."' WHERE ".DB_PREFIX."product.product_id='".$jg_e10w1."'", $jg_9ul65) or die (mysql_error());
jg_jx263('product');
}
}
}
function save_extension_status_now($jg_nmefe)
{
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_ogto3=0;
$jg_46tp9='';
$jg_p6ntr=$jg_nmefe;
$jg_4zyem='google_base_techsleuth';
$jg_3ww98='google_base_techsleuth_status';
$jg_xrpiy=mysql_query("SELECT * FROM ".DB_PREFIX."setting WHERE ".DB_PREFIX."setting.group='".$jg_4zyem."' AND ".DB_PREFIX."setting.key='".$jg_3ww98."'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46tp9=$jg_hu8lx["value"];
$jg_ogto3+=1;
}
if($jg_ogto3>1)
{
$jg_xrpiy=mysql_query("DELETE FROM ".DB_PREFIX."setting WHERE ".DB_PREFIX."setting.group='".$jg_4zyem."' AND `key`='".$jg_3ww98."'", $jg_9ul65) or die (mysql_error());
$jg_ogto3=0;
}
if($jg_ogto3==0)
{
$jg_xrpiy=mysql_query("INSERT INTO ".DB_PREFIX."setting SET ".DB_PREFIX."setting.group='".$jg_4zyem."', `key`='".$jg_3ww98."', `value`='".$jg_p6ntr."'", $jg_9ul65) or die (mysql_error());
}
else
{
if($jg_46tp9!==$jg_p6ntr)
{
$jg_xrpiy=mysql_query("UPDATE ".DB_PREFIX."setting SET `value`='".$jg_p6ntr."' WHERE ".DB_PREFIX."setting.group='".$jg_4zyem."' AND ".DB_PREFIX."setting.key='".$jg_3ww98."'", $jg_9ul65) or die (mysql_error());
}
}
}
function jg_jx263($jg_w4nnq)
{
$jg_hllkr='';
switch ($jg_w4nnq)
{
case ('currency'):
$jg_hllkr='cache.currency.*';
break;
case ('language'):
$jg_hllkr='cache.language.*';
break;
case ('product'):
$jg_hllkr="cache.product.*";
break;
default:
exit;
break;
}
$jg_f106l=getcwd();
chdir(DIR_CACHE);
foreach (glob($jg_hllkr) as $jg_p10ny) {
unlink($jg_p10ny);
}
chdir($jg_f106l);
}
function jg_3e2cf($jg_l86l4)
{
if (!file_exists($jg_l86l4))
{
echo "Could not save file:&nbsp;&nbsp;".$jg_l86l4."<br />";
echo "Please adjust the directory permissions so this extension can create the file.<br />";
echo "See Frequently Asked Questions, Does this extension require special directory permissions?<br />";
}
}
function jg_vb104($jg_l86l4)
{
require JG_GQ9ZI;
if (!file_exists($jg_l86l4))
{
echo "<table class=\"list\">";
echo "<tr>";
echo "<td>";
echo "Could not save file:&nbsp;&nbsp;".getcwd()."/".$jg_l86l4."<br />";
echo "Please adjust the directory permissions as described in Frequently Asked Questions # 9, or alternatively download and copy the default XML files from <a href=\"http://www.techsleuth.com/google-merchant-center-feed-for-opencart-files/xml.settings.default.v".$_['text_extension_version'].".zip\" target=\"_blank\">here</a> and copy them to the directory /admin.<br />";
echo "</td>";
echo "</tr>";
echo "</table>";
}
}
function jg_aquit()
{
require JG_GQ9ZI;
echo "<table class=\"list\" style=\"width: 100%; border-bottom-width: 0px; border-top-width: 0px; border-left-width: 0px; border-right-width: 0px; margin-bottom: 0px;\" id=\"custom-product-fields-table\">";
echo "<tr>";
echo "<td style=\"color: white; text-align: left; width: 100px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."header.png') repeat-x !important; border-right-width: 0px; \" colspan=6>";
echo "<b>".$_['text_custom_product_fields']."</b>";
echo "<span onclick=\"jg_b711zm();\" id=\"button_refresh_custom_product_fields_list\" style=\"cursor: pointer; margin-left: 6px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_refresh']."\" src=\"".THIS_ADMIN_IMAGE_URL."filemanager/refresh.png\" lowsrc=\"".THIS_ADMIN_IMAGE_URL."filemanager/refresh.png\"/></span>";
echo "<span onclick=\"jg_spj2t8();\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_add']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/edit-add.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/edit-add.png\" /></span>";
echo "<span onclick=\"jg_810zky();\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_remove']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/edit-remove.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/edit-remove.png\" /></span>";
echo "<span onclick=\"jg_44bzt1();\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_edit']."\" src=\"".THIS_ADMIN_IMAGE_URL."filemanager/edit-rename.png\" lowsrc=\"".THIS_ADMIN_IMAGE_URL."filemanager/edit-rename.png\" /></span>";
echo "<span onclick=\"jg_59hymu(this);\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\" id=\"show-hover-div-select-field-length-hovered-solo-".(string)rand(100000, 1000000)."\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_resize_field']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/resize.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/resize.png\" /></span>";
echo "<span onclick=\"jg_e4rjk1();\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_move_up']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-up.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-up.png\" /></span>";
echo "<span onclick=\"jg_tdj1xq();\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_move_down']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-down.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-down.png\" /></span>";
echo "<span onclick=\"jg_go3j2z();return false;\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_view_custom_product_fields_list_file']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/file-list.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/file-list.png\" /></span>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding-left: 0px; padding-right: 5px; padding-top: 5px; padding-bottom: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\">";
echo "<input type=\"checkbox\" id=\"checkbox-select-all-attribute-assignments\" title=\"".$_['text_toggle_rows_checked']."\" style=\"display: inline; vertical-align: middle; margin-left: 5px; padding-left: 0px; margin-right: 8px;\" onclick=\"jg_8ki7lu();\"></input>";
echo "<span style=\"vertical-align: middle;\"><b>".$_['text_action']."</b></span></td>";
echo "<td id=\"column_header_field_title\" style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\"><b>".$_['text_title']."</b></td>";
echo "<td id=\"column_header_column_name\" style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\"><b>".$_['text_column_name']."</b></td>";
echo "<td id=\"column_header_attribute_name\" style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\"><b>".$_['text_attribute_name']."</b></td>";
echo "<td id=\"column_header_attribute_prefix\" style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; border-right-width: 0px; \"><b>".$_['text_attribute_prefix']."</b></td>";
echo "</tr>";
if (!file_exists(JG_3Z28H)){jg_jkr8b(JG_3Z28H,'google_merchant_center_feed_custom_product_fields','');}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( JG_3Z28H );
$jg_102m8=$jg_9dug9->getElementsByTagName( "custom_product_field" );
$jg_ogto3=0;
foreach( $jg_102m8 as $jg_k5stx )
{
$jg_ogto3=$jg_ogto3 + 1;
$jg_br6hz=$jg_k5stx->getElementsByTagName( "field_title" );
$jg_zsbqn=$jg_br6hz->item(0)->nodeValue;
$jg_jfc6g=$jg_k5stx->getElementsByTagName( "column_name" );
$jg_hax6g=$jg_jfc6g->item(0)->nodeValue;
$jg_e1v1g=$jg_k5stx->getElementsByTagName( "attribute_name" );
$jg_es58i=$jg_e1v1g->item(0)->nodeValue;
$jg_ezrde=$jg_k5stx->getElementsByTagName( "attribute_prefix" );
$jg_q2467=$jg_ezrde->item(0)->nodeValue;
$jg_zsbqn=jg_kkyro($jg_zsbqn);
$jg_hax6g=jg_kkyro($jg_hax6g);
$jg_es58i=jg_kkyro($jg_es58i);
$jg_q2467=jg_kkyro($jg_q2467);
echo "<tr id=\"custom-product-field-row-".(string)$jg_ogto3."\" style=\"white-space: nowrap;\">";
echo "<td style=\"border-bottom-width: 0px; padding-left: 0px; padding-right: 0px; padding-top: 0px; padding-bottom: 0px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" id=\"custom-product-field-".(string)$jg_ogto3."\" style=\"width: 2%;max-width: 2%;\">";
echo "<input type=\"radio\" name=\"radiogroup-custom-product-fields\" id=\"option-custom-product-field-".$jg_ogto3."\" style=\"display: none;\"></input>";
echo "<input type=\"checkbox\" id=\"checkbox-custom-product-field-".$jg_ogto3."\" style=\"display: inline; vertical-align: middle; margin-left: 5px; padding-left: 0px;\"></input>";
echo "<span onclick=\"jg_i10pdt(this);\" style=\"cursor: pointer; margin-left: 3px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_edit']."\" src=\"".THIS_ADMIN_IMAGE_URL."filemanager/edit-rename.png\" lowsrc=\"".THIS_ADMIN_IMAGE_URL."filemanager/edit-rename.png\" /></span>";
echo "<span onclick=\"jg_rut107(this);jg_cl10yy(this.parentNode);jg_59hymu(this);\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\" id=\"show-hover-div-select-field-length-hovered-solo-".(string)rand(100000, 1000000)."\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_resize_field']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/resize.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/resize.png\" /></span>";
echo "<span onclick=\"jg_u1mjho(this, 'up');\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_move_up']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-up.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-up.png\" /></span>";
echo "<span onclick=\"jg_u1mjho(this, 'down');\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_move_down']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-down.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-down.png\" /></span>";
echo "<span onclick=\"jg_2l2zid(this);\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_remove']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/edit-remove.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/edit-remove.png\" /></span>";
echo "</td>";
echo "<td id=\"custom_product_field_title-".$jg_ogto3."\" onkeydown=\"jg_kwxrtx(event,this);\" onclick=\"jg_cl10yy(this);return false;\" ondblclick=\"this.innerHTML=jg_mc877d(this);this.childNodes[0].focus();this.childNodes[0].select();return false;\" style=\"border-bottom-width: 0px; cursor: pointer; padding-left: 5px; padding-right: 5px; padding-top: 2px; padding-bottom: 2px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; border-right-width: 0px;\" id=\"field-title-".(string)$jg_ogto3."\">".$jg_zsbqn."</td>";
echo "<td id=\"custom_product_field_column_name-".$jg_ogto3."\" onkeydown=\"jg_kwxrtx(event,this);\" onclick=\"jg_cl10yy(this);return false;\" ondblclick=\"this.innerHTML=jg_mc877d(this);this.childNodes[0].focus();this.childNodes[0].select();return false;\" style=\"border-bottom-width: 0px; cursor: pointer; padding-left: 5px; padding-right: 5px; padding-top: 2px; padding-bottom: 2px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; border-right-width: 0px;\" id=\"column-name-".(string)$jg_ogto3."\">".$jg_hax6g."</td>";
echo "<td id=\"custom_product_field_attribute_name-".$jg_ogto3."\" onkeydown=\"jg_kwxrtx(event,this);\" onclick=\"jg_cl10yy(this);return false;\" ondblclick=\"this.innerHTML=jg_mc877d(this);this.childNodes[0].focus();this.childNodes[0].select();return false;\" style=\"border-bottom-width: 0px; cursor: pointer; padding-left: 5px; padding-right: 5px; padding-top: 2px; padding-bottom: 2px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; border-right-width: 0px;\" id=\"attribute-name-".(string)$jg_ogto3."\">".$jg_es58i."</td>";
echo "<td id=\"custom_product_field_attribute_prefix-".$jg_ogto3."\" onkeydown=\"jg_kwxrtx(event,this);\" onclick=\"jg_cl10yy(this);return false;\" ondblclick=\"this.innerHTML=jg_mc877d(this);this.childNodes[0].focus();this.childNodes[0].select();return false;\" style=\"width: 100%; border-bottom-width: 0px; cursor: pointer; padding-left: 5px; padding-right: 5px; padding-top: 2px; padding-bottom: 2px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; border-right-width: 0px;\" id=\"attribute-prefix-".(string)$jg_ogto3."\">".$jg_q2467."</td>";
echo "</tr>";
}
if ($jg_ogto3==0)
{
echo "<tr id=\"table-row-result-".$jg_ogto3."\">";
echo "<td style=\"width: 2%;max-width: 2%;border-bottom-width: 0px;\"></td><td style=\"border-bottom-width: 0px;\">".$_['text_no_fields_listed']."</td><td style=\"border-bottom-width: 0px;\">".$_['text_no_fields_listed']."</td><td style=\"border-bottom-width: 0px;\">".$_['text_no_fields_listed']."</td><td style=\"border-bottom-width: 0px; border-right-width: 0px;\">".$_['text_no_fields_listed']."</td>";
echo "</tr>";
}
echo "<tr>";
echo "<td style=\"color: white; text-align: left; width: 100px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."header.png') repeat-x !important; border-right-width: 0px; \" colspan=6>";
echo "<b>".$_['text_edit_product']."</b>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td id=\"edit_product\" style=\"border-width: 0px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x !important;\" colspan=6>";
echo "<div id=\"opencart_products_list_for_editing\" style=\"border-width: 0px;\">".jg_3gyyq("1","1","100",jg_2ykgz())."</div>";
echo "<div id=\"opencart_products_to_edit\" style=\"border-width: 0px;\">";
echo jg_dhr3l(jg_z7h10());
echo "</div>";
echo "</td>";
echo "</tr>";
echo "</table>";
}
function jg_bd44n()
{
require JG_GQ9ZI;
echo "<table class=\"list\" style=\"width: 100%; border-bottom-width: 0px; border-top-width: 0px; border-left-width: 0px; margin-bottom: 0px;\" id=\"attribute-assignment-table\">";
echo "<tr>";
echo "<td style=\"color: white; text-align: left; width: 100px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."header.png') repeat-x !important; border-right-width: 0px;\" colspan=6>";
echo "<b>".$_['text_google_attribute_assignments']."</b>";
echo "<span onclick=\"jg_qwj6ug();\" id=\"jg_67d52r\" style=\"cursor: pointer; margin-left: 6px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_refresh']."\" src=\"".THIS_ADMIN_IMAGE_URL."filemanager/refresh.png\" lowsrc=\"".THIS_ADMIN_IMAGE_URL."filemanager/refresh.png\"/></span>";
echo "<span onclick=\"jg_m9109u();\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_add']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/edit-add.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/edit-add.png\" /></span>";
echo "<span onclick=\"jg_e2dgad();\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_remove']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/edit-remove.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/edit-remove.png\" /></span>";
echo "<span onclick=\"jg_6tizjd();\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_edit']."\" src=\"".THIS_ADMIN_IMAGE_URL."filemanager/edit-rename.png\" lowsrc=\"".THIS_ADMIN_IMAGE_URL."filemanager/edit-rename.png\" /></span>";
echo "<span onclick=\"jg_bdchh8();\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_move_up']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-up.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-up.png\" /></span>";
echo "<span onclick=\"jg_rwecj9();\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_move_down']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-down.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-down.png\" /></span>";
echo "<span onclick=\"jg_mp10zt();return false;\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_view_attribute_assignments_file']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/file-list.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/file-list.png\" /></span>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding-left: 0px; padding-right: 5px; padding-top: 5px; padding-bottom: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\">";
echo "<input type=\"checkbox\" id=\"checkbox-select-all-attribute-assignments\" title=\"".$_['text_toggle_rows_checked']."\" style=\"display: inline; vertical-align: middle; margin-left: 5px; padding-left: 0px; margin-right: 8px;\" onclick=\"jg_44dpjz();\"></input>";
echo "<span style=\"vertical-align: middle;\"><b>".$_['text_action']."</b></span></td>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\"><b>".$_['text_opencart_field']."</b></td>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\"><b>".$_['text_opencart_field_value']."</b></td>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\"><b>".$_['text_google_attribute']."</b></td>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; border-right-width: 0px;\"><b>".$_['text_google_attribute_value']."</b></td>";
echo "</tr>";
if (!file_exists(JG_ZXZFK)){jg_jkr8b(JG_ZXZFK,'google_merchant_center_feed_attribute_assignments','');}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( JG_ZXZFK );
$jg_dfwlk=$jg_9dug9->getElementsByTagName( "assignment" );
$jg_ogto3=0;
foreach( $jg_dfwlk as $jg_h110l )
{
$jg_ogto3=$jg_ogto3 + 1;
$jg_s8re3=$jg_h110l->getElementsByTagName( "opencart_field" );
$jg_6o1l1=$jg_s8re3->item(0)->nodeValue;
$jg_rrqld=$jg_h110l->getElementsByTagName( "opencart_field_value" );
$jg_lerkz=$jg_rrqld->item(0)->nodeValue;
$jg_4p101=$jg_h110l->getElementsByTagName( "google_attribute" );
$jg_10aik=$jg_4p101->item(0)->nodeValue;
$jg_ie10b=$jg_h110l->getElementsByTagName( "google_attribute_value" );
$jg_a6822=$jg_ie10b->item(0)->nodeValue;
$jg_6o1l1=jg_kkyro($jg_6o1l1);
$jg_lerkz=jg_kkyro($jg_lerkz);
$jg_10aik=jg_kkyro($jg_10aik);
$jg_a6822=jg_kkyro($jg_a6822);
echo "<tr id=\"attribute-assignment-row-".(string)$jg_ogto3."\" style=\"white-space: nowrap;\">";
echo "<td style=\"border-bottom-width: 0px; padding-left: 0px; padding-right: 0px; padding-top: 0px; padding-bottom: 0px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" id=\"attribute-assignment-".(string)$jg_ogto3."\" style=\"width: 2%;max-width: 2%;\">";
echo "<input type=\"radio\" name=\"radiogroup-attribute-assignments\" id=\"option-attribute-assignment-".$jg_ogto3."\" style=\"display: none;\"></input>";
echo "<input type=\"checkbox\" id=\"checkbox-attribute-assignment-".$jg_ogto3."\" style=\"display: inline; vertical-align: middle; margin-left: 5px; padding-left: 0px;\"></input>";
echo "<span onclick=\"jg_zjuv8g(this);\" style=\"cursor: pointer; margin-left: 3px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_edit']."\" src=\"".THIS_ADMIN_IMAGE_URL."filemanager/edit-rename.png\" lowsrc=\"".THIS_ADMIN_IMAGE_URL."filemanager/edit-rename.png\" /></span>";
echo "<span onclick=\"jg_lw6rlk(this, 'up');\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_move_up']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-up.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-up.png\" /></span>";
echo "<span onclick=\"jg_lw6rlk(this, 'down');\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_move_down']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-down.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/arrow-down.png\" /></span>";
echo "<span onclick=\"jg_e8q101(this);\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_remove']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/edit-remove.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/edit-remove.png\" /></span>";
echo "</td>";
echo "<td onkeydown=\"jg_fyp6o8(event,this);\" onclick=\"jg_urxar7(this);return false;\" ondblclick=\"this.innerHTML=jg_tz5zm1(this);this.childNodes[0].focus();this.childNodes[0].select();return false;\" style=\"color: #000000; border-bottom-width: 0px; cursor: pointer; padding-left: 5px; padding-right: 5px; padding-top: 2px; padding-bottom: 2px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; border-right-width: 0px;\" id=\"opencart-field-".(string)$jg_ogto3."\">".$jg_6o1l1."</td>";
echo "<td onkeydown=\"jg_fyp6o8(event,this);\" onclick=\"jg_urxar7(this);return false;\" ondblclick=\"this.innerHTML=jg_tz5zm1(this);this.childNodes[0].focus();this.childNodes[0].select();return false;\" style=\"color: #000000; border-bottom-width: 0px; cursor: pointer; padding-left: 5px; padding-right: 5px; padding-top: 2px; padding-bottom: 2px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; border-right-width: 0px;\" id=\"opencart-field-value-".(string)$jg_ogto3."\">".$jg_lerkz."</td>";
echo "<td onkeydown=\"jg_fyp6o8(event,this);\" onclick=\"jg_urxar7(this);return false;\" ondblclick=\"this.innerHTML=jg_tz5zm1(this);this.childNodes[0].focus();this.childNodes[0].select();return false;\" style=\"color: #000000; border-bottom-width: 0px; cursor: pointer; padding-left: 5px; padding-right: 5px; padding-top: 2px; padding-bottom: 2px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; border-right-width: 0px;\" id=\"google-attribute-".(string)$jg_ogto3."\">".$jg_10aik."</td>";
echo "<td onkeydown=\"jg_fyp6o8(event,this);\" onclick=\"jg_urxar7(this);return false;\" ondblclick=\"this.innerHTML=jg_tz5zm1(this);this.childNodes[0].focus();this.childNodes[0].select();return false;\" style=\"color: #000000; width: 100%; border-bottom-width: 0px; cursor: pointer; padding-left: 5px; padding-right: 5px; padding-top: 2px; padding-bottom: 2px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; border-right-width: 0px;\" id=\"google-attribute-value-".(string)$jg_ogto3."\">".$jg_a6822."</td>";
echo "</tr>";
}
if ($jg_ogto3==0)
{
echo "<tr id=\"table-row-result-".$jg_ogto3."\">";
echo "<td style=\"width: 2%;max-width: 2%;border-bottom-width: 0px;\"></td><td style=\"border-bottom-width: 0px;\">".$_['text_no_fields_listed']."</td><td style=\"border-bottom-width: 0px;\">".$_['text_no_fields_listed']."</td><td style=\"border-bottom-width: 0px;\">".$_['text_no_attributes_listed']."</td><td style=\"border-bottom-width: 0px;border-right-width: 0px;\">".$_['text_no_attributes_listed']."</td>";
echo "</tr>";
}
echo "</table>";
}
function jg_w5s3b($jg_j2hg1)
{
$jg_4ldrt=null;
for ($i=0; $i<strlen($jg_j2hg1); $i++) {
$jg_4ldrt.=$jg_j2hg1[$i];
}
return $jg_4ldrt;
}
function jg_jlfyq($jg_6v7hp)
{
$jg_pmcic=jg_tz3k1($jg_6v7hp);
if (file_exists($jg_pmcic)){}else{
jg_610hc($jg_pmcic,$jg_6v7hp);
}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( $jg_pmcic );
$jg_10b3n=$jg_9dug9->getElementsByTagName( "data_feed" );
$jg_ogto3=0;
foreach( $jg_10b3n as $jg_l910j )
{
$jg_ogto3+=1;
}
return $jg_ogto3;
}
function jg_tfl10()
{
require JG_GQ9ZI;
$jg_fygea='google.product.categories.xml';
echo "<table class=\"list\" style=\"width: 200px; margin-bottom: 10px;\" id=\"attribute-assignments-area\">";
echo "<tr>";
echo "<td style=\"color: white; text-align: left; width: auto; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."header.png') repeat-x !important;\">";
echo "<b>".$_['text_assign_google_attribute_to_opencart_field']."</b>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"white-space: nowrap; margin-top: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=2><div style=\"margin-top: 5px;\"><b><u>".$_['text_opencart_field'].":</u></b></div>";
echo "<div id=\"opencart_fields_list\">".jg_3kzif()."</div>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"white-space: nowrap; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=2>";
echo "<div id=\"jg_xcb1s8\" style=\"display: none;\"></div>";
echo "<div id=\"jg_inuxy7\" style=\"display: none;\"></div>";
echo "<div id=\"jg_eqr6c2\" style=\"display: none;\"></div>";
echo "<div id=\"jg_wu109i\" style=\"display: none;\"></div>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"white-space: nowrap; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=2>";
echo "<div id=\"jg_ioisws\">".jg_gou4g()."</div>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 style=\"padding: 0px;\">";
if (file_exists($jg_fygea))
{
echo "<div style='text-align: center;'>";
echo "<div id='jg_xqr6pt' style='display: block; width: 500px; text-align: center; margin-left: 60px;;'>";
echo "<table class=\"form\" style=\"border-style: solid; border-width: 1px; border-color: #dddddd;\">";
echo "<tr>";
echo "<td>";
echo "<b>Upgrade Compatibility Notice: XML File</b><br /><br />";
echo "<div style='text-align: left; margin-left: 40px; margin-right: 40px;'>";
echo "An XML file from version 1.0.1.1 of this extension exists:<br />";
echo "\"".$jg_fygea."\"<br />";
echo "Once the data has been imported the file can be safely removed.<br />";
echo "Would you like to import the data from this file?<br /><br />";
echo "</div>";
echo "<a onclick=\"jg_4qlmt('".$jg_fygea."');return false;\" class=\"button\" style=\"margin-right: 5px;\"><span>Import file</span></a>";
echo "<a onclick=\"jg_h6r2zg('1.0.1.1', '".$jg_fygea."');return false;\" class=\"button\" style=\"margin-right: 5px;\"><span>Remove file</span></a>";
echo "<a onclick=\"window.open('".$jg_fygea."', '_blank');return false;\" class=\"button\" style=\"margin-right: 5px;\"><span>View XML file</span></a>";
echo "<a onclick=\"jg_21ezab('1.0.1.1');return false;\" class=\"button\" style=\"margin-right: 5px;\"><span>Cancel</span></a>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
echo "</div>";
}
if (file_exists($jg_fygea))
{
echo "<div class=\"buttons\" style=\"padding-top: 8px; padding-bottom: 8px; padding-right: 8px; text-decoration: none;\">";
echo "<a onclick=\"jg_21ezab('1.0.1.1');return false;\" class=\"button\" style=\"margin-right: 5px;\" id=\"jg_jd99cv\"><span id=\"jg_38jiae\">Cancel v1.0.1.1 XML file import</span></a>";
echo "</div>";
}
echo "<div id=\"jg_rxe1yf\">";
echo "</div>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
echo "</td>";
}
function jg_3kzif()
{
require JG_GQ9ZI;
$jg_nqk5p="<select name=\"opencart_fields\" id=\"opencart_fields\" style=\"margin-top: 8px; margin-bottom: 8px;\" onchange=\"jg_e8f7qz(this);\">\r\n";
$jg_nqk5p.="<option>".$_['text_product_name']."</option>\r\n";
switch (VERSION)
{
case (VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'||VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$jg_nqk5p.="<option>".$_['text_product_attribute']."</option>\r\n";
break;
default:
break;
}
$jg_nqk5p.="<option>".$_['text_product_category']."</option>\r\n";
$jg_nqk5p.="<option>".$_['text_product_option']."</option>\r\n";
$jg_nqk5p.="</select>";
return $jg_nqk5p;
}
function jg_gou4g()
{
require JG_GQ9ZI;
$jg_lnllq="<div style=\"margin-top: 5px;\">".$_['text_google_attribute'].":";
$jg_lnllq.="<img title=\"".$_['text_reset']."\" onclick=\"jg_g5ty7s();return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 6px; margin-right: 0px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/reset.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/reset.png\" />";
$jg_lnllq.="<img title=\"".$_['text_use_opencart_field_value']."\" onclick=\"document.getElementById('custom_google_attribute_value').value='".JG_7VC6V."';\"style=\"vertical-align: middle; cursor: pointer; margin-left: 6px; margin-right: 0px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/use-database-value.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/use-database-value.png\" />";
$jg_lnllq.="<img title=\"".$_['text_skip_product']."\" onclick=\"document.getElementById('custom_google_attribute').value='".JG_1Q42V."';\"style=\"vertical-align: middle; cursor: pointer; margin-left: 6px; margin-right: 0px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/skip-product.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/skip-product.png\" />";
$jg_lnllq.="<a href=\"http://www.google.com/support/merchants/bin/answer.py?answer=188494\" target=\"_blank\" title=\"".$_['text_products_feed_specification']."\"><img style=\"border:none; vertical-align: middle; margin-left: 6px;\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" /></a>";
$jg_lnllq.="</div>";
$jg_au6k9=$jg_lnllq."<table class=\"list\" style=\"width: 100%; border-bottom-width: 0px; border-right-width: 0px; margin-bottom: 5px; margin-top: 5px;\" id=\"custom-attribute-assignments-table\">";
$jg_au6k9.="<tr>";
$jg_au6k9.="<td style=\"vertical-align: middle; width: 20px;\">";
$jg_au6k9.=$_['text_attribute_name'].":";
$jg_au6k9.="</td>";
$jg_au6k9.="<td style=\"vertical-align: middle; margin-left: 5px; margin-right: 0px; padding-right: 0px;\">";
$jg_au6k9.="<input type=\"text\" id=\"custom_google_attribute\" style=\"margin-left: 0px; margin-right: 6px; margin-top: 6px; margin-bottom: 6px; width: 200px;\" onkeyup=\"update_attribute_selection_button(this.value);\" />";
$jg_au6k9.="<select name=\"attribute_selection_for_assignments_list\" id=\"attribute_selection_for_assignments_list\" style=\"margin-bottom: 6px; margin-top: 0px; margin-left: 0px; margin-right: 6px;\" onchange=\"jg_k1247g(this);\">";
$jg_au6k9.="<option value=\"\"></option>";
$jg_au6k9.="<option value=\"additional_image_link\">".$_['text_additional_image_link']."</option>";
$jg_au6k9.="<option value=\"adwords_grouping\">".$_['text_adwords_grouping']."</option>";
$jg_au6k9.="<option value=\"adwords_labels\">".$_['text_adwords_labels']."</option>";
$jg_au6k9.="<option value=\"adwords_redirect\">".$_['text_adwords_redirect']."</option>";
$jg_au6k9.="<option value=\"adwords_queryparam\">".$_['text_adwords_queryparam']."</option>";
$jg_au6k9.="<option value=\"age_group\">".$_['text_age_group']."</option>";
$jg_au6k9.="<option value=\"availability\">".$_['text_availability']."</option>";
$jg_au6k9.="<option value=\"brand\">".$_['text_brand']."</option>";
$jg_au6k9.="<option value=\"color\">".$_['text_color']."</option>";
$jg_au6k9.="<option value=\"condition\">".$_['text_condition']."</option>";
$jg_au6k9.="<option value=\"excluded_destination\">".$_['text_excluded_destination']."</option>";
$jg_au6k9.="<option value=\"gender\">".$_['text_gender']."</option>";
$jg_au6k9.="<option value=\"google_product_category\">".$_['text_google_product_category']."</option>";
$jg_au6k9.="<option value=\"gtin\">".$_['text_gtin']."</option>";
$jg_au6k9.="<option value=\"id\">".$_['text_id']."</option>";
$jg_au6k9.="<option value=\"image_link\">".$_['text_image_link']."</option>";
$jg_au6k9.="<option value=\"item_group_id\">".$_['text_item_group_id']."</option>";
$jg_au6k9.="<option value=\"material\">".$_['text_material']."</option>";
$jg_au6k9.="<option value=\"pattern\">".$_['text_pattern']."</option>";
$jg_au6k9.="<option value=\"mpn\">".$_['text_mpn']."</option>";
$jg_au6k9.="<option value=\"price\">".$_['text_price']."</option>";
$jg_au6k9.="<option value=\"product_type\">".$_['text_product_type']."</option>";
$jg_au6k9.="<option value=\"quantity\">".$_['text_quantity']."</option>";
$jg_au6k9.="<option value=\"sale_price\">".$_['text_sale_price']."</option>";
$jg_au6k9.="<option value=\"sale_price_effective_date\">".$_['text_sale_price_effective_date']."</option>";
$jg_au6k9.="<option value=\"shipping\">".$_['text_shipping']."</option>";
$jg_au6k9.="<option value=\"shipping_weight\">".$_['text_shipping_weight']."</option>";
$jg_au6k9.="<option value=\"size\">".$_['text_size']."</option>";
$jg_au6k9.="<option value=\"skip_product\">".$_['text_skip_product_first_letter_caps']."</option>";
$jg_au6k9.="<option value=\"tax\">".$_['text_tax']."</option>";
$jg_au6k9.="<option value=\"weight\">".$_['text_weight']."</option>";
$jg_au6k9.="</select>";
$jg_au6k9.="<img onclick=\"document.getElementById('custom_google_attribute').value='';document.getElementById('attribute_selection_for_assignments_list').selectedIndex=0;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 12px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
$jg_au6k9.="</td>";
$jg_au6k9.="</tr>";
$jg_au6k9.="<tr>";
$jg_au6k9.="<td style=\"vertical-align: middle; width: 20px;\">";
$jg_au6k9.=$_['text_attribute_value'].":";
$jg_au6k9.="</td>";
$jg_au6k9.="<td style=\"vertical-align: middle; margin-left: 5px; margin-right: 0px; padding-right: 0px;\">";
$jg_au6k9.="<input type=\"text\" id=\"custom_google_attribute_value\" style=\"margin-top: 6px; margin-bottom: 6px; margin-left: 0px; margin-right: 6px; width: 450px;\"></input>";
$jg_au6k9.="<img id=\"select_attribute_for_attribute_assignments_google_product_category\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_8fvfpf(this,'google_categories_list_hovered','custom_google_attribute_value');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px; display: none; visibility: hidden;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q('',false);
$jg_au6k9.=jg_3hq9w('select_attribute_for_attribute_assignments_age_group','custom_google_attribute_value',false);
$jg_au6k9.=jg_s69wn('select_attribute_for_attribute_assignments_availability','custom_google_attribute_value',false);
$jg_au6k9.=jg_42twf('select_attribute_for_attribute_assignments_condition','custom_google_attribute_value',false);
$jg_au6k9.=jg_jz6ek('select_attribute_for_attribute_assignments_excluded_destination','custom_google_attribute_value',false);
$jg_au6k9.=jg_sd5by('select_attribute_for_attribute_assignments_gender','custom_google_attribute_value',false);
$jg_au6k9.=jg_im8jz('select_attribute_for_attribute_assignments_adwords_publish','custom_google_attribute_value',false);
$jg_au6k9.=jg_9g39p(false);
$jg_au6k9.=show_image_adwords_queryparam_help(false);
$jg_au6k9.="<img onclick=\"document.getElementById('custom_google_attribute_value').value='';\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
$jg_au6k9.="</td>";
$jg_au6k9.="</tr>";
$jg_au6k9.="</table>";
return $jg_au6k9;
}
function jg_im8jz($jg_9e8y9,$jg_10ew4,$jg_b7yy9)
{
$jg_2bdcl='none';
$jg_wgs7t='hidden';
$jg_kljm8='';
if($jg_b7yy9==true)
{
$jg_2bdcl='inline';
$jg_wgs7t='visible';
}
if((strpos($jg_10ew4, 'custom_product_field_id_') !== false)){
$jg_kljm8=" onclick=\"jg_6yr5rx(document.getElementById('".$jg_10ew4."').value,'".$jg_10ew4."',false);return false;\"";
}
$jg_au6k9="<select id=\"".$jg_9e8y9."\" style=\"margin-bottom: 5px; margin-top: 0px; margin-left: 0px; margin-right: 6px; display: ".$jg_2bdcl."; visibility: ".$jg_wgs7t.";\" onchange=\"document.getElementById('".$jg_10ew4."').value=this.options[document.getElementById(this.id).selectedIndex].value;\"".$jg_kljm8.">";
if((strpos($jg_10ew4, 'custom_product_field_id_') !== false)){
$jg_au6k9.="<option value=\"\"></option>";
$jg_au6k9.="<option value=\"1\">true</option>";
$jg_au6k9.="<option value=\"0\">false</option>";
}else{
$jg_au6k9.="<option value=\"\"></option>";
$jg_au6k9.="<option value=\"true\">true</option>";
$jg_au6k9.="<option value=\"false\">false</option>";
}
$jg_au6k9.="</select>";
return $jg_au6k9;
}
function jg_9g39p($jg_b7yy9)
{
require JG_GQ9ZI;
$jg_2bdcl='none';
$jg_wgs7t='hidden';
if($jg_b7yy9==true)
{
$jg_2bdcl='inline';
$jg_wgs7t='visible';
}
$jg_au6k9="<img id=\"help_for_attribute_assignments_adwords_product_ads\" title=\"".$_['text_google_adwords_product_ads']."\" onclick=\"window.open('http://support.google.com/merchants/bin/answer.py?hl=en&answer=188479', '_blank');return false;\" style=\"display: ".$jg_2bdcl."; visible: ".$jg_wgs7t."; text-align: right; vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" />";
return $jg_au6k9;
}
function show_image_adwords_queryparam_help($jg_b7yy9)
{
require JG_GQ9ZI;
$jg_2bdcl='none';
$jg_wgs7t='hidden';
if($jg_b7yy9==true)
{
$jg_2bdcl='inline';
$jg_wgs7t='visible';
}
$jg_au6k9="<img id=\"help_for_attribute_assignments_adwords_queryparam\" title=\"".$_['text_adwords_queryparam']."\" onclick=\"jg_8fvfpf(this,'information_basic_hovered','custom_product_field_id_adwords_queryparam');return false;\" style=\"display: ".$jg_2bdcl."; visible: ".$jg_wgs7t."; vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" />";
return $jg_au6k9;
}
function jg_h9e5q($jg_d410tc,$jg_b7yy9)
{
require JG_GQ9ZI;
$jg_2bdcl='none';
$jg_wgs7t='hidden';
if($jg_b7yy9==true)
{
$jg_2bdcl='inline';
$jg_wgs7t='visible';
}
$this_url='';
if($jg_d410tc==''){$jg_d410tc=='en';}
$this_url='http://www.google.com/support/merchants/bin/answer.py?hl='.$jg_d410tc.'&answer=160081';
$jg_au6k9="<img id=\"help_for_attribute_assignments_google_product_category_".$jg_d410tc."\" title=\"".$_['text_categorize_your_products']."\" style=\"display: ".$jg_2bdcl."; visible: ".$jg_wgs7t."; border:none; vertical-align: middle; margin-right: 8px; cursor: pointer;\" onclick=\"window.open('".$this_url."', '_blank');return false;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" />";
return $jg_au6k9;
}
function jg_3hq9w($jg_9e8y9,$jg_10ew4,$jg_b7yy9)
{
$jg_2bdcl='none';
$jg_wgs7t='hidden';
$jg_kljm8='';
if($jg_b7yy9==true)
{
$jg_2bdcl='inline';
$jg_wgs7t='visible';
}
if((strpos($jg_10ew4, 'custom_product_field_id_') !== false)){
$jg_kljm8=" onclick=\"jg_6yr5rx(document.getElementById('".$jg_10ew4."').value,'".$jg_10ew4."',false);return false;\"";
}
$jg_au6k9="<select id=\"".$jg_9e8y9."\" style=\"margin-bottom: 5px; margin-top: 0px; margin-left: 0px; margin-right: 6px; display: ".$jg_2bdcl."; visibility: ".$jg_wgs7t.";\" onchange=\"document.getElementById('".$jg_10ew4."').value=this.options[document.getElementById(this.id).selectedIndex].value;\"".$jg_kljm8.">";
$jg_au6k9.="<option value=\"\"></option>";
$jg_au6k9.="<option value=\"adult\">adult</option>";
$jg_au6k9.="<option value=\"kids\">kids</option>";
$jg_au6k9.="</select>";
return $jg_au6k9;
}
function jg_s69wn($jg_9e8y9,$jg_10ew4,$jg_b7yy9)
{
$jg_2bdcl='none';
$jg_wgs7t='hidden';
$jg_kljm8='';
if($jg_b7yy9==true)
{
$jg_2bdcl='inline';
$jg_wgs7t='visible';
}
if((strpos($jg_10ew4, 'custom_product_field_id_') !== false)){
$jg_kljm8=" onclick=\"jg_6yr5rx(document.getElementById('".$jg_10ew4."').value,'".$jg_10ew4."',false);return false;\"";
}
$jg_au6k9="<select id=\"".$jg_9e8y9."\" style=\"margin-bottom: 5px; margin-top: 0px; margin-left: 0px; margin-right: 6px; display: ".$jg_2bdcl."; visibility: ".$jg_wgs7t.";\" onchange=\"document.getElementById('".$jg_10ew4."').value=this.options[document.getElementById(this.id).selectedIndex].value;\"".$jg_kljm8.">";
$jg_au6k9.="<option value=\"\"></option>";
$jg_au6k9.="<option value=\"in stock\">in stock</option>";
$jg_au6k9.="<option value=\"available for order\">available for order</option>";
$jg_au6k9.="<option value=\"out of stock\">out of stock</option>";
$jg_au6k9.="<option value=\"preorder\">preorder</option>";
$jg_au6k9.="</select>";
return $jg_au6k9;
}
function jg_42twf($jg_9e8y9,$jg_10ew4,$jg_b7yy9)
{
$jg_2bdcl='none';
$jg_wgs7t='hidden';
$jg_kljm8='';
if($jg_b7yy9==true)
{
$jg_2bdcl='inline';
$jg_wgs7t='visible';
}
if((strpos($jg_10ew4, 'custom_product_field_id_') !== false)){
$jg_kljm8=" onclick=\"jg_6yr5rx(document.getElementById('".$jg_10ew4."').value,'".$jg_10ew4."',false);return false;\"";
}
$jg_au6k9="<select id=\"".$jg_9e8y9."\" style=\"margin-bottom: 5px; margin-top: 0px; margin-left: 0px; margin-right: 6px; display: ".$jg_2bdcl."; visibility: ".$jg_wgs7t.";\" onchange=\"document.getElementById('".$jg_10ew4."').value=this.options[document.getElementById(this.id).selectedIndex].value;\"".$jg_kljm8.">";
$jg_au6k9.="<option value=\"\"></option>";
$jg_au6k9.="<option value=\"new\">new</option>";
$jg_au6k9.="<option value=\"used\">used</option>";
$jg_au6k9.="<option value=\"refurbished\">refurbished</option>";
$jg_au6k9.="</select>";
return $jg_au6k9;
}
function jg_jz6ek($jg_9e8y9,$jg_10ew4,$jg_b7yy9)
{
$jg_2bdcl='none';
$jg_wgs7t='hidden';
$jg_kljm8='';
if($jg_b7yy9==true)
{
$jg_2bdcl='inline';
$jg_wgs7t='visible';
}
if((strpos($jg_10ew4, 'custom_product_field_id_') !== false)){
$jg_kljm8=" onclick=\"jg_6yr5rx(document.getElementById('".$jg_10ew4."').value,'".$jg_10ew4."',false);return false;\"";
}
$jg_au6k9="<select id=\"".$jg_9e8y9."\" style=\"margin-bottom: 5px; margin-top: 0px; margin-left: 0px; margin-right: 6px; display: ".$jg_2bdcl."; visibility: ".$jg_wgs7t.";\" onchange=\"document.getElementById('".$jg_10ew4."').value=this.options[document.getElementById(this.id).selectedIndex].value;\"".$jg_kljm8.">";
$jg_au6k9.="<option value=\"\"></option>";
$jg_au6k9.="<option value=\"Shopping\">Shopping</option>";
$jg_au6k9.="<option value=\"Commerce Search\">Commerce Search</option>";
$jg_au6k9.="</select>";
return $jg_au6k9;
}
function jg_sd5by($jg_9e8y9,$jg_10ew4,$jg_b7yy9)
{
$jg_2bdcl='none';
$jg_wgs7t='hidden';
$jg_kljm8='';
if($jg_b7yy9==true)
{
$jg_2bdcl='inline';
$jg_wgs7t='visible';
}
if((strpos($jg_10ew4, 'custom_product_field_id_') !== false)){
$jg_kljm8=" onclick=\"jg_6yr5rx(document.getElementById('".$jg_10ew4."').value,'".$jg_10ew4."',false);return false;\"";
}
$jg_au6k9="<select id=\"".$jg_9e8y9."\" style=\"margin-bottom: 5px; margin-top: 0px; margin-left: 0px; margin-right: 6px; display: ".$jg_2bdcl."; visibility: ".$jg_wgs7t.";\" onchange=\"document.getElementById('".$jg_10ew4."').value=this.options[document.getElementById(this.id).selectedIndex].value;\"".$jg_kljm8.">";
$jg_au6k9.="<option value=\"\"></option>";
$jg_au6k9.="<option value=\"female\">female</option>";
$jg_au6k9.="<option value=\"male\">male</option>";
$jg_au6k9.="<option value=\"unisex\">unisex</option>";
$jg_au6k9.="</select>";
return $jg_au6k9;
}
function jg_ycdvo($jg_9e8y9,$jg_10ew4,$jg_b7yy9)
{
require JG_GQ9ZI;
$jg_2bdcl='none';
$jg_wgs7t='hidden';
$jg_kljm8='';
if($jg_b7yy9==true)
{
$jg_2bdcl='inline';
$jg_wgs7t='visible';
}
$jg_8fnss=" onchange=\"jg_2edelo(this.options[document.getElementById(this.id).selectedIndex].value);\"";
$jg_au6k9="<select id=\"".$jg_9e8y9."\" style=\"margin-bottom: 0px; margin-top: 0px; margin-left: 0px; margin-right: 6px; display: ".$jg_2bdcl."; visibility: ".$jg_wgs7t.";\"".$jg_8fnss.$jg_kljm8.">";
$jg_9scvv=jg_dngng('upc');
$jg_y2l9n='';
$jg_fua1d='12';
if($jg_fua1d==$jg_9scvv){$jg_y2l9n='selected';}else{$jg_y2l9n='';}
$jg_au6k9.="<option value=\"".$jg_fua1d."\"".$jg_y2l9n.">".$jg_fua1d."</option>";
$jg_fua1d='16';
if($jg_fua1d==$jg_9scvv){$jg_y2l9n='selected';}else{$jg_y2l9n='';}
$jg_au6k9.="<option value=\"".$jg_fua1d."\"".$jg_y2l9n.">".$jg_fua1d."</option>";
$jg_fua1d='24';
if($jg_fua1d==$jg_9scvv){$jg_y2l9n='selected';}else{$jg_y2l9n='';}
$jg_au6k9.="<option value=\"".$jg_fua1d."\"".$jg_y2l9n.">".$jg_fua1d."</option>";
$jg_fua1d='32';
if($jg_fua1d==$jg_9scvv){$jg_y2l9n='selected';}else{$jg_y2l9n='';}
$jg_au6k9.="<option value=\"".$jg_fua1d."\"".$jg_y2l9n.">".$jg_fua1d."</option>";
$jg_au6k9.="</select>";
return $jg_au6k9;
}
function jg_w8vwu()
{
require JG_GQ9ZI;
$jg_6vlgd="<select name=\"taxonomy_language\" id=\"taxonomy_language\" style=\"margin-bottom: 5px; margin-top: 0px; margin-left: 6px; margin-right: 6px;\" onchange=\"jg_ajhbgw(this);\">";
$jg_6vlgd.="<option value=\"cs-CZ\">&#268;esky</option>";
$jg_6vlgd.="<option value=\"de\">Deutsch&lrm;</option>";
$jg_6vlgd.="<option value=\"en-AU\">English (".$_['text_country_name_australia'].")&lrm;</option>";
$jg_6vlgd.="<option value=\"en-GB\">English (".$_['text_country_name_united_kingdom'].")&lrm;</option>";
$jg_6vlgd.="<option value=\"en\" selected=\"selected\">English (".$_['text_country_name_united_states'].")&lrm;</option>";
$jg_6vlgd.="<option value=\"es\">Espa&ntilde;ol&lrm;</option>";
$jg_6vlgd.="<option value=\"fr\">Fran&ccedil;ais&lrm;</option>";
$jg_6vlgd.="<option value=\"it\">Italiano&lrm;</option>";
$jg_6vlgd.="<option value=\"nl\">Nederlands&lrm;</option>";
$jg_6vlgd.="<option value=\"pt-BR\">Portugu&ecirc;s (Brasil)&lrm;</option>";
$jg_6vlgd.="<option value=\"cn\">中文（简体）&lrm;</option>";
$jg_6vlgd.="<option value=\"jp\">日本語&lrm;</option>";
$jg_6vlgd.="</select>";
return $jg_6vlgd;
}
function jg_s8m1t()
{
$jg_6ux7b="<input type=\"text\" id=\"default_google_product_category\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_1EOBZ,'default_google_product_category',JG_9VCMQ)."\" onkeyup=\"jg_uc7943(this.id,this.value,false);\"></input>";
return $jg_6ux7b;
}
function load_default_google_product_category_au_text()
{
$jg_6ux7b="<input type=\"text\" id=\"default_google_product_category_au\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_CKTS5,'default_google_product_category_au','')."\" onkeyup=\"jg_uc7943(this.id,this.value,false);\"></input>";
return $jg_6ux7b;
}
function load_default_google_product_category_br_text()
{
$jg_6ux7b="<input type=\"text\" id=\"default_google_product_category_br\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_SNFAC,'default_google_product_category_br','')."\" onkeyup=\"jg_uc7943(this.id,this.value,false);\"></input>";
return $jg_6ux7b;
}
function load_default_google_product_category_ca_text()
{
$jg_6ux7b="<input type=\"text\" id=\"default_google_product_category_ca\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_JGZWR,'default_google_product_category_ca','')."\" onkeyup=\"jg_uc7943(this.id,this.value,false);\"></input>";
return $jg_6ux7b;
}
function load_default_google_product_category_cn_text()
{
$jg_6ux7b="<input type=\"text\" id=\"default_google_product_category_cn\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_DSZN2,'default_google_product_category_cn','')."\" onkeyup=\"jg_uc7943(this.id,this.value,false);\"></input>";
return $jg_6ux7b;
}
function load_default_google_product_category_cz_text()
{
$jg_6ux7b="<input type=\"text\" id=\"default_google_product_category_cz\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_YIFIC,'default_google_product_category_cz','')."\" onkeyup=\"jg_uc7943(this.id,this.value,false);\"></input>";
return $jg_6ux7b;
}
function load_default_google_product_category_fr_text()
{
$jg_6ux7b="<input type=\"text\" id=\"default_google_product_category_fr\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_OVACZ,'default_google_product_category_fr','')."\" onkeyup=\"jg_uc7943(this.id,this.value,false);\"></input>";
return $jg_6ux7b;
}
function load_default_google_product_category_de_text()
{
$jg_6ux7b="<input type=\"text\" id=\"default_google_product_category_de\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_J6HFQ,'default_google_product_category_de','')."\" onkeyup=\"jg_uc7943(this.id,this.value,false);\"></input>";
return $jg_6ux7b;
}
function load_default_google_product_category_it_text()
{
$jg_6ux7b="<input type=\"text\" id=\"default_google_product_category_it\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_92IPM,'default_google_product_category_it','')."\" onkeyup=\"jg_uc7943(this.id,this.value,false);\"></input>";
return $jg_6ux7b;
}
function load_default_google_product_category_jp_text()
{
$jg_6ux7b="<input type=\"text\" id=\"default_google_product_category_jp\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_110X9,'default_google_product_category_jp','')."\" onkeyup=\"jg_uc7943(this.id,this.value,false);\"></input>";
return $jg_6ux7b;
}
function load_default_google_product_category_nl_text()
{
$jg_6ux7b="<input type=\"text\" id=\"default_google_product_category_nl\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_M4SF1,'default_google_product_category_nl','')."\" onkeyup=\"jg_uc7943(this.id,this.value,false);\"></input>";
return $jg_6ux7b;
}
function load_default_google_product_category_es_text()
{
$jg_6ux7b="<input type=\"text\" id=\"default_google_product_category_es\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_2KFA1,'default_google_product_category_es','')."\" onkeyup=\"jg_uc7943(this.id,this.value,false);\"></input>";
return $jg_6ux7b;
}
function load_default_google_product_category_ch_text()
{
$jg_6ux7b="<input type=\"text\" id=\"default_google_product_category_ch\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_10B21,'default_google_product_category_ch','')."\" onkeyup=\"jg_uc7943(this.id,this.value,false);\"></input>";
return $jg_6ux7b;
}
function load_default_google_product_category_gb_text()
{
$jg_6ux7b="<input type=\"text\" id=\"default_google_product_category_gb\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_835CW,'default_google_product_category_gb','')."\" onkeyup=\"jg_uc7943(this.id,this.value,false);\"></input>";
return $jg_6ux7b;
}
function load_default_google_product_category_us_text()
{
$jg_6ux7b="<input type=\"text\" id=\"default_google_product_category_us\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_31IVA,'default_google_product_category_us','')."\" onkeyup=\"jg_uc7943(this.id,this.value,false);\"></input>";
return $jg_6ux7b;
}
function jg_m1010()
{
$jg_8f5cz=jg_baxsj(JG_DLWFA,'default_availability','in stock');
$jg_6ux7b='<select name="default_availability_selection" id="default_availability_selection" style="margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px;" onchange="jg_gxfe25(this.options[this.selectedIndex].text,false);return false;">';
$jg_tscnd='in stock';
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_tscnd='available for order';
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_tscnd='out of stock';
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_tscnd='preorder';
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_6ux7b.='</select>';
return $jg_6ux7b;
}
function jg_28gfw()
{
$jg_23xu1=jg_baxsj(JG_LO8LF,'default_availability_zero','out of stock');
$jg_6ux7b='<select name="default_availability_zero_selection" id="default_availability_zero_selection" style="margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px;" onchange="jg_mu7ulh(this.options[this.selectedIndex].text,false);return false;">';
$jg_tscnd='in stock';
$jg_6ux7b.='<option ';
if ($jg_23xu1==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_tscnd='available for order';
$jg_6ux7b.='<option ';
if ($jg_23xu1==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_tscnd='out of stock';
$jg_6ux7b.='<option ';
if ($jg_23xu1==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_tscnd='preorder';
$jg_6ux7b.='<option ';
if ($jg_23xu1==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_6ux7b.='</select>';
return $jg_6ux7b;
}
function jg_1lord()
{
$jg_6ux7b="<input type=\"text\" id=\"default_color\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 200px;\" value=\"".jg_baxsj(JG_9KTKK,'default_color','')."\" onkeyup=\"jg_24v2jq(this.value,false);\"></input>";
return $jg_6ux7b;
}
function jg_10mad()
{
$jg_8f5cz=jg_baxsj(JG_E8HJW,'default_condition','');
$jg_6ux7b='<select name="default_condition_selection" id="default_condition_selection" style="margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px;" onchange="jg_gi7m2l(this.options[this.selectedIndex].text,false);return false;">';
$jg_tscnd='new';
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_tscnd='used';
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_tscnd='refurbished';
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_6ux7b.='</select>';
return $jg_6ux7b;
}
function jg_jb3fa()
{
$jg_6ux7b="<input type=\"text\" id=\"default_size\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 200px;\" value=\"".jg_baxsj(JG_FJS32,'default_size','')."\" onkeyup=\"jg_jd8n4e(this.value,false);\"></input>";
return $jg_6ux7b;
}
function jg_64jhe()
{
$jg_8f5cz=jg_baxsj(JG_3TKNC,'default_age_group','');
$jg_6ux7b='<select name="default_age_group_selection" id="default_age_group_selection" style="margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px;" onchange="jg_pzx2jj(this.options[this.selectedIndex].text,false);return false;">';
$jg_tscnd='';
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_tscnd='adult';
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_tscnd='kids';
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_6ux7b.='</select>';
return $jg_6ux7b;
}
function jg_108n9()
{
$jg_8f5cz=jg_baxsj(JG_814I3,'default_gender','');
$jg_6ux7b='<select name="default_gender_selection" id="default_gender_selection" style="margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px;" onchange="jg_ihteb1(this.options[this.selectedIndex].text,false);return false;">';
$jg_tscnd='';
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_tscnd='female';
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_tscnd='male';
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_tscnd='unisex';
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
$jg_6ux7b.='</select>';
return $jg_6ux7b;
}
function jg_yp310()
{
$jg_8f5cz=jg_baxsj(JG_ISA10,'default_special_time_of_day','00:00');
$jg_6ux7b='<select name="default_special_time_of_day_selection" id="default_special_time_of_day_selection" style="margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px;" onchange="jg_bqm9g4(this.options[this.selectedIndex].text,false);return false;">';
for ($i=0; $i<=(24); $i++)
{
$jg_tscnd=jg_ghj1m($i).':00';
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
}
$jg_6ux7b.='</select>';
return $jg_6ux7b;
}
function jg_m5ezr()
{
$jg_kyjqz=jg_h4l7b().':00';
$jg_8f5cz=jg_baxsj(JG_UW2NQ,'default_special_time_zone_offset',$jg_kyjqz);
$jg_6ux7b='<select name="default_special_time_zone_offset_selection" id="default_special_time_zone_offset_selection" style="margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px;" onchange="jg_5ltrfr(this.options[this.selectedIndex].text,false);return false;">';
for ($i=24; $i >= (0); $i--)
{
if($i==0)
{
$jg_tscnd=jg_ghj1m($i).':00';
}else{
$jg_tscnd='+'.jg_ghj1m($i).':00';
}
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
}
for ($i=1; $i<=(24); $i++)
{
if($i==0)
{
$jg_tscnd=jg_ghj1m($i).':00';
}else{
$jg_tscnd='-'.jg_ghj1m($i).':00';
}
$jg_6ux7b.='<option ';
if ($jg_8f5cz==$jg_tscnd){$jg_6ux7b.=' selected ';}
$jg_6ux7b.=' value="'.$jg_tscnd.'">'.$jg_tscnd.'</option>';
}
$jg_6ux7b.='</select>';
return $jg_6ux7b;
}
function jg_d6ums()
{
$jg_6ux7b="<input type=\"text\" id=\"default_link_suffix\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 450px;\" value=\"".jg_baxsj(JG_BSN5E,'default_link_suffix','')."\" onkeyup=\"jg_mw31y2(this.value,false);\"></input>";
return $jg_6ux7b;
}
function jg_u8gad($jg_4f4h2)
{
require JG_GQ9ZI;
$jg_lnllq="<div style=\"margin-top: 5px;\">".$_['text_google_product_category'].":";
$jg_lnllq.="<img title=\"".$_['text_select']."\" onclick=\"jg_7s449t('".$jg_4f4h2."');return false;\"style=\"vertical-align: middle; cursor: pointer; margin-left: 6px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/check.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/check.png\" />";
$jg_lnllq.="<img title=\"".$_['text_cancel']."\" onclick=\"jg_sbedlz();return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
$jg_lnllq.="<img title=\"".$_['text_reset']."\" onclick=\"jg_8410e9();return false;\"style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/reset.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/reset.png\" />";
$jg_lnllq.="<img id=\"img-set-current-as-default\" title=\"".$_['text_set_current_as_default']."\" onclick=\"jg_uc7943(document.getElementById('selected_category').innerHTML,true);return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/select-default-google-product-category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_lnllq.=jg_h9e5q('',true);
$jg_lnllq.=$_['text_language'].":".jg_w8vwu();
$jg_lnllq.='<span id="itemclass_searchable_root_loading_image" style="margin-right: 8px;"></span>';
$jg_lnllq.="</div>";
$jg_6ux7b=$jg_lnllq."<div id=\"google_categories\"><img style=\"vertical-align: middle; margin-left: 5px; margin-right: 5px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/ajax-loader-circles-16x16.gif\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/ajax-loader-circles-16x16.gif\"/></div>";
return $jg_6ux7b;
}
function jg_4u8q3($jg_hax6g)
{
require JG_GQ9ZI;
$jg_6ux7b="<div style=\"margin-top: 0px;\">".$_['text_enter_a_new_field_size_for']." <b>".$jg_hax6g."</b>:";
$jg_6ux7b.="";
$jg_6ux7b.="<input type=\"text\" id=\"field_length_selection_".$jg_hax6g."\" name=\"field_length_selection_".$jg_hax6g."\" style=\"margin-left: 6px; margin-right: 6px; margin-bottom: 0px; margin-top: 0px; width: 100px;\" maxlength=\"32\"; value=\"".jg_dngng($jg_hax6g)."\" onkeyup=\"text_column_size_edit_key_press('".$jg_hax6g."',event,this);\"></input>";
$jg_6ux7b.="<img onclick=\"jg_z1gdr1('".$jg_hax6g."',document.getElementById('field_length_selection_".$jg_hax6g."').value);jg_sbedlz();jg_ezoexo(document.getElementById('opencart_product_for_editing'));return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 0px; vertical-align: middle; \" title=\"".$_['text_select']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/check.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/check.png\" />";
$jg_6ux7b.="<img title=\"".$_['text_cancel']."\" onclick=\"jg_sbedlz();return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 6px; margin-right: 0px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
$jg_6ux7b.="</div>";
return $jg_6ux7b;
}
function jg_qi1k6()
{
require JG_GQ9ZI;
echo "<table class=\"list\" id=\"data-feed-options-table\" style=\"width: auto; border-bottom-width: 1px; margin-bottom: 10px;\">";
echo "<tr>";
echo "<td style=\"color: white; text-align: left; width: 100px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."header.png') repeat-x !important; border-right-width: 0px;\" colspan=6>";
echo "<b>".$_['text_options_data_feeds']."</b>";
echo "<span onclick=\"jg_39izbc();\" id=\"jg_ifk8p\" style=\"cursor: pointer; margin-left: 6px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_refresh']."\" src=\"".THIS_ADMIN_IMAGE_URL."filemanager/refresh.png\" lowsrc=\"".THIS_ADMIN_IMAGE_URL."filemanager/refresh.png\"/></span>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
echo $_['text_default_data_feed_format'].":".jg_1091t();
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
$jg_iabxa='';
if(jg_7u758()=='true'){$jg_iabxa='checked';}
echo "<input type=\"checkbox\" ".$jg_iabxa." id=\"password_protect_the_data_feed\" onclick=\"jg_hf9ijm();\" style=\"margin-left: 0px; margin-bottom: 8px;\">".$_['text_password_protect_the_data_feed']."</input><br />";
echo "<div style=\"margin-left: 18px; margin-bottom: 5px;\">".$_['text_username'].":<input type=\"text\" id=\"jg_wj2fzj\" style=\"margin-left: 6px;\" onkeyup=\"jg_rfctm3();\" value=\"".jg_6nwzw()."\"></input></div>";
echo "<div style=\"margin-left: 18px; margin-bottom: 5px;\">".$_['text_password'].":<input type=\"text\" id=\"jg_rfcpqv\" style=\"margin-left: 6px;\" onkeyup=\"jg_1ax3r8();\" value=\"".jg_shr18()."\"></input></div>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
echo "<div style=\"vertical-align: middle;\">";
echo $_['text_default_google_attribute_values'];
echo "</div>";
echo "<table class=\"list\" style=\"margin-top: 6px; margin-bottom: 0px;\">";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_google_product_category'].":";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo jg_s8m1t();
echo "<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_8fvfpf(this,'google_categories_list_hovered','default_google_product_category');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
echo jg_h9e5q('',true);
echo "<img onclick=\"document.getElementById('default_google_product_category').value='';jg_uc7943('default_google_product_category',document.getElementById('default_google_product_category').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_google_product_category']." (".$_['text_country_name_australia']."):";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo load_default_google_product_category_au_text();
$jg_e4f62='en-AU';
echo "<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_google_product_category']." (".$_['text_country_name_australia'].")\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','default_google_product_category_au');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
echo jg_h9e5q($jg_e4f62,true);
echo "<img onclick=\"document.getElementById('default_google_product_category_au').value='';jg_uc7943('default_google_product_category_au',document.getElementById('default_google_product_category_au').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_google_product_category']." (".$_['text_country_name_brazil']."):";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo load_default_google_product_category_br_text();
$jg_e4f62='pt-BR';
echo "<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_google_product_category']." (".$_['text_country_name_brazil'].")\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','default_google_product_category_br');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
echo jg_h9e5q($jg_e4f62,true);
echo "<img onclick=\"document.getElementById('default_google_product_category_br').value='';jg_uc7943('default_google_product_category_br',document.getElementById('default_google_product_category_br').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_google_product_category']." (".$_['text_country_name_canada']."):";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo load_default_google_product_category_ca_text();
$jg_e4f62='us';
echo "<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_google_product_category']." (".$_['text_country_name_canada'].")\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','default_google_product_category_ca');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
echo jg_h9e5q($jg_e4f62,true);
echo "<img onclick=\"document.getElementById('default_google_product_category_ca').value='';jg_uc7943('default_google_product_category_ca',document.getElementById('default_google_product_category_ca').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_google_product_category']." (".$_['text_country_name_china']."):";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo load_default_google_product_category_cn_text();
$jg_e4f62='cn';
echo "<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_google_product_category']." (".$_['text_country_name_china'].")\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','default_google_product_category_cn');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
echo jg_h9e5q($jg_e4f62,true);
echo "<img onclick=\"document.getElementById('default_google_product_category_cn').value='';jg_uc7943('default_google_product_category_cn',document.getElementById('default_google_product_category_cn').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_google_product_category']." (".$_['text_country_name_czech_republic']."):";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo load_default_google_product_category_cz_text();
$jg_e4f62='cs-CZ';
echo "<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_google_product_category']." (".$_['text_country_name_czech_republic'].")\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','default_google_product_category_cz');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
echo jg_h9e5q($jg_e4f62,true);
echo "<img onclick=\"document.getElementById('default_google_product_category_cz').value='';jg_uc7943('default_google_product_category_cz',document.getElementById('default_google_product_category_cz').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_google_product_category']." (".$_['text_country_name_france']."):";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo load_default_google_product_category_fr_text();
$jg_e4f62='fr';
echo "<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_google_product_category']." (".$_['text_country_name_france'].")\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','default_google_product_category_fr');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
echo jg_h9e5q($jg_e4f62,true);
echo "<img onclick=\"document.getElementById('default_google_product_category_fr').value='';jg_uc7943('default_google_product_category_fr',document.getElementById('default_google_product_category_fr').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_google_product_category']." (".$_['text_country_name_germany']."):";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo load_default_google_product_category_de_text();
$jg_e4f62='de';
echo "<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_google_product_category']." (".$_['text_country_name_germany'].")\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','default_google_product_category_de');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
echo jg_h9e5q($jg_e4f62,true);
echo "<img onclick=\"document.getElementById('default_google_product_category_de').value='';jg_uc7943('default_google_product_category_de',document.getElementById('default_google_product_category_de').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_google_product_category']." (".$_['text_country_name_italy']."):";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo load_default_google_product_category_it_text();
$jg_e4f62='it';
echo "<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_google_product_category']." (".$_['text_country_name_italy'].")\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','default_google_product_category_it');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
echo jg_h9e5q($jg_e4f62,true);
echo "<img onclick=\"document.getElementById('default_google_product_category_it').value='';jg_uc7943('default_google_product_category_it',document.getElementById('default_google_product_category_it').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_google_product_category']." (".$_['text_country_name_japan']."):";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo load_default_google_product_category_jp_text();
$jg_e4f62='jp';
echo "<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_google_product_category']." (".$_['text_country_name_japan'].")\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','default_google_product_category_jp');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
echo jg_h9e5q($jg_e4f62,true);
echo "<img onclick=\"document.getElementById('default_google_product_category_jp').value='';jg_uc7943('default_google_product_category_jp',document.getElementById('default_google_product_category_jp').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_google_product_category']." (".$_['text_country_name_netherlands']."):";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo load_default_google_product_category_nl_text();
$jg_e4f62='nl';
echo "<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_google_product_category']." (".$_['text_country_name_netherlands'].")\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','default_google_product_category_nl');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
echo jg_h9e5q($jg_e4f62,true);
echo "<img onclick=\"document.getElementById('default_google_product_category_nl').value='';jg_uc7943('default_google_product_category_nl',document.getElementById('default_google_product_category_nl').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_google_product_category']." (".$_['text_country_name_spain']."):";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo load_default_google_product_category_es_text();
$jg_e4f62='es';
echo "<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_google_product_category']." (".$_['text_country_name_spain'].")\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','default_google_product_category_es');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
echo jg_h9e5q($jg_e4f62,true);
echo "<img onclick=\"document.getElementById('default_google_product_category_es').value='';jg_uc7943('default_google_product_category_es',document.getElementById('default_google_product_category_es').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_google_product_category']." (".$_['text_country_name_switzerland']."):";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo load_default_google_product_category_ch_text();
$jg_e4f62='de';
echo "<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_google_product_category']." (".$_['text_country_name_switzerland'].")\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','default_google_product_category_ch');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
echo jg_h9e5q($jg_e4f62,true);
echo "<img onclick=\"document.getElementById('default_google_product_category_ch').value='';jg_uc7943('default_google_product_category_ch',document.getElementById('default_google_product_category_ch').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_google_product_category']." (".$_['text_country_name_united_kingdom']."):";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo load_default_google_product_category_gb_text();
$jg_e4f62='en-GB';
echo "<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_google_product_category']." (".$_['text_country_name_united_kingdom'].")\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','default_google_product_category_gb');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
echo jg_h9e5q($jg_e4f62,true);
echo "<img onclick=\"document.getElementById('default_google_product_category_gb').value='';jg_uc7943('default_google_product_category_gb',document.getElementById('default_google_product_category_gb').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_google_product_category']." (".$_['text_country_name_united_states']."):";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo load_default_google_product_category_us_text();
$jg_e4f62='us';
echo "<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_google_product_category']." (".$_['text_country_name_united_states'].")\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','default_google_product_category_us');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
echo jg_h9e5q($jg_e4f62,true);
echo "<img onclick=\"document.getElementById('default_google_product_category_us').value='';jg_uc7943('default_google_product_category_us',document.getElementById('default_google_product_category_us').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_availability'].' <span class="help" style="display: inline !important;">('.$_['text_one_or_more_products_in_stock'].')</span>:';
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo jg_m1010();
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_availability'].' <span class="help" style="display: inline !important;">('.$_['text_zero_products_in_stock'].')</span>:';
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo jg_28gfw();
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_condition'].":";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo jg_10mad();
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_color'].":";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo jg_1lord();
echo "<img onclick=\"document.getElementById('default_color').value='';jg_24v2jq(document.getElementById('default_color').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_size'].":";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo jg_jb3fa();
echo "<img onclick=\"document.getElementById('default_size').value='';jg_jd8n4e(document.getElementById('default_size').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_age_group'].":";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo jg_64jhe();
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_gender'].":";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo jg_108n9();
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_link'].' <span class="help" style="display: inline !important;">('.$_['text_suffix'].')</span>:';
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo jg_d6ums();
echo "<img title=\"".$_['text_about_custom_campaigns']."\" style=\"border:none; vertical-align: middle; margin-right: 6px; cursor: pointer;\" onclick=\"window.open('http://support.google.com/analytics/bin/answer.py?hl=en&answer=1033863', '_blank');return false;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" />";
echo "<img onclick=\"document.getElementById('default_link_suffix').value='';jg_mw31y2(document.getElementById('default_link_suffix').value,false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_sale_price_effective_date'].' '.$_['text_time_of_day'].':';
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo jg_yp310();
echo "<img title=\"".$_['text_submit_your_sale_information']."\" style=\"border:none; vertical-align: middle; margin-right: 6px; cursor: pointer;\" onclick=\"window.open('http://support.google.com/merchants/bin/answer.py?hl=en&answer=1196048', '_blank');return false;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" />";
$original_error_reporting_value=ini_get('error_reporting');
error_reporting(0);
echo '<span class="help" style="display: inline !important;">'.$_['text_current_web_server_date_and_time'].': '.date("l, F d, Y h:i" ,time()).'</span>';
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_sale_price_effective_date_time_zone_offset'].":";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo jg_m5ezr();
echo "<img title=\"".$_['text_submit_your_sale_information']."\" style=\"border:none; vertical-align: middle; margin-right: 6px; cursor: pointer;\" onclick=\"window.open('http://support.google.com/merchants/bin/answer.py?hl=en&answer=1196048', '_blank');return false;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" />";
if (date_default_timezone_get()){
echo '<span class="help" style="display: inline !important;">'.date_default_timezone_get().' '.$_['text_time_zone_offset'].': '.jg_h4l7b().':00'.'</span>';
}
echo "</td>";
echo "</td>";
echo "</tr>";
echo "</table>";
ini_set('error_reporting',$original_error_reporting_value);
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
$jg_vpu99='';
if(jg_brack()=='true'){$jg_vpu99='checked';}
echo "<input type=\"checkbox\" ".$jg_vpu99." id=\"jg_zsb1cs\" onclick=\"jg_exqq10();\" style=\"margin-left: 0px; margin-bottom: 5px;\">".$_['text_convert_non_compliant_character_entities']."</input>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
$jg_if2sn='';
if(jg_v6cev()=='true'){$jg_if2sn='checked';}
echo "<input type=\"checkbox\" ".$jg_if2sn." id=\"jg_vishj4\" onclick=\"jg_7dy4hk();\" style=\"margin-left: 0px; margin-bottom: 5px;\">".$_['text_correct_lone_ampersands_in_product_names_and_descriptions']."</input>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
$jg_minjg='';
if(jg_6cr4sw()=='true'){$jg_minjg='checked';}
echo "<input type=\"checkbox\" ".$jg_minjg." id=\"jg_g9g2sf\" onclick=\"jg_28e7ph();\" style=\"margin-left: 0px; margin-bottom: 5px;\">".$_['text_remove_html_tags_from_product_descriptions']."</input><br />";
$jg_uvll1='';
$jg_zeuys='disabled=true';
if(jg_uu10dt()=='true'){$jg_uvll1='checked';}
if(jg_6cr4sw()=='true'){$jg_zeuys='';}
echo "<input type=\"checkbox\" ".$jg_uvll1." id=\"jg_r6qq8d\" onclick=\"jg_osbtr2();\" style=\"margin-left: 18px; margin-bottom: 5px;\"".$jg_zeuys.">".$_['text_shorten_product_descriptions_to_10000_characters_or_less']."</input>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
$surround_xml_data_feed_attributes_with_cdata_tags_checked='';
if(load_xml_default_enclose_xml_data_feed_attributes_within_cdata_sections()=='true'){$surround_xml_data_feed_attributes_with_cdata_tags_checked='checked';}
echo "<input type=\"checkbox\" ".$surround_xml_data_feed_attributes_with_cdata_tags_checked." id=\"surround_xml_data_feed_attributes_with_cdata_tags\" onclick=\"default_surround_xml_data_feed_attributes_with_cdata_tags_save();\" style=\"margin-left: 0px; margin-bottom: 5px;\">".$_['text_enclose_xml_data_feed_attribute_values_within_cdata_sections']."</input>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
$use_weight_for_shipping_weight_checked='';
if(load_xml_default_use_weight_for_shipping_weight()=='true'){$use_weight_for_shipping_weight_checked='checked';}
echo "<input type=\"checkbox\" ".$use_weight_for_shipping_weight_checked." id=\"use_weight_for_shipping_weight\" onclick=\"default_use_weight_for_shipping_weight_save();\" style=\"margin-left: 0px; margin-bottom: 5px;\">".$_['text_use_weight_for_shipping_weight']."</input>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
$jg_3lkq5='';
if(jg_baxsj(JG_GM95P,'default_lengthen_upc_field','')=='true'){$jg_3lkq5='checked';}
echo '<span style="margin-right: 6px;">'.$_['text_resize_upc_field'].'</span>';
echo jg_ycdvo('select_default_setting_upc','',true);
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
$jg_sme96s='';
if(jg_th4x8()=='true'){$jg_sme96s='checked';}
echo "<input type=\"checkbox\" ".$jg_sme96s." id=\"checkbox_do_not_merge_custom_attribute_assignments\" onclick=\"jg_vx6cqj();\" style=\"margin-left: 0px; margin-bottom: 5px;\">".$_['text_do_not_merge']." ".$_['text_quick_configuration']." ".$_['text_attribute_assignments']."</input>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
$jg_c10p9='';
if(jg_baxsj(JG_J10PP,'default_do_not_use_a_cached_image_for_product_image_link','')=='true'){$jg_c10p9='checked';}
echo "<input type=\"checkbox\" ".$jg_c10p9." id=\"checkbox_do_not_use_a_cached_image_for_product_image_link\" onclick=\"jg_d6a10t();\" style=\"margin-left: 0px; margin-bottom: 5px;\">".$_['text_do_not_use_cached_images_for_image_link_or_additional_image_link_attributes']."</input>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
$jg_9afgm='';
if(jg_baxsj(JG_41T9S,'default_do_not_use_model_field_for_mpn','')=='true'){$jg_9afgm='checked';}
echo "<input type=\"checkbox\" ".$jg_9afgm." id=\"checkbox_do_not_use_model_field_for_mpn\" onclick=\"jg_vz3pk1();\" style=\"margin-left: 0px; margin-bottom: 5px;\">".$_['text_do_not_use_model_field_for_mpn_attribute']."</input>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
$jg_10bvv='';
if(jg_baxsj(JG_DKRDK,'default_do_not_use_upc_field_for_gtin','')=='true'){$jg_10bvv='checked';}
echo "<input type=\"checkbox\" ".$jg_10bvv." id=\"checkbox_do_not_use_upc_field_for_gtin\" onclick=\"jg_n3ii8r();\" style=\"margin-left: 0px; margin-bottom: 5px;\">".$_['text_do_not_use_upc_field_for_gtin_attribute']."</input>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
$jg_79bbj='';
if(jg_baxsj(JG_WQN9M,'default_do_not_use_product_id_field_for_id','')=='true'){$jg_79bbj='checked';}
echo "<input type=\"checkbox\" ".$jg_79bbj." id=\"checkbox_do_not_use_product_id_field_for_id\" onclick=\"jg_p6zwiz();\" style=\"margin-left: 0px; margin-bottom: 5px;\">".$_['text_do_not_use_product_id_field_for_id_attribute']."</input>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
$jg_t7i7b='';
if(jg_baxsj(JG_GVXFY,'default_do_not_use_manufacturer_field_for_brand','')=='true'){$jg_t7i7b='checked';}
echo "<input type=\"checkbox\" ".$jg_t7i7b." id=\"checkbox_do_not_use_manufacturer_field_for_brand\" onclick=\"jg_zm5z1j();\" style=\"margin-left: 0px; margin-bottom: 5px;\">".$_['text_do_not_use_manufacturer_field_for_brand_attribute']."</input>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\" colspan=6>";
$jg_cjd3e='';
if(jg_hqoa1y()=='true'){$jg_cjd3e='checked';}
echo "<input type=\"checkbox\" ".$jg_cjd3e." id=\"jg_7kdi9c\" onclick=\"jg_2q2bg1();\" style=\"margin-left: 0px; margin-bottom: 5px;\">".$_['text_use_sef_urls_for_data_feed_urls_list']."</input>";
echo "</td>";
echo "</tr>";
echo "</table>";
}
function jg_h4l7b()
{
if (date_default_timezone_get()){
$jg_ay10p=new DateTimeZone(date_default_timezone_get());
$date_time_web_server=new DateTime("now", $jg_ay10p);
$jg_knni7=$jg_ay10p->getOffset($date_time_web_server);
$jg_6emdk=$jg_knni7/60/60;
$jg_6emdk=jg_wpqui($jg_6emdk);
}else{
$jg_6emdk=jg_wpqui('0');
}
return $jg_6emdk;
}
function jg_wpqui($jg_blklh)
{
if((intval($jg_blklh)<10)&&(strlen($jg_blklh)>0))
{
$jg_qnhlb=substr($jg_blklh,0,1);
if(($jg_qnhlb=='-')||($jg_qnhlb=='+'))
{
$jg_blklh=str_replace($jg_qnhlb.'1', $jg_qnhlb.'01', $jg_blklh);
$jg_blklh=str_replace($jg_qnhlb.'2', $jg_qnhlb.'02', $jg_blklh);
$jg_blklh=str_replace($jg_qnhlb.'3', $jg_qnhlb.'03', $jg_blklh);
$jg_blklh=str_replace($jg_qnhlb.'4', $jg_qnhlb.'04', $jg_blklh);
$jg_blklh=str_replace($jg_qnhlb.'5', $jg_qnhlb.'05', $jg_blklh);
$jg_blklh=str_replace($jg_qnhlb.'6', $jg_qnhlb.'06', $jg_blklh);
$jg_blklh=str_replace($jg_qnhlb.'7', $jg_qnhlb.'07', $jg_blklh);
$jg_blklh=str_replace($jg_qnhlb.'8', $jg_qnhlb.'08', $jg_blklh);
$jg_blklh=str_replace($jg_qnhlb.'9', $jg_qnhlb.'09', $jg_blklh);
}else{
if($jg_blklh=='0'){
$jg_blklh=str_replace('0', '00', $jg_blklh);
}
}
}
return $jg_blklh;
}
function jg_ghj1m($jg_blklh)
{
if((intval($jg_blklh)<10)&&(strlen($jg_blklh)>0))
{
$jg_blklh='0'.(string)$jg_blklh;
}
return $jg_blklh;
}
function jg_18df6()
{
require JG_GQ9ZI;
echo "<table class=\"list\" style=\"width: 200px; border-bottom-width: 0px; border-top-width: 1px; border-left-width: 1px; margin-bottom: 0px;\" id=\"data-feed-custom-fields-table\">";
echo "<table class=\"list\" style=\"width: 200px; margin-bottom: 10px;\" id=\"attribute-assignments-area\">";
echo "<tr>";
echo "<td style=\"color: white; text-align: left; width: 100px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."header.png') repeat-x !important; border-right-width: 0px;\" colspan=6>";
echo "<b>".$_['text_extend_product_table']."</b>";
echo "</td>";
echo "</tr>";
echo "<tr id=\"custom_product_field_attribute_selector\">";
echo "<td style=\"vertical-align: middle; width: 20px;\">";
echo $_['text_attributes'].":";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px; width: 100%; \">";
echo "<select id=\"custom_product_field_attribute_presets\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px;\" onchange=\"jg_i9pznu(this);return false;\">";
echo "<option id=\"select_custom_product_field_preset_blank\"></option>";
echo "<option id=\"select_custom_product_field_preset_adwords_grouping\">".$_['text_adwords_grouping']."</option>";
echo "<option id=\"select_custom_product_field_preset_adwords_labels\">".$_['text_adwords_labels']."</option>";
echo "<option id=\"select_custom_product_field_preset_adwords_redirect\">".$_['text_adwords_redirect']."</option>";
echo "<option id=\"select_custom_product_field_preset_adwords_queryparam\">".$_['text_adwords_queryparam']."</option>";
echo "<option id=\"select_custom_product_field_preset_age_group\">".$_['text_age_group']."</option>";
echo "<option id=\"select_custom_product_field_preset_availability\">".$_['text_availability']."</option>";
echo "<option id=\"select_custom_product_field_preset_color\">".$_['text_color']."</option>";
echo "<option id=\"select_custom_product_field_preset_condition\">".$_['text_condition']."</option>";
echo "<option id=\"select_custom_product_field_preset_excluded_destination\">".$_['text_excluded_destination']."</option>";
echo "<option id=\"select_custom_product_field_preset_gender\">".$_['text_gender']."</option>";
echo "<option id=\"select_custom_product_field_preset_google_product_category\">".$_['text_google_product_category']."</option>";
echo "<option id=\"select_custom_product_field_preset_google_product_category_au\">".$_['text_google_product_category']." (".$_['text_country_name_australia'].")</option>";
echo "<option id=\"select_custom_product_field_preset_google_product_category_br\">".$_['text_google_product_category']." (".$_['text_country_name_brazil'].")</option>";
echo "<option id=\"select_custom_product_field_preset_google_product_category_ca\">".$_['text_google_product_category']." (".$_['text_country_name_canada'].")</option>";
echo "<option id=\"select_custom_product_field_preset_google_product_category_cn\">".$_['text_google_product_category']." (".$_['text_country_name_china'].")</option>";
echo "<option id=\"select_custom_product_field_preset_google_product_category_cz\">".$_['text_google_product_category']." (".$_['text_country_name_czech_republic'].")</option>";
echo "<option id=\"select_custom_product_field_preset_google_product_category_fr\">".$_['text_google_product_category']." (".$_['text_country_name_france'].")</option>";
echo "<option id=\"select_custom_product_field_preset_google_product_category_de\">".$_['text_google_product_category']." (".$_['text_country_name_germany'].")</option>";
echo "<option id=\"select_custom_product_field_preset_google_product_category_it\">".$_['text_google_product_category']." (".$_['text_country_name_italy'].")</option>";
echo "<option id=\"select_custom_product_field_preset_google_product_category_jp\">".$_['text_google_product_category']." (".$_['text_country_name_japan'].")</option>";
echo "<option id=\"select_custom_product_field_preset_google_product_category_nl\">".$_['text_google_product_category']." (".$_['text_country_name_netherlands'].")</option>";
echo "<option id=\"select_custom_product_field_preset_google_product_category_es\">".$_['text_google_product_category']." (".$_['text_country_name_spain'].")</option>";
echo "<option id=\"select_custom_product_field_preset_google_product_category_ch\">".$_['text_google_product_category']." (".$_['text_country_name_switzerland'].")</option>";
echo "<option id=\"select_custom_product_field_preset_google_product_category_gb\">".$_['text_google_product_category']." (".$_['text_country_name_united_kingdom'].")</option>";
echo "<option id=\"select_custom_product_field_preset_google_product_category_us\">".$_['text_google_product_category']." (".$_['text_country_name_united_states'].")</option>";
echo "<option id=\"select_custom_product_field_preset_gtin\">".$_['text_gtin']."</option>";
echo "<option id=\"select_custom_product_field_preset_item_group_id\">".$_['text_item_group_id']."</option>";
echo "<option id=\"select_custom_product_field_preset_material\">".$_['text_material']."</option>";
echo "<option id=\"select_custom_product_field_preset_pattern\">".$_['text_pattern']."</option>";
echo "<option id=\"select_custom_product_field_preset_mpn\">".$_['text_mpn']."</option>";
echo "<option id=\"select_custom_product_field_preset_shipping\">".$_['text_shipping']."</option>";
echo "<option id=\"select_custom_product_field_preset_shipping_weight\">".$_['text_shipping_weight']."</option>";
echo "<option id=\"select_custom_product_field_preset_size\">".$_['text_size']."</option>";
echo "<option id=\"select_custom_product_field_preset_skip_product\">".$_['text_skip_product_first_letter_caps']."</option>";
echo "<option id=\"select_custom_product_field_preset_tax\">".$_['text_tax']."</option>";
echo "</select>";
echo "<img onclick=\"jg_1yjcw6();return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_advanced_options']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/advanced-options.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/advanced-options.png\" />";
echo "<img onclick=\"jg_t42akw();return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</tr>";
echo "<tr id=\"custom_product_field_row_field_title\" style=\"visibility: hidden; display: none; \">";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_title'].":";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo "<input type=\"text\" id=\"custom_product_field_field_title\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 310px;\" value=\"\"></input>";
echo "<img onclick=\"document.getElementById('custom_product_field_field_title').value='';return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr id=\"custom_product_field_row_column_name\" style=\"visibility: hidden; display: none; \">";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_column_name'].":";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo "<input type=\"text\" id=\"custom_product_field_column_name\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 310px;\" value=\"\"></input>";
echo "<img onclick=\"document.getElementById('custom_product_field_column_name').value='';return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr id=\"custom_product_field_row_data_type\" style=\"visibility: hidden; display: none; \">";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_data_type'].":";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo "<select id=\"custom_product_field_data_type\" style=\"vertical-align: middle; margin-right: 6px; margin-bottom: 6px; margin-top: 6px;\" onchange=\"jg_hk6uhz(this);return false;\">";
echo "<option id=\"custom_product_field_data_type_int\">INT</option>";
echo "<option id=\"custom_product_field_data_type_varchar\" selected>VARCHAR</option>";
echo "<option id=\"custom_product_field_data_type_text\">TEXT</option>";
echo "<option id=\"custom_product_field_data_type_tinyint\">TINYINT</option>";
echo "</select>";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr id=\"custom_product_field_row_data_length\" style=\"visibility: hidden; display: none; \">";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_data_length'].":";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo "<input type=\"text\" id=\"custom_product_field_data_length\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 310px;\" value=\"\"></input>";
echo "<img onclick=\"document.getElementById('custom_product_field_data_length').value='';return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr id=\"custom_product_field_row_attribute_name\" style=\"visibility: hidden; display: none; \">";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_attribute_name'].":";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo "<input type=\"text\" id=\"custom_product_field_attribute_name\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 310px;\" value=\"\"></input>";
echo "<img onclick=\"document.getElementById('custom_product_field_attribute_name').value='';return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr id=\"custom_product_field_row_attribute_prefix\" style=\"visibility: hidden; display: none; \">";
echo "<td style=\"vertical-align: middle;\">";
echo $_['text_attribute_prefix'].":";
echo "</td>";
echo "<td style=\"vertical-align: middle; margin-right: 0px; padding-right: 0px;\">";
echo "<input type=\"text\" id=\"custom_product_field_attribute_prefix\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 310px;\" value=\"\"></input>";
echo "<img onclick=\"document.getElementById('custom_product_field_attribute_prefix').value='';return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
echo "</td>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2 style=\"margin: 0px; padding: 0px;\">";
echo "<div id=\"custom_product_fields_list\">";
jg_aquit();
echo "</div>";
echo "</tr>";
echo "</td>";
echo "</table>";
}
function jg_iphg3()
{
echo "<table class=\"list\" id=\"data-feed-table\" style=\"width: 200px; border-bottom-width: 1px; margin-top: 0px; margin-bottom: 10px;\">";
echo "<tr>";
echo "<td style=\"padding: 0px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; width: 100%;\" colspan=5>";
echo "<table class=\"list\" id=\"data-feed-table\" style=\"height: 100%; width: 100%; margin-top: 0px; margin-bottom: 0px; border-width: 0px;\">";
$jg_evvd2=array();
$jg_evvd2=jg_alt6j($jg_evvd2);
$jg_xhcuw=(jg_wkm81()-jg_dzd61());
echo "<tr>";
echo "<td rowspan=3 style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; width: 10px; border-top-width: 0px !important;\" colspan=1>";
require JG_GQ9ZI;
echo $_['text_automatic_data_feed_urls'].":&nbsp;";
echo "</td>";
echo "</tr>";
if($jg_xhcuw>0)
{
echo "<tr>";
if(jg_dzd61()==0)
{
echo "<td style=\"width: 10px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; border-bottom-width: 0px;\">";
}
else
{
echo "<td style=\"width: 10px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x;\">";
}
echo $_['text_active'].":&nbsp;";
echo "</td>";
if(jg_dzd61()==0)
{
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; border-bottom-width: 0px; border-right-width: 0px;\">";
}
else
{
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; border-right-width: 0px;\">";
}
echo "<div style=\"width: auto; height: 100%; display: inline-block; vertical-align: middle; overflow: visible;\">";
echo "<span onclick=\"jg_106m26();\" style=\"cursor: pointer; margin-left: 0px; margin-right: 6px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_deactivate']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/turn-off.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/turn-off.png\" /></span>";
if ($jg_xhcuw==0){$jg_xhcuw=1;}
echo "<select id=\"jg_slna1g\" multiple=\"multiple\" size=\"".(string)$jg_xhcuw."\" style=\"vertical-align: middle;\">";
foreach ($jg_evvd2 as $jg_1w4l9 => $jg_9jo87) {
if (jg_4ram9($jg_9jo87["store_id"])!==false)
{
}
else
{
echo "<option id=\"select-store-active-id-".$jg_9jo87["store_id"]."\">".jg_w5s3b($jg_9jo87["name"])."</option>";
}
}
echo "</select>";
echo "</div>";
echo "</td>";
}
if(jg_dzd61()>0)
{
echo "<tr>";
echo "<td style=\"width: 10px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; border-bottom-width: 0px;\">";
echo $_['text_inactive'].":&nbsp;";
echo "</td>";
echo "<td style=\"padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x; border-bottom-width: 0px; border-right-width: 0px;\">";
echo "<div style=\"width: auto; height: 100%; display: inline-block; vertical-align: middle; overflow: visible;\">";
echo "<span onclick=\"jg_xru49p();\" style=\"cursor: pointer; margin-left: 0px; margin-right: 6px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_activate']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/turn-on.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/turn-on.png\" /></span>";
$jg_xhcuw=jg_dzd61();
if ($jg_xhcuw==0){$jg_xhcuw=1;}
echo "<select id=\"jg_ozqslx\" multiple=\"multiple\" size=\"".$jg_xhcuw."\" style=\"vertical-align: middle;\">";
foreach ($jg_evvd2 as $jg_1w4l9 => $jg_9jo87) {
if (jg_4ram9($jg_9jo87["store_id"])!==false)
{
echo "<option id=select-store-inactive-id-".$jg_9jo87["store_id"].">".jg_w5s3b($jg_9jo87["name"])."</option>";
}
}
echo "</select>";
echo "</div>";
echo "</td>";
echo "</tr>";
}
echo "</tr>";
echo "</table>";
$jg_xhcuw=(jg_wkm81()-jg_dzd61());
foreach ($jg_evvd2 as $jg_1w4l9 => $jg_9jo87) {
if (jg_4ram9($jg_9jo87["store_id"])!==false){}else{
jg_xl6lx($jg_9jo87["store_id"]);
}
}
}
function jg_xl6lx($jg_6v7hp)
{
require JG_GQ9ZI;
global $jg_kme4n;
$jg_pmcic=jg_tz3k1($jg_6v7hp);
if (file_exists($jg_pmcic))
{
}
else
{
jg_610hc($jg_pmcic,$jg_6v7hp);
}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( $jg_pmcic );
$jg_10b3n=$jg_9dug9->getElementsByTagName( "data_feed" );
$jg_ogto3=0;
$jg_jm6mh=$jg_6v7hp+1;
$jg_evt1n=jg_p8h10($jg_6v7hp);
echo "<div style=\"width: 100%;\">";
echo "<div class=\"jg_d68jo2\">";
echo "<div class=\"jg_b814hg\" id=\"jg_1gdi17".$jg_jm6mh."jg_cv8lz6\" onselectstart=\"return false;\" style=\"border-bottom-width: 0px; border-top-width: 1px; border-left-width: 0px; border-right-width: 0px; border-style: solid; border-color: #dddddd; white-space: nowrap; padding: 0px; repeat-x;\">";
echo "<span id=\"span-accordion-button-".$jg_jm6mh."\" onclick=\"jg_ldxcrr(this,".$jg_6v7hp.",".$jg_jm6mh.",600);return false;\" onselectstart=\"return false;\" style=\"cursor: pointer; margin-left: 0px; margin-right: 6px; width: 20px; height: 100%; text-align: center;\">";
if(jg_jyft8($jg_6v7hp))
{
echo "<img style=\"margin-bottom: 5px; margin-top: 5px; margin-left: 5px; vertical-align: middle; cursor: pointer;\" title=\"".$_['text_expand_view']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/accordion-expand.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/accordion-expand.png\"/>";
}
else
{
echo "<img style=\"margin-bottom: 5px; margin-top: 5px; margin-left: 5px; vertical-align: middle; cursor: pointer;\" title=\"".$_['text_collapse_view']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/accordion-collapse.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/accordion-collapse.png\"/>";
}
echo "</span>";
echo "<b>".jg_w5s3b(jg_jp161($jg_6v7hp)).":&nbsp;&nbsp;".$_['text_products'].":&nbsp;&nbsp;".jg_p8h10($jg_6v7hp)."</b>";
echo "<span onclick=\"jg_1a2fs8();\" style=\"cursor: pointer; margin-left: 5px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\" id=\"button_refresh_data_feeds_list\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_refresh']."\" src=\"".THIS_ADMIN_IMAGE_URL."filemanager/refresh.png\" lowsrc=\"".THIS_ADMIN_IMAGE_URL."filemanager/refresh.png\"/></span>";
echo "<span onclick=\"jg_ues10p();return false;\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_edit_currencies']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/currency-edit.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/currency-edit.png\"/></span>";
echo "<span onclick=\"update_cache('currency');return false;\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_update_currency_cache']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/currency-update-cache.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/currency-update-cache.png\"/></span>";
echo "<span onclick=\"update_cache('language');return false;\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_update_language_cache']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/language-update-cache.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/language-update-cache.png\"/></span>";
echo "<span onclick=\"update_cache('product');return false;\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 20px; height: 100%; text-align: center;\"><img style=\"vertical-align: middle; cursor: pointer;\" title=\"".$_['text_update_product_cache']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/product-update-cache.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/product-update-cache.png\"/></span>";
echo "</div>";
if(jg_jyft8($jg_6v7hp))
{
echo "<div id=\"jg_ba5y64".$jg_jm6mh."jg_cv8lz6\"  class=\"jg_gupxf1\" style=\"color: white; text-align: left; float: left; width: inherit; padding: 0px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."header.png') repeat-x;\">";
}
else
{
echo "<div id=\"jg_ba5y64".$jg_jm6mh."jg_cv8lz6\"  class=\"jg_63ys2c\" style=\"color: white; text-align: left; float: left; width: inherit; padding: 0px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."header.png') repeat-x;\">";
}
echo "<table class=\"list\" id=\"data-feed-table\" style=\"height: 100%; width: 100%; margin-top: 0px; margin-bottom: 0px; margin-left: 0px; border-width: 0px;\">";
echo "<tr id=\"data-feed-table-title-row\">";
echo "<td style=\"color: #000000; border-color: #dddddd; border-top-style: solid; border-bottom-width: 1px; border-top-width: 1px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x !important; width: 20px;\"><b>".$_['text_target_country']."</b></td>";
echo "<td style=\"color: #000000; border-color: #dddddd; border-top-style: solid; border-bottom-width: 1px; border-top-width: 1px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x !important; width: 20px;\"><b>".$_['text_currency']."</b></td>";
echo "<td style=\"color: #000000; border-color: #dddddd; border-top-style: solid; border-bottom-width: 1px; border-top-width: 1px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x !important; width: 20px;\"><b>".$_['text_language']."</b></td>";
echo "<td style=\"color: #000000; border-color: #dddddd; border-top-style: solid; border-bottom-width: 1px; border-top-width: 1px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x !important; width: 20px;\"><b>".$_['text_products_per_page']."</b></td>";
echo "<td style=\"color: #000000; border-color: #dddddd; border-top-style: solid; border-bottom-width: 1px; border-top-width: 1px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x !important; width: 20px;\"><b>".$_['text_data_feed_urls']."</b></td>";
echo "<td style=\"color: #000000; border-color: #dddddd; border-top-style: solid; border-bottom-width: 1px; border-top-width: 1px; border-right-width: 0px; padding: 5px; background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x !important; width: 20px;\"><b>".$_['text_reports']."</b></td>";
echo "</tr>";
foreach( $jg_10b3n as $jg_l910j )
{
$jg_ogto3=$jg_ogto3 + 1;
$jg_xs9rm=$jg_l910j->getElementsByTagName( "target_country" );
$jg_5atm6=jg_j252v($jg_xs9rm->item(0)->nodeValue);
$jg_xs9rm=$jg_l910j->getElementsByTagName( "currency_code" );
$jg_h3as2=jg_j252v($jg_xs9rm->item(0)->nodeValue);
$jg_xs9rm=$jg_l910j->getElementsByTagName( "language_code" );
$jg_d410tc='';
foreach ($jg_xs9rm as $jg_k1568) {
$jg_d410tc=$jg_k1568->nodeValue;
}
$jg_xs9rm=$jg_l910j->getElementsByTagName( "items_per_page" );
$jg_xxtmi=jg_j252v($jg_xs9rm->item(0)->nodeValue);
$jg_xs9rm=$jg_l910j->getElementsByTagName( "feed_url" );
$jg_2bayd=jg_j252v($jg_xs9rm->item(0)->nodeValue);
$jg_e3gnk="";
$jg_3k4il="0";
if (jg_sbab1($jg_h3as2))
{
$jg_e3gnk="background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x !important; border-left-width: 1px; border-bottom-width: ".$jg_3k4il."px; width: 20px;";
}
else
{
$jg_e3gnk="background: #ffffff url('".THIS_ADMIN_IMAGE_URL."field.png') repeat-x !important; border-left-width: 1px; border-bottom-width: ".$jg_3k4il."px; height: 0px; width: 20px;";
}
echo "<tr style=\"white-space: nowrap;\" id=\"data-feed-row-store-id-".$jg_6v7hp."-number-".$jg_ogto3."\">";
echo "<td style=\"".$jg_e3gnk." color: #000000; border-right-width: 1px;\">"."<span style=\"display:inline-block; width: 16px; margin-left: 0px; margin-right: 8px;\"><img style=\"vertical-align: absmiddle;\" lowsrc=\"".THIS_ADMIN_IMAGE_URL."flags/".jg_n36ho($jg_5atm6).".png\" src=\"".THIS_ADMIN_IMAGE_URL."flags/".jg_n36ho($jg_5atm6).".png\" title=\"".jg_u7cqf($jg_5atm6)."\" /></span>".jg_u7cqf($jg_5atm6)."</td>";
echo "<td style=\"".$jg_e3gnk." color: #000000; border-right-width: 1px;\">";
if (jg_sbab1($jg_h3as2)){echo jg_8b8oe($jg_h3as2,$jg_6v7hp);}
echo jg_tif5u($jg_h3as2,$jg_6v7hp).$jg_h3as2;
echo "</td>";
echo "<td style=\"".$jg_e3gnk." color: #000000; border-right-width: 1px;\">";
if (jg_sbab1($jg_h3as2))
{
echo jg_4f6xv($jg_d410tc,$jg_6v7hp,$jg_5atm6);
}
echo "</td>";
echo "<td style=\"".$jg_e3gnk." color: #000000; border-right-width: 1px;\">";
if (jg_sbab1($jg_h3as2))
{
echo "<select name=\"products-per-page-store-id-".$jg_6v7hp."\" id=\"products-per-page-".str_replace(' ', '-', $jg_5atm6)."\" onchange=\"jg_9w2r84(this);return false;\">";
echo "<option value=\"all\">".$_['text_all']."</option>";
echo "<option ";
if ($jg_xxtmi==500000){echo " selected ";}
echo " value=\"500000\">500000</option>";
echo "<option ";
if ($jg_xxtmi==400000){echo " selected ";}
echo " value=\"400000\">400000</option>";
echo "<option ";
if ($jg_xxtmi==300000){echo " selected ";}
echo " value=\"300000\">300000</option>";
echo "<option ";
if ($jg_xxtmi==200000){echo " selected ";}
echo " value=\"200000\">200000</option>";
echo "<option ";
if ($jg_xxtmi==100000){echo " selected ";}
echo " value=\"100000\">100000</option>";
echo "<option ";
if ($jg_xxtmi==90000){echo " selected ";}
echo " value=\"90000\">90000</option>";
echo "<option ";
if ($jg_xxtmi==80000){echo " selected ";}
echo " value=\"80000\">80000</option>";
echo "<option ";
if ($jg_xxtmi==70000){echo " selected ";}
echo " value=\"70000\">70000</option>";
echo "<option ";
if ($jg_xxtmi==60000){echo " selected ";}
echo " value=\"60000\">60000</option>";
echo "<option ";
if ($jg_xxtmi==50000){echo " selected ";}
echo " value=\"50000\">50000</option>";
echo "<option ";
if ($jg_xxtmi==40000){echo " selected ";}
echo " value=\"40000\">40000</option>";
echo "<option ";
if ($jg_xxtmi==30000){echo " selected ";}
echo " value=\"30000\">30000</option>";
echo "<option ";
if ($jg_xxtmi==25000){echo " selected ";}
echo " value=\"25000\">25000</option>";
echo "<option ";
if ($jg_xxtmi==20000){echo " selected ";}
echo " value=\"20000\">20000</option>";
echo "<option ";
if ($jg_xxtmi==15000){echo " selected ";}
echo " value=\"15000\">15000</option>";
echo "<option ";
if ($jg_xxtmi==10000){echo " selected ";}
echo " value=\"10000\">10000</option>";
echo "<option ";
if ($jg_xxtmi==9000){echo " selected ";}
echo " value=\"9000\">9000</option>";
echo "<option ";
if ($jg_xxtmi==8000){echo " selected ";}
echo " value=\"8000\">8000</option>";
echo "<option ";
if ($jg_xxtmi==7000){echo " selected ";}
echo " value=\"7000\">7000</option>";
echo "<option ";
if ($jg_xxtmi==6000){echo " selected ";}
echo " value=\"6000\">6000</option>";
echo "<option ";
if ($jg_xxtmi==5000){echo " selected ";}
echo " value=\"5000\">5000</option>";
echo "<option ";
if ($jg_xxtmi==4000){echo " selected ";}
echo " value=\"4000\">4000</option>";
echo "<option ";
if ($jg_xxtmi==3000){echo " selected ";}
echo " value=\"3000\">3000</option>";
echo "<option ";
if ($jg_xxtmi==2000){echo " selected ";}
echo " value=\"2000\">2000</option>";
echo "<option ";
if ($jg_xxtmi==1000){echo " selected ";}
echo " value=\"1000\">1000</option>";
echo "<option ";
if ($jg_xxtmi==900){echo " selected ";}
echo " value=\"900\">900</option>";
echo "<option ";
if ($jg_xxtmi==800){echo " selected ";}
echo " value=\"800\">800</option>";
echo "<option ";
if ($jg_xxtmi==700){echo " selected ";}
echo " value=\"700\">700</option>";
echo "<option ";
if ($jg_xxtmi==600){echo " selected ";}
echo " value=\"600\">600</option>";
echo "<option ";
if ($jg_xxtmi==500){echo " selected ";}
echo " value=\"500\">500</option>";
if ($jg_evt1n<5000)
{
echo "<option ";
if ($jg_xxtmi==400){echo " selected ";}
echo " value=\"400\">400</option>";
}
if ($jg_evt1n<4000)
{
echo "<option ";
if ($jg_xxtmi==300){echo " selected ";}
echo " value=\"300\">300</option>";
}
if ($jg_evt1n<3000)
{
echo "<option ";
if ($jg_xxtmi==200){echo " selected ";}
echo " value=\"200\">200</option>";
}
if ($jg_evt1n<2000)
{
echo "<option ";
if ($jg_xxtmi==100){echo " selected ";}
echo " value=\"100\">100</option>";
}
if ($jg_evt1n<1000)
{
echo "<option ";
if ($jg_xxtmi==90){echo " selected ";}
echo " value=\"90\">90</option>";
}
if ($jg_evt1n<900)
{
echo "<option ";
if ($jg_xxtmi==80){echo " selected ";}
echo " value=\"80\">80</option>";
}
if ($jg_evt1n<800)
{
echo "<option ";
if ($jg_xxtmi==70){echo " selected ";}
echo " value=\"70\">70</option>";
}
if ($jg_evt1n<700)
{
echo "<option ";
if ($jg_xxtmi==60){echo " selected ";}
echo " value=\"60\">60</option>";
}
if ($jg_evt1n<600)
{
echo "<option ";
if ($jg_xxtmi==50){echo " selected ";}
echo " value=\"50\">50</option>";
}
if ($jg_evt1n<500)
{
echo "<option ";
if ($jg_xxtmi==40){echo " selected ";}
echo " value=\"40\">40</option>";
}
if ($jg_evt1n<400)
{
echo "<option ";
if ($jg_xxtmi==30){echo " selected ";}
echo " value=\"30\">30</option>";
}
if ($jg_evt1n<300)
{
echo "<option ";
if ($jg_xxtmi==20){echo " selected ";}
echo " value=\"20\">20</option>";
}
if ($jg_evt1n<200)
{
echo "<option ";
if ($jg_xxtmi==10){echo " selected ";}
echo " value=\"10\">10</option>";
}
if ($jg_evt1n<100)
{
echo "<option ";
if ($jg_xxtmi==9){echo " selected ";}
echo " value=\"9\">9</option>";
}
if ($jg_evt1n<90)
{
echo "<option ";
if ($jg_xxtmi==8){echo " selected ";}
echo " value=\"8\">8</option>";
}
if ($jg_evt1n<80)
{
echo "<option ";
if ($jg_xxtmi==7){echo " selected ";}
echo " value=\"7\">7</option>";
}
if ($jg_evt1n<70)
{
echo "<option ";
if ($jg_xxtmi==6){echo " selected ";}
echo " value=\"6\">6</option>";
}
if ($jg_evt1n<60)
{
echo "<option ";
if ($jg_xxtmi==5){echo " selected ";}
echo " value=\"5\">5</option>";
}
if ($jg_evt1n<50)
{
echo "<option ";
if ($jg_xxtmi==4){echo " selected ";}
echo " value=\"4\">4</option>";
}
if ($jg_evt1n<40)
{
echo "<option ";
if ($jg_xxtmi==3){echo " selected ";}
echo " value=\"3\">3</option>";
}
if ($jg_evt1n<30)
{
echo "<option ";
if ($jg_xxtmi==2){echo " selected ";}
echo " value=\"2\">2</option>";
}
if ($jg_evt1n<20)
{
echo "<option ";
if ($jg_xxtmi==1){echo " selected ";}
echo " value=\"1\">1</option>";
}
echo "</select>";
}
echo "</td>";
echo "<td style=\"padding-top: 0px; padding-bottom: 0px;".$jg_e3gnk." color: #000000; \">";
echo jg_fop23($jg_5atm6,$jg_xxtmi,$jg_6v7hp,$jg_d410tc);
echo "</td>";
echo "<td style=\"padding-top: 0px; padding-bottom: 0px;".$jg_e3gnk." border-right-width: 0px; color: #000000; \">";
if (jg_sbab1($jg_h3as2)){
echo jg_10mv5($jg_5atm6,$jg_xxtmi,$jg_6v7hp,$jg_d410tc);
}
echo "</td>";
echo "</tr>";
}
if ($jg_ogto3==0)
{
echo "<tr id=\"table-row-result-".$jg_ogto3."\">";
echo "<td style=\"color: #000000;\">No currencies listed.</td><td style=\"color: #000000;\">No currencies listed.</td><td style=\"color: #000000;\">No currencies listed.</td><td style=\"color: #000000;\">No currencies listed.</td><td style=\"color: #000000;\">No currencies listed.</td><td style=\"color: #000000;\">No currencies listed.</td>";
echo "</tr>";
}
echo "</table>";
echo "</div>";
echo "</div>";
echo "</div>";
}
function jg_jp161($jg_6v7hp)
{
$jg_i1bmk="";
if ($jg_6v7hp=="0")
{
$jg_i1bmk=jg_morhj();
}
else
{
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."store", $jg_9ul65) or die (mysql_error());
$jg_pbnd1=mysql_num_rows($jg_xrpiy);
if( $jg_pbnd1>0 )
{
while($jg_wu10r=mysql_fetch_array($jg_xrpiy))
{
if ($jg_6v7hp==$jg_wu10r["store_id"])
{
$jg_i1bmk=$jg_wu10r["name"];
}
}
}
}
return $jg_i1bmk;
}
function jg_z7dd7($jg_6v7hp)
{
$jg_i1bmk="";
if (($jg_6v7hp=="0")||($jg_6v7hp=="")||($jg_6v7hp==null))
{
$jg_i1bmk=THIS_CATALOG_URL;
}else{
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."store", $jg_9ul65) or die (mysql_error());
$jg_pbnd1=mysql_num_rows($jg_xrpiy);
if( $jg_pbnd1>0 )
{
while($jg_wu10r=mysql_fetch_array($jg_xrpiy))
{
if ($jg_6v7hp==$jg_wu10r["store_id"])
{
$jg_i1bmk=$jg_wu10r["url"];
}
}
}
}
return $jg_i1bmk;
}
function jg_alt6j($jg_evvd2)
{
$jg_y3yh5=array();
$jg_y3yh5=array(
'store_id' => '0',
'name' => jg_morhj(),
'url' => THIS_CATALOG_URL
);
$jg_evvd2[]=$jg_y3yh5;
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT * FROM ".DB_PREFIX."store ORDER BY name", $jg_9ul65) or die (mysql_error());
$jg_pbnd1=mysql_num_rows($jg_xrpiy);
if( $jg_pbnd1>0 )
{
while($jg_wu10r=mysql_fetch_array($jg_xrpiy))
{
$jg_y3yh5=array(
'store_id' => (string)$jg_wu10r["store_id"],
'name' => (string)$jg_wu10r["name"],
'url' => (string)$jg_wu10r["url"]
);
$jg_evvd2[]=$jg_y3yh5;
}
}
return $jg_evvd2;
}
function jg_3j9zn()
{
$jg_i1bmk="";
$jg_i1bmk.="<option id=select-store-id-0>".jg_morhj().": ".THIS_CATALOG_URL."</option>";
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."store", $jg_9ul65) or die (mysql_error());
$jg_pbnd1=mysql_num_rows($jg_xrpiy);
if( $jg_pbnd1>0 )
{
while($jg_wu10r=mysql_fetch_array($jg_xrpiy))
{
$jg_i1bmk.="<option id=select-store-active-id-".(string)$jg_wu10r["store_id"].">".(string)$jg_wu10r["name"].": ".(string)$jg_wu10r["url"]."</option>";
}
}
return $jg_i1bmk;
}
function jg_wkm81()
{
$jg_i1bmk=1;
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."store", $jg_9ul65) or die (mysql_error());
$jg_pbnd1=mysql_num_rows($jg_xrpiy);
if( $jg_pbnd1>0 )
{
while($jg_wu10r=mysql_fetch_array($jg_xrpiy))
{
$jg_i1bmk=$jg_i1bmk + 1;
}
}
return $jg_i1bmk;
}
function jg_morhj()
{
$jg_i1bmk="";
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy='';
switch (VERSION)
{
case (VERSION=='1.4.7'||VERSION=='1.4.8'||VERSION=='1.4.9'||VERSION=='1.4.9.1'||VERSION=='1.4.9.2'||VERSION=='1.4.9.3'||VERSION=='1.4.9.4'||VERSION=='1.4.9.5'||VERSION=='1.4.9.6'):
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."setting WHERE ".DB_PREFIX."setting.group='config' AND ".DB_PREFIX."setting.key='config_name'", $jg_9ul65) or die (mysql_error());
break;
case (VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'||VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."setting WHERE ".DB_PREFIX."setting.group='config' AND ".DB_PREFIX."setting.store_id='0' AND ".DB_PREFIX."setting.key='config_name'", $jg_9ul65) or die (mysql_error());
break;
default:
break;
}
$jg_pbnd1=mysql_num_rows($jg_xrpiy);
if( $jg_pbnd1>0 )
{
while($jg_wu10r=mysql_fetch_array($jg_xrpiy))
{
$jg_i1bmk=(string)$jg_wu10r["value"];
}
}
return $jg_i1bmk;
}
function jg_1091t()
{
$jg_6vlgd='<select name="jg_amo10d" id="jg_amo10d" style="margin-bottom: 0px; margin-top: 0px; margin-left: 6px; margin-right: 0px;" onchange="jg_xlh26a(this);">';
$jg_neqfu='';
$jg_awitu='';
switch (jg_8h1h9())
{
case ("xml"):
$jg_neqfu='selected';
break;
case ("tsv"):
$jg_awitu='selected';
break;
default:
break;
}
$jg_6vlgd=$jg_6vlgd.'<option value="xml" '.$jg_neqfu.' >XML RSS 2.0</option>';
$jg_6vlgd=$jg_6vlgd.'<option value="tsv" '.$jg_awitu.' >TSV</option>';
$jg_6vlgd=$jg_6vlgd.'</select>';
return $jg_6vlgd;
}
function jg_c6iht()
{
if(!IS_MIJOSHOP==1){
if(jg_gsqlb()!==1)
{
require JG_GQ9ZI;
echo '<div class="help" style="margin: 5px;">'.$_['text_the_session_is_no_longer_active'].'&nbsp;&nbsp;'.$_['text_please_log_in_to_start_a_new_session'].'</div>';
exit;
}
}
}
function jg_gsqlb()
{
$jg_3lwxm=0;
$sessionpath=session_save_path();

//turn error reporting off
$original_error_reporting_value=ini_get('error_reporting');
error_reporting(0); //temporarily disable error reporting so warnings are not displayed

ini_set('session.save_path', $sessionpath);
if(!isset($_SESSION)){session_start();}

//turn error reporting on
ini_set('error_reporting',$original_error_reporting_value); //return error reporting to original value

if(load_opencart_version_from_database()=='1.4.7')
{
if(isset($_SESSION['user_id'])){$jg_3lwxm=1;}
}else{
if((isset($_SESSION['user_id']))&&(isset($_SESSION['token']))){$jg_3lwxm=1;}
}
return $jg_3lwxm;
}
function jg_dp9hy()
{
if (!file_exists(JG_1EOBZ)){jg_jkr8b(JG_1EOBZ,'default_google_product_category',JG_9VCMQ);}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( JG_1EOBZ );
$jg_hzdws=$jg_9dug9->getElementsByTagName( "default_google_product_category" );
$jg_10nxez="";
foreach( $jg_hzdws as $jg_5dcum )
{
$jg_10nxez=$jg_hzdws->item(0)->nodeValue;
}
return $jg_10nxez;
}
function jg_baxsj($jg_jbr5e,$jg_v4r4h,$jg_oabyg)
{
if (!file_exists($jg_jbr5e)){jg_jkr8b($jg_jbr5e,$jg_v4r4h,$jg_oabyg);}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load($jg_jbr5e);
$jg_hzdws=$jg_9dug9->getElementsByTagName($jg_v4r4h);
$jg_10nxez="";
foreach($jg_hzdws as $jg_5dcum)
{
$jg_10nxez=$jg_hzdws->item(0)->nodeValue;
}
$jg_10nxez=jg_kkyro($jg_10nxez);
return $jg_10nxez;
}
function jg_brack()
{
global $jg_n4vej;
if (!file_exists($jg_n4vej)){jg_zxeqn('false');}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( $jg_n4vej );
$jg_hzdws=$jg_9dug9->getElementsByTagName( "default_convert_non_compliant_characters" );
$jg_10nxez="";
foreach( $jg_hzdws as $jg_i5s61 )
{
$jg_10nxez=$jg_hzdws->item(0)->nodeValue;
}
return $jg_10nxez;
}
function jg_hqoa1y()
{
global $jg_10nm2;
if (!file_exists($jg_10nm2)){jg_odx7c('false');}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( $jg_10nm2 );
$jg_hzdws=$jg_9dug9->getElementsByTagName( "default_use_sef_urls_for_data_feed_urls_list" );
$jg_10nxez="";
foreach( $jg_hzdws as $jg_i5s61 )
{
$jg_10nxez=$jg_hzdws->item(0)->nodeValue;
}
return $jg_10nxez;
}
function jg_6cr4sw()
{
global $jg_510jc;
if (!file_exists($jg_510jc)){jg_msvji1('false');}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( $jg_510jc );
$jg_hzdws=$jg_9dug9->getElementsByTagName( "default_remove_html_tags_from_product_descriptions" );
$jg_10nxez="";
foreach( $jg_hzdws as $jg_i5s61 )
{
$jg_10nxez=$jg_hzdws->item(0)->nodeValue;
}
return $jg_10nxez;
}
function load_xml_default_enclose_xml_data_feed_attributes_within_cdata_sections()
{
if (!file_exists(JG_JIRQW)){save_xml_default_enclose_xml_data_feed_attributes_within_cdata_sections('true');}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load(JG_JIRQW);
$jg_hzdws=$jg_9dug9->getElementsByTagName("default_surround_xml_data_feed_attributes_with_cdata_tags");
$jg_10nxez="";
foreach($jg_hzdws as $jg_i5s61)
{
$jg_10nxez=$jg_hzdws->item(0)->nodeValue;
}
return $jg_10nxez;
}
function load_xml_default_use_weight_for_shipping_weight()
{
if (!file_exists(JG_CJPFR)){save_xml_default_use_weight_for_shipping_weight('false');}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load(JG_CJPFR);
$jg_hzdws=$jg_9dug9->getElementsByTagName("default_use_weight_for_shipping_weight");
$jg_10nxez="";
foreach($jg_hzdws as $jg_i5s61)
{
$jg_10nxez=$jg_hzdws->item(0)->nodeValue;
}
return $jg_10nxez;
}
function jg_uu10dt()
{
global $jg_ee103o;
if (!file_exists($jg_ee103o)){jg_gk3eeq('false');}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( $jg_ee103o );
$jg_hzdws=$jg_9dug9->getElementsByTagName( "default_shorten_product_descriptions_to_10000_characters_or_less" );
$jg_10nxez="";
foreach( $jg_hzdws as $jg_i5s61 )
{
$jg_10nxez=$jg_hzdws->item(0)->nodeValue;
}
return $jg_10nxez;
}
function jg_v6cev()
{
global $jg_2am32;
if (!file_exists($jg_2am32)){jg_jdoht3('false');}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( $jg_2am32 );
$jg_hzdws=$jg_9dug9->getElementsByTagName( "default_correct_lone_ampersands_in_product_names_and_descriptions" );
$jg_10nxez="";
foreach( $jg_hzdws as $jg_i5s61 )
{
$jg_10nxez=$jg_hzdws->item(0)->nodeValue;
}
return $jg_10nxez;
}
function jg_th4x8()
{
global $jg_lyk62;
if (!file_exists($jg_lyk62)){jg_t7jqd('false');}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( $jg_lyk62 );
$jg_hzdws=$jg_9dug9->getElementsByTagName( "default_do_not_merge_custom_attribute_assignments" );
$jg_10nxez="";
foreach( $jg_hzdws as $jg_i5s61 )
{
$jg_10nxez=$jg_hzdws->item(0)->nodeValue;
}
return $jg_10nxez;
}
function jg_7u758()
{
$jg_9jo87="";
$jg_4s8uo=DB_PREFIX."setting";
$jg_ogto3=0;
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_4s8uo." WHERE ".$jg_4s8uo.".group='google_merchant_center_feed' AND ".$jg_4s8uo.".key='password_protect_the_data_feed'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_9jo87=$jg_hu8lx["value"];
}
if($jg_9jo87==''){$jg_9jo87='false';}
return $jg_9jo87;
}
function jg_shr18()
{
$jg_9jo87="";
$jg_4s8uo=DB_PREFIX."setting";
$jg_ogto3=0;
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_4s8uo." WHERE ".$jg_4s8uo.".group='google_merchant_center_feed' AND ".$jg_4s8uo.".key='jg_rfcpqv'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_9jo87=$jg_hu8lx["value"];
}
return $jg_9jo87;
}
function jg_6nwzw()
{
$jg_9jo87="";
$jg_4s8uo=DB_PREFIX."setting";
$jg_ogto3=0;
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_4s8uo." WHERE ".$jg_4s8uo.".group='google_merchant_center_feed' AND ".$jg_4s8uo.".key='jg_wj2fzj'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_9jo87=$jg_hu8lx["value"];
}
return $jg_9jo87;
}
function load_opencart_version_from_database()
{
$jg_9jo87="";
$jg_4s8uo=DB_PREFIX."setting";
$jg_ogto3=0;
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_4s8uo." WHERE ".$jg_4s8uo.".group='google_merchant_center_feed' AND ".$jg_4s8uo.".key='opencart_version'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_9jo87=$jg_hu8lx["value"];
}
return $jg_9jo87;
}
function jg_8h1h9()
{
global $jg_5od28;
if (!file_exists($jg_5od28)){jg_u62g7("xml");}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( $jg_5od28 );
$jg_qimjs=$jg_9dug9->getElementsByTagName( "data_feed_format" );
$jg_54vmr="";
foreach( $jg_qimjs as $jg_7qg2b )
{
$jg_54vmr=$jg_qimjs->item(0)->nodeValue;
}
if ($jg_54vmr=="")
{
$jg_54vmr="xml";
jg_u62g7($jg_54vmr);
}
return $jg_54vmr;
}
function jg_lh56j()
{
global $jg_y74wl;
global $jg_lhkoo;
if (!file_exists($jg_y74wl)){jg_pi753("en");}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( $jg_y74wl );
$jg_7hpyf=$jg_9dug9->getElementsByTagName( "taxonomy_language" );
$jg_guttx="";
foreach( $jg_7hpyf as $jg_taxb1 )
{
$jg_guttx=$jg_7hpyf->item(0)->nodeValue;
}
if ($jg_guttx=="")
{
$jg_guttx="en";
jg_8pgxk($jg_guttx);
}
if ($jg_lhkoo=="jg_x2d4q4")
{
return $jg_guttx;
}
else
{
echo $jg_guttx;
}
}
function jg_tlwth($jg_6o1l1, $jg_lerkz, $jg_10aik, $jg_a6822)
{
$jg_6o1l1=jg_10sbg($jg_6o1l1);
$jg_lerkz=jg_10sbg($jg_lerkz);
$jg_10aik=jg_10sbg($jg_10aik);
$jg_a6822=jg_10sbg($jg_a6822);
$jg_6o1l1=jg_4ghsp(jg_dgsqr($jg_6o1l1));
$jg_lerkz=jg_4ghsp(jg_dgsqr($jg_lerkz));
$jg_10aik=jg_4ghsp(jg_dgsqr($jg_10aik));
$jg_a6822=jg_4ghsp(jg_dgsqr($jg_a6822));
if (jg_q9ktb($jg_6o1l1, $jg_lerkz, $jg_10aik, $jg_a6822))
{
jg_lvlq9($jg_6o1l1, $jg_lerkz, $jg_10aik, $jg_a6822);
}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( JG_ZXZFK );
$jg_tqujp=$jg_9dug9->getElementsByTagName( "google_merchant_center_feed_attribute_assignments" );
$jg_ogto3=0;
foreach( $jg_tqujp as $jg_5wovu )
{
$jg_3rpps=$jg_9dug9->createElement("assignment");
$jg_dfwlk=$jg_5wovu->getElementsByTagName( "assignment" ); 
foreach( $jg_dfwlk as $jg_h110l )
{
$jg_h110l->parentNode->insertBefore($jg_3rpps, $jg_h110l);
$jg_ogto3+=1;
break;
}
if($jg_ogto3==0){$jg_5wovu->appendChild($jg_3rpps);}
$jg_2m5w5=$jg_9dug9->createElement("opencart_field");
$jg_3rpps->appendChild($jg_2m5w5);
$jg_t9aje=$jg_9dug9->createTextNode($jg_6o1l1);
$jg_2m5w5->appendChild($jg_t9aje);
$jg_b4ll8=$jg_9dug9->createElement("opencart_field_value");
$jg_3rpps->appendChild($jg_b4ll8);
$jg_t9aje=$jg_9dug9->createTextNode($jg_lerkz);
$jg_b4ll8->appendChild($jg_t9aje);
$jg_sz7j1=$jg_9dug9->createElement("google_attribute");
$jg_3rpps->appendChild($jg_sz7j1);
$jg_t9aje=$jg_9dug9->createTextNode($jg_10aik);
$jg_sz7j1->appendChild($jg_t9aje);
$jg_o4cso=$jg_9dug9->createElement("google_attribute_value");
$jg_3rpps->appendChild($jg_o4cso);
$jg_t9aje=$jg_9dug9->createTextNode($jg_a6822);
$jg_o4cso->appendChild($jg_t9aje);
$jg_9dug9->save(JG_ZXZFK);
}
jg_vb104(JG_ZXZFK);
}
function jg_3jx10($jg_zsbqn,$jg_hax6g,$jg_es58i,$jg_q2467)
{
$jg_zsbqn=jg_10sbg($jg_zsbqn);
$jg_hax6g=jg_10sbg($jg_hax6g);
$jg_es58i=jg_10sbg($jg_es58i);
$jg_q2467=jg_10sbg($jg_q2467);
$jg_zsbqn=jg_4ghsp(jg_dgsqr($jg_zsbqn));
$jg_hax6g=jg_4ghsp(jg_dgsqr($jg_hax6g));
$jg_es58i=jg_4ghsp(jg_dgsqr($jg_es58i));
$jg_q2467=jg_4ghsp(jg_dgsqr($jg_q2467));
if (jg_tys69($jg_hax6g, $jg_es58i, $jg_q2467))
{
jg_l284p($jg_zsbqn, $jg_hax6g, $jg_es58i, $jg_q2467);
}
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( JG_3Z28H );
$jg_102m8=$jg_9dug9->getElementsByTagName( "google_merchant_center_feed_custom_product_fields" );
$jg_ogto3=0;
foreach( $jg_102m8 as $jg_k5stx )
{
$jg_6pes7=$jg_9dug9->createElement("custom_product_field");
$jg_102m8=$jg_k5stx->getElementsByTagName( "custom_product_field" ); 
foreach( $jg_102m8 as $jg_k5stx )
{
$jg_k5stx->parentNode->insertBefore($jg_6pes7, $jg_k5stx);
$jg_ogto3+=1;
break;
}
if($jg_ogto3==0){$jg_k5stx->appendChild($jg_6pes7);}
$item_field_title=$jg_9dug9->createElement("field_title");
$jg_6pes7->appendChild($item_field_title);
$jg_t9aje=$jg_9dug9->createTextNode($jg_zsbqn);
$item_field_title->appendChild($jg_t9aje);
$item_column_name=$jg_9dug9->createElement("column_name");
$jg_6pes7->appendChild($item_column_name);
$jg_t9aje=$jg_9dug9->createTextNode($jg_hax6g);
$item_column_name->appendChild($jg_t9aje);
$item_attribute_name=$jg_9dug9->createElement("attribute_name");
$jg_6pes7->appendChild($item_attribute_name);
$jg_t9aje=$jg_9dug9->createTextNode($jg_es58i);
$item_attribute_name->appendChild($jg_t9aje);
$item_attribute_prefix=$jg_9dug9->createElement("attribute_prefix");
$jg_6pes7->appendChild($item_attribute_prefix);
$jg_t9aje=$jg_9dug9->createTextNode($jg_q2467);
$item_attribute_prefix->appendChild($jg_t9aje);
$jg_9dug9->save(JG_3Z28H);
}
jg_vb104(JG_3Z28H);
}
function jg_zxqw2($jg_ugsw6, $jg_njlma, $jg_xfq10, $jg_rua3g, $jg_xalz1, $jg_6iwrc, $jg_110df, $jg_57rrx)
{
$jg_ugsw6=jg_10sbg($jg_ugsw6);
$jg_njlma=jg_10sbg($jg_njlma);
$jg_xfq10=jg_10sbg($jg_xfq10);
$jg_rua3g=jg_10sbg($jg_rua3g);
$jg_xalz1=jg_10sbg($jg_xalz1);
$jg_6iwrc=jg_10sbg($jg_6iwrc);
$jg_110df=jg_10sbg($jg_110df);
$jg_57rrx=jg_10sbg($jg_57rrx);
$jg_ugsw6=jg_4ghsp(jg_dgsqr($jg_ugsw6));
$jg_njlma=jg_4ghsp(jg_dgsqr($jg_njlma));
$jg_xfq10=jg_4ghsp(jg_dgsqr($jg_xfq10));
$jg_rua3g=jg_4ghsp(jg_dgsqr($jg_rua3g));
$jg_xalz1=jg_4ghsp(jg_dgsqr($jg_xalz1));
$jg_6iwrc=jg_4ghsp(jg_dgsqr($jg_6iwrc));
$jg_110df=jg_4ghsp(jg_dgsqr($jg_110df));
$jg_57rrx=jg_4ghsp(jg_dgsqr($jg_57rrx));
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( JG_ZXZFK );
$jg_tqujp=$jg_9dug9->getElementsByTagName( "google_merchant_center_feed_attribute_assignments" );
$jg_ogto3=0;
foreach( $jg_tqujp as $jg_9910f )
{
$jg_dfwlk=$jg_9910f->getElementsByTagName( "assignment" ); 
foreach( $jg_dfwlk as $jg_h110l )
{
$jg_s8re3=$jg_h110l->getElementsByTagName( "opencart_field" );
$jg_rrqld=$jg_h110l->getElementsByTagName( "opencart_field_value" );
$jg_4p101=$jg_h110l->getElementsByTagName( "google_attribute" );
$jg_ie10b=$jg_h110l->getElementsByTagName( "google_attribute_value" );
$jg_6o1l1=jg_dgsqr(jg_j252v($jg_s8re3->item(0)->nodeValue));
$jg_lerkz=jg_dgsqr(jg_j252v($jg_rrqld->item(0)->nodeValue));
$jg_10aik=jg_dgsqr(jg_j252v($jg_4p101->item(0)->nodeValue));
$jg_a6822=jg_dgsqr(jg_j252v($jg_ie10b->item(0)->nodeValue));
$jg_ugsw6=jg_dgsqr(jg_j252v($jg_ugsw6));
$jg_njlma=jg_dgsqr(jg_j252v($jg_njlma));
$jg_xfq10=jg_dgsqr(jg_j252v($jg_xfq10));
$jg_rua3g=jg_dgsqr(jg_j252v($jg_rua3g));
if (($jg_ugsw6==$jg_6o1l1)&&($jg_njlma==$jg_lerkz)&&($jg_xfq10==$jg_10aik)&&($jg_rua3g==$jg_a6822))
{
$jg_h110l->getElementsByTagName( "opencart_field" )->item(0)->nodeValue=jg_4ghsp(jg_dgsqr($jg_xalz1));
$jg_h110l->getElementsByTagName( "opencart_field_value" )->item(0)->nodeValue=jg_4ghsp(jg_dgsqr($jg_6iwrc));
$jg_h110l->getElementsByTagName( "google_attribute" )->item(0)->nodeValue=jg_4ghsp(jg_dgsqr($jg_110df));
$jg_h110l->getElementsByTagName( "google_attribute_value" )->item(0)->nodeValue=jg_4ghsp(jg_dgsqr($jg_57rrx));
}
}
$jg_9dug9->save(JG_ZXZFK);
jg_vb104(JG_ZXZFK);
}
}
function jg_47xys($jg_iisbw, $jg_16z4j, $jg_5e8tr, $jg_b11do, $jg_v10ht, $jg_8aomp, $jg_rr1qb, $jg_tdl6r)
{
$jg_iisbw=jg_10sbg($jg_iisbw);
$jg_16z4j=jg_10sbg($jg_16z4j);
$jg_5e8tr=jg_10sbg($jg_5e8tr);
$jg_b11do=jg_10sbg($jg_b11do);
$jg_v10ht=jg_10sbg($jg_v10ht);
$jg_8aomp=jg_10sbg($jg_8aomp);
$jg_rr1qb=jg_10sbg($jg_rr1qb);
$jg_tdl6r=jg_10sbg($jg_tdl6r);
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( JG_3Z28H );
$jg_tqujp=$jg_9dug9->getElementsByTagName( "google_merchant_center_feed_custom_product_fields" );
$jg_ogto3=0;
foreach( $jg_tqujp as $jg_9910f )
{
$jg_dfwlk=$jg_9910f->getElementsByTagName( "custom_product_field" ); 
foreach( $jg_dfwlk as $jg_h110l )
{
$jg_br6hz=$jg_h110l->getElementsByTagName( "field_title" );
$jg_jfc6g=$jg_h110l->getElementsByTagName( "column_name" );
$jg_e1v1g=$jg_h110l->getElementsByTagName( "attribute_name" );
$jg_ezrde=$jg_h110l->getElementsByTagName( "attribute_prefix" );
$jg_zsbqn=jg_dgsqr(jg_j252v($jg_br6hz->item(0)->nodeValue));
$jg_hax6g=jg_dgsqr(jg_j252v($jg_jfc6g->item(0)->nodeValue));
$jg_es58i=jg_dgsqr(jg_j252v($jg_e1v1g->item(0)->nodeValue));
$jg_q2467=jg_dgsqr(jg_j252v($jg_ezrde->item(0)->nodeValue));
$jg_iisbw=jg_dgsqr(jg_j252v($jg_iisbw));
$jg_16z4j=jg_dgsqr(jg_j252v($jg_16z4j));
$jg_5e8tr=jg_dgsqr(jg_j252v($jg_5e8tr));
$jg_b11do=jg_dgsqr(jg_j252v($jg_b11do));
if (($jg_iisbw==$jg_zsbqn)&&($jg_16z4j==$jg_hax6g)&&($jg_5e8tr==$jg_es58i)&&($jg_b11do==$jg_q2467))
{
$jg_h110l->getElementsByTagName( "field_title" )->item(0)->nodeValue=jg_4ghsp(jg_dgsqr($jg_v10ht));
$jg_h110l->getElementsByTagName( "column_name" )->item(0)->nodeValue=jg_4ghsp(jg_dgsqr($jg_8aomp));
$jg_h110l->getElementsByTagName( "attribute_name" )->item(0)->nodeValue=jg_4ghsp(jg_dgsqr($jg_rr1qb));
$jg_h110l->getElementsByTagName( "attribute_prefix" )->item(0)->nodeValue=jg_4ghsp(jg_dgsqr($jg_tdl6r));
}
}
$jg_9dug9->save(JG_3Z28H);
jg_vb104(JG_3Z28H);
}
}
function jg_wb5m2($jg_kme4n, $jg_5atm6, $jg_h3as2, $jg_d410tc, $jg_xxtmi)
{
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( $jg_kme4n );
$jg_bvxyd=$jg_9dug9->getElementsByTagName( "google_merchant_center_feed_data_feeds" );
foreach( $jg_bvxyd as $jg_l910j )
{
$jg_gvghm=$jg_9dug9->createElement("data_feed");
$jg_l910j->appendChild($jg_gvghm);
$jg_10c10=$jg_9dug9->createElement("target_country");
$jg_gvghm->appendChild($jg_10c10);
$jg_t9aje=$jg_9dug9->createTextNode($jg_5atm6);
$jg_10c10->appendChild($jg_t9aje);
$jg_mr49w=$jg_9dug9->createElement("currency_code");
$jg_gvghm->appendChild($jg_mr49w);
$jg_t9aje=$jg_9dug9->createTextNode($jg_h3as2);
$jg_mr49w->appendChild($jg_t9aje);
$jg_vwq8c=$jg_9dug9->createElement("language_code");
$jg_gvghm->appendChild($jg_vwq8c);
$jg_t9aje=$jg_9dug9->createTextNode(jg_4ghsp($jg_d410tc));
$jg_vwq8c->appendChild($jg_t9aje);
$jg_d8pl5=$jg_9dug9->createElement("items_per_page");
$jg_gvghm->appendChild($jg_d8pl5);
$jg_t9aje=$jg_9dug9->createTextNode($jg_xxtmi);
$jg_d8pl5->appendChild($jg_t9aje);
$jg_6atkq=$jg_9dug9->createElement("feed_url");
$jg_gvghm->appendChild($jg_6atkq);
$jg_t9aje=$jg_9dug9->createTextNode("");
$jg_6atkq->appendChild($jg_t9aje);
$jg_9dug9->save($jg_kme4n);
break;
}
jg_vb104($jg_kme4n);
}
function jg_dhr3l($jg_3o9hb)
{
require JG_GQ9ZI;
$jg_4ldrt='';
$jg_au6k9='';
$jg_4ldrt.="<table class=\"list\" style=\"margin-top: 0px; margin-bottom: 0px;\">";
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( JG_3Z28H );
$jg_102m8=$jg_9dug9->getElementsByTagName( "custom_product_field" );
foreach( $jg_102m8 as $jg_k5stx )
{
$jg_br6hz=$jg_k5stx->getElementsByTagName( "field_title" );
$jg_kxe4i=$jg_br6hz->item(0)->nodeValue;
$jg_kxe4i=jg_ecfq2($jg_kxe4i);
$jg_jfc6g=$jg_k5stx->getElementsByTagName( "column_name" );
$jg_vag4j=$jg_jfc6g->item(0)->nodeValue;
$jg_vag4j=jg_ecfq2($jg_vag4j);
$jg_e1v1g=$jg_k5stx->getElementsByTagName( "attribute_name" );
$jg_jfjwh=$jg_e1v1g->item(0)->nodeValue;
$jg_jfjwh=jg_ecfq2($jg_jfjwh);
$jg_ezrde=$jg_k5stx->getElementsByTagName( "attribute_prefix" );
$jg_5rqod=$jg_ezrde->item(0)->nodeValue;
$jg_5rqod=jg_ecfq2($jg_5rqod);
$jg_au6k9.="<tr>";
$jg_au6k9.="<td style=\"vertical-align: middle;\">";
$jg_au6k9.=$jg_kxe4i.":";
$jg_au6k9.="</td>";
$jg_au6k9.="<td style=\"vertical-align: middle; margin-left: 5px; margin-right: 0px; padding-right: 0px;\">";
$jg_au6k9.="<input type=\"text\" id=\"custom_product_field_id_".$jg_vag4j."\" name=\"".$jg_vag4j."\" style=\"margin-left: 0px; margin-right: 6px; margin-bottom: 6px; margin-top: 6px; width: 310px;\" maxlength=\"".jg_dngng($jg_vag4j)."\"; value=\"".jg_3s7ap($jg_3o9hb,$jg_vag4j)."\" onkeyup=\"jg_6yr5rx(this.value,this.id,false);\"></input>";
switch ($jg_vag4j)
{
case ($jg_vag4j=='adwords_grouping'||$jg_vag4j=='adwords_labels'||$jg_vag4j=='adwords_redirect'):
$jg_au6k9.=jg_9g39p(true);
break;
case ('adwords_publish'):
$jg_au6k9.=jg_im8jz('select_attribute_for_custom_product_fields_adwords_publish','custom_product_field_id_'.$jg_vag4j,true);
$jg_au6k9.=jg_9g39p(true);
break;
case ('adwords_queryparam'):
$jg_au6k9.="<img id=\"help_for_custom_product_field_adwords_queryparam\" title=\"".$_['text_adwords_queryparam']."\" onclick=\"jg_8fvfpf(this,'information_basic_hovered','custom_product_field_id_adwords_queryparam');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" />";
break;
case ('age_group'):
$jg_au6k9.=jg_3hq9w('select_attribute_for_custom_product_fields_age_group','custom_product_field_id_'.$jg_vag4j,true);
break;
case ('availability'):
$jg_au6k9.=jg_s69wn('select_attribute_for_custom_product_fields_availability','custom_product_field_id_'.$jg_vag4j,true);
break;
case ('condition'):
$jg_au6k9.=jg_42twf('select_attribute_for_custom_product_fields_condition','custom_product_field_id_'.$jg_vag4j,true);
break;
case ('excluded_destination'):
$jg_au6k9.=jg_jz6ek('select_attribute_for_attribute_assignments_excluded_destination','custom_product_field_id_'.$jg_vag4j,true);
break;
case ('gender'):
$jg_au6k9.=jg_sd5by('select_attribute_for_custom_product_fields_gender','custom_product_field_id_'.$jg_vag4j,true);
break;
case ($jg_vag4j=='google_product_category')||($jg_vag4j=='google_category'):
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_8fvfpf(this,'google_categories_list_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q('',true);
break;
case ($jg_vag4j=='google_product_category_au')||($jg_vag4j=='google_category_au'):
$jg_e4f62='en-AU';
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q($jg_e4f62,true);
break;
case ($jg_vag4j=='google_product_category_br')||($jg_vag4j=='google_category_br'):
$jg_e4f62='pt-BR';
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q($jg_e4f62,true);
break;
case ($jg_vag4j=='google_product_category_ca')||($jg_vag4j=='google_category_ca'):
$jg_e4f62='en';
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q($jg_e4f62,true);
break;
case ($jg_vag4j=='google_product_category_ch')||($jg_vag4j=='google_category_ch'):
$jg_e4f62='de';
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q($jg_e4f62,true);
break;
case ($jg_vag4j=='google_product_category_cn')||($jg_vag4j=='google_category_cn'):
$jg_e4f62='cn';
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q($jg_e4f62,true);
break;
case ($jg_vag4j=='google_product_category_cz')||($jg_vag4j=='google_category_cz'):
$jg_e4f62='cs-CZ';
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q($jg_e4f62,true);
break;
case ($jg_vag4j=='google_product_category_de')||($jg_vag4j=='google_category_de'):
$jg_e4f62='de';
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q($jg_e4f62,true);
break;
case ($jg_vag4j=='google_product_category_es')||($jg_vag4j=='google_category_es'):
$jg_e4f62='es';
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q($jg_e4f62,true);
break;
case ($jg_vag4j=='google_product_category_fr')||($jg_vag4j=='google_category_fr'):
$jg_e4f62='fr';
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q($jg_e4f62,true);
break;
case ($jg_vag4j=='google_product_category_gb')||($jg_vag4j=='google_category_gb'):
$jg_e4f62='en-GB';
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q($jg_e4f62,true);
break;
case ($jg_vag4j=='google_product_category_it')||($jg_vag4j=='google_category_it'):
$jg_e4f62='it';
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q($jg_e4f62,true);
break;
case ($jg_vag4j=='google_product_category_jp')||($jg_vag4j=='google_category_jp'):
$jg_e4f62='jp';
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q($jg_e4f62,true);
break;
case ($jg_vag4j=='google_product_category_nl')||($jg_vag4j=='google_category_nl'):
$jg_e4f62='nl';
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q($jg_e4f62,true);
break;
case ($jg_vag4j=='google_product_category_us')||($jg_vag4j=='google_category_us'):
$jg_e4f62='en';
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_select_google_product_category']."\" onclick=\"jg_nrj10s='".$jg_e4f62."';jg_8fvfpf(this,'google_categories_list_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/category.png\" />";
$jg_au6k9.=jg_h9e5q($jg_e4f62,true);
break;
case ($jg_vag4j=='google_shipping'||$jg_vag4j=='google_tax'):
$jg_au6k9.="<img title=\"".$_['text_tax_and_shipping']."\" style=\"border:none; vertical-align: middle; margin-right: 6px; cursor: pointer;\" onclick=\"window.open('http://support.google.com/merchants/bin/answer.py?hl=en&answer=160162', '_blank');return false;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" />";
break;
case ('shipping_weight'):
$jg_au6k9.="<img onclick=\"jg_2aj10q();return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_use_weight_for_shipping_weight']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/use-weight.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/use-weight.png\" />";
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_how_to_use_shipping_weight']."\" onclick=\"jg_8fvfpf(this,'information_basic_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" />";
break;
case ('skip_product'):
$jg_au6k9.="<img onclick=\"jg_5o4632();return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_skip_product']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/skip-product.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/skip-product.png\" />";
$jg_au6k9.="<img id=\"img-show-hover-div-".(string)rand(100000, 1000000)."\" title=\"".$_['text_how_to_skip_product']."\" onclick=\"jg_8fvfpf(this,'information_basic_hovered','custom_product_field_id_".$jg_vag4j."');return false;\" style=\"vertical-align: middle; cursor: pointer; margin-left: 0px; margin-right: 6px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/information.png\" />";
break;
default:
break;
}
$jg_au6k9.="<img id=\"img-show-hover-div-select-field-length-hovered-".(string)rand(100000, 1000000)."\" onclick=\"jg_8fvfpf(this,'select_field_length_hovered','".$jg_vag4j."');return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_resize_field']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/resize.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/resize.png\" />";
$jg_au6k9.="<img onclick=\"document.getElementById('custom_product_field_id_".$jg_vag4j."').value='';jg_6yr5rx(document.getElementById('custom_product_field_id_".$jg_vag4j."').value,'custom_product_field_id_".$jg_vag4j."',false);return false;\" style=\"padding-right: 0px; cursor: pointer; margin-left: 0px; margin-right: 6px; vertical-align: middle; \" title=\"".$_['text_clear']."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/clear.png\" />";
$jg_au6k9.="</td>";
$jg_au6k9.="</td>";
$jg_au6k9.="</tr>";
}
if($jg_au6k9=='')
{
$jg_au6k9.="<tr>";
$jg_au6k9.="<td style=\"vertical-align: middle;\">";
$jg_au6k9.="<div>There are no custom product fields.</div>";
$jg_au6k9.="</td>";
$jg_au6k9.="</tr>";
}
$jg_4ldrt.=$jg_au6k9;
$jg_4ldrt.="</table>";
return $jg_4ldrt;
}
function jg_3s7ap($jg_3o9hb,$jg_hax6g)
{
$jg_lrcjj=DB_PREFIX."product";
$jg_ogto3=0;
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xm2pz="SELECT DISTINCT ".$jg_lrcjj.".".$jg_hax6g." FROM ".$jg_lrcjj." WHERE ".$jg_lrcjj.".product_id=".$jg_3o9hb."";
$jg_xrpiy=mysql_query($jg_xm2pz, $jg_9ul65) or die (mysql_error());
$jg_9jo87='';
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_9jo87=$jg_hu8lx[$jg_hax6g];
}
$jg_9jo87=jg_kkyro($jg_9jo87);
return $jg_9jo87;
}
function jg_z7h10()
{
$jg_lrcjj=DB_PREFIX."product";
$jg_i8por=DB_PREFIX."product_description";
$jg_b4tsh="product_id";
$jg_hax6g="name";
define("JG_RBM6Z", jg_s7xf6(jg_2ykgz()));
$jg_ogto3=0;
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xm2pz="SELECT DISTINCT * FROM ".$jg_i8por." , ".$jg_lrcjj." WHERE ".$jg_lrcjj.".".$jg_b4tsh."=".$jg_i8por.".".$jg_b4tsh." AND ".$jg_i8por.".language_id=".JG_RBM6Z." ORDER BY ".$jg_i8por.".".$jg_hax6g." ASC LIMIT 0,1;";
$jg_xrpiy=mysql_query($jg_xm2pz, $jg_9ul65) or die (mysql_error());
$jg_9jo87='';
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_9jo87=$jg_hu8lx['product_id'];
break;
}
return $jg_9jo87;
}
function jg_fop23($jg_5atm6,$jg_xxtmi,$jg_6v7hp,$jg_d410tc)
{
$jg_iicyz='';
if($jg_d410tc!='')
{
$jg_iicyz="&language=".$jg_d410tc;
}
$jg_ciuz7=jg_z7dd7($jg_6v7hp).'index.php?route=feed/'.JG_9TVQEW;
$jg_zkhg6='';
$jg_ciuz7=$jg_ciuz7."&target_country=".jg_n36ho($jg_5atm6);
$jg_zkhg6='';
$jg_evt1n=jg_p8h10($jg_6v7hp);
if (($jg_xxtmi!="")&&((int)$jg_xxtmi >= 0)&&((int)$jg_xxtmi<$jg_evt1n))
{
$jg_zkhg6="";
$jg_10f61=0;
for ($i=1; $i<=($jg_evt1n); $i++)
{
if ($i>($jg_10f61 * (int)$jg_xxtmi))
{
$jg_10f61=$jg_10f61 + 1;
if(!IS_MIJOSHOP==1){
$jg_q5159=$jg_ciuz7."&items_per_page=".$jg_xxtmi."&page=".(string)$jg_10f61.$jg_iicyz;
}else{
$jg_q5159=$jg_ciuz7."&items_per_page=".$jg_xxtmi."&page=".(string)$jg_10f61.$jg_iicyz."&format=raw&tmpl=component";
}
jg_szbpr($jg_q5159, jg_9sa3o($jg_q5159,$jg_6v7hp,$jg_d410tc));
if ($i<=(($jg_evt1n) - (int)$jg_xxtmi))
{
$jg_zkhg6=$jg_zkhg6.'<div style="height: '.(string)JG_WJBSF.'px;" id="data-feed-urls-middle-row-div-store-id-'.$jg_6v7hp.'-page-'.$jg_10f61.'">'.jg_gkc7d($jg_q5159,$jg_6v7hp,$jg_d410tc,$jg_5atm6).'</div>';
}
else
{
$jg_zkhg6=$jg_zkhg6.'<div style="height: '.(string)JG_92RJX.'px;" id="data-feed-urls-last-row-div-store-id-'.$jg_6v7hp.'-page-'.$jg_10f61.'">'.jg_gkc7d($jg_q5159,$jg_6v7hp,$jg_d410tc,$jg_5atm6).'</div>';
}
}
}
}
else
{
if(!IS_MIJOSHOP==1){
$jg_q5159=$jg_ciuz7.$jg_iicyz;
}else{
$jg_q5159=$jg_ciuz7.$jg_iicyz."&format=raw&tmpl=component";
}
jg_szbpr($jg_q5159, jg_9sa3o($jg_q5159,$jg_6v7hp,$jg_d410tc));
$jg_zkhg6='<div style="height: '.(string)JG_8CYYC.'px;" id="data-feed-urls-first-row-div-store-id-'.$jg_6v7hp.'-language-code-'.$jg_d410tc.'">'.jg_gkc7d($jg_q5159,$jg_6v7hp,$jg_d410tc,$jg_5atm6).'</div>';
}
return $jg_zkhg6;
}
function jg_10mv5($jg_5atm6,$jg_xxtmi,$jg_6v7hp,$jg_d410tc)
{
$jg_iicyz='';
if($jg_d410tc!='')
{
$jg_iicyz="&language=".$jg_d410tc;
}
$jg_ciuz7=jg_z7dd7($jg_6v7hp).'index.php?route=feed/'.JG_9TVQEW;
$jg_zkhg6='';
if (jg_sbab1(jg_410q7($jg_5atm6)))
{
$jg_ciuz7=$jg_ciuz7."&target_country=".jg_n36ho($jg_5atm6);
$jg_zkhg6='';
$jg_evt1n=jg_p8h10($jg_6v7hp);
if (($jg_xxtmi!="")&&((int)$jg_xxtmi >= 0)&&((int)$jg_xxtmi<$jg_evt1n))
{
$jg_zkhg6="";
$jg_10f61=0;
for ($i=1; $i<=($jg_evt1n); $i++)
{
if ($i>($jg_10f61 * (int)$jg_xxtmi))
{
$jg_10f61=$jg_10f61 + 1;
$jg_q5159=$jg_ciuz7."&items_per_page=".$jg_xxtmi."&page=".(string)$jg_10f61.$jg_iicyz;
jg_szbpr($jg_q5159, jg_9sa3o($jg_q5159,$jg_6v7hp,$jg_d410tc));
if ($i<=(($jg_evt1n) - (int)$jg_xxtmi))
{
$jg_zkhg6=$jg_zkhg6.'<div style="height: '.(string)JG_WJBSF.'px;" id="data-feed-reports-middle-row-div-store-id-'.$jg_6v7hp.'-page-'.$jg_10f61.'">'.jg_kikfr($jg_q5159,$jg_6v7hp,$jg_d410tc).'</div>';
}
else
{
$jg_zkhg6=$jg_zkhg6.'<div style="height: '.(string)JG_92RJX.'px;" id="data-feed-reports-last-row-div-store-id-'.$jg_6v7hp.'-page-'.$jg_10f61.'">'.jg_kikfr($jg_q5159,$jg_6v7hp,$jg_d410tc).'</div>';
}
}
}
}
else
{
$jg_q5159=$jg_ciuz7.$jg_iicyz;
jg_szbpr($jg_q5159, jg_9sa3o($jg_q5159,$jg_6v7hp,$jg_d410tc));
$jg_zkhg6='<div style="height: '.(string)JG_8CYYC.'px;" id="data-feed-reports-first-row-div-store-id-'.$jg_6v7hp.'-language-code-'.$jg_d410tc.'">'.jg_kikfr($jg_q5159,$jg_6v7hp,$jg_d410tc).'</div>';
}
}
return $jg_zkhg6;
}
function jg_gkc7d($jg_q5159,$jg_6v7hp,$jg_d410tc,$jg_5atm6)
{
$jg_46tp9='';
if (jg_sbab1(jg_410q7($jg_5atm6)))
{
require JG_GQ9ZI;
$jg_46tp9.="<input id=\"data-feed-url-text-store-".(string)$jg_6v7hp."-".(string)rand(100000, 1000000)."\"title=\"".jg_63j7e($jg_q5159,$jg_6v7hp,$jg_d410tc)."\" type=\"text\" readonly=\"readonly\" style=\"margin-top: 5px; margin-bottom: 0px; width: 100px; vertical-align: top;\" onclick=\"this.select();return false;\" value=\"".jg_63j7e($jg_q5159,$jg_6v7hp,$jg_d410tc)."\"</input>";
$jg_46tp9.="<span style=\"margin-left: 5px; margin-right: 5px;\"><a href=\"".$jg_q5159."&output_format=xml\" target=\"_blank\"><img title=\"".$_['text_view_product_feed'].": XML RSS 2.0 ".$_['text_format']."\"style=\"vertical-align: middle; cursor: pointer; border-width: 0px; margin-top: 7px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/rss.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/rss.png\" /></a></span>";
$jg_46tp9.="<span style=\"margin-left: 0px; margin-right: 5px;\"><a href=\"".$jg_q5159."&output_format=xml&save_as_file=true\" target=\"_blank\"><img title=\"".$_['text_save_product_feed_as_file_on_web_server'].": XML RSS 2.0 ".$_['text_format']."\"style=\"vertical-align: middle; cursor: pointer; border-width: 0px; margin-top: 7px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/rss-save.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/rss-save.png\" /></a></span>";
$jg_46tp9.="<span style=\"margin-left: 0px; margin-right: 5px;\"><a href=\"".$jg_q5159."&output_format=xml&download_as_file=true\" target=\"_blank\"><img title=\"".$_['text_download_product_feed_as_file'].": XML RSS 2.0 ".$_['text_format']."\"style=\"vertical-align: middle; cursor: pointer; border-width: 0px; margin-top: 7px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/rss-download.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/rss-download.png\" /></a></span>";
$jg_46tp9.="<span style=\"margin-left: 0px; margin-right: 5px;\"><a href=\"".$jg_q5159."&output_format=tsv\" target=\"_blank\"><img title=\"".$_['text_view_product_feed'].": TSV ".$_['text_format']."\"style=\"vertical-align: middle; cursor: pointer; border-width: 0px; margin-top: 7px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/text.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/text.png\" /></a></span>";
$jg_46tp9.="<span style=\"margin-left: 0px; margin-right: 5px;\"><a href=\"".$jg_q5159."&output_format=tsv&save_as_file=true\" target=\"_blank\"><img title=\"".$_['text_save_product_feed_as_file_on_web_server'].": TSV ".$_['text_format']."\"style=\"vertical-align: middle; cursor: pointer; border-width: 0px; margin-top: 7px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/text-save.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/text-save.png\" /></a></span>";
$jg_46tp9.="<span style=\"margin-left: 0px; margin-right: 0px;\"><a href=\"".$jg_q5159."&output_format=tsv&download_as_file=true\" target=\"_blank\"><img title=\"".$_['text_download_product_feed_as_file'].": TSV ".$_['text_format']."\"style=\"vertical-align: middle; cursor: pointer; border-width: 0px; margin-top: 7px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/text-download.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/text-download.png\" /></a></span>";
}
return $jg_46tp9;
}
function jg_kikfr($jg_q5159,$jg_6v7hp,$jg_d410tc)
{
require JG_GQ9ZI;
if(!IS_MIJOSHOP==1){
$mijoshop_parameters='';
}else{
$mijoshop_parameters='&format=raw&tmpl=component';
}
$jg_46tp9="<span style=\"margin-left: 0px; margin-right: 5px;\"><a href=\"".$jg_q5159."&output_format=xml&memory_usage=true".$mijoshop_parameters."\" target=\"_blank\"><img title=\"".$_['text_view_report_of_server_memory_usage_by_product'].": XML RSS 2.0 ".$_['text_format']."\"style=\"vertical-align: middle; cursor: pointer; border-width: 0px; margin-top: 7px; margin-bottom: 4px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/report-memory-usage-rss.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/report-memory-usage.png\" /></a></span>";
$jg_46tp9.="<span style=\"margin-left: 0px; margin-right: 5px;\"><a href=\"".$jg_q5159."&output_format=tsv&memory_usage=true".$mijoshop_parameters."\" target=\"_blank\"><img title=\"".$_['text_view_report_of_server_memory_usage_by_product'].": TSV ".$_['text_format']."\"style=\"vertical-align: middle; cursor: pointer; border-width: 0px; margin-top: 7px; margin-bottom: 4px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/report-memory-usage-tsv.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/report-memory-usage.png\" /></a></span>";
$jg_46tp9.="<span style=\"margin-left: 0px; margin-right: 0px;\"><a href=\"".$jg_q5159."&output_format=xml&product_names=true".$mijoshop_parameters."\" target=\"_blank\"><img title=\"".$_['text_view_report_of_product_names_by_row_and_id_number']."\"style=\"vertical-align: middle; cursor: pointer; border-width: 0px; margin-top: 7px; margin-bottom: 4px;\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/report-product-names.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/report-product-names.png\" /></a></span>";
return $jg_46tp9;
}
function jg_n36ho($jg_5atm6)
{
$jg_el36s='us';
switch ($jg_5atm6)
{
case ("Australia"):
$jg_el36s='au';
break;
case ("Brazil"):
$jg_el36s='br';
break;
case ("Canada"):
$jg_el36s='ca';
break;
case ("China"):
$jg_el36s='cn';
break;
case ("Czech Republic"):
$jg_el36s='cz';
break;
case ("France"):
$jg_el36s='fr';
break;
case ("Germany"):
$jg_el36s='de';
break;
case ("Italy"):
$jg_el36s='it';
break;
case ("Japan"):
$jg_el36s='jp';
break;
case ("Netherlands"):
$jg_el36s='nl';
break;
case ("Spain"):
$jg_el36s='es';
break;
case ("Switzerland"):
$jg_el36s='ch';
break;
case ("United Kingdom"):
$jg_el36s='gb';
break;
case ("United States"):
$jg_el36s='us';
break;
default:
$jg_el36s='us';
break;
}
return $jg_el36s;
}
function jg_u7cqf($jg_5atm6)
{
require JG_GQ9ZI;
$jg_viyr5='United States';
switch ($jg_5atm6)
{
case ("Australia"):
$jg_viyr5=$_['text_country_name_australia'];
break;
case ("Brazil"):
$jg_viyr5=$_['text_country_name_brazil'];
break;
case ("Canada"):
$jg_viyr5=$_['text_country_name_canada'];
break;
case ("China"):
$jg_viyr5=$_['text_country_name_china'];
break;
case ("Czech Republic"):
$jg_viyr5=$_['text_country_name_czech_republic'];
break;
case ("France"):
$jg_viyr5=$_['text_country_name_france'];
break;
case ("Germany"):
$jg_viyr5=$_['text_country_name_germany'];
break;
case ("Italy"):
$jg_viyr5=$_['text_country_name_italy'];
break;
case ("Japan"):
$jg_viyr5=$_['text_country_name_japan'];
break;
case ("Netherlands"):
$jg_viyr5=$_['text_country_name_netherlands'];
break;
case ("Spain"):
$jg_viyr5=$_['text_country_name_spain'];
break;
case ("Switzerland"):
$jg_viyr5=$_['text_country_name_switzerland'];
break;
case ("United Kingdom"):
$jg_viyr5=$_['text_country_name_united_kingdom'];
break;
case ("United States"):
$jg_viyr5=$_['text_country_name_united_states'];
break;
default:
$jg_viyr5=$_['text_country_name_united_states'];
break;
}
return $jg_viyr5;
}
function jg_p8h10($jg_6v7hp)
{
$jg_lrcjj=DB_PREFIX."product";
$jg_wg46h=DB_PREFIX."product_to_store";
$jg_ogto3=0;
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT ".$jg_lrcjj.".product_id FROM ".$jg_lrcjj.", ".$jg_wg46h." WHERE ".$jg_lrcjj.".product_id=".$jg_wg46h.".product_id AND ".$jg_lrcjj.".status='1' AND ".$jg_wg46h.".store_id='".$jg_6v7hp."'", $jg_9ul65) or die (mysql_error());
return mysql_num_rows($jg_xrpiy);
}
function jg_skyjq()
{
$jg_lrcjj=DB_PREFIX."product";
$jg_ogto3=0;
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
return mysql_result(mysql_query("SELECT COUNT(".$jg_lrcjj.".product_id) FROM ".$jg_lrcjj),0);
}
function jg_2hx9u($jg_zsbqn,$jg_hax6g,$jg_o12oq,$jg_j681o,$jg_es58i,$jg_q2467)
{
require JG_GQ9ZI;
$jg_a4dkn='product';
if($jg_zsbqn=='')
{
return $_['text_the_field_title_cannot_be_blank'];
exit;
}
if($jg_hax6g=='')
{
return $_['text_the_column_name_cannot_be_blank'];
exit;
}
if($jg_o12oq=='')
{
return $_['text_the_data_type_cannot_be_blank'];
exit;
}
if(($jg_j681o=='')&&(strtolower($jg_o12oq)!=='text'))
{
return $_['text_the_data_length_cannot_be_blank'];
exit;
}
if($jg_j681o=='0')
{
return $_['text_the_data_length_cannot_be_zero'];
exit;
}
if($jg_es58i=='')
{
return $_['text_the_attribute_name_cannot_be_blank'];
exit;
}
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xm2pz="SHOW COLUMNS FROM `".DB_PREFIX."product` LIKE '".$jg_hax6g."';";
$jg_xrpiy=mysql_query($jg_xm2pz, $jg_9ul65);
$jg_rhthx=mysql_fetch_array($jg_xrpiy);
$this_default_value='';
if ($jg_rhthx[0]==NULL)
{
switch ($jg_o12oq)
{
case ("INT"):
$jg_xm2pz="ALTER TABLE `".DB_PREFIX.$jg_a4dkn."` ADD COLUMN `".$jg_hax6g."` ".$jg_o12oq."(".$jg_j681o.") COLLATE utf8_bin NOT NULL;";
break;
case ("VARCHAR"):
$jg_xm2pz="ALTER TABLE `".DB_PREFIX.$jg_a4dkn."` ADD COLUMN `".$jg_hax6g."` ".$jg_o12oq."(".$jg_j681o.") CHARACTER SET utf8 COLLATE utf8_bin NOT NULL;";
break;
case ("TEXT"):
$jg_xm2pz="ALTER TABLE `".DB_PREFIX.$jg_a4dkn."` ADD COLUMN `".$jg_hax6g."` ".$jg_o12oq." CHARACTER SET utf8 COLLATE utf8_bin NOT NULL;";
break;
case ("TINYINT"):
switch ($jg_hax6g)
{
case ("adwords_publish"):
$this_default_value='DEFAULT 1 ';
default:
break;
}
$jg_xm2pz="ALTER TABLE `".DB_PREFIX.$jg_a4dkn."` ADD COLUMN `".$jg_hax6g."` ".$jg_o12oq."(".$jg_j681o.") COLLATE utf8_bin ".$this_default_value."NOT NULL;";
break;
default:
break;
}
$jg_xrpiy=mysql_query($jg_xm2pz, $jg_9ul65);
}
return mysql_error();
}
function jg_wpzvk()
{
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( JG_1EOBZ );
$jg_sz2lj=$jg_9dug9->getElementsByTagName( "default_google_product_category" );
foreach( $jg_sz2lj as $jg_p6ntr )
{
$jg_cip1g=$jg_9dug9->createElement("default_google_product_category");
$jg_p6ntr->appendChild($jg_cip1g);
$jg_t9aje=$jg_9dug9->createTextNode($jg_p6ntr);
$jg_cip1g->appendChild($jg_t9aje);
$jg_9dug9->save(JG_1EOBZ);
}
jg_vb104(JG_1EOBZ);
}
function jg_8pgxk($jg_taxb1)
{
global $jg_y74wl;
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( $jg_y74wl );
$jg_tqujp=$jg_9dug9->getElementsByTagName( "taxonomy_language" );
foreach( $jg_tqujp as $jg_5wovu )
{
$jg_bys2j=$jg_9dug9->createElement("taxonomy_language");
$jg_5wovu->appendChild($jg_bys2j);
$jg_t9aje=$jg_9dug9->createTextNode($jg_5wovu);
$jg_bys2j->appendChild($jg_t9aje);
$jg_9dug9->save($jg_y74wl);
}
jg_vb104($jg_y74wl);
}
function jg_l284p($jg_zsbqn, $jg_hax6g, $jg_es58i, $jg_q2467)
{
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( JG_3Z28H );
$jg_102m8=$jg_9dug9->getElementsByTagName( "custom_product_field" );
foreach( $jg_102m8 as $jg_k5stx )
{
$jg_br6hz=$jg_k5stx->getElementsByTagName( "field_title" );
$jg_kxe4i=$jg_br6hz->item(0)->nodeValue;
$jg_kxe4i=jg_ecfq2($jg_kxe4i);
$jg_jfc6g=$jg_k5stx->getElementsByTagName( "column_name" );
$jg_vag4j=$jg_jfc6g->item(0)->nodeValue;
$jg_vag4j=jg_ecfq2($jg_vag4j);
$jg_e1v1g=$jg_k5stx->getElementsByTagName( "attribute_name" );
$jg_jfjwh=$jg_e1v1g->item(0)->nodeValue;
$jg_jfjwh=jg_ecfq2($jg_jfjwh);
$jg_ezrde=$jg_k5stx->getElementsByTagName( "attribute_prefix" );
$jg_5rqod=$jg_ezrde->item(0)->nodeValue;
$jg_5rqod=jg_ecfq2($jg_5rqod);
$jg_zsbqn=jg_ecfq2($jg_zsbqn);
$jg_hax6g=jg_ecfq2($jg_hax6g);
$jg_es58i=jg_ecfq2($jg_es58i);
$jg_q2467=jg_ecfq2($jg_q2467);
if (jg_esmiy($jg_zsbqn,$jg_kxe4i)&&jg_esmiy($jg_hax6g,$jg_vag4j)&&jg_esmiy($jg_es58i,$jg_jfjwh)&&jg_esmiy($jg_q2467,$jg_5rqod))
{
$jg_k5stx->parentNode->removeChild($jg_k5stx);
jg_jx263('product');
}
}
$jg_9dug9->save(JG_3Z28H);
}
function jg_lvlq9($jg_6o1l1, $jg_lerkz, $jg_10aik, $jg_a6822)
{
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( JG_ZXZFK );
$jg_dfwlk=$jg_9dug9->getElementsByTagName( "assignment" );
foreach( $jg_dfwlk as $jg_h110l )
{
$jg_dg1rc=$jg_h110l->getElementsByTagName( "opencart_field" );
$jg_o9x93=$jg_dg1rc->item(0)->nodeValue;
$jg_o9x93=jg_ecfq2($jg_o9x93);
$jg_6h107=$jg_h110l->getElementsByTagName( "opencart_field_value" );
$jg_eogqr=$jg_6h107->item(0)->nodeValue;
$jg_eogqr=jg_ecfq2($jg_eogqr);
$jg_8nfqg=$jg_h110l->getElementsByTagName( "google_attribute" );
$jg_lxz4r=$jg_8nfqg->item(0)->nodeValue;
$jg_lxz4r=jg_ecfq2($jg_lxz4r);
$jg_qxsuv=$jg_h110l->getElementsByTagName( "google_attribute_value" );
$jg_1fshj=$jg_qxsuv->item(0)->nodeValue;
$jg_1fshj=jg_ecfq2($jg_1fshj);
$jg_6o1l1=jg_ecfq2($jg_6o1l1);
$jg_lerkz=jg_ecfq2($jg_lerkz);
$jg_10aik=jg_ecfq2($jg_10aik);
$jg_a6822=jg_ecfq2($jg_a6822);
if (jg_esmiy($jg_6o1l1,$jg_o9x93)&&jg_esmiy($jg_lerkz,$jg_eogqr)&&jg_esmiy($jg_10aik,$jg_lxz4r)&&jg_esmiy($jg_a6822,$jg_1fshj))
{
$jg_h110l->parentNode->removeChild($jg_h110l);
break;
}
}
$jg_9dug9->save(JG_ZXZFK);
}
function jg_q9ktb($jg_6o1l1, $jg_lerkz, $jg_10aik, $jg_a6822)
{
$jg_6o1l1=jg_ecfq2($jg_6o1l1);
$jg_lerkz=jg_ecfq2($jg_lerkz);
$jg_10aik=jg_ecfq2($jg_10aik);
$jg_a6822=jg_ecfq2($jg_a6822);
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( JG_ZXZFK );
$jg_dfwlk=$jg_9dug9->getElementsByTagName( "assignment" );
$jg_v105w=false;
foreach( $jg_dfwlk as $jg_h110l )
{
$jg_dg1rc=$jg_h110l->getElementsByTagName( "opencart_field" );
$jg_o9x93=$jg_dg1rc->item(0)->nodeValue;
$jg_o9x93=jg_ecfq2($jg_o9x93);
$jg_6h107=$jg_h110l->getElementsByTagName( "opencart_field_value" );
$jg_eogqr=$jg_6h107->item(0)->nodeValue;
$jg_eogqr=jg_ecfq2($jg_eogqr);
$jg_8nfqg=$jg_h110l->getElementsByTagName( "google_attribute" );
$jg_lxz4r=$jg_8nfqg->item(0)->nodeValue;
$jg_lxz4r=jg_ecfq2($jg_lxz4r);
$jg_qxsuv=$jg_h110l->getElementsByTagName( "google_attribute_value" );
$jg_1fshj=$jg_qxsuv->item(0)->nodeValue;
$jg_1fshj=jg_ecfq2($jg_1fshj);
if (jg_esmiy($jg_6o1l1,$jg_o9x93)&&jg_esmiy($jg_lerkz,$jg_eogqr)&&jg_esmiy($jg_10aik,$jg_lxz4r)&&jg_esmiy($jg_a6822,$jg_1fshj))
{
$jg_v105w=true;
break;
}
}
return $jg_v105w;
}
function jg_tys69($jg_hax6g, $jg_es58i, $jg_q2467)
{
$jg_hax6g=jg_ecfq2($jg_hax6g);
$jg_es58i=jg_ecfq2($jg_es58i);
$jg_q2467=jg_ecfq2($jg_q2467);
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( JG_3Z28H );
$jg_8dc10=$jg_9dug9->getElementsByTagName( "custom_product_field" );
$jg_v105w=false;
foreach( $jg_8dc10 as $jg_a2673 )
{
$jg_jfc6g=$jg_a2673->getElementsByTagName( "column_name" );
$jg_vag4j=$jg_jfc6g->item(0)->nodeValue;
$jg_vag4j=jg_ecfq2($jg_vag4j);
$jg_e1v1g=$jg_a2673->getElementsByTagName( "attribute_name" );
$jg_jfjwh=$jg_e1v1g->item(0)->nodeValue;
$jg_jfjwh=jg_ecfq2($jg_jfjwh);
$jg_ezrde=$jg_a2673->getElementsByTagName( "attribute_prefix" );
$jg_5rqod=$jg_ezrde->item(0)->nodeValue;
$jg_5rqod=jg_ecfq2($jg_5rqod);
if (jg_esmiy($jg_hax6g,$jg_vag4j)&&jg_esmiy($jg_es58i,$jg_jfjwh)&&jg_esmiy($jg_q2467,$jg_5rqod))
{
$jg_v105w=true;
break;
}
}
return $jg_v105w;
}
function jg_m9lsz($jg_pmcic)
{
if (file_exists($jg_pmcic))
{
$jg_9dug9=new DOMDocument();
$jg_9dug9->load( $jg_pmcic );
$jg_dfwlk=$jg_9dug9->getElementsByTagName( "translation" );
$jg_ogto3=0;
foreach( $jg_dfwlk as $jg_h110l )
{
$jg_37qr1=$jg_h110l->getElementsByTagName( "product_category_opencart" );
$jg_2hb5b=$jg_37qr1->item(0)->nodeValue;
$jg_2hb5b=jg_ecfq2($jg_2hb5b);
$jg_1024j=$jg_h110l->getElementsByTagName( "product_category_google" );
$jg_xy68n=$jg_1024j->item(0)->nodeValue;
$jg_xy68n=jg_ecfq2($jg_xy68n);
jg_tlwth("Product Category", $jg_2hb5b, "google_product_category", $jg_xy68n);
$jg_ogto3=$jg_ogto3 + 1;
}
if ($jg_ogto3>0)
{
echo "Imported ".(string)$jg_ogto3." records successfully from file:  ".$jg_pmcic;
}
else
{
echo "Import failed.  ".(string)$jg_ogto3." records were found in file:  ".$jg_pmcic;
}
}
else
{
echo "Import failed.  Unable to locate file:  ".$jg_pmcic;
}
}
function jg_tr78o($jg_pmcic)
{
if (file_exists($jg_pmcic))
{
unlink($jg_pmcic);
echo "File deleted successfully.";
}
else
{
echo "File does not exist.";
}
}
function jg_n3m2h($jg_h3as2,$jg_6v7hp)
{
$jg_5viwk=false;
$jg_acoaz=jg_xpki7('');
$jg_e2joo='';
for ($jg_b1010=0; $jg_b1010<count($jg_acoaz); $jg_b1010++)
{
if($jg_acoaz[$jg_b1010]['value']==$jg_h3as2){
$jg_5viwk=true;
if(isset($jg_acoaz[$jg_b1010]['store_id'])){$jg_e2joo=$jg_acoaz[$jg_b1010]['store_id'];}
}
}
$jg_w9mzu=jg_bikpp($jg_h3as2);
if($jg_5viwk==false)
{
if (jg_sbab1($jg_h3as2))
{
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("DELETE FROM ".DB_PREFIX."currency WHERE code='".(string)$jg_h3as2."'");
if (jg_sbab1($jg_h3as2))
{
echo $jg_w9mzu.' ('.$jg_h3as2.') could not be uninstalled.';
}
else
{
}
}
else
{
echo $jg_w9mzu.' ('.$jg_h3as2.') is not installed.';
}
}
else
{
$jg_mybwe=array();
for ($jg_b1010=0; $jg_b1010<count($jg_acoaz); $jg_b1010++)
{
if($jg_acoaz[$jg_b1010]['value']==$jg_h3as2){
$jg_5viwk=true;
if($jg_e2joo==''){
if(isset($jg_acoaz[$jg_b1010]['store_id'])){
$jg_e2joo=$jg_acoaz[$jg_b1010]['store_id'];
}
else
{
$jg_e2joo=$jg_6v7hp;
}
}
$jg_mybwe[]=jg_jp161($jg_e2joo);
}
}
echo $jg_w9mzu.' ('.$jg_h3as2.') '.$_['text_is_the_default_currency_for'].' '.implode(', ',$jg_mybwe).'.'."\r\n\r\n";
echo $_['text_please_choose_a_different_default_currency_for'].' '.implode(', ',$jg_mybwe)."\r\n";
echo $_['text_before_uninstalling_currency'].' '.$jg_w9mzu.' ('.$jg_h3as2.').';
}
}
function jg_isazwy($jg_h3as2,$jg_6v7hp)
{
if (jg_sbab1($jg_h3as2))
{
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
if($jg_6v7hp=='')
{
$jg_xrpiy=mysql_query("UPDATE ".DB_PREFIX."setting SET value='".(string)$jg_h3as2."' WHERE ".DB_PREFIX."setting.group='config' AND ".DB_PREFIX."setting.key='config_currency'", $jg_9ul65) or die (mysql_error());
}
else
{
switch (VERSION)
{
case (VERSION=='1.4.7'||VERSION=='1.4.8'||VERSION=='1.4.9'||VERSION=='1.4.9.1'||VERSION=='1.4.9.2'||VERSION=='1.4.9.3'||VERSION=='1.4.9.4'||VERSION=='1.4.9.5'||VERSION=='1.4.9.6'):
$jg_xrpiy=mysql_query("UPDATE ".DB_PREFIX."setting SET value='".(string)$jg_h3as2."' WHERE ".DB_PREFIX."setting.group='config' AND ".DB_PREFIX."setting.key='config_currency'", $jg_9ul65) or die (mysql_error());
break;
case (VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'||VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$jg_xrpiy=mysql_query("UPDATE ".DB_PREFIX."setting SET value='".(string)$jg_h3as2."' WHERE ".DB_PREFIX."setting.group='config' AND ".DB_PREFIX."setting.key='config_currency' AND ".DB_PREFIX."setting.store_id='".$jg_6v7hp."'", $jg_9ul65) or die (mysql_error());
break;
default:
break;
}
}
}
else
{
echo jg_bikpp($jg_h3as2)." (".$jg_h3as2.") could not be set as default.\r\n";
echo "Please verify that the currency is installed.";
}
}
function jg_2qkvn($jg_h3as2,$jg_6v7hp)
{
$jg_46tp9="";
if (extension_loaded('curl'))
{
if (jg_sbab1($jg_h3as2))
{
echo $jg_h3as2." is already installed.";
}
else
{
$jg_w9mzu=jg_bikpp($jg_h3as2);
$jg_rlseq=jg_vm108($jg_h3as2);
$jg_gxwsw=jg_bzodk($jg_h3as2);
$jg_hkb85=2;
$jg_z1363=1;
if ($jg_w9mzu!="")
{
$jg_acoaz=jg_xpki7($jg_6v7hp);
$jg_2rz9x='';
for ($jg_b1010=0; $jg_b1010<count($jg_acoaz); $jg_b1010++)
{
$jg_2rz9x=$jg_acoaz[$jg_b1010]['value'];
break;
}
$data[]=$jg_2rz9x.$jg_h3as2.'=X';
$curl=curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://download.finance.yahoo.com/d/quotes.csv?s='.implode(',', $data).'&f=sl1&e=.csv');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$content=curl_exec($curl);
curl_close($curl);
$jg_3q2si=explode("\n", trim($content));
foreach ($jg_3q2si as $jg_hjt7z)
{
$currency=substr($jg_hjt7z, 4, 3);
$value=substr($jg_hjt7z, 11, 6);
if ($jg_h3as2==$jg_2rz9x)
{
$value='1.00';
}
if ((float)$value)
{
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$original_error_reporting_value=ini_get('error_reporting');
error_reporting(0);
$jg_xrpiy=mysql_query("INSERT INTO ".DB_PREFIX."currency SET title='".(string)$jg_w9mzu."', code='".(string)$jg_h3as2."', symbol_left='".(string)$jg_rlseq."', symbol_right='".(string)$jg_gxwsw."', decimal_place='".$jg_hkb85."', value='".(string)$value."', status='".(string)$jg_z1363."', date_modified='".(string)date('Y-m-d H:i:s')."'");
ini_set('error_reporting',$original_error_reporting_value);
if (jg_sbab1($jg_h3as2))
{
}
else
{
echo $jg_w9mzu." (".$jg_h3as2.") could not be installed.\r\n";
echo "There may be a problem with the internect connection.\r\n";
echo "Please try again later or enter the currency data manually.";
}
}
}
}
}
}
else
{
echo "curl is not installed, unable to load currency data from server.";
}
return $jg_46tp9;
}
function jg_xpki7($jg_6v7hp)
{
$jg_i1bmk=array();
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy='';
if($jg_6v7hp=='')
{
$jg_xrpiy=mysql_query("SELECT * FROM ".DB_PREFIX."setting WHERE  ".DB_PREFIX."setting.group='config' AND  ".DB_PREFIX."setting.key='config_currency'", $jg_9ul65) or die (mysql_error());
}
else
{
switch (VERSION)
{
case (VERSION=='1.4.7'||VERSION=='1.4.8'||VERSION=='1.4.9'||VERSION=='1.4.9.1'||VERSION=='1.4.9.2'||VERSION=='1.4.9.3'||VERSION=='1.4.9.4'||VERSION=='1.4.9.5'||VERSION=='1.4.9.6'):
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."setting WHERE  ".DB_PREFIX."setting.group='config' AND  ".DB_PREFIX."setting.key='config_currency'", $jg_9ul65) or die (mysql_error());
break;
case (VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'||VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."setting WHERE  ".DB_PREFIX."setting.group='config' AND  ".DB_PREFIX."setting.key='config_currency' AND ".DB_PREFIX."setting.store_id='".$jg_6v7hp."'", $jg_9ul65) or die (mysql_error());
break;
default:
break;
}
}
$jg_pbnd1=mysql_num_rows($jg_xrpiy);
if( $jg_pbnd1>0 )
{
while($jg_wu10r=mysql_fetch_array($jg_xrpiy))
{
switch (VERSION)
{
case (VERSION=='1.4.7'||VERSION=='1.4.8'||VERSION=='1.4.9'||VERSION=='1.4.9.1'||VERSION=='1.4.9.2'||VERSION=='1.4.9.3'||VERSION=='1.4.9.4'||VERSION=='1.4.9.5'||VERSION=='1.4.9.6'):
$jg_i1bmk[]=array(
'value' => (string)$jg_wu10r['value']
);
break;
case (VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'||VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$jg_i1bmk[]=array(
'value' => (string)$jg_wu10r['value'],
'store_id'         => (string)$jg_wu10r['store_id']
);
break;
default:
break;
}
}
}
return $jg_i1bmk;
}
function jg_410q7($jg_5atm6)
{
$jg_46tp9="USD";
switch ($jg_5atm6)
{
case ("Australia"):
$jg_46tp9="AUD";
break;
case ("Brazil"):
$jg_46tp9="BRL";
break;
case ("Canada"):
$jg_46tp9="CAD";
break;
case ("China"):
$jg_46tp9="CNY";
break;
case ("Czech Republic"):
$jg_46tp9="CZK";
break;
case ("France"):
$jg_46tp9="EUR";
break;
case ("Germany"):
$jg_46tp9="EUR";
break;
case ("Italy"):
$jg_46tp9="EUR";
break;
case ("Japan"):
$jg_46tp9="JPY";
break;
case ("Netherlands"):
$jg_46tp9="EUR";
break;
case ("Spain"):
$jg_46tp9="EUR";
break;
case ("Switzerland"):
$jg_46tp9="CHF";
break;
case ("United Kingdom"):
$jg_46tp9="GBP";
break;
case ("United States"):
$jg_46tp9="USD";
break;
default:
break;
}
return $jg_46tp9;
}
function jg_bikpp($jg_h3as2)
{
$jg_46tp9="US Dollar";
switch ($jg_h3as2)
{
case ("AUD"):
$jg_46tp9="Australian Dollar";
break;
case ("BRL"):
$jg_46tp9="Brazilian Real";
break;
case ("CAD"):
$jg_46tp9="Canadian Dollar";
break;
case ("CNY"):
$jg_46tp9="Yuan Renminbi";
break;
case ("CZK"):
$jg_46tp9="Czech Koruna";
break;
case ("EUR"):
$jg_46tp9="Euro";
break;
case ("JPY"):
$jg_46tp9="Yen";
break;
case ("CHF"):
$jg_46tp9="Swiss Franc";
break;
case ("GBP"):
$jg_46tp9="Pound Sterling";
break;
case ("USD"):
$jg_46tp9="US Dollar";
break;
default:
break;
}
return $jg_46tp9;
}
function jg_vm108($jg_h3as2)
{
$jg_rlseq='';
switch ($jg_h3as2)
{
case ("AUD"):
$jg_rlseq="$";
break;
case ("BRL"):
$jg_rlseq="R$";
break;
case ("CAD"):
$jg_rlseq="$";
break;
case ("CNY"):
$jg_rlseq="&yen;";
break;
case ("CZK"):
break;
case ("EUR"):
break;
case ("JPY"):
$jg_rlseq="&yen;";
break;
case ("CHF"):
break;
case ("GBP"):
$jg_rlseq="&pound;";
break;
case ("USD"):
$jg_rlseq="$";
break;
default:
break;
}
return $jg_rlseq;
}
function jg_bzodk($jg_h3as2)
{
$jg_gxwsw='';
switch ($jg_h3as2)
{
case ("AUD"):
break;
case ("BRL"):
break;
case ("CNY"):
break;
case ("CZK"):
$jg_gxwsw="K&#269;";
break;
case ("EUR"):
$jg_gxwsw="&euro;";
break;
case ("JPY"):
break;
case ("CHF"):
$jg_gxwsw="S&#8355;";
break;
case ("GBP"):
break;
case ("USD"):
break;
default:
break;
}
return $jg_gxwsw;
}
function jg_rg9u1($jg_h3as2)
{
if (jg_sbab1($jg_h3as2))
{
return "Installed";
}
else
{
return "Not installed";
}
}
function jg_tif5u($jg_h3as2,$jg_6v7hp)
{
require JG_GQ9ZI;
if (jg_sbab1($jg_h3as2))
{
$jg_5viwk=false;
$jg_acoaz=jg_xpki7('');
$jg_e2joo='';
$jg_mybwe=array();
for ($jg_b1010=0; $jg_b1010<count($jg_acoaz); $jg_b1010++)
{
if($jg_acoaz[$jg_b1010]['value']==$jg_h3as2){
$jg_5viwk=true;
}
}
if($jg_5viwk!==false)
{
}
else
{
return "<span onclick=\"jg_vbn1sk('".$jg_h3as2."','".$jg_6v7hp."');return false;\" style=\"cursor: pointer; margin-left: 0px; margin-right: 8px; width: 16px; text-align: center;\"><img style=\"margin-bottom: 7px; margin-top: 7px; vertical-align: middle; cursor: pointer;\" title=\"".$_['text_uninstall_currency']." ".jg_bikpp($jg_h3as2)." (".$jg_h3as2.")\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/currency-uninstall.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/currency-uninstall.png\"/></span>";
}
}
else
{
return "<span onclick=\"jg_bffcti('".$jg_h3as2."','".$jg_6v7hp."');return false;\" style=\"cursor: pointer; margin-left: 0px; margin-right: 8px; width: 16px; text-align: center;\"><img style=\"margin-bottom: 8px; margin-top: 8px; vertical-align: middle; cursor: pointer;\" title=\"".$_['text_install_currency']." ".jg_bikpp($jg_h3as2)." (".$jg_h3as2.")\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/currency-install.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/currency-install.png\"/></span>";
}
}
function jg_8b8oe($jg_h3as2,$jg_6v7hp)
{
require JG_GQ9ZI;
if (jg_sbab1($jg_h3as2))
{
$jg_5viwk=false;
$jg_acoaz=jg_xpki7('');
$jg_e2joo='';
$jg_mybwe=array();
for ($jg_b1010=0; $jg_b1010<count($jg_acoaz); $jg_b1010++)
{
if($jg_acoaz[$jg_b1010]['value']==$jg_h3as2){
$jg_5viwk=true;
if($jg_e2joo==''){
if(isset($jg_acoaz[$jg_b1010]['store_id'])){$jg_e2joo=$jg_acoaz[$jg_b1010]['store_id'];}
}
if(isset($jg_acoaz[$jg_b1010]['store_id']))
{
$jg_mybwe[]=jg_jp161($jg_acoaz[$jg_b1010]['store_id']);
}
else
{
$jg_mybwe[]=jg_jp161($jg_6v7hp);
}
}
}
if($jg_5viwk!==false)
{
return "<span onclick=\"jg_isazwy('".$jg_h3as2."','".$jg_6v7hp."');return false;\" style=\"cursor: pointer; margin-left: 0px; margin-right: 8px; width: 16px; text-align: center;\"><img style=\"margin-bottom: 7px; margin-top: 7px; vertical-align: middle; cursor: pointer;\" title=\"".jg_bikpp($jg_h3as2)." (".$jg_h3as2.") ".$_['text_is_the_default_currency_for']." ".implode(', ',$jg_mybwe)."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/currency-is-default.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/currency-is-default.png\"/></span>";
}
else
{
return "<span onclick=\"jg_isazwy('".$jg_h3as2."','".$jg_6v7hp."');return false;\" style=\"cursor: pointer; margin-left: 0px; margin-right: 5px; width: 16px; text-align: center;\"><img style=\"margin-bottom: 7px; margin-top: 7px; vertical-align: middle; cursor: pointer;\" title=\"".$_['text_set']." ".jg_bikpp($jg_h3as2)." (".$jg_h3as2.") ".$_['text_as_default_currency_for']." ".jg_jp161($jg_6v7hp)."\" src=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/currency-set-as-default.png\" lowsrc=\"".THIS_IMAGE_URL."data/google-merchant-center-feed/currency-set-as-default.png\"/></span>";
}
}
else
{
return '';
}
}
function jg_cly8f($jg_2bayd)
{
echo "<a onclick=\"window.open('".$jg_2bayd."', '_blank');return false;\" class=\"button\" style=\"margin-left: 5px; margin-right: 0px;\"><span>View data feed</span></a>";
}
function get_catalog_url()
{
$this_url='';
if (empty($_SERVER['HTTPS'])) {
$this_url=HTTP_CATALOG;
}
else
{
$this_url=HTTPS_CATALOG;
}
return $this_url;
}
function get_server_url()
{
$this_url='';
if (empty($_SERVER['HTTPS'])) {
$this_url=HTTP_SERVER;
}
else
{
$this_url=HTTPS_SERVER;
}
return $this_url;
}
function get_image_url()
{
$this_url='';
if (empty($_SERVER['HTTPS'])) {
$this_url=HTTP_CATALOG;
}
else
{
$this_url=HTTPS_CATALOG;
}
if(!IS_MIJOSHOP==1)
{
$this_url=$this_url.'image/';
}
else
{
$this_url=$this_url.'components/com_mijoshop/opencart/image/';
}
return $this_url;
}
function get_admin_image_url()
{
return THIS_SERVER_URL.'view/image/';
}
function jg_cse4yo()
{
$jg_y10oc=DIR_LANGUAGE.jg_ayfd3(jg_2ykgz()).'/feed/'.JG_9TVQEW.'.php';
$jg_esxlzp=$jg_y10oc;
if (!file_exists($jg_esxlzp))
{
$jg_esxlzp='language/'.jg_ayfd3(jg_2ykgz()).'/feed/'.JG_9TVQEW.'.php';
}
if (!file_exists($jg_esxlzp))
{
$jg_esxlzp='language/english/feed/'.JG_9TVQEW.'.php';
}
if (!file_exists($jg_esxlzp))
{
$jg_esxlzp=$jg_y10oc;
echo 'Unable to locate the extension language config file:  "'.$jg_esxlzp.'".&nbsp;&nbsp;Please report the problem to:  <a href="mailto:%6a%6f%73%68%40%74%65%63%68%73%6c%65%75%74%68%2e%63%6f%6d&subject='.rawurlencode('OpenCart extension issue').'&body='.rawurlencode('Unable to locate the extension language config file:  "'.$jg_esxlzp.'"').'">josh@techsleuth.com</a>';
}
return $jg_esxlzp;
}
function jg_4f6xv($jg_d410tc,$jg_6v7hp,$jg_5atm6)
{
$jg_4s8uo=DB_PREFIX."language";
$jg_ogto3=0;
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT ".$jg_4s8uo.".code FROM ".$jg_4s8uo) or die (mysql_error());
$jg_46tp9=jg_lscml($jg_d410tc,$jg_6v7hp)."<select title=\"".jg_xdwig($jg_d410tc,$jg_6v7hp)."\" name=\"language-store-id-".$jg_6v7hp."\" id=\"language-".str_replace(' ', '-', $jg_5atm6)."\" onchange=\"jg_uwbr8i(this);\">";
require JG_GQ9ZI;
$jg_46tp9.="<option>".$_['text_default']."</option>";
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46pwq="";
if($jg_d410tc==$jg_hu8lx["code"])
{
$jg_46pwq=" selected";
}
$jg_46tp9.="<option".$jg_46pwq.">";
$jg_46tp9.=$jg_hu8lx["code"];
$jg_46tp9.="</option>";
$jg_ogto3=$jg_ogto3 + 1;
}
$jg_46tp9.="</select>";
return $jg_46tp9;
}
function jg_4abab($jg_d410tc,$jg_mjczqn)
{
$jg_4s8uo=DB_PREFIX."language";
$jg_ogto3=0;
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT ".$jg_4s8uo.".code FROM ".$jg_4s8uo) or die (mysql_error());
require JG_GQ9ZI;
$jg_46tp9="<span style=\"margin-right: 5px;\">".$_['text_language'].":</span>".jg_2bnrt($jg_d410tc)."<select title=\"".jg_d6c6f($jg_d410tc)."\" name=\"language-product-options\" id=\"language-product-options\" onchange=\"jg_r2bm16(1,0,".$jg_mjczqn.",this.options[this.selectedIndex].value);\">";
require JG_GQ9ZI;
$jg_46tp9.="<option>".$_['text_default']."</option>";
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46pwq="";
if($jg_d410tc==$jg_hu8lx["code"])
{
$jg_46pwq=" selected";
}
$jg_46tp9.="<option".$jg_46pwq.">";
$jg_46tp9.=$jg_hu8lx["code"];
$jg_46tp9.="</option>";
$jg_ogto3=$jg_ogto3 + 1;
}
$jg_46tp9.="</select>";
return $jg_46tp9;
}
function jg_lhlza($jg_d410tc,$jg_mjczqn)
{
$jg_4s8uo=DB_PREFIX."language";
$jg_ogto3=0;
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT ".$jg_4s8uo.".code FROM ".$jg_4s8uo) or die (mysql_error());
require JG_GQ9ZI;
$jg_46tp9="<span style=\"margin-right: 5px;\">".$_['text_language'].":</span>".jg_2bnrt($jg_d410tc)."<select title=\"".jg_d6c6f($jg_d410tc)."\" name=\"language-product-categories\" id=\"language-product-categories\" onchange=\"jg_h10gc8(1,0,".$jg_mjczqn.",this.options[this.selectedIndex].value);\">";
$jg_46tp9.="<option>".$_['text_default']."</option>";
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46pwq="";
if($jg_d410tc==$jg_hu8lx["code"])
{
$jg_46pwq=" selected";
}
$jg_46tp9.="<option".$jg_46pwq.">";
$jg_46tp9.=$jg_hu8lx["code"];
$jg_46tp9.="</option>";
$jg_ogto3=$jg_ogto3 + 1;
}
$jg_46tp9.="</select>";
return $jg_46tp9;
}
function jg_n10y8($jg_d410tc,$jg_mjczqn)
{
$jg_4s8uo=DB_PREFIX."language";
$jg_ogto3=0;
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT ".$jg_4s8uo.".code FROM ".$jg_4s8uo) or die (mysql_error());
require JG_GQ9ZI;
$jg_46tp9="<span style=\"margin-right: 5px;\">".$_['text_language'].":</span>".jg_2bnrt($jg_d410tc)."<select title=\"".jg_d6c6f($jg_d410tc)."\" name=\"language-product-options\" id=\"language-product-options\" onchange=\"jg_3razlp(1,0,".$jg_mjczqn.",'".VERSION."',this.options[this.selectedIndex].value);\">";
$jg_46tp9.="<option>".$_['text_default']."</option>";
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46pwq="";
if($jg_d410tc==$jg_hu8lx["code"])
{
$jg_46pwq=" selected";
}
$jg_46tp9.="<option".$jg_46pwq.">";
$jg_46tp9.=$jg_hu8lx["code"];
$jg_46tp9.="</option>";
$jg_ogto3=$jg_ogto3 + 1;
}
$jg_46tp9.="</select>";
return $jg_46tp9;
}
function jg_16twt($jg_d410tc,$jg_mjczqn)
{
$jg_4s8uo=DB_PREFIX."language";
$jg_ogto3=0;
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT ".$jg_4s8uo.".code FROM ".$jg_4s8uo) or die (mysql_error());
require JG_GQ9ZI;
$jg_46tp9="<span style=\"margin-right: 5px;\">".$_['text_language'].":</span>".jg_2bnrt($jg_d410tc)."<select title=\"".jg_d6c6f($jg_d410tc)."\" name=\"language-product-names\" id=\"language-product-names\" onchange=\"jg_xylwf1(1,0,".$jg_mjczqn.",this.options[this.selectedIndex].value);\">";
$jg_46tp9.="<option>".$_['text_default']."</option>";
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46pwq="";
if($jg_d410tc==$jg_hu8lx["code"])
{
$jg_46pwq=" selected";
}
$jg_46tp9.="<option".$jg_46pwq.">";
$jg_46tp9.=$jg_hu8lx["code"];
$jg_46tp9.="</option>";
$jg_ogto3=$jg_ogto3 + 1;
}
$jg_46tp9.="</select>";
return $jg_46tp9;
}
function jg_qft35($jg_d410tc,$jg_mjczqn)
{
$jg_4s8uo=DB_PREFIX."language";
$jg_ogto3=0;
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT ".$jg_4s8uo.".code FROM ".$jg_4s8uo) or die (mysql_error());
require JG_GQ9ZI;
$jg_46tp9="<span style=\"margin-right: 5px;\">".$_['text_language'].":</span>".jg_2bnrt($jg_d410tc)."<select title=\"".jg_d6c6f($jg_d410tc)."\" name=\"language-product-names\" id=\"language-product-names\" onchange=\"jg_wnke9v(1,0,".$jg_mjczqn.",this.options[this.selectedIndex].value);\">";
$jg_46tp9.="<option>".$_['text_default']."</option>";
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46pwq="";
if($jg_d410tc==$jg_hu8lx["code"])
{
$jg_46pwq=" selected";
}
$jg_46tp9.="<option".$jg_46pwq.">";
$jg_46tp9.=$jg_hu8lx["code"];
$jg_46tp9.="</option>";
$jg_ogto3=$jg_ogto3 + 1;
}
$jg_46tp9.="</select>";
return $jg_46tp9;
}
function jg_2bnrt($jg_d410tc)
{
require JG_GQ9ZI;
if(jg_uhxtk($jg_d410tc)==false)
{
$jg_d410tc=jg_2ykgz();
}
$jg_46tp9='';
$jg_4s8uo=DB_PREFIX."language";
$jg_ogto3=0;
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_4s8uo." WHERE ".$jg_4s8uo.".code='".$jg_d410tc."'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46tp9="<img title=\"".jg_d6c6f($jg_d410tc)."\" style=\"margin-right: 8px;\" src=\"".THIS_ADMIN_IMAGE_URL."flags/".$jg_hu8lx["image"]."\" lowsrc=\"".THIS_ADMIN_IMAGE_URL."flags/".$jg_hu8lx["image"]."\" />";
}
return $jg_46tp9;
}
function jg_lscml($jg_d410tc,$jg_6v7hp)
{
if(jg_uhxtk($jg_d410tc)==false)
{
$jg_d410tc=jg_8t9zs($jg_6v7hp);
}
$jg_46tp9='';
$jg_4s8uo=DB_PREFIX."language";
$jg_ogto3=0;
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_4s8uo." WHERE ".$jg_4s8uo.".code='".$jg_d410tc."'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46tp9="<img title=\"".jg_xdwig($jg_d410tc,$jg_6v7hp)."\" style=\"margin-right: 8px;\" src=\"".THIS_ADMIN_IMAGE_URL."flags/".$jg_hu8lx["image"]."\" lowsrc=\"".THIS_ADMIN_IMAGE_URL."flags/".$jg_hu8lx["image"]."\" />";
}
return $jg_46tp9;
}
function jg_uhxtk($jg_d410tc)
{
$jg_46tp9=false;
$jg_4s8uo=DB_PREFIX."language";
$jg_ogto3=0;
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_4s8uo." WHERE ".$jg_4s8uo.".code='".$jg_d410tc."'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46tp9=true;
break;
}
return $jg_46tp9;
}
function jg_d6c6f($jg_d410tc)
{
require JG_GQ9ZI;
if(jg_uhxtk($jg_d410tc)==false)
{
$jg_d410tc=jg_2ykgz();
}
$jg_46tp9='';
$jg_4s8uo=DB_PREFIX."language";
$jg_ogto3=0;
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_4s8uo." WHERE ".$jg_4s8uo.".code='".$jg_d410tc."'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46tp9=$jg_hu8lx["name"];
}
return $jg_46tp9;
}
function jg_xdwig($jg_d410tc,$jg_6v7hp)
{
require JG_GQ9ZI;
if(jg_uhxtk($jg_d410tc)==false)
{
$jg_d410tc=jg_8t9zs($jg_6v7hp);
}
$jg_46tp9='';
$jg_4s8uo=DB_PREFIX."language";
$jg_ogto3=0;
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_4s8uo." WHERE ".$jg_4s8uo.".code='".$jg_d410tc."'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46tp9=$jg_hu8lx["name"];
}
return $jg_46tp9;
}
function jg_2ykgz()
{
$jg_46tp9='';
$jg_4s8uo=DB_PREFIX."setting";
$jg_ogto3=0;
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_4s8uo." WHERE ".$jg_4s8uo.".group='config' AND ".$jg_4s8uo.".key='config_admin_language'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46tp9=$jg_hu8lx["value"];
}
return $jg_46tp9;
}
function jg_8t9zs($jg_6v7hp)
{
$jg_46tp9='';
$jg_4s8uo=DB_PREFIX."setting";
$jg_ogto3=0;
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy='';
switch (VERSION)
{
case (VERSION=='1.4.7'||VERSION=='1.4.8'||VERSION=='1.4.9'||VERSION=='1.4.9.1'||VERSION=='1.4.9.2'||VERSION=='1.4.9.3'||VERSION=='1.4.9.4'||VERSION=='1.4.9.5'||VERSION=='1.4.9.6'):
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_4s8uo." WHERE ".$jg_4s8uo.".group='config' AND ".$jg_4s8uo.".key='config_language'", $jg_9ul65) or die (mysql_error());
break;
case (VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'||VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_4s8uo." WHERE ".$jg_4s8uo.".group='config' AND ".$jg_4s8uo.".key='config_language' AND ".$jg_4s8uo.".store_id='".$jg_6v7hp."'", $jg_9ul65) or die (mysql_error());
break;
default:
break;
}
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46tp9=$jg_hu8lx["value"];
}
return $jg_46tp9;
}
function jg_ayfd3($jg_d410tc)
{
$jg_46tp9='';
$jg_4s8uo=DB_PREFIX."language";
$jg_ogto3=0;
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".$jg_4s8uo." WHERE ".$jg_4s8uo.".code='".$jg_d410tc."'", $jg_9ul65) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
$jg_46tp9=$jg_hu8lx["directory"];
}
return $jg_46tp9;
}
function jg_s7xf6($jg_d410tc)
{
$jg_4s8uo=DB_PREFIX."language";
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT * FROM ".$jg_4s8uo) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
if($jg_d410tc==$jg_hu8lx["code"]){$jg_46tp9=(int)$jg_hu8lx["language_id"];}
}
if($jg_46tp9==''){$jg_46tp9=(int)jg_s7xf6('en');}
return $jg_46tp9;
}
function jg_dgqfm($jg_d410tc)
{
$jg_4s8uo=DB_PREFIX."language";
$jg_46tp9='';
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT * FROM ".$jg_4s8uo) or die (mysql_error());
while($jg_hu8lx=mysql_fetch_array($jg_xrpiy))
{
if($jg_d410tc==$jg_hu8lx["code"]){$jg_46tp9=$jg_d410tc;}
}
return $jg_46tp9;
}
function jg_szbpr($jg_xm2pz,$jg_epngn)
{
if(jg_hqoa1y()=='true')
{
$jg_efhc2="google-merchant-center-feeds";
$jg_h6qzk=$jg_efhc2."/".$jg_epngn.".php";
try
{
if(!file_exists($jg_efhc2))
{ 
mkdir($jg_efhc2);
} 
$fh=fopen($jg_h6qzk, 'w') or die("can't open file");
$jg_mm7ws='<?php header( \'Location: '.$jg_xm2pz.'\');echo "<html></html>";exit; ?>';
fwrite($fh, $jg_mm7ws);
fclose($fh);
} catch (Exception $e) {
}
jg_3e2cf($jg_h6qzk);
}
}
function jg_7j2fe($jg_el36s)
{
if(jg_hqoa1y()=='true')
{
$jg_efhc2='google-merchant-center-feeds';
if(!file_exists($jg_efhc2)) 
{ 
mkdir($jg_efhc2); 
} 
if (jg_wnu1t($jg_efhc2))
{
if(file_exists($jg_efhc2)) 
{ 
chdir($jg_efhc2);
foreach (glob("feed-".$jg_el36s."*") as $jg_p10ny) {
unlink($jg_p10ny);
}
chdir('../');
}
}
}
}
function jg_wnu1t($jg_efhc2)
{
$jg_bjhii=false;
$jg_h6qzk=$jg_efhc2."/read-write-test.xml";
if (!file_exists($jg_h6qzk))
{
$fh=fopen($jg_h6qzk, 'w') or die("can't open file");
$jg_mm7ws='read write test';
fwrite($fh, $jg_mm7ws);
fclose($fh);
if (file_exists($jg_h6qzk))
{
$jg_bjhii=true;
unlink($jg_h6qzk);
}
}
else
{
unlink($jg_h6qzk);
if (!file_exists($jg_h6qzk))
{
$jg_bjhii=true;
}
}
return $jg_bjhii;
}
function jg_9sa3o($jg_1idy8,$jg_6v7hp,$jg_d410tc)
{
if(jg_hqoa1y()=='true')
{
$jg_10104=jg_z7dd7($jg_6v7hp).'index.php?route=';
$jg_1idy8=str_replace($jg_10104, '', $jg_1idy8);
$jg_1idy8=str_replace('/', '-', $jg_1idy8);
$jg_1idy8=str_replace('&amp;', '-', $jg_1idy8);
$jg_1idy8=str_replace('&', '-', $jg_1idy8);
$jg_1idy8=str_replace('_', '-', $jg_1idy8);
$jg_1idy8=str_replace('=', '-', $jg_1idy8);
$jg_1idy8=str_replace('google-base-techsleuth-target-country-', '', $jg_1idy8);
$jg_1idy8=str_replace('-language-'.$jg_d410tc, '', $jg_1idy8);
if($jg_6v7hp!="0")
{
$jg_1idy8.='-multi-store-'.$jg_6v7hp;
}
}
return $jg_1idy8;
}
function jg_63j7e($jg_1idy8,$jg_6v7hp,$jg_d410tc)
{
if(jg_hqoa1y()=='true')
{
$jg_10104=jg_z7dd7($jg_6v7hp).'index.php?route=';
$jg_1idy8=str_replace($jg_10104, '', $jg_1idy8);
$jg_1idy8=str_replace('/', '-', $jg_1idy8);
$jg_1idy8=str_replace('&amp;', '-', $jg_1idy8);
$jg_1idy8=str_replace('&', '-', $jg_1idy8);
$jg_1idy8=str_replace('_', '-', $jg_1idy8);
$jg_1idy8=str_replace('=', '-', $jg_1idy8);
$jg_1idy8=str_replace('google-base-techsleuth-target-country-', '', $jg_1idy8);
$jg_1idy8=str_replace('-language-'.$jg_d410tc, '', $jg_1idy8);
$jg_1idy8=THIS_SERVER_URL."google-merchant-center-feeds/".$jg_1idy8.".php";
if($jg_6v7hp!="0")
{
$jg_1idy8=str_replace('.php', '-multi-store-'.$jg_6v7hp.'.php', $jg_1idy8);
}
}
return $jg_1idy8;
}
function jg_sbab1($jg_h3as2)
{
$jg_i1bmk=false;
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_xrpiy=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."currency WHERE code='".$jg_h3as2."'", $jg_9ul65) or die (mysql_error());
$jg_pbnd1=mysql_num_rows($jg_xrpiy);
if($jg_pbnd1>0 )
{
$jg_i1bmk=true;
}
return $jg_i1bmk;
}
function jg_j252v($jg_46tp9)
{
$jg_46tp9=html_entity_decode($jg_46tp9, ENT_COMPAT, 'UTF-8');
$jg_46tp9=html_entity_decode($jg_46tp9, ENT_COMPAT, 'UTF-8');
return $jg_46tp9;
}
function jg_dgsqr($jg_46tp9)
{
$jg_46tp9=htmlentities($jg_46tp9, ENT_COMPAT, 'UTF-8', true);
return $jg_46tp9;
}
function jg_4ghsp($jg_j2hg1)
{
$jg_6ux7b=array(
'&sbquo;','&trade;','&#153;','&#x9A;','&ldquo;','&rdquo;','&scaron;','&mdash;','&bdquo;',
'&lsquo;','&rsquo;','&quot;','&amp;','&bull;','&lt;','&gt;','&nbsp;','&iexcl;','&cent;',
'&pound;','&curren;','&yen;','&brvbar;','&sect;','&uml;','&copy;','&ordf;','&laquo;','&not;',
'&shy;','&reg;','&macr;','&deg;','&plusmn;','&sup2;','&sup3;','&acute;','&micro;','&para;',
'&middot;','&cedil;','&sup1;','&ordm;','&raquo;','&frac14;','&frac12;','&frac34;','&iquest;','&Agrave;',
'&Aacute;','&Acirc;','&Atilde;','&Auml;','&Aring;','&AElig;','&Ccedil;','&Egrave;','&Eacute;','&Ecirc;',
'&Euml;','&Igrave;','&Iacute;','&Icirc;','&Iuml;','&ETH;','&Ntilde;','&Ograve;','&Oacute;','&Ocirc;',
'&Otilde;','&Ouml;','&times;','&Oslash;','&Ugrave;','&Uacute;','&Ucirc;','&Uuml;','&Yacute;','&THORN;',
'&szlig;','&agrave;','&aacute;','&acirc;','&atilde;','&auml;','&aring;','&aelig;','&ccedil;','&egrave;',
'&eacute;','&ecirc;','&euml;','&igrave;','&iacute;','&icirc;','&iuml;','&eth;','&ntilde;','&ograve;',
'&oacute;','&ocirc;','&otilde;','&ouml;','&divide;','&oslash;','&ugrave;','&uacute;','&ucirc;','&uuml;',
'&yacute;','&thorn;','&yuml;'
);
$jg_uzxar=array(
'&amp;sbquo;','&amp;trade;','','&#x161;','&#147;','&#148;','&#x161;','&#151;','&#8222;',
'&#145;','&#146;','&#34;','&#38;','','&#60;','&#62;',' ','&#161;','&#162;',
'&#163;','&#164;','&#165;','&#166;','&#167;','&#168;','&#169;','&#170;','&#171;','&#172;',
'&#173;','&#174;','&#175;','&#176;','&#177;','&#178;','&#179;','&#180;','&#181;','&#182;',
'&#183;','&#184;','&#185;','&#186;','&#187;','&#188;','&#189;','&#190;','&#191;','&#192;',
'&#193;','&#194;','&#195;','&#196;','&#197;','&#198;','&#199;','&#200;','&#201;','&#202;',
'&#203;','&#204;','&#205;','&#206;','&#207;','&#208;','&#209;','&#210;','&#211;','&#212;',
'&#213;','&#214;','&#215;','&#216;','&#217;','&#218;','&#219;','&#220;','&#221;','&#222;',
'&#223;','&#224;','&#225;','&#226;','&#227;','&#228;','&#229;','&#230;','&#231;','&#232;',
'&#233;','&#234;','&#235;','&#236;','&#237;','&#238;','&#239;','&#240;','&#241;','&#242;',
'&#243;','&#244;','&#245;','&#246;','&#247;','&#248;','&#249;','&#250;','&#251;','&#252;',
'&#253;','&#254;','&#255;'
);
$jg_j2hg1=str_replace($jg_6ux7b,$jg_uzxar,$jg_j2hg1);
return $jg_j2hg1;
}
function jg_m1t10($jg_46tp9)
{
$jg_46tp9=str_replace('!!$!!$', '&', $jg_46tp9);
$jg_46tp9=str_replace('!!!$!!!$', '+', $jg_46tp9);
$jg_46tp9=str_replace('!!!!$!!!!$', '<', $jg_46tp9);
$jg_46tp9=str_replace('!!!!!$!!!!!$', '>', $jg_46tp9);
$jg_46tp9=str_replace('!!!!!!$!!!!!!$', '/', $jg_46tp9);
return $jg_46tp9;
}
function jg_8zcd4($jg_46tp9)
{
$jg_46tp9=str_replace('&amp;', '!!$!!$', $jg_46tp9);
$jg_46tp9=str_replace('&', '!!$!!$', $jg_46tp9);
$jg_46tp9=str_replace('+', '!!!$!!!$', $jg_46tp9);
$jg_46tp9=str_replace('<', '!!!!$!!!!$', $jg_46tp9);
$jg_46tp9=str_replace('>', '!!!!!$!!!!!$', $jg_46tp9);
$jg_46tp9=str_replace('/', '!!!!!!$!!!!!!$', $jg_46tp9);
return $jg_46tp9;
}
function jg_10sbg($jg_46tp9)
{
$jg_46tp9=str_replace(' &amp; ', ' & ', $jg_46tp9);
$jg_46tp9=str_replace('&gt;', '>', $jg_46tp9);
$jg_46tp9=str_replace('&lt;', '<', $jg_46tp9);
$jg_46tp9=str_replace('&nbsp;', ' ', $jg_46tp9);
return $jg_46tp9;
}
function jg_ecfq2($jg_46tp9)
{
$jg_46tp9=str_replace(' & ', ' &amp; ', $jg_46tp9);
$jg_46tp9=str_replace('&amp;amp;', '&amp;', $jg_46tp9);
$jg_46tp9=str_replace('&amp;gt;', '&gt;', $jg_46tp9);
$jg_46tp9=str_replace('>', '&gt;', $jg_46tp9);
$jg_46tp9=str_replace('<', '&lt;', $jg_46tp9);
$jg_46tp9=str_replace(' ', '&nbsp;', $jg_46tp9);
return $jg_46tp9;
}
function jg_q3jf1($product_id) {
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_96dks=array();
$jg_o2lpb=mysql_query("SELECT ag.attribute_group_id, agd.name FROM ".DB_PREFIX."product_attribute pa LEFT JOIN ".DB_PREFIX."attribute a ON (pa.attribute_id=a.attribute_id) LEFT JOIN ".DB_PREFIX."attribute_group ag ON (a.attribute_group_id=ag.attribute_group_id) LEFT JOIN ".DB_PREFIX."attribute_group_description agd ON (ag.attribute_group_id=agd.attribute_group_id) WHERE pa.product_id='".(int)$product_id."' AND agd.language_id='".JG_RBM6Z."' GROUP BY ag.attribute_group_id ORDER BY ag.sort_order, agd.name LIMIT 0,50");
while($jg_5q9mv=mysql_fetch_array($jg_o2lpb)) {
$jg_w75gd=array();
$jg_dk4vd=mysql_query("SELECT a.attribute_id, ad.name, pa.text FROM ".DB_PREFIX."product_attribute pa LEFT JOIN ".DB_PREFIX."attribute a ON (pa.attribute_id=a.attribute_id) LEFT JOIN ".DB_PREFIX."attribute_description ad ON (a.attribute_id=ad.attribute_id) WHERE pa.product_id='".(int)$product_id."' AND a.attribute_group_id='".(int)$jg_5q9mv['attribute_group_id']."' AND ad.language_id='".JG_RBM6Z."' AND pa.language_id='".JG_RBM6Z."' ORDER BY a.sort_order, ad.name LIMIT 0,50");
while($product_attribute=mysql_fetch_array($jg_dk4vd))
{
$jg_w75gd[]=array(
'attribute_id' => $product_attribute['attribute_id'],
'name'         => $product_attribute['name'],
'text'         => $product_attribute['text'] 
);
}
$jg_96dks[]=array(
'attribute_group_id' => $jg_5q9mv['attribute_group_id'],
'name'               => $jg_5q9mv['name'],
'attribute'          => $jg_w75gd
);
}
return $jg_96dks;
}
function jg_lsq3s($product_id) {
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_6u1o3=array();
$jg_vzayr=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."product_option WHERE product_id='".(int)$product_id."' ORDER BY sort_order LIMIT 0,50");
while($product_option=mysql_fetch_array($jg_vzayr)) {
$jg_6o264=array();
$jg_jo5lv=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."product_option_value WHERE product_option_id='".(int)$product_option['product_option_id']."' ORDER BY sort_order LIMIT 0,50");
while($product_option_value=mysql_fetch_array($jg_jo5lv)) {
$jg_x7e46=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."product_option_value_description WHERE product_option_value_id='".(int)$product_option_value['product_option_value_id']."' AND language_id='".JG_RBM6Z."' LIMIT 0,50");
$jg_ezgbh='';
$jg_5phm2=mysql_fetch_row($jg_x7e46);
$jg_ezgbh=$jg_5phm2[3];
$jg_6o264[]=array(
'product_option_value_id' => $product_option_value['product_option_value_id'],
'name'                    => $jg_ezgbh,
'price'                   => $product_option_value['price'],
'prefix'                  => $product_option_value['prefix']
);
}
$jg_ez7ur=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."product_option_description WHERE product_option_id='".(int)$product_option['product_option_id']."' AND language_id='".JG_RBM6Z."'");
$jg_5phm2=mysql_fetch_row($jg_ez7ur);
$jg_vc107=$jg_5phm2[3];
$jg_6u1o3[]=array(
'product_option_id' => $product_option['product_option_id'],
'name'              => $jg_vc107,
'option_value'      => $jg_6o264,
'sort_order'        => $product_option['sort_order']
);
}
return $jg_6u1o3;
}
function jg_1012z($product_id) {
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$jg_6u1o3=array();
$jg_vzayr=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."product_option po LEFT JOIN `".DB_PREFIX."option` o ON (po.option_id=o.option_id) LEFT JOIN ".DB_PREFIX."option_description od ON (o.option_id=od.option_id) WHERE po.product_id='".(int)$product_id."' AND od.language_id='".JG_RBM6Z."' LIMIT 0,50");
while($product_option=mysql_fetch_array($jg_vzayr)) {
if ($product_option['type']=='select'||$product_option['type']=='radio'||$product_option['type']=='checkbox'||$product_option['type']=='image') {
$jg_6o264=array();
$jg_jo5lv=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."product_option_value pov LEFT JOIN ".DB_PREFIX."option_value ov ON (pov.option_value_id=ov.option_value_id) LEFT JOIN ".DB_PREFIX."option_value_description ovd ON (ov.option_value_id=ovd.option_value_id) WHERE pov.product_option_id='".(int)$product_option['product_option_id']."' AND ovd.language_id='".JG_RBM6Z."' LIMIT 0,50");
while($product_option_value=mysql_fetch_array($jg_jo5lv)) {
$jg_6o264[]=array(
'product_option_value_id' => $product_option_value['product_option_value_id'],
'option_value_id'         => $product_option_value['option_value_id'],
'name'                    => $product_option_value['name'],
'quantity'                => $product_option_value['quantity'],
'subtract'                => $product_option_value['subtract'],
'price'                   => $product_option_value['price'],
'price_prefix'            => $product_option_value['price_prefix'],
'points'                  => $product_option_value['points'],
'points_prefix'           => $product_option_value['points_prefix'],
'weight'                  => $product_option_value['weight'],
'weight_prefix'           => $product_option_value['weight_prefix']
);
}
$jg_6u1o3[]=array(
'product_option_id'    => $product_option['product_option_id'],
'option_id'            => $product_option['option_id'],
'name'                 => $product_option['name'],
'type'                 => $product_option['type'],
'product_option_value' => $jg_6o264,
'required'             => $product_option['required']
);
}else{
$jg_6u1o3[]=array(
'product_option_id' => $product_option['product_option_id'],
'option_id'         => $product_option['option_id'],
'name'              => $product_option['name'],
'type'              => $product_option['type'],
'option_value'      => $product_option['option_value'],
'required'          => $product_option['required']
);
}
}
return $jg_6u1o3;
}
function jg_b3102q($category_id) {
$query=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."category c LEFT JOIN ".DB_PREFIX."category_description cd ON (c.category_id=cd.category_id) LEFT JOIN ".DB_PREFIX."category_to_store c2s ON (c.category_id=c2s.category_id) WHERE c.category_id='".(int)$category_id."' AND cd.language_id='".JG_RBM6Z."' AND c.status='1'");
return mysql_fetch_array($query);
}
function jg_6zcda6($product_id) {
$jg_9ul65=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_9ul65);
mysql_query("SET CHARACTER SET utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_9ul65);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_9ul65);
mysql_query("SET SQL_MODE=''", $jg_9ul65);
mysql_select_db(DB_DATABASE, $jg_9ul65) or die (mysql_error());
$query=mysql_query("SELECT * FROM ".DB_PREFIX."product_to_category WHERE product_id='".(int)$product_id."'");
$category_data=array();
while($row=mysql_fetch_array($query)){
$category_data[]=$row;
}
return $category_data;
}
function getCategoriesByParentId($category_id) {
$category_data=array();
$category_query=$this->db->query("SELECT category_id FROM ".DB_PREFIX."category WHERE parent_id='".(int)$category_id."'");
foreach ($category_query->rows as $category) {
$category_data[]=$category['category_id'];
$children=$this->getCategoriesByParentId($category['category_id']);
if ($children) {
$category_data=array_merge($children, $category_data);
}
}
return $category_data;
}
function getPath($parent_id, $current_path='') {
$category_info=jg_b3102q($parent_id);
if ($category_info) {
if (!$current_path) {
$new_path=$category_info['category_id'];
}else{
$new_path=$category_info['category_id'].'_'.$current_path;
}
$path=getPath($category_info['parent_id'], $new_path);
if ($path) {
return $path;
}else{
return $new_path;
}
}
}
?>
