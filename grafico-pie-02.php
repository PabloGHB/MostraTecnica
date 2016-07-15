    <!--Load the AJAX API-->
	<?php function getArea1($db) {		
		$sql= "select distinct Area from trabalho";	
		$query= $db->query($sql);
		$area= array();
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$area[]= $row['Area'];
		}
		
		return $area;
	}
	
	function getQtd1($db) {		
		$area= getArea1($db);
		$qtd= array();
	
		foreach($area as $a){
			$sql= "select count(Area) as Area from trabalho where Area = '$a' ";	
			$query= $db->query($sql);
			
			$row= $query->fetch(PDO::FETCH_ASSOC);
			$qtd[$a]= $row['Area'];
		}
		
		return $qtd;}?>

        // Create the data table.
        var data2 = new google.visualization.DataTable();
		data2.addColumn('string', 'str');
		data2.addColumn('number', 'qtd');

		<?php $area= getArea1($db); $qtd= getQtd1($db); $option= ' ';
		
		foreach($area as $a){ 
			  $option.= '["' . $a . '",' . $qtd[$a] . '],'; } ?>
		
		data2.addRows([<?php echo $option;?>]);

        // Set chart options
        var options2 = {'title':'Trabalhos Cadastrados por Área',
					   backgroundColor: 'transparent',
					   colors: ['#339933', '#3366CC', '#DC3912', '#FF9900', '#109618', '#990099', '#3B3EAC', '#0099C6', '#DD4477', '#66AA00', '#B82E2E', '#316395', '#994499', '#22AA99', '#AAAA11', '#6633CC', '#E67300', '#8B0707', '#329262', '#5574A6', '#3B3EAC'],
                       'width':400,
					   'height':320,
					   'is3D':true};
