<?php
// session_start();
include_once '../../connection.php';
// error_reporting(0);

$getGroundTotal = mysqli_query($db, "SELECT SUM(total) AS getTotal FROM tmp_store");
while($row = mysqli_fetch_assoc($getGroundTotal)){
    $totalGround = $row['getTotal'];
    echo $totalGround;
}
?>


