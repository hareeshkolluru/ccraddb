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
				
<form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post' enctype="multipart/form-data">
<label for="file">Please choose datafile:</label>
<input type="file" name="file" id="file" /> <br />
<!--<input type="hidden" name="unique_id" value="[<?php echo md5(uniqid())?>]">-->
<input type="submit" name="submit" value="Submit" />
</form>
  			
				
<?php

/*


session_start();
if(isset($_POST['unique_id'])){
    $unique_id = $_POST['unique_id'];
    $ck_submital = isset($_SESSION['ck_submital']) ? $_SESSION['ck_submital'] : array();
    if(isset($ck_submital[$unique_id])){
        unset($_POST['my_form']);
        session_destroy();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
        $ck_submital[$unique_id] = TRUE;
        $_SESSION['ck_submital'] = $ck_submital;
    }
}
 
if(isset($_POST['my_form'])) {
*/

		$host = 'localhost:3306';
		$user = 'rootccraddb';
		$pass = 'motorola';
		$db = 'ccraddb';
		$table1 = 'masterTable';
		$table2 = 'optionsTable';
	
		$link = mysql_connect($host, $user, $pass) or die("Can not connect." . mysql_error());
		mysql_select_db($db) or die("Can not connect.");

$result1 = mysql_query("SHOW COLUMNS FROM ".$table1."");
$result2 = mysql_query("Select * from ".$table1."");
$noofrecordsbeforeupload = mysql_num_rows($result2);

$rec=0;

$check1=0;
$check2=1;
$check3=0;
$check4=0;


/*********************************************begin of step 1*********************************************************/
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {

					echo "<h1>Additional Comments</h1>";
					echo "<hr style=\"color: #717171; height: 1px;margin:-10px 0px 0px 0px;\">";
					echo "1.The file you are tring to upload is in ".$_FILES["file"]["type"] . " format.";
					if ($_FILES["file"]["type"]=="application/vnd.ms-excel" || "text/csv"){$check1=1; echo " This is the right format. <img src=\"right.png\"/></br>";} 
					else {echo "This is a wrong format. <img src=\"wrong.png\"/></br>";} 					  
					  
					/*$f = fopen(/*'upload/'.*//*$_FILES['file']['tmp_name'], 'r');*/
					/*if($f){
					while (($data = fgetcsv($f,",")) != FALSE){
					$rec++;
					for($i=0;$i<21;$i++)
						{	
						if(!$data[$i])
							{
							$check2=0;	 
							echo "row no:".$rec."Column no:".$i."is empty"."<img src=\"wrong.png\"/>"."</br>";
							}
						}
					}
					}*/
					/*if($check2==1)
						{
						echo "2.The file you are trying to upload has all the manadatory cells filled.<img src=\"right.png\"/>";
						echo "</br>3.Total no of non-zero datarecords(rows) found:".$rec."<img src=\"right.png\"/>";
						}*/
					
					if($check1==1)
					{	
					$rec=0;
					$f = fopen(/*'upload/'.*/$_FILES['file']['tmp_name'], 'r');
					if($f){
					while (($data = fgetcsv($f,",")) != FALSE){
							$rec++;
								if($rec==1)
								{
								continue;
								}
								else
								{								
								$check2=1;								
								for($i=0;$i<21;$i++)
									{											
										if($data[$i]!=NULL)
										{
										echo $data[$i];
										$check2=0;										
										}
									}			
								if($check2==0)
								{	echo "&#62;&#62;&#62;&#160;&#160;&#160;row no:".$rec."has blank cells. So this row will not be added/updated in the database"."<img src=\"wrong.png\"/>"."</br>";	}
								/*if($check2==1)
								{								
								$query = "REPLACE INTO ".$table1." VALUES("."'".implode("','", $data).$dct_login."')";
								//echo $query;
								$query = substr($query,0,-3)."')";			
								echo $query;
								echo "<br>";
								/*mysql_query($query) or die("Query to show fields from table failed")*/;
								/*if(mysql_query($query)) {$check3=1;}        		
								}*/
								}
							
					}

					if($check3==1)
					echo "</br>4.Database updated successful<img src=\"right.png\"/>";
					
					$result2 = mysql_query("Select * from ".$table1."");
					$noofrecordsafterupload = mysql_num_rows($result2);
										
					echo "</br> 5.Out of the ".$rec." total number of datarecords(rows) found,  Number of datarecords added to database=".($noofrecordsafterupload-$noofrecordsbeforeupload)."   AND  Number of datarecords updated in the database= ".($rec-($noofrecordsafterupload-$noofrecordsbeforeupload))."<img src=\"right.png\"/>";
					
					$handle=fclose($f);
				}
				}
/*if($handle){echo "</br> file closed";}else {echo "</br>file not closed";}*/
	} 
/*}*/
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