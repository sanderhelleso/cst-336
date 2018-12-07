<?php

    // connect to our mysql database server
    function getDatabaseConnection() {
        $host = "localhost";
        $username = "sander";
        $password = "cst336";
        $dbname = "pets"; 
        
        // Create connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        return $dbConn; 
    }
    
    // connect
    $dbConn = getDatabaseConnection();
    
    // receive the RAW post data.
    $content = trim(file_get_contents('php://input'));

    // decode recieved data
    $data = json_decode($content, true);
    
     $sql = "SELECT * from pets"; 
    $statement = $dbConn->prepare($sql); 
        
    $statement->execute(); 
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>
