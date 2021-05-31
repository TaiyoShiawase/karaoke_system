<?php include ('shared/Baseline4.php'); 
    $err = "";
    $res = displayRooms($_GET['roomId']);
    $row = mysqli_fetch_assoc($res);
    $row2 = getRoomtime($_GET['roomId']);
    $roomtimeId = mysqli_fetch_assoc($row2);
    if(isset($_POST['extend'])){
        $ret = extendRoom($_POST['hours'],$_POST['roomId'],$roomtimeId['roomtime_id']);
        if(!$ret){
            $err = "Error updating room!";
        }else{
            $newCard = displayCard($_POST['uuid']);
            $card = mysqli_fetch_assoc($newCard);
            $newBalance = 0;
            $rate = 0;
            if($card['vip'] == 'T'){
                $rate = $_POST['hours'] * 40;
            }else{
                $rate = $_POST['hours'] * 60;
            }
            $newBalance = $card['balance'] - $rate;
            updateBalance($newBalance,$_POST['uuid']);
            createTransaction($_POST['uuid'],"Extend roomtime",$card['vip'],$rate,$_SESSION["empID"]);
            header("Location: room.php");
        }
    }
?>

<div class = "col-md-9 right">
    <h3 class = "mt-4 ml-4">Update Room</h3>
    <h5 style="color:red">&nbsp;&nbsp;&nbsp; <?php echo $err;?></h5>
    <div class="card text-white bg-secondary" style="max-width: 30rem; margin-left: 250px;">
        <center><div class="card-header">Enter Room Details</div></center>
        <div class="card-body">
        <form method = "POST">
           <input type="hidden" name="roomId" value="<?php echo $_GET['roomId'] ?>">
            <div class="form-group">
            <label for="exampleInputEmail1">Input Number of Hours</label>
            <input type="number" class="form-control form-control-sm" name="hours" min="1" max="24" placeholder="Enter number of hours..." required>
            </div>
            <label for="exampleInputEmail1">Input Card Number</label>
            <input type="number" class="form-control form-control-sm" name="uuid" min="1" placeholder="Enter card number..." required>
            </div>
            <center><input type="submit" class = "btn btn-primary btn-sm mt-3" name="extend" value = "submit"></center>
        </form>
        </div>
    </div>
</div>

<?php include ('shared/footer.php') ?>