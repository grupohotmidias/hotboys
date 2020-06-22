<?php
	
	$id_usuario = $dados_user[id];
	if(@$_COOKIE[verificacao_idade] != 'sim'){
	?>
	
	<!-- POPUP MODAL VIP -->
	<div id="agreementPopupContainer" class="modal" data-backdrop="static">
		<div class="welcomePopupContainer clear">
			<div class="relative zindex1">
				
				<div class="termo-acordo-usuario">
					<div class="welcomeUserAgreementContainer">
						<p class="txtBold txtWhite mrgTop" style="font-size:21px;">
							
							<!-- Icone de Grafico no titulo -->
							<i class="far fa-chart-bar" style="margin-right:5px"></i> 
							ENQUETE HOTBOYS
							</p>
						
						
						
						
						<!-- Termos de Uso -->
						<div class="welcomeUserAgreement txt14">
							
							<p onclick="$(this).next().slideToggle();" class="txtBold" style=" font-family: 'Open Sans',sans-serif; font-size: 16px; padding: 10px; font-weight: bold; line-height: 24px; ">
							Imagina ouvir aquela voz bem sexy no pezinho do seu ouvido. O site mais quente da net quer saber de você cliente HotBoys. Vocês gostariam de ter os mais sensuais, excitantes, e prazerosos contos eróticos, narrados pelos modelos mais gostosos do site?</p>
							
							
						</div>
						
						<!-- Botao Eu Concordo -->
						<div class="clear">
							<div class="floatLeft split0">
								<?php $dataExpiracaoCookie = date('Y-m-d', strtotime('+1 year')); ?>
								<a class="welcomeEnterButton txt16 mrgLeft block" href="https://hotboys.com.br/vip/enquete#agreementPopupContainer" onclick="document.cookie='verificacao_idade=sim; expires=<?php echo $dataExpiracaoCookie ?>; path=/;'">Quero Votar!</a>					
							</div>
						</div>	
						
						<!-- Botao Eu Nao Concordo -->
<div class="floatLeft split0">
						<?php $dataExpiracaoCookie = date('Y-m-d', strtotime('+1 year')); ?>
						<a class="clear txtCenter mrgTop2 txtGray block" href="#agreementPopupContainer" onclick="document.cookie='verificacao_idade=sim; expires=<?php echo $dataExpiracaoCookie ?>; path=/;'"  data-dismiss="modal">
							Fechar
						</a>
						</div>
						
						
					<?php } ?>
					
					
					
					
					
				</div>
			</div>
		</div>
		<div class="welcomeMask"></div>
	</div>
	
	<div style="display:none;width:50%;margin: 0 auto;text-align:center">
	<div class="col-lg-5 col-xs-12">1</div>
	<div class="col-lg-7 col-xs-12">2</div>
	</div>
</div> 
<!-- FIM - POPUP MODAL VIP -->


<style>
	.modal{
	display:inherit;
	}
</style>
