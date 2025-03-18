<?php
$path_1a = '../../';
$m_path = "";
include_once(''.$path_1a.'icl/err/err_tkn.php');
include_once(''.$path_1a.'icl/cnnc_t.php');
include_once(''.$path_1a.'icl/c_sts.php');
if ($log_id <= "" || $log_username == "" && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
} else {
//uid,cde,type
if(isset($_POST["uid"]) && isset($_POST["cde"]) && isset($_POST["type"]) && isset($_POST["ncde"])){
    $uid__x = filter_var($_POST['uid'],FILTER_SANITIZE_NUMBER_INT);
    $cde__x = filter_var($_POST['cde'],FILTER_DEFAULT);
    $ncde__x = filter_var($_POST['ncde'],FILTER_DEFAULT);
    $type__x = filter_var($_POST['type'],FILTER_SANITIZE_STRING);
    $data__x = filter_var($_POST['data'],FILTER_DEFAULT);
}
    // NOTE fix hash reload
    if ($uid__x === $log_id && $log_HshCde_x === $log_HshCde_y) {
        // generate new post hash
        $str_cde = substr($cde__x, 15, 5);
        $new_cde = hash('gost', $str_cde);
        $new_cde = substr($new_cde, 0, 5);
        if ($type__x == "xa") {
            echo '
            <li onclick="addPstBtn(\''.$log_id.'\',\''.$log_HshCde.'\',\'xx\',\''.$new_cde.'\')">user post</li>
            <a href="post.php?t=blog">
                <li>blog post</li>
            </a>
            <a href="post.php?t=forum">
                <li>forum post</li>
            </a>
            <a href="post.php?t=goal">
                <li>goal post</li>
            </a>
            ';
        } else if ($type__x == "xz" && $uid__x === $log_id && $log_HshCde_x === $log_HshCde_y) { 
            // all (true check) conditions met until this point
            // ready to be posted
            // V4 UPDATES COMPILE/COMPRESS ALL INSERTS TO ONE INSERT LOGIC
            $sql_1x = $sqlo_____dbx___xX__->prepare("INSERT INTO user_post(
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
                $sql_1x->execute([
                    ':____INST____01' => 0,
                    ':____INST____02' => 0,
                    ':____INST____03' => $uid__x,
                    ':____INST____04' => 0,
                    ':____INST____05' => 0,
                    ':____INST____06' => 0,
                    ':____INST____07' => 'a',
                    ':____INST____08' => $data__x,
                    ':____INST____09' => 0,
                    ':____INST____10' => 0,
                    ':____INST____11' => date('Y-m-d H:i:s')]);
            if ($sql_1x) {
                echo "Meow meow your post has been posted!.";
                echo $sqlc_____dbx___xX__; exit();
                // new echo if on (user page)
                // $opid__x = $cid__x;
                // $rpid__x = $cid__x;
                // V4 updates have posted to adjcent Vanilla on load out
                // include_once("pst_OUTPUT_view.php");
            } else {
                die($newError = "orry there was an error, meow.".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
            }
        } else {
            die($newError = "orry there was an error, meow.".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
        }
    }
}
?>