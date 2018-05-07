<?php


class Entrevista extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->view->controller = 'entrevista';
	}

	function index($id_user = false)
	{
		if($id_user === false)
		{
			Controller::redirect(INDEX_LINK);
		}


		Session::init();
		if(!Session::get('logged_user_entrevista') || Session::get('logged_user_id') != $id_user)
		{
			Session::destroy();
			Controller::redirect(ENTREVISTA_LOGIN_LINK.'/'.$id_user);
		}

		if (!Session::get('token-entrevista-index'))
		{    
			Session::set('token-entrevista-index', md5(uniqid(rand(), TRUE)));
		}

		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->model->saveEntrevista();
		}


		$this->view->id_user = $id_user;
		$this->view->controller = "entrevista";
		$this->view->render('entrevista/index');
	}

	function login($id_user = false)
	{
		if($id_user === false)
		{
			Controller::redirect(INDEX_LINK);
		}

		Session::init();

		if (Session::get('logged_user_entrevista'))
		{
			Controller::redirect(ENTREVISTA_INDEX_LINK.'/'.$id_user);
		}

		if (!Session::get('token-entrevista-login'))
		{    
			Session::set('token-entrevista-login', md5(uniqid(rand(), TRUE)));
		}

		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if($_POST['token-entrevista-login'] == Session::get('token-entrevista-login'))
			{
				$login = $this->model->login($id_user);
				if($login)
				{
					echo 'carai';
					Session::change_id();
					Session::set('logged_user_entrevista', true);
					Session::set('logged_user_id', $id_user);

					Controller::redirect(URL.'entrevista/index/'.$id_user);
				}
			}
		}

		$this->view->id_user = $id_user;
		$this->view->controller = 'entrevista-login';
		$this->view->render('entrevista/login');
	}

}