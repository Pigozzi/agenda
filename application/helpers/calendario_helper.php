<?php

defined('BASEPATH') OR exit('Acesso Não Permitido');

//Função para criar uma linha com o evento no calendario
function cria_evento($nome_evento, $cor = null) {

	return '<div class="row" data-toggle="tooltip" data-placement="top" data-html="true" title="<test>'.$nome_evento.'</test>">
				<div class="col-md-12 calendario-evento" style="background:'.$cor.'; color:white;">'.$nome_evento.'</div>
			</div>';

}
