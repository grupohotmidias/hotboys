<?php

		require('../whatsapp/configuracoes/configuracoes.php');
		require('../whatsapp/includes/funcoes.php');
		
		if($_SERVER[PHP_AUTH_USER] != ''){
	
			//consulta ID do usuário
			$query_usuario = "SELECT * FROM `usuarios` WHERE email='$_SERVER[PHP_AUTH_USER]'";
			$consulta_usuario = mysql_query($query_usuario);
			$total = mysql_num_rows($consulta_usuario);
			$usuario = mysql_fetch_array($consulta_usuario);
			
			if($total==0){
			//ainda nao tinha cadastro	
			
				if($_SESSION[id_usuario_whatsapp]!=''){
				//ja possuia cadastro normal
				
					$query = "UPDATE usuarios SET email='$_SERVER[PHP_AUTH_USER]', tipo='Vip' WHERE id='$_SESSION[id_usuario_whatsapp]' LIMIT 1";
					mysql_query($query);
										
				} else {
				//ainda nao possuia cadastro normal	
					$query = "INSERT INTO `usuarios` (					
					`tipo` ,
					`email`					
					) VALUES (
					'Vip', '$_SERVER[PHP_AUTH_USER]')";
					mysql_query($query);
					$_SESSION[id_usuario_whatsapp] = mysql_insert_id();
					
				}				
				
				
			} else {
			//ja possui cadastro
			
				//altera dono das mensagens normais
				$query_msg = "UPDATE mensagens SET id_usuario='$usuario[id]' WHERE id_usuario='$_SESSION[id_usuario_whatsapp]' ";
				mysql_query($query_msg);
				
			
				//mail('alemysql@hotmail.com', 'vars', $_SERVER[PHP_AUTH_USER]);
			
			
				$_SESSION[id_usuario_whatsapp] = $usuario[id];		
				
			}
			
		}
		unset($usuario);
		if($_SESSION[id_usuario_whatsapp] != ''){
		//usuário já está cadastrado	
			
			$query_usuario = "SELECT * FROM `usuarios` WHERE id='$_SESSION[id_usuario_whatsapp]'";
			$consulta_usuario = mysql_query($query_usuario);
			$usuario = mysql_fetch_array($consulta_usuario);
		}
		
		#####Excluir mensagem
		if($_GET[acao]=='del' AND $_GET[id]!=''){
			
			$id = addslashes(base64_decode($_GET[id]));
			
			$query = "DELETE FROM mensagens WHERE id='$id' LIMIT 1";
			mysql_query($query);
			
			$mensagem_excluida = true;			
		}
		
		#####Excluir imagem
		if($_SESSION[id_usuario_whatsapp]!=''  AND  $_POST[excluir_imagem]=='Sim'){
		
			@unlink('arquivos/'.$usuario[imagem]);
			
			$query = "UPDATE `usuarios` SET `imagem`='' WHERE `id`='$_SESSION[id_usuario_whatsapp]' LIMIT 1";
			mysql_query($query);
			
			$imagem_sucesso = true;			
		}
		
	#####Fazer upload de imagem
		if($_FILES['imagem']['name']!=''  AND  $_SESSION[id_usuario_whatsapp]!=''){
		//enviou imagem	
			
			$extensao = strtolower(end(explode('.', $_FILES['imagem']['name'])));
			
			if($extensao=='jpg' OR $extensao=='jpg'){
			//formato valido	
				
				$nome_imagem = time().'_'.rand(0, 99999).'.'.$extensao;
				
				
				if(move_uploaded_file($_FILES['imagem']['tmp_name'], 'arquivos/'.$nome_imagem)) {
				//sucesso no upload 
				   
				   //deleta imagem antiga
				   @unlink('arquivos/'.$usuario[imagem]);
				   
				   
				   $query = "UPDATE `usuarios` SET `imagem`='$nome_imagem' WHERE `id`='$_SESSION[id_usuario_whatsapp]' LIMIT 1";
				   mysql_query($query);
				   $imagem_sucesso = true;
				   
				} else {
				//erro no upload	
				    $imagem_erro_upload = true;
									
				}
				
			} else {
			//formato invalido	
				 $imagem_erro_formato = true;
				 
			}
							
		}
		
		
		
		
		
		
		
		
		if($_SESSION[id_usuario_whatsapp] != ''){
		//usuário já está cadastrado	
			
			$query_usuario = "SELECT * FROM `usuarios` WHERE id='$_SESSION[id_usuario_whatsapp]'";
			$consulta_usuario = mysql_query($query_usuario);
			$usuario = mysql_fetch_array($consulta_usuario);
		}

		require_once('../whatsapp/includes/xajax/xajax_core/xajax.inc.php');
		$xajax = new xajax();		
			require_once('../whatsapp/includes/xajax-mensagens.php');
		$xajax->processRequest();


		$xajax->configure('javascript URI',  '../whatsapp/includes/xajax/');
		

		
		

