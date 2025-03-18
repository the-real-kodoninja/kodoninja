
<?php
$mNws_eX = "";
$mNws_cX = "";
$msg1 = "";
$msg2 = "";
$msg3 = "";
$msg4 = "";
include_once(''.$m_path.'icl/err/err_tkn.php');
include_once(''.$m_path.'icl/cnnc_t.php');
include_once(''.$m_path.'icl/c_sts.php');
include_once(''.$m_path.'prs/time_system.php');
$bckBtn = '<a id="bckBtn" href="javascript:history.back()">back</a>';

// test logic
// localhost/kodoninja/808.php?mNws_e=batdog@gmail.com&mNws_c=0dcaa3bdbbd6ca7d78a7c3de10baecec

// NOTE: create a cat ninja AI / mascot for the kodoverse


if(isset($_GET["mNws_e"]) && isset($_GET["mNws_c"])){
    $mNws_eX = filter_var(preg_replace('#[^a-z0-9.@_]#i', '', $_GET['mNws_e']),FILTER_SANITIZE_STRING);
    $mNws_cX = filter_var(preg_replace('#[^a-z0-9.@_]#i', '', $_GET['mNws_c']),FILTER_SANITIZE_STRING);
    //
    try {
        if($sqlo_____dbx___xX__->query(
            $sql__1 = "SELECT DISTINCT email,confirmed,code FROM news_list WHERE email='$mNws_eX' AND code='$mNws_cX' LIMIT 1")->fetchColumn()) {
            foreach ($sqlo_____dbx___xX__->query($sql__1) as $roo0w____X___xX__) {
                $nNws_con = filter_var($roo0w____X___xX__["confirmed"],FILTER_DEFAULT);
                $nNws_eml = filter_var($roo0w____X___xX__["email"],FILTER_SANITIZE_EMAIL);
                $nNws_cde = filter_var($roo0w____X___xX__["code"],FILTER_DEFAULT);
            }
            if ($nNws_con === '0') {
                try {
                $_____SQLUPD__x_____1 = $sqlo_____dbx___xX__->prepare(
                    "UPDATE news_list
                    SET token=?, 
                    confirmed=?
                    WHERE email='$mNws_eX' 
                    AND code='$mNws_cX' LIMIT 1");
                $_____SQLUPD__x_____1->execute([500,1]); 
                    if ($_____SQLUPD__x_____1) {
                        echo "success__true".$sqlc_____dbx___xX__;
                    }
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$lgnId__x,$_SERVER["SCRIPT_NAME"],$newError);
            }
                $msg1 = "Welcome fellow kodoninja";
                // for testing
                // $msg2 = 'TEST: ('.$numrows_sql9.') ['.$nNws_con.', '.$nNws_eml.', '.$nNws_cde.'] '.$mNws_eX.' '.$mNws_cX.'';
                $msg3 = "<small>cough*... oh wait did I forget to mention you need to be at least a basic user to collect them... mhahahaha haha no worries we'll hold them until you create an account. Its Free. It's all up to you thanks again for signing up.
                <br><br>
                cough* ahem... This token offer exspires in 2 days... or 3 days idk I'm just a cat i'd do it soon if I were you.</small>";
                $msg4 = "
                <p>Your email <b>$mNws_eX</b> is all signed up and As promissed you now have:</p> 
                <h2><span style=\"color: darkgreen\">500</span> FREE kodotokens...</h2> $msg3";
            } else if ($nNws_con === '1') {
                $msg1 = "Welcome back fellow kodoninja :(";
                $msg2 = "";
                $msg3 = "";
                $msg4 = "I eat mice for breakfast so I'm no dumb kitty, you got your tokens meow, now get lost.";
            } else {
                header('location: 404.php?msg=Sorry fellow kodoninja something went wrong on my end meow, you\'ll get kodotokens for your inconvience. Error code:').$sqlc_____dbx___xX__; exit();
            }
        } else {
            header('location: 404.php?msg=Something went wrong. Are you try to bamboozle us to get kodotokens? TEST: ('.$numrows_sql.') ['.$nNws_con.', '.$nNws_eml.', '.$nNws_cde.'] '.$mNws_eX.' '.$mNws_cX.':( Error code:').$sqlc_____dbx___xX__; exit();
        }
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }
    //
}

if(isset($_GET["msg"])){
    $msg1 = filter_var(preg_replace('#[^a-z0-9.@ ]#i', '', $_POST['msg']),FILTER_SANITIZE_STRING);
} if (isset($_GET["msg"]) == "" && $mNws_eX == "" && $mNws_cX == "") {
    $msg1 = "ello mate you've reached the success page. '.$bckBtn.'";
    $msg2 = "$msg1<br><br>";
}



//
$mainVw3 = '
<div class="db mainVw3">
    <div class="lft-lgc2 pad-T">
        <h2>SUCCESS!</h2>
        '.$msg2.' 
        '.$msg4.'
    </div>
</div>
';
    
$successBdy_Full = "$mainVw3";
?>
<style>
    #bckBtn {
        margin: 20px 0px 0px;
        padding: 11PX 15PX;
        border-radius: 6px;
        border: none;
        background-color: #C2B280;
        color: #333;
        text-decoration: none;
        font-size: 19px;
    }
    #bckBtn:hover {
        background-color: darkred;
        color: #fff;
    }
</style>