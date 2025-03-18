<?php 

if(isset($_GET["i"])){
	$i = filter_var(preg_replace('#[^a-z0-9]#i', '', $_GET['i']),FILTER_SANITIZE_STRING);
} if ($i == "1") {
    $i_trm = 'terms';
} else if ($i == "2") {
     $i_trm = 'about';
} else if ($i == "3") {
     $i_trm = 'disclaimer';
}

$info_1 = '
<div class="info_1">
    <h3>Terms & Guidelines</h3>
    <span class="hdrDate" note6="last updated">'.timeAgo(strtotime('2023-05-02 00:31:00')).'</span>

    <p>Only you '.$log_username.', have the true power in protecting and keeping yourself from danger. Please follow our policies, terms & guidelines to ensure a fun and safe environment.<br /> <b>Please do not post anything that will put you in a situation of danger, or anything that will cause you to be banned or suspended '.$log_username.'.</b><br/><small>Please understand that, Any database will retain information to be stored for interaction. (we will review information to obtain your safety.) Note that this is the internet and some things are truly never deleted, hidden Nor can be 100% protected.</small> <br/><b>We will do our best to ensure the protection of your information and safety.</b></p>

    <ol>
      <li>Everyone is expected not to post of any private information that will otherwise attract harmful or malicious behavior.</li>
      <li>Any outside URL\'s are expected to implement the source or link back to source.</li>
      <li>Any outside URL\'s are expected to come from reputable known locations.</li>
      <li>No uploads of any data attached image or doc.</li>
      <li>Do not take ownership of any post, reply image you know is not true or didn\'t belong or originate from you.</li>
      <li>No one will ever request personal documents, or information.</li>
      <li>Impersonating any person other than yourself will be deleted immediately.</li>
      <li>No Tor related nodes, proxies, VPN\'s, scrapers, bots, or other automated posting or downloading scripts. </li>
      <li>There will be no injecting, implementing, modifying, breaching, hacking harmful, or malicious strings, (code) into this site. Any occurrence of this will be deleted and you will be banned.</li>
      <li>You will never attempt to enter someone else\'s profile, or impersonate them. Any occurrence of this will be deleted and you will be banned.</li>
      <li>Any advertising or promoting will be done by our rules. Absolutely no referral linking, "offers", soliciting, begging, etc</li>
      <li>Everyone is expected to provide great quality content, post and comments.</li>
      <li>Absolutely no posting of content pertaining to jailbait, or anything that could be seen as advocating p&#111;rnography involving minors.</li>
      <li>Absolutely no posting of rape, extreme violence, threats, forcing, death, of any kind. It will be deleted and the user will be subject to being banned.</li>
      <li>Any intension of posting any misleading ads, or promoting will result in that ad being removed without refund.</li>
    </ol>

    <p>Our policies and terms and other global policies apply everywhere on this site and apps. We reserve the right to revoke ban or delete content, anyone or anything that violates our policies and terms without reason, question or notice.</p>
</div>
';

