<?php include 'template.php'; ?>
<?php include 'connection.php'; ?>
<?php
session_start();
function format_date($date)
{
    $date = new DateTime($date);
    $dt = $date->format('Y-m-d');
    return $dt;
}
function format_time($time)
{
    $time = new DateTime($time);
    $dt = $time->format('H:i:s');
    return $dt;
}
$bankName = $_POST['bankName'];
$creditCardNumber = $_POST['creditCardNumber'];
$carID = $_SESSION['carReferenceNumber'];
$expireDate = format_date($_POST['expireDate']);
$customerID = $_SESSION['customerID'];
$totalPrice = $_SESSION['totalPrice'];

$rentStartDate = format_date($_SESSION['rentingDate']);

$rentStartTime = format_time($_SESSION['rentingTime']);

$rentEndDate = format_date($_SESSION['returnDate']);

$rentEndTime = format_time($_SESSION['returnTime']);


if ($_POST['creditCardName'] == 1) {
    $name = "Visa";
}
if ($_POST['creditCardName'] == 2) {
    $name = "MasterCard";
}
if ($_POST['creditCardName'] == 3) {
    $name = "American Express";
}

try {
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO creditcard(bank,cardNumber,customerID,expireDate,name)
            VALUES ('$bankName','$creditCardNumber','$customerID','$expireDate','$name')";
    $pdo->prepare($sql);
    $pdo->exec($sql);
    $query = "INSERT INTO rent(carID,customerID,rentStartDate,rentStartTme,rentEndDate,rentEndTime,totalPrice)
              VALUES ('$carID','$customerID','$rentStartDate','$rentStartTime','$rentEndDate','$rentEndTime','$totalPrice')";
    $pdo->prepare($query);
    $pdo->exec($query);
} catch (PDOException $e) {
    echo $e->getMessage();
}
header("Location: Confirmation.php");
?>



