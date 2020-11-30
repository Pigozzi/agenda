<div class="modal fade" id="myModal" style="overflow: auto;">
	<div class="modal-dialog">
		<form action="Eventos/salvar" method="POST">
			<div class="modal-content">
				<div class="modal-header fundo">
					<h5 class="modal-title" id="agendamento">Novo Evento</h5>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Titulo</label>
						<input name="titulo" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Local</label>
						<input name="local" type="text" class="form-control" required>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Data Início</label>
							<input name="dataInicio" type="date" class="form-control" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required>
	           			</div>
	           			<div class="form-group col-md-6">
	           				<label>Data Término</label>
							<input name="dataTermino" type="date" class="form-control" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required>
	           			</div>
           			</div>
           			<div class="row">
						<div class="form-group col-md-6">
							<label>Hora Início</label>
							<input name="horaInicio" type="time" class="form-control" required>
	        			</div>
						<div class="form-group col-md-6">
							<label>Hora Término</label>
							<input name="horaTermino" type="time" class="form-control" required>
	        			</div>
        			</div>
					<div class="form-group">
						<label>Descrição</label>
						<textarea name="descricao" rows="3" class="form-control" required></textarea>
					</div>
				</div>
				<div class="modal-footer fundo">
					<button class="btn btn-danger" type="button" data-dismiss="modal">
						<span class="fa fa-close fa-1x" aria-hidden="true"></span>
						Fechar
					</button>
					<button class="btn btn-success" type="submit">
						<span class="fa fa-plus fa-1x" aria-hidden="true"></span>
						Cadastrar
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
