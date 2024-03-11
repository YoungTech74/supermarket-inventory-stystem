<?php
    include_once 'header.php';
    include_once '../connection.php';

    ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Add New Product" class="tip-bottom"><i class="icon-home"></i>
            Stock Master</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            
    <div class="row-fluid">
        <div class="span12">

      
      

      <?php include_once './stock_master_table.php'; ?>

     
     