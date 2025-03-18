<?php
/* 
based in connections database
connect content
handshake (accepted) is in but is not forced
- - accept connect request
any user can connect and unconnect

1 (people you are connected with) ** // current page
2 (people who are connected with you)

aid1,usid (the current user landing page)

uvid (who viewed the page)

*/
// NOTE: write interactions logic
//aid1 = connecter (the person connecting)
//aid2 = connectee (the person being connected)
//
$cnct_1HTML = '';
$pnl5_edit_1 = "";
$cnct_1_cnt_chk = "";
$cnt_btn_1 = "";
$cln = "'";
$orLogic = "";
$unqUsr = "";
$unqUsr2 = "";
$output_uc = "";
$none_uc = "";
$Vmore_uc = "";
//
// unique view for user page
if ($page === "home") {
    if ($p_load === 'f') {
        $max = 20;
    } else if ($p_load === 'm') {
        $max = 6;
    }
    $sql__1_x = "SELECT * FROM users WHERE activated='0' or activated='1' AND deactivated = '0' LIMIT $max";
    $sql__2_x = $sql__1_x;
} else if ($page === "user") { 
    $unqUsr = "WHERE uid1='$uid'";
    $cnct_1_count = $sqlo_____dbx___xX__->query($sql__1_x = "SELECT COUNT(id) FROM connections $unqUsr")->fetchColumn();
} else if ($page === "search") {
    $unqUsr = "WHERE uid1='$log_id'";
    $sql__1_x = "SELECT COUNT(id) FROM users WHERE $sqry_trm1";
    $sql__2_x = "SELECT * FROM users WHERE $sqry_trm1 AND deactivated = '0'";
}
//
if($sqlo_____dbx___xX__->query($sql__1_x)->fetchColumn()) {
    if ($page === "user" || $page === "search") {
        $max = 6;
        $all_cnct_1 = [];
        
        if($sqlo_____dbx___xX__->query(
            $sql_cnct_1 = 
            "SELECT c.uid2,c.accepted,c.blocked,uv.unq_vws 
            FROM connections AS c 
            INNER JOIN user_views AS uv 
            $unqUsr
            AND c.blocked='0' AND c.accepted='1'
            ORDER BY uv.unq_vws LIMIT $max")->fetchColumn()) {
            foreach ($sqlo_____dbx___xX__->query($sql_cnct_1) as $row) {
                $cnct_1_id = array_push($all_cnct_1, $row["uid2"]);
                $cnct_1_cnt_chk = $row["accepted"]; 
                $cnct_1_blk_chk = $row["blocked"];
            }
            $orLogic = '';
            foreach($all_cnct_1 as $key => $uqid){
                    $orLogic .= "id='$uqid' OR ";
            }
            $orLogic = chop($orLogic, "OR ");
            if ($page === "search") {
                $orLogic = "WHERE $sqry_trm1";
            }
            $orLogic = "WHERE $orLogic";
            if ($page === "user") {
                $sql__2_x = "SELECT * FROM users $orLogic";
            }
        }
    }
	foreach ($sqlo_____dbx___xX__->query($sql__2_x) as $row) {
        $cnct_1_id = $row["id"];
        $cnct_1_nme = $row["username"];
        $nmeDpy_FULL = nme_dply($sqlo_____dbx___xX__,$cnct_1_id);;
		$cnct_1_avt = $row["avatar"];
        // grabbing amount of connections this unique user has
        $cnnct_cnt_x = $sqlo_____dbx___xX__->query("SELECT COUNT(id) FROM connections WHERE uid1='$cnct_1_id'")->fetchColumn();
        $cnct_1_pic = ''.$m_path.'img/temp/no_imgLnk2.svg';
		if($cnct_1_avt){
			$cnct_1_pic = ''.$m_path.'u/'.$cnct_1_id.'/avt/'.$cnct_1_avt.'';
		}  if ($log_id === $cnct_1_id) {
            $cnt_btn = "";
        }
        if ($user_ok === true) {
            // user looking in form log perspectie
            $cnt_btn_1 = '<span id="gBtn_cx_'.$cnct_1_id.'"><button onclick="glblUSr_sMOD(\''.$log_id.'\',\''.$cnct_1_id.'\',\''.$log_HshCde.'\',\'cnct_y\')">connect</button></span>'; 
            if ($cnct_1_cnt_chk) {
                $cnt_btn_1 = '<span id="gBtn_rx_'.$cnct_1_id.'"><button onclick="glblUSr_sMOD(\''.$log_id.'\',\''.$cnct_1_id.'\',\''.$log_HshCde.'\',\'cnct_x\')">connected</button></span>';
            } if ($cnct_1_id === $log_id) {
                $cnt_btn_1 = '<span><button style="visibility: hidden;">&nbsp;</button></span>';
            }
        }

        $d_i = 'dI';
        if($p_load === 'm') {
            $d_i = '';
        }

        //
        $output_uc .= '
        <div class="usrConts_Inr">
            <a href="user.php?u='.$cnct_1_nme.'">
                <img src="'.$cnct_1_pic.'" alt="'.$cnct_1_nme.'" title="'.$cnct_1_nme.'">
            </a>
            <div class="usrCont_Rgt '.$d_i.'">
                <div class="">
                    '.$nmeDpy_FULL.'
                </div>
                <div>'.$cnnct_cnt_x.' connectons</div>
                '.$cnt_btn_1.'
            </div>
        </div>
        ';
    }
} else {
    if ($page === "user") {
        $output_uc = $u." isn't connecting with anyone yet";
    } 
    if ($page === "search") {
        $output_uc = $u." isn't connecting with anyone yet";
    }
    
}
?>