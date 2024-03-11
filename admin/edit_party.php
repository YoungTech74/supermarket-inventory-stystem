

<?php
    include_once 'header.php';
    include_once '../connection.php';


    $firstname = 
    $id = $_GET['editId'];
    $sql = mysqli_query($db, "SELECT * FROM party_info WHERE id='$id';");
    while($row = mysqli_fetch_assoc($sql)){
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $businessname = $row['businessname'];
        $contact = $row['contact'];
        $address = $row['address'];
        $city = $row['city'];
    }
    ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Edit Party Records" class="tip-bottom"><i class="icon-home"></i>
            Edit Party Records</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            
 <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Party Records</h5>
        </div>


        <div class="widget-content nopadding">

          <form action="" name="registration" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name </label>
              <div class="controls">
                <input type="text" class="span11" name="firstname" placeholder="First Name" value="<?php echo $firstname; ?>"/>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Last Name </label>
              <div class="controls">
                <input type="text" class="span11" name="lastname" placeholder="Last name" value="<?php echo $lastname; ?>"/>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Business Name</label>
              <div class="controls">
                <input type="text"  class="span11" name="businessname" placeholder="Business Name" value="<?php echo $businessname; ?>" />
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Contact</label>
              <div class="controls">
                <input type="text"  class="span11" name="contact" placeholder="Contact" value="<?php echo $contact; ?>" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Address</label>
              <div class="controls">
                 <textarea class="span11" name="address" placeholder="Enter Address"> <?php echo $address; ?></textarea>
              </div>
            </div>
        
            <div class="control-group">
              <label class="control-label">City Name</label>
              <div class="controls">
                <input type="text"  class="span11" name="city" placeholder="City Name" value="<?php echo $city; ?>" />
              </div>
            </div>


            <div class="form-actions">
              <button type="submit" name="updatePartyBtn" class="btn btn-success">Update</button>
            </div>

            <div class="alert alert-success" id="success" style="display: none;">
                <strong>Success!</strong> Records Inserted Successfully.
             </div>

          </form>
        </div>
      </div>


      <?php
                if (isset($_POST['updatePartyBtn'])) {
                   
                   
                        $insert = mysqli_query($db, "UPDATE  party_info SET firstname='$_POST[firstname]', lastname='$_POST[lastname]',
                        businessname='$_POST[businessname]',contact='$_POST[contact]',address='$_POST[address]',city='$_POST[city]';");

                        ?>
                        <script>
                            document.getElementById('error').style.display = 'none';
                            document.getElementById('success').style.display = 'block';
                            
                            setTimeout(() => {
                                window.location.href = 'party_info.php';
                            }, 1000);
                        </script>
                    <?php
                    
                }


    ?>
