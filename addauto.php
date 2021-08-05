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

    $id = $sid = $cid = $type = $desc = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         //Collect post variables
        $id = test_input($_POST['auto_id']);
        $sid = test_input($_POST['serv_id']);
        $cid = test_input($_POST['cust_id']);
        $type = test_input($_POST['auto_type']);
        $desc = test_input($_POST['auto_desc']);
    }
     
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sql = "INSERT INTO automobile VALUES('$id', '$sid', '$cid', '$type', '$desc');";

    //Execute the query
    if ($con->query($sql) == true){
        echo "Successfully Inserted";
    }
    else if ($id = $sid  = $cid = $type = $desc != "") {
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
    <title>Automobile Services - Add Automobile</title>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Vesper+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <!-- <script src="auto.js"></script> -->
    <style>
        nav a{
            margin: 79px;
        }
    </style>
</head>
<body>
    <img class="bg" src="bg-auto6.jpg" alt="">
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
        <h2>REQUEST Service</h2>
        <!-- <p class='subMsg'>Successfully added the store</p> -->
       

        <form action="addauto.php" method="post">
            <input type="varchar" name="auto_id" class="auto_id" placeholder="Enter Automobile ID" required>
            <!-- <label for="serv_id">Select service:</label> -->
            <div class="custom-select" style="width:75%">
            <select name='serv_id' id='serv_id' style="display: block;
            border: 2px solid black;
            border-radius: 10px;
            outline: none;
            width: 100%;
            margin: 15px auto;
            padding: 10px;
            font-size: 18px;">
                <option value="">Select Service</option>
                <option value="100">WASH - WITH AIR - 1000</option>
                <option value="101">ENGINE - FULL ENGINE CHECK UP WITH FREE WASH - 3000</option>
                <option value="102">CHASIS - FULL BODY CHECK UP - 1500</option>
                <option value="103">WHEEL ALIGNMENT - COMPLETE WHEEL CHECK - 900</option>
                <option value="104">GENERAL - FULL SERVICE - 4000</option>
                <option value="105">DISEL WASH - WITH AIR WASH - 2000</option>
                <option value="106">CHAIN - FULL CHAIN SERVICE WITH LUBRICATION - 800</option>
                <option value="107">BODY - FULL SERVICE - 3000</option>
                <option value="108">PAINT - WITH WASH - 4500</option>
                <option value="109">BORE - FULL SERVICE - 5500</option>
            </select>
            </div>
            <!-- <input type="varchar" name="serv_id" class="serv_id" placeholder="Enter Service ID" required> -->
            <input type="varchar" name="cust_id" class="cust_id" placeholder="Enter Customer ID">
            <input type="varchar" name="auto_type" class="auto_type" placeholder="Enter Automobile Type">
            <input type="varchar" name="auto_desc" class="auto_desc" placeholder="Enter Automobile Descreption">
            <!-- <input type='Submit'> -->
            <button class="btn" onclick="window.location.href='addauto.php';">ADD</button>
        </form>
        <!-- <button class="button-container" onclick="window.location.href='index.html';">Click here to return to homepage</button> -->
    </div> 
</body>
</html>