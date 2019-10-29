<?php

  //connect to database, quatro parametros host, user, password, database
  $connect = mysqli_connect('localhost', 'isa', 'isa123456', 'pizza_planet');
  //check the connection
  if(!$connect){
    echo 'Connection error: ' . mysqli_connect_error();
  }
  // write query for all pizzas
  $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY date_time';
  //make query and get results
  $result = mysqli_query($connect, $sql);
  //fetch the resulting rows as an array
  $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
  //free memory
  mysqli_free_result($result);
  //close connection
  mysqli_close($connect);

  //Show on screen
  //print_r($pizzas);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<h4 class="center grey-text">Pizzas!</h4>
<div class="container">
  <div class="row">

    <?php foreach($pizzas as $pizza){ ?>
      <div class="col s6 md3">
        <div class="card z-depth-0">
          <div class="card-content center">
            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
            <ul>
              <?php foreach(explode(',', $pizza['ingredients']) as $ing){ ?>
                <li><?php echo htmlspecialchars($ing); ?></li>
              <?php } ?>
            </ul>
          </div>
          <div class="card-action right-align">
            <a href="#" class="brand-text">More Info</a>
          </div>
        </div>
      </div>
    <?php } ?>

  </div>
</div>

<?php include('templates/footer.php'); ?>
    

</html>