<?php include 'template.php'; ?>
<?php include 'connection.php'; ?>
<?php
session_start();
if ((isset($_POST['password'])) && isset($_POST['username']) && isset($_POST['type'])) {
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tableName = $_POST['type'] == 1 ? "customer" : "manager";
    $username = $_POST["username"];
    $password = $_POST['password'];
    $type = $_POST['type'];
    $sql = "SELECT * FROM $tableName where username= '$username' and password='$password' limit 1;";
    $dbResults = $pdo->query($sql);
    $rows = $dbResults->fetchAll();
    if ($type == 1) {
        foreach ($rows as $row) :
            $_SESSION['customerID'] = $row['customerID'];
        endforeach;
    } elseif ($type == 2) {
        foreach ($rows as $row) :
            $_SESSION['managerID'] = $row['managerID'];
        endforeach;
    }
    if (!$rows) {
        echo "Incorrect username or password";
    } else {
        $_SESSION['type'] = $type;
        $_SESSION['logged_in'] = true;
        if (isset($_SESSION['redirectURL'])) {
            // $url = explode('/', $_SESSION['redirectURL']);
            // //echo $url[2];
            // $new = 'Location : ' . $url[2];
            // header('$new');
            header('Location: Home.php');
        } else {
            header('Location: Home.php');
        }
    }
}
?>
<form method=post action="<?php echo $_SERVER['PHP_SELF']; ?>">
    User name:<input name=username value=<?php
                                            if (isset($_REQUEST['username'])) {
                                                echo $_REQUEST['username'];
                                            }
                                            ?>>
    Password:<input type=password name=password>
    <select name="type" id="type">
        <option value="1">Customer</option>
        <option value="2">Manager</option>
        <input type=submit value='Log in'>
</form>