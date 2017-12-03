<?php
function getDatabaseConnection() {
    $dbHost = getenv('IP');
        $dbPort = 3306;
        $dbName = "final_project";
        $username = "anniefraz";
        $password = "";
        
        // Create connection
        $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn; 
}





?>
