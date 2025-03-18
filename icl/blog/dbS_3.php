<?php
$mod1a = "";	
$mod1 = "";
$mod2a = "";	
$mod2 = "";
$blgX = "";
$path_1a = '../../';
$m_path = "";
if (isset($_POST['s']) && isset($_POST['cHk_aRy'])) {
    $s = filter_var($_POST['s'],FILTER_SANITIZE_STRING);
    $cHk_aRy = filter_var($_POST['cHk_aRy'],FILTER_SANITIZE_STRING);
} else newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
include_once(''.$path_1a.'icl/cnnc_t.php');
// include_once(''.$path_1a.'icl/c_sts.php');
include_once(''.$path_1a.'icl/addons/hashtag.php');
include_once(''.$path_1a.'icl/addons/baseext.php');
include_once(''.$path_1a.'icl/addons/nmedply.php');
include_once(''.$path_1a.'prs/time_system.php');
if($s && $cHk_aRy) {
    try {
        if($count_uvt = $sqlo_____dbx___xX__->query(
        $sql_1 = "SELECT DISTINCT u.*,b.*
            FROM blog AS b
            INNER JOIN users AS u
            -- checkbox grab
            WHERE u.id = b.uid
            AND b.youtube_link IS NOT NULL
            OR b.category LIKE '$cHk_aRy%' -- (split) array match
            OR b.title LIKE'$s%'
            OR b.tags LIKE '$s%'
            OR b.data LIKE '$s%' 
            ORDER BY b.date DESC")->fetchColumn()) {
            foreach ($sqlo_____dbx___xX__->query($sql_1) as $roo0w____X___xX__) {
                $aid1_b1 = $roo0w____X___xX__["id"];
                $u1_b1 = $roo0w____X___xX__["username"];
                $s1_b1 = timeAgo(strtotime($roo0w____X___xX__["date"])); 
                $t1_b1 = $roo0w____X___xX__["avatar"];
                $bImgAvtr = '<img src="'.$m_path.'u/'.$aid1_b1.'/avt/'.$t1_b1.'" alt="'.$u1_b1.'">';
                if($bImgAvtr == NULL){
                $bImgAvtr = '<img src="'.$m_path.'img/temp/user-pic_1b.0.png" alt="'.$u1_b1.'">';
                }
                // blog
                $id_idx_1ba = $roo0w____X___xX__["bid"];
                // title cover clip
                if(strlen($t_idx_1ba = $roo0w____X___xX__["title"]) > $max_title = 40) {
                    $offset = ($max_title - 3) - strlen($t_idx_1ba);
                    $t_idx_1ba = substr($t_idx_1ba, 0, strrpos($t_idx_1ba, ' ', $offset)) . '...';
                }
                //
                $a_idx_1ba = $roo0w____X___xX__["username"];
                $tags_idx_1ba = convertHashtags($roo0w____X___xX__["tags"]);
                $cat_idx_1ba = $roo0w____X___xX__["category"];
                $cov_idx_1ba = $roo0w____X___xX__["cover"];
                // new to SQL Please add NULL
                $yth_idx_1ba = $roo0w____X___xX__["youtube_thumbnail"];
                $ytl_idx_1ba = $roo0w____X___xX__["youtube_link"];
                $date_idx_1ba = timeAgo(strtotime($roo0w____X___xX__["date"])); 
                // data string clip
                $d_idx_1ba = $roo0w____X___xX__["data"];
                $max_data = 100;

                if (strlen($d_idx_1ba) > $max_data) {
                    $offset = ($max_data - 3) - strlen($d_idx_1ba);
                    $d_idx_1ba = substr($d_idx_1ba, 0, strrpos($d_idx_1ba, ' ', $offset)) . '...';
                }
                //
                $vLnk = 'view.php?t=blog&c='.$cat_idx_1ba.'&v='.$id_idx_1ba.'';
                $cLnk = 'category.php?t=blog&c='.$cat_idx_1ba.'';
                if($yth_idx_1ba == NULL && $cov_idx_1ba == NULL) {
                    $yth_idx_1ba = '<img src="'.$m_path.'img/temp/ads_1b.0.png" alt="'.$u1_b1.'">';
                } else if($yth_idx_1ba == NULL){
                    $yth_idx_1ba = '<img src="'.$m_path.'blog/img/'.$id_idx_1ba.'/'.$cov_idx_1ba.'" alt="'.$u1_b1.'">';
                } else {
                    $yth_idx_1ba = '<img src="'.$yth_idx_1ba.'">';
                }
                // add text (data) limit cut
                // add 
                $mod1a .= '
                <div class="mod1a-Wpr">
                    <div class="mod1a-1">
                        <span>by: 
                            <a href="user.php?u='.$a_idx_1ba.'">'.$bImgAvtr.'</a>
                            <a href="user.php?u='.$a_idx_1ba.'">'.$a_idx_1ba.'</a>
                        </span>
                        <span>'.$date_idx_1ba.'</span>
                    </div>
                    <div class="mod1a-2">
                        '.$yth_idx_1ba.'
                        <div class="mod-yt"></div>
                    </div>
                    <div class="mod1a-3">
                        <div><a href="view.php?t=blog`&c='.$cat_idx_1ba.'&v='.$id_idx_1ba.'">'.$t_idx_1ba.'</a></div>
                        <div>'.$d_idx_1ba.'</div>
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
        
        } else {
            $mod1 = '
            <div class="bFltr-Wpr">
                <div class="bFltr-Ctr">
                    Sorry no results listed under kodoninja.com for <b>'.$s.'</b>
                </div>
            </div>
            ';
        }
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    } try {
        if($sql_2 = "SELECT DISTINCT u.*,b.*
        FROM blog AS b
        INNER JOIN users AS u
        -- checkbox grab
        WHERE u.id = b.uid
        AND b.category LIKE '$cHk_aRy%' -- (split) array match
        OR b.title LIKE'$s%'
        OR b.tags LIKE '$s%'
        OR b.data LIKE '$s%' 
        ORDER BY b.date DESC") {
            foreach ($sqlo_____dbx___xX__->query($sql_2) as $roo0w____X___xX__2) {
                // users
                $u1_b2 = $roo0w____X___xX__2["username"];
                $s1_b2 = timeAgo(strtotime($roo0w____X___xX__2["date"])); 
                $t1_b2 = $roo0w____X___xX__2["avatar"];
                // id is unique for any changed username
                // above logic seperates by u.id unique to u.id 
                // logic is sound don't change
                $aidPth_ac = $roo0w____X___xX__2["id"];
                $bImgAvtr = '<img src="img/temp/user-pic_1b.0.png" alt="'.$u1_b2.'">';
                if($bImgAvtr){
                    $bImgAvtr = '<img src="u/'.$aidPth_ac.'/'.$t1_b2.'" alt="'.$u1_b2.'">';    
                }
                // blog
                $id_idx_1b = $roo0w____X___xX__2["bid"];
                // title cover clip
                if(strlen($t_idx_1b = $roo0w____X___xX__2["title"]) > $max_title = 40) {
                    $offset = ($max_title - 3) - strlen($t_idx_1b);
                    $t_idx_1b = substr($t_idx_1b, 0, strrpos($t_idx_1b, ' ', $offset)) . '...';
                }
                //
                $a_idx_1b = $roo0w____X___xX__2["username"];
                $tags_idx_1b = convertHashtags($roo0w____X___xX__2["tags"]);
                $cat_idx_1b = $roo0w____X___xX__2["category"];
                $cov_idx_1b = $roo0w____X___xX__2["cover"];
                $ytl_idx_1b = $roo0w____X___xX__2["youtube_link"];
                $date_idx_1b = timeAgo(strtotime($roo0w____X___xX__2["date"])); 
                // data string clip
                if (strlen($d_idx_1b = $roo0w____X___xX__2["data"]) > $max_data = 100) {
                    $offset = ($max_data - 3) - strlen($d_idx_1b);
                    $d_idx_1b = substr($d_idx_1b, 0, strrpos($d_idx_1b, ' ', $offset)) . '...';
                }
                //
                $vLnk = 'view.php?t=blog&c='.$cat_idx_1b.'&v='.$id_idx_1b.'';
                $cLnk = 'category.php?t=blog&c='.$cat_idx_1b.'';
                $vth_idx_1b = '<img src="blog/img/'.$id_idx_1b.'/'.$cov_idx_1b.'"/>';
                // add text (data) limit cut
                // add 
                $mod2a .= '
                <div class="mod1a-Wpr">
                    <div class="mod1a-1">
                        <span>by: 
                            <a href="user.php?u='.$a_idx_1b.'">'.$bImgAvtr.'</a>
                            <a href="user.php?u='.$a_idx_1b.'">'.$a_idx_1b.'</a>
                        </span>
                        <span>'.$date_idx_1b.'</span>
                    </div>
                    <div class="mod1a-2">
                        '.$vth_idx_1b.'
                    </div>
                    <div class="mod1a-3">
                        <div><a href="view.php?t=blog&c='.$cat_idx_1b.'&v='.$id_idx_1b.'">'.$t_idx_1b.'</a></div>
                        <div>'.$d_idx_1b.'</div>
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
            //
                
        } else {
            $mod2 = '
            <div class="bFltr-Wpr">
                <div class="bFltr-Ctr">
                    Sorry no results listed under kodoninja.com for <b>'.$s.'</b>
                </div>
            </div>
            ';
        }

    echo $blgX = ''.$mod1.''.$mod2.'';
    
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }
} else newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
?>