<!-- jQuery versao 3.2.1 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!-- FANCYBOX -->
<script src="<?php echo URL_VIP ?>js/jquery.fancybox.min.js"></script>


<!-- jQuery v3.2.1 ---------------->
<script src="<?php echo URL ?>js/jquery.min.js"></script>
<script>
	var jQuery3211 = jQuery.noConflict();
	window.jQuery = jQuery3211;
</script>


<!-- Modernizr versao 2.8.3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<!-- Bootstrap versao 3.3.7 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<!-- Botão Antiflagra -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script src="<?php echo URL ?>js/antiflagra.js"></script>
<script>
	var mysticky=new stickynote({
		content:{divid:'antiflagra1', source:'inline'},
		showfrequency:'always',
		hidebox:5
	})
	var mysticky2=new stickynote({
		content:{divid:'antiflagra2', source:'inline'},
		pos:['right', 'bottom'],
		showfrequency:'always'
	})
</script>



<!-- POPUP AVISO AO ENTRAR ======= -->
<script>
	jQuery3211(document).ready(function ($) {
		$(function(){
			$('#agreementPopupContainer').modal('show');
		});
	});
</script>
<!-- FIM POPUP AVISO AO ENTRAR ======= -->



<!-- Menu principal que abre lateralmente no Mobile -->
<script>
	jQuery3211(document).ready(function ($) {
		$(document).ready(function() {
			$('.fade').hide();
			$('#navicon').click(function() {
				if($('#navicon').hasClass('closed')) {
					$('body').animate({left: "-250px"}, 400).css({"overflow":"hidden"});
					$('#main-nav').animate({right: "0"}, 400);
					$(this).removeClass('closed').addClass('open').html('x');
					$('.fade').fadeIn();
				}
				else if($('#navicon').hasClass('open')) {
					$('body').animate({left: "0"}, 400).css({"overflow":"scroll"});
					$('#main-nav').animate({right: "-250px"}, 400);
					$(this).removeClass('open').addClass('closed').html('&#9776;');
					$('.fade').fadeOut();
				}
			})
		})
	});
</script>



<!-- Javascript -->
<script>
	var $sidebar = jQuery.noConflict();
	$sidebar(document).ready(function(){
		(function($) {
			$sidebar('#header__icon').click(function(e){
				e.preventDefault();
				$sidebar('body').toggleClass('with--sidebar');
			});
			$sidebar('#site-cache').click(function(e){
				$sidebar('body').removeClass('with--sidebar');
			});
		})(jQuery);
	});
</script>



<!-- TROCA COR DO SITE =========================== -->
<!-- jQuery do Cookie da troca de cor do site -->
<script src="https://www.hotboys.com.br/js/jquery.cookie.js"></script>
<!-- Botão troca a cor do site - Sol e Lua -->
<script>
	function setThemeFromCookie() {
		var body = document.getElementById('body')
		body.className = isDarkThemeSelected() ? 'fundo-preto' : 'fundo-branco'
	}
	function isDarkThemeSelected() {
		return document.cookie.match(/theme=lua/i) != null
	}
	function togglePageContentLightDark() {
		var body = document.getElementById('body')
		var currentClass = body.className
		var newClass = body.className == 'fundo-preto' ? 'fundo-branco' : 'fundo-preto'
		body.className = newClass
		document.cookie = 'theme=' + (newClass == 'fundo-branco' ? 'sol' : 'lua')
	}
	(function() {
		setThemeFromCookie()
	})();
</script>
<!-- FIM = TROCA COR DO SITE =========================== -->


<!-- Rodar mp4 ao passar mouse nas imagens ---------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-touch-events/1.0.5/jquery.mobile-events.min.js"></script>
<script>
	$(document).ready(function() {
		$(".item-video").hover(function() {
			//ao passar mouse
			$("img", this).css("display", "none");
			$("video", this).css("display", "block");
			$("video", this).get(0).play();
			$(".preview-video-gif", this).css("display", "none"); //oculta gif
			}).mouseleave(function(){
			//ao remover mouse
			$("video", this).css("display", "none");
			$("img", this).css("display", "block");
			$("video", this).get(0).pause();
			$(".preview-video-gif", this).css("display", "none"); //oculta gif
		});
		//mobile
		$('.item-video-gif').on('tapstart', function() {
			$("img", this).css("display", "none");
			$("video", this).get(0).pause();
			$("video", this).css("display", "none");
			$(".preview-video-gif", this).css("display", "block");
		});
	});
