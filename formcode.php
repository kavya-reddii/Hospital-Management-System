
<?php
session_start();
include_once './include/config.php';
if(isset($_POST['register'])){

    $status=true;
    $insert=array();
    if(empty($_POST['name'])){
        $data['error']="Name field is required";
        $status=false;
    }
    else{
        $name=$data['value']=$_POST['name'];
    }
    $insert['name']=$data;
    unset($data);

    if(empty($_POST['mobile'])){
        $data['error']="Mobile field is required";
        $status=false;
    }
    else{
        $mobile=$data['value']=$_POST['mobile'];
    }
    $insert['mobile']=$data;
    unset($data);
    

    if(empty($_POST['email'])){
        $data['error']="Email field is required";
        $status=false;
    }
    else{
        $email=$data['value']=$_POST['email'];
    }
    $insert['email']=$data;
    unset($data);
    

    if(empty($_POST['password'])){
        $data['error']="Password field is required";
        $status=false;
    }
    if($_POST['cpassword']==$_POST['password'])
    {
        $password=md5($_POST['password']);
    }
    else
    {
        $data['confirm_error']="Password not matched";
        $status=false;
    }
    $insert['password']=$data;
    unset($data);
    $_SESSION['insert']=$insert;
    if($status==true){
     $sql_user_insert="INSERT INTO users(user_name,user_email,user_mobile,user_password) 
    VALUES('$name','$email','$mobile','$password')";
    $x=mysqli_query($conn,$sql_user_insert);
    if($x==true){
        header("Location:login.php");
        unset($_SESSION['insert']);
    }
    }
    else{
        header("Location:register.php");
    }
}
?>