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
    }

    hotpop();


    


    /* 관계사/해외지사 탭 */
    function tabMenu() {
        var tabMenuList = $('.tabMenu > li');
        var tab = $('.tab');
        tabMenuList.on('click' , function(){
            var idx = $(this).index();
            var txt = $(this).text()
            tabMenuList.removeClass('on');
            $(this).addClass('on');
            $('.title > h2 ').text(txt)
            tab.hide();
            tab.eq(idx).show();
        })
    };
    tabMenu();
})
