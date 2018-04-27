<?php
  $aDoor = $_POST['formDoor'];
  if(empty($aDoor))
  {
    echo("You didn't select any buildings.");
  }
  else
  {
    $N = count($aDoor);
 
    echo("You selected $N door(s): ");
	
	
	echo($aDoor[0] . " ");
	/*
	echo($aDoor[1] . " ");
	
	echo($aDoor[2] . " ");
	
	echo($aDoor[3] . " ");
	
	
    for($i=0; $i < $N; $i++)
    {
      echo($aDoor[$i] . " ");
    }*/
  }
?>
