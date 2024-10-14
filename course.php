<?php 
include_once("icl/c_sts.php");
include_once("icl/u_rgts.php");
include_once("prs/time_system.php");
include_once("icl/addons/hashtag.php");
$path = 'p1';
$page = 'course';

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
?>



<!DOCTYPE html>
<html>
<head>
<title>kodoninja - <?php echo $page; ?></title>
<?php include_once("icl/header/meta_tags.php"); ?>
<link href="css/mcss.css" rel="stylesheet">
<link href="blog/css/mcss.css" rel="stylesheet">
<link href="user/css/mcss.css" rel="stylesheet">
<link href="courses/css/mcss.css" rel="stylesheet">
<script>
<!--
document.write("<script src=\"js\/jquery-3.4.1.min.js\"><\/script>");
//-->  
<!--
document.write("<script src=\"js\/tgl.js\"><\/script>");
//-->  
</script>
</head>
 <body> 
    <?php 
    include_once("icl/header.php"); 
    include_once("icl/panel_l.php"); 
    include_once("icl/panel_r.php"); 
    ?>
    
    <!-- end start -->
     <div class="mHdr-Wpr">
         <?php echo $tglImg; ?>
         <div class="mHdr-Ovly pa">
            <div class="mHdr-Inr">
                <div class="di clr_w">
                    <h2>Welcome to the Coding Ninja Academy</h2>
                    <div>Check out the courses that will help you</div>
                </div>
             </div>
         </div>
     </div>
     <?php include_once("courses/icl/menu.php"); ?>
    <!-- -------- -->
    <div class="mHdr-Inr3">
        <!-- -------- -->
        <div class="sqrLg-Wpr dI">
        <div class="sqrLg-Ovly pa"></div>
            <img src="courses/img/7036220249_b379b6b149_b.jpg"/>
            <a>
                <div id="crs_1b" class="sqr-Ftr red">Coding</div>
            </a>
        </div>
        <!-- -------- -->
        <div class="sqrLg-Wpr dI">
        <div class="sqrLg-Ovly pa"></div>
            <img src="courses/img/1f7fded7b33f8472e590ccd85f34-1432231.jpg!d.jfif"/>
            <a>
                <div id="crs_2b" class="sqr-Ftr gray">Trading</div>
            </a>
        </div>
        <!-- -------- -->
        <div class="sqrLg-Wpr dI">
        <div class="sqrLg-Ovly pa"></div>
            <img src="courses/img/Smiling_young_azeri_man.jpg"/>
            <a>
                <div id="crs_3b" class="sqr-Ftr gray">Personal Development</div>
            </a>
        </div>
        <!-- -------- -->
        <div class="sqrLg-Wpr dI">
        <div class="sqrLg-Ovly pa"></div>
            <img src="courses/img/20776439_10213918077376126_843462507545549089_o.jpg"/>
            <a>
                <div id="crs_4b" class="sqr-Ftr gray">Health &amp; Fitness</div>
            </a>
        </div>
        <!-- -------- -->
        <div>
            <div id="crs_1c"><p class="cNt-Bdy">Explore our coding courses to learn the skills needed to create scale-able mobile and web platforms. These courses are meant for moderate to advanced developers. We are taking everything you have learned about HTML/CSS, JavaScript (PHP, Python…) to create advanced full stack projects from scratch. There’s free code so feel free to download modify and tweak the code as you become a more advanced and comfortable developer. Most of the courses are free re-watch learn and copy and paste as much as you need. The classes are straightforward, so virtually any decent developer should be able follow along.</p>
            <br>
                <a href="courses/class.php?course=coding"><div class="w100 sqr-Ftr red dB crsBtn">View courses</div></a>  
            </div>
            <div id="crs_2c" class="dN">Content 2</div>
            <div id="crs_3c" class="dN">Content 3</div>
            <div id="crs_4c" class="dN">Content 4</div>
        </div>
    </div>
     

    <?php include_once("icl/footer.php"); ?>
</body>
<script type="text/javascript">
<!--
document.write('<script type=\"text/javascript" src=\"js\/mjs.js"><\/script>');
//-->
<!--
document.write('<script type=\"text/javascript" src=\"courses\/js\/mjs.js"><\/script>');
//-->
</script>
</html>
