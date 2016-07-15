    <!--Load the AJAX API-->
	<?php function getArea2($db) {		
		$sql= "select distinct Area from trabalho where Estado= 'Aprovado'";	
		$query= $db->query($sql);
		$area= array();
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$area[]= $row['Area'];
		}
		
		return $area;
	}
	
	function getQtd2($db) {		
		$area= getArea2($db);
		$qtd= array();
	
		foreach($area as $a){
			$sql= "select count(Area) as Area from trabalho where Area = '$a' and Estado= 'Aprovado'";	
			$query= $db->query($sql);
			
			$row= $query->fetch(PDO::FETCH_ASSOC);
			$qtd[$a]= $row['Area'];
		}
		
		return $qtd;}?>

        // Create the data table.
        var data3 = new google.visualization.DataTable();
		data3.addColumn('string', 'str');
		data3.addColumn('number', 'num');

		<?php $area= getArea2($db); $qtd= getQtd2($db); $option= ' ';
		
		foreach($area as $a){ 
			  $option.= '["' . $a . '",' . $qtd[$a] . '],'; } ?>
		
		data3.addRows([<?php echo $option;?>]);

        // Set chart options
        var options3 = {'title':'Trabalhos Aprovados por Área',
					   backgroundColor: 'transparent',
					   colors: ['#339933', '#3366CC', '#DC3912', '#FF9900', '#109618', '#990099', '#3B3EAC', '#0099C6', '#DD4477', '#66AA00', '#B82E2E', '#316395', '#994499', '#22AA99', '#AAAA11', '#6633CC', '#E67300', '#8B0707', '#329262', '#5574A6', '#3B3EAC'],
                       'width':400,
					   'height':320,
					   'is3D':true};
		
		
         // Instantiate and draw our chart, passing in some options.	
		var chart1 = new google.visualization.PieChart(document.getElementById('chart_div_1'));
        chart1.draw(data1, options1);
        var chart2 = new google.visualization.PieChart(document.getElementById('chart_div_2'));
        chart2.draw(data2, options2);
		var chart3 = new google.visualization.PieChart(document.getElementById('chart_div_3'));
        chart3.draw(data3, options3);
     
	 }
	 
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
	<div id="chart_div_1" style= "position: absolute; top: 350; right: 300;"></div>
	<div id="chart_div_2" style= "position: absolute; top: 110; right: 300;"></div>
	<div id="chart_div_3" style= "position: absolute; top: 350; right: 600;"></div>
  </body>
</html>