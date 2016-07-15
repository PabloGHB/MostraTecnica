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
   
    <body style="background-image: url('img/background.jpg'); background-size: 100%;">
        <form class= "form_cadastro" id="cadastro" name="cadastro" enctype="multipart/form-data" method="POST" action="propagina.php">
            <div style="width:90%; margin:180 auto;">
                <div class="form-group">
                    <!--<label>Nome</label>-->
					<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                    <input type="text" class="form-control" required="required" name="titulo" id="titulo" placeholder="Título"><br>
                    <input type="text" class="form-control" required="required" name="autor" id="autor" placeholder="Autor"><br>
                    <?php $sql= "select Area from cnpq order by Area asc";
					$query= $db->query($sql);
					$option = " ";
					
					while($row = $query->fetch(PDO::FETCH_ASSOC)) : 
						$option .= '<option value= "' . $row['Area'] . '">' . $row['Area'] . '</option>';
					endwhile; ?>
					
					<select class="form-control" required="required" name="area" id="area">
					    <option value="" selected style="display: none">Selecione a área</option>
						<?php echo $option; ?>
					</select><br>
					
					<textarea name="resumo" rows="5" cols="67" placeholder= "Resumo"></textarea>                    
					<input type="hidden" name="estado" value="Pendente">
					<input type="hidden" name="revisor" value="0">

                </div>
                <center>
                    <input type="submit" name="botao" class="btn btn-success" value="Enviar">
					<input type= "reset" value="Limpar" class='btn btn-primary'>
                </center>
            </div>
        </form>
		<div id="visita">
			<a href="trabalho.php" class="btn btn-primary">Voltar</a>
			<a href="logout.php" class="btn btn-primary">Sair</a>
		</div>
    </body>
</html>
