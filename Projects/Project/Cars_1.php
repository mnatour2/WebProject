<?php include 'template.php'; ?>
<?php include 'connection.php'; ?>

<?php
try {
   $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $query = "select * from car ";
   $dbResults = $pdo->query($query);
   $rows = $dbResults->fetchAll();
} catch (PDOException $e) {
   die($e->getMessage());
}
?>
<?php include 'Cars_2.php'; ?>


