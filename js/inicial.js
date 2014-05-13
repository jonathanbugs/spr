$(document).ready(function(){
	init();
	alturaBanner();
	menuFixo();
	scrollPage();
	parallaxBg();
	fotos();
	videos();
	trabalhos();
	filtroTrabalhos();
	formularioContato();
});

$(window).on('resize', function(){
	alturaBanner();
	menuFixo();
});


function alturaBanner(){
	var header = $('#header');
	header.css('height',(windowHeight +11));
}


/* ============
   MENU FIXO
   ============ */
function menuFixo(){
	if (!isiPad && !isiPhone && !isiAndroid){
		var menu = $('#blocoLogoMenu'),
			posicaoTopoInicial = $('#ousadia').offset().top - 140,
			posicaoTopoShow = $('#ousadia').offset().top - 68;

		console.log(windowWidth);	
		if (windowWidth > 1023 ){
			$(window).on('scroll',function() {
				var scr = $(window).scrollTop();

				if (scr >= posicaoTopoInicial) {
					menu.addClass('menuFixo');
				} else {
					menu.removeClass('menuFixo');
				}

				if (scr >= posicaoTopoShow) {
					menu.addClass('menuFixoShow');
				} else {
					menu.removeClass('menuFixoShow');
				}
			});
		}
	}
}


/* =========
   FOTOS
   ========= */
function fotos(){
	$('#fotos, #fotosUl').cycle();
}


/* =========
   SCROOL
   ========= */
function scrollPage(){
	$("#menuUl").localScroll({
		duration: 1000,
		easing: 'jswing',
		hash: false,
		offset: {
			top: -50
		}
	});
}

/* =========
   PARALLAX
   ========= */
function parallaxBg(){
	var header = $('#header');
	header.parallax("50%", 0.25);

	var targetOpacity = $('#tituloOusadia');
	var targetHeight = targetOpacity.outerHeight() + 500;

	$(window).on('scroll', function(e){
		var scrollPercent = (targetHeight - window.scrollY) / targetHeight;
		if(scrollPercent >= 0){
			targetOpacity.css('opacity', scrollPercent);
		}
	});
}


/* =========
   VIDEOS
   ========= */
function videos(){
	$('.videosLink').on('click', function (e) {
		e.preventDefault();
		$('.boxVideos').append('<iframe id="embedVideo" class="embedVideo" src="http://www.youtube.com/embed/'+$(this).attr('data-video')+'?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>');
		$('.boxVideos').show();
	});
	$('#fecharVideos').on('click', function () {
		$('.boxVideos').hide();
		$('#embedVideo').remove();
	});
}



/* =========
   TRABALHOS
   ========= */
function trabalhos(){
	$('#trabalhosUl').mixitup({
		targetSelector: '.mix',
		filterSelector: '.filter',
		effects: ['scale'],
		listEffects: null,
		easing: 'smooth',
		showOnLoad: 'all',
		targetDisplayGrid: 'block',
		targetDisplayList: 'block'
	});
}



/* =========
   FILTRO TRABALHOS SELECT
   ========= */
function filtroTrabalhos(){
	var btSelect = $('#btSelect'),
		textoSelect = btSelect.find('.txt');

	btSelect.on('click', function(){
		$(this).toggleClass('btSelectAberto').next().slideToggle();

		$('.unidadesLink').on('click', function(){
			var textoSelecionado = $(this).html();
			textoSelect.html(textoSelecionado);

			btSelect.removeClass('btSelectAberto');
			$('.navTrabalhos').slideUp('fast');
		})
	});
}



/* =========
   VALIDACAO DO FORMULARIO DE CONTATO
   ========= */
function formularioContato(){
	var $form = $('#formContato'),
		$enviar = $('#btFormEnviar'),
		$enviando = $('#btFormEnviando');
	$form.validate({
		ignore: '',
		errorLabelContainer: '#errorContainer',
		errorElement: 'div',
		rules: {
			nome:     { required: true },
			email:    { required: true, email: true },
			telefone: { required: true },
			mensagem: { required: true },
		},
		messages: { nome: '', empresa: '', telefone: '', email: '', cidade: '', estado: '', mensagem: '' },
		submitHandler: function() {
			//$enviar.hide();
			//$enviando.show();
			if (typeof postContato === 'object' && typeof postContato.abort === 'function'){ postContato.abort(); }
			var postContato = $.post($BASE_DIR+'ajax/post.contato.php', $form.serialize(), function(data){
				$("#nome").val('').prev().show();
				$("#email").val('').prev().show();
				$("#telefone").val('').prev().show();
				$("#mensagem").val('').prev().show();

				$enviando.hide();
				$('#contatoResposta #sucessoContato').fadeTo(1000, 1);
				setTimeout(function() {
					$('#contatoResposta #sucessoContato').hide();
					$enviar.fadeTo(1000, 1);
				}, 4000);
			}, "html");
		},

		errorContainer: $('#contatoResposta #erroContato')
	});
}



