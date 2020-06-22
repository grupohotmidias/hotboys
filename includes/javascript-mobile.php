<!-- javascript Mobile -->
<!-- jQuery versao 3.2.1 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!-- Modernizr versao 2.8.3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<!-- Bootstrap versao 3.3.7 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<!-- FANCYBOX -->
<script src="<?php echo URL ?>js/jquery.fancybox.min.js"></script>


<script>
	var jQuery3211 = jQuery.noConflict();
	window.jQuery = jQuery3211;
</script>



<script>
	jQuery3211(document).ready(function ($) {
		//Menu principal que abre lateralmente no Mobile
		$('.fade_menu_mobile').hide();
		$('#navicon').click(function() {
			if($('#navicon').hasClass('closed')) {
				$('body').animate({left: "-250px"}, 400).css({"overflow":"hidden"});
				$('#main-nav').animate({right: "0"}, 400);
				$(this).removeClass('closed').addClass('open').html('x');
				$('.fade_menu_mobile').fadeIn();
			}
			else if($('#navicon').hasClass('open')) {
				$('body').animate({left: "0"}, 400).css({"overflow":"scroll"});
				$('#main-nav').animate({right: "-250px"}, 400);
				$(this).removeClass('open').addClass('closed').html('&#9776; <span>Menu</span>');
				$('.fade_menu_mobile').fadeOut();
			}
		});
		
		//Formulario para COMENTAR - Esconde/Aparece
		jQuery.fn.toggleText = function(a,b) {
			return   this.html(this.html().replace(new RegExp("("+a+"|"+b+")"),function(x){return(x==a)?b:a;}));
		}
		$('.comentarios_formulario').before('<span class="comentar">Comentar </span>');
		$('.comentarios_formulario').css('display', 'none')
		$('span', '.comentarios_formulario-comentar').click(function() {
			$(this).next().slideToggle('slow')
			.siblings('.comentarios_formulario:visible').slideToggle('fast');
			$(this).toggleText('Comentar','Ocultar')
			.siblings('span').next('.comentarios_formulario:visible').prev()
			.toggleText('Comentar','Ocultar')
		});
		
		//Formulario para RESPONDER um comentario - Esconde/Aparece
		jQuery.fn.toggleText = function(a,b) {
			return   this.html(this.html().replace(new RegExp("("+a+"|"+b+")"),function(x){return(x==a)?b:a;}));
		}
		$('.comentarios_responder').before('<span>Responder</span>');
		$('.comentarios_responder').css('display', 'none')
		$('span', '.comentarios_formulario-responder').click(function() {
			$(this).next().slideToggle('slow')
			.siblings('.comentarios_responder').slideToggle('fast');
			$(this).toggleText('Responder','Ocultar')
			.siblings('span').next('.comentarios_responder').prev()
			.toggleText('Responder','Ocultar')
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




<script src="https://hotboys.com.br/js/jquery.inputmask.min.js"></script>
<script charset="utf-8">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]';
		$('#newsletter_rodape_nascimento').mask('99/99/9999');
	});
</script>




<script src="<?php echo URL ?>js/croppie.min.js"></script>
<link rel="stylesheet" href="<?php echo URL ?>css/croppie.css">


<script>
	jQuery('#upload-croppie').croppie({
		url: 'imagens/area-do-cliente/fotos-clientes/86282bc2fca70ad68fcbc430685914de.png',
		viewport: {
			width: 50,
			height: 50
		},
		points: [10,20,30,40]
	});
	
	function readURL(input) {
		
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function(e) {		
				$('#minha-conta-img-perfil').attr('src', e.target.result);
			}
			
			reader.readAsDataURL(input.files[0]);
		}
	}
	
	$("#foto_perfil").change(function() {	
		arquivo = $("#foto_perfil").val();
		extensao = arquivo.split(".");
		extensao = extensao[extensao.length - 1];
		extensao = extensao.toLowerCase();
		
		if(extensao=='jpg' ||  extensao=='jpeg'  ||  extensao=='png'  ||  extensao=='gif'  ||  extensao=='bmp'){
			//arquivo valido	
			readURL(this);
			$("#minha-conta-salvar-imagem").css("display", "block");
			} else {
			//arquivo invalido	
			alert("ARQUIVO INVÁLIDO!\nVocê precisa enviar a foto no formato JPG, JPEG, GIF, PNG ou BMP");
		}
	});
</script>


<script src="https://hotboys.com.br/js/jquery.inputmask.min.js"></script>
<!-- MASCARÁ DE DATA DE NASCIMENTO DO NEWSLETTER -->
<script type="text/javascript" charset="utf-8">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]';
		$('#newsletter_rodape_nascimento').mask('99/99/9999');
	});
</script>


<!-- Efeito Touchscreen(mobile) para trocar a vitrine e modelos da semana -->
<script>
	var $S = jQuery.noConflict();
	var touchSensitivity = 5;
	$S(".carousel").on("touchstart", function (event) {
		var xClick = event.originalEvent.touches[0].pageX;
		$S(this).one("touchmove", function (event) {
			var xMove = event.originalEvent.touches[0].pageX;
			if (Math.floor(xClick - xMove) > touchSensitivity) {
				$S(this).carousel('next');
				} else if (Math.floor(xClick - xMove) < -(touchSensitivity)) {
				$S(this).carousel('prev');
			}
		});
		$S(".carousel").on("touchend", function () {
			$S(this).off("touchmove");
		});
	});
</script>


<!-- Loading das imagens -->
<script>
	document.addEventListener("DOMContentLoaded", function() {
		var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
		
		if ("IntersectionObserver" in window) {
			let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
				entries.forEach(function(entry) {
					if (entry.isIntersecting) {
						let lazyImage = entry.target;
						lazyImage.src = lazyImage.dataset.src;
						lazyImage.classList.remove("lazy");
						lazyImageObserver.unobserve(lazyImage);
						
						$( document ).ready(function() {
							setTimeout(carregar, 3000);
						});
						function carregar() {
							$('.fa-play-circle').show();
						}
					}
				});
			});
			
			lazyImages.forEach(function(lazyImage) {
				lazyImageObserver.observe(lazyImage);
			});
			} else {
			// Possibly fall back to a more compatible method here
		}
	});
</script>

<!-- JS do contador regressivo -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://hotboys.com.br/js/jquery.contador-responsive.js"></script>
<script>
	jQuery(function ($) {
		$('#myFlipper').flipper('init');
	});
</script>