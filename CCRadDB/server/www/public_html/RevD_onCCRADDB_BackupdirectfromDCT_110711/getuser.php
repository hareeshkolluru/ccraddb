<?php
		$q=$_GET["q"];
		$host = 'localhost:3306';
		$user = 'rootccraddb';
		$pass = 'motorola';
		$db = 'ccraddb';
		$table1 = 'masterTable';
		$table2 = 'optionsTable';
		
		$link = mysql_connect($host, $user, $pass) or die("Can not connect." . mysql_error());
		mysql_select_db($db) or die("Can not connect.");

echo "<select name=\"modification\">
<option value=''>Select one</option>";		
$result1 = mysql_query("SELECT * FROM masterTable WHERE isThisUnitAsbuiltOrModified = '".$q."'");
while($row1 = mysql_fetch_array($result1)){
echo "<option value='".$row1[11]."'>".$row1[11]."</option>";
}
echo "</select>";
?>
