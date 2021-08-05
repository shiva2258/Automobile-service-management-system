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

    $bno = $sid = $cid = $bamt = $btype = $bdesc = $bstat = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         //Collect post variables
        $bno = test_input($_POST['bill_no']);
        $sid = test_input($_POST['serv_id']);
        $cid = test_input($_POST['cust_id']);
        $bamt = test_input($_POST['bill_amt']);
        $btype = test_input($_POST['bill_type']);
        $bdesc = test_input($_POST['bill_desc']);
        $bstat = test_input($_POST['bill_stat']);
    }
     
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sql = "UPDATE bill SET serv_id='$sid', cust_id='$cid', bill_amt='$bamt', bill_type='$btype', bill_desc='$bdesc', 
    bill_stat='$bstat' where bill_no='$bno';";
    // echo $sql;

    //Execute the query
    if ($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert=true; //Flag for successful insertion
    }
    else if ($bno = $sid = $bamt = $btype = $bdesc =$bstat != "") {
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
    <title>Automobile Services - Update Bill</title>
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
    <!-- <img class="bg" src="bg-bill5.jpg" alt=""> -->
    <div class="container">
        <header>
            <br>
            <nav>
            <a href="home-admin.php">Home</a>
            <a href="emp-admin.html">Employee</a>
            <a href="cust-admin.html">Customer</a>
            <a href="service-admin.html">Services</a>
            <a href="auto-admin.html">Automobile</a>
            <a href="bill-admin.html" class="active">Bill</a>
            <a href="delivery-admin.html">Delivery</a>
            </nav>
            <br>
        </header>
        <h2>UPDATE Bill</h2>
       

        <form action="updatebill.php" method="post">
            <input type="varchar" name="bill_no" class="bill_no" placeholder="Enter Bill No" required>
            <input type="varchar" name="serv_id" class="serv_id" placeholder="Enter Service ID" required>
            <input type="varchar" name="cust_id" class="cust_id" placeholder="Enter Customer ID">
            <input type="float" name="bill_amt" class="bill_amt" placeholder="Enter Bill Amount">
            <input type="text" name="bill_type" class="bill_type" placeholder="Enter Bill Type">
            <input type="text" name="bill_desc" class="bill_desc" placeholder="Additional Information (If any)">
            <input type="text" name="bill_status" class="bill_status" placeholder="Enter Payment Status">  
            <button class="btn" onclick="window.location.href='updatebill.php';">UPDATE</button>
        </form>
    </div> 
</body>
</html>