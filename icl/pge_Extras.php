<?php
$t = "";  
$tm = "";
$hUp = "";
$__MAX = 15;
$t_tr3 = "";
$cov_tr3 = "";
$output_tr = "";
$none_tr = "";
$Vmore_tr = "";
$pstSet1b = "";
$pstEdt1ba = "";
$pstEdt2ba = "";
$pstEdt3ba = "";
$pstEdt1bb = "";
$pstEdt2bb = "";
$pstEdt3bb = "";
$Trnd_Ftr = "";
$bE_2b = "";
$pnl_listV = "";
$pnl_lst9a = "";
$pnl_lst9b = "";
$pnl_lst9c = "";
$pnl_sepV = "";
$pnl_ls = "";
$nS1 = "";
$nS2 = "";
$course_nav = '';
$pst_btn = "";
$adsRight = "";
if (isset($_GET ['t'])) {
    $t = filter_var($_GET ['t'],FILTER_SANITIZE_STRING);
}
$page = filter_var($page,FILTER_SANITIZE_STRING);

if ($page === "post" || $page === "forum" || $page === "goal" || $page === "category") {
    $adsRight = "";
    $__MAX = 5;
} if ($t == "forum" || $page == "forum" || $t == "blog" || $page == "blog" || $t == "goal" || $page == "goal" || $page == "feed" || $page == "search" || $page == "info" || $page == "course" || $page == "watchlist") {
    $nS1_2 = 'WHERE u.id = n.uid';
    $d__ = "date";
} if ($t == "blog" || $page == "blog" || $page == "info") {
    $__MAX = 8; 
    $t = "blog";
    $tm = $t;
    $id_uNq = "bid";
    $nS1 = 'blog';
    $nS2 = 'Blogs';
} else if ($t == "forum" || $page == "forum") {
    $t = "forum";
    $tm = "thread";
    $id_uNq = "fid";
    $nS1 = 'forum';
    $nS2 = 'Forums';
} else if ($t == "goal" || $page == "goal") {
    $t = "goal";
    $tm = $t;
    $nS1 = 'goal';
    $nS2 = 'Goals';
    $id_uNq = "gid";
} else if ($page == "search") {
    $t = 'blog';
    $tm = $t;
    $nS1 = 'blog';
    $nS2 = 'Blogs';
    $id_uNq = "bid";
} if ($t === "user" || $page === "user") {
    $nS1 = 'user_post';
    $nS1_2 = 'WHERE u.id = n.aid1';
    $nS2 = 'user post';
    $id_uNq = 'pid';
    $t = "user";
    $tm = "post";
    $href = 'href="#"';
    $hUp = 'onclick="addPstBtn(\''.$log_id.'\',\''.$log_HshCde.'\',\'xx\',\'b2c83\')"';
    $d__ = "postdate";
} if ($user_ok && $page !== "post") {
    $pst_btn = '<a href="post.php?t='.$t.'"><button 
    class="mFr_btn" '.$hUp.'>post a new '.$tm.'</button></a>';
    if ($page === "home") {
        $pst_btn = '';
    }
}

if ($page === "view") {
    $__MAX = 30;
}

