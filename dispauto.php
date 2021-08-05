<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobile Services - Display Automobiles</title>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Vesper+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <!-- <script src="auto.js"></script> -->
    <style>
        .button-container{
            width:175px;
        }
        .container h2{
            color: red;
        }
    </style>
</head>
<body>
    <img class="bg" src="bg-auto4.jpg" alt="">
    <div class="container">
        <header>
            <!-- <h1>Select the store of your choice</h1> -->
            <br>
            <nav>
            <a href="home-admin.php">Home</a>
            <a href="emp-admin.html">Employee</a>
            <a href="cust-admin.html">Customer</a>
            <a href="service-admin.html">Services</a>
            <a href="auto-admin.html" class="active">Automobile</a>
            <a href="bill-admin.html">Bill</a>
            <a href="delivery-admin.html">Delivery</a>
            </nav>
            <br>
        </header>
        <h2>DISPLAY Automobiles</h2>
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

            $var = mysqli_query($con, "select * from automobile order by cust_id, auto_id");
            echo "<table border size=20 solid blue>";
            echo "<tr><th>Automobile ID</th><th>Service ID</th><th>Customer ID</th><th>Automobile Type</th><th>Automobile Description</th></tr>";

            if(mysqli_num_rows($var)>0){
                echo "No. of Automobiles: " . mysqli_num_rows($var);
                while($arr=mysqli_fetch_row($var)){
                    echo "<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td></tr>";
                }
                echo "</table>";
                mysqli_free_result($var);
            }
            mysqli_close($con);
        ?>
        <div class="button-container">
        <button onclick="window.location.href='genautopdf.php';">Download Automobile List</button>
        </div>
    </div> 
</body>
</html>