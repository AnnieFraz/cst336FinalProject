<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" href="img/logo.jpg" type="image/png">
    <title>SU Live Music Society
    </title>
    <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <h1>Stirling University Live Music Society</h1>
    </header>
    <nav>
      <hr width="50%"/>
      <a href="index.php">Home</a>
      <a href="about.php">About</a>
      <a href="events.php">Events</a>
      <a href="roomBooking.php">
        <strong>Room Booking</strong>
      </a>
    <a href="contact.php">Contact</a>
    </nav>
  <body>
    <center>
      <br>
      </br>
    <form action="logout.php">
      <input type="submit" value="Sign out" />
    </form> 
    </center>
  <br>
  </br>
<form id='Make Booking'  method='GET' accept-charset='UTF-8'>
  <fieldset>
    <center>
      <legend>
        <strong>Make Booking</strong>
      </legend>
      <br>
      <!--<input type="hidden" name="admin_Id" value="<?=$authorInfo['admin_Id']?>">-->
      <input type='hidden' name='submitted' id='submitted' value='1'/>
      <label for='date_selected'>When do you want to book the room?:
      </label>
      <input type="date" data-date-inline-picker="true" name='date_selected' id='date_selected'  required/>
      <!--<select name='date_selected' id='date_selected'>
<option value="2017-12-01">2017-12-01</option>
<option value="2017-12-02">2017-12-02</option>
<option value="2017-12-03">2017-12-03</option>
<option value="2017-12-04">2017-12-04</option>
<option value="2017-12-05">2017-12-05</option>
<option value="2017-12-06">2017-12-06</option>
<option value="2017-12-07">2017-12-07</option>
<option value="2017-12-08">2017-12-08</option>
<option value="2017-12-09">2017-12-09</option>
<option value="2017-12-10">2017-12-10</option>
<option value="2017-12-11">2017-12-11</option>
<option value="2017-12-12">2017-12-12</option>
<option value="2017-12-13">2017-12-13</option>
<option value="2017-12-14">2017-12-14</option>
<option value="2017-12-15">2017-12-15</option>
<option value="2017-12-16">2017-12-16</option>
<option value="2017-12-17">2017-12-17</option>
<option value="2017-12-18">2017-12-18</option>
<option value="2017-12-19">2017-12-19</option>
<option value="2017-12-20">2017-12-20</option>
<option value="2017-12-21">2017-12-21</option>
<option value="2017-12-22">2017-12-22</option>
<option value="2017-12-23">2017-12-23</option>
<option value="2017-12-24">2017-12-24</option>
<option value="2017-12-25">2017-12-25</option>
<option value="2017-12-26">2017-12-26</option>
<option value="2017-12-27">2017-12-27</option>
<option value="2017-12-28">2017-12-28</option>
<option value="2017-12-29">2017-12-29</option>
<option value="2017-12-30">2017-12-30</option>
<option value="2017-12-31">2017-12-31</option>
</select>-->
      <br>
      </br>
    <label for='time'>What Time(military time):
    </label>
    <!--<input id="time" type="time" name="time"><br><br>-->
    <select name="time" id="time">
      <option value ="10:00">10:00</option>
      <option value ="11:00">11:00</option>
      <option value ="12:00">12:00</option>
      <option value ="13:00">13:00</option>
      <option value ="14:00">14:00</option>
      <option value ="15:00">15:00</option>
      <option value ="16:00">16:00</option>
      <option value ="17:00">17:00</option>
      <option value ="18:00">18:00</option>
    </select>
    <br>
    <br>
    <label for='number'>How Long (hours):
    </label>
    <input type="number" name="quantity" id="number" min="1" max="5">
    <br>
    <br>
    <br>
    <input type='submit' name='addForm' value='Submit'/>              
    </center>
  </fieldset>
</form>
<?php
//Database connection
include 'connection2.php';
$conn = getDatabaseConnection();

//Getting the user's id
session_start(); 
echo $_SESSION['username'];
$username = $_SESSION['username'];
//echo $username;
$sqlID = "SELECT `admin_id` FROM `admin` WHERE `username`= :name" ;
$namedParameters = array();
$namedParameters[':name'] = $username;
$statement2 = $conn->prepare($sqlID);    
$statement2->execute($namedParameters);
$results = $statement2->fetchAll();

foreach ($results as $record) {
//echo
$record['admin_id'];
}

$id2 = $record['admin_id'];
//echo $id2;
if (isset($_GET['addForm'])) {
$time = $_GET['time'];
//echo $time;
$quantity = $_GET['quantity'];
//echo $quantity;
$date =$_GET['date_selected'];
//echo $date;
$id = $id2;

//Adding booking to database
$sql = "INSERT INTO room_booking(date_booked_for, time_booked_for,length_of_stay, admin_id) VALUES (:date,:time,:quantity, :id)";
$namedParameters = array();
$namedParameters[':time'] = $time; 
$namedParameters[':quantity'] = $quantity;
$namedParameters[':date'] = $date;
$namedParameters['id'] = $id;
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
}
//$record = $stmt->fetch();
?>
<?php
include 'loginProcess.php';
//echo $username;
?>
<h2>Your Bookings
</h2>
<center>
  <?php
$sql = "SELECT * 
FROM  `room_booking`
WHERE  `admin_id` = 4 ";
$namedParameters = array();
$namedParameters[':id'] = $id2; 
$statement = $conn->prepare($sql);    
$statement->execute($namedParameters);
$results = $statement->fetchAll();
echo "<table border=1><tr><td><strong>DATE</strong></td><td><strong>TIME</strong></td><td><strong>CHANGE</strong></td></tr>";
//foreach ($results as $record) {
foreach ($results as $record) {
echo "</td><td>";
echo $record['date_booked_for'];
echo "</td><td>";
echo $record['time_booked_for'];
echo "</td><td>";
echo "<form action='delete.php'>";
echo "<input type='hidden' name='admin_id' value='".$record['admin_id'] . "'/>";
echo "<input type='hidden' name='room_booking_id' value='".$record['room_booking_id'] . "'/>";
echo "<input type='submit' value='Delete' name='deleteForm'/></form>";
echo "<form action='change.php'>";
echo "<input type='hidden' name='admin_id' value='".$record['admin_id'] . "'/>";
echo "<input type='hidden' name='room_booking_id' value='".$record['room_booking_id'] . "'/>";
echo "<input type='submit' value='Change' name='changeForm'/></form>";
echo "</td></tr>";
}
echo "</table>";
?>
  <br>
  </br>
<center>
  <?php
$date = date("d/m/Y");
$date2 = date("Y-m-d");
//$date2 = "2017-12-10";

echo"<h2>Room Bookings for Today: ".$date."</h2>";
$order =$_POST['order'];

$sql = "SELECT * 
FROM  `room_booking`
WHERE  `date_booked_for` = :date";
//To avoid SQL Injection
$namedParameters = array();
$namedParameters[':date'] = $date2; 
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
?>
</center>
</body>
<footer>
  <br>
  </br>
<a href="https://twitter.com/SULiveMusic" style="color:white; font-size:25px;">
  <i class="fa fa-twitter">
  </i>
</a>
<a href="https://www.facebook.com/StirlingLiveMusic/" style="color:white; font-size:25px;">
  <i class="fa fa-facebook">
  </i>
</a>
<a href="https://www.instagram.com/stirlinglivemusic/?hl=en"style="color:white; font-size:25px;">
  <i class="fa fa-instagram">
  </i>
</a>
<h3>Live Music Society - University of Stirling
</h3>
<br>
</br>
</footer>
</html>