$info_2 = '
<div id="info_2">
    <h3>About us & our Policies</h3>
    <span class="hdrDate" note6="last updated">'.timeAgo(strtotime('2023-05-02 00:31:00')).'</span>

    <p>The coding ninja platform was created by dev/eng Emmanuel "kodoninja" Moore as the ultimate guide to Personal Development and financial freedom. Our growing community will help you learn and create new income streams through software development, Investing, day-trading, money management, etc. Our aim is to also get you physically fit, healthy, motivated, and confident to accomplish your daily life. So sit back learn, absorb, and put into practice everything your learning from our platform.</p><p>This is a placewere anyone can connect with anyone, to better build relationships on common interest. Any person regardless of having an account may search or troll our database. The signed in users can comment, post, and create topics with their post and hashtags. Become an anonymous celebrity and safely post, search or comment on a interest without preying eyes, or make your name known.</p>

    <p>Anyone is welcome to participate to comment, search and post anything, however make sure you read over our policy & terms before you do so. Dismissing our policies may result to a user being banned or temporally suspended. Those of you who don\'t sign-up and still break the rules may have their ip address permanently banned.</p>

    <p>Go anonymous! Logout and comment just note that your ip address is only visible to the administrators.</p>

    <p>We hate to ruin your experience with annoying ads and shady social networking. They just take all the fun out of everything, bringing the term “<a href="http://www.forbes.com/sites/markhendrickson/2013/04/11/big-brother-is-increasingly-watching-you/ " target="_blank">Big brother is always watching</a>” into reality. They\'re mostly malicious; always tracking, collecting, and making a test subject out of who ever clicks, searches, friending, following etc. We don\'t track any user involvement, sell any information to third parties, nor will we ever attempt to do so. This is an experience created by you, not us. </p>

    <p>We are free of charge and will support our development through ads and promoting. So be sure to promote your post and help keep us alive ;). We\'re dirt cheap so take advantage of this and build your page. You are not permitted to promote are use our advertising but we will greatly appreciate this. If you decide to promote and advertise, we Thank You in advance and say a deep thanks for keeping our talented developers fed, bathed and clothed.</p>

    <p>Help get our tiny development team bigger and your content better. Start promoting and advertising.</p>

    <p>We do not disclose your information nor do we create the code to collect and do so. We just mainly collect your ip which helps get you logged on. Remember be mindful of what you post and protect yourself from ongoing threats we have little control over.</p>

    <p>If you feel harassed or threatened don\'t be afraid to block and report that person.</p>

    <p>If you have something that needs to be removed or may find offensive please contact us ASAP in your feedback tab or post and we will investigate for removal.</p>

    <p>Please note that your voices are heard here if you like a feature to be added or displeased with a feature please contact us in your feedback tab and we will most likely get it created. If you have a general question just shoot us a message we will respond ASAP, after all its each and everyone of you that keep us running.</p>

    <span id="security" class="hdrTitle">Security</span>
    <span class="hdrDate" note6="last updated">'.timeAgo(strtotime('2023-05-02 00:31:00')).'</span>

    <p>Only you '.$log_username.', have the true power in protecting and keeping yourself from danger. Please follow our policies, terms & guidelines to ensure a fun and safe environment.<br /> <b>Please do not post anything that will put you in a situation of danger, or anything that will cause you to be banned or suspended '.$log_username.'.</b><br/><small>Please understand that, Any database will retain information to be stored for interaction. (we will review information to maintain your safety.) Note that this is the Internet and some things are truly never deleted, hidden Nor can be 100% protected.</small> <br/><b>We will do our best to ensure the protection of your information and safety.</b></p>

    <p>We will do our best to keep your content safe, and free. Please note that we are still human and you are mainly in control of what you post. Although we do not have many strict limitations of what you post, we just ask that you follow our policy &nbsp; terms and follow various adopted Internet polices, laws, and acts including those of the Digital Millennium Copyright Act.</p>

    <p><span class="alert">**</span> Upon signing up or browsing please note that we do not ask for your age, thus assuming that you are of a mature and Internet knowledgeable age. User friendly visibility and interaction options will be rushed in future updates.<span class="alert">**</span></p>

    <p><span class="alert">*</span>Note that some content will be shown due to our policy, we recommend if you feel uncomfortable that you only search and connect with people or post that you enjoy.</p>

    <p>Content visibility and viewer friendly options will be released in future updates.</p>

    <span id="profile" class="hdrTitle">Profile</span>
    <span class="hdrDate" note6="last updated">'.timeAgo(strtotime('2023-05-02 00:31:00')).'</span>

    <p>This is a place where a user can view and interact with all the content listed below.</p>

    <span class="snd_topic">connections</span>
    <p>These are upon request from a user. Users who are connected has access to both their activity which is alerted in the users feed.</p>
    <b><span class="alert">*</span> FAQ</b>
    <p>How can I get more connections?</p>
        <ol>
          <li>Search in the search bar.</li>
          <li>Promote on social media.</li>
          <li>Get your friends to join.</li>
          <li>promote yourself through out the website and app.</li>
        </ol>
    <br />
    <span class="snd_topic">notifications</span>
    <p>This is a notification area displayed in a dropdown box visible when the user clicks the notification beacon located on the top right of the header.</p>
    <p>This will turn green notifying that the user has a notification.</p>
      <ul>
        <li>connection request are a request from a user who wish to connect with you.</li>
        <li>The feed allows the user to see any activity between them and their connections.</li>
      </ul>
    <br />
    <span class="snd_topic">profile photo</span>
    <p>This is a 300x300 image of your choice that further ads personality to your profile page. This is located to the top left of anyones profile page.</p>
    <span class="snd_topic">banner image</span>
    <p>This is a 880x250 image of your choice that further ads personality to your profile page. This is located to the top right of anyones profile page.</p>
    <b><span class="alert">*</span> FAQ</b>
    <p>How big does this have to be?</p>
    <ul>
      <li>Dimensions can be found on the placeholder image.</li>
    </ul>
    <p>Do I need to add this?</p>
    <ul>
      <li>No, however there will be a placeholder image until you update your banner.</li>
    </ul>
    <br /><br />
    <span class="snd_topic">photos</span>
    <p>You can add photos to your page by uploading them in the photos tab or post.</p>

    <span class="snd_topic">videos</span>
    <p>At the moment videos are unavailable but will be added in the next update.</p>

    <span class="snd_topic">Messages</span>
    <p>At the moment messages are unavailable but will be added in future updates.</p>

    <b><span class="alert">*</span> FAQ</b>
    <p>How can I get in contact with someone?</p>
    <ul>
      <li>Just send them a connection request.</li>
      <li>simply post a message in there arena.</li>
      <li>Set post to private.</li>
    </ul>
    <br /><br />
    <span class="snd_topic">username</span>
    <p>This is the name you provide at login located on various portions of the website and app.</p>
    <b><span class="alert">*</span> FAQ</b>
    <p>why not your name?</p>
    <ul>
      <li>You can do this if you want. Just add this in the settings.</li>
        <span class="li_push">1. under page just select display your (full name) instead of (username) in the dropdown.</span>
        <span class="li_push">2. You must add your name if you want it to show.</span>
    </ul>
    <p>Can I use my real name?</p>
    <ul>
      <li>Sure, but you don\'t have to.</li>
    </ul>
    <br /><br />
    <span class="snd_topic">verified</span>
    <p>Verified users will be noticeable on there post and profile page with a <span class="v_symbol" title="verified">&#x2713;</span> symbol next to there usernames. These users will have a higher notice rate among the website.</p>
    <b><span class="alert">*</span> FAQ</b>
    <p>How do I get verified?</p>
    <ul>
      <li>Login often</li>
      <li>post consistently in your arena.</li>
      <li>Comment and like often</li>
    </ul>
    <p>How can I get verified without being so active.</p>
    <ol>
      <li>If you are a reputable source contact us and we will make you a verified user.</li>
      <li>If we notice that you are posting insightful post we will make you verified.</li>
      <li>Get tons of connections.</li>
      <li>promote your post often. (at least once a month)</li>
    </ol>
    <p>Im famous or known. Does this make me verified?</p>
    <ol>
      <li>Yes and No, Just contact us proving your who you say you are then you will become verified.</li>
      <li>Proof material may very. We will let you decide what proves you.</li>
        <span class="li_push">No need to send confidential documents.</span>
    </ol>
    <p>Is it hard to get verified?</p>
    <ol>
      <li>Yes and No.</li>
    </ol>
    <p>Do I get any finical kickbacks?</p>
    <ul>
      <li>At the time, No however this is plausible (most likely) to change in the future.</li>
    </ul>
    <br /><br />
    <span class="snd_topic">tag-line</span>
    <p>This is a short little bio about your self located to the left on your profile page beneath your views.</p>
    <b><span class="alert">*</span> FAQ</b>
    <p>Do I need to add this?</p>
    <ol>
    <li>No but it ads personality to your page.</li>
    </ol>

    <span class="snd_topic">feedback</span>
    <p>This can be found on the bottom left of mostly any page. Just click the message in the box (feedback box) then enter and send your question.</p>
    <p>We will get back to you ASAP (likely the same day) with your question or input below your feedback box.</p>
    <span class="snd_topic">alerts</span>
    <p>This is a beacon located in your header that alerts you when you have a connection request or post.</p>
    <span class="snd_topic">views</span>
    <p>It\'s located just beneath your profile photo. This lets you see how many people came to your page.</p>
    <span class="snd_topic">block</span>
    <p>You may choose to block or unblock a user on there profile page located in the nav after clicking (…).
    You may unblock at anytime.</p>
    <span class="snd_topic">delete</span>
    <p>You may delete your page and content in the settings.</p>
    <b><span class="alert">*</span> FAQ</b>
    <p>Can I retrieve my account?</p>
    <ul>
    <li>Yes, just log back in with your last known username and password. If trouble may occur please contact us.</li>
    </ul>

    <br />

    <span id="emoj" class="hdrTitle">Emoticons</span>
    <span class="hdrDate" note6="last updated">'.timeAgo(strtotime('2023-05-02 00:31:00')).'</span>

    <p>Add some emoticons and symbols to your post to add some flavor. Just type the symbol inside of brackets. Ex. <span class="lnk_green">[umbr]</span> will give you a <span class="emo-example">&#9730;</span></p>


    <span class="emo-link"><b>Courtesy of:</b> <a href="http://www.alt-codes.net/" target="_blank">alt-codes.net</a></span>

    <span id="search" class="hdrTitle">Search</span>
    <span class="hdrDate" note6="last updated">'.timeAgo(strtotime('2023-05-02 00:31:00')).'</span>

    <p>Search hashtags, users, photos, post etc. to locate faster and browse.</p>
    <p><span class="alert">*</span> Note that updates to the search function are in progress.</p>

    <span id="arena" class="hdrTitle">Arena</span>
    <span class="hdrDate" note6="last updated">'.timeAgo(strtotime('2023-05-02 00:31:00')).'</span>

    <p>This is where a user would post any comment, photo, message, link, hashtags, etc.</p>
    <span class="snd_topic">profile photo</span>
    <p>The profile photo is unavailable in your post, comments and header. However this will be added  in future updates.</p>
    <span class="snd_topic">private post</span>
    <p>This is a post that someone has posted in your arena (or vice versa) that only you and that person can see and interact on.</p>
    <span class="snd_topic">hide/unhide</span>
    <p>This allows only the person who posted the post to depict whether its shown to the public or not.</p>
    <b><span class="alert">*</span> FAQ</b>
    <p>How can I do this?</p>
    <ol>
    <li>Post in someone\'s arena.</li>
    <li>Hover over the (…) icon and select private.</li>
    </ol>
    <span class="snd_topic">(URL)\'s / links</span>
    <p>Post links and image (URL) links to your page and watch them come alive.</p>
    <p><span class="alert">*</span> You can post just about anything just make sure you read our policy &nbsp; terms prior.</p>
    <span class="snd_topic">upload photos</span>
    <p>You can upload or post these on yours or someone else\'s post. This can be done with a file or a link (URL) to that image.</p>
    <p>At the moment comments to your gallery are unavailable however will be added in the next update.</p>
    <span class="snd_topic">text</span>
    <p>This is any word or letters that is posted.</p>
    <span class="snd_topic">hashtags</span>
    <p>These are any words or phrases that began with the # symbol.</p>
    <b><span class="alert">*</span> FAQ</b>
    <p>How can I find these?</p>
    <ol>
    <li>Find them highlighted on someones arena, and click them.</li>
    <li>Type <span class="lnk_green">#example</span> in the search bar and click enter.</li>
    </ol>
    <p>How can I create them?</p>
    <ol>
    <li>just type <span class="lnk_green">#</span> in front of your word or phrase.</li>
    </ol>
    <span class="snd_topic">commenting</span>
    <p>On a post you can comment with text URL\'s, IMG URLS</p>
    <span class="snd_topic">like</span>
    <p>On a post you can click like if you like something.</p>
    <b><span class="alert">*</span> FAQ</b>
    <p>How can I get more likes?</p>
    <ol>
    <li>Use <span class="lnk_green">#hashtags</span>.</li>
    <li>Get more connections.</li>
    <li>post awesome stuff.</li>
    </ol>

    <span id="trends" class="hdrTitle">Trends</span>
    <span class="hdrDate" note6="last updated">'.timeAgo(strtotime('2023-05-02 00:31:00')).'</span>

    <p>These are post and users that have a high amount of likes, views and comments.</p>
    <b><span class="alert">*</span> FAQ</b>
    <p>Where are these at?</p>
    <ul>
    <li>These are located in the right sidebar on a page.</li>
    </ul>
    <p>How can I get my post trending?</p>
    <ol>
    <li>Get allot of likes and comments on you post.</li>
    </ol>
    <p>How can I get myself trending?</p>
    <ol>
    <li>Get allot of connections, likes and comments to you and your post.</li>
    </ol>

    <span id="news" class="hdrTitle">News</span>
    <span class="hdrDate" note6="last updated">'.timeAgo(strtotime('2023-05-02 00:31:00')).'</span>

    <p>These are any current events that are trending mostly related to news.</p>
