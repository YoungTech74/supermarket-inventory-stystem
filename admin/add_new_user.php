<?php
    include_once 'header.php';
    include_once '../connection.php';
    ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Add New User" class="tip-bottom"><i class="icon-home"></i>
            Add New User</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            
 <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New User</h5>
        </div>


        <div class="widget-content nopadding">

          <form action="" name="registration" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name </label>
              <div class="controls">
                <input type="text" class="span11" name="firstname" placeholder="First name" />
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Last Name </label>
              <div class="controls">
                <input type="text" class="span11" name="lastname" placeholder="Last name" />
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Username</label>
              <div class="controls">
                <input type="text"  class="span11" name="username" placeholder="Username"  />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Password</label>
              <div class="controls">
                <input type="password" class="span11" name="password" placeholder="Enter Password" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Role</label>
              <div class="controls">
                <select name="role" class="span11">
                    <option>User</option>
                    <option >Admin</option>
                </select>
            </div>
            </div>

            <div class="alert alert-danger" id="error" style="display: none;">
                <strong>Danger!</strong> User already exist, please try another one.
             </div>


            <div class="form-actions">
              <button type="submit" name="addNewUserBtn" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="success" style="display: none;">
                <strong>Success!</strong> User Inserted Successfully.
             </div>

          </form>
        </div>
      </div>

      <?php include_once './table.php'; ?>

      <!------------------- php section to add new user  -------------------->

      <?php
                if (isset($_POST['addNewUserBtn'])) {
                    $count = 0;
                    $sql = mysqli_query($db, "SELECT * FROM user_registration WHERE username='$_POST[username]';");

                    $count = mysqli_num_rows($sql);

                    if ($count > 0) {
                        ?>
                        <script>
                            document.getElementById('error').style.display = 'block';
                            document.getElementById('success').style.display = 'none';
                        </script>
                    <?php
                    } else {
                        $insert = mysqli_query($db, "INSERT INTO user_registration VALUES('', '$_POST[firstname]', '$_POST[lastname]', '$_POST[username]', '$_POST[password]', '$_POST[role]', 'active');");
 
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

     