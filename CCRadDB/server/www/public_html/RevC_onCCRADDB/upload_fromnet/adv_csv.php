<?php

// PHP Class for convert HTML2CSV HTML2SQL SQL2CSV UTF-8 to ASCII 
// License BSD (without greetings) by Tomasz Malewski , Poland / Warsaw built 20090104
class adv_csv
{

function adv_utf8_to_ascii($input)	// convert string from utf8 to ascii format 
	{
//	$output=preg_replace('/[^(\x20-\x7F)]*/','', $input);	//	sloooow
	$output=preg_replace ("/[^[:print:]]/",'',$input);	// remove everything not ASCII ex. UTF8 blank
	return ($output);
	}	// utf8_to_ascii

function adv_html_to_csv($input)	// convert html string to CSV format html2csv
	{
	$output=preg_replace ("/^(.*)\<table(.*?)\>|\<\/table\>(.*)$|\<tr(.*?)\>|\<td(.*?)\>|\"|\'/si",'',$input);
	$output2=explode ("</tr>",$output);	// cut one line string to array for each line
	$output='';
	$this->csv_lines='0';
	foreach ($output2 as $output3)
		{
		$output4=explode ("</td>",$output3);	// cut each line for next array (cell)
		foreach ($output4 as $output5)
			{
			$output.= "\"".$output5."\",";
			}	// output 5		
		$output=substr_replace($output,"",-1);	// replace last charcater "," in EOL
		$output.= "\r\n";
		$this->csv_lines++;
		}	// output3
	return ($output);
	}	// html_to_csv

function adv_read_file($filename)	// read static file and push to string
	{
	$file=fopen ($filename,r);
	$this->string=fread ($file,filesize($filename));
//	$this->string=fread ($file,18000);
	fclose ($file);
	}	// adv_read_file

function adv_csv_headers()	// get column name from CVS string and create array
	{
	$output=explode("\r\n",$this->string);
	$output=explode(",",$output[0]);
	$this->csv_head='';
	$this->csv_head_count='';
	foreach ($output as $output2)
		{
		$output2=preg_replace ("/\"/",'',$output2);
		$this->csv_head_name[]=$output2;
		$this->csv_head_count++;
		}	// output2
	}	// adv_csv_headers

function adv_csv_cols_length()	// estimate column length 
	{
	$output=explode("\r\n",$this->string);
	unset ($output[0]);	// remove header row because we want to measure data length not header
	for ($i=0;$i<=$this->csv_head_count;$i++)
		{
		$this->csv_head_len[$i]='0';		// add element to array when 0 length
		}	// for i
	foreach ($output as $output2)
		{
		$output3=explode(",",$output2);
		foreach ($output3 as $key=>$output4)
			{
			if (strlen($output4)-2>$this->csv_head_len[$key])	// remove 2 because ""
				{
			$this->csv_head_len[$key]=strlen($output4)-2;	// remove 2 because ""
//			echo $key.' '.$this->csv_head_len[$key].'-'.$output4.'<br>';
				}	// if strlen output4
			}	// output3
		}	// output 2	
	}	// adv_csv_cols_length

function adv_sql_connect($sql_host,$sql_user,$sql_password,$sql_database)
	{
	$db = mysql_connect($sql_host, $sql_user, $sql_password) or die("Could not connect.");
	if(!$db) 
	die("no db");
	if(!mysql_select_db($sql_database,$db)) 	die("No database selected.");
	}	// adv_sql_connect

function adv_sql_create($table,$mode)	// create table in MySQL after connect according to cvs_head_name & *len
					// mode create column name 0,1,2,3... mode=1 real names
	{
	$sql="CREATE TABLE `$table` ( \r\n `id` int(10) NOT NULL auto_increment,\r\n";
	for ($i=0;$i<=$this->csv_head_count;$i++)
		{
//		echo $this->csv_head_len[$i]." ".$this->csv_head_name[$i]."<br>";
		if ($mode==1)
			{
			if (strlen($this->csv_head_name[$i])<1)	// to avoid bugs overwrite some colname with integer
				{
				$sql.="`$i";	// force number than assoc name cause by bugs
				}
				else
				{
				$sql.="`".$this->csv_head_name[$i];
				}	// else strlen head_name i
			}	// mode
			else
			{
			$sql.="`$i";
			}	// mode else
		if (strlen($this->csv_head_name[$i])<1) {$this->csv_head_name[$i]=$i;}	// safety column name with integer as name
		$sql.="` char(".$this->csv_head_len[$i].") default NULL,\r\n";
		}	// for i
	$sql.="PRIMARY KEY (`id`) \r\n ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
	echo $sql;	// debug query
	mysql_query($sql)  or $this->mysql_error=mysql_error(); 
	}	// adV_sql_create

function adv_sql_drop($table)		// remove table from database be CAREFULL !!!
	{
	mysql_query("DROP TABLE `$table`")  or $this->mysql_error=mysql_error(); 
	}	// drop table

function adv_sql_insert($table,$mode)	// insert CSV data to SQL
					// mode=0 for cols 0,1,2,3.... mode=1 for real names 
	{
	$output=explode ("\r\n",$this->string);
	unset ($output[0]);	// remove head row
	foreach ($output as $output)
		{
		$sql="INSERT INTO `$table` (";
		for ($i=0;$i<$this->csv_head_count;$i++)
			{
			if ($mode==1)
				{
				$sql.="`".$this->csv_head_name[$i]."`,";
				}	// mode
				else
				{
				$sql.="`$i`,";
				}	// mode else
			}	// for i
		$sql=substr_replace($sql,"",-1);	// replace last charcater "," in EOL
		$sql.=") VALUES (";
		$output2=explode (",",$output);
		foreach ($output2 as $key=>$output2)
			{
//			echo "$key=$output2 ";		// debug
			$sql.=$output2.",";
			} 	// foreach output2
		$sql=substr_replace($sql,"",-1);	// replace last charcater "," in EOL
		$sql.=");";
		mysql_query($sql)  or $this->mysql_error=mysql_error(); 
//		echo $sql."<br>";
		}	// foreach output
	}	// adV_sql_insert

function adv_sql_to_csv($table)
	{
	$sql1=mysql_query("select * from `$table` ") or $this->mysql_error=mysql_error(); 
	$i=0;
	while($sql2 = mysql_fetch_assoc($sql1))
		{	// create head row
		foreach ($sql2 as $key=>$sql3)
			{
			if ($i==0)
				{
				$sql.="\"".$i.'",';
				}	// $i 
				else
				{
				$sql.="\"".$sql3.'",';
				}	// else $i
			} // foreach $sql2=>3
		$i++;
		$sql=substr_replace($sql,"",-1);	// replace last charcater "," in EOL
		$sql.="\r\n";
		}	// sql2
	$this->string=$sql;
	}	// adv_sql_to_csv

}	// class adv_csv


php?>