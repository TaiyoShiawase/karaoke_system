<?php include ('shared/create-room-top.php') ?>
<?php include ('shared/left.php');
        $res = displayRoomtime();

?>

<div class = "col-md-9 right">
    <h3 class = "mt-4 mb-3">Roomtime History</h3>
    <h6>Made by Karaoke Manager:</h6>
      <!--<input type="text" class="form-control form-control-sm" style="max-width: 20rem;" placeholder = "Enter Cash Register ID...">
    <button class = "btn btn-primary btn-sm mt-3">Filter</button> -->
    <center>
    <table class="table text-dark mt-4" style="height:500px;overflow-y:auto;display:block">
        <thead>
            <tr>
                    <th scope="col">Room Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time Start</th>
                    <th scope="col">Time End</th>
                    <th scope="col">Type</th>
                    <th scope="col">Capacity</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_assoc($res)){
        ?>
                <tr class="table-light">
                    <td class = "p-4"> <?php echo $row['room_name']; ?></td>
                    <td class = "p-4"><?php echo $row['date']; ?></td>
                    <td class = "p-4"><?php echo $row['time_start']; ?></td>
                    <td class = "p-4"><?php echo $row['time_end']; ?></td>
                    <td class = "p-4"><?php echo $row['type']; ?></td>
                    <td class = "p-4"><?php echo $row['capacity'] ?></td>
                </tr>

                <?php } ?>
        </tbody>
    </table> 
    </center>
</div>

<?php include ('shared/footer.php') ?>