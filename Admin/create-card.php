<?php include ('shared/cards-top.php') ?>
<?php include ('shared/left.php');
      $ret = 0;
      $err = "";
      if(isset($_POST['newCard'])){ 
          $ret = createCard($_POST['uuid']); 
          if(!$ret){
                $err = "Error Creating Card!";
          }else{
                header('Location: display-card.php');
          }
      }
?>

<div class = "col-md-9 right">
    <h3 class = "m-4">Create Card</h3>
    <h5 style="color:red">&nbsp;&nbsp;&nbsp; <?php echo $err;?></h5>
    <center>
    <div class="card text-white bg-secondary mb-3" style="max-width: 20rem; margin-top: 8rem;">
        <div class="card-header">Enter Number of Card:</div>
        <div class="card-body">
            <form class="form-group row" method = "POST">
                <div class="col-sm-12">
                    <input type="number" name="uuid" class="form-control" id="staticEmail" min="1" max="99999999" placeholder = "Enter number of card...">
                    <button class = "btn btn-primary btn-sm mt-3" name="newCard">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </center>
</div>

<?php include ('shared/footer.php') ?>