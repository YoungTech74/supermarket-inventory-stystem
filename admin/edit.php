<?php
    include_once 'header.php';
    include_once '../connection.php';
    
    $firstname = '';
    $lastname = '';
    $username = '';
    $role = '';
    $status = '';
    $password = '';


    $id = $_GET['editId'];
    $sqli = mysqli_query($db, "SELECT * FROM user_registration WHERE id='$id';") or die(mysqli_error($db));
    while ($row = mysqli_fetch_assoc($sqli)) {
        
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $username = $row['username'];
        $password = $row['password'];
        $status = $row['status'];
        $role = $row['role'];
    }

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Edit User Records" class="tip-bottom"><i class="icon-home"></i>
            Edit User Records</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
           
        <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit User Records</h5>
        </div>


        <div class="widget-content nopadding">

          <form action="" name="registration" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name </label>
              <div class="controls">
                <input type="text" class="span11" name="firstname" value="<?php echo $firstname;?> " placeholder="First name" />
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Last Name </label>
              <div class="controls">
                <input type="text" class="span11" name="lastname" placeholder="Last name" value="<?php echo $lastname;?> " />
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Username</label>
              <div class="controls">
                <input type="text"  class="span11" name="username" placeholder="Username" value="<?php echo $username;?> "  readonly/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Password</label>
              <div class="controls">
                <input type="password" class="span11" name="password" placeholder="Enter Password" value="<?php echo $password;?> " />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Role</label>
              <div class="controls">
                <select name="role" class="span11">
                    <option <?php if($role =="user") {echo "selected";} ?>>User</option>
                    <option <?php if($role =="admin") {echo "selected";} ?>>Admin</option>
                </select>
            </div>
            </div>


            <div class="control-group">
              <label class="control-label">Select Status</label>
              <div class="controls">
                <select name="status" class="span11">
                    <option <?php if($status == "active") {echo "selected";} ?>>Active</option>
                    <option <?php if($status == "inactive") {echo "selected";} ?>>Inactive</option>
                </select>
            </div>
            </div>

            <?php

?>

            <div class="alert alert-danger" id="error" style="display: none;">
                <strong>Danger!</strong> Records was not updated successfully.
             </div>


            <div class="form-actions">
              <button type="submit" name="editUserBtn" class="btn btn-success">Update</button>
            </div>

            <div class="alert alert-success" id="success" style="display: none;">
                <strong>Success!</strong> Record Updated Successfully.
             </div>

          </form>
        </div>
      </div>
        </div>

    </div>
</div>


<?php
    if(isset($_POST['editUserBtn'])){
        $updateUser = mysqli_query($db, "UPDATE user_registration SET firstname='$_POST[firstname]', 
        lastname='$_POST[lastname]', password='$_POST[password]',
        role='$_POST[role]', status='$_POST[status]' WHERE id='$id';") or die(mysqli_error($db));

        if($updateUser){
            ?>
            <script>
                document.getElementById('error').style.display = 'none';
                document.getElementById('success').style.display = 'block';
                
                setTimeout(() => {
                    window.location.href = 'add_new_user.php';
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
