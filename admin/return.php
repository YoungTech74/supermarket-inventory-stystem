<?php 
    include_once '../connection.php';

    $id = $_GET['id'];
    $bill_id = "";
    $product_company = "";
    $product_name = "";
    $product_unit = "";
    $packing_size = "";
    $price = "";
    $quantity = "";
    $total = 0;


    //---------------------- get billing details -------------------
    $result = mysqli_query($db, "SELECT * FROM billing_details WHERE id='$id'");
    while($row = mysqli_fetch_assoc($result)){
        $bill_id = $row['bill_id'];
        $product_company = $row['product_company'];
        $product_name = $row['product_name'];
        $product_unit = $row['product_unit'];
        $packing_size = $row['packing_size'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        $total = $price * $quantity;
    }

    //-------------------------- get bill_no from billing header table 
    $bill_no = "";
    $result2 = mysqli_query($db, "SELECT * FROM billing_header WHERE id='$bill_id'");
    while($row2 = mysqli_fetch_assoc($result2)){
        $bill_no = $row2['bill_no'];
    }

    $today_date = date("Y-m-d");

    mysqli_query($db, "INSERT INTO return_products VALUES(NULL, '$bill_no', '$today_date', '$product_company', '$product_name', '$product_unit', '$packing_size', '$price', '$quantity', '$total')");
    mysqli_query($db, "UPDATE stocks SET product_quantity = product_quantity + $quantity WHERE product_company = '$product_company' && product_name = '$product_name' && product_unit = '$product_unit' && packing_size = '$packing_size'");
    mysqli_query($db, "DELETE FROM billing_details WHERE id='$id'");
?>

<script>
    alert('Product Taken as a Return Successfully.');
    window.location='view_bill_details.php';
</script>