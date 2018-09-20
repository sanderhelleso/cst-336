<?php

    for ($i = 0; $i < 3; $i++) {
        rps();
    }

    function rps() {
        
        $rps = array('scissors', 'rock', 'paper');
        
        $playerOneRoll = $rps[randomIndex()];
        $playerTwoRoll = $rps[randomIndex()];
        
        while ($playerOneRoll == $playerTwoRoll) {
            $playerOneRoll = $rps[randomIndex()];
            $playerTwoRoll = $rps[randomIndex()];
        }
        
        
        getWinner($playerOneRoll, $playerTwoRoll, $rps);
        
    }
    
    function randomIndex() {
        return rand(0, 2);
    }
    
    function getWinner($playerOneRoll, $playerTwoRoll, $rps) {
        
        echo $playerOneRoll;
        echo "<br>";
        echo $playerTwoRoll;
        echo "<br><br>";
        
        
        // scissors vs rock
        if ($playerOneRoll == $rps[0] && $playerTwoRoll == $rps[1]) {
            echo "<div class='row'>";
                echo "<div class='col r'><img src='img/$playerOneRoll.png' alt='" . ucfirst($playerOneRoll) . "'width='150'></div>";
                echo "<div class='col matchWinner'><img src='img/$playerTwoRoll.png' alt='" . ucfirst($playerTwoRoll) . "'width='150'></div>";
            echo "</div>";
            echo "<hr>";
            return;
        }
        
        if ($playerTwoRoll == $rps[1] && $playerOneRoll == $rps[0]) {
            echo "<div class='row'>";
                echo "<div class='col matchWinner'><img src='img/$playerOneRoll.png' alt='" . ucfirst($playerOneRoll) . "'width='150'></div>";
                echo "<div class='col '><img src='img/$playerTwoRoll.png' alt='" . ucfirst($playerTwoRoll) . "'width='150'></div>";
            echo "</div>";
            echo "<hr>";
            return;
        }
        
        // scissors vs paper
        if ($playerOneRoll == $rps[0] && $playerTwoRoll == $rps[2]) {
            echo "<div class='row'>";
                echo "<div class='col '><img src='img/$playerOneRoll.png' alt='" . ucfirst($playerOneRoll) . "'width='150'></div>";
                echo "<div class='col matchWinner'><img src='img/$playerTwoRoll.png' alt='" . ucfirst($playerTwoRoll) . "'width='150'></div>";
            echo "</div>";
            echo "<hr>";
            return;
        }
        
        if ($playerTwoRoll == $rps[2] && $playerOneRoll == $rps[0]) {
            echo "<div class='row'>";
                echo "<div class='col matchWinner'><img src='img/$playerOneRoll.png' alt='" . ucfirst($playerOneRoll) . "'width='150'></div>";
                echo "<div class='col '><img src='img/$playerTwoRoll.png' alt='" . ucfirst($playerTwoRoll) . "'width='150'></div>";
            echo "</div>";
            echo "<hr>";
            return;
        }
        
        // rock vs paper
        if ($playerOneRoll == $rps[1] && $playerTwoRoll == $rps[2]) {
            echo "<div class='row'>";
                echo "<div class='col '><img src='img/$playerOneRoll.png' alt='" . ucfirst($playerOneRoll) . "'width='150'></div>";
                echo "<div class='col matchWinner'><img src='img/$playerTwoRoll.png' alt='" . ucfirst($playerTwoRoll) . "'width='150'></div>";
            echo "</div>";
            echo "<hr>";
            return;
        }
        
        if ($playerTwoRoll == $rps[2] && $playerOneRoll == $rps[1]) {
            echo "<div class='row'>";
                echo "<div class='col matchWinner'><img src='img/$playerOneRoll.png' alt='" . ucfirst($playerOneRoll) . "'width='150'></div>";
                echo "<div class='col '><img src='img/$playerTwoRoll.png' alt='" . ucfirst($playerTwoRoll) . "'width='150'></div>";
            echo "</div>";
            echo "<hr>";
            return;
        }
        
        // scissor vs paper
        if ($playerOneRoll == $rps[0] && $playerTwoRoll == $rps[2]) {
            echo "<div class='row'>";
                echo "<div class='col '><img src='img/$playerOneRoll.png' alt='" . ucfirst($playerOneRoll) . "'width='150'></div>";
                echo "<div class='col matchWinner'><img src='img/$playerTwoRoll.png' alt='" . ucfirst($playerTwoRoll) . "'width='150'></div>";
            echo "</div>";
            echo "<hr>";
            return;
        }
        
        if ($playerTwoRoll == $rps[2] && $playerOneRoll == $rps[0]) {
            echo "<div class='row'>";
                echo "<div class='col matchWinner'><img src='img/$playerOneRoll.png' alt='" . ucfirst($playerOneRoll) . "'width='150'></div>";
                echo "<div class='col '><img src='img/$playerTwoRoll.png' alt='" . ucfirst($playerTwoRoll) . "'width='150'></div>";
            echo "</div>";
            echo "<hr>";
            return;
        }
           
    }
    
    

?>