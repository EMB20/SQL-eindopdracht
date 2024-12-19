<?php
include "configdb.php";
$sql = "select productnr, omschrijving, prijs from producten";
$result = mysqli_query($con,$sql);

$aantalr=mysqli_num_rows($result);
echo "Het aantal producten = " . $aantalr;
echo "<br><br>";

echo "<table border='1'>";
echo "<tr style='font-weight: bold'>";
$finfo = mysqli_fetch_fields($result);
foreach ($finfo as $f) {
    echo "<td >" . $f->name . "</td>";
}

//$finfo = mysqli_fetch_field_direct($result, 0);
//echo "<td >" . $finfo->name . "</td>";
//$finfo = mysqli_fetch_field_direct($result, 1);
//echo "<td>" . $finfo->name . "</td>";
//$finfo = mysqli_fetch_field_direct($result, 2);
//echo "<td>" . $finfo->name . "</td>";

echo "</tr>";
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td width='30%'>" . $row['productnr'] . "</td><td width='30%'>" . $row['omschrijving'] . "</td><td width='30%'>" . $row['prijs'] . "</td>";
    echo "</tr>";
}
mysqli_close($con);