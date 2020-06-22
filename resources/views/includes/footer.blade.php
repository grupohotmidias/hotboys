<!-- FOOTER (Include) -->
<!-- Botao Assine Ja -->
<div class="div_fixa_rodape_total">

    <!-- Div Flutuante - AntiFlagra -->
    <div id="antiflagra2" class="antiflagra" style="display:none">
        <div class="fechar">
            <a href="#" onclick="antiFlagra()">
                <img src="{{ asset('imagens/antiflagra/fechar-antiflagra.png') }}" alt="botao fechar site">
            </a>
        </div>
        <a href="https://www.globo.com/">
            <img class="imagem-antiflagra" src="{{ asset('imagens/antiflagra/antiflagra.png') }}" alt="imagem fundo antiflagra">
        </a>
    </div>






    <div>
        <style>.rodape-banner-fixo a.link-rodape-fixo, .rodape-banner-fixo a.footerv3 {top: 33%;}</style>
        <a href="https://www.hotboys.com.br/assine">
            <div class="rodape-banner-fixo" data-promo="default">
                <img src="{{ asset('imagens/rodape/rodape-fixo/rodape-fixo_adicoes.png') }}" alt="rodape fixo Hotboys">
            </div>
        </a>
    </div>



</div>

<!-- FIM - DIV Fixa no rodape -->

<!-- RODAPE -->
<footer>

    <!-- Rodape Principal -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- Logomarcas do rodapé -->
            <!-- Logo Branca p/ fundo escuro -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 logo-rodape" align="center">
                <a href="https://www.hotboys.com.br/"><img src="https://www.hotboys.com.br/imagens/logos/logo-rodape-escuro.png" align="center" alt="logo da HotBoys no rodapé"/></a>
            </div>



            <!-- Menu Central do rodapé -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 textos-rodape">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer_menu">
                        <ul>

                            <li>
                                <a href="https://www.hotboys.com.br/termos-de-uso""><span>Termos de Uso e Condições</span></a>
                            </li>


                            <li>
                                <a href="https://www.hotboys.com.br/politica-de-privacidade""><span>Política de Privacidade</span></a>
                            </li>


                            <li>
                                <a href="https://www.hotboys.com.br/trabalhe-conosco""><span>Trabalhe Conosco</span></a>
                            </li>


                            <li>
                                <a href="https://www.hotboys.com.br/seja-um-modelo""><span>Seja um Modelo</span></a>
                            </li>


                            <li>
                                <a href="https://www.hotboys.com.br/duvidas-frequentes""><span>Dúvidas Frequentes </span></a>
                            </li>


                            <li>
                                <a href="https://www.hotboys.com.br/contatos""><span>Contatos</span></a>
                            </li>


                        </ul>
                    </div> 
                    <div class="clear"></div>
                </div>

                <!-- Logo da Hotmidias no rodape -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:15px">
                    <a class="logo-hotmiidas-rodape" href="https://hotmidias.com.br" target="_blank" 
                       style="background-image: url({{ asset('imagens/assine/icones/sprites-01.png') }}); width: 200px; height: 40px; background-position: 0 -122px; display: block; margin: 0 auto;">
                    </a>
                </div>

                <small class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2>Todos os atores desse site são maiores de 18 anos</h2>
                    <h2>Copyright &copy; 2006 - 2019  
                        <a href="https://www.hotboys.com.br/">
                            hotboys.com.br
                        </a>
                        </a>
                        Todos os direitos reservados
                    </h2>
                </small>
            </div>

            <!-- Menu Central do rodapé -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 rede-social" align="center">

                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-lg-offset-right-2">


                    <!-- Newsletter -->
                    <div class="newsletter">
                        <section class="subscribe-now">
                            <div class="well">
                                <h2>Inscreva-se para receber novidades por e-mail:</h2>
                                <form class="form-inline" action="" onsubmit="cadastrarNewsletter(); return false;">
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                        <div class="input-group form-group" id="newsletter-rodape">
                                            <input type="email" name="newsletter_rodape_email" id="newsletter_rodape_email" placeholder="Informe seu e-mail" required class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 btn-warning"  id="btn-rodape-newsletter">
                                        <input type="submit" value="Assinar" class="btn btn-warning" style="width:100%;" />
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>

                </div>

                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-lg-offset-right-2" id="redes-sociais">
                    <div class="footer-rede-social-tudo">
                        <span class="col-lg-3 col-md-3 col-sm-3 col-xs-3 " align="center">
                            <a href="https://www.facebook.com/sitehotboys" target="_blank" class="fa">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </span>

                        <span class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="center">
                            <a href="https://twitter.com/hotboys" target="_blank" class="fa">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </span>

                        <span class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="center">
                            <a class="fa" href="https://www.instagram.com/hotboys.oficial/">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </span>

                        <span class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="center">
                            <a href="https://www.youtube.com/channel/UCmVPoMWgRj0cVa0oYRem-tw/videos" target="_blank" class="fa">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- FIM Rodape Principal -->



    <div class="row rodape_secundario" style=" float: left; width: 100%;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- Logomarcas do rodapé -->
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12 site-responsivo" align="center">
                <img src="{{ asset('imagens/rodape/site-responsivo.png') }}">
            </div>



            <!-- Menu Central do rodapé -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 formas-pagamento" align="center">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="{{ asset('imagens/rodape/formas-pagamento.png') }}">
                </div>

            </div>


            <!-- Menu Central do rodapé -->
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-4 site-seguro" align="center">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="{{ asset('imagens/rodape/site-seguro.png') }}">
                </div>
            </div>
            <!-- FIM Rodape secundario = Icones -->
        </div>


    </div>	
    <div class="fade_menu_mobile"></div>

