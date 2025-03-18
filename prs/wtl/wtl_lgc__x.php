<?php
$path_1a = '../';
$path_1b = '../../';
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
include_once(''.$path_1b.'prs/time_system.php');
include_once(''.$path_1b.'icl/kodocrypt_vx.php');

$EggCode__x = "";
$meowRes = "";
$usrChk = false;
$emlChk = false;
$usrNme_Chk__x = false;
$usrEml_Chk__x = false;

if(isset($_POST["wl_1"]) && isset($_POST["wl_2"])) {
    $wl_1__x = mysqli_real_escape_string($cnnc_t, $_POST['wl_1']);
    $wl_1__x = preg_replace('#[^a-z0-9]#i', '', $wl_1__x);
    $wl_2__x = mysqli_real_escape_string($cnnc_t, $_POST['wl_2']);
    
    //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
    //\\//\\//\\ username logic \\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
    if ($wl_1__x == $log_username) {
        $meowRes .= 'Awesome. this username is yours across the entire kodoverse';
        $usrNme_Chk__x = true;
    } else {
        if ($wl_1__x == "") {
        $meowRes .= 'Make a username meow, kodokitty is taken.';
        $usrChk = false;
        } if (strlen($wl_1__x) < 3 || strlen($wl_1__x) > 16) {
            $meowRes .= 'Your email needs to be 3 - 16 characters. meow';
            $usrChk = false;
        }  else {
            $usrChk = true;
        } if ($usrChk == true) {
            $sql1 = mysqli_query($cnnc_t, "SELECT id FROM users WHERE username='$wl_1__x' LIMIT 1");
            $uname_check = mysqli_num_rows($sql1);
            if ($wl_1__x == $EggCode__x) {
                $meowRes .= 'You have your tokens, meow, now choose a username, the kodoverse is waiting. This is only unlocked once.';
                // exit();
            } if ($wl_1__x == "kodoninja" || $wl_1__x == "the_real_kodoninja" || $wl_1__x == "therealkodoninja") {
                $meowRes .= "Nope, $wl_1__x... is my pet, meow";
            } else if ($uname_check > 0) {
                $meowRes .= '' . $wl_1__x . ' is taken, meow.';
                // exit();
            } else {
                $meowRes .= 'YAY! ' . $wl_1__x . ' is\'nt taken and all avaliable, meow.';
                // exit();
                $usrNme_Chk__x = true;
            }
        } 
    } 

    //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
    //\\//\\//\\ email logic \\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
    // current user email grab
    $sql2 = mysqli_query($cnnc_t, "SELECT email FROM users where id = '$log_id' LIMIT 1");
    while ($row = mysqli_fetch_array($sql2, MYSQLI_ASSOC)) { $log_email = $row["email"]; }
    if ($log_email == $wl_2__x) {
        $meowRes .= ' Awesome. this email is yours across the entire kodoverse';
        $usrEml_Chk__x = true;
    } else {
        if ($wl_2__x == "") {
            $meowRes .= "You need an email meow.";  
        } if ($wl_2__x != "" && $log_email != $wl_2__x) {
            $usrEml_Chk__x = true;
        }
    }
    //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
    //\\//\\//\\ insert logic \\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
    if ($usrNme_Chk__x == true && $usrEml_Chk__x == true) {
        $sqlx = mysqli_query($cnnc_t, "SELECT * FROM wait_list WHERE username = '$wl_1__x' OR email ='$wl_2__x' LIMIT 1");
        $wait_check = mysqli_num_rows($sqlx);
        if($wait_check > 0){
            while ($row1 = mysqli_fetch_array($sqlx, MYSQLI_ASSOC)) {
                $wl_cHk_1 = $row1["uid"];
                $wl_cHk_2 = $row1["username"];
                $wl_cHk_3 = $row1["email"];
            }
            if ($wl_1__x == $wl_cHk_2) {
                $meowRes = "Looks like that username is already reserved.";
            } if ($wl_2__x == $wl_cHk_3) {
                $meowRes = "Looks like that email is already joined the wait list.";
            } 
        } else {
            if ($log_id == "") { $wl_id = "0"; } else { $wl_id = $log_id;}
            $sql_1x = mysqli_query($cnnc_t, "INSERT INTO `wait_list`(`uid`,
                                        `username`,
                                        `email`, 
                                        `reason`,
                                        `date`) 
                            VALUES('".$wl_id."',
                                    '".$wl_1__x."',
                                    '".$wl_2__x."',
                                    'kodospace release',
                                    now())");
            if ($sql_1x) {
                $meowRes = "Thank you $wl_1__x, were almost finished, but we'll let you know when the social network for the kodoverse becomes avaliable. Look out for updates via $wl_2__x, kodoninja.com, and YouTube ";
            } else {
                $meowRes = "This is weird, looks like another mouse is loose in the code, meow.";
            }
        }
    }
    echo "$meowRes";
}


?>