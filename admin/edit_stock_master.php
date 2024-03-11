<?php
    include_once 'header.php';
    include_once '../connection.php';


    $productCompany = ''; 
    $productName = ''; 
    $productUnit = ''; 
    $productQuantity = ''; 
    $productSellingPrice = ''; 


    $id = $_GET['editId'];
    $sql = mysqli_query($db, "SELECT * FROM stocks WHERE id='$id';");

    while($row = mysqli_fetch_assoc($sql)){
        $companyName = $row['product_company'];
        $productName = $row['product_name'];
        $unitName = $row['product_unit'];
        $productQuantity = $row['product_quantity'];
        $productSellingPrice = $row['product_selling_price'];

    }
    ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Edit Stock Master Records" class="tip-bottom"><i class="icon-home"></i>
            Edit Stock Price</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            
 <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Stock Price</h5>
        </div>


        <div class="widget-content nopadding">

          <form action="" name="editStockMasterForm" method="POST" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">Product Company </label>
              <div class="controls">
                <select name="productCompany" id="" class="span11" readonly>
                    <?php
                        $sqli = mysqli_query($db, "SELECT * FROM stocks");
                        while($row = mysqli_fetch_assoc($sqli)){
                            ?>
                                <option><?php echo $row['product_company']; ?> </option>
                            <?php
                        }
                    ?>
                </select>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Product Name</label>
              <div class="controls">
                <input type="text"  class="span11" name="productName" placeholder="Enter Product Name" value="<?php echo $productName; ?>" readonly/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Product Unit </label>
              <div class="controls">
                <select name="productUnit" id="" class="span11" readonly>
                    <?php
                        $sqli = mysqli_query($db, "SELECT * FROM stocks");
                        while($row = mysqli_fetch_assoc($sqli)){
                            ?>
                                <option><?php echo $row['product_unit']; ?> </option>
                            <?php
                        }
                    ?>
                </select>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Product Quantity</label>
              <div class="controls">
                <input type="text"  class="span11" name="productQuantity" placeholder="Enter Packing Size" value="<?php echo $productQuantity; ?>" readonly/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Product Selling Price</label>
              <div class="controls">
                <input type="text"  class="span11" name="productSellingPrice" placeholder="Enter Product Selling Price" value="<?php echo $productSellingPrice; ?>" />
              </div>
            </div>


            <div class="form-actions">
              <button type="submit" name="updateStockBtn" class="btn btn-success">Update</button>
            </div>

            <div class="alert alert-success" id="success" style="display: none;">
                <strong>Success!</strong> Record Inserted Successfully.
             </div>

          </form>
        </div>
      </div>




      <?php
                if (isset($_POST['updateStockBtn'])) {
                   
                   mysqli_query($db, "UPDATE stocks SET product_selling_price='$_POST[productSellingPrice]' WHERE id='$id';") or die(mysqli_error($db));
                        ?>
                        <script>
                            document.getElementById('success').style.display = 'block';
                            
                            setTimeout(() => {
                                window.location.href = 'stock_master.php';
                            }, 1000);
                        </script>
                    <?php
                    
                }


    ?>

    
     