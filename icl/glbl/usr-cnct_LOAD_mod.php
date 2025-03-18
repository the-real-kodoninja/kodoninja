<?php 
$path_1b = "";
$bnrBtn = "";
$cnt_btn_x = "";
if ($log_id !== "" && $log_username !== "" && $user_ok === true) {
    if(isset($_GET["u"])) { // user condition
        $u = filter_var($_GET['u'],FILTER_SANITIZE_STRING);
        try { 
            if($sqlo_____dbx___xX__->query(
                $sql______x___xX__ = "SELECT id FROM users WHERE username ='$u' LIMIT 1")->fetchColumn()) {
                foreach ($sql______dbx___xX__->query($sql______x___xX__) as $row) { $uid = $row["id"];}
            } 
        } catch (PDOException $newError) {
            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
        }
    }
    // everywhere a user is shown // user will be able to connect
    //
    $cnt_btn = '<span id="gBtn_cx_'.$uid.'"><button onclick="glblUSr_sMOD(\''.$log_id.'\',\''.$uid.'\',\''.$log_HshCde.'\',\'cnct_y\')">connect</button></span>'; 
    $blk_btn = '<em id="gBtn_bx_'.$uid.'"><li onclick="glblUSr_sMOD(\''.$log_id.'\',\''.$uid.'\',\''.$log_HshCde.'\',\'blck_y\')">block</li></em>';
    $rpt_btn = '<em id="gBtn_rx_'.$uid.'"><li onclick="glblPst_rPt(\'user\',\''.$u.'\',\''.$uid.'\',\'report\',\'NULL\')">report</li></em>';
    try { 
        if($sqlo_____dbx___xX__->query(
            $sql______x___xX__ = "SELECT accepted,blocked FROM connections WHERE uid1='$log_id' AND uid2='$uid' LIMIT 1")->fetchColumn()) {
            foreach ($sql______dbx___xX__->query($sql______x___xX__) as $row_1) { 
                $cnt_chk = $row_1["accepted"]; 
                $blk_chk = $row_1["blocked"];
            }
            if ($cnt_chk) {
                $cnt_btn = '<span id="gBtn_rx_'.$uid.'"><button onclick="glblUSr_sMOD(\''.$log_id.'\',\''.$uid.'\',\''.$log_HshCde.'\',\'cnct_x\')">connected</button></span>'; 
                $cnt_btn_x = '<span id="gBtn_rx_'.$uid.'"><button onclick="glblUSr_sMOD(\''.$log_id.'\',\''.$uid.'\',\''.$log_HshCde.'\',\'cnct_x\')">connected</button></span>';
            } if ($blk_chk) {
                $blk_btn = '<em id="gBtn_rx_'.$uid.'"><li onclick="glblUSr_sMOD(\''.$log_id.'\',\''.$uid.'\',\''.$log_HshCde.'\',\'blck_x\')">unblock</li></em>';
            } 
        }
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }

    // echo "FIND ME: (cnnct chk: $cnt_chk) (blck chk: $blk_chk)";
    
    // if page lands on user page 
    if (isset($_GET["u"]) && isset($uid) && $uid !== $log_id) {
        // v4 updates <li onclick="">+ to list</li>
        // v4 updates <li onclick="">+ to group</li>
        $uGlbl_MNUx = '
        <div class="mNu-mx mNu-ux cP" onclick="mNu_uy()">
            <span></span>
            <span></span>
            <span></span>
            <ul id="mNu-ux_ul" class="dN">
                '.$rpt_btn.'
                '.$blk_btn.'
            </ul>
        </div>
        '; 

        if ($p_load == "f") {
            $bnrBtn = '
            <div class="fR bnrBtn">
                <button title="buy me a coffee">
                    <i class="fa-solid fa-coffee"></i>
                </button>
                <button title="send award - coming soon">
                    <i class="fa-solid fa-award"></i>
                </button>
                <var id="bnrBtn1">'.$cnt_btn.'</var>
                '.$uGlbl_MNUx.'
            </div>
            ';
        } else if ($p_load == "m") {
            $bnrBtn = '
            <div class="bnrBtn">
                <button title="buy me a coffee">
                    <span class="fa-solid fa-coffee"></span>
                </button>
                <button title="send award - coming soon">
                    <span class="fa-solid fa-award"></span>
                </button>
                <var id="bnrBtn1">'.$cnt_btn.'</var>
            </div>
            ';
        }
    }
}
?>