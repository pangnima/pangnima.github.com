$(document).ready(function(){

    /** 주요업무소개 */
    var selector = $('.selector > li');
    var infoBox = $('.infoBox');
    selector.on('click' , listView);

    function listView(){
        var idx = $(this).index()
        for( var i=0 , len = selector.length; i < len; i++ ){
            infoBox[i].style.display = "none"
        }
        infoBox[idx].style.display = "block"
        $(this).siblings('li').removeClass("on")
        $(this).addClass("on");
    }
    

    /** 핫라인 팝업 **/

    function hotpop(){
        var hotH = $('body').height();
        var hotpop = $('.hotpop');
        var closeBtn = $('.closeBtn');
        var reportBtn = $('.reportBtn');
        var reportBox = $('.reportBox');
        var selectorBox = $('.selectorBox ul li');
        hotpop.css({
            height: hotH
        });
        closeBtn.on("click" , function(){
            hotpop.css({
                display : 'none'
            })
        });
        reportBtn.on("click" , function(){
            hotpop.css({
                display : 'block'
            })
        });

        selectorBox.on('click' , function(){
            var idx = $(this).index();
            selectorBox.removeClass("on");
            selectorBox.eq(idx).addClass("on");
            reportBox.removeClass("on");
            reportBox.eq(idx).addClass("on");
        })
        $('.hotLineBtn').on('click' , function(){
            alert("제보가 완료되었습니다")
        })
    }
    hotpop();


    
    //  네이게이션 픽스 
    function fixNavi(){
        var subNavi = $(".subNavi");
        var fixsubNavi = $(".subNavi").offset().top;

        $(window).scroll( function(){
            var winScoll = $(window).scrollTop()
            if( winScoll > subNavi.offset().top ) {
                subNavi.css({
                    position : "fixed",
                    top: "0"
                })
            } 
            if( winScoll < 294 ) {
                subNavi.css({
                    position : "inherit",
                })
            }
        });   
    }

    fixNavi();
})
