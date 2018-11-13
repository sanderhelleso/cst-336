<?php
session_start(); 
include 'functions.php';

checkLoggedIn(); 

if (isset($_POST['id'])) {
    //user submitted the form to edit a meme
    editMeme($_POST['id'], $_POST['line1'], $_POST['line2'], $_POST['meme-type']); 
}

$memeID = $_GET['id'];
$memeObj = fetchMemeFromDB($memeID); 


function showSelected($selectedType, $currentType) {
    if ($currentType == $selectedType)
        echo " selected='selected' "; 
}

function generateOptions($selectedType) {
    $memeTypes = array(
        "college-grad" => "Happy College Grad", 
        "thinking-ape" => "Deep Thought Monkey", 
        "coding" => "Learning to Code", 
        "old-class" => "Old Classroom"); 
    
    foreach ($memeTypes as $memeType => $description) {
        echo "<option "; 
        
        if ($selectedType == $memeType)
            echo "selected='selected' "; 
            
        echo "value='$memeType'>$description</option>"; 
    }
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <?php include 'navigation.php' ?>
    <h1>Edit Meme</h1>
     
    <?php displayMemes(array($memeObj)); ?>
     
    <form method="post">
        <input type="hidden" name="id" value=<?= $memeObj['id'] ?>>
        Line 1: <input type="text" name="line1" value=<?= $memeObj['line1'] ?>></input> <br/>
        Line 2: <input type="text" name="line2" value=<?= $memeObj['line2'] ?>></input> <br/>
        Meme Type:
        <select name="meme-type">
          <?php generateOptions($memeObj['meme_type']); ?>
        </select>
        <br/>
        <input type="submit"></input>
    </form>
    
    
  
    
  </body>
</html>