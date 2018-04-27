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
 
<body > 
			<div id="head">			
				<div id="header-top">
				</div>
				<div id="header-bottom">
				<div class="wrap-1200px">
				<div id="header-center">
				</div>
				</div>
				</div>
				<div id="zen">			
				</div>
			</div>
	
			<!--<div id="styleswitcher">
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
				</div>-->
		<!--</div>--> <!-- end header -->
		
<div id="wrapper">		
		
<div id="modernbricksmenu">
<ul>
<li style="margin-left: 1px"><a href="#" title="Home">Home</a></li>
<li id="current"><a href="#" title="New">Database Operations</a></li>
<li><a href="#"  title="Revised">Graphs - One Unit</a></li>
<li><a href="#"  title="Tools">Graphs - Multiple Units</a></li>	
<li><a href="#"  title="DHTML Forums">Histograms</a></li>	
</ul>
</div>
<div id="modernbricksmenuline">&nbsp;</div>
  
		
	
	
        </div>

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
		
				
				<form action="<?php echo $PHP_SELF;?>" method="post" >
				  Write your SQL query here: <br>
				  <textarea name="sqlquery" rows="5" cols="200">
				  </textarea><br />
				  <input type="submit" />
				</form>
				
				
				
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