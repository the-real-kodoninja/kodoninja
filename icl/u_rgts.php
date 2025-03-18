<?php
$path_1a = "";
$path_1b = "";
$lg_lvlBtn = "";
$xR_bge = "";
$ulv = "";
$gr_dN = 'dN';
$gr_dB = 'dB';
$gr_vS1 = "";
$gr_vS2 = "dN";
$gr_vS3 = "";
$k_wallet = "";
$uLnkGlbl = "";
$uImgXX = "";

// global header even for non users
$glbl_uAHdr = '<img  id="mNu_m_x2" class="glbl_uAHdr" src="'.$m_path.''.$url_lcl.'img/temp/user-pic_1.0.png" alt="'.$u.'">';
if ($log_usrAvt) {
    $glbl_uAHdr = $log_usrAvt;    
}
//
$cln = "'";
$uid = "";
$wlc_msg1 = "";
$log_usrAvt = '<img id="mNu_m_x2" class="glbl_uAHdr" src="'.$url_lcl.''.$m_path.'img/temp/user-pic_1.0.png" alt="'.$log_username.'">';
$uIMG1X = '<img src="'.$url_lcl.''.$m_path.'img/temp/no_imgLnk2.svg" alt="'.$log_username.'">';

if($log_HshCde_x === $log_HshCde_y && $user_ok && $log_id >= 1) {
    try {
        if($log_GLBL = "SELECT * FROM users WHERE id='$log_id' LIMIT 1") {
            foreach ($sql______dbx___xX__->query($log_GLBL) as $roo0w____X___xX__) {
                $ulv = filter_var($roo0w____X___xX__["userlevel"],FILTER_SANITIZE_NUMBER_INT);
                $uImgXX = filter_var($roo0w____X___xX__["avatar"],FILTER_DEFAULT); 
                $log_email = filter_var($roo0w____X___xX__["email"],FILTER_SANITIZE_EMAIL);
                $log_web = filter_var($roo0w____X___xX__["website"],FILTER_SANITIZE_URL);
                $log_phone = filter_var($roo0w____X___xX__["phone"],FILTER_SANITIZE_NUMBER_INT);
                $log_fnme = filter_var($roo0w____X___xX__["fname"],FILTER_SANITIZE_STRING);
                $log_lnme = filter_var($roo0w____X___xX__["lname"],FILTER_SANITIZE_STRING);
                $tkn_pnl = filter_var($roo0w____X___xX__["token"],FILTER_SANITIZE_NUMBER_FLOAT);
                $log_codex = filter_var($roo0w____X___xX__["code"],FILTER_DEFAULT);
                $log_passwordx = filter_var($roo0w____X___xX__["password"],FILTER_DEFAULT);
                $nmeDpy_GLBL = nme_dply($sqlo_____dbx___xX__,$log_id);
			    $usrTag_GLBL = base_ext($sqlo_____dbx___xX__,$log_id);
                
            }
            if ($ulv >= '2') {
                $xR_bge = '<span class="p_bge XR_bge">PAID</span>';
            } else if ($ulv == '1') {
                $xR_bge = '<span class="f_bge XR_bge">FREE</span>';
                $lg_lvlBtn = '
                <a href="membership.php">
                    <li>
                        <span>Upgrade Membership</span>
                    </li>
                </a>
                ';
            }

            if ($uImgXX == null) {
                $glbl_uAHdr = '<img  id="mNu_m_x2" class="glbl_uAHdr" src="'.$url_lcl.''.$m_path.'img/temp/no_imgLnk2.svg" alt="'.$log_username.'">';
                $log_usrAvt2 = '<img class="usr_Avtr dI fL" src="'.$url_lcl.''.$m_path.'img/temp/no_imgLnk2.svg" alt="'.$log_username.'" alt="'.$log_username.'"/>';
            }
            
            if($uImgXX) {
                $log_usrAvt = '<img id="mNu_m_x2" class="glbl_uAHdr cP" src="'.$m_path.''.$url_lcl.'u/'.$log_id.'/avt/'.$uImgXX.'" alt="'.$log_username.'"/>';
                $glbl_uAHdr = $log_usrAvt;
                $log_usrAvt2 = '<img class="usr_Avtr dI fL" src="'.$m_path.'u/'.$log_id.'/avt/'.$uImgXX.'" alt="'.$log_username.'"/>';
            }
        }
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }
}

    
 

?>