<html>
<?php
	include_once 'conexao.php';
	session_start();
	
        if(!isset($_SESSION['organizador'])){
            echo "<script>alert('Você precisa estar logado para visualizar esta página!');"
                . "location.href='index.php';</script>";
		}else{
			$id_trabalho= $_GET['id'];
		}
?>
    
	<head>
        <meta charset="UTF-8">
        <title>4ª Mostra Técnica</title>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link href="css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
   
    <body style="background-image: url('img/background.jpg'); background-size: 100%;">
        <form class= "form_direcao" id="direcao" name="direcao" enctype="multipart/form-data" method="POST" action="projulgamento.php">
            <div style="width:28%; margin:180 auto; text-align: center;">
				<div class="form-group">
				<?php $sql= "select * from trabalho where Id_Trabalho = '$id_trabalho'"; $query= $db->query($sql); $res = $query->fetch(PDO::FETCH_ASSOC); $resumo= $res['Resumo']; $exibe= $resumo . '<br> <br>';
				$sql= "select * from avaliacao where Id_Trabalho = '$id_trabalho'"; $query= $db->query($sql); $res= $query->fetch(PDO::FETCH_ASSOC); $nota_1= $res['Nota_1']; $nota_2= $res['Nota_2']; $nota_3= $res['Nota_3']; $nota_final= $res['Nota_Final']; ?>
					
					<p style="text-align: left;"><b>Resumo: </b> <?php echo $exibe;?> </p>
					
					<p style="text-align: left;"><b>Nota Final: </b> <?php echo $nota_final ?> de 5</p> <br>

					<input type="hidden" name="id_trabalho" value="<?php echo $id_trabalho;?>">
                </div>
                <center>
                    <input type="submit" name="aprovado" class="btn btn-success" value="Aprovar">
					<input type="submit" name="reprovado" class='btn btn-primary' value="Reprovar">
                </center>
            </div>
        </form>
		<div id="visita">
			<a href="organizacao.php" class="btn btn-primary">Voltar</a>
			<a href="logout.php" class="btn btn-primary">Sair</a>
		</div>
    </body>
</html>
