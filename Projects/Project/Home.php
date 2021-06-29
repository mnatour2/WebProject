<?php include 'template.php'; ?>
<?php include 'connection.php'; ?>
<?php if (isset($_SESSION['redirectURL'])) {
    echo $_SESSION['redirectURL'];
}
?>