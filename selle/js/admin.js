$(document).ready(function(){
	var swiper = new Swiper('.ad-slide' , {
		loop: true,
		slidesPerView: 1,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});



	$('.select-box').on('click' , function(e){
		e.stopPropagation();
		$(this).children("ul").fadeIn("fast");
	})

	$("body").click(function(e){
		e.stopPropagation();
		$(".select-box ul").fadeOut("fast")
	});


	$('.board-tab li').on('click' , function(){
		var idx = $(this).index();
		$(this).addClass('active').siblings('li').removeClass('active');
		$(this).parent('.board-tab').siblings('.board-item').hide();
		$(this).parent('.board-tab').siblings('.board-item').eq(idx).show();
	})

	$('.tab-box button').on('click' , function(){
		$(this).addClass('active').siblings('button').removeClass('active')
	})


	$('.btn-warning').on('click' , function(){
		$('.soldOut-pop').fadeIn();
	})
	$('.soldOut-pop .close , .soldOut-pop .btn-close').on('click' , function(){
		$('.soldOut-pop').fadeOut();
	})
})


