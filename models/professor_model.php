<?php


/**
* 
*/
class Professor_Model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getProfByMateria()
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
                $materiaArray[$value['id']] = array('materia' => $value['name'].(($value['curso']==CASD)?" - CASD Vest":" - Casdinho"), 
                									'professores' => array());
            }
            

            foreach ($relationArray as $value) {
                $materiaArray[$value['id_materia']]['professores'][] = $profArray[$value['id_user']];
            }

            

            return $materiaArray;


        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }
    }
}