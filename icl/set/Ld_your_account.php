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

// AND code = '$log_HshCde'
if($sql1_1 = "SELECT * FROM users WHERE id = '$log_id' LIMIT 1") {
    foreach ($sqlo_____dbx___xX__->query($sql1_1) as $roo0w____X___xX__) {
        $st__x__unme = filter_var($roo0w____X___xX__["username"], FILTER_DEFAULT);
        $st__x__ufnme = filter_var(preg_replace('#[^a-zA-Z]#i', '', $roo0w____X___xX__["fname"]), FILTER_SANITIZE_STRING);
        $st__x__ulnme = filter_var(preg_replace('#[^a-zA-Z]#i', '', $roo0w____X___xX__["lname"]), FILTER_SANITIZE_STRING);
        $st__x__ueml = filter_var($roo0w____X___xX__["email"], FILTER_SANITIZE_EMAIL);
        $st__x__uweb = filter_var($roo0w____X___xX__["website"], FILTER_SANITIZE_URL);
        $st__x__ubio = filter_var($roo0w____X___xX__["bio"], FILTER_SANITIZE_STRING);
        $st__x__upne = filter_var($roo0w____X___xX__["phone"], FILTER_SANITIZE_NUMBER_INT);
    }
}



$ldvAx__x = "Your account";
$ld_mn_x = "";
$setInpHdr = "<div>";

if ($ldvA4__x == 'f') {
    $setInpHdr = '<div class="setInpHdr">'.$ldvA2__x.'</div>';
}

// on settings load
$ld_mn_x = '
'.$setInpHdr.'
<div class="setInpWpr">
    <div>
        <label for="st__x_unme">username</label>
        <input id="st__x_unme" name="st__x_unme" type="text" placeholder="username" value="'.$st__x__unme.'" required>
        <div id="st__r_unme"></div>
    </div>
    <div>
        <label for="st__x_ufnme">first name</label>
        <input id="st__x_ufnme" name="st__x_ufnme" type="text" placeholder="first name" value="'.$st__x__ufnme.'" required>
        <div id="st__r_ufnme"></div>
    </div>
    <div>
        <label for="st__x_ulnme">last name</label>
        <input id="st__x_ulnme" name="st__x_ulnme" type="text" placeholder="last name" value="'.$st__x__ulnme.'" required>
        <div id="st__r_ulnme"></div>
    </div>
    <div>
        <label for="st__x_ueml">email</label>
        <input id="st__x_ueml1" name="st__x_ueml1" type="email" placeholder="email" value="'.$st__x__ueml.'" required>
        <!-- if emall chamges from $st__x__ueml (log email) email2 dB -->
        <input id="st__x_ueml2" name="st__x_ueml2" class="dN" type="email" placeholder="re-type your new email" required>
        <div id="st__r_ueml" class="set_res_q"></div>
    </div>
    <div>
        <label for="st__x_uweb">website</label>
        <input id="st__x_uweb" name="st__x_uweb" type="text" placeholder="https://www.example.com/" value="'.$st__x__uweb.'" required>
        <div id="st__r_uweb"></div>
    </div>
    <div>
        <label for="st__x_upne">phone</label>
        <input id="st__x_upne" name="st__x_upne" type="text" placeholder="phone" value="'.$st__x__upne.'" required>
        <div id="st__r_upne"></div>
    </div>
    <p>
        <label for="st__x_upne">bio</label>
        <div id="st__x_ubio" name="st__x_ubio" contenteditable="true" placeholder="your bio">
            '.$st__x__ubio.'
        </div>
        <div id="st__r_ubio"></div>
    </p>
    <div>
        <input id="st__x_upwd1" name="st__x_upwd1" type="password" placeholder="password please" required>
        <div id="st__r_upwd"></div>
    </div>
    <div id="st__r1_uFULL"></div>
    <button onclick="set_upd_1_y_acc(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$setUnq_ncde.'\')">update</button>
