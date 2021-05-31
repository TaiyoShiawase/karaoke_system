<?php include ('shared/Baseline2.php');
        $row = getAvailableRooms();
        $err = "";
        $_SESSION['uuid'] = "";
        $_SESSION['hours'] = "";
        $_SESSION['room'] = "";
        if(isset($_GET['proceed'])){
            $ret = isCard($_GET['uuid']);
            if($ret){
                $_SESSION['uuid'] = $_GET['uuid'];
                $_SESSION['hours'] = $_GET['hours'];
                $_SESSION['room'] = $_GET['room'];
                header('Location: KaraokeHour(Room).php');
            }else{
                $err = "Invalid Card Number!";
            }
        }
?>

<div class = "col-md-9 right">
    <h3 class = "m-3">Hourly Subscription</h3>
    <h6 style="color:red"> <?php echo $err; ?> </h6>
    <center>
    <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
        <div class="card-body">
        <table class="table text-dark mt-3">
            <tbody>
            <tr class="table-light">
                    <th>Hourly Rate:</th>
                    <td></td>
                </tr>
                <tr class="table-light">
                    <th>Classic</th>
                    <td>PHP 65.00 / per hour</td>
                </tr>
                <tr class="table-light">
                    <th>VIP</th>
                    <td>PHP 40.00 / per hour</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <div class="card text-white bg-secondary " style="max-width: 20rem;">
        <div class="card-body">
        <form class="form-group row" action="" method="get">
                <div class="col-sm-12">
                    <input type="number" name="hours" class="form-control mt-3 mb-2" id="staticEmail" min="1" placeholder = "Enter Number of Hours..." required>
                    <input type="number" name="uuid" class="form-control" id="staticEmail" min="0" placeholder = "Enter card number..." required> &nbsp
        
                    <select name="room" class="form-control" id="exampleSelect1" required>
                        <optgroup label="Room Number:">
                   <?php while( $rooms = mysqli_fetch_assoc($row)){
                            if($rooms['status'] == 'unoccupied'){
                                echo "<option value=".$rooms['room_id'].">".$rooms['room_id']."</option>";
                            }
                   }?>
                    </optgroup>
                    </select>
                    <div class="btn-group btn-group-sm mt-4" role="group">   
                        <button class = "btn-line btn-primary btn-sm" name="proceed" style = "width: 100px;">Proceed</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </center>
</div>

<?php include ('shared/footer.php') ?>