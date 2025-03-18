<?php

$Tg9ValChk = "";
if (isset($_GET['Tg9'])) {
    $Tg9ValChk = filter_var(preg_replace('#[^s3cR3t]#i', '', $_GET['Tg9']),FILTER_SANITIZE_STRING);
}
$plcHldr_1 = "Search kodoninja";
if ($user_ok == true && $log_username != "" && $Tg9ValChk == "s3cR3t") {
    $Tg9_Cnts = '
    <div id="Tg9_Cnts">
        <form class="Tg9_SchWpr">
            <input type="search" id="Tg9_sch1" placeholder="&#129370;" required/>
            <input type="search" id="Tg9_sch2" placeholder="&#129370;&#129370;" required/>
            <input type="search" id="Tg9_sch3" placeholder="&#129370;&#129370;&#129370;" required/>
            <input id="Tg9_ScBtn" type="submit" value=":)"/>
        </form>
        <div id="Tg9_ScRsp">
            I think stuff loads here. idk, wait how\'d you find this page.
        </div>
    </div>
    ';
} else if ($user_ok == true && $log_username != "" && $Tg9ValChk != "s3cR3t") {
    $Tg9_Cnts = '
    <div id="Tg9_Cnts">
        Good job. but you need a few other things to access this page. ahem cough* Get lost this page dosen\'t exist.
    </div>
    ';
} else {
    $Tg9_Cnts = '
    <div id="Tg9_Cnts">
        I don\'t know how you found this page but you need to be at least a basic user to be here. Go signup or login... ahem cough* Get lost this page dosen\'t exist.
    </div>
    ';
}

$news_dsply = "<div class=\"mNws-Inr\">Hmmm, you found this page, oh darn. well while your here use those eggs to find low level easter eggs ooorrr, clues on how to find easter eggs throughout the platforms. I said too much, hey get outta here.<br>$sCrt_4</div>";
    $eggBdy_Full = '
    <div class="Tg9_BdyWpr">
        '.$Tg9_Cnts.'
    </div>
    ';

?>