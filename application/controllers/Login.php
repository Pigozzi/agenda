<?php

	defined('BASEPATH') OR die('Não é possivel acessar este link');

	class Login extends CI_Controller{

		public function index(){

			$this->load->library('user_agent');

				if(!$this->session->userdata('usuario_logado')){

					$this->load->view('templates/header');
					$this->load->view('login/index');
					$this->load->view('templates/footer');

				} else {
					redirect('/calendario');
				}

		}

		public function logar(){

			$this->load->model('usuario_model');

			$email = $this->input->post('email');
			$senha = hash('sha256', $this->input->post('senha'));

			$usuario = $this->usuario_model->verificaUsuario($email, $senha);

			if($usuario){
				$this->session->set_userdata('usuario_logado',$usuario);

			} else {
				$this->session->set_flashdata('erro', 'Nome de usuário ou senha incorretos.');

			}
			redirect('/');
		}

		public function sair(){
			$this->session->unset_userdata('usuario_logado');
			redirect('/login');

		}

		public function alterarSenha(){
			$this->load->model('usuario_model');

			$idUsuario = verificarSessao()['idUsuario'];

			$senhaAntiga 	= hash('sha256', $this->input->post('senhaAntiga'));
			$novaSenha 		= hash('sha256', $this->input->post('novaSenha'));
			$confirmarSenha	= hash('sha256', $this->input->post('confirmarSenha'));

			$senhaAtual = $this->usuario_model
			->verificaSenha($idUsuario, $senhaAntiga);

			if($senhaAtual && ($novaSenha == $confirmarSenha)){

			$this->usuario_model->alterarSenha($idUsuario, $novaSenha);

			$this->session->set_flashdata('sucesso', 'Senha alterada com sucesso.');
			redirect('/calendario');

			} else {
				$this->session->set_flashdata('erro', 'Senha não alterada, verifique se digitou tudo corretamente.');

				redirect('/calendario');
			}

		}
	}
