<?php
// session_start();
include_once '../../connection.php';
// error_reporting(0);

$getGroundTotal = mysqli_query($db, "SELECT SUM(total) AS getTotal FROM tmp_store");
while($row = mysqli_fetch_assoc($getGroundTotal)){
    $totalGround = $row['getTotal'];
}
?>
?>

<?php


$qty_session = 0;
$max = 0;
$gtotal = 0;

if(isset($_SESSION['cart'])){
    $max = sizeof($_SESSION['cart']);
}



for($i = 0; $i < $max; $i++){
    
    $price_session = "";


    if(isset($_SESSION['cart'][$i])){
      
        

        foreach($_SESSION['cart'][$i] as $key => $val){
            if($key == "quantity"){
                $qty_session = $val;

            }else if($key == "price"){
                $price_session = $val;
            }
        }

        // $gtotal = $gtotal + ($qty_session + $price_session);
        $gtotal = bcmul($qty_session, $price_session)
        
?>

<?php

    }
}

?>
</table>