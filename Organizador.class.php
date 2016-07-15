<?php

	class Organizador{
		
		private $id;
		private $db;
		private $nome;
		private $sobrenome;
		private $email;
		private $senha;
		private $usuario;

		public function __construct(PDO $db, $nome, $sobrenome, $email, $senha, $usuario){
			$this->db = $db;
			$this->nome = $nome;
			$this->sobrenome = $sobrenome;
			$this->email = $email;
			$this->senha = $senha;
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
		
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		
		public function getUsuario(){
			return $this->usuario;
		}
		
		
		
		public function login($email, $senha){			
			$sql = "select Id_Organizador from organizador where Email = '$email' and Senha = '$senha'";
			$query= $this->db->query($sql);
			
			$resultado = $query->fetch(PDO::FETCH_ASSOC);
			$id= $resultado['Id_Organizador'];
			
			if($id){
				$this->getById($id);

				session_start();
				$_SESSION['id_organizador'] = $this->id;
				$_SESSION['nome'] = $this->nome;
				$_SESSION['organizador'] = "logado";
				header("location: organizacao.php");
			}else{
				echo "<meta charset='UTF-8'/><script>alert('Credenciais inválidas!');"
				. "location.href='index.php';</script>";

			}
		}

		public function getAll(){
			$qr = $this->db->query ("select * from organizador");
			
			if($qr){
				$organizadores = array();
				foreach($qr as $p){
					$a = new Organizador();
					$a->setId($p['Id_Organizador']);
					$a->setNome($p['Nome']);
					$a->setSobrenome($p['Sobrenome']);
					$a->setEmail($p['Email']);
					$a->setSenha($p['Senha']);
					$organizadores[] = $a;
				}
				return $organizadores;
			}else{
				echo "<meta charset='UTF-8'/><script>alert('Nenhum organizador cadastrado!');"
				. "location.href='index.php';</script>";
			}
		}
		
		public function getById($id){
			$sql = $this->db->prepare ("select * from organizador where Id_Organizador= '$id'");
			
			try {
				$sql->execute();
				$res= $sql->fetch(PDO::FETCH_ASSOC);

			} catch(PDOException $e) {
				die($e->getMessage());
			}
			
			$this->id = $res['Id_Autor'];
			$this->titulo = $res['Titulo'];
			$this->trabalho = $res['Autor'];
			$this->area = $res['Area'];
			$this->resumo = $res['Resumo'];
			$this->estado= $res['Estado'];
			$this->revisor= $res['Revisor'];

			
			/*echo 'Esse é o id:' . $this->id;
			echo 'Esse é o nome:' . $this->nome;
			
			echo 'Esse é o id:' . $this->getId();
			echo 'Esse é o nome:' . $this->getNome(); */
		}
		
		public function delete(){
			$bd = new MySQL();
			$sql = "delete from organizador where Id_Organizador = $this->id";
			$bd->executa($sql);
		}
		
		public function edit(){
			$bd = new MySQL();
			$sql = "update organizador set Id_Organizador = $this->id, Nome = $this->nome, Sobrenome = $this->sobrenome, Email = $this->email, where Senha = $this->senha,";
			$bd->executa($sql);
		}
		
		
	}
?>