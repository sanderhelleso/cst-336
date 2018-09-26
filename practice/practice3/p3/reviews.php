<?php

include 'inc/charts.php';
$posters = array("ready_player_one","rampage","paddington_2","hereditary","alpha","black_panther","christopher_robin","coco","dunkirk","first_man");
$sortedPosters = getRandomReviews();
$counter = 0;

function getRandomReviews() {
    $reviews = array();
    global $posters;
    
    $counter = 0;
    while ($counter != 4) {
        $randomPoster = rand(0,count($posters)-1);
        if (in_array($randomPoster, $posters)) {
            array_pop($posters);
        }
        
        $counter++;
        array_push($reviews, $posters[$randomPoster]);
    }
    
    return $reviews;
    
}

function movieReviews() {
    global $sortedPosters;
    global $counter;
    sort($sortedPosters);
    
    $randomPoster = $sortedPosters[$counter];
    $counter++;
    
    $formatedName = str_replace("_"," ", $randomPoster);
    echo "<div class='poster'>";
    echo "<h2> $formatedName </h2>";
    echo "<img width='100' src='img/posters/$randomPoster.jpg'>";    
    echo "<br>";
    
    //NOTE: $totalReviews must be a random number between 100 and 300
    $totalReviews = rand(100, 300); 
    
    //NOTE: $ratings is an array of 1-star, 2-star, 3-star, and 4-star rating percentages
    //      The sum of rating percentages MUST be 100

    
    $ratings = createRatings();
    
    //NOTE: displayRatings() displays the ratings bar chart and
    //      returns the overall average rating
    $overallRating = displayRatings($totalReviews,$ratings);
    
    //NOTE: The number of stars should be the rounded value of $overallRating
    echo "<br>";
    for ($i = 0; $i < round($overallRating); $i++) {
        echo " <img src='img/star.png' width='25'> ";
    }
    
    echo "<br>Total reviews: $totalReviews";
    echo "</div>";
}   

function createRatings() {
    $ratings = array();
    
    while (array_sum($ratings) != 100 && sizeof($ratings != 4)) {
        
        if (sizeof($ratings) == 4) {
            $ratings = array();
        }
        
        $rating = rand(1, 97);
        array_push($ratings, $rating);
        
        if (sizeof($ratings) != 4 && array_sum($ratings) == 100) {
            $ratings = array();
        }
    }
    
    
    return $ratings;
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Movie Reviews </title>
        <style type="text/css">
            body {
                text-align:center;
            }
            #main {
                display:flex;
                justify-content: center;
            }
            .poster {
                padding: 0 10px;
            }
            
            h2 {
                text-transform: capitalize;
            }
        </style>
    </head>
    <body>
       
       <h1> Movie Reviews </h1>
        <div id="main">
           <?php
             for ($i = 0; $i < 4; $i++) {
                movieReviews();
            }
           ?>
       </div>
       <br/>
       <hr>
       <h1>Based on ratings you should watch:</h1>
       
    </body>
</html>