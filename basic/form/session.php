<?php
	session_start();
	$_SESSION['name'] = 'Lee';
	$_SESSION['name2'] = 'Lee';
	session_destroy();
	echo $_SESSION['name'];
	echo $_SESSION['name2'];
?>