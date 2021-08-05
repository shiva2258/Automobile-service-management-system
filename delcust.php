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

    $id = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = test_input($_POST["cust_id"]);
    }
     
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $sql = "DELETE FROM customer WHERE cust_id='$id';";
    
    //Execute the query
    if ($con->query($sql) == TRUE){
        // echo "Successfully Deleted";
    }
    else {
        echo "ERROR: Record couldn't be deleted due to: " . $con->error;
    }

    //Close the DB Connection
    $con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobile Services - Delete Customer</title>
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
            <a href="cust-admin.html" class="active">Customer</a>
            <a href="service-admin.html">Services</a>
            <a href="auto-admin.html">Automobile</a>
            <a href="bill-admin.html">Bill</a>
            <a href="delivery-admin.html">Delivery</a>
            </nav>
            <br>
        </header>
        <h2>DELETE Customer</h2>
        <!-- <p class='subMsg'>Successfully DELETED the Customer</p> -->
       

        <form action="delcust.php" method="post">
            <input type="varchar" name="cust_id" class="cust_id" placeholder="Enter Customer ID to DELETE">
            <button class="btn" onclick="window.location.href='cust.html';">DELETE</button>
        </form>
    </div> 
</body>
</html>