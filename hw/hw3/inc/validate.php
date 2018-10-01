<?php
    
    session_start();

    // initial error state
    $firstNameError = $lastNameError = $birthDateError = $streetError = "";
    $firstName = $lastName = $birthday = $street = $state = "";
    
    // check for valid sign up data
    if (isset($_POST['sign-up'])) {
        $valid = true;
        
        // validate first name
        if (empty($_POST['first-name'])) {
            $firstNameError = "First Name cant be empty";
            $valid = false;
        }
        
        else {
            $firstName = $_POST['first-name'];
        }
        
        // validate last name
        if (empty($_POST['last-name'])) {
            $lastNameError = "Last Name cant be empty";
            $valid = false;
        }
        
        else {
            $lastName = $_POST['last-name'];
        }
        
        // validate birthdate
        if (empty($_POST['birth-date'])) {
            $birthDateError = "Birth date cant be empty";
            $valid = false;
        }
        
        // validate age
        else {
            if (is_string($_POST['birth-date'])) {
                $birthday = strtotime($_POST['birth-date']);
            }
     
            if(time() - $birthday < 21 * 31536000)  {
                $birthDateError = "You need to be atleast 21 years or older to sign up";
                $valid = false;
            }
            
            else {
                $birthday = $_POST['birth-date'];
            }
        }
        
        // validate street
        if (empty($_POST['street'])) {
            $streetError = "Street cant be empty";
            $valid = false;
        }
        
        else {
            $street = $_POST['street'];
        }
        
        // all checks passed, redirect to dashboard
        if ($valid) {
            $state = $_POST['state'];
            
            // store in session
            $_SESSION["firstName"] = $firstName;
            $_SESSION["lastName"] = $lastName;
            $_SESSION["birthdate"] = $birthday;
            $_SESSION["street"] = $street;
            $_SESSION["state"] = $state;
            
            header('Location: ./dashboard.php');
        }
    }
?>