$(document).ready(function(){
    var subMenu = $('.subMenu')
    var gnb = $('.gnb')
    var header = $('header')
    var blind = $('.blind')

    /// GNB
    gnb.mouseover( function() {
        header.css('borderBottom','solid 1px #293984');
        subMenu.css('display' , 'block');
        blind.css('display' , 'block');
    });

    blind.mouseleave(function(){
        header.css('borderBottom','none');
        subMenu.css('display' , 'none');
        blind.css('display' , 'none');
    })



    // 모바일 메뉴
    var mbMenuHeight = $('body').height();
    $('.mbMenu').css({
        height : mbMenuHeight
    })
    setTimeout(function(){
        var mbMenuHeight = $('body').height();
        $('.mbMenu').css({
            height : mbMenuHeight
        })  
    },200)
    var mobileMenuBtn = $('.mobileMenuBtn');
    var mbMenuList = $('.mbMenuList > li ');
    mbMenuList.prop('idx',false);    
    mbMenuList.on('click' , function(){
        if( $(this).prop('idx') === false ){
            $(this).addClass("on");
            $(this).children("ul").stop().slideDown();
            $(this).children("img").attr('src','../images/mb/downImg.png');
            $(this).prop('idx',true);
        } else {
            $(this).removeClass("on");
            $(this).children("ul").stop().slideUp();
            $(this).children("img").attr('src','../images/mb/upImg.png');
            $(this).prop('idx',false);
        }
    });
    mobileMenuBtn.prop('idx',false);    
    mobileMenuBtn.on('click' , function(){
        if( $(this).prop('idx') === false ){
            $('.mbMenu').css('display','block');
            $(this).css('width', '4.7%');
            $(this).attr('src','../images/mb/closeBtn.png');
            $(this).prop('idx',true);
        } else {
            $('.mbMenu').css('display','none');
            $(this).css('width', '4.7%');
            $(this).attr('src','../images/mb/menuIcon.png');
            $(this).prop('idx',false);
        }
    });

  
})
