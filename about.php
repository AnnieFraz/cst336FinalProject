<?php
?>
<html>
<head>
        <meta charset="utf-8"/>
        <link rel="shortcut icon" href="img/logo.jpg" type="image/png">
        <title>SU Live Music Society</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style type="text/css">
	
	.thumbnails img {
		height: 80px;
		width:80px;
		border: 4px solid #555;
		padding: 1px;
		margin: 0 10px 10px 0;
	}

	.thumbnails img:hover {
		border: 4px solid #e6e6e6;
		cursor:pointer;
	}

	.preview img {
		border: 4px solid #e6e6e6;
		padding: 1px;
		max-width: 800px;
		width: auto\9;
	}
</style>
        </head>
    <body>
        <header>
            <h1>Stirling University Live Music Society</h1>
        </header>
        <nav>
            <hr width="50%"/>
            <a href="index.php">Home</a>
            <a href="about.php"><strong>About</strong></a>
            <a href="events.php">Events</a>
            <a href="roomBooking.php">Room Booking</a>
            <a href="contact.php">Contact</a>
        </nav>
        <body>
            <h2>Our Photos</h2>
            
            <div class="gallery" align="center"></div>
            <center>
            <div class="thumbnails">
                <img onmouseover="preview.src=img1.src" name="img1" src="img/img1.jpg"/>
                <img onmouseover="preview.src=img2.src" name="img2" src="img/img2.jpg"/>
                <img onmouseover="preview.src=img3.src" name="img3" src="img/img3.jpg"/>
                <img onmouseover="preview.src=img4.src" name="img4" src="img/img4.jpg"/>
                <img onmouseover="preview.src=img5.src" name="img5" src="img/img5.jpg"/>
                
            </div>
            <div class="preview" align="center">
		        <img name="preview" src="img/img1.jpg" alt=""/>
	        </div>
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