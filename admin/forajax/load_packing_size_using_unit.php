<?php
    include_once '../../connection.php';

    $unit = $_GET['unit'];
    $product_name = $_GET['product_name'];
    $company_name = $_GET['company_name'];

    $sql = mysqli_query($db, "SELECT * FROM products WHERE company_name = '$company_name' && product_name = '$product_name' && unit = '$unit'");
    ?>
        <select name="packing_size" id="packing_size"  class="span11">
            <option>Select</option>
    <?php
    while($row = mysqli_fetch_assoc($sql)){
            echo "<option>";
                echo $row['packing_size'];
            echo "</option>";
    }

    echo "</select>";
?>