if ($page == "home" || $t === "user" || $t == "forum" || $page == "forum" || $t == "blog" || $page == "blog" || $t == "goal" || $page == "goal" || $page == "feed" || $page == "search" || $page == "info" || $page == "course" || $page == "watchlist") {

    if ($page !== "home") {
        try {
            if($sqlo_____dbx___xX__->query(
                $sql = "SELECT u.*,n.* 
                FROM users AS u
                INNER JOIN $nS1 AS n 
                $nS1_2
                ORDER BY n.views DESC LIMIT 8")->fetchColumn()) {
                if($numrows_tr = $sqlo_____dbx___xX__->query($sql)->fetchColumn()){
                    foreach ($sql______dbx___xX__->query($sql) as $roo0w____X___xX__) {
                        $id_tr3 = $roo0w____X___xX__[$id_uNq];
                        $a_tr3 = $roo0w____X___xX__["username"];
                        $cat_tr3 = isset($roo0w____X___xX__["category"]);
                        if (strlen($d_tr3a = Strip_tags($roo0w____X___xX__["data"])) > $max_data = 400) {
                            $d_tr3a = substr($d_tr3a, 0, strrpos($d_tr3a, ' ', ($max_data - 3) - strlen($d_tr3a))) . '...';
                        }
                        $date_tr3 = timeAgo(strtotime(isset($roo0w____X___xX__["date"])));
                        if ($t !== "user") {
                            $t_tr3 = $roo0w____X___xX__["title"];
                            $cov_tr3 = '<img class="IMG_BlgS" src="'.$m_path.'img/temp/no_imgLnk.svg" alt="'.$t_tr3.'">';
                            if($cov_Avt = $roo0w____X___xX__["cover"]){
                                $cov_tr3 = '<img class="IMG_BlgS" src="'.$m_path.''.$t.'/img/'.$id_tr3.'/'.$cov_Avt.'" alt="'.$t_tr3.'">';
                            }
                        } if($t == 'goal') {
                            $prg1_tr3 = $roo0w____X___xX__["progress"];
                            $date_tr3 = timeAgo(strtotime($roo0w____X___xX__["startdate"]));
                            $date2_tr3 = timeAgo(strtotime($roo0w____X___xX__["enddate"]));
                            $prg2_tr3 = ''.$prg1_tr3.'%';
                            $p_tr3 = '
                            <div class="glPgBr_1">
                                <div style="width: '.$prg2_tr3.';">'.$prg2_tr3.'</div>
                            </div>
                            ';
                        }
                        $vLnk_tr3 = 'view.php?t='.$nS1.'&v='.$id_tr3.'';
                        $bE_2b .= '
                        <a href="'.$vLnk_tr3.'">
                            <div class="Trnd-rgt-Cnt Trnd-max2">
                                '.$cov_tr3.'
                                <div class="Trnd-Txt2 di">
                                    <b class="trnd-Ttl">'.$t_tr3.'</b>
                                    <span class="trnd-pst_Desc" style="color: #000;">'.$d_tr3a.'</span>
                                    <div>
                                        <span class="author">by <a href="user.php?u='.$a_tr3.'">'.$a_tr3.'</a></span>
                                        <div class="di fr">
                                            <span class="time">'.$date_tr3.'</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        ';
                        }
                        if($numrows_tr > 4){
                            $Vmore_tr = '
                            <div class="Pad1">
                                <a href="#">View more</a>
                            </div>
                            ';
                        }
                        echo $sqlc_____dbx___xX__;
                } else {
                    $bE_2b .= 'Sorry there\'s nothing in this category as of yet. Would you like to <a>post to this category?';
                    echo $sqlc_____dbx___xX__;
                }
            }
        } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
        } 
    }
    //
    if ($page == "home") {
        $d__ = "date";
        try {
            // Blog section
            if ($sqlo_____dbx___xX__->query($sql_2 = "SELECT * FROM blog WHERE views > 1 ORDER BY $d__ DESC LIMIT $__MAX")->fetchColumn()) {
                if ($numrows_tr = $sqlo_____dbx___xX__->query($sql_2)->fetchColumn()) {
                    foreach ($sqlo_____dbx___xX__->query($sql_2) as $roo0w____X___xX__) {
                        $id_pnl9a = $roo0w____X___xX__["bid"];
                        if ($t !== "user") {
                            $t_pnl9a = $roo0w____X___xX__["title"];
                            $cat_pnl9a = $roo0w____X___xX__["category"];
                        }
                        if ($t === "user") { // avoid else statement for expansion
                            if (strlen($t_pnl9a = Strip_tags($roo0w____X___xX__["data"])) > $max_data = 50) {
                                $t_pnl9a = substr($t_pnl9a, 0, strrpos($t_pnl9a, ' ', ($max_data - 3) - strlen($t_pnl9a))) . '...';
                            }
                        }
                        $pnl_lst9a .= '<a href="view.php?t=blog&v=' . $id_pnl9a . '"><li>' . $t_pnl9a . '</li></a>';
                    }
                } else {
                    $pnl_lst9a .= '<li>Strange, nothing to see here, meow</li>';
                    echo $sqlc_____dbx___xX__;
                }
                $pnl_sepV = '
                <div class="Pnl_Hdr" style="margin: 0px 0px 10px 0px;">
                    <span class="Pnl_Ttl di">Popular blogs</span>
                </div>
                ';
                $pnl_listV .= '
                <div class="mFr_Pnl pad-T2">
                    ' . $pnl_sepV . '
                    <ol class="Pnl_lst">
                        ' . $pnl_lst9a . '
                    </ol>
                </div>
                ';
            }

            // Forum section
            if ($sqlo_____dbx___xX__->query($sql_3 = "SELECT * FROM forum WHERE views > 1 ORDER BY $d__ DESC LIMIT $__MAX")->fetchColumn()) {
                if ($numrows_tr = $sqlo_____dbx___xX__->query($sql_3)->fetchColumn()) {
                    foreach ($sqlo_____dbx___xX__->query($sql_3) as $roo0w____X___xX__) {
                        $id_pnl9a = $roo0w____X___xX__["fid"];
                        if ($t !== "user") {
                            $t_pnl9a = $roo0w____X___xX__["title"];
                            $cat_pnl9a = $roo0w____X___xX__["category"];
                        }
                        if ($t === "user") { // avoid else statement for expansion
                            if (strlen($t_pnl9a = Strip_tags($roo0w____X___xX__["data"])) > $max_data = 50) {
                                $t_pnl9a = substr($t_pnl9a, 0, strrpos($t_pnl9a, ' ', ($max_data - 3) - strlen($t_pnl9a))) . '...';
                            }
                        }
                        $pnl_lst9b .= '<a href="view.php?t=forum&v=' . $id_pnl9a . '"><li>' . $t_pnl9a . '</li></a>';
                    }
                } else {
                    $pnl_lst9a .= '<li>Strange, nothing to see here, meow</li>';
                    echo $sqlc_____dbx___xX__;
                }
                $pnl_sepV = '
                <div class="Pnl_Hdr" style="margin: 0px 0px 10px 0px;">
                    <span class="Pnl_Ttl di">Popular forums</span>
                </div>
                ';
                $pnl_listV .= '
                <div class="mFr_Pnl pad-T2">
                    ' . $pnl_sepV . '
                    <ol class="Pnl_lst">
                        ' . $pnl_lst9b . '
                    </ol>
                </div>
                ';
            }

            // Goal section
            if ($sqlo_____dbx___xX__->query($sql_4 = "SELECT * FROM goal WHERE views > 1 ORDER BY $d__ DESC LIMIT $__MAX")->fetchColumn()) {
                if ($numrows_tr = $sqlo_____dbx___xX__->query($sql_4)->fetchColumn()) {
                    foreach ($sqlo_____dbx___xX__->query($sql_4) as $roo0w____X___xX__) {
                        $id_pnl9a = $roo0w____X___xX__["gid"];
                        if ($t !== "user") {
                            $t_pnl9a = $roo0w____X___xX__["title"];
                            $cat_pnl9a = $roo0w____X___xX__["category"];
                        }
                        if ($t === "user") { // avoid else statement for expansion
                            if (strlen($t_pnl9a = Strip_tags($roo0w____X___xX__["data"])) > $max_data = 50) {
                                $t_pnl9a = substr($t_pnl9a, 0, strrpos($t_pnl9a, ' ', ($max_data - 3) - strlen($t_pnl9a))) . '...';
                            }
                        }
                        $pnl_lst9c .= '<a href="view.php?t=goal&v=' . $id_pnl9a . '"><li>' . $t_pnl9a . '</li></a>';
                    }
                } else {
                    $pnl_lst9a .= '<li>Strange, nothing to see here, meow</li>';
                    echo $sqlc_____dbx___xX__;
                }
                $pnl_sepV = '
                <div class="Pnl_Hdr" style="margin: 0px 0px 10px 0px;">
                    <span class="Pnl_Ttl di">Popular goals</span>
                </div>
                ';
                $pnl_listV .= '
                <div class="mFr_Pnl pad-T2">
                    ' . $pnl_sepV . '
                    <ol class="Pnl_lst">
                        ' . $pnl_lst9c . '
                    </ol>
                </div>
                ';
            }
        } catch (PDOException $newError) {
            newError($sqlo_____dbx___xX__, $log_id, $_SERVER["SCRIPT_NAME"], $newError);
        }
    } else {
        // write if statement based on post and replies
        try {
            if($sqlo_____dbx___xX__->query(
                $sql_2 = "SELECT * FROM $nS1 WHERE views > 1 ORDER BY $d__ DESC LIMIT $__MAX")->fetchColumn()) {
                if($numrows_tr = $sqlo_____dbx___xX__->query($sql_2)->fetchColumn()){
                    foreach ($sql______dbx___xX__->query($sql_2) as $roo0w____X___xX__) {
                    $id_pnl9a = $roo0w____X___xX__[$id_uNq];
                    if ($t !== "user") {
                        $t_pnl9a = $roo0w____X___xX__["title"];
                        $cat_pnl9a = $roo0w____X___xX__["category"];
                    } if ($t === "user") { // avoid else statement for expansion
                        if (strlen($t_pnl9a = Strip_tags($roo0w____X___xX__["data"])) > $max_data = 50) {
                            $t_pnl9a = substr($t_pnl9a, 0, strrpos($t_pnl9a, ' ', ($max_data - 3) - strlen($t_pnl9a))) . '...';
                        }
                    }
                    $vLnkp9a = 'view.php?t='.$t.'&v='.$id_pnl9a.'';
                    $pnl_lst9a .= '<a href="'.$vLnkp9a.'"><li>'.$t_pnl9a.'</li></a>';
                }
            } else {
                $pnl_lst9a .= '<li>Strange, nothing to see here, meow</li>';
                echo $sqlc_____dbx___xX__;
            }
            $pnl_sepV = '
            <div class="Pnl_Hdr" style="margin: 0px 0px 10px 0px;">
                <span class="Pnl_Ttl di">Popular '.$nS2.'</span>
            </div>
            ';
            $pnl_listV .= '
            <div class="mFr_Pnl pad-T2">
                '.$pnl_sepV.'
                <ol class="Pnl_lst">
                    '.$pnl_lst9a.'
                </ol>
            </div>
            ';
        }
        } catch (PDOException $newError) {
            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
        } 
    }
}

