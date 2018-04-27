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
<li style="margin-left: 1px"><b href="index.html" title="Home">Home</b></li>
<li><a>Database Operations</a>
<ul>
	<li><a href="database_createtestplan.php">Create Testplan</a></li>
	<li><a href="database_uploaddata.php">Upload/Edit Data</a></li>
	<li><a href="database_downloaddata.php">Download Data</a></li>	
	<li><a href="database_writesql.php">Write SQL Code</a></li>
</ul>
</li>
<li><div id="current"><a>Graphs - Data on One Unit</a></div>
<ul>
	<li><a href="oneunit_graphs_trp.php">Power</a></li>
	<li><a href="oneunit_graphs_tis.php">Sensitivity</a></li>
	<li><a href="oneunit_graphs_sptis.php">Desense-SPTIS</a></li>
</ul></li>
<li><b>Graphs - Data on Multiple Units</b>
<ul>
	<li><a href="multipleunit_graphs_trp.php">Power</a></li>
	<li><a href="multipleunit_graphs_tis.php">Sensitivity</a></li>
	<li><a href="multipleeunit_graphs_sptis.php">Desense-SPTIS</a></li>
</ul></li>
<li><b>Histograms</b>
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

<div id="optionsmenu">
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
		$result13 = mysql_query("SELECT distinct notesAboutModification FROM ". $table1. "");
			
		echo "<table><tr><td>   </td><td>   </td><td>   </td><td>unitNumber</td><td>isThisUnitAsBuilt</td><td>notesAboutModification</td></tr>";

		$i = 0;
		if (mysql_num_rows($result11) > 0) {
		while ($row1 = mysql_fetch_assoc($result11)) {			
		if ($i==9){
			echo "<tr><td></td><td></td><td></td><td>";
			echo "<input type=\"text\" name=\"columnName_temp[$i][]\"/>";
			echo "</td>";
			}
			elseif ($i==10){
			echo "<td>";
			echo "<select name=\"columnName[$i]\">";
				while ($row2=mysql_fetch_array($result12)) {		
					if ($row2[$i])
						echo "<option value=$row2[$i]>$row2[$i]</option>";
				}
				echo "</select>";
				echo "</td>";
				}
			elseif ( $i==11){
			echo "<td>";
			echo "<select name=\"columnName[$i]\">";
				while ($row3=mysql_fetch_array($result13)) {		
					if ($row3[0])
						echo "<option value=$row3[0]>$row3[0]</option>";
				}
				echo "</select>";
				echo "</td></tr></table>";
				echo "<hr>";
				}						
			mysql_data_seek($result12, 0);
			mysql_data_seek($result13, 0);
			$i++;
			
		}
		}


		$result11 = mysql_query("SHOW COLUMNS FROM ".$table1."");
		$i = 0;
		if (mysql_num_rows($result11) > 0) {
		while ($row1 = mysql_fetch_assoc($result11)) {			
			if ($i==13 || $i==14 || $i==15 || $i==16 || $i==17 || $i==7)
			{
				
				echo "<div id =\"left\">";
				echo "<div style=\"color:white;padding: 15px 5px;text-decoration: none;letter-spacing: 1px;background-color: #555; \">";
				echo $row1['Field']."</br></div>";
				echo "<input type=\"hidden\" name=\"columnName[]\"/>";
				while ($row2=mysql_fetch_array($result12)) {		
						if($row2[$i])
						echo "<input type=\"checkbox\" name=\"columnName_temp[$i][]\" value=\"$row2[$i]\" class=\"styled\" />".$row2[$i]."</br>";
						echo "<option value=$row2[$i]>$row2[$i]</option>";				
				}
				
			echo "</div>";			
			}	
			
			mysql_data_seek($result12, 0);
			mysql_data_seek($result13, 0);
			$i++;
			
		}
		}
		
//echo "<input type=\"text\">";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</br>";
echo "<hr></br>";
echo "
<input type=\"checkbox\" name=\"verizon\" value=\"Verzion\" class=\"styled\">Verizon&nbsp;&nbsp;&nbsp;
<input type=\"checkbox\" name=\"AT&T\" value=\"AT&T\" class=\"styled\">AT&T&nbsp;&nbsp;&nbsp;
<input type=\"checkbox\" name=\"Vodafone\" value=\"Vodafone\" class=\"styled\">Vodafone&nbsp;&nbsp;&nbsp;
<input type=\"checkbox\" name=\"KT-SKT\" value=\"KT-SKT\" class=\"styled\">KT-SKT&nbsp;&nbsp;&nbsp;";

		mysql_close($link);
		
		?>		
		<input name="btnSubmit" type="submit" value="Display Graph" id="styleswitcher2">	
		
		</form>	


