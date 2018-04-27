<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<title> Motorola Converged Computing </title> 
<meta name="Author" content="Sethu Hareesh Kolluru" />
<link rel="stylesheet" media="all" type="text/css" href="style.css" />   
<link rel="stylesheet" media="all" type="text/css" href="extJS/resources/css/ext-all.css" />  
<script type="text/javascript" src="extJS/ext-all-debug-w-comments.js"></script>

<!-- 1. Add these JavaScript inclusions in the head of your page -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="Highcharts/js/highcharts.js"></script>
		
		<!-- 1a) Optional: add a theme file -->
		<!--
			<script type="text/javascript" src="../js/themes/gray.js"></script>
		-->
		
		<!-- 1b) Optional: the exporting module -->
		<script type="text/javascript" src="Highcharts/js/modules/exporting.js"></script>

</head> 
 
<div id="header">			
<div id="header-center">
</div>
<div id="zen">			
</div>
</div>
	
					
<div id="wrapper">		
		
<div id="modernbricksmenu">
<ul>
<li style="margin-left: 1px"><b href="index.html" title="Home">Home</b></li>
<li><b>Database Operations</b>
<ul>
	<li><a href="database_createtestplan.php">Create Testplan</a></li>
	<li><a href="database_uploaddata.php">Upload/Edit Data</a></li>
	<li><a href="database_downloaddata.php">Download Data</a></li>	
	<li><a href="database_writesql.php">Write SQL Code</a></li>
</ul>
</li>
<li><b>Linear Plots - Data on single/multiple units</b>
<ul>
	<li><a href="multipleunit_graphs_trp.php">Power</a></li>
	<li><a href="multipleunit_graphs_tis.php">Sensitivity</a></li>
	<li><a href="multipleunit_graphs_sptis.php">Desense-SPTIS</a></li>
</ul></li>
<li><div id="current"><a>Graphs  - Histograms</a></div>
<ul>
	<li><a href="histogram_trp.php">Power</a></li>
	<li><a href="histogram_tis.php">Sensitivity</a></li>
	<li><a href="histogram_sptis.php">Desense-SPTIS</a></li>
</ul></li>
<li><b href="createreport.php"  title="createreport">Create Report</b></li>		
</ul>
</div>
<div id="modernbricksmenuline">&nbsp;</div>


<div id="outer2">			

	<div class="content">			
	<br/>

