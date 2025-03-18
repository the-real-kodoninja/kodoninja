<?php
include_once("../../icl/cnnc_t.php");
include_once("../../icl/c_sts.php");
include_once("../../prs/time_system.php");

$m_path = "";
$cntMsgUsr_X = "";
//
if ($log_id == "") {
    header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned. err1");
} else {

    if(isset($_POST["cmid"]) && isset($_POST["uid"]) && isset($_POST["caseNum"]) && isset($_POST["nuEml"]) && isset($_POST["type"])){
        (int)$cmid__x = filter_var(preg_replace('#[^0-9]#i', '', $_POST['cmid']),FILTER_SANITIZE_NUMBER_INT);
        (int)$uid__x = filter_var(preg_replace('#[^0-9]#i', '', $_POST['uid']),FILTER_SANITIZE_NUMBER_INT);
        $caseNum__x = filter_var(preg_replace('#[^a-z0-9_]#i', '', $_POST['caseNum']),FILTER_SANITIZE_STRING);
        $caseEml__x = filter_var(preg_replace('#[^a-z0-9_]#i', '', $_POST['nuEml']),FILTER_SANITIZE_STRING);
        $type__x = filter_var(preg_replace('#[^a-z]#i', '', $_POST['type']),FILTER_SANITIZE_STRING);

        // echo "$cmid__x | $uid__x | $caseNum__x | $caseEml__x | $type__x";

        if ($uid__x == $log_id && $caseNum__x != "" && $type__x == "o" || $type__x == "i" || $type__x == "c") {
            //
            if ($type__x == "o") {
                $typeNme = "open";
            } if ($type__x == "i") {
                $typeNme = "In Progress";
            } if ($type__x == "c") {
                $typeNme = "closed";
            }
            if ($log_id >= 1) {
            // logic will also populate right logic
            $sqlo_____dbx___xX__->query(
                $sql1_1 = "SELECT u.*,cl.*
                    FROM users AS u
                    INNER JOIN case_log AS cl 
                    ON cl.uid = u.id
                    WHERE cl.uid = '$log_id'
                    -- AND cl.caseNum = '$caseNum__x'
                    -- AND cl.cid = '$cmid__x'
                    AND cl.status = '$type__x'
                    ORDER BY cl.date DESC")->fetchColumn();
            } if ($log_id == 0) {
                $sqlo_____dbx___xX__->query(
                $sql1_1 = "SELECT * FROM case_log WHERE email = '$caseEml__x' AND status = '$type__x' ORDER BY date DESC")->fetchColumn();
            }
            $numCse = mysqli_num_rows($sql1);
            if($numCse > 0){
                foreach ($sqlo_____dbx___xX__->query($sql1_1) as $roo0w____X___xX__) {
                    $cntCse_cid = filter_var($roo0w____X___xX__["cid"],FILTER_SANITIZE_NUMBER_INT);
                    $cntCse_uid = filter_var($roo0w____X___xX__["uid"],FILTER_SANITIZE_NUMBER_INT);
                    $cntCse_num = filter_var($roo0w____X___xX__["caseNum"],FILTER_SANITIZE_STRING);
                    $cntCse_stat = filter_var($roo0w____X___xX__["status"],FILTER_SANITIZE_STRING);
                    $cntCse_dte = timeAgo(strtotime($roo0w____X___xX__["date"]));
     
                    if ($log_id >= 1) {
                        // users
                        $cntUsr_uid = filter_var($roo0w____X___xX__["id"],FILTER_SANITIZE_NUMBER_INT);
                        $cntUsr_nme = filter_var($roo0w____X___xX__["username"],FILTER_DEFAULT);
                        $cntUsr_avt = filter_var($roo0w____X___xX__["avatar"],FILTER_DEFAULT);
                        //
                        if($cntUsr_avt != NULL) {
                            $uIMG1 = '<img src="'.$m_path.'u/'.$cntUsr_uid.'/'.$cntUsr_avt.'" alt="'.$cntUsr_nme.'">';
                        } else {
                            $uIMG1 = '<img src="'.$m_path.'img/temp/user-pic_1.0.png" alt="'.$cntUsr_nme.'">';
                        }
                    } if ($log_id == 0 || $log_id == "") {
                        $cntUsr_nme = "Unknown";
                        $uIMG1 = '<img src="'.$m_path.'img/temp/user-pic_1.0.png" alt="'.$cntUsr_nme.'">';
                    }
                    //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ 

                    echo '
                    <li onclick="Case_2MsgView(\''.$cntCse_cid.'\',\''.$log_id.'\',\''.$cntCse_num.'\')">
                        <div class="cntUsrWpr_1a">
                            '.$uIMG1.'
                            <div>
                                <span><a href="user.php?u='.$cntUsr_nme.'">'.$cntUsr_nme.'</a></span>
                                <span class="fR">Case # <var id="cseNumRender" class="clr-r">'.$cntCse_num.'</var></span>
                            </div>
                        </div>
                    </li>
                    ';
                }
            } else {
                echo "<li>you have no $typeNme cases</li>";
            }
        } else {
            header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned. err2");
            echo $sqlc_____dbx___xX__; exit();
        }  
    } else {
        echo "Something is empty";
        echo $sqlc_____dbx___xX__; exit();
    }
}

?>