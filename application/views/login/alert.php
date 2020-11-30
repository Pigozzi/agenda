<?php
	if($this->session->flashdata('erro')){
		$message = $this->session->flashdata('erro');
		$class = 'danger';
	}

	if($this->session->flashdata('sucesso')){
		$message = $this->session->flashdata('sucesso');
		$class = 'success';
	}

	if($this->session->flashdata('warning')){
		$message = $this->session->flashdata('warning');
		$class = 'warning';
	}
?>

<div class="alert alert-<?= $class ?> shadow alert-dismissable text-center" role="alert">
	<a href="#" class='close' data-dismiss='alert'>&times;</a>
	<strong><?= $message ?></strong>
</div>
