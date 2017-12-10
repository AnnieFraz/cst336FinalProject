<?php
session_start(); //starts or resumes an existing session

include 'connection.php';
$conn = getDatabaseConnection();


$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT *
        FROM admin
        WHERE username = :username 
        AND   password = :password";

$namedParameters              = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);


if (empty($record)) {
    
    echo "Wrong credentials!";
    
} else {
    
    $_SESSION['username'] = $record['username'];
    header('Location: makeBooking.php'); //redirects users to makebooking page
    
}

?>