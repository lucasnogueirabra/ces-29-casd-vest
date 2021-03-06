<?php

if(ENVIRONMENT)
{
	define('URL', 'http://www.cursosantosdumont.org.br/');
	define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'].'/');
}

if(!ENVIRONMENT)
{
	define('URL', 'http://127.0.0.1/santosdumont-inaldo/');
	define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'].'/santosdumont-inaldo/');
}

	define('INDEX_LINK', URL.'index');

	define('HISTORIA_LINK', URL.'historia');
	define('CONSTRUCAO_LINK', URL.'construcao');
	define('DOADOR_LINK', URL.'doador');
	define('PARCEIRO_LINK', URL.'parceiro');
	define('VOLUNTARIO_LINK', URL.'voluntario');
	define('PROFESSOR_LINK', URL.'professor');

	define('VESTIBULINHO_LINK', URL.'vestibulinho');
	define('VESTIBULINHO_CASD_LINK', URL.'vestibulinho/casd');
	define('VESTIBULINHO_CASD_CONFIRMACAO_LINK', URL.'vestibulinho/confirmacao_casd');
	define('VESTIBULINHO_CASD_CONSULTA_LINK', URL.'vestibulinho/consulta_casd');
	define('VESTIBULINHO_CASDINHO_LINK', URL.'vestibulinho/casdinho');
	define('VESTIBULINHO_CASDINHO_CONFIRMACAO_LINK', URL.'vestibulinho/confirmacao_casdinho');
	define('VESTIBULINHO_CASDINHO_CONSULTA_LINK', URL.'vestibulinho/consulta_casdinho');
	define('VESTIBULINHO_CASD_EDITAL_LINK', URL.'vestibulinho/downloadEditalCasd');
	define('VESTIBULINHO_CASDINHO_EDITAL_LINK', URL.'vestibulinho/downloadEditalCasdinho');
	define('VESTIBULINHO_CASD_PROVAS_LINK', URL.'vestibulinho/provasCasd');
	define('VESTIBULINHO_CASDINHO_PROVAS_LINK', URL.'vestibulinho/provasCasdinho');
	define('VESTIBULINHO_CASD_DOCUMENTOS_LINK', URL.'vestibulinho/documentosCasd');
	define('VESTIBULINHO_CASDINHO_DOCUMENTOS_LINK', URL.'vestibulinho/documentosCasdinho');
		
	define('ADMIN_LOGIN_LINK', URL.'admin/login');
	define('ADMIN_INDEX_LINK', URL.'admin/index');
	define('ADMIN_PROF_LINK', URL.'admin/professores');
	define('ADMIN_RESULTADO_CASD_LINK', URL.'admin/resultadoVestibulinhoCasd');

	define('ENTREVISTA_LOGIN_LINK', URL.'entrevista/login');
	define('ENTREVISTA_INDEX_LINK', URL.'entrevista/index');
	
	define('VIDEO_INSTITUCIONAL_LINK', 'http://www.youtube.com/watch?v=waX6e1veNIs');

	define('ERROR_LINK', URL.'error')

?>