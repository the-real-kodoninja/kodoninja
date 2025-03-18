<?php
$cln = "'";
$hsh_Rand1 = md5(rand(100000000000,999999999999));
$hsh_Rand2 = md5(rand(100000000000,999999999999));
$hsh_Rand3 = md5(rand(100000000000,999999999999));

$opt__eA = "
<div id=\"opt__e\" class=\"dN\">
    Let's get your <i>email</i> updated <b>$lgnUsr2__x</b>, the kodoverse needs you meow.<hr>
    <div class=\"rStUpd__Wpr\">
    `   <!-- tripple mouse check -->
        <input type=\"text\" id=\"opt__eCx\" name=\"opt__eCx\" placeholder=\"Meow, I need a previou or current username, phone #, or email AGAIN to reset your email meow, meow\" required>
        <small>Need to make sure your not a mouse</small>

        <input id=\"opt__eC1\" name=\"opt__eC1\" type=\"email\" placeholder=\"yourNewEmail@email.com\" />
        <input id=\"opt__eC2\" name=\"opt__eC2\" type=\"email\" placeholder=\"yourNewEmail@email.com\" />
        <button class=\"x_1Btn\" onclick=\"gte__f_N3c1('opt__eC')\">Update my email</button>
        <div>
            <div>Actually i'd like to update my <a onclick=\"gte__f_N3c1('opt__pC')\">password</a> instead</div><br><br>
            <div><a href=\"javascript:location.reload()\">Wanna start over?</a></div>
        </div>
    </div>
</div>
";

$opt__eB = "
<div  id=\"opt__p\" class=\"dN\">
    Let's get your <i>password</i> updated <b>$lgnUsr2__x</b>, the kodoverse needs you meow.<hr>
    <div class=\"rStUpd__Wpr\">
        <!-- tripple mouse check -->
        <input type=\"password\" id=\"opt__pCx\" name=\"opt__pCx\" placeholder=\"Meow, I need your previous password AGAIN before you create your new password meow, meow\" required>
        <small>Need to make sure your not a mouse</small>

        <input id=\"opt__pC1\" name=\"opt__pC1\" type=\"password\" placeholder=\"password\" />
        <input id=\"opt__pC2\" name=\"opt__pC2\" type=\"password\" placeholder=\"password\" />
        <button class=\"x_1Btn\" onclick=\"gte__f_N3c1('opt__pC')\">Update my password</button>
        <div>
            <div>Actually i'd like to update my <a onclick=\"gte__f_N3c1('opt__eC')\">email</a> instead</div><br><br>
            <div><a href=\"javascript:location.reload()\">Wanna start over?</a></div>
        </div>
    </div>
</div>
";


$sgn_lgcY = '
<form action="_self" id="cr__1_2"  onSubmit="return false;">

    <div id="fgt__mN1">
        <!-- 1st logic lookup -->
        <input type="text" id="fgt__crd__1" name="fgt__crd__1" placeholder="Meow, ill take previous or current usernames, phone #\'s, or emails to reset your login meow, meow" required>


        <!-- 2nd logic lookup -->
        <!-- logic is case based upon codition no keep dN-->
        <input style="display: none;" type="password" id="fgt__crd__2" name="fgt__crd__2" placeholder="Meow, I need a pasword meow, meowwww...." required>


        <button id="x_1BtnA" class="x_1Btn" onclick="gte__fN3(\'opt__x\')">Find me</button>
        <button id="x_1BtnB" class="x_1Btn dN" onclick="gte__fN3(\'opt__xx\')">Match Credetials</button>
    </div>

        <div id="st_res"></div>
        <div id="st_res2">'.$opt__eA.''.$opt__eB.'</div>
        <div id="st_res3"></div>
        

        <!-- hash bot check logic --> 
        <input type="hidden" id="sdc_1" name="sdc_1" value="'.$hsh_Rand1.'"/>
        <input type="hidden" id="sdc_2" name="sdc_2" value="'.$hsh_Rand2.'"/>
        <input type="hidden" id="sdc_3" name="sdc_3" value="'.$hsh_Rand3.'"/> 

        <div class="x_linkWpr">
            <span>
                <a href="membership.php?btn=btn_x&load=login" class="x_1Lnk">Actually I like to log in.</a>
            </span>
            <span class="fr">
                <a href="membership.php" class="x_1Lnk">Actually I like to Sign up.</a>
            </span>
        </div>
    </form>
';
?>