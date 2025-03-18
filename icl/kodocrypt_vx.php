<?php
// password hash
// hash version
function kodohash_modify($_____pass____x__x_1) {
    $kodocrypt = "kodocrypt_v1";
    $_____pass____x__x_1b = hash("gost", hash('sha256', sha1($kodocrypt.filter_var($_____pass____x__x_1,FILTER_DEFAULT))));
    $key = 'cdLTCHW95FjHF6ESu2Rkm-90AUbzDBv71HrdshsEx3k';
    $iv = 'b16ezD5O05EDNovs';
    $hashKey = substr(hash('sha256', $key), 0, 32);
    return openssl_encrypt($_____pass____x__x_1b, "AES-256-CBC", $hashKey, OPENSSL_ZERO_PADDING, $iv);
} 
// passed through login, signup, forgot as well
function kodohash_verify($_____pass____x__x_1, $_____pass____x__x_2) {
    if ($_____pass____x__x_1 === $_____pass____x__x_2) {  
        return true;
    } else {
        return false;
    }
}

function codeCnts($_____pass____x__x_x) {
    $sltShkr_1 = ['memory_cost' => PASSWORD_ARGON2_DEFAULT_MEMORY_COST, 
                'time_cost' => PASSWORD_ARGON2_DEFAULT_TIME_COST, 
                'threads' => PASSWORD_ARGON2_DEFAULT_THREADS];
    $sltShkr_2 = password_hash($_____pass____x__x_x, PASSWORD_BCRYPT, $sltShkr_1);
    return substr($sltShkr_2, -10);
}

function setHSH($_____uidx____x__x_1,$_____unme____x__x_1,$_____pass____x__x_1) {
    $setUnq_ncde = md5($_____uidx____x__x_1).md5($_____unme____x__x_1).md5($_____pass____x__x_1);
    $_COOKIE['setUnq_ncde'] = $setUnq_ncde;
    // return $_COOKIE['sncde'] = setcookie("sncde", $setUnq_ncde, time() + 50000, "/");
}
?>