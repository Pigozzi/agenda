<?php

defined('BASEPATH') OR die('Não é possivel acessar este link');

class MY_Loader extends CI_Loader {

    public function template($nome, $array = null){

    	$this->view('templates/header');
    	$this->view('principal/menu');
    	$this->view($nome, $array);
	   	$this->view('principal/modal/agendamento');
		$this->view('principal/modal/alterarSenha');
        $this->view('principal/modal/novoSetor');
        $this->view('principal/modal/novoUsuario');
        $this->view('principal/modal/carregaEvento');
    	$this->view('templates/footer');

    }

}