</div>
</div>			


			
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

 $i7=0;
 $i9=0;
 $i10=0;
 $i11=0;
 $i12=0;
 $i13=0;
 $i14=0;
 $i15=0;
 $i16=0;
 $i17=0;
 $i18=0;

 
$_POST["columnName_temp"][12][0]=SPTIS;



$count=0;
while($_POST["columnName_temp"][9][$i9])
{
$i7=0;
while($_POST["columnName_temp"][7][$i7])
{
$i13=0;
while($_POST["columnName_temp"][13][$i13])
{ $i14=0;
while($_POST["columnName_temp"][14][$i14])
{ $i15=0;
while($_POST["columnName_temp"][15][$i15])
{ $i16=0;
$i17=0;
while($_POST["columnName_temp"][17][$i17])
{ 
while($_POST["columnName_temp"][16][$i16])
{ 
$i18=0;

	   $sqlquerygetchannellist="select ".$_POST["columnName_temp"][17][$i17]." from channelsTable";/*".$table3;*/
	   $getchannellist = mysql_query($sqlquerygetchannellist);
       $m=0;
	   while ($channelnumber=mysql_fetch_array($getchannellist)){
	   if($channelnumber[0]){
	   $_POST["columnName_temp"][18][$m] = $channelnumber[0];
	   $m++;
	   /*echo "'".$channelnumber[0]."',";*/
	   }
       }
	   
	   /*echo "$m";*/   
       	   
while($m!=0)
		{   
		    $sqlquerytogetdata=NULL;
			$sqlquerytogetdata.="select data from masterTable where ";
			
			/*echo "select data from masterTable where ";*/
		
				for($column_no=7;$column_no<19;$column_no++)  
				{
				if($column_no!=8){				
				switch ($column_no)
				{
				case 9: $_POST["columnName"][$column_no]=$_POST["columnName_temp"][$column_no][$i9];
						break;
				case 7: $_POST["columnName"][$column_no]=$_POST["columnName_temp"][$column_no][$i7];
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
				}		
				
				$sqlquerytogetdata.= $columnNameHeader[$column_no]."='";
				$sqlquerytogetdata.= $_POST["columnName"][$column_no]."'";
				if($column_no!=18){$sqlquerytogetdata.= " AND ";}				
				}} 
				$sqlquerytogetdata.= " LIMIT 1 ";
				/*echo $sqlquerytogetdata;
				echo "</br><hr>";*/
				$dataarrayfromquery=mysql_query($sqlquerytogetdata);
				while($cell=mysql_fetch_array($dataarrayfromquery)){
				$finaldata[$count][$i17][$i18]=$cell[0];
				}
				/*echo $finaldata[$count][$i17][$i18]."</br>";*/
$i18++;
$m--;
}
for($column_no=7;$column_no<17;$column_no++)  
{					
				if($column_no!=8 || $column_no!=12){
				$finaldatalegend[$count].= $_POST["columnName"][$column_no]."+";
				}/*echo $finaldatalegend[$count]."<br>".$count;*/
}
$count++;			
			
$i16++;
}
$i15++;
}
$i14++;
}
$i13++;
}
$i7++;
}
$i9++;
}

	
echo "<script type=\"text/javascript\">
		
			var chart1;
			$(document).ready(function() {
				chart1 = new Highcharts.Chart({
					chart: {
						renderTo: 'container-1',						
						defaultSeriesType: 'line',
						marginRight: 130,
						marginBottom: 50
					},
					title: {
						text: 'Desense - SPTIS',
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
						categories: ['128','129','130','131','132','133','134','135','136','137','138','139','140','141','142','143','144','145','146','147','148','149','150','151','152','153','154','155','156','157','158','159','160','161','162','163','164','165','166','167','168','169','170','171','172','173','174','175','176','177','178','179','180','181','182','183','184','185','186','187','188','189','190','191','192','193','194','195','196','197','198','199','200','201','202','203','204','205','206','207','208','209','210','211','212','213','214','215','216','217','218','219','220','221','222','223','224','225','226','227','228','229','230','231','232','233','234','235','236','237','238','239','240','241','242','243','244','245','246','247','248','249','250','251']
					},
					yAxis: {
						max:-100,
						title: {
							text: 'SPTIS (dBm)'
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
					
					series: [
						";
						
					for ($i=0;$i<$count;$i++)
					{					
					echo "
					{ name:"."'".$finaldatalegend[$i]."',  ".
						"data:[";
						
					for ($j=0;$j<123;$j++)
					{
						echo $finaldata[$i][0][$j];
						if($j!=122)
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
	   
	   
?>



				
					<!-- 3. Add the container -->
					<div id="container-1" style="width: 1200px; height: 400px; margin: 1.5em; float:left"></div>
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