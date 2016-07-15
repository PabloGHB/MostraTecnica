<?php
    session_start();
    if(isset($_SESSION['autor'])){
		header("location: trabalho.php");
    }else if(isset($_SESSION['revisor'])){
		header("location: revisao.php");
	}else if(isset($_SESSION['organizador'])){
		header("location: organizacao.php");
	}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>4ª Mostra Técnica</title>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link href="css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
	
    <body style="background-image: url('img/background.jpg'); background-size: 100%;">
		<form id="login" name="login" method="POST" action="login.php">
            <div id="form_login">
                <div style="width:60%; margin:150 auto;"><br>
                    <h3 style="text-align: center; color: #000000;">ENTRAR</h3><br>
                    <div class="form-group">
                        <!--<label>Usuário</label>-->
                        <input type="text" class="form-control" required="required" name="email" id="email" placeholder="E-mail"><br>
                        <input type="password" class="form-control" required="required" name="senha" id="senha" placeholder="Senha">
                    </div>
                    <center>
                        <input type="submit" name="botao" class="btn btn-success" value="Entrar">
                        <a href="cadastro.html" class="btn btn-primary">Cadastrar</a>
                    </center>
				</div>
			</div>
        </form>
		<div id="visita">
			<a href="visita.php" class="btn btn-primary">Página do Visitante</a>
		</div>
    </body>
</html>