$unqSTY_1 = "";
if ($p_load === 'f'){
    $unqSTY_1 = 'style="margin: 0px auto 30px;"';
} else if ($p_load === 'm'){
    $unqSTY_1 = '';
}

$blgExt_2b = '
<div class="blg_main db bck_wht pad-T2 pR" '.$unqSTY_1.'>
    <h3 class="trnd-Hdr">Most Viewed</h3>
    '.$bE_2b.'
</div>
';



// prelude to kodoacademy
// ************************************************************** courses logic start
$hide = ' class="dN"';
$show = ' class="dB"';


$lang = ['HTML/CSS',
        'JavaScript',
        'PHP',
        'Python'];

$sub1 = ['Fundamentals','Jquery','Node.js'];

$lib1 = ['Introduction',
       'Implementation',
       'Fallback Content',
       'Development Output',
       'Syntax Guidelines',
       'Variables',
       'Functions',
       'Statements',
       'Operators',
       'Event Handling',
       'Objects'];

$course = "";
$langX = "";
$subX = "";
if(isset($_GET['course'])){
	$course = preg_replace('#[^a-z0-9.@]#i', '', $_GET ['course']);
    $langX = preg_replace('#[^a-z0-9.@]#i', '', $_GET ['lang']);
    $subX = preg_replace('#[^a-z0-9.@]#i', '', $_GET ['sub']);
}

