<?php

	class Trabalho{
		
		private $db;
		private $id_autor;
		private $id_trabalho;
		private $titulo;
		private $autor;
		private $area;
		private $resumo;
		private $estado;
		private $revisor;

		
		public function __construct($db, $id_autor, $titulo, $autor, $area, $resumo, $estado, $revisor){
			$this->db= $db;
			$this->id_autor = $id_autor;
			$this->titulo = $titulo;
			$this->autor = $autor;
			$this->area = $area;
			$this->resumo = $resumo;
			$this->estado = $estado;
			$this->revisor = $revisor;

		}
		
		public function setIdAutor($id){
			$this->id_autor = $id;
		}
		
		public function getIdAutor(){
			return $this->id_autor;
		}
		
		public function setTitulo($titulo){
			$this->titulo = $titulo;
		}
	
		public function getTitulo(){
			return $this->titulo;
		}
		
		public function setAutor($trabalho){
			$this->trabalho = $trabalho;
		}
	
		public function getAutor(){
			return $this->trabalho;
		}
		
		public function setArea($area){
			$this->area = $area;
		}
	
		public function getArea(){
			return $this->area;
		}
		
		public function setResumo($resumo){
			$this->resumo = $resumo;
		}
		
		public function getResumo(){
			return $this->resumo;
		}
		
		public function setEstado($estado){
			$this->estado = $estado;
		}
		
		public function getEstado(){
			return $this->estado;
		}
		
		public function setRevisor($revisor){
			$this->revisor = $revisor;
		}
		
		public function getRevisor(){
			return $this->revisor;
		}
		
		
		public function insert(){
			try {
				$qr = $this->db->query("insert into trabalho (Id_Autor, Titulo, Autor, Area, Resumo, Estado, Revisor) values ('$this->id_autor', '$this->titulo', '$this->autor', '$this->area', '$this->resumo', '$this->estado', '$this->revisor')");
				header("location: trabalho.php");
			} catch (PDOException $exception) {
				echo "<script>alert('Erro ao enviar o trabalho! Tente novamente mais tarde.');"
				. "location.href='pagina.php';</script>";
				echo $exception->getMessage();
			}
		}
		
		
		public function getAll(){
			$qr = $this->db->query ("select * from trabalho");
			
			if($qr){
				$trabalhos = array();
				foreach($qr as $p){
					$t->setId($p['Id_Autor']);
					$t->setNome($p['Titulo']);
					$t->setAutor($p['Autor']);
					$t->setArea($p['Area']);
					$t->setResumo($p['Resumo']);
					$t->setEstado($p['Estado']);
					$trabalhos[] = $t;
				}
				return $trabalhos;
			}else{
				return "Nenhum trabalho cadastrado.";
			}
		}
		
		public function getById($id){
			$sql = $this->db->query ("select * from trabalho where Id_Trabalho= '$id'");
			
			try {
				$sql->execute();
				$res= $sql->fetch(PDO::FETCH_ASSOC);

			} catch(PDOException $e) {
				die($e->getMessage());
			}
			
	
			$this->id_autor = $res['Id_Autor'];
			$this->autor = $res['Autor'];
			$this->titulo = $res['Titulo'];
			$this->trabalho = $res['Autor'];
			$this->area = $res['Area'];
			$this->resumo = $res['Resumo'];
			$this->estado= $res['Estado'];
			$this->revisor= $res['Revisor'];
		}
		
		public function delete(){
			$sql = "delete from trabalho where Id_Trabalho = $this->id_trabalho";
			$query = $this->db->query ($sql);
			
			try {
				$query -> execute();
				$res= $query -> fetch();

			} catch(PDOException $e) {
				die($e -> getMessage());
			}
		}
		
		public function edit($id){
			$sql = "update trabalho set Id_Autor= :id_autor, Titulo = :titulo, Autor = :autor, Area = :area, Resumo = :resumo, Estado= :estado, Revisor= :revisor where Id_Trabalho= :id_trabalho";
			$query = $this->db->prepare($sql);
			
			$query->bindValue(":id_autor", $this->id_autor);
			$query->bindValue(":titulo", $this->titulo);
			$query->bindValue(":autor", $this->autor);
			$query->bindValue(":area", $this->area);
			$query->bindValue(":resumo", $this->resumo);
			$query->bindValue(":estado", $this->estado);
			$query->bindValue(":revisor", $this->revisor);
			$query->bindValue(":id_trabalho", $id);

			
			try {
				$query -> execute();
				
			} catch(PDOException $e) {
				die($e -> getMessage());
			}
		}
		
		
	}
?>