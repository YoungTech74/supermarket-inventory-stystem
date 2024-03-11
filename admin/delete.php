<?php
    include_once '../connection.php';
    $id = $_GET['deleteId'];
    $sql = mysqli_query($db, "DELETE FROM user_registration WHERE id='$id';") or die(mysqli_error($db));

    
        ?>
            <script>
              window.location='add_new_user.php';
            
            </script>
        <?php
    
?>