<?php 
    include_once 'server/saveHighScore.php';
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Space Invaders | A journey through space</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="public/assets/ui/favicon.png">
    <link rel="stylesheet" type="text/css" media="screen" href="public/css/animate.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="public/css/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="public/js/main.js"></script>
</head>
<body>
    <h2 id="unavailable" class="animated fadeIn"></h2>
    <div id="game-cont">
        <div id="menu" class="animated fadeIn">
            <h1 class="animated fadeIn">Space Invaders</h1>
            <button id="start-game">Start Game</button>
            <button id="see-highscores">Highscores</button>
            <p>Developed by Sander Hellesø for CST 336 Homework 4</p>
        </div>
        <div id="highscores" class="animated fadeIn">
            <h1 class="animated fadeIn">Highscores</h1>
            <ul id="highscore-heading">
                <li><span>Name</span> <span>Score</span> <span>Level</span> <span>Date</span></li>
            </ul>
            <button id="back-to-menu">Back to menu</button>
        </div>
        <div id="game-over" class="animated fadeIn">
            <h1 class="animated fadeIn">Game Over</h1>
            <input type="text" min="2" max="20" placeholder="Enter your name" />
            <button id="back-to-menu-game-over" class="disabled-btn" disabled>Save and continue</button>
        </div>
        <div id="game-window" class="animated fadeIn">
            <h2 id="announcement" class="animated fadeInUp"></h2>
            <h3 id="mega-ready" class="animated fadeInUp">PRESS "C" FOR COMBO</h3>
            <div id="life"></div>
            <div id="score-cont">
                <p id="score">Score: </p>
            </div>
            <div id="level-cont">
                <p id="level">Level: </p>
            </div>
            <div id="stats-cont">
                <p id="stats">Enemies Killed: </p>
            </div>
            <div id="player-cont">
                <div id="player-rotate">
                    <img id="player" src="public/assets/sprites/spaceship.png" alt="player" />
                </div>
            </div>
            <div id="enemy-cont"></div>
        </div>
    </div>
</body>
</html>