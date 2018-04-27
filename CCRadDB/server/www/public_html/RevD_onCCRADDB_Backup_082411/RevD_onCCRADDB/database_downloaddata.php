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

	
	

<div id="outer1">						
</div>




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
				
					echo "select";					
					
					if (mysql_num_rows($result1) > 0) {
					while ($row1 = mysql_fetch_assoc($result1)) {
					
					echo "</br>";
					echo "<input type=\"checkbox\" name=\"tablecolumn_1[]\" class=\"styled\" />".$row1['Field']."</td>";
					}}
					
					echo "<table>";
					echo "</br>";
					echo "<tr>";
					echo "<td>"."where"."</td>";	
					
					$result2 = mysql_query("SHOW COLUMNS FROM ".$table."");
					echo "<td>";					
					$i=0;
					echo "<select name=\"tempvariable[]\">";
					while($row2 = mysql_fetch_assoc($result2))
					{
					echo "<option>".$row2['Field']."</option>";
					$i++;
					}
					echo "</select>";
					echo "</td>";					
					
				echo "<td>";					
				echo "<select name=\"d\" class=\"styled\">";
				echo "  <option value=\"==\">is exactly</option>";
				echo "  <option value=\"LIKE\">starts</option>";
				echo "  <option value=\"LIKE\">contains</option>";				  
				echo "</select>";
				echo "</td>";
				
				echo "<td>";
				echo "<input type=\"text\" /></input>";
				echo "</td>";
				echo "</tr>"; 
				echo "</br>";
				
				echo "<tr>";				
				echo "<td>";
				echo "<select name=\"d\" class=\"styled\">";
				echo "  <option value=\"OR\">OR</option>";
				echo "  <option value=\"AND\">AND</option>";
				echo "</select>";	
				echo "</td>";	
					$result2 = mysql_query("SHOW COLUMNS FROM ".$table."");
				echo "<td>";						
					$i=0;
					echo "<select name=\"tempvariable[]\">";
					while($row2 = mysql_fetch_assoc($result2))
					{
					echo "<option>".$row2['Field']."</option>";
					$i++;
					}
					echo "</select>";				
				echo "</td>";						
					
					
				echo "<td>";	
				echo "<select name=\"d\" class=\"styled\">";
				echo "  <option value=\"==\">is exactly</option>";
				echo "  <option value=\"LIKE\">starts</option>";
				echo "  <option value=\"LIKE\">contains</option>";
				  
				echo "</select>";
				echo "</td>";
				
				echo "<td>";
				echo "<input type=\"text\" /></input>";
				echo "</td>";	
				echo "</tr>";
				echo "</br>";
				
				echo "<tr>";				
				echo "<td>";
				echo "<select name=\"d\" class=\"styled\">";
				echo "  <option value=\"OR\">OR</option>";
				echo "  <option value=\"AND\">AND</option>";
				echo "</select>";	
				echo "</td>";	
					$result2 = mysql_query("SHOW COLUMNS FROM ".$table."");
				echo "<td>";						
					$i=0;
					echo "<select name=\"tempvariable[]\">";
					while($row2 = mysql_fetch_assoc($result2))
					{
					echo "<option>".$row2['Field']."</option>";
					$i++;
					}
					echo "</select>";				
				echo "</td>";						
					
					
				echo "<td>";	
				echo "<select name=\"d\" class=\"styled\">";
				echo "  <option value=\"==\">is exactly</option>";
				echo "  <option value=\"LIKE\">starts</option>";
				echo "  <option value=\"LIKE\">contains</option>";
				  
				echo "</select>";
				echo "</td>";
				
				echo "<td>";
				echo "<input type=\"text\" /></input>";
				echo "</td>";	
				echo "</tr>";
				echo "</br>";
				
				echo "<tr>";				
				echo "<td>";
				echo "<select name=\"d\" class=\"styled\">";
				echo "  <option value=\"OR\">OR</option>";
				echo "  <option value=\"AND\">AND</option>";
				echo "</select>";	
				echo "</td>";	
					$result2 = mysql_query("SHOW COLUMNS FROM ".$table."");
				echo "<td>";						
					$i=0;
					echo "<select name=\"tempvariable[]\">";
					while($row2 = mysql_fetch_assoc($result2))
					{
					echo "<option>".$row2['Field']."</option>";
					$i++;
					}
					echo "</select>";				
				echo "</td>";						
					
					
				echo "<td>";	
				echo "<select name=\"d\" class=\"styled\">";
				echo "  <option value=\"==\">is exactly</option>";
				echo "  <option value=\"LIKE\">starts</option>";
				echo "  <option value=\"LIKE\">contains</option>";
				  
				echo "</select>";
				echo "</td>";
				
				echo "<td>";
				echo "<input type=\"text\" /></input>";
				echo "</td>";	
				echo "</tr>";
								
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
						
					$sqlquery = $_REQUEST['sqlquery'] ;
					echo " your query is : ";
					echo $sqlquery;
					echo "</br>";
					echo "</br>";
					
					$result = mysql_query($sqlquery);
					if (!$result) {die("Query to show fields from table failed");}


					  $fields_num = mysql_num_fields($result);

						echo "Result"; /*{$table}";*/
						echo "<table border='1'id=\"hor-minimalist-b\"><tr>";
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
					mysql_close($con);				
				?>
</html> 