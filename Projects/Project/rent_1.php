<?php include 'template.php'; ?>
<?php include 'connection.php'; ?>
<?php
session_start();
if ($_SESSION['logged_in'] == true) {
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM car WHERE carReferenceNumber='$_GET[Hidden1]';";
        $dbResults = $pdo->query($query);
        $rows = $dbResults->fetchAll();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
} else {
    $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
    header("Location: Login.php");
}

?>
<form method=post action="rent_2.php">
    <?php foreach ($rows as $row) : ?>
        Reference Number: <?php echo $row['carReferenceNumber'] ?></br>
        Model Name: <?php echo $row['model'] ?></br>
        Country: <?php echo $row['manufacturingCountry'] ?></br>
        Description: <?php echo $row['briefDescription'] ?></br>
    <?php endforeach; ?>
    </br>
    Renting date: <input type="date" name="rentingDate" id="rentingDate"></br>
    Renting time: <input type="time" name="rentingTime" id="rentingTime"></br>
    Return date: <input type="date" name="returnDate" id="returnDate"></br>
    Return time: <input type="time" name="returnTime" id="returnTime"></br>
    <?php
    $_SESSION['pricePerDay'] = $row['pricePerDay'];
    $_SESSION['carReferenceNumber'] = $row['carReferenceNumber'];
    $_SESSION['model'] = $row['model'];
    $_SESSION['manufacturingCountry'] = $row['manufacturingCountry'];
    $_SESSION['briefDescription'] = $row['briefDescription'];
    ?>
    <input type="submit" name="submit" value="submit">
</form>