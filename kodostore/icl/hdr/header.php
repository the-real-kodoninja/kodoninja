<?php
$hex_code = 0;

if ($path == 'p1') {
    $path1 = '';
    $path2 = '';
} else if ($path == 'p2'){
    $path1 = '../';
    $path2 = '../';
}
$crt_qty = 0; 
if ($user_ok) {
    $hex_code = codeCnts($log_password);
    // total amount of items added to the cart 
    $crt_qty = $sqlo_____db2___xX__->query("SELECT SUM(quantity) FROM cart WHERE uid = '$log_id'")->fetchColumn();
}
$hdxMn = '
<div class="hdxWpr w100 pA">
    <div class="hdxInr dI w100">
        <div id="mNu_m_x" class="hdxMnu1 pR dI">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="hdxFull">
            <div class="dI w100 dI">
                <span class="hdxLogo pA"><a href="index.php">kodostore</a></span>
                <input id="hdxSch" class="hdxSch w100" type="search" placeholder="search the kodostore"/>
                <!-- content load out -->
                <ul id="hdxSrlt" class="dN"></ul>
            </div>
            <div class="hdxRgt fR pA dI">
                '.$log_usrAvt.'
                <i id="hdxCrt" class="hdxCrt cP fi-shopping-cart" onclick="hdxCrtDrp(\''.$log_id.'\',\''.$hex_code.'\')">
                    <var>'.$crt_qty.'</var>
                    <ul id="hdxList" class="hdxList pA dN"></ul>
                </i>
            </div>
        </div>
    </div>
</div>

';

echo $hdxMn;

?>