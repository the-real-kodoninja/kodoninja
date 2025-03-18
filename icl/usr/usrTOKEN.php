<?php
// create: 
// input for token/egg codes 
//
$tkn_Inp = "";
$full_TOKEN = "";
$token_count = "";
$usrTkn_log = "";
$pnl5_edit_1 = "";

try {
    if($sqlo_____dbx___xX__->query(
        $sqlTkn = "SELECT DISTINCT u.*,tl.* 
        FROM users AS u 
        INNER JOIN token_log AS tl 
        WHERE u.id = '$uid'
        AND tl.uid = u.id
        ORDER BY tl.date DESC 
        LIMIT 10")->fetchColumn()) {
        if($sql_tkn = $sqlo_____dbx___xX__->query($sqlTkn)->fetchColumn()){
            foreach ($sql______dbx___xX__->query($sqlTkn) as $roo0w____X___xX__) {
                // users
                $token_count = $roo0w____X___xX__["token"];
                // token_log
                $token_uid = $roo0w____X___xX__["uid"];
                //
                $token_amnt = $roo0w____X___xX__["amount"];
                $token_math = $roo0w____X___xX__["math"];
                $token_OldTotl = $roo0w____X___xX__["old_total"];
                $token_NewTotl = $roo0w____X___xX__["new_total"];
                $token_mthd = $roo0w____X___xX__["method"];
                $token_date = timeAgo(strtotime($roo0w____X___xX__["date"]));

                if ($token_math == "-") {
                    $tknClr_r = '<span style="color: darkred;">';
                    $token_math = ''.$tknClr_r.''.$token_math.'</span>';
                    $token_AmntView = '
                        '.$token_math.'
                        '.$tknClr_r.''.$token_amnt.'</span>
                        = ('.$token_NewTotl.')
                    ';
                } if ($token_math == "+") {
                    $tknClr_g = '<span style="color: darkgreen;">';
                    $token_math = ''.$tknClr_g.''.$token_math.'</span>';
                    $token_AmntView = '
                        '.$token_math.'
                        '.$tknClr_g.''.$token_amnt.'</span>
                        = ('.$token_NewTotl.')
                    ';
                }


                $usrTkn_log .= '
                <li>
                    <div>
                        <span>'.$token_AmntView.'</span>
                        <span class="fr">'.$token_date.'</span>
                    </div>
                    <div>'.$token_mthd.'</div>
                </li>
                ';
            }
        } else {
            $usrTkn_log = '
            <li>
                <div>
                    '.$u.' doesn\'t have any tokens in there log. 
                </div>
            </li>
            ';
        }
    }
} catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
} 
//
//
if ($path == "p1") {
    $ld5_CNT_1 = 'class="usrConts"';
} if ($path == "p2") {
    $ld5_CNT_1 = "class=\"usrBdy pad_T\"";
}


if($uid == $log_id && $user_ok || $uid === "2") {
    if($uid == $log_id && $user_ok) {
        $tkn_Inp = '
        <div class="pad-T">
            <input type="text" id="tkn_codeEntry" placeholder="Token code entry"/>
        </div>
        ';
    }
    $pnl5_edit_1  = '
    <div class="edit-B_Wpr pad-T fR dN ">
        <i class="pnl_edit-B"></i>
    </div>
    ';
}

if ($uid === "2") {
    $token_count = "&#8734; > 9999999999";
}

$tkn_Bdy = '
<div class="tkn_Bdy">
    '.$tkn_Inp.'
    <ul class="usrTkn_UL">
        '.$usrTkn_log.'
    </ul>
</div>
';

$full_TOKEN = '
<div id="usrCNT_7a" class="usrCNT-div usrConts">
    <div class="usrHdr">
        <div class="pad-T dI">
            Kodotokens
        </div>
        <div class="edit-B_Wpr pad-T fR dI ">
            <span class="tkn_Crrnt">'.$token_count.'</span>
        </div>
        '.$pnl5_edit_1.'
    </div>
    '.$tkn_Bdy.'
</div>
';

?>