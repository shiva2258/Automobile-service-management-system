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
        $id = test_input($_POST["auto_id"]);
    }
     
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $sql = "DELETE FROM automobile WHERE auto_id='$id';";
    
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
    <title>Automobile Services - Delete Automobile</title>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Vesper+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <!-- <script src="auto.js"></script> -->
    <style>
        nav a{
            margin: 38px;
        }
        .container h2{
            color: red;
        }
    </style>
</head>
<body>
    <img class="bg" src="bg-auto2.jpg" alt="">
    <div class="container">
        <header>
            <!-- <h1>Select the store of your choice</h1> -->
            <br>
            <nav>
            <a href="home-admin.php">Home</a>
            <a href="emp-admin.html">Employee</a>
            <a href="cust-admin.html">Customer</a>
            <a href="service-admin.html">Services</a>
            <a href="auto-admin.html" class="active">Automobile</a>
            <a href="bill-admin.html">Bill</a>
            <a href="delivery-admin.html">Delivery</a>
            </nav>
            <br>
        </header>
        <h2>DELETE Automobile</h2>
        <!-- <p class='subMsg'>Successfully DELETED the Customer</p> -->
       

        <form action="delauto.php" method="post">
            <!-- <input type="varchar" name="auto_id" class="auto_id" placeholder="Enter Automobile ID to DELETE"> -->
            <div class="custom-select" style="width:75%">
            <select name='auto_id' id='auto_id' style="display: block;
            border: 2px solid black;
            border-radius: 10px;
            outline: none;
            width:100%;
            margin: 15px auto;
            padding: 10px;
            font-size: 18px;">
                <option value="">Select Automobile ID</option>
                <option value="A100">A100</option>
                <option value="A101">A101</option>
                <option value="A102">A102</option>
                <option value="A103">A103</option>
                <option value="A104">A104</option>
                <option value="A105">A105</option>
                <option value="A106">A106</option>
                <option value="A107">A107</option>
                <option value="A108">A108</option>
                <option value="A109">A109</option>
            </select>
            </div>
            <button class="btn" onclick="window.location.href='delauto.php';">DELETE</button>
        </form>
    </div> 
</body>
</html>