</footer>
<!-- Rodape secundario = Icones -->																						

<!-- JAVASCRIPTS PADROES (Include) -->	
<!-- javascript Desktop -->
<!-- jQuery versao 3.2.1 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!-- FANCYBOX -->
<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>


<!-- jQuery v3.2.1 ---------------->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
                                            var jQuery3211 = jQuery.noConflict();
                                            window.jQuery = jQuery3211;</script>


<!-- Modernizr versao 2.8.3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<!-- Bootstrap versao 3.3.7 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!-- Botão Antiflagra -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>


<script>
                                            function antiFlagra() {
                                            var x = document.getElementById('antiflagra2');
                                                    if (x.style.display === 'none') {
                                            x.style.display = 'block';
                                            } else {
                                            x.style.display = 'none';
                                            }
                                            }
</script>

<!-- POPUP MODAL VIP ======= -->
<script>
    jQuery3211(document).ready(function ($) {
    $(function(){
    $('#agreementPopupContainer').modal('show');
    });
    });
            $("a.clear").on("click", function(){
    $("#agreementPopupContainer").modal('hide');
    });</script>
<!-- POPUP MODAL VIP ======= -->


<!-- Menu principal que abre lateralmente no Mobile -->
<script>
            jQuery3211(document).ready(function ($) {
    $(document).ready(function() {
    $('.fade_menu_mobile').hide();
            $('#navicon').click(function() {
    if ($('#navicon').hasClass('closed')) {

    $('body').animate({left: "-250px"}, 400).css({"overflow":"hidden"});
            $('#main-nav').animate({right: "0"}, 400);
            $(this).removeClass('closed').addClass('open').html('x');
            $('.fade_menu_mobile').fadeIn();
    }
    else if ($('#navicon').hasClass('open')) {
    $('body').animate({left: "0"}, 400).css({"overflow":"scroll"});
            $('#main-nav').animate({right: "-250px"}, 400);
            $(this).removeClass('open').addClass('closed').html('&#9776; <span>Menu</span>');
            $('.fade_menu_mobile').fadeOut();
    }
    })
    })
    });</script>



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
    });</script>



<!-- Rodar mp4 ao passar mouse nas imagens ---------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-touch-events/1.0.5/jquery.mobile-events.min.js"></script>
<script>
            $(document).ready(function() {
    $(".item-video").hover(function() {
    //ao passar mouse
    $("img", this).css("display", "none");
            $(".fa-play-circle", this).css("display", "flex");
            $("video", this).css("display", "block");
            $("video", this).get(0).play();
            $(".preview-video-gif", this).css("display", "none"); //oculta gif
    })

            .mouseleave(function(){
            //ao remover mouse
            $(".fa-play-circle", this).css("display", "none");
                    $("video", this).css("display", "none");
                    $("img", this).css("display", "block");
                    $("video", this).get(0).pause();
                    $(".preview-video-gif", this).css("display", "none"); //oculta gif
            })

            ;
            //mobile
            $('.item-video-gif').on('tapstart', function() {
    $("img", this).css("display", "none");
            $("video", this).get(0).pause();
            $(".fa-play-circle", this).css("display", "none");
            $("video", this).css("display", "none");
            $(".preview-video-gif", this).css("display", "block");
    });
    });</script>


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
    });</script>


