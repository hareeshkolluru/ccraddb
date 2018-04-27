<?

require 'adv_csv.php';
$query=new adv_csv;
$query->adv_read_file("input.csv");				// read file and put to $this-> string
//$query->string=$query->adv_utf8_to_ascii($query->string);	// convert $this-> string UTF8 to ASCII
//$query->string=$query->adv_html_to_csv($query->string);	// convert $this-> string HTML to CSV ( often XLS extension )
$query->adv_csv_headers();				// from CSV string build array with column names csv_head_name , and *count
$query->adv_csv_cols_length();				// from CSV string build array csv_head_len contains maximum cell size in each column

// MYSQL
//$query->adv_sql_connect('127.0.0.1','root','password','database');	// connect to MySQL
//	$query->adv_sql_drop('closed');			// drop any table !!!
//	$query->adv_sql_create('closed',0);		// create MYSQL table based on CVS string, mode=0 (1,2,3...) mode=1 (CVScolname,CVScolname,...)
//	$query->adv_sql_insert('closed',0);		// fill MySQL table with data from CVS string
//$query->adv_sql_to_csv('closed');			// dump MySQL table to CVS string incdluding header


echo '<pre>';
print_r ($query);

?>

