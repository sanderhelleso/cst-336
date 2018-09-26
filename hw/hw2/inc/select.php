<?php
    // create an select menu with 9 options
    echo "<select id='select-amount' class='animated fadeIn'>";
        for ($i = 1; $i < 10; $i++) {
            
            if ($i == 3) {
                echo "<option value='$i' selected='selected'>" . $i . "</option>";
            }
            
            if ($i == 6) {
                echo "<option value='$i'>" . $i . "</option>";
            }
            
            if ($i == 9) {
                echo "<option value='$i'>" . $i . "</option>";
            }
        }
    echo "</select>";
?>