$urlX = 'class.php?course='.$course.'';
if ($langX == $lang[0]) {
    $url2 = ''.$urlX.'&lang='.$lang[0].'';
    $url3 = ''.$url2.'&sub='.$sub1[0].'';
} if ($langX == $lang[1]) {
    $url2 = ''.$urlX.'&lang='.$lang[1].'';
    if ($subX == $sub1[0]) {
        $url3 = ''.$url2.'&sub='.$sub1[0].'';
    } if ($subX == $sub1[1]) {
        $url3 = ''.$url2.'&sub='.$sub1[1].'';
    } if ($subX == $sub1[2]) {
        $url3 = ''.$url2.'&sub='.$sub1[2].'';
    }
} if ($langX == $lang[2]) {
    $url2 = ''.$urlX.'&lang='.$lang[2].'';
    $url3 = ''.$url2.'&sub='.$sub1[0].'';
} if ($langX == $lang[3]) {
    $url2 = ''.$urlX.'&lang='.$lang[3].'';
    $url3 = ''.$url2.'&sub='.$sub1[0].'';
}

// HTML/CSS
$url_l0a = ''.$urlX.'&lang='.$lang[0].'';
$url_l0b = ''.$url_l0a.'&sub='.$sub1[0].'';
// javascript
$url_l1a = ''.$urlX.'&lang='.$lang[1].'';
$url_l1b = ''.$url_l1a.'&sub='.$sub1[0].'';
// PHP
$url_l2a = ''.$urlX.'&lang='.$lang[2].'';
$url_l2b = ''.$url_l2a.'&sub='.$sub1[0].'';
// Python
$url_l3a = ''.$urlX.'&lang='.$lang[3].'';
$url_l3b = ''.$url_l3a.'&sub='.$sub1[0].'';

