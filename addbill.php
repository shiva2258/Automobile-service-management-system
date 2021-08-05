<?php

    require_once('test.php');
    
    $bno = $sid = $cid = $bamt = $btype = $bstat = $bdate = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         //Collect post variables
        $bno = test_input($_POST['bill_no']);
        $sid = test_input($_POST['serv_id']);
        $cid = test_input($_POST['cust_id']);
        $bamt = test_input($_POST['bill_amt']);
        $btype = test_input($_POST['bill_type']);
        $bstat = test_input($_POST['bill_status']);
        $bdate = test_input($_POST['bill_date']);
    }
     
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sql = "INSERT INTO bill VALUES('$bno', '$sid', '$cid' , '$bamt', '$btype', '$bstat', $bdate);";
    // echo $sql;

    //Execute the query
    if ($con->query($sql) == true){
        echo "Successfully inserted";
        $insert=true; //Flag for successful insertion
    }
    else if ($bno = $sid = $bamt = $btype = $cid = $bstat = $bdate != "") {
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
    <title>Automobile Services - Add Bill</title>
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
    <img class="bg" src="bg-bill4.jpg" alt="">
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
        <h2>ADD Bill</h2>
        <!-- <p class='subMsg'>Successfully added the store</p> -->
       

        <form action="addbill.php" method="post">
            <input type="varchar" name="bill_no" class="bill_no" placeholder="Enter Bill No" required>
            <input type="varchar" name="serv_id" class="serv_id" placeholder="Enter Service ID" required>
            <input type="varchar" name="cust_id" class="cust_id" placeholder="Enter Customer ID">
            <input type="float" name="bill_amt" class="bill_amt" placeholder="Enter Bill Amount">
            <input type="text" name="bill_type" class="bill_type" placeholder="Enter Bill Type">
            <input type="text" name="bill_stat" class="bill_stat" placeholder="Enter Payment Status">
            <input type="date" name="bill_date" class="bill_date" placeholder="Enter Payment Date">

            <button class="btn" onclick="window.location.href='addbill.php';">ADD</button>
        </form>
    </div> 
</body>
</html>