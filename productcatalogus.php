<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Productcatalogus</title>
    <style>
    </style>
</head>
<body>
<div class="container">
    <div>
        <div class="nav"><a href="sales.php">Sales</a><a href="customers.php">Customers</a><a href="productcatalogus.php">Productcatalogus</a></div>
        <h1 class="pageTitle">Productcatalogus</h1>
    </div>
    <div class="content">
        <div class="left">
            <p>Overzicht van aantallen en totale voorraadwaarde per productLine.</p>
            <?php
            include 'configdbeo.php';
            $sql = "select productLine, count(productName) as aantalProducten, concat('€', format(sum(buyPrice*quantityInStock), 2, 'de_DE')) as waardeVoorraad from products group by productLine;";
            $result = mysqli_query($con,$sql);
            echo "<table border='solid black 1px'>";
            echo "<tr style='font-weight: bold'>";
            $finfo = mysqli_fetch_fields($result);
            foreach ($finfo as $f) {
                echo "<td >" . $f->name . "</td>";
            }
            echo "</tr>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td style='width: 30%'>" . $row['productLine'] . "</td><td style='width: 30%'>" . $row['aantalProducten'] . "</td><td style='width: 30%'>" . $row['waardeVoorraad'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
        <div class="right">
            <form action='productcatalogus.php' method='get'>
                <select name='productlines' id='productlines'>
                    <?php
                    $sql = "select productLine from productlines;";
                    $result = mysqli_query($con,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option>" . $row['productLine'] . "</option>";
                    }
                    ?>
                </select>
                <input type='submit' value='Filter'>
            </form>
                <?php
                //            ----INFO----
                if (isset($_GET['productlines'])) {
                    $input = $_GET['productlines'];
                } else {
                    $input = 'Trucks and Buses';
                }
                $sql = "select productCode, productName, concat('€', format(buyPrice, 2, 'de_DE')) as price from products where productLine = '$input';";
                $result = mysqli_query($con,$sql);
                $productAmount = mysqli_num_rows($result);
                echo "<p>De geselecteerde productlijn is: <span style='font-weight: bold'>$input</span></p>";
                echo "<p>Totaal aantal producten in deze productlijn is: <span style='font-weight: bold'>$productAmount</span></p><br>";
                //            ----TABLE----
                echo "<table border='solid black 1px'>";
                echo "<tr style='font-weight: bold'>";
                $finfo = mysqli_fetch_fields($result);
                foreach ($finfo as $f) {
                    echo "<td >" . $f->name . "</td>";
                }
                echo "</tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td style='width: 30%'>" . $row['productCode'] . "</td><td style='width: 30%'>" . $row['productName'] . "</td><td style='width: 30%'>" . $row['price'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_close($con);
                ?>
        </div>

    </div>
</div>
</body>
</html>



<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <link rel="stylesheet" href="style.css">-->
<!--    <title>Productcatalogus</title>-->
<!--    <style>-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!--    <div class="container">-->
<!--        <div>-->
<!--            <div class="nav"><a href="sales.php">Sales</a><a href="customers.php">Customers</a><a href="productcatalogus.php">Productcatalogus</a></div>-->
<!--            <h1 class="pageTitle">Productcatalogus</h1>-->
<!--        </div>-->
<!--        <div class="content">-->
<!--            --><?php
//            //            ------BOX ONE------
//            echo "<div class='left'>";
//            echo "<p>Overzicht van aantallen en totale voorraadwaarde per productLine.</p>";
//            include 'configdbeo.php';
//            $sql = "select productLine, count(productName) as productAmount, concat('€', format(sum(buyPrice*quantityInStock), 2, 'de_DE')) as waardeVoorraad from products group by productLine;";
//            $result = mysqli_query($con,$sql);
//            echo "<table border='solid black 1px'>";
//            echo "<tr style='font-weight: bold'>";
//            $finfo = mysqli_fetch_fields($result);
//            foreach ($finfo as $f) {
//                echo "<td >" . $f->name . "</td>";
//            }
//            echo "</tr>";
//            while($row = mysqli_fetch_assoc($result)) {
//                echo "<tr>";
//                echo "<td style='width: 30%'>" . $row['productLine'] . "</td><td style='width: 30%'>" . $row['productAmount'] . "</td><td style='width: 30%'>" . $row['waardeVoorraad'] . "</td>";
//                echo "</tr>";
//            }
//            echo "</table>";
//            echo "</div>";
//            //            ------BOX TWO------
//            echo "<div class='right'>";
//            $sql = "select productLine from productlines;";
//            $result = mysqli_query($con,$sql);
//            echo "<form action='productcatalogus.php' method='get'><select name='productlines' id='productlines'>";
//            while ($row = mysqli_fetch_assoc($result)) {
//                echo "<option>" . $row['productLine'] . "</option>";
//            }
//            echo "</select><input type='submit' value='Filter'></form>";
//            if (isset($_GET['productlines'])) {
//                $input = $_GET['productlines'];
//            } else {
//                $input = 'Trucks and Buses';
//            }
//            $sql = "select productCode, productName, concat('€', format(buyPrice, 2, 'de_DE')) as price from products where productLine = '$input';";
//            $result = mysqli_query($con,$sql);
//            $productAmount = mysqli_num_rows($result);
//            echo "<p>De geselecteerde productlijn is: <span style='font-weight: bold'>$input</span></p>";
//            echo "<p>Totaal aantal producten in deze productlijn is: <span style='font-weight: bold'>$productAmount</span></p><br>";
//            echo "<table border='solid black 1px'>";
//            echo "<tr style='font-weight: bold'>";
//            $finfo = mysqli_fetch_fields($result);
//            foreach ($finfo as $f) {
//                echo "<td >" . $f->name . "</td>";
//            }
//            echo "</tr>";
//            while($row = mysqli_fetch_assoc($result)) {
//                echo "<tr>";
//                echo "<td style='width: 30%'>" . $row['productCode'] . "</td><td style='width: 30%'>" . $row['productName'] . "</td><td style='width: 30%'>" . $row['price'] . "</td>";
//                echo "</tr>";
//            }
//            echo "</table>";
//            echo "</div>";
//            mysqli_close($con);
//            ?>
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</body>-->
<!--</html>-->