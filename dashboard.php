   <?php
   include_once 'include/config.php';
   session_start();
   if(!isset($_SESSION['user_id'])){
         header("Location:login.php");
   }else{
    $sql="SELECT * FROM users WHERE user_email='$_SESSION[user_email]'";
    $run=mysqli_query($conn,$sql);
    $user_data=mysqli_fetch_assoc($run);
   }
 ?>
   
   
   <?php include_once './include/header.php';?>
          
<div class="mx-3 shadow-lg p-3 m-2"> 
    <div class="row">
        <div class="col-12 col-md-12">
            <h1 class="text-center">User Dashboard </h1>
        </div>
    </div>
</div>
<div class="mx-3 shadow p-3 m-2"> 
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h3><?=$user_data['user_name']?></h3>
                            <p class="card-text"><?=$user_data['user_email']?></p>
                            <p class="card-text"><?=$user_data['user_mobile']?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Change Password</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
               
                
            </div>
        </div>
    </div>
</div>
<?php include_once 'include/footer.php'; ?>