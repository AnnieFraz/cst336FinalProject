<?php
session_start(); //starts or resumes an existing session


//print_r($_POST); //displays values passed from login form

//validates the username and password

include 'dbConfig.php';
$conn = getDatabaseConnection();


$username = $_POST['username'];
$password = $_POST['password'];

        
$sql = "SELECT *
        FROM admin
        WHERE admin_username = :username 
        AND   admin_password = :password";   

$namedParameters  = array();
$namedParameters[':username']  = $username;
$namedParameters[':password']  = $password;

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r($record);

if (empty($record)) {
    
  echo "Wrong credentials!";  
  
} else {
    
   echo "correct credentials";
   header('Location: makeBooking.php');
   
}





?>