</div>
';

$info_3 = '
<div id="info_3">
    <h3>WEBSITE DISCLAIMER: for Kodoninja by Aviyon</h3>

    <p>We are doing our best to prepare the content of this site. However, Kodoninja cannot warranty the expressions and suggestions of the contents, as well as its accuracy. In addition, to the extent permitted by the law, Kodoninja shall not be responsible for any losses and/or damages due to the usage of the information on our website. </p>

    <p>The information provided by Kodoninja (“we,” “us” or “our”) on https://kodoninja.com/ (the “Site”) is for general informational And entertainment purposes only. All information on the Site is provided in good faith, however, we make no representation or warranty of any kind, express or implied, regarding the accuracy, adequacy, validity, reliability, availability or completeness of any information on the Site. UNDER NO CIRCUMSTANCE SHALL WE HAVE ANY LIABILITY TO YOU FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF THE SITE OR RELIANCE ON ANY INFORMATION PROVIDED ON THE SITE. YOUR USE OF THE SITE AND YOUR RELIANCE ON ANY INFORMATION ON THE SITE IS SOLELY AT YOUR OWN RISK.</p>
    
    <p>By using our website, you hereby consent to our disclaimer and agree to its terms. <b>Disclaimer was generated through common templated terms found online</b></p>

    <h4>EXTERNAL LINKS DISCLAIMER</h4>

    <p>The Site may contain (or you may be sent through the Site) links to other websites or content belonging to or originating from third parties or links to websites and features in banners or other advertising. Such external links are not investigated, monitored, or checked for accuracy, adequacy, validity, reliability, availability or completeness by us. WE DO NOT WARRANT, ENDORSE, GUARANTEE, OR ASSUME RESPONSIBILITY FOR THE ACCURACY OR RELIABILITY OF ANY INFORMATION OFFERED BY THIRD PARTY WEBSITES LINKED THROUGH THE SITE OR ANY WEBSITE OR FEATURE LINKED IN ANY BANNER OR OTHER ADVERTISING. WE WILL NOT BE A PARTY TO OR IN ANY WAY BE RESPONSIBLE FOR MONITORING ANY TRANSACTION BETWEEN YOU AND THIRD PARTY PROVIDERS OF PRODUCTS OR SERVICES.</p>

    <h4>PROFESSIONAL DISCLAIMER</h4>

    <p>The Site cannot and does not contain medical or mental health advice. The medical mental health information is provided for general informational and educational purposes only and is not a substitute for professional advice. Accordingly, before taking any actions based upon such information, we encourage you to consult with the appropriate professionals. We do not provide any kind of medical or mental health advice, other than those based on personal experience. THE USE OR RELIANCE OF ANY INFORMATION CONTAINED ON THIS SITE IS SOLELY AT YOUR OWN RISK.</p>

    <h4>AFFILIATES DISCLAIMER</h4>

    <p>We are a participant in the Amazon Services LLC Associates Program, an affiliate advertising program designed to provide a means for us to earn advertising fees by linking to Amazon.com and affiliated websites.</p>
