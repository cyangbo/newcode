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
td.dt_date  {font-size: 10px; color: #008080; font-weight: bold}
td.dt_unknown {font-size: 10px; background-color: #f0d0d0; font-weight: bold}
td.empty {font-size: 10px; background-color: #f0f0f0; font-weight: bold}
.border {
	border: thin solid #666666;
}
table {
border: 1px solid #666666;
border-collapse:collapse
}
td {
	border: 1px solid #666666;
	border-collapse:collapse;
}

-->
</STYLE>
</head>
<body bgcolor="#ffffff" text="#000000" topmargin="0" leftmargin="10" marginwidth="0" marginheight="0" link="#000000" vlink="#000000" alink="#000000">

<table width="100%" bgcolor="#006699">
<tr>
	<td>&nbsp;</td>
	<td><font size="+3" color="#FFFFFF">ABC Excel Parser Pro</font></td>
	<td>&nbsp;</td>
</tr>
</table>

<p>&nbsp;</p>

<?php
require "../../an_eg/excelparser.php";
////td.dt_string {font-size: 10px; color: #000090; font-weight: bold}

function getmicrotime() {
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
}

function uc2html($str) {
	$ret = '';
	for( $i=0; $i<strlen($str)/2; $i++ ) {
		$charcode = ord($str[$i*2])+256*ord($str[$i*2+1]);
		$ret .= '&#'.$charcode;
	}
	return $ret;
}

function show_time() {
	global $time_start,$time_end;

	$time = $time_end - $time_start;
	echo "Parsing done in $time seconds<hr size=1><br>";
}

function fatal($msg = '') {
	echo '[Fatal error]';
	if( strlen($msg) > 0 )
		echo ": $msg";
	echo "<br>\nScript terminated<br>\n";
	if( $f_opened) @fclose($fh);
	exit();
};

$err_corr = "Unsupported format or file corrupted";

$excel_file_size;
$excel_file = $_FILES['excel_file'];
if( $excel_file )
	$excel_file = $_FILES['excel_file']['tmp_name'];

if( $excel_file == '' ) fatal("No file uploaded");

$exc = new ExcelFileParser("debug.log", ABC_NO_LOG);//ABC_NO_LOG ABC_VAR_DUMP);

$style = $_POST['style'];
if( $style == 'old' )
{
	$fh = @fopen ($excel_file,'rb');
	if( !$fh ) fatal("No file uploaded");
	if( filesize($excel_file)==0 ) fatal("No file uploaded");
	$fc = fread( $fh, filesize($excel_file) );
	@fclose($fh);
	if( strlen($fc) < filesize($excel_file) )
		fatal("Cannot read file");
		
	$time_start = getmicrotime();
	$res = $exc->ParseFromString($fc);
	$time_end = getmicrotime();
}
elseif( $style == 'segment' )
{
	$time_start = getmicrotime();
	$res = $exc->ParseFromFile($excel_file);
	$time_end = getmicrotime();
}

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

/*
print '<pre>';
print_r( $exc );
print '</pre>';
exit;
*/

show_time();

echo <<<LEG
<b>Legend:</b><br><br>
<table border=1 cellspacing=0 cellpadding=0>
<tr><td>Data type</td><td>Description</td></tr>
<tr><td class=empty>&nbsp;</td><td class=index>An empty cell</td></tr>
<tr><td class=dt_string>ABCabc</td><td class=index>String</td></tr>
<tr><td class=dt_int>12345</td><td class=index>Integer</td></tr>
<tr><td class=dt_float>123.45</td><td class=index>Float</td></tr>
<tr><td class=dt_date>123.45</td><td class=index>Date</td></tr>
<table>
<br><br>

LEG;
/*
print "<pre>";
print_r ($exc->worksheet);
print_r($exc->sst);
print "</pre>";
*/
	for( $ws_num=0; $ws_num<count($exc->worksheet['name']); $ws_num++ )
	{
		print "<b>Worksheet: \"";
		if( $exc->worksheet['unicode'][$ws_num] ) {
			print uc2html($exc->worksheet['name'][$ws_num]);
		} else
			print $exc->worksheet['name'][$ws_num];

		print "\"</b>";
		$ws = $exc->worksheet['data'][$ws_num];

		if( is_array($ws) &&
		    isset($ws['max_row']) && isset($ws['max_col']) ) {
		 echo "\n<br><br><table border=1 cellspacing=0 cellpadding=2>\n";

		 print "<tr><td>&nbsp;</td>\n";
		 for( $j=0; $j<=$ws['max_col']; $j++ ) {
			print "<td class=index>&nbsp;";
			if( $j>25 ) print chr((int)($j/26)+64);
			print chr(($j % 26) + 65)."&nbsp;</td>";
		 }

		 for( $i=0; $i<=$ws['max_row']; $i++ ) {
		  print "<tr><td class=index>".($i+1)."</td>\n";
		  if(isset($ws['cell'][$i]) && is_array($ws['cell'][$i]) ) {
		   for( $j=0; $j<=$ws['max_col']; $j++ ) {

			if( ( is_array($ws['cell'][$i]) ) &&
			    ( isset($ws['cell'][$i][$j]) )
			   ){

			 // print cell data
			 print "<td class=\"";
			 $data = $ws['cell'][$i][$j];

			 $font = $ws['cell'][$i][$j]['font'];
			 $style = " style ='".ExcelFont::ExcelToCSS($exc->fonts[$font])."'";

		   switch ($data['type']) {
			// string
			case 0:
				print "dt_string\"".$style.">";
				$ind = $data['data'];
				if( $exc->sst['unicode'][$ind] ) {
					$s = uc2html($exc->sst['data'][$ind]);
				} else
					$s = $exc->sst['data'][$ind];
				if( strlen(trim($s))==0 )
					print "&nbsp;";
				else
					print $s;
				break;
			// integer number
			case 1:
				print "dt_int\"".$style.">&nbsp;";
				print $data['data'];
				break;
			// float number
			case 2:
				print "dt_float\"".$style.">&nbsp;";
				echo $data['data'];
				break;
			// date
			case 3:
				print "dt_date\"".$style.">&nbsp;";

				$ret = $data[data];//str_replace ( " 00:00:00", "", gmdate("d-m-Y H:i:s",$exc->xls2tstamp($data[data])) );
				echo ( $ret );
				break;
			default:
				print "dt_unknown\"".$style."> &nbsp;";
				break;
		   }
			 print "</td>\n";
			} else {
				print "<td class=empty>&nbsp;</td>\n";
			}
		   }
		  } else {
			// print an empty row
			for( $j=0; $j<=$ws['max_col']; $j++ )
				print "<td class=empty>&nbsp;</td>";
			print "\n";
		  }
		  print "</tr>\n";
		 }

		 echo "</table><br>\n";
		} else {
			// emtpty worksheet
			print "<b> - empty</b><br>\n";
		}
		print "<br>";
	}

/*	print "Formats<br>";
	foreach($exc->format as $value) {
		printf("( %x )",array_search($value,$exc->format));
		print htmlentities($value,ENT_QUOTES);
		print "<br>";
	}

    print "XFs<br>";
	for( $i=0;$i<count($exc->xf['format']);$i++) {
		printf ("(%x)",$i);
		printf (" format (%x) font (%x)",$exc->xf['format'][$i],$exc->xf['font'][$i]);

		print "<br>";
	}
*/


?>

<p>&nbsp;</p>

<table width="100%"><tr><td width="100%" align="right"><a href="http://www.zakkis.ca" style="font-size: 9px; text-decoration: none; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">ZAKKIS Tech. All Rights Reserved.</a>&nbsp;&nbsp;</td></tr></table>

</body>
</html>