</div>
';
// 1st load parent click
if ($ldvAl__x == $ldvAx__x && $ldvA2__x == $ldvAx__x || $ldvAl__x == $ldvAx__x && $ldvA2__x == "Account Information") {
    $ld_mn_x =$ld_mn_x;
} else {
    $ld_mn_x =$ld_mn_x;
} if ($ldvAl__x == $ldvAx__x && $ldvA2__x == "Name display") {
    $st__x__xvn = "";
    $st__x__ext = "";
    $___bext__ld = "";
    $ld___chk_1 = "";
    $ld___chk_2 = "";
    $ld___chk_3 = "";
    $ld___chk_4 = "";
    $ld___sel_1 = "";
    $ld___sel_2 = "";
    $ld___sel_3 = "";
    $ld___sel_4 = "";
    $ld___sel_5 = "";
    $ld___sel_6 = "";
    $ld___sel_7 = "";
    $ld___sel_8 = "";
    if($sql__get1 = "SELECT xVname,base_ext FROM user_options WHERE uid = '$log_id' LIMIT 1") {
        foreach ($sqlo_____dbx___xX__->query($sql__get1) as $roo0w____X___xX__) {
            if(isset($roo0w____X___xX__["xVname"])) {
                $st__x__xvn = filter_var(preg_replace('#[^1234]#i', '', $roo0w____X___xX__["xVname"]), FILTER_SANITIZE_NUMBER_INT);
            } if(isset($roo0w____X___xX__["base_ext"])) {
                $st__x__ext = filter_var(preg_replace('#[^12345678]#i', '', $roo0w____X___xX__["base_ext"]), FILTER_SANITIZE_NUMBER_INT);
            } if($st__x__xvn === "1") {
                $nmeLOAD_1 = "$log_username";
                $ld___chk_1 = "checked";
            } else if($st__x__xvn === "2") {
                $nmeLOAD_1 = "$st__x__ufnme";
                $ld___chk_2 = "checked";
            } else if($st__x__xvn === "3") {
                $nmeLOAD_1 = "$st__x__ulnme";
                $ld___chk_3 = "checked";
            } else if($st__x__xvn === "4") {
                $nmeLOAD_1 = "$st__x__ufnme $st__x__ulnme";
                $ld___chk_4 = "checked";
            } if ($st__x__ext === '1') {
                $___bext__ld = "@kodoverse";
                $ld___sel_1 = "selected";
            } else if ($st__x__ext === '2') {
                $___bext__ld = "@kodoninja";
                $ld___sel_2 = "selected";
            } else if ($st__x__ext === '3') {
                $___bext__ld = "@kodospace";
                $ld___sel_3 = "selected";
            } else if ($st__x__ext === '4') {
                $___bext__ld = "@kodohealth";
                $ld___sel_4 = "selected";
            } else if ($st__x__ext === '5') {
                $___bext__ld = "@kodoacademy";
                $ld___sel_5 = "selected";
            } else if ($st__x__ext === '6') {
                $___bext__ld = "@kodofilms";
                $ld___sel_6 = "selected";
            } else if ($st__x__ext === '7') {
                $___bext__ld = "@kodotrading";
                $ld___sel_7 = "selected";
            } else if ($st__x__ext === '8') {
                $___bext__ld = "";
                $ld___sel_8 = "selected";
            }
        } 
    }
    $ld_mn_x = '
    '.$setInpHdr.'
        <div class="setInpWpr">
            <p>You’re apart of the kodoverse meaning all platforms are inner connected. Post a photo on kodospace it’ll show on all platforms. Give a film ratting on kodofilms it shows on on platforms. For instance while your looking through your feed on kodotrading you can see new courses added on kodoacademy.</p> 

            <p>A post will contain two @ symbols. The first being your username the second being the kodoverse post origin. You’ll know exactly where that post originated. You may set your base extension on your user profile to whichever you choose. For instance you may spend more time on kodohealth so you may want to set your base extension to @kodohealth or to none at all.</p>
        </div>
        <div class="setInpWpr">
            <div class="lbl_hdr">Name</div>
            <label for="unme1">
                <input id="set_nme_unme1" name="set_nme_unme1" type="checkbox" onchange="set_upd_dply(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$setUnq_ncde.'\')" '.$ld___chk_1.'/>
                <pan>username</span>
            </label>
            <label for="unme2">
                <input id="set_nme_unme2" name="set_nme_unme2" type="checkbox" onchange="set_upd_dply(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$setUnq_ncde.'\')" '.$ld___chk_2.'/>
                <pan>first name</span>
            </label>
            <label for="unme3">
                <input id="set_nme_unme3" name="set_nme_unme3" type="checkbox" onchange="set_upd_dply(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$setUnq_ncde.'\')" '.$ld___chk_3.'/>
                <pan>last name</span>
            </label>
            <label for="unme4">
                <input id="set_nme_unme4" name="set_nme_unme4" type="checkbox" onchange="set_upd_dply(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$setUnq_ncde.'\')" '.$ld___chk_4.'/>
                <pan>first & last name</span>
            </label>
            <div>
                <input id="st__x2_unmex" name="st__x2_unmex" type="text" placeholder="Name" value="'.$nmeLOAD_1.'" required>
            </div>
            <div>
                <div class="lbl_hdr">base extension @'.$log_username.'<span id="set_ext_load2">'.$___bext__ld.'</span></div>
                <select id="set_ext_base2" name="set_ext_base2" class="set_sel" onchange="set_upd_xsel(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$setUnq_ncde.'\')">
                    <option value="@kodoverse__1" '.$ld___sel_1.'>@kodoverse</option>
                    <option value="@kodoninja__2" '.$ld___sel_2.'>@kodoninja</option>
                    <option value="@kodospace__3" '.$ld___sel_3.'>@kodospace</option>
                    <option value="@kodohealth__4" '.$ld___sel_4.'>@kodohealth</option>
                    <option value="@kodoacademy__5" '.$ld___sel_5.'>@kodoacademy</option>
                    <option value="@kodofilms__6" '.$ld___sel_6.'>@kodofilms</option>
                    <option value="@kodotrading__7" '.$ld___sel_7.'>@kodotrading</option>
                    <option value="Nothing__8" '.$ld___sel_8.'>Nothing</option>
                </select>
            </div>
            <div id="set_1c_LOAD" class="setInpWpr"></div>
        </div>
    </div>
    ';

} if ($ldvAl__x == $ldvAx__x && $ldvA2__x == "Change your password") {
    // never echo a hash or dehash back into value
    $ld_mn_x = '
    '.$setInpHdr.'
    <div class="setInpWpr">
        <div>
            <label for="st__x_upwd1">Current Password</label>
            <input id="st__x_upwd1" name="st__x_upwd1" type="password" placeholder="current password" value="meow" onfocus="this.value=""">
        </div>
        <div>
            <label for="st__x_upwd2">New Password</label>
            <input id="st__x_upwd2" name="st__x_upwd2" type="password" placeholder="At least 8 characters, 1 lower, 1 upper, 1 number, 1 symbol" value="">
        </div>
        <div>
            <label for="st__x_upwd3">Re-type new Password</label>
            <input id="st__x_upwd3" name="st__x_upwd3" type="password" placeholder="At least 8 characters, 1 lower, 1 upper, 1 number, 1 symbol" value="">
        </div>
        <div id="st__r2_uFULL"></div>
        <button onclick="NEWpwdUpd(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$setUnq_ncde.'\',\''.$log_username.'\')">update</button>
    </div>
    ';
} if ($ldvAl__x == $ldvAx__x && $ldvA2__x == "Download your data") {
    if ($ldvA4__x == 'f') {
        $setInpHdr = '<div class="setInpHdr">'.$ldvA2__x.' (Coming soon)</div>';
    }
    $ld_mn_x = '
    '.$setInpHdr.'
    <div class="setInpWpr">
        <p>Choose how’d you like to download your information, <var class="clr-r">.csv</var>, <var class="clr-r">.xls</var>, or <var class="clr-r">.zip</var>… If you do <var class="clr-r">.zip</var> it’ll include both a .csv</var> and <var class="clr-r">.exl</var> with all your image we’ve stored… This will include all your user photos blog post etc. And if you have an account across the other kodoverse platforms, itll download that as well.</p>
        <p><a href="prs/set/exp/exp_UsrData.php?exp=csv&sid='.$setUnq_ncde.'&ghCdx='.$log_HshCde.'"  class="disabled-link">download .csv</a></p>
        <p><a href="prs/set/exp/exp_UsrData.php?exp=xls&sid='.$setUnq_ncde.'&ghCdx='.$log_HshCde.'"  class="disabled-link">download .xls</a></p>
        <p><a href="prs/set/exp/exp_UsrData.php?exp=zip&sid='.$setUnq_ncde.'&ghCdx='.$log_HshCde.'"  class="disabled-link">download .zip</a></p>
    </div>
    ';
} if ($ldvAl__x == $ldvAx__x && $ldvA2__x == "Membership") {
    if($sql__1x = "SELECT u.userlevel, m.*
        FROM users AS u
        Inner Join mem_pay AS m
        WHERE u.id = m.uid
        LIMIT 1") {
        foreach ($sqlo_____dbx___xX__->query($sql__1x) as $roo0w____X___xX__) {
            $ulv = filter_var(preg_replace('#[^123456]#i', '', $roo0w____X___xX__["userlevel"]), FILTER_SANITIZE_NUMBER_INT);
            $u_pm = filter_var(preg_replace('#[^123]#i', '', $roo0w____X___xX__["pay_method"]), FILTER_SANITIZE_NUMBER_INT);
            $u_cs = filter_var($roo0w____X___xX__["cost"], FILTER_SANITIZE_NUMBER_FLOAT);
            $u_st = filter_var(preg_replace('#[^asc]#i', '', $roo0w____X___xX__["status"]), FILTER_SANITIZE_STRING);
            $u_dt = filter_var(timeAgo(strtotime($roo0w____X___xX__["date"])), FILTER_DEFAULT);       
        }
    $memLnk = "";
    $memPay = "";
    $memDis = "";
    $memBdy = "";
    if ($ulv === '1') {
        if ($u_st === NULL) {
        $memDis = '<p>You\'re are a basic member '.$log_username.'</p>'; 
        $memBdy = '<p>placeholder</p>';
        $memLnk = '<p><a href="#">Upgrade your membership</a></p>';
        } if ($u_st === "c") {
            $memDis .= '<p>You\'re membership is currently cancled</p>';
            $memBdy = '<p>Looks like you were premium '.$log_username.'...blah</p>';
            $memLnk = '<p><a href="#">Reactivate your membership</a></p>';
        }
    } if ($u_st === "a") {
        if ($ulv == '2') {
            $memDis = '<p>You\'re are a premium member '.$log_username.'</p>';
            if ($u_pm === 1) {
                $memPay = '<p>You are paying '.$u_cs.' via Slash (metamask)</p>';
            } else if ($u_pm === 2) {
                $memPay = '<p>You are paying '.$u_cs.' via Stripe</p>';
            } // 3+ unsure NFT etc
        } if ($ulv >= '3' && $ulv <= '6') {
            $memPay = '<p>Your premium membership is payed by <a href="user?=kodokitty">kodokitty</a>, meow that\'s me.</p>';
        }
        // $memBdy = '<p>placeholder</p>';
        $memLnk .= '<p><a href="#">Suspend your membership</a></p>';
        $memLnk .= '<p><a href="#">Cancel to downgrade your membership</a></p>';
    } else if ($u_st === "s") {
        $memDis = '<p>You\'re membership is currently suspended</p>';
        $memLnk .= '<p><a href="#">Reactivate your membership</a></p>';
    } else if ($u_st === "c") {
        $memDis = '<p>You\'re membership is currently cancled</p>';
        $memLnk .= '<p><a href="#">Reactivate your membership</a></p>';
    } 
    $ld_mn_x = '
    '.$setInpHdr.'
    <div class="setInpWpr">
        '.$memDis.'
        '.$memPay.'
        '.$memBdy.'
        '.$memLnk.'
    </div>
    ';
} 
} if ($ldvAl__x == $ldvAx__x && $ldvA2__x == "Deactivate your account") {
    // suspend sets deactivated to 1 // restore anytime
    // -- after promt (yes) logic points to logout.php
    // -- updates // invisible users can log in comment under Anonymous user page can't be seen or looked up
    // -- will be able to see your post made under anonymous linked to id
    // delete sets deactivated to 1 deletes in 60 days if doesn't log in
    // -- updates allow user to upload data downloaded to revive deleted accounts // usernames are reserved 
    // -- more upload options for downloadad data
    $ld_mn_x = '
    '.$setInpHdr.'
    <div class="setInpWpr">
        <p>Your account is spread across the kodoverse. If you were to delete your account it will delete there as well. Regardless of the reason your welcome to do so at anytime. If you are a premium member it will stop all transactions. If you’d just like to stop your transactions or discontinue your premium membership you may do so at any time.</p>

        <p>Below are a list of options that are available to you at anytime, if you suspend your account you may log in at anytime and your account will be reactivated. If you’d like to suspend your membership you can continue at anytime. A note to remember its only $3.99 a month; cheaper than a cup of coffee at your favorite Starbucks :) Regardless if you were to delete your account, your account will be deleted for 60 days until it becomes permanently deleted.</p>
        <p><a onclick="setDEACT(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$setUnq_ncde.'\',\''.$log_username.'\',\'suspend\',\'NULL\')">suspend your account</a></p>
        <p><a href="#" class="disabled-link">go invisible (Anonymous) - coming soon</a></p>
        <p>&nbsp;</p>
        <p><b><i><a onclick="setDEACT(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$setUnq_ncde.'\',\''.$log_username.'\',\'deactivate\',\'NULL\')">delete your account</a></i></b></p>
        <div id="st__DEACT_uWpr" class="dN">
            <div id="st__DEACT_uFULL"></div>
            <input id="st__x_upwd4" name="st__x_upwd4" type="password" placeholder="Please enter your password" value="">
            <div id="st__x_nbtn4" name="st__x_nbtn4"></div>
        </div>
    </div>
    ';
}
echo $ld_mnFull = "$ld_mn_x";

?>