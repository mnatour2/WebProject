<?php include 'template.php'; ?>
<?php include 'connection.php'; ?>
<?php
session_start();
if ((isset($_POST['model'])) && isset($_POST['year'])
    && isset($_POST['briefDescription']) && isset($_POST['pricePerDay'])
    && isset($_POST['manufacturingCountry']) && isset($_POST['capacity'])
    && isset($_POST['completeModelName']) && isset($_POST['availableColors'])
    && isset($_POST['totalPrice']) && isset($_POST['averageConsumptionOfLitterPetroleumPerKm'])
    && isset($_POST['horsePower']) && isset($_POST['length'])
    && isset($_POST['width']) && isset($_POST['photo'])
    && isset($_POST['photo2']) && isset($_POST['photo3'])
) {
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $model = $_POST['model'];
        $year = $_POST['year'];
        $briefDescription = $_POST['briefDescription'];
        $pricePerDay = $_POST['pricePerDay'];
        $manufacturingCountry = $_POST['manufacturingCountry'];
        $capacity = $_POST['capacity'];
        $completeModelName = $_POST['completeModelName'];
        $availableColors = $_POST['availableColors'];
        $totalPrice = $_POST['totalPrice'];
        $averageConsumptionOfLitterPetroleumPerKm = $_POST['averageConsumptionOfLitterPetroleumPerKm'];
        $horsePower = $_POST['horsePower'];
        $length = $_POST['length'];
        $width = $_POST['width'];
        $photo = $_POST['photo'];
        $photo2 = $_POST['photo2'];
        $photo3 = $_POST['photo3'];
        $sql = "INSERT INTO car(model,year,briefDescription,pricePerDay,manufacturingCountry,completeModelName,availableColors,totalPrice,averageConsumptionOfLitterPetroleumPerKm,horsePower,length,width,photo,photo2,photo3) 
        VALUES ('$model','$year','$briefDescription','$pricePerDay','$manufacturingCountry','$completeModelName','$availableColors','$totalPrice','$averageConsumptionOfLitterPetroleumPerKm','$horsePower','$length','$width','$photo','$photo2','$photo3')";
        $pdo->prepare($sql);
        $pdo->exec($sql);
        header("Location: Home.php");
}
?>

<form method=post action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Model : <input type="text" name="model" id="model"><br>
    Year : <input type="text" name="year" id="year"><br>
    Brief Description : <input type="text" name="briefDescription" id="briefDescription"><br>
    Price Per Day : <input type="number" name="pricePerDay" id="pricePerDay"><br>
    Manufacturing Country : <input type="text" name="manufacturingCountry" id="manufacturingCountry"><br>
    Capacity : <input type="number" name="capacity" id="capacity"><br>
    Complete Model Name : <input type="text" name="completeModelName" id="completeModelName"><br>
    Available Colors : <input type="text" name="availableColors" id="availableColors"><br>
    Total Price : <input type="number" name="totalPrice" id="totalPrice"><br>
    Average Consumption Of Litter Petroleum Per Km : <input type="text" name="averageConsumptionOfLitterPetroleumPerKm" id="averageConsumptionOfLitterPetroleumPerKm"><br>
    Horse Power : <input type="number" name="horsePower" id="horsePower"><br>
    Length : <input type="number" name="length" id="length"><br>
    Width : <input type="number" name="width" id="width"><br>
    Photo_1(URL) : <input type="text" name="photo" id="photo"><br>
    Photo_2(URL) : <input type="text" name="photo2" id="photo2"><br>
    Photo_3(URL) : <input type="text" name="photo3" id="photo3"><br>
    <input type=submit value='Next step'>
</form>