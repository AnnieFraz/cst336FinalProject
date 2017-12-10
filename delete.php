<?php
include 'connection.php';
 $conn = getDatabaseConnection();
 
 if (isset($_GET['deleteForm'])) {  
      global $conn;
    $sql = "DELETE FROM room_booking
            WHERE admin_id = :id AND room_booking_id = :room_id";
    $namedParameters = array();
    $namedParameters[':id'] = $_GET['admin_id'];
    $namedParameters[':room_id'] = $_GET['room_booking_id'];
    $conn = getDatabaseConnection();    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);    
    
    header("Location: makeBooking.php");  
}

?>