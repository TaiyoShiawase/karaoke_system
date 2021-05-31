<?php include ('shared/employees-top.php') ?>
<?php include ('shared/left.php'); 
    $err = "";
    $res = displayEmployeeById($_GET['empId']);
    $row = mysqli_fetch_assoc($res);

    if(isset($_POST['update'])){
        $ret = updateEmployee($_POST['empId'],$_POST['position'],$_POST['first_name'],$_POST['middle_name'],$_POST['last_name'],$_POST['email'],$_POST['address'],$_POST['password'],$_POST['gender']);
        if(!$ret){
            $err = "Error updating employee!";
        }else{
            header('Location: employees-list.php');
        }
    }

?>

<div class = "col-md-9 right">
    <h3 class = "mt-4 ml-4">Update Employee</h3>
    <h5 style="color:red">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $err;?></h5>
    <div class="card text-white bg-secondary" style="max-width: 30rem; margin-left: 250px;">
        <center><div class="card-header">Update Employee Details</div></center>
        <div class="card-body">
        <form method = "post">
            <input type="hidden" name="empId" value="<?php echo $_GET['empId'] ?>">
            <div class="form-group">
            <label for="exampleInputEmail1">Employee Position</label>
            <select type="text" class="form-control form-control-sm" name="position" value="<?php echo $row['position']?>">
                <option>Cashier</option>
                <option>Admin</option>
                <option>Maintenance</option>
            </select>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control form-control-sm" name="email" value="<?php echo $row['email']?>"  required>
            </div>

            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control form-control-sm" name="first_name" value="<?php echo $row['firstname']?>"  required>
            <input type="text" class="form-control form-control-sm" name="middle_name" value="<?php echo $row['middlename']?>" >
            <input type="text" class="form-control form-control-sm" name="last_name" value="<?php echo $row['lastname']?>" required>
     
            <div class="form-group">
            <label for="exampleInputEmail1">Gender</label>
            <select type="text" class="form-control form-control-sm" name="gender">
                <option selected disabled><?php echo "Current gender is: ".$row['gender']?></option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control form-control-sm" name="address" value="<?php echo $row['address']?>"  required>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control form-control-sm" name="password" value="<?php echo $row['password']?>" required>
            </div>
            <center><input type="submit" class = "btn btn-primary btn-sm mt-3" name="update" value = "submit"></center>
        </form>
        </div>
    </div>
 
</div>

<?php include ('shared/footer.php') ?>