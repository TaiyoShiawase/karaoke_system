<?php include ('shared/Baseline3.php'); 
    $res = displayRooms();
    $err = "";
    if(isset($_GET['filter'])){
        $res = displayRoom($_GET['key']);
    }

    if(isset($_GET['delete'])){
        $ret = deleteRoom($_GET['roomId']);
        if(!$ret){
            $err = "Error deleting room!";
        }else{
            $err = "Successfully deleted room!";
            $res = displayRooms();
        }
    }
?>

<div class = "col-md-9 right">
    <h3 class = "mt-4 mb-3">Rooms</h3>
    <h5 style="color:red">&nbsp;&nbsp;&nbsp; <?php echo $err;?></h5>
    <h6>Search Room:</h6>
    <form method = "get">
    <input type="text" class="form-control form-control-sm mr-2" name="key" style="max-width: 20rem; float: left;" placeholder = "Enter Keyword...">
    <button class = "btn btn-primary btn-sm" name="filter" style = "max-width: 4rem;">Filter</button>
    </form>
    <center>
    <table class="table text-dark mt-4" style="height:400px;overflow-y:auto;display:block">
        <thead>
            <tr>
                <th scope="col">Room Number</th>
                <th scope="col">Room Name</th>
                <th scope="col">Type</th>
                <th scope="col">Capacity</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

        <?php while($row = mysqli_fetch_assoc($res)){ 
                if($row['status'] == 'occupied'){    
        ?>
            <tr class="table-light">
                <td class = "p-4"> <?php echo $row['room_id']; ?></td>
                <td class = "p-4"> <?php echo $row['room_name']; ?></td>
                <td class = "p-4"> <?php echo $row['type']; ?></td>
                <td class = "p-4"> <?php echo $row['capacity']; ?></td>
                <td class = "p-4"> <?php echo $row['status']; ?></td>
                <td class = "p-4"><form method = "get" action = "update-room.php">
                <input type = "hidden" name = "roomId" value =<?php echo $row['room_id']?>  >
                <button class = "btn btn-primary btn-sm text-white" style = "max-width: 5rem;">Extend</button>
                </form></td>
                <td class = "p-4">
                </form></td>
            </tr>
                
            <?php } } ?>
        </tbody>
    </table> 
    </center>
</div>

<?php include ('shared/footer.php'); ?>