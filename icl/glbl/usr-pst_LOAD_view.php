<?php
$path_1b = "";
$cnt_btn_x = "";
$cnt_btn_x2 = "";
$pst_cnct_mod = "";
$pst_cnct_mod2 = "";
$tag_vc = "";
$clk__cx = "";
$btnRply_CX = "";
$msgRply = "";
$uIMG1X = "";
$txt_Plc = "";
$btnRply_1X = "";
$autNme_xpc = "";
$autNme_upc ="";
$autNme_rpc ="";
$aid1_rpc = 0;
$output_v1_upc = "";
$usrRplyThrd_b = "";
$pTrm = "";
$pid_xpc = "";
$aut_upc = ""; // view
// presets to be set
$pid_upc = "";
$pid_rpc = "";
$aid2_rpc = "";
$aid3_rpc = "";
$uvt_Up = 0;
$uvt_dN = 0;
$uvt_b_Up = 0;
$uvt_b_dN = 0;
//
$c_typeA = "user_p";
$c_typeB = "user_post";
$tVw = 'user_views';
$tUv = "user_upvote";
$tCmt = "user_post";
$IMG_class = 'class="IMG_BlgS"';
$cid_uNq = "bcid";
$rid_uNq = "brid";
$pst_uNq = "user_cmnt";


if ($p_load === 'm') {
    function addPathToImageSrc2($dta_upc) {
        $dom = new DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML($dta_upc);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $image) {
            $src = $image->getAttribute('src');
            $image->setAttribute('src', '../' . $src);
        }
        return $dom->saveHTML();
    }
}

// can yu fix this? if $imgCount <= 5 can you put the <img> over 5 in a div

function mtpImgDtc($text, $class_name = "u_psgGrid") {
    // Count the number of img tags in the text
    $imgCount = preg_match_all("/<img[^>]*>/i", $text, $matches);

    // If there's only one img tag, no need to wrap
    if ($imgCount <= 1) {
        return $text;
    }
    if ($imgCount <= 4 && $imgCount >= 4) {
        // Split the text into parts before and after the first img tag
        $parts = explode('<img', $text, 2);

        // Wrap the remaining parts in a div with a class (add or adjust the class name as needed)
        return $parts[0] . '<p class="'.$class_name .'"><img ' . $parts[1] . '</p>';
    } else if ($imgCount >= 5) {
        $parts = explode('<img', $text); // Split into 6 parts: before and after 5 img tags

        // If there are 5 or more img tags, wrap the first 5 in a paragraph
        // and the rest in a separate div

        $imgCnx = $imgCount-4;

        return $parts[0] . '
            <p class="' . $class_name . ' pR">
                <var class="u_psgCnt pA">+ '.$imgCnx.'</var>
                <img '.implode('<img', array_slice($parts, 1, 4)).'
                <div class="dN"><img '.implode('<img', array_slice($parts, 5)).'</div>
            </p>
            ';
        }
}

if($uImgXX != NULL || $uImgXX != ""){
    $uIMG1X = '<img src="'.$m_path.'u/'.$log_id.'/avt/'.$uImgXX.'" alt="'.$log_username.'">';
} else if($uImgXX == NULL || $uImgXX == ""){
    $uIMG1X = '<img src="'.$m_path.'img/temp/user-pic_1.0.png" alt="'.$log_username.'">';
}
// unique view for user page
if (isset($_GET["u"])) {
    $u = preg_replace('#[^a-z0-9.@]#i', '', $_GET['u']);
    $uid = $sql______dbx___xX__->query("SELECT id FROM users WHERE username ='$u' LIMIT 1")->fetchColumn();
    $pTrm = "AND u.id = $uid";
    $p = "";
    $maxCnt = 100;
} else if (isset($p)) {  
    $maxCnt = 1;// only for view page
    // check post number for type
    try {
	    foreach ($sql______dbx___xX__->query("SELECT pid,opid,type FROM user_post WHERE pid = $p LIMIT 1") as $roo0w____X___xX__) {
            $pid_chk = $roo0w____X___xX__["pid"];
            $opid_chk = $roo0w____X___xX__["opid"];
            $tpe_chk = $roo0w____X___xX__["type"];
        } if ($tpe_chk !== "a") {
            $autNme_xpc = $autNme_upc;
        } if ($tpe_chk !== "a" && $tpe_chk === "b" || $tpe_chk === "c") {
            $autNme_xpc = $autNme_rpc;
            if ($tpe_chk === "b") {
                $p = $opid_chk;
            } else if ($tpe_chk === "c") {
                $p = $sql______dbx___xX__->query("SELECT opid FROM user_post WHERE pid = $opid_chk LIMIT 1")->fetchColumn();
            }
        }
        $pTrm = "AND up.pid = '$p'";
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }
} else { // non view page logic for orginal post reply pull
    $maxCnt = 5;
} if ($page === "search") {
    $pTrm = "AND up.data LIKE '%$se%'";
}


