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
 
<body>
<div id="header">			
<div id="header-center">
</div>
<div id="zen">			
</div>
</div>
	
					
<div id="wrapper">		
		
<div id="modernbricksmenu">
<ul>
<li style="margin-left: 1px"><a href="index.html" title="Home">Home</a></li>
<li><div id="current"><a>Database Operations</a></div>
<ul>
	<li><a href="database_createtestplan.php">Create Testplan</a></li>
	<li><a href="database_uploaddata.php">Upload Data</a></li>
	<li><a href="database_downloaddata.php">Download Data</a></li>
	<li><a href="database_editdata.php">Edit Data</a></li>
	<li><a href="database_writesql.php">Write SQL Code</a></li>
</ul>
</li>
<li><a>Graphs - Data on One Unit</a>
<ul>
	<li><a href="oneunit_graphs_trp.php">Power</a></li>
	<li><a href="oneunit_graphs_tis.php">Sensitivity</a></li>
	<li><a href="oneunit_graphs_sptis.php">Desense-SPTIS</a></li>
</ul></li>
<li><a>Graphs - Data on Multiple Units</a>
<ul>
	<li><a href="multipleunit_graphs_trp.php">Power</a></li>
	<li><a href="multipleunit_graphs_tis.php">Sensitivity</a></li>
	<li><a href="multipleeunit_graphs_sptis.php">Desense-SPTIS</a></li>
</ul></li>
<li><a href="histograms.php"  title="histograms">Histograms</a></li>
<li><a href="craetereport.php"  title="createreport">Create Report</a></li>		
</ul>
</div>
<div id="modernbricksmenuline">&nbsp;</div>
		
   
	   
<div id="outer1" style="width:20%">
<div class="content">

<form action="<?php echo $PHP_SELF;?>" method="post" name="form2">				
		
<?php
						
		$host = 'localhost:3306';
		$user = 'rootccraddb';
		$pass = 'motorola';
		$db = 'ccraddb';
		$table1 = 'masterTable';
		$table2 = 'optionsTable';
		
		
		$link = mysql_connect($host, $user, $pass) or die("Can not connect." . mysql_error());
		mysql_select_db($db) or die("Can not connect.");
		$result11 = mysql_query("SHOW COLUMNS FROM ".$table1."");
		$result12 = mysql_query("SELECT * FROM ". $table2. ""); 

					
		$i = 0;
		if (mysql_num_rows($result11) > 0) {
		while ($row1 = mysql_fetch_assoc($result11)) {	
			if ($i==13 || $i==14 || $i==15 || $i==16 || $i==17 || $i==18)
			{
				echo "<div style=\"display: block;color:white;margin: 0 ; padding: 15px 20px;text-decoration: none;letter-spacing: 1px;background-color: #111; \">";
				echo $row1['Field']."</br></div>";
				echo "<input type=\"hidden\" name=\"columnName[]\"/>";
				while ($row2=mysql_fetch_array($result12)) {		
						if($row2[$i])
						echo "<p><input type=\"checkbox\" name=\"columnName_temp[$i][]\" value=\"$row2[$i]\" class=\"styled\" />".$row2[$i]."</p>";
						/*echo "<option value=$row2[$i]>$row2[$i]</option>";*/
				}
			}	
			elseif ($i==9)
			echo "<input type=\"text\" name=\"columnName_temp[$i][]\"/>";			
			mysql_data_seek($result12, 0);
			$i++;
		}
		}

		mysql_close($link);	
		?>
		
		<input name="btnSubmit" type="submit" value="Display Graph" id="styleswitcher2">		
		</form>			
			
</div> <!-- end content -->
						
</div>

<div id="outer2" style="width:80%">		
				
				<div class="content">

<?php

$host = 'localhost:3306';
$user = 'rootccraddb';
$pass = 'motorola';
$db = 'ccraddb';
$table1 = 'masterTable';
$table2 = 'optionsTable';

$link = mysql_connect($host, $user, $pass) or die("Can not connect." . mysql_error());
mysql_select_db($db) or die("Can not connect.");


$result21 = mysql_query("SHOW COLUMNS FROM ".$table1."");
$result22 = mysql_query("SELECT * FROM ". $table2. "");

$j=0;
if (mysql_num_rows($result21) > 0) {
while ($row1 = mysql_fetch_assoc($result21)) {
$columnNameHeader[$j]=$row1['Field'];
$j++;
}
}
 
$unitNumbersInputString = $_POST["columnName_temp"][9][0]; 
$unitNumbers = explode(",", $unitNumbersInputString);
for($i = 0; $i < count($unitNumbers); $i++){
$_POST["columnName_temp"][9][$i] = $unitNumbers[$i];
}


 $i9=0;
 $i12=0;
 $i13=0;
 $i14=0;
 $i15=0;
 $i16=0;
 $i17=0;
 $i18=0;
 $i19=0;
 
