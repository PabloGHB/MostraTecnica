<html>
    <head>
        <meta charset="UTF-8"/>
    </head>
</html>
<?php
	include_once 'Trabalho.class.php';
	include_once 'conexao.php';
		
    if(isset($_POST)){
		$id_trabalho = $_POST['id_trabalho'];
		$id_revisor = $_POST['revisor'];
		
		$estado= "Encaminhado";
		
        $t= new Trabalho($db, null, null, null, null, null, null, null);
		$t->getById($id_trabalho);
		
		$t->setEstado($estado);
		$t->setRevisor($id_revisor);
				
		$t->edit($id_trabalho);
		echo "<script>alert('Enviado com sucesso!');"
		. "location.href='organizacao.php';</script>";
    }
?>