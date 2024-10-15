<?php
$kvse = "kodostore";
$path_1a = '';
$url_gbl = 'kodoninja.com/';
$url_lcl = '../';
if ($page)
include_once('css/TEMP_cache_css.php');
include_once(''.$url_lcl.'icl/err/err_tkn.php');
include_once(''.$url_lcl.'icl/cnnc_t.php');
include_once(''.$url_lcl.'icl/addons/nmedply.php');
include_once(''.$url_lcl.'icl/addons/baseext.php');
include_once(''.$url_lcl.'icl/kodocrypt_vx.php');
include_once(''.$url_lcl.'icl/c_sts.php'); // link to kodoninja.com
include_once(''.$url_lcl.'icl/addons/time_system.php');
// include_once('icl/usr/favLst_Lgc__x.php');
include_once(''.$url_lcl.'icl/u_rgts.php');
include_once(''.$url_lcl.'icl/idx/social_media_subscribe.php');
// include_once("icl/glblFltr_dwn.php"); // global filter
include_once(''.$url_lcl.'icl/nws/mNwsLgc.php');
if ($page === "home")
include_once("icl/idx/indxCnts.php");
if ($page === "cart")
include_once("icl/crt/crtCnts.php");
if ($page === "product")
include_once("icl/prd/prdCnts.php");
?>