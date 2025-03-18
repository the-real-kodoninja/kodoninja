<?php
$path_1a = '../';
$path_1b = '../../';
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
include_once(''.$path_1b.'icl/addons/meowRes.php');
include_once(''.$path_1b.'prs/time_system.php');

$m_path = "";
$cntMsgUsr_X = "";
$uIMG2 = '<img class="cntMSgUsrImg" src="'.$m_path.'img/temp/user-pic_1.0.png" alt="">';

if ($log_id == "") {
    header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned. err1");
} else {

    if(isset($_POST["cmid"]) && isset($_POST["uid"]) && isset($_POST["caseNum"])){
        (int)$cmid__x = filter_var(preg_replace('#[^0-9]#i', '', $_POST['cmid']),FILTER_SANITIZE_NUMBER_INT);
        (int)$uid__x = filter_var(preg_replace('#[^0-9]#i', '', $_POST['uid']),FILTER_SANITIZE_NUMBER_INT);
        $caseNum__x = filter_var(preg_replace('#[^a-z0-9_]#i', '', $_POST['caseNum']),FILTER_SANITIZE_STRING);

        // echo "$cmid__x | $uid__x | $caseNum__x";
      
        if ($uid__x == $log_id && $caseNum__x != "") {
            if($sqlo_____dbx___xX__->query($sql2 = 
                "SELECT u.*,cm.*
                FROM users AS u
                INNER JOIN case_msg AS cm 
                ON cm.aid = u.id
                WHERE cm.caseNum = '$caseNum__x'
                AND cm.ocid = '$cmid__x'
                ORDER BY cm.postdate ASC")->fetchColumn()) {  
            } else {
                $sqlo_____dbx___xX__->query($sql2 = "SELECT * FROM case_msg WHERE caseNum = '$caseNum__x' AND ocid = '$cmid__x' ORDER BY postdate ASC")->fetchColumn();
                
            }
            foreach ($sqlo_____dbx___xX__->query($sql2) as $roo0w____X___xX__) {
                // case_msg
                $cntMsg_cmid = filter_var($roo0w____X___xX__["cmid"],FILTER_SANITIZE_NUMBER_INT);
                $cntMsg_ocid = filter_var($roo0w____X___xX__["ocid"],FILTER_SANITIZE_NUMBER_INT);
                $cntMsg_omid = filter_var($roo0w____X___xX__["omid"],FILTER_SANITIZE_NUMBER_INT);
                $cntMsg_Num = filter_var($roo0w____X___xX__["caseNum"],FILTER_SANITIZE_STRING);
                $cntMsg_type = filter_var($roo0w____X___xX__["type"],FILTER_SANITIZE_STRING);
                $cntMsg_date = timeAgo(strtotime($roo0w____X___xX__["postdate"]));
                $cntMsg_data = stripslashes(str_replace("&amp;","&",nl2br($roo0w____X___xX__["data"],FILTER_SANITIZE_STRING)));
                    if ($uid__x >= 1) {
                        // users
                        $cntMsgUsr_uid = filter_var($roo0w____X___xX__["id"],FILTER_SANITIZE_NUMBER_INT);
                        $cntMsgUsr_nme = filter_var($roo0w____X___xX__["username"],FILTER_SANITIZE_NUMBER_INT);
                        //
                        if($cntMsgUsr_avt = filter_var($roo0w____X___xX__["avatar"],FILTER_DEFAULT)) {
                            $uIMG2 = '<img class="cntMSgUsrImg" src="'.$m_path.'u/'.$cntMsgUsr_uid.'/avt/'.$cntMsgUsr_avt.'" alt="'.$cntMsgUsr_nme.'">';
                        } 
                    } else {
                        $cntMsgUsr_nme = "Unknown";
                    }
                    //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\

                    if ($cntMsg_type == 'a') {
                        $cntMsgUsr_X .= '
                        <div class="cntMsgCtr_A">
                            '.$uIMG2.'
                            <div class="cntMsgUsrStat">
                                <a href="user.php?u='.$cntMsgUsr_nme.'">'.$cntMsgUsr_nme.'</a>
                                <span>'.$cntMsg_date.'</span>
                            </div>
                            <div class="cntMsgUsr_A">
                                <span>'.$cntMsg_data.'</span>
                            </div>
                        </div>
                        ';
                    } if ($cntMsg_type == 'b') {
                        $cntMsgUsr_X .= '
                        <div class="cntMsgCtr_B">
                            '.$uIMG2.'
                            <div class="cntMsgUsrStat">
                                <a href="user.php?u='.$cntMsgUsr_nme.'">'.$cntMsgUsr_nme.'</a>
                                <span>'.$cntMsg_date.'</span>
                            </div>
                            <div class="cntMsgUsr_B">
                                <span>'.$cntMsg_data.'</span>
                            </div>
                        </div>
                        ';
                    }
                }
            } else {
                echo meowRes($sqlo_____dbx___xX__,2,"r1p2",NULL,NULL);
            }
           echo $cntMsgUsr_X;
        } else {
            header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned. err 2");
            echo $sqlc_____dbx___xX__; exit();
        }  
}

?>