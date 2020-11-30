<?php

defined('BASEPATH') OR die('Não é possivel acessar este link');

class Setor_Model extends CI_Model {

	public function salva($novoSetor){
		$this->db->insert('setor', $novoSetor);
	}

	public function get_cor($id) {

		$setor = $this->db
		->select('cor')
		->from('setor')
		->where('idsetor', $id)
		->get()
		->row_array();

		return $setor['cor'];
	}

	public function buscaSetor(){

		return $this->db
		->SELECT('idSetor, nome')
		->FROM('setor')
		->get()
		->result_array();

		}

	// public function buscaNomeSetor($idSetor){
	// 	$setor = $this->db
	// 	->SELECT('nome')
	// 	->FROM('setor')
	// 	->WHERE('idSetor', $idSetor)
	// 	->get()
	// 	->row_array();

	// 	return $setor['nome'];

	// }

	public function retornaSetor(){
		$array = array();
		$setores = $this->buscaSetor();
		$array['0'] = 'Selecione o setor';

		foreach ($setores as $setor) {
			$array[$setor['idSetor']] = $setor['nome'];
		}

		return $array;

		}

}
