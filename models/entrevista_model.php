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
            $stmt = $connection->prepare("SELECT id FROM vestibulinho_casd_".strval(date('Y')+1)." WHERE cpf = :cpf AND nascimento = :nascimento AND id = :id");
            
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
            $stmt = $connection->prepare("INSERT INTO entrevista_casd_".strval(date('Y')+1)." (`id_user`, `numero_pessoas`, `iptu`, `veiculos`, `holerites_1`, `holerites_2`, `holerites_3`, `aposentadorias`, `auxilios`, `renda_bruta`, `rbpc`, `agua_1`, `agua_2`, `agua_3`, `luz_1`, `luz_2`, `luz_3`, `net_1`, `net_2`, `net_3`, `aluguel`, `outros_gastos`, `gastos_totais`, `renda_liq`, `rlpc`, `obs`) VALUES (:id_user, :numero_pessoas, :iptu, :veiculos, :holerites_1, :holerites_2, :holerites_3, :aposentadorias, :auxilios, :renda_bruta, :rbpc, :agua_1, :agua_2, :agua_3, :luz_1, :luz_2, :luz_3, :net_1, :net_2, :net_3, :aluguel, :outros_gastos, :gastos_totais, :renda_liq, :rlpc, :obs)");
            
            $stmt->execute(array(
            	':id_user' => Session::get('logged_user_id'),
                ':numero_pessoas' => $this->test_input_login($_POST['numero_pessoas']),
                ':iptu' => $this->test_input_login($_POST['iptu']),
                ':veiculos' => $this->test_input_login($_POST['veiculos']),
                ':holerites_1' => $this->test_input_login($_POST['holerites_1']),
                ':holerites_2' => $this->test_input_login($_POST['holerites_2']),
                ':holerites_3' => $this->test_input_login($_POST['holerites_3']),
                ':aposentadorias' => $this->test_input_login($_POST['aposentadorias']),
                ':auxilios' => $this->test_input_login($_POST['auxilios']),
                ':renda_bruta' =>0,
                ':rbpc' => 0,
                ':agua_1' => $this->test_input_login($_POST['agua_1']),
                ':agua_2' => $this->test_input_login($_POST['agua_2']),
                ':agua_3' => $this->test_input_login($_POST['agua_3']),
                ':luz_1' => $this->test_input_login($_POST['luz_1']),
                ':luz_2' => $this->test_input_login($_POST['luz_2']),
                ':luz_3' => $this->test_input_login($_POST['luz_3']),
                ':net_1' => $this->test_input_login($_POST['net_1']),
                ':net_2' => $this->test_input_login($_POST['net_2']),
                ':net_3' => $this->test_input_login($_POST['net_3']),
                ':aluguel' => $this->test_input_login($_POST['aluguel']),
                ':outros_gastos' => $this->test_input_login($_POST['outros_gastos']),
                ':gastos_totais' => 0,
                ':renda_liq' => 0,
                ':rlpc' => 0,
                ':obs' => $this->test_input_login($_POST['obs'])
            ));

            return true;
        } catch (PDOException $e) {
            $this->writeLog($e->getMessage());
            return false;
        } finally{
            Service::closeDb();
        }		
	}
}