<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobile Services - Automobile Details</title>
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
    <img class="bg" src="bg-auto3.jpg" alt="">
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
        <h2>GET Individual Automobile Details</h2>
        <form action="genauto.php" method="post">
            <!-- <input type="varchar" name="auto_id" class="auto_id" placeholder="Enter Automobile ID" required> -->
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
            <button class="btn" onclick="window.location.href='genauto.php';">GET DETAILS</button>
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
            $id = test_input($_POST['auto_id']);
            }
            
            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }

            $var = mysqli_query($con, "select * from automobile WHERE auto_id='$id';");
            if(mysqli_num_rows($var)>0){
                // echo "No. of Customers: " . mysqli_num_rows($var);
                $arr=mysqli_fetch_row($var);
                echo "
                <pre>
                <table border size=20>
                <tr><td>Automobile ID</td><td>$arr[0]</td></tr>
                <tr><td>Service ID</td><td>$arr[1]</td></tr>
                <tr><td>Customer ID</td><td>$arr[2]</td></tr>
                <tr><td>Automobile Type</td><td>$arr[3]</td></tr>
                <tr><td>Automobile Description</td><td>$arr[4]</td></tr>
                </table>
                </pre>";
            }
            mysqli_free_result($var);
            mysqli_close($con);
        ?>
    </div> 
</body>
</html>