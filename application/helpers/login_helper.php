<?php

	function verificarSessao(){

		$instancia = get_instance();

		$usuario_logado = $instancia->session->userdata('usuario_logado');

		return $usuario_logado;

	}