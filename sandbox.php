<?php

  //echo $_SERVER['SERVER_NAME'] . '<br />';
  //echo $_SERVER['REQUEST_METHOD'] . '<br />';

  //$quotes = readfile('readme.txt');
  //echo $quotes;

  $file = 'readme.txt';

  if(file_exists($file)){
    echo readfile($file);
    copy($file, 'quote.txt');
  } else {
    echo 'File does not exist';
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SuperGlobals</title>
</head>
<body>
  
</body>
</html>