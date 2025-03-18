<?php
$cmnt_view = "";
$output_upc = "";
//


if($p_load === 'f') {
    $rgt_lgc = '
    <div class="rgt-lgc fr">
        '.$share.''.$pge_Rpanel.'
    </div>
    ';
    $UNQbook_1 = '<p style="margin: 10px 0px -30px 0px;">Book "<span class="clr-r">Terrorism and conspiracy of a homeless developer</span>" comming Q2 2024</p>';
} else if($p_load === 'm') {
    $rgt_lgc = '
    <div>
        '.$share.''.$pge_Rpanel.'
    </div>
    ';
    $UNQbook_1 = '<p style="margin: 10px 0px 0px 0px;">Book "<span class="clr-r">Terrorism and conspiracy of a homeless developer</span>" comming Q2 2024</p>';
}


//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
    if ($t=== "user" && $log_id != "" && $user_ok == true) {
    $user_post_a = "";
    // delete mouse log
    $sql_dl = mysqli_query($cnnc_t, "SELECT * FROM delete_log WHERE cid = '$p' AND uid = '$log_id' AND active = '1' ORDER BY active DESC LIMIT 1");
    $nr_dl = mysqli_num_rows($sql_dl);
    if($nr_dl > 0){
        $cnt_delete_Res = true;
    }
    // hide mouse log
    $sql_hl = mysqli_query($cnnc_t, "SELECT * FROM hide_log WHERE cid = '$p' AND uid = '$log_id' AND active = '1' ORDER BY active DESC LIMIT 1");
    $nr_hl = mysqli_num_rows($sql_hl);
    if($nr_hl > 0){
        $cnt_hide_Res = true;
    } if ($cnt_delete_Res == true) {
        $user_post_a = $delCntMsg;
    } else if ($cnt_hide_Res == true) {
        $user_post_a = $hdCntMsg;
    } else {
        $user_post_a = '
        <div id="user_post_a_'.$cid_vc.'">
            <div class="blg_vwCnt Cnt_Bck dB">
                '.$output_v1_upc.'
            </div>
            <div class="blg_vwCnt Cnt_Bck dB">
                '.$relpyArea1.'
            </div>
            <div class="blg_vwCnt Cnt_Bck dB">
                <!-- new post outputs here via vanilla -->
                <div id="rthd_b_opt_'.$cid_vc.'"></div>
                '.$replyThread_b_rpc.'
            </div>
        </div>
        ';
    } 
}
$Content_view = '
<div class="blog-vW dI">
    <span>'.$vws_vc.'</span>
</div>
';     


if ($t == "user") {
    $up_mainView = '
    <div class="cnt_mn">
        <div class="lft-lgc2 dI">
            '.$user_post_a.'
            '.$cmtSwt1a.'
        </div>
        '.$rgt_lgc.'
    </div>
    ';
    //
    $vwBdy_Full = "$up_mainView";
} else if ($t == "blog" || $t == "forum" || $t == "goal") {
    if ($t !== "goal") {
        $prg_vc = "";
    }

    $tstAre = "";
    // $tstAre = '
    // <div class="w100"> 
    //     FIND ME: <br>
    //     <hr>
    //     log id: '.$log_id.' <br>
    //     log username:'.$log_username.' <br>
    //     log password: '.$log_password.' <br>
    //     log hash: '.$log_HshCde.' <br> 
    //     SESSION: '.$_SESSION['globalCode'].' <br>
    //     COOKIE: '.$_COOKIE["hcde"].' <br>
    // </div>';

    include_once("".$m_path."icl/blog/unq/UNGvw_41.php");
    include_once("".$m_path."icl/view/newBLGx.php");

    //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
    if ($p_load === 'f'){
        $blg_main = '
        <div class="cnt_mn">
            <div class="lft-lgc2 dI">
                <div class="bck-w dI" style="margin: 0px 0px 15px 0px;">
                    <div class="cNt-Hdr di">
                        <h2 id="tEdit1_vc" class="dI">
                            '.$t_vc.'
                        </h2>
                        '.$cov_vc.'
                        '.$trCnt_Arw.'
                        <div class="tEdit1_lg1 clip di">
                            
                            <span> by '.$usrTag_FULL.' 
                            <br>
                            Posted: '.$date_vc.'</span> | 
                            <a href="category.php?t='.$t.'&c='.$cat_vc.'">'.$cat_vc.'</a>
                        </div>
                        '.$pstSet__xXx_1.'
                    </div>
                    <ul class="cNt-Hsh" style="margin: 0px 0px 20px 0px;">
                        <span id="t2Edit1_vc">'.$Content_view.''.$yt_sub2.''.$tag_vc.'</span>
                    </ul>
                    <div class="cNt-Bdy">
                        <!-- temp test area-->
                        '.$tstAre.'
                        <div id="d_output">'.$cov_vc2.''.$prg_vc.''.$p_vc.'
                        '.$DCNtbl.'
                        '.$d_vc.'
                        '.$trm_vc.'
                        </div>
                    </div>
                </div>
                <div class="Cnt_Bck pad-T2 dB">
                    '.$d_ftr.'
                </div>
                <div id="pstView"></div>
                <div class="blg_vwCnt Cnt_Bck dB">
                    '.$relpyArea1.'
                </div>
                <div class="blg_vwCnt Cnt_Bck dB">
                    <!-- new post outputs here via vanilla -->
                    <div id="rthd_b_opt_'.$id_vc.'"></div>
                    '.$replyThread_b_rpc.'
                </div>
            </div>
            '.$rgt_lgc.'
        </div>
        ';
    } else if ($p_load === 'm'){
        $blg_main = '
        <div class="cnt_mn">
         
            <div class="lft-lgc2 dI">
            
                <div class="bck-w dI" style="margin: 0px 0px 15px 10px;">
                
                    <div class="cNt-Hdr di">
                    
                        <h2 id="tEdit1_vc">
                            '.$t_vc.'
                        </h2>
                        <div class="tEdit1_lg1 clip di">
                        '.$cov_vc.'
                            '.$trCnt_Arw.'
                            '.$pstSet__xXx_1.'
                            <span> by '.$usrTag_FULL.' 
                            <br>Posted: '.$date_vc.'</span> | 
                            <a href="category.php?t='.$t.'&c='.$cat_vc.'">'.$cat_vc.'</a>
                        </div>
                    </div>
                    <ul class="cNt-Hsh" style="margin: 0px 0px 20px 0px;">
                        <span id="t2Edit1_vc">'.$Content_view.''.$yt_sub2.''.$tag_vc.'</span>
                    </ul>
                    <div class="cNt-Bdy">
                        <!-- temp test area-->
                        '.$tstAre.'
                        <div id="d_output">'.$cov_vc2.''.$prg_vc.''.$p_vc.'
                        '.$DCNtbl.'
                        '.$d_vc.'
                        '.$trm_vc.'
                        </div>
                    </div>
                </div>
                <div class="Cnt_Bck pad-T2 dB">
                    '.$d_ftr.'
                </div>
                <div id="pstView"></div>
                <div class="blg_vwCnt Cnt_Bck dB">
                    '.$relpyArea1.'
                </div>
                <div class="blg_vwCnt Cnt_Bck dB">
                    <!-- new post outputs here via vanilla -->
                    <div id="rthd_b_opt_'.$id_vc.'"></div>
                    '.$replyThread_b_rpc.'
                </div>
            </div>
            '.$rgt_lgc.'
        </div>
        ';
    }
    //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
    $vwBdy_Full = "
        $blg_main
        $Trnd_Ftr
    ";
} else {
    header("location: 404.php?msg=mouse dectected!..");
}



?>