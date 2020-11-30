<div class="modal fade" id="alterarSenha">
	<div class="modal-dialog">
		<form action="login/alterarSenha" method="post">
			<div class="modal-content">
				<div class="modal-header fundo">
					<h4 class="modal-title">Alterar Senha</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon fa fa-lock"></span>
							<input name="senhaAntiga" type="password" class="form-control" placeholder="Senha antiga" required>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon fa fa-lock"></span>
							<input name="novaSenha" type="password" class="form-control" placeholder="Nova senha" required>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon fa fa-lock"></span>
							<input name="confirmarSenha" type="password" class="form-control" placeholder="Confirmar senha" required>
						</div>
					</div>
				</div>
				<div class="modal-footer fundo">
					<button class="btn btn-danger" data-dismiss="modal">
						<span class="fa fa-close"></span>
						Fechar
					</button>
					<button class="btn btn-success" type="submit">
						<span class="fa fa-check fa-1x" aria-hidden="true"></span>
						Alterar
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
