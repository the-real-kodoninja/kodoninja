<?php
/** 
 * //
 * // test please comment out
 * // dont use actual used to simulate load out--
 * // $EmcHk_aRy__x = "test@email.com, test2@email.com, test3@email.com";
 * // $lgnUid2__x = 1;
 * // $hsh_Temp_pass = "f34tj3429f8j239245tf";
 * //
 * //
 * 
*/

//
// NON users // current users would have there email verified at this point
// newsletter email confirmation handshake start
// NOTE: email array already contains a coma so no need to add one in loop
$to = "$EmcHk_aRy__x";							 
$from = "kodoninja.com@gmail.com";
$subject = 'Kodoverse(kodoninja.com) email reset';
$headers = "From: $from\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
// email content body

// this body contains a global style that is used for all email and password shake request
// // message contents is located in $message;
$c_Ltr__ttl = $subject;
$c_Ltr__bdy = '
<p>Your email reset was sent to the following emails: '.$EmcHk_aRy__x.'</b></p>
Click the button below to reset your email</p> 

<a href="https://kodoninja.com/808.php?uNum='.$lgnUid2__x.'&uEml_c='.$hsh_Temp_pass.'" id="btn">Confirm</a>
';

include_once("../c_Ltr__MAIN.php");

$fgt_uEml = "$to $from $subject $message $headers";
// newsletter email confirmation handshake end
//
//
?>