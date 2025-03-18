<?php
$setPnlLft = '
<ul class="setPnlLft">
    <div id="setLiLd">'.$li.'</div>
</ul>
';


if ($p_load === 'f') {
    $setPnlMn = '
    <div class="setPnlMn">
        <div id="setPnlMn_hdr" class="setPnlMn_hdr">
        '.$setLi["set_list"]["Your account"][1].'
        </div>
        <div id="setPnlMn_Bdy" class="setPnlMn_Bdy">
            <p style="margin: 15px 15px;">hang on im loading your settings, meow</p>
        </div>
    </div>
    ';

    $settings_Full = '
    <div class="setMainWpr">
        <div class="lft-lgc fl">
            '.$bnrHdr.'
        </div>
        '.$setPnlMn.''.$setPnlLft.'
    </div>
    ';
} else if ($p_load === 'm') {
    $setPnlMn = '
    <div class="setPnlMn dN">
        <div id="setPnlMn_Bdy" class="setPnlMn_Bdy"></div>
    </div>
    ';
    $settings_Full = '
    <div class="setMainWpr">
        '.$bnrHdr.'
        '.$setPnlLft.'
        '.$setPnlMn.'
    </div>
    ';
}
?>
