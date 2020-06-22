<!-- Modal -->
<div class="modal fade" id="infoAtor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel"><?php echo utf8_encode("Informações do Ator") ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		<!-- Card Body -->
		<form action="" method="post">
		<div class="card-body">
		<div class="chart-area">
		<table class="table table-dark m-0">
		<tbody>
		<tr>
		<td class="first-child">Nome</td>
		<td class="first-child"><input type="text" id="nome" name="nome" class="form-control p-2 text-center" value="<?= $consulta_ator["nome"];?>" required></td>
		</tr>
		<tr>
		<td>Telefone</td>
		<td><input type="text" id="telefone" name="telefone" class="form-control p-2 text-center" value="<?= $consulta_ator["telefone"];?>" required></td>
		</tr>
		<tr>
		<td>Whatsapp</td>
		<td><input type="text" id="whatsapp" name="whatsapp" class="form-control p-2 text-center" value="<?= $consulta_ator["whatsapp"];?>" required></td>
		</tr>
		<tr>
		<td>Estado</td>
		<td><input type="text" id="estado" name="estado" class="form-control p-2 text-center" value="<?= $consulta_ator["estado"];?>" required></td>
		</tr>
		<tr>
			<td>Status</td>
			<?php
				$statusAtor = $consulta_ator[status];
				if($statusAtor =='Ativo'){ ?>
				<td class="text-center"><?= $statusAtor ?></td>
				<?php }else{ ?>
				<td class="vazio"><?= $statusAtor ?></td>
			<?php } ?>
		</tr>
		<tr>
			<td></td>
			<td><input type="hidden" name="acao" value="editarinfo">
			<button type="submit" class="btn btn-success atualizar btn-block">Atualizar</button>
			<?= $msg ?></td>
		</tr>
		</tbody>
		</table>
		</div>
		</div>
		</form>
		
		</div>
		</div>
		</div>
</div>				