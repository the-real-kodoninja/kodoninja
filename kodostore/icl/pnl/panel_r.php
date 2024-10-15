<?php
if ($path == 'p1') {
    $path2 = '';
} else if ($path == 'p2'){
    $path2 = '../';
}
$u = "";
$gatebox2 = "";
$usr_lgc = "";
$cln = "'";
$notes = "";
$blg_p = "";
$blg_v = "";
$frm_v = "";
$frm_p = "";
$setgs = "";
$UR_pic = "";
$notescheck = "";
$notification_list = "";
$numrows1_acR = "";
$numrows2_acR = "";

//
//
$usr_lgc = '
<!-- user logic start -->
<div class="usr_lgc db">
    <ul class="usr_list dI" style="width: 238px;">
        '.$usrPnlFULL.'
    </ul>
</div>
<!-- user logic end -->
';
?>
<div id="mNu_m_u1b" class="usr_lgn pF dN"> 
    <div id="usrFavLoad" class="dN"><?php echo ''.$usrFavLst.'' ?></div>
    <div class="usr_PnlX">
        <?php echo ''.$usr_lgc.'' ?>
    
    </div>
</div>
<style>
    .pnlRght_O {
        background: #fff;
        color: #000;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        margin: 0px 0px 10px;
    }
    .pnlRght_O a {
        text-decoration: underline;
        color: darkred;
    }
</style>

<script>
const mNu_m_u1a = document.getElementById("mNu_m_u1a"); // menu button
const mNu_m_u1b = document.getElementById("mNu_m_u1b"); // sidebar menu
// const cnt_L2a = document.getElementById("cnt_L2a");
// const cnt_L2b = document.getElementById("cnt_L2b");
//

mNu_m_u1a.addEventListener('click', function (event) {
    mNu_m_u1b.classList.toggle("dN");
    // cnt_L2a.addEventListener('click', function (event) {
    //     cnt_L2b.classList.toggle("dN");
    // });
});
</script>