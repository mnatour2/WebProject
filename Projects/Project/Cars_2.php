<?php
session_start();
?>
<div id="carsBox">
    <table>
        <caption>CARS TABLE</caption>
        <thead>
            <tr>
                <th>Car reference number</th>
                <th>Model</th>
                <th>Year</th>
                <th>Brief description</th>
                <th>Price per day</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo $row['carReferenceNumber'] ?></td>
                    <td><?php echo $row['model'] ?></td>
                    <td><?php echo $row['year'] ?></td>
                    <td><?php echo $row['briefDescription'] ?></td>
                    <td><?php echo $row['pricePerDay'] ?></td>
                    <form method='GET' action='Cars_3.php ' target="_blank">
                        <?php
                        $carReferenceNumber = $row['carReferenceNumber'];
                        echo "<input type='hidden' name='Hidden1' value='$carReferenceNumber'>";
                        echo "<td><input type='submit' value='View'></td>";
                        ?>
                    </form>
                    <form method='GET' action='rent_1.php '>
                        <?php
                        if (!isset($_SESSION['type']) || $_SESSION['type'] == 1) {
                            echo "<input type='hidden' name='Hidden1' value='$carReferenceNumber'>";
                            echo "<td><input type='submit' value='Rent'></td>";
                        }
                        ?>
                    </form>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div id="divBt">
    <form id="form_1" method='GET' action='manager.php '>
        <?php
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            if (isset($_SESSION['type']) && $_SESSION['type'] == 2) {
                echo "<input id='editedbutton_2' type='submit' value='Add'>";
            }
        }
        ?>
    </form>
</div>