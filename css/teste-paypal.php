<?php	
	session_start();	
	require_once('config/configuracoes.php');	
	require_once('includes/funcoes.php');
?>
<!DOCTYPE html>
<html lang="pt-br" class="no-js">		
	
	<head>																		
		<meta http-equiv="Content-Language" content="pt-br, en">						
		<meta charset="utf-8">																					
		<title>Hot Boys O Site Mais Quente da Net - Seu Mundo Mais Prazeroso</title>																					
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">			
		<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">			
		<meta name="description" CONTENT="Hot Boys Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">			
		<link rel="stylesheet" href="css/formularios.css">			
		<!-- HEAD (Include) -->			
		<?php include ('includes/head.php')?>	
		
		<style>
		@media (min-width: 992px) and (max-width: 1199px) {}
		@media (min-width: 768px) and (max-width: 991px) {img: width:100%}
		@media (max-width: 767px) {img: width:100%}
		@media (max-width: 480px) {img: width:100%}
		</style>
	</head>		
	<body id="body" class="fundo-branco" style="background-image:https://www.stackoverflowbusiness.com/hubfs/Blog_Series_Graphics/How-I-Hire-Header.png?t=1521836414650">			
		<!-- TOP (Include) -->			
		
		<?php include ('includes/top.php')?>			
		
		<div class="container-tudo">				
			<!-- Título H1 do conteúdo -->																							
			<div class="container container-table">
				<div class="text-justify col-lg-9 col-md-9 col-sm-9 col-xs-12 botoes-plano-pagamento" style="padding: 50px;background:#d9d9d9;    margin-top: 40px">
					<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center">Pagamento com Paypal</h2>
					<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;margin-bottom:20px">
						Texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
					</span>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="background:#fff;padding:20px">
							<table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF">
								<tbody>
									<tr>
										<td width="35%" bgcolor="#FFFFFF">
											<input type="hidden" name="cmd" value="_s-xclick">
											<input type="hidden" name="hosted_button_id" value="RXJH8WRNX9TD4">
											<table>
												<tbody><tr><td><input type="hidden" name="on0" value="JOIN NOW">JOIN NOW</td></tr><tr><td><select name="os0">
													<option value="1 Month">1 Month $16,00 USD</option>
													<option value="2 Months">2 Months $28,00 USD</option>
													<option value="6 Months">6 Months $70,00 USD</option>
													<option value="One Year">One Year $99,00 USD</option>
												</select> </td></tr>
												</tbody>
											</table>
											
											<input type="hidden" name="currency_code" value="USD">
											<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
											<img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
										</td>
										
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
							<img src="<?php echo URL ?>imagens/pagamentos/pagamento-paypal.jpg"/>
						</div>
						
					</siv>
					
				</div>
				
				<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;margin-top:40px">
					Seu login e senha serão enviados para o seu endereço de e-mail do Paypal!
					Se você tiver alguma dúvida, por favor envie um e-mail para: <span style="font-weight:bold;text-decoration:underline">contato@hotboys.com.br</span>
				</span>
			</div>				
		</div>			
		
	</div>	
	
	<!-- FOOTER (Include) -->	
	<?php include ('includes/footer.php')?>		
	
	<!-- JAVASCRIPTS PADROES (Include) -->					
	<?php include ('includes/javascript.php');?>	
	
	<script>
		
		function selecionarPlano(idPlano){
			
			//adiciona classe
			$("#plano_cartao_anual .dadosPlano").addClass("assine-nao-selecionado");
			$("#plano_cartao_semestral .dadosPlano").addClass("assine-nao-selecionado");
			$("#plano_cartao_trimestral .dadosPlano").addClass("assine-nao-selecionado");
			$("#plano_cartao_bimestral .dadosPlano").addClass("assine-nao-selecionado");
			$("#plano_cartao_mensal .dadosPlano").addClass("assine-nao-selecionado");			
			$("#plano_paypal_anual .dadosPlano").addClass("assine-nao-selecionado");
			$("#plano_paypal_semestral .dadosPlano").addClass("assine-nao-selecionado");
			$("#plano_paypal_trimestral .dadosPlano").addClass("assine-nao-selecionado");
			$("#plano_paypal_bimestral .dadosPlano").addClass("assine-nao-selecionado");
			$("#plano_paypal_mensal .dadosPlano").addClass("assine-nao-selecionado");									
			$("#plano_boleto_anual .dadosPlano").addClass("assine-nao-selecionado");
			$("#plano_boleto_semestral .dadosPlano").addClass("assine-nao-selecionado");
			$("#plano_boleto_trimestral .dadosPlano").addClass("assine-nao-selecionado");
			$("#plano_boleto_bimestral .dadosPlano").addClass("assine-nao-selecionado");
			$("#plano_boleto_mensal .dadosPlano").addClass("assine-nao-selecionado");			
			
			//remove classe
			$("#plano_cartao_anual .dadosPlano").removeClass("assine-selecionado");
			$("#plano_cartao_semestral .dadosPlano").removeClass("assine-selecionado");
			$("#plano_cartao_trimestral .dadosPlano").removeClass("assine-selecionado");
			$("#plano_cartao_bimestral .dadosPlano").removeClass("assine-selecionado");
			$("#plano_cartao_mensal .dadosPlano").removeClass("assine-selecionado");
			
			$("#plano_paypal_anual .dadosPlano").removeClass("assine-selecionado");
			$("#plano_paypal_semestral .dadosPlano").removeClass("assine-selecionado");
			$("#plano_paypal_trimestral .dadosPlano").removeClass("assine-selecionado");
			$("#plano_paypal_bimestral .dadosPlano").removeClass("assine-selecionado");
			$("#plano_paypal_mensal .dadosPlano").removeClass("assine-selecionado");						
			
			$("#plano_boleto_anual .dadosPlano").removeClass("assine-selecionado");
			$("#plano_boleto_semestral .dadosPlano").removeClass("assine-selecionado");
			$("#plano_boleto_trimestral .dadosPlano").removeClass("assine-selecionado");
			$("#plano_boleto_bimestral .dadosPlano").removeClass("assine-selecionado");
			$("#plano_boleto_mensal .dadosPlano").removeClass("assine-selecionado");
			
			
			
			var plano = idPlano.split("_");
			var formaPagamento = plano.slice(-1)[0];
			$("#plano").val(formaPagamento);												
			$(idPlano + " .dadosPlano").removeClass("assine-nao-selecionado");
			$(idPlano + " .dadosPlano").addClass("assine-selecionado");
		}		
		
		$(document).ready(function() {
			//escolher forma de pagamento
			$("input[name$='forma_pagamento']").click(function() {
				var formaPagamento = $(this).val();
				$("div.opcao-pagamento").hide();
				$("#assine-valores" + formaPagamento).show();				
				
				if(formaPagamento == 1){
					//cartao
					selecionarPlano("#plano_cartao_anual");
					} else if(formaPagamento == 2){
					//paypal					
					selecionarPlano("#plano_paypal_anual");
					} else {
					//boleto
					selecionarPlano("#plano_boleto_anual");
				}
			});
			selecionarPlano("#plano_cartao_anual");
		});
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	
	<script src="<?php echo URL ?>js/jquery.modalLink-1.0.0.js"></script>			
	<?php		if($AbrirIframePagamento){		?>				
		<script>			
			jQuery172(document).ready(function ($) {				
				$(document).ready(function() {					
					$.modalLink.open("https://www.gpagamentos.com.br/1/iframe.php?id=<?php echo $id_email_gpagamentos ?>", 
					{						
						title: "Pagamento"					
					});				
				});			
			});		</script>						
	<?php		}	?>	
</body>		
</html>																																																																																																																															