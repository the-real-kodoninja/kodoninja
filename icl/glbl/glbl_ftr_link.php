<div class="vIMGbck dN pF"></div>
<div class="vIMGbdy dN"></div>
<script type="text/javascript">
var m_path = `<?php echo $m_path; ?>`;
// var p_load = `<?php echo $p_load; ?>`;
<!--
document.write('<script type=\"text/javascript" src=\"'+m_path+'js\/mjs.js"><\/script>');
document.write('<script type=\"text/javascript" src=\"'+m_path+'js\/view.js"><\/script>');
// document.write('<script type=\"text/javascript" src=\"'+m_path+'js\/mnu\/mnu_Lgc__s.js"><\/script>');
var glblPge = `<?php echo $page; ?>`;
if (glblPge === "downloads") {
    document.write('<script type=\"text/javascript" src=\"'+m_path+'js\/dwnld\/dwLd_1_li.js"><\/script>');
    document.write('<script type=\"text/javascript" src=\"'+m_path+'js\/dwnld\/dwLd_2_li.js"><\/script>');
}
document.write('<script type=\"text/javascript" src=\"'+m_path+'js\/ftr_node_global.js"><\/script>');
// document.write('<script type=\"text/javascript" src=\"'+m_path+'js\/uvt\/uvt_vote.js\"><\/script>');
// document.write('<script type=\"text/javascript" src=\"'+m_path+'js\/pst\/glbl_cmmnt.js\"><\/script>');
//-->
// all (blog/goal/forum) post logic
// document.write('<script type=\"text/javascript" src=\"'+m_path+'js\/wysiwyg.js"><\/script>');
// unsure path issue
document.write('<script type=\"text/javascript" src=\"'+m_path+'js\/pst\/mjs.js"><\/script>');
//****************************************** */ main
//
// global toggle
function upTglx(pid,cid) {
    document.querySelector("#"+pid+cid).classList.toggle("dN");
} 

function toggleMoreContent(id) {
        const moreContent = document.getElementById(`more-content-${id}`);
        const button = moreContent.nextElementSibling; // Get the button to change text

        if (moreContent.style.display === "none") {
            moreContent.style.display = "block"; // Show more content
            button.textContent = "View Less"; // Change button text
        } else {
            moreContent.style.display = "none"; // Hide content
            button.textContent = "View More"; // Change button text back
        }
    }


// const container = document.querySelector('.u_psgCnt');
const images = document.querySelectorAll('.imgVW_x1 img');
// const totalImages = images.length;
// let currentImageIndex = 0;

// container.addEventListener('touchstart', handleTouchStart);

// function handleTouchStart(event) {
//   const startingX = event.touches[0].clientX;
//   container.addEventListener('touchmove', handleTouchMove);
//   container.addEventListener('touchend', handleTouchEnd);

//   function handleTouchMove(event) {
//     const movingX = event.touches[0].clientX;
//     const deltaX = startingX - movingX;

//     if (Math.abs(deltaX) > 50) { // Adjust minimum swipe distance if needed
//       if (deltaX > 0 && currentImageIndex < totalImages - 1) {
//         currentImageIndex++;
//       } else if (deltaX < 0 && currentImageIndex > 0) {
//         currentImageIndex--;
//       }
      
//       container.style.transform = `translateX(-${currentImageIndex * 100}%)`; // Update image position
//     }
//   }

//   function handleTouchEnd() {
//     container.removeEventListener('touchmove', handleTouchMove);
//     container.removeEventListener('touchend', handleTouchEnd);
//   }
// }






