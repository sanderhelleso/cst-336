<?php

    // read json file containing state data
    $jsonFile = file_get_contents("./js/states/states.json");
    $jsonData = json_decode($jsonFile, true);
    
    foreach ($jsonData as $id => $state) {
        
        // set previously selected option
        if ($state == $_POST['state']) {
            echo "<option value='$state' selected='selected'>$state</option>";
        }
        
        else {
            echo "<option value='$state'>$state</option>";
        }
    }
?>