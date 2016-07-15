<html>
    <head>
        <meta charset="UTF-8"/>
    </head>
</html>
<?php
	session_start();
	
    if(isset($_POST)){
		$_SESSION['nota_corte'] = $_POST['nota'];		
		header('Location: organizacao.php');
    }
?>