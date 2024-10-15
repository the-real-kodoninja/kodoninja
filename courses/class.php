<?php 
include_once("../icl/c_sts.php");
include_once("../icl/u_rgts.php");
include_once("../prs/time_system.php");
include_once("../icl/addons/hashtag.php");
$path = 'p2 ';
$page = 'course';
$lang = "";
$class = "";
$c_list = "";
$class_itm = "";

if ($user_ok == true) {
    $hello = $log_username;
} else if($user_ok != true) {
    $hello = 'Welcome';
}

$tglImg = "";
$dirname = "img/tgl/";
$images = glob($dirname."*.jpg");

foreach($images as $image) {
    $tglImg .= '<img src="'.$image.'" style="margin: 0px;" />';
}

$classes = include_once("icl/classes.php");

$course = preg_replace('#[^a-z0-9.@]#i', '', $_GET ['course']);
$lang = preg_replace('#[^a-z0-9.@]#i', '', $_GET ['lang']);
if ($lang == '') {
    $class = $class;
} else if ($lang == TRUE){
    $class_itm .= '<a href="class.php?course='.$course.'&lang='.$lang.'"><i>'.$lang.'</i></a>';
    if ($lang == 'HTML/CSS') {
        $class = '';
        include_once("class/coding/html_css.php");
    } if ($lang == 'JavaScript') {
        $class = '';
        include_once("class/coding/javascript.php");
    } if ($lang == 'PHP') {
        $class = '';
        include_once("class/coding/php.php");
    } if ($lang == 'Python') {
        $class = '';
        include_once("class/coding/python.php");
    }
} else {
    $class = 'error!';
}
?>



<!DOCTYPE html>
<html>
<head>
<title>kodoninja - <?php echo $hello; ?></title>
<?php include_once("../icl/header/meta_tags.php"); ?>
<link href="../css/mcss.css" rel="stylesheet">
<link href="../blog/css/mcss.css" rel="stylesheet">
<link href="../user/css/mcss.css" rel="stylesheet">
<link href="css/mcss.css" rel="stylesheet">
<script>
<!--
document.write("<script src=\"..\/js\/jquery-3.4.1.min.js\"><\/script>");
//-->  
<!--
document.write("<script src=\"..\/js\/tgl.js\"><\/script>");
//-->  
</script>
</head>
 <body> 
    <?php 
    include_once("../icl/header.php"); 
    //include_once("../icl/panel_l.php"); 
    //include_once("../icl/panel_r.php"); 
    include_once("icl/cat_pge.php"); 
    include_once("../icl/pge_Extras.php"); 
    ?>
    <div class="hDr_mNu2-Wpr pa" style="top: 78px;">
        <div class="hDr_mNu2-Inr main_Wpr">
            <ul class="fl">
                <?php echo $cat_mNu; ?>
            </ul>
            <div class="blog-vW fr di">
                
            </div>
        </div>
    </div>
    <!-- header logic end -->
     <!-- banner header start -->
     <div class="bnrHdr-Wpr">
        <div class="bnrCnt main_Wpr">
            <span class="bnrTxt db">
                <a href="../course.php"><i>Courses</i></a>
                <a href="class.php"><i>Coding</i></a>
                <?php echo $class_itm ?>
            </span>
         </div>
     </div>
     <!-- banner header end -->
    <div class="frm_main db" style="margin: 185px 0px 0px;">
        <div class="main_Wpr">
            <div class="pge-table dI bck_wht">
                <?php echo ''.$class.''.$c_list.''; ?>
            </div>
            <div class="rgt-lgc fr">
                <?php echo $pge_Rpanel; ?>
            </div>
            <?php echo $Trnd_Ftr; ?>
        </div>
    </div>
 
     

    <?php include_once("../icl/footer.php"); ?>
</body>
<script type="text/javascript">
<!--
document.write('<script type=\"text/javascript" src=\"..\/js\/mjs.js"><\/script>');
//-->
<!--
document.write('<script type=\"text/javascript" src=\"js\/mjs.js"><\/script>');
//-->
</script>
</html>
