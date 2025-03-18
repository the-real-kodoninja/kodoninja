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
$setBlck_list = '';
$blck_cnt_x = 0;
//aid1 = connecter (the person connecting)
//aid2 = connectee (the person being connected)
// connections ill be ordered by who goes on your page the most
// 
if($blck_cnt_x = $sqlo_____dbx___xX__->query(
        $sql1 = "SELECT u.*,c.* 
        FROM users AS u
        INNER JOIN connections AS c
        ON c.uid2 = u.id
        WHERE c.uid1='$log_id' AND c.blocked='1' -- must be set to 1
        ORDER BY c.date DESC")->fetchColumn()) {
    foreach ($sqlo_____dbx___xX__->query($sql1) as $roo0w____X___xX__) {
        $connect_1_id = filter_var(preg_replace('#[^0-9]#i', '', $roo0w____X___xX__["id"]),FILTER_SANITIZE_NUMBER_INT);
        $connect_1_username = filter_var(preg_replace('#[^a-zA-Z]#i', '', $roo0w____X___xX__["username"]), FILTER_SANITIZE_STRING);
        $connect_1_avatar = filter_var($roo0w____X___xX__["avatar"], FILTER_DEFAULT);
 
		if($connect_1_avatar) {
			$connect_1_pic = ''.$m_path.'u/'.$connect_1_id.'/avt/'.$connect_1_avatar.'';
		} else {
			$connect_1_pic = ''.$m_path.'img/temp/user-pic_1.0.png';
		}
		$setBlck_list .= '
        <li>
            <img src="'.$connect_1_pic.'" alt="'.$connect_1_username.'" title="'.$connect_1_username.'">
            <div class="setUsrInf dI">
                <div class="dI">
                    <div><a href="user.php?u='.$connect_1_username.'">'.$connect_1_username.'</a></div>
                    <div>2 mins</div>
                </div>
                <div class="fR dI"><a>unblock</a></div>
            </div>
        </li>
        ';
	}
} else {
    $blck_cnt_x = 0;
    $setBlck_list = "<li>You have no users blocked</li>";
}

//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
// *******************************************************************************************************************
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
$setHide_list = "";
//

// NOTE combine all 4 logic grabs
if($numRow_sql1_hd = $sqlo_____dbx___xX__->query(
        $sql1_hd = "SELECT hl.*,b.*,f.*,g.* 
        FROM hide_log AS hl
        LEFT JOIN blog AS b on b.bid = hl.cid
        LEFT JOIN forum AS f ON f.fid = hl.cid
        LEFT JOIN goal AS g on g.gid = hl.cid
        WHERE hl.uid = '$log_id'
        -- AND active = '1'
        ORDER BY hl.date DESC")->fetchColumn()) {
    foreach ($sqlo_____dbx___xX__->query($sql1_hd) as $roo0w____X___xX__) {
        $setHide_bid = filter_var(preg_replace('#[^0-9]#i', '', $roo0w____X___xX__["bid"]),FILTER_SANITIZE_NUMBER_INT);
        $setHide_fid = filter_var(preg_replace('#[^0-9]#i', '', $roo0w____X___xX__["fid"]),FILTER_SANITIZE_NUMBER_INT);
        $setHide_gid = filter_var(preg_replace('#[^0-9]#i', '', $roo0w____X___xX__["gid"]),FILTER_SANITIZE_NUMBER_INT);
        $setHide_ctp = filter_var(preg_replace('#[^bfgup]#i', '', $roo0w____X___xX__["c_type"]),FILTER_SANITIZE_STRING);
        $setHide_ttl = filter_var(preg_replace('#[^a-zA-Z ]#i', '', $roo0w____X___xX__["title"]), FILTER_SANITIZE_STRING);
        $setHide_cov = filter_var($roo0w____X___xX__["cover"], FILTER_DEFAULT);
        $setHide_dte = filter_var(timeAgo(strtotime($roo0w____X___xX__["date"])), FILTER_DEFAULT);

        if ($setHide_ctp == 'b') {
             $ctp = 'blog';
             $set_idt = $setHide_bid;
             $setClss_1 = 'class="IMG_BlgS"';
             $setCntId = "bid_$setHide_bid";
        } if ($setHide_ctp == 'f') {
             $ctp = 'forum';
             $set_idt = $setHide_fid;
             $setClss_1 = 'class=""';
             $setCntId = "fid_$setHide_fid";
        } if ($setHide_ctp == 'g') {
             $ctp = 'goal';
             $set_idt = $setHide_gid;
             $setClss_1 = 'class=""';
             $setCntId = "gid_$setHide_gid";
        }

        if($setHide_cov){
            $setHide_covx = '<img '.$setClss_1.' src="'.$m_path.''.$ctp.'/img/'.$set_idt.'/'.$setHide_cov.'" alt="'.$setHide_ttl.'">';
        } else {
            $setHide_covx = '<img '.$setClss_1.' src="'.$m_path.'img/temp/no_imgLnk2.svg" alt="'.$setHide_ttl.'">';
        }
		$setHide_list .= '
        <li data-id="'.$setCntId.'">
            '.$setHide_covx.'
            <div class="setVw_1_Inr w100 dI">
                <div class="dI">
                    <div>
                        <div><a href="view.php?t='.$ctp.'&v='.$set_idt.'">'.$setHide_ttl.'</a></div>
                        <div>'.$ctp.'</div>
                    </div>
                </div>
                <div class="fR dI"><a onclick="glblPst_eVal(\''.$ctp.'_post\',\'pb\',\''.$set_idt.'\',\'unhide\',\'NULL\')">unhide</a></div>
            </div>
        </li>
        ';
	}
} else {
    $numRow_sql1_hd = 0;
    $setHide_list = "<li>Looks like you have nothing hidden</li>";
}
// 



$ldvAx__x = "Privacy and safety";
$ld_mn_x = "";
$setInpHdr = "<div>";
//
$st_pcy_post_1 = "";
$st_pcy_post_2 = "";
$st_pcy_nsfw_1 = "";
$st_pcy_nsfw_2 = "";
$st_mrk_post_1 = "";
$st_mrk_post_2 = "";
$st_mrk_nsfw_1 = "";
$st_mrk_nsfw_2 = "";
//
if($sql__get1 = "SELECT * FROM user_options WHERE uid = '$log_id' LIMIT 1") {
    foreach ($sqlo_____dbx___xX__->query($sql__get1) as $roo0w____X___xX__) {
        $st_pcy_id = filter_var(preg_replace('#[^0-9]#i', '', $roo0w____X___xX__["id"]),FILTER_SANITIZE_NUMBER_INT);
        $st_pcy_uid = filter_var(preg_replace('#[^0-9]#i', '', $roo0w____X___xX__["uid"]),FILTER_SANITIZE_NUMBER_INT);
        $st_pcy_post_1 = filter_var(preg_replace('#[^01]#i', '', $roo0w____X___xX__["post_1"]),FILTER_SANITIZE_NUMBER_INT);
        $st_pcy_post_2 = filter_var(preg_replace('#[^01]#i', '', $roo0w____X___xX__["post_2"]),FILTER_SANITIZE_NUMBER_INT);
        $st_pcy_nsfw_1 = filter_var(preg_replace('#[^01]#i', '', $roo0w____X___xX__["nsfw_1"]),FILTER_SANITIZE_NUMBER_INT);
        $st_pcy_nsfw_2 = filter_var(preg_replace('#[^01]#i', '', $roo0w____X___xX__["nsfw_2"]),FILTER_SANITIZE_NUMBER_INT);
        $st_pcy_date = filter_var(timeAgo(strtotime($roo0w____X___xX__["date"])), FILTER_DEFAULT);
    } 
} else {
    // do nothing new row will be created on action
}
$hdrADD = "<div>";
// 1st load parent click
if ($ldvAl__x == $ldvAx__x && $ldvA2__x == $ldvAx__x || $ldvAl__x == $ldvAx__x && $ldvA2__x == "Your post") {
    if ($st_pcy_post_1 === "1") {
        $st_mrk_post_1 = "checked";
    } if ($st_pcy_post_2 === "1") {
        $st_mrk_post_2 = "checked";
    } if ($ldvA4__x == 'f') {
        $setInpHdr = '<div class="setInpHdr">'.$ldvA2__x.'</div>';
    }
    $ld_mn_x = '
    '.$setInpHdr.'
    <div class="setInpWpr">
        <div class="setSwhWpr">
            <label class="switch">
                <input type="checkbox" name="inp_PAS_3a" id="inp_PAS_3a" onchange="cnt_UPD_PAS_x(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$setUnq_ncde.'\',\''.$log_username.'\',\'fld_3a\')" '.$st_mrk_post_1.'>
                <span class="slider"></span>
            </label>
            <span class="setSwhLbl">Mark your post as having sensitive material</span>
        </div>
        <div class="setSwhWpr">
            <label class="switch">
                <input type="checkbox" name="inp_PAS_3b" id="inp_PAS_3b" onchange="cnt_UPD_PAS_x(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$setUnq_ncde.'\',\''.$log_username.'\',\'fld_3b\')" '.$st_mrk_post_2.'>
                <span class="slider"></span>
            </label>
            <span class="setSwhLbl">Allow to have only your connections see your post</span>
        </div>
        <div id="test_3a"></div>
    </div>
    ';
} if ($ldvAl__x == $ldvAx__x && $ldvA2__x == "NSFW Settings") {
    if ($st_pcy_nsfw_1 === "1") {
        $st_mrk_nsfw_1 = "checked";
    } if ($st_pcy_nsfw_2 === "1") {
        $st_mrk_nsfw_2 = "checked";
    } if ($ldvA4__x == 'f') {
        $setInpHdr = '<div class="setInpHdr">'.$ldvA2__x.'</div>';
    }
    $ld_mn_x = '
    '.$setInpHdr.'
    <div class="setInpWpr">
        <div class="setSwhWpr">
            <label class="switch">
                <input type="checkbox" name="inp_PAS_3c" id="inp_PAS_3c" onchange="cnt_UPD_PAS_x(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$setUnq_ncde.'\',\''.$log_username.'\',\'fld_3c\')" '.$st_mrk_nsfw_1.'>
                <span class="slider"></span>
            </label>
            <span class="setSwhLbl">Display sensitive 18+ material</span>
        </div>
        <div class="setSwhWpr">
            <label class="switch">
                <input type="checkbox" name="inp_PAS_3d" id="inp_PAS_3d" onchange="cnt_UPD_PAS_x(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$setUnq_ncde.'\',\''.$log_username.'\',\'fld_3d\')" '.$st_mrk_nsfw_2.'>
                <span class="slider"></span>
            </label>
            <span class="setSwhLbl">Blur sensitive 18+ material</span>
        </div>
    </div>
    ';
} if ($ldvAl__x == $ldvAx__x && $ldvA2__x == "Blocked users") {
    if ($ldvA4__x == 'f') {
        $hdrADD = '<div><div class="setInpHdr"> '.$ldvA2__x.' ('.$blck_cnt_x.') </div>';
    } else if ($ldvA4__x == 'm') {
        $hdrADD = 'hdrADD__('.$blck_cnt_x.')__END';
    }
    $ld_mn_x = '
    '.$hdrADD.'
        <ul class="setUsrUl">
            '.$setBlck_list.'
        <ul>
    </div>
    ';
} if ($ldvAl__x == $ldvAx__x && $ldvA2__x == "Hidden content") {
    if ($ldvA4__x == 'f') {
        $hdrADD = '<div><div class="setInpHdr"> '.$ldvA2__x.' ('.$numRow_sql1_hd.') </div>';
    } else if ($ldvA4__x == 'm') {
        $hdrADD = 'hdrADD__('.$numRow_sql1_hd.')__END';
    }
    $ld_mn_x = '
    '.$hdrADD.'
        <ul class="setUsrUl setHdeUl">
            '.$setHide_list.'
        <ul>
    </div>
    ';
} 
echo $ld_mnFull = "$ld_mn_x";
?>