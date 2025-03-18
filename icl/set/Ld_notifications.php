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
//
if ($ldvA4__x === 'm') {
    $m_path = "../";
}
//
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
// *******************************************************************************************************************Rpt
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
$setRprt_list = "";
$numRow_sql1_rpt = 0;
//

// NOTE: have all reports log n/ notifications
if($numRow_sql1_rpt = $sqlo_____dbx___xX__->query(
        $sql1_rpt = "SELECT rl.*,n.*
        FROM report_log AS rl
        LEFT JOIN notifications AS n on n.cid = rl.cid
        WHERE rl.uid = '$log_id'
        ORDER BY rl.date DESC")->fetchColumn()) {  
    foreach ($sqlo_____dbx___xX__->query($sql1_rpt) as $roo0w____X___xX__) {
        $setRpt_cid = filter_var(preg_replace('#[^0-9]#i', '', $roo0w____X___xX__["cid"]),FILTER_SANITIZE_NUMBER_INT);
        $setRpt_nte = filter_var(preg_replace('#[^a-zA-Z ]#i', '', $roo0w____X___xX__["note"]), FILTER_SANITIZE_STRING);
        $setRpt_ctp = filter_var(preg_replace('#[^ubfguprl]#i', '', $roo0w____X___xX__["type"]), FILTER_SANITIZE_STRING);
        $setRpt_cnt = filter_var(preg_replace('#[^a-zA-Z ]#i', '', $roo0w____X___xX__["content"]), FILTER_SANITIZE_STRING);
        $setRpt_sts = filter_var(preg_replace('#[^oic]#i', '', $roo0w____X___xX__["status"]), FILTER_SANITIZE_STRING);
        $setRpt_rsn = filter_var(preg_replace('#[^a-zA-Z ]#i', '', $roo0w____X___xX__["reason"]), FILTER_SANITIZE_STRING);
        $setRpt_dte = filter_var(timeAgo(strtotime($roo0w____X___xX__["date"])), FILTER_DEFAULT);
        //
        if ($setRpt_sts == 'o') {
            $setRpt_stsx = "open";
        } if ($setRpt_ctp == "up") {
            $vlink = 'view.php?t=user&p='.$setRpt_cid.'';
        } if ($setRpt_ctp == "b") {
            $vlink = 'view.php?t=blog&v='.$setRpt_cid.'';
        } if ($setRpt_ctp == "f") {
            $vlink = 'view.php?t=forum&v='.$setRpt_cid.'';
        } if ($setRpt_ctp == "g") {
            $vlink = 'view.php?t=goal&v='.$setRpt_cid.'';
        } 

		$setRprt_list .= '
        <li data-id="'.$setRpt_cid.'">
            <div class="w100 dI">
                <div class="dI">
                    <div><b>'.$setRpt_rsn.'</b></div>
                    <div><a href="'.$vlink.'">'.$setRpt_cnt.'</a></div>
                </div>
                <div class="fR dI">
                    <div class="clr-r">'.$setRpt_stsx.'</div>
                    <div>'.$setRpt_dte.'</div>
                </div>
            </div>
            <div>'.$setRpt_nte.'</div>
        </li>

        ';
    }
    $ldvAx__x = "Notifications";
    $ld_mn_x = "";
    $hdrADD = "";
    // 1st load parent click
    if ($ldvAl__x == $ldvAx__x && $ldvA2__x == $ldvAx__x || $ldvAl__x == $ldvAx__x && $ldvA2__x == "Reported content") {
        if ($ldvA4__x == 'f') {
            $hdrADD = '<div><div class="setInpHdr"> '.$ldvA2__x.' ('.$numRow_sql1_rpt.') </div>';
        } else if ($ldvA4__x == 'm') {
            $hdrADD = 'hdrADD__('.$numRow_sql1_rpt.')__END';
        }
        $ld_mn_x = '
        '.$hdrADD.'
            <ul class="setUsrUl setHdeUl">
                '.$setRprt_list.'
            <ul>
        </div>
        ';
    } 
    echo $ld_mnFull = "$ld_mn_x";
} else {
    $setRprt_list = "<li>Looks like you have not reported anything</li>";
}
        
	





?>