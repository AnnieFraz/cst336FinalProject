<?php

/*
session_start();
session_start();

//print_r($_SESSION);

if (!isset($_SESSION['username'])) { //if not set, it means that admin hasn't logged in
    
    header("Location: index.php"); //redirects users to login page
    exit;
    
}*/


    include 'dbConfig.php';
    getDatabaseConnection();
    
    $date = $_POST['date_selected'];
         $time = $_POST['time'];
         $length =$_POST['number'];
    $sql = "INSERT INTO `room_booking`(`date_booked_for`, `time_booked_for`, `length_of_stay`) VALUES (:date,:time,:length)";

   $stmt = $dbConn->prepare($sql);
    $stmt -> execute (array(':date' => $date,
                            ':time'=> $time,
                            ':length'=> $length));
   //$record = $stmt->fetch();

?>