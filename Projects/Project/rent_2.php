<?php include 'template.php'; ?>
<?php include 'connection.php'; ?>

<?php
session_start();
$rentingDate = date_create($_POST['rentingDate']);
$returnDate = date_create($_POST['returnDate']);
$dateDiff = date_diff($rentingDate, $returnDate);
$dateDifference = $dateDiff->format('%a') + 0;
$total_price = $_SESSION['pricePerDay'] * $dateDifference;
$_SESSION['totalPrice'] = $total_price;
echo "Total Price : " . $total_price . " NIS. </br>";
echo "Start Date : " . $_POST['rentingDate'] . "</br>";
echo "Start Time : " . $_POST['rentingTime'] . "</br>";
echo "Return Date : " . $_POST['returnDate'] . "</br>";
echo "Return Time : " . $_POST['returnTime'] . "</br>";
$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$customerID = $_SESSION['customerID'];
$sql = "SELECT * FROM customer where customerID= '$customerID' limit 1;";
$dbResults = $pdo->query($sql);
$rows = $dbResults->fetchAll();
foreach ($rows as $row) :
    echo "Username : " . $row['username'] . "</br>";
    echo "Name : " . $row['name'] . "</br>";
    echo "Address : " . $row['address'] . "</br>";
    echo "Email : " . $row['email'] . "</br>";
    echo "Phone Number : " . $row['phoneNumber'] . "</br>";
    echo "Telephone Number : " . $row['telephoneNumber'] . "</br>";
endforeach;
if (
    isset($_POST['creditCardNumber']) && isset($_POST['expireDate'])
    && isset($_POST['bankName']) && isset($_POST['creditCardName'])
) {
    $_SESSION['rentingDate'] = $_POST['rentingDate'];
    $_SESSION['rentingTime'] = $_POST['rentingTime'];
    $_SESSION['returnDate'] = $_POST['returnDate'];
    $_SESSION['returnTime'] = $_POST['returnTime'];
}
?>

<form method=post action="rent_3.php">
    <h3>Payment :</h3>
    Credit Card Number: <input name="creditCardNumber" type=" text"></br>
    Expire Date: <input name="expireDate" type="date"></br>
    Bank Name: <input name="bankName" type=" text"></br>
    <input name="creditCardName" type="radio" value="1">Visa
    <input name="creditCardName" type="radio" value="2">MasterCard
    <input name="creditCardName" type="radio" value="3">American Express
    <input type="submit" value='confirm'>
</form>