</script>


<!-- Recaptcha do Google para formularios-->
<script src="https://www.google.com/recaptcha/api.js?onload=renderRecaptchas&render=explicit" async defer></script>

<script>
	window.renderRecaptchas = function() {
		var recaptchas = document.querySelectorAll('.g-recaptcha');
		for (var i = 0; i < recaptchas.length; i++) {
			grecaptcha.render(recaptchas[i], {
				sitekey: recaptchas[i].getAttribute('data-sitekey')
			});
		}
	}
</script>



<!-- Botão de ESC para trocar de site - Antiflagra-->
<script>
	$(document).keydown(function(e) {
		if (e.keyCode == 27) {
			setTimeout(function() {
				window.location.href = 'https://www.globo.com';
			}, 1);
		}
	});
</script>


<!-- Efeito Tooltip (Tipo legendas quando clica ou passa o mouse) -->
<script src="<?php echo URL ?>js/popper.min.js"></script>


<!-- Newsletter do rodape -->
<script>
	function cadastrarNewsletter(){
		var formData = {
			email:              $('#newsletter_rodape_email').val(),
			nome:               $('#newsletter_rodape_nome').val(),
			data_nascimento:    $('#newsletter_rodape_nascimento').val(),
		}
		$.ajax({
			type: "POST",
			url: "<?php echo URL ?>includes/ajax.php?acao=newsletter",
			data: formData,
			dataType: 'json',
			success: function (data) {
				$('#newsletter-rodape').html(data['html']);
				if(data['mensagem'] == 1){
					alert("Agora preenche o seu NOME COMPLETO e E-MAIL!");
					$("#newsletter_rodape_nome").focus();
					$sidebar(".data").mask("99/99/9999");
				}
				if(data['mensagem'] == 2){
					$("#btn-rodape-newsletter").hide();
				}
			}
		});
	}
</script>	



<!-- Formulario para COMENTAR - Esconde/Aparece -->
<script type="text/javascript">
	jQuery3211(document).ready(function ($) {
		jQuery.fn.toggleText = function(a,b) {
			return   this.html(this.html().replace(new RegExp("("+a+"|"+b+")"),function(x){return(x==a)?b:a;}));
		}
		$(document).ready(function(){
			$('.comentarios_formulario').before('<span class="comentar">Comentar </span>');
			$('.comentarios_formulario').css('display', 'none')
			$('span', '.comentarios_formulario-comentar').click(function() {
				$(this).next().slideToggle('slow')
				.siblings('.comentarios_formulario:visible').slideToggle('fast');
				$(this).toggleText('Comentar','Ocultar')
				.siblings('span').next('.comentarios_formulario:visible').prev()
				.toggleText('Comentar','Ocultar')
			})
		})
	});
</script>

<!-- Formulario para RESPONDER um comentario - Esconde/Aparece -->
<script type="text/javascript">
	jQuery3211(document).ready(function ($) {
		jQuery.fn.toggleText = function(a,b) {
			return   this.html(this.html().replace(new RegExp("("+a+"|"+b+")"),function(x){return(x==a)?b:a;}));
		}
		$(document).ready(function(){
			$('.comentarios_responder').before('<span>Responder</span>');
			$('.comentarios_responder').css('display', 'none')
			$('span', '.comentarios_formulario-responder').click(function() {
				$(this).next().slideToggle('slow')
				.siblings('.comentarios_responder').slideToggle('fast');
				$(this).toggleText('Responder','Ocultar')
				.siblings('span').next('.comentarios_responder').prev()
				.toggleText('Responder','Ocultar')
			})
		})
	});
</script>
