<?php 
function base_ext($sql______dbx___xX__,$___uidx__ld) {
    $path_1a = "";
    $___unme__ld = "";
    $___bext__ld = ""; 
    $___bnum__ld = "";
    $vrf_1 = "";
    $vrf_2 = "";
    if ($sql______dbx___xX__ && $___uidx__ld) { 
        try {
            if ($sql______x___xX__ = "SELECT DISTINCT u.*,uo.base_ext
                FROM users AS u
                LEFT JOIN user_options AS uo
                ON u.id = uo.uid
                WHERE u.id = '$___uidx__ld'
                LIMIT 1") {
                foreach ($sql______dbx___xX__->query($sql______x___xX__) as $roo0w____X___xX__) {
                    if(isset($roo0w____X___xX__["username"])) {$___unme__ld = $roo0w____X___xX__["username"];}
                    if(isset($roo0w____X___xX__["base_ext"])) {$___bnum__ld = $roo0w____X___xX__["base_ext"];}
                    // entry based int to prevent sql inj
                    if ($___bnum__ld === '1') {
                        $___bext__ld = "@kodoverse";
                    } if ($___bnum__ld === '2') {
                        $___bext__ld = "@kodoninja";
                    } if ($___bnum__ld === '3') {
                        $___bext__ld = "@kodospace";
                    } if ($___bnum__ld === '4') {
                        $___bext__ld = "@kodohealth";
                    } if ($___bnum__ld === '5') {
                        $___bext__ld = "@kodoacademy";
                    } if ($___bnum__ld === '6') {
                        $___bext__ld = "@kodofilms";
                    } if ($___bnum__ld === '7') {
                        $___bext__ld = "@kodotrading";
                    } if ($___bnum__ld === '8') {
                        $___bext__ld = "";
                    }
                } if(isset($roo0w____X___xX__["verified"]) >= 3) {
                    $vrf_1 = '
                    <span class="tooltip">
                        <i class="verify_md_1 dI">&#10003;</i>
                        <em class="tooltiptext" style="font-size: 14px;">verified by kodokitty</em>
                    </span>';
                } if(isset($roo0w____X___xX__["userlevel"]) >= 3) {
                    $vrf_2 = '
                    <span class="tooltip">
                        <i class="verify_md_2 dI"></i>
                        <em class="tooltiptext" style="font-size: 14px;">aviyon developer</em>
                    </span>';
                }
                return '<div class="nmeVWFLL"><a href="user.php?u='.$___unme__ld.'">@'.$___unme__ld.'</a>'.$___bext__ld.''.$vrf_1.'</div>'; 
                }
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$___uidx__ld,$_SERVER["SCRIPT_NAME"],$newError);
        }
    }	
}
?>