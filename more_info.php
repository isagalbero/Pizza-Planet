<?php

  include('config/db_connect.php');

  if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($connect, $_POST['id_to_delete']);
    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    if(mysqli_query($connect, $sql)){
      //success ; redirect to header
      header('Location: index.php');
    } {
      //fail
      echo 'query error: ' . mysqli_error($connect); 
    }
  }

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

    <!-- deleting form -->
    <form action="more_info.php" method="POST">
      <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
      <input type="submit" name="delete" value="Delete" class="btn brand z-depth-4">
    </form>

  <?php else: ?>

    <h5>No such pizza!</h5>

  <?php endif; ?>

</div>

<?php include('templates/footer.php'); ?>

</html>