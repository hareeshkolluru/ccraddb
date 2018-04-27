<?php

function standard_deviation($aValues, $bSample = false)
{
    $fMean = array_sum($aValues) / count($aValues);
    $fVariance = 0.0;
    foreach ($aValues as $i)
    {
        $fVariance += pow($i - $fMean, 2);
    }
    $fVariance /= ( $bSample ? count($aValues) - 1 : count($aValues) );
    return (float) sqrt($fVariance);
}


function average($array){
$sum = array_sum($array);
$count = count($array);
return $sum/$count;
}


function deviation ($array){

$avg = average($array);
foreach ($array as $value) {
$variance[] = pow($value-$avg, 2);
}
$deviation = sqrt(average($variance));
return $deviation;
}
			
					require "config.php";								
					$sqlquery="select data from ". $table1." where ";
					
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

while($row = mysql_fetch_row($result))
	{
	$noofdatarecordsfound++;
	foreach($row as $cell)
	$data[$noofdatarecordsfound]=$cell;
	}	
$standardeviation=deviation($data);
	
echo "$noofdatarecordsfound"."number of records found"."$standardeviation";


if($noofdatarecordsfound==0)
echo "<script type=\"text/javascript\">alert(\"Your search did not match any data entries. \");</script>";

							
				?>