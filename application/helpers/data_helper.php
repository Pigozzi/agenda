<?php 

	function data($date){
		$data = new DateTime($date);
		return $data->format('d/m/Y');
	}

	function mes($mes){

		$meses = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio','Junho','Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');

		return $meses[intval($mes) - 1];

	}

	//verificar

	function set_date($month, $year) { 

		$new_date =  new DateTime('01-'.$month.'-'.$year); 

		$data = array(
			'primeiro'	=> $new_date->format('d'),
			'ultimo'  	=> $new_date->format('t'),    
			'semana'  	=> $new_date->format('w'),  
			'atual' 	=> date('d')
		); 
		return $data;
	} 

	function get_day($date) { 

		$new_date = new DateTime($date); 
		return $new_date->format('w');

	}