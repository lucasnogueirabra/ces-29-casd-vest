<?php

class Admin extends Controller
{

	function __construct()
	{
		parent::__construct();
		$this->view->controller = 'admin';
	}


	function index()
	{
		Session::init();
		if(!Session::get('logged_admin'))
		{
			Session::destroy();
			Controller::redirect(ADMIN_LOGIN_LINK);
		}

		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if(isset($_POST['status_vestibulinho_casd']))
			{
				if($_POST['status_vestibulinho_casd'])
				{
					if ($this->uploadFile('files/', 'edital_casd.pdf'))
					{
						$this->model->vestibulinhoCasd($_POST['status_vestibulinho_casd']);
					}
					else
					{
						$this->view->falhaArquivo = true;
					}
				}
				else
				{
					$this->model->vestibulinhoCasd($_POST['status_vestibulinho_casd']);
				}

			}
			if(isset($_POST['consulta_vestibulinho_casd']))
			{
				$this->model->consultaCasd($_POST['consulta_vestibulinho_casd']);
			}
			if(isset($_POST['status_vestibulinho_casdinho']))
			{
				if($_POST['status_vestibulinho_casdinho'])
				{
					if ($this->uploadFile('files/', 'edital_casdinho.pdf'))
					{
						$this->model->vestibulinhoCasdinho($_POST['status_vestibulinho_casdinho']);
					}
					else
					{
						$this->view->falhaArquivo = true;
					}
				}
				else
				{
					$this->model->vestibulinhoCasdinho($_POST['status_vestibulinho_casdinho']);
				}
			}
			if(isset($_POST['consulta_vestibulinho_casdinho']))
			{
				$this->model->consultaCasdinho($_POST['consulta_vestibulinho_casdinho']);
			}
		}

		$variables = $this->model->getVestibulinhoVariables();
		if($variables)
		{
			$this->view->variables = $variables;
		}
		else
		{
			$this->view->variables = false;
		}

