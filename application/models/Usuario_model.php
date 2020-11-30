<?php

	defined('BASEPATH') OR die('Não é possivel acessar este link');

	class Usuario_Model extends CI_Model{

		public function verificaUsuario($email, $senha){

			return $this->db
			->SELECT('setor.idSetor, idUsuario, usuario.nome AS nome, setor.nome AS setor, usuario.email AS email')
			->FROM('usuario')
			->JOIN('setor', 'usuario.idSetor = setor.idSetor')
			->WHERE('email',$email)
			->WHERE('senha',$senha)
			->get()
			->row_array();

		}

		public function alterarSenha($idUsuario, $senha){
			$this->db->WHERE('idUsuario', $idUsuario);
			$this->db->update('usuario', array('senha' => $senha));

		}

		public function verificaSenha($idUsuario, $senha){
			return $this->db
			->SELECT('senha')
			->FROM('usuario')
			->WHERE('idUsuario', $idUsuario)
			->WHERE('senha', $senha)
			->get()
			->row_array();

		}

		public function retornaPorSetor() {
			return
			$this->db
			->select('usuario.idUsuario, usuario.nome, setor.nome AS setorNome')
			->from('usuario')
			->join('setor','usuario.idSetor = setor.idSetor')
			->get()
			->result_array();

		}

		public function retornaUsuariosSetor($idSetor){
			return $this->db
			->SELECT('idUsuario')
			->FROM('usuario')
			->WHERE('idSetor', $idSetor)
			->get()
			->result_array();
		}

		public function salva($novoUsuario){
			$this->db->insert('usuario', $novoUsuario);
		}


	}
