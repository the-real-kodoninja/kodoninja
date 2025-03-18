<?php
// session_start();
$path_1a = '';
// include_once(''.$path_1a.'icl/err/err_tkn.php');
// include_once(''.$path_1a.'icl/cnnc_t.php');
// include_once(''.$path_1a.'icl/c_sts.php');
// include_once(''.$path_1a.'icl/kodocrypt_vx.php');
// Files that inculde this file at the very top would NOT require 
// connection to database or session_start(), be careful.
// Initialize some vars
$user_ok = false;
$u = "";
$log_id = 0;
$pass1__x = "";
$log_HshCde_x = "";
$log_HshCde_y = "";
$log_username = "";
$log_email = "";
$log_usrAvt = "";
$log_cde = "";
$log_password = "";
$log_HshCde = ''.hash('gost', sha1(md5("therealcookiemonster"))).'';  // unsets false hash for non logged non parsed
$nmeDpy_GLBL = "";
$usrTag_GLBL = "";
$setUnq_ncde = "octokitty";
$_SESSION["password"] = "";
$_COOKIE['hcde'] = "";
$plcHldr_1 = "Search kodoninja";

// User Verify function
function evalLoggedUser($sqlo_____dbx___xX__,$log_id,$log_username,$log_password){
	$path_1a = "";
	try {
		if($sql______x___xX__ = "SELECT ip FROM users WHERE id='$log_id' AND username='$log_username' AND password='$log_password' LIMIT 1") return true;
		echo $sqlc_____dbx___xX__; exit();
	} catch (PDOException $newError) {
		newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
	}
} function codeCnts_($_____pass____x__x_x) {
    $sltShkr_1 = ['memory_cost' => PASSWORD_ARGON2_DEFAULT_MEMORY_COST, 
                'time_cost' => PASSWORD_ARGON2_DEFAULT_TIME_COST, 
                'threads' => PASSWORD_ARGON2_DEFAULT_THREADS];
    $sltShkr_2 = password_hash($_____pass____x__x_x, PASSWORD_BCRYPT, $sltShkr_1);
    return substr($sltShkr_2, -10);
}

// for non kodoverse users who create guest accounts
if(isset($_SESSION["kodoStre_uid"]) && isset($_SESSION["kodoStre_eml"]) && isset($_SESSION["kodoStre_cde"])) {
	$s_log_uid = preg_replace('#[^0-9]#', '', $_SESSION['kodoStre_uid']);
    $s_log_eml = preg_replace('#[^a-z0-9.@_]#i', '', $_SESSION['kodoStre_eml']);
    $s_log_cde = preg_replace('#[^a-z0-9.@_]#i', '', $_SESSION['kodoStre_cde']);
} 
// for non users store / contact page
if(isset($_SESSION["NonUsrLg_uid"]) && isset($_SESSION["NonUsrLg_eml"]) && isset($_SESSION["NonUsrLg_cde"])) {
	$log_id = preg_replace('#[^0-9]#', '', $_SESSION['NonUsrLg_uid']);
	$log_email = preg_replace('#[^a-z0-9.@_]#i', '', $_SESSION['NonUsrLg_eml']);
	$log_cde = preg_replace('#[^a-z0-9.@_]#i', '', $_SESSION['NonUsrLg_cde']);
	// unique to contact page
	$log_caseNum = preg_replace('#[^a-z0-9]#i', '', $_SESSION['NonUsrLg_cnm']);
} 
if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"]) && isset($_SESSION["globalCode"])) {
	$log_id = preg_replace('#[^0-9]#', '', $_SESSION['userid']);
	$log_username = preg_replace('#[^a-z0-9]#i', '', $_SESSION['username']);
	$log_password = preg_replace('#[^a-z0-9]#i', '', $_SESSION['password']);
	$log_HshCde = preg_replace('#[^a-z0-9]#i', '', $_SESSION['globalCode']);
	// $user_ok = true;
	// Verify the user
	if(evalLoggedUser($sqlo_____dbx___xX__,$log_id,$log_username,$log_password)) $user_ok = true;
} else if(isset($_COOKIE["id"]) && isset($_COOKIE["user"]) && isset($_COOKIE["pass"]) && isset($_COOKIE["hcde"])){
	$log_id = preg_replace('#[^0-9]#', '', $_COOKIE['id']);
    $log_username = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['user']);
    $log_password = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['pass']);
	if(evalLoggedUser($sqlo_____dbx___xX__,$log_id,$log_username,$log_password)) $user_ok = true;
} 

