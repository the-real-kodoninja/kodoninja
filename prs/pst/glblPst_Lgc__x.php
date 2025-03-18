<?php
$path_1a = '../../';
$m_path = "";
include_once(''.$path_1a.'icl/err/err_tkn.php');
include_once(''.$path_1a.'icl/cnnc_t.php');
include_once(''.$path_1a.'icl/c_sts.php');

if (!(int)$log_id || !$log_username && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
} else {

    $btnVt_clr1 = 'style="border-color: #000;"';
    $txt_Plc = "reply to your own reply $log_username";
    $m_path = "";
    //
    // msg button click
    // 5 post return call
    if(isset($_POST["opid"]) && isset($_POST["rpid"]) && isset($_POST["type"]) && isset($_POST["post"]) && isset($_POST["pge"])){
        $opid__x = filter_var($_POST['opid'],FILTER_SANITIZE_NUMBER_INT);
        $rpid__x = filter_var($_POST['rpid'],FILTER_SANITIZE_NUMBER_INT);
        $type__x = filter_var($_POST['type'],FILTER_SANITIZE_STRING);
        $post__x = filter_var($_POST['post'],FILTER_SANITIZE_STRING);
        $page__x = filter_var($_POST['pge'],FILTER_SANITIZE_STRING);
        //
        include_once("pst_OUTPUT_view.php");
    }
    // new post insert 
    // 1 post return call
    if(isset($_POST["cid"]) && 
        isset($_POST["aid1"]) && 
        isset($_POST["aid2"]) && 
        isset($_POST["aid3"]) && 
        isset($_POST["type"]) && 
        isset($_POST["data"]) && 
        isset($_POST["post"]) && 
        isset($_POST["pge"])){
        $cid__x = filter_var($_POST['cid'],FILTER_SANITIZE_NUMBER_INT);
        $aid1__x = filter_var($_POST['aid1'],FILTER_SANITIZE_NUMBER_INT);
        $aid2__x = filter_var($_POST['aid2'],FILTER_SANITIZE_NUMBER_INT);
        $aid3__x = filter_var($_POST['aid3'],FILTER_SANITIZE_NUMBER_INT);
        $data__x = filter_var($_POST['data'],FILTER_DEFAULT);
        $type__x = filter_var($_POST['type'],FILTER_SANITIZE_STRING);
        $post__x = filter_var($_POST['post'],FILTER_SANITIZE_STRING);
        $page__x = filter_var($_POST['pge'],FILTER_SANITIZE_STRING);
        $v_cnt__x = (int)0;

        // echo "PHP output test: $cid__x | $aid1__x | $aid2__x | $aid3__x | $type__x | $data__x | $post__x | $page__x";
        //////////////////////////////////////////////////////////////////////

        if ($cid__x != "" || $aid1__x != "" || $aid2__x != "" || $aid3__x != "" || $type__x != "" || $data__x != "") {
            if ($post__x === "user_cmnt") {
                $___glbl___sql______x___xX__1 = $sqlo_____dbx___xX__->prepare("INSERT INTO user_post(
                    views,
                    opid, 
                    aid1, 
                    aid2,
                    aid3,
                    v_count, 
                    type,
                    data, 
                    hide,
                    remove,
                    postdate) 
                VALUES(
                    :____INST____01,
                    :____INST____02,
                    :____INST____03,
                    :____INST____04,
                    :____INST____05,
                    :____INST____06,
                    :____INST____07,
                    :____INST____08,
                    :____INST____09,
                    :____INST____10,
                    :____INST____11)");
                $___glbl___sql______x___xX__1->execute([
                    ':____INST____01' => 0,
                    ':____INST____02' => $cid__x,
                    ':____INST____03' => $aid1__x,
                    ':____INST____04' => $aid2__x,
                    ':____INST____05' => $aid3__x,
                    ':____INST____06' => $v_cnt__x,
                    ':____INST____07' => $type__x,
                    ':____INST____08' => $data__x,
                    ':____INST____09' => 0,
                    ':____INST____10' => 0,
                    ':____INST____11' => date('Y-m-d H:i:s')]);
            }
  
        } if ($post__x !== "user_cmnt" && $post__x === "blog_cmnt" || $post__x === "forum_cmnt" || $post__x === "goal_cmnt") {
            if ($post__x === "blog_cmnt") {
                $newIns = "blog_comments";
                $newcId = "brid";
            } else if ($post__x === "forum_cmnt") {
                $newIns = "forum_comments";
                $newcId = "frid";
            } else if ($post__x === "goal_cmnt") {
                $newIns = "goal_comments";
                $newcId = "grid";
            }
            $___glbl___sql______x___xX__2 = $sqlo_____dbx___xX__->prepare("INSERT INTO $newIns(
                $newcId,
                views,
                opid, 
                aid1, 
                aid2,
                v_count, 
                type,
                data, 
                hide,
                remove,
                postdate) 
            VALUES(
                :____INST____01,
                :____INST____02,
                :____INST____03,
                :____INST____04,
                :____INST____05,
                :____INST____06,
                :____INST____07,
                :____INST____08,
                :____INST____09,
                :____INST____10,
                :____INST____11)");
            $___glbl___sql______x___xX__2->execute([
                ':____INST____01' => 0,
                ':____INST____02' => 0,
                ':____INST____03' => $cid__x,
                ':____INST____04' => $aid1__x,
                ':____INST____05' => $aid2__x,
                ':____INST____06' => 0,
                ':____INST____07' => $type__x,
                ':____INST____08' => $data__x,
                ':____INST____09' => 0,
                ':____INST____10' => 0,
                ':____INST____11' => date('Y-m-d H:i:s')]);

        }
        if ($___glbl___sql______x___xX__2) {
            // after insert do a call to get replies
            $opid__x = $cid__x;
            $rpid__x = $cid__x;
            include_once("pst_OUTPUT_view.php");
        } else {
            // create error log txt and database
            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],"mouse meow, hang on, i'm fixing the code now.");
            // developer error testing
            // keep commented
            // echo "SQL insert failure: As usual meow, not inserting <br>
            //  opid: $cid__x <br>
            //  aid1: $aid1__x <br>
            //  aid2: $aid2__x <br>
            //  aid2: $aid3__x <br>
            //  v_count: $v_cnt__x <br>
            //  type: $type__x <br>
            //  data: $data__x <br>
            //  date: -- <br>
            //  error 1: $sql_1x <br>
            //  error 2: ".mysqli_error($cnnc_t);
        }
    } else return;   
}
?>