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
      <a href="index.php">Home
      </a>
      <a href="about.php">About
      </a>
      <a href="events.php">Events
      </a>
      <a href="roomBooking.php">
        <strong>Room Booking</strong><!--Highlights what page on-->
      </a>
    <a href="contact.php">Contact
    </a>
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
  <input type="text" name='password1' id='password1' maxLength="50"  placeholder="Enter Password" required/>
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
<select name="order">
  <option value="ASC"> A-Z 
  </option>
  <option value="DESC"> Z-A 
  </option>
</select>
<center>
  <?php
//Displaying todays bookings
$date = date("d/m/Y");
$date2 = date("Y-m-d");
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
echo "<table border=1><tr><td><strong>DATE</strong></td><td><strong>TIME</strong></td><td><strong>LENGTH</strong></td></tr>";
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

//Aggregate function:count
$sqlCount = "SELECT COUNT(`room_booking_id`) FROM `room_booking` WHERE `date_booked_for` = :date";
$stmCount = $conn->prepare($sqlCount); 
$stmCount->execute($namedParameters2);
$resultCount = $stmCount->fetchAll();
echo"<br><p>The number of people who have booked the room today is ".[$resultCount]."</p>";

//Aggregate Function: Average
$sqlAverage = "SELECT AVG(`length_of_stay`) FROM `room_booking` WHERE `date_booked_for` = :date" ;
$stmAvg = $conn->prepare($sqlAverage); 
$stmAvg ->execute($namedParameters2);
$resultAvg = $stmAvg->fetchAll();
echo"<br><p>The average room booking length is ".[$resultAvg]."</p>";

//Aggregate Function: Min
$sqlMin = "SELECT MIN(`length_of_stay`) FROM `room_booking` WHERE `date_booked_for` = :date" ;
$stmMin = $conn->prepare($sqlMin); 
$stmMin ->execute($namedParameters2);
$resultMin = $stmMin->fetchAll();
echo "<br><p>The minimum length of room stay is".[$resultMin]."</p>";

//Aggregate FUNCTION: Max
$sqlMax = "SELECT MAX(`length_of_stay`) FROM `room_booking` WHERE `date_booked_for` = :date";
$stmMax = $conn->prepare($sqlMax);   
$stmMax ->execute($namedParameters2);
$resultMax = $stmMax->fetchAll();
echo "<br><p>The minimum length of room stay is".[$resultMax]."</p>";
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