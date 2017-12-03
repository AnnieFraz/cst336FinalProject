<?php
include 'dbConfig.php';
 $conn = getDatabaseConnection();
 
 if (isset($_GET['deleteForm'])) {  
      global $conn;
    $sql = "DELETE FROM room_booking
            WHERE admin_id = :id";
    $namedParameters = array();
    $namedParameters[':id'] = $_GET['admin_id'];
    $conn = getDatabaseConnection();    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);    
    
    header("Location: makeBooking.php");  
}

?>