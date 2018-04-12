<?php

class Controller
{
	
	function __construct()
	{
		$this->view = new View();
        $this->controller = strtolower(get_class($this));

        $this->loadModel($this->controller);
	}

	protected  function loadModel($name)
	{
		$path = 'models/'.$name.'_model.php';

		if(file_exists($path))
		{
			require $path;

			$modelName = $name.'_Model';
			$this->model = new $modelName();
		}
	}

    public function sendMailContact()
    {
        require_once 'models/mail.php';
        $email = new MailModel();
        
        $emailBody = 'Mensagem enviada por: '.$this->test_input($_POST['nome']).' - '.$this->test_input($_POST['email']).'<br/><br/>'.$this->test_input($_POST['mensagem']);
        $email->setSubject('Mensagem de Contato do Site');
        $email->setTo(array(EMAIL_MKT => 'Marketing'));
        $email->setText($emailBody);
        $email->setHtml($emailBody);
        $email->send();

        $email->registerMailContact($this->test_input($_POST['nome']), $this->test_input($_POST['email']), $this->test_input($_POST['mensagem']));
    }

    
    protected function redirect ($location) {
        header('Location: '.$location);
        exit;
    }

    protected function ifSignedInGoHome(){
    	Session::init();
        if(Session::get('loggedIn') == true){
            Controller::redirect(DASHBOARD_LINK);
        }
    }

    protected function ifNotSignedInGoSignIn(){
    	Session::init();
        if(Session::get('loggedIn')==false){
        	Session::destroy();
            Controller::redirect(LOGIN_LINK);
        }
    }

    protected function tirarAcentos($string){

    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }

    protected function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    protected function getFilesFromFolder($folder_name)
    {
        $resposta = array();
        foreach (new DirectoryIterator($folder_name) as $file) {
          if ($file->isFile()) {
              $resposta[] = $file->getFilename();
          }
        }
        return $resposta;
    }

    protected function downloadFile($file_name, $path = '')
    {
        $file_name = $this->test_input(trim($file_name, "\.\./"));

        $path .= ($path)? '/' : '';
        $filename = DOCUMENT_ROOT.'files/'.$path.$file_name;

        $fileinfo = pathinfo($filename);
        $sendname = $fileinfo['filename'] . '.' . $fileinfo['extension'];

        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=\"$sendname\"");
        header('Content-Length: ' . filesize($filename));
        readfile($filename);

    }

    protected function uploadfile($pasta, $nome)
    {
        $uploaddir = DOCUMENT_ROOT.$pasta;
        $uploadfile = $uploaddir.$nome;
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile))
        {   
            return true;
        }
        return false;
    }

    protected function saveImageUpload($filePostName = '', $directory = '', $renameTo, $resize, $resizeTo = 0, $cropData){
        require_once 'libs/upload/class.upload.php';


        $foo = new Upload($_FILES[$filePostName]); 
        if ($foo->uploaded) {

            $top = $cropData['y'];
            $right = $foo->image_src_x - $cropData['x'] - $cropData['width'];
            $bottom = $foo->image_src_y - $cropData['y'] - $cropData['height'];
            $left = $cropData['x'];

            $foo->file_new_name_body = $renameTo;
            $foo->image_resize = $resize;
            $foo->image_convert = 'jpg';
            $foo->image_x = $resizeTo;
            $foo->image_ratio_y = true;
            $foo->image_precrop = array($top, $right, $bottom, $left);
            $foo->file_overwrite = true;
            $foo->Process($directory);

            if ($foo->processed) {
                return true;
                $foo->Clean();
            } else {
                return false;
            } 
        }else{
            return false;
        }
    }
}

?>