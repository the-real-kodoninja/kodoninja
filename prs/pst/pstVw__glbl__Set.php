<?php
$path_1a = '../../';
$m_path = "";

include_once(''.$path_1a.'icl/err/err_tkn.php');
include_once(''.$path_1a.'icl/cnnc_t.php');
include_once(''.$path_1a.'icl/c_sts.php');
//
if ($log_id <= "" || $log_username == "" && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
} else {

    $btnVt_clr1 = 'style="border-color: #000;"';
    $txt_Plc = "reply to your own reply $log_username";
    $m_path = "";
    $___mth__x = "";

    if(isset($_POST["post"]) && isset($_POST["type"]) && isset($_POST["cid"]) && isset($_POST["pge"])){
        $glbl___Vwcid = filter_var($_POST['cid'],FILTER_SANITIZE_NUMBER_INT);
        $glbl___Vwtype = filter_var($_POST['type'],FILTER_SANITIZE_STRING);
        $glbl___Vwpost = filter_var($_POST['post'],FILTER_SANITIZE_STRING);
        $glbl___Vwpge = filter_var($_POST['pge'],FILTER_SANITIZE_STRING);


        // echo "$glbl___Vwpost | $glbl___Vwtype | $glbl___Vwcid";
        
        // CALLED THOUGH AJAX ON EACH MENU CLICK

        //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
        //\\ Global setting preset for a,b,c, of user, user_podt, blog, forum, goal... \\//\\//\\//
        //\\ global set for all users \\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
        //\\ Empty presets //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\

        // view sets
        // t=user, p={cid} ------------------------ view.php?t=user&p=10"
        // t=blog, t=forum, t=goal & v={cid} ------ view.php?t=blog&v=10"

        $pstOpt_Xa = "";
        $pstEdt_1a = "";
        $pstEdt_2a = '<li onclick="glblPst_eVal(\''.$glbl___Vwpost.'\',\''.$glbl___Vwtype.'\',\''.$glbl___Vwcid.'\',\'hide\',\'NULL\')">hide</li>';
        $pstEdt_3a = "";
        $pstEdt_4a = "";
        $pstEdt_5a = "";
        $vTrm2 = 'v';
        $vtbl = "";
        $vcid = "";
        $vrid = "";
        $vaid3 = "";
        $glbl_aid1 = "";
        $glbl_aid2 = "";
        $glbl_aid3 = "";
        if ($log_id != "") {
            // call checks for author(s)
            if ($glbl___Vwpost === "user_post" || $glbl___Vwpost === "user_reply") {
                $vTrm1 = 'user';
                $vTrm2 = 'p';
                $vtbl = "user_post";
                $vcid = "pid";
                $vrid = "opid";
                $vaid3 = "OR u.id = vc.aid3";
            } if ($glbl___Vwpost === "forum_post" || $glbl___Vwpost === "forum_reply") {
                $___mth__x = "___f";
                $vTrm1 = 'forum';
                $vtbl = "forum_comments";
                $vcid = "fcid";
                $vrid = "frid";
            } if ($glbl___Vwpost === "blog_post" || $glbl___Vwpost === "blog_reply") {
                $___mth__x = "___b";
                $vTrm1 = 'blog';
                $vtbl = "blog_comments";
                $vcid = "bcid";
                $vrid = "brid";
            } if ($glbl___Vwpost === "goal_post" || $glbl___Vwpost === "goal_reply") {
                $___mth__x = "___g";
                $vTrm1 = 'goal';
                $vtbl = "goal_comments";
                $vcid = "gcid";
                $vrid = "grid";
            }
        
            //
            try {
                if($sqlo_____dbx___xX__->query(
                    $sqlt___x = "SELECT DISTINCT u.*,vc.*
                    FROM $vtbl AS vc 
                    INNER JOIN users AS u 
                    ON vc.$vcid = '$glbl___Vwcid'
                    WHERE u.id = vc.aid1 
                    OR u.id = vc.aid2
                    $vaid3
                    LIMIT 1")->fetchColumn()) {  
                    foreach ($sqlo_____dbx___xX__->query($sqlt___x) as $roo0w____X___xX__) {
                        $glbl_aid1 = filter_var($roo0w____X___xX__["aid1"],FILTER_SANITIZE_NUMBER_INT);
                        $glbl_aid2 = filter_var($roo0w____X___xX__["aid2"],FILTER_SANITIZE_NUMBER_INT);
                        if ($glbl___Vwpost === "user_post" || $glbl___Vwpost === "user_reply") {
                            $glbl_aid3 = filter_var($roo0w____X___xX__["aid3"],FILTER_SANITIZE_NUMBER_INT);
                        } 
                    }
                }
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }
            // developer checks
            // echo "$glbl___Vwtype | $glbl_aid1 | $glbl_aid2 | $glbl_aid3";
 
            // any user nut not seen in the view page
            // include all including replies sub post // will find master post
            if ($glbl___Vwpge != "view") {
                $pstOpt_Xa = '<li><a href="view.php?t='.$vTrm1.'&v='.$glbl___Vwcid.'">View</a></li>';
            } 
            // any user that's not original author
            if ($glbl___Vwtype === "pa" && $glbl_aid1 !== $log_id || $glbl___Vwtype === "pb" && $glbl_aid2 !== $log_id || $glbl___Vwtype === "pc" && $glbl_aid3 !== $log_id) {
                $pstEdt_3a = '<li onclick="glblPst_rPt(\''.$glbl___Vwpost.'\',\''.$glbl___Vwtype.'\',\''.$glbl___Vwcid.'\',\'report\',\'NULL\')">report</li>';
            } 
            // global set for original author
            if($glbl_aid1 === $log_id || $glbl_aid2 === $log_id || $glbl_aid3 === $log_id){
                // $pstEdt_1a = '<li onclick="">edit</li>'; // add in updates 
                $pstEdt_4a = '<li onclick="glblPst_eVal(\''.$glbl___Vwpost.'\',\''.$glbl___Vwtype.'\',\''.$glbl___Vwcid.'\',\'delete\',\'NULL\')">delete</li>';
                    // if($glbl_aid1 === $log_id) {
                        $edtCde = md5(rand(9999999999,0000000000).md5($log_HshCde));
                        $pstEdt_5a = '<li onclick="___sNookiesCookies(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$___mth__x.'\',\'___LOADX\',\''.$glbl___Vwcid.'\',\''.$edtCde.'\')">edit</li>';
                    // }
            }
            // settings output visible for basic+ users only
            echo '
            '.$pstOpt_Xa.'
            '.$pstEdt_1a.'
            '.$pstEdt_2a.'
            '.$pstEdt_3a.'
            '.$pstEdt_4a.'
            '.$pstEdt_5a.'
            ';
            echo $sqlc_____dbx___xX__; exit();
        }
    } else {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
    }
}
?>