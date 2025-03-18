<?php
$path = 'p1';
$page = 'view';
$cln = "'";
$DCNtbl = "";
$vws_vc = "";
$cov_vc = "";
$cov_vc2 = "";
$prg1_gc = "";
$y_vid = "";
$d_vc2 = "";
$cln = "'";
$a_vc = "";
$p_vc = "";
$d_vc = "";
$tag_vc = "";
$date_vc = "";
$t = "";
$cat_vc = "";
$id_vc = "";
$t_vc = "";
$descData = "";
$cov3_vc = "";
$cmtSwt1a = "";
$uvt_cnt_dpl = "";
$y_link = "";
$y_thumb = "";
$d_ref = "";
$refLgc = "";
$img_vc2 = "";
$uvt_Up = 0;
$uvt_dN = 0;
$uvt_b_Up = 0;
$uvt_b_dN = 0;
$trm_vc = "";
/////////////////////////////////////////
/////////// global page data ////////////
/////////////////////////////////////////
if (isset($_GET["t"])) {
    $t = filter_var($_GET['t'],FILTER_SANITIZE_STRING);

    // logic needs to be unrelated overall users that have nothing to do with the post may reply
    if($uImgXX){
        $uIMG1X = '<img src="'.$m_path.'img/temp/no_imgLnk2.svg" alt="'.$log_username.'">';
    }

    $url_full = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $url_qry = parse_url($url_full, PHP_URL_QUERY);

    /////////////////////////////////////////
    ///// user post content logic grab //////
    /////////////////////////////////////////
    if($t === "user"){
        // revert any letter attached to $_GET['t'] back to p
        if (isset($_GET["p"])) {
            $p = filter_var($_GET['p'],FILTER_SANITIZE_STRING);
        } else if (!isset($_GET["p"])) {
            $p = filter_var($url_qry,FILTER_SANITIZE_URL);
        }
        // once loaded it'll tell if cid is an actual id in the database
        include("".$m_path."icl/glbl/usr-pst_LOAD_view.php");
    }

    /////////////////////////////////////////
    ///////// blog based logic grab /////////
    ///////// forum based logic grab ////////
    ///////// goal based logic grab /////////
    /////////////////////////////////////////
    if($t == "blog" || $t == "forum" || $t == "goal"){
        // revert any letter attached to $_GET['t'] back to p
        if (isset($_GET["v"])) {
            $v = filter_var($_GET['v'],FILTER_SANITIZE_STRING);
        } else if (!isset($_GET["v"])) {
            $v = filter_var($url_qry,FILTER_SANITIZE_URL);
            $v = mysqli_real_escape_string($cnnc_t, $v);
        } if (isset($_GET["c"])) {
            $c = filter_var($_GET['c'],FILTER_SANITIZE_STRING);
        } 
        
        // $trm_vc = '
        // <p class="vTrms">The information provided by Kodoninja (“we,” “us” or “our”) on https://kodoninja.com/ (the “Site”) is for general informational And entertainment purposes only. Read more at <a href="info.php?i=1">terms</a> | <a href="info.php?i=3">disclaimer</a></p>
        // ';

        $b_nav1 = '
        <div class="usrTgl-Wpr">
            <div id="next">View as one pags</div>
            <div id="prev">View by Steps</div>
        </div>
        ';

        $b_nav2 = '
        <div class="usrTgl-Wpr">
            <div id="next">next</div>
            <div id="prev">prev</div>
        </div>
        ';

        $b_navX = '
        '.$b_nav1.'
        '.$b_nav2.'
        ';

        // v4 updates merge w e/ global presets
        if ($t === 'blog') {
            include("".$m_path."icl/glbl/blg-pst_LOAD_view.php");
        } else if ($t === 'forum') {
            include("".$m_path."icl/glbl/frm-pst_LOAD_view.php");  
        } else if ($t === 'goal') {
            include("".$m_path."icl/glbl/gol-pst_LOAD_view.php");
        }

        

        ////Suggested Books image and title grab
        $Bpath = 'blog/temp/books/';
        $books = glob($Bpath."*.jfif");

        foreach($books as $book) {
            $Bname = basename($book);
            $bk_1a .= '
            <div class="rl_1c2 dI">
                <img src="'.$m_path.''.$book.'" alt="'.$Bname.'"/>
                <div class="rl_1d clip1b">'.$Bname.'</div>
            </div>
            ';
        }


        $d_bks = '
        <div class="rl_1a">
            <div id="amzn-assoc-ad-7018a0bd-039d-43f4-a88b-dd69f2ed2469"></div><script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=7018a0bd-039d-43f4-a88b-dd69f2ed2469"></script>
        </div>
        ';

        $d_lks = '
        <div class="rl_1a">
            <h5>Recommended <a>Free</a> Book links</h5>
            <div class="rl_1c dB">
                <div class="rl_Ttl">epdf</div>
                <a href="https://epdf.pub/" target="_blank">https://epdf.pub/</a>
            </div>
        </div>
        ';

        $d_ftr = '
        '.$d_bks.'
        '.$d_lks.'
        '.$refLgc.'
        ';
    }


} else {
    header("location 404.php?msg=Sorry you can only access this page with certian prams mouse, get lot.");
}
?>
