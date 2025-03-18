<script>
window.addEventListener('load', function(event) {
     _intervalId = setInterval( function() {
        var backImg = document.querySelectorAll('.mHdr-Wpr img');
        backImg.classList.add("dN");
        // backImg.remove();
        document.querySelector('.mHdr-Wpr').append(backImg);
        // backImg.fadeIn();
        console.log(backImg);
    }, 3000 );
});
</script>