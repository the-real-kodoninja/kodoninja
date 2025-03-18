window.addEventListener('load', function(event) {
    var _intervalId;
    //
    function fadeInLastImg() {
        var backImg = document.queryselectorALL('.mHdr-Wpr img:first');
        backImg.hide();
        backImg.remove();
        document.queryselector('.mHdr-Wpr').append( backImg );
        backImg.fadeIn();
    };
        
    _intervalId = setInterval( function() {
        fadeInLastImg();
    }, 3000 );
}); 