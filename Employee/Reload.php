<?php include ('shared/Baseline.php'); 
        $ret = 0;
        $err = "";
        if(isset($_POST['reload'])){
            $row = displayCard($_POST['uuid']);
                 
            if(mysqli_num_rows($row) > 0){
                reloadCard($_POST['balance'],$_POST['uuid']); 
                $card = mysqli_fetch_assoc(displayCard($_POST['uuid']));  
                createTransaction($card['card_uuid'],"Reload",$card['vip'],$_POST['balance'],$_SESSION['empID']);
                $ret = 1;
            }else{
                $err = "Invalid Card Number!";
            }
                    
        }
?>


<?php if($ret == 0){ ?>
<div class = "col-md-9 right">
    <h3 class = "m-4">Reload Card Balance</h3>
    <center>
    <div class="card text-white bg-secondary mb-3" style="max-width: 20rem; margin-top: 8rem;">
        <div class="card-header">Enter Amount to Reload</div>
        <div class="card-body">
        <center><h6 style="color:red"> <?php echo $err; ?> </h6></center>
            <form class="form-group row" method="post">
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="staticEmail" name="balance" placeholder = "PHP 0.00" min="25" required>
                    <br>
                    <input type="number" class="form-control" id="staticEmail" name="uuid" placeholder = "Enter card number..." required>
                    <button class = "btn btn-primary btn-sm mt-3" name="reload">Reload</button>
                </div>
                </div>
            </form>
        </div>
    </div>
    </center>
</div>

<?php }else{
    
?>

<div class = "col-md-9 right">
    <h3 class = "mt-4 mb-4">Reload Card Balance</h3>
    <h5>Card Details: Succesfully reloaded <?php echo $_POST['balance']; ?> Pesos! </h5>
    <center>
    <table class="table text-dark mt-4">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-light">
                <th scope="row"></th>
                <th class = "p-4">Card Number:</th>
                <td class = "p-4"><?php echo $card['card_uuid'];?></td>
            </tr>
            <tr class="table-light">
                <th scope="row"></th>
                <th class = "p-4">Date Registered:</th>
                <td class = "p-4"><?php echo $card['date_registered'];?></td>
            </tr>
            <tr class="table-light">
                <th scope="row"></th>
                <th class = "p-4">Balance:</th>
                <td class = "p-4" style="color:green"><strong> <?php echo $card['balance'];?>  </strong> </td>
            </tr>
            <tr class="table-light">
                <th scope="row"></th>
                <th class = "p-4">VIP:</th>
                <td class = "p-4"><?php echo $card['vip'];?></td>
            </tr>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </tbody>
    </table> 
    <a href="Reload.php" class = "btn btn-secondary">Exit</a>
    </center>
</div>

<?php } ?>


<?php include ('shared/footer.php') ?>