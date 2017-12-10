<?php
include 'connection.php';
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

    <div>
            <form id='Change Booking'  method='POST' accept-charset='UTF-8'>
                <fieldset>
                    <center>
                    <legend><strong>Change Booking</strong></legend>
                    <br>
                    <input type="hidden" name="admin_Id" value="<?=$authorInfo['admin_Id']?>">
                    <input type='hidden' name='submitted' id='submitted' value='1'/>
                    <label for='date_selected'>When do you want to book the room?:</label>
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
  
                    <br></br>
                    <label for='time'>What Time(military time):</label>
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
                    <label for='number'>How Long (hours):</label>
                    <input type="number" name="quantity" id="number" min="1" max="5"><br>
                    <br>
                    <input type='submit' name='addForm' value='Submit'/>              
                    </center>
                    </fieldset>
            </form>
            <?php
 session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   echo $_SESSION['username'];
   $username = $_SESSION['username'];
   echo $username;
   

//function getID($username){
    $sqlID = "SELECT `admin_id` FROM `admin` WHERE `username`= :name" ;
    $namedParameters = array();
    $namedParameters[':name'] = $username;
    $statement2 = $conn->prepare($sqlID);    
$statement2->execute($namedParameters);
$results = $statement2->fetchAll();
    
    foreach ($results as $record) {
	
	echo $record['admin_id'];
    }
    $id2 = $record['admin_id'];
    //echo $id2;
            
 if (isset($_GET['changeForm'])){
     global $conn;
     $sql = " UPDATE  `room_booking` SET  `date_booked_for` =  :date,
`time_booked_for` =  :time,
`length_of_stay` =  :quantity WHERE  `admin_id` =:id AND `room_booking_id` = :roomId";
 
 $namedParameters = array();
 $namedParameters[':date'] = $_GET['date'];
 $namedParameters[':time'] = $_GET['lastName'];
 $namedParameters[':quantity'] = $_GET['quantity'];
 $namedParameters[':id'] = $id2;
 $namedParameters[':RoomId'] = $id2;
 
 
  $conn = getDatabaseConnection();    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);    
      echo "Record has been updated!";
 }
 ?>
    </body>
</html>