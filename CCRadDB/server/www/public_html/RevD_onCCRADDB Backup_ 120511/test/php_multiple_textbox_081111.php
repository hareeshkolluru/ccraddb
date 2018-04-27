<?php
require "config.php";
$file = 'TestPlan';

switch($_POST["txtSiteName"][18])
{
case "LowMidHigh":
$table3 = 'channelsTable_LMH_Rx';break;
case "Every_1_channel_for_all_selected_bands":
$table3 = 'channelsTable';
break;
case "GSM_1channel_WCDMA_10channels_CDMA_20channels_LTE_6RB":
$table3 = 'channelsTable_Desense';
break;
default:
$table3 = 'channelsTable';
break;
}


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
if($i<21)
$csv_output .= $row['Field'].", ";
$i++;
}
}
$csv_output .= "\n";

$unitNumbersInputString = $_POST["txtSiteName_temp"][9][0]; 
$unitNumbers = explode(",", $unitNumbersInputString);
for($i = 0; $i < count($unitNumbers); $i++){
$_POST["txtSiteName_temp"][9][$i] = $unitNumbers[$i];
}

 $i9=0;
 $i12=0;
 $i13=0;
 $i14=0;
 $i15=0;
 $i16=0;
 $i17=0;
 $i18=0;
 
 

while($_POST["txtSiteName_temp"][9][$i9])
{$i12=0;
while($_POST["txtSiteName_temp"][12][$i12])
{ $i13=0;
while($_POST["txtSiteName_temp"][13][$i13])
{ $i14=0;
while($_POST["txtSiteName_temp"][14][$i14])
{ $i15=0;
while($_POST["txtSiteName_temp"][15][$i15])
{ $i16=0;
while($_POST["txtSiteName_temp"][16][$i16])
{ $i17=0;
while($_POST["txtSiteName_temp"][17][$i17])
{ $i18=0;

	   $sqlquerygetchannellist="select ".$_POST["txtSiteName_temp"][17][$i17]." from "/*channelsTable";*/.$table3;
	   $getchannellist = mysql_query($sqlquerygetchannellist);
       $m=0;
	   while ($channelnumber=mysql_fetch_array($getchannellist)){
	   if($channelnumber[0]!=NULL){
	   $_POST["txtSiteName_temp"][18][$m] = $channelnumber[0];
	   $m++;}
       }
	   /*echo "$m";*/
	   	   
while($m!=0)
		{
				for($column_no=0;$column_no<count($_POST["txtSiteName"]);$column_no++)  
				{				
				switch ($column_no)
				{
				/*case 1: $_POST["txtSiteName"][$column_no]=date("Y-m-d");break;*/
				case 9: $_POST["txtSiteName"][$column_no]=$_POST["txtSiteName_temp"][$column_no][$i9];
						break;
				case 12: $_POST["txtSiteName"][$column_no]=$_POST["txtSiteName_temp"][$column_no][$i12];
						break;
				case 13: $_POST["txtSiteName"][$column_no]=$_POST["txtSiteName_temp"][$column_no][$i13];
						break;
				case 14: $_POST["txtSiteName"][$column_no]=$_POST["txtSiteName_temp"][$column_no][$i14];
						break;
				case 15: $_POST["txtSiteName"][$column_no]=$_POST["txtSiteName_temp"][$column_no][$i15];
						break;
				case 16: $_POST["txtSiteName"][$column_no]=$_POST["txtSiteName_temp"][$column_no][$i16];
						break;
				case 17: $_POST["txtSiteName"][$column_no]=$_POST["txtSiteName_temp"][$column_no][$i17];
						break;
				case 18: $_POST["txtSiteName"][$column_no]=$_POST["txtSiteName_temp"][$column_no][$i18];
						break;			
														         
				}
				
				/*echo "txtSiteName $column_no = ".$_POST["txtSiteName"][$column_no]."<br>";*/
				$csv_output .= $_POST["txtSiteName"][$column_no].",";  
				} 
				$csv_output .= "\n";



	
$i18++;
$m--;
}			
$i17++;
}			
$i16++;
}
$i15++;
}
$i14++;
}
$i13++;
}
$i12++;
 }
$i9++;
}

$filename = $file."_".date("Y-m-d_H-i",time());
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $csv_output;
exit;
/*echo "txtSiteName $i = ".$_POST["txtSiteName"][$i]."<br>"; */
?>