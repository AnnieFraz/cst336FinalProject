
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update</title>
  <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
                 <link href="css/styles.css" rel="stylesheet">
    </head>
</head>

<body>
  <div class = 'container'>
    <header>
      <h1>Update Product</h1>
    </header>

    <div>
        <?$record= getMemberById()?>
        

      <form id='Make Booking' action='inc/login.php' method='POST' accept-charset='UTF-8'>
                <fieldset>
                    <legend>Make Booking</legend>
                    <input type='hidden' name='submitted' id='submitted' value='1'/>
                    <label for='date_selected'>When do you want to book the room?:</label>
                    <input type="date" data-date-inline-picker="true" name='date_selected' id='date_selected'  required/>
                    <br></br>
                    <label for='time'>What Time:</label>
                    <input id="time" type="time"><br><br>
                    <label for='number'>How Long (hours):</label>
                    <input type="number" name="quantity" min="1" max="5"><br>
                    <input type='submit' name='Submit' value='Submit'/>                </fieldset>
            </form>
          <?php
 include 'connection.php';
 $conn = getDatabaseConnection();
 

 
 
 if (isset($_GET['changeForm'])){
     global $conn;
     $sql = " UPDATE  `room_booking` SET  `date_booked_for` =  :firstName,
`time_booked_for` =  :time,
`length_of_stay` =  :quantity WHERE  `admin_id` =:id";
 
 $namedParameters = array();
 $namedParameters[':date'] = $_GET['date'];
 $namedParameters[':time'] = $_GET['lastName'];
 $namedParameters[':quantity'] = $_GET['quantity'];
 $namedParameters[':id'] = $_GET['admin_id'];
 
  $conn = getDatabaseConnection();    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);    
      echo "Record has been updated!";
 }
 
 ?>
    
      </body>
      </html>