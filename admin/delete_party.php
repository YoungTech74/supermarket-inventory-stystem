<?php
    include_once '../connection.php';

    $id = $_GET['deleteId'];

    $sql = mysqli_query($db, "DELETE FROM party_info WHERE id='$id';") or die(mysqli_error($db));

    ?>
    <script>
     
            window.location.href = 'party_info.php';
        
    </script>
<?php
?>