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
<div id="head">			
				<div id="header-top">
				</div>
				<div id="header-bottom">
				<div class="wrap-1200px">
				<div class="content">
				<h1> CC Radiated Database </h1>
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
		
		<div id="page-title">
        <h1>Home</h1>
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
				
				
				
				
			
				
				
	<form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post'>
    Import File : <input type="text" name="sel_file" size="20">
    <input type="submit" name="SUBMIT">

	</form>
  			
				
<?php
$host = 'localhost:3306';
$user = 'root';
$pass = 'motorola';
$db = 'ccraddb';
$table1 = 'masterTable';
$table2 = 'optionsTable';
$file = 'export';
$link = mysql_connect($host, $user, $pass) or die("Can not connect." . mysql_error());
mysql_select_db($db) or die("Can not connect.");
  
  echo "success";
  
if(isset($_POST['SUBMIT']))
{ echo "success";
     $fname = $_FILES['sel_file']['name'];
     $chk_ext = explode(".",$fname);
     echo $fname;
     if(strtolower($chk_ext[1]) == "csv")
     {
     
         $filename = $_FILES['sel_file']['tmp_name'];
         $handle = fopen($filename, "r");
			
         while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
         {
            
			$sql = "INSERT into masterTable values('$data[0]','$data[1]','$data[2]')";
            mysql_query($sql) or die(mysql_error());
         }
    
         fclose($handle);
         echo "Successfully Imported";
     }
     else
     {
         echo "Invalid File";
     }    
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