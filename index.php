<?php

  include('config/db_connect.php');

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

<h4 class="center green-text">Pizzas!</h4>
<div class="container">
  <div class="row">

    <?php foreach($pizzas as $pizza): ?>
      <div class="col s6 md3">
        <div class="card z-depth-0">
          <img src="img/pizza-slice.svg" class="pizza">
          <div class="card-content center">
            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
            <ul>
              <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
                <li><?php echo htmlspecialchars($ing); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="card-action right-align">
            <a href="more_info.php?id=<?php echo $pizza['id'] ?>" class="brand-text">More Info</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>

<?php include('templates/footer.php'); ?>
    

</html>