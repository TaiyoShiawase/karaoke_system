<?php
    session_start();
    $_SESSION["empName"] = "";
	$_SESSION["empID"] = "";
    
    include('functions.php');   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/style-home.css">
    <title>Document</title>
</head>


<body>
    <div class = "container home">
        <div class = "row">
        
            <div class = "col-sm-12 home right">
                
                <div class="row">
                    <div id="machDetails" class="ml-auto col-sm-2">
                        <div class="row">
                            <div class = "ml-auto col-sm-9">
                            <h5 id = "cash-register-id" class="bold">Karaoke Manager</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class = "mx-auto col-sm-7 p-3">
                        <form method="post" class = "bg-secondary">
                            <div class="container bg-primary">
                                <div class="row">
                                    <h4 class="mx-auto">Employee Login</h4>
                                </div>
                                
                                <?php

                                if(isset($_POST['employee_login'])){
                                    $ret = empLogin($_POST['email'],$_POST['pass']);

                                    if($ret == 0){
                                        echo "<center><h5 style='color:red'>employee not found!</h5></center>";
                                    }else{
                                        echo "employee found!";
                                        $res = empDetails($_POST['email'],$_POST['pass']);
                                        $_SESSION["empName"] = $res['firstname']." ".$res['middlename']." ".$res['lastname'];
                                        $_SESSION["empID"] = $res['employee_id'];
                                        header('Location: Employee/NewCard.php');
                                    }
                                }

                                ?>
                            </div>

                            <div class="container">
                                <label for="uname"><b>Email</b></label>
                                <input type="text" placeholder="Enter Email" name="email" required>
                                <label for="psw"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="pass" required>
                            </div>

                            <div class="row pb-3">
                                <button type="submit" class="btn cancelbtn col-sm-7 mx-auto" name="employee_login">Login</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
        <div class = "row footer">
            <p class="ml-auto">
				@Copyright Mafumafu Karaoke Manager 2020
			</p>
        </div>
    </div>
</body>
</html>