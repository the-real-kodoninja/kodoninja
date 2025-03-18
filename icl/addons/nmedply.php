<?php 
function nme_dply($sql______dbx___xX__,$___uidx__ld) {
    $path_1a = "";
    $vrf = "";
    $xVname = "";
    $TM = "";
    $___unme__ld = "";
    $___bext__ld = ""; 
    if ($sql______dbx___xX__ && $___uidx__ld) { 
        try {
            if ($sql______x___xX__ = "SELECT DISTINCT u.*,uo.xVname
            FROM users AS u
            LEFT JOIN user_options AS uo
            ON u.id = uo.uid
            WHERE u.id = '$___uidx__ld'
            LIMIT 1") {
                foreach ($sql______dbx___xX__->query($sql______x___xX__) as $roo0w____X___xX__) {
                    if(isset($roo0w____X___xX__["username"])) {$___unme__ld = $roo0w____X___xX__["username"];}
                    if(isset($roo0w____X___xX__["fname"])) {$f_name = $roo0w____X___xX__["fname"];}
                    if(isset($roo0w____X___xX__["lname"])) {$l_name = $roo0w____X___xX__["lname"];}
                    if(isset($roo0w____X___xX__["xVname"])) {$xVname = $roo0w____X___xX__["xVname"];}
                    if(isset($roo0w____X___xX__["verified"]) && $roo0w____X___xX__["verified"] === "1") {
                        $vrf = '
                        <span class="tooltip">
                            <i class="verify_md_1 dI">&#10003;</i>
                            <em class="tooltiptext" style="font-size: 14px;">verified by kodokitty</em>
                        </span>';
                    } if ($___uidx__ld == '2') {
                        $TM = "<sup><small>TM</small></sup>";
                    } if($xVname) { // sets 1 on account creation
                        if($xVname === "1") {
                            $nmeLOAD_1 = "$___unme__ld";
                        } if($xVname === "2") {
                            $nmeLOAD_1 = "$f_name";
                        } if($xVname === "3") {
                            $nmeLOAD_1 = "$l_name";
                        } if($xVname === "4") {
                            $nmeLOAD_1 = "$f_name $l_name";
                        }
                    } else {
                        $nmeLOAD_1 = "$___unme__ld";
                    }
                } 
                // if ($page === 'user') {
                //    $vrf = ""; 
                // }
                return '<span id="st__x1_unmex"><a href="user.php?u='.$___unme__ld.'">'.$nmeLOAD_1.'</a>'.$TM.''.$vrf.'</span>';
                }
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$___uidx__ld,$_SERVER["SCRIPT_NAME"],$newError);
        }
    }	
}
?>