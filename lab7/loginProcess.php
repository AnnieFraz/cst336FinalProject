<?php
session_start(); //starts or resumes an existing session


//print_r($_POST); //displays values passed from login form

//validates the username and password
include 'connection.php';
$conn = getDatabaseConnection();

$username = $_POST['username'];
$password = sha1($_POST['password1']);

//echo $password;


//Following SQL works but it allows SQL Injection!!
 
  
$sql = "SELECT *
        FROM `admin`
        WHERE `admin_username` = '$username' 
        AND   `admin_password` = '$password'";

//$namedParameters  = array();
//$namedParameters[':username']  = $username;
//$namedParameters[':password']  = $password;

$stmt = $conn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r($record);

if (empty($record)) {
    
  echo "Wrong credentials!";  
  
} else {
    
    $_SESSION['admin_username'] = $record['admin_username'];
   // $_SESSION['admin_name'] = $record['firstName'] . " " . $record['lastName'];
   // echo $_SESSION['adminFullName'];
   //echo "Successful login!";
   header('Location: admin.php'); //redirects users to admin page
   
}





?>