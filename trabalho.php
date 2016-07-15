<html>
<?php
	include_once 'conexao.php';
	
	session_start();
	if(!isset($_SESSION['autor'])){
		echo "<script>alert('Você precisa estar logado para visualizar esta página!');"
			. "location.href='index.php';</script>";
	}else{
		$id= $_SESSION['id_autor'];
	}
?>
    
	<head>
        <meta charset="UTF-8">
        <title>4ª Mostra Técnica</title>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link href="css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
   
    <body style="background-image: url('img/background.jpg'); background-size: 100%">
		<?php $sql= "select * from trabalho where Id_Autor = '$id'"; $query= $db->query($sql); $res = $query->fetch(PDO::FETCH_ASSOC); $trabalho= $res['Id_Autor']; ?>
			<div class="container" style="width:60%; margin:175 auto;">
				<table class="table table-striped">
					<thead>
					  <tr>
						<th>Título</th>
						<th>Área</th>
						<th>Estado</th>
					  </tr>
					</thead>
					<tbody>
			
			<?php if($trabalho){
				$sql= "select * from trabalho where Id_Autor = '$id'"; $query= $db->query($sql);
					while($row = $query->fetch(PDO::FETCH_ASSOC)) : ?>
						<tr>
							<td><?php echo $row['Titulo']; ?></td>
							<td><?php echo $row['Area']; ?></td>
							<td><?php echo $row['Estado']; ?></td>
						</tr>

			<?php endwhile;} else{ ?>
					<tr>
						<td>Nenhum trabalho cadastrado.</td><td></td><td></td>
					</tr>
			<?php }?>
					</tbody>
				</table>
			</div>
		
		<div id="visita">
			<a href="pagina.php" class="btn btn-primary">Cadastrar Trabalho</a>
			<a href="logout.php" class="btn btn-primary">Sair</a>
		</div>
    </body>
</html>
