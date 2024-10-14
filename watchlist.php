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
<link href="css/mcss.css" rel="stylesheet">
<link href="blog/css/mcss.css" rel="stylesheet">
<link href="user/css/mcss.css" rel="stylesheet">
<link href="trading/css/trading.css" rel="stylesheet">
<title>kodoninja - <?php echo $page; ?></title>
<?php include_once("icl/header/meta_tags.php"); ?>
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
    include_once("icl/panel_r.php"); 
    include_once("icl/watchCnt.php");
    include_once("icl/pge_Extras.php"); 
    ?>
    <!-- banner header start -->
     <div class="bnrHdr-Wpr" style="top: 30px;">
        <div class="bnrCnt main_Wpr">
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
    <div class="db mainVw3" style="margin: 165px auto;">
        <div class="lft-lgc2 fl">
            <!-- user nav view -->
            <ul class="usrNav0-Wpr">
                <li>
                    <span>Sort By:</span>
                    <select>
                        <option selected>Everything</option>
                        <option>Stocks</option>
                        <option>ETF's</option>
                        <option>Index Funds</option>
                    </select>
                </li>
                <li>
                    <span>Filter By:</span>
                    <select>
                        <option>Day Trading</option>
                        <option>Swing Trading</option>
                        <option selected>Long Term</option>
                    </select>
                </li>
                <div class="wlst fR dI">
                    <input type="text" placeholder="Search Watchlist">
                </div>
                
            </ul>
            <div class="bck_wht" style="padding: 0px;">
                <?php echo ''.$glbF3X.''; ?>
            </div><br>
            <div class="bck_wht">
                <div id="usrCNT_3">
                    <?php echo ''.$glbF3.''; ?>
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
