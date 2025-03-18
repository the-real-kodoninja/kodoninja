<?php
$bckBtn = "";
if ($user_ok && $ulv == '1') {
    $__mLgc1 = "
    <h1>You are a Basic member</h1>
    <h4>Check out the Premium features, it's worth the upgrade!</h4>
    ";
    // checkout via stripe
    // stripe redirct inserts here #
    $memBtn_1a = '<a href="#"><button class="sel">Upgrade to Premium!</button></a>';
    $memBtn_2a = '<button disabled>Your Basic already</button>';
    $wlc_msg1 = $wlc_msg1a;
} else if ($user_ok == true && $ulv >= '2') {
    $__mLgc1 = "
    <h1>Thank You: you are a Premium member</h1>
    <h4>Thanks for being a premium member these are your features as listed.</h4>
    ";
    $wlc_msg1 = '<p>Thank you for being a Paid member.</p>';
    $memBtn_1a = '<button disabled class="sel">Yay your Premium!</button>';
    $memBtn_2a = '<button>Go Basic!</button>';
} if(!$user_ok) {
    $__mLgc1 = "
    <h1>Choose your plan</h1>
    <h4>Upgrade your plan anytime</h4>
    ";
    $memBtn_1a = '<a href="membership.php?'.$loadBtn[1].'&c='.$crt_chk.'"><button class="sel">Go Premium!</button></a>';
    $memBtn_2a = '<a href="membership.php?'.$loadBtn[0].'&c='.$crt_chk.'"><button>Go Basic!</button></a>';
    $wlc_msg1 = $wlc_msg1a;
} 
//
$sgn_lgcX = '
<div class="" id="x_1a">
    '.$__mLgc1.'
    <table class="x_1">
        <tr class="x_1b">
            
            <th>$9.99 <s>12.99</s> <small class="smTxt">/month</small></th>
            <th>$0.00 <small class="smTxt">/month</small></th>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span><b>???</b> FREE kodotokens</span>
            </td>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>500 FREE kodotokens</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span><b>???</b> FREE <u><i>weekly</i></u> kodotokens</span>
            </td>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>25 FREE <u><i>weekly</i></u> kodotokens</span>
            </td>
        </tr>
        <tr>
            <td class="chk_grey">
                <span class="chk_2">X
                </span class="chk_ttl"><span>Ads</span>
            </td>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>Ads</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>user page</span>
            </td>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>user page</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>forum</span>
            </td>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>forum</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>basic blog</span>
            </td>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>basic blog</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>premium blog</span>
            </td>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>premium blog</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>goals</span>
            </td>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>goals</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>guides</span>
            </td>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>guides</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>FREE E-bocks</span>
            </td>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>FREE E-books</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>FREE Tutorials</span>
            </td>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>FREE Tutorials</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>FREE downloads</span>
            </td>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>FREE downloads</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>kodoverse</span>
            </td>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>kodoverse limited</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>FREE Courses</span>
            </td>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>FREE Courses</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>Premium Courses</span>
            </td>
            <td class="chk_grey">
                <span class="chk_2">X
                </span class="chk_ttl"><span>Premium Courses</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>Premium+ Course Discounts</span>
            </td>
            <td class="chk_grey">
                <span class="chk_2">X
                </span class="chk_ttl"><span>Premium+ Course Discountss</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>Premium E-books</span>
            </td>
            <td class="chk_grey">
                <span class="chk_2">X
                </span class="chk_ttl"><span>Premium E-books</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>Dead tree book discounts</span>
            </td>
            <td class="chk_grey">
                <span class="chk_2">X
                </span class="chk_ttl"><span>Dead tree book discounts</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>kodocoin</span>
            </td>
            <td class="chk_grey">
                <span class="chk_2">X
                </span class="chk_ttl"><span>kodocoin</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>Premium downloads</span>
            </td>
            <td class="chk_grey">
                <span class="chk_2">X
                </span class="chk_ttl"><span>Premium downloads</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>Premium Tutorials</span>
            </td>
            <td class="chk_grey">
                <span class="chk_2">X
                </span class="chk_ttl"><span>Premium Tutorials</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>Dead tree books discounts</span>
            </td>
            <td class="chk_grey">
                <span class="chk_2">X
                </span class="chk_ttl"><span>Dead tree books discounts</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>Merch store discounts</span>
            </td>
            <td class="chk_grey">
                <span class="chk_2">X
                </span class="chk_ttl"><span>Merch store discounts</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>FREE monthly merch</span>
            </td>
            <td class="chk_grey">
                <span class="chk_2">X
                </span class="chk_ttl"><span>FREE monthly merch</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>More easter egg hints</span>
            </td>
            <td class="chk_grey">
                <span class="chk_1">&#10004;
                </span class="chk_ttl"><span>Easter egg hints</span>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>'.$memBtn_1a.'</td>
            <td>'.$memBtn_2a.'</td>
        </tr>
    </table>
    <div style="text-align: center;">'.$sCrt_5.'</div>
</div>
';
?>
