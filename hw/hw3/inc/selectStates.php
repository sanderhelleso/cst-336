<?php
    $jsonFile = file_get_contents("./js/states/states.json");
    $jsonData = json_decode($jsonFile, true);
    
    foreach ($jsonData as $id => $state) {
        echo "<option value='$state'>$state</option>";
    }
?>