<?php
    include_once '../connection.php';
    if(isset($_GET['delete_id'])){

        $id = $_GET['delete_id'];

        $delete = mysqli_query($db, "DELETE FROM tmp_store WHERE id = '$id'");
        if($delete){
            ?>
                <script>
                    alert('Deleted Successfully');
                    window.location = './sales_master.php';
                </script>
            <?php
        }
    }
?>