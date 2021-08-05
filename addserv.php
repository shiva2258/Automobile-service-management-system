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

    $sid = $stype = $sdesc = $scharge = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         //Collect post variables
        $sid = test_input($_POST['serv_id']);
        $stype = test_input($_POST['serv_type']);
        $sdesc = test_input($_POST['serv_desc']);
        $scharge = test_input($_POST['serv_charge']);
    }
     
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sql = "INSERT INTO services VALUES('$sid', '$stype', '$sdesc', $scharge);";
    // echo $sql;

    //Execute the query
    if ($con->query($sql) == true){
        echo "Successfully inserted";
        $insert=true; //Flag for successful insertion
    }
    else if ($sid = $stype = $sdesc = $scharge != "") {
        echo "ERROR: $sql <br> $con->error";
    }

    //Close the DB connection
    $con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobile Services - Add Service</title>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Vesper+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <!-- <script src="auto.js"></script> -->
    <style>
        nav a{
            margin: 38px;
        }
        .button-container{
            width: 173px;
        }
        .container h2{
            color: orangered;
        }
    </style>
</head>
<body>
    <img class="bg" src="bg-serv2.jpg" alt="">
    <div class="container">
        <header>
            <!-- <h1>Select the store of your choice</h1> -->
            <br>
            <nav>
            <a href="home-admin.php">Home</a>
            <a href="emp-admin.html">Employee</a>
            <a href="cust-admin.html">Customer</a>
            <a href="service-admin.html" class="active">Services</a>
            <a href="auto-admin.html">Automobile</a>
            <a href="bill-admin.html">Bill</a>
            <a href="delivery-admin.html">Delivery</a>
            </nav>
            <br>
        </header>
        <h2>ADD Service</h2>
        <!-- <p class='subMsg'>Successfully added the store</p> -->
       

        <form action="addserv.php" method="post">
            <input type="varchar" name="serv_id" class="serv_id" placeholder="Enter Service ID" required>
            <input type="text" name="serv_type" class="serv_type" placeholder="Enter Service Type">
            <input type="text" name="serv_desc" class="serv_desc" placeholder="Enter Service Description">
            <input type="float" name="serv_charge" class="serv_charge" placeholder="Enter Service Charge">
            <!-- <input type='Submit'> -->
            <button class="btn" onclick="window.location.href='addserv.php';">ADD</button>
        </form>
        <!-- <button class="button-container" onclick="window.location.href='index.html';">Click here to return to homepage</button> -->
        <div class="button-container">
        <button onclick="window.location.href='avserv-admin.php';">Go Back</button>
        </div>
    </div> 
</body>
</html>