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
<li style="margin-left: 1px"><a href="index.html" title="Home">Home</a></li>
<li id="current"><a href="database_createtestplan.php" title="New">Database Operations</a>

<ul>
	<li><a href="database_createtestplan.php">Create Testplan</a></li>
	<li><a href="database_uploaddata.php">Upload Data</a></li>
	<li><a href="database_downloaddata.php">Download Data</a></li>
	<li><a href="database_editdata.php">Edit Data</a></li>
	<li><a href="database_writesql.php">Write SQL Code</a></li>
</ul>





</li>
<li><a href="#"  title="Revised">Graphs - One Unit</a></li>
<li><a href="#"  title="Tools">Graphs - Multiple Units</a></li>	
<li><a href="#"  title="DHTML Forums">Histograms</a></li>	
</ul>
</div>
<div id="modernbricksmenuline">&nbsp;</div>
  
		
	
	
	

<div id="outer1">				
						<div id="navcontainer">
						<ul id="navlist">
						<li><b>Database Operations</b></li>
						<li id="active"><a href="database_createtestplan.php" id="current">Create a testplan from template</a></li>
						<li><a href="database_uploaddata.php">Upload data into the database</a></li>
						<li><a href="database_downloaddata.php">Download data from the database</a></li>
						<li><a href="database_editdata.php">Edit/Update data in the database</a></li>
						<li><a href="database_writesql.php">Write SQL query to interact with database</a></li>
						</ul>
						</div>
			</div>




			<div id="outer2">
			
		
			

				<div class="content">			
				
				
					<br/>	
				
				
				
				
			
				
				

<form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post' enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>
  			
				
<?php
$host = 'localhost:3306';
$user = 'rootccraddb';
$pass = 'motorola';
$db = 'ccraddb';
$table1 = 'masterTable';
$table2 = 'optionsTable';
$link = mysql_connect($host, $user, $pass) or die("Can not connect." . mysql_error());
mysql_select_db($db) or die("Can not connect.");

$rec=0;
  


if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  

  
  /*move_uploaded_file($_FILES["file"]["tmp_name"],      "upload/" . $_FILES["file"]["name"]);
  echo "Stored in: " . "upload/" . $_FILES["file"]["name"];*/
  
$f = fopen(/*'upload/'.*/$_FILES['file']['tmp_name'], 'r');
while ($data=fgetcsv($f)){
        echo "inside";
		$rec++;
			if($rec==1)
			{
			continue;
			}
			else
			{
			$query = "INSERT INTO masterTable VALUES(". implode("','", $data) .")";
			$result10 = mysql_query($query);
			if (!$result10) {die("Query to show fields from table failed");}
			
			}
		
}
fclose($f);
 } 

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