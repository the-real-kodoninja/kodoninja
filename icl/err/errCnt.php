<style>
    #bckBtn {
        margin: 20px 0px 0px;
        padding: 11PX 15PX;
        border-radius: 6px;
        border: none;
        background-color: #C2B280;
        color: #333;
        text-decoration: none;
        font-size: 19px;
    }
    #bckBtn:hover {
        background-color: darkred;
        color: #fff;
    }
</style>
<?php

if(isset($_GET["msg"])){
    // $msg = preg_replace('#[^a-z0-9.@ ]#i', '', $_GET ['msg']);
    $msg = $_GET ['msg'];
} if ($_GET["msg"] == "") {
    $msg = "ello mate you've reached the error page.";
}
$bckBtn = '<a id="bckBtn" href="javascript:history.back()">back</a>';
//
if ($p_load == 'f') {
    $mainVw3 = '
    <div class="db mainVw3">
        <div class="lft-lgc2 pad-T">
            <h2>404 - ERROR!</h2>
            '.$msg.' '.$bckBtn.'
        </div>
    </div>
    ';
} else if ($p_load == 'm') {
    $mainVw3 = '
    <div class="db mainVw3">
        <div class="lft-lgc2 pad-T">
            <h2>404 - ERROR!</h2>
            '.$msg.' 
            <div style="margin: 30px 0px 0px">'.$bckBtn.'</div>
        </div>
    </div>
    ';
}
    
$errBdy_Full = "$mainVw3";
?>