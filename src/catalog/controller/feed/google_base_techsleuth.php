<?php
?>
<?php
class ControllerFeedGoogleBaseTechSleuth extends Controller {
public function index(){
if ($this->config->get('google_base_techsleuth_status')){
header('Content-Type:text/html; charset=UTF-8');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: Fri, 1 Jan 1999 05:00:00 GMT');
if(defined('_JEXEC')){
define('IS_MIJOSHOP', 1);
}else{
define('IS_MIJOSHOP', 0);
}
define('THIS_SERVER_URL', $this->get_server_url()); /* server url */
$original_error_reporting_value=ini_get('error_reporting');
error_reporting(0); //temporarily disable error reporting so warnings are not displayed
ini_set('max_execution_time', 43200); //3600=1 hour
ini_set('memory_limit', '2048M'); //2048M=maximum number of megabytes
ini_set('error_reporting',$original_error_reporting_value); //return error reporting to original value
if($this->jg_qhi88()=='true'){
if (!isset($_SERVER['PHP_AUTH_USER'])){
$this->jg_l4l8q();
}else{
if (($_SERVER['PHP_AUTH_USER']==$this->jg_6wxae())&&($_SERVER['PHP_AUTH_PW']==$this->jg_m55kg())){
}else{
$this->jg_l4l8q();
}
}
}
$jg_s3g19=microtime();
$jg_s3g19=explode(' ',$jg_s3g19);
$jg_s3g19=$jg_s3g19[1] + $jg_s3g19[0];
$jg_5s5sb=$jg_s3g19;
define('DEFAULT_ADMIN_DIRECTORY_NAME', '/admin/');
$jg_9ml61='';
if (isset($_GET['save_as_file'])){$jg_9ml61=$_GET['save_as_file'];}
if ($jg_9ml61!='true'){$jg_9ml61='false';}
define('JG_9L13Y', $jg_9ml61);
$jg_4wctk='';
if (isset($_GET['download_as_file'])){$jg_4wctk=$_GET['download_as_file'];}
if ($jg_4wctk!='true'){$jg_4wctk='false';}
define('JG_ZQPA8', $jg_4wctk);
$jg_xj910='';
if (isset($_GET['page'])){$jg_xj910=$_GET['page'];}
$jg_22ofx='';
if (isset($_GET['items_per_page'])){$jg_22ofx=$_GET['items_per_page'];}
$jg_taido='';
if (isset($_GET['target_country'])){$jg_taido=$_GET['target_country'];}
$jg_l3rpu='';
if (isset($_GET['product_names'])){$jg_l3rpu=$_GET['product_names'];}
$jg_oqi82='';
if (isset($_GET['memory_usage'])){$jg_oqi82=$_GET['memory_usage'];}
define('JG_Q9DHE', $jg_oqi82);
if ($jg_xj910=='')
{
$jg_xj910=1;
}
if ($jg_22ofx=='')
{
$jg_22ofx=$this->jg_dkzxr();
}
if ($jg_taido==''){$jg_taido='us';}
define('JG_G53QB', $this->jg_ug631());
$jg_x8idp='false';
if (isset($_GET['convert_non_compliant_text'])){$jg_x8idp=$_GET['convert_non_compliant_text'];}
if ($jg_x8idp=='true')
{
define('JG_9GTNQ', $jg_x8idp);
}else{
define('JG_9GTNQ', $this->jg_gefqf(JG_G53QB.'google.merchant.center.feed.default.convert.non.compliant.characters.xml'));
}
define('JG_1D5ZP', 'tsv');
define('JG_9K4E8', 'xml');
$jg_jdxod=$this->jg_aidwq(JG_G53QB.'google.merchant.center.feed.default.data.feed.format.xml');
if (isset($_GET['output_format'])){$jg_jdxod=$_GET['output_format'];}
if ($jg_jdxod!=JG_1D5ZP){$jg_jdxod=JG_9K4E8;}
define('JG_HL9QO', $jg_jdxod);
define('JG_TIQ91','use_opencart_field_value');
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.google.product.category.xml','default_google_product_category');
define('JG_76BTG', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.google.product.category.au.xml','default_google_product_category_au');
define('JG_9GCES', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.google.product.category.br.xml','default_google_product_category_br');
define('JG_MPZIK', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.google.product.category.ch.xml','default_google_product_category_ch');
define('THIS_GOOGLE_PRODUCT_CATEGORY_DEFAULT_CH', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.google.product.category.cn.xml','default_google_product_category_cn');
define('JG_VT85G', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.google.product.category.cz.xml','default_google_product_category_cz');
define('JG_H81AU', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.google.product.category.de.xml','default_google_product_category_de');
define('JG_BWBJB', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.google.product.category.es.xml','default_google_product_category_es');
define('JG_4VQ5P', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.google.product.category.fr.xml','default_google_product_category_fr');
define('JG_DNC1E', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.google.product.category.gb.xml','default_google_product_category_gb');
define('JG_JXMLT', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.google.product.category.it.xml','default_google_product_category_it');
define('JG_3WXXD', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.google.product.category.jp.xml','default_google_product_category_jp');
define('JG_1B10E', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.google.product.category.nl.xml','default_google_product_category_nl');
define('JG_7CTP9', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.google.product.category.us.xml','default_google_product_category_us');
define('JG_WD8F6', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.availability.xml','default_availability');
if ($jg_a21v2==''){$jg_a21v2='in stock';}
define('JG_HU106', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.availability.zero.xml','default_availability_zero');
if ($jg_a21v2==''){$jg_a21v2='out of stock';}
define('JG_1SBF5', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.color.xml','default_color');
define('JG_SE3UM', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.condition.xml','default_condition');
define('JG_G3MCF', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.size.xml','default_size');
define('JG_VFAVP', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.age.group.xml','default_age_group');
define('JG_DN4DK', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.gender.xml','default_gender');
define('JG_1EFC4', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.link.suffix.xml','default_link_suffix');
define('JG_WFSCN', $this->jg_4akuu($jg_a21v2));
define('JG_Z27GK', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.do.not.use.a.cached.image.for.product.image.link.xml','default_do_not_use_a_cached_image_for_product_image_link');
define('JG_9ZZ7V', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.do.not.use.model.field.for.mpn.xml','default_do_not_use_model_field_for_mpn');
define('JG_6FUED', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.do.not.use.upc.field.for.gtin.xml','default_do_not_use_upc_field_for_gtin');
define('JG_QHSB3', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.do.not.use.product.id.field.for.id.xml','default_do_not_use_product_id_field_for_id');
define('JG_BQKIT', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.do.not.use.manufacturer.field.for.brand.xml','default_do_not_use_manufacturer_field_for_brand');
define('JG_5F3IS', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.special.time.of.day.xml','default_special_time_of_day');
define('JG_R10GT', $jg_a21v2);
$jg_a21v2=$this->jg_fpz4l(JG_G53QB.'google.merchant.center.feed.default.special.time.zone.offset.xml','default_special_time_zone_offset');
define('JG_JULC1', $jg_a21v2);
$jg_d410tc='';
if (isset($_GET['language'])){$jg_d410tc=$_GET['language'];}
define('JG_101A1', $this->jg_mgvof($jg_d410tc));
define('JG_JRNGJ', $this->jg_z103n(JG_101A1));
define('JG_PS9G7', $this->jg_xgbgy($this->config->get('config_store_id')));
define('JG_CBAYZ', $this->jg_9t101($jg_taido));
define('JG_9TVQEW', 'google_base_techsleuth');
define('JG_O7GR6', $this->jg_cse4yo());
require_once(JG_O7GR6);
define('JG_H4SE43', $this->jg_6cr4sw(JG_G53QB.'google.merchant.center.feed.default.remove.html.tags.from.product.descriptions.xml'));
define('JG_WKWFWH', $this->jg_i10lz(JG_G53QB.'google.merchant.center.feed.default.correct.lone.ampersands.in.product.names.and.descriptions.xml'));
define('JG_E84JGQ', $this->jg_uu10dt(JG_G53QB.'google.merchant.center.feed.default.shorten.product.descriptions.to.10000.characters.or.less.xml'));
define('JG_10R2L', $this->jg_umnks(JG_G53QB.'google.merchant.center.feed.default.enclose.xml.data.feed.attributes.within.cdata.sections.xml'));
define('USE_WEIGHT_FOR_SHIPPING_WEIGHT', $this->load_xml_default_use_weight_for_shipping_weight(JG_G53QB.'google.merchant.center.feed.default.use.weight.for.shipping.weight.xml'));
$jg_fk868='false';
if (isset($_GET['do_not_merge_custom_attribute_assignments'])){$jg_fk868=$_GET['do_not_merge_custom_attribute_assignments'];}
if($jg_fk868=='true')
{
define('JG_SB10G', $jg_fk868);
}else{
define('JG_SB10G', $this->jg_sl10y(JG_G53QB.'google.merchant.center.feed.default.do.not.merge.custom.attribute.assignments.xml'));
}
if(JG_10R2L=='true'){
define('JG_8RTWL', '<![CDATA[');
define('JG_AF6XH', ']]>');
}else{
define('JG_8RTWL', '');
define('JG_AF6XH', '');
}
$jg_ffdcm=0;
if ($jg_xj910==1)
{
$jg_ffdcm=0;
}
else
{
$jg_ffdcm=(($jg_xj910 - 1) * $jg_22ofx);
}
$data=array(
'start'           => $jg_ffdcm,
'limit'           => $jg_22ofx
);
if ($jg_l3rpu=='true')
{
$jg_burdw=0;
if(!IS_MIJOSHOP==1){
$jg_4m68k=$this->jg_pyz74($data);
$jg_zvdmr='';
foreach ($jg_4m68k as $jg_jcqd1)
{
$jg_zvdmr.='row: '.(string)$jg_burdw.'  id: '.$jg_jcqd1['product_id'].'  name: '.$this->jg_4akuu($jg_jcqd1['name']).'<br />';
$jg_burdw=$jg_burdw + 1;
}
} else {
$jg_zvdmr='';
$this->load->model('catalog/category');
$this->load->model('catalog/product');
$this->load->model('tool/image');
$jg_4m68k=$this->getProducts_Mijoshop();
foreach ($jg_4m68k as $jg_jcqd1) {
$jg_zvdmr.='row: '.(string)$jg_burdw.'  id: '.$jg_jcqd1['product_id'].'  name: '.$this->jg_4akuu($jg_jcqd1['name']).'<br />';
}
}
$this->response->addheader('Pragma: public');
$this->response->addheader('Expires: 0');
$this->response->addHeader('Content-Type: text/html; charset=UTF-8');
$this->response->setOutput($jg_zvdmr);
}
if ($jg_l3rpu!='true')
{
$jg_9iglc=array();
$jg_zwa12=array();
$jg_xxia8='<?xml version="1.0" encoding="UTF-8" ?>'."\r\n";
$jg_xxia8.='<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">'."\r\n";
$jg_xxia8.='  <channel>'."\r\n";
$jg_xxia8.='    <title>'.JG_8RTWL.$this->jg_yogsy($this->config->get('config_name')).JG_AF6XH.'</title>'."\r\n";
$jg_xxia8.='    <description>'.JG_8RTWL.$this->jg_yogsy($this->config->get('config_meta_description')).JG_AF6XH.'</description>'."\r\n";
$jg_xxia8.='    <link>'.JG_PS9G7.'</link>'."\r\n";
$this->load->model('catalog/category');
$this->load->model('catalog/product');
$this->load->model('tool/image');
if (JG_SB10G!=='true')
{
$jg_104pp=JG_G53QB."google.merchant.center.feed.attribute.assignments.xml";
$jg_yhdli=new DOMDocument();
if (file_exists($jg_104pp))
{
$jg_yhdli->load( $jg_104pp );
$jg_18q3c=$jg_yhdli->getElementsByTagName( "assignment" );
foreach( $jg_18q3c as $jg_ofplv )
{
$jg_10vss=$jg_ofplv->getElementsByTagName( "opencart_field" );
$jg_otske=$jg_10vss->item(0)->nodeValue;
$jg_otske=$this->jg_yogsy($jg_otske);
$jg_pfwf1=$jg_ofplv->getElementsByTagName( "opencart_field_value" );
$jg_wobja=$jg_pfwf1->item(0)->nodeValue;
$jg_wobja=$this->jg_yogsy($jg_wobja);
$jg_10jmb=$jg_ofplv->getElementsByTagName( "google_attribute" );
$jg_8gq2t=$jg_10jmb->item(0)->nodeValue;
$jg_8gq2t=$this->jg_yogsy($jg_8gq2t);
$jg_r23uu=$jg_ofplv->getElementsByTagName( "google_attribute_value" );
$jg_1o8hj=$jg_r23uu->item(0)->nodeValue;
$jg_1o8hj=$this->jg_yogsy($jg_1o8hj);
$jg_9iglc[]=$this->jg_sf1po($jg_otske,$jg_wobja,$jg_8gq2t,$jg_1o8hj);
}
}
}
$jg_104pp=JG_G53QB."google.merchant.center.feed.custom.product.fields.xml";
$jg_yhdli=new DOMDocument();
if (file_exists($jg_104pp))
{
$jg_yhdli->load( $jg_104pp );
$jg_glrmw=$jg_yhdli->getElementsByTagName( "custom_product_field" );
foreach( $jg_glrmw as $jg_e10zw )
{
$jg_pt104=$jg_e10zw->getElementsByTagName( "column_name" );
$jg_ubp84=$jg_pt104->item(0)->nodeValue;
$jg_ubp84=$jg_ubp84;
$jg_whrpw=$jg_e10zw->getElementsByTagName( "attribute_name" );
$jg_fjuki=$jg_whrpw->item(0)->nodeValue;
$jg_fjuki=$jg_fjuki;
$jg_aacyb=$jg_e10zw->getElementsByTagName( "attribute_prefix" );
$jg_9pi10=$jg_aacyb->item(0)->nodeValue;
$jg_9pi10=$jg_9pi10;
$jg_zwa12[]=$this->jg_8hbmt($jg_ubp84,$jg_fjuki,$jg_9pi10);
}
}
if(!IS_MIJOSHOP==1){
$jg_4m68k=$this->jg_pyz74($data);
} else {
$jg_4m68k=$this->getProducts_Mijoshop($data);
}
$jg_bp2l8=0;
$jg_8i2dk=array();
$jg_ku1jm=array();
foreach ($jg_4m68k as $jg_jcqd1){
$jg_bjq7g=array();
$jg_bp2l8=$jg_bp2l8 + 1;
$jg_t6c9e=0;
$jg_vlgoa="";
$jg_zel10=0;
$categories=$this->jg_6zcda6($jg_jcqd1['product_id']);
$jg_oxvlp="";
$jg_gvst2="";
$jg_nlwx9="";
$jg_vdpuv="";
$jg_w9un1="";
$jg_6p29q="";
$jg_l52a1="";
$jg_w8xf5="";
$jg_xhyix="";
$jg_rd59v="";
$jg_3fvt6="";
$jg_9qu7x="";
$jg_ct8bd="";
$jg_10kg8="";
$jg_xmml8="";
$jg_8husc="";
$jg_6fwzr="";
$jg_yleft="";
$jg_8cq31="";
$jg_b210m="";
$jg_dqt3f="";
$jg_lopvp="";
$jg_nl3cm="";
$jg_oxxqx="";
$jg_d7cgm="";
$jg_bdp1p="";
$jg_qo6o6="";
$jg_bpcht="";
$jg_2lanm="";
$jg_epj10="";
$jg_hvy4p="";
$jg_pyr8l="";
$jg_9123m="";
$jg_fc27c="";
$jg_xglrw="";
foreach ($categories as $category){
$jg_7b7cn=$this->jg_mce4k($category['category_id']);
if ($jg_7b7cn){
$category_data='';
foreach (explode('_', $jg_7b7cn) as $path_id){
$jg_v10xj=$this->jg_b3102q($path_id);
if ($jg_v10xj){
if (!$category_data){
$category_data=$jg_v10xj['name'];
}else{
$category_data.=' &gt; '.$jg_v10xj['name'];
}
}
}
$jg_zel10=$jg_zel10 + 1;
if ($jg_zel10<=10)
{
if (JG_HL9QO==JG_1D5ZP){
if(strpos($jg_dqt3f, $category_data) !== false){}else{
if($jg_dqt3f=='')
{
$jg_dqt3f=$this->jg_2dm8k($category_data);
}
else
{
$jg_dqt3f.=','.$this->jg_2dm8k($category_data);
}
}
}
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa.='      <g:product_type>'.JG_8RTWL.$this->jg_yogsy($this->jg_fjpsk($category_data)).JG_AF6XH.'</g:product_type>'."\r\n";}
}
else
{
break;
}
$jg_zfjj2=$category_data;
if($jg_zel10==1)
{
for ($jg_jzmya=0; $jg_jzmya<count($jg_9iglc); $jg_jzmya++)
{
$jg_otske=$jg_9iglc[$jg_jzmya]["field_opencart"];
$jg_wobja=$jg_9iglc[$jg_jzmya]["field_value_opencart"];
$jg_8gq2t=$jg_9iglc[$jg_jzmya]["attribute_google"];
$jg_1o8hj=$jg_9iglc[$jg_jzmya]["attribute_value_google"];
switch ($jg_otske)
{
case ($jg_otske=='Product Category'||$this->jg_4dtrn($jg_otske,$_['text_product_category'])):
if ($this->jg_4dtrn($jg_zfjj2,$jg_wobja))
{
switch ($jg_8gq2t)
{
case 'skip_product':
$jg_t6c9e=1;
break;
case 'google_product_category':
if (($jg_1o8hj=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_8gq2t,$jg_1o8hj,$jg_bjq7g,$jg_vlgoa) !== 0)){}else{
if ($jg_1o8hj==JG_TIQ91)
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_1xqww($jg_8gq2t,$this->jg_yogsy($jg_zfjj2),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){$jg_b210m=$this->jg_2dm8k($jg_zfjj2);}
}
else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_1xqww($jg_8gq2t,$jg_1o8hj,$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){$jg_b210m=$this->jg_2dm8k($jg_1o8hj);}
}
}
break;
default:
if ($jg_1o8hj==JG_TIQ91)
{
if (JG_HL9QO==JG_1D5ZP){$jg_bjq7g[]=$this->jg_vgd6p($this->jg_2dm8k($jg_jcqd1['name']),$jg_8gq2t,$jg_zfjj2,$jg_ku1jm,$jg_bjq7g,$jg_vlgoa);}
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_8gq2t,$jg_zfjj2,$jg_vlgoa);}
}
else
{
if (JG_HL9QO==JG_1D5ZP){$jg_bjq7g[]=$this->jg_vgd6p($this->jg_2dm8k($jg_jcqd1['name']),$this->jg_2dm8k($jg_8gq2t),$this->jg_2dm8k($jg_1o8hj),$this->jg_2dm8k($jg_vlgoa),$jg_bjq7g,$jg_vlgoa);}
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_8gq2t,$jg_1o8hj,$jg_vlgoa);}
}
break;
}
}
break;
case ($jg_otske=='Product'||$jg_otske=='Product Name'||$jg_otske==$_['text_product_name']):
if ($this->jg_4dtrn($jg_jcqd1['name'],$jg_wobja))
{
switch ($jg_8gq2t)
{
case 'skip_product':
$jg_t6c9e=1;
break;
case 'google_product_category':
if ($jg_1o8hj==JG_TIQ91)
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_1xqww($jg_8gq2t,$this->jg_4akuu(html_entity_decode($jg_jcqd1['name'], ENT_QUOTES, 'UTF-8')),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){$jg_b210m=$this->jg_2dm8k($this->jg_4akuu(html_entity_decode($jg_jcqd1['name'], ENT_QUOTES, 'UTF-8')));}
}
else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_1xqww($jg_8gq2t,$jg_1o8hj,$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){$jg_b210m=$this->jg_2dm8k($jg_1o8hj);}
}
break;
default:
if ($jg_1o8hj==JG_TIQ91)
{
if (JG_HL9QO==JG_1D5ZP){$jg_bjq7g[]=$this->jg_vgd6p($this->jg_2dm8k($jg_jcqd1['name']),$jg_8gq2t,$this->jg_2dm8k($jg_jcqd1['name']),$jg_ku1jm,$jg_bjq7g,$jg_vlgoa);}
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_8gq2t,$this->jg_2dm8k($jg_jcqd1['name']),$jg_vlgoa);}
}
else
{
if (JG_HL9QO==JG_1D5ZP){$jg_bjq7g[]=$this->jg_vgd6p($this->jg_2dm8k($jg_jcqd1['name']),$jg_8gq2t,$jg_1o8hj,$jg_ku1jm,$jg_bjq7g,$jg_vlgoa);}
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_8gq2t,$jg_1o8hj,$jg_vlgoa);}
}
break;
}
}
break;
case ($jg_otske=='Product Attribute'||$jg_otske==$_['text_product_attribute']):
switch (VERSION)
{
case (VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'||VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$jg_actev=array();
$jg_r17p4=$this->jg_cih6w($jg_jcqd1['product_id']);
foreach ($jg_r17p4 as $attribute_group){
foreach ($attribute_group['attribute'] as $attribute){
if ($this->jg_4akuu($this->jg_yogsy($jg_wobja))==$this->jg_4akuu($this->jg_yogsy($attribute_group['name'].": ".$attribute['name'].": ".$attribute['text'])))
{
if($jg_8gq2t=='skip_product')
{
$jg_t6c9e=1;
}
$jg_m77zv='';
if ($jg_1o8hj==JG_TIQ91)
{
$jg_m77zv=$attribute['text'];
}
else
{
$jg_m77zv=$this->jg_2dm8k($jg_1o8hj);
}
$jg_4mu92=explode(",",$jg_m77zv);
foreach($jg_4mu92 as $jg_p4mjg)
{
if (JG_HL9QO==JG_1D5ZP){$jg_bjq7g[]=$this->jg_vgd6p($this->jg_2dm8k($jg_jcqd1['name']),$this->jg_2dm8k($jg_8gq2t),$this->jg_2dm8k($jg_p4mjg),$this->jg_2dm8k($jg_vlgoa),$jg_bjq7g,$jg_vlgoa);}
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_8gq2t,$jg_p4mjg,$jg_vlgoa);}
}
}
}
}
break;
default:
break;
}
case ($jg_otske=='Product Option'||$jg_otske==$_['text_product_option']):
$jg_2fpuk=array();
$jg_f10o5='';
switch (VERSION)
{
case (VERSION=='1.4.7'||VERSION=='1.4.8'||VERSION=='1.4.9'||VERSION=='1.4.9.1'||VERSION=='1.4.9.2'||VERSION=='1.4.9.3'||VERSION=='1.4.9.4'||VERSION=='1.4.9.5'||VERSION=='1.4.9.6'):
$options=$this->jg_lnm23($jg_jcqd1['product_id']);
$jg_qi15s='';
foreach ($options as $option){
$jg_vmtwb=array();
foreach ($option['option_value'] as $option_value){
$jg_vmtwb[]=array(
'option_value_id' => $option_value['product_option_value_id'],
'name'            => $option_value['name'],
'prefix'          => $option_value['prefix']
);
$jg_qi15s=$this->jg_2dm8k($jg_qi15s.$option_value['name']).",";
}
$data['options'][]=array(
'option_id'    => $option['product_option_id'],
'name'         => $option['name'],
'option_value' => $jg_vmtwb
);
$jg_4mu92=explode(",",$jg_qi15s);
$jg_yfatm=0;
$jg_gletv="";
foreach($jg_4mu92 as $jg_p4mjg)
{
if ($jg_p4mjg!="")
{
if ($jg_yfatm==0)
{
$jg_gletv.=$jg_p4mjg;
}
else
{
$jg_gletv.=",".$jg_p4mjg;
}
}
$jg_yfatm=$jg_yfatm+1;
}
$jg_qi15s=$jg_gletv;
if ($this->jg_4akuu($this->jg_yogsy($jg_wobja))==$this->jg_4akuu($this->jg_yogsy($option['name'].": ".$jg_qi15s)))
{
if($jg_8gq2t=='skip_product')
{
$jg_t6c9e=1;
}
$jg_m77zv='';
if ($jg_1o8hj==JG_TIQ91)
{
$jg_m77zv=$jg_qi15s;
}
else
{
$jg_m77zv=$jg_1o8hj;
}
$jg_4mu92=explode(",",$jg_m77zv);
foreach($jg_4mu92 as $jg_p4mjg)
{
if (JG_HL9QO==JG_1D5ZP){$jg_bjq7g[]=$this->jg_vgd6p($this->jg_2dm8k($jg_jcqd1['name']),$this->jg_2dm8k($jg_8gq2t),$this->jg_2dm8k($jg_p4mjg),$this->jg_2dm8k($jg_vlgoa),$jg_bjq7g,$jg_vlgoa);}
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_8gq2t,$jg_p4mjg,$jg_vlgoa);}
}
}
$jg_qi15s="";
}
break;
case (VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'||VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$jg_f10o5=$this->jg_rjcu6($jg_jcqd1['product_id']);
$jg_qi15s='';
foreach ($jg_f10o5 as $option){
if ($option['type']=='select'||$option['type']=='radio'||$option['type']=='checkbox'){
$jg_vmtwb=array();
foreach ($option['product_option_value'] as $option_value){
if (!$option_value['subtract']||($option_value['quantity']>0)){
$jg_vmtwb[]=array(
'product_option_value_id' => $option_value['product_option_value_id'],
'option_value_id'         => $option_value['option_value_id'],
'name'                    => $option_value['name']
);
$jg_qi15s=$this->jg_2dm8k($jg_qi15s.$option_value['name']).",";
}
}
$jg_2fpuk[]=array(
'product_option_id' => $option['product_option_id'],
'option_id'         => $option['option_id'],
'name'              => $option['name'],
'type'              => $option['type'],
'option_value'      => $jg_vmtwb,
'required'          => $option['required']
);
} elseif ($option['type']=='text'||$option['type']=='textarea'||$option['type']=='file'||$option['type']=='date'||$option['type']=='datetime'||$option['type']=='time'){
$jg_2fpuk[]=array(
'product_option_id' => $option['product_option_id'],
'option_id'         => $option['option_id'],
'name'              => $option['name'],
'type'              => $option['type'],
'option_value'      => $option['option_value'],
'required'          => $option['required']
);
$jg_qi15s=$this->jg_2dm8k($jg_qi15s.$option['option_value']).",";
}
$jg_4mu92=explode(",",$jg_qi15s);
$jg_yfatm=0;
$jg_gletv="";
foreach($jg_4mu92 as $jg_p4mjg)
{
if ($jg_p4mjg!="")
{
if ($jg_yfatm==0)
{
$jg_gletv.=$jg_p4mjg;
}
else
{
$jg_gletv.=",".$jg_p4mjg;
}
}
$jg_yfatm=$jg_yfatm+1;
}
$jg_qi15s=$jg_gletv;
if ($option['type']!="file")
{
if ($this->jg_4akuu($jg_wobja)==$this->jg_4akuu($option['name'].": ".$jg_qi15s))
{
if($jg_8gq2t=='skip_product')
{
$jg_t6c9e=1;
}
$jg_m77zv='';
if ($jg_1o8hj==JG_TIQ91)
{
$jg_m77zv=$jg_qi15s;
}
else
{
$jg_m77zv=$jg_1o8hj;
}
$jg_4mu92=explode(",",$jg_m77zv);
foreach($jg_4mu92 as $jg_p4mjg)
{
if (JG_HL9QO==JG_1D5ZP){$jg_bjq7g[]=$this->jg_vgd6p($this->jg_2dm8k($jg_jcqd1['name']),$this->jg_2dm8k($jg_8gq2t),$this->jg_2dm8k($jg_p4mjg),$this->jg_2dm8k($jg_vlgoa),$jg_bjq7g,$jg_vlgoa);}
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_8gq2t,$jg_p4mjg,$jg_vlgoa);}
}
}
}
$jg_qi15s="";
}
break;
default:
break;
}
break;
default:
break;
}
}
for ($jg_jzmya=0; $jg_jzmya<count($jg_zwa12); $jg_jzmya++)
{
$jg_s3zxz=$jg_zwa12[$jg_jzmya]["column_name"];
$jg_1vefg=$jg_zwa12[$jg_jzmya]["attribute_name"];
$jg_we10p=$jg_zwa12[$jg_jzmya]["attribute_prefix"];
if(isset($jg_jcqd1[$jg_s3zxz]))
{
if(($jg_jcqd1[$jg_s3zxz]!=='')||($jg_1vefg=='shipping_weight'))
{
if($jg_1vefg=='skip_product')
{
$jg_yogmp=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);
if($jg_t6c9e==0)
{
$jg_t6c9e=intval($jg_yogmp);
}
}else{
if(strtolower($jg_we10p)=='g')
{
switch ($jg_1vefg)
{
case ("additional_image_link"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_ct8bd==''){$jg_ct8bd=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("adwords_grouping"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_hvy4p==''){$jg_hvy4p=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("adwords_labels"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_pyr8l==''){$jg_pyr8l=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("adwords_publish"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
$jg_qgw35='true';
if($jg_jcqd1[$jg_s3zxz]=='0'){$jg_qgw35='false';}
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_qgw35)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_9123m==''){$jg_9123m=$this->jg_2dm8k($jg_qgw35);}}
}
break;
case ("adwords_redirect"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_fc27c==''){$jg_fc27c=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("adwords_queryparam"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_xglrw==''){$jg_xglrw=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("availability"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_rd59v==''){$jg_rd59v=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("age_group"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_bdp1p==''){$jg_bdp1p=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("brand"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_yleft==''){$jg_yleft=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case (($jg_1vefg=="color")||($jg_1vefg=="colour")):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_lopvp==''){$jg_lopvp=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("condition"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_6p29q==''){$jg_6p29q=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("excluded_destination"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_epj10==''){$jg_epj10=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("gender"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_qo6o6==''){$jg_qo6o6=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("google_product_category"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
$jg_d7elr='';
if($jg_s3zxz=='google_product_category_'.$jg_taido){$jg_d7elr=$jg_jcqd1[$jg_s3zxz];}
if($jg_s3zxz=='google_product_category'){$jg_d7elr=$jg_jcqd1[$jg_s3zxz];}
if($jg_d7elr!=='')
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_b210m==''){$jg_b210m=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
}
break;
case ("gtin"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_10kg8==''){$jg_10kg8=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("item_group_id"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_bpcht==''){$jg_bpcht=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("material"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_nl3cm==''){$jg_nl3cm=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("mpn"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_8cq31==''){$jg_8cq31=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("pattern"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_oxxqx==''){$jg_oxxqx=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("shipping"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_6fwzr==''){$jg_6fwzr=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("shipping_weight"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
$jg_rnusb='';
if(
($this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz]))=='use_weight')
||
(
($this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz]))=='')&&(USE_WEIGHT_FOR_SHIPPING_WEIGHT=='true')
)
)
{
switch (VERSION)
{
case (VERSION=='1.4.7'||VERSION=='1.4.8'||VERSION=='1.4.9'||VERSION=='1.4.9.1'||VERSION=='1.4.9.2'||VERSION=='1.4.9.3'||VERSION=='1.4.9.4'||VERSION=='1.4.9.5'||VERSION=='1.4.9.6'||VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'):
$jg_rnusb=$this->format_weight($jg_jcqd1['weight'], $jg_jcqd1['weight_class']);
break;
case (VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$jg_rnusb=$this->format_weight($jg_jcqd1['weight'], $jg_jcqd1['weight_class_id']);
break;
default:
break;
}
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_rnusb)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_8husc==''){$jg_8husc=$this->jg_2dm8k($jg_rnusb);}}
}else{
if($jg_jcqd1[$jg_s3zxz]!=='')
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_8husc==''){$jg_8husc=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
}
}
break;
case ("size"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_d7cgm==''){$jg_d7cgm=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
case ("tax"):
if (($this->jg_6ezgr($jg_jcqd1['name'],$jg_1vefg,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
}else{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_2lanm==''){$jg_2lanm=$this->jg_2dm8k($jg_jcqd1[$jg_s3zxz]);}}
}
break;
default:
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_1vefg,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])),$jg_vlgoa);}
break;
}
}
else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa.='      <'.$jg_we10p.':'.$jg_1vefg.'>'.$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1[$jg_s3zxz])).'</'.$jg_we10p.':'.$jg_1vefg.'>'."\r\n";}
}
}
}
}
}
$jg_2gby2='google_product_category';
switch ($jg_taido)
{
case ("au"):
if ((JG_9GCES=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_9GCES)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_b210m==''){$jg_b210m=$this->jg_2dm8k(JG_9GCES);}}
}
break;
case ("br"):
if ((JG_MPZIK=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_MPZIK)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_b210m==''){$jg_b210m=$this->jg_2dm8k(JG_MPZIK);}}
}
break;
case ("ch"):
if ((THIS_GOOGLE_PRODUCT_CATEGORY_DEFAULT_CH=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(THIS_GOOGLE_PRODUCT_CATEGORY_DEFAULT_CH)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_b210m==''){$jg_b210m=$this->jg_2dm8k(THIS_GOOGLE_PRODUCT_CATEGORY_DEFAULT_CH);}}
}
break;
case ("cn"):
if ((JG_VT85G=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_VT85G)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_b210m==''){$jg_b210m=$this->jg_2dm8k(JG_VT85G);}}
}
break;
case ("cz"):
if ((JG_H81AU=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_H81AU)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_b210m==''){$jg_b210m=$this->jg_2dm8k(JG_H81AU);}}
}
break;
case ("de"):
if ((JG_BWBJB=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_BWBJB)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_b210m==''){$jg_b210m=$this->jg_2dm8k(JG_BWBJB);}}
}
break;
case ("es"):
if ((JG_4VQ5P=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_4VQ5P)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_b210m==''){$jg_b210m=$this->jg_2dm8k(JG_4VQ5P);}}
}
break;
case ("fr"):
if ((JG_DNC1E=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_DNC1E)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_b210m==''){$jg_b210m=$this->jg_2dm8k(JG_DNC1E);}}
}
break;
case ("gb"):
if ((JG_JXMLT=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_JXMLT)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_b210m==''){$jg_b210m=$this->jg_2dm8k(JG_JXMLT);}}
}
break;
case ("it"):
if ((JG_3WXXD=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_3WXXD)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_b210m==''){$jg_b210m=$this->jg_2dm8k(JG_3WXXD);}}
}
break;
case ("jp"):
if ((JG_1B10E=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_1B10E)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_b210m==''){$jg_b210m=$this->jg_2dm8k(JG_1B10E);}}
}
break;
case ("nl"):
if ((JG_7CTP9=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_7CTP9)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_b210m==''){$jg_b210m=$this->jg_2dm8k(JG_7CTP9);}}
}
break;
case ("us"):
if ((JG_WD8F6=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_WD8F6)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_b210m==''){$jg_b210m=$this->jg_2dm8k(JG_WD8F6);}}
}
break;
default:
break;
}
if ((JG_76BTG=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0)){
} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_76BTG)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_b210m==''){$jg_b210m=$this->jg_2dm8k(JG_76BTG);}}
}
$jg_2gby2='color';
if ((JG_SE3UM=="")||($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0)){} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_SE3UM)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_lopvp==''){$jg_lopvp=$this->jg_2dm8k(JG_SE3UM);}}
}
$jg_2gby2='condition';
if ((JG_G3MCF=="")||($this->jg_6ezgr($jg_jcqd1['name'],'condition','',$jg_bjq7g,$jg_vlgoa) !== 0)){} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_G3MCF)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_6p29q==''){$jg_6p29q=$this->jg_2dm8k(JG_G3MCF);}}
}
$jg_2gby2='size';
if ((JG_VFAVP=="")||($this->jg_6ezgr($jg_jcqd1['name'],'size','',$jg_bjq7g,$jg_vlgoa) !== 0)){} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_VFAVP)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_d7cgm==''){$jg_d7cgm=$this->jg_2dm8k(JG_VFAVP);}}
}
$jg_2gby2='age_group';
if ((JG_DN4DK=="")||($this->jg_6ezgr($jg_jcqd1['name'],'age_group','',$jg_bjq7g,$jg_vlgoa) !== 0)){} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_DN4DK)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_bdp1p==''){$jg_bdp1p=$this->jg_2dm8k(JG_DN4DK);}}
}
$jg_2gby2='gender';
if ((JG_1EFC4=="")||($this->jg_6ezgr($jg_jcqd1['name'],'gender','',$jg_bjq7g,$jg_vlgoa) !== 0)){} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk(JG_1EFC4)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_qo6o6==''){$jg_qo6o6=$this->jg_2dm8k(JG_1EFC4);}}
}
}
}
}
if ($jg_t6c9e==1)
{
}
else
{
if (JG_HL9QO==JG_9K4E8){$jg_xxia8.='    <item>'."\r\n";}
$jg_2rq8w='';
if(JG_WKWFWH!=='false')
{
$jg_2rq8w=str_replace('&', '&amp;', $this->jg_yogsy($jg_jcqd1['name']));
}
else
{
$jg_2rq8w=$this->jg_yogsy($jg_jcqd1['name']);
}
if ($jg_oqi82=='true')
{
$jg_s3g19=microtime();
$jg_s3g19=explode(" ",$jg_s3g19);
$jg_s3g19=$jg_s3g19[1] + $jg_s3g19[0];
$jg_5abl5=$jg_s3g19;
$jg_3nkkg=($jg_5abl5 - $jg_5s5sb);
if (JG_HL9QO==JG_9K4E8){$jg_xxia8.='      <title>'.JG_8RTWL.$jg_2rq8w.' - '.$_['text_item_count'].' '.(string)$jg_bp2l8.' - '.$_['text_memory_usage'].' '.(string)memory_get_usage(true).' '.$_['text_bytes'].' '.$_['text_or'].' '.(string)($this->jg_zvx44(memory_get_usage(true))).' '.$_['text_of'].' '.(string)ini_get('memory_limit').'B in '.$jg_3nkkg.' '.$_['text_seconds'].JG_AF6XH.'</title>'."\r\n";}
if (JG_HL9QO==JG_1D5ZP){$jg_gvst2=html_entity_decode($jg_jcqd1['name'], ENT_QUOTES, 'UTF-8').' - '.$_['text_item_count'].' '.(string)$jg_bp2l8.' - '.$_['text_memory_usage'].' '.(string)memory_get_usage(true).' '.$_['text_bytes'].' '.$_['text_or'].' '.(string)($this->jg_zvx44(memory_get_usage(true))).' '.$_['text_of'].' '.(string)ini_get('memory_limit').'B in '.$jg_3nkkg.' '.$_['text_seconds'].'';}
}
else
{
if (JG_HL9QO==JG_9K4E8){$jg_xxia8.='      <title>'.JG_8RTWL.$jg_2rq8w.JG_AF6XH.'</title>'."\r\n";}
if (JG_HL9QO==JG_1D5ZP){$jg_gvst2=html_entity_decode($jg_jcqd1['name'], ENT_QUOTES, 'UTF-8');}
}
$jg_bszyw="";
$jg_5451g="";
if(JG_101A1!='')
{
$jg_bszyw="&amp;language=".JG_101A1;
$jg_5451g="&language=".JG_101A1;
}
$jg_h6cjl='';
if($this->jg_m2fy1()=='1'){$jg_h6cjl=$this->jg_qgucb($jg_jcqd1['product_id']);}
if ($jg_h6cjl=='')
{
if (JG_HL9QO==JG_9K4E8){$jg_xxia8.='      <link>'.JG_PS9G7.'index.php?route=product/product&amp;product_id='.$jg_jcqd1['product_id'].'&amp;currency='.JG_CBAYZ.$jg_bszyw.JG_WFSCN.'</link>'."\r\n";}
if (JG_HL9QO==JG_1D5ZP){$jg_nlwx9=JG_PS9G7.'index.php?route=product/product&product_id='.$jg_jcqd1['product_id'].'&currency='.JG_CBAYZ.$jg_5451g.JG_Z27GK;}
}
else
{
if (JG_HL9QO==JG_9K4E8){$jg_xxia8.='      <link>'.JG_PS9G7.$jg_h6cjl.'&amp;currency='.JG_CBAYZ.$jg_bszyw.JG_WFSCN.'</link>'."\r\n";}
if (JG_HL9QO==JG_1D5ZP){$jg_nlwx9=JG_PS9G7.$jg_h6cjl.'&currency='.JG_CBAYZ.$jg_5451g.JG_Z27GK;}
}
if (JG_HL9QO==JG_9K4E8){
$jg_es3pm='';
if(JG_H4SE43!=='false')
{
$jg_es3pm=$this->jg_yogsy(strip_tags($this->jg_2dm8k($jg_jcqd1['description'])));
if(JG_E84JGQ!=='false')
{
if(strlen($jg_es3pm)>10000)
{
if (function_exists('mb_substr')){
$jg_es3pm=mb_substr($jg_es3pm,0,9999);
}else{
$jg_es3pm=substr($jg_es3pm,0,9999);
}
}
}
}
else
{
$jg_es3pm=$this->jg_yogsy($jg_jcqd1['description']);
}
if(JG_WKWFWH!=='false')
{
$jg_es3pm=str_replace('&', '&amp;', $jg_es3pm);
}
$jg_xxia8.='      <description>'.JG_8RTWL.$jg_es3pm.JG_AF6XH.'</description>'."\r\n";
}
if (JG_HL9QO==JG_1D5ZP){
$jg_ugnz3='';
if(JG_H4SE43!=='false')
{
$jg_ugnz3=strip_tags($this->jg_2dm8k($jg_jcqd1['description']));
if(JG_E84JGQ!=='false')
{
if(strlen($jg_ugnz3)>10000){$jg_ugnz3=substr($jg_ugnz3,0,9999);}
}
}
else
{
$jg_ugnz3=$this->jg_2dm8k($jg_jcqd1['description']);
}
if($jg_vdpuv==''){$jg_vdpuv=$jg_ugnz3;}
}
$jg_2gby2='brand';
if(JG_5F3IS!=='true')
{
$jg_rdlvd=$jg_jcqd1['manufacturer'];
if($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0){} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk($jg_rdlvd)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_yleft==''){$jg_yleft=$this->jg_2dm8k($jg_rdlvd);}}
}
}
$jg_2gby2='condition';
if($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0){$jg_6p29q='';} else
{
if (($this->jg_2dm8k($jg_jcqd1['location'])=="used")||($this->jg_2dm8k($jg_jcqd1['location'])=="refurbished")){
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk($jg_jcqd1['location'])),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_6p29q==''){$jg_6p29q=$this->jg_2dm8k($jg_jcqd1['location']);}}
}
else
{
$condition='new';
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk($condition)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_6p29q==''){$jg_6p29q=$this->jg_2dm8k($condition);}}
}
}
$jg_2gby2='id';
if(JG_BQKIT!=='true')
{
if($this->jg_6ezgr($jg_jcqd1['name'],'id','',$jg_bjq7g,$jg_vlgoa) !== 0){} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy(strtoupper($jg_taido).$jg_jcqd1['product_id']),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_w9un1==''){$jg_w9un1=$this->jg_2dm8k(strtoupper($jg_taido).$jg_jcqd1['product_id']);}}
}
}
$jg_2gby2='image_link';
if($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0){} else
{
if ($jg_jcqd1['image']){
$jg_4o3t6=$jg_jcqd1['image'];
if(JG_9ZZ7V!=='true')
{
$jg_4o3t6=$this->jg_a4xop($this->model_tool_image->resize($jg_4o3t6, 500, 500));
}else{
$jg_4o3t6=$this->jg_a4xop(HTTP_IMAGE.$jg_4o3t6);
}
}else{
$jg_4o3t6='no_image.jpg';
if(JG_9ZZ7V!=='true')
{
$jg_4o3t6=$this->jg_a4xop($this->model_tool_image->resize($jg_4o3t6, 500, 500));
}else{
$jg_4o3t6=$this->jg_a4xop(HTTP_IMAGE.$jg_4o3t6);
}
}
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($jg_4o3t6),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_9qu7x==''){$jg_9qu7x=$this->jg_2dm8k($jg_4o3t6);}}
}
$jg_2gby2='additional_image_link';
if($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0){} else
{
$jg_hqcif=$this->jg_b6mqn($jg_jcqd1['product_id']);
$jg_9t10o=mysql_num_rows($jg_hqcif);
$jg_qgw35='';
if( $jg_9t10o>0 )
{
while($jg_fen1o=mysql_fetch_array($jg_hqcif))
{
if ($jg_fen1o['image']){
$jg_yr107=$jg_fen1o['image'];
if(JG_9ZZ7V!=='true')
{
$jg_yr107=$this->jg_a4xop($this->model_tool_image->resize($jg_yr107, 500, 500));
}else{
$jg_yr107=$this->jg_a4xop(HTTP_IMAGE.$jg_yr107);
}
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($jg_yr107),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_ct8bd==''){$jg_ct8bd=$this->jg_2dm8k($jg_yr107);}}
}else{
$jg_yr107='no_image.jpg';
if(JG_9ZZ7V!=='true')
{
$jg_yr107=$this->jg_a4xop($this->model_tool_image->resize($jg_yr107, 500, 500));
}else{
$jg_yr107=$this->jg_a4xop(HTTP_IMAGE.$jg_yr107);
}
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($jg_yr107),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_ct8bd==''){$jg_ct8bd=$this->jg_2dm8k($jg_yr107);}}
}
}
}
}
$jg_2gby2='mpn';
if(JG_6FUED!=='true')
{
if($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0){
} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($jg_jcqd1['model']),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_8cq31==''){$jg_8cq31=$this->jg_2dm8k($jg_jcqd1['model']);}}
}
}
if($this->jg_6ezgr($jg_jcqd1['name'],'price','',$jg_bjq7g,$jg_vlgoa) !== 0){} else
{
$currency=JG_CBAYZ;
$jg_n2lh4=$this->currency->format($this->tax->calculate($jg_jcqd1['price'], $jg_jcqd1['tax_class_id']), $currency, false, false);
$jg_jo9kx=$this->currency->format($this->tax->calculate($jg_jcqd1['special'], $jg_jcqd1['tax_class_id']), $currency, false, false);
$jg_h2kaf=$jg_n2lh4." ".$currency;
$jg_lkn8y=$jg_jo9kx." ".$currency;
if ((float)$jg_jcqd1['special']){
$jg_ysqct=$this->jg_sqpak($jg_jcqd1['product_id']);
$jg_k5109=$this->jg_o4m3j($jg_jcqd1['product_id']);
if(JG_R10GT==''){
$jg_97edg='T00:00';
}else{
$jg_97edg='T'.JG_R10GT;
}
$jg_rl8cv=$jg_97edg;
$jg_w7st5='';
if(JG_R10GT!==''){
$jg_w7st5=JG_JULC1;
}
if(($jg_w7st5=='')||($jg_w7st5=='00:00'))
{
$jg_w7st5='Z';
}
if(($jg_ysqct=='0000-00-00')||($jg_k5109=='0000-00-00'))
{
if (JG_HL9QO==JG_9K4E8){
$jg_vlgoa.='      <g:price>'.JG_8RTWL.$jg_lkn8y.JG_AF6XH.'</g:price>'."\r\n";
}else{
if (JG_HL9QO==JG_1D5ZP){if($jg_l52a1==''){$jg_l52a1=$jg_lkn8y;}}
}
}else{
if (JG_HL9QO==JG_9K4E8){
$jg_vlgoa.='      <g:price>'.JG_8RTWL.$jg_h2kaf.JG_AF6XH.'</g:price>'."\r\n";
$jg_vlgoa.='      <g:sale_price>'.JG_8RTWL.$jg_lkn8y.JG_AF6XH.'</g:sale_price>'."\r\n";
$jg_vlgoa.='      <g:sale_price_effective_date>'.JG_8RTWL.$jg_ysqct.$jg_97edg.$jg_w7st5.'/'.$jg_k5109.$jg_rl8cv.$jg_w7st5.JG_AF6XH.'</g:sale_price_effective_date>'."\r\n";
}else{
if (JG_HL9QO==JG_1D5ZP){if($jg_l52a1==''){$jg_l52a1=$jg_h2kaf;}}
if (JG_HL9QO==JG_1D5ZP){if($jg_w8xf5==''){$jg_w8xf5=$jg_lkn8y;}}
if (JG_HL9QO==JG_1D5ZP){if($jg_xhyix==''){$jg_xhyix=$jg_ysqct.$jg_97edg.$jg_w7st5.'/'.$jg_ysqct.$jg_97edg.$jg_w7st5;}}
}
}
}else{
if (JG_HL9QO==JG_9K4E8){
$jg_vlgoa.='      <g:price>'.JG_8RTWL.$jg_h2kaf.JG_AF6XH.'</g:price>'."\r\n";
}else{
if (JG_HL9QO==JG_1D5ZP){if($jg_l52a1==''){$jg_l52a1=$jg_h2kaf;}}
}
}
}
if($this->jg_6ezgr($jg_jcqd1['name'],'availability','',$jg_bjq7g,$jg_vlgoa) !== 0){} else
{
$jg_6t198=JG_HU106;
if ((int)$jg_jcqd1['quantity']>0)
{
$jg_6t198=JG_HU106;
}else{
$jg_6t198=JG_1SBF5;
}
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89('availability',$this->jg_yogsy($this->jg_fjpsk($jg_6t198)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_rd59v==''){$jg_rd59v=$jg_6t198;}}
}
if($this->jg_6ezgr($jg_jcqd1['name'],'quantity','',$jg_bjq7g,$jg_vlgoa) !== 0){} else
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa.='      <g:quantity>'.JG_8RTWL.$jg_jcqd1['quantity'].JG_AF6XH.'</g:quantity>'."\r\n";}
if (JG_HL9QO==JG_1D5ZP){if($jg_3fvt6==''){$jg_3fvt6=$jg_jcqd1['quantity'];}}
}
$jg_2gby2='gtin';
if(JG_QHSB3!=='true')
{
if($this->jg_6ezgr($jg_jcqd1['name'],$jg_2gby2,'',$jg_bjq7g,$jg_vlgoa) !== 0){} else
{
$this_attribute_value='';
switch (VERSION)
{
case (VERSION=='1.4.7'||VERSION=='1.4.8'||VERSION=='1.4.9'||VERSION=='1.4.9.1'||VERSION=='1.4.9.2'||VERSION=='1.4.9.3'||VERSION=='1.4.9.4'||VERSION=='1.4.9.5'||VERSION=='1.4.9.6'):
$this_attribute_value=$jg_jcqd1['sku'];
break;
case (VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'||VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$this_attribute_value=$jg_jcqd1['upc'];
break;
default:
break;
}
if ($this_attribute_value!="")
{
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk($this_attribute_value)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_10kg8==''){$jg_10kg8=$this_attribute_value;}}
}
}
}
$jg_2gby2='weight';
if(
($this->jg_6ezgr($jg_jcqd1['name'],'shipping_weight','',$jg_bjq7g,$jg_vlgoa) !== 0)||
($this->jg_6ezgr($jg_jcqd1['name'],'weight','',$jg_bjq7g,$jg_vlgoa) !== 0)
)
{} else
{
switch (VERSION)
{
case (VERSION=='1.4.7'||VERSION=='1.4.8'||VERSION=='1.4.9'||VERSION=='1.4.9.1'||VERSION=='1.4.9.2'||VERSION=='1.4.9.3'||VERSION=='1.4.9.4'||VERSION=='1.4.9.5'||VERSION=='1.4.9.6'||VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'):
$jg_rnusb=$this->weight->format($jg_jcqd1['weight'], $jg_jcqd1['weight_class']);
break;
case (VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$jg_rnusb=$this->weight->format($jg_jcqd1['weight'], $jg_jcqd1['weight_class_id']);
break;
default:
break;
}
if (JG_HL9QO==JG_9K4E8){$jg_vlgoa=$this->jg_cvj89($jg_2gby2,$this->jg_yogsy($this->jg_fjpsk($jg_rnusb)),$jg_vlgoa);}
if (JG_HL9QO==JG_1D5ZP){if($jg_xmml8==''){$jg_xmml8=$this->jg_2dm8k($jg_rnusb);}}
}
if (JG_HL9QO==JG_9K4E8){
$jg_vlgoa.='    </item>'."\r\n";
if ($jg_t6c9e==1){}else{
$jg_xxia8.=$jg_vlgoa;
}
}
if (JG_HL9QO==JG_1D5ZP)
{
if ($jg_t6c9e==1){}else{
for ($jg_jzmya=0; $jg_jzmya<count($jg_bjq7g); $jg_jzmya++)
{
$jg_hbypb=array(
'product_name' => $jg_bjq7g[$jg_jzmya]['product_name'],
'attribute_name' => $jg_bjq7g[$jg_jzmya]['attribute_name'],
'attribute_value' => $jg_bjq7g[$jg_jzmya]['attribute_value']
);
$jg_ku1jm[]=$jg_hbypb;
}
$jg_ku1jm=array_values($jg_ku1jm);
$jg_8i2dk[]=$this->jg_8xo8o($jg_gvst2,$jg_nlwx9,$jg_vdpuv,$jg_w9un1,$jg_6p29q,$jg_l52a1,$jg_w8xf5,$jg_xhyix,$jg_rd59v,$jg_3fvt6,$jg_9qu7x,$jg_ct8bd,$jg_10kg8,$jg_xmml8,$jg_8husc,$jg_6fwzr,$jg_yleft,$jg_8cq31,$jg_b210m,$jg_dqt3f,$jg_lopvp,$jg_nl3cm,$jg_oxxqx,$jg_d7cgm,$jg_bdp1p,$jg_qo6o6,$jg_bpcht,$jg_2lanm,$jg_epj10,$jg_hvy4p,$jg_pyr8l,$jg_9123m,$jg_fc27c,$jg_xglrw);
}
}
}
}
if (JG_HL9QO==JG_9K4E8){
$jg_xxia8.='  </channel>'."\r\n";
$jg_xxia8.='</rss>';
}
$this->response->addheader('Pragma: public');
$this->response->addheader('Expires: 0');
$this->response->addheader('Content-Transfer-Encoding: binary');
$opencart_root_directory_url=THIS_SERVER_URL;
if(IS_MIJOSHOP==1){$opencart_root_directory_url=THIS_SERVER_URL.'components/com_mijoshop/opencart/';}
if (JG_HL9QO==JG_1D5ZP)
{
$filename_suffix='';
$jg_9giuq=$this->config->get('config_store_id');
if($jg_9giuq==''){$jg_9giuq='0';}
$filename_suffix='-store-'.$jg_9giuq;
if ($jg_xj910==''){}else{$filename_suffix.='-page-'.$jg_xj910;}
$jg_rf4pm=JG_G53QB.'../feed-'.$jg_taido.$filename_suffix.'.txt';
if (JG_SB10G!=='true')
{
$jg_8i2dk=$this->jg_cqym1($jg_8i2dk,$jg_ku1jm);
}
$jg_hb10o=implode("\t", array_keys($jg_8i2dk[0]))."\r\n";
for ($jg_lvgmq=0; $jg_lvgmq<count($jg_8i2dk); $jg_lvgmq++)
{
$jg_oxvlp.=implode("\t", $jg_8i2dk[$jg_lvgmq])."\r\n";
}
$jg_oxvlp=$jg_hb10o.$jg_oxvlp;
$jg_51073='';
if (JG_9L13Y=='true')
{
$jg_9giuq=$this->config->get('config_store_id');
if($jg_9giuq==''){$jg_9giuq='0';}
$jg_51073='-store-'.$jg_9giuq;
if ($jg_xj910==''){}else{$jg_51073.='-page-'.$jg_xj910;}
$jg_rf4pm='feed-'.$jg_taido.$jg_51073.'.txt';
$jg_blq4g=fopen($jg_rf4pm, 'w') or die("can't open file");
$output_data='';
$output_data=$jg_oxvlp;
fwrite($jg_blq4g, $output_data);
fclose($jg_blq4g);
$jg_51073=$_['text_file_saved_successfully'].': <a href="'.$opencart_root_directory_url.'feed-'.$jg_taido.$jg_51073.'.txt'.'">'.$opencart_root_directory_url.'feed-'.$jg_taido.$jg_51073.'.txt'.'</a>.';
$jg_51073.='<br />'.$_['text_items_processed'].':  '.count($jg_8i2dk);
$jg_s3g19=microtime();
$jg_s3g19=explode(" ",$jg_s3g19);
$jg_s3g19=$jg_s3g19[1] + $jg_s3g19[0];
$jg_5abl5=$jg_s3g19;
$jg_3nkkg=($jg_5abl5 - $jg_5s5sb);
$jg_51073.='<br />'.$_['text_time_transpired'].':  '.$jg_3nkkg.' '.$_['text_seconds'];
$this->response->addHeader('Content-Type: text/html; charset=UTF-8');
$this->response->setOutput($jg_51073);
}
else
{
if (JG_ZQPA8=='true')
{
$this->response->addHeader('Content-Type: text/tab-separated-values; charset=UTF-8');
$this->response->addHeader('Content-Disposition: attachment; filename="feed-'.$jg_taido.$jg_51073.'.txt"');
}
else
{
$this->response->addHeader('Content-Type: text/html; charset=UTF-8');
$this->response->addHeader('Content-Disposition: inline; filename="feed-'.$jg_taido.$jg_51073.'.txt"');
}
$this->response->setOutput($jg_oxvlp);
}
}
if (JG_HL9QO==JG_9K4E8)
{
$jg_51073='';
$jg_9giuq=$this->config->get('config_store_id');
if($jg_9giuq==''){$jg_9giuq='0';}
$jg_51073='-store-'.$jg_9giuq;
if ($jg_xj910==''){}else{$jg_51073.='-page-'.$jg_xj910;}
$jg_rf4pm=JG_G53QB.'../feed-'.$jg_taido.$jg_51073.'.xml';
if(IS_MIJOSHOP==1){$jg_xxia8=str_replace('com_mijoshop&route', 'com_mijoshop&amp;route', $jg_xxia8);}
if (JG_9L13Y=='true')
{
$jg_blq4g=fopen($jg_rf4pm, 'w') or die("can't open file");
$output_data='';
$output_data=$jg_xxia8;
fwrite($jg_blq4g, $output_data);
fclose($jg_blq4g);
$jg_51073=$_['text_file_saved_successfully'].': <a href="'.$opencart_root_directory_url.'feed-'.$jg_taido.$jg_51073.'.xml'.'">'.$opencart_root_directory_url.'feed-'.$jg_taido.$jg_51073.'.xml'.'</a>.';
$jg_51073.='<br />'.$_['text_items_processed'].':  '.$jg_bp2l8;
$jg_s3g19=microtime();
$jg_s3g19=explode(" ",$jg_s3g19);
$jg_s3g19=$jg_s3g19[1] + $jg_s3g19[0];
$jg_5abl5=$jg_s3g19;
$jg_3nkkg=($jg_5abl5 - $jg_5s5sb);
$jg_51073.='<br />'.$_['text_time_transpired'].':  '.$jg_3nkkg.' '.$_['text_seconds'].'';
$this->response->addHeader('Content-Type: text/html; charset=UTF-8');
$this->response->setOutput($jg_51073);
}
else
{
$this->response->addHeader('Content-Type: application/rss+xml; charset=UTF-8');
if (JG_ZQPA8=='true')
{
$this->response->addHeader('Content-Disposition: attachment; filename="feed-'.$jg_taido.$jg_51073.'.xml"');
}
else
{
$this->response->addHeader('Content-Disposition: inline; filename="feed-'.$jg_taido.$jg_51073.'.xml"');
}
$this->response->setOutput($jg_xxia8);
}
}
}
}
}
function jg_sqpak($this_product_id)
{
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
if ($this->customer->isLogged()){
$customer_group_id=$this->customer->getCustomerGroupId();
}else{
$customer_group_id=$this->config->get('config_customer_group_id');
}
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."product_special WHERE ".DB_PREFIX."product_special.product_id='".$this_product_id."' AND ".DB_PREFIX."product_special.customer_group_id='".(int)$customer_group_id."' AND ((".DB_PREFIX."product_special.date_start='0000-00-00' OR ".DB_PREFIX."product_special.date_start<NOW()) AND (".DB_PREFIX."product_special.date_end='0000-00-00' OR ".DB_PREFIX."product_special.date_end>NOW())) ORDER BY ".DB_PREFIX."product_special.priority ASC, ".DB_PREFIX."product_special.price ASC LIMIT 1", $jg_zn49j) or die (mysql_error());
$jg_9t10o=mysql_num_rows($jg_l8tnn);
$jg_qgw35='';
if( $jg_9t10o>0 )
{
while($jg_fen1o=mysql_fetch_array($jg_l8tnn))
{
$jg_qgw35=$jg_fen1o["date_start"];
}
}
return $jg_qgw35;
}
function jg_o4m3j($this_product_id)
{
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
if ($this->customer->isLogged()){
$customer_group_id=$this->customer->getCustomerGroupId();
}else{
$customer_group_id=$this->config->get('config_customer_group_id');
}
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."product_special WHERE ".DB_PREFIX."product_special.product_id='".$this_product_id."' AND ".DB_PREFIX."product_special.customer_group_id='".(int)$customer_group_id."' AND ((".DB_PREFIX."product_special.date_start='0000-00-00' OR ".DB_PREFIX."product_special.date_start<NOW()) AND (".DB_PREFIX."product_special.date_end='0000-00-00' OR ".DB_PREFIX."product_special.date_end>NOW())) ORDER BY ".DB_PREFIX."product_special.priority ASC, ".DB_PREFIX."product_special.price ASC LIMIT 1", $jg_zn49j) or die (mysql_error());
$jg_9t10o=mysql_num_rows($jg_l8tnn);
$jg_qgw35='';
if( $jg_9t10o>0 )
{
while($jg_fen1o=mysql_fetch_array($jg_l8tnn))
{
$jg_qgw35=$jg_fen1o["date_end"];
}
}
return $jg_qgw35;
}
protected function jg_qgucb($this_product_id)
{
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."url_alias WHERE ".DB_PREFIX."url_alias.query='product_id=".$this_product_id."'", $jg_zn49j) or die (mysql_error());
$jg_9t10o=mysql_num_rows($jg_l8tnn);
$jg_qgw35='';
if( $jg_9t10o>0 )
{
while($jg_fen1o=mysql_fetch_array($jg_l8tnn))
{
$jg_qgw35=$jg_fen1o["keyword"];
}
}
return $jg_qgw35;
}
protected function jg_cse4yo()
{
$jg_yzbv6=$this->directory_language().$this->jg_in6ha($this->jg_7d3ql()).'/feed/'.JG_9TVQEW.'.php';
if (!file_exists($jg_yzbv6))
{
$jg_yzbv6=JG_G53QB.'language/'.$this->jg_in6ha($this->jg_7d3ql()).'/feed/'.JG_9TVQEW.'.php';
}
if (!file_exists($jg_yzbv6))
{
$jg_yzbv6=JG_G53QB.'language/english/feed/'.JG_9TVQEW.'.php';
}
return $jg_yzbv6;
}
protected function jg_cvj89($jg_8gq2t,$jg_1o8hj,$jg_vlgoa)
{
if (JG_SB10G!=='true')
{
$jg_pg6ju=false;
$jg_j10i2=0;
if ($jg_8gq2t !== "")
{
if($jg_8gq2t=='additional_image_link')
{
$jg_xwvxi='';
$jg_106ze=10;
$jg_1kmf8=explode(",",$jg_1o8hj);
for ($jg_4ekr8=0; $jg_4ekr8<count($jg_1kmf8); $jg_4ekr8++)
{
if($jg_4ekr8>=$jg_106ze)
{
break;
}
if($jg_4ekr8!==0)
{
$jg_xwvxi.="\r\n".'      <g:'.$jg_8gq2t.'>';
}
$jg_xwvxi.=$jg_1kmf8[$jg_4ekr8];
if(($jg_4ekr8!==count($jg_1kmf8)-1)&&($jg_4ekr8<($jg_106ze-1)))
{
$jg_xwvxi.='</g:'.$jg_8gq2t.'>';
}
}
$jg_1o8hj=$jg_xwvxi;
}
if(
($jg_8gq2t=='adwords_labels')||
($jg_8gq2t=='adwords_queryparam')||
($jg_8gq2t=='color')||
($jg_8gq2t=='excluded_destination')||
($jg_8gq2t=='material')||
($jg_8gq2t=='pattern')||
($jg_8gq2t=='size')
)
{
$jg_xwvxi='';
$jg_106ze=50;
$jg_1kmf8=explode(",",$jg_1o8hj);
for ($jg_4ekr8=0; $jg_4ekr8<count($jg_1kmf8); $jg_4ekr8++)
{
if($jg_4ekr8>=$jg_106ze)
{
break;
}
if($jg_4ekr8!==0)
{
$jg_xwvxi.="\r\n".'      <g:'.$jg_8gq2t .'>';
}
$jg_xwvxi.=JG_8RTWL.$jg_1kmf8[$jg_4ekr8].JG_AF6XH;
if(($jg_4ekr8!==count($jg_1kmf8)-1)&&($jg_4ekr8<($jg_106ze-1)))
{
$jg_xwvxi.='</g:'.$jg_8gq2t .'>';
}
}
$jg_1o8hj=$jg_xwvxi;
}
if($jg_8gq2t=='shipping')
{
$jg_xwvxi='';
$jg_1kmf8=explode(",",$jg_1o8hj);
for ($jg_4ekr8=0; $jg_4ekr8<count($jg_1kmf8); $jg_4ekr8++)
{
$jg_pn2bk=explode(":",$jg_1kmf8[$jg_4ekr8]);
for ($jg_8129m=0; $jg_8129m<count($jg_pn2bk); $jg_8129m++)
{
if(($jg_8129m==0)&&($jg_pn2bk[$jg_8129m]!=='')){$jg_xwvxi.="\r\n".'        <g:country>'.JG_8RTWL.$jg_pn2bk[$jg_8129m].JG_AF6XH.'</g:country>';}
if(($jg_8129m==1)&&($jg_pn2bk[$jg_8129m]!=='')){$jg_xwvxi.="\r\n".'        <g:region>'.JG_8RTWL.$jg_pn2bk[$jg_8129m].JG_AF6XH.'</g:region>';}
if(($jg_8129m==2)&&($jg_pn2bk[$jg_8129m]!=='')){$jg_xwvxi.="\r\n".'        <g:service>'.JG_8RTWL.$jg_pn2bk[$jg_8129m].JG_AF6XH.'</g:service>';}
if(($jg_8129m==3)&&($jg_pn2bk[$jg_8129m]!=='')){$jg_xwvxi.="\r\n".'        <g:price>'.JG_8RTWL.$jg_pn2bk[$jg_8129m].JG_AF6XH.'</g:price>';}
if(($jg_8129m==count($jg_pn2bk)-1)&&($jg_4ekr8!==count($jg_1kmf8)-1))
{
$jg_xwvxi.="\r\n".'      </g:'.$jg_8gq2t .'>';
$jg_xwvxi.="\r\n".'      <g:'.$jg_8gq2t .'>';
}
}
}
$jg_xwvxi.="\r\n      ";
$jg_1o8hj=$jg_xwvxi;
}
if($jg_8gq2t=='tax')
{
$jg_xwvxi='';
$jg_1kmf8=explode(",",$jg_1o8hj);
for ($jg_4ekr8=0; $jg_4ekr8<count($jg_1kmf8); $jg_4ekr8++)
{
$jg_pn2bk=explode(":",$jg_1kmf8[$jg_4ekr8]);
for ($jg_8129m=0; $jg_8129m<count($jg_pn2bk); $jg_8129m++)
{
if(($jg_8129m==0)&&($jg_pn2bk[$jg_8129m]!=='')){$jg_xwvxi.="\r\n".'        <g:country>'.JG_8RTWL.$jg_pn2bk[$jg_8129m].JG_AF6XH.'</g:country>';}
if(($jg_8129m==1)&&($jg_pn2bk[$jg_8129m]!=='')){$jg_xwvxi.="\r\n".'        <g:region>'.JG_8RTWL.$jg_pn2bk[$jg_8129m].JG_AF6XH.'</g:region>';}
if(($jg_8129m==2)&&($jg_pn2bk[$jg_8129m]!=='')){$jg_xwvxi.="\r\n".'        <g:rate>'.JG_8RTWL.$jg_pn2bk[$jg_8129m].JG_AF6XH.'</g:rate>';}
if(($jg_8129m==3)&&($jg_pn2bk[$jg_8129m]!=='')){$jg_xwvxi.="\r\n".'        <g:tax_ship>'.JG_8RTWL.$jg_pn2bk[$jg_8129m].JG_AF6XH.'</g:tax_ship>';}
if(($jg_8129m==count($jg_pn2bk)-1)&&($jg_4ekr8!==count($jg_1kmf8)-1))
{
$jg_xwvxi.="\r\n".'      </g:'.$jg_8gq2t .'>';
$jg_xwvxi.="\r\n".'      <g:'.$jg_8gq2t .'>';
}
}
}
$jg_xwvxi.="\r\n      ";
$jg_1o8hj=$jg_xwvxi;
}
if($this->jg_6ezgr('',$jg_8gq2t,$jg_1o8hj,'',$jg_vlgoa) !== 0)
{
if ($this->jg_t1012($jg_8gq2t)){
if ($this->jg_lg4bp('',$jg_8gq2t,$jg_1o8hj,'',$jg_vlgoa) !== 0){} else
{
if(strpos($jg_1o8hj,'CDATA')== false)
{
if(
($jg_8gq2t=='image_link')||
($jg_8gq2t=='additional_image_link')
)
{
}
else
{
$jg_1o8hj=JG_8RTWL.$jg_1o8hj.JG_AF6XH;
}
}
$jg_vlgoa.='      <g:'.$jg_8gq2t .'>'.$jg_1o8hj.'</g:'.$jg_8gq2t.'>'."\r\n";
}
}
}
else
{
if(strpos($jg_1o8hj,'CDATA')== false)
{
if(
($jg_8gq2t=='image_link')||
($jg_8gq2t=='additional_image_link')
)
{
}
else
{
$jg_1o8hj=JG_8RTWL.$jg_1o8hj.JG_AF6XH;
}
}
$jg_vlgoa.='      <g:'.$jg_8gq2t .'>'.$jg_1o8hj.'</g:'.$jg_8gq2t.'>'."\r\n";
}
}
}
return $jg_vlgoa;
}
function jg_b6mqn($this_product_id)
{
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn='';
switch (VERSION)
{
case (VERSION=='1.4.7'||VERSION=='1.4.8'||VERSION=='1.4.9'||VERSION=='1.4.9.1'||VERSION=='1.4.9.2'||VERSION=='1.4.9.3'||VERSION=='1.4.9.4'||VERSION=='1.4.9.5'||VERSION=='1.4.9.6'||VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'||VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'):
$jg_l8tnn=mysql_query("SELECT * FROM ".DB_PREFIX."product_image WHERE ".DB_PREFIX."product_image.product_id='".$this_product_id."' ORDER BY ".DB_PREFIX."product_image.image ASC, ".DB_PREFIX."product_image.image ASC LIMIT 10", $jg_zn49j) or die (mysql_error());
break;
case (VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$jg_l8tnn=mysql_query("SELECT * FROM ".DB_PREFIX."product_image WHERE ".DB_PREFIX."product_image.product_id='".$this_product_id."' ORDER BY ".DB_PREFIX."product_image.sort_order ASC, ".DB_PREFIX."product_image.image ASC LIMIT 10", $jg_zn49j) or die (mysql_error());
break;
default:
break;
}
return $jg_l8tnn;
}
protected function jg_t1012($jg_8gq2t)
{
require JG_O7GR6;
$jg_pg6ju=false;
if (
(strtolower($jg_8gq2t)=="color")||
(strtolower($jg_8gq2t)=="colour")
)
{$jg_pg6ju=true;}
if (
(strtolower($jg_8gq2t)=="material")
)
{$jg_pg6ju=true;}
if (
(strtolower($jg_8gq2t)=="pattern")
)
{$jg_pg6ju=true;}
if (
(strtolower($jg_8gq2t)=="size")
)
{$jg_pg6ju=true;}
if (
(strtolower($jg_8gq2t)=="additional_image_link")||
(strtolower($jg_8gq2t)=="additional image link")
)
{$jg_pg6ju=true;}
if (
(strtolower($jg_8gq2t)=="product_type")||
(strtolower($jg_8gq2t)=="product type")
)
{$jg_pg6ju=true;}
if (
(strtolower($jg_8gq2t)=="shipping")
)
{$jg_pg6ju=true;}
if (
(strtolower($jg_8gq2t)=="tax")
)
{$jg_pg6ju=true;}
if (
(strtolower($jg_8gq2t)=="excluded_destination")||
(strtolower($jg_8gq2t)=="excluded destination")
)
{$jg_pg6ju=true;}
return $jg_pg6ju;
}
protected function jg_1xqww($jg_8gq2t,$jg_1o8hj,$jg_vlgoa)
{
if (JG_SB10G!=='true')
{
if(($jg_1o8hj=="")||($this->jg_6ezgr('',$jg_8gq2t,$jg_1o8hj,'',$jg_vlgoa) !== 0)){} else
{
$jg_vlgoa.='      <g:'.$jg_8gq2t.'>'.$this->jg_yogsy($this->jg_fjpsk($jg_1o8hj)).'</g:'.$jg_8gq2t.'>'."\r\n";
}
}
return $jg_vlgoa;
}
protected function jg_xjyby($jg_8gq2t,$jg_u10h5)
{
$jg_u10h5.="\t".$jg_8gq2t;
return $jg_u10h5;
}
protected function jg_2dm8k($jg_51073)
{
$jg_51073=html_entity_decode($jg_51073, ENT_QUOTES, 'UTF-8');
$jg_51073=html_entity_decode($jg_51073, ENT_QUOTES, 'UTF-8');
$jg_51073=str_replace("\r", " ", $jg_51073);
$jg_51073=str_replace("\n", " ", $jg_51073);
$jg_51073=str_replace("\t", " ", $jg_51073);
return $jg_51073;
}
protected function jg_4akuu($jg_51073)
{
$jg_51073=htmlentities($jg_51073, ENT_COMPAT, 'UTF-8', false);
return $jg_51073;
}
protected function jg_fjpsk($jg_nfstb)
{
$jg_nfstb=str_replace("& ", "&amp; ", $jg_nfstb);
$jg_nfstb=str_replace("&-", "&amp;-", $jg_nfstb);
$jg_nfstb=str_replace("&_", "&amp;_", $jg_nfstb);
$jg_nfstb=str_replace("&.", "&amp;.", $jg_nfstb);
$jg_nfstb=str_replace("&;", "&amp;;", $jg_nfstb);
$jg_nfstb=str_replace("&,", "&amp;,", $jg_nfstb);
$jg_nfstb=str_replace("&amp;amp;", "&amp;", $jg_nfstb);
$jg_nfstb=str_replace("&amp;gt;", "&gt;", $jg_nfstb);
$jg_nfstb=str_replace("<", "&lt;", $jg_nfstb);
$jg_nfstb=str_replace(">", "&gt;", $jg_nfstb);
return $jg_nfstb;
}
protected function jg_yogsy($jg_nfstb)
{
if (JG_9GTNQ=='true')
{
$jg_nfstb=$this->jg_fjpsk($jg_nfstb);
$jg_j10nh=array(
'&nbsp;',chr(226).chr(128).chr(148),chr(226).chr(128).chr(152),'&lsquo;','&#8216;',
chr(226).chr(128).chr(153),'&rsquo;','&#8217;',chr(226).chr(128).chr(156),'&ldquo;',
'&#147;','&#8220;',chr(226).chr(128).chr(157),'&rdquo;','&#148;',
'&#8221;','&trade;','&#8482;','&#153;','',
'•','&reg;','&rdquo;'
);
$jg_9913k=array(
' ','-','\'','&amp;lsquo;','&amp;lsquo;',
'\'','&amp;rsquo;','\'','"','&amp;ldquo;',
'&amp;ldquo;','"','"','&amp;rdquo;','&amp;rdquo;',
'&amp;rdquo;','&amp;trade;','&amp;trade;','','',
'*','&amp;reg;','&amp;rdquo;'
);
$jg_nfstb=str_replace($jg_j10nh,$jg_9913k,$jg_nfstb);
$jg_j10nh=array(
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
$jg_9913k=array(
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
$jg_nfstb=str_replace($jg_j10nh,$jg_9913k,$jg_nfstb);
}
return $jg_nfstb;
}
protected function jg_wt5gm($jg_51073)
{
html_entity_decode($jg_51073, ENT_QUOTES, 'UTF-8');
return $jg_51073;
}
protected function jg_4dtrn($jg_tx8yt,$jg_10e3e)
{
$jg_2klpe=false;
$jg_k8ho6=trim($jg_tx8yt);
$jg_52b4l=trim($jg_10e3e);
if (JG_9GTNQ=='true')
{
$jg_k8ho6=$this->jg_yogsy($jg_k8ho6);
$jg_52b4l=$this->jg_yogsy($jg_52b4l);
}
$jg_k8ho6=$this->jg_2dm8k($jg_k8ho6);
$jg_52b4l=$this->jg_2dm8k($jg_52b4l);
if ($jg_k8ho6==$jg_52b4l)
{
$jg_2klpe=true;
}
return $jg_2klpe;
}
protected function jg_fpz4l($jg_104pp,$jg_p11yd)
{
if (file_exists($jg_104pp))
{
$jg_yhdli=new DOMDocument();
$jg_yhdli->load( $jg_104pp );
$jg_j5ht6=$jg_yhdli->getElementsByTagName( $jg_p11yd );
$jg_fo65f="";
foreach( $jg_j5ht6 as $jg_kvapr )
{
$jg_fo65f=$jg_j5ht6->item(0)->nodeValue;
break;
}
return $jg_fo65f;
}
}
protected function jg_gefqf($jg_zqrau)
{
if (file_exists($jg_zqrau))
{
$jg_yhdli=new DOMDocument();
$jg_yhdli->load( $jg_zqrau );
$jg_s85dx=$jg_yhdli->getElementsByTagName( "default_convert_non_compliant_characters" );
$jg_c1hmh="";
foreach( $jg_s85dx as $jg_wx64u )
{
$jg_c1hmh=$jg_s85dx->item(0)->nodeValue;
}
return $jg_c1hmh;
}
else
{
return "false";
}
}
protected function jg_aidwq($jg_d46f1)
{
if (file_exists($jg_d46f1))
{
$jg_yhdli=new DOMDocument();
$jg_yhdli->load( $jg_d46f1 );
$jg_rxpha=$jg_yhdli->getElementsByTagName( "data_feed_format" );
$jg_ejudi="";
foreach( $jg_rxpha as $this_data_feed_format )
{
$jg_ejudi=$jg_rxpha->item(0)->nodeValue;
}
if ($jg_ejudi=="")
{
$jg_ejudi="xml";
}
return $jg_ejudi;
}
else
{
return "false";
}
}
function value_exists_for_column($jg_s3zxz,$this_product_id)
{
$jg_51073='';
$jg_k2afr=DB_PREFIX."product";
$jg_burdw=0;
$jg_51073='';
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".$jg_k2afr." WHERE ".$jg_k2afr.".".$jg_s3zxz."!='' AND ".$jg_k2afr.".product_id='".$this_product_id."'", $jg_zn49j) or die (mysql_error());
while($jg_bfm43=mysql_fetch_array($jg_l8tnn))
{
$jg_51073=$jg_bfm43[$jg_s3zxz];
}
if($jg_51073!=='')
{
return 1;
}else{
return 0;
}
}
function jg_dkzxr()
{
$jg_zxw4f=DB_PREFIX."product";
$jg_burdw=0;
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn=mysql_query("SELECT * FROM ".$jg_zxw4f." WHERE ".$jg_zxw4f.".status='1'", $jg_zn49j) or die (mysql_error());
while($jg_c6uoj=mysql_fetch_array($jg_l8tnn))
{
$jg_burdw=$jg_burdw + 1;
}
return $jg_burdw;
}
function get_server_url()
{
$this_config_use_ssl='';
$this_server_url='';
$jg_k2afr=DB_PREFIX."setting";
$jg_burdw=0;
$this_config_use_ssl='';
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".$jg_k2afr." WHERE ".$jg_k2afr.".group='config' AND ".$jg_k2afr.".key='config_use_ssl'", $jg_zn49j) or die (mysql_error());
while($jg_bfm43=mysql_fetch_array($jg_l8tnn))
{
$this_config_use_ssl=$jg_bfm43["value"];
}
if($this_config_use_ssl=='1')
{
$this_server_url=HTTPS_SERVER;
}
else
{
$this_server_url=HTTP_SERVER;
}
return $this_server_url;
}
protected function jg_ug631()
{
$jg_gletv="";
$jg_51073='';
$jg_k2afr=DB_PREFIX."setting";
$jg_burdw=0;
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".$jg_k2afr." WHERE ".$jg_k2afr.".group='google_merchant_center_feed' AND ".$jg_k2afr.".key='opencart_admin_directory'", $jg_zn49j) or die (mysql_error());
while($jg_bfm43=mysql_fetch_array($jg_l8tnn))
{
$jg_51073=$jg_bfm43["value"];
}
if($jg_51073==''){$jg_gletv=DEFAULT_ADMIN_DIRECTORY_NAME;}else{
$jg_gletv=$jg_51073;
}
return $jg_gletv;
}
protected function directory_language()
{
$jg_gletv="";
$jg_51073='';
$jg_k2afr=DB_PREFIX."setting";
$jg_burdw=0;
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".$jg_k2afr." WHERE ".$jg_k2afr.".group='google_merchant_center_feed' AND ".$jg_k2afr.".key='opencart_admin_language_directory'", $jg_zn49j) or die (mysql_error());
while($jg_bfm43=mysql_fetch_array($jg_l8tnn))
{
$jg_51073=$jg_bfm43["value"];
}
if($jg_51073==''){$jg_gletv=DEFAULT_ADMIN_DIRECTORY_NAME;}else{
$jg_gletv=$jg_51073;
}
return $jg_gletv;
}
function jg_9t101($jg_taido)
{
$jg_635g2="USD";
switch ($jg_taido)
{
case ("au"):
$jg_635g2="AUD";
break;
case ("br"):
$jg_635g2="BRL";
break;
case ("ca"):
$jg_635g2="CAD";
break;
case ("cn"):
$jg_635g2="CNY";
break;
case ("cz"):
$jg_635g2="CZK";
break;
case ("fr"):
$jg_635g2="EUR";
break;
case ("de"):
$jg_635g2="EUR";
break;
case ("it"):
$jg_635g2="EUR";
break;
case ("jp"):
$jg_635g2="JPY";
break;
case ("nl"):
$jg_635g2="EUR";
break;
case ("es"):
$jg_635g2="EUR";
break;
case ("ch"):
$jg_635g2="CHF";
break;
case ("gb"):
$jg_635g2="GBP";
break;
case ("us"):
$jg_635g2="USD";
break;
default:
$jg_635g2="USD";
break;
}
return $jg_635g2;
}
function jg_zvx44($jg_y10ag)
{
$jg_kwrm1=$jg_y10ag / 1024;
if($jg_kwrm1<1024)
{
$jg_kwrm1=number_format($jg_kwrm1, 2);
$jg_kwrm1.='KB';
}
else
{
if($jg_kwrm1 / 1024<1024)
{
$jg_kwrm1=number_format($jg_kwrm1 / 1024, 2);
$jg_kwrm1.='MB';
}
else if ($jg_kwrm1 / 1024 / 1024<1024)
{
$jg_kwrm1=number_format($jg_kwrm1 / 1024 / 1024, 2);
$jg_kwrm1.='GB';
}
}
return $jg_kwrm1;
}
function jg_sf1po($jg_otske,$jg_wobja,$jg_8gq2t,$jg_1o8hj)
{
$jg_hbypb=array(
'field_opencart' => $jg_otske,
'field_value_opencart' => $jg_wobja,
'attribute_google' => $jg_8gq2t,
'attribute_value_google' => $jg_1o8hj
);
return $jg_hbypb;
}
function jg_8hbmt($jg_s3zxz, $jg_1vefg, $jg_we10p)
{
$jg_hbypb=array(
'column_name' => $jg_s3zxz,
'attribute_name' => $jg_1vefg,
'attribute_prefix' => $jg_we10p
);
return $jg_hbypb;
}
function jg_8xo8o($jg_mtjy9,$jg_95u91,$jg_2dy3v,$jg_9y7om,$jg_yx3nm,$jg_kizyf,$jg_pmpit,$jg_o9x3k,$jg_6t198,$jg_smvzr,$jg_c10wy,$jg_jybhm,$jg_lkovy,$jg_rnusb,$jg_4p641,$jg_c6oeg,$jg_d26ni,$jg_t3pbx,$jg_d2u9x,$jg_doqtf,$jg_ygph6,$jg_w9efu,$this_pattern,$jg_kwrm1,$jg_xzoak,$jg_1jq4g,$jg_j45q1,$jg_wtmrl,$jg_7uyeb,$jg_uypqo,$jg_gnxgz,$jg_lidts,$jg_4i5cd,$jg_pdl9n)
{
$jg_hbypb=array(
'title' => $jg_mtjy9,
'link' => $jg_95u91,
'description' => $jg_2dy3v,
'id' => $jg_9y7om,
'condition' => $jg_yx3nm,
'price' => $jg_kizyf,
'sale price' => $jg_pmpit,
'sale price effective date' => $jg_o9x3k,
'availability' => $jg_6t198,
'quantity' => $jg_smvzr,
'image link' => $jg_c10wy,
'additional image link' => $jg_jybhm,
'gtin' => $jg_lkovy,
'weight' => $jg_rnusb,
'shipping weight' => $jg_4p641,
'shipping' => $jg_c6oeg,
'brand' => $jg_d26ni,
'mpn' => $jg_t3pbx,
'google product category' => $jg_d2u9x,
'product type' => $jg_doqtf,
'color' => $jg_ygph6,
'material' => $jg_w9efu,
'pattern' => $this_pattern,
'size' => $jg_kwrm1,
'age group' => $jg_xzoak,
'gender' => $jg_1jq4g,
'item group id' => $jg_j45q1,
'tax' => $jg_wtmrl,
'excluded destination' => $jg_7uyeb,
'adwords grouping' => $jg_uypqo,
'adwords labels' => $jg_gnxgz,
'adwords publish' => $jg_lidts,
'adwords redirect' => $jg_4i5cd,
'adwords query param' => $jg_pdl9n
);
return $jg_hbypb;
}
function jg_vgd6p($jg_2rq8w,$jg_8gq2t,$jg_1o8hj,$jg_ku1jm,$jg_bjq7g,$jg_vlgoa)
{
$jg_hbypb=array();
if (JG_HL9QO==JG_1D5ZP)
{
$jg_8gq2t=str_replace("_"," ",$jg_8gq2t);
if ($jg_8gq2t !== "")
{
if (
($this->jg_6ezgr($jg_2rq8w,$jg_8gq2t,$jg_1o8hj,$jg_ku1jm,$jg_vlgoa)==1)
||
($this->jg_6ezgr($jg_2rq8w,$jg_8gq2t,$jg_1o8hj,$jg_bjq7g,$jg_vlgoa)==1)
)
{
if ($this->jg_t1012($jg_8gq2t)!==false)
{
if (
($this->jg_lg4bp($jg_2rq8w,$jg_8gq2t,$jg_1o8hj,$jg_ku1jm,$jg_vlgoa)==1)
||
($this->jg_lg4bp($jg_2rq8w,$jg_8gq2t,$jg_1o8hj,$jg_bjq7g,$jg_vlgoa)==1)
)
{
}
else
{
$jg_hbypb=array(
'product_name' => $jg_2rq8w,
'attribute_name' => $jg_8gq2t,
'attribute_value' => $jg_1o8hj
);
}
}
}
else
{
$jg_hbypb=array(
'product_name' => $jg_2rq8w,
'attribute_name' => $jg_8gq2t,
'attribute_value' => $jg_1o8hj
);
}
}
}
if(count($jg_hbypb)<=0)
{
return null;
}
else
{
return $jg_hbypb;
}
}
function jg_6ezgr($jg_2rq8w,$jg_8gq2t,$jg_1o8hj,$jg_2fhj4,$jg_vlgoa)
{
$jg_lft3s=0;
if (JG_HL9QO==JG_1D5ZP){
$jg_8gq2t=str_replace("_"," ",$jg_8gq2t);
$jg_2rq8w=$this->jg_2dm8k($jg_2rq8w);
$jg_bjq7g=array();
$jg_bjq7g=(array)$jg_2fhj4;
while (list ($key_main, $jg_o1sys)=each ($jg_bjq7g)){
$jg_6a5nl=array();
$jg_6a5nl=(array)$jg_o1sys;
$jg_b4zyi='';
$jg_7vtro='';
$jg_225a6='';
while (list ($jg_kp10n, $jg_wiz51)=each ($jg_6a5nl)){
switch ($jg_kp10n)
{
case ($jg_kp10n=='product_name'):
$jg_b4zyi=$jg_wiz51;
break;
case ($jg_kp10n=='attribute_name'):
$jg_7vtro=$jg_wiz51;
break;
case ($jg_kp10n=='attribute_value'):
$jg_225a6=$jg_wiz51;
break;
default:
break;
}
}
if($jg_2rq8w==$jg_b4zyi)
{
if(
($jg_8gq2t==$jg_7vtro)
)
{
return 1;
exit;
}
}
}
}
if (JG_HL9QO==JG_9K4E8){
$test_string=str_replace(JG_8RTWL,'',$jg_vlgoa);
$test_string=str_replace(JG_AF6XH,'',$test_string);
if ($jg_8gq2t=='price')
{
if (strpos($test_string, "\r\n".'      <g:'.$jg_8gq2t.'>')>-1)
{
return 1;
exit;
}
else
{
return 0;
exit;
}
}else{
if (strpos($test_string, '<g:'.$jg_8gq2t.'>')>-1)
{
return 1;
exit;
}
}
}
return 0;
}
function jg_lg4bp($jg_2rq8w,$jg_8gq2t,$jg_1o8hj,$jg_2fhj4,$jg_vlgoa)
{
if (JG_HL9QO==JG_1D5ZP){
$jg_2rq8w=$this->jg_2dm8k($jg_2rq8w);
$jg_bjq7g=array();
$jg_bjq7g=(array)$jg_2fhj4;
$jg_lft3s=0;
while (list ($key_main, $jg_o1sys)=each ($jg_bjq7g)){
$jg_6a5nl=array();
$jg_6a5nl=(array)$jg_o1sys;
$jg_b4zyi='';
$jg_7vtro='';
$jg_225a6='';
while (list ($jg_kp10n, $jg_wiz51)=each ($jg_6a5nl)){
switch ($jg_kp10n)
{
case ($jg_kp10n=='product_name'):
$jg_b4zyi=$jg_wiz51;
break;
case ($jg_kp10n=='attribute_name'):
$jg_7vtro=$jg_wiz51;
break;
case ($jg_kp10n=='attribute_value'):
$jg_225a6=$jg_wiz51;
break;
default:
break;
}
}
if($jg_2rq8w==$jg_b4zyi)
{
if(
($jg_8gq2t==$jg_7vtro)
&&
($jg_1o8hj==$jg_225a6)
)
{
return 1;
exit;
}
}
}
}
if (JG_HL9QO==JG_9K4E8){
if (strpos($jg_vlgoa, '      <g:'.$jg_8gq2t .'>'.$jg_1o8hj.'</g:'.$jg_8gq2t .'>') !== false)
{
return 1;
exit;
}
}
return 0;
}
function jg_cqym1($jg_8i2dk,$jg_ku1jm)
{
for ($jg_jzmya=0; $jg_jzmya<count($jg_ku1jm); $jg_jzmya++)
{
for ($jg_jhwrb=0; $jg_jhwrb<count($jg_8i2dk); $jg_jhwrb++)
{
$jg_v1lil=false;
if($jg_8i2dk[$jg_jhwrb]['title']==$jg_ku1jm[$jg_jzmya]['product_name'])
{
$jg_v1lil=true;
}
else
{
if (JG_Q9DHE=='true')
{
if(strlen($jg_8i2dk[$jg_jhwrb]['title'])>strlen($jg_ku1jm[$jg_jzmya]['product_name']))
{
if($jg_ku1jm[$jg_jzmya]['product_name']==substr($jg_8i2dk[$jg_jhwrb]['title'],0,strlen($jg_ku1jm[$jg_jzmya]['product_name'])))
{
$jg_v1lil=true;
}
}
}
}
if ($jg_v1lil!==false)
{
if ($this->jg_j88e4($jg_8i2dk,$jg_jhwrb,$jg_ku1jm[$jg_jzmya]['attribute_name'])===true)
{
$jg_o1ore='';
if ($jg_8i2dk[$jg_jhwrb][$jg_ku1jm[$jg_jzmya]['attribute_name']]!='')
{
$jg_o1ore=',';
}
$jg_8i2dk[$jg_jhwrb][$jg_ku1jm[$jg_jzmya]['attribute_name']].=$jg_o1ore.$jg_ku1jm[$jg_jzmya]['attribute_value'];
}
else
{
$jg_tcsk5=array($jg_ku1jm[$jg_jzmya]['attribute_name'] => $jg_ku1jm[$jg_jzmya]['attribute_value']);
$jg_8i2dk[$jg_jhwrb]=array_merge($jg_8i2dk[$jg_jhwrb],$jg_tcsk5);
}
}
else
{
if ($this->jg_j88e4($jg_8i2dk,$jg_jhwrb,$jg_ku1jm[$jg_jzmya]['attribute_name'])===true)
{
}
else
{
$jg_tcsk5=array($jg_ku1jm[$jg_jzmya]['attribute_name'] => '');
$jg_8i2dk[$jg_jhwrb]=array_merge($jg_8i2dk[$jg_jhwrb],$jg_tcsk5);
}
}
}
}
return $jg_8i2dk;
}
function jg_j88e4($jg_4mu92,$jg_lvgmq,$jg_7d5am)
{
$jg_lft3s=false;
foreach(array_keys($jg_4mu92[$jg_lvgmq]) as $jg_d5y7n)
{
if ($jg_7d5am==$jg_d5y7n)
{
$jg_lft3s=true;
break;
}
}
return $jg_lft3s;
}
function jg_xgbgy($jg_9giuq)
{
$jg_qgw35="";
if (($jg_9giuq=="0")||($jg_9giuq=="")||($jg_9giuq==null))
{
$jg_qgw35=HTTP_SERVER;
}
else
{
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."store") or die (mysql_error());
$jg_9t10o=mysql_num_rows($jg_l8tnn);
if( $jg_9t10o>0 )
{
while($jg_fen1o=mysql_fetch_array($jg_l8tnn))
{
if ($jg_9giuq==$jg_fen1o["store_id"])
{
$jg_qgw35=$jg_fen1o["url"];
}
}
}
}
return $jg_qgw35;
}
function jg_a4xop($jg_c10wy)
{
$jg_c10wy=str_replace($this->jg_xgbgy("0"), JG_PS9G7, $jg_c10wy);
return $jg_c10wy;
}
function jg_m2fy1()
{
$jg_51073='';
$jg_k2afr=DB_PREFIX."setting";
$jg_burdw=0;
$jg_51073='';
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".$jg_k2afr." WHERE ".$jg_k2afr.".group='config' AND ".$jg_k2afr.".key='config_seo_url'", $jg_zn49j) or die (mysql_error());
while($jg_bfm43=mysql_fetch_array($jg_l8tnn))
{
$jg_51073=$jg_bfm43["value"];
}
return $jg_51073;
}
function jg_z103n($jg_d410tc)
{
$jg_k2afr=DB_PREFIX."language";
$jg_51073='';
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn=mysql_query("SELECT * FROM ".$jg_k2afr) or die (mysql_error());
while($jg_bfm43=mysql_fetch_array($jg_l8tnn))
{
if($jg_d410tc==$jg_bfm43["code"]){$jg_51073=(int)$jg_bfm43["language_id"];}
}
if($jg_51073==''){$jg_51073=(int)$this->config->get('config_language_id');}
return $jg_51073;
}
function jg_mgvof($jg_d410tc)
{
$jg_k2afr=DB_PREFIX."language";
$jg_51073='';
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn=mysql_query("SELECT * FROM ".$jg_k2afr) or die (mysql_error());
while($jg_bfm43=mysql_fetch_array($jg_l8tnn))
{
if($jg_d410tc==$jg_bfm43["code"])
{
$jg_51073=$jg_d410tc;
}
}
if($jg_d410tc==''||$jg_d410tc=='default')
{
$jg_51073=$this->get_default_language_code($this->config->get('config_store_id'));
}
return $jg_51073;
}
function get_default_language_code($jg_9giuq)
{
$jg_51073='';
$jg_k2afr=DB_PREFIX."setting";
$jg_burdw=0;
$jg_51073='';
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')) {
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn='';
switch (VERSION)
{
case (VERSION=='1.4.7'||VERSION=='1.4.8'||VERSION=='1.4.9'||VERSION=='1.4.9.1'||VERSION=='1.4.9.2'||VERSION=='1.4.9.3'||VERSION=='1.4.9.4'||VERSION=='1.4.9.5'||VERSION=='1.4.9.6'):
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".$jg_k2afr." WHERE ".$jg_k2afr.".group='config' AND ".$jg_k2afr.".key='config_language'", $jg_zn49j) or die (mysql_error());
break;
case (VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'||VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".$jg_k2afr." WHERE ".$jg_k2afr.".group='config' AND ".$jg_k2afr.".key='config_language' AND ".$jg_k2afr.".store_id='".$jg_9giuq."'", $jg_zn49j) or die (mysql_error());
break;
default:
break;
}
while($jg_bfm43=mysql_fetch_array($jg_l8tnn))
{
$jg_51073=$jg_bfm43["value"];
}
return $jg_51073;
}
function jg_7d3ql()
{
$jg_51073='';
$jg_k2afr=DB_PREFIX."setting";
$jg_burdw=0;
$jg_51073='';
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".$jg_k2afr." WHERE ".$jg_k2afr.".group='config' AND ".$jg_k2afr.".key='config_admin_language'", $jg_zn49j) or die (mysql_error());
while($jg_bfm43=mysql_fetch_array($jg_l8tnn))
{
$jg_51073=$jg_bfm43["value"];
}
return $jg_51073;
}
function jg_in6ha($jg_d410tc)
{
$jg_51073='';
$jg_k2afr=DB_PREFIX."language";
$jg_burdw=0;
$jg_51073='';
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".$jg_k2afr." WHERE ".$jg_k2afr.".code='".$jg_d410tc."'", $jg_zn49j) or die (mysql_error());
while($jg_bfm43=mysql_fetch_array($jg_l8tnn))
{
$jg_51073=$jg_bfm43["directory"];
}
return $jg_51073;
}
function jg_6cr4sw($jg_mw3tb)
{
if (!file_exists($jg_mw3tb)){$this->jg_msvji1('false',JG_G53QB.'google.merchant.center.feed.default.remove.html.tags.from.product.descriptions.xml');}
$jg_yhdli=new DOMDocument();
$jg_yhdli->load( $jg_mw3tb );
$jg_ifea9=$jg_yhdli->getElementsByTagName( "default_remove_html_tags_from_product_descriptions" );
$jg_10nxez="";
foreach( $jg_ifea9 as $jg_b3ozn )
{
$jg_10nxez=$jg_ifea9->item(0)->nodeValue;
}
return $jg_10nxez;
}
function jg_umnks($xml_file_default_enclose_xml_data_feed_attributes_within_cdata_sections)
{
if (!file_exists($xml_file_default_enclose_xml_data_feed_attributes_within_cdata_sections)){$this->save_xml_default_enclose_xml_data_feed_attributes_within_cdata_sections('true',JG_G53QB.'google.merchant.center.feed.default.enclose.xml.data.feed.attributes.within.cdata.sections.xml');}
$jg_yhdli=new DOMDocument();
$jg_yhdli->load( $xml_file_default_enclose_xml_data_feed_attributes_within_cdata_sections );
$jg_ifea9=$jg_yhdli->getElementsByTagName( "default_surround_xml_data_feed_attributes_with_cdata_tags" );
$jg_10nxez="";
foreach( $jg_ifea9 as $jg_b3ozn )
{
$jg_10nxez=$jg_ifea9->item(0)->nodeValue;
}
return $jg_10nxez;
}
function load_xml_default_use_weight_for_shipping_weight($xml_file_default_use_weight_for_shipping_weight)
{
if (!file_exists($xml_file_default_use_weight_for_shipping_weight)){$this->save_xml_default_use_weight_for_shipping_weight('true',$xml_file_default_use_weight_for_shipping_weight);}
$jg_yhdli=new DOMDocument();
$jg_yhdli->load($xml_file_default_use_weight_for_shipping_weight);
$jg_ifea9=$jg_yhdli->getElementsByTagName("default_use_weight_for_shipping_weight");
$jg_10nxez="";
foreach($jg_ifea9 as $jg_b3ozn)
{
$jg_10nxez=$jg_ifea9->item(0)->nodeValue;
}
return $jg_10nxez;
}
function jg_i10lz($jg_ujcvzf)
{
if (!file_exists($jg_ujcvzf)){$this->jg_jdoht3('false',$jg_ujcvzf);}
$jg_yhdli=new DOMDocument();
$jg_yhdli->load( $jg_ujcvzf );
$jg_ifea9=$jg_yhdli->getElementsByTagName( "default_correct_lone_ampersands_in_product_names_and_descriptions" );
$jg_10nxez="";
foreach( $jg_ifea9 as $jg_b3ozn )
{
$jg_10nxez=$jg_ifea9->item(0)->nodeValue;
}
return $jg_10nxez;
}
function jg_sl10y($jg_skudp)
{
if (!file_exists($jg_skudp)){$this->jg_p4cf4('false',JG_G53QB.'google.merchant.center.feed.default.do.not.merge.custom.attribute.assignments.xml');}
$jg_yhdli=new DOMDocument();
$jg_yhdli->load( $jg_skudp );
$jg_ifea9=$jg_yhdli->getElementsByTagName( "default_do_not_merge_custom_attribute_assignments" );
$jg_10nxez="";
foreach( $jg_ifea9 as $jg_b3ozn )
{
$jg_10nxez=$jg_ifea9->item(0)->nodeValue;
}
return $jg_10nxez;
}
function jg_uu10dt($jg_ee103o)
{
if (!file_exists($jg_ee103o)){$this->jg_gk3eeq('false',$jg_ee103o);}
$jg_yhdli=new DOMDocument();
$jg_yhdli->load( $jg_ee103o );
$jg_ifea9=$jg_yhdli->getElementsByTagName( "default_shorten_product_descriptions_to_10000_characters_or_less" );
$jg_10nxez="";
foreach( $jg_ifea9 as $jg_b3ozn )
{
$jg_10nxez=$jg_ifea9->item(0)->nodeValue;
}
return $jg_10nxez;
}
function jg_gk3eeq($jg_51073,$jg_ee103o)
{
$jg_yhdli=new DOMDocument("1.0");
$jg_srks9=$jg_yhdli->createElement("default_shorten_product_descriptions_to_10000_characters_or_less");
$jg_yhdli->appendChild($jg_srks9);
$jg_p5j54=$jg_yhdli->createTextNode($jg_51073);
$jg_srks9->appendChild($jg_p5j54);
$jg_yhdli->save($jg_ee103o);
$this->jg_yfml4($jg_ee103o);
}
function jg_p4cf4($jg_51073,$jg_skudp)
{
$jg_yhdli=new DOMDocument("1.0");
$jg_srks9=$jg_yhdli->createElement("default_do_not_merge_custom_attribute_assignments");
$jg_yhdli->appendChild($jg_srks9);
$jg_p5j54=$jg_yhdli->createTextNode($jg_51073);
$jg_srks9->appendChild($jg_p5j54);
$jg_yhdli->save($jg_skudp);
$this->jg_yfml4($jg_skudp);
}
function jg_msvji1($jg_51073,$jg_mw3tb)
{
$jg_yhdli=new DOMDocument("1.0");
$jg_srks9=$jg_yhdli->createElement("default_remove_html_tags_from_product_descriptions");
$jg_yhdli->appendChild($jg_srks9);
$jg_p5j54=$jg_yhdli->createTextNode($jg_51073);
$jg_srks9->appendChild($jg_p5j54);
$jg_yhdli->save($jg_mw3tb);
$this->jg_yfml4($jg_mw3tb);
}
function save_xml_default_enclose_xml_data_feed_attributes_within_cdata_sections($jg_51073,$xml_file_default_enclose_xml_data_feed_attributes_within_cdata_sections)
{
$jg_yhdli=new DOMDocument("1.0");
$jg_srks9=$jg_yhdli->createElement("default_surround_xml_data_feed_attributes_with_cdata_tags");
$jg_yhdli->appendChild($jg_srks9);
$jg_p5j54=$jg_yhdli->createTextNode($jg_51073);
$jg_srks9->appendChild($jg_p5j54);
$jg_yhdli->save($xml_file_default_enclose_xml_data_feed_attributes_within_cdata_sections);
$this->jg_yfml4($xml_file_default_enclose_xml_data_feed_attributes_within_cdata_sections);
}
function save_xml_default_use_weight_for_shipping_weight($jg_51073,$xml_file_default_use_weight_for_shipping_weight)
{
$jg_yhdli=new DOMDocument("1.0");
$jg_srks9=$jg_yhdli->createElement("default_surround_xml_data_feed_attributes_with_cdata_tags");
$jg_yhdli->appendChild($jg_srks9);
$jg_p5j54=$jg_yhdli->createTextNode($jg_51073);
$jg_srks9->appendChild($jg_p5j54);
$jg_yhdli->save($xml_file_default_use_weight_for_shipping_weight);
$this->jg_yfml4($xml_file_default_use_weight_for_shipping_weight);
}
function jg_jdoht3($jg_51073,$jg_ujcvzf)
{
$jg_yhdli=new DOMDocument("1.0");
$jg_srks9=$jg_yhdli->createElement("default_correct_lone_ampersands_in_product_names_and_descriptions");
$jg_yhdli->appendChild($jg_srks9);
$jg_p5j54=$jg_yhdli->createTextNode($jg_51073);
$jg_srks9->appendChild($jg_p5j54);
$jg_yhdli->save($jg_ujcvzf);
$this->jg_yfml4($jg_ujcvzf);
}
function jg_yfml4($this_file)
{
require JG_O7GR6;
if (!file_exists($this_file))
{
echo "<table class=\"list\">";
echo "<tr>";
echo "<td>";
echo "Could not save file:&nbsp;&nbsp;".getcwd()."/".$this_file."<br />";
echo "Please adjust the directory permissions as described in Frequently Asked Questions # 9, or alternatively download and copy the default XML files from <a href=\"http://www.techsleuth.com/google-merchant-center-feed-for-opencart-files/xml.settings.default.v".$_['text_extension_version'].".zip\" target=\"_blank\">here</a> and copy them to the directory /admin.<br />";
echo "</td>";
echo "</tr>";
echo "</table>";
}
}
function jg_qhi88()
{
$jg_gletv="";
$jg_k2afr=DB_PREFIX."setting";
$jg_burdw=0;
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".$jg_k2afr." WHERE ".$jg_k2afr.".group='google_merchant_center_feed' AND ".$jg_k2afr.".key='password_protect_the_data_feed'", $jg_zn49j) or die (mysql_error());
while($jg_bfm43=mysql_fetch_array($jg_l8tnn))
{
$jg_gletv=$jg_bfm43["value"];
}
if($jg_gletv==''){$jg_gletv='false';}
return $jg_gletv;
}
function jg_m55kg()
{
$jg_gletv="";
$jg_k2afr=DB_PREFIX."setting";
$jg_burdw=0;
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".$jg_k2afr." WHERE ".$jg_k2afr.".group='google_merchant_center_feed' AND ".$jg_k2afr.".key='jg_rfcpqv'", $jg_zn49j) or die (mysql_error());
while($jg_bfm43=mysql_fetch_array($jg_l8tnn))
{
$jg_gletv=$jg_bfm43["value"];
}
return $jg_gletv;
}
function jg_6wxae()
{
$jg_gletv="";
$jg_k2afr=DB_PREFIX."setting";
$jg_burdw=0;
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_l8tnn=mysql_query("SELECT DISTINCT * FROM ".$jg_k2afr." WHERE ".$jg_k2afr.".group='google_merchant_center_feed' AND ".$jg_k2afr.".key='jg_wj2fzj'", $jg_zn49j) or die (mysql_error());
while($jg_bfm43=mysql_fetch_array($jg_l8tnn))
{
$jg_gletv=$jg_bfm43["value"];
}
return $jg_gletv;
}
private $weights=array();
function format_weight($value, $weight_class_id, $decimal_point='.', $thousand_point=',') {
$jg_burdw=0;
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
switch (VERSION)
{
case (VERSION=='1.4.7'||VERSION=='1.4.8'||VERSION=='1.4.9'||VERSION=='1.4.9.1'||VERSION=='1.4.9.2'||VERSION=='1.4.9.3'||VERSION=='1.4.9.4'||VERSION=='1.4.9.5'||VERSION=='1.4.9.6'||VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'):
$jg_l8tnn=mysql_query("SELECT * FROM ".DB_PREFIX."weight_class wc LEFT JOIN ".DB_PREFIX."weight_class_description wcd ON (wc.weight_class_id=wcd.weight_class_id) WHERE wcd.language_id='".(int)$this->config->get('config_language_id')."'");
while($jg_bfm43=mysql_fetch_array($jg_l8tnn))
{
$this->weights[$jg_bfm43['unit']]=array(
'weight_class_id' => $jg_bfm43['weight_class_id'],
'title'           => $jg_bfm43['title'],
'unit'            => $jg_bfm43['unit'],
'value'           => $jg_bfm43['value']
);
}
if (isset($this->weights[$weight_class_id])) {
return number_format($value, 2, $decimal_point, $thousand_point).' '.$this->weights[$weight_class_id]['unit'];
} else {
return number_format($value, 2, $decimal_point, $thousand_point);
}
break;
case (VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$jg_l8tnn=mysql_query("SELECT * FROM ".DB_PREFIX."weight_class wc LEFT JOIN ".DB_PREFIX."weight_class_description wcd ON (wc.weight_class_id=wcd.weight_class_id) WHERE wcd.language_id='".(int)JG_JRNGJ."'");
while($jg_bfm43=mysql_fetch_array($jg_l8tnn))
{
$this->weights[$jg_bfm43['weight_class_id']]=array(
'weight_class_id' => $jg_bfm43['weight_class_id'],
'title'           => $jg_bfm43['title'],
'unit'            => $jg_bfm43['unit'],
'value'           => $jg_bfm43['value']
);
}
if (isset($this->weights[$weight_class_id])) {
return number_format($value, 2, $decimal_point, $thousand_point).' '.$this->weights[$weight_class_id]['unit'];
} else {
return number_format($value, 2, $decimal_point, $thousand_point);
}
break;
default:
break;
}
}
function jg_l4l8q()
{
header('WWW-Authenticate: Basic realm="Private Data Feed"');
header('HTTP/1.0 401 Unauthorized');
print 'This page is protected.&nbsp;&nbsp;Please enter valid credentials to be granted access.';
exit;
}
protected function jg_mce4k($parent_id, $jg_diaix=''){
$jg_v10xj=$this->jg_b3102q($parent_id);
if ($jg_v10xj){
if (!$jg_diaix){
$jg_o14gk=$jg_v10xj['category_id'];
}else{
$jg_o14gk=$jg_v10xj['category_id'].'_'.$jg_diaix;
}
$jg_7b7cn=$this->jg_mce4k($jg_v10xj['parent_id'], $jg_o14gk);
if ($jg_7b7cn){
return $jg_7b7cn;
}else{
return $jg_o14gk;
}
}
}
protected function getProducts_Mijoshop($data=array()){
if ($this->customer->isLogged()) {
$customer_group_id=$this->customer->getCustomerGroupId();
} else {
$customer_group_id=$this->config->get('config_customer_group_id');
}
$cache=md5(http_build_query($data));
$jg_zvdmr=$this->cache->get('product.'.(int)JG_JRNGJ.'.'.(int)$this->config->get('config_store_id').'.'.(int)$customer_group_id.'.'.$cache);
if (!$jg_zvdmr) {
$sql="SELECT p.product_id, (SELECT AVG(rating) AS total FROM ".DB_PREFIX."review r1 WHERE r1.product_id=p.product_id AND r1.status='1' GROUP BY r1.product_id) AS rating FROM ".DB_PREFIX."product p LEFT JOIN ".DB_PREFIX."product_description pd ON (p.product_id=pd.product_id) LEFT JOIN ".DB_PREFIX."product_to_store p2s ON (p.product_id=p2s.product_id)";
if (!empty($data['filter_category_id'])) {
$sql.=" LEFT JOIN ".DB_PREFIX."product_to_category p2c ON (p.product_id=p2c.product_id)";
}
$sql.=" WHERE pd.language_id='".(int)JG_JRNGJ."' AND p.status='1' AND p.date_available<=NOW() AND p2s.store_id='".(int)$this->config->get('config_store_id')."'";
if (!empty($data['filter_name'])||!empty($data['filter_tag'])) {
$sql.=" AND (";
if (!empty($data['filter_name'])) {
if (!empty($data['filter_description'])) {
$sql.="LCASE(pd.name) LIKE '%".$this->db->escape(utf8_strtolower($data['filter_name']))."%' OR MATCH(pd.description) AGAINST('".$this->db->escape(utf8_strtolower($data['filter_name']))."')";
} else {
$sql.="LCASE(pd.name) LIKE '%".$this->db->escape(utf8_strtolower($data['filter_name']))."%'";
}
}
if (!empty($data['filter_name'])&&!empty($data['filter_tag'])) {
$sql.=" OR ";
}
if (!empty($data['filter_tag'])) {
$sql.="MATCH(pd.tag) AGAINST('".$this->db->escape(utf8_strtolower($data['filter_tag']))."')";
}
$sql.=")";
if (!empty($data['filter_name'])) {
$sql.=" OR LCASE(p.model)='".$this->db->escape(utf8_strtolower($data['filter_name']))."'";
}
if (!empty($data['filter_name'])) {
$sql.=" OR LCASE(p.sku)='".$this->db->escape(utf8_strtolower($data['filter_name']))."'";
}
if (!empty($data['filter_name'])) {
$sql.=" OR LCASE(p.upc)='".$this->db->escape(utf8_strtolower($data['filter_name']))."'";
}
if (!empty($data['filter_name'])) {
$sql.=" OR LCASE(p.ean)='".$this->db->escape(utf8_strtolower($data['filter_name']))."'";
}
if (!empty($data['filter_name'])) {
$sql.=" OR LCASE(p.jan)='".$this->db->escape(utf8_strtolower($data['filter_name']))."'";
}
if (!empty($data['filter_name'])) {
$sql.=" OR LCASE(p.isbn)='".$this->db->escape(utf8_strtolower($data['filter_name']))."'";
}
if (!empty($data['filter_name'])) {
$sql.=" OR LCASE(p.mpn)='".$this->db->escape(utf8_strtolower($data['filter_name']))."'";
}
}
if (!empty($data['filter_category_id'])) {
if (!empty($data['filter_sub_category'])) {
$jg_f9lyu=array();
$jg_f9lyu[]=(int)$data['filter_category_id'];
$this->load->model('catalog/category');
$categories=$this->model_catalog_category->jg_gs4k9($data['filter_category_id']);
foreach ($categories as $category_id) {
$jg_f9lyu[]=(int)$category_id;
}
$sql.=" AND p2c.category_id IN (".implode(', ', $jg_f9lyu).")";
} else {
$sql.=" AND p2c.category_id='".(int)$data['filter_category_id']."'";
}
}
if (!empty($data['filter_manufacturer_id'])) {
$sql.=" AND p.manufacturer_id='".(int)$data['filter_manufacturer_id']."'";
}
$sql.=" GROUP BY p.product_id";
$jg_6ytud=array(
'pd.name',
'p.model',
'p.quantity',
'p.price',
'rating',
'p.sort_order',
'p.date_added'
);
if (isset($data['sort'])&&in_array($data['sort'], $jg_6ytud)) {
if ($data['sort']=='pd.name'||$data['sort']=='p.model') {
$sql.=" ORDER BY LCASE(".$data['sort'].")";
} else {
$sql.=" ORDER BY ".$data['sort'];
}
} else {
$sql.=" ORDER BY p.sort_order";
}
if (isset($data['order'])&&($data['order']=='DESC')) {
$sql.=" DESC, LCASE(pd.name) DESC";
} else {
$sql.=" ASC, LCASE(pd.name) ASC";
}
if (isset($data['start'])||isset($data['limit'])) {
if ($data['start']<0) {
$data['start']=0;
}
if ($data['limit']<1) {
$data['limit']=20;
}
$sql.=" LIMIT ".(int)$data['start'].",".(int)$data['limit'];
}
$jg_zvdmr=array();
$query=$this->db->query($sql);
foreach ($query->rows as $result) {
$jg_zvdmr[$result['product_id']]=$this->getProduct_Mijoshop($result['product_id']);
}
$this->cache->set('product.1.'.(int)$this->config->get('config_store_id').'.'.(int)$customer_group_id.'.'.$cache, $jg_zvdmr);
}
return $jg_zvdmr;
}
public function getProduct_Mijoshop($product_id) {
if ($this->customer->isLogged()) {
$customer_group_id=$this->customer->getCustomerGroupId();
} else {
$customer_group_id=$this->config->get('config_customer_group_id');
}
$query=$this->db->query("SELECT DISTINCT *, pd.name AS name, p.image, m.name AS manufacturer, (SELECT price FROM ".DB_PREFIX."product_discount pd2 WHERE pd2.product_id=p.product_id AND pd2.customer_group_id='".(int)$customer_group_id."' AND pd2.quantity='1' AND ((pd2.date_start='0000-00-00' OR pd2.date_start<NOW()) AND (pd2.date_end='0000-00-00' OR pd2.date_end>NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM ".DB_PREFIX."product_special ps WHERE ps.product_id=p.product_id AND ps.customer_group_id='".(int)$customer_group_id."' AND ((ps.date_start='0000-00-00' OR ps.date_start<NOW()) AND (ps.date_end='0000-00-00' OR ps.date_end>NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special, (SELECT points FROM ".DB_PREFIX."product_reward pr WHERE pr.product_id=p.product_id AND customer_group_id='".(int)$customer_group_id."') AS reward, (SELECT ss.name FROM ".DB_PREFIX."stock_status ss WHERE ss.stock_status_id=p.stock_status_id AND ss.language_id='".(int)JG_JRNGJ."') AS stock_status, (SELECT wcd.unit FROM ".DB_PREFIX."weight_class_description wcd WHERE p.weight_class_id=wcd.weight_class_id AND wcd.language_id='".(int)JG_JRNGJ."') AS weight_class, (SELECT lcd.unit FROM ".DB_PREFIX."length_class_description lcd WHERE p.length_class_id=lcd.length_class_id AND lcd.language_id='".(int)JG_JRNGJ."') AS length_class, (SELECT AVG(rating) AS total FROM ".DB_PREFIX."review r1 WHERE r1.product_id=p.product_id AND r1.status='1' GROUP BY r1.product_id) AS rating, (SELECT COUNT(*) AS total FROM ".DB_PREFIX."review r2 WHERE r2.product_id=p.product_id AND r2.status='1' GROUP BY r2.product_id) AS reviews, p.sort_order FROM ".DB_PREFIX."product p LEFT JOIN ".DB_PREFIX."product_description pd ON (p.product_id=pd.product_id) LEFT JOIN ".DB_PREFIX."product_to_store p2s ON (p.product_id=p2s.product_id) LEFT JOIN ".DB_PREFIX."manufacturer m ON (p.manufacturer_id=m.manufacturer_id) WHERE p.product_id='".(int)$product_id."' AND pd.language_id='1' AND p.status='1' AND p.date_available<=NOW() AND p2s.store_id='".(int)$this->config->get('config_store_id')."'");
if ($query->num_rows) {
return array(
'product_id'       => $query->row['product_id'],
'name'             => $query->row['name'],
'description'      => $query->row['description'],
'meta_description' => $query->row['meta_description'],
'meta_keyword'     => $query->row['meta_keyword'],
'tag'              => $query->row['tag'],
'model'            => $query->row['model'],
'sku'              => $query->row['sku'],
'upc'              => $query->row['upc'],
'ean'              => $query->row['ean'],
'jan'              => $query->row['jan'],
'isbn'             => $query->row['isbn'],
'mpn'              => $query->row['mpn'],
'location'         => $query->row['location'],
'quantity'         => $query->row['quantity'],
'stock_status'     => $query->row['stock_status'],
'image'            => $query->row['image'],
'manufacturer_id'  => $query->row['manufacturer_id'],
'manufacturer'     => $query->row['manufacturer'],
'price'            => ($query->row['discount'] ? $query->row['discount'] : $query->row['price']),
'special'          => $query->row['special'],
'reward'           => $query->row['reward'],
'points'           => $query->row['points'],
'tax_class_id'     => $query->row['tax_class_id'],
'date_available'   => $query->row['date_available'],
'weight'           => $query->row['weight'],
'weight_class_id'  => $query->row['weight_class_id'],
'length'           => $query->row['length'],
'width'            => $query->row['width'],
'height'           => $query->row['height'],
'length_class_id'  => $query->row['length_class_id'],
'subtract'         => $query->row['subtract'],
'rating'           => round($query->row['rating']),
'reviews'          => $query->row['reviews'],
'minimum'          => $query->row['minimum'],
'sort_order'       => $query->row['sort_order'],
'status'           => $query->row['status'],
'date_added'       => $query->row['date_added'],
'date_modified'    => $query->row['date_modified'],
'viewed'           => $query->row['viewed']
);
echo 'done reading product information successfully<br/>';
} else {
echo 'done reading product information unsuccessfully<br/>';
return false;
}
}
protected function jg_pyz74($data=array()){
if ($this->customer->isLogged()){
$customer_group_id=$this->customer->getCustomerGroupId();
}else{
$customer_group_id=$this->config->get('config_customer_group_id');
}
$cache=md5(http_build_query($data));
$jg_zvdmr=$this->cache->get('product.'.(int)JG_JRNGJ.'.'.(int)$this->config->get('config_store_id').'.'.(int)$customer_group_id.'.'.$cache);
if (!$jg_zvdmr){
$sql="SELECT p.product_id, (SELECT AVG(rating) AS total FROM ".DB_PREFIX."review r1 WHERE r1.product_id=p.product_id AND r1.status='1' GROUP BY r1.product_id) AS rating FROM ".DB_PREFIX."product p LEFT JOIN ".DB_PREFIX."product_description pd ON (p.product_id=pd.product_id) LEFT JOIN ".DB_PREFIX."product_to_store p2s ON (p.product_id=p2s.product_id)";
if (!empty($data['filter_tag'])){
$sql.=" LEFT JOIN ".DB_PREFIX."product_tag pt ON (p.product_id=pt.product_id)";
}
if (!empty($data['filter_category_id'])){
$sql.=" LEFT JOIN ".DB_PREFIX."product_to_category p2c ON (p.product_id=p2c.product_id)";
}
$sql.=" WHERE pd.language_id='".(int)JG_JRNGJ."' AND p.status='1' AND p.date_available<=NOW() AND p2s.store_id='".(int)$this->config->get('config_store_id')."'";
if (!empty($data['filter_name'])||!empty($data['filter_tag'])){
$sql.=" AND (";
if (!empty($data['filter_name'])){
$implode=array();
$words=explode(' ', $data['filter_name']);
foreach ($words as $word){
if (!empty($data['filter_description'])){
$implode[]="LCASE(pd.name) LIKE '%".$this->db->escape(utf8_strtolower($word))."%' OR LCASE(pd.description) LIKE '%".$this->db->escape(utf8_strtolower($word))."%'";
}else{
$implode[]="LCASE(pd.name) LIKE '%".$this->db->escape(utf8_strtolower($word))."%'";
}
}
if ($implode){
$sql.=" ".implode(" OR ", $implode)."";
}
}
if (!empty($data['filter_name'])&&!empty($data['filter_tag'])){
$sql.=" OR ";
}
if (!empty($data['filter_tag'])){
$implode=array();
$words=explode(' ', $data['filter_tag']);
foreach ($words as $word){
$implode[]="LCASE(pt.tag) LIKE '%".$this->db->escape(utf8_strtolower($data['filter_tag']))."%' AND pt.language_id='".(int)JG_JRNGJ."'";
}
if ($implode){
$sql.=" ".implode(" OR ", $implode)."";
}
}
$sql.=")";
}
if (!empty($data['filter_category_id'])){
if (!empty($data['filter_sub_category'])){
$jg_f9lyu=array();
$jg_f9lyu[]="p2c.category_id='".(int)$data['filter_category_id']."'";
$this->load->model('catalog/category');
$categories=$this->jg_gs4k9($data['filter_category_id']);
foreach ($categories as $category_id){
$jg_f9lyu[]="p2c.category_id='".(int)$category_id."'";
}
$sql.=" AND (".implode(' OR ', $jg_f9lyu).")";
}else{
$sql.=" AND p2c.category_id='".(int)$data['filter_category_id']."'";
}
}
if (!empty($data['filter_manufacturer_id'])){
$sql.=" AND p.manufacturer_id='".(int)$data['filter_manufacturer_id']."'";
}
$sql.=" GROUP BY p.product_id";
$jg_6ytud="";
switch (VERSION)
{
case (VERSION=='1.4.7'||VERSION=='1.4.8'||VERSION=='1.4.9'||VERSION=='1.4.9.1'||VERSION=='1.4.9.2'||VERSION=='1.4.9.3'||VERSION=='1.4.9.4'||VERSION=='1.4.9.5'||VERSION=='1.4.9.6'||VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'):
$jg_6ytud=array(
'pd.name',
'p.model',
'p.quantity',
'p.price',
'rating',
'p.date_added'
);
if (isset($data['sort'])&&in_array($data['sort'], $jg_6ytud)){
if ($data['sort']=='pd.name'||$data['sort']=='p.model'){
$sql.=" ORDER BY LCASE(".$data['sort'].")";
}else{
$sql.=" ORDER BY ".$data['sort'];
}
}else{
}
break;
case (VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$jg_6ytud=array(
'pd.name',
'p.model',
'p.quantity',
'p.price',
'rating',
'p.sort_order',
'p.date_added'
);
if (isset($data['sort'])&&in_array($data['sort'], $jg_6ytud)){
if ($data['sort']=='pd.name'||$data['sort']=='p.model'){
$sql.=" ORDER BY LCASE(".$data['sort'].")";
}else{
$sql.=" ORDER BY ".$data['sort'];
}
}else{
$sql.=" ORDER BY p.sort_order";
}
break;
default:
break;
}
if (isset($data['order'])&&($data['order']=='DESC')){
$sql.=" DESC";
}else{
$sql.=" ASC";
}
if (isset($data['start'])||isset($data['limit'])){
if ($data['start']<0){
$data['start']=0;
}
if ($data['limit']<1){
$data['limit']=20;
}
$sql.=" LIMIT ".(int)$data['start'].",".(int)$data['limit'];
}
$jg_zvdmr=array();
$query=$this->db->query($sql);
foreach ($query->rows as $result){
$jg_zvdmr[$result['product_id']]=$this->jg_u185x($result['product_id']);
}
$this->cache->set('product.'.(int)JG_JRNGJ.'.'.(int)$this->config->get('config_store_id').'.'.(int)$customer_group_id.'.'.$cache, $jg_zvdmr);
}
return $jg_zvdmr;
}
protected function jg_u185x($product_id){
if ($this->customer->isLogged()){
$customer_group_id=$this->customer->getCustomerGroupId();
}else{
$customer_group_id=$this->config->get('config_customer_group_id');
}
$query="";
switch (VERSION)
{
case (VERSION=='1.4.7'||VERSION=='1.4.8'||VERSION=='1.4.9'||VERSION=='1.4.9.1'||VERSION=='1.4.9.2'||VERSION=='1.4.9.3'||VERSION=='1.4.9.4'||VERSION=='1.4.9.5'||VERSION=='1.4.9.6'||VERSION=='1.5.0'||VERSION=='1.5.0.1'||VERSION=='1.5.0.2'||VERSION=='1.5.0.3'||VERSION=='1.5.0.4'||VERSION=='1.5.0.5'):
$query=$this->db->query("SELECT DISTINCT *, pd.name AS name, p.image, m.name AS manufacturer, (SELECT price FROM ".DB_PREFIX."product_discount pd2 WHERE pd2.product_id=p.product_id AND pd2.customer_group_id='".(int)$customer_group_id."' AND pd2.quantity='1' AND ((pd2.date_start='0000-00-00' OR pd2.date_start<NOW()) AND (pd2.date_end='0000-00-00' OR pd2.date_end>NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM ".DB_PREFIX."product_special ps WHERE ps.product_id=p.product_id AND ps.customer_group_id='".(int)$customer_group_id."' AND ((ps.date_start='0000-00-00' OR ps.date_start<NOW()) AND (ps.date_end='0000-00-00' OR ps.date_end>NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special, (SELECT ss.name FROM ".DB_PREFIX."stock_status ss WHERE ss.stock_status_id=p.stock_status_id AND ss.language_id='".(int)JG_JRNGJ."') AS stock_status, (SELECT wcd.unit FROM ".DB_PREFIX."weight_class_description wcd WHERE p.weight_class_id=wcd.weight_class_id AND wcd.language_id='".(int)JG_JRNGJ."') AS weight_class, (SELECT lcd.unit FROM ".DB_PREFIX."length_class_description lcd WHERE p.length_class_id=lcd.length_class_id AND lcd.language_id='".(int)JG_JRNGJ."') AS length_class, (SELECT AVG(rating) AS total FROM ".DB_PREFIX."review r1 WHERE r1.product_id=p.product_id AND r1.status='1' GROUP BY r1.product_id) AS rating, (SELECT COUNT(*) AS total FROM ".DB_PREFIX."review r2 WHERE r2.product_id=p.product_id AND r2.status='1' GROUP BY r2.product_id) AS reviews FROM ".DB_PREFIX."product p LEFT JOIN ".DB_PREFIX."product_description pd ON (p.product_id=pd.product_id) LEFT JOIN ".DB_PREFIX."product_to_store p2s ON (p.product_id=p2s.product_id) LEFT JOIN ".DB_PREFIX."manufacturer m ON (p.manufacturer_id=m.manufacturer_id) WHERE p.product_id='".(int)$product_id."' AND pd.language_id='".(int)JG_JRNGJ."' AND p.status='1' AND p.date_available<=NOW() AND p2s.store_id='".(int)$this->config->get('config_store_id')."'");
break;
case (VERSION=='1.5.1'||VERSION=='1.5.1.1'||VERSION=='1.5.1.2'||VERSION=='1.5.1.3'||VERSION=='1.5.2'||VERSION=='1.5.2.1'||VERSION=='1.5.3'||VERSION=='1.5.3.1'||VERSION=='1.5.4'||VERSION=='1.5.4.1'||VERSION=='1.5.5'||VERSION=='1.5.5.1'||VERSION=='1.5.6'||VERSION=='1.5.6.1'||VERSION=='1.5.6.2'||VERSION=='1.5.6.3'||VERSION=='1.5.6.4'):
$query=$this->db->query("SELECT DISTINCT *, pd.name AS name, p.image, m.name AS manufacturer, (SELECT price FROM ".DB_PREFIX."product_discount pd2 WHERE pd2.product_id=p.product_id AND pd2.customer_group_id='".(int)$customer_group_id."' AND pd2.quantity='1' AND ((pd2.date_start='0000-00-00' OR pd2.date_start<NOW()) AND (pd2.date_end='0000-00-00' OR pd2.date_end>NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM ".DB_PREFIX."product_special ps WHERE ps.product_id=p.product_id AND ps.customer_group_id='".(int)$customer_group_id."' AND ((ps.date_start='0000-00-00' OR ps.date_start<NOW()) AND (ps.date_end='0000-00-00' OR ps.date_end>NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special, (SELECT points FROM ".DB_PREFIX."product_reward pr WHERE pr.product_id=p.product_id AND customer_group_id='".(int)$customer_group_id."') AS reward, (SELECT ss.name FROM ".DB_PREFIX."stock_status ss WHERE ss.stock_status_id=p.stock_status_id AND ss.language_id='".(int)JG_JRNGJ."') AS stock_status, (SELECT wcd.unit FROM ".DB_PREFIX."weight_class_description wcd WHERE p.weight_class_id=wcd.weight_class_id AND wcd.language_id='".(int)JG_JRNGJ."') AS weight_class, (SELECT lcd.unit FROM ".DB_PREFIX."length_class_description lcd WHERE p.length_class_id=lcd.length_class_id AND lcd.language_id='".(int)JG_JRNGJ."') AS length_class, (SELECT AVG(rating) AS total FROM ".DB_PREFIX."review r1 WHERE r1.product_id=p.product_id AND r1.status='1' GROUP BY r1.product_id) AS rating, (SELECT COUNT(*) AS total FROM ".DB_PREFIX."review r2 WHERE r2.product_id=p.product_id AND r2.status='1' GROUP BY r2.product_id) AS reviews, p.sort_order FROM ".DB_PREFIX."product p LEFT JOIN ".DB_PREFIX."product_description pd ON (p.product_id=pd.product_id) LEFT JOIN ".DB_PREFIX."product_to_store p2s ON (p.product_id=p2s.product_id) LEFT JOIN ".DB_PREFIX."manufacturer m ON (p.manufacturer_id=m.manufacturer_id) WHERE p.product_id='".(int)$product_id."' AND pd.language_id='".(int)JG_JRNGJ."' AND p.status='1' AND p.date_available<=NOW() AND p2s.store_id='".(int)$this->config->get('config_store_id')."'");
break;
default:
break;
}
if ($query->num_rows){
$query->row['price']=($query->row['discount'] ? $query->row['discount'] : $query->row['price']);
$query->row['rating']=(int)$query->row['rating'];
return $query->row;
}else{
return false;
}
}
function jg_cih6w($product_id){
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_77auz=array();
$jg_va24g=mysql_query("SELECT ag.attribute_group_id, agd.name FROM ".DB_PREFIX."product_attribute pa LEFT JOIN ".DB_PREFIX."attribute a ON (pa.attribute_id=a.attribute_id) LEFT JOIN ".DB_PREFIX."attribute_group ag ON (a.attribute_group_id=ag.attribute_group_id) LEFT JOIN ".DB_PREFIX."attribute_group_description agd ON (ag.attribute_group_id=agd.attribute_group_id) WHERE pa.product_id='".(int)$product_id."' AND agd.language_id='".(int)JG_JRNGJ."' GROUP BY ag.attribute_group_id ORDER BY ag.sort_order, agd.name LIMIT 0,50");
while($product_attribute_group=mysql_fetch_array($jg_va24g)){
$jg_12q9l=array();
$jg_5sb4n=mysql_query("SELECT a.attribute_id, ad.name, pa.text FROM ".DB_PREFIX."product_attribute pa LEFT JOIN ".DB_PREFIX."attribute a ON (pa.attribute_id=a.attribute_id) LEFT JOIN ".DB_PREFIX."attribute_description ad ON (a.attribute_id=ad.attribute_id) WHERE pa.product_id='".(int)$product_id."' AND a.attribute_group_id='".(int)$product_attribute_group['attribute_group_id']."' AND ad.language_id='".(int)JG_JRNGJ."' AND pa.language_id='".(int)JG_JRNGJ."' ORDER BY a.sort_order, ad.name LIMIT 0,50");
while($product_attribute=mysql_fetch_array($jg_5sb4n))
{
$jg_12q9l[]=array(
'attribute_id' => $product_attribute['attribute_id'],
'name'         => $product_attribute['name'],
'text'         => $product_attribute['text']
);
}
$jg_77auz[]=array(
'attribute_group_id' => $product_attribute_group['attribute_group_id'],
'name'               => $product_attribute_group['name'],
'attribute'          => $jg_12q9l
);
}
return $jg_77auz;
}
function jg_lnm23($product_id){
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_dug3z=array();
$jg_1010d=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."product_option WHERE product_id='".(int)$product_id."' ORDER BY sort_order LIMIT 0,50");
while($product_option=mysql_fetch_array($jg_1010d)){
$jg_b9zl1=array();
$jg_r1grh=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."product_option_value WHERE product_option_id='".(int)$product_option['product_option_id']."' ORDER BY sort_order LIMIT 0,50");
while($product_option_value=mysql_fetch_array($jg_r1grh)){
$jg_2x9bo=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."product_option_value_description WHERE product_option_value_id='".(int)$product_option_value['product_option_value_id']."' AND language_id='".(int)JG_JRNGJ."' LIMIT 0,50");
$jg_gtxls='';
$jg_lvgmq=mysql_fetch_row($jg_2x9bo);
$jg_gtxls=$jg_lvgmq[3];
$jg_b9zl1[]=array(
'product_option_value_id' => $product_option_value['product_option_value_id'],
'name'                    => $jg_gtxls,
'price'                   => $product_option_value['price'],
'prefix'                  => $product_option_value['prefix']
);
}
$jg_m2ksm=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."product_option_description WHERE product_option_id='".(int)$product_option['product_option_id']."' AND language_id='".(int)JG_JRNGJ."'");
$jg_lvgmq=mysql_fetch_row($jg_m2ksm);
$jg_mr2co=$jg_lvgmq[3];
$jg_dug3z[]=array(
'product_option_id' => $product_option['product_option_id'],
'name'              => $jg_mr2co,
'option_value'      => $jg_b9zl1,
'sort_order'        => $product_option['sort_order']
);
}
return $jg_dug3z;
}
function jg_rjcu6($product_id){
$jg_zn49j=mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysql_set_charset('utf8');
if (function_exists('mb_language')){
mb_language('uni');
mb_internal_encoding('UTF-8');
}
mysql_query("SET NAMES 'utf8'", $jg_zn49j);
mysql_query("SET CHARACTER SET utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $jg_zn49j);
mysql_query("SET CHARACTER_SET_RESULTS=utf8", $jg_zn49j);
mysql_query("SET SQL_MODE=''", $jg_zn49j);
mysql_select_db(DB_DATABASE, $jg_zn49j) or die (mysql_error());
$jg_dug3z=array();
$jg_1010d=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."product_option po LEFT JOIN `".DB_PREFIX."option` o ON (po.option_id=o.option_id) LEFT JOIN ".DB_PREFIX."option_description od ON (o.option_id=od.option_id) WHERE po.product_id='".(int)$product_id."' AND od.language_id='".(int)JG_JRNGJ."' LIMIT 0,50");
while($product_option=mysql_fetch_array($jg_1010d)){
if ($product_option['type']=='select'||$product_option['type']=='radio'||$product_option['type']=='checkbox'||$product_option['type']=='image'){
$jg_b9zl1=array();
$jg_r1grh=mysql_query("SELECT DISTINCT * FROM ".DB_PREFIX."product_option_value pov LEFT JOIN ".DB_PREFIX."option_value ov ON (pov.option_value_id=ov.option_value_id) LEFT JOIN ".DB_PREFIX."option_value_description ovd ON (ov.option_value_id=ovd.option_value_id) WHERE pov.product_option_id='".(int)$product_option['product_option_id']."' AND ovd.language_id='".(int)JG_JRNGJ."' LIMIT 0,50");
while($product_option_value=mysql_fetch_array($jg_r1grh)){
$jg_b9zl1[]=array(
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
$jg_dug3z[]=array(
'product_option_id'    => $product_option['product_option_id'],
'option_id'            => $product_option['option_id'],
'name'                 => $product_option['name'],
'type'                 => $product_option['type'],
'product_option_value' => $jg_b9zl1,
'required'             => $product_option['required']
);
}else{
$jg_dug3z[]=array(
'product_option_id' => $product_option['product_option_id'],
'option_id'         => $product_option['option_id'],
'name'              => $product_option['name'],
'type'              => $product_option['type'],
'option_value'      => $product_option['option_value'],
'required'          => $product_option['required']
);
}
}
return $jg_dug3z;
}
function jg_b3102q($category_id){
$query=$this->db->query("SELECT DISTINCT * FROM ".DB_PREFIX."category c LEFT JOIN ".DB_PREFIX."category_description cd ON (c.category_id=cd.category_id) LEFT JOIN ".DB_PREFIX."category_to_store c2s ON (c.category_id=c2s.category_id) WHERE c.category_id='".(int)$category_id."' AND cd.language_id='".(int)JG_JRNGJ."' AND c2s.store_id='".(int)$this->config->get('config_store_id')."' AND c.status='1'");
return $query->row;
}
function jg_6zcda6($product_id){
$query=$this->db->query("SELECT * FROM ".DB_PREFIX."product_to_category WHERE product_id='".(int)$product_id."'");
return $query->rows;
}
function jg_gs4k9($category_id){
$category_data=array();
$category_query=$this->db->query("SELECT category_id FROM ".DB_PREFIX."category WHERE parent_id='".(int)$category_id."'");
foreach ($category_query->rows as $category){
$category_data[]=$category['category_id'];
$children=$this->jg_gs4k9($category['category_id']);
if ($children){
$category_data=array_merge($children, $category_data);
}
}
return $category_data;
}
}
?>
