<?php 
$memBtn_1a = "";
$memBtn_2a = "";
$Plan_Optn = "";
$gr_main = "";
$wlc_msg1a = "";
$mem_LgnMd1 = "";
$sgn_lg = "";
$pay_recur = "";
$mem__cSt = "$3.99";
$lgnUsr2__x = "";
$sgn_lgcX = "";
$sgn_lgcY = "";
$crt_chk = "";
$crt_msg = "";
$mem__nte = "";
$promo_chk_1 = "";
//
if ($user_ok == true) {
    $hello = $log_username;
} else if($user_ok != true) {
    $hello = 'Welcome';
}
//
if (isset($_GET["c"])) {
    $crt_chk = filter_var($_GET['c'],FILTER_SANITIZE_STRING);
    $crt_qty = $sqlo_____db2___xX__->query("SELECT SUM(quantity) FROM cart WHERE code = '$crt_chk'")->fetchColumn();
    //
    if($sqlo_____db2___xX__->query(
            $sql____2x = "SELECT c.*,p.*
            FROM cart AS c
            LEFT JOIN products AS p
            ON c.pid = p.id 
            WHERE c.code = '$crt_chk'
            ORDER BY c.date DESC LIMIT 5")->fetchColumn()) {
		foreach ($sqlo_____db2___xX__->query($sql____2x) as $roo0w____X___xX__) {
            $crt_nme = $roo0w____X___xX__["name"];
            $crt_qty = $roo0w____X___xX__["quantity"];
            $crt_des = $roo0w____X___xX__["description"];
        } if ($crt_des == 'tkn' && 
            $crt_nme == 'kodotoken 250' && $crt_qty >= 12 ||
            $crt_nme == 'kodotoken 500' && $crt_qty >=  6 ||
            $crt_nme == 'kodotoken 1,000' && $crt_qty >= 3 ||
            $crt_nme == 'kodotoken 5,000' && $crt_qty >= 1 ) {
            $tknMSG = 'upon successful completion a promo code will be assigned to this email for $2 off your first month on premium';
        } if ($crt_des == 'tkn' && 
            $crt_nme == 'kodotoken 250' && $crt_qty >= 40 ||
            $crt_nme == 'kodotoken 500' && $crt_qty >= 20 ||
            $crt_nme == 'kodotoken 1,000' && $crt_qty >= 10 ||
            $crt_nme == 'kodotoken 5,000' && $crt_qty >= 2 || 
            $crt_nme == 'kodotoken 10,000' && $crt_qty >= 1 ||
            $crt_nme == 'kodotoken 25,000' && $crt_qty >= 1 ||
            $crt_nme == 'kodotoken 50,000' && $crt_qty >= 1 ||
            $crt_nme == 'kodotoken 100,000' && $crt_qty >= 1) {
            $promo_chk_1 = "MAX";
            $tknMSG = 'upon successful completion you\'ll receive 6 months free of our premium membership and a $5 kodostore credit will be linked to this email. If you join the kodoverse now you\'ll get an extra month free and 500 extra kodotokens.';
            $mem__nte = '<p class="">Yay!! meow, your membership is FREE for 6 months. On '.date("m-d-y", strtotime("now +6 months")).' you\'ll be charged '.$mem__cSt.' monthly. Upon account creation you\'ll be redirected for your $0.00 payment.</p>';
            $mem__cSt = "$0.00";
            
        } if ($crt_des == 'tkn') {
            $crt_msg = '<div class="crt-clr1">It looks like you have '.$crt_qty.' items in your cart and some tokens too. As a reminder '.$tknMSG.'. upon signup you\'ll be redirected back to your cart.</div>';
        } else {
            $crt_msg = '<div class="crt-clr1">It looks like you have '.$crt_qty.' items in your cart from the kodostore, upon signup you\'ll be redirected back to your cart.</div>';
        }
    }
}
//
$loadBtn = ['btn=btn_a&load=signup','btn=btn_b&load=signup'];
$bckBtn = '<a id="bckBtn" href="membership.php?c='.$crt_chk.'">back to membership overview</a>';
//
if(isset($_GET['btn']) && isset($_GET["load"])) {
    $g__btn = preg_replace('#[^abtnx_]#i', '', filter_var($_GET['btn'],FILTER_SANITIZE_STRING));
    $sgn = preg_replace('#[^logisunpfrt]#i', '', filter_var($_GET['load'],FILTER_SANITIZE_STRING));
    if ($g__btn == 'btn_x') {
        $gr_main = '<h3 style="text-align:center;">Welcome back to the kodoverse fellow kodoninja</h3>';
        $p_Optn = '';
        if ($sgn == 'login') {
            $Plan_Optn = "Let's get back to it, the kodoverse needs you.";
             include_once("lgnFrm.php");
        } else if ($sgn == 'forgot') {
            $Plan_Optn = "No worries meow. I'll help you log back into the kodoverse, but first I need something from you";
            include_once("fgtFrm.php");
        }
    } else if ($sgn == 'signup' && $g__btn == 'btn_a' || $g__btn == 'btn_b') {
        if ($g__btn == 'btn_a') {
            $gr_main = '<h2>Let\'s create your account</h2>';
            $Plan_Optn = "You have choosen to have the <b>BASIC</b> Option, Thank You... Upgrade at anytime";
            $p_Optn = '<span class="fR dI">This option is & will always be <b>FREE</b> of charge</span>';
            $promo_cde = "kitty_W3LCOME410";
            $promo_msg = "<small>Enjoy 500 FREE kodotokens on us</small>";
            $memType = "__a";
        } else if ($g__btn == 'btn_b') {
            if ($promo_chk_1 == "MAX") {
                $promo_cde = "";
                $promo_msg = "";
            } else { // 1st load gift to new user
                $promo_cde = "kitty_W3LCOME410";
                $promo_msg = "<small>Enjoy $1 off your 1<sup>st</sup> month on premium and 1000 FREE kodotokens on us</small>";
                $mem__cSt = "$0.99";
            }
            $gr_main = '<h2>Let\'s create your account</h2>';
            $Plan_Optn = 'You have choosen to have the <b>PREMIUM</b> Option, Thank You';
            if ($mem__cSt === "$0.00" && $promo_chk_1 == "MAX") {
                $pay_recur = 'on checkout';
            } else if ($mem__cSt !== "$1.99") {
                $pay_recur = 'on your 1<sup>st</sup> month than $1.99 monthly';
            }  else {
                $pay_recur = 'a month';
            }
            $p_Optn = '<span class="fR dI"><b id="mem__cSt">'.$mem__cSt.'</b> will be charged '.$pay_recur.' </span>'; 
            $memType = "__b";
        }
        include_once("sguFrm.php");
    } else {
        header(" 404.php?msg=It seems there was a fatal error please try again.");
    }
} else {
    include_once("memTable.php");
}

	// include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST"){
    //something was posted
    $f1__1 = $_POST['user_x'];
    $f1__2 = $_POST['email_1'];
    $f1__3 = $_POST['age_x'];
    $f1__4 = $_POST['email_2'];
    $f1__5 = $_POST['pass_1'];
    $fl__6 = $_POST['pass_2'];

    // if(!empty($f1__1) && !empty($f1__5) && !is_numeric($f1__1))
    // {

        echo $f1__1;
        echo $f1__2;
        echo $f1__3;
        echo $f1__4;
        echo $f1__5;
        echo $f1__6;

        //save to database
        // $user_id = random_num(20);
        // $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

        // mysqli_query($con, $query);

        // header("Location: user.php");
    // 	die;
    // }else
    // {
    // 	echo "Please enter some valid information!";
    // }
}



