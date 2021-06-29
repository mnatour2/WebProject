<?php include 'template.php'; ?>
<?php include 'connection.php'; ?>
<?php
session_start();
try {
    if ((isset($_POST['confirmed']))) {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $name = $_SESSION['name'];
        $address = $_SESSION['address'];
        $dateOfBirth = $_SESSION['dateOfBirth'];
        $email = $_SESSION['email'];
        $mobile = $_SESSION['mobile'];
        $telephone = $_SESSION['telephone'];
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $sql = "INSERT INTO customer(name,address,dateOfBirth,email,phoneNumber,telephoneNumber,username,password) 
        VALUES ('$name','$address','$dateOfBirth','$email','$mobile','$telephone','$username','$password')";
        $pdo->prepare($sql);
        $pdo->exec($sql);
        header("Location: Home.php");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<form method=post action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <?php echo $_SESSION['name'] . "<br>"; ?>
    <?php echo $_SESSION['address'] . "<br>"; ?>
    <?php echo $_SESSION['dateOfBirth'] . "<br>"; ?>
    <?php echo $_SESSION['email'] . "<br>"; ?>
    <?php echo $_SESSION['mobile'] . "<br>"; ?>
    <?php echo $_SESSION['telephone'] . "<br>"; ?>
    <?php echo $_SESSION['username'] . "<br>"; ?>
    <input type="hidden" name="confirmed" value="1">
    <input type=submit value='confirm'>
</form>