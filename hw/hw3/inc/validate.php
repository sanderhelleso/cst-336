<?php

    // initial error state
    $firstNameError = $lastNameError = $birthDateError = $streetError = "";
    
    // check for valid sign up data
    if (isset($_POST['sign-up'])) {
        $valid = true;
        
        // validate first name
        if (empty($_POST['first-name'])) {
            $firstNameError = "First Name cant be empty";
            $valid = false;
        }
        
        // validate last name
        if (empty($_POST['last-name'])) {
            $lastNameError = "Last Name cant be empty";
            $valid = false;
        }
        
        // validate birthdate
        if (empty($_POST['birth-date'])) {
            $birthDateError = "Birth date cant be empty";
            $valid = false;
        }
        
        // validate age
        else {
            $birthday = 0;
            if (is_string($_POST['birth-date'])) {
                $birthday = strtotime($_POST['birth-date']);
            }
     
            if(time() - $birthday < 21 * 31536000)  {
                $birthDateError = "You need to be atleast 21 years or older to sign up";
                $valid = false;
            }
        }
        
        // validate street
        if (empty($_POST['street'])) {
            $streetError = "Street cant be empty";
            $valid = false;
        }
        
        // all checks passed, redirect to dashboard
        if ($valid) {
            
        }
    }
?>