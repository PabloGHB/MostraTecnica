<?php

	class Autor{
		
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
		
		
		
		public function insert(){				
			$query = $this->db->prepare( "select Email from autor where email = ?" );
			$query->bindValue( 1, $this->email );
			$query->execute();

			if( $query->rowCount() > 0 ) {
				echo "<script>alert('Email cadastrado! Faça login.');"
				. "location.href='index.php';</script>";
			}
			else {
				try {
				$qr = $this->db->query ("insert into autor (Nome, Sobrenome, Email, Senha, Usuario) values ('$this->nome','$this->sobrenome', '$this->email', '$this->senha', '$this->usuario')");
				echo "<script>alert('Cadastro efetuado com sucesso!');"
				. "location.href='index.php';</script>";
			} catch (PDOException $exception) {
				echo "<script>alert('Erro ao efetuar o cadastro! Tente novamente mais tarde.');"
				. "location.href='cadastro.html';</script>";
				echo $exception->getMessage();
				}
			}
		}
		
		public function login($email, $senha){			
			$sql = "select Id_Autor from autor where Email = '$email' and Senha = '$senha'";
			$query= $this->db->query($sql);
			
			$res = $query->fetch(PDO::FETCH_ASSOC);
			$id= $res['Id_Autor'];
			
	
			if($id){
				$this->getById($id);

				session_start();
				$_SESSION['id_autor'] = $this->id;
				$_SESSION['autor'] = "logado";
				header("location: trabalho.php");
			}else{
				echo "<meta charset='UTF-8'/><script>alert('Credenciais inválidas!');"
				. "location.href='index.php';</script>";

			}
		}
		

		public function getAll(){
			$qr = $this->db->query ("select * from autor");
			
			if($qr){
				$autores = array();
				foreach($qr as $p){
					$a = new Autor();
					$a->setId($p['Id_Autor']);
					$a->setNome($p['Nome']);
					$a->setSobrenome($p['Sobrenome']);
					$a->setEmail($p['Email']);
					$a->setSenha($p['Senha']);
					$autores[] = $a;
				}
				return $autores;
			}else{
				echo "<meta charset='UTF-8'/><script>alert('Nenhum autor cadastrado!');"
				. "location.href='index.php';</script>";
			}
		}
		
		public function getById($id){
			$sql = $this->db->query ("select * from autor where Id_Autor= '$id'");
			
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
	}
?>