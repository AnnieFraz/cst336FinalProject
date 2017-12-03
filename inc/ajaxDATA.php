<?php
header("Access-Control-Allow-Origin: *");

    if (strtoupper($_SERVER['REQUEST_METHOD']) == 'OPTIONS') {
        // Allows anyone to hit your API, not just this c9 domain
        header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
        header("Access-Control-Allow-Methods: POST, GET");
        header("Access-Control-Max-Age: 3600");
        exit();
    }
    
    header("Content-Type: application/json");
    
    session_start();
    
    $rawJsonString = file_get_contents("php://input");
    
    $jsonData = json_decode($rawJsonString, true);
    
    $otherData = getDataFromMySql();
    
    if (!empty($otherData)) {
        $results["data"] = $otherData;
       // echo $otherData;
        
        $otherData2 = $results["data.id"] ;
        //echo $otherData2;
    }
    
    // Sending back down
    echo json_encode($results);
    
    echo json_encode($results["data.id"]);
    
    

function getDataFromMySql(){
 $dbHost = getenv('IP');
        $dbHost = getenv('IP');
        $dbPort = 3306;
        $dbName = "final_project";
        $username = "anniefraz";
        $password = "";
        
        $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql="SELECT * FROM events";
        
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        
        $events = $stmt -> fetchALL(PDO::FETCH_ASSOC);
        
        return $events;
        
}
?>