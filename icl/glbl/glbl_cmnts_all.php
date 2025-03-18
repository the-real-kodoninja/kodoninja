<?php
$pst_cnct_mod2 = "";

if ($p_load === 'm') {
    function addPathToImageSrc4_2($dta_rpc) {
        $dom = new DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML($dta_rpc);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $image) {
            $src = $image->getAttribute('src');
            $image->setAttribute('src', '../' . $src);
        }
        return $dom->saveHTML();
    }
}

//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
/// GATHER UP ANY user_post REPLIES type A ///
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
// note retest logic and sub sub replies
$replyThread_b_rpc = "";
try {
    if($count_upc = $sqlo_____dbx___xX__->query(
        $sql1b = "SELECT tc.*, u.*
        FROM $tCmt AS tc
        INNER JOIN users AS u 
        ON tc.opid = '$id_vc'
        AND tc.aid1 = u.id
        AND tc.type = 'a' 
        ORDER BY tc.postdate DESC")->fetchColumn()) {
	foreach ($sqlo_____dbx___xX__->query($sql1b) as $row1B) {
        // $pid_rpc = $row1B[$id_uNq];
        $cid_rpc = $row1B[$cid_uNq];
        $prid_rpc = $row1B[$rid_uNq];
        $opid_rpc = $row1B["opid"];
        $aid1_rpc = $row1B["aid1"];
        $aid2_rpc = $row1B["aid2"];
        $cnt_rpc = $row1B["v_count"];
        $uid_rpc = $row1B["id"];
        $autNme_rpc = $row1B["username"];
        $nmeDpy_1_FULL = nme_dply($sqlo_____dbx___xX__,$aid1_rpc);
        $usrTag_1_FULL = base_ext($sqlo_____dbx___xX__,$aid1_rpc);
        $dta_rpc = $row1B["data"];
        $dte_rpc = timeAgo(strtotime($row1B["postdate"]));
        $v_rpc = $row1B["verified"];
        if($v_rpc == "y"){
        $v_rpc = '<span class="verified" title="verified">&#x2713;</span>';
        } else {
            $v_rpc = '';
        }
        $uImg_rpc = $row1B["avatar"];
        if($uImg_rpc != NULL || $uImg_rpc != ""){
        $uImgx_rpc = '<img src="'.$m_path.'u/'.$uid_rpc.'/avt/'.$uImg_rpc.'" alt="'.$autNme_rpc.'">';
        } else if($uImg_rpc == NULL || $uImg_rpc == ""){
            $uImgx_rpc = '<img src="'.$m_path.'img/temp/no_imgLnk2.svg" alt="'.$autNme_rpc.'">';
        }

        if ($p_load === 'm') {
            $dta_rpc = addPathToImageSrc4_2($dta_rpc);
        }

        $pstSet__xXx_2 = "";
        if ($log_id != "" && $user_ok == true) {
            $pstSet__xXx_2 = '
            <div class="dDm_pstX dI fR" onclick="post_mNu_tGl(\''.$c_typeB.'\',\'pa\',\''.$cid_rpc.'\',\''.$page.'\')">
                <div>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!-- universal menu loads here -->
                <ul id="post_mNu_id_'.$cid_rpc.'"  class="dDm_pst dN"></ul>
            </div>
            ';                            
        }

        //////////////////////////////////////////////////////////////
        //////////////////// upvote logic begins /////////////////////
        if ($cnt_rpc == "" || $cnt_rpc == 0 || $cnt_rpc <= 9) {
            $cnt_rpc_b_dpl = "00$cnt_rpc";
        } else if ($cnt_upc <= 99) {
            $cnt_rpc_b_dpl = "0$cnt_rpc";
        } else if ($cnt_rpc <= 999) {
            $cnt_rpc_b_dpl = "$cnt_rpc";
        } else if ($cnt_rpc >= 999) {
            $cnt_rpc_b_dpl = "01k";
        } 
        ///////////////////////////////////////////////////////////
        // logic only checks if user has liked post content before
        try {
            if($count_rpc = $sqlo_____dbx___xX__->query(
                $sql_b_bvt1 = "SELECT DISTINCT tc.*,uv.* 
                FROM $tCmt AS tc 
                INNER JOIN $tUv AS uv
                WHERE tc.opid = '$id_vc'
                AND uv.uid = tc.aid1 
                AND tc.type = 'a' 
                LIMIT 1")->fetchColumn()) {
                foreach ($sqlo_____dbx___xX__->query($sql_b_bvt1) as $row_b_vt1) {
                    $uvt_b_Up = (int)$row_b_vt1["up_vote"];
                    $uvt_b_dN = (int)$row_b_vt1["dn_vote"];
                }
                if ($uvt_b_Up == (int)1 && $uvt_b_dN == (int)0) {
                    $btnVt_clr1 = $gLbl_uvt_bStl_2;
                    $btnVt_clr2 = $gLbl_uvt_bStl_1;
                } if ($uvt_b_Up == (int)0 && $uvt_b_dN == (int)1) {
                    $btnVt_clr1 = $gLbl_uvt_bStl_1;
                    $btnVt_clr2 = $gLbl_uvt_bStl_2;
                }
            } 
        } catch (PDOException $newError) {
            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
        }
        
        /////////////////////////////////////////////////////////
        $trCnt_Arw_R1 = '
        <span class="UpVote_lg1 trCnt-Wpr di fl">
            <i '.$btnVt_clr1.' id="UpVote_'.$cid_rpc.'" onclick="usr_Upv_fN1(\''.$cid_rpc.'\',\''.$log_id.'\',\'c_up\',\''.$c_typeA.'\',\'cnt_r\',\''.$cnt_rpc.'\')" class="trCnt-Arw up db"></i>
                <span id="uvt_nUmz__'.$cid_rpc.'">'.$cnt_rpc_b_dpl.'</span>
            <i '.$btnVt_clr2.' id="DnVote_'.$cid_rpc.'" onclick="usr_Upv_fN1(\''.$cid_rpc.'\',\''.$log_id.'\',\'c_dn\',\''.$c_typeA.'\',\'cnt_r\',\''.$cnt_rpc.'\')" class="trCnt-Arw down db"></i>
        </span>
        ';
        //////////////////////////////////////////////////////////////
        //////////////////// upvote logic ends ///////////////////////
        //////////////////////////////////////////////////////////////
        if ($aid2_rpc == $log_id) {
            $txt_Plc = "reply to your own reply $autNme_rpc";
        } if ($aid2_rpc != $log_id) {
            $txt_Plc = "reply to $autNme_rpc's reply $log_username";
        } if ($log_id == "") {
            $txt_Plc = "login or join the kodoverse to reply to $autNme_rpc's reply.";
        } 

        ////\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\/
        $rnr_c_rpc = $sqlo_____dbx___xX__->query("SELECT COUNT(opid) FROM $tCmt WHERE opid = '$cid_rpc' AND type = 'c'")->fetchColumn();
        $msgCnt__c = "<span id=\"msgCnt__c_$cid_rpc\">$rnr_c_rpc</span>";
        ////\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\////
        // reply button logic
        $clk__cx = 'onclick="rplyGlbl(\''.$cid_rpc.'\',\''.$aid1_rpc.'\',\''.$aid2_rpc.'\',\''.$log_id.'\',\'c\',\''.$pst_uNq.'\',\''.$page.'\')"';
        if ($autNme_rpc == $log_username) {
        $btnRply_CX = "<button class=\"btnRply_cX\" $clk__cx>reply to your own reply $log_username</button>";
        } if ($autNme_rpc != $log_username) {
            $btnRply_CX = "<button class=\"btnRply_cX\" $clk__cx>reply to $autNme_rpc reply $log_username</button>";
        } if ($log_id == "") {
            $btnRply_CX = "<a href=\"membership.php\"><button class=\"btnRply_cX\" >login or join to reply</button></a>";
        }
        //////////////////////////////////////////////////////////////////////
        if ($log_id !== $aid2_rpc && $user_ok === true) {
            $cnt_btn_x2 = '<li id="gBtn_cx_'.$cid_rpc.'" onclick="glblUSr_sMOD(\''.$log_id.'\',\''.$aid2_rpc.'\',\''.$log_HshCde.'\',\'cnct_y\')">connect</li>'; 
            if($rnr_c_rpc = $sqlo_____dbx___xX__->query("SELECT accepted FROM connections WHERE uid1='$log_id' AND uid2='$aid2_rpc' AND accepted = '1' LIMIT 1")->fetchColumn()) {
                $cnt_btn_x = '<li id="gBtn_rx_'.$cid_rpc.'" onclick="glblUSr_sMOD(\''.$log_id.'\',\''.$aid2_rpc.'\',\''.$log_HshCde.'\',\'cnct_x\')">connected</li>';
            }
            $pst_cnct_mod2 .= '
            <div class="pst_cnct_mod _cnct_alg2" onclick="upTglx(\'cnct_mod_\',\''.$cid_rpc.'\')">
                <i class="uadd_icn">+</i>
                <ul id="cnct_mod_'.$cid_rpc.'" class="pA dN">
                    '.$cnt_btn_x2.'
                </ul>
            </div>
            ';
        } if ($log_id === $aid1_rpc || $log_id === $aid2_rpc) {
            $pst_cnct_mod2 = "";
        }
        //////////////////////////////////////////////////////////////////////
        $replyThread_b_rpc .= '
        <div id="reply_'.$cid_rpc.'" class="vw-cmnt-Pst">
            '.$trCnt_Arw_R1.'
            '.$uImgx_rpc.'
            '.$pst_cnct_mod2.'
            '.$pstSet__xXx_2.'
            <div class="vw-cmnt-txt di">
                <div class="usr_Rply-Rgt dI">
                    <div>'.$nmeDpy_1_FULL.''.$usrTag_1_FULL.'</div>
                    <div><span>Posted: '.$dte_rpc.'</span></div>
                </div>
            </div>
            <div>
                <a onclick="glbl_rply_tGl(\''.$cid_rpc.'\',\''.$cid_rpc.'\',\'c\',\''.$pst_uNq.'\',\''.$page.'\')"><i class="fi-comment"></i> '.$msgCnt__c.'</a>
            </div>
            <div class="usr_Rply-Bdy dB imgVW_x1">'.$dta_rpc.'</div>
            <div id="rply_1_Area_'.$cid_rpc.'" class="dN">
                <textarea class="btnRply_cX" id="rthrd_c_opx_'.$cid_rpc.'" placeholder="'.$txt_Plc.'"></textarea>
                '.$btnRply_CX.'
                <!-- AJAX call // comment reply load out -->
                <div id="replyThread__c1_rpc_'.$cid_rpc.'"></div>
            </div>
        </div>
        
        ';
    }
} else {
    if ($uid_vc == $log_id) {
        $rThrdMsg = 'Be the first to reply to your own '.$t.' post <b>'.$log_username.'</b>.';
    } else if ($uid_vc != $log_id) {
        $rThrdMsg = 'There are no comments to <b>'.$a_vc.'</b>\'s '.$t.' <b>'.$t_vc.'</b> as of yet. Be the first.';
    }
    $replyThread_b_rpc .= '
    <div id="reply_'.$id_vc.'" class="vw-cmnt-Pst pad-T">'.$rThrdMsg.'</div>
    <!-- test echo -->
    <div id="rthd_c_opt_'.$id_vc.'"></div>
    <div id="rthd_b_opt_'.$id_vc.'"></div>
';
}
} catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
} 


// stays global 
$clk__1x = 'onclick="rplyGlbl(\''.$id_vc.'\',\''.$aid_vc.'\',\''.$aid_vc.'\',\'0\',\'a\',\''.$pst_uNq.'\',\''.$page.'\')"';
if ($a_vc == $log_username) {    $btnRply_1X = "<button class=\"btnRply_1X\" $clk__1x>reply to your own $t post $a_vc</button>";

    $msgRply = 'reply to your own '.$t.' post '.$log_username.'?';
} if ($a_vc != $log_username) {
    $btnRply_1X = "<button class=\"btnRply_1X\" $clk__1x>reply to $a_vc $t post</button>";
    $msgRply = 'reply to '.$a_vc.'\'s '.$t.' post '.$log_username.'?';
} if ($log_id == "") {
    $btnRply_1X = "<a href=\"membership.php\"><button class=\"btnRply_1X\">login or join the kodoverse to  reply to $a_vc $t post</button></a>";
    $msgRply = 'login or join the kodoverse to reply to this '.$t.' post.';
}
//////////////////////////////////////////////////////////////////////

$relpyArea1 = '
<div class="usr_Rply-Wpr pad-T">
    '.$uIMG1X.'
    <div class="add-reply3-Wpr dI">
        <textarea id="rthrd_b_opx_'.$id_vc.'" class="pst_reply_x onkeyup="user_postMax(this,250)" placeholder="'.$msgRply.'"></textarea>
    </div>
    '.$btnRply_1X.'
</div>
';
?>