<?php
session_start();
include_once '../../connection.php';


$full_name = $_GET['full_name'];
$bill_type_header = $_GET['bill_type_header'];
$bill_date = $_GET['bill_date'];
$bill_no = $_GET['bill_no'];
$company_name = $_GET['company_name'];
$product_name = $_GET['product_name'];
$unit = $_GET['unit'];
$packing_size = $_GET['packing_size'];
$price = $_GET['price'];
$quantity = $_GET['quantity'];
$total = $_GET['total'];



 $lastbillno = 0;
  $res = mysqli_query($db, "SELECT * FROM billing_header ORDER BY id DESC limit 1");
        while($row = mysqli_fetch_array($res)){
            $lastbillno = $row['id'];
        }

        $getStore = mysqli_query($db, "SELECT * FROM tmp_store");
        while($get = mysqli_fetch_array($getStore)){
            $pc = $get['product_company'];
            $pn = $get['product_name'];
            $pu = $get['product_unit'];
            $pa = $get['packing_size'];
            $pp = $get['product_price'];
            $pq = $get['product_quantity'];

        $insert_bill_details = mysqli_query($db, "INSERT INTO billing_details VALUES(0, '$lastbillno'+1, '$pc', '$pn', '$pu', '$pa', '$pp', '$pq' )");
        }

  $insert_bill_header = mysqli_query($db, "INSERT INTO billing_header VALUES(0, '$full_name', '$bill_type_header', '$bill_date', '$bill_no') ");
//     $count = 0;
//  $query = mysqli_query($db, "SELECT * FROM billing_header WHERE id = '$bill_no'");
//  $count = mysqli_num_rows($query);
//  if($count){

//  }
//  $insert_bill_details = mysqli_query($db, "INSERT INTO billing_details VALUES(0, '$lastbillno'+1, '$company_name', '$product_name', '$unit', '$packing_size', '$price', '$quantity' WHERE id = 'bill_id')");


$decreaseQuantity = mysqli_query($db, "UPDATE stocks SET product_quantity = product_quantity - '$quantity' WHERE product_company = '$company_name' && product_name = '$product_name' && product_unit = '$unit'");

 $deleteAllRecordOfTmpStore = mysqli_query($db, "DELETE FROM tmp_store");

?>