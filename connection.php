<?php
// session_start();
   $db = mysqli_connect('localhost', 'root', '', 'inventoryMgtSystem');
   if(!$db){
    die(mysqli_error($db));
   }
?>