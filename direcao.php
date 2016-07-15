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
        <form class= "form_direcao" id="direcao" name="direcao" enctype="multipart/form-data" method="POST" action="prodirecao.php">
            <div style="width:90%; margin:180 auto; text-align: center;">
                <?php $sql= "select Area from trabalho where Id_Trabalho= '$id_trabalho'";  $query= $db->query($sql); $res= $query->fetch(PDO::FETCH_ASSOC); $area= $res['Area'];
				$sql= "select Id_Area from cnpq where Area = '$area'"; $query= $db->query($sql); $res = $query->fetch(PDO::FETCH_ASSOC); $id_area= $res['Id_Area'];
				$sql= "select Id_Revisor from revisor where Id_Area = '$id_area'"; $query= $db->query($sql); $res = $query->fetch(PDO::FETCH_ASSOC); $revisor= $res['Id_Revisor'];
				$completo= ' ';
				$option= ' ';
				
				if($revisor){
					$sql= "select Nome, Sobrenome from revisor where Id_Area = '$id_area'"; $query= $db->query($sql);
					while($row = $query->fetch(PDO::FETCH_ASSOC)) : 
						$completo = $row['Nome'] . ' ' . $row['Sobrenome'];
						$option .= '<label><input type="radio" name= "revisor" value="' . $revisor .'">'.  $completo . '</label><br><br>';
					endwhile; ?>
					
					<div class="form-group">
						<div class="radio">
							<center><?php echo $option;?></center>
						</div>
						<input type="hidden" name="id_trabalho" value="<?php echo $id_trabalho;?>">
					</div>
					
					<center><br>
						<input type="submit" name="botao" class="btn btn-success" value="Enviar">
						<input type= "reset" value="Limpar" class='btn btn-primary'>
					</center>
					
				<?php	
				}else{
					echo "Nenhum revisor referente a $area."; 
				}?>
				
			</div>
		</form>	
			
				
		<div id="visita">
			<a href="organizacao.php" class="btn btn-primary">Voltar</a>
			<a href="logout.php" class="btn btn-primary">Sair</a>
		</div>
    </body>
</html>
