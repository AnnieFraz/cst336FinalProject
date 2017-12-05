<?php
session_start();

if (!isset($_SESSION['admin_username'])) { //checks whether admin has already logged in
    
    header("Location: index.php");
    exit;
    
}

include 'connection.php';
$conn = getDatabaseConnection();

$sql = "DELETE FROM admin WHERE admin_id = " . $_GET['authorId'];

//echo $sql;

$stmt = $conn->prepare($sql);
$stmt->execute();

header('Location: admin.php');


?>