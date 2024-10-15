<?php
if ($path == 'p1') {
    $path2 = '';
} else if ($path == 'p2'){
    $path2 = '../';
}
include_once(''.$path2.'glb_feed.php');

$key = [];
$value = [];
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
} 
// else if ($page == 'products') {
//     $sel2 = 'class="mNu-sel"';
// } 
?>


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


$pageLi = [
        'home' => "https://www.kodoninja.com/kodostore/index.php",  
        // 'products' => "products.php", // single base logic all content is minimal
        'kodoninja' => 'https://www.kodoninja.com/index.php', // temp logic // full domain redirect
    ];

if ($page == $pageLi["home"]) {
    $sel0 = $active;
    $view0 = $hide;
} 
// else if ($page == $pageLi["products"]) {
//     $sel1 = $active;
//     $view1 = $hide;
// }
else if ($page == $pageLi["kodoninja"]) {
    $sel2 = $active;
    $view2 = $hide;
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


$url_go = "";
foreach ($pageLi as $key => $value) {
    if ($key == 'kodoninja') {
        $url_go .= '
        <a id="MBLwth" href="'.$value.'" '.$view1.'>
            <li'.$sel1.''.$tempcss2.'>'.$key.'</li>
        </a>';
    }
    // $url_go .= '
    // <a href="'.$value.'" '.$view1.'>
    //     <li'.$sel1.''.$tempcss2.'>'.$key.'</li>
    // </a>';
};

$cnt_d1a = '
<div class="sec_1-5 w100">
    <div class="sdL-Wpr catFltr">
        '.$url_go.'
    </div>
</div>
';

if ($page == 'user') {
    $page = $u;
}

$dl_nav = '
<div class="bckGry" style="padding: 50px 0px 0px;">
    <div id="cnt_L2a" class="gryBtn w100 cP" style="padding: 10px; color: #fff;">
        <span class="dI">'.$page.'</span>
        <span class="catArw fR dI" style="text-indent: -35px;">&duhar;</span>
    </div>

    <div id="cnt_L2b" class="">
    '.$cnt_d1a.'
    </div>
</div>
';

?>



<div id="mNu_m_y" class="mNu-my dN" style="z-index:5;">
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

<script>
const mNu_m_x = document.getElementById("mNu_m_x"); // menu button
const mNu_m_y = document.getElementById("mNu_m_y"); // sidebar menu
const cnt_L2a = document.getElementById("cnt_L2a");
const cnt_L2b = document.getElementById("cnt_L2b");
//

mNu_m_x.addEventListener('click', function (event) {
    mNu_m_y.classList.toggle("dN");
    cnt_L2a.addEventListener('click', function (event) {
        cnt_L2b.classList.toggle("dN");
    });
});


const viewportWidth = window.innerWidth;
const MBLwth = document.querySelector('#MBLwth');
console.log(`${viewportWidth}`);
if (viewportWidth <= 730) {
    MBLwth.href = `https://www.kodoninja.com/m/index.php`;
} else {
    MBLwth.href = `https://www.kodoninja.com/index.php`;
}
</script>