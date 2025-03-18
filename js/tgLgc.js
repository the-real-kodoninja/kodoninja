// button click
var usrCNT_1x = document.getElementById("usrCNT_1x");
var usrCNT_1a = document.getElementById("usrCNT_1a");
var usrCNT_2a = document.getElementById("usrCNT_2a");
var usrCNT_3a = document.getElementById("usrCNT_3a");
// load logic
var usrCNT_1 = document.getElementById("usrCNT_1");
// total count
var numCnt_1x = document.getElementById("numCnt_1x"); 

usrCNT_1x.addEventListener('click', function (event) {
    numCnt_1x.innerHTML = "<?php echo $totalPst_count; ?>";
    usrCNT_1x.classList.add("selU");
    usrCNT_1a.classList.remove("selU");
    usrCNT_2a.classList.remove("selU");
    usrCNT_3a.classList.remove("selU");
    usrCNT_1.style.display= 'block';
    usrCNT_2.style.display= 'block';
    usrCNT_3.style.display= 'block';
});

usrCNT_1a.addEventListener('click', function (event) {
    numCnt_1x.innerHTML = "<?php echo $blgPst_count; ?>";
    usrCNT_1x.classList.remove("selU");
    usrCNT_1a.classList.add("selU");
    usrCNT_2a.classList.remove("selU");
    usrCNT_3a.classList.remove("selU");
    usrCNT_1.style.display= 'block';
    usrCNT_2.style.display= 'none';
    usrCNT_3.style.display= 'none';
});

usrCNT_2a.addEventListener('click', function (event) {
    numCnt_1x.innerHTML = "<?php echo $frmPst_count; ?>";
    usrCNT_1x.classList.remove("selU");
    usrCNT_1a.classList.remove("selU");
    usrCNT_2a.classList.add("selU");
    usrCNT_3a.classList.remove("selU");
    usrCNT_1.style.display= 'none';
    usrCNT_2.style.display= 'block';
    usrCNT_3.style.display= 'none';
});

usrCNT_3a.addEventListener('click', function (event) {
    numCnt_1x.innerHTML = "<?php echo $usrPst_count; ?>";
    usrCNT_1x.classList.remove("selU");
    usrCNT_1a.classList.remove("selU");
    usrCNT_2a.classList.remove("selU");
    usrCNT_3a.classList.add("selU");
    usrCNT_1.style.display= 'none';
    usrCNT_2.style.display= 'none';
    usrCNT_3.style.display= 'block';
});

