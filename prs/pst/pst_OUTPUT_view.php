<?php
$path_1a = '../../';
$m_path = "";
// include_once(''.$path_1a.'icl/cnnc_t.php');
include_once(''.$path_1a.'icl/c_sts.php');
include_once(''.$path_1a.'icl/addons/nmedply.php');
include_once(''.$path_1a.'icl/addons/baseext.php');
include_once(''.$path_1a.'prs/time_system.php');

$pstEdt2c = "";
$replyThread__c1_rpc = "";
$gLbl_uvt_bStl_1 = 'style="border-color: #000;"';
$gLbl_uvt_bStl_2 = 'style="border-color: darkred;"';
$btnVt_clr1 = $gLbl_uvt_bStl_1;
$btnVt_clr2 = $gLbl_uvt_bStl_1;
$aid3_c_rpc = "";

$vCid = $rpid__x;
if ($post__x === "user_cmnt") {
    $id_uNq = "pid";
    $cid_uNq = "";
    $rid_uNq = "";
    $vTbl = "user_post";
    $tUv = "user_upvote";
    if ($type__x == "b" || $type__x == "xb") {
        $vAId = "aid2";
        if ($type__x == "b") {
            $vLmt = 1;
        }
        if ($type__x === "xb") {
            // reverts xb back to type b
            $type__x = "b";
            $vCid = $opid__x;
            $vLmt = 5;
        }
    } else if ($type__x == "c") {
        $vAId = "aid3";
        $vLmt = 5;
    }
} else if ($post__x !== "user_cmnt" && $post__x === "blog_cmnt" || $post__x === "forum_cmnt" || $post__x === "goal_cmnt") {
    
    // new catch
    if ($post__x == "blog_cmnt") { 
        $id_uNq = "bcid";
        $cid_uNq = "bcid";
        $rid_uNq = "brid";
        $tUv = "blog_upvote";
        $vTbl = "blog_comments";
    } else if ($post__x == "forum_cmnt") { 
        $id_uNq = "fcid";
        $cid_uNq = "fcid";
        $rid_uNq = "frid";
        $tUv = "forum_upvote";
        $vTbl = "forum_comments";
        $vAId = "aid2";
    } else if ($post__x == "goal_cmnt") { 
        $id_uNq = "gcid";
        $cid_uNq = "gcid";
        $rid_uNq = "grid"; 
        $tUv = "goal_upvote";
        $vTbl = "goal_comments";
        $vAId = "aid2";
    }
    if ($type__x == "a") {
        $vAId = "aid1";
        $vLmt = 1;
    } else if ($type__x == "b" || $type__x == "c") {
        $vAId = "aid2";
        $vRpd = "ON tc.$rid_uNq = '$vCid'";
        $vLmt = 5;
    } 
}
// developer test
// all error catch test 1
// echo "NEW PAGE (1) CALL output test: $vTbl | $vCid | $vAId | $type__x | $vLmt";
// echo "NEW PAGE (1) output test: $cid__x | $aid1__x | $aid2__x | $aid3__x | $type__x | $data__x | $post__x | $page__x";

//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
/// GATHER UP ANY user_post REPLIES type C ///
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//

// note retest logic and sub sub replies

