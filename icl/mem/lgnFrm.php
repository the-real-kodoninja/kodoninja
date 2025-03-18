<?php
if($user_ok) {
	header("location: user.php?u=$log_username");
    exit();
}

// TEST DELETE hash check!!!
// include_once('icl/kodocrypt_vx.php');
$st_x__x_HHH_CHK_cpwd4x = '';
// !@#$%^&*_+
// $st_x__x_HHH_CHK_cpwd4x = 'PASSSORD | '.kodohash_modify('Cmyk.7625.@_Red20');

$hsh_Rand1 = md5(rand(100000000000,999999999999));
$hsh_Rand2 = md5(rand(100000000000,999999999999));
$hsh_Rand3 = md5(rand(100000000000,999999999999));

$sgn_lgcY = '
<form action="_self" id="cp__1_2" onSubmit="return false;">


<!-- ------------ -->
    <!-- global login -->
    <input type="text" id="lgn__crd__1" name="lgn__crd__1" placeholder="Meow, ill take your username, phone #, or email to login meow, meow" required/>

    <!-- ------------ -->
    <!-- password---- -->
    <input placeholder="password" value="" type="password" id="lgn__crd__2" name="lgn__crd__2" required/>

    '.$st_x__x_HHH_CHK_cpwd4x.'

    <!-- hash bot check logic --> 
    <input type="hidden" id="sdc_1" name="sdc_1" value="'.$hsh_Rand1.'"/>
    <input type="hidden" id="sdc_2" name="sdc_2" value="'.$hsh_Rand2.'"/>
    <input type="hidden" id="sdc_3" name="sdc_3" value="'.$hsh_Rand3.'"/> 


    <button class="x_1Btn" onclick="gte__fN1()">Login</button>


    <!-- error logic response -->
    <p id="st_res" class="lgn"></p>


    <div class="x_linkWpr">
        <span>
            <a href="membership.php?c=&c='.$crt_chk.'" class="x_1Lnk">Actually I like to Sign up.</a>
        </span>
        <span class="fr">
            <a href="membership.php?btn=btn_x&load=forgot" class="x_1Lnk">Actually I forgot a login credential.</a>
        </span>
    </div>
</form>
';

?>
