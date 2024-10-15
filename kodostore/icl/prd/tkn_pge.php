<style>
.bck-w {
    background-color: #fff;
    color: #333;
}

.tknBdyWpr1, .tknAd2crt {
    background-color: #3d4347;
    color: #fff;
}

.tknBdyWpr1 {
    padding: 0px 0px 90px 0px;
}

.tknBdyHdr1 {
    margin: 90px 0px auto;
}

ul.tkn_nav_1 {
    margin: 0px 0px 40px;
    padding: 0px;
} 

ul.tkn_nav_1 a li {
    display: inline-block;
    padding: 6px 12px;
    background-color: #fff;
    color: #3d4347;
    cursor: pointer;
}

ul.tkn_nav_1 a li.selPal, ul.tkn_nav_1 a li:hover {
    background-color: #d77b76;
    color: #fff;
}

.tknBUY_wpr {
    margin: 30px 0px 60px;
}

.tknPnlLft {
    max-width: 405px;
}

.tknAd2crt {
    padding: 20px;
    margin: 10px 0px 0px;
    border: none;
}

.newQtyWpr {

}

.newQtyHdr {
    margin: 0px 0px 7px;
}

.newQtyNum {
    border: 2px solid darkred;
    padding: 10px 15px;
    text-indent: 25px;
}

.newQtyCnc {
    margin: 8px 0px 0px 9px;
}

.newQtyCst {
    margin: 10px 0px 0px -100px;
}

.tknYESWpr, .tknVwChrt {
    margin: 10px 0px 0px;
    font-size: 13px;
}

/* load right */
.tknLdRgt {
    margin: 110px 0px 0px 0px;
}

.tknLd_SVG img {
    width: 100%;
    height: 450px;
    display: block;
}

.tknVwPnl p, .tknVwPnl ol li {
    line-height: 28px;
}

.tknVwPnl p {
    margin: 0px 0px 35px 0px;
}

.tknVwPnl h3 span {
    background-color: #f7e6d2;
    color: #333;
    border-radius: 6px;
    padding: 8px 12px;
    margin: 0px 6px 0px 0px;
}

.tknVwPnl2 {
    margin: 30px 0px;
}

.tknVwHdr2 {
    background-color: #fff;
    padding: 20px;
    color: #333;
}

.tknVwPnl2 {
    background-color: #f7e6d2;
    color: #333;
    line-height: 28px;
}

.tknVwPnl2 span {
    padding: 7px 14px;
    background-color: #333;
    color: #fff;
    margin: 0px 8px 0px 0px;
    display: inline-block;
    width: 150px;
    text-align: center;
}
</style>
<?php

