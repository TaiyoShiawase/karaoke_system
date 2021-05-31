<?php include ('shared/Baseline2.php');
        $ret = 0;
        $err = "";
        $total = 0.00;
        $curr_date = date('Y-m-d');
        $curr_time = date('H:i:s');

        // $_SESSION['uuid'] 
        // $_SESSION['hours']
        // $_SESSION['room']

        $res = displayCard( $_SESSION['uuid'] );
        if(mysqli_num_rows($res) > 0){
            $row = mysqli_fetch_assoc($res);
            if($row['vip'] == 'T'){
                $total = 40.00 * $_SESSION['hours'];
            }else{
                $total = 65.00 * $_SESSION['hours'];
            }

            if( $row['balance'] > $total ){
                if(isset($_POST['subscribe'])){
                $newBalance = $row['balance'] - $total;
                updateBalance($newBalance,$_SESSION['uuid']);
                updateRoomStatus($_SESSION['room']);

                createRoomtime($_SESSION['room'],$_SESSION['hours'],$curr_time);
                $roomtime = getRoomtimeId($_SESSION['room'],$curr_date,$curr_time);
                $roomtimeId = mysqli_fetch_assoc($roomtime);
   
                $final = createTransactionRoom($row['card_uuid'],"Hourly Subscription",$row['vip'],$total,$_SESSION['room'],$roomtimeId['roomtime_id'],$_SESSION['empID']);
                    if(!$final){
                        $err = "Transaction failed!";
                    }else{
                        $ret = 1;
                    }
                }
            }else{
                $err = "Insufficient funds!";
            }
            
        }

?>

<?php if($ret == 0){ ?>
<div class = "col-md-9 right">
    <h3 class = "mt-4 mb-4">Hourly Subscription</h3>
    <h5>Subscription Plan:</h5>
    <h6 style="color:red"> <?php echo $err; ?> </h6> 
    <center>
    <table class="table text-dark mt-2">
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
                <td class = "p-4"><strong> <?php echo $_SESSION['uuid']; ?> </strong> </td>
            </tr>
            <tr class="table-light">
                <th scope="row"></th>
                <th class = "p-4">Number of Hours:</th>
                <td class = "p-4"><?php echo $_SESSION['hours']; ?> </td>
            </tr>
            <tr class="table-light">
                <th scope="row"></th>
                <th class = "p-4">Room Number:</th>
                <td class = "p-4"><?php echo $_SESSION['room']; ?></td>
            </tr>
            <tr class="table-light">
                <th scope="row"></th>
                <th class = "p-4" >Hourly Rate (<?php echo ($row['vip'] == 'T')?"VIP":"Classic"; ?>):</th>
                <td class = "p-4"><?php echo ($row['vip'] == 'T')?"PHP 40.00":"PHP 65.00"; ?></td>
            </tr>
            <tr class="table-light">
                <th scope="row"></th>
                <th class = "p-4" style = "font-size: 20px;">TOTAL PRICE:</th>
                <td class = "p-4" style = "font-size: 20px;"><strong> <?php echo "PHP ".$total.".00";?></strong></td>
            </tr>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </tbody>
    </table> 

    <form method="post"> <button name="subscribe" class = "btn btn-secondary">Confirm</button></form>
    <a href="KaraokeHour.php" class ="btn btn-secondary">Cancel</a>
   
    </center>
</div>

<?php } else {?>

<div class = "col-md-9 right">
    <h3 class = "mt-4 mb-4">Hourly Subscription</h3>
    <h5>Receipt:</h5>
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
                <td class = "p-4"><?php echo $row['card_uuid']; ?></td>   
            </tr>
            <tr class="table-light">
                <th scope="row"></th>
                <th class = "p-4">Date Registered:</th>
                <td class = "p-4"><?php echo $curr_date; ?></td>
            </tr>
            <tr class="table-light">
                <th scope="row"></th>
                <th class = "p-4">Balance:</th>
                <td class = "p-4"><?php echo $newBalance;?></td>
            </tr>
            <tr class="table-light">
                <th scope="row"></th>
                <th class = "p-4">VIP:</th>
                <td class = "p-4"><?php echo $row['vip']; ?></td>
            </tr>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </tbody>
    </table> 
    <a href="KaraokeHour.php" class = "btn btn-secondary">Exit</a>
    </center>
</div>

<?php } ?>

<?php include ('shared/footer.php') ?>