</div>
';

$rgt_lgc = '
<div class="rgt-lgc fr">
    '.$pge_Rpanel.'
</div>
';

if ($p_load == 'f') {
  $blogNav = '
  <ul class="usrNav0-Wpr">
      <li id="usrCNT_1x" class="selU">Everything</li>
      <li id="usrCNT_1a">Terms</li>
      <li id="usrCNT_2a">About</li>
      <li id="usrCNT_3a">Disclaimer</li>         
  </ul>
  ';

  $mainVw3 = '
  <div class="db mainVw3" style="margin: 25px auto 0px">
      <div class="lft-lgc2 fl">
          '.$blogNav.'
          <div class="bck_wht cNt-Bdy">
              <div id="usrCNT_1">
                  '.$info_1.'
              </div>
              <div id="usrCNT_2">
                  '.$info_2.'
              </div>
              <div id="usrCNT_3">
                  '.$info_3.'
              </div>
          </div>
      </div>
      '.$rgt_lgc.'
  </div>
  ';

$infoBdy_Full = "$blogNav $mainVw3";


} else if ($p_load == 'm') {
  $blogNav = '
  <div class="blogNav">
        <select class="blogSel">
            <option id="usrCNT_1x" value="0" selected>
              Everyhing
            </option>
            <option id="usrCNT_1a" value="1">
              Terms
            </option>
            <option id="usrCNT_2a" value="2">
              About
            </option>
            <option id="usrCNT_3a" value="3">
              Disclaimer
            </option>
        </select>
    </div>
  ';

  $mainVw3 = '
  <div class="db mainVw3 pad_T">
      <div class="lft-lgc2 fl">
          <div class="fPnl-Bck">
              <div id="usrCNT_1" class="pad_T">
                  '.$info_1.'
              </div>
              <div id="usrCNT_2" class="pad_T">
                  '.$info_2.'
              </div>
              <div id="usrCNT_3" class="pad_T">
                  '.$info_3.'
              </div>
          </div>
      </div>
      '.$rgt_lgc.'
  </div>
  ';

  $infoBdy_Full = "$blogNav $mainVw3";

}
?>
