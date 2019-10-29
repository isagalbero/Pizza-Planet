<?php

  /*if(isset($_GET['submit'])){
    echo $_GET['email'];
    echo $_GET['title'];
    echo $_GET['ingredients'];
  }
  */

  //Lesson #30
  include('config/db_connect.php');

  $title = $email = $ingredients = '';
  $error = array('email'=>'', 'title'=>'', 'ingredients'=>'');

  //Segurança htmlspecialchars, os 'echos' foram passados pra baixo
  if(isset($_POST['submit'])){
    //echo htmlspecialchars($_POST['email']);
    //echo htmlspecialchars($_POST['title']);
    //echo htmlspecialchars($_POST['ingredients']);

    //check email if it's empty
    if(empty($_POST['email'])){
      $error['email'] = 'An email is required <br />';
    } else {
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'Must be a valid email';
      }
    }
    
    //check title
    if(empty($_POST['title'])){
      $error['title'] = 'Title is empty <br />';
    } else {
      $title = $_POST['title'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
        $error['title'] = 'Title must be letters and spaces only';
      }
    }
    
    //check ingredients
    if(empty($_POST['ingredients'])){
      $error['ingredients'] = 'Ingredients is empty <br />';
    } else {
      //echo htmlspecialchars($_POST['ingredients']);
      $ingredients = $_POST['ingredients'];
      if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
        $error['ingredients'] = 'Ingredients must be a comma separated list';
      }
    }

    if(array_filter($error)){
      //echo 'errors in the form';
    } else {

      $email = mysqli_real_escape_string($connect, $_POST['email']);
      $title = mysqli_real_escape_string($connect, $_POST['title']);
      $ingredients = mysqli_real_escape_string($connect, $_POST['ingredients']);

      $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES ('$title', '$email', '$ingredients')";

      //Save to DB and check
      if(mysqli_query($connect, $sql)){
        //success
        header('Location: index.php');
      } else {
        //error
        echo 'query error: ' . mysqli_error($connect);
      }
      
    }


  } //end of POST checking

?>

<!DOCTYPE html>
<html lang="en">

  <?php include('templates/header.php'); ?>

    <section class="container grey-text">
      <h4 class="center">Add a pizza</h4>
      <form class="white" action="add.php" method="POST">
        <label for="">Your e-mail</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $error['email'] ?></div>
        <label for="">Pizza title</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
        <div class="red-text"><?php echo $error['title'] ?></div>
        <label for="">Ingredients</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
        <div class="red-text"><?php echo $error['ingredients'] ?></div>
        <div class="center">
          <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
      </form>
    </section>

  <?php include('templates/footer.php'); ?>
    

</html>