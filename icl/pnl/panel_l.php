<?php
if ($path == 'p1') {
    $path1 = '';
    $path2 = '';
} else if ($path == 'p2'){
    $path1 = '../';
    $path2 = '../';
}
include_once(''.$path2.'glb_feed.php');

$key = ""; 
$value = "";
$sel1 = "";
$sel2 = "";
$sel3 = "";
$sel4 = "";
$sel5 = "";
$sel6 = "";
$sel7 = "";
$sel8 = "";
$sel9 = "";
$sel10 = "";
$sel11 = "";
if ($page == 'home') {
    $sel1 = 'class="mNu-sel"';
} else if ($page == 'blog') {
    $sel2 = 'class="mNu-sel"';
} else if ($page == 'forum') {
    $sel3 = 'class="mNu-sel"';
} else if ($page == 'seach') {
    $sel4 = 'class="mNu-sel"';
} else if ($page == 'watchlist') {
    $sel5 = 'class="mNu-sel"';
} else if ($page == 'course') {
    $sel6 = 'class="mNu-sel"';
} else if ($page == 'downloads') {
    $sel7 = 'class="mNu-sel"';
} else if ($page == 'store') {
    $sel8 = 'class="mNu-sel"';
} else if ($page == 'goal') {
    $sel9 = 'class="mNu-sel"';
} else if ($page == 'membership') {
    $sel10 = 'class="mNu-sel"';
}
?>

<script>
/*$(".dl_nav a li").hover(function(){
    $(this).css("background-color","#923334");
}*/
</script>

<?php

$active = ' class="active"';
$sel0 = "";
$sel1 = "";
$sel2 = "";
$sel3 = "";
$sel4 = "";
$sel5 = "";
$sel6 = "";
$view0 = "";
$view1 = "";
$view2 = "";
$view3 = "";
$view4 = "";
$view5 = "";
$view6 = "";
$hide = 'class="dN"';
$pth_relx = 'https://www.kodoninja.com/kodostore/index.php';

// $uriSegx = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// if ($uriSegx[2] == 'm') {
//     $pth_relx = '../../kodostore/index.php';
// } 

$pageLi = [
        'home' => 'index.php',
        'blog'  => "blog.php",
        'forum' => "forum.php",
        'goal' => "goal.php",
        'downloads' => "downloads.php",
        'membership' => "membership.php",
        'kodostore' => ''.$pth_relx.''
    ];


if ($page == $pageLi["home"]) {
    $sel0 = $active;
    $view0 = $hide;
} else if ($page == $pageLi["blog"]) {
    $sel1 = $active;
    $view1 = $hide;
} else if ($page == $pageLi["forum"]) {
    $sel2 = $active;
    $view2 = $hide;
} else if ($page == $pageLi["goal"]) {
    $sel3 = $active;
    $view3 = $hide;
} else if ($page == $pageLi["downloads"]) {
    $sel4 = $active;
    $view4 = $hide;
} else if ($page == $pageLi["membership"]) {
    $sel5 = $active;
    $view5 = $hide;
} else if ($page == $pageLi["kodostore"]) {
    $sel6 = $active;
    $view6 = $hide;
}



$tempcss1 = '
style="
    margin: 0px;
    padding: 0px;
    background: #3d4347;
    color: #fff;
"
';

$tempcss2 = '
style="
    display: inline-block;
    color: #fff;
    padding: 10px 0px;
    margin: 0px;
    width: 100%;
    text-indent: 15px;
"
';

// takes user to kodostore.com
// will be self contained until redirect is setup

$url_go = "";
foreach ($pageLi as $key => $value) {
    $url_go .= '<a href="'.$value.'" '.$view1.'><li'.$sel1.'  '.$tempcss2.'>'.$key.'</li></a>';
};

$cnt_d1a = '
<div class="sec_1-5 w100">
    <div class="sdL-Wpr catFltr">
        <ul class="dl_nav" '.$tempcss1.'>
            '.$url_go.'
        </ul>
    </div>
</div>
';

if ($page == 'user') {
    // current user landing
    $page = $nmeDpy_uFULL;
}

$dl_nav = '
<div class="bckGry" style="padding: 0px;">
    <div id="cnt_L2a" class="gryBtn w100 cP">
        <span class="dI">'.$page.'</span>
        <span class="catArw fR dI" style="text-indent: -35px;">&duhar;</span>
    </div>

    <div id="cnt_L2b" class="">
    '.$cnt_d1a.'
    </div>
</div>
';

?>

<div id="mNu_m_y1" class="mNu-my dN" style="z-index:5;">
    <ul class="lftPnl-Ul1">
        <?php echo $dl_nav; ?>
    </ul>
    <div class="lftPnl-Wpr">
        <h4>Site global feed</h4>
        <ul>
            <?php echo $gFeed_list; ?>
        </ul>
    </div>
</div>