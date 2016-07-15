<html>
<?php
	include_once 'conexao.php';
	$id_trabalho= $_GET['id'];
?>
    
	<head>
        <meta charset="UTF-8">
        <title>4ª Mostra Técnica</title>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link href="css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
   
    <body style="background-image: url('img/background.jpg'); background-size: 100%;">
            <div style="backgroud-color: rgba(255,255,255, 0.04); width:28%; margin:180 auto; text-align: center;">
				<div class="form-group">
				<?php $sql="select * from trabalho where Id_Trabalho = '$id_trabalho'"; $query= $db->query($sql); $res = $query->fetch(PDO::FETCH_ASSOC); $autor= $res['Autor'] . '<br> <br>'; $area= $res['Area'] . '<br> <br>'; $resumo= $res['Resumo'].'<br>';?>
									
					<p style="text-align: left"><b>Autor: </b> <?php echo $autor;?></p>

					<p style="text-align: left"><b>Area: </b> <?php echo $area;?></p>

					<p style="text-align: left"><b>Resumo: </b> <?php echo $resumo;?></p>
			
				</div>
			</div>
		<div id="visita">
			<a href="visita.php" class="btn btn-primary">Voltar</a>
		</div>
    </body>
</html>
