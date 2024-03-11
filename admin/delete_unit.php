<?php
    include_once '../connection.php';

    $id = $_GET['deleteId'];

    $sqli = mysqli_query($db, "DELETE FROM units WHERE id='$id';") or die(mysqli_error($db));

    if($sqli){
        ?>
        <script>
          window.location='add_new_unit.php';
        </script>
    <?php
    }
?>
