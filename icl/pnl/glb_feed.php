<?php
$path_1b = "";
$gFeed_list = "";
$glbFd1_id = "";
$glbFd1_tpe = "";
$glbFd1_ttl = "";
$glbFd1_nme = "";
$glbFd1_lnk = "";
//

// correct code 
try {
	if($sqlo_____dbx___xX__->query(
		$sql1_gfd = "SELECT u.*,up.*,b.*,f.*,g.* 
		FROM users AS u
		LEFT JOIN user_post AS up on up.aid1 = u.id
		AND up.aid2 = u.id AND up.aid3 = u.id
		LEFT JOIN blog AS b on b.uid = u.id
		LEFT JOIN forum AS f ON f.uid = u.id
		LEFT JOIN goal AS g on g.uid = u.id
		LIMIT 30")->fetchColumn()) {
		if($numRow_sql1 = $sql______dbx___xX__->query($sql1_gfd)->fetchColumn()){
			foreach ($sql______dbx___xX__->query($sql1_gfd) as $roo0w____X___xX__) {
				if ($roo0w____X___xX__["pid"]) {
					$glb_upc_pid = $roo0w____X___xX__["pid"];
					$glb_upc_ttl = $roo0w____X___xX__["data"];
					$glb_upc_tpe = "user";
					// aid will link to user
					$glb_upc_nme = $roo0w____X___xX__["username"];
					$glb_upc_lnk = 'view.php?t='.$glb_upc_tpe.'&v='.$glb_upc_pid.'';
					$glb_upc_dte = timeAgo(strtotime($roo0w____X___xX__["postdate"])); 
					$gFeed_list .= '
					<li id="glbl_itm_'.$glb_upc_pid.'" style="padding:5px 0px;">
						<a href="user.php?u='.$glb_upc_nme.'">'.$glb_upc_nme.'</a> posted a '.$glb_upc_tpe.' post 
						<b><a href="'.$glb_upc_lnk.'" style="color:#fff;">'.$glb_upc_ttl.'</a></b>
						<span>'.$glb_upc_dte.'</span>
					</li>
					';
				} else if ($roo0w____X___xX__["bid"]) {
					$glb_blg_pid = $roo0w____X___xX__["bid"];
					$glb_blg_ttl = $roo0w____X___xX__["data"];
					$glb_blg_tpe = "blog";
					// aid will link to user
					$glb_blg_nme = $roo0w____X___xX__["username"];
					$glb_blg_lnk = 'view.php?t='.$glb_blg_tpe.'&v='.$glb_blg_pid.'';
					$glb_blg_dte = timeAgo(strtotime($roo0w____X___xX__["date"])); 
					$gFeed_list .= '
					<li id="glbl_itm_'.$glb_blg_pid.'" style="padding:5px 0px;">
						<a href="user.php?u='.$glb_blg_nme.'">'.$glb_blg_nme.'</a> posted a '.$glb_blg_tpe.' post 
						<b><a href="'.$glb_blg_lnk.'" style="color:#fff;">'.$glb_blg_ttl.'</a></b>
						<span>'.$glb_blg_dte.'</span>
					</li>
					';
				} else if ($roo0w____X___xX__["fid"]) {
					$glb_frm_pid = $roo0w____X___xX__["fid"];
					$glb_frm_ttl = $roo0w____X___xX__["data"];
					$glb_frm_tpe = "blog";
					// aid will link to user
					$glb_frm_nme = $roo0w____X___xX__["username"];
					$glb_frm_lnk = 'view.php?t='.$glb_frm_tpe.'&v='.$glb_frm_pid.'';
					$glb_frm_dte = timeAgo(strtotime($roo0w____X___xX__["date"])); 
					$gFeed_list .= '
					<li id="glbl_itm_'.$glb_frm_pid.'" style="padding:5px 0px;">
						<a href="user.php?u='.$glb_frm_nme.'">'.$glb_frm_nme.'</a> posted a '.$glb_frm_tpe.' post 
						<b><a href="'.$glb_frm_lnk.'" style="color:#fff;">'.$glb_frm_ttl.'</a></b>
						<span>'.$glb_frm_dte.'</span>
					</li>
					';
				} else if ($roo0w____X___xX__["gid"]) {
					$glb_gol_pid = $roo0w____X___xX__["gid"];
					$glb_gol_ttl = $roo0w____X___xX__["data"];
					$glb_gol_tpe = "blog";
					// aid will link to user
					$glb_gol_nme = $roo0w____X___xX__["username"];
					$glb_gol_lnk = 'view.php?t='.$glb_gol_tpe.'&v='.$glb_gol_pid.'';
					$glb_gol_dte = timeAgo(strtotime($roo0w____X___xX__["date"])); 
					$gFeed_list .= '
					<li id="glbl_itm_'.$glb_gol_pid.'" style="padding:5px 0px;">
						<a href="user.php?u='.$glb_gol_nme.'">'.$glb_gol_nme.'</a> posted a '.$glb_gol_tpe.' post 
						<b><a href="'.$glb_gol_lnk.'" style="color:#fff;">'.$glb_gol_ttl.'</a></b>
						<span>'.$glb_gol_dte.'</span>
					</li>
					';
				}	
			}
		} 
	}
} catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}
?>