<?php

  /*if(isset($_GET['submit'])){
    echo $_GET['email'];
    echo $_GET['title'];
    echo $_GET['ingredients'];
  }
  */
  
  //Segurança htmlspecialchars, os 'echos' foram passados pra baixo
  if(isset($_POST['submit'])){
    //echo htmlspecialchars($_POST['email']);
    //echo htmlspecialchars($_POST['title']);
    //echo htmlspecialchars($_POST['ingredients']);

    //check email if it's empty
    if(empty($_POST['email'])){
      echo 'An email is required <br />'
    } else {
      echo htmlspecialchars($_POST['email']);
    }
    
    //check title
    if(empty($_POST['title'])){
      echo 'Title is empty <br />'
    } else {
      echo htmlspecialchars($_POST['title']);
    }
    
    //check ingredients
    if(empty($_POST['ingredients'])){
      echo 'Ingredients is empty <br />'
    } else {
      echo htmlspecialchars($_POST['ingredients']);
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

  <?php include('templates/header.php'); ?>

    <section class="container grey-text">
      <h4 class="center">Pizza Planet</h4>
      <form class="white" action="add.php" method="POST">
        <label for="">Your e-mail</label>
        <input type="text" name="email">
        <label for="">Pizza title</label>
        <input type="text" name="title">
        <label for="">Ingredients</label>
        <input type="text" name="ingredients">
        <div class="center">
          <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
      </form>
    </section>

  <?php include('templates/footer.php'); ?>
    

</html>