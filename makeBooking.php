<?php
include 'dbConfig.php';
$conn = getDatabaseConnection();
?>
<html>
<head>
        <meta charset="utf-8"/>
         <link rel="shortcut icon" href="img/logo.jpg" type="image/png">
        <title>SU Live Music Society</title>
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
            <a href="roomBooking.php"><strong>Room Booking</strong></strongRoom></a>
            <a href="contact.php">Contact</a>
        </nav>
        <body>
            <center>
            <br></br>
            <form action="logout.php">
           <input type="submit" value="Sign out" />
      </form> 
      </center>
            <br></br>
            <form id='Make Booking'  method='POST' accept-charset='UTF-8'>
                <fieldset>
                    <legend>Make Booking</legend>
                    <input type='hidden' name='submitted' id='submitted' value='1'/>
                    <label for='date_selected'>When do you want to book the room?:</label>
                    <input type="date" data-date-inline-picker="true" name='date_selected' id='date_selected'  required/>
                    <br></br>
                    <label for='time'>What Time:</label>
                    <input id="time" type="time"><br><br>
                    <label for='number'>How Long (hours):</label>
                    <input type="number" name="quantity" id="number" min="1" max="5"><br>
                    <input type='submit' name='Submit' value='Submit'/>                </fieldset>
            </form>
            <h2>Your Bookings</h2>
            
            <br></br>
            <center>
            <?php
            $date = date("D/M/Y");
            $date2 = date("Y-m-d");
            echo"<h2>Room Bookings for Today: ".$date."</h2>";
            
    $sql = "SELECT * 
FROM  `room_booking`
WHERE  `admin_id` = :id
AND `room_booking_id`=:room_id";
    

//$namedParameters = array();
    //$namedParameters[':id'] = 3;  
    //$namedParameters[':room_id'] = 1;
    $statement = $conn->prepare($sql);    
    $statement->execute(array(':id'=>1,
    ':room_id'=>3));
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
          echo "<input type='submit' value='Delete' name='deleteForm'/></form>";
    echo "<form action='change.php'>";
          echo "<input type='hidden' name='admin_id' value='".$record['admin_id'] . "'/>";
          echo "<input type='submit' value='Change' name='changeForm'/></form>";
	echo "</td></tr>";
}
echo "</table>";

            
            ?>
              
            </center>
            <?php
            
//session_start();
//if (!isset($_SESSION['username'])) { //if not set, it means that admin hasn't logged in
//    header("Location: roomBooking.php"); //redirects users to login page
  //  exit;
//};
    $time = $_POST['time'];
         $quantity = $_POST['quantity'];
         $date =$_POST['date'];
         
    $sql = "INSERT INTO room_booking(date_booked_for, time_booked_for,length_of_stay) VALUES (:date,:time,:quantity)";

    $stmt = $conn->prepare($sql);
    $stmt -> execute (array(':time' => $time,
                            ':quantity'=> $quantity,
                            ':date'=> $date));
   //$record = $stmt->fetch();
   
?>
         </body>
          <footer>
            <br></br>
            <a href="https://twitter.com/SULiveMusic" style="color:white; font-size:25px;"><i class="fa fa-twitter"></i></a>
            <a href="https://www.facebook.com/StirlingLiveMusic/" style="color:white; font-size:25px;"><i class="fa fa-facebook"></i></a>
            <a href="https://www.instagram.com/stirlinglivemusic/?hl=en"style="color:white; font-size:25px;"><i class="fa fa-instagram"></i></a>
            
            <h3>Live Music Society - University of Stirling</h3>
            <br></br>
        </footer>
        
    
</html>