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

<?php 
	
	$query_categoria = "SELECT * FROM `categorias` WHERE `categoria` IN ('dotados','cafucu','mega dotados','interracial','sexo dotados','suruba')  LIMIT 6";
	$consulta_categoria = mysql_query($query_categoria);
    $total_categoria = mysql_num_rows($consulta_categoria);
	
	
	$query_continuacao_categorias = "SELECT * FROM `categorias` ORDER BY categoria ASC";
	$consulta_continuacao_categorias = mysql_query($query_continuacao_categorias);
	$total_continuacao_categorias = mysql_num_rows($consulta_continuacao_categorias);
	
?>
<li class="nav-item menu-submenu">
	<a class="nav-link">
		Categorias
		<span class="seta-baixo"></span>
	</a> 
	
	<ul>
		<div class="categorias-tags-imagens">
			<?php  while($dados_categoria = mysql_fetch_array($consulta_categoria)){ ?>
			<?php  if($vip != true){ ?>
				<a href="<?php echo URL.'tag/'.URL_amigavel($dados_categoria[categoria]).'/'?>">
                    <li style="display:inline-block;padding:10px 10px 0 10px;width:110px;">
                        <span>
                            <?php if($dados_categoria[imagem_categoria] !=''){?>
                                <img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_categoria[imagem_categoria]; ?>"/>
                                <?php }else{ ?>
                                <img src="https://server2.hotboys.com.br/arquivos/sem_foto_submenu.jpg"/>
                                <?php } ?>
                        </span>
                        </span>
                        <span class="titulo-submenu"><?php echo utf8_encode($dados_categoria[categoria]) ?></span>
                    </li>
                </a>
			<?php }else{ ?>
			<a href="<?php echo URL_VIP.'tag/'.URL_amigavel($dados_categoria[categoria]).'/'?>">
					<li style="display:inline-block;padding:10px 10px 0 10px;width:110px;">
						<span>
							<?php if($dados_categoria[imagem_categoria] !='') { ?>
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_categoria[imagem_categoria]; ?>"/>
								<?php }else{ ?>
								<img src="https://server2.hotboys.com.br/arquivos/sem_foto_submenu.jpg"/>
								<?php  } ?>
						</span>
						<span class="titulo-submenu"><?php echo utf8_encode($dados_categoria[categoria]) ?></span>
					</li>
				</a>
			<?php } } ?>
		</div>
		<div class="categorias-tags-texto">
			
			<div class="mais-categorias">Todas as Categorias</div>
			
			<?php  if($total_continuacao_categorias >= 6){ ?>
				<?php  while($dados_continuacao_categorias = mysql_fetch_array($consulta_continuacao_categorias)){ ?>
				<?php if($vip != true){ ?>
					<a href="<?php echo URL.'tag/'.URL_amigavel($dados_continuacao_categorias[categoria]).'/'?>">
					<?php }else{ ?>
					<a href="<?php echo URL_VIP.'tag/'.URL_amigavel($dados_continuacao_categorias[categoria]).'/'?>">
					<?php } ?>
						<li><span class="titulo-submenu"><?php echo utf8_encode($dados_continuacao_categorias[categoria]) ?></span></li>
					</a>
            </a>
			<?php   } } ?>
			</div>
		
	</ul>
	
	
	
</li> 	
