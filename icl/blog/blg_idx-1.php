<?php
$mod1a = "";	
$mod1 = "";
$path_1a = '';
try {
    if($sql1 = "SELECT DISTINCT u.*,b.* 
        FROM users AS u 
        INNER JOIN blog AS b 
        WHERE u.id=b.uid AND
        b.youtube_link IS NOT NULL 
        AND b.approved = 'y' 
        ORDER BY b.date DESC LIMIT 6") {
        foreach ($sqlo_____dbx___xX__->query($sql1) as $roo0w____X___xX__) {
            // users
            $a_idx_1 = $roo0w____X___xX__["username"];
            // $nmeDpy_uFULL = nme_dply($sqlo_____dbx___xX__,$a_idx_1);
            $t1_ac = $roo0w____X___xX__["avatar"];
            
            $aidPth_ac = $roo0w____X___xX__["uid"];
            $bImgAvtr = '<img src="'.$m_path.'u/'.$aidPth_ac.'/avt/'.$t1_ac.'" alt="'.$a_idx_1.'">';
            if($bImgAvtr == NULL){
                $bImgAvtr = '<img src="'.$m_path.'img/temp/user-pic_1.0.png" alt="'.$a_idx_1.'">';
            }
            // blog
            $id_idx_1 = $roo0w____X___xX__["bid"];
            // title cover clip
            $t_idx_1 = $roo0w____X___xX__["title"];
            $max_title = 40;
            if(strlen($t_idx_1) > $max_title) {
                $offset = ($max_title - 3) - strlen($t_idx_1);
                $t_idx_1 = substr($t_idx_1, 0, strrpos($t_idx_1, ' ', $offset)) . '...';
            }
            //
            
            $tags_idx_1 = convertHashtags($roo0w____X___xX__["tags"]);
            $cat_idx_1 = $roo0w____X___xX__["category"];
            $cov_idx_1 = $roo0w____X___xX__["cover"];
            // new to SQL Please add NULL
            $yth_idx_1 = $roo0w____X___xX__["youtube_thumbnail"];
            $ytl_idx_1a = substr($roo0w____X___xX__["youtube_link"], -11);
            $ytl_idx_1b = "https://www.youtube.com/watch?v=";
            $ytl_idx_1c = "$ytl_idx_1b$ytl_idx_1a";
            $date_idx_1 = timeAgo(strtotime($roo0w____X___xX__["date"])); 
            // data string clip
            if (strlen($d_idx_1 = Strip_tags($roo0w____X___xX__["data"])) > $max_data = 150) {
                $offset = ($max_data - 3) - strlen($d_idx_1);
                $d_idx_1 = substr($d_idx_1, 0, strrpos($d_idx_1, ' ', $offset)) . '...';
            }
            //
            $vLnk = 'view.php?t=blog&v='.$id_idx_1.'';
            $cLnk = 'category.php?t=blog&c='.$cat_idx_1.'';
            if($yth_idx_1 == NULL && $cov_idx_1 == NULL) {
                $yth_idx_1 = '<img src="'.$m_path.'img/temp/no_imgLnk.svg" alt="'.$a_idx_1.'">';
            } else if($yth_idx_1 == NULL){
                $yth_idx_1 = '<img src="'.$m_path.'blog/img/'.$id_idx_1.'/'.$cov_idx_1.'" alt="'.$a_idx_1.'">';
            } else {
                $yth_idx_1 = '<img src="'.$yth_idx_1.'">';
            }
            // add text (data) limit cut
            // add 
            $mod1a .= '
            <div class="mod1a-Wpr">
                <div class="mod1a-1">
                    <span>by: 
                        <a href="user.php?u='.$a_idx_1.'">'.$bImgAvtr.'</a>
                        <a href="user.php?u='.$a_idx_1.'">'.$nmeDpy_GLBL.'</a>
                    </span>
                    <span>'.$date_idx_1.'</span>
                </div>
                <div class="mod1a-2">
                    '.$yth_idx_1.'
                    <div class="mod-yt"></div>
                </div>
                <div class="mod1a-3">
                    <div><a href="view.php?t=blog`&v='.$id_idx_1.'">'.$t_idx_1.'</a></div>
                    <div>'.$d_idx_1.'</div>
                </div>
                <div class="mod1a-4">
                    <a href="'.$ytl_idx_1c.'" target="_blank">view on youtube</a>
                </div>
            </div>
            ';

        }
        $mod1 = '
        <div class="bFltr-Wpr">
            <div class="bFltr-Ctr">
                <!-- mod 1 start -->
                <h4>Latest YouTube</h4>
                <div class="bFltr-mod1">
                    '.$mod1a.'
                </div>
                <!-- mod 1 end -->
            </div>
        </div>
        ';
    } 
} catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}
?>