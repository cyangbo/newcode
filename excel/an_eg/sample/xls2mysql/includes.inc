<?php

function print_error( $msg )
	{
		print <<<END
		<tr>
			<td colspan=5><font color=red><b>Error: </b></font>$msg</td>
			<td><font color=red><b>Rejected</b></font></td>
		</tr>

END;
	}

function getHeader( $exc, $data )
{
		// string
	
		$ind = $data['data'];
		if( $exc->sst[unicode][$ind] )
			return convertUnicodeString ($exc->sst['data'][$ind]);
		else
			return $exc->sst['data'][$ind];

}


function convertUnicodeString( $str )
{
	for( $i=0; $i<strlen($str)/2; $i++ )
	{
		$no = $i*2;
		$hi = ord( $str[$no+1] );
		$lo = $str[$no];
		
		if( $hi != 0 )
			continue;
		elseif( ! ctype_alnum( $lo ) )
			continue;
		else
			$result .= $lo;
	}
	
	return $result;
}

function uc2html($str) {
	$ret = '';
	for( $i=0; $i<strlen($str)/2; $i++ ) {
		$charcode = ord($str[$i*2])+256*ord($str[$i*2+1]);
		$ret .= '&#'.$charcode;
	}
	return $ret;
}



function get( $exc, $data )
{
	switch( $data['type'] )
	{
		// string
	case 0:
		$ind = $data['data'];
		if( $exc->sst[unicode][$ind] )
			return uc2html($exc->sst['data'][$ind]);
		else
			return $exc->sst['data'][$ind];

		// integer
	case 1:
		return $data['data'];

		// float
	case 2:
		return $data['data'];
        case 3:
		return $data['data']; //str_replace ( " 00:00:00", "", gmdate("d-m-Y H:i:s",$exc->xls2tstamp($data[data])) );

	default:
		return '';
	}
}



function fatal($msg = '') {
	echo '[Fatal error]';
	if( strlen($msg) > 0 )
		echo ": $msg";
	echo "<br>\nScript terminated<br>\n";
	if( $f_opened) @fclose($fh);
	exit();
}


function getTableData ( $ws, $exc ) {
		
	global $excel_file, $db_table;
	global $db_host, $db_name, $db_user, $db_pass;
	
	if ( !isset ( $_POST['useheads'] ) )
		$_POST['useheads'] = "";
	
	$data = $ws['cell'];
	
echo <<<FORM

	<form action="" method="POST" name="db_export">
	<table border="0" cellspacing="1" cellpadding="2" align="center" bgcolor="#666666">
	<tr bgcolor="#f1f1f1">

FORM;

// Form fieldnames
	
if ( !$_POST['useheaders'] ) {
	for ( $j = 0; $j <= $ws['max_col']; $j++ ) {

		$field = "field" . $j;
						
		echo <<<HEADER

		<td>
		<input type="checkbox" name="fieldcheck[$j]" value="$j" checked title="Check to proceed this field">
		<input type="text" name="fieldname[$j]" value="$field" title="Field name">
		</td>

HEADER;
	}
}
else {
	for ( $j = 0; $j <= $ws['max_col']; $j++ ) {
		
		$field = getHeader ( $exc, $data[0][$j] );
			
		$field = ereg_replace ( "^[0-9]+", "", $field );
		
		if (empty ($field) )
			$field = "field" . $j;
		
		echo <<<HEADER

		<td>
		<input type="checkbox" name="fieldcheck[$j]" value="$j" checked title="Check to proceed this field">
		<input type="text" name="fieldname[$j]" value="$field" title="Field name">
		</td>

HEADER;
	}
}

	
	echo "</tr>";
	
	foreach( $data as $i => $row ) { // Output data and prepare SQL instructions
		
				
		if ( $i == 0 && $_POST['useheaders'] )
		continue;
		
		echo "<tr bgcolor=\"#ffffff\">";
		
		for ( $j = 0; $j <= $ws['max_col']; $j++ ) {
		
			$cell = get ( $exc, $row[$j] );
			echo "<td>$cell</td>";
					
		}
		
		echo "</tr>";
		$i++;
	}
	
	if ( empty ( $db_table ) )
		$db_table = "Table1";
					
echo <<<FORM2
	
	</table><br>
	<table align="center" width="390">
	<tr><td>Table name:</td><td>&nbsp;<input type="text" name="db_table" value="$db_table"></td></tr>
	<tr><td>Drop table if exists:</td><td><input type="checkbox" name="db_drop" checked></td></tr>
	<tr><td colspan="2">
	<i>Uncheck this option to add data into the existing table.<br><font color="red">
	Note that if you have mismatch in fieldnames in database and fieldnames in outputting data will be errors!</td></tr>
	<tr><td>Database host:</td><td>&nbsp;<input type="text" size=30 name="db_host" value="$db_host"></td></tr>
	<tr><td>Database name:</td><td>&nbsp;<input type="text" size=30 name="db_name" value="$db_name"></td></tr>
	<tr><td>Database user:</td><td>&nbsp;<input type="text" size=30 name="db_user" value="$db_user"></td></tr>
	<tr><td>Database password:</td><td>&nbsp;<input type="password" size=30 name="db_pass" value="$db_pass"></td></tr>
	<tr><td></td><td><input type="hidden" name="excel_file" value="$excel_file">
	<input type="hidden" name="useheaders" value="$_POST[useheaders]">
	<input type="hidden" name="step" value="2">
	&nbsp;<input type="submit" name="submit" value="Output"></td></tr>
	</form>
	</table>
	<br>&nbsp;
<div align="right">
<a href="http://www.zakkis.ca" style="font-size: 9px; text-decoration: none; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">ZAKKIS Tech. All Rights Reserved.</a>&nbsp;&nbsp;
</div>
FORM2;

} 



function prepareTableData ( $exc, $ws, $fieldcheck, $fieldname ) {
	
			
	$data = $ws['cell'];
	
	foreach( $data as $i => $row ) { // Output data and prepare SQL instructions
		
				
		if ( $i == 0 && $_POST['useheaders'] )
			continue;
		
		$SQL[$i] = "";
		
		for ( $j = 0; $j <= $ws['max_col']; $j++ ) {
		
			if ( isset($fieldcheck[$j]) ) {
			
								
				$SQL[$i] .= $fieldname[$j];
				$SQL[$i] .= "=\"";
				$SQL[$i] .= addslashes ( get ( $exc, $row[$j] ) );
				$SQL[$i] .= "\"";
				
				$SQL[$i] .= ",";
			}
		
				
		}
		
		$SQL[$i] = rtrim($SQL[$i], ',');
		
		$i++;
	}
	
	return $SQL;	
			
} 

?>