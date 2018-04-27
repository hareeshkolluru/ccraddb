<?php

		$host = 'localhost:3306';
		$user = 'rootccraddb';
		$pass = 'motorola';
		$db = 'ccraddb';
		$table1 = 'masterTable';
		$table2 = 'optionsTable';
			
		$link = mysql_connect($host, $user, $pass) or die("Can not connect." . mysql_error());
		mysql_select_db($db) or die("Can not connect.");
?>