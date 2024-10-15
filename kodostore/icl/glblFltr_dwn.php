<?php 
$gFltr_1 = "";
$gFltr_2 = "";
$gFltr_1a = "";
$gFltr_1b = "";
$gFltr_3b = "";
try {
    if($count_prd = $sqlo_____db2___xX__->query(
        $sql____1 = "SELECT *
        FROM products
        ORDER BY date DESC LIMIT 30")->fetchColumn()) {
        foreach ($sqlo_____db2___xX__->query($sql____1) as $roo0w____X___xX__) {
        $gFltr_pid = filter_var($roo0w____X___xX__["id"],FILTER_SANITIZE_NUMBER_INT);
        $gFltr_nme = filter_var($roo0w____X___xX__["name"],FILTER_SANITIZE_STRING);
        $gFltr_pr1 = filter_var($roo0w____X___xX__["price_1"],FILTER_SANITIZE_NUMBER_FLOAT);
        $gFltr_pr2 = filter_var($roo0w____X___xX__["price_2"],FILTER_SANITIZE_NUMBER_FLOAT);
        $gFltr_avt = preg_match("/\.(gif|jpg|jpeg|png)$/i", filter_var($roo0w____X___xX__["avatar"],FILTER_DEFAULT));
        // $gFltr_cde = filter_var($roo0w____X___xX__["code"],FILTER_DEFAULT);
        $gFltr_des = filter_var($roo0w____X___xX__["description"],FILTER_DEFAULT);
        $gFltr_dte = timeAgo(strtotime(filter_var($roo0w____X___xX__["date"]),FILTER_DEFAULT));
        //
        $gFltr_1a .= '
        <li>'.$gFltr_1.'
            <input id="dwLd_1a" class="dwLd_cHk" type="checkbox" value="'.$gFltr_1.'" checked/>
            <i></i>
        </li>
        ';

        $gFltr_1b .= '
        <li>'.$gFltr_2.'
            <input id="dwLd_2a" class="dwLd_cHk" type="checkbox" value="'.$gFltr_2.'" checked/>
            <i></i>
        </li>
        ';
        }
        
        // price grab from .this call
        $gFltr_3b .= '
            <output id="dwLd_3a">0</output>
            <input class="dwLd_cHk" type="range" value="0" min="0" max="12" oninput="dwLd_3a.value = this.value"/>
            <var>Free</var>
            <var>$12</var>
        ';
    }
} catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}
$gFltr_x = '
<ul id="dwnLd_x" class="dN">
    <li>Format
        <ul>
            '.$gFltr_1a.'
        </ul>
    </li>
    <li>Type
        <ul>
            '.$gFltr_1b.'
        </ul>
    </li>
    <li>Price
        '.$gFltr_3b.'
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
                '.$gFltr_x.'
            </span>
            <input id="dbS_2" name="s" type="search" autocomplete="off" onKeyUp="dbSm_2(this.value)" placeholder="Searching downloads"/>
        </li>
    </ul>
</div>
';
?>

