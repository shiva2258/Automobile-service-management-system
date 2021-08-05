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

    $sql = "UPDATE customer SET cust_name='$name', cust_dob='$dob', cust_age='$age', cust_gender='$gen', cust_address='$address', 
    cust_phone='$phone', cust_email='$email' where cust_id='$id';";

    //Execute the query
    if ($con->query($sql) == TRUE){
        // echo "Successfully Updated";
    }
    else if ($id = $name = $address = $phone = $email = $dob = $age = $gen != "") {
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
    <title>Automobile Services - Update Customer</title>
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
    <img src="bg-cust4.jpg" alt="" class="bg">
    <div class="container">
        <header>
            <br>
            <nav>
            <a href="home.php">Home</a>
            <!-- <a href="emp-.html">Employee</a> -->
            <a href="cust.html" class="active">Customer</a>
            <a href="service.html">Services</a>
            <!-- <a href="auto-admin.html">Automobile</a> -->
            <a href="bill.html">Bill</a>
            <a href="delivery.html">Delivery</a>
            </nav>
            <br>
        </header>
        <h2>UPDATE Customer</h2>

        <form action="updatecust.php" method="post">
            <input type="varchar" name="cust_id" class="cust_id" placeholder="Enter Customer ID">
            <input type="text" name="cust_name" class="cust_name" placeholder="Enter Customer Name">
            <input type="date" name="cust_dob" class="cust_dob" placeholder="Enter Customer DOB">
            <input type="integer" name="cust_age" class="cust_age" placeholder="Enter Customer Age in Years">
            <input type="text" name="cust_gender" class="cust_gender" placeholder="Enter Customer Gender">
            <input type="varchar" name="cust_address" class="cust_address" placeholder="Enter Customer Address">
            <input type="phone" name="cust_phone" class="cust_phone" placeholder="Enter Customer Phone No">
            <input type="email" name="cust_email" class="cust_email" placeholder="Enter Customer Email ID">
            <button class="btn" onclick="window.location.href='updatecust.php';">UPDATE</button>
        </form>
    </div> 
</body>
</html>


