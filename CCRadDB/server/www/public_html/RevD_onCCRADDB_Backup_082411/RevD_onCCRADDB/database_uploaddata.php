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
<h1>Step 1:</h1>
<hr style="color: #717171; height: 1px;margin:-10px 0px 0px 0px">
				
<form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post' enctype="multipart/form-data">
<label for="file">Please choose datafile:</label>
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

$check1=0;
$check2=1;
$check3=0;
$check4=0;

if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
/* echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
 */ 

echo "<h1>Step 2:</h1>";
echo "<hr style=\"color: #717171; height: 1px;margin:-10px 0px 0px 0px;\">";
echo "Check 1: Is the file you are tring to upload in csv format? </br>";
echo "The file you are tring to upload is in ".$_FILES["file"]["type"] . " format";
if ($_FILES["file"]["type"]=="application/vnd.ms-excel"){$check1=1; echo "<img src=\"right.png\"/>";} 
else {echo "<img src=\"wrong.png\"/>";} 
  
  /*move_uploaded_file($_FILES["file"]["tmp_name"],      "upload/" . $_FILES["file"]["name"]);
  echo "Stored in: " . "upload/" . $_FILES["file"]["name"];*/


  
$f = fopen(/*'upload/'.*/$_FILES['file']['tmp_name'], 'r');
/*if($f){echo "</br>file opened</br>";}else {echo "</br>file not opened";}*/


echo "</br>Check 2: Does the file you are trying to upload has all the manadatory cells filled ? </br>";

while (($data = fgetcsv($f,",")) !== FALSE){
$rec++;
for($i=0;$i<22;$i++)
	{	
	if(!$data[$i])
		{
		$check2=0;	 
		echo "row no:".$rec."Column no:".$i."is empty"."<img src=\"wrong.png\"/>";
		}
	}
}
if($check2==1)
	{
	echo "total no of rows found:".$rec."<img src=\"right.png\"/>";
	}

$rec=0;
while (($data = fgetcsv($f,",")) !== FALSE){
        $rec++;
			if($rec==1)
			{
			continue;
			}
			else
			{
			$query = "INSERT INTO ".$table1." VALUES("."'".implode("','", $data) .")";
			$query = substr($query,0,-3).")";
			echo $query;
			mysql_query($query) or die("Query to show fields from table failed");
         		
			}
		
}
$handle=fclose($f);
if($handle){echo "</br> file closed";}else {echo "</br>file not closed";}
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