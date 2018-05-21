<?php


/**
* 
*/
class Professor extends Controller
{
	private $professorName;

	function __construct()
	{
		parent::__construct();
		$this->view->controller = "professor";
	}

	function index()
	{
		$this->view->profByMateria = $this->model->getProfByMateria();
		$this->view->render('professor/index');
	}
}