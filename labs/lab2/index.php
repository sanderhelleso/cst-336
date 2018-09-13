<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body>
        
        <?php
        
        $symbols = array("grapes", "orange", "lemon", "seven", "cherry"); // array with potensial imgs
        $index = rand(0, sizeof($symbols) - 1); // get random number from 0 to length of symbols array
        
        echo "<img src='img/$symbols[$index].png' alt='Seven' title='Seven' />"; // insert random img to page
        
        ?>
        
    </body>
</html>