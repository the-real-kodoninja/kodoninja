<?php
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
$notescheck = "";
$notePnl_a = "";
$notePnl_b = "";
$numrows1_acR = "";
$numrows2_acR = "";
$pth_rel = '';

$uriSeg = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if ($uriSeg[2] == 'm') {
    $pth_rel = '../';
} 
if ($path == 'p1') {
    $path1 = '';
} else if ($path == 'p2'){
    $path1 = '../';
} $adIcn = "";
if ($user_ok === false) {
    $adIcn = '
    <a href="membership.php">
        <i class="add_Icn_1 iB pA">+</i>
    </a>';
    //
    $usrAdd = '
    <div class="dI">
        '.$adIcn.'
    </div>';
} else if ($log_id !== "" && $user_ok === true) {
    // check to make visible
    // check to load user post module
    // post has inernal checks to furthor verify
    $usrAdd = '
    <li>
        <div onclick="addPstBtn(\''.$log_id.'\',\''.$log_HshCde.'\',\'xa\',\'NULL\')">
            <span>Post</span>
            <i id="a1" class="arrow down"></i>
        </div>
        <ul id="addPstDrp_'.$log_id.'" class="dN">
        
        </ul>
    </li>
    ';
}



if($log_HshCde_x === $log_HshCde_y && $log_HshCde && $user_ok && $log_id >= 1){
    $count_nte = $sql______dbx___xX__->query("SELECT COUNT(id) FROM notifications WHERE uid1 LIKE BINARY '$log_id'")->fetchColumn();
    $notePnl_b = '
    <div id="pnl_mod_nte__'.$log_HshCde.'" class="notiPnl_Wpr dN">
        <div class="usrHdr">
            <div class="pad-T dI notiPnl_Hdr">
                Notifications
            </div>
            <div class="pad-T fR dI clr-r">
                <span>'.$count_nte.'</span>
            </div>
        </div>
        <div id="pnl_modx_nte__'.$log_HshCde.'"></div>
    </div>
    ';
    $k_wallet = '
    <li>
        <div onclick="pnl_mod_kwlt(\''.$log_id.'\',\''.$log_HshCde.'\')">
            <span>kodowallet</span>
            <i id="a1" class="arrow down"></i>
        </div>
        <ul id="pnl_modx_kwlt__'.$log_HshCde.'" class="dN">
            <div id="LOAD_modx_kwlt__'.$log_HshCde.'"></div>                
        </ul>
    </li>
    ';
    // include_once(''.$path1.'icl/pnl/achBlg.php'); save for v4
    
    // all ajax calls
    $usr_lgc = '
    <!-- user logic start -->
    <div class="usr_lgc db">
        <!-- all logic load -->
        <div class="usrBck-Wpr dN">
            <div id="" class="">
                <form>
                    <input type="text" name="bt" placeholder="Blog title"/>
                </form>
            </div>
        </div>
        <ul class="usr_list">
            <a href="user.php?u='.$log_username.'">
                <li>
                    <!-- keep defect adds flare -->
                    '.$log_usrAvt2.'
                    <span>'.$nmeDpy_GLBL.'</span>
                </li>
            </a>
            '.$usrAdd.'
            '.$lg_lvlBtn.'
            <li onclick="pnl_mod_nte(\''.$log_id.'\',\''.$log_HshCde.'\')">               
                <span>Notifications</span>
                <span class="notiHdr_Wpr fR" onclick="Pnl_VwX()"><b style="color: darkred;">'.$count_nte.'</b></span>
            </li>
            '.$k_wallet.'
            <a href="settings.php?uid='.$log_id.'&ghCdx='.$log_HshCde.'">
                <li>
                    <span>settings</span>
                </li>
            </a>

            <a href="'.$pth_rel.'logout.php">
                <li class="btn-Rd">
                    <div><span>Logout</span></div>
                </li>
            </a>
        </ul>
    </div>
    <!-- user logic end -->
    ';

} else  {
    $usr_lgc = '
    <div class="usr_lgc db pnlRght_O">
        Welcome fellow kodoninja let\'s <a href="membership.php?btn=btn_x&load=login">login</a></a> or <a href="membership.php">signup</a>
    </div>
    ';
}
?>
<div id="mNu_m_y2" class="usr_lgn pf dN">
    <?php echo ''.$notePnl_b.''.$frm_v.''.$frm_p.''.$setgs.'  '; ?> 
    <div class="usr_PnlX pF">
        <div class="w100" style="right:0; width: 264px;">
            <?php echo ''.$usr_lgc.'' ?>
        </div>
    </div>
</div>
<style>
    .pnlRght_O > a {
    text-decoration: none;
    color: #333;
}

.pnlRght_O a:hover {
    color: darkred;
}
</style>