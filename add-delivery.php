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

    $cid = $aid = $bno = $daddress = $dby = $ddate = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         //Collect post variables
        $cid = test_input($_POST['cust_id']);
        $aid = test_input($_POST['auto_id']);
        $bno = test_input($_POST['bill_no']);
        $daddress = test_input($_POST['del_address']);
        $dby = test_input($_POST['del_by']);
        $ddate = test_input($_POST['del_date']);
    }
     
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sql = "INSERT INTO delivery VALUES('$cid', '$aid', '$bno', '$daddress', '$dby', '$ddate');";
    // echo $sql;

    //Execute the query
    if ($con->query($sql) == true){
        echo "Successfully inserted";
        $insert=true; //Flag for successful insertion
    }
    else if ($cid = $aid = $bno = $daddress = $dby = $ddate != "") {
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
    <title>Automobile Services - Add Delivery</title>
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
    <img class="bg" src="bg-cust4.jpg" alt="">
    <div class="container">
        <header>
            <!-- <h1>Select the store of your choice</h1> -->
            <br>
            <nav>
            <a href="home-admin.php">Home</a>
            <a href="emp-admin.html">Employee</a>
            <a href="cust-admin.html">Customer</a>
            <a href="service-admin.html">Services</a>
            <a href="auto-admin.html">Automobile</a>
            <a href="bill-admin.html">Bill</a>
            <a href="delivery-admin.html" class="active">Delivery</a>
            </nav>
            <br>
        </header>
        <h2>ADD Delivery</h2>
    
        <form action="add-delivery.php" method="post">
            <input type="varchar" name="cust_id" class="cust_id" placeholder="Enter Customer ID" required>
            <input type="varchar" name="auto_id" class="auto_id" placeholder="Enter Automobile ID" required>
            <input type="varchar" name="bill_no" class="bill_no" placeholder="Enter Bill NO">
            <input type="varchar" name="del_address" class="del_address" placeholder="Enter Delivery Address">
            <input type="text" name="del_by" class="del_by" placeholder="Enter name of Delivery Agent">
            <input type="date" name="del_date" class="del_date" placeholder="Enter Delivery Date">
        
            <button class="btn" onclick="window.location.href='add-delivery.php';">ADD</button>
        </form>
    </div> 
</body>
</html>