<form action="<?php echo $PHP_SELF;?>" method="post" name="form1"> 	
	
					<?php
					
					$db_host = 'localhost:3306';
					$db_user = 'rootccraddb';
					$db_pwd = 'motorola';

					$database = 'ccraddb';
					$table = 'masterTable';

					if (!($con =mysql_connect($db_host, $db_user, $db_pwd)))
						die("Can't connect to database");

					if (!mysql_select_db($database))
						die("Can't select database");					
					
					$result1 = mysql_query("SHOW COLUMNS FROM ".$table."");			
					echo "Download all the datarecords"/*."<br>"*/;					
					
					/*if (mysql_num_rows($result1) > 0) {					
					while ($row1 = mysql_fetch_assoc($result1)) {					
					echo "</br>";
					echo "<input type=\"checkbox\" name=\"tablecolumn_1[]\" class=\"styled\" checked>".$row1['Field'];
					}}*/
					
					echo "<table style=\"margin-top:-40px;\">";
					echo "<tr>";
					echo "<td>"."where"."</td>";	
					echo "</tr>";
					echo "<tr>";
					$result2 = mysql_query("SHOW COLUMNS FROM ".$table."");
					echo "<td>";					
					$i=0;
					echo "<select name=\"searchcolumn[]\">";
					while($row2 = mysql_fetch_assoc($result2))
					{
					echo "<option>".$row2['Field']."</option>";
					$i++;
					}
					echo "</select>";
					echo "</td>";					
					
				echo "<td>";					
				echo "<select name=\"operator1[]\" class=\"styled\">";
				echo "  <option value=\"=\">is exactly</option>";				
				echo "  <option value=\"LIKE\">contains</option>";				  
				echo "</select>";
				echo "</td>";
				
				echo "<td>";
				echo "<input type=\"text\" name=\"columnvalue[]\"/></input>";
				echo "</td>";
				
				
				echo "<td>";					
				echo "<select name=\"operator2[]\" class=\"styled\">";
				echo "  <option value=\"OR\">OR</option>";
				echo "  <option value=\"AND\">AND</option>";				  
				echo "</select>";
				echo "</td>";
				
				echo "</tr>"; 
				echo "</br>";
				
				
				$result2 = mysql_query("SHOW COLUMNS FROM ".$table."");
					echo "<td>";					
					$i=0;
					echo "<select name=\"searchcolumn[]\">";
					while($row2 = mysql_fetch_assoc($result2))
					{
					echo "<option>".$row2['Field']."</option>";
					$i++;
					}
					echo "</select>";
					echo "</td>";					
					
				echo "<td>";					
				echo "<select name=\"operator1[]\" class=\"styled\">";
				echo "  <option value=\"=\">is exactly</option>";				
				echo "  <option value=\"LIKE\">contains</option>";				  
				echo "</select>";
				echo "</td>";
				
				echo "<td>";
				echo "<input type=\"text\" name=\"columnvalue[]\"/></input>";
				echo "</td>";
				
				
				echo "<td>";					
				echo "<select name=\"operator2[]\" class=\"styled\">";
				echo "  <option value=\"OR\">OR</option>";
				echo "  <option value=\"AND\">AND</option>";					  
				echo "</select>";
				echo "</td>";
				
				echo "</tr>"; 
				echo "</br>";
				
				
				
				$result2 = mysql_query("SHOW COLUMNS FROM ".$table."");
					echo "<td>";					
					$i=0;
					echo "<select name=\"searchcolumn[]\">";
					while($row2 = mysql_fetch_assoc($result2))
					{
					echo "<option>".$row2['Field']."</option>";
					$i++;
					}
					echo "</select>";
					echo "</td>";					
					
				echo "<td>";					
				echo "<select name=\"operator1[]\" class=\"styled\">";
				echo "  <option value=\"=\">is exactly</option>";				
				echo "  <option value=\"LIKE\">contains</option>";				  
				echo "</select>";
				echo "</td>";
				
				echo "<td>";
				echo "<input type=\"text\" name=\"columnvalue[]\"/></input>";
				echo "</td>";
				
				
				echo "<td>";					
				echo "<select name=\"operator2[]\" class=\"styled\">";
				echo "  <option value=\"OR\">OR</option>";
				echo "  <option value=\"AND\">AND</option>";				  
				echo "</select>";
				echo "</td>";
				
				echo "</tr>"; 
				echo "</br>";
				
				
				
				$result2 = mysql_query("SHOW COLUMNS FROM ".$table."");
					echo "<td>";					
					$i=0;
					echo "<select name=\"searchcolumn[]\">";
					while($row2 = mysql_fetch_assoc($result2))
					{
					echo "<option>".$row2['Field']."</option>";
					$i++;
					}
					echo "</select>";
					echo "</td>";					
					
				echo "<td>";					
				echo "<select name=\"operator1[]\" class=\"styled\">";
				echo "  <option value=\"=\">is exactly</option>";				
				echo "  <option value=\"LIKE\">contains</option>";				  
				echo "</select>";
				echo "</td>";
				
				echo "<td>";
				echo "<input type=\"text\" name=\"columnvalue[]\"/></input>";
				echo "</td>";
				
				
				echo "<td>";					
				echo "<select name=\"operator2[]\" class=\"styled\">";
				echo "  <option value=\"OR\">OR</option>";
				echo "  <option value=\"AND\">AND</option>";
									  
				echo "</select>";
				echo "</td>";
				
				echo "</tr>"; 
				echo "</br>";				
				
								
				echo "</table>";
				
				?>
<input name="btnSubmit" type="submit" value="Search and Download the data" id="styleswitcher2"> 	
</form> 				


<hr>

</div>

					
			


<?php
function standard_deviation($aValues, $bSample = false)
{
    $fMean = array_sum($aValues) / count($aValues);
    $fVariance = 0.0;
    foreach ($aValues as $i)
    {
        $fVariance += pow($i - $fMean, 2);
    }
    $fVariance /= ( $bSample ? count($aValues) - 1 : count($aValues) );
    return (float) sqrt($fVariance);
}




function average($array){
$sum = array_sum($array);
$count = count($array);
return $sum/$count;
}

//The average function can be use independantly but the deviation function
function deviation ($array){

$avg = average($array);
foreach ($array as $value) {
$variance[] = pow($value-$avg, 2);
}
$deviation = sqrt(average($variance));
return $deviation;
}


