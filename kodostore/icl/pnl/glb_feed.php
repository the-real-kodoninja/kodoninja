<?php
//if($user_ok == true){
$gFeed_list = "";
//

// correct code 
try {
	if($count_glbl = $sqlo_____db2___xX__->query($sql1_gfd = "SELECT * FROM products LIMIT 30")->fetchColumn()) {
		foreach ($sqlo_____db2___xX__->query($sql1_gfd) as $roo0w____X___xX__) {
            $gfd_pid = filter_var($roo0w____X___xX__["id"],FILTER_SANITIZE_NUMBER_INT);
			$gfd_nme = filter_var($roo0w____X___xX__["name"],FILTER_SANITIZE_STRING);
			// $gfd_qty = filter_var($roo0w____X___xX__["quantity"],FILTER_SANITIZE_NUMBER_INT);
			$gfd_pr1 = filter_var($roo0w____X___xX__["price_1"],FILTER_SANITIZE_NUMBER_FLOAT);
			$gfd_pr2 = filter_var($roo0w____X___xX__["price_2"],FILTER_SANITIZE_NUMBER_FLOAT);
			$gfd_avt = preg_match("/\.(gif|jpg|jpeg|png)$/i", filter_var($roo0w____X___xX__["avatar"],FILTER_DEFAULT));
			// $gfd_cde = filter_var($roo0w____X___xX__["code"],FILTER_DEFAULT);
			$gfd_des = filter_var($roo0w____X___xX__["description"],FILTER_DEFAULT);
			$gfd_dte = timeAgo(strtotime(filter_var($roo0w____X___xX__["date"]),FILTER_DEFAULT));
                // totsl cart items
			//
			$gFeed_list .= '
			<li style="padding:5px 0px;">
				product added 
				<b><a href="product.php?p='.$gfd_pid.'">'.$gfd_nme.'</a></b>
				<span>'.$gfd_dte.'</span>
			</li>
			';
		} 
	} else {
		$gFeed_list = "<li>Looks like theres nothing going on :(</li>";
	}
} catch (PDOException $newError) {
	newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}
?>