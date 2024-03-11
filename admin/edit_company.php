<?php
    include_once 'header.php';
    include_once '../connection.php';
    
    $companyName = '';
 


    $id = $_GET['editId'];

    $sqli = mysqli_query($db, "SELECT * FROM company WHERE id='$id';") or die(mysqli_error($db));
    while ($row = mysqli_fetch_assoc($sqli)) {
        
        $companyName = $row['company_name'];
        
    }

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Edit Company" class="tip-bottom"><i class="icon-home"></i>
            Edit Company</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
           
        <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Company</h5>
        </div>


        <div class="widget-content nopadding">

          <form action="" name="registration" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Company Name </label>
              <div class="controls">
                <input type="text" class="span11" name="companyname" value="<?php echo $companyName;?> " placeholder="Company Name" />
              </div>
            </div>


            <div class="alert alert-danger" id="error" style="display: none;">
                <strong>Danger!</strong> Company was not updated successfully.
             </div>


            <div class="form-actions">
              <button type="submit" name="editCompanyBtn" class="btn btn-success">Update</button>
            </div>

            <div class="alert alert-success" id="success" style="display: none;">
                <strong>Success!</strong> Company was Updated Successfully.
             </div>

          </form>
        </div>
      </div>
        </div>

    </div>
</div>


<?php
    if(isset($_POST['editCompanyBtn'])){

        $updateUser = mysqli_query($db, "UPDATE company SET company_name='$_POST[companyname]' WHERE id='$id';") or die(mysqli_error($db));

        if($updateUser){
            ?>
            <script>
                document.getElementById('error').style.display = 'none';
                document.getElementById('success').style.display = 'block';
                
                setTimeout(() => {
                    window.location.href = 'company.php';
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
