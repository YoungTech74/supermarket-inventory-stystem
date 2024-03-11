<?php
session_start();
// error_reporting(0);
include_once '../../connection.php';
$query = mysqli_query($db, "SELECT * FROM tmp_store");

?>
<table class="table table-bordered">
    <tr>
        <th>Product Company</th>
        <th>Product Name</th>
        <th>Product Unit</th>
        <th>Product Size</th>
        <th>Product Price</th>
        <th>Product Qty</th>
        <th>Total</th>
        <th>Delete</th>
    </tr>
<?php

while ($row = mysqli_fetch_assoc($query)) {
    ?>

    <tr>
        <td><?php echo $row['product_company']; ?></td>
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['product_unit']; ?></td>
        <td><?php echo $row['packing_size']; ?></td>
        <td><?php echo $row['product_price']; ?></td>
        <td> <input type="text" id="tt<?php echo $row['id']; ?>" value="<?php echo $row['product_quantity']; ?>"> &nbsp;<i class="fa fa-refresh" style="font-size: 24px;" onclick="edit_qty(document.getElementById('tt<?php echo $row['id']; ?>').value, '<?php echo $row['product_company']; ?>', '<?php echo $row['product_name']; ?>',  '<?php echo $row['product_unit']; ?>',  '<?php echo $row['packing_size']; ?>',  '<?php echo $row['product_price']; ?>',  '<?php echo $row['product_company']; ?>')">e</i> </td>
        <td><?php echo $row['total']; ?></td>
        <td>
            <a style="color:red; cursor: pointer;" onclick='javascript: confirmDelete(event); return false;' href="./delete_quantity.php?delete_id=<?php echo $row['id']; ?>">Delete</a>
        </td>   
    </tr>
<?php
}

?>

<script>
    function confirmDelete(e){
        var confirmBeforeDelete = confirm("Are you sure you want to delete this record?");
        if(confirmBeforeDelete){
            window.location = e.attr("href");
        }
    }
</script>
</table>