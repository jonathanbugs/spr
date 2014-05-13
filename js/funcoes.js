/* ============
   FUNCOES GERAIS
   ============ */
function linkExterno(){
	$('a[data-rel=blank]').click(function(){
		window.open(this.href);
		return false;
	});
}

function placeHolder(){
	$('.input, .textarea').on('keyup',function(){
		if($(this).val()===''){ $(this).prev().show(); }
	}).on('keydown',function(){
		$(this).prev().hide();
	}).on('change',function(){
		if ($(this).val()===''){ $(this).prev().show(); } else { $(this).prev().hide(); }
	}).on('focusout',function(){
		$(this).prev().fadeTo(0,1);
		if ($(this).val()===''){ $(this).prev().show(); $(this).parent().find('.erro').show(); } else { $(this).prev().hide(); $(this).parent().find('.erro').hide(); }
	}).on('focusin',function(){
		if ($(this).val()===''){ $(this).prev().show(); $(this).prev().fadeTo(0,0.3); } else { $(this).prev().hide(); }
	}).each(function(){
		if ($(this).val()===''){ $(this).prev().show(); } else { $(this).prev().hide(); }
	});
}

function linguagem(){
	$('.btLang').on('click', function(){
		// <a href="javascript:;" class="btLang en" data-idioma="en">EN</a>
		var lang = $(this).attr('data-idioma');
		$.cookie($CLIENTE+'_linguagem', lang, { expires: 365, path: '/' });
		window.location.reload();
	});
}

function selectPersonalizado(){
	$('.selectPrs').css('opacity', 0).on('change', function(){
		var ele = $(this);
		var val = ele.find('option:selected').text();
		ele.prev().text(val);
	});
}

function radioPersonalizado(){
	$('.radioPrs').css('opacity', 0).on('change', function(){
		var ele = $(this);
		var eleName = ele.attr('name');
		if(ele.is(':checked')){
			$('input[name="'+eleName+'"]').parent().removeClass('checked');
			ele.parent().addClass('checked');
		} else {
			ele.parent().removeClass('checked');
		}
	});

	$('.labelRadio').on('click', function(e){
		e.preventDefault();
		$(this).children('input').trigger('click');
	});
}

function checkboxPersonalizado(){
	$('.checkPrs').css('opacity', 0).on('change', function(){
		var ele = $(this);
		if(ele.is(':checked')){
			ele.parent().addClass('checked');
		} else {
			ele.parent().removeClass('checked');
		}
	});

	$('.labelCheck').on('click', function(e){
		e.preventDefault();
		$(this).children('input').trigger('click');
	});
}

function filePersonalizado(){
	$('.filePrs').css('opacity', 0).on('change', function(){
		var ele = $(this);
		var val = ele.val();
		ele.prev().text(val);
	});
}

var $window = $(window);
var windowHeight = $window.height();
var windowWidth = $window.width();


/* ============
   FUNCOES PROJETO
   ============ */
function init(){
	linkExterno();
	placeHolder();
	showErros();
	imgRetina();
	abrirMenu();
}

$(window).on('resize', function(){
	windowHeight = $window.height();
	windowWidth = $window.width();
	if (windowWidth > 1023 ){
		$('#header').removeClass('menuAberto');
	}
});


/* ============
   PAGINA DE ERROS
   ============ */
function showErros(){
	$('#boxErro').stop().animate({
		height: 220
	}, 500, 'linear');

	$('.btClose').on('click', function(){
		$('#boxErro').stop().animate({
			height: 0
		}, 200, 'linear');

		$('.containerErro').delay(50).hide();
	});

	$('.btFade').hover(function(){
		$(this).children('span').stop().fadeTo(200,1);
	}, function(){
		$(this).children('span').stop().fadeTo(200,0);
	});

	$('.boxAtualize').stop().animate({
		marginLeft: 0,
		opacity: 1
	}, 500, 'easeOutElastic');

	$('.boxTxtAtualize').stop().delay(220).animate({
		opacity: 1
	}, 500, 'linear');

	$('.btDownload').stop().delay(220).animate({
		right: 0,
		opacity: 1
	}, 500, 'easeInOutBack');

	$('.btClose').stop().delay(220).animate({
		top: 10,
		opacity: 1
	}, 500, 'easeInOutBack');
}



/* ============
   RETINA
   ============ */
function imgRetina(){
	Retina = function() {
		return {
			init: function(){
				var pixelRatio = !!window.devicePixelRatio ? window.devicePixelRatio : 1;
				if (pixelRatio > 1) {
					$("img").each(function(idx, el){
						el = $(el);
						if (el.attr("data-src2x")) {
							el.attr("src", el.attr("data-src2x"));
						}
					});
				}
			}
		};
	}();
	Retina.init();
}


/* ============
   MENU MOBILE
   ============ */
function abrirMenu(){
	$('#btMenu').on('click', function() {
		var ele = $(this);
			icone = ele.find('.icone');

		ele.toggleClass('menuAberto');
		$('#header').toggleClass('menuAberto');

		if (icone.hasClass('icon_menu')){
			icone.removeClass('icon_menu').addClass('arrow_carrot-up');
		} else {
			icone.removeClass('arrow_carrot-up').addClass('icon_menu');
		}
	});
}
