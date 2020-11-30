<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-sm-12 col-lg-12 margin-top">
			<?php
		      if($this->session->flashdata()){
		        require_once(APPPATH.'views/login/alert.php');
		      }
		    ?>
			<div class="card shadow calendario">
				<div class="card-header">
					<div class="row">
						<div class="col-12 col-sm-4 col-md-4 col-lg-3">
							<button class="btn btn-success" type="button" data-toggle="modal" data-target="#myModal">
								<span class="fa fa-calendar-plus-o"></span>
									Novo Evento
							</button>
						</div>
						<div class="col-12 col-sm-4 col-md-4 col-lg-6 ">
							<h3 class="text-center"><?= mes($mes).' '.$ano ?></h3>
						</div>
						<div class="col-12 col-sm-4 col-md-4 col-lg-3  text-right">
							<a href="<?= base_url('calendario');?>" class="btn btn-primary">
								Hoje
							</a>
							<?php
								$anterior = $mes - 1;

								if($anterior == 0) {
									$anterior = 12;
									$ano--;

								}
							?>
							<a href="<?= base_url('calendario/'.$anterior.'/'. $ano);?>" class="btn btn-outline-primary">
								<i class="fa fa-fw fa-arrow-left"></i>
							</a>
							<?php
								$proximo = $mes + 1;

								if($anterior == 12) $ano++;

								if($proximo == 13) {
									$proximo = 1;
									$ano++;
								}
							?>

							<a href="<?= base_url('calendario/'.$proximo.'/'. $ano);?>" class="btn btn-outline-primary">
								<i class="fa fa-fw fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-calendario cabecalho-calendario"><strong>Domingo</strong></div>
						<div class="col-calendario cabecalho-calendario"><strong>Segunda</strong></div>
						<div class="col-calendario cabecalho-calendario"><strong>Terça</strong></div>
						<div class="col-calendario cabecalho-calendario"><strong>Quarta</strong></div>
						<div class="col-calendario cabecalho-calendario"><strong>Quinta</strong></div>
						<div class="col-calendario cabecalho-calendario"><strong>Sexta</strong></div>
						<div class="col-calendario cabecalho-calendario"><strong>Sábado</strong></div>
					</div>

					<?= $calendario; ?>

				</div>
			</div>
		</div>
	</div>
</div>
