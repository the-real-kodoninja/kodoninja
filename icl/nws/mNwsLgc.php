<?php
$news_bdy = '
<h2>Join our Newsletter!</h2>
<input id="nws_e" class="nws_e" type="email" placeholder="youremail@mail.com" onkeyup="checkemail()" required/>
<button onclick="mNws_lgc1(\'subYes\')">Join!</button>
<br><br>
<div>Enter email and click <a onclick="mNws_lgc1(\'subNo\')">here</a> to unsubscribe</div>
';

if ($user_ok && $log_id) {
    try {
        if($sqlo_____dbx___xX__->query(
            $sql______x___xX__ = 
            "SELECT DISTINCT u.*,n.* 
            FROM users AS u 
            INNER JOIN news_list AS n 
            WHERE u.id='$log_id' 
            AND u.email = n.email 
            AND n.active = '1' AND u.news_list = '1'
            LIMIT 1")->fetchColumn()) {
                if($sqlo_____dbx___xX__->query($sql______x___xX__)->fetchColumn()) {
                $news_bdy = '
                <h3>Thank you, you\'re subscribed to our newsletter</h3><br>
                Click <a onclick="mNws_lgc1(\'subNo\')">here</a> to unsubscribe
                ';
            } else {
                $news_bdy = '
                <h3>Subscribe to our weekly newsletter</h3><br>
                Click <a onclick="mNws_lgc1(\'subYes\')">here</a> to subscribe with your current email
                ';
            }
        }
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }
}

$news_dsply = '
<div id="mNws_mod" class="mNws-Wpr w100 fL dN">
    <form class="mNws-Inr" onsubmit="return false;">
        <div id="mNws_1a" class="mNws_1a">
            '.$news_bdy.'
        </div>
        <div id="mNws_1b"></div>
    </form>
</div>
';

?>