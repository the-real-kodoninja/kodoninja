<?php
$path_1a = '../../';
$m_path = "";
include_once(''.$path_1a.'icl/cnnc_t.php');
include_once(''.$path_1a.'icl/c_sts.php');
include_once(''.$path_1a.'icl/err/err_tkn.php');
if ($log_id <= "" || $log_username == "" && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
} else {

    $btnVt_clr1 = 'style="border-color: #000;"';
    $txt_Plc = "reply to your own reply $log_username";
    $m_path = "";

    if(isset($_POST["cid"]) && isset($_POST["aid1"]) && isset($_POST["aid2"]) && isset($_POST["aid3"]) && isset($_POST["type"]) && isset($_POST["data"]) && isset($_POST["post"])  && isset($_POST["pge"])){
        (int)$cid__x = mysqli_real_escape_string($cnnc_t, $_POST['cid']);
        (int)$cid__x = preg_replace('#[^0-9]#i', '', $cid__x);
        (int)$aid1__x = mysqli_real_escape_string($cnnc_t, $_POST['aid1']);
        (int)$aid1__x = preg_replace('#[^0-9]#i', '', $aid1__x);
        (int)$aid2__x = mysqli_real_escape_string($cnnc_t, $_POST['aid2']);
        (int)$aid2__x = preg_replace('#[^0-9]#i', '', $aid2__x);
        (int)$aid3__x = mysqli_real_escape_string($cnnc_t, $_POST['aid3']);
        (int)$aid3__x = preg_replace('#[^0-9]#i', '', $aid3__x);
        $type__x = mysqli_real_escape_string($cnnc_t, $_POST['type']);
        $type__x = preg_replace('#[^a-z]#i', '', $type__x);
        $data__x = mysqli_real_escape_string($cnnc_t, $_POST['data']);
        $post__x = mysqli_real_escape_string($cnnc_t, $_POST['post']);
        $post__x = preg_replace('#[^a-z._]#i', '', $post__x);
        $data__x = preg_replace('#[^a-z0-9._ ]#i', '', $data__x);
        $page__x = mysqli_real_escape_string($cnnc_t, $_POST['pge']);
        $page__x = preg_replace('#[^a-z]#i', '', $page__x);
        $v_cnt__x = (int)0;

        // echo "PHP output test: $cid__x | $aid1__x | $aid2__x | $aid3__x | $type__x | $data__x | $post__x | $page__x";
        //////////////////////////////////////////////////////////////////////

        if ($cid__x != "" || $aid1__x != "" || $aid2__x != "" || $aid3__x != "" || $type__x != "" || $data__x != "") {
            if ($post__x == "user_cmnt") {
                 try {
                    $sql______x___xX__1 = $sql______dbx___xX__->prepare("INSERT INTO user_post(
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
                            VALUES(:vws, 
                                :oid, 
                                :id1, 
                                :id2,
                                :id3,
                                :vct, 
                                :tpe,
                                :dta, 
                                :hde,
                                :rve,
                                :pde)");
                    $sql______x___xX__1->execute([
                                ':vws' => 0,
                                ':oid' => $cid__x,
                                ':id1' => $aid1__x,
                                ':id2' => $aid2__x,
                                ':id3' => $aid3__x,
                                ':vct' => $v_cnt__x,
                                ':tpe' => $type__x,
                                ':dta' => $data__x,
                                ':hde' => 0,
                                ':rve' => 0,
                                ':pde' => date('Y-m-d H:i:s')]);
                } catch (PDOException $newError) {
                    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                } try {
                    $sql______x___xX__1 = $sql______dbx___xX__->prepare("INSERT INTO blog_comments(
                                brid,
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
                            VALUES(:rid,
                                :vws, 
                                :oid, 
                                :id1, 
                                :id2,
                                :vct, 
                                :tpe,
                                :dta, 
                                :hde,
                                :rve,
                                :pde)");
                    $sql______x___xX__1->execute([
                                ':rid' => 0,
                                ':vws' => 0,
                                ':oid' => $cid__x,
                                ':id1' => $aid1__x,
                                ':id2' => $aid2__x,
                                ':vct' => $v_cnt__x,
                                ':tpe' => $type__x,
                                ':dta' => $data__x,
                                ':hde' => 0,
                                ':rve' => 0,
                                ':pde' => date('Y-m-d H:i:s')]);
                } catch (PDOException $newError) {
                    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                }  
            }
            if ($sql______x___xX__1) {
                // after insert do a call to get replies
                $opid__x = $cid__x;
                $rpid__x = $cid__x;
                include_once("pst_OUTPUT_view.php");
            } else {
                // create error log txt and database
                echo "mouse meow, hang on, i'm fixing the code now.";
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

        } else {
            echo "Something is empty";
        }      
    }


    
}

?>