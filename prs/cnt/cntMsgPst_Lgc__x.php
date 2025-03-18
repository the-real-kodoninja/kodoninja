<?php
$path_1a = '../';
$path_1b = '../../';
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
include_once(''.$path_1b.'icl/addons/meowRes.php');
include_once(''.$path_1b.'prs/time_system.php');

if ($log_id == "") {
    $log_id = 0; // non user
}

if ($log_id <= "") {
    header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned. er1");
} else {

    if(isset($_POST["cmid"]) && isset($_POST["uid"]) && isset($_POST["uTp"]) && isset($_POST["caseNum"]) && isset($_POST["type"])){
        (int)$cmid__x = filter_var(preg_replace('#[^0-9]#i', '', $_POST['cmid']),FILTER_SANITIZE_NUMBER_INT);
        (int)$uid__x = filter_var(preg_replace('#[^0-9]#i', '', $_POST['uid']),FILTER_SANITIZE_NUMBER_INT);
        $uTp__x = filter_var(preg_replace('#[^a-c]#i', '', $_POST['uTp']),FILTER_SANITIZE_STRING);
        $eMl__x = filter_var(preg_replace('#[^a-z0-9.@_]#i', '', $_POST['eMl']),FILTER_SANITIZE_EMAIL);
        $caseNum__x = filter_var(preg_replace('#[^a-z0-9_]#i', '', $_POST['caseNum']),FILTER_SANITIZE_STRING);
        $type__x = filter_var(preg_replace('#[^a-z]#i', '', $_POST['type']),FILTER_SANITIZE_STRING);
        $cntMsgTXT__x = filter_var(preg_replace('#[^a-z0-9 ]#i', '', $_POST['cntMsgTXT']),FILTER_SANITIZE_STRING);
        
        $sqlNew_TRUE = "";
        if (!$cntMsgTXT__x) {
            echo $sqlNew_TRUE = meowRes($sqlo_____dbx___xX__,2,"r1p3",NULL,NULL).$sqlc_____dbx___xX__; exit();
        } 

        // non user email grab
        if (isset($_POST["nUsrEmOrCse"])) {
            $nUsrEmOrCse__x = filter_var(preg_replace('#[^a-z0-9.@_]#i', '', $_POST['nUsrEmOrCse']),FILTER_SANITIZE_STRING);
        } if ($uTp__x === 'a') { 
            if (!$nUsrEmOrCse__x) {
                echo $sqlNew_TRUE = meowRes($sqlo_____dbx___xX__,2,"r2p3",NULL,NULL).$sqlc_____dbx___xX__; exit();
            }
        } if($uTp__x == "b" || $uTp__x == "c") {
            // for logged users 
            $nUsrEmOrCse__x = ""; // not null it will match deffault
        }

        
        // should catch non and current users
        if ($uTp__x == "a" || $uTp__x == "b" || $uTp__x == "c") {
            if ($uTp__x == "c" && $log_id >= 1) {
                $log_email = "NULL1"; // to ensure there are no matches
                $log_cde = "NULL";
                $cseLgCode = "NULL";



                if($sqlo_____dbx___xX__->query(
                    $sql1_1 = "SELECT * FROM users WHERE id = '$log_id' LIMIT 1")->fetchColumn()) {  
                    foreach ($sqlo_____dbx___xX__->query($sql1_1) as $roo0w____X___xX__) {
                        // users
                        $cntMsgUsr_uid = filter_var($roo0w____X___xX__["id"],FILTER_SANITIZE_STRING);
                        $cntMsgUsr_nme = filter_var($roo0w____X___xX__["username"],FILTER_SANITIZE_STRING);
                        $cntMsgUsr_avt = filter_var($roo0w____X___xX__["avatar"],FILTER_SANITIZE_STRING);
                    //
                    if($cntMsgUsr_avt) {
                        $uIMG2 = '<img class="cntMSgUsrImg" src="u/'.$cntMsgUsr_uid.'/'.$cntMsgUsr_avt.'" alt="'.$cntMsgUsr_nme.'">';
                    } else {
                        $uIMG2 = '<img class="cntMSgUsrImg" src="img/temp/user-pic_1.0.png" alt="'.$cntMsgUsr_nme.'">';
                    }
                } 
            }
            } else {
                $cntMsgUsr_nme = "Unknown";
                $uIMG2 = '<img class="cntMSgUsrImg" src="img/temp/user-pic_1.0.png" alt="'.$cntMsgUsr_nme.'">';
            }
            // developer error testing
            // echo "$cmid__x | $uid__x | $uTp__x | $log_email | $caseNum__x | $type__x | $cntMsgTXT__x";
            // echo "";
            // echo "do I get to this point meow v1";
            //
            // checks both current and non users caseNum
            // if matches dont increase num row in case_msg
            // log_email for non users
            if($sqlo_____dbx___xX__->query(
                    $sql1_2 = "SELECT cid,caseNum,email FROM case_log WHERE caseNum = '$caseNum__x' ORDER BY date DESC LIMIT 1")->fetchColumn()) {  
                    foreach ($sqlo_____dbx___xX__->query($sql1_2) as $roo0w____X___xX__) {
                        // users
                        $cseLg_Cid = filter_var($roo0w____X___xX__["cid"],FILTER_SANITIZE_NUMBER_INT);
                        $cseLg_cnm = filter_var($roo0w____X___xX__["caseNum"],FILTER_SANITIZE_STRING);
                        $cseLg_eml = filter_var($roo0w____X___xX__["email"],FILTER_SANITIZE_EMAIL);
                    //
                } 
            }
  
            //
            $cLogRow = $sql______dbx___xX__->query("SELECT COUNT(cid) FROM case_log ORDER BY date DESC LIMIT 1")->fetchColumn();
            //
            
            if ($uTp__x == "a" || $uTp__x == "b") {
                //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
                $cseLgRand = rand(100000000000,999999999999);
                $cseLgCode = md5($cseLgRand);
                //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
            } 
            if ($numCse === 0) {
                if ($uTp__x == 'c') {
                    $nUsrEmOrCse__x = "NULL";
                } if ($uTp__x == 'b') {
                    $nUsrEmOrCse__x = $eMl__x;
                }
                //
                try {
                    // insert
                    $sql______x___xX__ = $sqlo_____dbx___xX__->prepare("INSERT INTO case_log(
                                uid,
                                email, 
                                code, 
                                caseNum,
                                status,
                                date) 
                            VALUES(:id1,
                                :id2,
                                :dta,
                                :ftp,
                                :date)");
                    $sql______x___xX__->execute([
                                ':id1' => $log_id,
                                ':eml' => $nUsrEmOrCse__x,
                                ':clg' => $cseLgCode,
                                ':cnm' => $caseNum__x,
                                ':ftp' => 0,
                                ':date' => date('Y-m-d H:i:s')]);
                    if ($sql______x___xX__) {
                        if ($uTp__x == "a") {
                            // test out of localhost
                            // include_once('eMailCoNf.php');
                            // if(mail($eMailCoNf)) {
                            $sqlNew_TRUE = meowRes($sqlo_____dbx___xX__,2,"r3p3",$caseNum__x,$nUsrEmOrCse__x);
                            // test email link
                            // contact.php?cseCdN=newthread@gmail.com&cseCdeH=d1658880a158b172aa0d0d8e40d975b5
                            
                        // } 
                        } if ($uTp__x == "b") {
                            $sqlNew_TRUE = meowRes($sqlo_____dbx___xX__,2,"r4p3",$caseNum__x,$eMl__x);
                        } 
                    } else {
                        echo 'error';
                    } echo $sqlc_____dbx___xX__; exit();
                } catch (PDOException $newError) {
                    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                }

                // only on new cases numbers
                if ($uTp__x == "b" || $uTp__x == "c") {
                    // keep to ensure it post after the first msg
                    // new non user session check
                    //
                    if ($uTp__x == 'b') {
                        $nUsrEmOrCse__x = $eMl__x;
                    }
                    try {
                        // insert
                        $sql______x___xX__ = $sqlo_____dbx___xX__->prepare("INSERT INTO case_log(
                                    uid,
                                    email, 
                                    code, 
                                    caseNum,
                                    status,
                                    date) 
                                VALUES(:id1,
                                    :id2,
                                    :dta,
                                    :ftp,
                                    :date)");
                        $sql______x___xX__->execute([
                                    ':id1' => 0,
                                    ':eml' => $nUsrEmOrCse__x,
                                    ':clg' => $cseLgCode,
                                    ':cnm' => $caseNum__x,
                                    ':ftp' => 0,
                                    ':date' => date('Y-m-d H:i:s')]);
                        if ($sql______x___xX__) {
                            $sqlNew_TRUE = meowRes($sqlo_____dbx___xX__,2,"r5p3",NULL,NULL); 
                        } else {
                            echo 'error';
                        } echo $sqlc_____dbx___xX__; exit();
                    } catch (PDOException $newError) {
                        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                    }
                    
                }
               
            } if ($numCse > 0) {
                
                if ($uTp__x == "a") {
                    if($sqlo_____dbx___xX__->query(
                        // case_msg checks to grab same omid from the 1st time
                        $sql1_7 = "SELECT cid FROM case_log WHERE email = '$cseLg_eml' ORDER BY date DESC LIMIT 1")->fetchColumn()) {  
                        foreach ($sqlo_____dbx___xX__->query($sql1_7) as $roo0w____X___xX__) {
                            // users
                            $cmid__x = filter_var($roo0w____X___xX__["cid"],FILTER_SANITIZE_NUMBER_INT);
                        //
                        } 
                    }
                } 
                
            }
            // if this is a new insert with no matching cases grab the last row +1 in table
            if ($numCse === 0) {
                $cseLg_Cid = (int)$cLogRow + (int)1;
            } 
            // regardless everything must insert
            try {
                // insert
                $sql______x___xX__ = $sqlo_____dbx___xX__->prepare("INSERT INTO case_msg(
                            ocid,
                            omid, 
                            caseNum, 
                            aid,
                            type,
                            data,
                            hide,
                            remove,
                            postdate) 
                        VALUES(:id1,
                            :id2,
                            :dta,
                            :ftp,
                            :date)");
                $sql______x___xX__->execute([
                            ':ocd' => $cseLg_Cid,
                            ':omd' => $cseLg_Cid,
                            ':cnm' => $caseNum__x,
                            ':aid' => $log_id,
                            ':typ' => $type__x,
                            ':dta' => $cntMsgTXT__x,
                            ':hde' => 0,
                            ':rmv' => 0,
                            ':date' => date('Y-m-d H:i:s')]);
                if ($sql______x___xX__) {
                    echo '
                    <div class="cntMsgCtr_A">
                        '.$uIMG2.'
                        <div class="cntMsgUsrStat">
                            <a href="user.php?u='.$cntMsgUsr_nme.'">'.$cntMsgUsr_nme.'</a>
                            <span>1 sec ago</span>
                        </div>
                        <div class="cntMsgUsr_A">
                            <span>'.$cntMsgTXT__x.'</span>
                        </div>
                    </div>
                    '; 
                    echo $sqlNew_TRUE;
                } else {
                    echo 'error';
                } echo $sqlc_____dbx___xX__; exit();
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }
                
        } else {
            header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned. err2");
            // mysqli_close();
            exit();
        }  
    } else {
        echo "Something is empty";
        // mysqli_close();
        exit();
    }
}

?>