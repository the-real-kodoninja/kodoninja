<?php 
include_once("icl/c_sts.php");
include_once("icl/u_rgts.php");
include_once("prs/time_system.php");
include_once("icl/addons/hashtag.php");

// first model to stray away from previous logic

$path = 'p1';
$page = 'trade';
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
<!-- test links -->
<link href="css/global.css" rel="stylesheet">
<link href="css/trade.css" rel="stylesheet">
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
    include_once("icl/feedCnt.php");
    include_once("icl/pge_Extras.php"); 
    ?>
    <!-- banner header start -->
     <div class="bnrHdr-Wpr" style="top: 30px;">
        <div class="bnrCnt main_Wpr">
            <span class="bnrTxt db">
                <a href="feed.php"><i><?php echo $page; ?></i></a><!--<i> refresh icon </i>-->
            </span>
         </div>
     </div>
    
    <div class="glbl__bdyWpr trade__logic">
        <!-- trade header -->
        <div class="trade__fltr">
            <input type="search" placeholder="search trade.php"/>
        </div>
        <div class="trade_pNl-1">
            <button class="glbl__sel-1">All (post)</button>
            <button>Stocks</button>
            <button>Bonds</button>
            <button>Crypto</button>
            <!-- render more button tags based on $, #, and // content grab. bank, investment bank keywords, trading... -->
            <p>Date</p>
            <button>Ascending</button>
            <button>Descending</button>
            <hr>
            <button>
                <!-- input todays date variable -->
                from: <input type="date" value="2017-06-01" />
            </button>
            <button>
                to: <input type="date" value="2022-10-26" />
            </button>
        </div>
        <style>
            .trade_pNl-1 button {
    width: 100%;
    display: block;
    border-radius: 5px;
    margin: 0px 0px 5px 0px;
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 15px 10px;
}

.trade_pNl-1 button:hover, button.glbl__sel-1 {
    background-color: darkred;
    color: #fff;
}
.trade_pNl-1 button input[type=date] {
    border: none;
    background-color: transparent;
}

.glbl__usrpSt-cnTr {
    cursor: pointer;
}

.glbl__usrpSt-cnTr:hover {
    background-color: #f5f5f5;
    border: 1px solid #f4f4f4;
}
        </style>
        <div class="w100 trade_pNl-2 bck__wht fr">
            <!-- post start -->
            <?
            // logic load out for post view
            $uid = "";
            $pid = "";
            ?>
            <div class="glbl__pSt-Wpr glbl__usrpSt-cnTr">
                <div class="glbl__pSt-hDr pad-10">
                    <span class="glbl__udLgc-Wpr di fl" style="line-height: 12px;">
                        <i class="glbl__udLgc-Arw up db"></i>
                        <span style="font-size: 11px; margin: 0px 0px 0px -4px;">000</span>
                        <i class="glbl__udLgc-Arw down db"></i>
                    </span>
                    <div class="glbl__usrpSt-Hdr">
                        <img class="glbl__usrpSt-Img_1" src="user/kodoninja/772478390641.jpg" alt="kodoninja"/>
                        <div>
                            <span>by <a href="">kodoninja</a></span>
                            <span class="verified" title="verified">✓</span>
                        </div>
                        <div><span>Posted: 13 days ago</span></div>
                        <div><a hrf="view.php?u=<?php $uid; ?>&p=<?php $pid; ?>">0 Comments</a></div>
                    </div>
                    <div class="usr_Pst-Bdy dB">Working towards getting a new downtown Seattle studio for everything kodoninja, YouTube including the production company kodofilms... Months away :)</div> 
                </div>
            </div>
            <!-- post end -->
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
