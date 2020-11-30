<?php

	defined('BASEPATH') OR die('Não é possivel acessar este link');

  class Evento_Model extends CI_Model{

    public function salva($evento, $participantes) {

      $this->db->insert('evento', $evento);

      $max = $this->db
      ->select('MAX(idEvento) AS idEvento')
      ->from('evento')
      ->get()
      ->row_array();

      $abertoPor = array(
        'idUsuario' => verificarSessao()['idUsuario'],
        'participa' => FALSE,
        'aberto'    => TRUE,
        'idEvento' => $max['idEvento']
      );

      $this->db->insert('participante', $abertoPor);

      foreach ($participantes as $participante) {
        foreach ($participante as $participanteAtual) {

          $novoParticipante['idEvento'] = $max['idEvento'];
          $novoParticipante['idUsuario'] = $participanteAtual['idUsuario'];
          $novoParticipante['participa'] = TRUE;
          $novoParticipante['aberto']   = FALSE;

          $this->db->insert('participante', $novoParticipante);

        }

      }

    }

    public function retorna(){
      return $this->db
      ->get_where('evento', array('status' => TRUE))
      ->result_array();

     }

    public function remove($idEvento){
      $this->db->WHERE('idEvento', $idEvento);
      $this->db->update('evento', array('status' => FALSE));

    }

    public function editarEvento($idEvento){
      return $this->db
      ->SELECT('*')
      ->FROM('evento')
      ->WHERE('idEvento', $idEvento)
      ->get()
      ->row_array();

    }

    public function atualizaEvento($idEvento, $attrEvento){

      $this->db->where('idEvento', $idEvento);
      $this->db->set($attrEvento);
      $this->db->update('evento');

    }

    public function meusEventos(){

      $eventos = $this->db
      ->select('evento.idEvento, titulo, local, dataInicio, horaInicio')
      ->from('evento')
      ->join('participante', 'evento.idevento = participante.idevento')
      ->where('participante.idusuario', verificarSessao()['idUsuario'])
      ->where('(participante.aberto', TRUE)
      ->or_where("participante.participa = TRUE )", NULL, FALSE)
      ->where('status', TRUE)
      ->get()
      ->result_array();

        $eventosAtualizado = array();

        foreach($eventos as $evento) {
          $evento['nome'] = $this->setAbertoPor($evento['idEvento']);

          array_push($eventosAtualizado, $evento);

        }

        return $eventosAtualizado;

    }


    public function setAbertoPor($idEvento, $id = FALSE) {

      $evento = $this->db
      ->select('usuario.nome, idsetor')
      ->from('participante')
      ->join('usuario', 'usuario.idusuario = participante.idusuario')
      ->where('participante.idevento', $idEvento)
      ->where('participante.aberto', TRUE)
      ->get()
      ->row_array();

      if($id) {
        return $evento['idsetor'];
      } else {
        return $evento['nome'];
      }

    }

      public function todosEventos() {

        $eventos = $this->db
        ->SELECT('evento.idEvento, titulo, local, dataInicio, horaInicio')
        ->FROM('evento')
        ->JOIN('participante', 'evento.idevento = participante.idevento')
        ->JOIN('usuario', 'usuario.idusuario = participante.idusuario')
        ->WHERE('usuario.idsetor', verificarSessao()['idSetor'])
        ->WHERE('status', TRUE)
        ->group_by('evento.idevento')
        ->get()
        ->result_array();

        $eventosAtualizado = array();

        foreach($eventos as $evento) {
          $evento['nome'] = $this->setAbertoPor($evento['idEvento']);

          array_push($eventosAtualizado, $evento);

        }

        return $eventosAtualizado;
    }


    public function eventoPorMes($mes, $ano) {

      $eventos = $this->db
      ->select('evento.idEvento, evento.titulo, day(evento.dataInicio) AS dia, evento.horaInicio, evento.horaTermino')
      ->from('evento')
      ->join('participante', 'evento.idevento = participante.idevento')
      ->join('usuario', 'usuario.idusuario = participante.idusuario')
      ->where('usuario.idsetor', verificarSessao()['idSetor'])
      ->where('status', TRUE)
      ->where('month(evento.dataInicio)', $mes)
      ->where('year(evento.dataInicio)', $ano)
      ->group_by('evento.idevento')
      ->order_by('evento.dataInicio', 'ASC')
      ->order_by('evento.horaInicio', 'ASC')
      ->get()
      ->result_array();

      $eventosAtualizado = array();

      foreach($eventos as $evento) {
        $evento['nome'] = $this->setAbertoPor($evento['idEvento']);

        array_push($eventosAtualizado, $evento);

      }

      return $eventosAtualizado;

    }

    public function getEventsByDay($day, $month, $year)
    {
        $this->db->where('dataInicio', $year.'-'.$month.'-'.$day)
        ->where('status', TRUE);
        return $this->db->get('evento')->result();
    }

  }
