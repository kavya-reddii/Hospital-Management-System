<?php
include_once 'include/config.php';
session_start();
if(isset($_SESSION['admin_username']))
{
    header("Location:dashboard.php");
}
if(isset($_POST['admin_login']))
{
    $status=true;
    if(empty($_POST['email'])){
        $error_email="Email field is required";
        $email="";
        $status=false;
    }else{
        $email=$_POST['email'];
    }
    if(empty($_POST['password'])){
        $error_pass="Password field is required";
        $status=false;
    }else{
        $password=$_POST['password'];
    }
    if($status==true){
        $sql="SELECT * FROM admin WHERE admin_username='$email'";
        $run=mysqli_query($conn,$sql);
        if(mysqli_num_rows($run)){
            $admin=mysqli_fetch_assoc($run);
            if($admin['admin_password']==$password){
               $_SESSION['admin_username']=$email;
               header("Location:dashboard.php");
            }
            else{
                $error_pass="Password incorrect";
            }
        }else{
            $error_email="Email not registered";
        }

    }
}

?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
   
    <title>Eva Admin Login</title>
<!-- Bootstrap core CSS -->
<link href="./assets/css//bootstrap.min.css" rel="stylesheet" ">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./assets/floating-labels.css" rel="stylesheet">
  </head>
  <body>
    
<form class="form-signin" method="POST">
   <h1>Admin Login </h1>
  <div class="form-label-group">
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" value="<?=(isset($email))?$email:''?>">
    <label for="inputEmail">Email address</label>
    <small class="text-danger">
        <?=(isset($error_email))?$error_email:''?>
    </small>
  </div>

  <div class="form-label-group">
    <input type="password" id="inputPassword"  name="password" class="form-control" placeholder="Password" >
    
    <label for="inputPassword">Password</label>
    <small clas="text-danger">
        <?=(isset($error_pass))?$error_pass:''?>
    </small>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">Sign in</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2024</p>
</form>


    
  </body>
</html>
