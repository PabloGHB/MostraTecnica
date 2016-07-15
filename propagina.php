<html>
    <head>
        <meta charset="UTF-8"/>
    </head>
</html>
<?php
	include_once 'Trabalho.class.php';
	include_once 'conexao.php';
	
    if(isset($_POST)){
		$id = $_POST['id'];
		$titulo = $_POST['titulo'];
		$autor = $_POST['autor'];
		$area = $_POST['area'];
        $resumo = $_POST['resumo'];
		$estado = $_POST['estado'];
		$revisor = $_POST['revisor'];
	
                
        $t= new Trabalho($db, $id, $titulo, $autor, $area, $resumo, $estado, $revisor);
		$t->insert();
		

    }
?>