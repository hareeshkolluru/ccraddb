<?php

$host = 'localhost:3306';
$user = 'root';
$pass = 'motorola';
$db = 'ccraddb';
$table1 = 'masterTable';
$table2 = 'optionsTable';
$file = 'export';

$multiple_selection_columns_startat=12;
$multiple_selection_columns_stopat=16;

$link = mysql_connect($host, $user, $pass) or die("Can not connect." . mysql_error());
mysql_select_db($db) or die("Can not connect.");


$sqlquery = $_REQUEST['sqlquery'] ;
$result3 = mysql_query($sqlquery);
$fields_num = mysql_num_fields($result);
$values = mysql_query($sqlquery);


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

/*
$calcnoofchecksineachcolumn[count($_POST["txtSiteName"])]=0;
$calcnoofrows=1;

/* this is to get noofrow*/
/*for($i=$multiple_selection_columns_startat;$i<$multiple_selection_columns_stopat;$i++)
	{
		for ($j=0;$j<10;$j++)
		{
			if ($_POST["txtSiteName_temp"][$i][$j]=="on")
				{$calcnoofchecksineachcolumn[$i]+=1;	}
		}
		/*echo "count_row = ". $i ."    ".$calcnoofchecksineachcolumn[$i];
		echo"</br>";*/
/*		$calcnoofrows*=$calcnoofchecksineachcolumn[$i];
	}

	echo "count_total = ".$calcnoofrows ."</br>";

/* to get result2 ina array*/

/*
$i=0;
while ($row3 = mysql_fetch_array($result4))
{ 
 $result4_in_array[$i]=$row3;
 $i++;
}



/*for ($i=0;$i<12;$i++)
  { echo "<tr>";
	for ($j=12;$j<13;$j++)
	{
		echo "<td>".$result4_in_array[$i][$j]."</td>";
	}
	echo "</tr>";
	echo "</br>";	
  }
*/
 
 */
 
 for ($i=0;$i<20;$i++)
  { echo "<tr>";
	echo "<td>".$i."</td>";
	for ($j=0;$j<20;$j++)
	{
		echo "<td>".$_POST["txtSiteName_temp"][$i][$j]."</td>";
	}
	echo "</tr>";
	echo "</br>";	
  }
 
 
  
 
 echo "<table border='1'>";
 
 $i=0;
 $j=0;
 $k=0;
 
while($_POST["txtSiteName_temp"][12][$i])
{ $j=0;
while($_POST["txtSiteName_temp"][13][$j])
{ $k=0;
while($_POST["txtSiteName_temp"][14][$k])
{
		
			echo "<tr>";
			echo "<td>".$_POST["txtSiteName_temp"][12][$i]."</td>";
			echo "<td>".$_POST["txtSiteName_temp"][13][$j]."</td>";
			echo "<td>".$_POST["txtSiteName_temp"][14][$k]."</td>";
			echo "</tr>";
$k++;
}
$j++;
}
 $i++;
 }
 echo "</table>";
 
 
 

/*
for($i=0;$i<count($_POST["txtSiteName"]);$i++)  
{ 
$j=0; 
while($_POST["txtSiteName_temp"][$i][$j]=="on")
{
$_POST["txtSiteName"][$i]="found you".$result4_in_array[$j][$i];
$j++;
}
echo "txtSiteName $i = ".$_POST["txtSiteName"][$i]."<br>";
$csv_output .= $_POST["txtSiteName"][$i].",";  
} 
$csv_output .= "\n";

/*

/*
$filename = $file."_".date("Y-m-d_H-i",time());
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $csv_output;
exit;
/*echo "txtSiteName $i = ".$_POST["txtSiteName"][$i]."<br>"; */
?>