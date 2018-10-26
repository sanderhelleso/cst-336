<?php

  include 'database.php';
  function getRandomMeme() {
    $dbConn = getDatabaseConnection(); 
    $sql = "SELECT * from all_memes"; 

    
    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    $records = $statement->fetchAll();
    
    return $records[rand(0, count($records))];
  }
  
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Welcome</title>
    <style>
      #meme-div {
      width: 450px;
      height: 450px;
      background-size: cover;
      text-align: center;
      position: relative;
      }
      
      .memeCont {
          width: 250px;
          height: 250px;
          margin: 5px;
          background-size: cover;
          text-align: center;
          position: relative;
          display: inline-block;
      }
      
      h2 {
        position: absolute;
        left: 0;
        right: 0;
        margin: 15px 0;
        padding: 0 5px;
        font-family: impact;
        color: white;
        text-shadow: 1px 1px black;
      }
      #line1, .memeLine1 {
         top: 0;
       }
      #line2, .memeLine2 {
         bottom: 0;
       }
       
       .bg {
           background-image: url(https://upload.wikimedia.org/wikipedia/commons/f/ff/Deep_in_thought.jpg);
       }
    </style>
  </head>
  <body>
    <h1>Meme Generator</h1>
    <?php
      $memeObj = getRandomMeme();
    ?>
    <div id="meme-div" style="background-image:url(<?= $memeObj['meme_url']; ?>);">
        <h2 id="line1"> <?php echo $memeObj["line1"] ?> </h2>
        <h2 id="line2"> <?php echo $memeObj["line2"] ?> </h2>
    </div>
    <h3>Welcome to my Meme Generator!</h3>
    
    <form method="post" action="meme.php">
        Line 1: <input type="text" name="line1"></input> <br/>
        <br>
        Line 2: <input type="text" name="line2"></input> <br/>
        <br>
        Meme Type:<br>
        <select name="meme-type">
          <option value="college-grad">Happy College Grad</option>
          <option value="thinking-ape">Deep Thought Monkey</option>
          <option value="coding">Learning to Code</option>
          <option value="old-class">Old Classroom</option>
        </select>
        <br>
        <br>
        <br>
        <input type="submit"></input>
        <br>
    </form>
    <hr>
    <br>
    
    <a href="./meme.php">View all memes</a>
  </body>
</html>