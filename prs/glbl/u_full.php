<?php
$path_1a = '../../';
$path_1b = '../../../';
$m_path = ""; // for -- u_rgts.php
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
// include_once(''.$path_1b.'prs/time_system.php');
// global header even for non users
if (!$log_id && !$log_username && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
} else {
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
            }
        }
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }
}
?>