<?php
//include_once("icl/useruser_GET.php");
$u = "";
$uid = "";
$u2 = "";
$cln = "'";
$bio = "";
$uBedit = "";
$uBv = "";
$f_name = "";
$l_name = "";
$xVname = "";
$nmeLOAD_1 = "";
$nmeDsply_load = "";
$ulv = "";
$country = "";
$joindate = "";
$lastsession = "";
$totalPst_count = "";
$upic = "";
$U_bnr = "";
$inr = "";
$vrf = "";
$uAvt_upd = "";
$uBnr_upd = "";
$user_post = ""; 
$bio2 = '<div id="bioVw">'.$u.' hasn\'t yet added to this section.</div>';

// all logic is id based only portion where username is accepted
// keeping u for page find to better locate user  
if (isset($_GET["u"]) || isset($_GET["uid"]) && isset($_GET["ghCdx"])) {
    if (isset($_GET["u"])) {
        $u = filter_var($_GET['u'],FILTER_SANITIZE_STRING);
        $uid = $sqlo_____dbx___xX__->query("SELECT id FROM users WHERE username ='$u' LIMIT 1")->fetchColumn();
        $unqUsr = "WHERE username = '$u' AND id = '$uid'";
    } if (isset($_GET["uid"]) && isset($_GET["ghCdx"]) && $_GET["uid"] === $log_id && $user_ok) {
        $i_x = filter_var($_GET['uid'],FILTER_SANITIZE_STRING);
        $g_x = filter_var($_GET['ghCdx'],FILTER_SANITIZE_STRING);
        $uid = $sqlo_____dbx___xX__->query("SELECT id FROM users WHERE id ='$i_x' 
        -- AND code = '$g_x' 
        LIMIT 1")->fetchColumn();
        $unqUsr = "WHERE id LIKE BINARY '$uid'"; 
    }
} else newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
try {
    if($count_uvt = $sqlo_____dbx___xX__->query($sql_usr_x = "SELECT DISTINCT * FROM users $unqUsr AND deactivated = '0' LIMIT 1")->fetchColumn()) {
        foreach ($sqlo_____dbx___xX__->query($sql_usr_x) as $roo0w____X___xX__) {
            $cur_vws = $roo0w____X___xX__["views"];
            $nmeDpy_uFULL = nme_dply($sqlo_____dbx___xX__,$uid);
            $usrTag_uFULL = base_ext($sqlo_____dbx___xX__,$uid);
            $signup = timeAgo(strtotime($roo0w____X___xX__["signup"])); 
            $lastlogin = timeAgo(strtotime($roo0w____X___xX__["lastlogin"])); 
            if ($bio = nl2br($roo0w____X___xX__["bio"]))
                $bio2 = '<div class="uBio_upd" contenteditable="false">'.$bio.'</div>';
            if($uid == $log_id && $user_ok)
                $uBedit = '<span id="uBio_res" style="margin: 0px 22px 0px -38px;"></span>
                <span id="uBio_btn" class="pA" onclick="bioEdit(\''.$log_id.'\',\''.$log_HshCde.'\',\'NULL\')">
                    <i class="pnl_edit-B"></i>
                </span>';
            $avOPT = 'onclick="avtVIEW('.$uid.')"'; // all image load in
            $U_pic = '<img id="imgVwXa_'.$uid.'" '.$avOPT.' src="'.$m_path.'img/temp/no_imgLnk2.svg" alt="'.$u.'">';
            if($avatar = $roo0w____X___xX__["avatar"]){
                if ($log_id === $uid && $user_ok) {
                    $avOPT = 'onclick="usrImg_UPD(\''.$log_id.'\',\''.$log_HshCde.'\',\'newAVT\',\'NULL\')"';
                }
                $U_pic = '<div id="uAvt_upd_ld"><img id="imgVwXa_'.$uid.'" '.$avOPT.' src="'.$m_path.'u/'.$uid.'/avt/'.$avatar.'" alt="'.$u.'"></div>';
            } if($banner = $roo0w____X___xX__["banner"]) {
                if ($log_id === $uid && $user_ok) {
                    $avOPT = 'onclick="usrImg_UPD(\''.$log_id.'\',\''.$log_HshCde.'\',\'newBNR\',\'NULL\')"';
                }
                //
                $U_bnr = '
                <div id="imgVwXbs_'.$uid.'" class="uBnr_upd_ld pA w100">
                    <img id="imgVwXb_'.$uid.'" '.$avOPT.' src="'.$m_path.'u/'.$uid.'/bnr/'.$banner.'" alt="'.$u.'">
                </div>';  
            } if($uid == $log_id && $user_ok){
            $uAvt_upd = '
            <form id="upVeil_1" class="pA cP uAvt_upd dN" enctype="multipart/form-data" method="GET">
                <label for="__uAvt_'.$uid.'">
                    <span aria-hidden="true" class="__pL_icn _ic1 cP">
                        <img src="css/svg/pst/fi-photo.svg" style="margin: 25px 0px 0px 24px; opacity: 0.3;"/>
                    </span>
                    <input type="file" name="files[]" accept="image/png, image/jpeg" id="__uAvt_'.$uid.'" class="__pLg2a" style="display:none" onchange="usrImg_UPD(\''.$log_id.'\',\''.$log_HshCde.'\',\'newAVT\',\'UPDX\')">
                </label>
                <div>
                    <span onclick="avtVIEW('.$uid.')"><img src="css/svg/pst/fi-magnifying-glass.svg" class="i_zoom"/></span>
                </div>
            </form>
            ';

            $uBnr_upd = '
            <form id="upVeil_2" class="pA cP uBnr_upd dN" enctype="multipart/form-data" method="GET">
                <span>
                    <!-- keep close panel on click to view larger -->
                    <img src="css/svg/pst/fi-magnifying-glass.svg" class="i_zoom pA" onclick="avtVIEW('.$uid.')" style="margin: 45px 0px 0px 75px;"/>
                </span>
                <label for="__uBnr_'.$uid.'">
                    <span class="__pL_icn _ic1 cP" aria-hidden="true">
                        <img src="css/svg/pst/fi-photo.svg" style="margin: 74px 0px 0px 50px;"/>
                    </span>
                    <input type="file" name="files[]" accept="image/png, image/jpeg" id="__uBnr_'.$uid.'" class="__pLg2a" style="display:none" onchange="usrImg_UPD(\''.$log_id.'\',\''.$log_HshCde.'\',\'newBNR\',\'UPDX\')">
                </label>
            </form>
            ';
            }
        } 
    } else {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],"location: 404.php?msg=That user does not exist or is not yet activated, press back.");
    } 
} catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}
?><?php
$ip = filter_var(getenv('REMOTE_ADDR'),FILTER_VALIDATE_IP);
$unq_vws = $sqlo_____dbx___xX__->query("SELECT unq_vws FROM user_views WHERE uvid = '$log_id' AND ip = '$ip'")->fetchColumn();
//
 // adding a view to users current view count