$hide_l1a = $hide;
$hide_l1b = $hide;
if ($langX == $lang[1]) {
    $hide_l1a = $show;
    $hide_l1b = $hide;
} if ($langX == $lang[1] && $subX == $sub1[0]) {
    $hide_l1a = $show;
    $hide_l1b = $show;
}

$course_nav = '';
if ($page == "course") {
    if ($class_itm == TRUE) {
        $c_nav .= '<li>'.$class_itm.'</li>';
    }
  //  if ($course == 'coding') {
        $course_nav .= '
        <div class="mFr_Pnl r_menu">
            <div class="Pnl_Hdr">
                <span class="Pnl_Ttl di">Courses menu</span>
            </div>
            '.$hr.'
            <ul>
                <li>
                    <a class="main-li" href="'.$url_l0a.'">'.$lang[0].'</a>
                </li>
                <li>
                    <a class="main-li" href="'.$url_l1a.'">'.$lang[1].'</a>
                    <ol'.$hide_l1a.'>
                        <li><a href="'.$url_l1b.'">'.$sub1[0].'</a>
                            <ol'.$hide_l1b.'>
                                <li><a href="'.$url_l1b.'&lib='.$lib1[0].'">'.$lib1[0].'</a></li>
                                <li><a href="'.$url_l1b.'&lib='.$lib1[1].'">'.$lib1[1].'</a></li>
                                <li><a href="'.$url_l1b.'&lib='.$lib1[2].'">'.$lib1[2].'</a></li>
                                <li><a href="'.$url_l1b.'&lib='.$lib1[3].'">'.$lib1[3].'</a></li>
                                <li><a href="'.$url_l1b.'&lib='.$lib1[4].'">'.$lib1[4].'</a></li>
                                <li><a href="'.$url_l1b.'&lib='.$lib1[5].'">'.$lib1[5].'</a></li>
                                <li><a href="'.$url_l1b.'&lib='.$lib1[6].'">'.$lib1[6].'</a></li>
                                <li><a href="'.$url_l1b.'&lib='.$lib1[7].'">'.$lib1[7].'</a></li>
                                <li><a href="'.$url_l1b.'&lib='.$lib1[8].'">'.$lib1[8].'</a></li>
                                <li><a href="'.$url_l1b.'&lib='.$lib1[9].'">'.$lib1[9].'</a></li>
                                <li><a href="'.$url_l1b.'&lib='.$lib1[10].'">'.$lib1[10].'</a></li>
                            </ol>
                        </li>
                        <li><a href="'.$url_l1a.'&sub='.$sub1[1].'">'.$sub1[1].'</a></li>
                        <li><a href="'.$url_l1a.'&sub='.$sub1[2].'">'.$sub1[2].'</a></li>
                    </ol>
                </li>
                <li>
                    <a class="main-li" href="'.$url_l2a.'">'.$lang[2].'</a>
                </li>
                <li>
                    <a class="main-li" href="'.$url_l3a.'">'.$lang[3].'</a>
                </li>
            </ul>
        </div>
    ';
//    }
}

if ($page === "post") {
    $adsRight = "";
    // create minimal add 3rd height
}

$pge_Rpanel = '
<div class="mFr_RB-Wpr w100">
    '.$pst_btn.'
    '.$course_nav.'
    '.$pnl_listV.'
</div>
'.$adsRight.'
';

$Trnd_Ftr = '
'.$blgExt_2b.'
';


?>
