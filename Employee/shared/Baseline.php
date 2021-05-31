<?php
    session_start();
    include('../functions.php');   
    header("Refresh:3600");
    $curr_date = date('Y-m-d');
    $curr_time = date('H:i:s');
    updateRoomtimeStatus($curr_date,$curr_time);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Karaoke</title>
</head>
<body>
    <div class = "container">
        <div class = "row">
            <div class = "col-md-3 logo p-2">
                <img id="logo" src="../img/logo.png" alt="">
				<img id="title" src="../img/title.png" alt="">
            </div>
            <div class = "col-md-9 top d-flex align-items-center">
                    <a href="NewCard.php" class="btn btn-primary mx-3">New Card</a>
					<a href="BalInquiry.php" class="btn btn-primary mx-3">Balance Inquiry</a>
					<a href="VIP.php" class="btn btn-primary mx-3">VIP Registration</a>
					<a href="Reload.php" class="btn btn-primary mx-3">Refill Balance</a>
            </div>
        </div>
        <div class = "row">
            <div class = "col-md-3 left">
                <a href="NewCard.php" class="btn btn-primary my-2">Card Management</a>
				<a href="KaraokeHour.php" class="btn btn-primary my-2">Karaoke Hour</a>
                <a href="TransactionsHistory.php" class="btn btn-primary my-2">Transactions History</a>
                <a href="room.php" class="btn btn-primary my-2">Extend Roomtime</a>
                <div class = "employee-details">
                    <h5 id = "employee-fullname">Employee Fullname</h5>
                    <small><p><?php echo $_SESSION["empName"]?></p></small>

                    <a href = "../Home.php" id = "logout" class="btn btn-primary text-white">Logout</a>
                    
                    <div class = "row machdetails mt-3">
                    </div>
			    </div>
            </div>
        