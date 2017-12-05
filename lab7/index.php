<!DOCTYPE html>
<html>
    <head>
        <title> Lab 7: Admin Login</title>
    </head>
    <body>


        <h1> Admin Login</h1>
        
        <form method="POST" >
    
        Username: <input type="text" name="username"/> <br />
        Password: <input type="password" name="password1"/> <br />
        <input type="submit" value="Login!" name="loginForm" />
            
        </form>
        <?php
$username = $_POST['username'];
    $password = sha1($POST['password1']);
    print_r($_POST);
    
    echo $password;
    
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    
    $stmt = $conn -> prepare($sql);
    $stmt ->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    print_r($record);
    
    if (empty($record)){
        
        echo " <br> wrong credintials";
    }else{
        header("Location: admin.php");;
    }
    ?>

    </body>
</html>