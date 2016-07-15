<html>
  <head>  
	<!--Load the AJAX API-->
	<?php function getArea($db) {		
		$sql= "select distinct Area from trabalho where Estado= 'Reprovado'";	
		$query= $db->query($sql);
		$area= array();
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$area[]= $row['Area'];
		}
		
		return $area;
	}
	
	function getQtd($db) {		
		$area= getArea($db);
		$qtd= array();
	
		foreach($area as $a){
			$sql= "select count(Area) as Area from trabalho where Area = '$a' and Estado= 'Reprovado'";	
			$query= $db->query($sql);
			
			$row= $query->fetch(PDO::FETCH_ASSOC);
			$qtd[$a]= $row['Area'];
		}
		
		return $qtd;}?>
		
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		// Load the Visualization API and the corechart package.
		google.charts.load('current', {'packages':['corechart']});

		// Set a callback to run when the Google Visualization API is loaded.
		google.charts.setOnLoadCallback(drawChart);

		// Callback that creates and populates a data table,
		// instantiates the pie chart, passes in the data and
		// draws it.
		function drawChart() {

			// Create the data table.
			var data1 = new google.visualization.DataTable();
			data1.addColumn('string', 'str');
			data1.addColumn('number', 'num');

			<?php $area= getArea($db); $qtd= getQtd($db); $option= ' ';
			
			foreach($area as $a){ 
				  $option.= '["' . $a . '",' . $qtd[$a] . '],'; } ?>
			
			data1.addRows([<?php echo $option;?>]);

			// Set chart options
			var options1 = {'title':'Trabalhos Reprovados por Área',
						   backgroundColor: 'transparent',
						   colors: ['#339933', '#3366CC', '#DC3912', '#FF9900', '#109618', '#990099', '#3B3EAC', '#0099C6', '#DD4477', '#66AA00', '#B82E2E', '#316395', '#994499', '#22AA99', '#AAAA11', '#6633CC', '#E67300', '#8B0707', '#329262', '#5574A6', '#3B3EAC'],
						   'width':400,
						   'height':320,
						   'is3D':true};
			