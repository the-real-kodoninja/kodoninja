<?php
$u_scl = "";
$full_CNT_5 = "";
include_once("".$m_path."icl/usr/usrCNT_gol.php"); 
include_once("".$m_path."icl/usr/usrCNT_1.php"); 
include_once("".$m_path."icl/usr/usrCNT_2.php");
include_once("".$m_path."icl/usr/usrCNT_3.php");
//include_once("".$m_path."icl/usr/usrCNT_4.php"); // not yet modded
include_once("".$m_path."icl/usr/usrTOKEN.php");
if ($page === "user") {
    include_once("".$m_path."icl/usr/usrCNT_5.php");
}
// include_once("".$m_path."icl/usr/usrCNT_7.php"); // not yet modded
//include_once("".$m_path."icl/usr/usrCNT_8.php"); // not yet modded
//include_once("".$m_path."icl/usr/usrCNT_9.php"); // not yet modded
//

// v4 updates include social media links


if ($p_load == "f") { 
    $bnrHdr = '
    <div class="usrHdr-Wpr pA w100 dB">
        '.$U_bnr.'
        <div class="bnrCnt usrHdr_Inr w100 pR">
            '.$U_pic.''.$uAvt_upd.'
            <!-- load b64 conversion here to grab -->
            <div class="dN">
                <div id="b64_mod1"></div>
                <div id="b64_mod2"></div>
            </div>
            <div class="bnrTxt-Hdr di">
                <span class="bnrUsrnme">
                    <span>'.$nmeDpy_uFULL.'</span>
                </span>
                <div class="bnrTxt-Inr">
                    <div class="base_ext">'.$usrTag_uFULL.'</div>
                    <div>'.$userBadge.'</div>
                    <div>'.$lastlogin.'</div>
                </div>
            </div>
            '.$bnrBtn.'
        </div>
        '.$uBnr_upd.'
    </div>
    '; 
    //
    $usrNav0 = '
    <ul id="usrCNT_TGL" class="usrNav0-Wpr">
        <span id="usrCNT_XX" class="selU" style="margin: 0px 0px 2px 15px;">Everything</span>
        <li data-target="usrCNT_1a">Blogs</li>
        <li data-target="usrCNT_3a">Goals</li>
        <li data-target="usrCNT_2a">Forums</li>
        <li data-target="usrCNT_4a">Post</li>
        <li data-target="usrCNT_5a">About</li>
        <li data-target="usrCNT_6a">Connections</li>
        <li data-target="usrCNT_7a">kodotokens</li>
        <li class="fR">
            <span>'.$totalPst_count.'</span>
        </li>
    </ul>
    ';
    //
    
    if ($u == "kodoninja") {
        $u_scl = '
        <!-- Socials -->
        <div class="Cnt_Bck">
            <div class="usrHdr">
                <div class="pad-T dI">
                    Socials
                </div>
                <div class="pad-T fR dI ">
                    '.$uBedit.'
                </div>
            </div>
            <div class="Cnt_Inr">
                <div class="w100">
                    <span>
                        <a href="https://www.youtube.com/@kodoninja" target="_blank">
                            <span class="tooltip">
                                <i class="fi-social-x"><img src="'.$m_path.'css/svg/YouTube_full-color_icon_(2017).svg.png" style="width: 29px;height: auto;margin: 0px 5px 0px 0px;"/></i>
                                <em class="tooltiptext" style="font-size: 14px;">YouTube</em>
                            </span>
                        </a>
                    </span>
                    <span>
                        <a href="https://twitter.com/kodoninja" target="_blank">
                            <span class="tooltip">
                                <i class="fi-social-x"><img src="'.$m_path.'css/svg/X_icon.svg.png" style="width: 20px;height: 20px;margin: 0px 5px 0px 0px;"/></i>
                                <em class="tooltiptext" style="font-size: 14px;">X: Twitter</em>
                            </span>
                        </a>
                    </span>
                    <span>
                        <a href="twitch.tv/kodoninja" target="_blank">
                            <span class="tooltip">
                                <i class="fi-social-x"><img src="'.$m_path.'css/svg/twitch_logo.jpg" style="width: 20px; height: 20px;"/></i>
                                <em class="tooltiptext" style="font-size: 14px;">Twitch</em>
                            </span>
                        </a>
                    </span>
                </div>
            </div>
        </div>
        ';
    }
    
    $usrAbt = '
    <div class"id="usrCNT_5a">
        <!-- About user -->
        <div class="Cnt_Bck">
            <div class="usrHdr">
                <div class="pad-T dI">
                    About '.$nmeDpy_uFULL.'
                </div>
                <div class="pad-T fR dI ">
                    '.$uBedit.'
                </div>
            </div>
            <div class="Cnt_Inr">
                <div class="w100">
                    '.$bio2.'
                </div>
            </div>
        </div>
        '.$u_scl.'
    </div>
    ';
    //
    $user_FULL = "
    <div class=\"main db mainVw2\" style=\"margin: 215px auto;\">
        <div class=\"lft-lgc fl\">
            $bnrHdr $usrNav0 $usrAbt 
            $full_CNT_1x $full_CNT_gol $full_CNT_2 $full_CNT_3
        </div>
        <div class=\"rgt-lgc fr\" style=\"width: auto;\">
            $full_TOKEN $full_CNT_5
        </div>
    </div>
    ";
} if ($p_load == "m") {
    $bnrHdr = '
    <div class="usrHdr-Wpr pR w100 dB">
        '.$U_bnr.'
        <div class="bnrCnt usrHdr_Inr w100 pR" style="margin: -7px 0px 0px;">
            '.$U_pic.''.$uAvt_upd.'
            <!-- load b64 conversion here to grab -->
            <div class="dN">
                <div id="b64_mod1"></div>
                <div id="b64_mod2"></div>
            </div>
            <div class="bnrTxt-Hdr di pA" style="margin: 0px 0px 0px 90px;">
                <span class="bnrUsrnme">
                    <span>'.$nmeDpy_uFULL.'</span>
                </span>
                <div class="bnrTxt-Inr">
                    <div class="base_ext">'.$usrTag_uFULL.'</div>
                    <div>'.$userBadge.'</div>
                    <!--<div>'.$lastlogin.'</div>-->
                    <div>'.$bnrBtn.'</div>
                </div>
            </div>
        </div>
        '.$uBnr_upd.'
    </div>
    '; 
    //
    $usrNav0 = '
    <div class="usrBdy-Hdr usrHdr" style="margin: 0px auto;">
        <ul id="usrCNT_TGL">
            <span id="usrCNT_XX" class="usrSel">Everything</span>
            <li data-target="usrCNT_1a">Blogs</li>
            <li data-target="usrCNT_3a">Goals</li>
            <li data-target="usrCNT_2a">Forums</li>
            <li data-target="usrCNT_4a">Post</li>
            <div class="fR dI bnrBtn2" onclick="upTglxx(\'dDmnu_1\')">
                <i></i>
                <ul id="dDmnu_1" class="dDmnu_1 usrMODTGLx pA dN">
                    <li data-target="usrCNT_5a">About</li>
                    <li data-target="usrCNT_6a">Connections</li>
                    <li data-target="usrCNT_7a">kodotokens</li>
                </ul>
            </div>
        </ul>
    </div>
    ';
    //
    
    if ($u == "kodoninja") {
        $u_scl = '
        <!-- Socials -->
        <div class="usrCNT-div Cnt_Bck usrBdy pad_T">
            <div class="usrHdr">
                <div class="pad-T dI">
                    Socials
                </div>
                <div class="pad-T fR dI">
                    '.$uBedit.'
                </div>
            </div>
            <div class="thrd-Wpr Uview Pnl-frm pad-T">
                <span>
                    <a href="https://www.youtube.com/@kodoninja" target="_blank">
                        <span class="tooltip">
                            <i class="fi-social-x"><img src="'.$m_path.'css/svg/YouTube_full-color_icon_(2017).svg.png" style="width: 29px;height: auto;margin: 0px 5px 0px 0px;"/></i>
                            <em class="tooltiptext" style="font-size: 14px;">YouTube</em>
                        </span>
                    </a>
                </span>
                <span>
                    <a href="https://twitter.com/kodoninja" target="_blank">
                        <span class="tooltip">
                            <i class="fi-social-x"><img src="'.$m_path.'css/svg/X_icon.svg.png" style="width: 20px; height: 20px; margin: 0px 5px 0px 0px;"/></i>
                            <em class="tooltiptext" style="font-size: 14px;">X: Twitter</em>
                        </span>
                    </a>
                </span>
                <span>
                    <a href="twitch.tv/kodoninja" target="_blank">
                        <span class="tooltip">
                            <i class="fi-social-x"><img src="'.$m_path.'css/svg/twitch_logo.jpg" style="width: 20px; height: 20px;"/></i>
                            <em class="tooltiptext" style="font-size: 14px;">Twitch</em>
                        </span>
                    </a>
                </span>
            </div>
        </div>
        '; 
    }
    
    $usrAbt = '
    <div class="id="usrCNT_5a">
        <!-- About user -->
        <div class="usrCNT-div Cnt_Bck usrBdy pad_T">
            <div class="usrHdr">
                <div class="pad-T dI">
                    About '.$u.'
                </div>
                <div class="pad-T fR dI">
                    '.$uBedit.'
                </div>
            </div>
            <div class="thrd-Wpr Uview Pnl-frm">
                '.$bio2.'
            </div>
        </div>
        '.$u_scl.'
    </div>
    ';
    //
    $user_FULL = "
    <div class=\"main db mainVw2\" style=\"margin: 0px auto;\">
        <div class=\"lft-lgc\">
            $bnrHdr $usrNav0 $usrAbt 
            $full_CNT_1x $full_CNT_gol $full_CNT_2 $full_CNT_3
        </div>
        <div class=\"rgt-lgc\" style=\"width: auto; margin: 0px -23px 0px -7px;\">
            $full_TOKEN $full_CNT_5
        </div>
    </div>
    ";
}
?>