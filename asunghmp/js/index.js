// 팝업 닫기
function closePopup(target){
	$('.popup'+target).fadeOut();
	return false;
}


$(function(){
	if(navigator.userAgent.indexOf('9.0') != -1) {
		// ie9일경우
		if($('.contents').hasClass('main')){
			$('.mainVisuTxt').animate({'width':'100%'},1300);
		}
		
	}



	var gnbEvent = {

		windowSize : window.innerWidth,
		browser : 'undefind',
		prevBrowser : 'undefind',

		init : function(){
			if(parseInt(gnbEvent.windowSize) <= 760) {
				gnbEvent.prevBrowser = 'mobile';
				browser = 'mobile';
			
				$('.container').removeClass('wContainer').addClass('mContainer');
				$('.header').removeClass('wHeader').addClass('mHeader');

			}else {
				gnbEvent.prevBrowser = 'web';
				browser = 'web'

				$('.container').removeClass('mContainer').addClass('wContainer');
				$('.header').removeClass('mHeader').addClass('wHeader');
			}

			if(browser == 'web') {
				gnbEvent.webEvent();
			} // web end
			else {
				gnbEvent.mobileEvent();
			}

		},
		windowResize : function(){
			var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
			if(parseInt(windowWidth) <= 760) {
				browser = 'mobile';
			}else {
				browser = 'web'
			}
			gnbEvent.onChange(gnbEvent.prevBrowser,browser);
		},
		webEvent : function(){
			$('.container').removeClass('mContainer').addClass('wContainer');
			$('.header').removeClass('mHeader').addClass('wHeader');
			$('.blacklayer').fadeOut();
			$('.mLang').hide();

			// web lang
			$('.activeLang').on('click', function(){
				var $target = $(this);
				if($target.hasClass('active')){
					$target.removeClass('active');
					$target.next('.lang').stop().slideUp();
				}else {
					$target.addClass('active');
					$target.next('.lang').stop().slideDown();
				}
				return false;
			});

			// web gnb
			$('.gnb').on('mouseenter', function(){
				$(this).find('.depth_02').stop().slideDown();
				$('.wHeader .gnbBg').stop().slideDown();
			});

			$('.gnb').on('mouseleave', function(){
				$(this).find('.depth_02').stop().slideUp();
				$('.wHeader .gnbBg').stop().slideUp();
			});
		},
		mobileEvent: function(){

			$('.container').removeClass('wContainer').addClass('mContainer');
			$('.header').removeClass('wHeader').addClass('mHeader');
			$('.mLang').show();

			// mobile gnb
			$('.mHeader .menuOpen').on('click', function(){
				$('.mHeader .gnb').stop().animate({'right':'0'});
				$('.blacklayer').css({'height':$('.container').css('height')}).fadeIn();
				return false;
			});
			$('.mHeader .menuClose').on('click', function(){
				$('.mHeader .gnb').stop().animate({'right':'-170px'},function(){
					$mActiveGnb.removeClass('active');
					$mActiveGnb.next('.depth_02').stop().slideUp();
					$mActiveGnb = null;
				});

				$('.blacklayer').fadeOut();
				return false;
			});
			var $mActiveGnb = null;
			$('.mHeader .depth_01 > li > a').on('click', function(){
				if($mActiveGnb != null) {
					$mActiveGnb.removeClass('active');
					$mActiveGnb.next('.depth_02').stop().slideUp();
					if($mActiveGnb.html() == $(this).html()){
						$mActiveGnb.removeClass('active');
						$mActiveGnb.next('.depth_02').stop().slideUp();
						$mActiveGnb = null;
						return false;
					}
				}
				$mActiveGnb = $(this);
				$mActiveGnb.addClass('active');
				$mActiveGnb.next('.depth_02').stop().slideDown();
				return false;
			});

			$('.blacklayer').on('click', function(){
				$('.mHeader .gnb').stop().animate({'right':'-170px'},function(){
					$mActiveGnb.removeClass('active');
					$mActiveGnb.next('.depth_02').stop().slideUp();
					$mActiveGnb = null;
				});

				$('.blacklayer').fadeOut();
				return false;
			});
		},
		onChange : function(prevBrowser,browser){
			if(gnbEvent.prevBrowser != browser){
				gnbEvent.prevBrowser = browser;
				if(browser == 'web') {
					$('.gnb .depth_02').css('height','150px');
					$('.mHeader .depth_01 > li > a').unbind('click');
					$('.gnb .depth_02').hide();
					$('.gnb .active').removeClass('active');

					gnbEvent.webEvent();
				} // web end
				else {
					$('.gnb').unbind('mouseenter mouseleave');
					gnbEvent.mobileEvent();
					$('.gnb .depth_02').css('height','auto');
					$('.gnb .depth_02').slideUp();
					$('.mHeader .gnb').css({'right':'-170px'});
					$('.activeLang').removeClass('active').unbind('click');
					$('.activeLang').next('.lang').hide();

				}
			}
		},
	};


	// gnb 에 logistics system 메뉴와 consulting 메뉴와 doors 메뉴 클릭 시 애니메이션
	$('.headerCont .logisticsLi > a').on('click', function(){
		if($('.container').hasClass('wContainer')){
			if($('.contents').hasClass('main')){
				var offsetTop = parseInt($('#logisticsSec').offset().top)-80;
				$('html, body').animate({scrollTop : offsetTop}, 400);
			}else{
				location.href="/index.php#logisticsSec";
			}
		}
	});
	$('.headerCont .consultingLi > a').on('click', function(){
		if($('.container').hasClass('wContainer')){
			if($('.contents').hasClass('main')){
				var offsetTop = parseInt($('#consultingSec').offset().top)-80;
				$('html, body').animate({scrollTop : offsetTop}, 400);
			}else{
				location.href="/index.php#consultingSec";
			}
		}
	});
	$('.headerCont .doorsLi > a').on('click', function(){
		if($('.container').hasClass('wContainer')){
			if($('.contents').hasClass('main')){
				var offsetTop = parseInt($('#doorsSec').offset().top)-80;
				$('html, body').animate({scrollTop : offsetTop}, 400);
			}else{
				location.href="/index.php#doorsSec";
			}
		}
	});

	// 화면 width 값에 따라 web/mobile 알맞게 클래스 명 부여
	function windowUi(){
		if(window.innerWidth <= 970) {
			$('.container').removeClass('wContainer').addClass('mContainer');
			$('.header').removeClass('wHeader').addClass('mHeader');
		}else {
			$('.container').removeClass('mContainer').addClass('wContainer');
			$('.header').removeClass('mHeader').addClass('wHeader');
		}
	
	}

	// 화면 스크롤 시 서브페이지 내 navi 따라붙는 액션 관련
	function naviAction(){
		if($('.contents').hasClass('sub')){
			var headerContHeight = parseInt($('.headerCont').css('height'));
			var subNaviTop = $('.navi').offset().top-headerContHeight-3;
			var newTop = headerContHeight+2;
			
			if(parseInt(window.pageYOffset)>=parseInt(subNaviTop)){
				if(newTop<50) {
					newTop=newTop-3
					$('.navi .fixedNavi').css({'position':'fixed','top':newTop});
				}else {
					$('.navi .fixedNavi').css({'position':'fixed','top':newTop});
				}
			}else{
				$('.navi .fixedNavi').css({'position':'absolute','top':'0'});
			}
		}
	}


	// 시작하자마자 화면 width 값에 따라 web/mobile 알맞게 클래스 명 부여해주고, 화면 resize될때마다 계속 함수 실행
	window.onresize=function(event){
		gnbEvent.windowResize();

		if($('.contents').hasClass('logistics')){
			if(window.innerWidth<=800) {
				$('.sp-caption-container').css({'width':'100%'});
			}else {
				var textBoxWidth = parseInt($('.rollingVisu').css('width'))-270;
				$('.sp-caption-container').css({'width':textBoxWidth});
			}
		}

		naviAction();

	}


	window.onscroll=function(){
		// 화면 스크롤 시 header 따라붙는 액션 관련
		if($('.container').hasClass('wContainer')){
			var scrollTopVal = $(window).scrollTop() || document.documentElement.scrollTop;
			if(parseInt(scrollTopVal)>=44){
				$('.wHeader').css({'position':'fixed','top':'0'});
			}else {
				$('.wHeader').css({'position':'absolute','top':'44px'});
			}
		}
		
		// 화면 스크롤 시 서브페이지 내 navi 따라붙는 액션 관련
		naviAction()

	}



	gnbEvent.init();

	// footer - family site
	$('.footer .familySite > a').on('click', function(){
		var $siteList = $(this).next('.list');
		if($siteList.hasClass('show')){
			$siteList.slideUp();
			$siteList.removeClass('show');
		}else {
			$siteList.slideDown();
			$siteList.addClass('show');
		}
		return false;
	});

	$('.footer .familySite').on('mouseleave', function(){
		$(this).children('.list').slideUp();
		return false;
	});


	// 메인페이지 이미지 확대
	$('.main .logistics .list a').on('mouseenter', function(){
		$(this).stop().animate({"background-size": "120%"});
	});
	$('.main .logistics .list a').on('mouseleave', function(){
		$(this).stop().animate({"background-size": "100%"});
	});
	
	$('.main .doors .list .link').on('mouseenter', function(){
		$(this).next('.imgBox').stop().animate({"background-size": "120%"});
	});
	$('.main .doors .list .link').on('mouseleave', function(){
		$(this).next('.imgBox').stop().animate({"background-size": "100%"});
	});



	// 서브페이지 navi
	$('.sub .navi .selectTxt').on('click', function(){
		if($(this).next('ul').css('display')=="block"){
			$(this).next('ul').slideUp();
		}else {
			$(this).next('ul').slideDown();
		}
		return false;
	});
	$('.sub .naviCont > div').on('mouseleave', function(){
		$(this).children('ul').slideUp();
	});
	// 페이지 로딩 시 navi 1depth 부분 알맞게 변경
	if($('.contents').hasClass('sub')){
		var pageName_0 = location.pathname.split('/')[1];
		var pageName_1 = location.pathname.split('/')[2].split('.')[0];
		var $activeTarget = $('.contents .naviCont .naviDepth_01 .'+pageName_0);
		$activeTarget.addClass('active');
		$('.contents .naviDepth_01 .selectTxt').text($activeTarget.text());

		var $naviTarget = $('.navi .naviDepth_02 .'+pageName_1);
		$naviTarget.addClass('active');
		$('.navi .naviDepth_02 .selectTxt').html($naviTarget.children('a').text());
	}


	// 서브페이지 비쥬얼이미지 script
	if($('.contents').hasClass('sub')){
		$( document ).ready(function( $ ) {
			var rollingVisu = $( '.sub .rollingVisu .slider-pro' ).sliderPro({
				width: 930,
				height: 490,
				responsive : true,
				orientation: 'horizontal',
				loop: true,
				arrows: true,
				buttons: false,
				thumbnailsPosition: 'right',
				thumbnailPointer: true,
				thumbnailWidth: 250,
				thumbnailHeight :150,
				slideDistance:0,
				pauseVideoAction:'startAutoplay',
				endVideoAction :'startAutoplay',
				
				breakpoints: {
					800: {
						thumbnailsPosition: 'bottom',
						thumbnailWidth: 0,
						thumbnailHeight: 0
					},
				},
				init:function(event){
					if(window.innerWidth<=800) {
					$('.sp-caption-container').css({'width':'100%'});
					}else {
						var textBoxWidth = parseInt($('.rollingVisu').css('width'))-270;
						$('.sp-caption-container').css({'width':textBoxWidth});
					}
				},
			});
		});
	}

	// selectBox ani
	$('.selectBox .selectVal').on('click', function(){
		if($(this).next('.selectList').css('display')=='block'){
			$(this).next('.selectList').slideUp();
		}else{
			$(this).next('.selectList').slideDown();
		}
		return false;
	});
	$('.selectBox .selectList a').on('click', function(){
		$(this).parents('.selectList').slideUp();
		$(this).parents('.selectBox').children('.selectVal').text($(this).text());
		return false;
	});
	$('.selectBox .selectList').on('mouseleave', function(){
		$(this).slideUp();
	});

	// qna 페이지 내 답변 방법에 따른 table 항목 변경
	$('.qna .answerWayType input[name="answerWay"]').change(function(){
		if(this.value=='email'){
			$('.qna .emailAnswer').show();
			$('.qna .telAnswer').hide();
		}else {
			$('.qna .telAnswer').show();
			$('.qna .emailAnswer').hide();
		}
	});

	// accordionList
	$('.accordionList .question').on('click', function(){
		var $this = $(this);
		var $prevTarget = $this.parents('.accordionList').find('.view');
		$prevTarget.removeClass('view').next('.answer').slideUp();
		if($prevTarget.text()!=$this.text()) {
			$this.addClass('view').next('.answer').slideDown();
		}
		return false;
	});


});
$(document).ready(function(){

	// 메인 비주얼
	$('.mainVisu').slick({
		'arrows':false,
		'fade': true,
		'autoplay':true,
		'autoplaySpeed': 3000,
		'speed':1500,
		'dots':true,
		'dotsClass':'pager',
	});
});

