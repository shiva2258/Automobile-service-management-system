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

    $id=$name=$dob=$age=$gen=$add=$phone=$email=$sal=$desc = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         //Collect post variables
        $id = test_input($_POST['emp_id']);
        $name = test_input($_POST['emp_name']);
        $dob = test_input($_POST['emp_dob']);
        $age = test_input($_POST['emp_age']);
        $gen = test_input($_POST['emp_gender']);
        $add = test_input($_POST['emp_address']);
        $phone = test_input($_POST['emp_phone']);
        $email = test_input($_POST['emp_email']);
        $sal = test_input($_POST['emp_salary']);
        $desc = test_input($_POST['emp_desc']);
    }
     
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sql = "UPDATE employee SET emp_name='$name', emp_dob='$dob', emp_age='$age', emp_gender='$gen', emp_address='$add', emp_phone='$phone', 
    emp_email='$email', emp_salary='$sal', emp_desc='$desc' where emp_id='$id';";

    //Execute the query
    if (mysqli_query($con, $sql) == true){
        // echo "Successfully Updated";
    }
    else {
            echo "ERROR: $sql <br> $con->error";
        // }
        // echo "ERROR: $sql <br> $con->error";
    }

    //Close the DB connection
    $con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobile Services - Update Employee</title>
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
    <img src="bg-emp2.jpg" class="bg">
    <div class="container">
        <header>
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
        <h2>UPDATE Employee</h2>

        <form action="update-emp.php" method="post">
            <input type="varchar" name="emp_id" class="emp_id" placeholder="Enter Employee ID" required>
            <input type="text" name="emp_name" class="emp_name" placeholder="Enter Employee Name">
            <input type="date" name="emp_dob" class="emp_dob" placeholder="Enter Employee DOB">
            <input type="integer" name="emp_age" class="emp_age" placeholder="Enter Employee Age">
            <input type="char" name="emp_gender" class="emp_gender" placeholder="Enter Employee Gender">
            <input type="varchar" name="emp_address" class="emp_address" placeholder="Enter Employee Address">
            <input type="phone" name="emp_phone" class="emp_phone" placeholder="Enter Employee Phone Number">
            <input type="email" name="emp_email" class="emp_email" placeholder="Enter Employee Email">
            <input type="integer" name="emp_salary" class="emp_salary" placeholder="Enter Employee Salary">
            <input type="text" name="emp_desc" class="emp_desc" placeholder="Enter additional information (if any)">
            <!-- <input type='Submit'> -->
            <button class="btn" onclick="window.location.href='update-emp.php';">UPDATE</button>
        </form>
        <!-- <button class="button-container" onclick="window.location.href='index.html';">Click here to return to homepage</button> -->
    </div> 
</body>
</html>