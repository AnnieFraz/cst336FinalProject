<?php
session_start();

//print_r($_SESSION);

if (!isset($_SESSION['admin_username'])) { //if not set, it means that admin hasn't logged in
    
    header("Location: index.php"); //redirects users to login page
    exit;
    
}

function authorList(){
    include 'connection.php';
    $conn = getDatabaseConnection();
    $sql = "SELECT *
            FROM admin
            ORDER BY admin_name";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section  </title>
        
        <script>

            function confirmDelete() {
                
                return confirm("Are you sure you want to delete this author?");
                
                
            }            
            
        </script>
        
    </head>
    <body>

        <h1> ADMIN SECTION</h1>
        <h2> Welcome <?=$_SESSION[adminFullName]?>!</h2>

<br ><br >

<form action="addAuthor.php">
    <input type="submit" value="Add New Author" />
</form>

<form action="logout.php">
    <input type="submit" value="Logout" />
</form>


        <?php 
        
        $authors =authorList();
        
        foreach($authors as $author) {
            
            echo "[<a href='updateAuthor.php?authorId=".$author['authorId']."'>Update</a>] ";
            //echo "[<a href='deleteAuthor.php?authorId=".$author['authorId']."'>Delete</a>] ";
            
            echo "<form style='display:inline' action='deleteAuthor.php' onsubmit='return confirmDelete()'>
                    <input type='hidden' name='authorId' value='".$author['authorId']."'>
                    <input type='submit' value='Delete'>
                  </form>";
            
            echo $author['firstName'] . "  " . $author['lastName'] . " " . $author['country'] . "<br>";
        }
        
        
        ?>

    </body>
</html>