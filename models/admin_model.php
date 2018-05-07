<?php

require_once 'libs/bcrypt/bcrypt.php';

class Admin_Model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		try {
            $connection = Service::openDb();
            $stmt = $connection->prepare("SELECT id, password FROM user WHERE username = :username AND role = :role");
            
            $stmt->execute(array(
            	':username' => $this->test_input_login($_POST['username']),
                ':role' =>ADMIN)
            );

            $count = $stmt->rowCount();

            if($count == 1)
            {
            	$user = $stmt->fetch();

            	if(Bcrypt::check($this->test_input_login($_POST['password']), $user['password']))
				{
					return true;
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

	public function getVestibulinhoVariables()
	{
		try {
            $connection = Service::openDb();
            $stmt = $connection->prepare("SELECT nome, status FROM vestibulinho_variables");
            
            $stmt->execute(array());

            $array = $stmt->fetchAll();

            $resultado=array();

            foreach ($array as $value) {
            	$resultado[$value['nome']] = $value['status'];
            }

            return $resultado;


        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
	}

	public function vestibulinhoCasd($status)
	{
		try {
            $connection = Service::openDb();
            if($status)
            {
                $sth = $connection->prepare("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '".DB_NAME."' AND table_name = 'vestibulinho_casd_".strval(date('Y')+1)."';");
                $sth->execute();

                if(!$sth->fetchColumn())
                {
                    $sth1 = $connection->prepare("CREATE TABLE vestibulinho_casd_".strval(date('Y')+1)." SELECT * FROM vestibulinho_casd_2018 WHERE 1=0; ALTER TABLE `vestibulinho_casd_".strval(date('Y')+1)."`  ADD PRIMARY KEY (`id`); ALTER TABLE `vestibulinho_casd_".strval(date('Y')+1)."`  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170497;");
                    $sth1->execute();

                    $sth2 = $connection->prepare("ALTER TABLE `vestibulinho_casd_".strval(date('Y')+1)."`  ADD PRIMARY KEY (`id`);");

                    $sth2->execute();

                    $sth3 = $connection->prepare("ALTER TABLE `vestibulinho_casd_".strval(date('Y')+1)."`  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170497;");

                    $sth3->execute();
                }
            }

            $stmt = $connection->prepare("UPDATE vestibulinho_variables SET status = :status, last_change = CURRENT_TIMESTAMP WHERE nome = 'status_vestibulinho_casd'");
            
            $stmt->execute(array(
            	':status' => $status
            	));

            if($status)
            {
                $stmt1 = $connection->prepare("UPDATE vestibulinho_variables SET last_change = :data WHERE nome = 'data_vestibulinho_casd'");
                
                $stmt1->execute(array(
                    ':data' => date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $_POST['date_vestibulinho_casd'])))
                    ));

                $stmt2 = $connection->prepare("UPDATE vestibulinho_variables SET status = :local WHERE nome = 'local_vestibulinho_casd'");
                
                $stmt2->execute(array(
                    ':local' => $_POST['local_vestibulinho_casd']
                    ));

                $stmt3 = $connection->prepare("UPDATE vestibulinho_variables SET last_change = :data WHERE nome = 'termino_vestibulinho_casd'");
                
                $stmt3->execute(array(
                    ':data' => date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $_POST['termino_vestibulinho_casd'])))
                    ));
            }

            return true;


        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
	}

	public function consultaCasd($status)
	{
		try {
            $connection = Service::openDb();
            $stmt = $connection->prepare("UPDATE vestibulinho_variables SET status = :status, last_change = CURRENT_TIMESTAMP WHERE nome = 'consulta_vestibulinho_casd'");
            
            $stmt->execute(array(
            	':status' => $status
            	));

            return true;


        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
	}

	public function vestibulinhoCasdinho($status)
    {
        try {
            $connection = Service::openDb();
            if($status)
            {
                $sth = $connection->prepare("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '".DB_NAME."' AND table_name = 'vestibulinho_casdinho_".strval(date('Y')+1)."';");
                $sth->execute();

                if(!$sth->fetchColumn())
                {
                    $sth1 = $connection->prepare("CREATE TABLE vestibulinho_casdinho_".strval(date('Y')+1)." SELECT * FROM vestibulinho_casdinho_2018 WHERE 1=0;");
                    $sth1->execute();

                    $sth2 = $connection->prepare("ALTER TABLE `vestibulinho_casdinho_".strval(date('Y')+1)."`  ADD PRIMARY KEY (`id`);");

                    $sth2->execute();

                    $sth3 = $connection->prepare("ALTER TABLE `vestibulinho_casdinho_".strval(date('Y')+1)."`  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170497;");

                    $sth3->execute();
                }
            }

            $stmt = $connection->prepare("UPDATE vestibulinho_variables SET status = :status, last_change = CURRENT_TIMESTAMP WHERE nome = 'status_vestibulinho_casdinho'");
            
            $stmt->execute(array(
                ':status' => $status
                ));

            if($status)
            {
                $stmt1 = $connection->prepare("UPDATE vestibulinho_variables SET last_change = :data WHERE nome = 'data_vestibulinho_casdinho'");
                
                $stmt1->execute(array(
                    ':data' => date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $_POST['date_vestibulinho_casdinho'])))
                    ));

                $stmt2 = $connection->prepare("UPDATE vestibulinho_variables SET status = :local WHERE nome = 'local_vestibulinho_casdinho'");
                
                $stmt2->execute(array(
                    ':local' => $_POST['local_vestibulinho_casdinho']
                    ));

                $stmt3 = $connection->prepare("UPDATE vestibulinho_variables SET last_change = :data WHERE nome = 'termino_vestibulinho_casdinho'");
                
                $stmt3->execute(array(
                    ':data' => date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $_POST['termino_vestibulinho_casdinho'])))
                    ));
            }

            return true;


        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
    }

	public function consultaCasdinho($status)
	{
		try {
            $connection = Service::openDb();
            $stmt = $connection->prepare("UPDATE vestibulinho_variables SET status = :status, last_change = CURRENT_TIMESTAMP WHERE nome = 'consulta_vestibulinho_casdinho'");
            
            $stmt->execute(array(
            	':status' => $status
            	));

            return true;


        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
	}

    public function exportVestibulinhoCasd()
    {
        try {
            $connection = Service::openDb();
            $stmt = $connection->prepare("SELECT * FROM vestibulinho_casd_".strval(date('Y')+1));
            
            $stmt->execute();

            $resultado = $stmt->fetchAll();

            return $resultado;


        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
    }

    public function exportVestibulinhoCasdinho()
    {
        try {
            $connection = Service::openDb();
            $stmt = $connection->prepare("SELECT * FROM vestibulinho_casdinho_".strval(date('Y')+1));
            
            $stmt->execute();

            $resultado = $stmt->fetchAll();

            return $resultado;


        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
    }

    public function deletarInscricoesRepetidas($inscricoes)
    {
        $cpf_array = array();
        $resposta =  array();
        foreach (array_reverse($inscricoes) as $inscricao) {
            if(!in_array($inscricao['CPF'], $cpf_array))
            {
                $cpf_array[] = $inscricao['CPF'];
                $resposta[] = $inscricao;
            }
        }
        return array_reverse($resposta);
    }

    public function saveResultadoVestibulinhoCasd($excelSheet)
    {
        try {
            $connection = Service::openDb();

            foreach ($excelSheet[0]['cells'] as $value) {
                $stmt = $connection->prepare("UPDATE vestibulinho_casdinho_".strval(date('Y')+1).' SET nota_vestibulinho = :nota_vestibulinho WHERE id = :id');
            
                $stmt->execute(array(':nota_vestibulinho' => $value[2],
                    ':id' => $value[1]-17041997));
            }
            
            return true;


        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
    }

    public function uploadCSVtoDBCasd($csvResult)
    {
        try {
            $connection = Service::openDb();

            foreach ($csvResult as $linha) {
                $stmt = $connection->prepare("UPDATE vestibulinho_casd_".strval(date('Y')+1).' SET nota_vestibulinho = :nota_vestibulinho WHERE id = :id');
            
                $stmt->execute(array(':nota_vestibulinho' => $linha['nota'], ':id' => $linha['id']-17041997));
            }
            
            return true;


        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
    }
    
    public function getProfInfo()
    {
        try {
            $connection = Service::openDb();

            $stmt = $connection->prepare("SELECT id, nome, username FROM user WHERE role = :role");
            $stmt->execute(array(
                ':role' => PROFESSOR
                ));
            $result = $stmt->fetchAll();

            $profArray = array();
            foreach ($result as $value) {
                $profArray[$value['id']] = array('name' => $value['nome'], 'username' => $value['username']);
            }


            $stmt = $connection->prepare("SELECT id_materia, id_user FROM professores");
            $stmt->execute();
            $relationArray = $stmt->fetchAll();



            $stmt = $connection->prepare("SELECT id, name, curso FROM materia");
            $stmt->execute();
            $result = $stmt->fetchAll();

            $materiaArray = array();
            foreach ($result as $value) {
                $materiaArray[$value['id']] = array('name' => $value['name'], 'curso' => $value['curso']);
            }
            

            $resultArray = array();
            foreach ($relationArray as $value) {
                $resultArray[] = array('name' => $profArray[$value['id_user']]['name'],
                    'username' => $profArray[$value['id_user']]['username'],
                    'materia' => $materiaArray[$value['id_materia']]['name'],
                    'curso' => $materiaArray[$value['id_materia']]['curso']
                    );
            }

            

            return $resultArray;


        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
    }

    public function getMaterias()
    {
        try {
            $connection = Service::openDb();

            $stmt = $connection->prepare("SELECT id, name, curso FROM materia");
            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;

        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
    }

    public function addProf()
    {
         try {
            $connection = Service::openDb();

            if($_POST['senha'] == $_POST['senha-2'])
            {
                $password = Bcrypt::hash($this->test_input_login($_POST['senha']));
            }

            $stmt = $connection->prepare("INSERT INTO user (nome, username, password, role) VALUES (:nome, :username, :password, :role)");
            $stmt->execute(array(
                ':nome' => $this->test_input_login($_POST['nome']),
                ':username' => $this->test_input_login($_POST['username']),
                ':password' => $password,
                ':role' => PROFESSOR
                ));

            $id_user = $connection->lastInsertId();

            $stmt = $connection->prepare("INSERT INTO professores (id_user, id_materia) VALUES (:id_user, :id_materia)");
            $stmt->execute(array(
                ':id_user' => $id_user,
                ':id_materia' => $this->test_input_login($_POST['materia'])
                ));

            $stmt = $connection->prepare("CREATE TABLE `professor_".$this->test_input_login($_POST['username'])."` (
                                        `id` int(11) NOT NULL,
                                        `tipo` varchar(20) NOT NULL,
                                        `title` text NOT NULL,
                                        `content` text,
                                        `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP
                                        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
                                        ALTER TABLE `professor_".$this->test_input_login($_POST['username'])."`
                                        ADD PRIMARY KEY (`id`);
                                        ALTER TABLE `professor_".$this->test_input_login($_POST['username'])."`
                                        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
            $stmt->execute();



            $stmt = $connection->prepare("INSERT INTO professor_".$this->test_input_login($_POST['username'])." (tipo, title, content, data) VALUES 
                                           ('nome', :nome, NULL, NULL),
                                           ('apelido', :apelido, NULL, NULL), 
                                           ('descricao', :descricao, NULL, NULL)");

            $stmt->execute(array(
                    ':nome' => $this->test_input_login($_POST['nome']),
                    ':apelido' => $this->test_input_login($_POST['nome']),
                    ':descricao' => 'Uma descrição do professor.'
                ));

            copy(DOCUMENT_ROOT.'images/professor_pic/default.jpg', DOCUMENT_ROOT.'images/professor_pic/'.$this->test_input_login($_POST['username']).'.jpg');

            mkdir(DOCUMENT_ROOT.'files/arquivos_professores/'.$this->test_input_login($_POST['username']), 0666);

            return true;

        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
    }

}

?>