<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Customers</title>
    <style>
    </style>
</head>
<body>
<div>
    <div class="container">
        <div class="nav"><a href="sales.php">Sales</a><a href="customers.php">Customers</a><a href="productcatalogus.php">Productcatalogus</a></div>
        <h1 class="pageTitle">Customers</h1>
    </div>
    <div class="content">
        <div class="left">
            <p>Klanten in de USA, Australie en Japan met een kredietlimiet van meer dan 100.000.</p>
            <?php
            include 'configdbeo.php';
            $sql = "select customerName, country, concat('€', creditLimit) as creditLimit from customers where country in ('USA', 'Japan', 'Australia') and creditLimit > 100000;";
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
                echo "<td style='width: 30%'>" . $row['customerName'] . "</td><td style='width: 30%'>" . $row['country'] . "</td><td style='width: 30%'>" . $row['creditLimit'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
        <div class="right">
            <p>Overzicht van landen met meer dan 10 klanten in dat land.</p>
            <?php
            $sql = "select country, count(customerNumber) as aantalCustomers from customers group by country having aantalCustomers > 10;";
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
                echo "<td style='width: 50%'>" . $row['country'] . "</td><td style='width: 50%'>" . $row['aantalCustomers'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
        <div class="right">
            <p>Zoek klanten met een beginletter:</p>
            <form action='customers.php' method='get'>
                <input placeholder='v' type='text' name='filter' id='filter' maxlength='1'>
                <input type='submit' value='Filter'>
            </form>
            <?php
//            ----INFO----
            if (isset($_GET['filter'])) {
                $input = $_GET['filter'];
            } else {
                $input = 'v';
            }
//            b;"select * from customers"
            $sql = "select customerName, concat(contactFirstName, ' ', contactLastName) as contactFullname, phone from customers where customerName like '$input%';";
            $result = mysqli_query($con,$sql);
            $customerAmount = mysqli_num_rows($result);
            echo "<p>Alle klanten begginend met de letter: <span style='font-weight: bold'>$input</span></p>";
            echo "<p>Het aantal klanten in deze selectie is: <span style='font-weight: bold'>$customerAmount</span></p><br>";
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
                echo "<td style='width: 18%'>" . $row['customerName'] . "</td><td style='width: 18%'>" . $row['contactFullname'] . "</td><td style='width: 18%'>" . $row['phone'] . "</td>";
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
<!--    <title>Customers</title>-->
<!--    <style>-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!--    <div>-->
<!--        <div class="container">-->
<!--            <div class="nav"><a href="sales.php">Sales</a><a href="customers.php">Customers</a><a href="productcatalogus.php">Productcatalogus</a></div>-->
<!--            <h1 class="pageTitle">Customers</h1>-->
<!--        </div>-->
<!--        <div class="content">-->
<!--            --><?php
//            //            ------BOX ONE------
//            echo "<div class='left'>";
//            echo "<p>Klanten in de USA, Australie en Japan met een kredietlimiet van meer dan 100.000.</p>";
//            include 'configdbeo.php';
//            $sql = "select customerName, country, concat('€', creditLimit) as creditLimit from customers where country in ('USA', 'Japan', 'Australia') and creditLimit > 100000;";
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
//                echo "<td style='width: 30%'>" . $row['customerName'] . "</td><td style='width: 30%'>" . $row['country'] . "</td><td style='width: 30%'>" . $row['creditLimit'] . "</td>";
//                echo "</tr>";
//            }
//            echo "</table>";
//            echo "</div>";
//            //            ------BOX TWO------
//            echo "<div class='right'>";
//            echo "<p>Overzicht van landen met meer dan 10 klanten in dat land.</p>";
//            $sql = "select country, count(customerNumber) as aantalCustomers from customers group by country having aantalCustomers > 10;";
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
//                echo "<td style='width: 50%'>" . $row['country'] . "</td><td style='width: 50%'>" . $row['aantalCustomers'] . "</td>";
//                echo "</tr>";
//            }
//            echo "</table>";
//            echo "</div>";
//            //            ------BOX  THREE------
//            echo "<div class='right'>";
//            echo "<p>Zoek klanten met een beginletter:</p>";
//            echo "<form action='customers.php' method='get'><input value='v' type='text' name='filter' id='filter' maxlength='1'><input type='submit' value='Filter'></form><br>";
//            if (isset($_GET['filter'])) {
//                $input = $_GET['filter'];
//            } else {
//                $input = 'v';
//            }
//            $sql = "select customerName, concat(contactFirstName, ' ', contactLastName) as contactFullname, phone from customers where customerName like '$input%';";
//            $result = mysqli_query($con,$sql);
//            $customerAmount = mysqli_num_rows($result);
//            echo "<p>Alle klanten begginend met de letter: <span style='font-weight: bold'>$input</span></p>";
//            echo "<p>Het aantal klanten in deze selectie is: <span style='font-weight: bold'>$customerAmount</span></p><br>";
//            echo "<table border='solid black 1px'>";
//            echo "<tr style='font-weight: bold'>";
//            $finfo = mysqli_fetch_fields($result);
//            foreach ($finfo as $f) {
//                echo "<td >" . $f->name . "</td>";
//            }
//            echo "</tr>";
//            while($row = mysqli_fetch_assoc($result)) {
//                echo "<tr>";
//                echo "<td style='width: 18%'>" . $row['customerName'] . "</td><td style='width: 18%'>" . $row['contactFullname'] . "</td><td style='width: 18%'>" . $row['phone'] . "</td>";
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