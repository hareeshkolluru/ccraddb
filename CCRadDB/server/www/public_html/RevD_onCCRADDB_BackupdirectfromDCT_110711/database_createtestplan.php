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
<li><b>Graphs - Data on One Unit</b>
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
	<br/>	
			
		<form action="php_multiple_textbox_081111.php" method="post" name="form1">	
						
		<?php
						
		require "config.php";	
		
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
			elseif ($i==6 || $i==19)
			echo "<input type=\"text\" name=\"txtSiteName[]\"/>";
			elseif ($i==8 || $i==11  || $i==20)
			echo "<input type=\"text\" value=\"None\" name=\"txtSiteName[$i]\"/>";			 
			elseif ($i==9)
			echo "<input type=\"text\" name=\"txtSiteName_temp[$i][]\"/>";
			elseif ($i==12 ||$i==13 || $i==14 || $i==15 || $i==16 || $i==17)
			{
				echo "<input type=\"hidden\" name=\"txtSiteName[]\"/>";
				while ($row2=mysql_fetch_array($result2)) {		
						if($row2[$i])
						echo "<input type=\"checkbox\" name=\"txtSiteName_temp[$i][]\" value=\"$row2[$i]\" class=\"styled\" />".$row2[$i]."</br>";
						/*echo "<option value=$row2[$i]>$row2[$i]</option>";*/
				}
			}
			else 	
			{	echo "<select name=\"txtSiteName[$i]\">";
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
	<div class="wrap-1200px">			
	<p>2011 Sethu Hareesh Kolluru &copy; All Rights Reserved </a></p>
	</div>
	</div>
</div> <!-- end footer -->

</body> 
</html> 