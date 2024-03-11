<?php
  session_start();

  // if(!isset($_SESSION['admin'])){
  //   ?>
  //     <script>
  //       window.location = 'login.php';
  //     </script>
  //   <?php
  // }
    include_once 'header.php';
    include_once '../connection.php';
    ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Add New Company" class="tip-bottom"><i class="icon-home"></i>
            Add New Company</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            
 <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Company</h5>
        </div>


        <div class="widget-content nopadding">

          <form action="" name="addNewUnitForm" method="POST" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">Company Name </label>
              <div class="controls">
                <input type="text" class="span11" name="companyname" placeholder="Company Name" />
              </div>
            </div>


            <div class="alert alert-danger" id="error" style="display: none;">
                <strong>Danger!</strong> Company already exist, please try another one.
             </div>


            <div class="form-actions">
              <button type="submit" name="addNewCompanyBtn" class="btn btn-success">Add</button>
            </div>

            <div class="alert alert-success" id="success" style="display: none;">
                <strong>Success!</strong> Company Inserted Successfully.
             </div>

          </form>
        </div>
      </div>

      <?php include_once './table_company.php'; ?>

      <?php
                if (isset($_POST['addNewCompanyBtn'])) {
                    $count = 0;
                    $sql = mysqli_query($db, "SELECT * FROM company WHERE company_name='$_POST[companyname]';");

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
                        $insert = mysqli_query($db, "INSERT INTO company VALUES('', '$_POST[companyname]');") or die(mysqli_error($db));

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

     