<?php
    include_once '../connection.php';


    $id = $_GET['deleteId'];

    $sql = mysqli_query($db, "DELETE FROM company WHERE id='$id';") or die(mysqli_error($db));

    ?>
        <script>
            window.location='company.php';
        </script>
    <?php
?>