<?php 
$blgLd_1a = "";

try {
    if($sqlo_____dbx___xX__->query(
        $sql = "SELECT DISTINCT *,category FROM blog ORDER BY category")->fetchColumn()) {
        foreach ($sqlo_____dbx___xX__->query($sql) as $roo0w____X___xX__) {            //
            $cat2_l1a = implode(',',array_unique(str_word_count($roo0w____X___xX__["category"],1)));
            $blgLd_1a .= '
            <li>'.$cat2_l1a.'
                <input id="bLg_1a" class="bLg_cHk" type="checkbox" value="'.$cat2_l1a.'" checked/>
                <i></i>
            </li>
            ';
            }
            $blgLd_x = '
            <ul id="blgLd_x" class="dN">
                <li>Category
                    <ul>
                        '.$blgLd_1a.'
                    </ul>
                </li>
            </ul>
            ';
            $fltrModX = '
            <div class="bHdr-NavWpr dB">
                <ul class="bHdr-Nav">
                    <li>
                        <span id="dwnld_vTxt">
                        Filter Results
                            <i id="sch_dn1">+</i>
                            <i id="sch_dn2">-</i>
                            '.$blgLd_x.'
                        </span>
                        <input id="dbS_3" name="s" type="search" autocomplete="off" onKeyUp="dbSm_3(this.value)" placeholder="Searching blog"/>
                    </li>
                </ul>
            </div>
            ';
        } 
    } catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}
?>
