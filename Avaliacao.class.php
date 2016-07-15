<?php

	class Avaliacao{
		
		private $db;
		private $id_trabalho;
		private $id_revisor;
		private $id_avaliacao;
		private $nota_1;
		private $nota_2;
		private $nota_3;
		private $nota_final;

		
		public function __construct($db, $id_trabalho, $id_revisor, $nota_1, $nota_2, $nota_3, $nota_final){
			$this->db= $db;
			$this->id_trabalho= $id_trabalho;
			$this->id_revisor = $id_revisor;
			$this->nota_1 = $nota_1;
			$this->nota_2 = $nota_2;
			$this->nota_3 = $nota_3;
			$this->nota_final = $nota_final;
		}
					
		public function setIdTrabalho($id){
			$this->id_trabalho = $id;
		}
		
		public function getIdTrabalho(){
			return $this->id_trabalho;
		}
		
		
		public function setIdRevisor($id){
			$this->id_revisor = $id;
		}
		
		public function getIdRevisor(){
			return $this->id_revisor;
		}
		
		public function setNota1($nota_1){
			$this->nota_1 = $nota_1;
		}
	
		public function getNota1(){
			return $this->nota_1;
		}
		
		public function setNota2($nota_2){
			$this->nota_2 = $nota_2;
		}
	
		public function getNota2(){
			return $this->nota_2;
		}
		
		public function setNota3($nota_3){
			$this->nota_3 = $nota_3;
		}
	
		public function getNota3(){
			return $this->nota_3;
		}
		
		public function setNotaFinal($nota_final){
			$this->nota_final = $nota_final;
		}
	
		public function getNotaFinal(){
			return $this->nota_final;
		}
		
		public function insert(){
			$sql= "insert into avaliacao (Id_Trabalho, Id_Revisor, Nota_1, Nota_2, Nota_3, Nota_Final) values ('$this->id_trabalho', '$this->id_revisor', '$this->nota_1', '$this->nota_2', '$this->nota_3', '$this->nota_final')";
			
			try {
				$qr = $this->db->query($sql);
		
			} catch (PDOException $exception) {
				echo "<script>alert('Erro ao enviar a avalição! Tente novamente mais tarde.');"
				. "location.href='revisao.php';</script>";
				echo $exception->getMessage();
			}
		}
		
		public function getAll(){
			$qr = $this->db->query ("select * from avaliacao");
			
			if($qr){
				$avaliacoes = array();
				foreach($qr as $p){
					$t->setIdTrabalho($p['Id_Trabalho']);
					$t->setIdRevisor($p['Id_Revisor']);
					$t->setNota1($p['Nota_1']);
					$t->setNota2($p['Nota_2']);
					$t->setNota3($p['Nota_3']);
					$t->setNotaFinal($p['Nota_Final']);
					$avaliacoes[] = $t;
				}
				return $avaliacoes;
			}else{
				return "Nenhum avaliação cadastrada.";
			}
		}
		
		public function getById($id){
			$sql = $this->db->query ("select * from avaliacao where Id_Avalicao= '$this->id_avaliacao'");
			
			try {
				$sql->execute();
				$res= $sql->fetch(PDO::FETCH_ASSOC);

			} catch(PDOException $e) {
				die($e->getMessage());
			}
			
			$t->setIdTrabalho($p['Id_Trabalho']);
			$t->setIdRevisor($p['Id_Revisor']);
			$t->setNota1($p['Nota_1']);
			$t->setNota2($p['Nota_2']);
			$t->setNota3($p['Nota_3']);
			$t->setNotaFinal($p['Nota_Final']);
		}
		
		public function delete(){
			$sql = "delete from trabalho where Id_Trabalho = '$this->id_trabalho'";
			$query = $this->db->query ($sql);
			
			try {
				$query -> execute();
				$res= $query -> fetch();

			} catch(PDOException $e) {
				die($e -> getMessage());
			}
		}
		
	}
?>