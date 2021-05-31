<?php   include ('shared/Baseline.php');
        $ret = 0;
        $flag = 0;
        if(isset($_POST['newCard'])){ 
            $ret = createCard($_POST['uuid']);  
            if($ret == 0){
                $flag = 1;
            }
        }
?>

<?php if($ret == 0){ ?>
<div class = "col-md-9 right">
    <h3 class = "m-4">Create New Card</h3>
    <center>
    <div class="card text-white bg-secondary mb-3" style="max-width: 20rem; margin-top: 8rem;">
        <div class="card-header">Enter Card Number</div>
        <div class="card-body">
        <p style='color:red; 1px 1px 2px #ffffff;'> <?php if($flag) echo "Card Number already exist";?> </p>
            <form class="form-group row" method="post">
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="staticEmail" name="uuid" placeholder = "Enter card number..." min="1">
                    <input type="hidden" name="date" value="<?php date('Y-m-d') ?>">
                    <button class = "btn btn-primary btn-sm mt-3" name="newCard">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </center>
</div>

<?php }else if($ret){ 
    $card = mysqli_fetch_assoc(displayCard($_POST['uuid']));     
?>
   
    <div class = "col-md-9 right">
    <h3 class = "mt-5 mb-3">Card Created Successfully</h3>
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
                <td class = "p-4"><?php echo $card['balance'];?></td>
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
    <a href="NewCard.php" class = "btn btn-secondary">Exit</a>
    </center>
</div>
<?php } ?>

<?php include ('shared/footer.php') ?>