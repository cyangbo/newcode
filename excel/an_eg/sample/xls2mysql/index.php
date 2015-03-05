<?php

include_once ("../../an_eg/sample/includes.incls2mysql/includes.in../../an_eg/sample/settings.inconce ("../../sample/xls2mysql/settings.inc");
include_once ("$parser_path/excelparser.php");


if ( !isset($_POST['step']) )
	$_POST['step'] = 0;
	
?>

<html>
<head>

<STYLE>
<!--
body, table, tr, td {font-size: 12px; font-family: Verdana, MS sans serif, Arial, Helvetica, sans-serif}
td.index {font-size: 10px; color: #000000; font-weight: bold}
td.empty {font-size: 10px; color: #000000; font-weight: bold}
td.dt_string {font-size: 10px; color: #000090; font-weight: bold}
td.dt_int {font-size: 10px; color: #909000; font-weight: bold}
td.dt_float {font-size: 10px; color: #007000; font-weight: bold}
td.dt_unknown {font-size: 10px; background-color: #f0d0d0; font-weight: bold}
td.empty {font-size: 10px; background-color: #f0f0f0; font-weight: bold}
-->
</STYLE>
</head>
<body text="#000000" link="#000000" vlink="#000000" alink="#000000" topmargin="0" leftmargin="2" marginwidth="0" marginheight="0">

<table width="100%" align="center" bgcolor="#006699">
<tr>
	<td>&nbsp;</td>
	<td width="60%"><font color="#FFFFFF" size="+2">ABC Excel Parser Pro plugin</font></td>
	<td width="40%" align="right"><font color="#FFFFFF" size="+1">MS Excel->MySQL builder</font></td>
	<td>&nbsp;</td>
</tr>
</table>

<?php

// Outputting fileselect form (step 0)

if ( $_POST['step'] == 0 )
	echo <<<FORM
<table width="100%" border="0" align="center" bgcolor="#7EA9D3">
<tr>
<td>&nbsp;</td>
<td>
<p>&nbsp;</p>
Select Excel file from your local computer
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>

<table border="0">
<form name="exc_upload" method="post" action="" enctype="multipart/form-data">

<tr><td>Excel file:</td><td><input type="file" size=30 name="excel_file"></td></tr>
<tr><td>Use first row as fields name:</td><td><input type="checkbox" name="useheaders"></td></tr>
<tr><td colspan="2" align="right">
<input type="hidden" name="step" value="1">
<input type="button" value="Next" onClick="
javascript:
if( (document.exc_upload.excel_file.value.length==0))
{ alert('You must specify filename first'); return; }; submit();
"></td></tr>


</form>
</table>

</td>
</tr>


<tr>
<td>&nbsp;</td>
<td align="right">
<p>&nbsp;</p>
<a href="http://www.zakkis.ca" style="font-size: 9px; text-decoration: none; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">ZAKKIS Tech. All Rights Reserved.</a>&nbsp;&nbsp;
</td>
</tr>
</table>

FORM;

// Processing excel file (step 1)

if ( $_POST['step'] == 1 ) {
	
	echo "<br>";
	
	// Uploading file
	
	$excel_file = $_FILES['excel_file'];
	if( $excel_file )
		$excel_file = $_FILES['excel_file']['tmp_name'];

	if( $excel_file == '' ) fatal("No file uploaded");
	
	move_uploaded_file( $excel_file, 'upload/' . $_FILES['excel_file']['name']);	
	$excel_file = 'upload/' . $_FILES['excel_file']['name'];
	
	
	$fh = @fopen ($excel_file,'rb');
	if( !$fh ) fatal("No file uploaded");
	if( filesize($excel_file)==0 ) fatal("No file uploaded");

	$fc = fread( $fh, filesize($excel_file) );
	@fclose($fh);
	if( strlen($fc) < filesize($excel_file) )
		fatal("Cannot read file");	
	
	
	// Check excel file
	
	$exc = new ExcelFileParser;
	$res = $exc->ParseFromString($fc);
	
	switch ($res) {
		case 0: break;
		case 1: fatal("Can't open file");
		case 2: fatal("File too small to be an Excel file");
		case 3: fatal("Error reading file header");
		case 4: fatal("Error reading file");
		case 5: fatal("This is not an Excel file or file stored in Excel < 5.0");
		case 6: fatal("File corrupted");
		case 7: fatal("No Excel data found in file");
		case 8: fatal("Unsupported file version");

		default:
			fatal("Unknown error");
	}
	
		
	// Pricessing worksheets
	
	$ws_number = count($exc->worksheet['name']);
	if( $ws_number < 1 ) fatal("No worksheets in Excel file.");
	
	$ws_number = 1; // Setting to process only the first worksheet
	
	for ($ws_n = 0; $ws_n < $ws_number; $ws_n++) {
		
		$ws = $exc -> worksheet['data'][$ws_n]; // Get worksheet data
			
		if ( !$exc->worksheet['unicode'][$ws_n] )
			$db_table = $ws_name = $exc -> worksheet['name'][$ws_n];
		else 	{
			$ws_name = uc2html( $exc -> worksheet['name'][$ws_n] );
			$db_table = convertUnicodeString ( $exc -> worksheet['name'][$ws_n] );
			}
		
		echo "<div align=\"center\">Worksheet: <b>$ws_name</b></div><br>";

		
		$max_row = $ws['max_row'];
		$max_col = $ws['max_col'];
		
		if ( $max_row > 0 && $max_col > 0 )
			getTableData ( &$ws, &$exc ); // Get structure and data of worksheet
		else fatal("Empty worksheet");
		
	}
	
}

if ( $_POST['step'] == 2 ) { // Adding data into mysql (step 2)
		
	echo "<br>";
	
	extract ($_POST);
		
	$db_table = ereg_replace ( "[^a-zA-Z0-9$]", "", $db_table );
	$db_table = ereg_replace ( "^[0-9]+", "", $db_table );
	
	if ( empty ( $db_table ) )
		$db_table = "Table1";
	
	// Database connect check
	
	if ( !$link = @mysql_connect ($db_host, $db_user, $db_pass) )
        fatal("Database connection error. Please check connection settings.");
	
	if ( !$connect = mysql_select_db ($db_name ) )
        fatal("Wrong database name.");
		
	if ( empty ($db_table) )
		fatal("Empty table name.");
	
	if ( !isset ($fieldcheck) )
		fatal("No fields selected.");
	
	if ( !is_array ($fieldcheck) )
		fatal("No fields selected.");
	
	$tbl_SQL .= "CREATE TABLE IF NOT EXISTS $db_table ( ";
	
	foreach ($fieldcheck as $fc)
		if ( empty ( $fieldname[$fc] ) )
			fatal("Empty fieldname for selected field $fc.");
		else {
			// Prepare table structure
			
			$fieldname[$fc] = ereg_replace ( "[^a-zA-Z0-9$]", "", $fieldname[$fc] );
			$fieldname[$fc] = ereg_replace ( "^[0-9]+", "", $fieldname[$fc] );
			if ( empty ( $fieldname[$fc] ) )
					$fieldname[$fc] = "field" . $fc;
			
			$tbl_SQL .= $fieldname[$fc] . " text NOT NULL,";
			
		}
	
	$tbl_SQL = rtrim($tbl_SQL, ',');
	
	$tbl_SQL .= ") TYPE=MyISAM";

	
	$fh = @fopen ($excel_file,'rb');
	if( !$fh ) fatal("No file uploaded");
	if( filesize($excel_file)==0 ) fatal("No file uploaded");

	$fc = fread( $fh, filesize($excel_file) );
	@fclose($fh);
	if( strlen($fc) < filesize($excel_file) )
		fatal("Cannot read file");		
	
	
	$exc = new ExcelFileParser;
	$res = $exc->ParseFromString($fc);
	
	switch ($res) {
		case 0: break;
		case 1: fatal("Can't open file");
		case 2: fatal("File too small to be an Excel file");
		case 3: fatal("Error reading file header");
		case 4: fatal("Error reading file");
		case 5: fatal("This is not an Excel file or file stored in Excel < 5.0");
		case 6: fatal("File corrupted");
		case 7: fatal("No Excel data found in file");
		case 8: fatal("Unsupported file version");

		default:
			fatal("Unknown error");
	}
	
	// Pricessing worksheets
	
	$ws_number = count($exc->worksheet['name']);
	if( $ws_number < 1 ) fatal("No worksheets in Excel file.");
	
	$ws_number = 1; // Setting to process only the first worksheet
	
	for ($ws_n = 0; $ws_n < $ws_number; $ws_n++) {
		
		$ws = $exc -> worksheet['data'][$ws_n]; // Get worksheet data
			
		$max_row = $ws['max_row'];
		$max_col = $ws['max_col'];
		
		if ( $max_row > 0 && $max_col > 0 )
			$SQL = prepareTableData ( &$exc, &$ws, $fieldcheck, $fieldname );
		else fatal("Empty worksheet");
		
	}
	
		
	if (empty ( $SQL ))
		fatal("Output table error");


	// Output data into database
	
	
	// Drop table
	
	if ( isset($db_drop) ) {
	
		$drop_tbl_SQL = "DROP TABLE IF EXISTS $db_table";
		
		if ( !mysql_query ($drop_tbl_SQL) )
			fatal ("Drop table error");
	
	}
	
	// Create table
	
	if ( !mysql_query ($tbl_SQL) )
		fatal ("Create table error");
	
	$sql_pref = "INSERT INTO " . $db_table . " SET ";
	
	$err = "";	
	$nmb = 0; // Number of inserted rows
	
	foreach ( $SQL as $sql ) {
	
		$sql = $sql_pref . $sql;
		
		if ( !mysql_query ($sql) ) {
		$err .= "<b>SQL error in</b> :<br>$sql <br>";
			
		}
		else $nmb++;
			
	}
	
	if ( empty ($err) ) {
		echo <<<SUCC
		<br><br>
		<div align="center">
		<b>Output operations processed successfully.</b><br><br>
		$nmb rows inserted into table "$db_table"<br>
		<br><a href="">Begin</a>
		</div>
SUCC;
	}
	else 	echo "<br><br><font color=\"red\">$err</font><br><br><div align=\"center\"><a href=\"\">Begin</a></div>";
	
	@unlink ($excel_file);

	echo <<<ZAKKIS
	
	<br><br>
	<div align="right">
	<a href="http://www.zakkis.ca" style="font-size: 9px; text-decoration: none; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">ZAKKIS Tech. 2003  All Rights Reserved.</a>&nbsp;&nbsp;
	</div>
	
ZAKKIS;
	
}		
		
?>