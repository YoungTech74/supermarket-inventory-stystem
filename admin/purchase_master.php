<?php
    include_once 'header.php';
    include_once '../connection.php';
    // error_reporting(1);
    ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Add New Product" class="tip-bottom"><i class="icon-home"></i>
            Add New Purchase</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            
 <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Purchase</h5>
        </div>


        <div class="widget-content nopadding">

          <form action="" name="addNewProductForm" method="POST" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">Select Company</label>
              <div class="controls">
                <select name="company_name" id="company_name" class="span11" onchange="select_company(this.value)">
                    <option>Select</option>
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
              <label class="control-label">Select Product Name</label>
              
              <div class="controls" id="product_name_div">
                    <select class="span11" id="" name="product_name">
                        <option value="">Select</option>
                    </select>
              </div>

            </div>

            <div class="control-group">
              <label class="control-label">Select Unit </label>
              
              <div class="controls" id="unit_div">
                <select name="unit"  class="span11">
                   <option >Select</option>
                </select>
              </div>

            </div>

            


            <div class="control-group">
              <label class="control-label">Packing Size</label>
              <div class="controls" id="packing_size_div">
                <select name="packing_size"  class="span11">
                   <option value="">Select</option>
                </select>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Enter Qty</label>
              <div class="controls">
                 <input type="text" name="quantity" class="span11" value="0">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Enter Price</label>
              <div class="controls">
                 <input type="text" name="price" class="span11" value="0">
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Select Party Name</label>
              <div class="controls">
                <select name="party_name"  class="span11">
                   <?php
                        $query = mysqli_query($db, "SELECT * FROM party_info");
                        while($row = mysqli_fetch_assoc($query)){?>
                        <option><?php echo $row['businessname']; ?></option>  
                        <?php
                      }
                   ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Purchase Type</label>
              <div class="controls">
                <select name="purchase_type"  class="span11">
                   <option  value="cash" >Cash</option>
                   <option value="debit" >Debit</option>
                </select>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Enter Expiry Date</label>
              <div class="controls">
                 <input type="text" name="expiry_date" class="span11" placeholder="yyyy-mm-dd" pattern="\d{4}-\d{2}-\d{2}" required>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" name="purchaseBtn" class="btn btn-success">Purchase Now</button>
            </div>

            <div class="alert alert-success" id="success" style="display: none;">
                <strong>Success!</strong> Purchase Inserted Successfully.
             </div>

          </form>
        </div>
      </div>

      

      <script>
        function select_company(company_name){
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById("product_name_div").innerHTML = xmlhttp.responseText;
                }
            };

            xmlhttp.open("GET", "forajax/load_product_using_company.php?company_name="+company_name, true);
            xmlhttp.send();
        }


        // function to get product unit based on company name and product name 
        function select_product (product_name, company_name){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById("unit_div").innerHTML = xmlhttp.responseText;
                }
            };

            xmlhttp.open("GET", "forajax/load_unit_using_product.php?product_name="+product_name+"&company_name="+company_name, true);
            xmlhttp.send();
        }

        //------------------- function to get packing size using unit value -------------
        function select_unit(unit, product_name, company_name){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById("packing_size_div").innerHTML = xmlhttp.responseText;
                }
            };

            xmlhttp.open("GET", "forajax/load_packing_size_using_unit.php?unit="+unit+"&product_name="+product_name+"&company_name="+company_name, true);
            xmlhttp.send();
        
        }
      </script>


      <?php
                if (isset($_POST['purchaseBtn'])) {
                   
                      $query = mysqli_query($db, "INSERT INTO purchase_master VALUES('', '$_POST[company_name]', '$_POST[product_name]', '$_POST[unit]', '$_POST[packing_size]', '$_POST[quantity]', 
                      '$_POST[price]', '$_POST[party_name]', '$_POST[purchase_type]', '$_POST[expiry_date]')");
                      
                      
                      $count = 0;
                      $res = mysqli_query($db, "SELECT * FROM stocks WHERE product_company = '$_POST[company_name]' && product_name = '$_POST[product_name]' && product_unit = '$_POST[unit]'") or die(mysqli_error($db));
                      $count = mysqli_num_rows($res);

                      if($count == 0){
                        mysqli_query($db, "INSERT INTO stocks VALUES(NULL, '$_POST[company_name]', '$_POST[product_name]', '$_POST[unit]', '$_POST[packing_size]', '$_POST[quantity]', 0)") or die(mysqli_error($db));
                      }else {
                        mysqli_query($db, "UPDATE stocks SET product_quantity = product_quantity + '$_POST[quantity]' WHERE product_company = '$_POST[company_name]' && product_name = '$_POST[product_name]' && product_unit = '$_POST[unit]'");
                      }
                      ?>
                        <script>
                          document.getElementById('success').style.display = 'block';
                          setTimeout(() => {
                            window.location.href = window.location.href;
                          }, 2000);
                        </script>
                      <?php
                } 


    ?>

     