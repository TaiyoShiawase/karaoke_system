<?php include ('shared/Baseline2.php'); 
        $res = displayTransactions();
?>

<div class = "col-md-9 right">
    <h3 class = "mt-5 mb-3">Transactions History</h3>
    <center>
    
    
        <table class="table text-dark mt-4" style="height:400px;overflow-y:auto;display:block">
            <thead>
                <tr>
                    <th scope="col">Card Number</th>
                    <th scope="col">Transaction Date</th>
                    <th scope="col">VIP</th>
                    <th scope="col">Transaction Type</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Employee ID</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($res)){?>
                <tr class="table-light">
                    <td class = "p-4"> <?php echo $row['card_uuid']; ?></td>
                    <td class = "p-4"><?php echo $row['date']; ?></td>
                    <td class = "p-4"><?php echo $row['vip']; ?></td>
                    <td class = "p-4"><?php echo $row['description']; ?></td>
                    <td class = "p-4"><?php echo "PHP ".$row['total']; ?></td>
                    <td class = "p-4"><?php echo $row['employee_id']; ?></td>
                </tr>

                <?php } ?>
            </tbody>
        </table> 
    

    </center>
</div>

<?php include ('shared/footer.php') ?>