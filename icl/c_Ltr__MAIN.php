<?php
$message = '
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>kodoninja - Kodoverse newsletter verification</title>
<style>
    body {
        margin: 20px;
        font-family:Lato,Helvetica Neue,Helvetica,Arial,sans-serif;
    }
    a {
        color: darkred;
    }
    .header-Wpr {
        height: 50px;
        width: 100%;
        background-color: #3d4347;
        left: 0;
        right: 0;
        top: 0px;
        position: fixed;
        display: block;
        z-index: 4;
    }
    .bnrHdr-Wpr {
        margin: 65px 0px 0px;
    }
    #btn {
        padding: 10px;
        margin: 20px 0px 0px;
        background-color: darkred;
        text-decoration: none;
        text-align: center;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        display: block;
    }
    #btn:hover {
    background-color: #3d4347;
    color: #fff;
}

.cNt-Bdy {
    bottom: 0;
    position: absolute;
    margin: 0px 0px 20px;
}
.hdrInr {
margin: 5px 10px 10px 10px;
}
.logoX {
    background-image: url(https://kodoninja.com/logo/logo.svg);
    height: 37px;
    width: 41px;
    background-size: 33px auto;
    background-repeat: no-repeat;
    float: left;
}
.hdrInr span {
    color: #fff;
    font-size: 20px;
    margin: 5px 0px 0px 8px;
    position: absolute;
}
</style>
</head>
<body>
    <div class="header-Wpr">
        <div class="hdrInr">
            <div class="logoX"></div>
            <span>Welcome to the kodoverse</span>
        </div>
    </div>
    <div class="bnrHdr-Wpr">
        <h2 style="text-align: center;">'.$c_Ltr__ttl.'</h2>
    </div>
    <!-- global body contents -->
    <div class="mNwsBdy">
        '.$c_Ltr__bdy.'
    </div>
   
    <!-- contains global self contained footer -->
    <!-- no need to change -->
    <footer class="cNt-Bdy">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9027389483559415"
        crossorigin="anonymous"></script>

        <input class="w100" style="background: transparent;border: none;" type="" value=""/>
        <div id="amzn-assoc-ad-3689a600-e773-40e9-952c-f0248fb06c45"></div><script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=3689a600-e773-40e9-952c-f0248fb06c45"></script>
        
        <div class="dI">
            &copy; Kodoninja <script>document.write(new Date().getFullYear())</script> by Emmanuel // <a href="https://www.aviyon.co" target="_blank">aviyon</a> / <a href="https://www.kodoninja.com/info.php?i=1">terms</a> / <a href="https://www.kodoninja.com/help.php">help</a> / <a href="https://www.kodoninja.com/contact.php">contact</a>
        </div>


        <div style="font-size: 5px;">CLUE 1: The kodoverse platforms are flooded with countless weekly added easter eggs that earn you tokens; These can be used for merch, gift cards, crypto, money and more. Shhhh... Don\'t tell anyone.</div>
    </footer>
</body>
</html>
';
?>