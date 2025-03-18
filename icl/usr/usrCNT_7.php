<?php
$output_achh_1 = "";
$pnl7_edit_1 = "";
$MAX = 20;
// is up set presets empty
$ctype = "";
$cid_ach_a = "";
$covx_ach_a = "";
$ttl_ach_a = "";
$all_ach_1 = [];
$all_ach_x = [];
$sql1_ach_NR = "";
$cidx_ach_ax = "";
$sql_test = mysqli_query($cnnc_t, "SELECT cid,type FROM archived WHERE uid = '$uid'");
if (mysqli_num_rows($sql_test)) {
    while ($row = mysqli_fetch_array($sql_test, MYSQLI_ASSOC)) {
        $cidx_ach_ax = $row["cid"];
        $tpe_ach_ax = $row["type"];
    }
    $sql1_ach_FULL = mysqli_query($cnnc_t, "SELECT DISTINCT a.*,up.*,b.*,f.*,g.*
            FROM archived AS a 
            LEFT JOIN user_post AS up ON a.cid = up.pid
            LEFT JOIN blog AS b ON a.cid = b.bid
            LEFT JOIN forum AS f ON a.cid = f.fid
            LEFT JOIN goal AS g on a.cid = g.gid
            WHERE a.uid = '$uid' AND a.cid = $cidx_ach_ax
            ORDER BY a.savedate DESC LIMIT $MAX");
    if ($sql1_ach_NR = mysqli_num_rows($sql1_ach_FULL)) {
        while ($row = mysqli_fetch_array($sql1_ach_FULL, MYSQLI_ASSOC)) {
            $cid_ach_ax = $row["cid"];
            $aid_ach_a = array_push($all_ach_1, $row["id"]); 
            $uid_ach_a = $row["uid"];
            if ($tpe_ach_ax === "up") {
                $cid_ach_a = $row["pid"]; 
            } 
            // forums // blog // goal
            if ($tpe_ach_ax === "b" || $tpe_ach_ax === "f" || $tpe_ach_ax === "g") {
                $ttl_ach_a = $row["title"];
                $dta_ach_a = $row["data"];
                $tag_ach_a = convertHashtags($row["tags"]);
                $cat_ach_a = $row["category"];
                $cov_ach_a = $row["cover"];
                if ($tpe_ach_ax === "b") {
                    $ctype = 'blog';
                    $cid_ach_a = $row["bid"];
                } else if ($tpe_ach_ax === "f") {
                    $ctype = 'forum';
                    $cid_ach_a = $row["fid"];
                } else if ($tpe_ach_ax === "g") {
                    $ctype = 'goal';
                    $cid_ach_a = $row["gid"];
                }
            }
            $dte_ach_ax = timeAgo(strtotime($row["savedate"])); 
            $dte_ach_a = timeAgo(strtotime($row["date"]));
            
            $orLogic = '';
            foreach($all_ach_1 as $key => $uqid){
                    $orLogic .= "id='$uqid' OR ";
            }
            $orLogic = chop($orLogic, "OR ");
            $sql1_ach2_FULL = mysqli_query($cnnc_t, "SELECT username FROM users WHERE $orLogic");
            while ($row = mysqli_fetch_array($sql1_ach2_FULL, MYSQLI_ASSOC)){ 
                $nme_ach_a = $row["username"];
                $covx_ach_a = '<img src="img/temp/no_imgLnk.svg" alt="'.$ttl_ach_a.' by '.$nme_ach_a.'">';
                if($cov_ach_a){
                    $covx_ach_a = '<img src="'.$m_path.''.$ctype.'/img/'.$cid_ach_a.'/'.$cov_ach_a.'" alt="'.$ttl_ach_a.' by '.$nme_ach_a.'">';
                } 
                //
                $clnk_ach_a = 'view.php?t='.$ctype.'&v='.$cid_ach_a.'';
                $ulnk_ach_a = 'user.php?u='.$nme_ach_a.'';
                // developer
                $dev_chk = '(id: '.$aid_ach_a.' | uid: '.$uid_ach_a.' | cid: '.$cid_ach_ax.' | type: '.$tpe_ach_ax.' | savedate: '.$dte_ach_ax.')';
                $output_achh_1 .= '
                <div id="ach_cid_'.$cid_ach_ax.'" class="thrd-Wpr" style="max-width: 360px;">
                    <div>
                        <a href="'.$clnk_ach_a.'">
                            '.$covx_ach_a.'
                        </a>
                        <div class="dI">
                            <div class="w100">
                                <small>'.$ctype.' by <a href="'.$ulnk_ach_a.'">'.$nme_ach_a.'</a></small></span>
                                <span class="fR">'.$dte_ach_ax.'</span>
                            </div>
                            <div class="ach_txt_1">
                                <a href="'.$clnk_ach_a.'">
                                    '.$ttl_ach_a.'
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                ';
            } 
        }
    } 
} else {
    $output_achh_1 = '<div class="pad-T">'.$u.' hasn\'t added any blog archives yet.</div>';
}


if ($log_username == $u) {
    $pnl7_edit_1  = '';
}


$full_CNT_7 = '
<div class="Cnt_Bck" id="usrCNT_7">
    <div class="usrHdr">
        <div class="pad-T dI">
            Archived
        </div>
        <div class="pad-T fR dI ">
            <span>'.$sql1_ach_NR.'</span>
        </div>
        '.$pnl7_edit_1.'
    </div>
    <div id="usrTgl_1a" class="dB">
        '.$output_achh_1.'
    </div>
</div>
';
?>