?>

<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
<link href="boilerplate.css" rel="stylesheet" type="text/css">
<link href="mobili.css" rel="stylesheet" type="text/css">
<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="respond.min.js"></script>


<link href="layout/estilo.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../whatsapp/js/jquery.js"></script>
<script type="text/javascript" src="../whatsapp/js/jquery.maskedinput.js"></script>


<script type="text/javascript" src="../whatsapp/js/fancybox/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="../whatsapp/js/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />





<script>
jQuery(function($){   
   $("#whatsapp").mask("(99) 9999-9999?9");     
});


function playSound(){   
  	document.getElementById("sound").innerHTML="<embed src='js/notificacao.mp3' hidden='true' autostart='true' loop='false'>";
}

function denunciar(id){
	if(confirm('Tem certeza que deseja denunciar essa mensagem?')){
		xajax_denunciar({id:id});
	} else {
		return false;
	}
}


<?php
	if($mensagem_excluida) echo 'alert("Mensagem excluída com sucesso!");';
	if($imagem_erro_upload) echo 'alert("Erro ao fazer upload da imagem!");';
	if($imagem_erro_formato) echo 'alert("Erro no formato da imagem!\nA imagem precisar ser no formato .jpg ou .jpeg");';
	if($imagem_sucesso) echo 'alert("Mensagem enviada!");';
?>

</script>
 
 
 
 
 
<link rel="stylesheet" href="../whatsapp/layout/jRating.jquery.css" type="text/css" />
<script type="text/javascript" src="../whatsapp/js/jRating.jquery.js"></script>

 
 
 
 
 
<?php $xajax->printJavascript(); ?>	 

