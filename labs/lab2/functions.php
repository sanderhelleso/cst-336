<?php
    // store images from specific directory
    $path = "img/signs/";
    $files = array_diff(scandir($path), array('.', '..'));
    $signs = array();
    $points = 0;

    
    // sound files
    $audioFileWin = "sounds/pacman_beginning.mp3";
    $audioFileLose = "sounds/pacman_death.mp3";
    
    //total points and attempts, saved in local storage
    $totalPoints = 0;
    $totalAttempts = 0;


    // play a round of jackpot!
    echo "<div id='grid-container'>";
    showSignsAndScore($files);
    play($path, $files);
    
    function play($path, $files) {
        
        // function to create a random img with sign from folder
        function createSign($path, $files) {
            $index = rand(2, sizeof($files) + 1);
            $signName = ucfirst(explode('.', $files[$index])[0]);
            
            echo "<img class='jackpotImg' src='img/signs/$files[$index]' alt='$signName' title='$signName' />";
            array_push($GLOBALS['signs'], $signName);

        }
        
        // function to display points depending on case
        function displayPoints($signs) {
            
            // if three equal signs
            if ($signs[0] == $signs[1] && $signs[1] == $signs[2]) {
                
                switch($signs[0]) {
                    
                    case 'Blue':
                        $GLOBALS['points'] = 1;
                        break;
                        
                    case 'Gold':
                        $GLOBALS['points'] = 250;
                        break;
                    
                    case 'Cyan':
                        $GLOBALS['points'] = 500;
                        break;
                        
                    case 'Pink':
                        $GLOBALS['points'] = 750;
                        break;
                    
                    case 'Red':
                        $GLOBALS['points'] = 900;
                        break;  
                        
                    case 'Pacman':
                        $GLOBALS['points'] = 1000;
                        break;
                }
                
                
                $GLOBALS['totalPoints'] += $GLOBALS['points'];
            }
            
            // increment total attempts
            $GLOBALS['totalAttempts']++;
        }
        
        
        // call the function to create 3 random signs
        echo "<div id='jackpotCont' class='grid-child'>";
        echo "<h1>CST336 Lab 2<br><span>Pac-Man Edition</span></h1>";
        for ($i = 0; $i < 3; $i++) {
            createSign($path, $files);
        }
        
        // display points
        displayPoints($GLOBALS['signs']);
        
        printPoints($GLOBALS['points']);
        echo "<a id='playAgain' >Play Again</a>";
        echo "</div>";
        
        // clear array with signs for each time user clicks play
        $GLOBALS['signs'] = array();
        
        // display total points and attempts
        echo "<div id='statsCont' class='grid-child'>";
        echo "<h3>Total Points <span id='totalPoints'>" . $GLOBALS['totalPoints'] . "</span></h3>";
        echo "<h3>Total Attempts <span id='totalAttempts'>" . $GLOBALS['totalAttempts'] . "</span></h3>";
        echo "</div>";

    }
    
    // play winning sound and display message
    function printPoints($points) {
        if ($points != 0) {
            echo '<embed src="' . $GLOBALS['audioFileWin'] . '" hidden="true" autostart="true"></embed>';
            echo "<h2 id='message'>You won <span>" . $points . "</span> points!</h2>";
        }
        
        else {
            // play winning sound
            echo '<embed src="' . $GLOBALS['audioFileLose'] . '" hidden="true" autostart="true"></embed>';
            echo "<h3 id='message'>Oh no! You Lost!</h3>";

        }
    }
    
    // display the available signs and its score
    function showSignsAndScore($files) {
        echo "<div id='signsCont' class='grid-child'>";
        for ($i = 2; $i < sizeof($files) + 2; $i++) {
            echo "<div class='pointImgCont'>";
            $signName = ucfirst(explode('.', $files[$i])[0]);
            for ($x = 0; $x < 3; $x++) {
                echo "<img class='pointImg' src='img/signs/$files[$i]' alt='$signName' title='$signName' />";
            }
            
            $points = 0;
            switch($signName) {
                    
                case 'Blue':
                    $points= 1;
                    break;
                        
                case 'Gold':
                    $points = 250;
                    break;
                    
                case 'Cyan':
                    $points = 500;
                    break;
                        
                case 'Pink':
                    $points = 750;
                    break;
                    
                case 'Red':
                    $points = 900;
                    break;  
                        
                case 'Pacman':
                    $points = 1000;
                    break;
                }
            
            echo "<h5> " . $signName . " - <span>" . $points . "</span></h5>";
            echo "</div>";
        }
        echo "</div>";
    }
    
    echo "</div>";
?>