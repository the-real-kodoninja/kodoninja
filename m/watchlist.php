<?php
include_once("icl/c_sts.php");
include_once("icl/u_rgts.php");
include_once("prs/time_system.php");
include_once("icl/addons/hashtag.php");
$path = 'p1';
$page = 'watchlist';
$t = "";
$glbF1 = "";
$glbF2 = "";
$glbF3 = "";
?>

<!DOCTYPE html>
<html>
<head>
<title>kodoninja - <?php echo $page; ?></title>
<?php include_once("icl/header/meta_tags.php"); ?>
<link href="css/mcss.css" rel="stylesheet">
<link href="blog/css/mcss_b.css" rel="stylesheet">
<link href="forum/css/mcss_f.css" rel="stylesheet">
<script src="user/js/user.js"></script>
<script>
<!--
document.write("<script src=\"js\/jquery-3.4.1.min.js\"><\/script>");
//-->
</script>
</head>

<body>
    <?php
    include_once("icl/header.php");
    include_once("icl/panel_l.php");
    include_once("icl/watchCnt.php");
    include_once("icl/pge_Extras.php");
    ?>
    
    <!-- banner header start -->
     <div class="bnrHdr-Wpr" style="z-index: -1; top: 50px;">
        <div class="bnrCnt main_Wpr" style="margin: 50px 0px 0px 0px;">
            <span class="bnrTxt db">
                <i>trading</i><a href="watchlist.php"><i><?php echo $page; ?></i></a><!--<i> refresh icon </i>-->
            </span>
         </div>
     </div>

    <script type="application/javascript">
    function usrCNT1X() {
        $('.feed_1').css("display","block");
        $('.feed_2,.feed_3').css("display","none");
    }
        function usrCNT2X() {
        $('.feed_2').css("display","block");
        $('.feed_1,.feed_3').css("display","none");
    }
        function usrCNT3X() {
        $('.feed_3').show();
        $('.feed_1,.feed_2').css("display","none");
    }
    </script>
    
     <!-- banner header end -->
    <div class="db mainVw3 pad_T">
        <!-- user nav view -->
        <ul class="usrNav0-Wpr fPnl-Bck">
            <li>
                <select>
                    <option selected>Sort By:</option>
                    <option>Everything</option>
                    <option>Stocks</option>
                    <option>ETF's</option>
                    <option>Index Funds</option>
                </select>
            </li>
            <li>
                <select>
                    <option>Filter By:</option>
                    <option>Day Trading</option>
                    <option>Swing Trading</option>
                    <option selected>Long Term</option>
                </select>
            </li>
            <div class="wlst">
                <input type="text" placeholder="Search Watchlist">
            </div>

        </ul>
        <div class="lft-lgc2 fl">
            <div class="fPnl-Bck">
                <div id="usrCNT_1">
                    <?php echo $glbF1; ?>
                </div>
                <div id="usrCNT_2">
                    <?php echo $glbF2; ?>
                </div>
                <div id="usrCNT_3">
                    <?php echo $glbF3; ?>
                </div>
            </div>
        </div>
        <div class="rgt-lgc fr">
            <?php echo $pge_Rpanel; ?>
        </div>
    </div>
    <?php include_once("icl/footer.php"); ?>
</body>
<script type="text/javascript">
<!--
document.write('<script type=\"text/javascript" src=\"js\/mjs.js"><\/script>');
//-->
</script>
</html>
