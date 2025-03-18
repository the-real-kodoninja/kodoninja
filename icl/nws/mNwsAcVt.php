<?php
/** 
 * //
 * // test please comment out
 * // dont use actual used to simulate load out--
 * // $nwsEmChk = "test@email.com";
 * // $mNwsCode = "f34tj3429f8j239245tf";
 * //
 * //
 * 
*/


// NON users // current users would have there email verified at this point
// newsletter email confirmation handshake start
// NOTE: create kodoninja email char (info@godoninja.com, ...)
$to = "$nwsEmChk";							 
$from = "kodoninja.com@gmail.com";
$subject = "Kodoverse newsletter verification";
$headers = "From: $from\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
// email content body

// this body contains a global style that is used for all email and password shake request
// // message contents is located in $message;
$c_Ltr__ttl = 'Kodoverse newsletter verification';
$c_Ltr__bdy = '
<p>You signed up with email: <b>'.$nwsEmChk.'</b></p>
Click the button below to confirm your newsletter subscription and collect your</p> 
<h1>500 FREE kodotokens!!
    <div style="font-size: 5px;">Only valid once per email</div>
</h1>

<P>You get <u>50 FREE kodotokens</u> a week for staying subscribed and activated.</P>
<a href="https://kodoninja.com/808.php?mNws_e='.$nwsEmChk.'&mNws_c='.$mNwsCode.'" id="btn">Confirm</a>
';

include_once("../c_Ltr__MAIN.php");

$mNwsAcVt = "$to $from $subject $message $headers";
// newsletter email confirmation handshake end
//
//
?>