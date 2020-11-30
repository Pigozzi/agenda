<div class="modal fade" id="novoUsuario">
	<div class="modal-dialog">
		<form action="usuario/novoUsuario" method="post">
			<div class="modal-content">
				<div class="modal-header fundo">
					<h4 class="modal-title">Novo Usuário</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nome do usuário</label>
						<input name="nome" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="form-control-label">Setor</label>
						<?= form_dropdown(
							'idSetor', $setores, '',
							array(
								'class' => 'form-control'
							)
						); ?>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="form-control-label">E-mail institucional</label>
						<input name="email" type="email" class="form-control" placeholder="usuario@fundacc.sp.gov.br" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="form-control-label">Senha</label>
						<input name="senha" type="password" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="espaco">Responsável pelo setor?</label>
						<label for="recipient-yes">Sim</label>
						<input id="recipient-yes" name="responsavel" type="radio" value="1" style="margin: 10px;">
						<label for="recipient-no">Não</label>
						<input id="recipient-no" name="responsavel" type="radio" value="0" style="margin: 10px;">
					</div>
				</div>
				<div class="modal-footer fundo">
					<button class="btn btn-danger" data-dismiss="modal">
						<span class="fa fa-close"></span>
						Fechar
					</button>
					<button class="btn btn-success" type="submit">
						<span class="fa fa-plus"></span>
						Cadastrar
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