$qPrds = "";
$Cnt = 0;
$max = 9;
if ($prd_des == 'tkn') {
    $max = 10000000;
    $prdAMnt = '<input id="prdSel_x" class="newQtyNum w100" type="number" placeholder="enter your amount" value="1" min="1" max="'.$max.'" onchange="amtCalc(\''.$prd_pr2.'\',\'tkn\')"/>';
    //
     // page on load -- table fill ins
    $numIncr = 5;
    $num_Tkn = 50;
    // month load out
    $tkn_m_FULL_a = ((int)$prd_pr2*(int)1)*(int)1; // kodotokens
    $tkn_m_FULL_b = ((int)$num_Tkn*(int)1)*(int)1; // kodotoken bonus
    $tkn_m_FULL_c = ((int)$numIncr*(int)1)*(int)1; // money earned
    // quarter 1 load out
    $tkn_q_FULL_a_1 = ((int)$prd_pr2*(int)1)*(int)3; // kodotokens
    $tkn_q_FULL_b_1 = ((int)$num_Tkn*(int)1)*(int)3; // kodotoken bonus
    $tkn_q_FULL_c_1 = ((int)$numIncr*(int)1)*(int)3; // money earned
    // quarter 2 load out
    $tkn_q_FULL_a_2 = ((int)$prd_pr2*(int)1)*(int)6; // kodotokens
    $tkn_q_FULL_b_2 = ((int)$num_Tkn*(int)1)*(int)6; // kodotoken bonus
    $tkn_q_FULL_c_2 = ((int)$numIncr*(int)1)*(int)6; // money earned
    // quarter 2 load out
    $tkn_q_FULL_a_3 = ((int)$prd_pr2*(int)1)*(int)9; // kodotokens
    $tkn_q_FULL_b_3 = ((int)$num_Tkn*(int)1)*(int)9; // kodotoken bonus
    $tkn_q_FULL_c_3 = ((int)$numIncr*(int)1)*(int)9; // money earned
    // yearly load out
    $tkn_y_FULL_a = ((int)$prd_pr2*(int)1)*(int)12; // kodotokens
    $tkn_y_FULL_b = ((int)$num_Tkn*(int)1)*(int)12; // kodotoken bonus
    $tkn_y_FULL_c = ((int)$numIncr*(int)1)*(int)12; // money earned
    //
    $prd_tknTbl = '
    <table class="scrEfct w100 pad-T2">
        <tr>
            <th></th>
            <th>kodotokens</th>
            <th>kodotoken bonus</th>
            <th>money earned</th>
        </tr>
        <tr>
            <th>monthly</th>
            <td id="tkn_m_FULL_a">'.$tkn_m_FULL_a.'</td>
            <td id="tkn_m_FULL_b">'.$tkn_m_FULL_a.'</td>
            <td id="tkn_m_FULL_c">'.$tkn_m_FULL_a.'</td>
        </tr>
        <tr>
            <th>1<sup>st</sup> quarter</th>
            <td id="tkn_q_FULL_a_1">'.$tkn_q_FULL_a_1.'</td>
            <td id="tkn_q_FULL_b_1">'.$tkn_q_FULL_b_1.'</td>
            <td id="tkn_q_FULL_c_1">'.$tkn_q_FULL_c_1.'</td>
        </tr>
        <tr>
            <th>2<sup>nd</sup> quarter</th>
            <td id="tkn_q_FULL_a_2">'.$tkn_q_FULL_a_2.'</td>
            <td id="tkn_q_FULL_b_2">'.$tkn_q_FULL_b_2.'</td>
            <td id="tkn_q_FULL_c_2">'.$tkn_q_FULL_c_2.'</td>
        </tr>
        <tr>
            <th>3<sup>rd</sup> quarter</th>
            <td id="tkn_q_FULL_a_3">'.$tkn_q_FULL_a_3.'</td>
            <td id="tkn_q_FULL_b_3">'.$tkn_q_FULL_b_3.'</td>
            <td id="tkn_q_FULL_c_3">'.$tkn_q_FULL_c_3.'</td>
        </tr>
        <tr>
            <th>yearly</th>
            <td id="tkn_y_FULL_a">'.$tkn_y_FULL_a.'</td>
            <td id="tkn_y_FULL_b">'.$tkn_y_FULL_b.'</td>
            <td id="tkn_y_FULL_c">'.$tkn_y_FULL_c.'</td>
        </tr>
    </table>
    ';
    //
    $prd_tknEx = '
    <div class="prdTblHdr">
        .5<i style="color: green;">&#xA2;</i>/m & 50<i class="ktknCurIcn">k<sup>tkns</sup></i>/m for every 500 kodotokens in kodowallet
    </div>
    <div class="prdTblBdy bck-w">
        '.$prd_tknTbl.'
     </div>
    ';
} 

// random array for scroll events 
// $scrEfct_array = rand();

// $scrEfct_array = array(
//     1 => "fade-in",
//     2 => "fade-in-bottom",
//     3 => "fade-in-left",
//     4 => "fade-in-right",
// );

