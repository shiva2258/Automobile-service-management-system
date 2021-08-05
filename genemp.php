<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobile Services - Employee Details</title>
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
            color: #a9b81a;;
        }
    </style>
</head>
<body>
    <img class="bg" src="bg-emp2.jpg" alt="">
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
        <h2>GET Employee Details</h2>
        <form action="genemp.php" method="post">
            <input type="varchar" name="emp_id" class="emp_id" placeholder="Enter Employee ID" required>
            <button class="btn" onclick="window.location.href='genemp.php';">GET Individual Employee Details</button>
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
                $id = test_input($_POST['emp_id']);
            }
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $var = mysqli_query($con, "select * from employee WHERE emp_id='$id';");
            if(mysqli_num_rows($var)>0){
                $arr=mysqli_fetch_row($var);
                echo "
                <pre>
                <table border size=20>
                <tr><td>Employee ID</td><td>$arr[0]</td></tr>
                <tr><td>Employee Name</td><td>$arr[1]</td></tr>
                <tr><td>Employee DOB</td><td>$arr[2]</td></tr>
                <tr><td>Employee Age</td><td>$arr[3]</td></tr>
                <tr><td>Employee Gender</td><td>$arr[4]</td></tr>
                <tr><td>Employee Address</td><td>$arr[5]</td></tr>
                <tr><td>Employee Phone Number</td><td>$arr[6]</td></tr>
                <tr><td>Employee Email</td><td>$arr[7]</td></tr>
                <tr><td>Employee Salary</td><td>$arr[8]</td></tr>
                <tr><td>Additional Information</td><td>$arr[9]</td></tr>
                </table>
                </pre>";
            }
            mysqli_free_result($var);
            mysqli_close($con);
        ?>
    </div> 
</body>
</html>