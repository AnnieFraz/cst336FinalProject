<?php
//Connecting to database
include 'connection.php';
$conn = getDatabaseConnection();
?>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" href="img/logo.jpg" type="image/png"><!--Logo in title bar-->
    <title>SU Live Music Society</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--To get social media logos-->
  </head>
  <body>
    <header>
      <h1>Stirling University Live Music Society</h1>
    </header>
    <!--Nav Bar-->
    <nav>
      <hr width="50%"/>
      <a href="index.php">Home</a>
      <a href="about.php">About</a>
      <a href="events.php">Events</a>
      <a href="roomBooking.php">
        <strong>Room Booking</strong><!--Highlights what page on--></a>
    <a href="contact.php">Contact</a>
    </nav>
  <body>
    <br>
    </br>
  <br>
  </br>
  <!--Login-->
<form id='login' method="POST" action="loginProcess.php" accept-charset='UTF-8'>
  <fieldset>
    <center>
    <legend>Login</legend>
    <input type='hidden' name='submitted' id='submitted' value='1'/>
    <label for='username'>Username*:
    </label>
    <input type="text" name='username' id='username' maxLength="50" placeholder="Enter Username" required/>
    <br>
    </br>
  <label for='password'>Password*:
  </label>
  <input type="password" name='password' id='password' maxLength="50"  placeholder="Enter Password" required/>
  <br>
  <br>
  <input type='submit' value="Log in" name="LoginForm"/>               
  <br>
  </center>
  </fieldset>
</form>
<br>
</br>
<!--order room bookings-->

<center>
<label for='order'>Order By:
  </label>
<select name="order">
  <option value="ASC"> Earliest 
  </option>
  <option value="DESC"> Latest
  </option>
</select>

<?php

    $username = $_POST['username'];
    $password = sha1($POST['password1']);
    //print_r($_POST);
    
    //echo $password;
    
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    
    $stmt = $conn -> prepare($sql);
    $stmt ->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //print_r($record);
    
    if (empty($record)){
        
        //echo " <br> wrong credintials";
    }else{
        header("Location: makeBooking.php");;
    }
?>
<center>
  </center>
  <?php
//Displaying todays bookings
$date = date("d/m/Y");
$date2 = date("Y-m-d");
//echo $date2;
echo"<h2>Room Bookings for Today: ".$date."</h2>";

$order =$_POST['order'];

$sql = "SELECT * 
FROM  `room_booking`
WHERE  `date_booked_for` = :date 
ORDER BY :order";

//To avoid SQL Injection
$namedParameters = array();
$namedParameters[':date'] = $date2; 
$namedParameters[':order'] = $order;
$statement = $conn->prepare($sql);    
$statement->execute($namedParameters);
$results = $statement->fetchAll();



//Display results
echo "<table border=1><tr><td><strong>DATE</strong></td><td><strong>TIME</strong></td></tr>";
foreach ($results as $record) {
echo "</td><td>";
echo $record['date_booked_for'];
echo "</td><td>";
echo $record['time_booked_for'];
echo "</td></tr>";
echo $record['length_of_stay'];
echo "</td></tr>";
}
echo "</table>";
$namedParameters2 = array();
$namedParameters2[':date'] = $date2;


/*
//Could not get to work
//Aggregate function:count
$sqlCount = "SELECT COUNT(`room_booking_id`) as all FROM `room_booking` WHERE `date_booked_for` = :date";
$namedParameters4 = array();
$namedParameters4[':date'] = $date2;
$count = $conn->prepare($sqlCount); 
$count ->execute($namedParameters4);

echo "<br><p>The number of people who have booked the room today is " ;
while ($row = $count -> fetch())  {
echo $row['all'];

}
*/
//Aggregate Function: Average
$sqlAverage = "SELECT AVG(`length_of_stay`) as banana FROM `room_booking` WHERE `date_booked_for` = :date";
$namedParameters2 = array();
$namedParameters2[':date'] = $date2;
$avg = $conn->prepare($sqlAverage); 
$avg ->execute($namedParameters2);
//$resultAvg = $stmAvg->fetchAll();
//$avg2 = $stmAvg->rowCount();

echo"<br><p>The average room booking length is ";; 
while ($row = $avg -> fetch())  {
echo $row['banana'];
//echo "test";
}
echo "</p>";
//Aggregate Function: Min
$sqlMin = "SELECT MIN(`length_of_stay`) as tiny FROM `room_booking` WHERE `date_booked_for`  = :date";
$namedParameters3 = array();
$namedParameters3[':date'] = $date2;
$min = $conn->prepare($sqlMin); 
$min ->execute($namedParameters3);

echo "<br><p>The minimum length of room stay is ";
while ($row = $min -> fetch())  {
echo $row['tiny'];

} //resultmin here

//Aggregate FUNCTION: Max
$sqlMax = "SELECT MAX(`length_of_stay`) as big FROM `room_booking` WHERE `date_booked_for`  = :date";
$namedParameters4 = array();
$namedParameters4[':date'] = $date2;
$max = $conn->prepare($sqlMax); 
$max ->execute($namedParameters4);
echo "<br><p>The maximum length of room stay is ";
while ($row = $max -> fetch())  {
echo $row['big'];

}
?>
</center>
</body>

<footer>
<!--Social Media Links-->
  <br></br>
<a href="https://twitter.com/SULiveMusic" style="color:white; font-size:25px;">
  <i class="fa fa-twitter"></i>
</a>
<a href="https://www.facebook.com/StirlingLiveMusic/" style="color:white; font-size:25px;">
  <i class="fa fa-facebook"></i>
</a>
<a href="https://www.instagram.com/stirlinglivemusic/?hl=en"style="color:white; font-size:25px;">
  <i class="fa fa-instagram"></i>
</a>
<!--Footer-->
<h3>Live Music Society - University of Stirling</h3>
<br></br>
</footer>
</html>