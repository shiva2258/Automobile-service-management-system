<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobile Services - Customer Details</title>
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
    <img class="bg" src="bg-cust2.jpg" alt="">
    <div class="container">
        <header>
            <!-- <h1>Select the store of your choice</h1> -->
            <br>
            <nav>
            <a href="home.php">Home</a>
            <a href="cust.html" class="active">Customer</a>
            <a href="service.html">Services</a>
            <a href="bill.html">Bill</a>
            <a href="delivery.html">Delivery</a>
            </nav>
            <br>
        </header>
        <h2>GET Customer Details</h2>
        <form action="gencust.php" method="post">
            <input type="varchar" name="cust_id" class="cust_id" placeholder="Enter Customer ID" required>
            <button class="btn" onclick="window.location.href='gencust.php';">GET Customer Details</button>
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

            $id = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //Collect post variables
                $id = test_input($_POST['cust_id']);
            }
            
            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }

            $var = mysqli_query($con, "select * from customer WHERE cust_id='$id';");
            if(mysqli_num_rows($var)>0){
                $arr=mysqli_fetch_row($var);
                echo "
                <pre>
                <table border size=20>
                <tr><td>Customer ID</td><td>$arr[0]</td></tr>
                <tr><td>Customer Name</td><td>$arr[1]</td></tr>
                <tr><td>DOB</td><td>$arr[2]</td></tr>
                <tr><td>Customer Age</td><td>$arr[3]</td></tr>
                <tr><td>Customer Gender</td><td>$arr[4]</td></tr>
                <tr><td>Customer Address</td><td>$arr[5]</td></tr>
                <tr><td>Customer Phone</td><td>$arr[6]</td></tr>
                <tr><td>Customer email</td><td>$arr[7]</td></tr>
                </table>
                </pre>";
            }
            mysqli_free_result($var);
            mysqli_close($con);
        ?>
    </div> 
</body>
</html>