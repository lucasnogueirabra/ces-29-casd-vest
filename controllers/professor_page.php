<?php

/**
* 
*/
class Professor_Page extends Controller
{
	private $professorName;
	
	function __construct($name = false)
	{
		parent::__construct();
		if($name === false)
		{
			Controller::redirect(PROFESSOR_LINK);
		}
		if($name !== false)
		{
			if($this->model->profExists($name) === true)
			{
				$this->professorName = $name;
			}
			else
			{
				Controller::redirect(PROFESSOR_LINK);
			}
		}
		$this->view->professorName = $this->professorName;
	}

	function index()
	{
		$this->view->controller = "professor-page";
		$this->view->info = $this->model->getProfInfo($this->professorName);
		$this->view->render('professor/professor_page');
	}

	function login()
	{
		Session::init();

		if (Session::get('logged-professor') === true && Session::get('logged-professor-name') == $this->professorName)
		{
			Controller::redirect(URL.'~'.$this->professorName.'/dashboard');
		}

		if(Session::get('logged-professor') === true && Session::get('logged-professor-name') != $this->professorName)
		{
			$this->logout();
		}

		if (!Session::get('token-prof-login'))
		{    
			Session::set('token-prof-login', md5(uniqid(rand(), TRUE)));
		}

		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if($_POST['token-prof-login'] == Session::get('token-prof-login'))
			{
				if($_POST['username'] == $this->professorName)
				{
					$login_id = $this->model->login();		

					if($login_id)
					{
						Session::change_id();
						Session::set('logged-professor', true);
						Session::set('logged-professor-name', $this->professorName);
						Session::set('logged-professor-id', $login_id);

						Controller::redirect(URL.'~'.$this->professorName.'/dashboard');

					}
				}
			}
		}

		$this->view->controller = 'professor-login';
		$this->view->render('professor/login', true);
	}

	function dashboard()
	{
		//Authentication
		Session::init();

		if (Session::get('logged-professor') === false || Session::get('logged-professor-name') != $this->professorName)
		{
			$this->logout();
		}

		//Form handling
		if(isset($_POST['photo-submitted'])){


            $cropData = array('x' => $_POST['xCanvas'], 'y' => $_POST['yCanvas'], 'height' => $_POST['heightCanvas'], 'width' => $_POST['widthCanvas']);

            $this->array['pictureAdded'] = isset($_FILES['picture']);


            if($this->array['pictureAdded']){


                $this->array['successful'] = $this->saveImageUpload('picture', 'images/professor_pic',$this->professorName, true, 800, $cropData);

                header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
				header("Cache-Control: post-check=0, pre-check=0", false);
				header("Pragma: no-cache");

            }else{
                $this->array['successful'] = false;
            }
        }

        if(isset($_POST['description-submitted'])){
        	$this->model->updateDescription($this->professorName);
        }

        if(isset($_POST['recado-submitted'])){
        	$this->model->submitRecado($this->professorName);
        }

        if(isset($_POST['material-submitted'])){
        	$filename = str_replace(' ', '_', $_FILES['arquivo']['name']);
        	$filename = str_replace('/', '_', $filename);
        	$filename = str_replace('ç', 'c', $filename);
        	$filename = $this->tirarAcentos($filename);
        	if($this->uploadFile('files/arquivos_professores/'.$this->professorName.'/', $filename))
        	{
        		$this->model->submitMaterial($this->professorName, $filename);
        	}
        	else
        	{
        		$this->view->falhaArquivo = true;
        	}
        }

        if(isset($_POST['senha-submitted']))
        {
        	if($this->model->checkPassword(Session::get('logged-professor-id')))
        	{
        		if(!$this->model->changePassword(Session::get('logged-professor-id')))
        		{
        			$this->view->messagePassword = "Ocorreu um erro com a mudança de senha! Tente Novamente!";
        		}

        	}
        	else
        	{
        		$this->view->messagePassword  = "A senha informada não corresponde com a senha atual!";
        	}
        }


		$this->view->info = $this->model->getProfInfo($this->professorName);
		//Render
		$this->view->controller = "professor-admin";

		$this->view->render('professor/dashboard', false, true);
	}

	function downloadMaterial($filename)
	{
		$this->downloadFile(ltrim($filename, '\.\./'), 'arquivos_professores/'.$this->professorName);
	}

	function logout()
	{
		Session::init();
		Session::destroy();
		Controller::redirect(URL.'~'.$this->professorName.'/login');
		exit();
	}
}