$tkn_Bio_1 = '
<p class="scrEfct">Kodotoken is the currency of the kodoverse. These can be used in the store to purchase anything besides more kodotokens. You may gift them to your connected friends, save them as well as store them. We pay and reward you for buying and holding kodotokens. You receive .5, & 50 kodotokens every month for every 500 kodotokens you own. Regardless kodotoken 500 or 5,000 its all the same. However buying in bulk will save you money on the initial buy in. The larger the quantity the more you save.</p>
';

$vwPnl_1 = '
<div id="vwPnl_1" class="tknVwPnl">
    <h3>How it works</h3>
    '.$tkn_Bio_1.'
    <h3><span>Step 1:</span> Choose quantity</h3>
    <p class="scrEfct fade-in">Choose your kodotoken quantity by using the table above to help you decide on the amount you’d like to purchase. Every month you’d gain .5 for every 500 you own. The more you have the more money you’d make monthly.</p>

    <h3><span>Step 2:</span> buy kodotokens</h3>
    <p class="scrEfct fade-in-right">You have an idea of the quantity now add to cart. Upon successful checkout the amount is now added to your wallet. Kodotokens require you to have a kodoverse account. During your checkout you’ll be met with a way to create an account if you don’t have one already.</p> 

    <h3><span>Step 3:</span> enjoy benefiits</h3>
    <p class="scrEfct fade-in-bottom">Your wallet will have the kodotokens instantaneously among successful checkout. You then can either
        <p>
            <ol> 
                <li>keep them stored, collecting your money and token rewards.</li>
                <li>Gift them to another connection.</li>
                <li>Use them at the kodostore.</li>
                <li>request or send them to other kodoverse members.</li>
            </ol>
        </p>
    </p> 

    <h3><span>tep 4:</span> get more</h3>
    <p class="scrEfct fade-in-right">Don’t be a couch potato, there are tons of ester eggs, hidden links, and methods spread out among the kodoverse. Read blogs collect tokens, sign-up for our newsletter gain contentious tokens, there are hidden gems everywhere that earn you more kodotokens. Click on ads,… Become a premium member to gain more kodotokens...</p>

    <p class="scrEfct fade-in-bottom"><b>kodokitty.com</b> <b>kodokittyapp</b> coming soon there you can play games, solve puzzles, and so on to gain kodotokens.</p>

    <p>blockchain integration coming soon</p>
</div>
';

$vwPnl_2 = '
<div id="vwPnl_2" class="tknVwPnl scrEfct fade-in">
    <h3>about</h3>   
        <p>The kodoverse is a collection of platforms originating from kodoninja. The kodoninja platform was build as an extension of the founder <s>Emmanuel Moore</s> kodokitty (me not him). Built from my love of personal development and self improvement amongst various other things ranging from learning, reading, anime, movies, health & fitness, coding, trading, minimalism, tech, and so forth. His influence is spread out among kodoninja and the kodoverse.  The universe is ever expanding adding and improving to further tackle the niche of each categorized platform.</p>
</div>
';

$vwPnl_3 = '
<div id="vwPnl_3" class="tknVwPnl">
    <div class="prdTblHdr">the kodoverse</div>
        <div class="scrEfct fade-in-bottom pad-T2 bck-w">
            <p>The kodotoken created from the founder; is the currency of the kodoverse. Created to be used on all platforms including the blockchain. His obsession with web3, cryptocurrency and website crypto mining lead to the creation of kodotoken, and kodocoin forfronted by kodokitty.<p>

            <p>The vision of the kodoverse is not yet complete nor will it ever be. It will forever be perfected simplified, and improved but not over complicated and flooded. Given the overall complexity of this, money, developers, engineers specializing in web mining, crypto, AI, 2D & 3D space, servers, mining farms, and the ladder is needed in order to for fill this vision.</p>

            <p>We need your help to build this reality and sub-reality, hence the purchase of kodotokens, platform(s) interaction, including anything from the store will help create this vision. .5<i style="color: green;">&#xA2;</i>/m & 50<i class="ktknCurIcn">k<sup>tkns</sup></i>/m for every 500 kodotokens may not seem like much but can generate you fellow kodoninja several hundreds to thousands a year depending on the amount stored in your kodo-wallet. Early buyers will be rewarded quite well, as to how exactly is not yet determined. However kodotokens and FREE kodocoins are a guarantee.</p> 
        </div>
