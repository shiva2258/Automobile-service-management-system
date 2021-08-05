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
        $id = test_input($_POST["serv_id"]);
    }
     
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $sql = "DELETE FROM services WHERE serv_id='$id';";
    if ($con->query($sql) == TRUE){
        // echo "Successfully Deleted";
    }
    else {
        echo "ERROR: Record couldn't be deleted due to: " . $con->error;
    }
    $con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobile Services - Delete Service</title>
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
        <h2>REMOVE Service</h2>
        <!-- <p class='subMsg'>Successfully added the store</p> -->
       

        <form action="delserv.php" method="post">
            <!-- <input type="varchar" name="serv_id" class="serv_id" placeholder="Enter Service ID to DELETE"> -->
            <div class="custom-select" style="width:75%">
            <select name='serv_id' id='serv_id' style="display: block;
            border: 2px solid black;
            border-radius: 10px;
            outline: none;
            width: 75%;
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
            <button class="btn" onclick="window.location.href='delserv.php';">REMOVE</button>
        </form>
        <div class="button-container">
        <br>
        <button onclick="window.location.href='avserv-admin.php';">Go Back</button>
        </div>
    </div> 

</body>
</html>