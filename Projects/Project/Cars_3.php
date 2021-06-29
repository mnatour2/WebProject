<?php include 'template.php'; ?>
<?php include 'connection.php'; ?>
<?php
try {
   $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $query = "SELECT * FROM car WHERE carReferenceNumber='$_GET[Hidden1]';";
   $dbResults = $pdo->query($query);
   $rows = $dbResults->fetchAll();
} catch (PDOException $e) {
   die($e->getMessage());
}
?>
<div id="carsBox">
   <table>
      <caption>CAR DETAILS</caption>
      <thead>
         <tr>
            <th>Manufacturing Country</th>
            <th>Capacity</th>
            <th>Complete Model Name</th>
            <th>Available Colors</th>
            <th>Total Price</th>
            <th>Average Consumption Of Litter Petroleum Per Km</th>
            <th>horse Power</th>
            <th>Length</th>
            <th>Width</th>
         </tr>
      </thead>
      <tbody>
         
         <?php foreach ($rows as $row) : ?>
            <tr>
               <td><?php echo $row['manufacturingCountry'] ?></td>
               <td><?php echo $row['capacity'] ?></td>
               <td><?php echo $row['completeModelName'] ?></td>
               <td><?php echo $row['availableColors'] ?></td>
               <td><?php echo $row['totalPrice'] ?></td>
               <td><?php echo $row['averageConsumptionOfLitterPetroleumPerKm'] ?></td>
               <td><?php echo $row['horsePower'] ?></td>
               <td><?php echo $row['length'] ?></td>
               <td><?php echo $row['width'] ?></td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
   <table>
      <caption>CAR DETAILS</caption>
      <thead>
         <tr>
            <th>Photo-1</th>
            <th>Photo-2</th>
            <th>Photo-3</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($rows as $row) : ?>
            <tr>
               <td><img src="<?php echo $row['photo'] ?>" alt="car" width="200" height="100"></td>
               <td><img src="<?php echo $row['photo2'] ?>" alt="car" width="200" height="100"></td>
               <td><img src="<?php echo $row['photo3'] ?>" alt="car" width="200" height="100"></td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</div>