<!-- Efeito Tooltip (Tipo legendas quando clica ou passa o mouse) -->
<script src="{{ asset('js/popper.min.js') }}"></script>


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
                    url: "https://www.hotboys.com.br/includes/ajax.php?acao=newsletter",
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                    $('#newsletter-rodape').html(data['html']);
                            if (data['mensagem'] == 1){
                    alert("Agora preenche o seu NOME COMPLETO e E-MAIL!");
                            $("#newsletter_rodape_nome").focus();
                            $sidebar(".data").mask("99/99/9999");
                    }
                    if (data['mensagem'] == 2){
                    $("#btn-rodape-newsletter").hide();
                    }
                    }
            });
            }
</script>	


<!-- Formulario para COMENTAR - Esconde/Aparece -->
<script>
    jQuery3211(document).ready(function ($) {
    jQuery.fn.toggleText = function(a, b) {
    return   this.html(this.html().replace(new RegExp("(" + a + "|" + b + ")"), function(x){return(x == a)?b:a; }));
    }
    $(document).ready(function(){
    $('.comentarios_formulario').before('<span class="comentar">Comentar </span>');
            $('.comentarios_formulario').css('display', 'none')
            $('span', '.comentarios_formulario-comentar').click(function() {
    $(this).next().slideToggle('slow')
            .siblings('.comentarios_formulario:visible').slideToggle('fast');
            $(this).toggleText('Comentar', 'Ocultar')
            .siblings('span').next('.comentarios_formulario:visible').prev()
            .toggleText('Comentar', 'Ocultar')
    })
    })
    });</script>


<!-- Formulario para RESPONDER um comentario - Esconde/Aparece -->
<script>
            jQuery3211(document).ready(function ($) {
    jQuery.fn.toggleText = function(a, b) {
    return   this.html(this.html().replace(new RegExp("(" + a + "|" + b + ")"), function(x){return(x == a)?b:a; }));
    }
    $(document).ready(function(){
    $('.comentarios_responder').before('<span>Responder</span>');
            $('.comentarios_responder').css('display', 'none')
            $('span', '.comentarios_formulario-responder').click(function() {
    $(this).next().slideToggle('slow')
            .siblings('.comentarios_responder').slideToggle('fast');
            $(this).toggleText('Responder', 'Ocultar')
            .siblings('span').next('.comentarios_responder').prev()
            .toggleText('Responder', 'Ocultar')
    })
    })
    });</script>

<script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
<script charset="utf-8">
            jQuery(function($) {
            $.mask.definitions['~'] = '[+-]';
                    $('#newsletter_rodape_nascimento').mask('99/99/9999');
            });</script>




<script src="{{ asset('js/croppie.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/croppie.css') }}">


<script>
            jQuery('#upload-croppie').croppie({
    url: 'imagens/area-do-cliente/fotos-clientes/86282bc2fca70ad68fcbc430685914de.png',
            viewport: {
            width: 50,
                    height: 50
            },
            points: [10, 20, 30, 40]
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
            if (extensao == 'jpg' || extensao == 'jpeg' || extensao == 'png' || extensao == 'gif' || extensao == 'bmp'){
    //arquivo valido	
    readURL(this);
            $("#minha-conta-salvar-imagem").css("display", "block");
    } else {
    //arquivo invalido	
    alert("ARQUIVO INVÁLIDO!\nVocê precisa enviar a foto no formato JPG, JPEG, GIF, PNG ou BMP");
    }
    });</script>

<script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
<!-- MASCARÁ DE DATA DE NASCIMENTO DO NEWSLETTER -->
<script type="text/javascript" charset="utf-8">
            jQuery(function($) {
            $.mask.definitions['~'] = '[+-]';
                    $('#newsletter_rodape_nascimento').mask('99/99/9999');
            });</script>



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
            }
            });
            });
                    lazyImages.forEach(function(lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                    });
            } else {
            // Possibly fall back to a more compatible method here
            }
            });</script>			




<!-- Carousel Mobile de Modelos -->
<script>
            jQuery3211(document).ready(function ($) {
    $(function() {

    $('#myCarousel').carousel({
    interval: 4000,
            cycle: true
    })
            console.log($('#myCarousel .item'))
            $('#myCarousel .item').each(function() {

    var next = $(this).next();
            console.log(next);
            if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
            if (next.next().length > 0) {
    next.next().children(':first-child').clone().appendTo($(this));
    } else {
    $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
    }
    })
    })
    });
</script>

</body>
</html>											