<?php
$cln = "'";

$hsh_Rand1 = md5(rand(100000000000,999999999999));
$hsh_Rand2 = md5(rand(100000000000,999999999999));
$hsh_Rand3 = md5(rand(100000000000,999999999999));
$mem_newUsr = "";
if ($g__btn == 'btn_b') {
    // <!-- vanilla js logic submit -->
    // <!-- 
    // //-- on success redirect to slash = crypto/nft payments
    // //-- or 
    // //-- stripe = card/other payments 
    // --> 
    $mem_newUsr = '<div id="crtBtn_1" style="height: 50px; min-height: 50px;" onclick="gte__fN2(\''.$memType.'\')"><img style="height: 50px; min-height: 50px;" src="'.$m_path.'kodostore/logo/payment-button_dark_version1_2b.svg"/></div>
    <div id="crtBtn_2" onclick="gte__fN2(\''.$memType.'\')"><button>checkout with <b>stripe</b></button></div>';
} else {
    $mem_newUsr = '<button class="x_1Btn" onclick="gte__fN2(\''.$memType.'\')">Signup</button>';
}

$sgn_lgcY = '
<form id="ct__1_2" class="'.$gr_vS3.'" onSubmit="return false;">

    <!-- username logic -->
    <input id="usrNme" onkeyup="ume_kUp()" maxlength="100" name="usrNme" placeholder="Username" tabindex="2" type="text" required>
    <div id="u_rs1" class="fv_Chk fR"><span class="pA">0</span></div>
    <div id="res_mN1"></div>

    <!-- email 1&2 logic -->
    <input type="email" name="email1" id="email1" placeholder="Email" required onkeyup="eml_kUp()" maxlength="100">
    <div id="e_rs1" class="fv_Chk fR"><span class="pA">0</span></div>
    <div id="res_mN1x"></div>

    <input type="email" name="email2" id="email2" class="dN" placeholder="Re-Type Email" onkeyup="eml_kUp2()" maxlength="100">
    <div id="e_rs2" class="fv_Chk fR dN"><span class="pA dN">0</span></div>


    <!-- password 1&2 logic -->
    <input type="password" name="pass1" id="pass1" onkeyup="pwd_kUp()" onkeypress="" maxlength="100" placeholder="Password" required>
    <div class="fR"><span id="pwd_val" class="pA">0</span></div> 
    <div id="p_rs1" class="fv_Chk dN"></div>

    <input type="password" name="pass2" id="pass2" class="dN" onfocus="emptyElement('.$cln.'user_post'.$cln.')" onkeyup="pwd_kUp2()" maxlength="100" placeholder="Confirm your password">
    <div id="p_rs2" class="fv_Chk fR dN"><span class="pA dN">0</span></div>
    <div id="res_mN2"></div>

    <!-- hash bot check logic --> 
    <input type="hidden" id="sdc_1" name="sdc_1" value="'.$hsh_Rand1.'"/>
    <input type="hidden" id="sdc_2" name="sdc_2" value="'.$hsh_Rand2.'"/>
    <input type="hidden" id="sdc_3" name="sdc_3" value="'.$hsh_Rand3.'"/> 


    <!-- Birthday check -->
    <p>
    <label for="age_chk">By checking you agree that your over 13</label>
    <input type="checkbox" id="age_chk" name="age_chk"/>
    </p>
   
    '.$mem_newUsr.'

    <!-- promo code logic -->
    <input id="prm_cdez_sgu1" maxlength="100" name="prm_cdez_sgu1" placeholder="Promo codes?" value="'.$promo_cde.'" tabindex="2" type="hidden">


    <!-- newsletter logic -->
    <input type="hidden" id="cHk_mNws" name="cHk_mNws"/>

    <!-- error logic response -->
    <p id="st_res" class="lgn"></p>
    <small>By continuing, you agree to kodoninja\'s <a>Conditions of Use</a> and <a>Privacy Notice.</a></small>
    '.$mem__nte.'


    <a href="membership.php?btn='.$g__btn.'&load=signup&c='.$crt_chk.'" id="sgnUp_bck" class="dN" onclick="sgnUp__1b()">Back?</a>

    <div class="x_linkWpr">
        <a href="membership.php?btn=btn_x&load=login&c='.$crt_chk.'" class="x_1Lnk" >Actually I like to log in.</a>
    </div>
</form>
';

?>