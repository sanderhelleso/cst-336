<?php
session_start(); 

include 'functions.php'; 
checkLoggedIn(); 
    
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <?php include('navigation.php'); ?>
    <h1>Welcome <?= $_SESSION['username'] ?>!</h1>

    
    <h2>Your memes: </h2>
    
    <div class="memes-container">
      <?php 
         $myMemes = searchForMemes($_SESSION["user_id"]);
         displayMemes($myMemes, true); 
      ?>
    <div style="clear:both"></div>


  </body>
</html>
