<?php include ('shared/transaction-top.php') ?>
<?php include ('shared/left.php');
        $res = displayTransactions();

?>

<div class = "col-md-9 right">
    <h3 class = "mt-4 mb-3">Transactions History</h3>
    <h6>Made by Karaoke Manager:</h6>
      <!--<input type="text" class="form-control form-control-sm" style="max-width: 20rem;" placeholder = "Enter Cash Register ID...">
    <button class = "btn btn-primary btn-sm mt-3">Filter</button> -->
    <center>
    <table class="table text-dark mt-4" style="height:500px;overflow-y:auto;display:block">
        <thead>
            <tr>
                    <th scope="col">Card Number</th>
                    <th scope="col">Transaction Date</th>
                    <th scope="col">VIP</th>
                    <th scope="col">Transaction Type</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Employee Name</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_assoc($res)){
                    $emp = empDetail($row['employee_id']);
        ?>
                <tr class="table-light">
                    <td class = "p-4"> <?php echo $row['card_uuid']; ?></td>
                    <td class = "p-4"><?php echo $row['date']; ?></td>
                    <td class = "p-4"><?php echo $row['vip']; ?></td>
                    <td class = "p-4"><?php echo $row['description']; ?></td>
                    <td class = "p-4"><?php echo "PHP ".$row['total']; ?></td>
                    <td class = "p-4"><?php echo $row['employee_id']; ?></td>
                    <td class = "p-4"><?php echo $emp['firstname']." ".$emp['lastname']; ?></td>
                </tr>

                <?php } ?>
        </tbody>
    </table> 
    </center>
</div>

<?php include ('shared/footer.php') ?>