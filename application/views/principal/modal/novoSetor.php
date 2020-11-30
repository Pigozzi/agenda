<div class="modal fade" id="novoSetor">
	<div class="modal-dialog">
		<form action="setor/novoSetor" method="post">
			<div class="modal-content">
				<div class="modal-header fundo">
					<h4 class="modal-title">Novo Setor</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nome do setor</label>
						<input name="nome" type="text" class="form-control" required>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Ramal</label>
							<input name="ramal" type="text" class="form-control" required>
						</div>
						<div class="form-group col-md-6">
							<label>Cor</label><br>
							<input name="cor" type="color" required>
						</div>
					</div>
				</div>
				<div class="modal-footer fundo">
					<button class="btn btn-danger" data-dismiss="modal">
						<span class="fa fa-close"></span>
						Fechar
					</button>
					<button class="btn btn-success" type="submit">
						<span class="fa fa-check"></span>
						Cadastrar
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
