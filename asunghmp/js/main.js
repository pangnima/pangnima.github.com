$(document).ready( function (){
    $('.mainslider').slick({
        autoplay : true,
        autoplaySpeed : 3000,
        arrows : false,
        dots : true
    })

    $('.mbslide').slick({
        autoplay : true,
        autoplaySpeed : 3000,
        arrows : false,
        dots : true
    })

    var mbMenuHeight = $('footer').offset().top;
    $('.mbMenu').css({
        height : mbMenuHeight 
    })

});




