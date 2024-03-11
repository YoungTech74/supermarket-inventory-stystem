<?php
    include_once '../../connection.php';

    $company_name = $_GET['company_name'];

    $sql = mysqli_query($db, "SELECT * FROM products WHERE company_name = '$company_name'");
    ?>
        <select name="product_name" id="product_name"  class="span11" onchange="select_product(this.value, '<?php echo $company_name; ?>')">
            <option>Select</option>
    <?php
    while($row = mysqli_fetch_assoc($sql)){
            echo "<option>";
                echo $row['product_name'];
            echo "</option>";
    }

    echo "</select>";
?>