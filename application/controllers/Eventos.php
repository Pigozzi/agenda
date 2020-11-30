<?php

	defined('BASEPATH') OR die('Acesso Não Permitido');

	class Eventos extends CI_Controller {

		private $data = array();

		public function __construct() {

			parent::__construct();

			$this->load->model(
				array(
					'evento_model',
					'usuario_model',
					'setor_model'
				)
			);

			$this->data['setores'] = $this->setor_model->retornaSetor();
			$this->data['participanteSetor'] = $this->setor_model->buscaSetor();

		}

		public function index($mes = null, $ano = null){

			if(verificarSessao()) {

				if($mes == null) $mes = date('m');
				if($ano == null) $ano = date('Y');

				$this->data['mes'] = $mes;
				$this->data['ano'] = $ano;
				$this->data['eventos'] = $this->evento_model->eventoPorMes($mes, $ano);

				$eventos = $this->evento_model->eventoPorMes($mes, $ano);

				$this->data['calendario'] = '';

				$ultimoDia = date('t', strtotime(date('t-'.$mes.'-'.$ano)));

				for($dia = 1; $dia <= $ultimoDia; $dia++) {

					$eventosDia = '';
					foreach($eventos as $evento) {

						$cor =
							$this->setor_model->get_cor(
								$this->evento_model->setAbertoPor($evento['idEvento'], TRUE)
							);

						if($evento['dia'] == $dia) {
							$eventosDia .= cria_evento($evento['titulo'], $cor);
						}
					}

					$tempDate = date($dia.'-'.$mes.'-'.$ano);

					if($dia == 1 || date('w', strtotime($tempDate)) == 0) {
					 	$this->data['calendario'] .= '<div class="row">';
					}

					if($dia == 1) {
						for($semana = 0; $semana < date('w', strtotime($tempDate)); $semana++) {
							$this->data['calendario'] .= '<div class="col-calendario corpo-calendario"></div>';
						}
					}

					if(date('d-m-Y', strtotime($tempDate)) == (date('d-m-Y'))) {
						$hoje = 'dia-atual';
					} else {
						$hoje = '';
					}

					$this->data['calendario'] .= '<div class="col-calendario corpo-calendario fundo-dia '.$hoje.'"><span class="day">'.$dia.'</span>'.$eventosDia.'</div>';

					if(date('w', strtotime($tempDate)) == 6) {
						$this->data['calendario'] .= '</div>';
					}


				}

				$this->load->template('principal/calendario', $this->data);

			} else {

				redirect('/');
			}

		}

		private function _retornaPorPost(){

			$titulo			 	= $this->input->post('titulo');
			$local 				= $this->input->post('local');
			$dataInicio 		= $this->input->post('dataInicio');
			$dataTermino		= $this->input->post('dataTermino');
			$horaInicio 		= $this->input->post('horaInicio');
			$horaTermino 		= $this->input->post('horaTermino');
			$descricao 			= $this->input->post('descricao');

			$evento = array(
				'titulo' 		=> $titulo,
				'local' 		=> $local,
				'dataInicio'	=> $dataInicio,
				'dataTermino' 	=> $dataTermino,
				'horaInicio' 	=> $horaInicio,
				'horaTermino' 	=> $horaTermino,
				'descricao' 	=> $descricao,
				'status'		=> TRUE
			);

			return $evento;

		}

		public function salvar(){

			$participantesEvento = array();

			if($this->input->post('setor'))
			{
				foreach ($this->input->post('setor') as $setor)
				{
					array_push($participantesEvento,
						$this->usuario_model->retornaUsuariosSetor($setor));
				}
			}

			$this->evento_model->salva($this->_retornaPorPost(), $participantesEvento);

			$this->session->set_flashdata('sucesso', 'Evento cadastrado com sucesso.');

			redirect('calendario');

		}

		public function desabilitar($idEvento){

			$this->evento_model->remove($idEvento);

			$this->session->set_flashdata('sucesso', 'Evento excluído com sucesso.');

			redirect('/eventos');
		}

		public function atualizaDados($idEvento){

			$this->output->enable_profiler(TRUE);
			$this->evento_model->atualizaEvento($idEvento, $this->_retornaPorPost());

			$this->session->set_flashdata('sucesso', 'Evento atualizado com sucesso.');

			redirect('/eventos');

		}

		public function carregaEvento($idEvento){

			$evento = $this->evento_model->editarEvento($idEvento);

			echo json_encode($evento);

		}

		public function retornaTodosEventos(){

			$eventos = $this->evento_model->todosEventos();

			$this->data['eventos'] = $eventos;
			$this->data['titulo']  = 'Todos Eventos';

			$this->load->template('principal/eventos', $this->data);

		}

		public function loadEventsByDay($day, $month, $year)
		{
			echo json_encode($this->evento_model->getEventsByDay($day, $month, $year));
		}

	}
