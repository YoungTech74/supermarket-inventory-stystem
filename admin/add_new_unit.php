<?php
    include_once 'header.php';
    include_once '../connection.php';
    ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Add New Unit" class="tip-bottom"><i class="icon-home"></i>
            Add New Unit</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            
 <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Unit</h5>
        </div>


        <div class="widget-content nopadding">

          <form action="" name="addNewUnitForm" method="POST" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">Unit Name </label>
              <div class="controls">
                <input type="text" class="span11" name="unitname" placeholder="Unit Name" />
              </div>
            </div>


            <div class="alert alert-danger" id="error" style="display: none;">
                <strong>Danger!</strong> Unit already exist, please try another one.
             </div>


            <div class="form-actions">
              <button type="submit" name="addNewUnitBtn" class="btn btn-success">Add</button>
            </div>

            <div class="alert alert-success" id="success" style="display: none;">
                <strong>Success!</strong> Unit Inserted Successfully.
             </div>

          </form>
        </div>
      </div>

      <?php include_once './table_unit.php'; ?>

      <?php
                if (isset($_POST['addNewUnitBtn'])) {
                    $count = 0;
                    $sql = mysqli_query($db, "SELECT * FROM units WHERE unit='$_POST[unitname]';");

                    $count = mysqli_num_rows($sql);

                    if ($count > 0) {
                        ?>
                        <script>
                            document.getElementById('error').style.display = 'block';
                            document.getElementById('success').style.display = 'none';
                            setTimeout(() => {
                                window.location.href = window.location.href;
                            }, 3000);
                        </script>
                    <?php
                    } else {
                        $insert = mysqli_query($db, "INSERT INTO units VALUES('', '$_POST[unitname]');") or die(mysqli_error($db));

                        ?>
                        <script>
                            document.getElementById('error').style.display = 'none';
                            document.getElementById('success').style.display = 'block';
                            
                            setTimeout(() => {
                                window.location.href = window.location.href;
                            }, 3000);
                        </script>
                    <?php
                    }
                }


    ?>

     