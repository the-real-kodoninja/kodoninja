<?php 
$blg_v = "";
$none1_acR = "";
$Vmore1_acR = "";


try {
	if($numrows1_acR = $sqlo_____dbx___xX__->query(
        $sql1R = "SELECT DISTINCT a.*,b.* 
        FROM archived AS a 
        INNER JOIN blog AS b 
        WHERE a.uid='$log_id' 
        AND a.cid = b.bid 
        AND a.type='b'
        ORDER BY a.savedate DESC LIMIT 10")->fetchColumn()) {
		
        if($numrows1_acR > 10){
            $Vmore1_acR = '
            <div class="Pad1">
                <a href="#">View more</a>
            </div>
            ';
        }
        foreach ($sqlo_____dbx___xX__->query($sql1R) as $roo0w____X___xX__) {
            // archived
            $id1_acR = $roo0w____X___xX__["id"];
            $uid1_acR = $roo0w____X___xX__["uid"];
            $t1_acR = $roo0w____X___xX__["type"];
            $s1_acR = $roo0w____X___xX__["savedate"];
            // blogs 
            $id_acR = $roo0w____X___xX__["id"];
            $t_acR = $roo0w____X___xX__["title"];
            // $a_acR = $roo0w____X___xX__["username"]; // left join
            $tags_acR = $roo0w____X___xX__["tags"];
            $cat_acR = $roo0w____X___xX__["category"];
            $cov_acR = $roo0w____X___xX__["cover"];
            $d_acR = $roo0w____X___xX__["data"];
            $date_acR = $roo0w____X___xX__["date"];
            $vLnk = 'view.php?t=blog&c='.$cat_acR.'&v='.$id_acR.'';
            $cLnk = 'category.php?t=blog&c='.$cat_acR.'';
            $cov_acR = '<img src="'.$cov_acR.'">';
            if($cov_acR){
                $cov_acR = '<img src="img/temp/ads_1.0.png" alt="'.$log_username.'">';
            } 
            
            $blg_v .= '
            <div id="PnlItem_A1" class="usr_PnlY Pnl_View dN">
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