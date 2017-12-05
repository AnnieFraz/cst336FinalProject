<?php
?>
<html>
<head>
        <meta charset="utf-8"/>
         <link rel="shortcut icon" href="img/logo.jpg" type="image/png">
        <title>SU Live Music Society</title>
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        <link type="text/css" rel="stylesheet" href="style.css"/>
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="jquery.min.js"></script>
        </head>
    <body>
        <header>
            <h1>Stirling University Live Music Society</h1>
        </header>
        <nav>
            <hr width="50%"/>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="events.php"><strong>Events</strong></a>
            <a href="roomBooking.php">Room Booking</a>
            <a href="contact.php">Contact</a>
        </nav>
        <body>
            <style>
* {box-sizing: border-box;}
ul {list-style-type: none;}
body {font-family: Verdana, sans-serif;}

.month {
    padding: 70px 25px;
    width: 100%;
    background: #555;
    text-align: center;
}

.month ul {
    margin: 0;
    padding: 0;
}

.month ul li {
    color: white;
    font-size: 20px;
    text-transform: uppercase;
    letter-spacing: 3px;
}

.month .prev {
    float: left;
    padding-top: 10px;
}

.month .next {
    float: right;
    padding-top: 10px;
}

.weekdays {
    margin: 0;
    padding: 10px 0;
    background-color: #ddd;
}

.weekdays li {
    display: inline-block;
    width: 13.6%;
    color: #666;
    text-align: center;
}

.days {
    padding: 10px 0;
    background: #eee;
    margin: 0;
}

.days li {
    list-style-type: none;
    display: inline-block;
    width: 13.6%;
    text-align: center;
    margin-bottom: 5px;
    font-size:12px;
    color: #777;
}

.days li .active {
    padding: 5px;
    background: #555;
    color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
    .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
    .weekdays li, .days li {width: 12.5%;}
    .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
    .weekdays li, .days li {width: 12.2%;}
}
</style>
</head>
<body>

<h2>Events</h2>

<div class="month">      
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li>
      Decemeber<br>
      <span style="font-size:18px">2017</span>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li>10</li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
  <li>31</li>
</ul>
    
    </div>
    <center>
     
                <table id="results" class="table table-hover">
                    <thead>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Time</th>
                    </thead>
                    <tbody></tbody>
                </table>
                <img class="loading" src="img/loading_spinner.gif" />
            <!--</div>-->
            </center>
             <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.min.js"></script>

            
    <script>
    
        $(function(number) {
                $(".loading").hide()

                // Show spinner
                $(".loading").show()

                $.ajax({
                        // The URL for the request
                        url: "eventsJSON.php",

                        // Whether this is a POST or GET request
                        type: "GET",

                        // The type of data we expect back
                        dataType: "json",

                        //jsonpCallback: 'callback',
                    })
                    .done(function(data) {
                        console.log("Data:", data);
                        console.log("lol:", data.events)

                        for (var i in data.events) {
                            var data1 = data.events[i];
                            console.log("Data:", data1);
                            console.log(data1.title)

                            $('#results > tbody')
                                .append($('<tr>')
                                    .append($('<td>')
                                        .html(data1.title)
                                    )
                                    .append($('<td>')
                                        .append($('<img>')
                                            .attr('src', "img/"+data1.picture)
                                            .attr('width', '200px')
                                            .attr('class', 'event poster')
                                        )
                                    )
                                    .append($('<td>')
                                        .html(data1.date)
                                    )
                                    .append($('<td>')
                                        .html(data1.location)
                                    )
                                    .append($('<td>')
                                        .html(data1.time)
                                    )
                                );
                        }
                    })
                    // Code to run if the request fails; the raw request and
                    // status codes are passed to the function
                    .fail(function(xhr, status, errorThrown) {
                        console.log("Sorry, there was a problem!");
                        console.log("Error: " + errorThrown);
                        console.log("Status: " + status);
                        console.dir(xhr);
                    })
                    // Code to run regardless of success or failure;
                    .always(function(xhr, status) {
                        console.log("The request is complete!");
                        $(".loading").hide()
                    });
            })
            </script>
    </script>
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