<?php
$path_1a = '../../';
$path_1b = '../../';
$m_path = ""; // for -- u_rgts.php
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
include_once(''.$path_1b.'icl/addons/nmedply.php');
include_once(''.$path_1b.'icl/addons/baseext.php');
include_once(''.$path_1b.'prs/time_system.php');
include_once(''.$path_1b.'icl/kodocrypt_vx.php');
$count_nte = 0;

// 1 universal file
if (!$log_id && !$log_username && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
} else {
    if (isset($_POST["uid"]) && 
        isset($_POST["cde"])) {
        (int)$usr_nte__x_uid__x = filter_var(preg_replace('#[^0-9]#i', '', $_POST['uid']), FILTER_SANITIZE_NUMBER_INT);
        $usr_nte__x_cde__x = filter_var($_POST['cde'], FILTER_DEFAULT);
        //
        if ($usr_nte__x_uid__x && $log_id && $usr_nte__x_cde__x && $log_HshCde) {
            if ($usr_nte__x_uid__x === $log_id
                // $usr_nte__x_cde__x === $log_HshCde &&
                // $_COOKIE['hcde'] === $log_HshCde &&
                ) {
            try {
                if($count_nte = $sqlo_____dbx___xX__->query(
                    $sql__1 = "SELECT DISTINCT n.*,u.*
                    FROM notifications AS n 
                    INNER JOIN users AS u 
                    ON n.uid1 = u.id
                    WHERE n.uid1 LIKE BINARY '$log_id' 
                    ORDER BY n.date DESC")->fetchColumn()) { 
                    foreach ($sqlo_____dbx___xX__->query($sql__1) as $roo0w____X___xX__) {
                        (int)$nid = filter_var(preg_replace('#[^0-9]#i', '', $roo0w____X___xX__['id']), FILTER_SANITIZE_NUMBER_INT);
                        (int)$nte_uid1 = filter_var(preg_replace('#[^0-9]#i', '', $roo0w____X___xX__['uid1']), FILTER_SANITIZE_NUMBER_INT);
                        $note = filter_var(preg_replace('#[^a-zA-Z ]#i', '', $roo0w____X___xX__["note"]), FILTER_SANITIZE_STRING);
                        $app = filter_var($roo0w____X___xX__['app'], FILTER_DEFAULT);
                        $nmeDpy_ = nme_dply($sqlo_____dbx___xX__,$log_id);
                        $usrTag_GL = base_ext($sqlo_____dbx___xX__,$log_id);
                        $nteAvt = filter_var($roo0w____X___xX__['avatar'], FILTER_DEFAULT);
                        $date_time = filter_var(timeAgo(strtotime($roo0w____X___xX__["date"])), FILTER_DEFAULT);
                        if ($app == 'user_post Post') {
                            $app = "posted on ";
                        } if ($app == 'user_post Reply') {
                            $app = "replied on ";
                        }
                        $UR_pic = 'img/temp/no_imgLnk2.svg';
                        if($nteAvt){
                            $UR_pic = 'u/'.$nte_uid1.'/avt/'.$nteAvt.'';
                        } 
                            
                        echo '
                        <div id="note_'.$nid.'" class="notiPnl_Pst pad-T">
                            <img src="'.$UR_pic.'"/>
                            <div class="notiPnl_Rgt dI">
                                <a href=\'user?u='.$nte_uid1.'\'>'.$nte_uid1.'</a> '.$note.' <span>'.$date_time .'</span>
                            </div>
                        </div>
                        ';
                    }
                } 
            } catch (PDOException $newError) {
                die("could not update meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
            }
        } else {
            $notePnl_a = '<div class="notiPnl_Pst pad-T">Sorry '.$log_username.' you do not have any notifications</div>';
        }
        } else {
            die("call error meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
        } 
    } else {
        die("call error meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
    }
}


?>