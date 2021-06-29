<?php include 'template.php'; ?>

<?php
session_start();
if ((isset($_POST['username'])) && isset($_POST['password'])
) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    header("Location: Register_3.php");
}
?>

<form method=post action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Username:<input type="text" name="username" id="username" pattern="\w{3,20}">
    Password:<input type="password" name="password" id="password" pattern="^[0-9].{4,13}[a-z]$">
    <input type="submit" value='confirm'>
</form>