//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
/// GATHER UP ANY user_post REPLIES type A ///
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
try {
    if($sqlo_____dbx___xX__->query(
            $sqlt1 = "SELECT DISTINCT u.*,up.*
            FROM user_post AS up 
            INNER JOIN users AS u 
            WHERE u.id = up.aid1 
            $pTrm 
            AND up.type = 'a'
            AND up.hide = '0'
            AND up.remove = '0'
            ORDER BY postdate 
            DESC LIMIT $maxCnt")->fetchColumn()) {
		foreach ($sql______dbx___xX__->query($sqlt1) as $roo0w____X___xX__) {
        $uid_upc = $roo0w____X___xX__["id"];
        $pid_upc = $roo0w____X___xX__["pid"];
        $aut_upc = $roo0w____X___xX__["aid1"];
        $nmeDpy_FULL = nme_dply($sql______dbx___xX__,$aut_upc);
        $usrTag_FULL = base_ext($sql______dbx___xX__,$aut_upc);
        $aut2_upc = $roo0w____X___xX__["aid2"];
        $aut3_upc = $roo0w____X___xX__["aid3"];
        $tpe_chk = $roo0w____X___xX__["type"];
        $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
        if ($page === "view" && $log_id != $aut_upc) { // error check on view
            try {
                $sql______dbx___xX__->exec("UPDATE `user_post` SET `views` = views +1 WHERE pid='$pid_upc' LIMIT 1");
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            } try {
                $sql______x___xX__3 = $sql______dbx___xX__->prepare("INSERT INTO $tVw(
                            usid, 
                            vcid, 
                            ip, 
                            seendate) 
                        VALUES(:oid,
                            :vid,
                            :ip,
                            :date)");
                $sql______x___xX__3->execute([
                            ':oid' => $log_id,
                            ':vid' => $pid_upc,
                            ':ip' => $ip,
                            ':date' => date('Y-m-d H:i:s')]);
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            } 
        }
        $cnt_upc = $roo0w____X___xX__["v_count"];
        $cnt_c_vc = $cnt_upc;
        $uImg_upc = $roo0w____X___xX__["avatar"]; 
        $autNme_upc = $roo0w____X___xX__["username"];
        $dte_upc = timeAgo(strtotime($roo0w____X___xX__["postdate"]));
        $dta_upc = $roo0w____X___xX__["data"];
        //
        
        $dta_upc = mtpImgDtc($dta_upc);
        if ($p_load === 'm') {
            $dta_upc = addPathToImageSrc2($dta_upc);
        }
        //          
        
        //     // *********************************************************************\
        //
        // checks if user is verified
        $v1_upc = $roo0w____X___xX__["verified"];
        if($v1_upc == "y"){
        $v1_upc = '<span class="verified" title="verified">&#x2713;</span>';
        } else {
            $v1_upc = '';
        }
            
        if($uImg_upc != NULL || $uImg_upc != ""){
            $uImgx_upc = '<img src="'.$m_path.'u/'.$uid_upc.'/avt/'.$uImg_upc.'" alt="'.$autNme_upc.'">';
        } else if($uImg_upc == NULL || $uImg_upc == ""){
            $uImgx_upc = '<img src="'.$m_path.'img/temp/user-pic_1.0.png" alt="'.$autNme_upc.'">';
        }
        
        $uvte_1a = "pa";
        include_once("".$m_path."icl/glbl/glbl_upvote_all.php");
    

    //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
    /// GATHER UP ANY user_post REPLIES type B ///
    //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//

    // note retest logic and sub sub replies
    $replyThread_b_rpc = "";
    $replynumrows_b_rpc = $sqlo_____dbx___xX__->query("SELECT COUNT(opid) FROM user_post WHERE opid = '$pid_upc' AND type='b' AND hide = '0'")->fetchColumn();
    try {
        if($sqlo_____dbx___xX__->query(
            $sql1B = "SELECT up.*, u.*
            FROM user_post AS up
            INNER JOIN users AS u 
            ON up.opid = '$pid_upc'
            AND u.id = up.aid2 
            AND up.type='b' 
            -- unique logic for logged in user test
            AND up.hide = '0'
            ORDER BY up.postdate DESC")->fetchColumn()) {
            foreach ($sql______dbx___xX__->query($sql1B) as $roo0w____X___xX__B) {
                $uid_rpc = $roo0w____X___xX__B["id"];
                $pid_rpc = $roo0w____X___xX__B["pid"];
                 $opid_rpc = $roo0w____X___xX__B["opid"];
                if ($roo0w____X___xX__B["aid1"]) {
                    $aid1_rpc = $roo0w____X___xX__B["aid1"];
                } 
                $aid2_rpc = $roo0w____X___xX__B["aid2"];
                $aid3_rpc = $roo0w____X___xX__B["aid3"];
                $cnt_rpc = $roo0w____X___xX__B["v_count"];
                $autNme_rpc = $roo0w____X___xX__B["username"];
                $dta_rpc = Strip_tags($roo0w____X___xX__B["data"]);
                $dte_rpc = timeAgo(strtotime($roo0w____X___xX__B["postdate"]));
                $v_rpc = $roo0w____X___xX__B["verified"];
                if($v_rpc == "y"){
                $v_rpc = '<span class="verified" title="verified">&#x2713;</span>';
                } else {
                    $v_rpc = '';
                }
                $uImg_rpc = $roo0w____X___xX__B["avatar"];
                if($uImg_rpc != NULL || $uImg_rpc != ""){
                $uImgx_rpc = '<img src="'.$m_path.'u/'.$uid_rpc.'/avt/'.$uImg_rpc.'" alt="'.$autNme_rpc.'">';
                } else if($uImg_upc == NULL || $uImg_rpc == ""){
                    $uImgx_rpc = '<img src="'.$m_path.'img/temp/user-pic_1.0.png" alt="'.$autNme_rpc.'">';
                }

                
                if ($aut_upc == $log_id ||
                    $aut2_upc == $log_id ||
                    $aut3_upc == $log_id || 
                    $aid1_rpc == $log_id || 
                    $aid2_rpc == $log_id || 
                    $aid3_rpc == $log_id) {
                    $txt_Plc = "reply to your own reply $log_username";
                } else if ($aut_upc != $log_id ||
                        $aut2_upc != $log_id ||
                        $aut3_upc != $log_id ||
                        $aid1_rpc != $log_id || 
                        $aid2_rpc != $log_id || 
                        $aid3_rpc != $log_id) {
                    $txt_Plc = "reply to $autNme_xpc's reply $log_username";
                } if ($log_id == "") {
                    $txt_Plc = "login or join the kodoverse to reply to $autNme_xpc's reply.";
                } 

                if ($tpe_chk === "a") {
                    $pid_xpc = $pid_upc;
                } else if ($tpe_chk === "b") {
                    $pid_xpc = $pid_rpc;
                }
                ////\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\/
                $rnr_c_rpc = $sql______dbx___xX__->query("SELECT COUNT(opid) FROM user_post WHERE opid = '$pid_rpc' AND type = 'c'")->fetchColumn();
                $msgCnt__c = "<span id=\"msgCnt__c_$pid_rpc\">$rnr_c_rpc</span>";
                ////\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\////
                
                //////////////////////////////////////////////////////////////////////   
                $pstSet__xXx = "";
                if ($log_id != "" && $user_ok == true) {
                    $pstSet__xXx = '
                    <div class="dDm_pstX dI fR" onclick="post_mNu_tGl(\'user_reply\',\'pb\',\''.$pid_rpc.'\',\''.$page.'\')">
                        <div>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <!-- universal menu loads here -->
                        <ul id="post_mNu_id_'.$pid_rpc.'"  class="dDm_pst dN"></ul>
                    </div>
                    ';                            
                } if ($log_id !== $aid2_rpc && $user_ok === true) {
                    $cnt_btn_x2 = '<li id="gBtn_cx_'.$pid_rpc.'" onclick="glblUSr_sMOD(\''.$log_id.'\',\''.$aid2_rpc.'\',\''.$log_HshCde.'\',\'cnct_y\')">connect</li>'; 
                    if($sql______dbx___xX__->query("SELECT accepted FROM connections WHERE uid1='$log_id' AND uid2='$aid2_rpc' AND accepted = '1' LIMIT 1")->fetchColumn()) {
                        $cnt_btn_x = '<li id="gBtn_rx_'.$pid_rpc.'" onclick="glblUSr_sMOD(\''.$log_id.'\',\''.$aid2_rpc.'\',\''.$log_HshCde.'\',\'cnct_x\')">connected</li>';
                    }
                    $pst_cnct_mod2 .= '
                    <div class="pst_cnct_mod _cnct_alg2" onclick="upTglx(\'cnct_mod_\',\''.$pid_rpc.'\')">
                        <i class="uadd_icn">+</i>
                        <ul id="cnct_mod_'.$pid_rpc.'" class="pA dN">
                            '.$cnt_btn_x2.'
                        </ul>
                    </div>
                    ';
                } if ($log_id === $aid2_rpc) {
                    $pst_cnct_mod2 = "";
                }
                

                $replyThread_b_rpc .= '
                <div id="reply_'.$pid_rpc.'" class="vw-cmnt-Pst">
                    '.$trCnt_Arw.'
                    '.$uImgx_rpc.'
                    '.$pst_cnct_mod2.'
                    '.$pstSet__xXx.'
                    <div class="vw-cmnt-txt di">
                        <div class="usr_Rply-Rgt dI">
                            <div><a href="user.php?u='.$autNme_xpc.'">'.$autNme_xpc.'</a> '.$v_rpc.'</div>
                            <div><span>Posted: '.$dte_rpc.'</span></div>
                        </div>
                    </div>
                    <div>
                        <a onclick="glbl_rply_tGl(\''.$pid_upc.'\',\''.$pid_rpc.'\',\'c\',\'user_cmnt\',\''.$page.'\')"><i class="fi-comment"></i> '.$msgCnt__c.'</a>
                    </div>
                    <div class="usr_Rply-Bdy dB imgVW_x1">'.$dta_rpc.'</div>
                    <div id="rply_1_Area_'.$pid_rpc.'" class="dN">
                        <textarea class="btnRply_cX" id="rthrd_c_opx_'.$pid_rpc.'" placeholder="'.$txt_Plc.'"></textarea>
                        '.$btnRply_CX.'
                        <!-- AJAX call // comment reply load out -->
                        <div id="replyThread__c1_rpc_'.$pid_rpc.'"></div>
                    </div>
                </div>
                ';

            }
    } else {
        if ($uid_upc == $log_id) {
            $rThrdMsg = 'Be the first to reply to your own post <b>'.$log_username.'</b>.';
        } else if ($uid_upc != $log_id) {
            $rThrdMsg = 'There are no repplies to <b>'.$autNme_xpc.'</b>\'s post as of yet. Be the first <b>'.$log_username.'</b>.';
        }
        $replyThread_b_rpc .= '<div id="reply_'.$pid_upc.'" class="vw-cmnt-Pst pad-T">'.$rThrdMsg.'</div>';
    }
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }      

    // for both original and reply button logic
    if ($aut_upc == $log_id ||
        $aut2_upc == $log_id ||
        $aut3_upc == $log_id || 
        $aid1_rpc == $log_id || 
        $aid2_rpc == $log_id || 
        $aid3_rpc == $log_id) {
    $btnRply_CX = "<button class=\"btnRply_cX\" $clk__cx>reply to your own reply $autNme_xpc</button>";
    } else if ($aut_upc != $log_id ||
                $aut2_upc != $log_id ||
                $aut3_upc != $log_id ||
                $aid1_rpc != $log_id || 
                $aid2_rpc != $log_id || 
                $aid3_rpc != $log_id) {
        $btnRply_CX = "<button class=\"btnRply_cX\" $clk__cx>reply to $autNme_xpc reply $log_username</button>";
    } else if ($log_id == ""&& $user_ok == false) {
        $btnRply_CX = "<a href=\"membership.php\"><button class=\"btnRply_cX\" >login or join to reply</button></a>";
    }
    //////////////////////////////////////////////////////////////////////   
    $pstSet__xXy = "";
    if ($log_id != "" && $user_ok == true) {
        $pstSet__xXy = '
        <div class="dDm_pstX dI fR" onclick="post_mNu_tGl(\'user_post\',\'pb\',\''.$pid_upc.'\',\''.$page.'\')">
            <div>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!-- universal menu loads here -->
            <ul id="post_mNu_id_'.$pid_upc.'"  class="dDm_pst dN"></ul>
        </div>
        ';                            
    }

    $usrRplyThrd_b = '
    <div id="rply_1_Area_'.$pid_upc.'" class="dN">
        <textarea class="btnRply_cX" id="rthrd_c_opx_'.$pid_upc.'" placeholder="'.$txt_Plc.'"></textarea>
        '.$btnRply_CX.'
        <!-- AJAX call // comment reply load out -->
        <div id="usrRplyThrd_b_'.$pid_upc.'"></div>
    </div>  
    ';

    if ($page === "view") {
        $relpyArea1 = '
        <div class="usr_Rply-Wpr pad-T">
            '.$uIMG1X.'
            <div class="add-reply3-Wpr dI">
                <textarea id="rthrd_b_opx_'.$pid_upc.'" class="pst_reply_x onkeyup="user_postMax(this,250)" placeholder="'.$txt_Plc.'"></textarea>
            </div>
            '.$btnRply_CX.'
        </div>
        ';
    } if ($log_id !== $aut_upc && $user_ok === true) {
        $cnt_btn_x = '<li id="gBtn_cx_'.$pid_upc.'" onclick="glblUSr_sMOD(\''.$log_id.'\',\''.$aut_upc.'\',\''.$log_HshCde.'\',\'cnct_y\')">connect</li>'; 
        if($sql______dbx___xX__->query("SELECT accepted FROM connections WHERE uid1='$log_id' AND uid2='$aut_upc' AND accepted = '1' LIMIT 1")->fetchColumn()) {
            $cnt_btn_x = '<li id="gBtn_rx_'.$pid_upc.'" onclick="glblUSr_sMOD(\''.$log_id.'\',\''.$aut_upc.'\',\''.$log_HshCde.'\',\'cnct_x\')">connected</li>';
        }
        $pst_cnct_mod .= '
        <div class="pst_cnct_mod _cnct_alg1" onclick="upTglx(\'cnct_mod_\',\''.$pid_upc.'\')">
            <i class="uadd_icn">+</i>
            <ul id="cnct_mod_'.$pid_upc.'" class="pA dN">
                '.$cnt_btn_x.'
            </ul>
        </div>
        ';
    } if ($log_id === $aut_upc) {
        $pst_cnct_mod = "";
    }
            
    //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
    $output_v1_upc .= '
    <div id="user_post_'.$pid_upc.'" style="border: none;">
    <a href="view.php?t=user&v='.$pid_upc.'">
        <div class="vw-cmnt-Hdr" style="display: flex;">
            <div class="usr_Pst-Wpr" style="width: 100%;">
                '.$trCnt_Arw.'
                <a href="user.php?u='.$autNme_upc.'">
                    '.$uImgx_upc.'
                </a>
                '.$pst_cnct_mod.'
                <div class="usr_Pst-Rgt dI">
                    <div>'.$usrTag_FULL.'</div>
                    <div><span>Posted: '.$dte_upc.'</span></div>
                    <div><a onclick="glbl_rply_tGl(\''.$pid_upc.'\',\''.$pid_xpc.'\',\'xb\',\'user_cmnt\',\''.$page.'\')">'.$replynumrows_b_rpc.' Comments</a></div>
                </div>
                '.$pstSet__xXy.'
                <div class="usr_Pst-Bdy dB imgVW_x1">'.$dta_upc.'</div>
                '.$usrRplyThrd_b.'
            </div>
        </div>
        </a>
    </div>
    '; 
    }  
    // if post has been deleted redirect to 404
    // -- post owner can unhide and undo delete status in settings
    
} else {
    if (isset($u)) {
        $output_v1_upc .= '
        <div class="thrd-Wpr">
            <div class="thrd-Inr">
                '.$u.' hasn\'t posted anything as of yet 
            </div>
        </div>
        ';
    } else {
        header("location: 404.php?msg=mouse dected, mouse detected... This post doesn't exist.");
    }
}
} catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}          
?>