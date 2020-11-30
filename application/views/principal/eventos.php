<div class="col-sm-12 col-lg-12 margin-top">
	<?php
      if($this->session->flashdata()){
        require_once(APPPATH.'views/login/alert.php');
      }
    ?>
	<div class="card shadow">
		<div class="card-header text-center">
			<h5><?= $titulo ?></h5>
			<div id="xD"></div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped text-left" id="tabelaMeusEventos">
					<thead>
						<tr>
							<th>Aberto Por</th>
							<th>Titulo</th>
							<th>Local</th>
							<th>Data</th>
							<th>Hora</th>
							<th>Editar</th>
							<th>Excluir</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($eventos as $evento): ?>
						<tr>
							<td><?= $evento["nome"]; ?></td>
							<td><?= $evento['titulo']; ?></td>
							<td><?= $evento['local']; ?></td>
							<td><?= data($evento['dataInicio']);?></td>
							<td><?= $evento['horaInicio'];?></td>
							<td width="5%">
								<button class="btn btn-primary" onclick="edit_event(<?=	$evento['idEvento']; ?>)">
									<span class="fa fa-edit"></span>
								</button>
							</td>
							<td width="3%">
								<a href="Eventos/desabilitar/<?= $evento['idEvento']; ?>" class="btn btn-danger">
									<span class="fa fa-close"></span>
								</a>
								<!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletarEvento">
									<span class="fa fa-close"></span>
								</button> -->
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>

	function edit_event(id) {

	      $.ajax({
	        url : "<?= site_url('Eventos/carregaEvento')?>/" + id,
	        type: "GET",
	        dataType: "JSON",
	        success: function(evento) {

	 			$('form').attr('action', "<?= site_url('Eventos/atualizaDados')?>/" + id);
	            $('[name="titulo"]').val(evento['titulo']);
	            $('[name="local"]').val(evento['local']);
	            $('[name="dataInicio"]').val(evento['dataInicio']);
	            $('[name="dataTermino"]').val(evento['dataTermino']);
	            $('[name="horaInicio"]').val(evento['horaInicio']);
	            $('[name="horaTermino"]').val(evento['horaTermino']);
	            $('[name="descricao"]').val(evento['descricao']);

	            $('#myModal').modal('show');
	            $('#myModal .modal-title').text('Editar evento');
				$('#myModal .btn-success').text('Salvar alterações');

	        },

	    });
	}

</script>

<!-- <div class="modal fade" id="deletarEvento" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Excluir evento</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Deseja realmente deletar esse evento?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
					Fechar
				</button>
				<a href="Eventos/desabilitar/<?= $evento['idEvento']; ?>" class="btn btn-primary">
					Confirmar
				</a>
			</div>
		</div>
	</div>
</div> -->