$_POST["columnName_temp"][12][0]=TxPower;
 
while($_POST["columnName_temp"][9][$i9])
{
$i12=0;
while($_POST["columnName_temp"][12][$i12])
{ $i13=0;

while($_POST["columnName_temp"][13][$i13])
{ $i14=0;

while($_POST["columnName_temp"][14][$i14])
{ $i15=0;

while($_POST["columnName_temp"][15][$i15])
{ $i16=0;

while($_POST["columnName_temp"][16][$i16])
{ $i17=0;

while($_POST["columnName_temp"][17][$i17])
{ $i18=0;

while($_POST["columnName_temp"][18][$i18])
{

$i19=0;
	   $sqlquerygetchannellist="select ".$_POST["columnName_temp"][18][$i18]." from channelsTable";/*".$table3;*/
	   $getchannellist = mysql_query($sqlquerygetchannellist);
       $m=0;
	   while ($channelnumber=mysql_fetch_array($getchannellist)){
	   if($channelnumber[0]){
	   $_POST["columnName_temp"][19][$m] = $channelnumber[0];
	   $m++;}
       }
	   /*echo "$m";*/
	   	   
while($m!=0)
		{ echo "select data from masterTable where ";
		
				for($column_no=12;$column_no<20;$column_no++)  
				{				
				switch ($column_no)
				{
				case 9: $_POST["columnName"][$column_no]=$_POST["columnName_temp"][$column_no][$i9];
						break;
				case 12: $_POST["columnName"][$column_no]=$_POST["columnName_temp"][$column_no][$i12];
						break;
				case 13: $_POST["columnName"][$column_no]=$_POST["columnName_temp"][$column_no][$i13];
						break;
				case 14: $_POST["columnName"][$column_no]=$_POST["columnName_temp"][$column_no][$i14];
						break;
				case 15: $_POST["columnName"][$column_no]=$_POST["columnName_temp"][$column_no][$i15];
						break;
				case 16: $_POST["columnName"][$column_no]=$_POST["columnName_temp"][$column_no][$i16];
						break;
				case 17: $_POST["columnName"][$column_no]=$_POST["columnName_temp"][$column_no][$i17];
						break;
				case 18: $_POST["columnName"][$column_no]=$_POST["columnName_temp"][$column_no][$i18];
						break;
				case 19: $_POST["columnName"][$column_no]=$_POST["columnName_temp"][$column_no][$i19];														         
				}
				
				/*echo "columnName $column_no = ".$_POST["columnName"][$column_no]."<br>";*/
				echo $columnNameHeader[$column_no]."='";
				echo $_POST["columnName"][$column_no]."'";
				if($column_no!=19){echo " AND ";}
				/*$csv_output .= $_POST["columnName"][$column_no].",";  */
				} 
				echo " LIMIT 1 </br><hr>";
				/*$csv_output .= "\n";*/

$i19++;
$m--;
}	
$i18++;
}			
$i17++;
}			
$i16++;
}
$i15++;
}
$i14++;
}
$i13++;
}
$i12++;
 }
$i9++;
}


?>


<!--
php		
		
echo "<script type=\"text/javascript\">
		
			var chart1;
			$(document).ready(function() {
				chart1 = new Highcharts.Chart({
					chart: {
						renderTo: 'container-1',
						defaultSeriesType: 'line',
						marginRight: 130,
						marginBottom: 25
					},
					title: {
						text: 'Monthly Average Temperature',
						x: -20 //center
					},
					subtitle: {
						text: 'Source: WorldClimate.com',
						x: -20
					},
					xAxis: {
						categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 
							'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
					},
					yAxis: {
						title: {
							text: 'Temperature (?)'
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
						y: 100,
						borderWidth: 0
					},
					series: [{
						name: 'Tokyo',
						data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
					}, {
						name: 'New York',
						data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
					}, {
						name: 'Berlin',
						data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
					}, {
						name: 'London',
						data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
					}]
				});
				
				
			});
	
       </script>";
	   
	   ?>
-->


				
					<!-- 3. Add the container -->
					<div id="container-1" style="width: 900px; height: 400px; margin: 1.5em; float:left"></div>
					<!--<div id="container-2" style="width: 600px; height: 400px; margin: 1.5em; float:right"></div>
					<br/>
					<div id="container-3" style="width: 600px; height: 400px; margin: 1.5em; float:left"></div>
					<div id="container-4" style="width: 600px; height: 400px; margin: 1.5em; float:right"></div>-->
					

				</div> <!-- end content -->
				
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