<?php
session_start();
include_once '../../connection.php';



$company_name = $_GET['company_name'];
$product_name = $_GET['product_name'];
$unit = $_GET['unit'];
$packing_size = $_GET['packing_size'];
$price = $_GET['price'];
$quantity = $_GET['quantity'];
$total = $_GET['total'];



$count = 0;
$selectRecord = mysqli_query($db, "SELECT * FROM tmp_store WHERE product_company = '$company_name' &&  product_name = '$product_name' && product_unit = '$unit'");
$count = mysqli_num_rows($selectRecord);

if($count == 0){
    $query = mysqli_query($db, "INSERT INTO tmp_store(product_company, product_name, product_unit, packing_size, product_price, product_quantity, total) 
                        VALUES('$company_name', '$product_name', '$unit', '$packing_size', '$price', '$quantity', '$total')");
                  
}else {
    mysqli_query($db, "UPDATE tmp_store SET product_quantity = product_quantity + '$quantity', total = total + ('$price' * '$quantity') WHERE product_company = '$company_name' &&  product_name = '$product_name' && product_unit = '$unit'");
}



?>