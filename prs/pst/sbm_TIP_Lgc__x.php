<?php
$path_1a = '../../';
$m_path = "";
$anym_CHK = "";
$sub_dtl = "";
$ncId = "";
$__id_ndir = "";

include_once(''.$path_1a.'icl/err/err_tkn.php');
include_once(''.$path_1a.'icl/cnnc_t.php');
include_once(''.$path_1a.'icl/addons/time_system.php');
include_once(''.$path_1a.'icl/c_sts.php');


//  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         // Check if files were uploaded
//         if (isset($_FILES['files'])) {
//         // find last id
//         $ncId = $sqlo_____dbx___xX__->query("SELECT COUNT(id) FROM tip_submission ORDER BY id DESC")->fetchColumn();

//         // current row plus 1 for cd logic
//         $__id_rdir = (++$ncId);
//         // if ($snmTyp__x === "f") {
//             $__id_ndir = '../../icl/tip/'.$__id_rdir.'';
//         // } if ($snmTyp__x === "m") {
//         //     $__id_ndir = '../../../icl/tip/'.$__id_rdir.'';
//         // }
//         // mkdir | Check if directory exists, create if not
//         !is_dir($__id_ndir) ? mkdir($__id_ndir, 0777, true) : null;



//         if (isset($_FILES['files'])) {
//             // Loop through each file
//             for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
//                 // Get file details
//                 $fileName = $_FILES['files']['name'][$i];
//                 $fileTmpName = $_FILES['files']['tmp_name'][$i];
//                 $fileSize = $_FILES['files']['size'][$i];
//                 $fileError = $_FILES['files']['error'][$i];

//                 // Allow specific file types (optional)
//                 $allowed_types = array("jpg", "jpeg", "png", "pdf");
//                 $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//                 if (!in_array($file_type, $allowed_types)) {
//                     echo "Invalid file type";
//                     exit;
//                 }
                
//                 move_uploaded_file($fileTmpName, $__id_ndir.$fileName);
//             }
//         }
//     }
// }

// $_REQUEST = json_decode(file_get_contents('php://input'), JSON_PRETTY_PRINT);

if(isset($_REQUEST["sbm_data_1a"]) && isset($_REQUEST["sbm_data_1b"]) && isset($_REQUEST["sbm_data_2b"]) && isset($_REQUEST["sbm_data_3b"]) && isset($_REQUEST["sbm_data_5b"]) && isset($_REQUEST["sbm_data_1c"]) && isset($_REQUEST["snmTyp"])) {
    
    $sbm_data_1a__x = filter_var(preg_replace('#[^trusefal]#i', '', $_REQUEST['sbm_data_1a']),FILTER_SANITIZE_STRING);
    $sbm_data_1b__x = filter_var(preg_replace('#[^a-zA-Z]#i', '', $_REQUEST['sbm_data_1b']),FILTER_SANITIZE_STRING);
    $sbm_data_2b__x = filter_var(preg_replace('#[^0-9]#i', '', $_REQUEST['sbm_data_2b']),FILTER_SANITIZE_NUMBER_INT);
    $sbm_data_3b__x = filter_var($_REQUEST['sbm_data_3b'],FILTER_SANITIZE_EMAIL);
    $sbm_data_4b__x = filter_var($_REQUEST['sbm_data_4b'],FILTER_SANITIZE_STRING);
    $sbm_data_5b__x = filter_var($_REQUEST['sbm_data_5b'],FILTER_SANITIZE_STRING);
    $snmTyp__x = filter_var(preg_replace('#[^fm]#i', '', $_REQUEST['snmTyp']),FILTER_SANITIZE_STRING);
    $sbm_data_1c__x = filter_var(preg_replace('#[^a-zA-Z0-9.?/\ ]#i', '', $_REQUEST['sbm_data_1c']),FILTER_SANITIZE_STRING);
    //
    $ip__x = filter_var(getenv('REMOTE_ADDR'),FILTER_VALIDATE_IP);

    // echo 'PHP sucess ('.$sbm_data_1a__x.' | '.$sbm_data_1b__x.' | '.$sbm_data_2b__x.' | '.$sbm_data_3b__x.' | '.$sbm_data_1c__x.')';

    if ($sbm_data_4b__x !== "NULL") {
        

    } else {
        $sbm_data_4b__x = 'none';
    }
    

    if ($sbm_data_1a__x === 'false') {
        $sbm_data_1a__x = 0;
        $anym_CHK = ', based upon the quality of information you will receive $100 - $100,000 as a reward pending settlement.';
        $sub_dtl = '
        <div>
            <b>Your details</b>
            <table style="color: #fff; margin: 10px 0px 0px;">
                <tr>
                    <td>name:</td>
                    <td> '.$sbm_data_1b__x.'</td>
                <tr>
                <tr>
                    <td>number:</td>
                    <td>'.$sbm_data_2b__x.'</td>
                <tr>
                <tr>
                    <td>email:</td>
                    <td>'.$sbm_data_3b__x.'</td>
                <tr>
            </table>
        </div><br>
        ';
    } else {
        $sbm_data_1a__x = 1;
        $sbm_data_1b__x = 'NULL';
        $sbm_data_2b__x = 'NULL';
        $sbm_data_3b__x = 'NULL';
        $sub_dtl = '<blockquote><i>I\'d like to remain anonymous, no reward</i></blockquote>';
    }


    try {
        // insert
        $sql______x___xX__ = $sqlo_____dbx___xX__->prepare("INSERT INTO  tip_submission(
                    name,
                    number, 
                    email, 
                    data,
                    anonymous,
                    ip,
                    date) 
                VALUES(:nme,
                    :num,
                    :eml,
                    :dta,
                    :any,
                    :ip1,
                    :date)");
        $sql______x___xX__->execute([
                    ':nme' => $sbm_data_1b__x,
                    ':num' => $sbm_data_2b__x,
                    ':eml' => $sbm_data_3b__x,
                    ':dta' => $sbm_data_1c__x,
                    ':any' => $sbm_data_1a__x,
                    ':ip1' => $ip__x,
                    ':date' => date('Y-m-d H:i:s')]);
        if ($sql______x___xX__) {
            echo '
            <div class="sbm_TIP-Inr" style="padding: 1px 16px;">
                <h3>Thank You</h3>
                <i class="fL pA fa-solid fa-close dI" onclick="sbm_TIP_CLX()"></i>
                <div>Your tip submission has been submitted'.$anym_CHK.'</div>
                <P>
                    '.$sub_dtl.'
                    <div><b>You entered</b></div><br>
                    <div>'.$sbm_data_1c__x.'</div>
                </p>
            </div>
            ';
        } else {
            echo 'error';
        } echo $sqlc_____dbx___xX__; exit();
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }
 }

           

            

?>