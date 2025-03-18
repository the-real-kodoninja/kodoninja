<?php 
// run on every thing user is required
function meowRes($sqlo_____dbx___xX__,$___uidx__res,$___ursx__res,$___icl__res,$___icl__res2) {
    if ($cnnc_t && $___uidx__res && $___ursx__res || $___icl__res || $___icl__res2) {
        $meowRes_FULL = "";
        try {
            if($__sql_res = "SELECT DISTINCT * FROM users WHERE id = '$___uidx__res' LIMIT 1") {
                foreach ($sqlo_____dbx___xX__->query($__sql_res) as $roo0w____X___xX__) {
                    if(isset($roo0w____X___xX__["id"])) {$___uid__res = $roo0w____X___xX__["id"];}
                    if(isset($roo0w____X___xX__["username"])) {$___unme__res = $roo0w____X___xX__["username"];}
                    if(isset($roo0w____X___xX__["avatar"])) {$___uavt__res = $roo0w____X___xX__["avatar"];}
                    $___ADMIN = '
                    <img class="cntMSgUsrImg" src="u/'.$___uid__res.'/'.$___uavt__res.'" alt="'.$___unme__res.'">
                    <div class="cntMsgUsrStat">
                        <a href="user.php?u='.$___unme__res.'">'.$___unme__res.'</a>
                        <span>1 sec ago</span>
                    </div>
                    ';
                    if ($___ursx__res === "r1p1") {
                        return  '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span>Okay... checking <b>'.$___icl__res.'</b> for matching case number or email. I\'ll let you know when I have a match, meow.</span>
                            </div>
                        </div>
                        ';
                    } if ($___ursx__res === "r2p1") {
                        return  '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span><b>Awesome</b> Looks like we have a match meow, hang on I\'m sending you a email to <b>'.$___icl__res.'</b> to confirm; so you may re-enter the case.</span>
                            </div>
                        </div>
                        ';
                    } if ($___ursx__res === "r3p1") {
                        return  '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span><b>Success</b> just click that link I just sent to your email to <b>'.$___icl__res.'</b> so I\'ll know its actually you. I\'ll see you in a bit, meow.</span>
                            </div>
                        </div>
                        ';
                    } if ($___ursx__res === "r4p1") {
                        return  '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span>Still checking our database for <b>'.$___icl__res.'</b> nothing yet.</span>
                            </div>
                        </div>
                        ';
                    } if ($___ursx__res === "r1p2") {
                        $meowRes_FULL .= '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span>Start the message below so someone can help asap, meow</span>
                            </div>
                        </div>
                        ';
                        $meowRes_FULL .= '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span>we usally respond whithin 1 hour, meow</span>
                            </div>
                        </div>
                        ';
                        return $meowRes_FULL;
                    } if ($___ursx__res === "r1p3") {
                        return  '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span>Hmm you need to have something in the body</span>
                            </div>
                        </div>
                        ';
                    } if ($___ursx__res === "r2p3") {
                        return  '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span>Sorry please enter a email so we may get back to you. you can also always come here to the (<i>contact page</i>) to reply and check your case status</span>
                            </div>
                        </div>
                        ';
                    } if ($___ursx__res === "r3p3") {
                        return  '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span><b>Success</b> Your case <b>'.$___icl__res.'</b> has been created under the email <b>'.$___icl__res2.'</b>, theres no password so whenever you need to check your case status and responses, come back here enter this email ('.$___icl__res2.') in the same email bar. We\'ll pull up the case and we\'ll get you logged in with our verification system.</span>
                            </div>
                        </div>
                        ';
                    } if ($___ursx__res === "r4p3") {
                        return  '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span>We added this case <b>'.$___icl__res.'</b> to your email <b>'.$___icl__res2.'</b> whenever you come back you can find all your cases.</span>
                            </div>
                        </div>
                        ';
                    } if ($___ursx__res === "r5p3") {
                        return  '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span>Received,.. we’ll let you know when we respond. Should be within the day :)</span>
                            </div>
                        </div>
                        ';
                    } if ($___ursx__res === "r1p4") {
                        return  '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span>What can I help you with meow.</span>
                            </div>
                        </div>
                        ';
                    } if ($___ursx__res === "r2p4") {
                        $meowRes_FULL .= '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span>Hey there and welcome, our contact services are open to anyone. Feel free to let us know what you may need help with.</span>
                            </div>
                        </div>
                        ';
                        $meowRes_FULL .= '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span>Not a basic+ user no problem be sure to enter your email or case # above so we can get back to you, or create an account.</span>
                            </div>
                        </div>
                        ';
                        $meowRes_FULL .= '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span>If you opened a case before will load it below, no need to press enter</span>
                            </div>
                        </div>
                        ';
                        $meowRes_FULL .= '
                        <div class="cntMsgCtr_B">
                            '.$___ADMIN.'
                            <div class="cntMsgUsr_B">
                                <span>Don\'t worry we\'ll email your new case # to you</span>
                            </div>
                        </div>
                        ';
                        return $meowRes_FULL;
                    }
                }
            }
        } catch (PDOException $newError) {
            newError($sqlo_____dbx___xX__,$___uidx__res,$_SERVER["SCRIPT_NAME"],$newError);
        }
    }
}
?>