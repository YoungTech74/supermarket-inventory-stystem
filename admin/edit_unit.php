<?php
    include_once 'header.php';
    include_once '../connection.php';
    
    $unitname = '';
 


    $id = $_GET['editId'];

    $sqli = mysqli_query($db, "SELECT * FROM units WHERE id='$id';") or die(mysqli_error($db));
    while ($row = mysqli_fetch_assoc($sqli)) {
        
        $unitname = $row['unit'];
        
    }

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Edit Unit" class="tip-bottom"><i class="icon-home"></i>
            Edit Unit</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
           
        <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Unit</h5>
        </div>


        <div class="widget-content nopadding">

          <form action="" name="registration" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Unit Name </label>
              <div class="controls">
                <input type="text" class="span11" name="unitname" value="<?php echo $unitname;?> " placeholder="Unit Name" />
              </div>
            </div>


            <div class="alert alert-danger" id="error" style="display: none;">
                <strong>Danger!</strong> Unit was not updated successfully.
             </div>


            <div class="form-actions">
              <button type="submit" name="editUnitBtn" class="btn btn-success">Update</button>
            </div>

            <div class="alert alert-success" id="success" style="display: none;">
                <strong>Success!</strong> Unit was Updated Successfully.
             </div>

          </form>
        </div>
      </div>
        </div>

    </div>
</div>


<?php
    if(isset($_POST['editUnitBtn'])){

        $updateUser = mysqli_query($db, "UPDATE units SET unit='$_POST[unitname]' WHERE id='$id';") or die(mysqli_error($db));

        if($updateUser){
            ?>
            <script>
                document.getElementById('error').style.display = 'none';
                document.getElementById('success').style.display = 'block';
                
                setTimeout(() => {
                    window.location.href = 'add_new_unit.php';
                }, 3000);
            </script>
            <?php
        }else {
            ?>
            <script>
                document.getElementById('error').style.display = 'block';
                document.getElementById('success').style.display = 'none';
            </script>
        <?php
        }
        
    }
?>
<!--end-main-container-part-->

<!------------------------------- footer section  ------------------------------->
<?php include_once 'footer.php'; ?>
