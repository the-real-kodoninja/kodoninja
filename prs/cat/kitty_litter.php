<?php
$path_1a = '../';
$path_1b = '../../';
include_once(''.$path_1b.'icl/err/err_tkn.php');
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
include_once(''.$path_1b.'prs/time_system.php');

$cLi = "";
$i = 0;
if ($log_id == "" && $user_ok == false) {
    header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned.").$sqlc_____dbx___xX__; exit();
} else {
    if(isset($_REQUEST["t"]) && isset($_REQUEST["c"]) && isset($_REQUEST["m"])){
        //
        $t = filter_var(preg_replace('#[^a-z]#i', '', $_REQUEST['t']), FILTER_SANITIZE_STRING);
        $c = filter_var(preg_replace('#[^a-z]#i', '', $_REQUEST['c']), FILTER_SANITIZE_STRING);
        $m = filter_var(preg_replace('#[^post]#i', '', $_REQUEST['m']), FILTER_SANITIZE_STRING);
        // echo "do i make it here meow ($t | $c | $m)";
        //
        try {
            if($sqlo_____dbx___xX__->query(
                $sql_X_1 = "SELECT DISTINCT u.*,t.* 
                FROM users AS u 
                INNER JOIN $t AS t 
                WHERE u.id = t.uid 
                AND t.category LIKE '%$c%'
                ORDER BY t.date DESC LIMIT 5")->fetchColumn()) {  
                foreach ($sqlo_____dbx___xX__->query($sql_X_1) as $roo0w____X___xX__) {
                    // users
                    $cLi .= '<li>'.filter_var($roo0w____X___xX__["category"],FILTER_DEFAULT).'</li>'; 
                } 
                echo $cLi.$sqlc_____dbx___xX__; exit();
            }
        } catch (PDOException $newError) {
            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
        }
    } else {
        echo $sqlc_____dbx___xX__; exit();
    }
}
?>