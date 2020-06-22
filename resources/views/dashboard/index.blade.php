@include('includes.header')
<div class="container">
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- TOPO (Include) -->
    <div class="row" style="float:left;width:100%">

        <style>
            button.btn-assinar {
                margin-top: 6px!important;
                overflow: hidden;
            }
            button.btn-login{
                overflow: hidden;
            }
            .btn-assinar .fa-lock{float: left; color: white!important;background-color: transparent!important;margin-left: 3px;}
            .btn-assinar .fa-lock:before{background-color: transparent}
            }
            .inicial_box_conteudo a{
                width:100%;
            }
            button.btn-assinar span, button.btn-login span{
                color: #fff!important;
            }
            button.btn-assinar {
                border-radius: 4px;
            }
            header.assineja-entrar li a{
                float:left;
            }

            @media (min-width:1200px){
                .busca-topo {
                    float: right;
                    margin-right: 15px!important;
                    margin-top: 8px;
                }

                input[type=search]#search{
                    width: 94%;
                    padding-left: 45px;
                    font-size: 17px;
                    color: #676767;
                    border: 1px solid #cecece;
                    border-radius: 50px;
                    background: url({{ asset('imagens/icones/lupa-pesquisa-40px.png') }}) no-repeat #e0e0e0;
                    height: 37px;
                    margin-top: 10px;
                    -webkit-appearance: none
                }

                a.nome,a:hover.nome{
                    position: absolute;
                    left: 0;
                    top: 40%;
                    text-align: center;
                    width: 99%;
                    font-size: 23px;
                    display: none;
                    line-height: 50px;
                    background: #0d0d0dd1;
                    color: #fff!important;
                }


                .conteudoModelo:hover .nome {
                    display: block;
                    top: 38%;
                }

                .conteudoModelo span{
                    float: left;
                }


                .conteudoModelo .nome-modelos{
                    width:80%;
                    text-align:center;
                }

                .conteudoModelo .icone-pimenta img{
                    width: 100%!important;
                    border:0!important;
                    margin-top:0px;
                }

                }
                @media (min-width:992px) and (max-width:1199px){
                    input[type=search]#search{width: 94%;padding-left: 45px;font-size: 17px;color: #676767;border: 1px solid #cecece;border-radius: 50px;background: url({{ asset('imagens/icones/lupa-pesquisa-40px.png') }}) no-repeat #e0e0e0;height: 37px;margin-top: 6px;-webkit-appearance: none}

                .busca-topo {
                    margin-right: 15px!important;
                    margin-top: 8px;
                    float: right;
                }
                .logo-fundo-branco img, .logo-fundo-preto img{
                    margin-left: 9px!important;
                    width: 82%;
                }

                a.nome,a:hover.nome{
                    position: absolute;
                    left: 0;
                    top: 40%;
                    text-align: center;
                    width: 99%;
                    font-size: 23px;
                    display: none;
                    line-height: 50px;
                    background: #0d0d0dd1;
                    color: #fff!important;
                }


                .conteudoModelo:hover .nome {
                    display: block;
                    top: 38%;
                }

                .conteudoModelo span{
                    float: left;
                }

                .conteudoModelo .nome-modelos{
                    width: 80%;
                    text-align: center;
                    font-size: 17px;
                }

                .conteudoModelo .icone-pimenta{
                    width: 20%;
                }

                .conteudoModelo .icone-pimenta img{
                    width: 100%!important;
                    border:0!important;
                    margin-top:0px;
                }
                }






                @media (min-width:768px) and (max-width:991px){
                    #cena_fotos .inicial_box_conteudo, #info1 .box{overflow:hidden;height:113px}
                    .botoes-topo-acesso{
                        margin-right: 12px;
                    }
                    .logo-fundo-branco img, .logo-fundo-preto img {
                        width: 88%;
                        margin-left: 6px!important;
                    }
                    .busca-topo{
                        margin-top: -2px;
                    }
                    input[type=search]#search { width: 94%; padding-left: 45px; font-size: 17px; color: #676767; border: 1px solid #cecece; border-radius: 50px; background: url({{ asset('imagens/icones/lupa-pesquisa-40px.png') }}) no-repeat #e0e0e0; height: 36px; margin-top: 1px; -webkit-appearance: none; }
                button.btn-assinar {margin-top: 9px!important;}
                .conteudoModelo a.nome{display:none}

                }



                @media (max-width:767px){
                    input[type=search]#search{width: 94%;padding-left: 45px;font-size: 17px;color: #676767;border: 1px solid #cecece;border-radius: 50px;background: url({{ asset('imagens/icones/lupa-pesquisa-40px.png') }}) no-repeat #e0e0e0;height: 37px;margin-top: 10px;-webkit-appearance: none}

                .conteudoModelo a.nome,.letras-paginacao{display:none}
                }

                @media (max-width:480px){
                    input[type=search]#search{width: 94%;padding-left: 45px;font-size: 17px;color: #676767;border: 1px solid #cecece;border-radius: 50px;background: url({{ asset('imagens/icones/lupa-pesquisa-40px.png') }}) no-repeat #e0e0e0;height: 37px;margin-top: 10px;-webkit-appearance: none}

                .conteudoModelo a.nome,.letras-paginacao{display:none}
                }
            </style>




            <!-- Topo com links e Idiomas (Fundo Preto) -->
            <nav class="navtopo navtopo-expand-lg navtopo-dark bg-dark-topo">
                <div class="container">
                    <!-- SLOGAN e os 4 outros sites do grupo -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
                        <div class="navtopo-collapse">
                            <ul class="navtopo-nav mr-auto sites-topo">

                                <li class="nav-item slogan solo" style="float: left!important;">
                                    <a href="https://www.solohot.com.br/" target="_blank">

                                        <!-- Icone solohot do topo -->
                                        <div class="icone-solo-topo"></div> 
                                        <span>SOLOHOT</span>
                                    </a>
                                </li> 
                                <li class="nav-item slogan topo" style="float: left!important;">

                                    <a href="https://www.hotboys.com.br/" target="_blank">

                                        <!-- Icone hotboys do topo -->
                                        <div class="icone-hot-topo"></div>
                                        <span>HOTBOYS</span>

                                    </a>
                                </li> 



                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 topo-slogan" >
                        <div class="navtopo-collapse">
                            <ul class="navtopo-nav mr-auto" style="margin: 0 auto; float: none;">
                                <li class="nav-item slogan topo" >O Site Mais Quente da Net!</li> 
                            </ul>
                        </div>
                    </div>


                </div>
            </nav>




            <!-- Div da logo, botoes e busca (Fundo Branco) -->

            <!-- Div da logo, botoes e busca (Fundo Branco) -->
            <nav class="navlogo navlogo-expand-lg navlogo-dark bg-white">
                <div class="container">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <!-- LOOGOMARCAS DO TOPO -->
                        <!-- Logo Preta p/ fundo claro -->

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-fundo-preto" style="margin-top:0px;margin-bottom:0px"> 

                            <a class="navlogo-brand" href="https://www.hotboys.com.br/ ">
                                <img src="https://server2.hotboys.com.br/arquivos/81e8c_logo-fundo-preto.png" alt="Logo topo" style="margin-left: 16px;"/> 
                            </a>
                        </div>


                        <!-- botoes ASSINE e ENTRAR -->
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 botoes-pretos-topo" align="center">
                            <!-- campo de busca no menu desktop -->
                            <form method="post" action="https://www.hotboys.com.br/busca"> 
                                <input type="search" id="search" name="search" placeholder="Busca..." list="preenchimento-automatico">
                            </form>	

                        </div>


                        <!-- Formulario NÃO VIP - Botão Busca -->
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3 busca-topo">
                            <div class="botoes-topo-acesso" style="float: right;">
                                <a href="https://www.hotboys.com.br/vip/login"><button type="button" class="btn-login"><span>Entrar</span></button></a>
                                <a href="https://www.hotboys.com.br/assine">
                                    <button type="button" class="btn-assinar" style=" background: #20b038!important; color: #fff;"><span><i class="fa fa-lock"></i> Assinar</span></button></a>

                            </div>


                        </div><!-- FIM Formulario NÃO VIP - Botão Busca -->


                    </div>
                </div>
            </nav>






            <!-- Menu principal DESKTOP(Fundo Vermelho) -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav mx-auto">

                            <li class="nav-item">
                                <a class="nav-link" href="https://www.hotboys.com.br/">

                                    HOME
                                </a> 
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link audicoes" href="https://www.hotboys.com.br/audicoes">

                                    <i class="fas fa-star fa-xs"></i> AUDIÇÕES <i class="fas fa-star fa-xs"></i>
                                </a> 
                            </li>
                            <!-- Menu Categorias com submenu -->
                            <style>
                                .menu-submenu{
                                    cursor:pointer;
                                }

                                .menu-submenu .seta-baixo{
                                    margin: 0 auto;
                                    margin-top: 2px!important;
                                    border-width: 6px;
                                    border-style: solid dashed dashed dashed;
                                    border-color: #fff transparent transparent transparent;
                                    background: transparent;
                                    border-radius: 0;
                                    width: 5px;
                                    display: flex;
                                    display: -webkit-flex;
                                    display: flex;
                                    -webkit-align-items: center;
                                    align-items: center;
                                    -webkit-justify-content: center;
                                    justify-content: center;
                                    position: relative;
                                }

                                .menu-submenu ul{
                                    width: 770px;
                                    display: none;
                                    position: absolute;
                                    float: left;
                                    z-index: 9;
                                    text-align: center;
                                    list-style-type: none;
                                    margin: 0;
                                    padding: 15px;
                                    overflow: hidden;
                                    background-color: #0d0d0d;
                                }

                                .menu-submenu:hover ul{
                                    display:block;
                                }

                                .menu-submenu ul .categorias-tags-imagens{
                                    float:left
                                }

                                .menu-submenu ul .categorias-tags-imagens a{
                                    float:left;
                                    margin: 6px;
                                }

                                .menu-submenu ul .categorias-tags-imagens a:hover {
                                    background-color: #e31330!important;
                                    box-shadow: none!important;
                                }

                                .menu-submenu span.titulo-submenu{
                                    font-size: 10px;
                                    font-weight: normal!important;
                                    font-family: 'Open Sans';
                                    float: left;
                                    width: 100%;
                                    margin-top: 5px;
                                    margin-bottom: 8px;
                                    padding-left: 10px;
                                    padding-right: 10px;
                                }

                                .menu-submenu img{
                                    width:100%;
                                }

                                .categorias-tags-texto{
                                    float: left; 
                                    padding: 10px; 
                                    border-top: 1px dashed #5f5d5d;
                                }

                                .categorias-tags-texto a{
                                    float:left
                                }

                                .mais-categorias{
                                    float:left;
                                    width: 100%; 
                                    padding: 8px; 
                                    background-color: #e31330; 
                                    font-size: 13px; 
                                    margin-bottom: 10px; 
                                    margin-top: 5px;
                                    text-align: left;
                                }

                                .categorias-tags-texto a li span.titulo-submenu{
                                    padding-left: 10px;
                                    padding-right: 10px;
                                    border: 1px solid #0d0d0d;
                                    padding: 9px;
                                    background-color: #171717;
                                    margin:3px;
                                }

                                .categorias-tags-texto a:hover li span.titulo-submenu{
                                    background-color:#e31330!important;
                                }

                                .menu-submenu a:hover .seta-baixo{border-color: #fffdfd transparent transparent transparent;}

                                @media (min-width:992px) and (max-width:1199px){
                                    .menu-submenu .seta-baixo{margin-top: 0px;}
                                    .navbar-nav li.nav-item:not(:first-child) {padding-left: 10px!important;}
                                    .menu-submenu ul{width:600px!important}
                                }

                                @media (min-width:768px) and (max-width:991px){
                                    .navbar-nav li.nav-item:not(:first-child){padding-left:0px!important}
                                    .menu-submenu .seta-baixo{margin-top: -10px!important;}
                                    .menu-submenu ul{width:600px!important}
                                }
                            </style>

                            <li class="nav-item menu-submenu">
                                <a class="nav-link">
                                    Categorias
                                    <span class="seta-baixo"></span>
                                </a> 

                                <ul>
                                    <div class="categorias-tags-imagens">
                                        <a href="https://www.hotboys.com.br/tag/cafucu/">
                                            <li style="display:inline-block;padding:10px 10px 0 10px;width:110px;">
                                                <span>
                                                    <img src="https://server2.hotboys.com.br/arquivos/63854_6ef50_categoria-morenos.jpg"/>
                                                </span>
                                                </span>
                                                <span class="titulo-submenu">cafuçu</span>
                                            </li>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/dotados/">
                                            <li style="display:inline-block;padding:10px 10px 0 10px;width:110px;">
                                                <span>
                                                    <img src="https://server2.hotboys.com.br/arquivos/90b54_dotado02.jpg"/>
                                                </span>
                                                </span>
                                                <span class="titulo-submenu">dotados</span>
                                            </li>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/interracial/">
                                            <li style="display:inline-block;padding:10px 10px 0 10px;width:110px;">
                                                <span>
                                                    <img src="https://server2.hotboys.com.br/arquivos/000d1_interracial.jpg"/>
                                                </span>
                                                </span>
                                                <span class="titulo-submenu">interracial</span>
                                            </li>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/mega-dotados/">
                                            <li style="display:inline-block;padding:10px 10px 0 10px;width:110px;">
                                                <span>
                                                    <img src="https://server2.hotboys.com.br/arquivos/62ac5_mega-dotados01.jpg"/>
                                                </span>
                                                </span>
                                                <span class="titulo-submenu">mega dotados</span>
                                            </li>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/sexo-dotados/">
                                            <li style="display:inline-block;padding:10px 10px 0 10px;width:110px;">
                                                <span>
                                                    <img src="https://server2.hotboys.com.br/arquivos/9561b_sexo-dotados.jpg"/>
                                                </span>
                                                </span>
                                                <span class="titulo-submenu">sexo dotados</span>
                                            </li>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/suruba/">
                                            <li style="display:inline-block;padding:10px 10px 0 10px;width:110px;">
                                                <span>
                                                    <img src="https://server2.hotboys.com.br/arquivos/02a94_suruba.jpg"/>
                                                </span>
                                                </span>
                                                <span class="titulo-submenu">suruba</span>
                                            </li>
                                        </a>
                                    </div>
                                    <div class="categorias-tags-texto">

                                        <div class="mais-categorias">Todas as Categorias</div>

                                        <a href="https://www.hotboys.com.br/tag/bareback/">
                                            <li><span class="titulo-submenu">bareback</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/brancos/">
                                            <li><span class="titulo-submenu">brancos</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/bundas/">
                                            <li><span class="titulo-submenu">bundas</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/cafucu/">
                                            <li><span class="titulo-submenu">cafuçu</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/dotados/">
                                            <li><span class="titulo-submenu">dotados</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/dupla-penetracao/">
                                            <li><span class="titulo-submenu">dupla penetracão</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/glory-hole/">
                                            <li><span class="titulo-submenu">glory hole</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/interracial/">
                                            <li><span class="titulo-submenu">interracial</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/irmaos-/">
                                            <li><span class="titulo-submenu">irmãos </span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/loiros/">
                                            <li><span class="titulo-submenu">loiros</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/maduro/">
                                            <li><span class="titulo-submenu">maduro</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/maiores/">
                                            <li><span class="titulo-submenu">maiores</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/mega-dotados/">
                                            <li><span class="titulo-submenu">mega dotados</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/morenos/">
                                            <li><span class="titulo-submenu">morenos</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/musculo-/">
                                            <li><span class="titulo-submenu">musculo </span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/negros/">
                                            <li><span class="titulo-submenu">negros</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/pai-e-filho/">
                                            <li><span class="titulo-submenu">pai e filho</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/peludos/">
                                            <li><span class="titulo-submenu">peludos</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/reality/">
                                            <li><span class="titulo-submenu">reality</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/sarados/">
                                            <li><span class="titulo-submenu">sarados</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/sem-pelos/">
                                            <li><span class="titulo-submenu">sem Pelos</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/serie/">
                                            <li><span class="titulo-submenu">serie</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/sexo/">
                                            <li><span class="titulo-submenu">sexo</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/sexo-amor/">
                                            <li><span class="titulo-submenu">sexo amor</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/sexo-brancos/">
                                            <li><span class="titulo-submenu">sexo brancos</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/sexo-bruto/">
                                            <li><span class="titulo-submenu">sexo bruto</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/sexo-dotados/">
                                            <li><span class="titulo-submenu">sexo dotados</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/sexo-historia/">
                                            <li><span class="titulo-submenu">sexo historia</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/sexo-morenos/">
                                            <li><span class="titulo-submenu">sexo morenos</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/solo/">
                                            <li><span class="titulo-submenu">solo</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/solo-dotados/">
                                            <li><span class="titulo-submenu">solo dotados</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/solo-lindos/">
                                            <li><span class="titulo-submenu">solo lindos</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/suruba/">
                                            <li><span class="titulo-submenu">suruba</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/tatuagem-/">
                                            <li><span class="titulo-submenu">tatuagem </span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/teens/">
                                            <li><span class="titulo-submenu">teens</span></li>
                                        </a>
                                        </a>
                                        <a href="https://www.hotboys.com.br/tag/trio/">
                                            <li><span class="titulo-submenu">trio</span></li>
                                        </a>
                                        </a>
                                    </div>

                                </ul>



                            </li> 	

                            <!-- Menu Modelos com submenu -->

                            <li class="nav-item">
                                <a class="nav-link" 
                                   href="https://www.hotboys.com.br/videos ">
                                    CENAS												</a> 
                            </li> 




                            <li class="nav-item">
                                <a class="nav-link" 
                                   href="https://www.hotboys.com.br/modelos ">
                                    MODELOS												</a> 
                            </li> 




                            <li class="nav-item">
                                <a class="nav-link" 
                                   href="https://www.hotboys.com.br/series ">
                                    SéRIES												</a> 
                            </li> 




                            <li class="nav-item">
                                <a class="nav-link" 
                                   href="https://www.hotboys.com.br/contos-eroticos ">
                                    CONTOS												</a> 
                            </li> 




                            <li class="nav-item">
                                <a class="nav-link" 
                                   href="https://www.hotboys.com.br/contatos ">
                                    CONTATOS												</a> 
                            </li> 






                        </ul>
                    </div>
                </div>

            </nav>




            <!-- Menu principal (MOBILE) -->

            <div id="main-nav">
                <nav> 
                    <div class="col-sm-12 col-xs-12 logo-branca-menu"> 
                        <a href="https://www.hotboys.com.br/">
                            <img src="{{ asset('imagens/logos/hotBoys_whitefull.png') }}" alt="logo menu mobile"/>
                        </a> 
                    </div>

                    <div class="col-sm-12 busca-mobile float-left" align="center">

                        <form class="form-inline my-2 my-lg-0" method="post" action="https://www.hotboys.com.br/busca" style="float:left">
                            <input type="search" id="search" name="search" placeholder="Busca...">

                        </form>
                    </div>

                    <div class="col-sm-12 col-xs-12 menu-mobile-btns-topo">
                        <div class="col-sm-12 col-xs-12 float-left">
                            <a href="https://www.hotboys.com.br/assine">
                                <button type="button" class="btn btn-assinar" style="margin-left:0%">
                                    <span>Assinar</span>
                                </button>
                            </a>
                        </div>
                        <div class="col-sm-12 col-xs-12 float-left">
                            <a href="https://www.hotboys.com.br/vip/login">
                                <button type="button" class="btn btn-login" style="margin-right:0%">
                                    <span>Entrar</span>
                                </button>
                            </a>
                        </div>
                    </div>

                    <!--Menu AUDIÇAO -->
                    <div class="col-sm-12 menu-mobile" > 


                        <!-- menu mobile HOME -->
                        <a class="nav-link" href="https://www.hotboys.com.br/">
                            <div>HOME</div>
                        </a> 

                        <a class="nav-link" href="https://www.hotboys.com.br/audicoes"><div style=" color: #fff7f7!important; background-color:#bf001a!important;">AUDIÇÕES</div></a>



                        <a href="https://www.hotboys.com.br/videos" align="center">
                            <div>CENAS</div>
                        </a>

                        <a href="https://www.hotboys.com.br/modelos" align="center">
                            <div>MODELOS</div>
                        </a>

                        <a href="https://www.hotboys.com.br/series" align="center">
                            <div>SéRIES</div>
                        </a>

                        <a href="https://www.hotboys.com.br/contos-eroticos" align="center">
                            <div>CONTOS</div>
                        </a>

                        <a href="https://www.hotboys.com.br/contatos" align="center">
                            <div>CONTATOS</div>
                        </a>





                        <!-- Solohot no menu mobile -->
                        <div class="col-lg-12 solohot-menu" style="margin-top: 13px;">
                            <a href="https://www.solohot.com.br/">
                                <img src="{{ ('imagens/logos/solohot_whitefull.png') }}" alt="logo solohot menu mobile"/>
                            </a>
                        </div>
                        <!-- Logo Cinehot no menu mobile -->
                        <div class="col-lg-12 cinehot-menu">
                            <a href="#"><img src="{{ ('imagens/logos/cinehot_whitefull.png') }}" alt="logo cinehot menu mobile"/></a>
                        </div>
                        <!-- Logo HoTV no menu mobile -->
                        <div class="col-lg-12 hotv-menu">
                            <a href="#"><img src="{{ ('imagens/logos/hotv_whitefull.png') }}" alt="logo hotv menu mobile"/></a>
                        </div>
                    </div>




                    <style>
                        .botao-whatsapp a{position: fixed;z-index: 9999;right: 0;float: right;top: 40%;margin-top: -25px;cursor: pointer;min-width: 50px;max-width: 150px;color: #fff;text-align: center;padding: 10px;margin: 0 auto 0 auto;background: #20B038;-webkit-transition: All 0.5s ease;-moz-transition: All 0.5s ease;-o-transition: All 0.5s ease;-ms-transition: All 0.5s ease;transition: All 0.5s ease;box-shadow: 8px 2px 5px #131313b8;}
                        .botao-whatsapp a:hover{color:#fff!important;background:#e31330;}
                    </style>

                    <div class="botao-whatsapp">
                        <a href="https://wa.me/5521965035394" target="_blank">
                            <span>
                                <i class="fab fa-whatsapp" style="font-size: 23px;margin-top: 0px;float: left;margin-right: 5px;">
                                </i>
                            </span> 

                            <span style="font-size: 12px;font-family: &quot;Open Sans&quot;;float: none;line-height: 2em;">Atendimento</span>
                        </a>

                    </div>	







                </nav>
            </div>																																																																</div>

        <!-- FIM - Aqui entra a mensagem de manutenção -->
        <!-- BANNER 01 
                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
                                        </div>-->

        <div class="row" style="float:left;width:100%;margin-top:5px">
            <div class="home-assineja-imagensing">
                <div class="row float-none" >
                    <div class="col-lg-12 col-md-12 banner" style="float:left;width:100%;">

                        <!-- Bootstrap versao 3.3.7 -->
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            </ol>



                            <!-- Imagens da vitrine -->
                            <div class="carousel-inner" role="listbox">


                                <!-- VITRINE ADICIONAL TODOS
                                                                                                                        
                                FIM DO SCRIPT DA VITRINE ADICIONAL TODOS-->




                                <div class="item  active">
                                    <a href="https://www.hotboys.com.br/cena/369/caio-e-junior---1�-fase---cena-1"> 
                                        <img src="https://server2.hotboys.com.br/arquivos/7ba64_0_cena_vitrine.jpg" alt="imagem vitrine" width="100%">
                                    </a>
                                    <div class="carousel-caption">
                                        <h3> Caio e Junior - 1� fase - Cena 1</h3>
                                    </div>
                                    <!-- Button que abre Modal -->
                                    <button type="button" class="botao-modal" data-toggle="modal" data-target="#videoModal369"
                                            style="position: absolute; background: transparent url({{ ('imagens/assine/icones/botao-trailer.png') }}); width: 232px; height: 161px; left: 0%; top: 0%;z-index:9">
                                    </button>
                                </div>
                                <!-- INICIO Modal Video vitrine -->
                                <div class="video-vitrine modal fade" id="videoModal369" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content" style="background:transparent;box-shadow: 0 0 0!important;border: 0!important;">
                                            <!-- BOTÃO QUE FECHA MODAL -->
                                            <div class="modal-header" style="padding: 0!important; border-bottom: 0!important;">
                                                <a type="button" id="fechar" class="modal-fechar" data-dismiss="modal" href="">&times;</a>
                                            </div>
                                            <!-- JANELA MODAL -->
                                            <div class="modal-body">
                                                <div class="embed-responsive embed-responsive-16by9" id="iframe-modal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>	
                                <script>
$(document).ready(function () {
//Variaveis locais
    var _seletorLinkAbrir = $(".botao-modal");
    var _seletorLinkFechar = $(".modal-fechar");
    var _containerModal = $(".video-vitrine");
//Abrindo modal
    $(_seletorLinkAbrir).click(function () {

    });
//fechando modal
    $(_seletorLinkFechar).click(function () {
        window.location.href = "https://www.hotboys.com.br";
    });
});</script>
                                <!-- FIM do Modal Video vitrine -->

                                <div class="item ">
                                    <a href="https://www.hotboys.com.br/cena/368/uber-xxx-5"> 
                                        <img src="https://server2.hotboys.com.br/arquivos/946c2_0_cena_vitrine.jpg" alt="imagem vitrine" width="100%">
                                    </a>
                                    <div class="carousel-caption">
                                        <h3> Uber xXx 5</h3>
                                    </div>
                                    <!-- Button que abre Modal -->
                                    <button type="button" class="botao-modal" data-toggle="modal" data-target="#videoModal368"
                                            style="position: absolute; background: transparent url({{ asset('imagens/assine/icones/botao-trailer.png') }}); width: 232px; height: 161px; left: 0%; top: 0%;z-index:9">
                                    </button>
                                </div>
                                <!-- INICIO Modal Video vitrine -->
                                <div class="video-vitrine modal fade" id="videoModal368" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content" style="background:transparent;box-shadow: 0 0 0!important;border: 0!important;">
                                            <!-- BOTÃO QUE FECHA MODAL -->
                                            <div class="modal-header" style="padding: 0!important; border-bottom: 0!important;">
                                                <a type="button" id="fechar" class="modal-fechar" data-dismiss="modal" href="">&times;</a>
                                            </div>
                                            <!-- JANELA MODAL -->
                                            <div class="modal-body">
                                                <div class="embed-responsive embed-responsive-16by9" id="iframe-modal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>	
                                <script>
                                    $(document).ready(function () {
                                        //Variaveis locais
                                        var _seletorLinkAbrir = $(".botao-modal");
                                        var _seletorLinkFechar = $(".modal-fechar");
                                        var _containerModal = $(".video-vitrine");
                                        //Abrindo modal
                                        $(_seletorLinkAbrir).click(function () {

                                        });
                                        //fechando modal
                                        $(_seletorLinkFechar).click(function () {
                                            window.location.href = "https://www.hotboys.com.br";
                                        });
                                    });</script>
                                <!-- FIM do Modal Video vitrine -->

                                <div class="item ">
                                    <a href="https://www.hotboys.com.br/cena/367/nego-brown--katter"> 
                                        <img src="https://server2.hotboys.com.br/arquivos/ccec4_0_cena_vitrine.jpg" alt="imagem vitrine" width="100%">
                                    </a>
                                    <div class="carousel-caption">
                                        <h3> Nego Brown & Katter</h3>
                                    </div>
                                    <!-- Button que abre Modal -->
                                    <button type="button" class="botao-modal" data-toggle="modal" data-target="#videoModal367"
                                            style="position: absolute; background: transparent url(https://www.hotboys.com.br/imagens/assine/icones/botao-trailer.png); width: 232px; height: 161px; left: 0%; top: 0%;z-index:9">
                                    </button>
                                </div>
                                <!-- INICIO Modal Video vitrine -->
                                <div class="video-vitrine modal fade" id="videoModal367" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content" style="background:transparent;box-shadow: 0 0 0!important;border: 0!important;">
                                            <!-- BOTÃO QUE FECHA MODAL -->
                                            <div class="modal-header" style="padding: 0!important; border-bottom: 0!important;">
                                                <a type="button" id="fechar" class="modal-fechar" data-dismiss="modal" href="">&times;</a>
                                            </div>
                                            <!-- JANELA MODAL -->
                                            <div class="modal-body">
                                                <div class="embed-responsive embed-responsive-16by9" id="iframe-modal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>	
                                <script>
                                    $(document).ready(function () {
                                        //Variaveis locais
                                        var _seletorLinkAbrir = $(".botao-modal");
                                        var _seletorLinkFechar = $(".modal-fechar");
                                        var _containerModal = $(".video-vitrine");
                                        //Abrindo modal
                                        $(_seletorLinkAbrir).click(function () {

                                        });
                                        //fechando modal
                                        $(_seletorLinkFechar).click(function () {
                                            window.location.href = "https://www.hotboys.com.br";
                                        });
                                    });</script>
                                <!-- FIM do Modal Video vitrine -->

                                <div class="item ">
                                    <a href="https://www.hotboys.com.br/cena/365/o-primo---theo-barone--vitor-guedes"> 
                                        <img src="https://server2.hotboys.com.br/arquivos/fd340_0_cena_vitrine.jpg" alt="imagem vitrine" width="100%">
                                    </a>
                                    <div class="carousel-caption">
                                        <h3> O Primo - Theo Barone & Vitor Guedes</h3>
                                    </div>
                                    <!-- Button que abre Modal -->
                                    <button type="button" class="botao-modal" data-toggle="modal" data-target="#videoModal365"
                                            style="position: absolute; background: transparent url(https://www.hotboys.com.br/imagens/assine/icones/botao-trailer.png); width: 232px; height: 161px; left: 0%; top: 0%;z-index:9">
                                    </button>
                                </div>
                                <!-- INICIO Modal Video vitrine -->
                                <div class="video-vitrine modal fade" id="videoModal365" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content" style="background:transparent;box-shadow: 0 0 0!important;border: 0!important;">
                                            <!-- BOTÃO QUE FECHA MODAL -->
                                            <div class="modal-header" style="padding: 0!important; border-bottom: 0!important;">
                                                <a type="button" id="fechar" class="modal-fechar" data-dismiss="modal" href="">&times;</a>
                                            </div>
                                            <!-- JANELA MODAL -->
                                            <div class="modal-body">
                                                <div class="embed-responsive embed-responsive-16by9" id="iframe-modal">
                                                    <iframe src="https://player.jmvstream.com/qAGjxuwNoNQIj2i9kkVHgLMIxUuMu7/oq0km31dc846m4k" allowfullscreen allow="autoplay; fullscreen" frameborder="0" width="640" height="360" ></iframe>															</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>	
                                <script>
                                    $(document).ready(function () {
                                        //Variaveis locais
                                        var _seletorLinkAbrir = $(".botao-modal");
                                        var _seletorLinkFechar = $(".modal-fechar");
                                        var _containerModal = $(".video-vitrine");
                                        //Abrindo modal
                                        $(_seletorLinkAbrir).click(function () {

                                        });
                                        //fechando modal
                                        $(_seletorLinkFechar).click(function () {
                                            window.location.href = "https://www.hotboys.com.br";
                                        });
                                    });</script>
                                <!-- FIM do Modal Video vitrine -->






                                <!-- seta da esquerda - vitrine -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> 
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>

                                <!-- seta da direita - vitrine -->
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"> </span></a> 
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="push"> </div>
        </div>



        <!-- BANNER 02
                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 banners_sites" style="margin-top:13px;display:block!important">
                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
                                                                                                        <a href=""target=""">
                                <img src="https://server2.hotboys.com.br/arquivos/"  width="100%">
                                </a>
                                                                </div>
                </div>
        --> 


        <!-- Título H1 do conteúdo -->
        <div class="row" style="width:100%;float:left">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="home-titulo" style="border-left:0!important;padding-left:0!important">
                    <span class="icone-pimenta-titulo"></span>
                    HOTVIPS ASSISTINDO AGORA					</h1>
            </div>
        </div>
        <!-- Conteúdo - Hotvips assistindo agora --> 
        <div class="row container-tudo espacamento-laterais-3" style="width:100%;float:left">
            @foreach ($cenas as $cena)
                @if($cena->status == 'Ativo')
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
                    <a href="{{ route('cena.page',['id' => $cena->id,'titulo' => str_replace(' ','-',$cena->titulo)]) }}" class=" item-video ">
                        <div class="conteudo-imagens"> 
                            <img class="lazy home-clientes-assistindo" src="https://www.hotboys.com.br/imagens/icones/loading/loading-pimenta.gif" data-srcset="https://server2.hotboys.com.br/arquivos/{{ $cena->cena_vide }}" alt="imagem clientes assistindo">
                            <span class="far fa-play-circle fa-5x" style="display:none"></span>
                            <video width="100%" style="display:none!important" playsinline muted loop>
                                <source src="https://server2.hotboys.com.br/arquivos/{{ $cena->video_preview }}" type="video/mp4">
                            </video>
                        </div>
                    </a>
                    <div class="home-textos-clientes-assistindo">
                        <h4 class="home-titulo-clientes-assistindo"> 
                            {{ $cena->titulo }}								
                        </h4>
                        <div class="cenas-total-icones">
                            <!-- 1 - Icone e texto - Visualizacao-->
                            <div class="cenas-visualizacao">
                                <i class="far fa-eye"></i> 
                                <p class="texto">
                                    {{ $cena->visualizacao }}										
                                </p>
                            </div>
                            <!-- 2 - Icone e texto - Duracao do video -->
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        <!-- Botão Veja Mais assistindo nesse momento -->
        <div class="row" style="float:left;width:100%">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bt-vejamais-desktop">
                <h1 class="bt-vejamais"><a href="https://www.hotboys.com.br/videos">VEJA MAIS <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
            </div>
        </div>
        <!-- BANNER 03 	-->
        <div class="row" style="float:left;width:100%">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
                <a href="https://www.hotboys.com.br/atualizacoes-whatsapp"target="_blank"">
                    <img src="https://server2.hotboys.com.br/arquivos/8b5be_banner-whats2019.jpg" alt="imagem banner" width="100%">
                </a>
            </div>
        </div>
        <!-- Título H1 do conteúdo -->
        <div class="row" style="float:left;width:100%">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="home-titulo" style="border-left:0!important;padding-left:0!important">
                    <span class="icone-pimenta-titulo"></span>
                    SAIU DO FORNO HOT					
                </h1>
            </div>
        </div>
        <!-- Conteúdo - Cenas Recentes --> 
        <div class="row" style="float:left;width:100%">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
                <div> 
                    <a href="https://www.hotboys.com.br/cena/369/caio-e-junior---1�-fase---cena-1" class=" item-video ">
                        <img class="lazy home-clientes-assistindo" src="https://www.hotboys.com.br/imagens/icones/loading/loading-pimenta.gif" data-srcset="https://server2.hotboys.com.br/arquivos/bc66f_img-home.jpg" alt="imagem clientes assistindo">
                        <span class="far fa-play-circle fa-5x" style="display:none"></span>
                        <video width="100%" style="display:none" loop>
                            <source src="https://server2.hotboys.com.br/arquivos/fe449_video-home.mp4" type="video/mp4">
                        </video>
                    </a>
                    <div class="home-textos-cenas-recentes">
                        <h4 class="home-titulo-cenas-recentes"> <a href="https://www.hotboys.com.br/cena/369/caio-e-junior---1�-fase---cena-1">
                                Caio e Junior - 1ª fase - Cena 1								
                            </a> 
                        </h4>
                        <div class="cenas-total-icones">
                            <!-- CSS dos 3 icones que vem em seguida -->
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
                            <!-- 1 - Icone e texto - Visualizacao-->
                            <div class="cenas-visualizacao">
                                <i class="far fa-eye"></i> 
                                <p class="texto">
                                    9K										
                                </p>
                            </div>
                            <!-- 2 - Icone e texto - Duracao do video -->
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
                <div> 
                    <a href="https://www.hotboys.com.br/cena/365/o-primo---theo-barone--vitor-guedes" class="">
                        <img class="lazy home-clientes-assistindo" src="https://www.hotboys.com.br/imagens/icones/loading/loading-pimenta.gif" data-srcset="https://server2.hotboys.com.br/arquivos/cf95c_img_home.jpg" alt="imagem clientes assistindo">
                    </a>
                    <div class="home-textos-cenas-recentes">
                        <h4 class="home-titulo-cenas-recentes"> 
                            <a href="https://www.hotboys.com.br/cena/365/o-primo---theo-barone--vitor-guedes">
                                O Primo - Theo Barone & Vitor Guedes								
                            </a> 
                        </h4>
                        <div class="cenas-total-icones">
                            <!-- CSS dos 3 icones que vem em seguida -->
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
                            <!-- 1 - Icone e texto - Visualizacao-->
                            <div class="cenas-visualizacao">
                                <i class="far fa-eye"></i> 
                                <p class="texto">
                                    31.7K										
                                </p>
                            </div>
                            <!-- 2 - Icone e texto - Duracao do video -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
                <div> 
                    <a href="https://www.hotboys.com.br/cena/364/estevao-oliveira--grego" class=" item-video ">
                        <img class="lazy home-clientes-assistindo" src="https://www.hotboys.com.br/imagens/icones/loading/loading-pimenta.gif" data-srcset="https://server2.hotboys.com.br/arquivos/88e85_img-home.jpg" alt="imagem clientes assistindo">
                        <span class="far fa-play-circle fa-5x" style="display:none"></span>
                        <video width="100%" style="display:none" loop>
                            <source src="https://server2.hotboys.com.br/arquivos/d96dd_video-home.mp4" type="video/mp4">
                        </video>
                    </a>
                    <div class="home-textos-cenas-recentes">
                        <h4 class="home-titulo-cenas-recentes"> 
                            <a href="https://www.hotboys.com.br/cena/364/estevao-oliveira--grego">
                                Estevão Oliveira & Grego								
                            </a> 
                        </h4>
                        <div class="cenas-total-icones">
                            <!-- CSS dos 3 icones que vem em seguida -->
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
                            <!-- 1 - Icone e texto - Visualizacao-->
                            <div class="cenas-visualizacao">
                                <i class="far fa-eye"></i> 
                                <p class="texto">
                                    25.2K										
                                </p>
                            </div>
                            <!-- 2 - Icone e texto - Duracao do video -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home inicial_box_conteudo">
                <div> 
                    <a href="https://www.hotboys.com.br/cena/363/petrick--flavio---ifoda-2" class=" item-video ">
                        <img class="lazy home-clientes-assistindo" src="https://www.hotboys.com.br/imagens/icones/loading/loading-pimenta.gif" data-srcset="https://server2.hotboys.com.br/arquivos/6c43c_img-home.jpg" alt="imagem clientes assistindo">
                        <span class="far fa-play-circle fa-5x" style="display:none"></span>
                        <video width="100%" style="display:none" loop>
                            <source src="https://server2.hotboys.com.br/arquivos/98438_video-home.mp4" type="video/mp4">
                        </video>
                    </a>
                    <div class="home-textos-cenas-recentes">
                        <h4 class="home-titulo-cenas-recentes"> 
                            <a href="https://www.hotboys.com.br/cena/363/petrick--flavio---ifoda-2">
                                Petrick & Flávio - Ifoda 2								
                            </a> 
                        </h4>
                        <div class="cenas-total-icones">
                            <!-- CSS dos 3 icones que vem em seguida -->
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
                            <!-- 1 - Icone e texto - Visualizacao-->
                            <div class="cenas-visualizacao">
                                <i class="far fa-eye"></i> 
                                <p class="texto">
                                    31.9K										
                                </p>
                            </div>
                            <!-- 2 - Icone e texto - Duracao do video -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Botão Veja Mais cena rencentes-->
        <div class="row" style="float: left;width: 100%;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bt-vejamais-desktop">
                <h1 class="bt-vejamais"><a href="https://www.hotboys.com.br/videos">VEJA MAIS <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
            </div>
        </div>
        <!-- Conteúdo - Fundo Fixo -->
        <div class="row home-assineja" style="float: left;width:100%;">
            <div class="col-lg-12 col-sm-12 home-assineja">
                <div class="ui-box nopadding">
                    <div class="container home-assineja-imagens">
                        <div class="home-assineja-fundofixo"> <a href="https://www.hotboys.com.br/assine"> 
                                <!-- Assine Já com borda branca p/ fundo claro DESKTOP -->
                                <img src="https://www.hotboys.com.br/imagens/background-fixo/assineja-white.png" class="assineja-desktop fundo-branco largura-100" alt="assine ja"> 
                                <!-- Assine Já com borda preta p/ fundo escuro DESKTOP -->
                                <img src="https://www.hotboys.com.br/imagens/background-fixo/assineja-black.png" class="assineja-desktop fundo-preto largura-100" alt="assine ja"> 
                                <!-- Assine Já com borda branca p/ fundo claro MOBILE -->
                                <img src="https://www.hotboys.com.br/imagens/background-fixo/mobile-bg-assine.jpg" class="assineja-mobile fundo-branco visivel-tablet" alt="assine ja"> 
                                <!-- Assine Já com borda preta p/ fundo escuro MOBILE -->
                                <img src="https://www.hotboys.com.br/imagens/background-fixo/mobile-bg-assine-black.jpg" class="assineja-mobile fundo-preto visivel-tablet" alt="assine ja"> 
                            </a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODELOS DESKTOP  mais visitados da Semana --> 
        <!-- Título H1 -->
        <div class="row" style="float: left;width: 100%;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="home-titulo" style="border-left:0!important;padding-left:0!important">
                    <span class="icone-pimenta-titulo"></span>
                    OS GOSTOSOS MAIS QUENTES DA SEMANA					
                </h1>
            </div>
        </div>
        <!-- MODELOS MOBILE -->
        <div class="row home-modelos desktop" style="float:left; width:100%;">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 home-modelo-mais-visitado">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div>
                        <a href="https://www.hotboys.com.br/modelo/272/andre-leme">
                            <img class="lazy home-modelo" src="https://www.hotboys.com.br/imagens/icones/loading/fundo-modelo-principal.gif" data-srcset="https://server2.hotboys.com.br/arquivos/2a417_Andre-Leme.jpg" alt="modelo mais visitado">
                        </a>
                        <div class="home-fundo-nome-modelo-visitado">
                            <a href="https://www.hotboys.com.br/modelo/272/andre-leme">
                                <h4 style="font-size: 23px; padding: 10px; margin: 0!important;"> Andre Leme</h4>
                            </a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8  espacamento-laterais-0">
                <div class="col-sm-3">
                    <div class="col-sm-12 espacamentos-0">
                        <div> <a href="https://www.hotboys.com.br/modelo/69/jacob">
                                <img class="lazy home-modelos" src="https://www.hotboys.com.br/imagens/icones/loading/fundo-modelo-principal.gif" data-srcset="https://server2.hotboys.com.br/arquivos/cf3ab_Jacob.jpg" alt="modelo mais visitado"></a>
                            <div class="home-fundo-nomes-modelos-visitados">
                                <a href="https://www.hotboys.com.br/modelo/69/jacob">
                                    <h4 style="font-size: 23px; padding: 10px; margin: 0!important;">Jacob</h4>
                                </a> 

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="col-sm-12 espacamentos-0">
                        <div> <a href="https://www.hotboys.com.br/modelo/154/lukas-katter">
                                <img class="lazy home-modelos" src="https://www.hotboys.com.br/imagens/icones/loading/fundo-modelo-principal.gif" data-srcset="https://server2.hotboys.com.br/arquivos/e3536_a66ba_154_modelo_perfil.jpg" alt="modelo mais visitado"></a>
                            <div class="home-fundo-nomes-modelos-visitados">
                                <a href="https://www.hotboys.com.br/modelo/154/lukas-katter">
                                    <h4 style="font-size: 23px; padding: 10px; margin: 0!important;">Lukas Katter</h4>
                                </a> 

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="col-sm-12 espacamentos-0">
                        <div> <a href="https://www.hotboys.com.br/modelo/212/rico-marlon">
                                <img class="lazy home-modelos" src="https://www.hotboys.com.br/imagens/icones/loading/fundo-modelo-principal.gif" data-srcset="https://server2.hotboys.com.br/arquivos/608d7_2df5f_Rico.jpg" alt="modelo mais visitado"></a>
                            <div class="home-fundo-nomes-modelos-visitados">
                                <a href="https://www.hotboys.com.br/modelo/212/rico-marlon">
                                    <h4 style="font-size: 23px; padding: 10px; margin: 0!important;">Rico Marlon</h4>
                                </a> 

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="col-sm-12 espacamentos-0">
                        <div> <a href="https://www.hotboys.com.br/modelo/278/felipe-gaucho-">
                                <img class="lazy home-modelos" src="https://www.hotboys.com.br/imagens/icones/loading/fundo-modelo-principal.gif" data-srcset="https://server2.hotboys.com.br/arquivos/4f77b_Felipe-Gaucho.jpg" alt="modelo mais visitado"></a>
                            <div class="home-fundo-nomes-modelos-visitados">
                                <a href="https://www.hotboys.com.br/modelo/278/felipe-gaucho-">
                                    <h4 style="font-size: 23px; padding: 10px; margin: 0!important;">Felipe Gaúcho </h4>
                                </a> 

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="col-sm-12 espacamentos-0">
                        <div> <a href="https://www.hotboys.com.br/modelo/74/kaua-felipe">
                                <img class="lazy home-modelos" src="https://www.hotboys.com.br/imagens/icones/loading/fundo-modelo-principal.gif" data-srcset="https://server2.hotboys.com.br/arquivos/4f6f5_Perfil-Modelo.jpg" alt="modelo mais visitado"></a>
                            <div class="home-fundo-nomes-modelos-visitados">
                                <a href="https://www.hotboys.com.br/modelo/74/kaua-felipe">
                                    <h4 style="font-size: 23px; padding: 10px; margin: 0!important;">Kauã Felipe</h4>
                                </a> 

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="col-sm-12 espacamentos-0">
                        <div> <a href="https://www.hotboys.com.br/modelo/234/nobre">
                                <img class="lazy home-modelos" src="https://www.hotboys.com.br/imagens/icones/loading/fundo-modelo-principal.gif" data-srcset="https://server2.hotboys.com.br/arquivos/658ae_3bc79_234_modelo_perfil-2.jpg" alt="modelo mais visitado"></a>
                            <div class="home-fundo-nomes-modelos-visitados">
                                <a href="https://www.hotboys.com.br/modelo/234/nobre">
                                    <h4 style="font-size: 23px; padding: 10px; margin: 0!important;">Nobre</h4>
                                </a> 

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="col-sm-12 espacamentos-0">
                        <div> <a href="https://www.hotboys.com.br/modelo/78/luan-mastro">
                                <img class="lazy home-modelos" src="https://www.hotboys.com.br/imagens/icones/loading/fundo-modelo-principal.gif" data-srcset="https://server2.hotboys.com.br/arquivos/01e46_Luan-Mastro.jpg" alt="modelo mais visitado"></a>
                            <div class="home-fundo-nomes-modelos-visitados">
                                <a href="https://www.hotboys.com.br/modelo/78/luan-mastro">
                                    <h4 style="font-size: 23px; padding: 10px; margin: 0!important;">Luan Mastro</h4>
                                </a> 

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="col-sm-12 espacamentos-0">
                        <div> <a href="https://www.hotboys.com.br/modelo/232/christian-hupper">
                                <img class="lazy home-modelos" src="https://www.hotboys.com.br/imagens/icones/loading/fundo-modelo-principal.gif" data-srcset="https://server2.hotboys.com.br/arquivos/afdf9_e06a3_232_modelo_perfil.jpg" alt="modelo mais visitado"></a>
                            <div class="home-fundo-nomes-modelos-visitados">
                                <a href="https://www.hotboys.com.br/modelo/232/christian-hupper">
                                    <h4 style="font-size: 23px; padding: 10px; margin: 0!important;">Christian Hupper</h4>
                                </a> 

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Botão Veja Mais -->
        <div class="row" style="float: left;width: 100%;">
            <div class="col-lg-12 col-md-12 col-sm-12 bt-vejamais-desktop modelos">
                <h1 class="bt-vejamais"><a href="https://www.hotboys.com.br/modelos">VEJA MAIS <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
            </div>
        </div>
        <!-- Botão Veja Mais -->
        <div class="row" style="float: left;width: 100%;">
            <div class="col-lg-12 col-sm-12 bt-vejamais-mobile">
                <h1 class="bt-vejamais"><a href="https://www.hotboys.com.br/modelos">VEJA MAIS <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
            </div>
        </div>
        <!-- BANNER 04 -->
        <div class="row" style="float: left;width: 100%;">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
            </div>
        </div>
        <!-- Título H1 do conteúdo -->
        <div class="row" style="float: left;width: 100%;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="home-titulo" style="border-left:0!important;padding-left:0!important">
                    <span class="icone-pimenta-titulo"></span>
                    CONTOS ERÓTICOS HOT</h1>
            </div>
        </div>
        <!-- Conteúdo - Contos Eróticos --> 
        <div class="row" style="float: left;width: 100%;">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 home inicial_box_contos">
                <div class="contos-eroticos-home">
                    <a href="https://www.hotboys.com.br/conto-erotico/1039/tecnico-da-operadora">
                        <img class="lazy card-img-top-contos" src="https://www.hotboys.com.br/imagens/icones/loading/fundo-contos.gif" data-srcset="https://server2.hotboys.com.br/arquivos/550fd_5.jpg" alt="imagem conto">
                        <div class="paginas-titulo-visualizacoes contos-home">
                            <h4 class="paginas-titulo">

                                Técnico da operadora										
                            </h4>
                            <p class="paginas-visualizacoes">
                                <i class="far fa-eye" aria-hidden="true"></i>
                                <span style="font-size: 11px;font-family: 'Open Sans'; font-weight: bold;">
                                    3.4K										</span>
                            </p>
                        </div>
                    </a>
                </div> 

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 home inicial_box_contos">
                <div class="contos-eroticos-home">
                    <a href="https://www.hotboys.com.br/conto-erotico/1038/o-novo-macho-da-minha-mulher">
                        <img class="lazy card-img-top-contos" src="https://www.hotboys.com.br/imagens/icones/loading/fundo-contos.gif" data-srcset="https://server2.hotboys.com.br/arquivos/ff891_3.jpg" alt="imagem conto">
                        <div class="paginas-titulo-visualizacoes contos-home">
                            <h4 class="paginas-titulo">

                                O novo macho da minha mulher										
                            </h4>
                            <p class="paginas-visualizacoes">
                                <i class="far fa-eye" aria-hidden="true"></i>
                                <span style="font-size: 11px;font-family: 'Open Sans'; font-weight: bold;">
                                    2K										</span>
                            </p>
                        </div>
                    </a>
                </div> 

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 home inicial_box_contos">
                <div class="contos-eroticos-home">
                    <a href="https://www.hotboys.com.br/conto-erotico/1037/no-caminho-para-o-colegio.">
                        <img class="lazy card-img-top-contos" src="https://www.hotboys.com.br/imagens/icones/loading/fundo-contos.gif" data-srcset="https://server2.hotboys.com.br/arquivos/4b359_2.jpg" alt="imagem conto">
                        <div class="paginas-titulo-visualizacoes contos-home">
                            <h4 class="paginas-titulo">

                                No caminho para o colégio.										
                            </h4>
                            <p class="paginas-visualizacoes">
                                <i class="far fa-eye" aria-hidden="true"></i>
                                <span style="font-size: 11px;font-family: 'Open Sans'; font-weight: bold;">
                                    2.9K										</span>
                            </p>
                        </div>
                    </a>
                </div> 

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 home inicial_box_contos">
                <div class="contos-eroticos-home">
                    <a href="https://www.hotboys.com.br/conto-erotico/1036/mamando-e-bebendo-a-porra-do-amigo-hetero">
                        <img class="lazy card-img-top-contos" src="https://www.hotboys.com.br/imagens/icones/loading/fundo-contos.gif" data-srcset="https://server2.hotboys.com.br/arquivos/f4bc2_1.jpg" alt="imagem conto">
                        <div class="paginas-titulo-visualizacoes contos-home">
                            <h4 class="paginas-titulo">

                                Mamando e bebendo a porra do amigo hétero										
                            </h4>
                            <p class="paginas-visualizacoes">
                                <i class="far fa-eye" aria-hidden="true"></i>
                                <span style="font-size: 11px;font-family: 'Open Sans'; font-weight: bold;">
                                    2.4K										</span>
                            </p>
                        </div>
                    </a>
                </div> 

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 home inicial_box_contos">
                <div class="contos-eroticos-home">
                    <a href="https://www.hotboys.com.br/conto-erotico/1035/carnaval-a-tres">
                        <img class="lazy card-img-top-contos" src="https://www.hotboys.com.br/imagens/icones/loading/fundo-contos.gif" data-srcset="https://server2.hotboys.com.br/arquivos/86e80_4.jpg" alt="imagem conto">
                        <div class="paginas-titulo-visualizacoes contos-home">
                            <h4 class="paginas-titulo">

                                Carnaval a três										
                            </h4>
                            <p class="paginas-visualizacoes">
                                <i class="far fa-eye" aria-hidden="true"></i>
                                <span style="font-size: 11px;font-family: 'Open Sans'; font-weight: bold;">
                                    1.1K										</span>
                            </p>
                        </div>
                    </a>
                </div> 

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 home inicial_box_contos">
                <div class="contos-eroticos-home">
                    <a href="https://www.hotboys.com.br/conto-erotico/1034/abusado-pelo-tecnico-da-sky">

                        <img class="lazy card-img-top-contos" src="https://www.hotboys.com.br/imagens/icones/loading/fundo-contos.gif" data-srcset="https://server2.hotboys.com.br/arquivos/bbaf0_4b4f1_Sexo-no-Estacionamento-do-meu-predio-com-direito-a-gozada-na-cara.jpg" alt="imagem conto">

                        <div class="paginas-titulo-visualizacoes contos-home">
                            <h4 class="paginas-titulo">

                                Abusado pelo técnico da sky										
                            </h4>
                            <p class="paginas-visualizacoes">
                                <i class="far fa-eye" aria-hidden="true"></i>
                                <span style="font-size: 11px;font-family: 'Open Sans'; font-weight: bold;">
                                    11.1K										</span>
                            </p>
                        </div>
                    </a>
                </div> 
            </div>
        </div><!-- Fim do row -->
        <!-- Botão Veja Mais DESKTOP Contos eroticos -->
        <div class="row" style="float: left;width: 100%;">
            <div class="col-lg-12 col-sm-12 bt-vejamais">
                <h1 class="bt-vejamais"><a href="https://www.hotboys.com.br/contos-eroticos">VEJA MAIS <i class="fas fa-caret-right fa-1x" aria-hidden="true"></i></a></h1>
            </div>
        </div>
        <!-- BANNER 05 -->
        <div class="row" style="float: left;width: 100%;">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
            </div>
        </div>

    </div>
    @include('includes.footer')