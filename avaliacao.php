<html>
<?php
	include_once 'conexao.php';
	session_start();
	
        if(!isset($_SESSION['revisor'])){
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
        <form class= "form_direcao" id="direcao" name="direcao" enctype="multipart/form-data" method="POST" action="proavaliacao.php">
            <div style="width:28%; margin:180 auto; text-align: center;">
				<div class="form-group">
				<?php $sql="select * from trabalho where Id_Trabalho = '$id_trabalho'"; $query= $db->query($sql); $res = $query->fetch(PDO::FETCH_ASSOC); $resumo= $res['Resumo']; $exibe= $resumo . '<br> <br> <br>';?>
				
					<p style="text-align: left"><b>Resumo: </b> <?php echo $exibe;?></p>

					<p style="text-align: left"><b>1. Avalie a relevância do trabalho resumido.</b></p>
				
					<label class="radio-inline"><input type="radio" value="1" name="optradio_a">Péssima</label>
					<label class="radio-inline"><input type="radio" value="2" name="optradio_a">Ruim</label>
					<label class="radio-inline"><input type="radio" value="3" name="optradio_a">Média</label>
					<label class="radio-inline"><input type="radio" value="4" name="optradio_a">Boa</label>
					<label class="radio-inline"><input type="radio" value="5" name="optradio_a">Excelente</label> <br> <br>
					
					<p style="text-align: left"><b>2. Avalie a qualidade da escrita.</b></p>
					
					<label class="radio-inline"><input type="radio" value="1" name="optradio_b">Péssima</label>
					<label class="radio-inline"><input type="radio" value="2" name="optradio_b">Ruim</label>
					<label class="radio-inline"><input type="radio" value="3" name="optradio_b">Média</label>
					<label class="radio-inline"><input type="radio" value="4" name="optradio_b">Boa</label>
					<label class="radio-inline"><input type="radio" value="5" name="optradio_b">Excelente</label> <br> <br>
					
					<p style="text-align: left"><b>3. Avalie a originalidade.</b></p>
					
					<label class="radio-inline"><input type="radio" value="1" name="optradio_c">Péssima</label>
					<label class="radio-inline"><input type="radio" value="2" name="optradio_c">Ruim</label>
					<label class="radio-inline"><input type="radio" value="3" name="optradio_c">Média</label>
					<label class="radio-inline"><input type="radio" value="4" name="optradio_c">Boa</label>
					<label class="radio-inline"><input type="radio" value="5" name="optradio_c">Excelente</label> <br> <br>
					
					<input type="hidden" name="id_trabalho" value="<?php echo $id_trabalho;?>">
                </div>
                <center>
                    <input type="submit" name="botao" class="btn btn-success" value="Enviar">
					<input type= "reset" value="Limpar" class='btn btn-primary'>
                </center>
            </div>
        </form>
		<div id="visita">
			<a href="revisao.php" class="btn btn-primary">Voltar</a>
			<a href="logout.php" class="btn btn-primary">Sair</a>
		</div>
    </body>
</html>
