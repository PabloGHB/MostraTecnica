<html>
    <head>
        <meta charset="UTF-8"/>
    </head>
</html>
<?php
	include_once 'conexao.php';
	include_once 'Trabalho.class.php';
	include_once 'Avaliacao.class.php';
	
    if(isset($_POST)){
		$id_trabalho = $_POST['id_trabalho'];
		$nota_1 = $_POST['optradio_a'];
		$nota_2 = $_POST['optradio_b'];
		$nota_3 = $_POST['optradio_c'];
                
        $estado= "Avaliado";
		
        $t= new Trabalho($db, null, null, null, null, null, null, null);
		$t->getById($id_trabalho);
		$t->setEstado($estado);				
		$t->edit($id_trabalho);
		

		$id_revisor= $t->getRevisor();
		$nota_final= ($nota_1 + $nota_2 + $nota_3) / 3;
		
		
		$a= new Avaliacao($db, $id_trabalho, $id_revisor, $nota_1, $nota_2, $nota_3, $nota_final);
		$a->insert();
		
		echo "<script>alert('Enviado com sucesso!');"
		. "location.href='revisao.php';</script>";		
		
    }
?>