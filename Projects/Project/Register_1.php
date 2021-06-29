<?php include 'template.php'; ?>
<?php
session_start();
if ((isset($_POST['name'])) && isset($_POST['address'])
    && isset($_POST['dateOfBirth']) && isset($_POST['email'])
    && isset($_POST['mobile']) && isset($_POST['telephone'])
) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['dateOfBirth'] = $_POST['dateOfBirth'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['mobile'] = $_POST['mobile'];
    $_SESSION['telephone'] = $_POST['telephone'];
    header("Location: Register_2.php");
}
?>

<form method=post action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Name:<input type="text" name="name" id="name">
    Address:<input type="text" name="address" id="address">
    Date of birth:<input type="date" name="dateOfBirth" id="dateOfBirth">
    Email:<input type="text" name="email" id="email">
    Mobile:<input type="tel" name="mobile" id="mobile">
    Telephone:<input type="tel" name="telephone" id="telephone">
    <input type=submit value='Next step'>
</form>