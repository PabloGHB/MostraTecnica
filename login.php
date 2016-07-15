<?php
	include_once 'conexao.php';
	include_once 'Autor.class.php';
	include_once 'Revisor.class.php';
	include_once 'Organizador.class.php';

    if(isset($_POST)){
		
        $email = $_POST['email'];
        $senha = $_POST['senha'];
		
		$sql = "select Usuario from autor where Email = '$email' and Senha = '$senha'";
		$resultado= $db->query($sql);
		
		$usuario = $resultado->fetch(PDO::FETCH_ASSOC);
		$usuario= $usuario['Usuario'];
		
		if($usuario){			
			$a= new Autor($db, null, null, null, null, null);
			$a->login($email, $senha);
		}

		$sql = "select Usuario from revisor where Email = '$email' and Senha = '$senha'";
		$resultado= $db->query($sql);
		
		$usuario = $resultado->fetch(PDO::FETCH_ASSOC);
		$usuario= $usuario['Usuario'];
		
		
		if($usuario){			
			$r= new Revisor($db, null, null, null, null, null);
			$r->login($email, $senha);
		}
		
		$sql = "select Usuario from organizador where Email = '$email' and Senha = '$senha'";
		$resultado= $db->query($sql);
		
		$usuario = $resultado->fetch(PDO::FETCH_ASSOC);
		$usuario= $usuario['Usuario'];
		
		
		if($usuario){
			$o= new Organizador($db, null, null, null, null, null);
			$o->login($email, $senha);
		
		}else{
			echo "<meta charset='UTF-8'/><script>alert('Credenciais inválidas!');"
			. "location.href='index.php';</script>";
		}
	}
?>