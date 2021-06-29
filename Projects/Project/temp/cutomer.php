<?php
session_start();
if (isset($_SESSION['username'])) {
$username = $_SESSION['username'];
echo "Hello ". $username ."<br/>";
echo "you are a Customer";

echo "<a href = \"../session_login_index.php?action=logout\">Logout</a>"; 
}
