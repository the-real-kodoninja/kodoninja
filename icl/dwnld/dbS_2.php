<?php
$dwn2 = "";
$path = "";
$m_path = "";

if ($path == "p1") {
    $m_path = "";
} else if ($path == "p2") {
    $m_path = "../";
} else {
    $m_path = "";
}

if(isset($_POST['s']) && isset($_POST['cHk_aRy']) && isset($_POST['f3'])){
    
	$s = preg_replace('/[^a-zA-Z0-9 ]/m', ' ', $_POST ['s']); 
	$s = mysqli_real_escape_string($cnnc_t, $s);
    $f3 = preg_replace('/[^a-zA-Z0-9 ]/m', ' ', $_POST ['f3']); 
	$f3 = mysqli_real_escape_string($cnnc_t, $f3);
    $cHk_aRy = preg_replace('/[^a-zA-Z0-9 ]/m', ' ', $_POST ['cHk_aRy']); 
	$cHk_aRy = mysqli_real_escape_string($cnnc_t, $cHk_aRy);
    
	if ($s == ""){
		echo $dwn2;
		exit;		
	}

    if ($f3 == 0) {
        $f3 = "free";
    }

    try {
        if($sqlo_____dbx___xX__->query(
           $sql = "SELECT *
			FROM downloads
            -- checkbox grab
            WHERE format LIKE '$cHk_aRy%' -- (split) array match
            AND c_type LIKE '$cHk_aRy%' -- (split) array match
            -- price slider grab
            AND price='$f3'
            OR title LIKE '$s%' 
            OR description LIKE '$s%' 
            ORDER BY date DESC")->fetchColumn()) {
            foreach ($sql______dbx___xX__->query($sql1) as $roo0w____X___xX__2) {
                $t1_ld2s = $roo0w____X___xX__2["id"]; // location folder
                $u1_ld2s = $roo0w____X___xX__2["user_id"];
                $ty_ld2s = $roo0w____X___xX__2["format"];
                $ty_2d1 = $roo0w____X___xX__2["c_type"];
                // title logic start
                $t_ld2s = $roo0w____X___xX__2["title"];
                $max_title = 35;
                if(strlen($t_ld2s) > $max_title) {
                    $offset = ($max_title - 3) - strlen($t_ld2s);
                    $t_ld2s = substr($t_ld2s, 0, strrpos($t_ld2s, ' ', $offset)) . '...';
                }
                // title logic end
                $p_ld2s = $roo0w____X___xX__2["price"];
                // description logic start
                $d_ld2s = $roo0w____X___xX__2["description"];
                $d_2d1 = $roo0w____X___xX__2["description"];
                $max_desc = 80;
                if (strlen($d_ld2s) > $max_desc) {
                    $offset = ($max_desc - 3) - strlen($d_ld2s);
                    $d_ld2s = substr($d_ld2s, 0, strrpos($d_ld2s, ' ', $offset)) . '...';
                }
                // description logic end
                // cover logic start
                $cov_ld2s = $roo0w____X___xX__2["cover"];
                if($cov_ld2s != NULL) {
                    $covFull = '<img class="prd_v1" src="'.$m_path.'downloads/'.$t1_ld2s.'/'.$cov_ld2s.'" alt="'.$t_ld2s.'">';
                } else{
                    // temp holder // create error image 
                $covFull = '<img src="'.$m_path.'img/temp/user-pic_1.0.png" alt="'.$u1_ld2s.'">';
                }
                // cover logic end
                $fl_ld2s = $roo0w____X___xX__2["filename"]; // source file for downloads
                $s1_ld2s = timeAgo(strtotime($roo0w____X___xX__2["date"])); 
            
                
                $dwn2 .= '
                <div class="dlwn_PrdWpr" data-obj="'.$p_ld2s.','.$ty_2d1.','.$ty_ld2s.','.$t_ld2s.','.$d_ld2s.'">
                    '.$covFull.'
                    <div class="dlwn_PrdRgt">
                        <div class="PrdTtl">'.$t_ld2s.'</div>
                        <ul>
                            <li>'.$p_ld2s.'</li>
                            <li>'.$ty_2d1.'</li>
                            <li id="dlFtr_3c">'.$ty_ld2s.'</li>
                        </ul>
                        <div class="PrdDes" alt="'.$d_2d1.'">'.$d_ld2s.'</div>
                        <div class="prd_v3">
                            <a target="_blank" href="'.$m_path.'downloads/'.$t1_ld2s.'/'.$fl_ld2s.'"><button class="prdBtn1">view</button></a>
                            <a target="_blank" href="'.$m_path.'downloads/'.$t1_ld2s.'/'.$fl_ld2s.'" download><button class="prdBtn2">download</button></a>
                        </div>
                    </div>
                </div>
                ';
            }
            echo $dwn2;
        } else {
            echo $dwn2 = "Sorry no results for <b>$s (filter: $cHk_aRy $f3)
            </b>, try again with another keyword &#128570;";
            exit;
        } 
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    } 
} else {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}
?>
