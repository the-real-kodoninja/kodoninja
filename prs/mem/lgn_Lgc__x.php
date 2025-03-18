<?php
if (isset($_POST['lgn__crd__1']) && isset($_POST['lgn__crd__2']) && isset($_POST['sdc_1']) && isset($_POST['sdc_2']) && isset($_POST['sdc_3'])) {    

    $lgn__crd__1__x = [
        $_____ipt___tpe___0 = filter_var($_POST['lgn__crd__1'], FILTER_SANITIZE_EMAIL),
        $_____ipt___tpe___1 = filter_var($_POST['lgn__crd__1'], FILTER_SANITIZE_NUMBER_INT),
        $_____ipt___tpe___2 = filter_var($_POST['lgn__crd__1'], FILTER_SANITIZE_STRING)];
if ($_____ipt___tpe___1 === "") { $_____ipt___tpe___1 = "NULL";} 
    if (!$lgn__crd__1__x) {
        echo "not a valid email, phone #, or username... meow";
        exit();
    }
    $sdc_1__x = filter_var($_POST['sdc_1'],FILTER_SANITIZE_STRING);
    $sdc_2__x = filter_var($_POST['sdc_2'],FILTER_SANITIZE_STRING);
    $sdc_3__x = filter_var($_POST['sdc_3'],FILTER_SANITIZE_STRING);

$path_1a = '../';
$path_1b = '../../';
$meowRes = "";
$cred__ChCk__1_ok = false;
$cred__ChCk__2_ok = false;
include_once(''.$path_1b.'icl/err/err_tkn.php');
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/kodocrypt_vx.php');
$_____pass____x__x_1 = kodohash_modify($_POST['lgn__crd__2']);
$ip__x = filter_var(getenv('REMOTE_ADDR'),FILTER_VALIDATE_IP);
if ($lgn__crd__1__x && $_____pass____x__x_1) { 
    if($tcck = $sqlo_____dbx___xX__->query(
    $sql_1 = "SELECT DISTINCT id,username,phone,email,code,password 
        FROM users 
        WHERE username = '$_____ipt___tpe___2' OR
        phone = '$_____ipt___tpe___1' OR 
        email = '$_____ipt___tpe___0'
        LIMIT 1")->fetchColumn()) {  
        $cred__ChCk__1_ok = true;
        foreach ($sqlo_____dbx___xX__->query($sql_1) as $roo0w____X___xX__) {
            $lgnId__x = filter_var($roo0w____X___xX__["id"],FILTER_SANITIZE_NUMBER_INT);
            $lgnUsr__x = filter_var($roo0w____X___xX__["username"],FILTER_SANITIZE_STRING);
            $lgnCde__x = filter_var($roo0w____X___xX__["code"],FILTER_SANITIZE_URL);
        } 
    } else {
        echo "Something's off, meow.";
        exit();
        echo $sqlc_____dbx___xX__;
    } if ($cred__ChCk__1_ok) {
        if($tcck = $sqlo_____dbx___xX__->query(
        $sql_2 = "SELECT DISTINCT password 
        FROM users 
        WHERE password = '$_____pass____x__x_1'
        LIMIT 1")->fetchColumn()) {  
        $cred__ChCk__2_ok = true;
        foreach ($sqlo_____dbx___xX__->query($sql_2) as $roo0w____X___xX__) {
            $_____pass____x__x_2 = filter_var($roo0w____X___xX__["password"],FILTER_DEFAULT);
            // echo "
            // PWD RAW: ".$_POST['lgn__crd__2']."<br>
            // RAW RAW: ".kodohash_modify($_POST['lgn__crd__2'])." <br>
            // PWD HSH: ".$_____pass____x__x_1."<br>
            // PWD SQL: ".$_____pass____x__x_2."<br>
            // PWD MAT: ".kodohash_verify($_____pass____x__x_1, $_____pass____x__x_2)." <br>
            // EMAIL CHECK: ".$lgn__crd__1__x[0]."<br>
            // PHONE NUMBER CHECK: ".$lgn__crd__1__x[1]."<br>
            // USERNAME CHECK: ".$lgn__crd__1__x[2]."";
            // exit();
        } 
        } else {
            echo "Something's off, meow.";
            exit();
            echo $sqlc_____dbx___xX__;
        }
    } if ($cred__ChCk__1_ok && $cred__ChCk__2_ok && kodohash_verify($_____pass____x__x_1, $_____pass____x__x_2)) {
        // developer checks
        $meowRes .= "I found you <b>$lgnUsr__x</b> hehehe meow, your credetianls match up now entering the kodoverse.";
        // CREATE THEIR SESSIONS AND COOKIES
        // kodohash_code($sqlo_____dbx___xX__,$lgnId__x,$lgnUsr__x,$_____pass____x__x_2);
        $_SESSION['userid'] = $lgnId__x;
        $_SESSION['username'] = $lgnUsr__x;
        $_SESSION['password'] = $_____pass____x__x_2;
        setcookie("id", $lgnId__x, strtotime( '+30 days' ), "/", "", "", TRUE);
        setcookie("user", $lgnUsr__x, strtotime( '+30 days' ), "/", "", "", TRUE);
        setcookie("pass", $_____pass____x__x_2, strtotime( '+30 days' ), "/", "", "", TRUE); 
        // UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
        try {
            $_____SQLUPD__x_____2 = $sqlo_____dbx___xX__->prepare(
                "UPDATE users 
                SET ip=?, 
                lastlogin=?,
                password=?,
                deactivated=?
                WHERE id='$lgnId__x' 
                AND username='$lgnUsr__x' LIMIT 1");
            $_____SQLUPD__x_____2->execute([
                $ip__x, 
                date('Y-m-d H:i:s'),
                $_____pass____x__x_2,
                0]); 
                if ($_____SQLUPD__x_____2) {
                    echo "success__true";
                    echo $sqlc_____dbx___xX__;
                }
        } catch (PDOException $newError) {
            newError($sqlo_____dbx___xX__,$lgnId__x,$_SERVER["SCRIPT_NAME"],$newError);
        }
    } else {
        echo "I found you <b>$lgnUsr__x</b> buuutttt... Something is off, meow.";
    }
} else {
    echo "I found you <b>$lgnUsr__x</b> buuutttt... Something is off, meow.";
}
} else newError($sqlo_____dbx___xX__,0,$_SERVER["SCRIPT_NAME"],NULL);
?>