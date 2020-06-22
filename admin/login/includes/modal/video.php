<!-- Modal -->
<div class="modal fade" id="editarVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
				<?php echo utf8_encode('Vídeo') ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<section id="video">
					<!-- Editar video -->
					<form action="" method="post">
						<div class="card-body">
							
							<div class="chart-area my-3" style=" margin:0 auto;text-align:center">
								<div class="col-12 col-sm-9 mb-3" style="margin:0 auto"><?php echo utf8_encode('Insira a URL do vídeo') ?></div>
								
								<div class="col-12 col-sm-9" style="margin:0 auto">
									<input type="text" id="video_code" name="video_code" class="form-control p-2 text-center" value="<?= $consulta_ator["video_code"];?>" required>
								</div>
								
								<div class="col-12 col-sm-9 mt-3" style="margin:0 auto">
									<input type="hidden" name="acao" value="editarvideo">
									<button type="submit" class="btn btn-success atualizar btn-block">Atualizar</button>
								</div>
								
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</div>
</div>