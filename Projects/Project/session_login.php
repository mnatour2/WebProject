<?php
session_start();
?>
<?php
if(isset($_GET['action']) && $_GET['action']=="logout")
{
$_SESSION['referrer'] = "session_login_index.php";
header ("Location: logout.php");
}
elseif (!isset($_SESSION['logged_in'])) {
$_SESSION['referrer'] = "session_login_index.php";
header ( "location: login.php" );
} else {
header ( "location: print.php" );
}
?>
