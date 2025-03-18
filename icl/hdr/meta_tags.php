<?php 
$sCrt_1 = "";
$sCrt_7 = "";
$siteDesc = 'The coding ninja platform is the ultimate Guide to Personal Development and financial freedom. Our growing community will help you learn and create new income streams through software development, Investing, day-trading, money management, etc. Our aim is to also get you physically fit, healthy, motivated, and confident to accomplish your daily life. So sit back learn, absorb, and put into practice everything your learning from our platform.';

$ftr_cpyFtr = '&copy;<script>document.write(new Date().getFullYear())</script> kodoverse <a href="info.php?i=1">terms</a> / <a href="help.php">help</a> / <a href="contact.php">contact</a> / <a onclick="mNws_modx()">newsletter</a> / <a href="kodospace.php">kodospace</a>';
if ($page == 'membership') {
    $glbl_ftr = '
    <div class="mem_ftr">
        <small class="dN">Hoover over list to give an explination over the topic</small><br>&nbsp;</br>
        <div>
             '.$ftr_cpyFtr.'
            <div>
                Checkouts are done via <a target="_blank" href="https://slash.fi/t"><img style="height: 20px; width: auto;" src="'.$m_path.'css/svg/slash-logo_full.svg"></a> & <a target="_blank" href="https://stripe.com/en-gb-us/payments/checkout"><img style="height: 20px; width: auto;" src="'.$m_path.'css/svg/stripe-seeklogo.com.svg"></a>
            </div>
        </div>
        
    </div>
    '.$scl_sub.'
    '.$sCrt_1.'
    ';
} else {
    $glbl_ftr = '
    <div class="dI">
         '.$ftr_cpyFtr.'
    </div>
    '.$scl_sub.'
    '.$sCrt_1.'
    ';
}

?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P8DNSX9');</script>
<!-- End Google Tag Manager -->
<!-- for information on updates and what was added, removed, fixed, or tweaked, please click on edit_logs.txt below -->
<!-- -------------------------------------------------------------------------------------------------------------- -->
<link type="text/plain" href="edit_logs.txt" />
<!-- -------------------------------------------------------------------------------------------------------------- -->
<link type="text/plain" rel="author" href="<?php echo $m_path; ?>humans.txt" />
<link type="text/plain" href="<?php echo $m_path; ?>robots.txt" />
<link rel="stylesheet" href="<?php echo $m_path; ?>css/foundation.zurb/foundation-icons.css" />
<link href="<?php echo $m_path; ?>css/pst/font-awesome_6.1.1.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link href="css/mcss.css" rel="stylesheet">
<link href="css/hdr/header.css" rel="stylesheet">
<link href="css/blg/mcss.css" rel="stylesheet">
<link href="css/frm/mcss.css" rel="stylesheet">
<link href="css/usr/mcss.css" rel="stylesheet">
<link href="css/pst/post.css" rel="stylesheet">
<meta name="p:domain_verify" content="ec15e3a81b7f9438ba4c5069851af5af"/>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta google-site-verification=2TljSLN0tyiqlDP7e4lGxysI17v_CkjEmHFK810xqkE />
<meta name="keywords" content="<?php echo $u; ?>, <?php echo $log_username; ?>, blog, Personal Development, software development, financial freedom, Success, money management, self love, couching, courses, social media class, create full-stack, full-stack, software development, fitness, dieting, app building, social, connect, friends, anonymous, comment, share, self love, Emmanuel Moore"/>
<meta name="robots" content="max-snippet:-1,max-image-preview:standard,max-video-preview:-1" />
<meta name="description" content="<?php echo $siteDesc; ?>" />
<meta property="og:description" content="<?php echo $siteDesc; ?>"/>
<link rel="icon" type="image/svg+xml" href="<?php echo $m_path ?>logo/logo.svg">

<?php
$mtData_blog = "";
if ($page == "blog" || $page == "view") {
    if (!isset($cov_vc)) {
        $cov_vc = "";
        $cov_vc2 = "";
        $cov3_vc = "";
        $prg1_gc = "";
        $y_vid = "";
        $d_vc2 = "";
        $cln = "'";
        $p_vc = "";
        $d_vc = "";
        $date_vc = "";
        $t = "";
        $cat_vc = "";
        $id_vc = "";
        $t_vc = "";
        $descData = "";
    }
    $mtData_blog = '
    <!-- ----------- -->
    <meta property="article:published_time" content="'.$date_vc.'" />
    <meta property="article:modified_time" content="'.$date_vc.'" />
    <meta property="og:updated_time" content="'.$date_vc.'" />
    <!-- share icons -->
    <!-- ----------- -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Guide to Personal Development, software development, financial freedom, Success, money management, self love | SUCCESS" />
    <meta property="og:url" content="https://www.kodoninja.com/" />
    <meta property="og:site_name" content="SUCCESS" />
    <!-- facebook / linkedin -->
    <meta property="og:url"           content="https://kodoninja.com/view.php?t='.$t.'&c='.$cat_vc.'&v='.$id_vc.'" />
    <meta property="og:type"          content="article/image/png" />
    <meta property="og:title"         content="'.$t_vc.'" />
    <meta property="og:description"   content="'.$descData.'" />
    <meta property="og:image"         content="https://www.kodoninja.com/'.$t.'/img/'.$id_vc.'/'.$cov3_vc.'" />
    <meta property="og:image:width" content="100%>   
    <meta property="og:image:height" content="auto">   
    <!-- ----------- -->

    <!-- twitter -->
    <meta name="twitter:card" content="article" />
    <meta name="twitter:site" content="@kodoninja" />
    <meta name="twitter:title" content="'.$t_vc.'" />
    <meta name="twitter:description" content="'.$descData.'" />
    <meta name="twitter:image" content="https://www.kodoninja.com/'.$t.'/img/'.$id_vc.'/'.$cov3_vc.'" />
    <!-- ----------- -->
    ';
}
?>


<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZKDEZD3GTK"></script> -->
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZKDEZD3GTK');
</script>
<script data-ad-client="ca-pub-3169234617549987" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
