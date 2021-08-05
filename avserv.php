<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobile Services - Available Services</title>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Vesper+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <!-- <script src="auto.js"></script> -->
    <style>
        .button-container{
            margin-left: 270px;
        }
        nav a{
            margin: 80px;
        }
    </style>
</head>
<body>
    <img class="bg" src="bg-avserv.jpg" alt="">
    <div class="container">
        <header>
            <!-- <h1>Select the store of your choice</h1> -->
            <br>
            <nav>
            <a href="home.php">Home</a>
            <a href="cust.html">Customer</a>
            <a href="service.html" class="active">Services</a>
            <a href="bill.html">Bill</a>
            <a href="delivery.html">Delivery</a>
            </nav>
            <br>
        </header>
        <?php
        //set connection variables
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'asms';

        //Create the DB Connection
        $con = mysqli_connect($server, $user, $pass, $db);

        //Check for connection success
        if(!$con){
            die("Database Connection failed due to " . mysqli_connect_error());
        }

        $var = mysqli_query($con, "select * from services");
        echo "<table border size = 20 width = 80%>";
        echo "<tr><th>Service_ID</th><th>Service_Type</th><th>Service_Description</th><th>Service_Charge</th></tr>";

        if(mysqli_num_rows($var)>0){
            echo "Available no. of services: " . mysqli_num_rows($var);
            while($arr=mysqli_fetch_row($var)){
                echo "<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td></tr>";
            }
            echo "</table>";
            mysqli_free_result($var);
        }
        mysqli_close($con);
        ?>
        
        <div class="button-container">
            <br>
            <button onclick="window.location.href='addauto.php';">Request Service</button>
        </div>
    </div> 
</body>
</html>