// logic listed above
$CurVws_p1 = $cur_vws + 1;
// adding a view to users current view count
$UnqVws_p1 = $unq_vws + 1;
// adding a view to unique vistor count
$sqv = $sqlo_____dbx___xX__->prepare("UPDATE users SET views=?  WHERE id=? LIMIT 1");
$sqv->execute([$CurVws_p1,$uid]); 
// array_push $uid == $log_id and any stored ip linked to each
if($uid !== $log_id){
    $sqv2 = $sqlo_____dbx___xX__->prepare("UPDATE user_views SET unq_vws=? WHERE id=? AND ip=?");
    $sqv2->execute([$UnqVws_p1,$log_id,$ip]); 
   
} else {
    // insert only if row dosent exist
    // adding new visitior to the database
    try {
        $___glbl___sql______x___xX__1 = $sqlo_____dbx___xX__->prepare(
            "INSERT INTO user_views
                (usid, 
                uvid,
                unq_vws,
                cur_vws, 
                ip, 
                seendate)
            VALUES(:___ins_sid___,
                :___ins_vid___,
                :___ins_uvws___,
                :___ins_cvws___,
                :___ins_uip___,
                :___ins_dte___)");
        $___glbl___sql______x___xX__1->execute([
                ':___ins_sid___' => $uid,
                ':___ins_vid___' => $log_id,
                ':___ins_uvws___' => $UnqVws_p1,
                ':___ins_cvws___' => $CurVws_p1,
                ':___ins_uip___' => $ip,
                ':___ins_dte___' => date('Y-m-d H:i:s')]); 
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }
} 
?>