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



function mainImage() {
    var imageBox = $(".imageBox");
    for( var i=1 , len=imageBox.length+1; i<len; i++ ){
        imageBox.eq(i-1).css({
            background : "url('./images/main_image_0" + i + ".png')"
        });
        console.log( "url('../images/main_image_0" + i + ".png')")
    }
};

