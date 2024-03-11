<?php

include_once '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Login</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/matrix-login.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="loginbox">

    <form class="form-vertical" action="" name="formLogin" method="POST">
        <div class="control-group normal_text"><h3>Login Page</h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                    <input type="text" name="username" placeholder="Username" required/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                    <input type="password" name="password" placeholder="Password" required/>
                </div>
            </div>
        </div>

        <center>
            <div class="form-actions">
                <input type="submit" name="loginBtn" value="Login" class="btn btn-success">
            </div>
        </center>

    </form>


    <?php

        if(isset($_POST['loginBtn'])){
            $username = mysqli_real_escape_string($db, $_POST['username']);
            $password = mysqli_real_escape_string($db, $_POST['password']);

            $count = 0;
            $sql = mysqli_query($db, "SELECT * FROM user_registration WHERE username='$username' && password='$password'&& role = 'user' && status='active';");

            $count = mysqli_num_rows($sql);

            if($count > 0){
                ?>
                    <script>
                        location='index.php';
                    </script>
                <?php
            }else {
                ?>
                    <div class="alert alert-danger">
                        <strong>Danger!</strong> Invalid login details or Account Blocked by the Admin.
                    </div>
                <?php
            }
        }
    ?>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/matrix.login.js"></script>
</body>

</html>
