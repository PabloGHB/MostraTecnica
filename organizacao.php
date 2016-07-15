<html>
<?php
	include_once 'conexao.php';
	
	session_start();
	
        if(!isset($_SESSION['organizador'])){
            echo "<script>alert('Você precisa estar logado para visualizar esta página!');"
                . "location.href='index.php';</script>";
		}else{
			$id= $_SESSION['id_organizador'];
		
			if(isset($_SESSION['nota_corte'])){
				$nota_corte= $_SESSION['nota_corte'];
			}else{
				$nota_corte= null;
			}
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
		<div class="container" style= "width:30%; top:190; left:20%; position: absolute;">
			<?php $sql= "select * from trabalho where Estado = 'Pendente'"; $query= $db->query($sql); $res = $query->fetch(PDO::FETCH_ASSOC); $trabalho= $res['Estado']; 
			if($trabalho){ 
				$sql= "select * from trabalho where Estado = 'Pendente'"; $query= $db->query($sql);
				$option = " ";
				while($row = $query->fetch(PDO::FETCH_ASSOC)) :
					$option .= '<a href= "direcao.php?id= '. $row['Id_Trabalho'] .'" > '. $row['Titulo'] .'</a>' . '<br>';
				endwhile;
			}else {
				$option= "Nenhum trabalho para ser direcionado.";
			}?>
			
			<div class="panel panel-primary">
				<div class="panel-heading">Trabalhos Recebidos</div>
					<div class="panel-body">
						<?php echo $option; ?>
				    </div>
				</div>
			</div>
		
		<div class="container" style= "width:30%; top:190; right:20%; position: absolute;">
			<?php $sql= "create view trabava as (select trabalho.Id_Trabalho, Titulo, Estado, Nota_Final from trabalho inner join avaliacao on trabalho.Id_Trabalho = avaliacao.Id_Trabalho)"; $query= $db->query($sql); 
			$sql= "select * from trabava where Estado= 'Avaliado'"; $query= $db->query($sql); $res = $query->fetch(PDO::FETCH_ASSOC); $trabalho= $res['Id_Trabalho']; 
			if($trabalho){ 
				$sql= "select * from trabava where Estado= 'Avaliado' order by FIELD(Nota_Final, 5, 4, 3, 2, 1);"; $query= $db->query($sql); 
				$option = " ";
				while($row = $query->fetch(PDO::FETCH_ASSOC)) :
					$nota_final= $row['Nota_Final'];
					if($nota_final >= $nota_corte){
						$option .= '<a style="color: #00AA00;" href= "julgamento.php?id= '. $row['Id_Trabalho'] .'" > '. $row['Titulo'] .'</a>' . '<br>';
					}else{
						$option .= '<a style="color: #CC0000;" href= "julgamento.php?id= '. $row['Id_Trabalho'] .'" > '. $row['Titulo'] .'</a>' . '<br>';
					} endwhile; ?>
				
				<div class="panel panel-primary">
				<div class="panel-heading">Trabalhos Avaliados</div>
					<div class="panel-body">
						<?php echo $option; ?>
					</div>
				</div>
				</div>
				
				<form class= "form_nota" id="nota" name="nota" enctype="multipart/form-data" method="POST" action="notacorte.php">
					<div style= "postion: absolute; float: right; margin-right: 345px; margin-top: 150px;">
						<select class="form-control" required="required" name="nota" id="nota">
							<option value="" selected style="display: none">Nota</option>
							<option value= "1">1</option>
							<option value= "2">2</option>
							<option value= "3">3</option>
							<option value= "4">4</option>
							<option value= "5">5</option>
						</select><br>
					</div>
					<div style= "position: absolute; right: 290px; top: 150px">
						<input type="submit" name="botao" class="btn btn-primary" value="Ok">
					</div>
				</form>
			<?php
			}else {
				$option= "Nenhum trabalho para ser julgado."; ?>
				
				<div class="panel panel-primary">
				<div class="panel-heading">Trabalhos Avaliados</div>
					<div class="panel-body">
						<?php echo $option; ?>
					</div>
				</div>
			<?php } $sql= "drop view trabava"; $query= $db->query($sql); ?> </div>
		
		<div id="visita">
			<a href="logout.php" class="btn btn-primary">Sair</a>
		</div>
    </body>
</html>
