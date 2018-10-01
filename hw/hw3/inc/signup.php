<?php
    if (isset($_POST['sign-up'])) {
        
        // Fetching variables of the form which travels in URL
        $firstName = $_POST['first-name'];
        $lastName = $_POST['last-name'];
        $birthDate = $_POST['birth-date'];
        $street = $_POST['street'];
        $state = $_POST['state'];
        
        header("Location: ../?signup");
    }
        
   /*//echo $_POST["first-name"];
   print_r($_POST);
   echo "<br><br>";
   foreach ($_POST as $data) {
       echo "<br>";
       echo $data;
       
       if (empty($data)) {
           echo "<br>";
           echo "123";
       }
   }*/
?>