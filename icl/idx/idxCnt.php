<style>
    ul.ul-glbl-idx li ul li:hover {
        text-decoration: underline;
    }

    ul.ul-glbl-idx li {
        line-height: 28px;
    }
    .more-content {
        display: none; /* Hide the additional content by default */
    }
    .toggle-btn {
        color: darkred;
        cursor: pointer;
        text-decoration: none;
    }
</style>
<?php
$tempImg = "";
$mFIXED = "";
if ($p_load === 'f') {
    $ux_cnt = 20;
} else if ($p_load === 'm') {
    $ux_cnt = 6;
    $tempImg = '<img src="../img/tgl/11140144_10206598809038992_6106877438164771864_o.jpg"/>';
}

$wlc_msg1 = '
<div class="">
    <h1 class="price1x"><span><span class="price1b">$9.99</span>/m</span>&nbsp;&nbsp; <span><span class="price1a">$12.99</span>/m</span> </h1>
    <a href="membership.php"><button class="btnHdr1a">Click to find out more</button></a>
</div>
';

$mHdrIntro = '
<div class="mHdr-Wpr"> 
    '.$tglImg.'
    '.$tempImg.'
    <div class="mHdr-Ovly pa">
    <div class="mHdr-Inr">
        <div class="di clr_w mHdr-Ctr1">
            <h2 '.$ld__c1a.'>Welcome to the kodoverse</h2>
            '.$wlc_msg1.'
        </div>
        
        '.$ld__c1b.'
        </div>
    </div>
</div>
';

// //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//

// micro intro
$wlcMSG_1 = '
<div class="wlcMSG">
    <h2>Kodoverse creators earn 100% of platform income via donations, subscriptions...<br><br> Only 5% platform fees anything else</h2>
</div>
';

$bookCMG = '
<div id="usrCNT_1u" class="usrConts" style="width: 100%;">
    <div class="usrHdr">
        <div class="pad-T dI">
            <b>Books (coming Q1-Q4 2024)</b>
        </div>
    </div>
    <ol class="ol_l1">
        <li><i class="fa-solid fa-book"></i> Terrorism and conspiracy of a homeless developer</li>
        <li><i class="fa-solid fa-book"></i> The ultimate guide to Success with Passive income Vol. 1</li>
        <li><i class="fa-solid fa-book"></i> The Digital nomad lifestyle</li>
        <li><i class="fa-solid fa-book"></i> Cash poor to Multi-Millionaire playbook</li>
        <li><i class="fa-solid fa-book"></i> Figuring out who you are</li>
        <li><i class="fa-solid fa-book"></i> Guide to the zero cash lifestyle</li>
    </ol>
</div>
';

//
$nomadDEF = '
<div id="usrCNT_1u" class="usrConts" style="width: 100%;">
        <div class="usrHdr">
            <div class="pad-T dI">
                <b>What is a digital nomad?</b>
            </div>
        </div>
        <div style="margin: 20px; margin-left: 20px;">
            <p>A digital nomad is a person who works remotely while traveling to different locations, often leveraging technology to perform their job from anywhere in the world. This lifestyle allows them to maintain their professional responsibilities while exploring new places and cultures. Here are some key characteristics of digital nomads:</p>
            <div class="more-content" id="more-content-1a">
                <p style="margin-left: 20px;">
                    <b>Remote Work:</b> Digital nomads typically work in jobs that allow for remote work, such as freelance writing, software development, graphic design, consulting, or online marketing.
                </p>
                <p style="margin-left: 20px;">
                    <b>Location Independence:</b> They prioritize location flexibility, often moving from city to city or country to country, which allows them to experience various cultures and environments.
                </p>
                <p style="margin-left: 20px;">
                    <b>Use of Technology:</b> They rely heavily on technology—such as laptops, smartphones, and internet access—to stay connected with clients or employers and complete their work.
                </p>
                <p style="margin-left: 20px;">
                    <b>Community and Networking:</b> Many digital nomads connect with others in similar situations through online communities, coworking spaces, and meetups, fostering a sense of belonging and collaboration.
                </p>
                <p style="margin-left: 20px;">
                    <b>Lifestyle Focus:</b> The digital nomad lifestyle often emphasizes experiences over material possessions, leading to a minimalist approach and a focus on personal growth, adventure, and exploration.
                </p>
                <p>This lifestyle has grown in popularity with the rise of remote work and advancements in technology, especially post-pandemic, as more people seek flexibility in their careers and life experiences.</p>
            </div>
            <span class="toggle-btn" onclick="toggleMoreContent("1a")">View More</span>
        </div>
    </div>
';

// blog 
$wlcMSG_2 = '
'.$sbm_TIP.'
<div id="usrCNT_1u" class="usrConts" style="width: 100%;">
    <div class="usrHdr">
        <div class="pad-T dI">
            <b>Highlight</b>
        </div>
    </div>
    <div class="usrConts-Wpr pad-T" style="padding: 15px;line-height: 23px;">   
        <span>See the report "<a href="view.php?t=blog&v=41">Terrorism and conspiracy of a homeless developer</a>" that sparked the multi-billion dollar lawsuit</span>
        '.$unq__flwgate.'
    </div>
</div>
';

// new @name reserve
$nmeRSV = '
<div class="nmeRSV">
    <div class="nmeRSV_inp">
        <span>kodoninja.com/</span>
        <input type="text" placeholder="kodotag">
        <button>claim</button>
    </div>
    <div id="nmeRSL"></div>
</div>
';

// //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
$view_uc = '
<div id="usrCNT_1u" class="usrConts usrCNT1" style="width: 100%;">
    <div class="usrHdr">
        <div class="pad-T dI">
            Top Kodoninja\'s
        </div>
        <div class="edit-B_Wpr pad-T fR dI ">
            <span>seeing '.$ux_cnt.' of '.$count_uc.'</span>
        </div>
    </div>
    <div class="usrConts-Wpr">   
        '.$output_uc.'
     </div>
</div>
';

$view_gc = '
<div id="usrCNT_1u" class="usrConts w100" style="width: 100%;">
    <div class="usrHdr">
        <div class="pad-T dI">
            Latest <a href="goal.php">goals</a> 
        </div>
        <div class="edit-B_Wpr pad-T fR dI ">
            <span>'.$count_gc.'</span>
        </div>
    </div>
    <div class="usrConts-Wpr">   
        '.$output_vc.'
     </div>
</div>
';

$view_fc = '
<div id="usrCNT_1u" class="usrConts" style="width: 100%;">
    <div class="usrHdr">
        <div class="pad-T dI">
            Latest <a href="forum.php">forum</a>
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

$view_bc = '
<div id="usrCNT_1u" class="usrConts" style="width: 100%;">
    <div class="usrHdr">
        <div class="pad-T dI">
            Latest <a href="blog.php">blog</a>
        </div>
        <div class="edit-B_Wpr pad-T fR dI ">
            <span>'.$count_bc.'</span>
        </div>
    </div>
    <div class="usrConts-Wpr">   
        '.$output_bc.'
     </div>
</div>
';

$view_upc = '
<div id="usrCNT_1u" class="usrConts" style="width: 100%;">
    <div class="usrHdr">
        <div class="pad-T dI">
            Latest post
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

$idxBdy = "$bookCMG $nomadDEF $nmeRSV $view_uc $view_bc $view_gc $view_fc $view_upc";

$index_FULL = '
<div class="db mainVw3">
    <div class="lft-lgc2 di">
        '.$idxBdy.'
    </div>
    <div class="rgt-lgc fr">
        '.$pge_Rpanel.'
    </div>
</div>
';
?>