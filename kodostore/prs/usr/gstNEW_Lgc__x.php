<?php
$path_1a = '../';
$path_1b = '../../';
$usrEml_Chk__x = false;
$meowRes = "";
include_once(''.$path_1b.'icl/c_sts.php');
require_once(''.$path_1b.'icl/kodocrypt_vx.php');
include_once(''.$path_1b.'prs/time_system.php');
if ($log_id >= 1 && $user_ok == true) {
    $meowRes = "hmmmm.... odd. it seems your already logged in";
    exit();
    // mysql_close();
} else {
    if (isset($_POST['ge1']) && isset($_POST['ge2']) && isset($_POST['gp1']) && isset($_POST['gp2'])) { 
        $ge1NEW__x = mysqli_real_escape_string($cnnc_t2, $_POST['ge1']);
        $ge1NEW__x = preg_replace('#[^a-z0-9_.@]#i', '', $ge1NEW__x);
        $ge2NEW__x = mysqli_real_escape_string($cnnc_t2, $_POST['ge2']);
        $ge2NEW__x = preg_replace('#[^a-z0-9_.@]#i', '', $ge2NEW__x);;
        $gp1NEW__x = mysqli_real_escape_string($cnnc_t2, $_POST['gp1']);
        $gp2NEW__x = mysqli_real_escape_string($cnnc_t2, $_POST['gp2']);
        // $sdc_1__x = mysqli_real_escape_string($cnnc_t2, $_POST['sdc_1']);
        // $sdc_2__x = mysqli_real_escape_string($cnnc_t2, $_POST['sdc_2']);
        // $sdc_3__x = mysqli_real_escape_string($cnnc_t2, $_POST['sdc_3']);

        // email logic
        if ($gp1NEW__x == "") {
            $meowRes = "You need an email meow.";  
        } else if ($gp1NEW__x != "" && $gp2NEW__x == "") {
            $meowRes = "You need to confirlm your email meow.";
        } else {
            if ($gp1NEW__x !== $gp2NEW__x) {
                $meowRes = "Your emails do not match meow.";
            } else {
                $meowRes = "Emails are all matched up meow.";
                $usrEml_Chk__x = true;
            }
        }


        // password logic 
        if ($gp1NEW__x == "") {
            $meowRes = "You need a password meow.";  
        } if(!preg_replace('/[^a-z]/m', ' ', $gp1NEW__x)) {
            $meowRes = "Your password needs a lowercase letter meow.";  
        } if(!preg_replace('/[^A-Z]/m', ' ', $gp1NEW__x)) {
            $meowRes = "Your password needs a uppercase letter meow.";  
        } if(!preg_replace('/[^0-9]/m', ' ', $gp1NEW__x)) {
            $meowRes = "Your password needs a letter meow.";  
        } if (strlen($gp1NEW__x) < 3 || strlen($gp1NEW__x) > 16) {
            $meowRes = 'Your password needs to be 3 - 16 characters. meow';
        } if ($gp1NEW__x != "" && $gp1NEW__x == "") {
            $meowRes = "You need to confirlm your password meow.";
        } else {
            if ($gp1NEW__x !== $gp2NEW__x) {
                $meowRes = "Your passwords do not match meow.";
            } if ($gp1NEW__x === $gp2NEW__x && $gp1NEW__x != "" && $gp2NEW__x != "") {
                $meowRes = "Passwords are all matched up meow.";
                $_____pass____x__x_1 = kodohash_modify($cnnc_t, $gp1NEW__x);
                $usrPwd_Chk__x = true;
            }
        }

        //check if email is apart of users
        if ($usrPwd_Chk__x = true && $usrEml_Chk__x = true) {
            $sql___x__1 = mysqli_query($cnnc_t, "SELECT email FROM users WHERE email = '$ge2NEW__x' LIMIT 1");
            $DB_email_check1 = mysqli_num_rows($sql___x__1);
            if ($DB_email_check1) {
                $meowRes = "hmmm... it looks like this email is already apart of the kodoverse,... please login above to continue. If you forgot your password try the forgot password options, meow.";
            } else {
                $sql___x__2 = mysqli_query($cnnc_t2, "SELECT email FROM guest WHERE email = '$ge2NEW__x' LIMIT 1");
                $sql___x__2_5 = mysqli_query($cnnc_t2, "SELECT email,password FROM guest WHERE email = '$ge2NEW__x' AND password = '$_____pass____x__x_1'");
                $sql___x__3 = mysqli_query($cnnc_t2, "SELECT g.email,o.email,o.status 
                    FROM guest AS g
                    INNER JOIN orders AS o
                    ON g.email = o.email
                    WHERE g.email = '$ge2NEW__x'
                    AND o.status = '2'"); // string
                    // 1 = ordered
                    // 2 = confimed
                    // 3 = cancled
                $DB_email_check2 = mysqli_num_rows($sql___x__2);
                $DB_email_check2_5 = mysqli_num_rows($sql___x__2_5);
                $DB_email_check3 = mysqli_num_rows($sql___x__3);
                if ($DB_email_check2 && $DB_email_check2_5) {
                    $meowRes = "It looks like you have a guest account already. I've logged you in. Upon successful checkout you'll have 500 kodotokens rewarded to you whenever you create your kodoverse account.";
                } else if ($DB_email_check2) {
                    $meowRes = "Looks like I found you meow, but this isn't the correct password, if you remember it I'll log you in.";
                } else if ($DB_email_check2 && $DB_email_check2_5 && $DB_email_check3) {
                    $meowRes = "Hmmm I already have you as a guest in my system meow. Hay, use this email to join my FREE or PREMIUM membership and collect your extra 500 kodotokens, meow meow. I guess I should give you another 500 kodotokens meow if you successfully checkout with this one.,.. did you find a hack meow don't tell anyone.";
                } else {
                        $sql___x__4 = mysqli_query($cnnc_t2, "INSERT INTO `guest`
                            (`ip`,
                            `email`, 
                            `password`,
                            `created`,
                            `modified`,
                            `status`) 
                        VALUES('".$log_ip."',
                                '".$ge2NEW__x."',
                                '".$_____pass____x__x_1."',
                                now(),
                                now(),
                                'a')");
                    if ($sql___x__4) {
                        $meowRes = "you're email <b>$ge2NEW__x</b> is all set.";
                    } else {
                        $meowRes = "oh no meow, for some reason I couldn't add to our system at this time, meow.";
                    }
                }
            }
        }
        echo $meowRes;
    } else {
        header("location: 404.php?msg=Sorry you can't be here mouse, now run away before I eat you. meow.");
        exit();
        // mysql_close();
    }

}
?>