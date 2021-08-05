<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobile Services - Bill Details</title>
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
    <img class="bg" src="bg-bill2.jpg" alt="">
    <div class="container">
        <header>
            <!-- <h1>Select the store of your choice</h1> -->
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
        <h2>GENERATE Bill</h2>
        <form action="genbill-admin.php" method="post">
            <!-- <input type="varchar" name="bill_no" class="bill_no" placeholder="Enter Bill Number" required> -->
            <div class="custom-select" style="width:75%">
            <select name='bill_no' id='bill_no' style="display: block;
            border: 2px solid black;
            border-radius: 10px;
            outline: none;
            width:100%;
            margin: 15px auto;
            padding: 10px;
            font-size: 18px;">
                <option value="">Select Bill No.</option>
                <option value="B001">B001</option>
                <option value="B002">B002</option>
                <option value="B003">B003</option>
                <option value="B004">B004</option>
                <option value="B005">B005</option>
                <option value="B006">B006</option>
                <option value="B007">B007</option>
                <option value="B008">B008</option>
                <option value="B009">B009</option>
                <option value="B010">B010</option>
            </select>
        </div>
            <button class="btn" onclick="window.location.href='genbill-admin.php';">GENERATE</button>
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
            $id = $_POST['bill_no'];
            }
            
            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }

            $sql = "UPDATE bill B SET bill_amt=1.1*(SELECT serv_charge FROM services S, customer C 
            WHERE B.serv_id=S.serv_id AND B.cust_id=C.cust_id) WHERE B.bill_no='$id';";

            if ($con->query($sql) == true){
                // echo "Successfully inserted";
            }
            else {
                echo "ERROR: $sql <br> $con->error";
            }

            $var = mysqli_query($con, "select * from BILL WHERE bill_no='$id';");
            if(mysqli_num_rows($var)>0){
                // echo "No. of Customers: " . mysqli_num_rows($var);
                $arr=mysqli_fetch_row($var);
                echo "
                <pre>
                <table border size=20>
                <tr><td>Sl No.</td><td>$arr[0]</td></tr>
                <tr><td>Bill No</td><td>$arr[1]</td></tr>
                <tr><td>Service ID</td><td>$arr[2]</td></tr>
                <tr><td>Customer ID</td><td>$arr[3]</td></tr>
                <tr><td>Bill Amount</td><td>$arr[4]</td></tr>
                <tr><td>Bill Type</td><td>$arr[5]</td></tr>
                <tr><td>Bill Description</td><td>$arr[6]</td></tr>
                <tr><td>Payment Status</td><td>$arr[7]</td></tr>
                </table>
                </pre>";
            }
            mysqli_free_result($var);
            mysqli_close($con);
        ?>
    </div> 
</body>
</html>