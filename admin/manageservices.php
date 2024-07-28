<?php 
session_start();
include_once 'include/validation.php';
include_once './include/config.php';
date_default_timezone_set('Asia/Kolkata');
$date=date('d/m/Y h:i:s A');
if(isset($_POST['add_department']))
{
    $depart=$_POST['department'];
    $date=$_POST['date'];
    if(!empty($_POST['department']))
    {
        $sql_insert="INSERT INTO department(depart_name,updated_at) VALUES('$depart','$date')";
        $run_sql=mysqli_query($conn,$sql_insert);
        if($run_sql==true){
            header("Location:manageservices.php");
        }
    }
}
if(isset($_POST['update_department']))
{
    $id=$_POST['department_id'];
    $depart=$_POST['department'];
    $date=$_POST['date'];
    if(!empty($depart) && !empty($id))
    {
        $sql_update="UPDATE  department SET depart_name='$depart',updated_at='$date' WHERE depart_id='$id'";
        $run_sql=mysqli_query($conn,$sql_update);
        if($run_sql==true){
            header("Location:manageservices.php");
        }
    }
}
if(isset($_GET['delete_id']))
{
    $sql_delete="DELETE FROM department WHERE depart_id='$_GET[delete_id]'";
    $run_sql=mysqli_query($conn,$sql_delete);
    if($run_sql==true){
        header("Location:manageservices.php");
    }
}
include_once 'include/header.php'; ?>
    <div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-10 offset-md-1 mt-5 py-3 bg-white from-wrapper">
            <div class="container shadow-lg py-3">
            	<h3>Manage Department</h3><hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Department Id</th>
                            <th>Department Name</th>
                            <th>Date Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_depart="SELECT * FROM department";
                        $run_depart=mysqli_query($conn,$sql_depart);
                        if(mysqli_num_rows($run_depart)){
                            while($department=mysqli_fetch_assoc($run_depart))
                            {
                                if(isset($_GET['update_id'])&&$_GET['update_id']==$department['depart_id'])
                                {
                                    ?>
                                   
                                          <tr>
                                          <form action="" method="post">
                                          
                                              <td><?=$department['depart_id']?><input type="hidden" name="department_id" value="<?=$department['depart_id']?>"></td>
                                              <td class="align-middle">
                                              <input type="text" class="form-control mt-0" placeholder="Enter Department Name" name="department" value="<?=$department['depart_name']?>" >
                                              </td>
                                              <td>
                                              <input type="text" class="form-control mt-0" placeholder="Date" name="date"  value="<?= $date?>" readonly>
                                              </td>
                                              <td class="align-middle text-center">
                  
                                                  <button class="btn btn-success"  type="submit" name="update_department" value="add_department">Save</button>
                                                  <button class="btn btn-danger" type="button" onclick="javascript:window.location='manageservices.php';">Cancel</button>
                                              </td>
                                          
                                      </form>
                                      </tr>
                                      <?php
                                }
                                else{
                                ?>
                                <tr>
                                    <td><?= $department['depart_id']?></td>
                                    <td><?= $department['depart_name']?></td>
                                    <td><?= $department['updated_at']?></td>
                                    <td><a href="manageservices.php?update_id=<?= $department['depart_id']?>"><button class="btn btn-success">Edit</button></a>
                                    <a href="manageservices.php?delete_id=<?= $department['depart_id']?>"><button class="btn btn-danger">Delete</button></a>
                                </td>

                                </tr>
                                <?php
                                 }
                            }
                        }
                        ?>
                        <?php
                        if(isset($_GET['action'])&&$_GET['action']=='add_department')
                        {
                            ?>
                            <tr>
                        <form action="" method="post">
                        
                            <td>#</td>
                            <td class="align-middle">
                            <input type="text" class="form-control mt-0" placeholder="Enter Department Name" name="department"  >
                            </td>
                            <td>
                            <input type="text" class="form-control mt-0" placeholder="Date" name="date"  value="<?= $date?>">
                            </td>
                            <td class="align-middle text-center">

                                <button class="btn btn-success"  type="submit" name="add_department" value="add_department">Add</button>
                                <button class="btn btn-danger" type="button" onclick="javascript:window.location='manageservices.php';">Back</button>
                            </td>
                        
                    </form>
                    </tr>
                            <?php
                        }
                        ?>
                        
                    </tbody>
                </table>
                <a href="manageservices.php?action=add_department"><button class="btn btn-primary">Add department</button></a>
            </div>
            
        </div>
    </div>  
</div>
     
<?php include_once 'include/footer.php'; ?>