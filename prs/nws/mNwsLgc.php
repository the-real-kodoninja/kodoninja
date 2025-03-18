<?php
$path_1a = '../';
$path_1b = '../../';
include_once(''.$path_1b.'icl/err/err_tkn.php');
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
include_once(''.$path_1b.'prs/time_system.php');

if (isset($_POST['mNws_e']) && isset($_POST['subVal'])) { 
    $nwsEmChk = filter_var($_POST['mNws_e'], FILTER_SANITIZE_EMAIL);
    $subValChk = filter_var($_POST['subVal'], FILTER_SANITIZE_EMAIL);
    $ip = filter_var(getenv('REMOTE_ADDR'),FILTER_VALIDATE_IP);

    // hidden egg logic s1
    // BASIC + users unlock by hitting mystery button 5 times to open news letter enter email to gain 1,000 kodotokens
    if ($nwsEmChk == "the_real_kodoninja@kodoverse.com") {
        if ($user_ok == true && $log_username != "" && $subValChk != "") {
            //
            try {
                if($sqlo_____dbx___xX__->query(
                    $sql_X_1 = "SELECT token FROM users WHERE id='$log_id' LIMIT 1")->fetchColumn()) {  
                    foreach ($sqlo_____dbx___xX__->query($sql_X_1) as $roo0w____X___xX__) {
                        // users
                        $curTknCnt = filter_var($roo0w____X___xX__["token"],FILTER_DEFAULT);
                    } 
                }
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }
            
            $tknReward = 1000;
            $newTknCnt = $curTknCnt + $tknReward;


            // update
            try {
                $sql_X1 = $sqlo_____dbx___xX__->prepare(
                    "UPDATE users 
                    SET token=?
                    WHERE id='$log_id' LIMIT 1");
                $sql_X1->execute([$newTknCnt]); 
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }     
            // insert
            try {
                // insert
                $sql_X2 = $sqlo_____dbx___xX__->prepare("INSERT INTO egg_log(
                            uid,
                            location, 
                            method, 
                            token_amount,
                            teir,
                            date) 
                        VALUES(:id1,
                            :loc,
                            :mth,
                            :tkn,
                            :tir,
                            :date)");
                $sql_X2->execute([
                            ':id1' => $log_id,
                            ':loc' => 'icl/nws/mNwsLgc.php',
                            ':mth' => 'email signup input',
                            ':tkn' => $tknReward,
                            ':tir' => 2,
                            ':date' => date('Y-m-d H:i:s')]);
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }
            // insert
            try {
                // insert
                $sql_X3 = $sqlo_____dbx___xX__->prepare("INSERT INTO egg_log(
                            uid,
                            location, 
                            method, 
                            token_amount,
                            teir,
                            date) 
                        VALUES(:id1,
                            :loc,
                            :mth,
                            :tkn,
                            :tir,
                            :date)");
                $sql_X3->execute([
                            ':id1' => $log_id,
                            ':loc' => 'icl/nws/mNwsLgc.php',
                            ':mth' => 'email signup input',
                            ':tkn' => $tknReward,
                            ':tir' => 2,
                            ':date' => date('Y-m-d H:i:s')]);
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }

            // insert
            try {
                // insert
                $sql_X4 = $sqlo_____dbx___xX__->prepare("INSERT INTO token_log(
                            uid,
                            amount, 
                            old_total, 
                            new_total,
                            math,
                            method,
                            date) 
                        VALUES(:id1,
                            :amt,
                            :otl,
                            :ntl,
                            :mat,
                            :mth,
                            :date)");
                $sql_X4->execute([
                            ':id1' => $log_id,
                            ':amt' => $tknReward,
                            ':otl' => $curTknCnt,
                            ':ntl' => $newTknCnt,
                            ':mat' => '+',
                            ':mth' => 'teir 2 easter egg',
                            ':date' => date('Y-m-d H:i:s')]);
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }

            // $sql_X1 === true && $sql_X2 === true && $sql_X3 === true

            if ($sql_X1 === true) {
                echo "<br>Looks like <b>$nwsEmChk</b> unlocked 1 of many easter eggs. Congrats you get <b style='color: darkgreen'>$tknReward</b> free kodotokens.<br><br>So $log_username you know have <b style='color: darkgreen'>$newTknCnt</b> kodotokens".$sqlc_____dbx___xX__; exit();
            } else {
                echo "<br>This is weird, I'm sorry about this. Good job on finding this egg, however there was an error, contact us by email and we'll give you the <b style='color: darkgreen'>$tknReward</b> kodotokens".$sqlc_____dbx___xX__; exit();
            }
        } else {
            echo "<b>Amazing!!!</b> However you need to be at least a basic user to unlock teir easter eggs. Signup to unlock fellow kodoninja".$sqlc_____dbx___xX__; exit();
        }
        
    }
    // grab test
    // echo "<br>Looks like <b>$nwsEmChk</b> and <b>$subValChk</b> sent to php successfully";
    
} else {
    header('location: '.$path_1b.'404.php?msg=Sorry human you shouldn\'t be on this page. Shame on you. Error code:').$sqlc_____dbx___xX__; exit();
}



// BASIC+ users email list subscribe and unsubscribe
if ($user_ok == true && $log_id != "" && $subValChk != "") {


    try {
        if($sqlo_____dbx___xX__->query(
                $sql9 = "SELECT DISTINCT id,username,email FROM users WHERE id='$log_id' LIMIT 1")->fetchColumn()) {  
                foreach ($sqlo_____dbx___xX__->query($sql9) as $roo0w____X___xX__) {
                    // users
                    $nws_uid = filter_var($roo0w____X___xX__["id"],FILTER_SANITIZE_STRING);
                    $nws_nme = filter_var($roo0w____X___xX__["username"],FILTER_DEFAULT);
                    $nws_eml = filter_var($roo0w____X___xX__["email"],FILTER_SANITIZE_EMAIL); 
            } 
        }
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }



    if ($subValChk == "subYes") {
        //
        if($count_uc = $sql______dbx___xX__->query("SELECT COUNT(id) FROM news_list WHERE id='$log_id' LIMIT 1")->fetchColumn()) {
            //
            // update
            try {
                $sql_X1 = $sqlo_____dbx___xX__->prepare(
                    "UPDATE news_list 
                    SET active=?
                    WHERE id='$log_id' LIMIT 1");
                $sql_X1->execute(['1']); 
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }   
            //
            echo "Awesome your now subscribed and re-added to the kodoverse email list, Thank You, Welcome back.".$sqlc_____dbx___xX__; exit();
            //
        } else {
            // update
            try {
                $sql1b = $sqlo_____dbx___xX__->prepare(
                    "UPDATE users 
                    SET news_list=?
                    WHERE id='$log_id' LIMIT 1");
                $sql1b->execute(['1']); 
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            } 
            // update
            try {
                $sql1c = $sqlo_____dbx___xX__->prepare(
                    "UPDATE users 
                    SET token=?
                    WHERE id='$log_id' LIMIT 1");
                $sql1c->execute(['++'. 500]); 
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            } 
            // insert
            try {
                $sql1d = $sqlo_____dbx___xX__->prepare("INSERT INTO news_list(
                            uid,
                            email, 
                            date_added,
                            active,
                            token,
                            code,
                            confirmed) 
                        VALUES(:id1,
                            :eml,
                            :ip1,
                            :dte,
                            :act,
                            :tkn,
                            :cde,
                            :cfm)");
                $sql1d->execute([
                            ':id1' => $nws_uid,
                            ':eml' => $nws_eml,
                            ':ip1' => $ip,
                            ':dte' => date('Y-m-d H:i:s'),
                            ':act' => 1,
                            ':tkn' => 500,
                            ':cde' => 0,
                            ':cfm' => 0]);
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }
            
            if ($sql1d) {
                echo "Awesome your now subscribed and added to the kodoverse email list, Thank You. As a bonus you get <b style=\"color: darkgreen\">500</b> kodotokens and <b style=\"color: darkgreen\">50</b> weekly for staying subscribed.".$sqlc_____dbx___xX__; exit();
            } 
        }
        //
        if($sqla = $sql______dbx___xX__->query("SELECT DISTINCT * FROM news_list WHERE id='$log_id' LIMIT 1")->fetchColumn()) {
            // update
            try {
                $sql1c = $sqlo_____dbx___xX__->prepare(
                    "UPDATE news_list 
                    SET active=?
                    WHERE id='$log_id' LIMIT 1");
                $sql1c->execute(['1']); 
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            } 

            echo "Awesome your now subscribed and re-added to the kodoverse email list, Thank You, Welcome back.".$sqlc_____dbx___xX__; exit();

        }
    }
            

    if ($subValChk == "subNo") {
        try {
            if($sqlo_____dbx___xX__->query(
                $sql = "SELECT DISTINCT u.*,n.* 
                FROM users AS u 
                INNER JOIN news_list AS n 
                WHERE u.id='$log_id' 
                AND u.email = n.email 
                AND n.active = '1' AND u.news_list = '1'
                LIMIT 1")->fetchColumn()) {  
                //
                // update
                try {
                    $sql1e = $sqlo_____dbx___xX__->prepare(
                        "UPDATE news_list 
                        SET active=?
                        WHERE id='$log_id' LIMIT 1");
                    $sql1e->execute(['0']); 
                } catch (PDOException $newError) {
                    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                } 
                //
                if ($sql1e) {
                    echo "Sad to see you go. Your now successfully  unsubscribed and removed from the weekly email list, Thank You.".$sqlc_____dbx___xX__; exit();
                } else {
                    header('location: '.$path_1b.'404.php?msg=Can\'t connect. Error code:').$sqlc_____dbx___xX__; exit();
                }
            }
        } catch (PDOException $newError) {
            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
        }
    } 
} 

// NON users email list subscribe and unsubscribe
if ($user_ok == false && $log_id == "" && $nwsEmChk != "" && $subValChk == "subYes") {

    try {
        if($sqlo_____dbx___xX__->query(
            $sql_1 = "SELECT DISTINCT * FROM users WHERE email='$nwsEmChk' LIMIT 1")->fetchColumn()) { 
                if ($sql_1) {
                    echo "Odd it looks like you already may be a user on the platform. Please login in order to signup for the newsletter. Or use a diffrent email.".$sqlc_____dbx___xX__; exit();
                } else {
                    //
                    try {
                        if($sqlo_____dbx___xX__->query(
                            $sql_2a = "SELECT DISTINCT * FROM news_list WHERE email='$nwsEmChk' LIMIT 1")->fetchColumn()) {  
                            foreach ($sqlo_____dbx___xX__->query($sql_2a) as $roo0w____X___xX__) {
                                    // news_list
                                    $nws_eml = filter_var($roo0w____X___xX__["email"],FILTER_SANITIZE_EMAIL);
                                    $nws_ave = filter_var($roo0w____X___xX__["active"],FILTER_DEFAULT);
                                //                            
                            } 
                            if ($sql_2a) {
                                if ($nws_ave == '0') {
                                    // update
                                    try {
                                        $sql1c = $sqlo_____dbx___xX__->prepare(
                                            "UPDATE news_list 
                                            SET active=?
                                            WHERE id='$log_id' LIMIT 1");
                                        $sql1c->execute(['1']); 
                                    } catch (PDOException $newError) {
                                        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                                    } 
                                    echo "Awesome your now subscribed and re-added to the kodoverse email list, Thank You, Welcome back.".$sqlc_____dbx___xX__; exit();
                                } if ($nws_ave == '1') {
                                    echo "Awesome i guess it looks like your already subscribed. Subscribe again with a diffrent email or reccomend a friend.".$sqlc_____dbx___xX__; exit();
                                }
                            } else {
                                $mNwsRand = rand(100000000000,999999999999);
                                $mNwsCode = md5($mNwsRand);
                                
                                // username is entered as empty
                                // insert
                                try {
                                    $sql1_3 = $sqlo_____dbx___xX__->prepare("INSERT INTO news_list(
                                                uid,
                                                email, 
                                                ip,
                                                date_added,
                                                active,
                                                token,
                                                code,
                                                confirmed) 
                                            VALUES(:id1,
                                                :eml,
                                                :ip1,
                                                :dte,
                                                :act,
                                                :tkn,
                                                :cde,
                                                :cfm)");
                                    $sql1_3->execute([
                                                ':id1' => 0,
                                                ':eml' => $nwsEmChk,
                                                ':ip1' => $ip,
                                                ':dte' => date('Y-m-d H:i:s'),
                                                ':act' => 1,
                                                ':tkn' => 0,
                                                ':cde' => $mNwsCode,
                                                ':cfm' => 0]);
                                } catch (PDOException $newError) {
                                    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                                }

                         
                                if ($sql1_3) {
                                    echo "Awesome your now subscribed and added to the kodoverse email list, Thank You. <br><br>Now you can collect your kodotokens by confirming your email at <b>$nwsEmChk</b> <br><br><div style=\"font-size: 5px;\">Remain subscribed to collect your weekly kodotokens. cough* I heard from a guy who knows a cat who told a squirrel that told a meltran who told a girl that clues are sent out in these newsletters, cough*</div>";
                                    // can't send mail on localhost uncomment on actual host
                                    // newsletter email confirmation handshake
                                    include_once(''.$path_1b.'mNwsAcVt.php');
                                    // mail($mNwsAcVt); 
                                    $sqlc_____dbx___xX__; exit();
                                } 
                            }
                        }
                    } catch (PDOException $newError) {
                        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                    }
                    //
                }
            }
        } catch (PDOException $newError) {
            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
        }

    // }

} if ($user_ok == false && $log_id == "" && $nwsEmChk != "" && $subValChk == "subNo") {

    //
    try {
        if($sqlo_____dbx___xX__->query(
            $sql_3 = "SELECT DISTINCT * FROM news_list WHERE email='$nwsEmChk' LIMIT 1")->fetchColumn()) {  
            foreach ($sqlo_____dbx___xX__->query($sql_3) as $roo0w____X___xX__) {
                    // news_list
                    $nws_eml = filter_var($roo0w____X___xX__["email"],FILTER_SANITIZE_EMAIL);
                    $nws_ave = filter_var($roo0w____X___xX__["active"],FILTER_DEFAULT);
            } 
            if ($nws_ave == '1') {
                // update
                try {
                    $sql_2 = $sqlo_____dbx___xX__->prepare(
                        "UPDATE news_list 
                        SET active=?
                        WHERE email='$nwsEmChk' LIMIT 1");
                    $sql_2->execute(['0']); 
                } catch (PDOException $newError) {
                    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                } 
                echo 'Sorry to see you go, hopefully you\'ll subscribe again somtime.'.$sqlc_____dbx___xX__; exit();
            } else if ($nws_ave == '0') {
                echo 'Hahaha your already unsubscribed. Would you like to subscribe again using this email? <a onclick=\"mNwsBdy1();\">yes</a> or <a href=\"#\">no</a>'.$sqlc_____dbx___xX__; exit();
            }
        } else {
            echo "It doesn't look like the email <b>$nwsEmChk</b> is subscribed to the kodoverse newsletter.<br><br>Would you like to subscribe using this email? <a onclick=\"mNwsBdy1();\">yes</a> or <a href=\"#\">no</a>".$sqlc_____dbx___xX__; exit();
        }
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }

}

else {
    header('location: '.$path_1b.'404.php?msg=Sorry There was an issue, we are working hard to fix this.').$sqlc_____dbx___xX__; exit();
}
?>