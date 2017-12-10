<?php
function getDatabaseConnection() {
        $dbHost = getenv('DATABASE_HOST');
        $dbPort = getenv('DATABASE_PORT');
        $dbName = getenv('DATABASE_NAME');
        $username = getenv('USERNAME');
        $password = getenv('PASSWORD');
        
        // Create connection
        $conn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $conn; 
}





?>
