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
$refLgc = "";
//
$c_typeA = "forum_p";
$c_typeB = "forum_post";
$tVw = 'forum_views';
$tUv = "forum_upvote";
$tCmt = "forum_comments";
$IMG_class = 'class="IMG_FrmS"';
$id_uNq = "fid";
$cid_uNq = "fcid";
$rid_uNq = "frid";
$pst_uNq = "forum_cmnt";

// unique view for user page
if (isset($_GET["u"])) {
    $u = preg_replace('#[^a-z0-9.@]#i', '', $_GET['u']);
    $uid = $sql______dbx___xX__->query("SELECT id FROM users WHERE username ='$u' LIMIT 1")->fetchColumn();
    $unqUsr = "AND f.uid = $uid";
} if($_COOKIE['hcde'] === $log_HshCde &&
    $user_ok === TRUE && $log_id >= 1) {
    if ($sql______dbx___xX__->query("SELECT * FROM users WHERE id='$log_id' AND code = '$log_HshCde' LIMIT 1")->fetchColumn()) {
        $pst_vcx = '<a href="post.php?t=forum">post a thread?</a>';
    }
}
//
$MAX__ = 5;
if ($page === "category") {
    $unqUsr = "AND f.category = '$c'";
} if ($page === "view" && isset($t) == 'forum') {
    $unqUsr = "AND f.fid = '$v'";
} if ($page === "search") {
    $unqUsr = "AND $sqry_trm2";
} if ($page === "forum") {
    $MAX__ = 30;
}
try {
    $count_fc = $sql______dbx___xX__->query("SELECT COUNT(fid) FROM forum")->fetchColumn();
    if($sqlo_____dbx___xX__->query(
        $sql__1 = "SELECT u.*,f.* 
        FROM users AS u
        INNER JOIN forum AS f 
        WHERE u.id=f.uid 
        AND f.hide = '0'
        AND f.remove = '0'
        $unqUsr
        ORDER BY f.date DESC LIMIT 5")->fetchColumn()) {
		foreach ($sqlo_____dbx___xX__->query($sql__1) as $roo0w____X___xX__) {
            $uid_vc = $roo0w____X___xX__["uid"];
            $id_vc = $roo0w____X___xX__["fid"];
            $t_vc = $roo0w____X___xX__["title"];
            $nmeDpy_FULL = nme_dply($sqlo_____dbx___xX__,$uid_vc);
            $usrTag_FULL = base_ext($sqlo_____dbx___xX__,$uid_vc);
            $cnt_c_vc = $roo0w____X___xX__["v_count"];
            $tag_vc = convertHashtags($roo0w____X___xX__["tags"]);
            $cat_vc = $roo0w____X___xX__["category"];
            $cov1_vc = $roo0w____X___xX__["cover"];
            $d_vc = $roo0w____X___xX__["data"];
            $aid_vc = $roo0w____X___xX__["id"];
            $date_vc = timeAgo(strtotime($roo0w____X___xX__["date"]));
            
            if ($p_load === 'm' && $page != "home" && $page != "user" && $page != "search") {
                function addPathToImageSrc1_2_1($d_vc) {
                    if (empty($d_vc)) {
                        return $d_vc; // Return unchanged if the input is empty
                    }
                    
                    // Ensure the input is properly encoded
                    $d_vc = mb_convert_encoding($d_vc, 'HTML-ENTITIES', 'UTF-8');
                    
                    $dom = new DOMDocument;
                    libxml_use_internal_errors(true); // Suppress errors
                    $dom->loadHTML($d_vc, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); // Handle HTML fragments
                    libxml_clear_errors(); // Clear errors to prevent clutter
                    
                    $images = $dom->getElementsByTagName('img');
                    foreach ($images as $image) {
                        $src = $image->getAttribute('src');
                        if ($src) { // Only modify if `src` is not empty
                            $image->setAttribute('src', '../' . ltrim($src, '/')); // Avoid double slashes
                        }
                    }
                    
                    return $dom->saveHTML();
                }
                $d_vc = addPathToImageSrc1_2_1($d_vc);
            }

            $max_data = 800;
            if ($p_load === 'm') {
              $max_data = 300;  
            }
            
            if ($page !== "view" && strlen($d_vc) > $max_data) {
                $d_vc = strip_tags($roo0w____X___xX__["data"]);
                $offset = ($max_data - 3) - strlen($d_vc);
                $d_vc = substr($d_vc, 0, strrpos($d_vc, ' ', $offset)) . '...';
            }
            
            $vLnk = 'view.php?t=forum&v='.$id_vc.'';
            $cLnk = 'category.php?t=forum&c='.$cat_vc.'';
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
                if (isset($t) == 'forum') {
                    $cov_path = "icl/frm_pst/";
                    $cov_vc = '<img id="imgVwXa_'.$id_vc.'" class="IMG_BlgS cP" src="'.$m_path.''.$cov_path.''.$id_vc.'/'.$cov1_vc.'"/>';
                }
            } 
            $pstSet__xXx_1 = "";
            if ($log_id != "" && $user_ok == true) {
                $pstSet__xXx_1 = '
                <div class="dDm_pstX dI fR" onclick="post_mNu_tGl(\''.$c_typeB.'\',\'pa\',\''.$id_vc.'\',\''.$page.'\')">
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

            $pstSet_frm_xXx = "";
            if ($log_id != "" && $user_ok == true) {
                $pstSet_frm_xXx = '
                <div class="dDm_pstX dI fR" onclick="post_mNu_tGl(\'forum_reply\',\'pb\',\''.$id_vc.'\',\''.$page.'\')">
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

            $output_fc .= '
            <div class="thrd-Wpr">
                <div class="thrd-Inr">
                    '.$trCnt_Arw.'
                    <a href="'.$vLnk.'">
                        '.$cov_vc.'
                    </a>
                    <div class="thrd-Inr2">
                            '.$pstSet_frm_xXx.'
                        <div>
                            <a class="thrd-Tle" href="'.$vLnk.'">'.$t_vc.'</a>
                            <div class="thrd-data imgVW_x1">'.$d_vc.'</div>
                            <small>by '.$usrTag_FULL.'</small> | 
                            <small><a href="'.$vLnk.'">'.$cntCmnt.' comments</a></small> | 
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
                    '.$u.' hasn\'t posted any forums as of yet 
                </div>
            </div>
            ';
        }
    }
} catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}
?>