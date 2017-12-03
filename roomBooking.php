<?php
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
            <br></br>
            <br></br>
            
            <form id='login' action='inc/login.php' method="POST" action="loginProcess.php" accept-charset='UTF-8'>
                <fieldset>
                    <legend>Login</legend>
                    <input type='hidden' name='submitted' id='submitted' value='1'/>
                    <label for='username'>Username*:</label>
                    <input type="text" name='username' id='username' maxLength="50" placeholder="Enter Username" required/>
                    <br></br>
                    <label for='password'>Password*:</label>
                    <input type="text" name='password' id='password' maxLength="50" pattern="^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$" placeholder="Enter Password" required/>
                    <input type='submit' value="Log in" name="LoginForm"/>               
                   <br>
                   
                    </fieldset>
                    
            </form>
            <br></br>
            <select name="order">
          	   	  <option value="ASC"> A-Z </option>
          	   	  <option value="DESC"> Z-A </option>
          	   </select>
            <center>
            <?php
            $date = date("D/M/Y");
            $date2 = date("Y-m-d");
            echo"<h2>Room Bookings for Today: ".$date."</h2>";
            
            include 'dbConfig.php';
 $conn = getDatabaseConnection();
      global $conn;
      
      //$searchkey = $_POST['fil_term'];
         $order =$_POST['order'];
      
    $sql = "SELECT * 
FROM  `room_booking`
WHERE  `date_booked_for` = :date 
ORDER BY :order";
    

$namedParameters = array();
    $namedParameters[':date'] = $date2; 
    $namedParameters[':order'] = $order;
    $statement = $conn->prepare($sql);    
    $statement->execute($namedParameters);
    $results = $statement->fetchAll();
    
    echo "<table border=1><tr><td><strong>DATE</strong></td><td><strong>TIME</strong></td></tr>";
//foreach ($results as $record) {
    foreach ($results as $record) {
	
  echo "</td><td>";
	echo $record['date_booked_for'];
echo "</td><td>";
	echo $record['time_booked_for'];
	echo "</td></tr>";
}
echo "</table>";

$sqlCount = "SELECT COUNT(`room_booking_id`) FROM `room_booking` WHERE `date_booked_for` = :date"; 
$sqlAverage = "SELECT AVG(`length_of_stay`) FROM `room_booking` WHERE `date_booked_for` = :date" ;
$sqlMin = "SELECT MIN(`length_of_stay`) FROM `room_booking` WHERE `date_booked_for` = :date" ;
$sqlMax = "SELECT MAX(`length_of_stay`) FROM `room_booking` WHERE `date_booked_for` = :date";

$namedParameters2 = array();
    $namedParameters2[':date'] = $date2;

$stmCount = $conn->prepare($sqlCount); 
    $stmCount->execute($namedParameters2);
    $resultCount = $stmCount->fetchAll();
echo"The number of people who have booked the room today is ".[$resultCount];

$stmAvg = $conn->prepare($sqlAverage); 
$stmAvg ->execute($namedParameters2);
    $resultAvg = $stmAvg->fetchAll();
echo"The average room booking length is ".[$resultAvg];
$stmMin = $conn->prepare($sqlMin); 
$stmMin ->execute($namedParameters2);
    $resultMin = $stmMin->fetchAll();
echo "The minimum length of room stay is".[$resultMin];
$stmMax = $conn->prepare($sqlMax);   
$stmMax ->execute($namedParameters2);
    $resultMax = $stmMax->fetchAll();
echo "The minimum length of room stay is".[$resultMax];

            
            ?>
            
            </center>
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