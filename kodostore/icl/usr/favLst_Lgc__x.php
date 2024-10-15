<?php	
$fav_pid = "";
$num____1 = 0;
$fav_lix = "";
$usrFavLi = "";
$usrFavLst = "";
$prdLstFULL = "";

// if ($user_ok == true && $log_id >= 1 && $log_HshCde == $_SESSION["globlCode"]) {
try {
    if($sqlo_____db2___xX__->query(
        $sql____1 = "SELECT * FROM favorites WHERE uid = '$log_id' ORDER BY date DESC LIMIT 15")->fetchColumn()) {
        foreach ($sqlo_____db2___xX__->query($sql____1) as $roo0w____X___xX__) {
            $fav_id = filter_var($roo0w____X___xX__["id"],FILTER_SANITIZE_NUMBER_INT);
            $fav_pid = filter_var($roo0w____X___xX__["pid"],FILTER_SANITIZE_NUMBER_INT);
            $fav_dte = timeAgo(strtotime($roo0w____X___xX__["date"]));
        }
    } 
}catch (PDOException $newError) {
    newError($sqlo_____db2___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}
// }


//
$fav_lix = '
<li>
    <span onclick="usrLstPnl(\''.$log_id.'\',\''.$fav_pid.'\',\'fav\',\''.$log_HshCde.'\')">('.$num____1.') item(s) in favorites</span>
</li>';
$favLstFULL = "$fav_lix";
?>