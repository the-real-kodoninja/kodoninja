<?php 
$frm_v = "";
$none2_acR = "";
$Vmore2_acR = "";	
try {
	if($numrows1_acR = $sqlo_____dbx___xX__->query(
        $sql2R = "SELECT DISTINCT a.*,f.* 
        FROM archived AS a 
        INNER JOIN forum AS f 
        WHERE a.username='$log_username' AND a.tid = f.id AND a.type='f'
        ORDER BY a.savedate DESC LIMIT 10")->fetchColumn()) {
		
        if($numrows1_acR > 10){
            $Vmore1_acR = '
            <div class="Pad1">
                <a href="#">View more</a>
            </div>
            ';
        }
        foreach ($sqlo_____dbx___xX__->query($sql2R) as $roo0w____X___xX__) {
            $id2_acR = $roo0w____X___xX__["id"];
            $uid2_acR = $roo0w____X___xX__["uid"];
            $tid2_acR = $roo0w____X___xX__["tid"];
            $t2_acR = $roo0w____X___xX__["type"];
            $u2_acR = $roo0w____X___xX__["username"];
            $s2_acR = $roo0w____X___xX__["savedate"];
            // forums
            $id_fcR = $roo0w____X___xX__["id"];
            $t_fcR = $roo0w____X___xX__["title"];
            $a_fcR = $roo0w____X___xX__["author"];
            $tags_fcR = $roo0w____X___xX__["tags"];
            $cat_fcR = $roo0w____X___xX__["category"];
            $cov_fcR = $roo0w____X___xX__["cover"];
            $d_fcR = $roo0w____X___xX__["data"];
            $date_fcR = $roo0w____X___xX__["date"];
            $vLnk2 = 'view.php?t=forum&c='.$cat_fcR.'&v='.$id_fcR.'';
            $cLnk2 = 'category.php?t=forum&c='.$cat_fcR.'';
            if($cov_fcR == NULL){
                $cov_fcR = '<img src="img/temp/ads_1.0.png" alt="'.$log_username.'">';
            } else {
                $cov_fcR = '<img src="'.$cov_fcR.'">';
            }
            
            $frm_v .= '
            <div id="PnlItem_B1" class="usr_PnlY Pnl_View dN">
                '.$cov_acR.'
                <div class="mini-pst_Rgt">
                    <b>'.$t_acR.'</b>
                    <div class="mini-pst_Desc">
                    '.$d_acR.'  
                    </div>
                </div>
                <div class="OptWpr1 cntDel_x1 fR dN" >
                    <div class="OptDel1" onclick="upTgle(\'usrItm_A1\')"><b>Delete</b></div>
                </div>
            </div>
            ';
        }
    }
} catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}

?>