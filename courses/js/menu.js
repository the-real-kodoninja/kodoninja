var mNuTpc = $('.mHdr-Nav a li span');
var mNuLst = $('.mHdr-Nav li ul li');

$(document).ready(function(){
    mNuTpc.click(function(){
         $(this).find('ul').toggle(200);
        
    });
    
    // ***********************************
    var crs_A = $('.sqr-Ftr');
    var crs2a = $('#crs_2a');
    var crs3a = $('#crs_3a');
    var crs4a = $('#crs_4a');
    //
    var crs1b = $('#crs_1b');
    var crs2b = $('#crs_2b');
    var crs3b = $('#crs_3b');
    var crs4b = $('#crs_4b');
    //
    var crs1c = $('#crs_1c');
    var crs2c = $('#crs_2c');
    var crs3c = $('#crs_3c');
    var crs4c = $('#crs_4c');
    //
    
    //
    crs_A.click(function(){
         if($(this).hasClass('red')) {
             $(this).removeClass('red').addClass('gray');
         } else if($(this).hasClass('gray')) {
             $(this).removeClass('gray').addClass('red');
         }
            
    });
});