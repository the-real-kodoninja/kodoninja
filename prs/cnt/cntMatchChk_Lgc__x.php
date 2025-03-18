<?php
$path_1a = '../';
$path_1b = '../../';
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
include_once(''.$path_1b.'icl/addons/meowRes.php');
include_once(''.$path_1b.'icl/err/err_tkn.php');

if ($log_id == "") {
    $log_id = 0; 
}

if ($log_id != 0 || $log_id == "") {
    header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned.");
} else {
    if(isset($_POST["cntEmOrCseNumChk"])) {
        //
        $cntEmOrCseNumChk__x = filter_var(preg_replace('#[^a-z0-9.@_]#i', '', $_POST['cntEmOrCseNumChk']),FILTER_SANITIZE_STRING);
        //
        echo meowRes($sqlo_____dbx___xx__,2,"r1p1",$cntEmOrCseNumChk__x,NULL);
        //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
        if($sqlo_____dbx___xX__->query(
        $sql1_1 = "SELECT cid,caseNum,email FROM case_log WHERE caseNum = '$cntEmOrCseNumChk__x' OR email = '$cntEmOrCseNumChk__x' LIMIT 1")->fetchColumn()) {  
            foreach ($sqlo_____dbx___xX__->query($sql1_1) as $roo0w____X___xX__) {
                $cseLg_Cid = filter_var($roo0w____X___xX__["cid"],FILTER_SANITIZE_STRING);
                $cseLg_cnm = filter_var($roo0w____X___xX__["caseNum"],FILTER_SANITIZE_NUMBER_INT);
                $cseLg_eml = filter_var($roo0w____X___xX__["email"],FILTER_SANITIZE_EMAIL);
            } 
        
            echo meowRes($sqlo_____dbx___xx__,2,"r2p1",$cseLg_cnm,NULL);
            $cseLgRand = rand(100000000000,999999999999);
            $cseLgCode = md5($cseLgRand);
            //
            // insert hash $cseLgCode into database, everytime this method is catched this new hash updates the last one
            try {
            $_____SQLUPD__x_____2 = $sqlo_____dbx___xX__->prepare(
                "UPDATE case_log 
                SET code=?
                WHERE email='$cseLg_eml'
                AND caseNum = '$cseLg_cnm' LIMIT 1");
            $_____SQLUPD__x_____2->execute([$cseLgCode]); 
                if ($_____SQLUPD__x_____2) {
                    echo "success__true".$sqlc_____dbx___xX__;
                }
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$lgnId__x,$_SERVER["SCRIPT_NAME"],$newError);
            }
            // test out of localhost
            // include_once('eMailCoNf.php');
            // if(mail($eMailCoNf)) {
                echo meowRes($sqlo_____dbx___xx__,2,"r3p1",$cseLg_cnm,NULL);
                // test email link
                // contact.php?cseCdN=newthread@gmail.com&cseCdeH=d1658880a158b172aa0d0d8e40d975b5
                
            // } 
            exit();
        } else {
            echo meowRes($sqlo_____dbx___xx__,2,"r4p1",$cntEmOrCseNumChk__x,NULL);
        }
    }
}
?>