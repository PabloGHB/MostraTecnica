<html>
<?php
	include_once 'conexao.php';
	
	session_start();
	
        if(!isset($_SESSION['revisor'])){
            echo "<script>alert('Você precisa estar logado para visualizar esta página!');"
                . "location.href='index.php';</script>";
		}else{
			$id= $_SESSION['id_revisor'];
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
		<div class="container" style= "width:35%; top:180; left:200; position: absolute;">
			<?php $sql= "select * from trabalho where Revisor = '$id' and Estado= 'Encaminhado'"; $query= $db->query($sql); $resultado = $query->fetch(PDO::FETCH_ASSOC); $trabalho= $resultado['Estado']; 
			if($trabalho){ 
				$sql= "select * from trabalho where Revisor = '$id' and Estado= 'Encaminhado'"; $query= $db->query($sql);
				$option = " ";
				while($row = $query->fetch(PDO::FETCH_ASSOC)) :
					$option .= '<a href= "avaliacao.php?id= '. $row['Id_Trabalho'] .'" > '. $row['Titulo'] .'</a>' . '<br>';
				endwhile; ?>
				
				<div class="panel panel-primary">
					<div class="panel-heading">Trabalhos Recebidos</div>
						<div class="panel-body">
							<?php echo $option; ?>
						</div>
					</div>
				</div>
				<form class= "form_nota" id="nota" name="nota" enctype="multipart/form-data" method="POST" action="baixado.php">
					<div style= "position: absolute; left: 595px; top: 183px">
						<input type="submit" name="botao" class="btn btn-default" value="Baixar">
					</div>
				</form>
				
				
			<?php	
			}else {
				$option= "Nenhum trabalho para ser avaliado."; ?>
				
				<div class="panel panel-primary">
				<div class="panel-heading">Trabalhos Recebidos</div>
					<div class="panel-body">
						<?php echo $option; }?>
				    </div>
				</div> </div>
		
		<div id="visita">
			<a href="logout.php" class="btn btn-primary">Sair</a>
		</div>
    </body>
</html>