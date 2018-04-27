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

$result = mysql_query("LOAD DATA INFILE 'filename.csv' INTO TABLE masterTable FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\r\n' IGNORE 0 LINES");
if (!$result) {die("Query to show fields from table failed");}
?>