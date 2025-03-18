<?php
$path_1b = "";
$unqUsr = "";
$__vwImg = "";
$DCNtbl = "";
$output_vc = "";
$pstSet1b = "";
$pstEdt1ba = "";
$pstEdt2ba = "";
$pstEdt3ba = "";
$pstEdt1bb = "";
$pstEdt2bb = "";
$pstEdt3bb = "";
//
$pst_vcx = "";
$c_typeA = "blog_p";
$c_typeB = "blog_post";
$tVw = 'blog_views';
$tUv = "blog_upvote";
$tCmt = "blog_comments";
$IMG_class = 'class="IMG_BlgS"';
$cid_uNq = "bcid";
$rid_uNq = "brid";
$pst_uNq = "blog_cmnt";

// unique view for user page
if (isset($_GET["u"])) {
    $u = preg_replace('#[^a-z0-9.@]#i', '', $_GET['u']);
    $uid = $sql______dbx___xX__->query("SELECT id FROM users WHERE username ='$u' LIMIT 1")->fetchColumn();
    $unqUsr = "AND b.uid = $uid";
} if($_COOKIE['hcde'] === $log_HshCde &&
    $user_ok === TRUE && $log_id >= 1) {
    if ($sql______dbx___xX__->query("SELECT * FROM users WHERE id='$log_id' AND code = '$log_HshCde' LIMIT 1")->fetchColumn()) {
        $pst_vcx = '<a href="post.php?t=blog">post a blog?</a>';
    }
}
//
if ($page === "category") {
    $unqUsr = "AND b.category = '$c'";
} if ($page === "view" && isset($t) == 'blog') {
    $unqUsr = "AND b.bid = '$v'";
} if ($page === "search") {
    $unqUsr = "AND $sqry_trm2";
}
//
try {
    $count_bc = $sql______dbx___xX__->query("SELECT COUNT(bid) FROM blog WHERE approved = 'y'")->fetchColumn();
    if($sqlo_____dbx___xX__->query(
        $sql__1 = "SELECT u.*,b.* 
        FROM blog AS b
        INNER JOIN users AS u 
        WHERE u.id=b.uid
        -- 3.5 updates
        -- AND b.aid = :___b__aid___
        -- AND b.aid = :___b__aid___
        -- AND b.title = :___b__ttl___ 
        -- AND b.v_count = :___b__vnt___
        -- AND b.tags = :___b__tag___
        -- AND b.category = :___b__cat___
        -- AND b.data = :___b__dta___
        -- AND b.dte = :___b__date___
        AND b.approved = 'y' 
        AND b.hide = '0'
        AND b.remove = '0'
        $unqUsr
        ORDER BY b.date DESC LIMIT 5")->fetchColumn()) {
        // $sql__1->bindParam([
        // ':___u__uid___' => $uid_vc, PDO::PARAM_INT,
        // ':___b__aid___' => $aid_vc, PDO::PARAM_INT,
        // ':___b__bid___' => $id_vc, PDO::PARAM_INT,
        // ':___b__ttl___' => $t_vc, PDO::PARAM_STR,
        // ':___b__vnt___' => $cnt_c_vc, PDO::PARAM_INT,
        // ':___b__tag___' => $tag_vc, 
        // ':___b__cat___' => $cat_vc, PDO::PARAM_STR,
        // ':___b__dta___' => $d_vc,
        // ':___b__dte___' => $date_vc, ]); 
		foreach ($sqlo_____dbx___xX__->query($sql__1) as $roo0w____X___xX__) {
            $uid_vc = $roo0w____X___xX__["uid"];
            $id_vc = $roo0w____X___xX__["bid"];
            $t_vc = $roo0w____X___xX__["title"];
            $nmeDpy_FULL = nme_dply($sqlo_____dbx___xX__,$uid_vc);
            $usrTag_FULL = base_ext($sqlo_____dbx___xX__,$uid_vc);
            $cnt_c_vc = $roo0w____X___xX__["v_count"];
            $tag_vc = convertHashtags($roo0w____X___xX__["tags"]);
            $cat_vc = $roo0w____X___xX__["category"];
            $d_vc = $roo0w____X___xX__["data"];
            $aid_vc = $roo0w____X___xX__["id"];
            $date_vc = timeAgo(strtotime($roo0w____X___xX__["date"]));
            // if ($page !== "view" && strlen($d_vc) > $max_data = 370) {
            //     $d_vc = strip_tags($roo0w____X___xX__["data"]);
            //     $offset = ($max_data - 3) - strlen($d_vc);
            //     $d_vc = substr($d_vc, 0, strrpos($d_vc, ' ', $offset)) . '...';
            // }

            if ($p_load === 'm' && $page != "home" && $page != "user" && $page != "search") {             
                function addPathToImageSrc($d_vc) {
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
                $d_vc = addPathToImageSrc($d_vc);
            }
            //     // *********************************************************************\

            //     $modified_html = preg_replace('/(<img[^>]+>)(.*)(<\/img>)/i', '$1../$2$3', $d_vc);;

            
            //     // Output the modified HTML
            //     $d_vc = $modified_html;
            // }

             
            
            $vLnk = 'view.php?t=blog&v='.$id_vc.'';
            $cLnk = 'category.php?t=blog&c='.$cat_vc.'';
            if ($page === "view") {
                $cov3_vc = $roo0w____X___xX__["cover"]; // for meta tags
                $y_thumb = isset($roo0w____X___xX__["youtube_thumbnail"]);
                $refLgc = "There are no references listed.";
                if (isset($roo0w____X___xX__["references"])) {
                    $refLgc = '<div id="body1_pt3" name="body1_pt3" class="RefPst_frame">References::<br>'.nl2br($roo0w____X___xX__["references"]).'</div>';
                }
                if ($y_link = isset($roo0w____X___xX__["youtube_link"])) {
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
            if($cov1_vc = $roo0w____X___xX__["cover"]){ 
                $cov_path = "blog/img/";
                if($p_load === 'f') {
                    $unqVW = 'style="width: 92px"';
                    if ($page === 'view') {
                        $unqVW = 'style="width: 100%; height: auto; margin: 10px 0px 20px;"';
                    }
                    $__vwImg = 'onclick="avtVIEW('.$id_vc.')"';
                    $cov_vc = '<img id="imgVwXa_'.$id_vc.'" style="width: 92px" '.$__vwImg.' class="IMG_BlgS" src="'.$m_path.'img/temp/no_imgLnk.svg" alt="'.$t_vc.'">';
                    //
                    $img_p = 'src="'.$m_path.''.$cov_path.''.$id_vc.'/'.$cov1_vc.'"';
                    $cov_vc = '<img id="imgVwXa_'.$id_vc.'" '.$__vwImg.' class="IMG_BlgS cP" '.$img_p.' '.$unqVW.'/>';
                } else if($p_load === 'm') {
                    $__vwImg = 'onclick="avtVIEW('.$id_vc.')"';
                    $cov_vc = '<img id="imgVwXa_'.$id_vc.'" '.$__vwImg.' class="" src="'.$m_path.'img/temp/no_imgLnk.svg" alt="'.$t_vc.'">';
                    //
                    $img_p = 'src="'.$m_path.''.$cov_path.''.$id_vc.'/'.$cov1_vc.'"';
                    $cov_vc = '<img id="imgVwXa_'.$id_vc.'" '.$__vwImg.' class=" cP" '.$img_p.'/>';
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

            $pstSet__xXx = "";
            if ($log_id != "" && $user_ok == true) {
                $pstSet__xXx = '
                <div class="dDm_pstX dI fR" onclick="post_mNu_tGl(\'blog_reply\',\'pb\',\''.$id_vc.'\',\''.$page.'\')">
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

            $cntCmnt_vc = $sql______dbx___xX__->query("SELECT COUNT(opid) FROM $tCmt WHERE opid = '$id_vc'")->fetchColumn();
            $opt_sty1 = "";
            $opt_sty2= ""; 
            if($p_load === 'f') {
                $output_bc .= '
                <div class="Zb-Wpr w100 di pad-T" >
                    <div class="Zb-Inr2 w100">
                        <div class="Zview-Ttl dB">
                            '.$pstSet__xXx.'
                            <b class="dB">'.$t_vc.'</b>
                            <small>by '.$usrTag_FULL.'</small> | 
                                <small><a href="'.$vLnk.'">'.$cntCmnt_vc.' comments</a></small> | 
                                <small>
                                    <span>'.$date_vc.'</span>
                                    <span></span>
                                </small> |
                            <span>
                                <a name="'.$cat_vc.'" href="'.$cLnk.'">
                                    <span>'.$cat_vc.'</span>
                                </a> |
                                <span>&nbsp;(<a href="search.php?s=">'.$tag_vc.'</a>)</span>
                            </span>
                        </div>
                        <div class="dI pA">
                            '.$trCnt_Arw.'
                            <a href="'.$vLnk.'">'.$cov_vc.'</a>
                        </div>
                        <div class="blg_Desc2 dI imgVW_x1"><a href="'.$vLnk.'" style ="color: #333;">'.$d_vc.'</a></div>
                    </div>
                </div>
                ';
            } else if($p_load === 'm') {
                $output_bc .= '
                <div class="Zb-Wpr w100 di" >
                    <div class="Zb-Inr2 w100">
                        <div class="imgWdx1">
                            <div class="Zview-Ttl dI">
                                <b class="dI">'.$t_vc.'</b>
                            </div>
                            <a href="'.$vLnk.'">'.$cov_vc.'</a>
                        </div>
                        <div class="Zview-Ttl dB">
                            '.$trCnt_Arw.'
                            <small>by '.$usrTag_FULL.'</small> | 
                                <small><a href="'.$vLnk.'">'.$cntCmnt_vc.' comments</a></small> | 
                                <small>
                                    <span>'.$date_vc.'</span>
                                    <span></span>
                                </small>
                            <span>
                            </span>
                        </div>
                    </div>
                </div>
                ';
            }
            
            if ($page === "view") {
                include_once("".$m_path."icl/glbl/glbl_cmnts_all.php");
            }
        }
    } else {
        if (isset($u)) {
            $output_vc .= '
            <div class="Zb-Wpr w100 di pad-T">
                '.$u.' hasn\'t posted any blogs as of yet 
            </div>
            ';
        }
    }
} catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}

// $t1 = "cat@gmail.com";
// $t2 = "catgmail.com";
// $t3 = "This i%^&s a t\$st";
// $t4 = "THIS IS A TEST";
// $t5 = "this is a test";
// $t6 = "";

// $nval = "";
// // filter_var($t2,FILTER_VALIDATE_EMAIL) ? $tr = "valid" : $tr = "not valid";
// $nval = filter_var($t2,FILTER_VALIDATE_EMAIL);

// $load__eCde__y = filter_var($log_HshCde."$%^&*<html></html>%bhc##^</>",FILTER_SANITIZE_STRING);


// echo "FIND TEST $nval <br>
// FLTR: $load__eCde__y <br>
// RAW:  $log_HshCde$%^&*<html></html>%bhc##^</>
// ";

?>