<?php
$path_1b = "";
$unqUsr = "";
$__vwImg = "";
$output_vc = "";
$pstSet1f = "";
$pstEdt1fa = "";
$pstEdt2fa = "";
$pstEdt3fa = "";
$pstEdt1fb = "";
$pstEdt2fb = "";
$pstEdt3fb = "";
$usr_vc2a = "";
$pst_vcx = "";
$refLgc = "";
//
$c_typeA = "goal_p";
$c_typeB = "goal_post";
$c_typeC = "goal_reply";
$tVw = 'goal_views';
$tUv = "goal_upvote";
$tCmt = "goal_comments";
$IMG_class = 'class="IMG_FrmS"';
$id_uNq = "gid";
$cid_uNq = "gcid";
$rid_uNq = "grid";
$trm_vc = '';
$pst_uNq = "goal_cmnt";

if ($p_load === 'm') {
    function addPathToImageSrc3_2($d_vc) {
        $dom = new DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML($d_vc);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $image) {
            $src = $image->getAttribute('src');
            $image->setAttribute('src', '../' . $src);
        }
        return $dom->saveHTML();
    }
}

// unique view for user page
if (isset($_GET["u"])) {
    $u = preg_replace('#[^a-z0-9.@]#i', '', $_GET['u']);
    $uid = $sql______dbx___xX__->query("SELECT id FROM users WHERE username ='$u' LIMIT 1")->fetchColumn();
    $unqUsr = "AND g.uid = $uid";
} if($_COOKIE['hcde'] === $log_HshCde &&
    $user_ok === TRUE && $log_id >= 1) {
    if ($sql______dbx___xX__->query("SELECT * FROM users WHERE id='$log_id' AND code = '$log_HshCde' LIMIT 1")->fetchColumn()) {
        $pst_vcx = '<a href="post.php?t=goal">post a goal?</a>';
    }
}
//
$MAX__ = 5;
if ($page === "category") {
    $unqUsr = "AND g.category = '$c'";
} if ($page === "view" && isset($t) == 'goal') {
    $unqUsr = "AND g.gid = '$v'";
} if ($page === "search") {
    $unqUsr = "AND $sqry_trm2";
} if ($page === "goal") {
    $MAX__ = 30;
}
try {
    $count_gc = $sql______dbx___xX__->query("SELECT COUNT(gid) FROM goal")->fetchColumn();
    if($sqlo_____dbx___xX__->query(
        $sql__1 = "SELECT u.*,g.* 
        FROM users AS u
        INNER JOIN goal AS g 
        WHERE u.id=g.uid
        AND g.hide = '0'
        AND g.remove = '0'
        $unqUsr
        ORDER BY g.date DESC LIMIT $MAX__")->fetchColumn()) {
	foreach ($sql______dbx___xX__->query($sql__1) as $roo0w____X___xX__) {
        $uid_vc = $roo0w____X___xX__["uid"];
        $id_vc = $roo0w____X___xX__["gid"];
        $t_vc = $roo0w____X___xX__["title"];
        $nmeDpy_FULL = nme_dply($sql______dbx___xX__,$uid_vc);
        $usrTag_FULL = base_ext($sql______dbx___xX__,$uid_vc);
        $cnt_c_vc = $roo0w____X___xX__["v_count"];
        $tag_vc = convertHashtags($roo0w____X___xX__["tags"]);
        $cat_vc = $roo0w____X___xX__["category"];
        $cov1_vc = $roo0w____X___xX__["cover"];
        $d_vc = $roo0w____X___xX__["data"];
        $aid_vc = $roo0w____X___xX__["id"];
        $prg1_vc = $roo0w____X___xX__["progress"].'%';
        $date_vc = timeAgo(strtotime($roo0w____X___xX__["startdate"]));
        $date2_vc = timeAgo(strtotime($roo0w____X___xX__["enddate"]));

        if ($p_load === 'm') {
            $d_vc = addPathToImageSrc3_2($d_vc);
        }

        $vLnk = 'view.php?t=goal&v='.$id_vc.'';
            $cLnk = 'category.php?t=goal&c='.$cat_vc.'';
            if ($page === "view") {
                $__vwImg = 'onclick="avtVIEW('.$id_vc.')"';
                $cov3_vc = $roo0w____X___xX__["cover"]; // for meta tags
                if ($y_link != null) {
                    $y_vid = '
                    <iframe src="'.$y_link.'" title="'.$t.'" style="width: 100%;" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    '; 
                    $cov_vc2 = $y_vid;
                } else {
                    $cov_vc2 = ''.$img_vc2.'';
                }
                $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
                if ($log_id != $uid_vc) {
                        try {
                            $sql______dbx___xX__->exec("UPDATE `$t` SET `views` = views +1 WHERE id='$id_vc' LIMIT 1");
                        } catch (PDOException $newError) {
                            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                        } try {
                            $sql______x___xX__3 = $sql______dbx___xX__->prepare("INSERT INTO $tVw(
                                        usid, 
                                        vcid, 
                                        ip, 
                                        seendate) 
                                    VALUES(:oid,
                                        :vid,
                                        :ip,
                                        :date)");
                            $sql______x___xX__3->execute([
                                        ':oid' => $log_id,
                                        ':vid' => $id_vc,
                                        ':ip' => $ip,
                                        ':date' => date('Y-m-d H:i:s')]);
                        } catch (PDOException $newError) {
                            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                        } 
                    }
            } 
            $cov_vc = '<img id="imgVwXa_'.$id_vc.'" '.$__vwImg.' class="IMG_FrmS" src="'.$m_path.'img/temp/no_imgLnk.svg" alt="'.$u.'">';
            $img_p = 'src="'.$m_path.'blog/img/'.$id_vc .'/'.$cov1_vc.'"';
            if($cov1_vc){ 
                $cov_path = "";
                if (isset($t) == 'goal') {
                    $cov_path = "icl/gol_pst/";
                    $cov_vc = '<img id="imgVwXa_'.$id_vc.'" class="IMG_BlgS cP" src="'.$m_path.''.$cov_path.''.$id_vc.'/'.$cov1_vc.'"/>';
                }
            } 
            $pstSet__xXx_1 = "";
            if ($log_id != "" && $user_ok == true) {
                $pstSet__xXx_1 = '
                <div class="dDm_pstX dI fR" onclick="post_mNu_tGl(\''.$c_typeC.'\',\'pa\',\''.$id_vc.'\',\''.$page.'\')">
                    <div>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <!-- universal menu loads here -->
                    <ul id="post_mNu_id_'.$id_vc.'"  class="dDm_pst dN"></ul>
                </div>
                ';                            
            }

            $uvte_1a = "pa";
            include_once("".$m_path."icl/glbl/glbl_upvote_all.php");
            
        $pstSet_gol_xXx = "";
        if ($log_id != "" && $user_ok == true) {
            $pstSet_gol_xXx = '
            <div class="dDm_pstX dI fR" onclick="post_mNu_tGl(\''.$c_typeB.'\',\'pb\',\''.$id_vc.'\',\''.$page.'\')">
                <div>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!-- universal menu loads here -->
                <ul id="post_mNu_id_'.$id_vc.'"  class="dDm_pst dN"></ul>
            </div>
            ';                            
        }

        $cntCmnt = $sql______dbx___xX__->query("SELECT COUNT(opid) FROM $tCmt WHERE opid = '$id_vc'")->fetchColumn();

        $prg_vc = '
        <div class="glPgBr_1">
            <div style="width: '.$prg1_vc.';">'.$prg1_vc.'</div>
        </div>';
        $output_vc .= '
        <div class="thrd-Wpr">
            <div class="thrd-Inr">
                '.$trCnt_Arw.'
                <a href="'.$vLnk.'">
                    '.$cov_vc.'
                </a>
                <div class="thrd-Inr2">
                        '.$pstSet_gol_xXx.'
                    <div>
                        <a class="thrd-Tle" href="'.$vLnk.'">'.$t_vc.'</a>
                        <small>by '.$usrTag_FULL.'</small>
                        <small>
                            <span>'.$date_vc.'</span>
                            <span></span>
                        </small> |
                        <small>
                            <a name="'.$cat_vc.'" href="'.$cLnk.'">
                                <span>'.$cat_vc.'</span>
                            </a> |
                            <span>&nbsp;(<a href="search.php?=">'.$tag_vc.'</a>)</span>
                        </small>
                    </div>
                </div>
            </div>
            <div class="thrd-data imgVW_x1">'.$d_vc.'</div>
            '.$prg_vc.'
        </div>
        ';
            if ($page === "view") {
                include_once("".$m_path."icl/glbl/glbl_cmnts_all.php");
            }
        }
    } else {
        if (isset($u)) {
            $output_vc .= '
            <div class="thrd-Wpr">
                <div class="thrd-Inr">
                    '.$u.' hasn\'t posted any goals as of yet 
                </div>
            </div>
            ';
        }
    }
} catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}
?>