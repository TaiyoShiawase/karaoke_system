<?php include ('shared/transaction-top.php') ?>
<?php include ('shared/left.php');
    $res = displayEmployees();
    $err="";
    if(isset($_GET['filter'])){
        $res = displayEmployee($_GET['name']);
    }


    if(isset($_GET['delete'])){
        $ret = deleteEmployee($_GET['empId']);
        if(!$ret){
            $err = "Failed to delete employee!";
        }else{
            $err = "Succesfully deleted employee!";
            $res = displayEmployees();
        }
    
    }

?>

<div class = "col-md-9 right">
    <h3 class = "mt-4 mb-3">Employees List</h3>
    <h5 style="color:red">&nbsp; <?php echo $err;?></h5>
    <div class="form-group mt-3">
       <h6>Search Employee:</h6>
       <form method="get">
        <input type="text" class="form-control form-control-sm" name="name" style="max-width: 20rem;" placeholder = "Enter Family Name..."><br>
        <button class = "btn btn-primary btn-sm" name="filter">Filter</button>
        <a href="add-employee.php" class = "btn btn-primary btn-sm" style="color:white">Create New</a>
        </form>
       
    </div>
    <center>
    <table class="table text-dark mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Date Employed</th>
                <th scope="col">Position</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($res)){ ?>
            <tr class="table-light">
                <td class = "p-4"><?php echo $row['employee_id']?></td>
                <td class = "p-4"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']?></td>
                <td class = "p-4"><?php echo $row['address']?></td>
                <td class = "p-4"><?php echo $row['email']?></td>
                <td class = "p-4"><?php echo $row['date_employed']?></td>
                <td class = "p-4"><?php echo $row['position']?></td>
                <td class = "p-4"><form method = "get" action = "update-employee.php">
                <input type = "hidden" name = "empId" value =<?php echo $row['employee_id']?> >
                <button class = "btn btn-primary btn-sm text-white" style = "max-width: 5rem;">Update</button>
                </form></td>
                <td class = "p-4"><form method = "get">
                <input type = "hidden" name = "empId" value =<?php echo $row['employee_id']?> >
                <button class = "btn btn-primary btn-sm text-white" name="delete" style = "max-width: 5rem;">Delete</button>
                </form>
                </td>
            </tr>

            <?php } ?>
        </tbody>
    </table> 
    </center>
</div>

<?php include ('shared/footer.php') ?>