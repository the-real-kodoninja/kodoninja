<?php
session_start();
// if ($user_ok) {
// 	require("kodocrypt_vx.php");
// 	kodohash_code($cnnc_t,$log_id,$log_username,$log_password);
// 	// echo "log_id | $log_id, log username | $log_username, log_password | $log_password";
// }
//
// pulled from session cookies
if (isset($_GET["ObjDsty"])) {
	$ObjDsty_eml__x = filter_var($_GET['ObjDsty'],FILTER_SANITIZE_STRING);
	//
	// once session ends a new hash is inserted to prevent re-open
	// officially terminates session and prevents those that have obtained hash and case number from entering the case
	// everytime an email is sent and everytime session ends hash is changed
	// resets all hash code linked to email
	try {
        $globalCode = codeCnts($_GET['ObjDsty']);
        $_____SQLUPD__x_____x = $sqlo_____dbx___xX__->prepare(
            "UPDATE case_log
            SET code=?
            WHERE email='$ObjDsty_eml__x'
            LIMIT 1");
        $_____SQLUPD__x_____x->execute([$globalCode]); 
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,0,$_SERVER["SCRIPT_NAME"],$newError);
    }
} 
// Set Session data to an empty array
$_SESSION = array();

if(isset($_SERVER['HTTP_COOKIE'])) {
	$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
	foreach($cookies as $cookie) {
		// $crumble_1 = $_COOKIE["id"];
		// $crumble_2 = $_COOKIE["user"];
		// $crumble_3 = $_COOKIE["pass"];
		// $crumble_4 = $_COOKIE["hcde"];
		//
		$parts = explode('=', $cookie);
		$crumble = trim($parts[0]);
		setcookie($crumble, '', time() - 1000);
		setcookie($crumble, '', time() - 1000, '/');

		// $crumble_1 = trim($parts[0]);
		// $crumble_2 = trim($parts[0]);
		// $crumble_3 = trim($parts[0]);
		// $crumble_4 = trim($parts[0]);
		// //
		// setcookie($crumble_1, '', time() - 3600, '/');
		// setcookie($crumble_2, '', time() - 3600, '/');
		// setcookie($crumble_3, '', time() - 3600, '/');
		// setcookie($crumble_4, '', time() - 3600, '/');
	}
}
// Expire their cookie files
// logged user
if(isset($_COOKIE["id"]) && isset($_COOKIE["user"]) && isset($_COOKIE["pass"]) && isset($_COOKIE["hcde"])) {
	setcookie("id", '', strtotime( '-5 days' ), '/');
    setcookie("user", '', strtotime( '-5 days' ), '/');
	setcookie("pass", '', strtotime( '-5 days' ), '/');
	setcookie("hcde", '', strtotime( '-5 days' ), '/');
}
// non user // works for store and contact page

if(isset($_COOKIE["NonUsrLg_cid"]) && isset($_COOKIE["NonUsrLg_cnm"]) && isset($_COOKIE["NonUsrLg_eml"])) {
	//
	setcookie("NonUsrLg_cid", '', strtotime( '-5 days' ), '/');
    setcookie("NonUsrLg_cnm", '', strtotime( '-5 days' ), '/');
	setcookie("NonUsrLg_eml", '', strtotime( '-5 days' ), '/');
	//	
}
// Destroy the session variables
session_destroy();
session_write_close();
// cookie_destroy();
// Double check to see if their sessions exists
if(isset($_SESSION['username'])){
	header("location: 404.php?msg=Error:Ummm... that was weird sorry about this :)");
} if(isset($_SESSION['NonUsrLg_cnm'])){
	header("location: 404.php?msg=Error:Ummm... that was weird sorry about this :)");
} else {
	header("location: index.php");
	exit();
} 
?>