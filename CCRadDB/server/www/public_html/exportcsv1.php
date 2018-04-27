<?php

$host = 'localhost:3306';
$user = 'root';
$pass = 'motorola';
$db = 'ccraddb';
$table = 'masterTable';
$file = 'export';

$link = mysql_connect($host, $user, $pass) or die("Can not connect." . mysql_error());
mysql_select_db($db) or die("Can not connect.");




$sqlquery = $_REQUEST['sqlquery'] ;

/*
$result = mysql_query($sqlquery);
$fields_num = mysql_num_fields($result);
$values = mysql_query($sqlquery);


$result = mysql_query("SHOW COLUMNS FROM ".$table."");
$i = 0;
if (mysql_num_rows($result) > 0) {
while ($row = mysql_fetch_assoc($result)) {
$csv_output .= $row['Field'].", ";
$i++;
}
}
$csv_output .= "\n";

$values = mysql_query("SELECT * FROM ".$table."");
while ($rowr = mysql_fetch_row($values)) {
for ($j=0;$j<$i;$j++) {
$csv_output .= $rowr[$j].",";
}
$csv_output .= "\n";
}
*/


					$result = mysql_query($sqlquery);
					if (!$result) {die("Query to show fields from table failed");}


					  $fields_num = mysql_num_fields($result);

						
						for($i=0; $i<$fields_num; $i++)
						{
							$field = mysql_fetch_field($result);
							$csv_output .={$field->name}.", ";
						}
						
						$csv_output .= "\n";
						
						while($row = mysql_fetch_row($result))
						{
							
							foreach($row as $cell)
								$csv_output .= $cell.",";

							$csv_output .= "\n";
						}		  


$filename = $file."_".date("Y-m-d_H-i",time());
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $csv_output;
exit;
?>