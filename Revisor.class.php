<?php

	class Revisor{
		
		private $id;
		private $db;
		private $nome;
		private $sobrenome;
		private $email;
		private $senha;
		private $id_area;
		private $usuario;

		public function __construct(PDO $db, $nome, $sobrenome, $email, $senha, $id_area, $usuario){
			$this->db = $db;
			$this->nome = $nome;
			$this->sobrenome = $sobrenome;
			$this->email = $email;
			$this->senha = $senha;
			$this->id_area = $id_area;
			$this->usuario = $usuario;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
	
		public function getNome(){
			return $this->nome;
		}
		
		public function setSobrenome($sobrenome){
			$this->sobrenome = $sobrenome;
		}
	
		public function getSobrenome(){
			return $this->sobrenome;
		}
		
		public function setEmail($email){
			$this->email = $email;
		}
	
		public function getEmail(){
			return $this->email;
		}
		
		
		public function setSenha($senha){
			$this->senha = $senha;
		}
		
		public function getSenha(){
			return $this->senha;
		}
		
		public function setIdArea($area){
			$this->area = $area;
		}
		
		public function getArea(){
			return $this->area;
		}
		
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		
		public function getUsuario(){
			return $this->usuario;
		}
		
		
		public function login($email, $senha){			
			$sql = "select Id_Revisor from revisor where Email = '$email' and Senha = '$senha'";
			$query= $this->db->query($sql);
			
			$resultado = $query->fetch(PDO::FETCH_ASSOC);
			$id= $resultado['Id_Revisor'];
			
			if($id){
				$this->getById($id);

				session_start();
				$_SESSION['id_revisor'] = $this->id;
				$_SESSION['revisor'] = "logado";
				header("location: revisao.php");
			}else{
				echo "<meta charset='UTF-8'/><script>alert('Credenciais inválidas!');"
				. "location.href='index.php';</script>";

			}
		}
		

		public function getAll(){
			$qr = $this->db->query ("select * from revisor");
			
			if($qr){
				$revisores = array();
				foreach($qr as $p){
					$a = new Revisor();
					$a->setId($p['Id_Autor']);
					$a->setNome($p['Nome']);
					$a->setSobrenome($p['Sobrenome']);
					$a->setEmail($p['Email']);
					$a->setSenha($p['Senha']);
					$revisores[] = $a;
				}
				return $revisores;
			}else{
				echo "<meta charset='UTF-8'/><script>alert('Nenhum revisor cadastrado!');"
				. "location.href='index.php';</script>";
			}
		}
		
		public function getById($id){
			$sql = $this->db->query ("select * from revisor where Id_Revisor= '$id'");
			
			try {
				$sql->execute();
				$res= $sql->fetch(PDO::FETCH_ASSOC);

			} catch(PDOException $e) {
				die($e->getMessage());
			}
			
	
			$this->id = $res['Id_Revisor'];
			$this->nome = $res['Nome'];
			$this->sobrenome = $res['Sobrenome'];
			$this->email = $res['Email'];
			$this->senha = $res['Senha'];
			$this->id_area= $res['Id_Area'];
			$this->usuario = $res['Usuario'];

			
			/*echo 'Esse é o id:' . $this->id;
			echo 'Esse é o nome:' . $this->nome;
			
			echo 'Esse é o id:' . $this->getId();
			echo 'Esse é o nome:' . $this->getNome(); */
		}
	}
?>