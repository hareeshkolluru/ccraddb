<?php

$host = 'localhost:3306';
$user = 'rootccraddb';
$pass = 'motorola';
$db = 'ccraddb';
$table1 = 'masterTable';
$table2 = 'optionsTable';
$file = 'TestPlan';

$multiple_selection_columns_startat=12;
$multiple_selection_columns_stopat=18;

$link = mysql_connect($host, $user, $pass) or die("Can not connect." . mysql_error());
mysql_select_db($db) or die("Can not connect.");

/*
$sqlquery = $_REQUEST['sqlquery'] ;
$result = mysql_query($sqlquery);
$fields_num = mysql_num_fields($result);
$values = mysql_query($sqlquery);
*/

$result3 = mysql_query("SHOW COLUMNS FROM ".$table1."");
$result4 = mysql_query("SELECT * FROM ". $table2. ""); 

$i = 0;
if (mysql_num_rows($result3) > 0) {
while ($row = mysql_fetch_assoc($result3)) {
$csv_output .= $row['Field'].", ";
$i++;
}
}
$csv_output .= "\n";


 $i=0;
 $j=0;
 $k=0;
 $l=0;
 $m1=0;
 $m2=0;
 $m3=0;
 
while($_POST["txtSiteName_temp"][12][$i])
{ $j=0;
while($_POST["txtSiteName_temp"][13][$j])
{ $k=0;
while($_POST["txtSiteName_temp"][14][$k])
{ $l=0;
while($_POST["txtSiteName_temp"][15][$l])
{ $m1=0;
while($_POST["txtSiteName_temp"][16][$m1])
{ $m2=0;
while($_POST["txtSiteName_temp"][17][$m2])
{ $m3=0;
while($_POST["txtSiteName_temp"][18][$m3])
{
		
				for($column_no=0;$column_no<count($_POST["txtSiteName"]);$column_no++)  
				{				
				switch ($column_no)
				{
				case 12: $_POST["txtSiteName"][$column_no]=$_POST["txtSiteName_temp"][$column_no][$i];
						break;
				case 13: $_POST["txtSiteName"][$column_no]=$_POST["txtSiteName_temp"][$column_no][$j];
						break;
				case 14: $_POST["txtSiteName"][$column_no]=$_POST["txtSiteName_temp"][$column_no][$k];
						break;
				case 15: $_POST["txtSiteName"][$column_no]=$_POST["txtSiteName_temp"][$column_no][$l];
						break;
				case 16: $_POST["txtSiteName"][$column_no]=$_POST["txtSiteName_temp"][$column_no][$m1];
						break;
				case 18: $_POST["txtSiteName"][$column_no]=$_POST["txtSiteName_temp"][$column_no][$m2];
						break;
				case 18: $_POST["txtSiteName"][$column_no]=$_POST["txtSiteName_temp"][$column_no][$m3];
						break;
				}
				
				/*echo "txtSiteName $column_no = ".$_POST["txtSiteName"][$column_no]."<br>";*/
				$csv_output .= $_POST["txtSiteName"][$column_no].",";  
				} 
				$csv_output .= "\n";
$m3++;
}			
$m2++;
}			
$m1++;
}
$l++;
}
$k++;
}
$j++;
}
$i++;
 }



$filename = $file."_".date("Y-m-d_H-i",time());
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $csv_output;
exit;
/*echo "txtSiteName $i = ".$_POST["txtSiteName"][$i]."<br>"; */
?>