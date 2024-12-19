<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Sales</title>
    <style>
    </style>
</head>
<body>
<div class="container">
    <div>
        <div class="nav"><a href="sales.php">Sales</a><a href="customers.php">Customers</a><a href="productcatalogus.php">Productcatalogus</a></div>
        <h1 class="pageTitle">Sales</h1>
    </div>
    <div class="content">
        <div class="left">
            <p>Overzicht van het aantal orders per status en per jaar, voor de jaren 2004 en 2005, uit de tabel orders.</p>
            <?php
            include 'configdbeo.php';
            $sql = "select date_format(orderDate, '%Y') as jaar, status, count(status) as aantal from `orders` where year(orderDate) = '2004' or year(orderDate) = '2005' group by status, jaar order by jaar desc, status;";
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
                echo "<td style='width: 30%'>" . $row['jaar'] . "</td><td style='width: 30%'>" . $row['status'] . "</td><td style='width: 30%'>" . $row['aantal'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
        <div class="right">
            <p>Overzicht van het totaal van alle ontvangen betalingen per jaar, uit de tabel payments</p>
            <?php
            $sql = "select year(paymentDate) as jaar, count(amount) as aantalBetalingen, concat('€', format(sum(amount), 2, 'de_DE')) as totaalBetalingen from payments group by jaar order by jaar desc;";
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
                echo "<td style='width: 30%'>" . $row['jaar'] . "</td><td style='width: 30%'>" . $row['aantalBetalingen'] . "</td><td style='width: 30%'>" . $row['totaalBetalingen'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
        <div class="right">
            <p>Overzicht van de orders met een orderdatum in 2005, met de status shipped en waarbij het veld comments gevuld is.</p>
            <?php
            $sql = "select orderNumber, date_format(orderDate, '%d %b %y') as orderdatum, status, comments from orders where status = 'shipped' and year(orderDate) = '2005' and comments <> '' order by orderNumber;";
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
                echo "<td style='width: 17%'>" . $row['orderNumber'] . "</td><td style='width: 17%'>" . $row['orderdatum'] . "</td><td style='width: 17%'>" . $row['status'] . "<td style='width: 49%'>" . $row['comments'] . "</td>";
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
<!--    <title>Sales</title>-->
<!--    <style>-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!--    <div class="container">-->
<!--        <div>-->
<!--            <div class="nav"><a href="sales.php">Sales</a><a href="customers.php">Customers</a><a href="productcatalogus.php">Productcatalogus</a></div>-->
<!--            <h1 class="pageTitle">Sales</h1>-->
<!--        </div>-->
<!--        <div class="content">-->
<!--            --><?php
////            ------BOX ONE------
//            echo "<div class='left'>";
//            echo "<p>Overzicht van het aantal orders per status en per jaar, voor de jaren 2004 en 2005, uit de tabel orders.</p>";
//            include 'configdbeo.php';
//            $sql = "select date_format(orderDate, '%Y') as jaar, status, count(status) as aantal from `orders` where year(orderDate) = '2004' or year(orderDate) = '2005' group by status, jaar order by jaar desc, status;";
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
//                echo "<td style='width: 30%'>" . $row['jaar'] . "</td><td style='width: 30%'>" . $row['status'] . "</td><td style='width: 30%'>" . $row['aantal'] . "</td>";
//                echo "</tr>";
//            }
//            echo "</table>";
//            echo "</div>";
////            ------BOX TWO------
//            echo "<div class='right'>";
//            echo "<p>Overzicht van het totaal van alle ontvangen betalingen per jaar, uit de tabel payments</p>";
//            $sql = "select year(paymentDate) as jaar, count(amount) as aantalBetalingen, concat('€', format(sum(amount), 2, 'de_DE')) as totaalBetalingen from payments group by jaar order by jaar desc;";
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
//                echo "<td style='width: 30%'>" . $row['jaar'] . "</td><td style='width: 30%'>" . $row['aantalBetalingen'] . "</td><td style='width: 30%'>" . $row['totaalBetalingen'] . "</td>";
//                echo "</tr>";
//            }
//            echo "</table>";
//            echo "</div>";
////            ------BOX  THREE------
//            echo "<div class='right'>";
//            echo "<p>Overzicht van de orders met een orderdatum in 2005, met de status shipped en waarbij het veld comments gevuld is.</p>";
//            $sql = "select orderNumber, date_format(orderDate, '%d %b %y') as orderdatum, status, comments from orders where status = 'shipped' and year(orderDate) = '2005' and comments <> '' order by orderNumber;";
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
//                echo "<td style='width: 17%'>" . $row['orderNumber'] . "</td><td style='width: 17%'>" . $row['orderdatum'] . "</td><td style='width: 17%'>" . $row['status'] . "<td style='width: 49%'>" . $row['comments'] . "</td>";
//                echo "</tr>";
//            }
//            echo "</table>";
//            echo "</div>";
//            mysqli_close($con);
//            ?>
<!--        </div>-->
<!--    </div>-->
<!--</body>-->
<!--</html>-->