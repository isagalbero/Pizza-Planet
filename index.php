<?php

  //connect to database, quatro parametros host, user, password, database
  $connect = mysqli_connect('localhost', 'isa', 'isa123456', 'pizza_planet');
  //check the connection
  if(!$connect){
    echo 'Connection error: ' . mysqli_connect_error();
  }
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<?php include('templates/footer.php'); ?>
    

</html>