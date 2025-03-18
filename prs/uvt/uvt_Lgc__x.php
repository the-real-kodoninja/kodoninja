<?php
$path_1a = '../../';
$m_path = "";
include_once(''.$path_1a.'icl/err/err_tkn.php');
include_once(''.$path_1a.'icl/cnnc_t.php');
include_once(''.$path_1a.'icl/c_sts.php');

if (!(int)$log_id || !$log_username && !$user_ok) {
    // don't error log, you just need to have a account to like post
    die("sorry you need to be at least a basic+ memmber to up or down vote... ... meow".$sqlc_____dbx___xX__);
}

$or_lgc = "";

if(isset($_POST["cid"]) && isset($_POST["uid"]) && isset($_POST["v_type"]) && isset($_POST["c_typeA"]) && isset($_POST["c_typeB"])){
    $cid__x = filter_var(preg_replace('#[^0-9]#i', '', $_POST['cid']),FILTER_SANITIZE_NUMBER_INT);
    $uid__x = filter_var(preg_replace('#[^0-9]#i', '', $_POST['uid']),FILTER_SANITIZE_NUMBER_INT);
    $v_type__x = filter_var(preg_replace('#[^a-z0-9]#i', '', $_POST['v_type']),FILTER_DEFAULT);
    $c_typeA__x = filter_var(preg_replace('#[^a-z0-9]#i', '', $_POST['c_typeA']),FILTER_DEFAULT);
    $c_typeB__x = filter_var(preg_replace('#[^a-z0-9]#i', '', $_POST['c_typeB']),FILTER_DEFAULT);

// echo "test 1: $cid__x $uid__x $v_type__x $c_typeA__x $c_typeB__x";

    if ($c_typeA__x == "blogp") {
        $c_tA1__x = 'blog';
        $c_tA2__x = 'blog_upvote';
        $c2_a = 'b';
        $c2_b = 'bv';
        $id_uNq = "bid";
    } if ($c_typeA__x == "forump") {
        $c_tA1__x = 'forum';
        $c_tA2__x = 'forum_upvote';
        $c2_a = 'f';
        $c2_b = 'fv';
        $id_uNq = "fid";
    } if ($c_typeA__x == "goalp") {
        $c_tA1__x = 'goal';
        $c_tA2__x = 'goal_upvote';
        $c2_a = 'g';
        $c2_b = 'gv';
        $id_uNq = "gid";
    } 
    // unique logic
    if ($c_typeA__x == "userp") {
        $c_tA1__x = 'user_post';
        $c_tA2__x = 'user_upvote';
        $c2_a = 'up';
        $c2_b = 'uv';
        $id_uNq = "pid";
    } 

    if ($v_type__x == "cup") {
        $vNum1 = 1; 
        $vNum2 = 0; 
        $vMsg = "up vote";
    } else if ($v_type__x == "cdn") {
        $vNum1 = 0; 
        $vNum2 = 1; 
        $vMsg = "down vote";
    }

    // grabs current count to be manipulated
    // do not send through ajax // nor any current outputs 
        if($sqlo_____dbx___xX__->query(
        $sql__x = "SELECT DISTINCT $c2_a.*,$c2_b.* 
            FROM $c_tA1__x AS $c2_a 
            INNER JOIN $c_tA2__x AS $c2_b 
            WHERE $c2_b.cid = '$cid__x'
            AND $c2_a.$id_uNq = '$cid__x'
            AND $c2_b.uid = '$log_id' 
            LIMIT 1")->fetchColumn()) {     
        foreach ($sqlo_____dbx___xX__->query($sql__x) as $roo0w____X___xX__) {
            (int)$uVt_up = filter_var(preg_replace('#[^01]#i', '', $roo0w____X___xX__['up_vote'])); 
            (int)$uVt_dn = filter_var(preg_replace('#[^01]#i', '', $roo0w____X___xX__['dn_vote'])); 
            (int)$c_cUr_v_count = filter_var(preg_replace('#[^0-9]#i', '', $roo0w____X___xX__['v_count'])); 
        }
        if ($uVt_up == '1' && $uVt_dn == "0") {
            if ($v_type__x == "cup") { 
                echo "aleady up'd this vote.";
                exit();
            } else if ($v_type__x == "cdn") { 
                $c_nEw_v_count = (int)$c_cUr_v_count - (int)1;
                // overall post content update
                try {
                    //
                    $sql__st_NXW_X1 = $sqlo_____dbx___xX__->prepare(
                        "UPDATE $c_tA1__x 
                        SET v_count = ? 
                        WHERE $id_uNq ='$cid__x' 
                        LIMIT 1");
                    $sql__st_NXW_X1->execute([$c_nEw_v_count]); 
                    //
                    $sql__st_NXW_X2 = $sqlo_____dbx___xX__->prepare(
                        "UPDATE $c_tA2__x 
                        SET up_vote = ? 
                        AND dn_vote = ? 
                        WHERE cid ='$cid__x' 
                        AND uid = '$log_id' 
                        LIMIT 1");
                    $sql__st_NXW_X2->execute([0,1]); 
                } catch (PDOException $newError) {
                    die("could not vote meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
                }
            }

        } else if ($uVt_up == '0' && $uVt_dn == "1") {
            if ($v_type__x == "cup") { 
                $c_nEw_v_count = (int)$c_cUr_v_count - (int)1;
                // overall post content update
                try {
                    //
                    $sql__st_NXW_X3 = $sqlo_____dbx___xX__->prepare(
                        "UPDATE $c_tA1__x 
                        SET v_count = ? 
                        WHERE $id_uNq ='$cid__x' 
                        LIMIT 1");
                    $sql__st_NXW_X3->execute([$c_nEw_v_count]); 
                    //
                    $sql__st_NXW_X4 = $sqlo_____dbx___xX__->prepare(
                        "UPDATE $c_tA2__x 
                        SET up_vote = ? 
                        AND dn_vote = ? 
                        WHERE cid ='$cid__x' 
                        AND uid = '$log_id' 
                        LIMIT 1");
                    $sql__st_NXW_X4->execute([1,0]); 
                } catch (PDOException $newError) {
                    die("could not vote meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
                }
            } else if ($v_type__x == "cdn") { 
                echo "aleady dn'd this vote.";
                exit();
            }
        }

        echo "meooowww. you can only $vMsg once for this post";
    } else {
        $c_cUr_v_count = 0;
        if ($c_typeB__x == "cntp") {
            $cnt_type = "cnt_p";
        } if ($c_typeB__x == "cntr") {
            $cnt_type = "cnt_r";
        }    
    
        // logic just updates count
        if ($v_type__x == "cup") {
            $c_nEw_v_count = (int)$c_cUr_v_count + (int)1;
            $vt_Up = 1;
            $vt_Dn = 0;
            $sql__st_NXW_X5 = $sqlo_____dbx___xX__->prepare(
                "UPDATE $c_tA1__x 
                SET v_count = ? 
                WHERE $id_uNq ='$cid__x' 
                LIMIT 1");
            $sql__st_NXW_X5->execute([$c_nEw_v_count]); 
        } else if ($v_type__x == "cdn") {
            $c_nEw_v_count = (int)$c_cUr_v_count - (int)1;
            $vt_Up = 0;
            $vt_Dn = 1;
            $sql__st_NXW_X6 = $sqlo_____dbx___xX__->prepare(
                "UPDATE $c_tA1__x 
                SET v_count = ? 
                WHERE $id_uNq ='$cid__x' 
                LIMIT 1");
            $sql__st_NXW_X6->execute([$c_nEw_v_count]); 
        }

        // echo "
        // _________________________________
        // |Developer sql_2x test           |
        // _________________________________
        // |Insert database: $c_tA2__x    |
        // |cid: $cid__x                         |
        // |uid: $uid__x                          |
        // |c_type: $cnt_type                   |
        // |up_vote: $vt_Up                      |
        // |dn_vote: $vt_Dn                      |
        // |v_count: $c_nEw_v_count                     |
        // _________________________________
        // ";
    
        // row inject only if user was never added to the upvote database
        // just logs current upvote logic
        try { 
            $sql__st_NXW_X1b = $sqlo_____dbx___xX__->prepare("INSERT INTO $c_tA2__x(
                cid,
                uid,
                c_type, 
                up_vote,
                dn_vote, 
                v_count, 
                date) 
                VALUES(
                :____INST____01,
                :____INST____02,
                :____INST____03,
                :____INST____04,
                :____INST____05,
                :____INST____06,
                :____INST____07)");
            $sql__st_NXW_X1b->execute([
                ':____INST____01' => $cid__x,
                ':____INST____02' => $uid__x,
                ':____INST____03' => $cnt_type,
                ':____INST____04' => $vt_Up,
                ':____INST____05' => $vt_Dn,
                ':____INST____06' => $c_nEw_v_count,
                ':____INST____07' => date('Y-m-d H:i:s')]);
        } catch (PDOException $newError) {
            die("could not post meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
        }         
    } 
    
}

?>