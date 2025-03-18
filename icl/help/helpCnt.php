<?php
$fQa = "";
$hRes = "";
$li = "";
$frqAskQuesA = "";
if (isset($_GET ['h'])) {
    $fQa = preg_replace('#[^0-9]#i', '', $_GET ['h']); 
    $fQa = mysqli_real_escape_string($cnnc_t, $fQa);
} 

$frqAskQuesA = array(
    "helpLog" => array(
        1 => array(
            'question' => "How can I change my username?",
            'answer' => "answer 1 meow",
        ),
        2 => array(
            'question' => "How can I update my page.",
            'answer' => "answer 2 meow",
        ),
        3 => array(
            'question' => "I’m between the ages of 13 <16 how can I change my birthday so I may access NSFW content",
            'answer' => "Although you are allowed to change your birthday twice before submitting a request. we recommend against this",
        ),
        4 => array(
            'question' => "How can I cash in or redeem my kodotokens?",
            'answer' => "answer 4 meow",
        ),
        5 => array(
            'question' => "What is a kodotoken",
            'answer' => "answer 5 meow",
        ),
        6 => array(
            'question' => "What is the kodoverse",
            'answer' => "answer 6 meow",
        ),
        7 => array(
            'question' => "I forgot a login credential. I tried via the forgot page, I was unsuccessful, how can I login",
            'answer' => "answer 7 meow",
        ),
        8 => array(
            'question' => "I didn’t receive my kodotokens",
            'answer' => "answer 8 meow",
        ),
        9 => array(
            'question' => "How can I save a blog post so I may read later?",
            'answer' => "answer 9 meow",
        ),
        10 => array(
            'question' => "I reported a post but it’s still visible. How may I get it removed?",
            'answer' => "answer 10 meow",
        ),
        11 => array(
            'question' => "I want to upgrade my membership. How may I do so?",
            'answer' => "answer 11 meow",
        ),
        12 => array(
            'question' => "I found an error/issue with the platform. How can I report it?",
            'answer' => "answer 12 meow",
        ),
        13 => array(
            'question' => "My account was hacked, please help.",
            'answer' => "answer 13 meow",
        ),
        14 => array(
            'question' => "Can the same login credentials be used across the kodoverse?",
            'answer' => "answer 14 meow",
        ),
        15 => array(
            'question' => "I tried to create a account, it was unsuccessful",
            'answer' => "answer 15 meow",
        ),
        16 => array(
            'question' => "How do I delete my account",
            'answer' => "answer 16 meow",
        ),
        17 => array(
            'question' => "How may I downgrade my membership",
            'answer' => "answer 17 meow",
        ),
        18 => array(
            'question' => "I’m having trouble upgrading my membership.",
            'answer' => "answer 18 meow",
        ),
        19 => array(
            'question' => "How may I apply to work for the kodoverse.",
            'answer' => "answer 19 meow",
        ),
        20 => array(
            'question' => "Does kodoninja have an app?",
            'answer' => "answer 20 meow",
        ),
        21 => array(
            'question' => "What Is kodoninja?",
            'answer' => "answer 21 meow",
        )
    )
);


$h = 0;
foreach($frqAskQuesA["helpLog"] as $key => $value) {
    $h++;
    $li .= '<a href="help.php?h='.$h.'"><li class="fAqLi">'.$value['question'].'</li></a>';
};

$frqAskQues = '
<ul class="frqAskQues">
    '.$li.'
</ul>
';

 if ($fQa) {
    $hRes = ''.$frqAskQuesA["helpLog"][$fQa]["answer"].'';
 }

// // good pass
// $pass1__x_1 = "red20";
// //

//     // global code hase
//     $test_3 = hash('gost', hash('sha256', (md5(sha1(hash('gost', $pass1__x_1).hash('gost', "kodocrypt_v1"))))));






$mnBdy = '
<div class="hpBdyWpr">
    <div class="hpBdyInr1">
        <input id="schHLp" type="search" placeholder="search, or ask me a question"/>
        <div class="hpBdyInr">
            <!-- $fQa load out -->
            <div id="">'.$hRes.'</div>
            <!-- hides on get grab -->
            <div id="hlpRes">'.$frqAskQues.'</div>
        </div>
    </div>
</div>
';

$helpBdy_Full = "$mnBdy";
?>