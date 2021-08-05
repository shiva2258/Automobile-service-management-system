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
        $id = test_input($_POST["emp_id"]);
    }
     
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $sql = "DELETE FROM employee WHERE emp_id='$id';";
    
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
    <title>Automobile Services - Delete Employee</title>
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
            color: #a9b81a;
        }
    </style>
</head>
<body>

    <img class="bg" src="bg-emp3.jpg" alt="">
    <div class="container">
        <header>
            <!-- <h1>Select the store of your choice</h1> -->
            <br>
            <nav>
            <a href="home-admin.php">Home</a>
            <a href="emp-admin.html" class="active">Employee</a>
            <a href="cust-admin.html">Customer</a>
            <a href="service-admin.html">Services</a>
            <a href="auto-admin.html">Automobile</a>
            <a href="bill-admin.html">Bill</a>
            <a href="delivery-admin.html">Delivery</a>
            </nav>
            <br>
        </header>
        <h2>DELETE Employee</h2>
        <!-- <p class='subMsg'>Successfully DELETED the Customer</p> -->
       

        <form action="delemp.php" method="post">
            <!-- <input type="varchar" name="emp_id" class="emp_id" placeholder="Enter employee ID to DELETE"> -->
            <div class="custom-select" style="width:75%">
            <select name='emp_id' id='emp_id' style="display: block;
            border: 2px solid black;
            border-radius: 10px;
            outline: none;
            width: 100%;
            margin: 15px auto;
            padding: 10px;
            font-size: 18px;" required>
                <option>Select Employee ID</option>
                <option value="E001">E001</option>
                <option value="E002">E002</option>
                <option value="E003">E003</option>
                <option value="E004">E004</option>
                <option value="E005">E005</option>
                <option value="E008">E008</option>
                <option value="E009">E009</option>
                <option value="E010">E010</option>
            </select>
            </div>
            <button class="btn" onclick="window.location.href='delemp.php';">DELETE</button>
        </form>
    </div> 
</body>
</html>