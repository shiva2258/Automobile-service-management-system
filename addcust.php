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

    $id=$name=$dob=$age=$gen=$address=$phone=$email=$sid="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Collect post variables
        $id = test_input($_POST['cust_id']);
        $name = test_input($_POST['cust_name']);
        $dob = test_input($_POST['cust_dob']);
        $age = test_input($_POST['cust_age']);
        $gen = test_input($_POST['cust_grnder']);
        $address = test_input($_POST['cust_address']);
        $phone = test_input($_POST['cust_phone']);
        $email = test_input($_POST['cust_email']);
    }
    
    function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $sql = "INSERT INTO customer VALUES('$id', '$name', '$dob', '$age', '$gen', '$address', $phone, '$email', '$sid');";

    //Execute the query
    if ($con->query($sql) == TRUE){
        echo "Successfully Inserted";
    }
    else if ($id = $name = $address = $phone != "") {
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
    <title>Automobile Services - Add Customer</title>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Vesper+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <!-- <script src="auto.js"></script> -->
    <style>
        nav a{
            margin: 38px;
        }
    </style>
</head>
<body>
    <!-- <img class="bg" src="bg-store.jpg" alt=""> -->
    <div class="container">
        <header>
            <!-- <h1>Select the store of your choice</h1> -->
            <br>
            <nav>
            <a href="home-admin.php">Home</a>
            <a href="emp-admin.html">Employee</a>
            <a href="cust-admin.html" class="active">Customer</a>
            <a href="service-admin.html">Services</a>
            <a href="auto-admin.html">Automobile</a>
            <a href="bill-admin.html">Bill</a>
            <a href="delivery-admin.html">Delivery</a>
            </nav>
            <br>
        </header>
        <h2>ADD customer</h2>
        <!-- <p class='subMsg'>Successfully ADDED the Customer</p> -->

        <form action="addcust.php" method="post">
            <input type="varchar" name="cust_id" class="cust_id" placeholder="Enter Customer ID">
            <input type="text" name="cust_name" class="cust_name" placeholder="Enter Customer Name">
            <input type="date" name="cust_dob" class="cust_dob" placeholder="Enter Customer DOB">
            <input type="integer" name="cust_age" class="cust_age" placeholder="Enter Customer Age in Years">
            <input type="text" name="cust_gender" class="cust_gender" placeholder="Enter Customer Gender">
            <input type="varchar" name="cust_address" class="cust_address" placeholder="Enter Customer Address">
            <input type="phone" name="cust_phone" class="cust_phone" placeholder="Enter Customer Phone No">
            <input type="email" name="cust_email" class="cust_email" placeholder="Enter Customer Email ID">
            <button class="btn" onclick="window.location.href='cust.html';">ADD</button>
        </form>
    </div> 
</body>
</html>


