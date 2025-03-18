<?php
$path_1a = '../';
$path_1b = '../../';
include_once(''.$path_1b.'icl/err/err_tkn.php');
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
include_once(''.$path_1b.'prs/time_system.php');
if ($log_id <= "" || $log_username == "" && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
} else {
    if (isset($_POST["uid"]) && 
        isset($_POST["cde"])) {
        $usr_wlt__x_uid__x = filter_var($_POST['uid'],FILTER_SANITIZE_NUMBER_INT);
        $usr_wlt__x_cde__x = filter_var($_POST['cde'],FILTER_SANITIZE_STRING);
        if ($usr_wlt__x_uid__x === $log_id && $log_HshCde_x === $log_HshCde_y) {
            try {
                if($sqlo_____dbx___xX__->query(
                    $usr_mod__wlt_sql = "SELECT DISTINCT u.token,w.*
                    FROM users AS u 
                    LEFT JOIN user_wallet AS w 
                    ON w.uid = u.id
                    WHERE u.id LIKE BINARY '$log_id' 
                    ORDER BY w.date DESC")->fetchColumn()) {
                    foreach ($sqlo_____dbx___xX__->query($usr_mod__wlt_sql) as $roo0w____X___xX__) {
                        $usr_mod__wlt_cnt = $sqlo_____dbx___xX__->query("SELECT * FROM user_wallet WHERE uid LIKE BINARY '$log_id'")->fetchColumn();
                        $usr_mod__wlt_wid = $roo0w____X___xX__["id"];
                        $usr_mod__wlt_uid = $roo0w____X___xX__["uid"];
                        $usr_mod__wlt_adr = $roo0w____X___xX__["w_num"];
                        $usr_mod__wlt_pfm = $roo0w____X___xX__["platform"];
                        $usr_mod__uxr_tkn = $roo0w____X___xX__["token"];
                        $usr_mod__wlt_dte = timeAgo(strtotime($roo0w____X___xX__["date"]));
                            
                        echo $pnl_tkn = '
                        <li onclick="">kodotokens
                            <span class="notiHdr_Wpr fR"><b class="clr-r">'.$usr_mod__uxr_tkn.'</b></span>
                        </li>
                        ';
                        echo $pnl_wlt = '
                        <li onclick="">linked wallets
                            <span class="notiHdr_Wpr fR"><b class="clr-r">'.$usr_mod__wlt_cnt.'</b></span>
                        </li> 
                        ';
                    } 
                }
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }
        } else {
            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
        }
    } else {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
    }
}

?>