<?php 
	require __DIR__ . '/../db_conection.php';

	interface iUser{

		public function cadUser($nome, $idade, $email,$password);
		public function showUser();
		public function deleteUser($cliente);
		public function alterUser($id,$nome, $idade, $email);
		public function showEndUser();
		public function checkLogin($email, $senha);
		public function get_fullname($id_cliente);
		public function alterPassword($id,$senha);
	}

	class Monitoramento implements iUser{

		public $db;

		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if(mysqli_connect_errno()) {
				echo "Erro! Não foi possivel conectar ao banco de dados.";
			    exit;
			}
		}

		public function cadUser($nome, $idade, $email,$password){

        	$sql = "INSERT INTO cliente (nome, idade, email, senha) values('$nome', '$idade','$email','$password')";
        	$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Erro ao cadastrar !");
        	return $result;
		}

		public function showUser(){  
			$sql2 = "SELECT * FROM cliente";
			$result = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."");
			$result_list = $result->num_rows;
			if($result_list != 0){
				return $result;
			} else {
				return 0;
			}
		}

		public function deleteUser($cliente){
			$sql = "DELETE FROM cliente WHERE id_cliente='$cliente'";
			$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Erro ao excluir!");
			return $result;
		}

		public function alterUser($id,$nome, $idade, $email){
			$sql = "UPDATE cliente SET nome='$nome', idade='$idade', email='$email' WHERE id_cliente='$id'";
			$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Erro ao atualizar!");
			return $result;
		}

		public function showEndUser(){  
			$sql2 = "SELECT id_cliente FROM cliente ORDER BY id_cliente DESC limit 1;";
			$result = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."erro ao listar tabela");
			$result_list = $result->num_rows;
			if($result_list != 0){
				return $result;
			} else {
				return 0;
			}
		}

		public function checkLogin($email, $senha){
        	$sql="SELECT * from cliente WHERE email='$email' and senha='$senha';";
        	$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."erro ao verificar");;
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;

	        if ($count_row > 0) {
				$_SESSION['id'] = $user_data['id_cliente'];
	            return true;
	        }
	        else{
			    return false;
			}
		}

		public function get_fullname($id_cliente){
    		$sql3="SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(nome, ' ', 1), ' ', -1)  AS primeironome FROM cliente WHERE id_cliente='$id_cliente'";
	        $result = mysqli_query($this->db,$sql3);
	        $user_data = mysqli_fetch_array($result);
	        return $user_data['primeironome'];
		}

		public function alterPassword($id,$senha){
			$sql = "UPDATE cliente SET senha='$senha' WHERE id_cliente='$id'";
			$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Erro ao atualizar!");
			return $result;
		}
	}
?>