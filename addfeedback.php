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

    $fid = $ratings = $reviews = $cid = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         //Collect post variables
        $fid = test_input($_POST['feedback_id']);
        $ratings = test_input($_POST['ratings']);
        $reviews = test_input($_POST['reviews']);
        $cid = test_input($_POST['customer_id']);
    }
     
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sql = "INSERT INTO feedback VALUES('$fid', '$ratings', '$reviews', '$cid');";
    // echo $sql;

    //Execute the query
    if ($con->query($sql) == true){
        echo "Successfully inserted";
        $insert=true; //Flag for successful insertion
    }
    else if ($fid = $ratings = $reviews = $cid != "") {
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
    <title>Automobile Services - Provide Feedback</title>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Vesper+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <!-- <script src="auto.js"></script> -->
    <style>
        nav a{
            margin: 80px;
        }
    </style>
</head>
<body>
    <img class="bg" src="bg-feed.jpg" alt="">
    <div class="container">
        <header>
            <!-- <h1>Select the store of your choice</h1> -->
            <br>
            <nav>
            <a href="home.php" class="active">Home</a>
            <a href="cust.html">Customer</a>
            <a href="service.html">Services</a>
            <a href="bill.html">Bill</a>
            <a href="delivery.html">Delivery</a>
            <br>
        </header>
        <h2>PROVIDE Feedback</h2>
        <!-- <p class='subMsg'>Successfully added the store</p> -->
       

        <form action="home.php" method="post">
            <!-- <input type="varchar" name="feedback_id" class="feedback_id" placeholder="Enter Feedback ID" required> -->
            <input type="float" name="ratings" class="ratings" placeholder="Enter Ratings (Out Of 5)" required>
            <input type="varchar" name="reviews" class="reviews" placeholder="Enter Reviews">
            <input type="varchar" name="cust_id" class="cust_id" placeholder="Enter Customer ID">
            <!-- <input type='Submit'> -->
            <button class="btn" onclick="window.location.href='home.php';">ADD</button>
        </form>
        <!-- <button class="button-container" onclick="window.location.href='index.html';">Click here to return to homepage</button> -->
    </div> 
</body>
</html>