</div>
';

$vwPnl_4 = '
<div id="vwPnl_4">
    <div  class="tknVwPnl scrEfct fade-in tknVwPnl2">
        <div class="tknVwHdr pad-T2">Platforms</div>
        <div class="bck-w pad-T2 ">
            <p>Buying kodotokens helps expand & improve the kodoverse it’s not just kodoninja.com our hub/self-improvement/blog platform. The kodoverse spans across 7+ platforms, all of which will have an IOS, & Android app, and VR integration, All kodoverse platforms are (*still being developed with features*) and built with a connected lite social network and various development stacks. All follow the membership tier format free or paid. Let’s take a brief look at the platforms; where the kodotokens will be used and how it helps us by buying them.<p>
        </div>
    </div>
    <div class="tknVwPnl2 scrEfct fade-in-right pad-T2">
        <p><span>Kodoninja</span> – the founding platform. This is a lite social networking community for self improvement with the use of blogs, courses, quizzes, goals, forums, tips, and so forth.</p>
    </div>
    <div class="tknVwPnl2 scrEfct fade-in-left pad-T2">
        <p><span>Kodospace</span> – this is a full social network packed with all the features you’d find in the latest social networking platform. It is an expanded version of the social network built within kodoninja and the other kodoverse platforms. It most closely relates to Twitter, Reddit and Facebook. Although apart of the kodoverse it is stripped down of all the clunky addons such as the newsletter intergration, blogs, courses… It is a pure social network. The only commonalities are membership tier benefits ester eggs, kodotokens, kodocoins, token gifting/sending/receiving and your connections found in other platforms of the kodoverse. Other unique features such as up-voting and design view will remain constant.</p>
    </div>
    <div class="tknVwPnl2 scrEfct fade-in-bottom pad-T2">
        <p><span>Kodotrading</span> – a lite social networking trading and investing platform. Similar to profitly, and stocktwist. Although there is no trading done on the platform directly you can post (link) your trades and investments made from stock broker platforms such as ThinkorSwim, eTrade and so on. Screen stocks, built watchlist, analyse charts from us and popular platforms such as trade ideas, stocks to trade, and benzinga, You may also share various amounts of information with your connections. API integration for blogs and news post will be pulled from popular trading news sites such as market watch. Kodotrading is aimed to be a one stop hub for all things trading and investing.</p>
    </div>
    <div class="tknVwPnl2 scrEfct fade-in pad-T2">
        <p><span>kodohealth</span> – a lite social networking for health and fitness platform. This most closely relates to kodoninja as it has a blog integration. This is a complete platform geared towards getting you in the best shape possible.</p>
    </div>
    <div class="tknVwPnl2 scrEfct fade-in-bottom pad-T2">
        <p><span>Kodoacademy</span> – a lite social network aimed at teaching you code, hacks, through various methods such as video, courses, quizzes, similar to khan academy, free code camp, code academy, leet code, udemy, and w3school...</p>
    </div>
    <div class="tknVwPnl2 scrEfct fade-in-left pad-T2">
        <p><span>kodofilms/kodotv</span> – this is a in house indie film production company that produces films, shows geared towards streaming on its self named platform. Additionally the production company will make things aimed for theatrical release. Like others from the kodoverse this will have a lite social network for all things film and tv. Share your love of film, rate, review films, get film news and so on. Through the platform there will be a talk show geared to the film and television focus. </p>
    </div>
    <div class="tknVwPnl2 scrEfct fade-in-right pad-T2">
        <p><span>Kodokitty</span> – I’m a real cat AI that runs and manages the entire kodoverse. You can interact and play games with me on my site and on my app. Ask me anything I always have a witty answer meow. These games earn you kodotokens. I can also give you tips and tricks on how to find more kodotokens, its crazy that I pay you for having them meow.</p>
    </div>
    <div class="tknVwPnl2 scrEfct fade-in pad-T2">
        <p><span>Kodovr</span> – think the kodospace but in a virtual environment. Slap on your headset download the app, view our platforms in VR and come interact with all your connections in a virtual city known as kodocity. Here you can meet new connections adding them to your connection list. It’s a fun a free neo modern city the size of San-Francisco. That’ll grow and develop as fast as we can build and create it. Our aim is to create a realistic city similar to what you’ll see in moderen XBOX and Playstation games. Customize self replicate avatars. Meet new connections in coffee shops, parks, stores, etc. Live in homes, condos, apartments, you name it. You can even enjoy yourselves *cough... at the many hotels in the city… The sky is the limit. We’ll work hard to integrate with other virtual base environments such as the metaverse. This virtual replicants, and kodotoken, kodocoin integration is the “end” goal. Or shall I say the main goal meow. The concept of a 3D space and crypto integration are endless as demonstrated Meta and the metaverse.</p>
    </div>
    <div class="tknVwPnl2 scrEfct fade-in-left pad-T2">
        <p><span>Kodocoin</span> – This wil be a open source highly secured currency that exist on the ethurem blockchain but closely mimics dogecoin. This will be designed to be held in wallets of your choice. The languages will include Solidity, Python, Php, javascript. The kodotoken will be modified to be ran along side this.</p>
    </div>
