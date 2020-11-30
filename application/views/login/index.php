<div class="row justify-content-center align-items-center full-height">
	<div class="col-12 col-sm-8 col-md-6 col-lg-4 text-center">
		<form action="login/logar" method="post">
			<div class="card transparente">
				<img class="logo" src="<?= base_url('assets/image/logo.png')?>">
				<div class="card-body">
					<div class="form-group">
						<div class="input-group">
							<span class="sem-borda input-group-addon fa fa-user"></span>
							<input name="email" type="email" class="form-control sem-borda" placeholder="E-mail" required>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="sem-borda input-group-addon fa fa-lock"></span>
							<input name="senha" type="password" class="form-control sem-borda" placeholder="Senha" required>
						</div>
					</div>
				</div>
				<div class="card-footer text-right transparente">
					<button type="submit" class="btn btn-primary">
						<span class="fa fa-check" aria-hidden="true"></span>
						Confirmar
					</button>
				</div>
			</div>
		</form>
		<?php
			if($this->session->flashdata('erro')){
				require_once 'alert.php';
			}
		?>
	</div>
</div>
