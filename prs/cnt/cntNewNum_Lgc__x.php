<?php
include_once("../../icl/cnnc_t.php");
include_once("../../icl/c_sts.php");

//
if(isset($_POST["uid"]) && isset($_POST["type"])){ 
    (int)$uid__x = filter_var(preg_replace('#[^0-9]#i', '', $_POST['uid']),FILTER_SANITIZE_NUMBER_INT);
    $type__x = filter_var(preg_replace('#[^a-z]#i', '', $_POST['type']),FILTER_SANITIZE_STRING);
    // for non users
    if ($uid__x == 0) {
        $log_id = 0;
    }
    //
    if ($uid__x == $log_id && $type__x == "o") {
        $csChckQry = FALSE;
         do {
            $newCseNum = "cse_x002".substr(md5(rand(10,99)), 3, 7);
            if($sql______dbx___xX__->query("SELECT caseNum FROM case_log WHERE caseNum = '$newCseNum'")->fetchColumn()){
                $csChckQry = TRUE;
            }
            // echos only when statement is false // there are no matching case nuumbers
            $csChckQry = FALSE;
            echo $newCseNum;
        } while ($csChckQry == TRUE); 

        
        //
        // mysql_close();
        exit;
    } else {
        header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned.");
    }  
} else {
    echo "Something is empty";
}


?>