</div>
';

$tknPnlFULL = "$vwPnl_1 $vwPnl_2 $vwPnl_3 $vwPnl_4";

$tknBUY = '
<div class="tknBUY_wpr tknPnlLft pad-T2 bck-w w100">
    <div class="newQtyWpr">
        <div class="newQtyHdr">Quantity</div>
        <div>
            <div class="">
                <span class="newQtyCnc pA"><i class="ktknCurIcn">k<sup>tkn</sup></i>'.$prd_pr1.'</span>
            </div>
            '.$prdAMnt.'
            <div class="dI fR">
                <span id="prdTtl_x" class="newQtyCst pA"><i style="color: green;">$</i>'.$prd_pr2.'</span>
            </div>
        </div>
    </div>
    <div class="tknVwChrt dB">view real time price action below</div>
    <div class="tknYESWpr">
        <input id="tknYES" name="tknYES" type="checkbox" checked><label for="tknYES">I understand that <b>currently</b> kodotokens are a currency that is used among (within) the kodoverse platforms and not the exchange as of yet</label>
    </div>
    <button id="prdATC_x" class="tknAd2crt w100" onclick="a2Crt(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$prd_pid.'\',\''.$prd_pr2.'\')" disabled>add to cart</button> 
</div>
';

$tknLdRgt = '
<div class="tknLdRgt dI fR">
    <div class="tknLd_SVG">
        <img src="css/svg/kodocoin_v1.svg"/>
    </div>
</div>
';

$tknUL = '
<ul class="tkn_nav_1">
    <a href="#vwPnl_1"><li class="selPal">how it works</li></a>
    <a href="#vwPnl_2"><li>about</li></a>
    <a href="#vwPnl_3"><li>the kodoverse</li></a>
    <a href="#vwPnl_4"><li>platforms</li></a>
</ul>
';


$prdBdy = '
<div class="tknBdyWpr1"> 
    <div class="prdBdyWpr pad-T">
        <div class="tknBdyHdr1 dI">
            <h2>'.$prd_nme.'</h2>
            <h5>the official token of the kodoverse</h5>
        </div>
        '.$tknLdRgt.'
        '.$tknBUY.'
        '.$tknUL.'
        '.$prd_tknEx .'
        '.$tknPnlFULL.'
    </div>
</div>
';





?>