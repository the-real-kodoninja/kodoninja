<?php
/** 
 * //
 * // test please comment out
 * // dont use actual used to simulate load out--
* $cseLg_eml = "testemail@gmail.com";
* $cseLg_cnm = "cse_x002e3dad99";
* $cseLgCode = "f34tj3429f8j239245tf";
 * //
 * //
 * 
*/



// security check to confirm that this is the case owner
$to = "$cseLg_eml";							 
$from = "kodoninja.com@gmail.com";
$subject = "Kodoninja contact support email confirmation";
$headers = "From: $from\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
// email content body

// this body contains a global style that is used for all email and password shake request
// // message contents is located in $message;
$c_Ltr__ttl = $subject;
$c_Ltr__bdy = '
<p>Confirmed email: <b>'.$cseLg_eml.'</b></p>
<p>Case Number: <b>'.$cseLg_cnm.'</b></p>
<P>Click the confirmation link below to get back into your case</P>
<a href="https://kodoninja.com/contact.php?cseCdN='.$cseLg_cnm.'&cseCdeH='.$cseLgCode.'" id="btn">Confirm</a>
';

include_once("../../icl/c_Ltr__MAIN.php");
echo $message;

$eMailCoNf = "$to $from $subject $message $headers";
// newsletter email confirmation handshake end
//
//

?>
