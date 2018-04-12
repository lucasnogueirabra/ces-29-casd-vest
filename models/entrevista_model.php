<?php


/**
* 
*/
class Entrevista_Model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function login($id_user)
	{
		try {
            $connection = Service::openDb();
            $stmt = $connection->prepare("SELECT id FROM vestibulinho_casd_2019 WHERE cpf = :cpf AND nascimento = :nascimento AND id = :id");
            
            $stmt->execute(array(
            	':cpf' => $this->test_input_login($_POST['cpf']),
                ':nascimento' => $this->test_input_login($_POST['nascimento']),
            	':id' => $this->test_input_login($id_user))
            );

            $count = $stmt->rowCount();

            if($count == 1)
            {
            	return true;
            }

            return false;


        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
	}

	public function saveEntrevista()
	{
		try {
            $connection = Service::openDb();
            $stmt = $connection->prepare("INSERT INTO entrevista_casd_2019 (id_user, info_1, info_2) VALUES (:id_user, :info_1, :info_2)");
            
            $stmt->execute(array(
            	':id_user' => Session::get('logged_user_id'),
                ':info_1' => $this->test_input_login($_POST['info_1']),
            	':info_2' => $this->test_input_login($_POST['info_2']))
            );

            
        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }		
	}
}