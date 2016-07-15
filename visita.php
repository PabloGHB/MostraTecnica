<html>
<?php
	include_once 'conexao.php';
?>
    
	<head>
        <meta charset="UTF-8">
        <title>4ª Mostra Técnica</title>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link href="css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
   
    <body style="background-image: url('img/background.jpg'); background-size: 100%;">
		<div class="container" style= "width:20%; top:132; left:425; position: absolute;">
			<table class='table table-borderless'>
				<thead>
				  <tr>
					<th>Trabalhos Aprovados</th>
				  </tr>
				</thead>
				<tbody>
			<?php $sql= "select * from trabalho where Estado = 'Aprovado'"; $query= $db->query($sql); $res = $query->fetch(PDO::FETCH_ASSOC); $trabalho= $res['Estado']; 
			if($trabalho){ 
				$sql= "select * from trabalho where Estado = 'Aprovado'"; $query= $db->query($sql);
				$option = " ";
				while($row = $query->fetch(PDO::FETCH_ASSOC)) :
					$option .= '<a href= "visualizacao.php?id= '. $row['Id_Trabalho'] .'" > '. $row['Titulo'] .'</a>' . '<br>';
				endwhile;
			}else {
				$option= "Nenhum trabalho aprovado.";
			}?>
			
					<tr>
						<td style= "font-size: 10pt";><?php echo $option; ?></td>
					</tr>
				</tbody>
				</table>
			</div>
		
		<?php include_once 'grafico-pie-01.php';
		include_once 'grafico-pie-02.php'; 
		include_once 'grafico-pie-03.php';  ?>
		
		<div id="visita">
			<a href="logout.php" class="btn btn-primary">Sair</a>
		</div>
    </body>
</html>
