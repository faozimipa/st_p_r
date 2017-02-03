<html>
	<head>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Heteroskedastisitas '
         },
         xAxis: {
            categories: ['data ke']
         },
         yAxis: {
            title: {
               text: ''
            }
         },
              series:             
            [
            <?php 
        	include('db_connect.php');
           $sql   = "SELECT data  FROM grafik";
            $query = mysql_query( $sql )  or die(mysql_error());
            while( $ret = mysql_fetch_array( $query ) ){
            	$merek=$ret['data'];                     
                 $sql_jumlah   = "SELECT x FROM grafik WHERE data='$merek'";        
                 $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
                 while( $data = mysql_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['x'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $merek; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
   });	
</script>
	</head>
	<body>
		<div id='container'></div>
	<center><b><h1><a href="delete.php">Kembali</a>	
	</body>
</html>