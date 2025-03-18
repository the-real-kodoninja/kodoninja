<?php
$dwn1 = "";
$p2_ld1 = "";

// same logic for both views
try {
    if($sqlo_____dbx___xX__->query(
        $sql1 = "SELECT DISTINCT * FROM downloads ORDER BY date DESC")->fetchColumn()) {
		foreach ($sql______dbx___xX__->query($sql1) as $roo0w____X___xX__) {
            $t1_ld1 = $roo0w____X___xX__["id"]; // location folder
            $u1_ld1 = $roo0w____X___xX__["user_id"];
            $ty_ld1 = $roo0w____X___xX__["format"];
            $ty_2d1 = $roo0w____X___xX__["c_type"];
            // title logic start
            $t_ld1 = $roo0w____X___xX__["title"];
            $max_title = 30;
            if(strlen($t_ld1) > $max_title) {
                $offset = ($max_title - 3) - strlen($t_ld1);
                $t_ld1 = substr($t_ld1, 0, strrpos($t_ld1, ' ', $offset)) . '...';
            }
            // title logic end
            $p_ld1 = $roo0w____X___xX__["price"];
            // description logic start
            $d_2d1 = $roo0w____X___xX__["description"];
            if (strlen($d_ld1 = $roo0w____X___xX__["description"]) > $max_desc = 80) {
                $offset = ($max_desc - 3) - strlen($d_ld1);
                $d_ld1 = substr($d_ld1, 0, strrpos($d_ld1, ' ', $offset)) . '...';
            }
            // description logic end
            // cover logic start
            $covFull = '<img src="'.$m_path.'img/temp/user-pic_1.0.png" alt="'.$u1_ld1.'">';
            if($cov_ld1 = $roo0w____X___xX__["cover"]) {
                $covFull = '<img class="prd_v1" src="'.$m_path.'downloads/'.$t1_ld1.'/'.$cov_ld1.'" alt="'.$t_ld1.'">';
            } 
            // cover logic end
            $fl_ld1 = $roo0w____X___xX__["filename"]; // source file for downloads
            $s1_ld1 = timeAgo(strtotime($roo0w____X___xX__["date"])); 
            //
            // data-price="'.$p_ld1.'"
            // data-type2="'.$ty_2d1.'"
            // data-type1="'.$ty_ld1.'"
            // data-title="'.$t_ld1.'"
            // data-desc="'.$d_ld1.'"
            //
            $dwn1 .= '
            <div class="dlwn_PrdWpr" data-obj="'.$p_ld1.','.$ty_2d1.','.$ty_ld1.','.$t_ld1.','.$d_ld1.'">
                '.$covFull.'
                <div class="dlwn_PrdRgt">
                    <div class="PrdTtl">'.$t_ld1.'</div>
                    <ul>
                        <li>'.$p_ld1.'</li>
                        <li>'.$ty_2d1.'</li>
                        <li id="dlFtr_3c">'.$ty_ld1.'</li>
                    </ul>
                    <div class="PrdDes" alt="'.$d_2d1.'">'.$d_ld1.'</div>
                    <div class="prd_v3">
                        <a target="_blank" href="'.$m_path.'downloads/'.$t1_ld1.'/'.$fl_ld1.'"><button class="prdBtn1">view</button></a>
                        <a target="_blank" href="'.$m_path.'downloads/'.$t1_ld1.'/'.$fl_ld1.'" download><button class="prdBtn2">download</button></a>
                    </div>
                </div>
            </div>
            ';
        //
        }
    } else {
        $dwn1 = 'Sorry it looks like there are no downloads.';
    }

    $dlwn_TopWpr = '
    <div class="dlwn_TopWpr">
        <div class="dv1">
            <h1>Downloads</h1>
        </div></div>
        '.$fltrModX.'
        <div class="dlwn_MnWpr">
            <h4>The downloads are mostly free, all I ask is that you follow us; Subscribe to our YouTube. Stay connected, watch, read, laugh, & enjoy.</h4>
            <h6 id="dlwn_Rslt_1" class="fL">Showing Everything</h6>
            <div id="dlwn_Rslt_2" class="w100">
                <span id="tst_1">'.$dwn1.'</span>
                <span id="tst_2"></span>
            </div>
        </div>
    </div>
    ';
} catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}
?>