$(document).ready(function(){

    function menuhover(){
        var subMenu = $('.subMenu')
        var gnb = $('.gnb')
        var header = $('header')
        var blind = $('.blind')
    
        gnb.mouseover( function() {
            header.css('borderBottom','solid 1px #293984');
            subMenu.css('display' , 'block');
            blind.css('display' , 'block');
        });
    
        blind.mouseleave( function(){
            header.css('borderBottom','none');
            subMenu.css('display' , 'none');
            blind.css('display' , 'none');
        });
    }
    menuhover();



    var mbMenuHeight = $('footer').offset().top;
    $('.mbMenu').css({
        height : mbMenuHeight-80 
    })
    var mobileMenuBtn = $('.mobileMenuBtn');
    var mbMenuList = $('.mbMenuList > li ');
    mbMenuList.prop('idx',false);    
    mbMenuList.on('click' , function(){
        if( $(this).prop('idx') === false ){
            $(this).children("ul").stop().slideDown();
            $(this).children("img").attr('src','../images/mb/downImg.png');
            $(this).prop('idx',true);
        } else {
            $(this).children("ul").stop().slideUp();
            $(this).children("img").attr('src','../images/mb/upImg.png');
            $(this).prop('idx',false);
        }
    });
    mobileMenuBtn.prop('idx',false);    
    mobileMenuBtn.on('click' , function(){
        if( $(this).prop('idx') === false ){
            $('.mbMenu').css('display','block');
            $(this).css('width', '5%');
            $(this).attr('src','../images/mb/menuXBtn.png');
            $(this).prop('idx',true);
        } else {
            $('.mbMenu').css('display','none');
            $(this).css('width', '8%');
            $(this).attr('src','../images/mb/menuBtn.png');
            $(this).prop('idx',false);
        }
    })

    selector();
})



function selector() {
    var hotLineSelector = $(".hotLineSelector > li") ;
    var realName = $(".realName");
    var anonymous = $(".anonymous");
    var closeBtn = $(".closeBtn");
    var popup  = $(".popup ");
    
    
    hotLineSelector.on("click" , function(){
        var idx = $(this).index();
        if ( idx == 0 ){
            realName.css({
                display: "block"
            })
            anonymous.css({
                display: "none"
            })
        } else {
            realName.css({
                display: "none"
            })
            anonymous.css({
                display: "block"
            })
        }
        $(this).addClass("on")
        $(this).siblings().removeClass("on")
        console.log("AA")
    })

    closeBtn.on("click" , function(){
        popup.css({
            display: "none"
        })
    })
}
