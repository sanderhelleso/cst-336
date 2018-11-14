<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hangman</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts/googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <div class='container text-center'>
            <header>
                <h1>Hangman</h1>
                <h4>Javascript Edition</h4>
            </header>
        
            <div id="word">
            </div>
            <div id="displayHint">
                <button id="userHint" class="btn btn-info">Hint?</button>
            </div>
            
            <div id="letters"></div>
            <div id="won">
                <h2>You Won!</h2>
                <button class="replayBtn btn btn-success">Play Again</button>
            </div>
            
        <div id="lost">
            <h2>You Lost!</h2>
            <button class="replayBtn btn btn-warning">Play Again</button>
        </div>
            <div id="man">
                <img src="img/stick_0.png" id="hangImg">
            </div>
        </div>
        
        <script src="js/hangman.js"></script>
    </body>
</html>