<?php include ('shared/employees-top.php') ?>
<?php include ('shared/left.php'); 
    $err = "";
    if(isset($_POST['create'])){
        $res = createEmployee($_POST['position'],$_POST['first_name'],$_POST['middle_name'],$_POST['last_name'],$_POST['email'],$_POST['address'],$_POST['password'],$_POST['gender']);
        if(!$res){
            $err = "Error creating employee!";
        }else{
            header('Location: employees-list.php');
        }
    }


?>

<div class = "col-md-9 right">
    <h3 class = "mt-4 ml-4">Add Employee</h3>
    
    <div class="card text-white bg-secondary" style="max-width: 30rem; margin-left: 250px;">
        <center><div class="card-header">Enter Employee Details</div></center>
        <div class="card-body">
        <form method = "POST">
            <div class="form-group">
            <label for="exampleInputEmail1">Employee Position</label>
            <select type="text" class="form-control form-control-sm" name="position" placeholder="Position">
                <option>Cashier</option>
                <option>Admin</option>
                <option>Maintenance</option>
            </select>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control form-control-sm" name="email" placeholder="Enter employee email..." required>
            </div>

            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control form-control-sm" name="first_name" placeholder="First Name" required>
            <input type="text" class="form-control form-control-sm" name="middle_name" placeholder="Middle Name">
            <input type="text" class="form-control form-control-sm" name="last_name" placeholder="Last Name" required>
     
            <div class="form-group">
            <label for="exampleInputEmail1">Gender</label>
            <select type="text" class="form-control form-control-sm" name="gender" placeholder="MM-DD-YY">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control form-control-sm" name="address" placeholder="Enter Address..." required>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control form-control-sm" name="password" placeholder="Enter password..." required>
            </div>
            <center><input type="submit" class = "btn btn-primary btn-sm mt-3" name="create" value = "submit"></center>
        </form>
        </div>
    </div>
 
</div>

<?php include ('shared/footer.php') ?>