		$this->view->render('admin/index', false, true);
	}


	function login()
	{
		Session::init();

		if (Session::get('logged_admin'))
		{
			Controller::redirect(ADMIN_INDEX_LINK);
		}

		if (!Session::get('token-admin-login'))
		{
			Session::set('token-admin-login', md5(uniqid(rand(), TRUE)));
		}

		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if($_POST['token-admin-login'] == Session::get('token-admin-login'))
			{
				$login = $this->model->login();

				if($login)
				{
					Session::change_id();
					Session::set('logged_admin', true);

					Controller::redirect(ADMIN_INDEX_LINK);
				}
			}
		}

		$this->view->controller = 'admin-login';
		$this->view->render('admin/login', true);
	}

	function professores()
	{
		Session::init();
		if(!Session::get('logged_admin'))
		{
			Session::destroy();
			Controller::redirect(ADMIN_LOGIN_LINK);
		}

		if(isset($_POST['prof-submitted']))
		{
			$this->model->addProf();
		}

		$this->view->profInfo = $this->model->getProfInfo();
		$this->view->materias = $this->model->getMaterias();

		$this->view->render('admin/professor', false, true);
	}

	function exportVestibulinhoCasd()
	{
		Session::init();
		if(!Session::get('logged_admin'))
		{
			Session::destroy();
			Controller::redirect(ADMIN_LOGIN_LINK);
		}
		$conteudoTabela = $this->model->exportVestibulinhoCasd();
		$conteudoTabela = $this->model->deletarInscricoesRepetidas($conteudoTabela);

		$tabela_excel = array();

		$tabela_excel[0] = "";

		$tabela_excel[0] .= "<table><tr>";
		$tabela_excel[0] .= "<td><b>id</b></td>";
		$tabela_excel[0] .= "<td><b>Nome</b></td>";
		$tabela_excel[0] .= "<td><b>Sobrenome</b></td>";
		$tabela_excel[0] .= "<td><b>RG</b></td>";
		$tabela_excel[0] .= "<td><b>CPF</b></td>";
		$tabela_excel[0] .= "<td><b>Sexo</b></td>";
		$tabela_excel[0] .= "<td><b>Data de Nascimento</b></td>";
		$tabela_excel[0] .= "<td><b>Responsável</b></td>";
		$tabela_excel[0] .= "<td><b>Parentesco do Responsável</b></td>";
		$tabela_excel[0] .= "<td><b>Telefone 1</b></td>";
		$tabela_excel[0] .= "<td><b>Telefone 2</b></td>";
		$tabela_excel[0] .= "<td><b>E-mail</b></td>";
		$tabela_excel[0] .= "<td><b>CEP</b></td>";
		$tabela_excel[0] .= "<td><b>Endereço</b></td>";
		$tabela_excel[0] .= "<td><b>Número</b></td>";
		$tabela_excel[0] .= "<td><b>Bairro</b></td>";
		$tabela_excel[0] .= "<td><b>Cidade</b></td>";
		$tabela_excel[0] .= "<td><b>Estado</b></td>";
		$tabela_excel[0] .= "<td><b>Necessidade Especial</b></td>";
		$tabela_excel[0] .= "<td><b>Escolaridade</b></td>";
		$tabela_excel[0] .= "<td><b>Tipo de Escola</b></td>";
		$tabela_excel[0] .= "<td><b>Nome da Escola</b></td>";
		$tabela_excel[0] .= "<td><b>Trabalha</b></td>";
		$tabela_excel[0] .= "<td><b>Internet</b></td>";
		$tabela_excel[0] .= "<td><b>Ex-aluno</b></td>";
		$tabela_excel[0] .= "<td><b>Facebook</b></td>";
		$tabela_excel[0] .= "<td><b>Cor</b></td>";
		$tabela_excel[0] .= "<td><b>Inscrição em</b></td>";
		$tabela_excel[0] .= "</tr></table>";

		$i = 0;
		while($i < count($conteudoTabela))
		{
			$tabela_excel[$i+1] = "";
			$tabela_excel[$i+1] .= "<table><tr>";
			$tabela_excel[$i+1] .= "<td>".strval($conteudoTabela[$i]['id']+170497)."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['nome']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['sobrenome']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['RG']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['CPF']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['sexo']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['nascimento']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['responsavel']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['parentesco']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['telefone1']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['telefone2']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['email']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['cep']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['endereco']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['numero']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['bairro']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['cidade']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['estado']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['necessidade']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['escolaridade']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['tipo_escola']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['nome_escola']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['trabalha']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['internet']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['ex_aluno']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['facebook']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['cor']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['data_inscricao']."</td>";
			$tabela_excel[$i+1] .= "</tr></table>";
			$i++;
		}


		$arquivo = 'vestibulinho_casd_'.strval(date('Y')+1).'.xls';
		header ("Expires: ".gmdate("D,d M YH:i:s", strtotime("+5 minutes")));
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/vnd.ms-excel; charset=UTF-8" );
		header ("Content-Disposition: attachment; filename={$arquivo}" );
		header ("Content-Description: PHP Generated Data" );

		echo pack("CCC",0xef,0xbb,0xbf);

		for($i=0; $i<=count($conteudoTabela); $i++)
		{
		    echo $tabela_excel[$i];
		}

	}

	function exportVestibulinhoCasdinho()
	{
		Session::init();
		if(!Session::get('logged_admin'))
		{
			Session::destroy();
			Controller::redirect(ADMIN_LOGIN_LINK);
		}
		$conteudoTabela = $this->model->exportVestibulinhoCasdinho();

		$tabela_excel = array();

		$tabela_excel[0] = "";

		$tabela_excel[0] .= "<table><tr>";
		$tabela_excel[0] .= "<td><b>id</b></td>";
		$tabela_excel[0] .= "<td><b>Nome</b></td>";
		$tabela_excel[0] .= "<td><b>Sobrenome</b></td>";
		$tabela_excel[0] .= "<td><b>RG</b></td>";
		$tabela_excel[0] .= "<td><b>CPF</b></td>";
		$tabela_excel[0] .= "<td><b>Sexo</b></td>";
		$tabela_excel[0] .= "<td><b>Data de Nascimento</b></td>";
		$tabela_excel[0] .= "<td><b>Responsável</b></td>";
		$tabela_excel[0] .= "<td><b>Parentesco do Responsável</b></td>";
		$tabela_excel[0] .= "<td><b>Telefone 1</b></td>";
		$tabela_excel[0] .= "<td><b>Telefone 2</b></td>";
		$tabela_excel[0] .= "<td><b>E-mail</b></td>";
		$tabela_excel[0] .= "<td><b>CEP</b></td>";
		$tabela_excel[0] .= "<td><b>Endereço</b></td>";
		$tabela_excel[0] .= "<td><b>Número</b></td>";
		$tabela_excel[0] .= "<td><b>Bairro</b></td>";
		$tabela_excel[0] .= "<td><b>Cidade</b></td>";
		$tabela_excel[0] .= "<td><b>Estado</b></td>";
		$tabela_excel[0] .= "<td><b>Necessidade Especial</b></td>";
		$tabela_excel[0] .= "<td><b>Série</b></td>";
		$tabela_excel[0] .= "<td><b>Tipo de Escola</b></td>";
		$tabela_excel[0] .= "<td><b>Nome da Escola</b></td>";
		$tabela_excel[0] .= "<td><b>Internet</b></td>";
		$tabela_excel[0] .= "<td><b>Como conheceu</b></td>";
		$tabela_excel[0] .= "<td><b>Facebook</b></td>";
		$tabela_excel[0] .= "<td><b>Cor</b></td>";
		$tabela_excel[0] .= "<td><b>Automóveis</b></td>";
		$tabela_excel[0] .= "<td><b>Empregados</b></td>";
		$tabela_excel[0] .= "<td><b>Maquinas de Lavar</b></td>";
		$tabela_excel[0] .= "<td><b>Banheiros</b></td>";
		$tabela_excel[0] .= "<td><b>DVDs</b></td>";
		$tabela_excel[0] .= "<td><b>Geladeiras</b></td>";
		$tabela_excel[0] .= "<td><b>Freezers</b></td>";
		$tabela_excel[0] .= "<td><b>Computadores</b></td>";
		$tabela_excel[0] .= "<td><b>Lava louças</b></td>";
		$tabela_excel[0] .= "<td><b>Micro-ondas</b></td>";
		$tabela_excel[0] .= "<td><b>Motocicletas</b></td>";
		$tabela_excel[0] .= "<td><b>Secadoras</b></td>";
		$tabela_excel[0] .= "<td><b>Água</b></td>";
		$tabela_excel[0] .= "<td><b>PavimentaçãO</b></td>";
		$tabela_excel[0] .= "<td><b>Escolaridade Chefe de Família</b></td>";
		$tabela_excel[0] .= "<td><b>Inscrição em</b></td>";
		$tabela_excel[0] .= "</tr></table>";

		$i = 0;
		while($i < count($conteudoTabela))
		{
			$tabela_excel[$i+1] = "";
			$tabela_excel[$i+1] .= "<table><tr>";
			$tabela_excel[$i+1] .= "<td>".strval($conteudoTabela[$i]['id']+170497)."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['nome']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['sobrenome']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['RG']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['CPF']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['sexo']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['nascimento']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['responsavel']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['parentesco']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['telefone1']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['telefone2']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['email']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['cep']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['endereco']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['numero']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['bairro']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['cidade']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['estado']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['necessidade']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['serie']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['tipo_escola']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['nome_escola']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['internet']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['conheceu']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['facebook']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['cor']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['automoveis']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['empregados']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['maquinas']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['banheiros']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['dvds']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['geladeiras']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['freezers']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['computadores']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['lavaloucas']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['microondas']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['motocicletas']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['secadoras']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['agua']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['pavimentacao']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['escolaridade_chefe']."</td>";
			$tabela_excel[$i+1] .= "<td>".$conteudoTabela[$i]['data_inscricao']."</td>";
			$tabela_excel[$i+1] .= "</tr></table>";
			$i++;
		}


		$arquivo = 'vestibulinho_casdinho_'.strval(date('Y')+1).'.xls';
		header ("Expires: ".gmdate("D,d M YH:i:s", strtotime("+5 minutes")));
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/vnd.ms-excel; charset=UTF-8" );
		header ("Content-Disposition: attachment; filename={$arquivo}" );
		header ("Content-Description: PHP Generated Data" );

		echo pack("CCC",0xef,0xbb,0xbf);

		for($i=0; $i<=count($conteudoTabela); $i++)
		{
		    echo $tabela_excel[$i];
		}

	}



	function logout()
	{
		Session::init();
		Session::destroy();
		Controller::redirect(INDEX_LINK);
		exit();
	}


	function uploadResultadoCasd()
	{

		Session::init();
		if(!Session::get('logged_admin'))
		{
			Session::destroy();
			Controller::redirect(ADMIN_LOGIN_LINK);
		}

		if ($this->uploadFile('files/', 'resultadoVestibulinhoCasd.csv'))
		{
			# 1. Incluindo a biblioteca CSV
			require_once 'libs/ARQUIVOS/csv.class.php' ;

			# 2. Instanciando o Objeto de Manipulação de dados
			$csv = new \ARQUIVOS\Csv( 'files/resultadoVestibulinhoCasd.csv' );

			$csvResult = array();

			# 3. Obtendo os resultados
			foreach( $csv->ler() as $linha)
			   $csvResult[] =  $linha;

			$this->model->uploadCSVtoDBCasd($csvResult);
		}

		Controller::redirect(ADMIN_INDEX_LINK);

	}

	function sendallemail()
	{
		$conteudoTabela = $this->model->exportVestibulinhoCasd();
		foreach($conteudoTabela as $pessoa){
			Session::init();
			Session::set('token-vestibulinho', md5(uniqid(rand(), TRUE)));
			$token_vestibulinho = Session::get('token-vestibulinho');
			$msg = 'Mensagem enviada para '.$pessoa['nome'].' '.$pessoa['sobrenome'];
			$msg = $msg . "<br>" . 'Seu token é: ' . $token_vestibulinho;
			$this->sendMailConfirmation($pessoa['nome'].' '.$pessoa['sobrenome'],$pessoa['email'],$msg);
		}
	}

	function sendemail($EMAIL)
	{
		// $TOKEN = NULL;
		if(isset($_GET['token'])) {
			$TOKEN = $_GET['token'];
		}
		else {
			$TOKEN = md5(uniqid(rand(), TRUE));
		}
		$msg = 'Olá '.$_GET['nome'].' '.$_GET['sobrenome'].' , seu Token é: ' . $TOKEN;
		$this->sendMailConfirmation($_GET['nome'].' '.$_GET['sobrenome'],$EMAIL,$msg);
	}
}
?>
