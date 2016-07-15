<html>
  <head>
	<?php $sql= "select count(*) as Aprovado from trabalho where Estado= 'Aprovado'";	
	$query= $db->query($sql);
	$res= $query->fetch(PDO::FETCH_ASSOC);
	$apro= $res['Aprovado'];

	
	$sql= "select count(*) as Reprovado from trabalho where Estado= 'Reprovado'";	
	$query= $db->query($sql);
	$res= $query->fetch(PDO::FETCH_ASSOC);
	$repro= $res['Reprovado']; ?>
	
	
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

        // Create the data table
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'str');
        data.addColumn('number', 'num');
        data.addRows([
          ['Aprovados', <?php echo $apro; ?>],
          ['Reprovados', <?php echo $repro; ?>],
        ]);
		
        // Set chart options
        var options = {'title':'Trabalhos Julgados',
					   colors: ['#339933', '#DC3912'],
					   backgroundColor: 'transparent',
                       'width':400,
					   'height':320,
					   'is3D':true}; 
      