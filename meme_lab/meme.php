<?php

    include 'database.php';
    $globalMeme;
    function createMeme($line1, $line2, $memeType) {
        
        if ($memeType == 'college-grad') {
              $memeURL = 'https://upload.wikimedia.org/wikipedia/commons/c/ca/LinusPaulingGraduation1922.jpg'; 
        }
        
        else if ($memeType == 'thinking-ape') {
              $memeURL = 'https://upload.wikimedia.org/wikipedia/commons/f/ff/Deep_in_thought.jpg'; 
        }
        
        else if ($memeType == 'coding') {
              $memeURL = 'https://upload.wikimedia.org/wikipedia/commons/b/b9/Typing_computer_screen_reflection.jpg' ; 
        } 
        
        elseif ($memeType == 'old-class') {
              $memeURL = 'https://upload.wikimedia.org/wikipedia/commons/4/47/StateLibQld_1_100348.jpg';
        }

    
        $dbConn = getDatabaseConnection(); 
    
        $sql = "INSERT INTO `all_memes` (`id`, `line1`, `line2`, `meme_type`, `meme_url`) VALUES (NULL, '$line1', '$line2', '$memeType', '$memeURL');"; 
        $statement = $dbConn->prepare($sql); 
        
        $result = $statement->execute(); 
        if (!$result) {
            return null;
        }
        
        $lastId = $dbConn->lastInsertId();
        
        $sql = "SELECT * from all_memes WHERE id = " . $lastId; 
        $statement = $dbConn->prepare($sql); 
        
        $statement->execute(); 
        $records = $statement->fetchAll();
        $newMeme = $records[0];
        
        return $newMeme;
    }
    
    
    if (isset($_POST['line1']) && isset($_POST['line2'])) {
        $memeObj = createMeme($_POST['line1'], $_POST['line2'], $_POST['meme-type']); 
    }

    
    function displayMemes() {
    
        $dbConn = getDatabaseConnection(); 
        $sql = "SELECT * from all_memes WHERE 1"; 

        if (isset($_POST['search'])) {
            
            /*$search = $_POST['search'];
            $sql = "SELECT * from all_memes WHERE line1 LIKE '%" . $search . "%' OR line2 LIKE '%" . $search . "%'";*/
            
        }
    
        $statement = $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchAll(); 
        
        foreach ($records as $record) {
            $memeURL = $record['meme_url']; 
            echo '<div class="memeCont" style="background-image:url('. $memeURL .')">'; 
              echo "<h2 class='memeLine1'>" . $record['line1'] . "</h2>";
              echo "<h2 class='memeLine2'>" .  $record['line2'] . "</h2>";
            echo "</div>";
        }
    }
    
    
?>


<!DOCTYPE html>
<html>
  <head>
    <title>A Meme</title>
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
      
    <?php if ($memeObj) { ?>
        <h1>Your Meme</h1>
        <!--The image needs to be rendered for each new meme
        so set the div's background-image property inline -->
        <div id="meme-div" style="background-image:url(<?= $memeObj['meme_url']; ?>);">
          <h2 id="line1"> <?php echo $memeObj["line1"] ?> </h2>
          <h2 id="line2"> <?php echo $memeObj["line2"] ?> </h2>
        </div>
    <?php } ?>
    <h1>All memes</h1>
    
    <form method="post">
        Search: <input type="text" name="search"/>
        <input type="submit" value="Submit"/>
    </form>
    <br><br>
    <form method="post">
        Memetype: 
        <select name="meme-type">
            <option value=""></option>
            <option value="college-grad">Happy College Grad</option>
            <option value="thinking-ape">Deep Thought Monkey</option>
            <option value="coding">Learning to Code</option>
            <option value="old-class">Old Classroom</option>
        </select>
        <input type="submit" value="Submit"/>
    </form>
    
    
    <?php displayMemes(); ?>
  </body>
</html>