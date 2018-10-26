<?php
// connect to our mysql database server

function getDatabaseConnection() {
    
    if ($_SERVER['SERVER_NAME'] == "sander-cst336-sanderh.c9users.io") {
        $host = "localhost";
        $username = "sander";
        $password = "cst336";
        $dbname = "meme_lab"; 
    }
    
    else {
        $host = "us-cdbr-iron-east-01.cleardb.net";
        $username = "bce024caad62c0";
        $password = "3d300582";
        $dbname = "heroku_248506f0d33cfe5"; 
    }
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn; 
}

?>
