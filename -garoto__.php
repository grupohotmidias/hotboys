<?php

require('configuracoes/configuracoes.php');

		require_once('includes/funcoes.php');

		

		









		header('Content-type: text/html; charset=utf-8');



		



		



 		$id = addslashes($_GET[id]);



		



		$pg ='gh' ;



		



		$query = "SELECT * FROM `garotos_hot` WHERE `exibicao`='Todos' AND status='Ativo' AND id='$id'";



		$consulta = mysql_query($query);



		$total = mysql_num_rows($consulta);



		if($total != 1){



			header("Location: http://www.hotboys.com.br/index2.php");



			exit();



		}



 



 



 



 		$dados_conteudo = mysql_fetch_array($consulta);



 

		//adiciona 1 visita no campo visualizacoes quando acessado

			$query = mysql_query("UPDATE garotos_hot SET visualizacoes = $dados_conteudo[visualizacoes] + 1 WHERE id='$id' ") or die(mysql_error());

 



 

?>		

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<title>Site Hot Boys - Garotos Hot | <?php echo utf8_encode($dados_conteudo[titulo]) ?></title>



<link href="geral_style.css" rel="stylesheet" type="text/css">

<link href="conteudo.css" rel="stylesheet" type="text/css">



    <!-- SCRIPTS DA GALERIA -->



  



<script type="text/javascript" src="http://www.hotboys.com.br/script-galeria/jquery.js"></script> 



<link rel="stylesheet" href="http://www.hotboys.com.br/script-galeria/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />



 



<script src="http://www.hotboys.com.br/script-galeria/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>



<script type="text/javascript" charset="utf-8">



  $(document).ready(function(){



    $("a[rel^='prettyPhoto']").prettyPhoto();



  });



</script>






<!-- js video -->