</head>
<body>
<div class="gridContainer clearfix">



  <div id="div1" class="fluid">
  
  
  
  <div id="sound"></div>




	<div id="conteudo">


    	<!--<div id="titulo">Deixe aqui o seu Whatsapp!</div>-->
      
        
  
        
        <form name="form" id="form"  enctype="multipart/form-data" action="index.php" method="post" >
        <div id="form-campos">
                
              	<div id="envolve-form">
              
              		
                    
                    
              		<div id="filtro">
              			<div id="filtro-tit">Filtro de Mensagens:</div>
              			
                        <div class="filtro-item">
	              				<select name="filtro_uf" id="filtro_uf" onchange="xajax_filtro(xajax.getFormValues('form'));" >
                                	<option value="">Todos Estados...</option>
                                    
                                    <option value="AC" <?php if($_SESSION[filtro_uf]=='AC') echo 'selected="selected"' ?> >Apenas AC</option>                                            
                                    <option value="AL" <?php if($_SESSION[filtro_uf]=='AL') echo 'selected="selected"' ?> >Apenas AL</option>
                                    <option value="AP" <?php if($_SESSION[filtro_uf]=='AP') echo 'selected="selected"' ?> >Apenas AP</option>
                                    <option value="AM" <?php if($_SESSION[filtro_uf]=='AM') echo 'selected="selected"' ?> >Apenas AM</option>
                                    <option value="BA" <?php if($_SESSION[filtro_uf]=='BA') echo 'selected="selected"' ?> >Apenas BA</option>                                            
                                    <option value="CE" <?php if($_SESSION[filtro_uf]=='CE') echo 'selected="selected"' ?> >Apenas CE</option>
                                    <option value="DF" <?php if($_SESSION[filtro_uf]=='DF') echo 'selected="selected"' ?> >Apenas DF</option>
                                    <option value="ES" <?php if($_SESSION[filtro_uf]=='ES') echo 'selected="selected"' ?> >Apenas ES</option>
                                    <option value="GO" <?php if($_SESSION[filtro_uf]=='GO') echo 'selected="selected"' ?> >Apenas GO</option>                                            
                                    <option value="MA" <?php if($_SESSION[filtro_uf]=='MA') echo 'selected="selected"' ?> >Apenas MA</option>
                                    <option value="MT" <?php if($_SESSION[filtro_uf]=='MT') echo 'selected="selected"' ?> >Apenas MT</option>
                                    <option value="MS" <?php if($_SESSION[filtro_uf]=='MS') echo 'selected="selected"' ?> >Apenas MS</option>
                                    <option value="MG" <?php if($_SESSION[filtro_uf]=='MG') echo 'selected="selected"' ?> >Apenas MG</option>                                            
                                    <option value="PR" <?php if($_SESSION[filtro_uf]=='PR') echo 'selected="selected"' ?> >Apenas PR</option>
                                    <option value="PB" <?php if($_SESSION[filtro_uf]=='PB') echo 'selected="selected"' ?> >Apenas PB</option>
                                    <option value="PA" <?php if($_SESSION[filtro_uf]=='PA') echo 'selected="selected"' ?> >Apenas PA</option>
                                    <option value="PE" <?php if($_SESSION[filtro_uf]=='PE') echo 'selected="selected"' ?> >Apenas PE</option>                                            
                                    <option value="PI" <?php if($_SESSION[filtro_uf]=='PI') echo 'selected="selected"' ?> >Apenas PI</option>
                                    <option value="RN" <?php if($_SESSION[filtro_uf]=='RN') echo 'selected="selected"' ?> >Apenas RN</option>
                                    <option value="RS" <?php if($_SESSION[filtro_uf]=='RS') echo 'selected="selected"' ?> >Apenas RS</option>      
                                    <option value="RJ" <?php if($_SESSION[filtro_uf]=='RJ') echo 'selected="selected"' ?> >Apenas RJ</option> 
                                    <option value="RO" <?php if($_SESSION[filtro_uf]=='RO') echo 'selected="selected"' ?> >Apenas RO</option>
                                    <option value="RR" <?php if($_SESSION[filtro_uf]=='RR') echo 'selected="selected"' ?> >Apenas RR</option>
                                    <option value="SC" <?php if($_SESSION[filtro_uf]=='SC') echo 'selected="selected"' ?> >Apenas SC</option>
                                    <option value="SE" <?php if($_SESSION[filtro_uf]=='SE') echo 'selected="selected"' ?> >Apenas SE</option>
                                    <option value="SP" <?php if($_SESSION[filtro_uf]=='SP') echo 'selected="selected"' ?> >Apenas SP</option>
                                    <option value="TO" <?php if($_SESSION[filtro_uf]=='TO') echo 'selected="selected"' ?> >Apenas TO</option> 

                                </select>
	              		</div> 
                        
              			<div class="filtro-item"><input type="checkbox" name="filtro_foto" id="filtro_foto" value="1" <?php if($_SESSION[filtro_foto]=='1') echo 'checked="checked"' ?> onclick="xajax_filtro(xajax.getFormValues('form'));" >Somente usuários com foto</div>
              						
              		</div>
              		<div class="c" style="height:10px;"></div>
              	
              	
                
                
                
              	
	              	<div id="tab1">						
                        
                        <div id="mensagens-listagem"></div>                    
                                               
                        <div id="ver-mais-mensagens"><a href="javascript:void(0);" onclick="xajax_listagem(xajax.getFormValues('form'));" >Clique para carregar mais mensagens...</a></div>
                                                    
	                    <div class="c" style="height:210px;"></div> 
                           
                        <input type="hidden" name="listagem_inicio" id="listagem_inicio" value="0" /> 
                        <input type="hidden" name="id_ultima_mensagem" id="id_ultima_mensagem" value="0" />
	                </div> 
               
                
                
                	<div class="c"></div>
                    
                </div>
             
           
             
             	
             	<div id="rodape-enviar-msg">
                       
                       <div class="c" style="height:10px;"></div>
                       
                       
                       	<div class="form-linha" style="margin-left:10px;">
	                    	<div class="form-linha-nome"><strong>Nome:</strong></div>
	                        <div class="form-linha-input">
	                        	<input type="input" class="form-linha-input-text" name="nome" value="<?php echo $usuario[nome] ?>" style="width:214px;">
	                        </div>
	                    </div> 
                        
                        
                        <div class="form-linha" style="margin-left:10px;">
	                    	<div class="form-linha-nome"><strong>Idade:</strong></div>
	                        <div class="form-linha-input">
	                        	<input type="input" class="form-linha-input-text" name="idade" value="<?php echo $usuario[idade] ?>" style="width:30px;">
	                        </div>
	                    </div> 
                        
                        
                        <div class="form-linha" style="margin-left:10px;">
	                    	<div class="form-linha-nome"><strong>Cidade:</strong></div>
	                        <div class="form-linha-input">
	                        	<input type="input" class="form-linha-input-text" name="cidade" value="<?php echo $usuario[cidade] ?>"  style="width:121px;">
	                        </div>
	                    </div> 
                        
                        
                         <div class="form-linha" style="margin-left:10px;">
	                    	<div class="form-linha-nome"><strong>UF:</strong></div>
	                        <div class="form-linha-input">	                        	
                                <select name="uf" id="uf" class="form-linha-input-select" style="width:60px;">
                                	<option value=""></option>
                                    
                                    <option value="AC" <?php if($usuario[uf]=='AC') echo 'selected="selected"' ?> >AC</option>                                            
                                    <option value="AL" <?php if($usuario[uf]=='AL') echo 'selected="selected"' ?> >AL</option>
                                    <option value="AP" <?php if($usuario[uf]=='AP') echo 'selected="selected"' ?> >AP</option>
                                    <option value="AM" <?php if($usuario[uf]=='AM') echo 'selected="selected"' ?> >AM</option>
                                    <option value="BA" <?php if($usuario[uf]=='BA') echo 'selected="selected"' ?> >BA</option>                                            
                                    <option value="CE" <?php if($usuario[uf]=='CE') echo 'selected="selected"' ?> >CE</option>
                                    <option value="DF" <?php if($usuario[uf]=='DF') echo 'selected="selected"' ?> >DF</option>
                                    <option value="ES" <?php if($usuario[uf]=='ES') echo 'selected="selected"' ?> >ES</option>
                                    <option value="GO" <?php if($usuario[uf]=='GO') echo 'selected="selected"' ?> >GO</option>                                            
                                    <option value="MA" <?php if($usuario[uf]=='MA') echo 'selected="selected"' ?> >MA</option>
                                    <option value="MT" <?php if($usuario[uf]=='MT') echo 'selected="selected"' ?> >MT</option>
                                    <option value="MS" <?php if($usuario[uf]=='MS') echo 'selected="selected"' ?> >MS</option>
                                    <option value="MG" <?php if($usuario[uf]=='MG') echo 'selected="selected"' ?> >MG</option>                                            
                                    <option value="PR" <?php if($usuario[uf]=='PR') echo 'selected="selected"' ?> >PR</option>
                                    <option value="PB" <?php if($usuario[uf]=='PB') echo 'selected="selected"' ?> >PB</option>
                                    <option value="PA" <?php if($usuario[uf]=='PA') echo 'selected="selected"' ?> >PA</option>
                                    <option value="PE" <?php if($usuario[uf]=='PE') echo 'selected="selected"' ?> >PE</option>                                            
                                    <option value="PI" <?php if($usuario[uf]=='PI') echo 'selected="selected"' ?> >PI</option>
                                    <option value="RN" <?php if($usuario[uf]=='RN') echo 'selected="selected"' ?> >RN</option>
                                    <option value="RS" <?php if($usuario[uf]=='RS') echo 'selected="selected"' ?> >RS</option>      
                                    <option value="RJ" <?php if($usuario[uf]=='RJ') echo 'selected="selected"' ?> >RJ</option> 
                                    <option value="RO" <?php if($usuario[uf]=='RO') echo 'selected="selected"' ?> >RO</option>
                                    <option value="RR" <?php if($usuario[uf]=='RR') echo 'selected="selected"' ?> >RR</option>
                                    <option value="SC" <?php if($usuario[uf]=='SC') echo 'selected="selected"' ?> >SC</option>
                                    <option value="SE" <?php if($usuario[uf]=='SE') echo 'selected="selected"' ?> >SE</option>
                                    <option value="SP" <?php if($usuario[uf]=='SP') echo 'selected="selected"' ?> >SP</option>
                                    <option value="TO" <?php if($usuario[uf]=='TO') echo 'selected="selected"' ?> >TO</option> 

                                </select>
	                        </div>
	                    </div> 
                        
                        
                        
                        <div class="form-linha" style="margin-left:10px;">
	                    	<div class="form-linha-nome"><strong>Nº Whatsapp:</strong></div>
	                        <div class="form-linha-input">
	                        	<input type="input" class="form-linha-input-text" name="whatsapp" id="whatsapp" value="<?php echo $usuario[whatsapp] ?>" style="width:150px;">
	                        </div>
	                    </div> 
                        
                        
                        <div class="c" style="height:10px;"></div>
                        
                        
                        
                        
                        <div class="form-linha" style="margin-left:10px;">
	                    	<div class="form-linha-nome"><strong>Mensagem:</strong></div>
	                        <div class="form-linha-input">
	                        	<textarea name="mensagem" id="mensagem" ></textarea>
	                        </div>
	                    </div> 
                        
                        
                        
                       <div class="c" style="height:10px;"></div>
                        
                        
                        <div class="form-linha" style="margin-left:10px;">
	                    	<div class="form-linha-nome"><strong>Imagem:</strong> <span style="font-size:10px;">(jpg ou jpeg)</span></div>
	                        <div class="form-linha-input">
                            	<input type="file" class="form-linha-input-text" name="imagem" id="imagem" style="width:150px;" />
	                        </div>
	                    </div> 
                        
       
<?php
	if($usuario[imagem] != ''){
			
		$imagem = Miniatura($usuario[imagem], 30, 30, 'ffffff', 'crop', $usuario[nome]);
?>                
                        <div class="form-linha" style="margin-left:10px;">
	                    	<div class="form-linha-nome">&nbsp;</div>
	                        <div class="form-linha-input">
                            	<img src="<?php echo $imagem ?>" width="30" height="30" /> <input style="margin-left:10px;" type="checkbox" name="excluir_imagem" value="Sim" />Excluir imagem atual
	                        </div>
	                    </div> 
<?php
	}
?>                        
                        
                        
                        
                      
	                   <div id="btn-cadastrar"><button onclick="xajax_enviar(xajax.getFormValues('form')); return false;">Publicar Mensagem</button></div>
	                    
                        
                        
                        
                        
                        	
             	</div> 
                    
             
        </div>      
        
        
        
          
			<div class="c" style="height:15px;"></div>
        
         
        
        	
        </form>
       
        
<script>
	 xajax_listagem(xajax.getFormValues('form'));
	 setInterval(function(){xajax_novas_mensagens(xajax.getFormValues('form'))}, 7000);	 
</script>        
        
        
        
    </div>



  
 
</div>
</div>
</body>
</html>
