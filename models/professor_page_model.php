<?php
require_once 'libs/bcrypt/bcrypt.php';

/**
* 
*/
class Professor_Page_Model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function profExists($prof)
	{
		try
		{
			$conection = Service::openDb();
			$stmt = $conection->prepare("SELECT id FROM user WHERE username = :name");
			$stmt->execute(array(':name' => $prof));

			$result = $stmt->fetch();


			$stmt = $conection->prepare("SELECT id FROM professores WHERE id_user = :id");
			$stmt->execute(array(':id' => $result['id']));

			$count = $stmt->rowCount();

			if($count == 1)
			{
				return true;
			}
			return false;
		}
		catch (PDOException $e)
		{
			$this->writeLog($e->getMessage());
			return false;
		}
        finally{
            Service::closeDb();
        }
	}

	public function login()
	{
		try {
            $connection = Service::openDb();
            $stmt = $connection->prepare("SELECT id, password FROM user WHERE username = :username AND role = :role");
            
            $stmt->execute(array(
            	':username' => $this->test_input_login($_POST['username']),
            	':role' => PROFESSOR)
            );

            $count = $stmt->rowCount();

            if($count == 1)
            {
            	$user = $stmt->fetch();

            	if(Bcrypt::check($this->test_input_login($_POST['password']), $user['password']))
				{
					return $user['id'];
				}
            }

            return false;

        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
	}

	public function getProfInfo($profName)
	{
		try {
            $connection = Service::openDb();
            $stmt = $connection->prepare("SELECT * FROM ".'professor_'.$profName);
            
            $stmt->execute(array());

            $result =  $stmt->fetchAll();

            $info = array();
            $materiais = array();
            $recados = array();

            foreach ($result as $line) {
            	if($line['tipo'] == 'material')
            	{
                    $materiais[$line['title']]['id'] = $line['id'];
					$materiais[$line['title']]['link'] = $line['content'];
					$materiais[$line['title']]['date'] = $line['data'];
            	}
            	if($line['tipo'] == 'recado')
            	{
                    $recados[$line['title']]['id'] = $line['id'];
            		$recados[$line['title']]['content'] = $line['content'];
					$recados[$line['title']]['date'] = $line['data'];
            	}
            	else
            	{
            		$info[$line['tipo']] = $line['title'];
            	}
            }
            $info['recados'] = $recados;
            $info['materiais'] = $materiais;

            return $info;


        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
    }



    public function updateDescription($profName)
    {
        try {
            $connection = Service::openDb();
            if(!empty($_POST["nome-completo"]))
            {
                $stmt = $connection->prepare("UPDATE ".'professor_'.$profName." SET title = :nomecompleto WHERE tipo = :tipo");
                
                $stmt->execute(array(
                    ':nomecompleto' => $this->test_input_login($_POST["nome-completo"]),
                    'tipo' => 'nome'
                    ));
            }
            
            if(!empty($_POST["apelido"]))
            {
                $stmt = $connection->prepare("UPDATE ".'professor_'.$profName." SET title = :apelido WHERE tipo = :tipo");
                
                $stmt->execute(array(
                    ':apelido' => $this->test_input_login($_POST["apelido"]),
                    'tipo' => 'apelido'
                    ));
            }

             if(!empty($_POST["apelido"]))
            {
                $stmt = $connection->prepare("UPDATE ".'professor_'.$profName." SET title = :apelido WHERE tipo = :tipo");
                
                $stmt->execute(array(
                    ':apelido' => $this->test_input_login($_POST["apelido"]),
                    'tipo' => 'apelido'
                    ));
            }

            if(!empty($_POST["descricao"]))
            {
                $stmt = $connection->prepare("UPDATE ".'professor_'.$profName." SET title = :descricao WHERE tipo = :tipo");
                
                $stmt->execute(array(
                    ':descricao' => $this->test_input_login($_POST["descricao"]),
                    'tipo' => 'descricao'
                    ));
            }
            

        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
    }

    public function submitRecado($profName)
    {
        try {
            
            $connection = Service::openDb();
            $stmt = $connection->prepare("INSERT INTO ".'professor_'.$profName." (tipo, title, content) VALUES (:tipo, :title, :content)");
            
            $stmt->execute(array(
                ':title' => $this->test_input_login($_POST["titulo"]),
                ':content' => $this->test_input_login($_POST["recado"]),
                'tipo' => 'recado'
                    ));
                     

        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
    }

    public function submitMaterial($profName, $fileName)
    {
        try {
            
            $connection = Service::openDb();
            $stmt = $connection->prepare("INSERT INTO ".'professor_'.$profName." (tipo, title, content) VALUES (:tipo, :title, :content)");
            
            $stmt->execute(array(
                ':title' => $this->test_input_login($_POST["titulo"]),
                ':content' => $this->test_input_login($fileName),
                'tipo' => 'material'
                    ));
                     

        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
    }

    public function checkPassword($professorId)
    {
        try {
            
            $connection = Service::openDb();
            $stmt = $connection->prepare("SELECT password FROM user WHERE role = :role AND id = :id");
            
            $stmt->execute(array(
                ':role' => PROFESSOR,
                ':id' => $professorId
                    ));

            $password = $stmt->fetch();

            if(Bcrypt::check($this->test_input_login($_POST['senha-antiga']), $password['password']))
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

    public function changePassword($professorId)
    {
        try {
            if($_POST['senha-nova'] == $_POST['senha-nova-2'])
            {
                $password = Bcrypt::hash($this->test_input_login($_POST['senha-nova']));
                
                $connection = Service::openDb();
                $stmt = $connection->prepare("UPDATE user SET password = :password WHERE role = :role AND id = :id");
                
                $stmt->execute(array(
                    ':password' => $password,
                    ':role' => PROFESSOR,
                    ':id' => $professorId
                        ));
            }

            return false;

        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
    }
}