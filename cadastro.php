<html>
    <head>
        <meta charset="UTF-8"/>
    </head>
<?php
	include_once 'Autor.class.php';
	include_once 'conexao.php';

	
	if(isset($_POST)){
        $nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
		$usuario= $_POST['usuario'];
                
        $a= new Autor($db, $nome, $sobrenome, $email, $senha, $usuario);
		$a->insert();
		
	}
?>

<div class="alert alert-success">
  <strong>Success!</strong> Indicates a successful or positive action.
</div>
</html>