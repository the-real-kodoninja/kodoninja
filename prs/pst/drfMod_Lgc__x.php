<?php
$path_1a = '../../';
$m_path = "";
$pstMod = "";
include_once(''.$path_1a.'icl/err/err_tkn.php');
include_once(''.$path_1a.'icl/cnnc_t.php');
include_once(''.$path_1a.'icl/addons/time_system.php');
include_once(''.$path_1a.'icl/c_sts.php');

if (!(int)$log_id || !$log_username && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
    echo $sqlc_____dbx___xX__; exit();
} else {
    if(isset($_POST["upid"])) {
        if(isset($_POST["UPDCNT"])) {
            // echo count num
            try {
                echo $sqlo_____dbx___xX__->query("SELECT COUNT(id) FROM user_post_drafts WHERE uid = $log_id")->fetchColumn();
                echo $sqlc_____dbx___xX__; exit();
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }
        } else if(isset($_POST["usrPSt_data"]) && isset($_POST["uNSVE"])) {
            $upid__x = filter_var($_POST['upid'],FILTER_SANITIZE_STRING);
            $usrPSt_data__x = filter_var($_POST['usrPSt_data'],FILTER_SANITIZE_STRING);
            // file type insert
            // $uftp__x = filter_var($_POST['uftp'],FILTER_SANITIZE_STRING);
            $uftp__x = 0;
            $uNSVE__x = filter_var($_POST['uNSVE'],FILTER_SANITIZE_STRING);

            try {
                // call to database to check if upid exist
                $dftCHK = $sqlo_____dbx___xX__->query("SELECT upid FROM user_post_drafts WHERE uid = $log_id AND upid = '$upid__x' LIMIT 1")->fetchColumn();
                echo $sqlc_____dbx___xX__;
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }

            if ($dftCHK) {
                try {
                    // update
                    if($sqlo_____dbx___xX__->query("UPDATE user_post_drafts SET data = '$usrPSt_data__x' WHERE uid = '$log_id' AND upid = '$upid__x' LIMIT 1")->fetchColumn()){
                        echo 'saved';
                    } else {
                        echo '';
                    } 
                    echo $sqlc_____dbx___xX__; 
                } catch (PDOException $newError) {
                    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                }
            } else {
                try {
                    // insert
                    $sql______x___xX__ = $sqlo_____dbx___xX__->prepare("INSERT INTO user_post_drafts(
                                uid,
                                upid, 
                                data, 
                                file_type,
                                datetime) 
                            VALUES(:id1,
                                :id2,
                                :dta,
                                :ftp,
                                :date)");
                    $sql______x___xX__->execute([
                                ':id1' => $log_id,
                                ':id2' => $upid__x,
                                ':dta' => $usrPSt_data__x,
                                ':ftp' => $uftp__x,
                                ':date' => date('Y-m-d H:i:s')]);
                    if ($sql______x___xX__) {
                        echo 'saved';
                    } else {
                        echo 'error';
                    } echo $sqlc_____dbx___xX__; exit();
                } catch (PDOException $newError) {
                    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                }
            }
        } else if(isset($_POST["uNDEL"])) {
            $upid3__x = filter_var($_POST['upid'],FILTER_SANITIZE_STRING);
            $uNDEL__x = filter_var($_POST['uNDEL'],FILTER_SANITIZE_STRING);

            // call to database to check if upid exist
            try {
                $dftCHK = $sqlo_____dbx___xX__->query("SELECT upid FROM user_post_drafts WHERE uid = $log_id AND upid = '$upid3__x' LIMIT 1")->fetchColumn();
                echo $sqlc_____dbx___xX__;
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }

            if ($dftCHK) {
                try {
                    // update
                    if($sqlo_____dbx___xX__->query("DELETE FROM user_post_drafts WHERE uid = $log_id AND upid = '$upid3__x' LIMIT 1")->fetchColumn()){
                        echo 'saved';
                    } else {
                        echo 'error';
                    } echo $sqlc_____dbx___xX__; exit();
                } catch (PDOException $newError) {
                    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                }
            } 
        }
    } if(isset($_POST["uid"]) && isset($_POST["cde"]) && isset($_POST["type"]) && isset($_POST["ncde"])){

            $uid__x = filter_var($_POST['uid'],FILTER_SANITIZE_NUMBER_INT);
            $cde__x = filter_var($_POST['cde'],FILTER_SANITIZE_NUMBER_INT);
            $type__x = filter_var($_POST['type'],FILTER_SANITIZE_STRING);
            $ncde__x = filter_var($_POST['ncde'],FILTER_SANITIZE_STRING);

            if ($uid__x === $log_id) {  // re-checks
                try {
                    $count_dc = $sqlo_____dbx___xX__->query("SELECT COUNT(upid) FROM user_post_drafts")->fetchColumn();
                    if($sqlo_____dbx___xX__->query(
                        $sql__1 = "SELECT id,uid,upid,data,file_type,datetime 
                        FROM user_post_drafts 
                        WHERE uid = $log_id
                        ORDER BY datetime DESC LIMIT 25")->fetchColumn()) {
                        foreach ($sqlo_____dbx___xX__->query($sql__1) as $roo0w____X___xX__) {
                            $uid_dc = filter_var($roo0w____X___xX__["uid"],FILTER_SANITIZE_NUMBER_INT);
                            $upid_dc = filter_var($roo0w____X___xX__["upid"],FILTER_SANITIZE_STRING);
                            $udta_dc = filter_var($roo0w____X___xX__["data"],FILTER_SANITIZE_STRING);
                            $ufte_dc = filter_var($roo0w____X___xX__["file_type"],FILTER_SANITIZE_NUMBER_INT);
                            $date_dc = timeAgo(strtotime($roo0w____X___xX__["datetime"]));

                            echo $pstMod = '
                            <div class="pstMod_Wpr" id="pstModWPR_'.$upid_dc.'">
                                <div>
                                    <span>'.$date_dc.'</span>
                                    <span class="fR" onclick="pstModDEL(\''.$upid_dc.'\')">delete</span>
                                </div>
                                <div onclick="pstModCNT(\''.$upid_dc.'\')">
                                    <div class="pstMod_mLTXT_'.$upid_dc.'">'.$udta_dc.'</div>
                                </div>
                            </div>
                            ';
                        } echo $sqlc_____dbx___xX__; exit();
                    } else {
                        echo 'You have no drafts saved; start typing any un-posted post will be saved in drafts.';
                        echo $sqlc_____dbx___xX__; exit();
                    }
                } catch (PDOException $newError) {
                    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                }

            }

        }
}

?>