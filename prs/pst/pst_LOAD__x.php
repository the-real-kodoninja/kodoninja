<?php
$path_1a = '../../';
$m_path = "";
include_once(''.$path_1a.'icl/err/err_tkn.php');
include_once(''.$path_1a.'icl/addons/time_system.php');
include_once(''.$path_1a.'icl/cnnc_t.php');
include_once(''.$path_1a.'icl/c_sts.php');
if ($log_id <= "" || $log_username == "" && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
} else {
    if (isset($_POST['uid']) &&
        isset($_POST['cde']) &&
        isset($_POST['mth']) &&
        isset($_POST['sid']) &&
        isset($_POST['pth'])) { 
        //
        $load__uid__x = filter_var($_POST['uid'],FILTER_SANITIZE_NUMBER_INT);
        $load__cde__x = filter_var($_POST['cde'],FILTER_DEFAULT);
        $load__sid__x = filter_var(preg_replace('#[^NULL]#i', '', $_POST['sid']),FILTER_DEFAULT);
        //
        if ($load__uid__x === $log_id && $log_HshCde_x === $log_HshCde_y && $_POST['mth'] !== "___b" || $_POST['mth'] !== "___f" || $_POST['mth'] !== "___g") {
            $___mth__x = filter_var(preg_replace('#[^mthbfg_]#i', '', $_POST['mth']),FILTER_SANITIZE_STRING);
            $___LOAD__y = filter_var(preg_replace('#[^LOADEDIT_]#i', '', $_POST['pth']),FILTER_SANITIZE_STRING);

            // for TESTING purposes only START
            // echo '
            // <div>
            //     <b>PHP: Error testing and POST value grab TESTING</b><br><hr>
            //     <b>post format:</b> '.$___mth__x.'<br>
            //     <b>post path:</b> '.$___LOAD__y.'<br>
            //     <b>post code:</b> '.$load__cde__x.'<br>
            //     <b>post sid:</b> '.$load__sid__x.'<br>
            // </div>';
            // exit();
            // for TESTING purposes only END

            // DEVELOPER NOTE -- saved post are just post that aren't visible
            // -- instead of creating a content_save table that mimics post, use the same id mark hidden = 1 OR save = 1, any new updates to blog,goal,forum, will show in former saved post
            // -- in future/ may migrate hidden post to a save table
            // -- user can lookup all "saved post" by uid to continue to edit until posted for visibilty.
            // -- save cloud button just post as normal with (hidden = 1 AND OR save = 1) 
            // -- once posted that cid is now visible (hidden = 0 AND OR save = 0)
            // -- LINKS to post on click post.php?t=EXAMPLE&cid=CONTENTBYID
            // -- if($user_ok && $log_id === $uid || $log_lvl >= 3)
            // -- loads content into all editable fields
            // -- if ($log_lvl >= 3 && $log_id !== $uid) // buttons approve or deny
            // -- can add notes
            // -- after load on edit save or post with same id

            // quick notes 
            // insert into notifications if blog // any user level 3 or higher will be notified and can approve post and modify
            // -- insert link in note_app notifications pack to post id 
            // -- if level >= 3 users can approve and modify
            // insert into token_log // award 50 kodotokens  

            if ($___mth__x === "___b") {
                $___mth__y = "blog";
                $___mth_y1 = "bid";
            } if ($___mth__x === "___f") {
                $___mth__y = "forum";
                $___mth_y1 = "fid";
            } if ($___mth__x === "___g") {
                $___mth__y = "goal";
                $___mth_y1 = "gid";
            }

            $___LOAD__trm = "";
            if ($___LOAD__y === "___LOAD") {
                $___ldType = "saves";
                $___ldType2 = "saved";
                $___LOAD__trm = "
                AND hide = '1'
                AND save = '1'
                "; 
            } if ($___LOAD__y === "___EDIT") {
                $___ldType = "published";
                $___ldType2 = "published";
                $___LOAD__trm = "
                AND hide = '0'
                AND save = '0'
                "; 
            }

            $MAX = 50;
            $__load_sql = "";
            try {
                if($load_cnt_vc = $sqlo_____dbx___xX__->query(
                    $load_sql__1 = "SELECT * 
                    FROM $___mth__y
                    WHERE uid = '$log_id'
                    $___LOAD__trm
                    AND remove = '0'
                    ORDER BY date DESC LIMIT $MAX")->fetchColumn()) {
                    foreach ($sqlo_____dbx___xX__->query($load_sql__1) as $roo0w____X___xX__) {
                        $uid_vc = $roo0w____X___xX__["uid"];
                        $id_vc = $roo0w____X___xX__[$___mth_y1];
                        $t_vc = $roo0w____X___xX__["title"];
                        $date_vc = timeAgo(strtotime($roo0w____X___xX__["date"]));
                        $edtCde = md5(rand(9999999999,0000000000).md5($log_HshCde));
                        
                        $__load_sql .= '
                        <div title="load '.$t_vc.'" class="cP clr-r" style="margin: 0px 0px 15px;" onclick="___sNookiesCookies(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$___mth__x.'\',\'___LOADX\',\''.$id_vc.'\',\''.$edtCde.'\')">
                            <span>'.$t_vc.'</span>
                            <span class="fR">'.$date_vc.'</span>
                        </div>
                        ';
                    }
                    echo '
                    <div style="margin: 0px 0px 10px;"><b>'.$load_cnt_vc.'</b> total '.$___ldType.' under '.$___mth__y.'\'s</div>
                    '.$__load_sql.'
                    ';
                } else {
                    echo "<div>You have nothing $___ldType2 under $___mth__y's $log_username</div>".$sqlc_____dbx___xX__; exit();
                }
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }
        } else {
            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
        }
    } else {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
    }
} 
?>
