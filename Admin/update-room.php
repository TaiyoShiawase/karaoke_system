<?php include ('shared/create-room-top.php') ?>
<?php include ('shared/left.php'); 
    $err = "";
    $res = displayRooms($_GET['roomId']);
    $row = mysqli_fetch_assoc($res);

    if(isset($_POST['update'])){
        $ret = updateRoom($_POST['roomId'],$_POST['name'],$_POST['type'],$_POST['capacity']);
        if(!$ret){
            $err = "Error updating room!";
        }else{
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
            <label for="exampleInputEmail1">Room Type</label>
            <select type="text" class="form-control form-control-sm" name="type"  value="<?php echo $row['type']?>">
                <option>Regular</option>
                <option>Deluxe</option>
                <option>Party</option>
            </select>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Room Name</label>
            <input type="text" class="form-control form-control-sm" name="name"  value="<?php echo $row['room_name']?> " required>
            </div>

            <div class="form-group">
            <label for="exampleInputEmail1">Room Capacity</label>
            <input type="number" class="form-control form-control-sm" name="capacity" min="5" max="25"  value="<?php echo $row['capacity']?>" required>
            </div>
            <center><input type="submit" class = "btn btn-primary btn-sm mt-3" name="update" value = "submit"></center>
        </form>
        </div>
    </div>
 
</div>

<?php include ('shared/footer.php') ?>