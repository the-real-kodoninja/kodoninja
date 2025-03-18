<?php 
$view_uc = '
<div id="usrCNT_1u" class="usrConts" style="width: 100%;">
    <div class="usrHdr">
        <div class="pad-T dI">
            Users
        </div>
        <div class="edit-B_Wpr pad-T fR dI ">
            <span>'.$count_uc.'</span>
        </div>
    </div>
    <div class="usrConts-Wpr">   
        '.$output_uc.'
     </div>
</div>
';

$view_bc = '
<div id="usrCNT_1u" class="usrConts" style="width: 100%;">
    <div class="usrHdr">
        <div class="pad-T dI">
            blog
        </div>
        <div class="pad-T fR dI clr-r">
            <span>'.$count_bc.'</span>
        </div>
    </div>
    <div class="usrConts-Wpr">   
        '.$output_bc.'
     </div>
</div>
';

$view_fc = '
<div id="usrCNT_1u" class="usrConts" style="width: 100%;">
    <div class="usrHdr">
        <div class="pad-T dI">
            forum
        </div>
        <div class="edit-B_Wpr pad-T fR dI ">
            <span>'.$count_fc.'</span>
        </div>
    </div>
    <div class="usrConts-Wpr">   
        '.$output_fc.'
     </div>
</div>
';

$view_gc = '
<div id="usrCNT_1u" class="usrConts" style="width: 100%;">
    <div class="usrHdr">
        <div class="pad-T dI">
            goal
        </div>
        <div class="edit-B_Wpr pad-T fR dI ">
            <span>'.$count_gc.'</span>
        </div>
    </div>
    <div class="usrConts-Wpr">   
        '.$output_gc.'
     </div>
</div>
';

$view_upc = '
<div id="usrCNT_1u" class="usrConts" style="width: 100%;">
    <div class="usrHdr">
        <div class="pad-T dI">
            post
        </div>
        <div class="edit-B_Wpr pad-T fR dI ">
            <span>'.$count_upc.'</span>
        </div>
    </div>
    <div class="usrConts-Wpr">   
        '.$output_upc.'
     </div>
</div>
';

$schBdy = "$view_uc $view_bc $view_fc $view_gc $view_upc";


if ($p_load == 'f') {
    $blogNav = '
    <ul id="usrCNT_TGL" class="usrNav0-Wpr">
        <span id="usrCNT_XX" class="selU" style="margin: 0px 0px 2px 15px;">Everything</span>
        <li data-target="usrCNT_1u">Users</li>
        <li data-target="usrCNT_1a">Blogs</li>
        <li data-target="usrCNT_3a">Goals</li>
        <li data-target="usrCNT_2a">Forums</li>
        <li data-target="usrCNT_4a">Post</li>
        <li class="fR">
            <span>'.$sum_total.'</span>
        </li>
    </ul>
    ';

    $searchBdy_Full = '
    <div class="db mainVw3" style="margin: 65px auto;">
        <div class="lft-lgc2 di">
            '.$blogNav.'
            '.$schBdy.'
        </div>
        <div class="rgt-lgc fr">
            '.$pge_Rpanel.'
        </div>
    </div>
    ';
} else if ($p_load == 'm') {
    $blogNav = '
    <div class="blogNav">
        <select id="usrCNT_TGL" class="blogSel">
            <option id="usrCNT_XX" class="usrSel" onclick="usrCNT1X()"  value="0" selected>
              Everyhing
              <span class="fR">'.$sum_total.'</span>
            </option>
            <option data-target="usrCNT_6a">
              Users
              <span class="fR">'.$count_uc.'</span>
            </option>
            <option data-target="usrCNT_1a">
              Blogs
              <span class="fR">'.$count_bc.'</span>
            </option>
            <option data-target="usrCNT_3a">
              Goals
              <span class="fR">'.$count_gc.'</span>
            </option>
            <option data-target="usrCNT_2a">
              Forums
              <span class="fR">'.$count_fc.'</span>
            </option>
            <option data-target="usrCNT_4a">
              Post
              <span class="fR">'.$count_upc.'</span>
            </option>
        </select>
    </div>
    '; 

    $searchBdy_Full = '
    '.$blogNav.'
    <div class="schR-Wpr pad_T" style="margin: 0px;">
        '.$schBdy.'
    </div>
    <div class="pad_T">
        '.$pge_Rpanel.''.$Trnd_Ftr.'
    </div>
    ';
}
?>



