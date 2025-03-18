<?php
$path_1a = '../../';
$m_path = "";
$output = "";
$dntTl = "";
$path = "p1"; 
if (isset($_POST['s']) && isset($_POST['k']) && isset($_POST['v'])) {
    $s = filter_var(preg_replace('#[^a-zA-Z0-9@]#', '', $_POST['s']),FILTER_SANITIZE_STRING);
    $k = filter_var($_POST['k'],FILTER_SANITIZE_STRING);
    $v = filter_var(preg_replace('#[^fm2]#', '', $_POST['v']),FILTER_SANITIZE_STRING);
    // 
    include_once(''.$path_1a.'icl/err/err_tkn.php');  
    include_once(''.$path_1a.'icl/cnnc_t.php');
    // include_once(''.$path_1a.'icl/c_sts.php');
    include_once(''.$path_1a.'icl/addons/hashtag.php');
    include_once(''.$path_1a.'icl/addons/baseext.php');
    include_once(''.$path_1a.'icl/addons/nmedply.php');
    include_once(''.$path_1a.'prs/time_system.php');

    if ($path == 'p1') {
        $path4 = '../';
        if ($v === 'f'){
            $path4a = '';
        } if ($v === 'm'){
            $path4a = '../';
        }
    } else if ($path == 'p2'){
        $path4 = '';
        if ($v === 'f'){
            $path4a = '../';
        } else if ($v === 'm'){
            $path4a = '../../';
        }
    } if($s || $k){
        $sx = explode (" ", $s);
        $x = "";
        $cS1 = "";
        $cS2 = "";
        $cS3 = ""; 
        foreach($sx as $se) {
            $x++;
            if($x==1)
            $cS1 = "activated='1' LIKE '%$se%' OR username LIKE '%$se%' OR fname LIKE '%$se%' OR lname LIKE '%$se%' OR email LIKE '%$se%'"; 
            $cS2 = "b.title LIKE '%$se%' OR b.tags LIKE '%$se%' OR b.category LIKE '%$se%' OR b.data LIKE '%$se%' OR u.username LIKE '%$se%'";
            $cS3 = "f.title LIKE '%$se%' OR f.tags LIKE '%$se%' OR f.category LIKE '%$se%' OR f.data LIKE '%$se%' OR u.username LIKE '%$se%'";
        }
        if ($k == "s3") {
            $dntTl = $sCrt_3 = '<div style="font-size: 5px; background:darkred; color: #fff; padding: 5px;border-radius:6px;">CLUE 3: kodoninja.com and the blog page is where it all started, so you may find the most eggs here, idk, but Shhhh... Don\'t tell anyone.</div>';
        } if ($s == 'home' || $s == 'index') {
            $output = '<a href="'.$path4.'index.php">home</a>';
        } if ($s == 'blog') {
            $output = '<a href="'.$path4.'blog.php">blog</a>';
        } if ($s == 'forum') {
            $output = '<a href="'.$path4.'forum.php">forum</a>';
        } if ($s == 'feed') {
            $output = '<a href="'.$path4.'feed.php">feed</a>';
        }

            // saved for v4 updates
            // correct code 
    // $sql = mysqli_query($sqlo_____dbx___xX__, "SELECT u.*,b.*,f.*,g.* 
    //         FROM users AS u
    //         LEFT JOIN blog AS b on b.uid = u.id
    //         LEFT JOIN forum AS f ON f.uid = u.id
    //         LEFT JOIN goal AS g on g.uid = u.id
    //         -- users
    //         WHERE activated='1' LIKE '%$s%' OR username LIKE '%$s%' OR fname LIKE '%$s%' OR lname LIKE '%$s%' OR email LIKE '%$s%' 
    //         -- blog
    //         AND b.title LIKE '%$s%' OR b.tags LIKE '%$s%' OR b.category LIKE '%$s%' OR b.data LIKE '%$s%'
    //         -- forum
    //         AND f.title LIKE '%$s%' OR f.tags LIKE '%$s%' OR f.category LIKE '%$s%' OR f.data LIKE '%$s%'
    //         -- goal
    //         AND g.title LIKE '%$s%' OR g.tags LIKE '%$s%' OR g.category LIKE '%$s%' OR g.data LIKE '%$s%'
    //         LIMIT 15");
            
            if($sqlo_____dbx___xX__->query(
                $sql_1 = "SELECT DISTINCT *
                FROM users
                WHERE $cS1 ORDER BY username DESC LIMIT 15")->fetchColumn()) {
                foreach ($sqlo_____dbx___xX__->query($sql_1) as $roo0w____X___xX__) {
                $u = $roo0w____X___xX__["username"];
                $uid = $roo0w____X___xX__["id"];
                $nmeDpy_FULL = nme_dply($sqlo_____dbx___xX__,$uid);
                $usrTag_FULL = base_ext($sqlo_____dbx___xX__,$uid);
                $lastlogin = timeAgo(strtotime($roo0w____X___xX__["lastlogin"])); 
                $v = $roo0w____X___xX__["verified"];
                $v = '';
                if($v == "y")
                $v = '<i>&#10003;</i>';
                $profile_pic = '<img src="'.$path4a.'img/temp/no_imgLnk2.svg" alt="'.$u.'">';
                if($userPic = $roo0w____X___xX__["avatar"])
                $profile_pic = '<img src="'.$path4a.'u/'.$uid.'/avt/'.$userPic.'" alt="'.$u.'">';

                $schRsl_t1 = "";
                if($v === 'f') {
                    $schRsl_t1 = '<span class="schRsl-type3 fR dI">U</span>';
                }
                
                $output .= '
                <a href="'.$path4a.'user.php?u='.$u.'">
                    <li class="schRsl-Wpr3">
                        '.$profile_pic.'
                        <div class="schRsl-Rgt dI">
                            <div class="schRsl-Ttl w100">'.$usrTag_FULL.'</div>
                            <div class="schRsl-Abt">Last logged in '.$lastlogin.'</div>

                        </div>
                        '.$schRsl_t1.'
                    </li>
                </a>
                ';
            }
        } 
        if($sqlo_____dbx___xX__->query(
            $sql_1 = "SELECT DISTINCT u.*,b.* 
            FROM users AS u
            INNER JOIN blog AS b 
            WHERE u.id=b.uid
            AND $cS2 ORDER BY b.date DESC LIMIT 15")->fetchColumn()) {
            foreach ($sqlo_____dbx___xX__->query($sql_1) as $roo0w____X___xX__) {
                $bid = $roo0w____X___xX__["bid"];
                $uid = $roo0w____X___xX__["uid"];
                $t = $roo0w____X___xX__["title"];
                $a = $roo0w____X___xX__["username"];
                $nmeDpy_FULL = nme_dply($sqlo_____dbx___xX__,$uid);
                $usrTag_FULL = base_ext($sqlo_____dbx___xX__,$uid);
                $tags = convertHashtags($roo0w____X___xX__["tags"]);
                $cat = $roo0w____X___xX__["category"];
                $b_date = timeAgo(strtotime($roo0w____X___xX__["date"])); 
                $vLnk1 = ''.$path4a.'view.php?t=blog&v='.$bid.'';
                $cLnk1 = ''.$path4a.'category.php?t=blog&c='.$cat.'';
                $cov1 = '<img class="IMG_BlgS" src="'.$path4a.'img/temp/no_imgLnk.svg" alt="'.$t.'">';
                if($cov = $roo0w____X___xX__["cover"])
                $cov1 = '<img class="IMG_BlgS" src="'.$path4a.'blog/img/'.$bid.'/'.$cov.'" alt="'.$t.'">';

                $schRsl_t2 = "";
                if($v === 'f') {
                    $schRsl_t2 = '<span class="schRsl-type fR dI">B</span>';
                }

                $output .= '
                <a href="'.$path4a.''.$vLnk1.'">
                    <li class="schRsl-Wpr">
                        '.$cov1.'
                        <div class="schRsl-Rgt dI">
                            <b class="schRsl-Ttl">'.$t.'</b>
                            <div><a href="'.$cLnk1.'">'.$cat.'</a></div>
                            <div>'.$tags.'</div>
                            <div class="schRsl-Abt">by '.$usrTag_FULL.' '.$b_date.'</div>

                        </div>
                        '.$schRsl_t2.'
                    </li>
                </a>
                ';
            }
        } 
        if($sqlo_____dbx___xX__->query(
            $sql_1 = "SELECT DISTINCT u.*,f.* 
            FROM users AS u
            INNER JOIN forum AS f 
            WHERE u.id=f.uid
            AND $cS3 ORDER BY f.date DESC LIMIT 15")->fetchColumn()) {
            foreach ($sqlo_____dbx___xX__->query($sql_1) as $roo0w____X___xX__) {
                $fid = $roo0w____X___xX__["fid"];
                $uid = $roo0w____X___xX__["uid"];
                $t = $roo0w____X___xX__["title"];
                $a = $roo0w____X___xX__["username"];
                $nmeDpy_FULL = nme_dply($sqlo_____dbx___xX__,$uid);
                $usrTag_FULL = base_ext($sqlo_____dbx___xX__,$uid);
                $tags = convertHashtags($roo0w____X___xX__["tags"]);
                $cat = $roo0w____X___xX__["category"];
                $b_date = timeAgo(strtotime($roo0w____X___xX__["date"])); 
                $vLnk2 = ''.$path4a.'view.php?t=blog&v='.$fid.'';
                $cLnk2 = ''.$path4a.'category.php?t=blog&c='.$cat.'';
                $cov2 = '<img class="IMG_BlgS" src="'.$path4a.'img/temp/no_imgLnk.svg" alt="'.$t.'">';
                if($cov = $roo0w____X___xX__["cover"])
                $cov2 = '<img class="IMG_BlgS" src="'.$path4a.'forum/img/'.$fid.'/'.$cov.'" alt="'.$t.'">';

                $schRsl_t3 = "";
                if($v === 'f') {
                    $schRsl_t3 = '<span class="schRsl-type fR dI">F</span>';
                }
                
                $output .= '
                <a href="'.$path4a.''.$vLnk2.'">
                    <li class="schRsl-Wpr">
                        '.$cov2.'
                        <div class="schRsl-Rgt dI">
                            <b class="schRsl-Ttl">'.$t.'</b>
                            <div><a href="'.$cLnk2.'">'.$cat.'</a></div>
                            <div>'.$tags.'</div>
                            <div class="schRsl-Abt">by '.$usrTag_FULL.' '.$b_date.'</div>

                        </div>
                        '.$schRsl_t3.'
                    </li>
                </a>
                ';
            }
            
            echo "$output $dntTl";
        } else 
            echo "Sorry no results for <b>$s</b>";
        // newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
    } 
} else newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
?> 
