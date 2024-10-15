<?php
require_once("../icl/cnnc_t.php");
// This block deletes all accounts that do not activate after 30 days
$sql = "SELECT id FROM users WHERE signup<=CURRENT_DATE - INTERVAL 30 DAY AND activated='0'";
$query = mysqli_query($cnnc_t, $sql);
$numrows = mysqli_num_rows($query);
if($numrows > 0){
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	  $id = $row['id'];
	  $userFolder = "../u/$id";
	  if(is_dir($userFolder)) {
          rmdir($userFolder);
      }
	  mysqli_query($cnnc_t, "DELETE FROM users WHERE id='$id' AND activated='0' LIMIT 1");
	  mysqli_query($cnnc_t, "DELETE FROM useroptions WHERE uid='$id' LIMIT 1");
    }
}
?>