<!-- new play -->
<link rel="stylesheet" type="text/css"
      href="//releases.flowplayer.org/5.4.6/skin/minimalist.css">
   
   <style>
     
     /* custom player skin */
   .flowplayer { width: 599px; height:330px; background-color: #222; background-size: cover; max-width: 599px; }
   .flowplayer .fp-controls { background-color: rgba(238, 238, 238, 1)}
   .flowplayer .fp-timeline { background-color: rgba(204, 204, 204, 1)}
   .flowplayer .fp-progress { background-color: rgba(17, 17, 17, 1)}
   .flowplayer .fp-buffer { background-color: rgba(249, 249, 249, 1)}

   </style>

   <!-- flowplayer depends on jQuery 1.7.1+ -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

   <!-- flowplayer javascript component -->
   <script src="//releases.flowplayer.org/5.4.6/flowplayer.min.js"></script>    

    <!-- Inicio Bing...-->

<meta name="msvalidate.01" content="39F92B391CB604B9C54844CCEA0EC4E6" />  



<!--
<script src="http://www.hotboys.com.br/scripts/swfobject_modified.js" type="text/javascript"></script>



<script type="text/javascript" src="<?php echo URL ?>js/flowplayer-3.2.6.min.js"></script>
-->
    <!-- fim js video -->





<!-- Inicio Google Analitycs...-->

<script type="text/javascript">



  var _gaq = _gaq || [];

  _gaq.push(['_setAccount', 'UA-6951021-2']);

  _gaq.push(['_trackPageview']);



  (function() {

    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

  })();



</script>

<!-- Fim Google Analitycs...-->



</head>







<body>

<div class="content">





<!-- start conteudo -->

<div class="conteudo_page">







<!--topo -->

<?php require_once ('top.php'); ?>

    

    

    

      

     <h1> Garotos Hot </h1>

    

   <!-- box pag modelos --> 	

   <div class="pag_garoto"> 

   		

        <!-- Nome do modelo -->

   		<h1 ><?php echo utf8_encode($dados_conteudo[nome]) ?> <div class="linha_gradiente"></div></h1>

        

        <!-- img principal -->

        <div class="pag_garoto_fotoprincipal">

       <img src="<?php echo 'http://server2.hotboys.com.br/arquivos/'.$dados_conteudo[imagem_principal] ?>" alt="<?php echo utf8_encode($dados_conteudo[nome] . ' - hotBoys - '.$dados_conteudo[titulo])  ?>" width="360" height="550">

        </div>

        

        

        <!-- Video Making Of -->

         <?php //verica se tem making of

			if($dados_conteudo[video_making_off1] != ''){

         ?>

         

        <div class="pag_garoto_makingof">
        
          <div data-swf="//releases.flowplayer.org/5.4.6/flowplayer.swf"
      class="flowplayer fixed-controls no-volume play-button color-light"
       data-ratio="0.416" data-embed="false" data-analytics="UA-6951021-2">
      <video poster=" <?php echo 'http://server2.hotboys.com.br/arquivos/'.$dados_conteudo[imagem_principal] ?>">
      
    
         
<source type="video/flv" src="<?php echo 'http://server2.hotboys.com.br/arquivos_videos/'.$dados_conteudo[video_making_off1] ?>"/>

      </video>
      
   </div>
   


        </div> 

        

        		<? } ?>

        

        <!-- texto -->

        <div class="pag_garoto_descricao">

        <h3><?php echo utf8_encode($dados_conteudo[titulo]) ?></h3>

        <p><?php echo nl2br(utf8_encode($dados_conteudo[descricao])) ?></p>

        

         <br>



    <?php



if($dados_conteudo[idade]){?>



  </p>



  <h4> Perfil completo do modelo



    <?php



if($dados_conteudo[fone_contato]){ 



echo 'com telefone ';



}



?> 



  para usuários VIP</h4>



  <p><br>



    <?php 



} else {



	if($dados_conteudo[fone_contato]){ 



echo '<h4>Telefone do modelo disponível para usuários VIP</h4> <br>';



	}



	



	}



?>

        

        </div> 

        

        <!-- facebook -->

        <div class="pag_garoto_facebook">

        <?



include ('includes/face-gh.php') 



?>

        </div>    

        

 <div class="clear"></div>       

        <!-- img fotos conteudo -->

        <div class="pag_garoto_imgs">

        

	<?php // verifica se existe alguma foto para exibir titulo

     if($dados_conteudo[img1] != ''){ ?>        

    <h2>Fotos <div class="linha_gradiente"></div></h2>

        

         <?php

     //fecha senteça anterior

	 }



		

		//verifica a existencia das fotos

		if($dados_conteudo[img1] != '') $imagens[] = $dados_conteudo[img1];



		if($dados_conteudo[img2] != '') $imagens[] = $dados_conteudo[img2];



		if($dados_conteudo[img3] != '') $imagens[] = $dados_conteudo[img3];



		if($dados_conteudo[img4] != '') $imagens[] = $dados_conteudo[img4];











		if(count($imagens) > 0){



?>



    



   



    <?php



				foreach($imagens as $imagem){



									



					$miniatura = NomeMiniatura($imagem, 236, 300, 'ffffff', 'crop', $dados_conteudo[nome].'-HotBoys-'.$dados_conteudo[titulo]);				



?>	



<a href="<?php echo 'http://server2.hotboys.com.br/arquivos/'.$imagem ?>"  rel="prettyPhoto[pp_gal]"><img src="<?php echo $miniatura ?>" width="236" height="300" alt="<?php echo utf8_encode($dados_conteudo[nome].' - HotBoys - '.$dados_conteudo[titulo]) ?>"></a>

  



 





    <?php

}

				}



?>



	</div>



  <!-- img Sugestão -->

<div class="pag_garoto_sugestao_conteudo">

        <h2>Assista Também 

          <div class="linha_gradiente"></div></h2>

        

 		



        	



        



<?php







			#####Consulta categorias do conteudo atual



			$query_categorias = "SELECT * FROM `categorias_conteudo` WHERE id_conteudo='$dados_conteudo[id]' AND pagina='Garotos Hot' ";



			$consulta_categorias = mysql_query($query_categorias);



			while($linha_categoria = mysql_fetch_array($consulta_categorias)){



				



				$FiltroCategorias .= " id_categoria='$linha_categoria[id_categoria]' OR ";



				



			}



			$FiltroCategorias = substr($FiltroCategorias, 0, -4);



			if($FiltroCategorias=='') $FiltroCategorias = 1;



			



			











			#####Consulta conteudos que fazem parte dessas categorias



			$query_conteudos = "SELECT * FROM `categorias_conteudo` WHERE ( $FiltroCategorias ) AND id_conteudo!='$dados_conteudo[id]' AND pagina='Garotos Hot'";



			$consulta_conteudos = mysql_query($query_conteudos);



			while($linha_conteudo = mysql_fetch_array($consulta_conteudos)){



				



				$conteudos[$linha_conteudo[id_conteudo]] = $linha_conteudo[id_conteudo];



			}



			//$conteudos tem os IDS dos v�deos relacionados



			







			



			#####Vai sortear o array, e pegar apenas 4 resultados



			$total_elementos = count($conteudos);



			if($total_elementos < 4){



				$total_conteudos_relacionados = $total_elementos;



			} else {



				$total_elementos = 4;



			}



			



		



			$conteudos = @array_rand($conteudos, $total_elementos);



















			#####Consulta conteudos atraves do ID



			if(count($conteudos) > 0){



				



				if(count($conteudos) == 1){



					$id_conteudo = $conteudos;



					unset($conteudos);



					$conteudos[$id_conteudo] = $id_conteudo;



				}



				



				



				foreach($conteudos as $chave => $id_conteudo){



					



					$query = "SELECT * FROM `garotos_hot` WHERE exibicao='Todos' AND categoria='Garotos Hot' AND id='$id_conteudo' AND status='Ativo' LIMIT 1";



					$consulta = mysql_query($query);



					$linha = mysql_fetch_array($consulta);



					$total = mysql_num_rows($consulta);



					if($total != 1) continue;



?>



					



		  <div class="pag_garoto_sugestao_conteudo_box"> 



							



							  <p><a href="<?php echo URL.URL_amigavel($linha[titulo]).'-gh.'.$linha[id].'.php'; ?>"><img src="http://server2.hotboys.com.br/arquivos/<?php echo $linha[imagem_listagem] ?>" alt="<?php echo utf8_encode($linha[nome] . ' - HotBoys - ' . $linha[titulo])  ?>" width="195" height="250" border="0"></a><br>



							    <?php echo utf8_encode($linha[nome]) ?>



						      </p>



						  



						</div> 				



					



<?php	



				}			



			}



?>       

        

     

      </div>



<div class="clear"></div> 





        

      



	

            

 

<!-- -->         

   <div class="clear"></div>





<!-- End conteudo -->

</div>





<!--fotter -->

<?php require_once ('footer.php'); ?>

</div>







</body>



