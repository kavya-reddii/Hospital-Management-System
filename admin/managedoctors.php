<?php 
    session_start();
    include_once 'include/validation.php';
    include_once 'include/config.php';
    
    if(isset($_POST['register']))
    {
        if(empty($_POST['department'])){
            $error['department']="Department field is required";
        }
        else{
            $department=$_POST['department'];
        }
        if(empty($_POST['name'])){
            $error['name']="Name field is required";
        }
        else{
            $name=$_POST['name'];
        }
        if(empty($_POST['email'])){
            $error['email']="Email field is required";
        }
        else{
            $email=$_POST['email'];
        }
        if(empty($_POST['mobile'])){
            $error['mobile']="Mobile field is required";
        }
        elseif(strlen($_POST['mobile'])!=10)
        {
            $error['mobile']="Mobile number not valid";
            $mobile=$_POST['mobile'];
        }
        else{
            $mobile=$_POST['mobile'];
        }
        if(empty($_POST['gender'])){
            $error['gender']="Gender field is required";
        }
        else{
            $gender=$_POST['gender'];
        }
        if(empty($_POST['address'])){
            $error['address']="Address field is required";
        }
        else{
            $address=$_POST['address'];
        }
    }
    include_once 'include/header.php';

?> 
<div class="container">
    <div class="accordion pt-3" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Add New Doctor
                  </button>
                </h2>
          </div>
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-10 offset-md-1 mt-5 py-3 bg-white ">
                    <div class="container pb-5 shadow-lg ">
                        <h3>Registration for Doctors</h3>
                        <hr>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="Department">Select Department</label>
                                    <select name="department" id="Department" class="form-control">
                                        <option value="">Choose One</option>
                                        <?php
                                        $sql="SELECT * FROM department";
                                        $run=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($run)>0){
                                            while($depart=mysqli_fetch_assoc($run)){
                                                echo "<option value='$depart[depart_id]'>$depart[depart_name]</option> ";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control" value="">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control" value="">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">Choose One</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="address">Full Address</label>
                                    <input type="text" name="address" id="address" class="form-control" value="">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="city">city</label>
                                    <input type="text" name="city" id="city" class="form-control" value="">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="pin_code">pin code</label>
                                    <input type="number" name="pin_code" id="pin_code" class="form-control" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="idtype">Select GOVT id type</label>
                                    <select name="idtype" id="idtype" class="form-control">
                                        <option value="">Choose One</option>
                                        <option value="adhar">Aadhar Card</option>
                                        <option value="pan">Pan Card</option>
    
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="idnum">Id number</label>
                                    <input type="text" name="idnum" id="idnum" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-5 form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" value="">
                                </div>
                                <div class="col-md-2 form-group pt-3 mt-3">
                                    <input type="submit" value="register" name="register" class="btn btn-primary">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div> 
          </div>
        </div>    
    </div> 
    <div class="table-responsive pt-5">
        <table class="table shadow-lg table-hover table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Doctor Id</th>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>doctor 1</td>
                <td>Department 1</td>
                <td><a href="doctorfulldetail.php" > <button class="btn btn-info"><span data-feather="eye"></span>View Full Detail</button> </a></td>
              </tr>
            </tbody>
        </table>
    </div>
    
</div>
<?php      include_once 'include/footer.php'; ?>