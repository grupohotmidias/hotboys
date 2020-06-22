<div class="modal fade" id="editar-perfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">

		<!-- Conteudo -  Termos de Uso -->
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Contato</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				
				<!-- conteudo dos textos começa aqui -->
				<div class="texto" id="modalContainer">
					<div id="modalConteudo">
						<p><strong>Como você prefere falar com a gente?</strong></p>
						
						<!-- email -->
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 modalContato">
							<div class="tituloContato">
								<?php if($vip){ ?>
									<i class="fa fa-envelope fa-2x"></i>
									<?php }else{ ?>
									<i class="far fa-envelope fa-2x"></i>
								<?php }?>
								<h5>E-mail</h5>
							</div>
							
							<p>Tem alguma dúvida? Podemos te ajudar pelo nosso canal de email.</p>
							<p class="contato"><a href="mailto:contato@hotmidias.com.br">contato@hotmidias.com.br</a></p>
						</div>
						
						<!-- telefone -->
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 modalContato">
							<div class="tituloContato">
								<?php if($vip){ ?>
									<i class="fa fa-phone fa-2x"></i>
									<?php }else{ ?>
									<i class="fas fa-phone-volume fa-2x"></i>
								<?php } ?>
								<h5>Telefone</h5>
							</div>
							<p>Você pode ligar para o Hotboys a qualquer hora através do número abaixo.</p>
							<p class="contato"><a href="tel:+5502130053221">(21) 3005-3221</a></p>
						</div>
						
						<!-- whatsapp -->
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 modalContato">
							<div class="tituloContato">
								<?php if($vip){ ?>
									<i class="fab fa-whatsapp fa-2x"></i>
									<?php }else{ ?>
									<i class="fa fa-whatsapp fa-2x"></i>
								<?php }?>
								<h5>Whatsapp</h5>
							</div>
							<p>Deu ruim? Que tal uma rapidinha. Whatsapp hot é a forma mais rápida de você chegar lá. É Vapt e Vupt!</p>
							<p class="contato"><a href="https://wa.me/5521965035394" target="_blank">+55 (21) 96513-3700</a></p>
						</div>
						
					</div>
				</div>
				
			</div>
			
		</div>	
		
	</div>
</div>
