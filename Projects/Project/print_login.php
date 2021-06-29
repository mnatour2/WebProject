<?php
session_start();

	if (isset($_SESSION['type'])) {
	switch($_SESSION['type']) {
		case 1: header ( "Location: temp/customer.php" ); break;
		case 2: header ( "Location: temp/manager.php" ); break;
		default: header ( "Location: session_login.php" ); break;
		}
	}

else 
{
header ( "Location: login.php" );
}
