<?php
//
$uTP = "";
$cntCaseVw1 = "";
$cntCaseVw2 = "";
$cseCdN__x = "";
$cseCdeH__x  = "";
$NonUsrLg_uid = "";
$NonUsrLg_eml = "";
$cntMsgUsr_X = "";
$cntCse_eml = "";
$NonUsrChk_1 = 'FALSE';
$nonUsrWel = "";
$cntCse_cid = "";
$cseStatIcn = "";
$nonUsrBtn_1 = '<a href="membership.php"><button id="cntNonUsrBtn_1">Join the kodoverse</button></a>';
$nonUsrBtn_2 = "";
// non user will not affect logged users
if (isset($_GET["cseCdN"]) && isset($_GET["cseCdeH"])) {
    //
    // test link: http://localhost/kodoninja/contact.php?cseCdN=cse_x002b4ba287&cseCdeH=d1658880a158b172aa0d0d8e40d975b5
    //
    $cseCdN__x = preg_replace('#[^a-z0-9.@_]#i', '', $_GET['cseCdN']);
    $cseCdN__x = mysqli_real_escape_string($cnnc_t, $_GET['cseCdN']);
    $cseCdeH__x = preg_replace('#[^a-z0-9.@_]#i', '', $_GET['cseCdeH']);
    $cseCdeH__x = mysqli_real_escape_string($cnnc_t, $_GET['cseCdeH']);
    // everytime the page refreshes checks to make sure the caseNum, and Hash code matches 
    // session remains logged in 
    // if dosen't match session breaks
    if($sql1_1 = "SELECT email FROM case_log WHERE caseNum = '$cseCdN__x' AND code = '$cseCdeH__x' ORDER BY date DESC LIMIT 1") {
        foreach ($sqlo_____dbx___xX__->query($sql1_1) as $roo0w____X___xX__) {
            $cntCse_eml = $roo0w____X___xX__["email"];
        } if($sql1_2 = "SELECT * FROM case_log WHERE email = '$cntCse_eml' ORDER BY date DESC") {
            foreach ($sqlo_____dbx___xX__->query($sql1_2) as $roo0w____X___xX__) {
                session_destroy();
                session_start(); // called after match checks, don't move
                $NonUsrChk_1 = 'TRUE';
                $cntCse_cid = $roo0w____X___xX__["cid"];
                $cntCse_uid = $roo0w____X___xX__["uid"];
                $cntCse_cde = $roo0w____X___xX__["code"];
                $cntCse_num = $roo0w____X___xX__["caseNum"];
                $cntCse_stat = $roo0w____X___xX__["status"];
                $cntCse_dte = $roo0w____X___xX__["date"];

                $nuEml = $cntCse_eml;

                if ($cntCse_stat == 'o') {
                    $cseStatIcn = '
                    <span class="cseGreen tooltip"></span>
                        <ol class=\'tooltiptext dN\'>
                            <li>This case has been opened and pending</li>
                        </ol>
                    </span>
                    ';
                } if ($cntCse_stat == 'i') {
                    $cseStatIcn = '
                    <span class="cseInProcess tooltip"></span>
                        <ol class=\'tooltiptext dN\'>
                            <li>This case has been opened and pending</li>
                        </ol>
                    </span>
                    ';
                } if ($cntCse_stat == 'c') {
                    $cseStatIcn = '
                    <span class="cseClosed tooltip"></span>
                        <ol class=\'tooltiptext dN\'>
                            <li>This case has been opened and pending</li>
                        </ol>
                    </span>
                    ';
                }
                //
                setcookie("NonUsrLg_uid", $cntCse_uid, strtotime( '+3 hours' ), "/", "", "", TRUE);
                setcookie("NonUsrLg_cnm", $cntCse_num, strtotime( '+3 hours' ), "/", "", "", TRUE); 
                setcookie("NonUsrLg_eml", $cntCse_eml, strtotime( '+3 hours' ), "/", "", "", TRUE);
                setcookie("NonUsrLg_cde", $cntCse_cde, strtotime( '+3 hours' ), "/", "", "", TRUE);
                //
                $_SESSION['NonUsrLg_uid'] = preg_replace('#[^0-9]#', '', $_COOKIE['NonUsrLg_uid']);
                $_SESSION['NonUsrLg_cnm'] = preg_replace('#[^a-z0-9.@_]#i', '', $_COOKIE['NonUsrLg_cnm']);
                $_SESSION['NonUsrLg_eml'] = preg_replace('#[^a-z0-9.@_]#i', '', $_COOKIE['NonUsrLg_eml']);
                $_SESSION['NonUsrLg_cde'] = preg_replace('#[^a-z0-9.@_]#i', '', $_COOKIE['NonUsrLg_cde']);
                //
                $log_id = preg_replace('#[^0-9]#', '', $_SESSION['NonUsrLg_uid']);
                $log_cde = preg_replace('#[^0-9]#', '', $_SESSION['NonUsrLg_cde']);
                // $NonUsrLg_uid = preg_replace('#[^0-9]#', '', $_SESSION['NonUsrLg_uid']);
                $NonUsrLg_cnm = preg_replace('#[^a-z0-9.@_]#i', '', $_SESSION['NonUsrLg_cnm']);
                $NonUsrLg_eml = preg_replace('#[^a-z0-9.@_]#i', '', $_SESSION['NonUsrLg_eml']);
                //
                $cntUsr_nme = "Unknown";
                $uIMG1 = '<img src="'.$m_path.'img/temp/user-pic_1.0.png" alt="'.$cntUsr_nme.'">';
                //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ 
                $cntCaseVw1 .= '
                <li id="cntCseLi_'.$cntCse_cid.'" class="cntLi_vw" onclick="Case_2MsgView(\''.$cntCse_cid.'\',\''.$log_id.'\',\''.$uTP.'\',\''.$cntCse_num.'\')">
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
            //
            $nonUsrWel = '<div class="nonUsrPnl_1 bckWht">Looks good. I’ve created a temporary session that\'ll last a few hours with your email <b>'.$NonUsrLg_eml.'</b>. When you click end session on the right panel, the session ends, you can always repeat the process are communicate via email.
            </div>';
        } 
    } else {
        session_destroy();
        $nonUsrWel = '<div class="nonUsrPnl_1 bckWht">Something went wrong, please try to click on the link again from your email.</div>';
        $cseCdN__x = "";
        $cseCdeH__x  = "";
    }
    // case open 
    $numOpen = $sql______dbx___xX__->query("SELECT COUNT(status) FROM case_log WHERE email = '$NonUsrLg_eml' AND status = 'o' LIMIT 1")->fetchColumn();
    // case in Progress
    $numInProgress = $sql______dbx___xX__->query("SELECT COUNT(status) FROM case_log WHERE email = '$NonUsrLg_eml' AND status = 'i' LIMIT 1")->fetchColumn();
    // case closed
    $numClosed = $sql______dbx___xX__->query("SELECT COUNT(status) FROM case_log WHERE email = '$NonUsrLg_eml' AND status = 'c' LIMIT 1")->fetchColumn();
} 

// for basic+ users
if($log_id >= 1) {
    $nonUsrBtn_1 = "";
    // onload populate logic
    // logic will also populate right logic
    if($sql1 = "SELECT u.*,cl.*
            FROM users AS u
            INNER JOIN case_log AS cl 
            ON cl.uid = u.id
            WHERE cl.uid = '$log_id'
            AND cl.status = 'o'
            ORDER BY cl.date DESC") {
        foreach ($sqlo_____dbx___xX__->query($sql1) as $roo0w____X___xX__) {
            // case_log
            $cntCse_cid = $roo0w____X___xX__["cid"];
            $cntCse_uid = $roo0w____X___xX__["uid"];
            $cntCse_num = $roo0w____X___xX__["caseNum"];
            $cntCse_stat = $roo0w____X___xX__["status"];
            $cntCse_dte = $roo0w____X___xX__["date"];

            $nuEml = "NULL";

            if ($cntCse_stat == 'o') {
                $cseStatIcn = '
                <span class="cseGreen tooltip"></span>
                    <ol class=\'tooltiptext dN\'>
                        <li>This case has been opened and pending</li>
                    </ol>
                </span>
                ';
            } if ($cntCse_stat == 'i') {
                $cseStatIcn = '
                <span class="cseInProcess tooltip"></span>
                    <ol class=\'tooltiptext dN\'>
                        <li>This case has been opened and pending</li>
                    </ol>
                </span>
                ';
            } if ($cntCse_stat == 'c') {
                $cseStatIcn = '
                <span class="cseClosed tooltip"></span>
                    <ol class=\'tooltiptext dN\'>
                        <li>This case has been opened and pending</li>
                    </ol>
                </span>
                ';
            }
            // users
            $cntUsr_uid = $roo0w____X___xX__["id"];
            $cntUsr_nme = $roo0w____X___xX__["username"];
            $cntUsr_avt = $roo0w____X___xX__["avatar"];
            //
            
            $uIMG1 = '<img src="'.$m_path.'img/temp/user-pic_1.0.png" alt="'.$cntUsr_nme.'">';
            if($cntUsr_avt) {
                $uIMG1 = '<img src="'.$m_path.'u/'.$cntUsr_uid.'/avt/'.$cntUsr_avt.'" alt="'.$cntUsr_nme.'">';
            }
            //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ 
            $cntCaseVw1 .= '
            <li id="cntCseLi_'.$cntCse_cid.'" class="cntLi_vw" onclick="Case_2MsgView(\''.$cntCse_cid.'\',\''.$log_id.'\',\''.$uTP.'\',\''.$cntCse_num.'\')">
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
        $cntCaseVw1 = '<li>You have no open cases</li>';
    }

    // case open 
    $numOpen = $sql______dbx___xX__->query("SELECT COUNT(status) FROM case_log WHERE uid = '$log_id' AND status = 'o' LIMIT 1")->fetchColumn();
    // case in Progress
    $numInProgress = $sql______dbx___xX__->query("SELECT COUNT(status) FROM case_log WHERE uid = '$log_id' AND status = 'i' LIMIT 1")->fetchColumn();
    // case closed
    $numClosed = $sql______dbx___xX__->query("SELECT COUNT(status) FROM case_log WHERE uid = '$log_id' AND status = 'c' LIMIT 1")->fetchColumn();
}

// non user 
// a non session user
// b session non user
// c logged user
if ($log_id <= 0) {
    $uTP = 'a';
    $log_id = 0;
    $eMl = "NULL";
} if ($NonUsrChk_1 === 'TRUE') {
    $uTP = 'b';
    $eMl = $NonUsrLg_eml;
} if ($log_id >= 1) {
    $uTP = 'c';
    $eMl = "NULL";
}

if ($uTP == 'a') {
    $cntCaseVw1 .= '
    <li id="cntCseLi_'.$cntCse_cid.'" class="cntCseLi cntLi_vw" onclick="cntNewPost(\''.$log_id.'\',\''.$uTP.'\',\''.$eMl.'\',\'o\')">
        <div class="cntUsrWpr_1a">
            <div>
                <span><input id="nonUsrCseInp" type="text" placeholder="Input your email or case number"></span>
            </div>
        </div>
    </li>
    ';
    // on email lookup grab var count
    // set to zero on load
    $numOpen = 0;
    $numInProgress = 0;
    $numClosed = 0;
    // side bar defaults
    $cntCse_cid = 0;
    $cntCse_num = 0;
    $nuEml = "NULL";
} 
if ($uTP != 'c') {
    $cntCaseVw2 .= '
    <li id="nonUsrLi" class="cntLi_vw nonUsrLi dN" style="padding: 0px;">
        <div class="cntUsrWpr_1a">
            <div>
                <span class="pad-T">Case # 
                    <input id="nonUsrCseOpt" type="text" placeholder="case num loads here" />
                </span>
            </div>
        </div>
    </li>
    '; 
}


$cntLgc_li = '
<div class="cntLgc_li">
    <ul id="cntLi_stat" class="cntLi_stat">
        <div id="cntCaseVw1">
            '.$cntCaseVw1.'
        </div>
        <div id="cntCaseVw2">
            '.$cntCaseVw2.'
        </div>
    </ul>
</div>
';


if ($NonUsrChk_1 == 'TRUE') {
    $nonUsrBtn_2 = '<a href="logout.php?ObjDsty='.$_SESSION['NonUsrLg_eml'].'"><button id="cntNonUsrBtn_2">End Session</button></a>';
}

$cntPnl = '
<div class="cntPnlWpr dI fR">
    <button id="cntNewCseBtn" onclick="cntNewPost(\''.$log_id.'\',\''.$uTP.'\',\''.$eMl.'\',\'o\')">Open a new case</button>
    '.$nonUsrBtn_1.'
    '.$nonUsrBtn_2.'
    <div class="cntPnlInr">
        <ul class="cntCaseLog">
            <li id="cntVwLi_1" onclick="cntPnlVw(\'cntVwLi_1\',\''.$cntCse_cid.'\',\''.$log_id.'\',\''.$cntCse_num.'\',\''.$uTP.'\',\''.$nuEml.'\',\'o\')" class="cntLiSel">You have ('.$numOpen.') open case(s)</li>
            <li id="cntVwLi_2" onclick="cntPnlVw(\'cntVwLi_2\',\''.$cntCse_cid.'\',\''.$log_id.'\',\''.$cntCse_num.'\',\''.$uTP.'\',\''.$nuEml.'\',\'i\')">You have ('.$numInProgress.') In Progress case(s)</li>
            <li id="cntVwLi_3" onclick="cntPnlVw(\'cntVwLi_3\',\''.$cntCse_cid.'\',\''.$log_id.'\',\''.$cntCse_num.'\',\''.$uTP.'\',\''.$nuEml.'\',\'c\')">You have ('.$numClosed.') closed case(s)</li>
        </ul>
    </div>
</div>
';

$cntMsgCase_2 = '
<div class="cntMsgCase_2 dN">
    <div class="cntMsgWpr">
        '.$cntMsgUsr_X.'
        <div id="cntMsgPOST"></div>
    </div>
    <div id="cntMsgTXT" name="cntMsgTXT" contenteditable="true" spellcheck="true" placeholder="Let us know how we can help."></div>
    <div class="cntMsgFtr">
        <!-- placeholder for image upload -->
        <span></span>
        <span id="cntPostbtn"</span>
    </div>
</div>
';
?>