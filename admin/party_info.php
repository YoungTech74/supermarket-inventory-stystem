<?php
    include_once 'header.php';
    include_once '../connection.php';
    ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Add New Party" class="tip-bottom"><i class="icon-home"></i>
            Add New Party</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            
 <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Party</h5>
        </div>


        <div class="widget-content nopadding">

          <form action="" name="registration" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name </label>
              <div class="controls">
                <input type="text" class="span11" name="firstname" placeholder="First Name" />
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Last Name </label>
              <div class="controls">
                <input type="text" class="span11" name="lastname" placeholder="Last name" />
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Business Name</label>
              <div class="controls">
                <input type="text"  class="span11" name="businessname" placeholder="Business Name"  />
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Contact</label>
              <div class="controls">
                <input type="text"  class="span11" name="contact" placeholder="Contact"  />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Address</label>
              <div class="controls">
                 <textarea class="span11" name="address" placeholder="Enter Address"></textarea>
              </div>
            </div>
        
            <div class="control-group">
              <label class="control-label">City Name</label>
              <div class="controls">
                <input type="text"  class="span11" name="city" placeholder="City Name"  />
              </div>
            </div>


            <div class="form-actions">
              <button type="submit" name="addNewPartyBtn" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="success" style="display: none;">
                <strong>Success!</strong> Records Inserted Successfully.
             </div>

          </form>
        </div>
      </div>

      <?php include_once './table_party.php'; ?>

      <?php
                if (isset($_POST['addNewPartyBtn'])) {
                   
                   
                        $insert = mysqli_query($db, "INSERT INTO party_info VALUES('', '$_POST[firstname]', '$_POST[lastname]', '$_POST[businessname]', '$_POST[contact]', '$_POST[address]', '$_POST[city]');");

                        ?>
                        <script>
                            document.getElementById('error').style.display = 'none';
                            document.getElementById('success').style.display = 'block';
                            
                            setTimeout(() => {
                                window.location.href = window.location.href;
                            }, 1000);
                        </script>
                    <?php
                    
                }


    ?>

     