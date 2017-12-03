<?PHP
session_start();
include 'connection.php';
$conn = getDatabaseConnection();

$sql = "SELECT * FROM admin WHERE admin_username LIKE :username";

$username = strtoupper($_POST['username']);
$passw = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $dbConn -> prepare ($sql);
$stmt -> execute (  array ( ':username' => $username)  );

//var_dump($passw);
while ($row = $stmt -> fetch())  {
    $hash = $row['password'];
    $temp = $row['username'];
}

if(password_verify( $_POST['password'] , $hash ))
{
    $_SESSION['user'] = $temp;
    //var_dump($_session['user']);
    header("Location: makeBooking.php");
    exit();
}

?>