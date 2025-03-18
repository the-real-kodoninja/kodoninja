<?php
$path_1a = '../';
$path_1b = '../../';
include_once(''.$path_1b.'icl/err/err_tkn.php');
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
//
if ($log_id <= "" || $log_username == "" && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
} else {
    // bio edit
    if (isset($_POST['uid']) && 
        isset($_POST['cde']) &&
        isset($_POST['mth']) &&      
        isset($_POST['uBio_dta'])) { 
        $___ubio__x = filter_var(urldecode($_POST['uBio_dta']), FILTER_DEFAULT);

        try { // success found now time to update SAVE or EDIT
                $sql__BIOX_X1 = $sqlo_____dbx___xX__->prepare(
                    "UPDATE users 
                    SET bio = ?
                    WHERE id = '$log_id' 
                    LIMIT 1");
                $sql__BIOX_X1->execute([$___ubio__x]); 
            if ($sql__BIOX_X1) {
                die('your bio has been changed.');
            } else {
                die($newError = "There was an internal error meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
            }
        } catch (PDOException $newError) {
            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
        }
    }

    // avatar / banner update 
    // for avatar / banner update 
    $_POST = json_decode(file_get_contents('php://input'), JSON_PRETTY_PRINT);

    if (isset($_POST['uid']) && 
        isset($_POST['cde']) &&
        isset($_POST['mth']) &&    
        isset($_POST['pst']) &&
        isset($_POST['b64_mod'])) { 
        if (urldecode($_POST['uid']) === $log_id && urldecode($_POST['mth']) === "newAVT" || urldecode($_POST['mth']) === "newBNR") {

            $___mth__x = filter_var(preg_replace('#[^newAVTBNR]#i', '', urldecode($_POST['mth'])), FILTER_SANITIZE_STRING);

            if($___mth__x === "newAVT") {
                $fldr = 'avt';
                $___mth_y1 = 'avatar';
            } else if($___mth__x === "newBNR") {
                $fldr = 'bnr';
                $___mth_y1 = 'banner';
            }

            // mkdir
            !is_dir($__b_ndir = "../../u/$log_id/$fldr/") ? mkdir($__b_ndir, 0777, true) : null;

            // cover IMG grab // optional
            if ($cov__Xx = base64_decode(filter_var(urldecode($_POST['b64_mod']),FILTER_SANITIZE_STRING))) {
                
                $image_parts = explode(";base64,", $cov__Xx);
                explode("image/", $image_parts[0])[1];
                file_put_contents($__b_ndir.$cov__Xx = ''.$fldr.'_'.md5(rand(100000000000,999999999999)).'.png', base64_decode($image_parts[1]));

                if($sqlo_____dbx___xX__->query("SELECT $___mth_y1 FROM users WHERE id = '$log_id' LIMIT 1")->fetchColumn()) { // post exit time to update
                    try { // success found now time to update SAVE or EDIT
                            $sql__COVX_X1 = $sqlo_____dbx___xX__->prepare(
                                "UPDATE users 
                                SET $___mth_y1 = ?
                                WHERE id = '$log_id' 
                                LIMIT 1");
                            $sql__COVX_X1->execute([
                                $cov__Xx]); 
                        if ($sql__COVX_X1) {
                            echo ''.$log_username.'\'s '.$___mth_y1.' has been changed.';
                        } else {
                            die($newError = "There was an internal error meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
                        }
                    } catch (PDOException $newError) {
                        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                    }
                }

            }

        } else {
            die("error! meow, redirecting you, MOUSE".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL));
        }
    } else {
        die("error! meow, redirecting you, MOUSE".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL));
    }
} 


?>