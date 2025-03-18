<?php 
$dwnLd_1a = "";
$dwnLd_1b = "";
$dwnLd_3b = "";

try {
    if($count_uvt = $sqlo_____dbx___xX__->query(
        $sql = "SELECT DISTINCT format, c_type, price FROM downloads")->fetchColumn()) {
            foreach ($sql______dbx___xX__->query($sql) as $roo0w____X___xX__) {
    $dwnLd_1 = $roo0w____X___xX__["format"];
    $dwnLd_2 = $roo0w____X___xX__["c_type"];
    $dwnLd_3 = $roo0w____X___xX__["price"];

    $dwnLd_1a .= '
    <li>'.$dwnLd_1.'
        <input id="dwLd_1a" class="dwLd_cHk" type="checkbox" value="'.$dwnLd_1.'" checked/>
        <i></i>
    </li>
    ';

    $dwnLd_1b .= '
    <li>'.$dwnLd_2.'
        <input id="dwLd_2a" class="dwLd_cHk" type="checkbox" value="'.$dwnLd_2.'" checked/>
        <i></i>
    </li>
    ';
    }

    // price grab from .this call
    $dwnLd_3b .= '
        <output id="dwLd_3a">0</output>
        <input class="dwLd_cHk" type="range" value="0" min="0" max="12" oninput="dwLd_3a.value = this.value"/>
        <var>Free</var>
        <var>$12</var>
    ';
} else {
    $dwnLd_1b .= '
    <li>Sorry no results</li>
    ';
}

$dwnLd_x = '
<ul id="dwnLd_x" class="dN">
    <li>Format
        <ul>
            '.$dwnLd_1a.'
        </ul>
    </li>
    <li>Type
        <ul>
            '.$dwnLd_1b.'
        </ul>
    </li>
    <li>Price
        '.$dwnLd_3b.'
    </li>
</ul>
';

?>


<?php
// stlye check/radio befpre push
$fltrModX = '
<div class="bHdr-NavWpr dB">
    <ul class="bHdr-Nav">
        <li>
            <span id="dwnld_vTxt">
            Filter Results
                <i id="sch_dn1">+</i>
                <i id="sch_dn2">-</i>
                '.$dwnLd_x.'
            </span>
            <input id="dbS_2" name="s" type="search" autocomplete="off" onKeyUp="dbSm_2(this.value)" placeholder="Searching downloads"/>
        </li>
    </ul>
</div>
';
} catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}
?>

