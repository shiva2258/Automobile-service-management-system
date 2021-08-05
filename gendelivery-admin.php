<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobile Services - Delivery Details</title>
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
    <img src="bg-del3.jpg" alt="" class="bg">
    <div class="container">
        <header>
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
        <h2>GET Delivery Details</h2>
        <form action="gendelivery-admin.php" method="post">
            <input type="varchar" name="cust_id" class="cust_id" placeholder="Enter Customer ID" required>
            <input type="varchar" name="auto_id" class="auto_id" placeholder="Enter Automobile ID" required>
            <button class="btn" onclick="window.location.href='gendelivery-admin.php';">GET DETAILS</button>
        </form>
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

            $cid = $aid = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //Collect post variables
                $cid = test_input($_POST['cust_id']);
                $aid = test_input($_POST['auto_id']);
            }
            
            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }

            $var = mysqli_query($con, "select * from delivery WHERE cust_id='$cid' and auto_id='$aid';");
            if(mysqli_num_rows($var)>0){
                // echo "No. of Customers: " . mysqli_num_rows($var);
                $arr=mysqli_fetch_row($var);
                echo "
                <pre>
                <table border size=20>
                <tr><td>Customer ID</td><td>$arr[0]</td></tr>
                <tr><td>Automobile ID</td><td>$arr[1]</td></tr>
                <tr><td>Bill Number</td><td>$arr[2]</td></tr>
                <tr><td>Delivery Address</td><td>$arr[3]</td></tr>
                <tr><td>Delivery Agent</td><td>$arr[4]</td></tr>
                <tr><td>Delivery Date</td><td>$arr[5]</td></tr>
                </table>
                </pre>";
            }
            mysqli_free_result($var);
            mysqli_close($con);
        ?>
    </div> 
</body>
</html>