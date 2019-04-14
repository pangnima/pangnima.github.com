
let init = {
	slideMenu : function(){
		$('#nav, .sub_menu').hover(function() {
			$('.sub_menu').addClass('on');
		}, function(){
			$('.sub_menu').removeClass('on');
		});
	},

	centerBG : function(){
		let centerList = $('.center_list li');
	
		for (let i=1 , len=centerList.length; i < len; i++) {
			centerList.eq(i).css({
				backgroundImage: `url(/images/center/${i}.jpg)`
			})
		}
	},

	mainSlide : function(){
		var pagenation = []
		var mainSlideTitle = $('.main_visual .swiper-slide');
		for (let i=0,len=mainSlideTitle.length; i < len; i++) {
			pagenation.push(mainSlideTitle.eq(i).children('img').attr('alt'))
		}
		var swiper = new Swiper('.swiper-container', {
			loop: true,
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
				renderBullet: function (index, className) {
					return `<div class=${className}>${pagenation[index]}</div>`;
				},
			},
		});
	},

	subSlide : function(){
		var subSlide = new Swiper('.sub_menu .swiper-container', {
			loop: true,
			pagination: {
				el: '.sub-pagination',
				clickable: true,
			},
		});
	},

	clinicImg : function(){
		for (let i=0; i<24; i++) {
			$('.clinic_list ul li').eq(i).children('a').css({
				background : `url(/images/clinic/${i+1}.png) 50% 40px no-repeat`
			})
		}
	}
}
