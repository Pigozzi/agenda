<?php

	defined('BASEPATH') OR die('Acesso Não Permitido');

	class Setor extends CI_Controller {

		public function novoSetor(){

			$this->load->model('setor_model');

			$nome 	= $this->input->post('nome');
			$ramal 	= $this->input->post('ramal');
			$cor 	= $this->input->post('cor');


			$setor = array(
				'nome' 	=> $nome, 
				'ramal' => $ramal,
				'cor' 	=> $cor				
			);

			$this->setor_model->salva($setor);

			$this->session->set_flashdata('sucesso', 'Setor cadastrado com sucesso.');

			redirect('/calendario');

		}
					
	}