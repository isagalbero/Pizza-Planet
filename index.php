<?php

  //connect to database, quatro parametros host, user, password, database
  $connect = mysqli_connect('localhost', 'isa', 'isa123456', 'pizza_planet');
  //check the connection
  if(!$connect){
    echo 'Connection error: ' . mysqli_connect_error();
  }
  // write query for all pizzas
  $sql = 'SELECT title, ingredients, id FROM pizzas';
  //make query and get results
  $result = mysqli_query($connect, $sql);
  //fetch the resulting rows as an array
  $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
  //free memory
  mysqli_free_result($result);
  //close connection
  mysqli_close($connect);

  print_r($pizzas);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<?php include('templates/footer.php'); ?>
    

</html>