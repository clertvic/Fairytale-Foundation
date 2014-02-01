
$(function(){
    init();	
});

function init(){	
    changeCoverHeight();	
};

/* --- CHANGE COVER HEIGHT ---*/

function changeCoverHeight(){
    var $cover = $('.cover.work');
    var $slide = $('.slide');    
    
    var wh = window.innerHeight;
    var factor = wh * .700;
    
    $cover.css('height', factor + 97);
    $slide.css('height', factor);    
    
};

/* --- CREATE FIXED HEADER ---*/

function checkHeader(){
    var $header = $('header');
    var scrollPos = $(window).scrollTop();

    if(scrollPos > 0){
        $header.addClass('fixed');
    } else {
        $header.removeClass('fixed');
    };
};

/* ====== EVENTS ======  */

$(window).scroll(function(){
/*     checkHeader(); */
});

$(window).resize(function(){
    changeCoverHeight();
});