$replyThread_c_rpc = "";
if($sqlo_____dbx___xX__->query(
    $sql1C = "SELECT tc.*, u.*
    FROM $vTbl AS tc
    INNER JOIN users AS u
    ON tc.opid = '$vCid'
    AND u.id = tc.$vAId
    AND tc.hide = '0'
    AND tc.type = '$type__x'
    ORDER BY tc.postdate DESC LIMIT $vLmt")->fetchColumn()) {
    foreach ($sqlo_____dbx___xX__->query($sql1C) as $roo0w____X___xX__C) {
        $id_c_rpc = $roo0w____X___xX__C[$id_uNq];
        if ($post__x !== "user_cmnt") {
            $cid_c_rpc = $roo0w____X___xX__C[$cid_uNq];
            $pid_c_rpc = $roo0w____X___xX__C[$rid_uNq];
        }
        $opid_c_rpc = $roo0w____X___xX__C["opid"];
        $aid1_c_rpc = $roo0w____X___xX__C["aid1"];
        $aid2_c_rpc = $roo0w____X___xX__C["aid2"];
        $nmeDpy_1_FULL = nme_dply($sqlo_____dbx___xX__,$aid1_c_rpc);
        $usrTag_1_FULL = base_ext($sqlo_____dbx___xX__,$aid1_c_rpc);
        if ($post__x == "user_cmnt") {
            $aid3_c_rpc = $roo0w____X___xX__C["aid3"];
        }
        $cnt_c_rpc = $roo0w____X___xX__C["v_count"];
        $autNme_c_rpc = $roo0w____X___xX__C["username"];
        $dta_c_rpc = Strip_tags($roo0w____X___xX__C["data"]);
        $dte_c_rpc = timeAgo(strtotime($roo0w____X___xX__C["postdate"]));
        $v_c_rpc = $roo0w____X___xX__C["verified"];
        if($v_c_rpc == "y"){
        $v_c_rpc = '<span class="verified" title="verified">&#x2713;</span>';
        } else {
            $v_c_rpc = ''; 
        }
        $uImg_c_rpc = $roo0w____X___xX__C["avatar"];
        if($uImg_c_rpc != NULL || $uImg_c_rpc != ""){
        $uImgx_c_rpc = '<img src="'.$m_path.'u/'.$log_id.'/avt/'.$uImg_c_rpc.'" alt="'.$autNme_c_rpc.'">';
        } else {
            $uImgx_c_rpc = '<img src="'.$m_path.'img/temp/user-pic_1.0.png" alt="'.$autNme_c_rpc.'">';
        }

        // temp insert values
        if ($post__x == "user_cmnt") {
            $pTp2 = "user_p";
            $post__x2 = "user_post";
        } else {
            if ($post__x == "blog_cmnt") {
                $pTp2 = "blog_p";
                $post__x2 = "blog_post";
            } else if ($post__x == "forum_cmnt") {
                $pTp2 = "forum_p";
                $post__x2 = "forum_post";
            } else if ($post__x == "goal_cmnt") {
                $pTp2 = "goal_p";
                $post__x2 = "goal_post";
            }
        } 

        $pstSet__xXx = "";
        if ($log_id != "" && $user_ok == true) {
            $pstSet__xXx = '
            <div class="dDm_pstX dI fR" onclick="post_mNu_tGl(\''.$post__x2.'\',\''.$type__x.'\',\''.$id_c_rpc.'\',\''.$page__x.'\')">
                <div>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!-- universal menu loads here -->
                <ul id="post_mNu_id_'.$id_c_rpc.'"  class="dDm_pst dN"></ul>
            </div>
            ';                            
        }
        //////////////////////////////////////////////////////////////
        //////////////////// upvote logic begins /////////////////////
        if ($cnt_c_rpc == "" || $cnt_c_rpc == 0 || $cnt_c_rpc <= 9) {
            $cnt_rpc_c_dpl = "00$cnt_c_rpc";
        } else if ($cnt_c_upc <= 99) {
            $cnt_rpc_c_dpl = "0$cnt_c_rpc";
        } else if ($cnt_c_rpc <= 999) {
            $cnt_rpc_c_dpl = "$cnt_c_rpc";
        } else if ($cnt_c_rpc >= 999) {
            $cnt_rpc_c_dpl = "01k";
        } 

        // echo "$vTbl | $tUv | $vCid | $vAId | $type__x | $vLmt";
        ///////////////////////////////////////////////////////////
        // logic only checks if user has liked post content before
        // illegal presets 
        $uvt_c_Up = "";
        $uvt_c_Dn = "";
        if($sqlo_____dbx___xX__->query(
            $sql_c_bvt  = "SELECT DISTINCT up.*,uv.* 
            FROM $vTbl AS up 
            INNER JOIN $tUv AS uv
            WHERE up.opid = '$vCid'
            AND uv.uid = up.$vAId
            AND up.type = '$type__x'
            LIMIT 1")->fetchColumn()) {
            foreach ($sqlo_____dbx___xX__->query($sql_c_bvt) as $row_c_vt1) {
                $uvt_c_Up = (int)$row_c_vt1["up_vote"];
                $uvt_c_Dn = (int)$row_c_vt1["dn_vote"];
                if ($uvt_c_Up == (int)1 && $uvt_c_Dn == (int)0) {
                    $btnVt_clr1 = $gLbl_uvt_bStl_2;
                    $btnVt_clr2 = $gLbl_uvt_bStl_1;
                } if ($uvt_c_Up == (int)0 && $uvt_c_Dn == (int)1) {
                    $btnVt_clr1 = $gLbl_uvt_bStl_1;
                    $btnVt_clr2 = $gLbl_uvt_bStl_2;
                }
                /////////////////////////////////////////////////////////
                $trCnt_Arw_R2 = '
                <span class="UpVote_lg1 trCnt-Wpr di fl">
                    <i '.$btnVt_clr1.' id="UpVote_'.$id_c_rpc.'" onclick="usr_Upv_fN1(\''.$id_c_rpc.'\',\''.$log_id.'\',\'c_up\',\''.$pTp2.'\',\'cnt_r\',\''.$cnt_c_rpc.'\')" class="trCnt-Arw up db"></i>
                        <span id="uvt_nUmz__'.$id_c_rpc.'">'.$cnt_rpc_c_dpl.'</span>
                    <i '.$btnVt_clr2.' id="DnVote_'.$id_c_rpc.'" onclick="usr_Upv_fN1(\''.$id_c_rpc.'\',\''.$log_id.'\',\'c_dn\',\''.$pTp2.'\',\'cnt_r\',\''.$cnt_c_rpc.'\')" class="trCnt-Arw down db"></i>
                </span>
                ';
                //////////////////////////////////////////////////////////////
                //////////////////// upvote logic ends ///////////////////////
                //////////////////////////////////////////////////////////////
                // comments/ reply thread left closed at c, 3 levels... further to 7 only in forums

                $cmntCnt = "";
                $rLoad = "";
                $glbl_rply = "";
                if ($type__x == "a" || $type__x == "b") {
                    //<!-- AJAX call // comment reply load out -->
                    if ($vLmt === 1) {
                        ////\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\// reply button logic
                        $clk__cx = 'onclick="rplyGlbl(\''.$id_c_rpc.'\',\''.$aid1_c_rpc.'\',\''.$aid2_c_rpc.'\',\''.$log_id.'\',\'c\',\''.$post__x.'\',\''.$page__x.'\')"';
                        $btnRply_CX = "<button class=\"btnRply_cX\" $clk__cx>reply to your own reply $log_username</button>";
                        $txt_Plc = "reply to your own reply $log_username";
                        //////////////////////////////////////////////////////////////////////  
                        $rLoad = '
                        <div id="rply_1_Area_'.$id_c_rpc.'" class="dN">
                            <textarea class="btnRply_cX" id="rthrd_c_opx_'.$id_c_rpc.'" placeholder="'.$txt_Plc.'"></textarea>
                            '.$btnRply_CX.'
                            <!-- AJAX call // comment reply load out -->
                            <div id="replyThread__c1_rpc_'.$id_c_rpc.'"></div>
                        </div>
                        ';
                        $cmntCnt = 0;
                    } else if ($vLmt === 5) {
                        $rLoad = '<div id="replyThread__c1_rpc_'.$id_c_rpc.'"></div>';
                        // $cmntCnt .= $replynumrows_c_rpc;
                    }
                    $glbl_rply = '
                    <div>
                        <a onclick="glbl_rply_tGl(\''.$id_c_rpc.'\',\''.$id_c_rpc.'\',\'c\',\'blog_cmnt\',\''.$page__x.'\')"><i class="fi-comment"></i> '.$cmntCnt.'</a>
                    </div>
                    ';
                    // comment count // will be zero on first load
                } if ($type__x == "c") {
                    // $cmntCnt .= $replynumrows_c_rpc;
                    $glbl_rply = "";
                } else {
                    // comment count sops at b for now
                    $cmntCnt = ""; // nothing not zero
                }

                $replyThread__c1_rpc .= '
                <div id="reply_'.$id_c_rpc.'" class="vw-cmnt-Pst">
                    '.$trCnt_Arw_R2.'
                    '.$uImgx_c_rpc.'
                    '.$pstSet__xXx.'
                    <div class="vw-cmnt-txt di">
                        <div class="usr_Rply-Rgt dI">
                            <div>'.$nmeDpy_1_FULL.''.$usrTag_1_FULL.'</div>
                            <div><span>Posted: '.$dte_c_rpc.'</span></div>
                        </div>
                    </div>
                    '.$glbl_rply.'
                    <div class="usr_Rply-Bdy dB">'.$dta_c_rpc.'</div>
                    '.$rLoad.'
                </div>
                ';
            }

            if ($type__x == "a" && $post__x == "blog_cmnt" || $post__x == "forum_cmnt" || $post__x == "goal_cmnt") {
                echo $replyThread__c1_rpc;
            } else {
                $pstBODY = "<div id=\"rthd_c_opt_$rpid__x\"></div>$replyThread__c1_rpc";
                if ($vLmt === 1) {
                    echo $pstBODY; 
                } else if ($vLmt === 5) {
                    echo "<div class=\"rLoad\">$pstBODY</div>";
                }
            }
        } else {
            echo "Sorry, meow, i'm having trouble loading the replies.";
            echo $sqlc_____dbx___xX__;
        }
    }
}
?>