// pattern=".+@globex\.com"
// <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="281-330-8004">



if ($sgn_lgcX) {
    $mem_Cnts = '
    <div class="compCnt_Wrp">
        '.$sgn_lgcX.'
        
    </div>';
} else {
$mem_Cnts = '
<div class="compCnt_Wrp">
    '.$sgn_lgcX.'
    <div class="x__1Wpr" id="x_1b">
        '.$gr_main.'
        <p><center><small>'.$Plan_Optn.'</small></center></p>
        '.$sgn_lgcY.'
        '.$bckBtn.'
        <div id="stat_x"></div>
    </div>
</div>
';
}

?>
<style>
    input[type="text"], input[type="email"], input[type="password"], form.lgn_lgc input[type="submit"], input[type="tel"] {
    border-radius: 6px;
    margin: 10px 0px 10px -6px;
    width: 100%;
}

form.lgn_lgc input[type="text"], input[type="email"], form.lgn_lgc input[type="password"] {
    height: 25px;
}

input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
    background: #fff;
    padding: 5px;
    border: 1px solid #ccc;
    height: 25px;
}

.crt-clr1 {
    background-color: #fff;
    color: #333;
    border: 4px solid darkred;
    border-radius: 6px;
    padding: 15px;
    margin: 0px auto;
    width: 1000px;
    line-height: 28px;
}

</style>