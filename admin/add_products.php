<?php
    include_once 'header.php';
    include_once '../connection.php';
    ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Add New Product" class="tip-bottom"><i class="icon-home"></i>
            Add New Product</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            
 <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Product</h5>
        </div>


        <div class="widget-content nopadding">

          <form action="" name="addNewProductForm" method="POST" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">Company Name </label>
              <div class="controls">
                <select name="company_name" id="" class="span11">
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
                <input type="text"  class="span11" name="product_name" placeholder="Enter Product Name"  />
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
                <input type="text"  class="span11" name="packingSize" placeholder="Enter Packing Size"  />
              </div>
            </div>


            <div class="alert alert-danger" id="error" style="display: none;">
                <strong>Danger!</strong> Product Name already exist, please try another one.
             </div>


            <div class="form-actions">
              <button type="submit" name="addNewProductBtn" class="btn btn-success">Add</button>
            </div>

            <div class="alert alert-success" id="success" style="display: none;">
                <strong>Success!</strong> Company Inserted Successfully.
             </div>

          </form>
        </div>
      </div>

      <?php include_once './table_product.php'; ?>

      <?php
                if (isset($_POST['addNewProductBtn'])) {
                    $count = 0;
                    $sql = mysqli_query($db, "SELECT * FROM products WHERE product_name='$_POST[product_name]';");

                    $count = mysqli_num_rows($sql);

                    if ($count > 0) {
                        ?>
                        <script>
                            document.getElementById('error').style.display = 'block';
                            document.getElementById('success').style.display = 'none';
                            setTimeout(() => {
                                window.location.href = window.location.href;
                            }, 2000);
                        </script>
                    <?php
                    } else {
                        $insert = mysqli_query($db, "INSERT INTO products VALUES('', '$_POST[company_name]', '$_POST[product_name]', '$_POST[unitName]', '$_POST[packingSize]');") or die(mysqli_error($db));

                        ?>
                        <script>
                            document.getElementById('error').style.display = 'none';
                            document.getElementById('success').style.display = 'block';
                            
                            setTimeout(() => {
                                window.location.href = window.location.href;
                            }, 2000);
                        </script>
                    <?php
                    }
                }


    ?>

     