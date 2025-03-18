<?php
$path_1a = '../';
$path_1b = '../../';
include_once(''.$path_1b.'icl/err/err_tkn.php');
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
include_once(''.$path_1b.'prs/time_system.php');

if (!$log_id && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
} 

if (isset($_POST["id"]) && isset($_POST["pTp"]) && isset($_POST["vAl1"]) && isset($_POST["vAl2"]) && isset($_POST["vAl4"])) {
    $ldLiId__x = filter_var(preg_replace('#[^a-z0-9.@]#i', '', $_POST['id']), FILTER_DEFAULT);
    $ldpTp__x = filter_var(preg_replace('#[^A-Z0-4]#i', '', $_POST['pTp']), FILTER_DEFAULT);
    $ldvAl__x = filter_var(preg_replace('#[^a-zA-Z ]#i', '', $_POST['vAl1']), FILTER_DEFAULT);
    $ldvA2__x = filter_var(preg_replace('#[^a-zA-Z ]#i', '', $_POST['vAl2']), FILTER_DEFAULT);
    $ldvA4__x = filter_var(preg_replace('#[^fm]#i', '', $_POST['vAl4']), FILTER_DEFAULT);
} else {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
}

//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
// *******************************************************************************************************************
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
// create: 
// input for token/egg codes 
//
$tkn_Inp = "";
$full_TOKEN = "";
$setTkn_tkn = "";
$usrTkn_log = "";

if($sqlTkn = "SELECT DISTINCT u.*,tl.* 
        FROM users AS u 
        INNER JOIN token_log AS tl 
        WHERE u.id = '$log_id'
        AND tl.uid = u.id
        ORDER BY tl.date DESC") {
    foreach ($sqlo_____dbx___xX__->query($sqlTkn) as $roo0w____X___xX__) {
        $token_count = filter_var(preg_replace('#[^0-9]#i', '', $roo0w____X___xX__["token"]),FILTER_SANITIZE_NUMBER_INT);
        $token_uid = filter_var(preg_replace('#[^0-9]#i', '', $roo0w____X___xX__["uid"]), FILTER_SANITIZE_NUMBER_INT);
        $token_amnt = filter_var(preg_replace('#[^0-9]#i', '', $roo0w____X___xX__["amount"]), FILTER_SANITIZE_NUMBER_INT);
        $token_math = filter_var(preg_replace('#[^+-]#i', '', $roo0w____X___xX__["math"]), FILTER_DEFAULT);
        $token_OldTotl = filter_var(preg_replace('#[^0-9]#i', '', $roo0w____X___xX__["old_total"]), FILTER_SANITIZE_NUMBER_INT);
        $token_NewTotl = filter_var(preg_replace('#[^0-9]#i', '', $roo0w____X___xX__["new_total"]), FILTER_SANITIZE_NUMBER_INT);
        $token_mthd = filter_var(preg_replace('#[^a-zA-Z]#i', '', $roo0w____X___xX__["method"]), FILTER_SANITIZE_STRING);
        $token_date = filter_var(timeAgo(strtotime($roo0w____X___xX__["date"])), FILTER_DEFAULT);;
    }
    if ($token_math == "-") {
        $tknClr_r = '<span style="color: darkred;">';
        $token_math = ''.$tknClr_r.''.$token_math.'</span>';
        $token_AmntView = '
            '.$token_math.'
            '.$tknClr_r.''.$token_amnt.'</span>
            = ('.$token_NewTotl.')
        ';
    } if ($token_math == "+") {
        $tknClr_g = '<span style="color: darkgreen;">';
        $token_math = ''.$tknClr_g.''.$token_math.'</span>';
        $token_AmntView = '
            '.$token_math.'
            '.$tknClr_g.''.$token_amnt.'</span>
            = ('.$token_NewTotl.')
        ';
    }
    $usrTkn_log .= '
    <li>
        <div>
            <span>'.$token_AmntView.'</span>
            <span class="fr">'.$token_date.'</span>
        </div>
        <div>'.$token_mthd.'</div>
    </li>
    ';
}



$ldvAx__x = "Currency";
$setInpHdr = "";
$ld_mn_x = "";
$hdrADD = "";
// 1st load parent click
if ($ldvAl__x === $ldvAx__x && $ldvA2__x === $ldvAx__x || $ldvAl__x == $ldvAx__x && $ldvA2__x == "Kodotoken") {
    if ($ldvA4__x == 'f') {
        $hdrADD = '<div><div class="setInpHdr"> '.$ldvA2__x.' ('.$token_count.') </div>';
    } else if ($ldvA4__x == 'm') {
        $hdrADD = 'hdrADD__('.$token_count.')__END';
    }
    $ld_mn_x = '
    '.$hdrADD.'
        <ul class="setUsrUl setHdeUl">
            '.$usrTkn_log.'
        <ul>
    </div>
    ';
} if ($ldvAl__x == $ldvAx__x && $ldvA2__x == "Kodocoin") {
    if ($ldvA4__x == 'f') {
        $setInpHdr = '<div class="setInpHdr">'.$ldvA2__x.'</div>';
    }
    $ld_mn_x = '
        '.$setInpHdr.'
        <div class="setInpWpr">
            <p>The cryptocurrency of the kodovere, you’ve heard of dogecoin, you’ll hear of kodocoin. Built from the ethereum blockchain web3  coded in solidity, python, and ruby.</p>
            <p>Coming 2024</p>
        </div>
    </div>
    ';
} 
echo $ld_mnFull = "$ld_mn_x";
?>