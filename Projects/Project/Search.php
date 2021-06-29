<?php include 'template.php'; ?>
<?php include 'connection.php'; ?>
<?php
if (isset($_POST['insert'])) {
  try {
    if ($_POST['subject'] == 1) {
      $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $temp = $_POST['search'];
      $sql = "SELECT * FROM car WHERE model='$temp';";
      $dbResults = $pdo->query($sql);
      $rows = $dbResults->fetchAll();
      include 'Cars_2.php';
    }

    if ($_POST['subject'] == 2) {
      $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $temp = $_POST['search'];
      $sql = "SELECT * FROM car WHERE year=$temp;";
      $dbResults = $pdo->query($sql);
      $rows = $dbResults->fetchAll();
      include 'Cars_2.php';
    }

    if ($_POST['subject'] == 3) {
      $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $temp = $_POST['search'];
      $sql = "SELECT * FROM car WHERE manufacturingCountry='$temp';";
      $dbResults = $pdo->query($sql);
      $rows = $dbResults->fetchAll();
      include 'Cars_2.php';
    }

  } catch (PDOException $e) {
    die($e->getMessage());
  }
} else {
?>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input type="text" id="searchBar" name="search" placeholder="Search Titles">
    <input type="radio" name="subject" value="1">Car Model
    <input type="radio" name="subject" value="2">Year
    <input type="radio" name="subject" value="3">Country
    <input id="editedbutton" type="submit" name="insert" value="Filter">
  </form>
<?php }
$pdo = null;
?>