<?php
    include_once '../../connection.php';

    $product_name = $_GET['product_name'];
    $company_name = $_GET['company_name'];

    $sql = mysqli_query($db, "SELECT * FROM products WHERE company_name = '$company_name' && product_name = '$product_name'");
    ?>
        <select name="unit" id="unit"  class="span11" onchange="select_unit(this.value, '<?php echo $product_name; ?>', '<?php echo $company_name; ?>')">
            <option>Select</option>
    <?php
    while($row = mysqli_fetch_assoc($sql)){
            echo "<option>";
                echo $row['unit'];
            echo "</option>";
    }

    echo "</select>";
?>