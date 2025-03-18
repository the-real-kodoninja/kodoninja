<style>
    #copy {
    background-image: url(
'../../css/foundation.zurb/fi-link.svg');
        }
    .fi-social-flipboard {
        background-image: url(
'../../css/svg/Flipboard_logo.svg');
    }
    .fi-social-x {
        background-image: url(
'<?php echo $m_path; ?>css/svg/X_icon.svg');
        height: 28px;
        width: 28px;
        display: block;
        position: relative;
        background-size: cover;
        background-repeat: no-repeat;
        margin: 0px 0px 0px -10px;
    }
</style>
<?php 
// $offset = (370 - 3) - strlen($d2_vc);
// $d2_vc = substr($d2_vc, 0, strrpos($d2_vc, ' ', $offset)) . '...';
$tag2_vc = strip_tags($tag_vc);
$d2_vc = strip_tags($d_vc);
$descData = strip_tags($descData);
$t2_vc = strip_tags($t_vc);
$cat2_vc = strip_tags($cat_vc);
//
$sh_RAwurl = 'https://www.kodoninja.com/';
$sh_url = 'https://www.kodoninja.com/view.php?t=blog&c='.$cat2_vc.'&v='.$id_vc.'';
$sh_url_b = 'https://www.kodoninja.com/view.php&quest;t=blog&c=Selfimprovement&v=40';
// tiny window 
$sh_wnd = 'onclick="window.open(\'this.href,\'\',\'menubar=no\',\'toolbar=no\',\'resizable=yes\',\'scrollbars=yes\',\'height=600\',\'width=600\');return false;" rel="noopener"';
// email logic
$sh_mlt = 'your_email@kodoninja.com';
$sh_ccc = 'another_email@kodoninja.com';
$sh_bcc = 'another_email@kodoninja.com';
$sh_sub = $t2_vc;
$sh_bdy = $t2_vc."%0D%0A%0D%0A".$descData."%0D%0A%0D%0A".$sh_url;

// popup link distrubition
$__fb_shx = 'id="fb_sMod" href="https://www.facebook.com/sharer/sharer.php?u='.$sh_url.'&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore" '.$sh_wnd.'';
$__fp_shx = 'id="fp_sMod" "data-flip-widget="shareflip" href="https://flipboard.com'.$sh_wnd.'';
$__li_shx = 'id="li_sMod" target="_blank" href="https://www.linkedin.com/sharing/share-offsite/&url='.$sh_url.'&title='.$t2_vc.'&summary='.$d2_vc.'" '.$sh_wnd.'"';
$__md_shx = 'id="md_sMod" target="_blank" href="#" '.$sh_wnd.'';
$__rd_shx = 'id="rd_sMod" target="_blank" href="https://reddit.com/submit?url='.$sh_wnd.'"';
$__tw_shx = 'id="tw_sMod" class="twitter-share-button" target="_blank" href="https://twitter.com/intent/tweet?url='.$sh_url.'&text='.$d2_vc.'&hashtags='.$tag2_vc.'" '.$sh_wnd.'';
//
$share = '
<div>
    <ul class="scl-share cP">
        <div class="sharetip">
            <a href="
            mailto:'.$sh_mlt.'?
            cc='.$sh_ccc.', 
            &bcc='.$sh_bcc.'
            &subject='.$sh_sub.'
            &body='.$sh_bdy.'">
                <li>
                    <i class="fi-mail"></i>
                </li>   
            </a> 
            <em class="sharetiptext">Email</em>
        </div>
         
        <div class="sharetip">
            <li>
                <input type="button" id="copy" value="'.$sh_url.'"  />
            </li>
            <em class="sharetiptext" id="copy_res"  style="width: 110px;">Copy Link</em>
        </div>

        <div class="sharetip">
            <a '.$__fb_shx.'> 
                <li>
                    <i class="fi-social-facebook"></i>
                </li>   
            </a> 
            <em class="sharetiptext">facebook</em>
        </div>
        <div class="sharetip">
            <a '.$__fp_shx.'> 
                <li>
                    <i class="fi-social-flipboard"></i>
                </li>   
            </a> 
            <em class="sharetiptext">flipboard</em>
        </div>
        <div class="sharetip">
            <a '.$__li_shx.'> 
                <li>
                    <i class="fi-social-linkedin"></i>
                </li>   
            </a> 
            <em class="sharetiptext">linkedin</em>
        </div>
        <div class="sharetip">
            <a '.$__md_shx.'> 
                <li>
                    <i class="fi-social-medium"></i>
                </li>   
            </a> 
            <em class="sharetiptext">medium</em>
        </div>
        <div class="sharetip">
            <a data-pin-do="buttonBookmark" href="https://www.pinterest.com/pin/create/button/" data-pin-config="beside" data-pin-color="red" data-pin-height="28"></a>
            <li>
                <i class="fi-social-pinterest"></i>
            </li>
            <em class="sharetiptext">pinterest</em>
        </div>
        <div class="sharetip">
            <a '.$__rd_shx.'>
                <li>
                    <i class="fi-social-reddit"></i>
                </li>
            </a>
            <em class="sharetiptext">reddit</em>
        </div>
        <div class="sharetip">
            <a '.$__tw_shx.'>
                <li>
                    <i class="fi-social-x"></i>
                </li>
            </a>
            <em class="sharetiptext">x: twitter</em>
        </div>
    </ul>
</div>
';
?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v16.0" nonce="m27TKU9S"></script>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<script src="https://cdn.flipboard.com/web/buttons/js/flbuttons.min.js" type="text/javascript"></script>
<script type="text/javascript">
    document.addEventListener(
  'click',
  function (event) {
    if (!event.target.matches('#copy')) return;

    if (!navigator.clipboard) {
      return;
    }
    const text = event.target.value;
    try {
      navigator.clipboard.writeText(text);
      document.getElementById('copy_res').innerText = 'Copied to clipboard';
      setTimeout(function () {
        document.getElementById('copy_res').innerText = 'Click to copy';
      }, 1200);
    } catch (err) {
      console.error('Failed to copy!', err);
    }
  },
  false
);
//
//
//
// Share Url
shareUrl = function() {
if (!navigator.share) return;

navigator.share({
        url: "https://kodoninja.com",
        title: "<?php echo $t2_vc; ?>",
        text: "<?php echo $descData; ?>"
    })
    .then(() => { console.log("share success"); })
    .catch((error) => { console.log("Share failure") });
}

// Sharing Files
shareFile = function (file) {
    var filesArray = [file];
    if (!navigator.canShare || !navigator.canShare({ files: filesArray })) return;
    navigator.share({
        files: filesArray,
        title: 'Files from kodoninja.com',
        text: 'Here, Sharing my files. Keep it safe',
    })
    .then(() => { console.log("share success"); })
    .catch((error) => { console.log("Share failure") });
}
</script>