function Bucketize($array,$totalBuckets)
{
    $min = min($array);
    $max = max($array);
	$buckets=array(0,0,0,0,0,0,0,0,0,0,0);
    
 /*   foreach (var value in source)
    {
        min = Math.Min(min, value);
        max = Math.Max(max, value);
    }*/
	
  $bucketSize = ($max - $min) / $totalBuckets;
    
	for($i=0;$i<22;$i++)
    {
        $value=$array[$i];
		$bucketIndex = 0;
        if ($bucketSize > 0.0)
        {
            $bucketIndex = (int)(($value - $min) / $bucketSize);
            if ($bucketIndex == $totalBuckets)
            {
                $bucketIndex--;
            }
        }
        $buckets[$bucketIndex]++;
    }
    return $buckets;
}


		
					require "config.php";								
					$sqlquery="select data from ". $table1." where ";
					
					$i=0;
					while(($_POST["columnvalue"][$i]))				
					{
						if($_POST["operator1"][$i]=='=')
						{
						$sqlquery.=($_POST["searchcolumn"][$i])." ".($_POST["operator1"][$i])." '".($_POST["columnvalue"][$i])."' ".($_POST["operator2"][$i])." ";	
						}
						else
						{
						$sqlquery.=($_POST["searchcolumn"][$i])." ".($_POST["operator1"][$i])." '%".($_POST["columnvalue"][$i])."%' ".($_POST["operator2"][$i])." ";	
						}						
					$i++;
					}					
													
					$sqlquery = substr($sqlquery,0,-3);
					/*echo " your query is : ";	
					echo $sqlquery;	
					echo "</br>";
					echo "</br>";*/
					$noofdatarecordsfound=0;
					
					$result = mysql_query($sqlquery);
					if (!$result) {die("Query to show fields from table failed");}
					  $fields_num = mysql_num_fields($result);
/*
					
echo "Result"; /*{$table}";*/
/*					echo "<table border='1'id=\"hor-minimalist-b\"><tr>";
						// printing table headers
						for($i=0; $i<$fields_num; $i++)
						{
							$field = mysql_fetch_field($result);
							echo "<td>{$field->name}</td>";
						}
						echo "</tr>\n";
						// printing table rows
						while($row = mysql_fetch_row($result))
						{
							echo "<tr>";
							// $row is array... foreach( .. ) puts every element
							// of $row to $cell variable
							foreach($row as $cell)
								echo "<td>$cell</td>";

							echo "</tr>\n";
						}	




for($i=0; $i<$fields_num; $i++)
{
	$field = mysql_fetch_field($result);
	$csv_output .=$field->name.",";
}
	$csv_output .= "\n";*/
					
while($row = mysql_fetch_row($result))
	{
	$noofdatarecordsfound++;
	foreach($row as $cell)
	$data[$noofdatarecordsfound]=$cell;
	}	
$standardeviation=deviation($data);
$histodata=(Bucketize($data,11));
	
echo "$noofdatarecordsfound"."number of records found"."$standardeviation";
if($noofdatarecordsfound==0)
echo "<script type=\"text/javascript\">alert(\"Your search did not match any data entries. \");</script>";

$noofcontainer=1;
$container_title[$noofcontainer]="Histogram";
$count=1;							
								
	echo "<script type=\"text/javascript\">
		
			var chart1;
			$(document).ready(function() {
				chart".$noofcontainer." = new Highcharts.Chart({
					chart: {
						renderTo: 'container-";
						echo $noofcontainer."',
						defaultSeriesType: 'column',
						marginRight: 130,
						marginBottom: 50
					},
					title: {
						text: '".$container_title[$noofcontainer]."--TRP(dBm)',
						x: -20 //center
					},
					subtitle: {
						text: 'subtitle',
						x: -20
					},
					xAxis: {
						title: {
							text: 'Channel'
						},
						
					},
					
					plotOptions: {
        series: {
            dataLabels: {
                enabled: true
            }
        }
    },
					yAxis: {
						max:50,
						title: {
							text: 'TRP (dBm)'
						},
						plotLines: [{
							value: 0,
							width: 1,
							color: '#808080'
						}]
					},
					tooltip: {
						formatter: function() {
				                return '<b>'+ this.series.name +'</b><br/>'+
								this.x +': '+ this.y +'?';
						}
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'top',
						x: -10,
						y: 40,
						borderWidth: 1
					},
					
					series: [{
         type: 'line',";
		 
         for ($i=0;$i<$count;$i++)
					{					
					echo "
					name:"."'".abcd."',  ".
						"data:[";
						
					for ($j=0;$j<11;$j++)
					{
						echo $histodata[$j];
						if($j!=11)
						{	 echo ",";
						}
					}
					echo "]},";
					}
						
						
					for ($i=0;$i<$count;$i++)
					{					
					echo "
					{ name:"."'".abcd."',  ".
						"data:[";
						
					for ($j=0;$j<11;$j++)
					{
						echo $histodata[$j];
						if($j!=11)
						{	 echo ",";
						}
					}
					echo "]},";
					}
								
					 
					/*	name: 'Berlin',
						data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
					}, {
						name: 'London',
						data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
					*/
					echo "]
				});
				
				
			});	
       </script>";
				echo "<div id=\"container-".$noofcontainer."\" style=\"width: 1200px; height: 400px; margin: 1.5em; float:left\"></div>";							
			
				?>

	</div> <!-- end outer2 -->


		</div><!-- end #wrapper -->			
<div id="footer">
	<div class="content">
	<div class="wrap-1200px">			
	<p>2011 Sethu Hareesh Kolluru &copy; All Rights Reserved </a></p>
	</div>
	</div>
</div> <!-- end footer -->

</body>



</html> 