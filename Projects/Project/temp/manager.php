<?php
session_start();
if (isset($_SESSION['username'])) {
$username = $_SESSION['username'];
echo "Hello ". $username. "<br/>";
echo "you are The Manager";
unset($_SESSION['logged_in']);
echo "<a href = \"../session_login_index.php\"> Log In </a>";

}
?>