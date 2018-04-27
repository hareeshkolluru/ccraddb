<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<title> Motorola Converged Computing </title> 
<meta name="Author" content="Sethu Hareesh Kolluru" />
<link rel="stylesheet" media="all" type="text/css" href="style.css" />   
<link rel="stylesheet" media="all" type="text/css" href="extJS/resources/css/ext-all.css" />  
<script type="text/javascript" src="extJS/ext-all-debug-w-comments.js"></script>


</head> 
 
<body> 

<div id="wrap"> 
	<div id="header">
			<div class="content">
				<h1> CC Radiated Database </h1>
				<h3>Initial Draft</h3>
			</div>
			
			<div id="styleswitcher">
				<ul>
					<li><a href="/demo/line-basic">All GSM</a></li>
					<li><a href="/demo/line-basic/grid">GSM 850</a></li>
					<li><a href="/demo/line-basic/skies">GSM 900</a></li>
					<li><a href="/demo/line-basic/gray">GSM 1800</a></li>
					<li><a href="/demo/line-basic/dark-blue">GSM 1900</a></li>
					<li><a href="/demo/line-basic/dark-green">All WCDMA</a></li>
					<li><a href="/demo/line-basic">WCDMA 850</a></li>
					<li><a href="/demo/line-basic/grid">WCDMA 900</a></li>
					<li><a href="/demo/line-basic/skies">WCDMA 1800</a></li>
					<li><a href="/demo/line-basic/gray">WCDMA 1900</a></li>
					<li><a href="/demo/line-basic/dark-blue">WCDMA 2100</a></li>
					<li><a href="/demo/line-basic/dark-green">LTE Band</a></li>
				</ul>
				</div>
		</div> <!-- end header -->



		<div id="wrapper">

			<div id="outer1">

				
						<div id="navcontainer">
						<ul id="navlist">
						<li><b>Database Operations</b></li>
						<li id="active"><a href="database_createtestplan.php" id="current">Create a testplan from template</a></li>
						<li><a href="database_uploaddata.php">Upload data into the database</a></li>
						<li><a href="database_downloaddata.php">Download data from the database</a></li>
						<li><a href="database_editdata.php">Edit/Update data in the database</a></li>
						<li><a href="database_writesql.php">Write SQL query to interact with database</a></li>
						<li><b> Data on One Unit</b><li>
						<li id="active"><a href="#" id="current">Power</a></li>
						<li><a href="#">Sensitivity</a></li>
						<li><a href="#">SPTIS</a></li>
						<li><b>Compare Multiple Units</b></li>
						<li><a href="#">Power</a></li>
						<li><a href="#">Sensitivity</a></li>
						<li><a href="#">SPTIS</a></li>
						<li><b>Histograms</b></li>
						<li><a href="#">Power</a></li>
						<li><a href="#">Sensitivity</a></li>
						<li><a href="#">SPTIS</a></li>
						</ul>
						</div>

				

			</div>





			<div id="outer2">
			
		
			

				<div class="content">			
				
				
					<br/>	
				
				
				
<form action="php_multiple_textbox2.php" method="post" name="form1"> 							
				
				
<?php
				
$host = 'localhost:3306';
$user = 'root';
$pass = 'motorola';
$db = 'ccraddb';
$table1 = 'masterTable';
$table2 = 'optionsTable';
$file = 'export';


$txtSiteName_temp[][]="off";

$link = mysql_connect($host, $user, $pass) or die("Can not connect." . mysql_error());
mysql_select_db($db) or die("Can not connect.");
$result1 = mysql_query("SHOW COLUMNS FROM ".$table1."");
$result2 = mysql_query("SELECT * FROM ". $table2. ""); 

echo "<table border='1' id=\"hor-minimalist-b\">";
echo "<th>". "Column No." ."</th>";
echo "<th>". "Column Name" ."</th>";
echo "<th>". "Column Value" ."</th>";

	
$i = 0;
if (mysql_num_rows($result1) > 0) {
while ($row1 = mysql_fetch_assoc($result1)) {
	echo "<tr>";
	echo "<td>".$i."</td>";
	echo "<td>".$row1['Field']."</td>";
	echo "<td>";
	if ($i==1 || $i==3)
	{echo "<input type=\"text\" name=\"txtSiteName[]\"/>";
	/*echo "this is me"; write a date picket here*/}
	elseif ($i==6 ||$i==8 || $i==9 || $i==11 || $i==17 || $i==18 || $i==19)
	echo "<input type=\"text\" name=\"txtSiteName[]\"/>";
	elseif ($i==12 ||$i==13 || $i==14 || $i==15 || $i==16)
	{
		echo "<input type=\"hidden\" name=\"txtSiteName[]\"/>";
		while ($row2=mysql_fetch_array($result2)) {		
				if($row2[$i])
				echo "<input type=\"checkbox\" name=\"txtSiteName_temp[$i][]\" value=\"$row2[$i]\" class=\"styled\" />".$row2[$i]."</br>";
				/*echo "<option value=$row2[$i]>$row2[$i]</option>";*/
		}
	}
	else 	
	{	echo "<select name=\"txtSiteName[]\">";
		while ($row2=mysql_fetch_array($result2)) {		
			if ($row2[$i])
				echo "<option value=$row2[$i]>$row2[$i]</option>";
		}
	}
	echo "</select>";
	echo "</td>";
	echo "</tr>";
	mysql_data_seek($result2, 0);
	$i++;
}
}
echo "</table>";



mysql_close($link);	
?>
	
<input name="btnSubmit" type="submit" value="Create TestPlan and Download" id="styleswitcher2"> 	
	
	</form>  

	

	
</div>


					
			</div> <!-- end outer2 -->





			





		</div><!-- end #wrapper -->



		<div id="footer">

			<div class="content">

				<p>Copyright &copy; Sethu Hareesh Kolluru</a></p>

				

			</div>

		</div> <!-- end footer -->






</body> 
</html> 