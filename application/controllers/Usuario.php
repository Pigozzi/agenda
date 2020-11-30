<?php

	defined('BASEPATH') OR die('Acesso Não Permitido');

	class Usuario extends CI_Controller {

		public function novoUsuario(){

			$this->load->model('usuario_model');

			$nome 			=	$this->input->post('nome');
			$idSetor 		=	$this->input->post('idSetor');
			$email 			= 	$this->input->post('email');
			$senha 			= 	$this->input->post('senha');
			$responsavel	= 	$this->input->post('responsavel');


			$usuario = array(
				'nome' 			=> $nome, 
				'idSetor'		=> $idSetor,
				'email'			=> $email,
				'senha'			=> hash('sha256', $senha),
				'responsavel'	=> $responsavel
			);

			$this->usuario_model->salva($usuario);

			$this->session->set_flashdata('sucesso', 'Usuário cadastrado com sucesso.');

			redirect('/calendario');

		}
					
	}

	// TRATAR ARRAY > 0;