// Add a click event listener to each image
images.forEach(image => {
  image.addEventListener('click', () => {
    //
    var vIMGbdy = document.querySelector('.vIMGbdy');
    var vIMGbck = document.querySelector('.vIMGbck');
    //
    vIMGbck.style.transition = 'opacity 0.5s ease-in';
    vIMGbck.style.display = 'block';
    vIMGbdy.style.display = 'block';
    if (p__load === 'm') {
        vIMGbdy.style.width = '100%';
    }
    vIMGbdy.style.transition = 'opacity 0.5s ease-in';
    vIMGbdy.innerHTML = `<img src="${image.src}" alt="${image.src}" style="width: 100%; height: auto;"/>`;


    // swipe logic goes here


    document.querySelector('.vIMGbdy img').addEventListener('click', () => {
        vIMGbck.style.transition = 'opacity 0.5s ease-out';
        vIMGbck.style.display = 'none';
        vIMGbdy.style.display = 'none';
        if (p__load === 'm') {
            vIMGbdy.style.width = 'none';
        }
        vIMGbdy.innerHTML = ``;
        vIMGbdy.style.transition = 'opacity 0.5s ease-out';
    });

  });
});



// 
</script>
<?php 
// all page globals
// temp load
if ($page) // all pages JAVASCRIPT LAN HACK !-- not a priority to be .js
   include("".$m_path."js/pst/load_lgc_x.php");
   include("".$m_path."js/glbl/glbl_cnct_mod.php");
   include("".$m_path."js/mnu/mnu_Lgc__s.php"); // <---
   include("".$m_path."js/nws/mNws_mod.php"); 
   include("".$m_path."js/dbSm1.php"); 
   include("".$m_path."js/pnl/glbl_pnl_lgc.php");
   include("".$m_path."js/blog/blgLd_2_li.php");
   include("".$m_path."js/uvt/glbl_uvote.php"); 
   include("".$m_path."js/pst/glbl_cmmnt.php"); 
   include("".$m_path."js/pst/glbl_sve-dft.php"); 
if ($page === "home") 
    include_once("".$m_path."js/tgl.php");
    include("".$m_path."js/idx/nmeRSV.js.php"); 
if ($page === "membership")
   include("".$m_path."js/mem/lgn_Lgc__x.php");
   include("".$m_path."js/mem/sgu_Lgc__x.php");
   include("".$m_path."js/mem/fgt_Lgc__x.php");
if ($page === "post")
   include("".$m_path."js/pst/wysiwyg.php");
   include("".$m_path."js/pst/pst_lgc_1.php");
if ($page === "user")
    echo '&nbsp;';
    include("".$m_path."js/usr/TGLmod.js.php");
if ($page === "user" || $page === "settings")
    include("".$m_path."js/usr/usr_lgc_FULL.php");
if ($page === "settings")
    include_once("".$m_path."js/set/set_mjs.php");
    // your account
    include_once("".$m_path."js/set/yoa/acc-inf.php");
    include_once("".$m_path."js/set/yoa/chg-pwd.php");
    include_once("".$m_path."js/set/yoa/acc-dya.php");
    // privacy & safety
    include_once("".$m_path."js/set/pas/pcy-sft.php");
if ($page === "kodospace")
    include_once("".$m_path."js/wtl/wtl_lgc_FULL.php");
if ($page === "contact")
    include_once("".$m_path."js/cnt/contact.js.php");
if ($page === "view")
    include_once("".$m_path."js/view/DCNmod.js.php");
if ($page === "3g9")
    include_once("".$m_path."js/3g9/3g9logic.js.php");
if ($page === "downloads")
    // include_once("".$m_path."js/dwnld/dwLd_1_li.js");


if ($log_id && $user_ok) {
// global panel logic [delete request, report...]
// no direct function accessed through sub functions
// leave hdr, bdy, ftr empty for custom Vanilla load out
$popVeil = '<div class="vPnlBck pF dN"></div>';
echo $up_veil = '
'.$popVeil.'
<div class="vPnlCtr dN">
    <div class="vPnlWpr pF">
        <div id="vPnlHdr" class="vPnlHdr pad-T"></div>
        <div id="vPnlUsr_hdr" class="vPnlUsr_hdr"></div> <!-- raw load out t1 -->
        <div id="vPnlBdy" class="vPnlBdy pad-T"></div>
        <div id="vPnlMain" class="vPnlMain pad-T"></div>
        <div id="vPnlFtr" class="vPnlFtr pA pad-T"></div>
    </div>
</div>
';
}


?>