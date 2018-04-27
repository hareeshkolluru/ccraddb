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
<li><div id="current"><a>Database Operations</a></div>
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
<li><b>Graphs  - Histograms</b>
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

<form action="download_data.php" method="post" name="form1"> 	
	
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