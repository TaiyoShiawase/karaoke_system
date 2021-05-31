<?php include ('shared/Baseline.php');
        $ret = 0;
        $err = "";
        if(isset($_POST['uuid'])){
            $rows = displayCard($_POST['uuid']);
            $status = mysqli_fetch_assoc($rows);

            if($status != null){
                if($status['vip'] == 'F'){
                    $res = vip($_POST['uuid']);
                    if($res){
                        $row = displayCard($_POST['uuid']);
                        if(mysqli_num_rows($row) > 0 ){
                            $card = mysqli_fetch_assoc($row);   
                            createTransaction($card['card_uuid'],"Upgrade to VIP",$card['vip'],150.00,$_SESSION['empID']);
                            $ret = 1;
                        }
                    }
                }else{
                    $err = "Card is already a VIP!";
                }
            }else{
                $err = "No Card Found";
            }
        }
?>

<?php if($ret == 0) {?>
<div class = "col-md-9 right">
    <h3 class = "m-4">Apply for VIP Status</h3>
   
    <center>
    <div class="card text-white bg-secondary mb-3" style="max-width: 20rem; margin-top: 8rem;">
        <div class="card-header">Enter Card Number</div>
        <div class="card-body"> 
        <p style='color:red; text-shadow: 1px 1px 2px #ffffff;'> <?php echo $err;?> </p>
            <form class="form-group row" method="post">
                <div class="col-sm-12">
                    <input type="number" class="form-control" name="uuid"  id="staticEmail" placeholder = "Enter card number..." required>
                    <button name="vip" class = "btn btn-primary btn-sm mt-3">Submit</a>
                </div>
            </form>
        </div>
    </div>
    </center>
</div>

<?php }else{ 
 
?>

<div class = "col-md-9 right">
    <h3 class = "mt-4 mb-4">Apply for VIP Status</h3>
    <h5>Card Details:</h5>
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
    <a href="VIP.php" class = "btn btn-secondary">Exit</a>
    </center>
</div>

<?php } ?>

<?php include ('shared/footer.php') ?>