<?php

  include('config/db_connect.php');

  if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($connect, $_GET['id']);
    $sql = "SELECT * FROM pizzas WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $pizza = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($connect);
  }


?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<div class="container center">

  <?php if($pizza): ?>
  
    <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
    <p>Created by <?php echo htmlspecialchars($pizza['email']); ?></p>
    <p><?php echo date($pizza['date_time']); ?></p>
    <h5>Ingredients</h5>
    <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>
    
  <?php else: ?>
  
    <h5>No such pizza!</h5>
  
  <?php endif; ?>

</div>

<?php include('templates/footer.php'); ?>

</html>