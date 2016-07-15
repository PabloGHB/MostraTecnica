<html>
    <head>
        <meta charset="UTF-8"/>
    </head>
</html>
<?php
	include_once 'mpdf60/mpdf.php';
	include_once 'conexao.php';
	session_start();
	
    if(isset($_POST)){
		$id= $_SESSION['id_revisor'];
		
		$sql= "select * from trabalho where Revisor = '$id' and Estado= 'Encaminhado'"; 
		$query= $db->query($sql); 
		$text= ' ';
	
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$filename = 'Mostra Tecnica.pdf';
			$text .= '<br><h3>' . $row['Titulo'] . '</h3><br><h5>Área: </h5>' . $row['Area'] . '<br><br><h5>Resumo: </h5>' . $row['Resumo'] . '<pagebreak />';
		}		
		
		$mpdf = new mPDF();
		$mpdf->setFooter('{PAGENO}');
		$mpdf->WriteHTML($text);
		$mpdf->Output($filename,'D');
		
		header('Location: revisao.php');
    }
?>