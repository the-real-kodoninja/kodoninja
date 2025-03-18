<?php
$mHrIn1 = "";
$mHrIn2 = "";
$tglImg = "";
$mHdrInf = "";
$path_1a = '';
//
try {
    if($sqlo_____dbx___xX__->query(
        $sql1 = "SELECT u.*,b.* 
        FROM users AS u
        INNER JOIN blog AS b 
        WHERE u.id=b.uid
        ORDER BY b.views DESC LIMIT 10")->fetchColumn()) {
        foreach ($sqlo_____dbx___xX__->query($sql1) as $roo0w____X___xX__) {
            $cid_ldx = $roo0w____X___xX__["bid"];
            $viw_ldx = $roo0w____X___xX__["views"];
            $aut_ldx = $roo0w____X___xX__["username"];
            $cat_ldx = $roo0w____X___xX__["category"];
            $tag_ldx = convertHashtags($roo0w____X___xX__["tags"]);
            $cov_ldx = $roo0w____X___xX__["cover"];
            if(strlen($ttl_ldx = $roo0w____X___xX__["title"]) > $max_title = 100) {
                $offset = ($max_title - 3) - strlen($ttl_ldx);
                $ttl_ldx = substr($ttl_ldx, 0, strrpos($ttl_ldx, ' ', $offset)) . '...';
            }
            $tglImg .= '<img class="mHdr-cVr" src="'.$m_path.'blog/img/'.$cid_ldx.'/'.$cov_ldx.'" alt="'.$ttl_ldx.'">';
            // title end
            $ytl_ldx = $roo0w____X___xX__["youtube_link"];
            $yth_ldx = $roo0w____X___xX__["youtube_thumbnail"];
            // data start strip_tags()
            if (strlen($dat_ldx = strip_tags($roo0w____X___xX__["data"])) > $max_data = 905) {
                $offset = ($max_data - 3) - strlen($dat_ldx );
                $dat_ldx  = substr($dat_ldx , 0, strrpos($dat_ldx , ' ', $offset)) . '...';
            }
            // data end
            $dte_ldx = timeAgo(strtotime($roo0w____X___xX__["date"])); 
            //
            //
            $mHrIn1 .= '
            <div class="bHdr_t1 dI">
                <div class="bHdr_t1a w100">Most viewed at <span>'.$viw_ldx.'</span></div>
                <div class="p10" style="height: 275px;">
                    <div class="bHdrImgx">'.$tglImg.'</div>
                    <h4><a href="view.php?t=blog&v='.$cid_ldx.'">'.$ttl_ldx.'</a></h4>
                    <div class="bHdr_t1b">by <a href="user.php?u='.$aut_ldx.'">'.$nmeDpy_GLBL.'</a> Posted: '.$dte_ldx.'</div>
                    <ul class="cNt-Hsh">
                        <li>'.$tag_ldx.'</li>
                    </ul>
                    <p>'.$dat_ldx.'</p>
                </div>
            </div>
            ';

            $mHrIn2 .= '
                <li>
                    <div class="bHdr_t2a">
                        <a href="view.php?t=blog&v='.$cid_ldx.'">'.$ttl_ldx.'</a>
                    </div>
                    <div class="bHdr_t2b">
                        <span>by <a href="user.php?u='.$aut_ldx.'">'.$nmeDpy_GLBL.'</a> '.$dte_ldx.'</span>
                        <span>'.$viw_ldx.'</span>
                    </div>
                </li>
            ';        

        }

        if($p_load === 'f') {
            $mHdrInf = '
            <div class="bHdr_tx">
                <div class="pA">
                    '.$mHrIn1.'
                    <ul class="bHdr_t2 dI">
                        <div class="bHdr_t1a w100">Most viewed</div>
                        <div class="bHdr-scRl">
                            '.$mHrIn2.'
                        </div>
                    </ul>
                </div>
            </div>
            ';
        } else if($p_load === 'm') {
            $mHdrInf = '
            <div class="bHdr_tx">
                <div class="bHdr_tx1">
                    '.$mHrIn1.'
                </div>
            </div>
            ';
        }
    }
    
} catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}

?>
