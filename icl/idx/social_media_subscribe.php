<!-- youtube subscribe button -->
<script src="https://apis.google.com/js/platform.js"></script>
<style>
    .yt_cTr {
        background-color: rgba(227, 198, 198, 0.2);
        border: 2px solid darkred;
        padding: 15px;
    }
    .yt_cTr h3 {
        margin: 0px;
    }
    .yt_cTr p {
        width: 100%;
    }
    .g-yt_space {
        margin: 10px 0px 0px;
    }
    .scl_sub {
        margin: 0px;
    }

    .scl_ftr a li {
        list-style: none;
        display: inline-block;
        font-size: 20px;
        margin: 0px 10px;
    }
</style>
<?php
$scl_sub = '
    <div class="scl_sub scl_ftr dI fR">
        <a target="_blank" href="https://twitter.com/kodoninja?lang=en">
            <li>
                <i class="fi-social-twitter"></i>
            </li>
        </a>
        <a target="_blank" href="https://www.youtube.com/@kodoninja">
            <li>
                <i class="fi-social-youtube"></i>
            </li>
        </a>
        <a target="_blank" href="https://github.com/the-real-kodoninja">
            <li>
                <i class="fi-social-github"></i>
            </li>
        </a>
        <a target="_blank" href="https://www.pinterest.com/kodoninja/?eq=kodonin&etslf=25221">
            <li>
                <i class="fi-social-pinterest"></i>
            </li>
        </a>
    </div>
';

$yt_sub = "";
// $yt_sub = '
// <div class="mHdr-Inr fPnl">
//     <div class="yt_cTr">
//         <h3>YouTube</h3>
//         <p>Hey there, kodoninja is new to YouTube! And were trying to grow the channel as fast as possible. So we can deliver you better and more creative content. Please subscribe, and show us the same love and viewship as you do here. Thank You.
//         <div class="g-yt_space"></div>
//         <div class="g-ytsubscribe" data-channelid="UCMVXTHrV9IoIl-Fqt903qzg" data-layout="full" data-count="default"></div>
//         <!-- <br>
//         <iframe src="https://www.youtube.com/embed/GnxJTqnFRW8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
//     </div>
// </div>
// ';
$yt_sub2 = '
<div class="g-ytsubscribe" data-channelid="UCMVXTHrV9IoIl-Fqt903qzg" data-layout="default" data-count="default"></div>
';
?>