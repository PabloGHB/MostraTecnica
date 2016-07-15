<html>
    <head>
        <meta charset="UTF-8"/>
    </head>
</html>
<?php
	include_once 'conexao.php';
	include_once 'Trabalho.class.php';
	include_once 'Avaliacao.class.php';
			
    if(isset($_POST['aprovado'])){
		$id_trabalho = $_POST['id_trabalho'];
		
		$estado= "Aprovado";

			
        $t= new Trabalho($db, null, null, null, null, null, null, null);
		$t->getById($id_trabalho);		
		$t->setEstado($estado);
		$t->edit($id_trabalho);
		
		echo "<script>alert('Enviado com sucesso!');"
		. "location.href='organizacao.php';</script>";
    }
	
	if(isset($_POST['reprovado'])){
		$id_trabalho = $_POST['id_trabalho'];
		
		$estado= "Reprovado";

			
        $t= new Trabalho($db, null, null, null, null, null, null, null);
		$t->getById($id_trabalho);		
		$t->setEstado($estado);
		$t->edit($id_trabalho);
		
		echo "<script>alert('Enviado com sucesso!');"
		. "location.href='organizacao.php';</script>";
	}
?>