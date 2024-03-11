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



if(isset($_SESSION['cart'])){
    $max = sizeof($_SESSION['cart']);
    $check_available = 0;
    $check_available = check_duplicate_product($company_name, $product_name,$unit, $packing_size);
    
    $available_qty = 0;
    $check_the_qty = 0;

    if($check_available == 0){
        $available_qty = check_qty($company_name, $product_name, $unit, $packing_size, $db);
        if($available_qty >= $quantity){
            $b = array("company_name" => $company_name, "product_name" => $product_name, "unit" => $unit, "packing_size" => $packing_size, "price" => $price, "quantity" => $quantity);
            array_push($_SESSION['cart'], [$b]);
        }else {
            echo "Entered quantity is not available";
        }
    }else {
        $av_qty = 0;
        $exist_qty = 0;
        $exist_qty = check_the_qty($company_name, $product_name, $unit, $packing_size);
        $exist_qty = $exist_qty + $quantity;
        $av_qty = check_qty($company_name, $product_name, $unit, $packing_size, $db);

        if($av_qty >= $exist_qty){
            $check_product_no_session = check_product_no_session($company_name, $product_name, $unit,  $packing_size);
            $b = array("company_name" => $company_name, "product_name" => $product_name, "unit" => $unit, "packing_size" => $packing_size, "price" => $price, "quantity" => $exist_qty);
            $_SESSION['cart'][$check_product_no_session] = $b;
        }else {
            echo "Entered quantity is not available";
        }

    }
}else {
    $available_qty = check_qty($company_name, $product_name,  $unit, $packing_size, $db);
    if($available_qty >= $quantity){
        $_SESSION['cart'] = array(array("company_name" => $company_name, "product_name" => $product_name, "unit" => $unit, "packing_size" => $packing_size, "price" => $price, "quantity" => $quantity));
    }else {
        echo "Entered quantity is not available";
    }
}


function check_qty($product_company, $product_name, $product_unit, $packing_size, $db)
{
    $product_qty = 0;
    $query = mysqli_query($db, "SELECT * FROM stocks WHERE product_company = '$product_company' && product_name = '$product_name' && product_unit = '$product_unit'  && packing_size = '$packing_size'");
    while ($row = mysqli_fetch_assoc($query)) {
        $product_qty = $row['product_quantity'];
    }
    return $product_qty;
}


function check_duplicate_product($product_company, $product_name, $product_unit, $packing_size){
    $found = 0;
   
    $max = sizeof($_SESSION['cart']);

    for($i = 0; $i < $max; $i++){
        if(isset($_SESSION['cart'][$i])){

            $company_name_session = "";
            $product_name_session = "";
            $unit_session = "";
            $packing_size_session = "";
            

            foreach($_SESSION['cart'][$i] as $key => $val){
                if($key == "company_name"){
                    $company_name_session = $val;

                }else if($key == "product_name"){
                    $product_name_session = $val;

                }else if($key == "unit"){
                    $unit_session = $val;

                }else if($key == "packing_size"){
                    $packing_size_session = $val;
                }
            }

            if($company_name_session == $product_company && $product_name_session == $product_name && $unit_session == $product_unit && $packing_size_session == $packing_size){
                $found = $found +1;
            }
        }
    }

    return $found;
}
 
//------------------ function to check quantity 
function check_the_qty($product_company, $product_name, $product_unit, $packing_size){
    $qty_found = 0;
    $qty_session = 0;

 

    $max = sizeof($_SESSION['cart']);


    for($i = 0; $i < $max; $i++){

        $company_name_session = "";
        $product_name_session = "";
        $unit_session = "";
        $packing_size_session = "";

        if(isset($_SESSION['cart'][$i])){
          
            

            foreach($_SESSION['cart'][$i] as $key => $val){
                if($key == "company_name"){
                    $company_name_session = $val;

                }else if($key == "product_name"){
                    $product_name_session = $val;

                }else if($key == "unit"){
                    $unit_session = $val;

                }else if($key == "packing_size"){
                    $packing_size_session = $val;

                }else if($key == "quantity"){
                    $qty_session = $val;
                }
            }

            if($company_name_session == $product_company && $product_name_session == $product_name && $unit_session == $product_unit   && $packing_size_session == $packing_size){
                $qty_found = $qty_session;
            }
        }
    }

    return $qty_found;
}

//----------------------- function to check product number cookies-----------------
function check_product_no_session ($product_company, $product_name, $product_unit, $packing_size){
    $recordno = 0;
    ;
    $max = sizeof($_SESSION['cart']);
    for($i = 0; $i < $max; $i++){

        if(isset($_SESSION['cart'][$i])){

            $company_name_session = "";
            $product_name_session = "";
            $unit_session = "";
            $packing_size_session = "";
            

            foreach($_SESSION['cart'][$i] as $key => $val){
                if($key == "company_name"){
                    $company_name_session = $val;
                }else if($key == "product_name"){
                    $product_name_session = $val;
                }else if($key == "unit"){
                    $unit_session = $val;
                }else if($key == "packing_size"){
                    $packing_size_session = $val;
                }
            }

            if($company_name_session == $product_company && $product_name_session == $product_name && $unit_session == $product_unit && $packing_size_session == $packing_size){
                $recordno = $i;
            }
        }
    }

    return $recordno;
} 
?>