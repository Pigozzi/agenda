<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse " id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="<?= base_url('calendario'); ?>" class="nav-link">
					<span class="fa fa-calendar"></span>
					Calendário
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url('eventos'); ?>" class="nav-link text-left">
					<span class="fa fa-calendar-check-o"></span>
					Todos Eventos
				</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="fa fa-user-circle"></span>
					<?= $this->session->userdata('usuario_logado')['nome']; ?>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<div class="list-group" id="list-tab" role="tablist">
						<!-- <button class="border border-0 btn btn-outline-primary list-group-item text-left" type="button" data-toggle="modal" data-target="#novoSetor">
							<span class="fa fa-plus-square margin-setor"></span>
							Novo Setor
						</button> -->
						<!-- <button class="border border-0 btn btn-outline-primary list-group-item text-left" type="button" data-toggle="modal" data-target="#novoUsuario">
							<span class="fa fa-user-plus"></span>
							Novo Usuário
						</button> -->
						<button class="border border-0 btn btn-outline-secondary list-group-item text-left" type="button" data-toggle="modal" data-target="#alterarSenha">
							<span class="fa fa-lock margin-senha"></span>
							Alterar Senha
						</button>
						<a href="login/sair" class="border border-0 btn btn-outline-danger list-group-item text-left">
							<span class="fa fa-sign-out margin-sair"></span>
							Sair
						</a>
					</div>
				</div>
			</li>
		</ul>
	</div>
</nav>
