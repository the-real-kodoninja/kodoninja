<?php
$mod2a = "";
$mod2 = "";
$path_1a = '';

// same logic for both views  
try {
    if($count_uvt = $sqlo_____dbx___xX__->query(
        $sql2 = "SELECT DISTINCT u.*,b.* 
            FROM users AS u 
            INNER JOIN blog AS b 
            WHERE u.id = b.uid 
            AND b.approved = 'y' 
            ORDER BY b.date DESC")->fetchColumn()) {
        foreach ($sqlo_____dbx___xX__->query($sql2) as $roo0w____X___xX__2) {
            // users
            $aid1_ac = $roo0w____X___xX__2["id"];
            $u1_ac = $roo0w____X___xX__2["username"];
            $s1_ac = timeAgo(strtotime($roo0w____X___xX__2["date"])); 
            $t1_ac = $roo0w____X___xX__2["avatar"];
            $bImgAvtr = '<img src="'.$m_path.'u/'.$aid1_ac.'/avt/'.$t1_ac.'" alt="'.$u1_ac.'">';
            if($bImgAvtr == NULL){
                $bImgAvtr = '<img src="'.$m_path.'img/temp/no_imgLnk.svg" alt="'.$u1_ac.'">';
            }
            // blog
            $id_idx_1 = $roo0w____X___xX__2["bid"];
            // title cover clip
            if(strlen($t_idx_1 = $roo0w____X___xX__2["title"]) > $max_title = 40) {
                $offset = ($max_title - 3) - strlen($t_idx_1);
                $t_idx_1 = substr($t_idx_1, 0, strrpos($t_idx_1, ' ', $offset)) . '...';
            }
            //
            $a_idx_1 = $roo0w____X___xX__2["username"];
            $tags_idx_1 = convertHashtags($roo0w____X___xX__2["tags"]);
            $cat_idx_1 = $roo0w____X___xX__2["category"];
            $cov_idx_1 = $roo0w____X___xX__2["cover"];
            $ytl_idx_1 = $roo0w____X___xX__2["youtube_link"];
            $date_idx_1 = timeAgo(strtotime($roo0w____X___xX__2["date"])); 
            // data string clip
            $d_idx_1 = Strip_tags($roo0w____X___xX__2["data"]);
            $max_data = 130;

            if (strlen($d_idx_1) > $max_data) {
                $offset = ($max_data - 3) - strlen($d_idx_1);
                $d_idx_1 = substr($d_idx_1, 0, strrpos($d_idx_1, ' ', $offset)) . '...';
            }
            //
            $vLnk = 'view.php?t=blog&v='.$id_idx_1.'';
            $cLnk = 'category.php?t=blog&c='.$cat_idx_1.'';
            $vth_idx_1 = '<a href="view.php?t=blog&v='.$id_idx_1.'"><img src="'.$m_path.'blog/img/'.$id_idx_1.'/'.$cov_idx_1.'"/></a>';
            // add text (data) limit cut
            // add 
            $mod2a .= '
            <div class="mod1a-Wpr">
                <div class="mod1a-1">
                    <span>by: 
                        <a href="user.php?u='.$a_idx_1.'">'.$bImgAvtr.'</a>
                        <a href="user.php?u='.$a_idx_1.'">'.$nmeDpy_GLBL.'</a>
                    </span>
                    <span>'.$date_idx_1.'</span>
                </div>
                <div class="mod1a-2">
                    '.$vth_idx_1.'
                </div>
                <div class="mod1a-3">
                    <div><a href="view.php?t=blog&v='.$id_idx_1.'">'.$t_idx_1.'</a></div>
                    <div>'.$d_idx_1.'</div>
                </div>
            </div>
            ';


        }

        $mod2 = '
        <div class="bFltr-Wpr">
            <div class="bFltr-Ctr">
                <!-- mod 1 start -->
                <h4>From kodoninja.com</h4>
                <div class="bFltr-mod1">
                    '.$mod2a.'
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