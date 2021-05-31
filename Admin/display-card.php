<?php include ('shared/cards-top.php') ?>
<?php include ('shared/left.php');
    $err = "";
    $res = displayCards();
    if(isset($_GET['delete'])){
        $ret = deleteCard($_GET['uuid']);
        if(!$ret){
            $err = "Error deleting card!";
        }else{
            $err = "Successfully deleted card!";
            $res = displayCards();
        }
    }
?>

<div class = "col-md-9 right">
    <h3 class = "m-4 mb-5">Display Cards</h3>
    <h5 style="color:red">&nbsp;&nbsp;&nbsp; <?php echo $err;?></h5>
    <center>
    <table class="table text-dark mt-4">
        <thead>
            <tr>
                <th scope="col">Card ID</th>
                <th scope="col">Card UUID</th>
                <th scope="col">VIP</th>
                <th scope="col">Balance</th>
                <th scope="col">Status</th>
                <th scope="col">Date Registered</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($res)){ ?>

            <tr class="table-light">
                <td class = "p-4"><?php echo $row['card_id']?> </td>
                <td class = "p-4"><?php echo $row['card_uuid']?></td>
                <td class = "p-4"><?php echo $row['vip']?></td>
                <td class = "p-4"><?php echo "PHP ".$row['balance']?></td>
                <td class = "p-4"><?php echo $row['status']?></td>
                <td class = "p-4"><?php echo $row['date_registered']?></td>
                <td class = "p-4"><form method="get">
                <input type="hidden" name="uuid" value="<?php echo $row['card_uuid']?>">
                <button class = "btn btn-primary btn-sm text-white" name="delete" style = "max-width: 5rem;">Delete</button></form> </td>
            </tr>

            <?php } ?>
        </tbody>
    </table> 
    </center>
</div>

<?php include ('shared/footer.php') ?>