<?php
				
					require "config.php";								
					$sqlquery="select * from ". $table1." where ";
					
					$i=0;
					while(($_POST["columnvalue"][$i]))				
					{
						if($_POST["operator1"][$i]=='=')
						{
						$sqlquery.=($_POST["searchcolumn"][$i])." ".($_POST["operator1"][$i])." '".($_POST["columnvalue"][$i])."' ".($_POST["operator2"][$i])." ";	
						}
						else
						{
						$sqlquery.=($_POST["searchcolumn"][$i])." ".($_POST["operator1"][$i])." '%".($_POST["columnvalue"][$i])."%' ".($_POST["operator2"][$i])." ";	
						}						
					$i++;
					}					
													
					$sqlquery = substr($sqlquery,0,-3);
					/*echo " your query is : ";	
					echo $sqlquery;	
					echo "</br>";
					echo "</br>";*/
					$noofdatarecordsfound=0;
					
					$result = mysql_query($sqlquery);
					if (!$result) {die("Query to show fields from table failed");}
					  $fields_num = mysql_num_fields($result);
/*
					
echo "Result"; /*{$table}";*/
/*					echo "<table border='1'id=\"hor-minimalist-b\"><tr>";
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



*/

for($i=0; $i<$fields_num; $i++)
{
	$field = mysql_fetch_field($result);
	$csv_output .=$field->name.",";
}
	$csv_output .= "\n";
					
while($row = mysql_fetch_row($result))
	{
	$noofdatarecordsfound++;
	foreach($row as $cell)
	$csv_output.=$cell.",";
	$csv_output .= "\n";	
	}	

if($noofdatarecordsfound==0)
echo "<script type=\"text/javascript\">alert(\"Your search did not match any data entries. \");</script>";

$filename = "download"."_".date("Y-m-d_H-i",time());
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $csv_output;
exit;						
						
					
						
					mysql_close($con);				
				?>