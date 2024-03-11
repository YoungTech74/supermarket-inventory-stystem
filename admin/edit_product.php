<?php
    include_once 'header.php';
    include_once '../connection.php';


    $firstname = 
    $id = $_GET['editId'];
    $sql = mysqli_query($db, "SELECT * FROM products WHERE id='$id';");

    while($row = mysqli_fetch_assoc($sql)){
        $companyName = $row['company_name'];
        $productName = $row['product_name'];
        $unitName = $row['unit'];
        $packingSize = $row['packing_size'];

    }
    ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Edit Product Records" class="tip-bottom"><i class="icon-home"></i>
            Edit Product Records</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            
 <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Product Records</h5>
        </div>


        <div class="widget-content nopadding">

          <form action="" name="addNewProductForm" method="POST" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">Company Name </label>
              <div class="controls">
                <select name="companyName" id="" class="span11">
                    <?php
                        $sqli = mysqli_query($db, "SELECT * FROM company");
                        while($row = mysqli_fetch_assoc($sqli)){
                            ?>
                                <option><?php echo $row['company_name']; ?> </option>
                            <?php
                        }
                    ?>
                </select>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Product Name</label>
              <div class="controls">
                <input type="text"  class="span11" name="productName" placeholder="Enter Product Name" value="<?php echo $productName; ?>" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Unit Name </label>
              <div class="controls">
                <select name="unitName" id="" class="span11">
                    <?php
                        $sqli = mysqli_query($db, "SELECT * FROM units");
                        while($row = mysqli_fetch_assoc($sqli)){
                            ?>
                                <option><?php echo $row['unit']; ?> </option>
                            <?php
                        }
                    ?>
                </select>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Packing Size</label>
              <div class="controls">
                <input type="text"  class="span11" name="packingSize" placeholder="Enter Packing Size" value="<?php echo $packingSize; ?>" />
              </div>
            </div>


            <div class="alert alert-danger" id="error" style="display: none;">
                <strong>Danger!</strong> Product Name already exist, please try another one.
             </div>


            <div class="form-actions">
              <button type="submit" name="updateProductBtn" class="btn btn-success">Update</button>
            </div>

            <div class="alert alert-success" id="success" style="display: none;">
                <strong>Success!</strong> Company Inserted Successfully.
             </div>

          </form>
        </div>
      </div>




      <?php
                if (isset($_POST['updateProductBtn'])) {
                   
                   
                        $insert = mysqli_query($db, "UPDATE  products SET company_name='$_POST[companyName]', product_name='$_POST[productName]',
                        unit='$_POST[unitName]', packing_size='$_POST[packingSize]' WHERE id='$id';");

                        ?>
                        <script>
                            document.getElementById('error').style.display = 'none';
                            document.getElementById('success').style.display = 'block';
                            
                            setTimeout(() => {
                                window.location.href = 'add_products.php';
                            }, 1000);
                        </script>
                    <?php
                    
                }


    ?>

    
     