if ($user_ok) {
	// AND lastlogin = date('Y-m-d H:i:s')
	$NEW_HshCde = codeCnts_($log_password);
	function HshCde_x($new_____hshcde___xX__) { 
		return $new_____hshcde___xX__;
		$new_____hshcde___xX__ = $_COOKIE['hcde']; 
		setcookie("hcde", $new_____hshcde___xX__, strtotime( '+30 days' ), "/", "", "", TRUE);
	}
	function HshCde_y($sqlo_____dbx___xX__,$log_id,$log_username,$log_password,$new_____hshcde___xX__) { 
		if($sqlo_____dbx___xX__->query("SELECT id,password FROM users WHERE id = '$log_id' 
		-- AND password = '$log_password' 
		LIMIT 1")->fetchColumn()) { // post exit time to update
			try { // success found now time to update SAVE or EDIT
					$_____SQLUPD__x_____x = $sqlo_____dbx___xX__->prepare(
						"UPDATE users 
						SET code = ?
						WHERE id = '$log_id' 
						AND username = '$log_username' 
						-- AND password = '$log_password' 
						LIMIT 1");
					$_____SQLUPD__x_____x->execute([$new_____hshcde___xX__]); 
				if ($_____SQLUPD__x_____x) {
					return $new_____hshcde___xX__;
					$new_____hshcde___xX__ = $_SESSION['globalCode'];
				}
			} catch (PDOException $newError) {
				newError($sqlo_____dbx___xX__,$lgnId__x,$_SERVER["SCRIPT_NAME"],$newError);
			}
		}
	}
	$log_HshCde_x = HshCde_x($NEW_HshCde);
	$log_HshCde = HshCde_y($sqlo_____dbx___xX__,$log_id,$log_username,$log_password,$NEW_HshCde);
	$log_HshCde_y = HshCde_y($sqlo_____dbx___xX__,$log_id,$log_username,$log_password,$NEW_HshCde);
	$setUnq_ncde = hash("gost", $log_id.$log_username.$log_password);
}
?>
<?php
$sCrt_1 = '<div style="font-size: 5px;">CLUE 1: The kodoverse platforms are flooded with countless weekly added easter eggs that earn you tokens; These can be used for merch, gift cards, crypto, money and more. Shhhh... Don\'t tell anyone.</div>';

$sCrt_2 = '<div style="font-size: 5px;">CLUE 2: Use the search bars, click around, look closely and throughly. I think the creator post clues on his social media accounts idk cougn* twiiter, YouTube (subscribe, follow...) ... Shhhh... Don\'t tell anyone.</div>';

// if ($page == "3g9") {
  $sCrt_4 = '<div style="font-size: 5px;">CLUE ?: Phrases, links, html code, letters, numbers... I think these eggs take it all.</div>';
// } if ($page == "membership") {
  $sCrt_5 = '<div style="font-size: 5px;">CLUE 3: I heard from a kitty whose good at chess that you get 5500 kodotokens when you sign up for a premium membership (1000 weekly as long as you stay premium). meow. I also saw a $5 gift card in the kodostore for 5000 kodotokens. I guess the first month pays for its self. meow. </div>';
// } 
 
$sCrt_6 = '<div style="font-size: 5px;">CLUE 4: Don\'t paw Signup without filling out anything. meow. </div>';
$sCrt_7 = '<div style="font-size: 5px;">CLUE 5: I hear basic members get 5 kodotokens for any AD they click on. meow, not sure if its a limit meow.. </div>';
// DEVELOPERS // kodoninja.com gets paid by advertisers per click. Create creative measures to get add clicks
// -- platform makes more money on basic with ads

// DEVELOPERS // after brand deals and codes // create measures that gain kodotokens if cliked and purchased there products or used there codes

//test 


// echo '
// DEVELOPER TESTING: <br>
// log id: '.$log_id.' <br>
// log username:'.$log_username.' <br>
// log password: '.$log_password.' <br>
// log hash: '.$log_HshCde.' <br> 
// SESSION: '.$_SESSION['globalCode'].' <br>
// COOKIE: '.$_COOKIE["hcde"].' <br>
// hsh|x: '.$log_HshCde_x.' <br>
// hsh|y: '.$log_HshCde_y.' <br>
// ';
// exit();
?>