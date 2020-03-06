$(document).ready(function(){
	$(window).scroll(function(e){
		var winT = $(window).scrollTop();

		if( winT > 662 ){
			$('header').addClass('fixed')
		} else{
			$('header').removeClass('fixed')
		}

		if( winT > 1300) {
			$(".ic_illust").addClass('on');
			
			var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
			$('.data-1').animateNumber({ 
				number: 75,
				numberStep: comma_separator_number_step
			},2000);
			$('.data-2').animateNumber({ 
				number: 273,
				numberStep: comma_separator_number_step
			},2000);
            $('.data-3').animateNumber({
                number: 935,
                numberStep: comma_separator_number_step
			},2000);
            $('.data-4').animateNumber({
                number: 3500,
                numberStep: comma_separator_number_step
			},2000);
		}
	})

	$("html,body").on('mousewheel DOMMouseScroll'  , function(e){
		var E = e.originalEvent;
		console.log(E)
		if(E.deltaY > 0){
			$("#container").addClass('on')
		} else {
			$("#container").removeClass('on')
		}
	})

	
	var cnt = 0,
	timer = setInterval(add, 400);
	function add(){
		anis(cnt);
		if(cnt == 2){
			cnt = -1;
		}
		cnt++;
	}
	function anis(num){
		$(".scroll-arrow").each(function(index){
			var _this = this;
			if(num == index){
				$(this).addClass('on');
				setTimeout(function(){
					$(_this).removeClass("on");
				},450);
			}
		});
	}

	var swiper = new Swiper('.main-slide' , {
		slidesPerView: 1,
		navigation: {
			nextEl: '.main-button-next',
			prevEl: '.main-button-prev',
		},
		pagination: {
			el: '.main-pagination',
			clickable: true,
			renderBullet: function (index, className) {
				return  '<span class="' + className + '">' + $('.swiper-slide').eq(index).data('hash') + '</span>';
			},
		},
	});

	var swiper = new Swiper('.intro-slide' , {
		slidesPerView: 1,
		loop: true,
		allowTouchMove :false,
		navigation: {
			nextEl: '.intro-button-next',
			prevEl: '.intro-button-prev',
		},
		pagination: {
			el: '.intro-pagination',
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '">' + (index + 1) + '</span>';
			},
		},
	});
	
	
	var swiper = new Swiper('.review-slide' , {
		pagination: '.swiper-pagination',
		paginationClickable: true,
		effect: 'coverflow',
		loop: false,
		centeredSlides: true,
		slidesPerView: 'auto',
		initialSlide: 1,
		coverflow: {
			rotate: 180,
			stretch: 1000,
			depth: 150,
			modifier: 1.5,
			slideShadows : false,
		},
		navigation: {
			nextEl: '.review-button-next',
			prevEl: '.review-button-prev',
		},
	});


	var swiper = new Swiper('.ceo-slide' , {
		pagination: '.swiper-pagination',
		paginationClickable: true,
		loop: false,
		spaceBetween: 20,
		slidesPerView: 3.5,
		navigation: {
			nextEl: '.ceo-button-next',
			prevEl: '.ceo-button-prev',
		},
	});
})