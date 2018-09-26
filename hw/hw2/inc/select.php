<?php
    // create an select menu with 9 options
    echo "<select id='select-amount' class='animated fadeIn'>";
        echo "<option disabled>Select amount to display</option>";
        for ($i = 1; $i < 13; $i++) {
            
            if ($i == 3) {
                echo "<option value='$i' selected='selected'>" . $i . "</option>";
            }
            
            if ($i == 6) {
                echo "<option value='$i'>" . $i . "</option>";
            }
            
            if ($i == 9) {
                echo "<option value='$i'>" . $i . "</option>";
            }
            
            if ($i == 12) {
                echo "<option value='$i'>" . $i . "</option>";
            }
        }
    echo "</select>";
?>