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
        .button-container{
            width:175px;
        }
    </style>
</head>
<body>
    <img class="bg" src="bg-bill4.jpg" alt="">
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
        <h2>GENERATE Bill Report</h2>
        <form action="genbillpdf1.php" method="post">
            <input type="date" name="start_date" class="start_date" placeholder="Enter Start Date" required>
            <input type="date" name="end_date" class="end_date" placeholder="Enter End Date" required>
            <button class="btn" onclick="window.location.href='genbillpdf1.php';">GENERATE</button>
        </form>
        <?php
            require_once 'test.php';

            $sdt = $edt = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //Collect post variables
                $sdt = $_POST['start_date'];
                $edt = $_POST['end_date'];
            }
            
            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }

            // $var = mysqli_query($con, "select * from BILL WHERE bill_date between '$sdt' and '$edt';");
            // echo "<table border size=20 solid blue>";
            // echo "<tr><th>Bill Number</th><th>Service ID</th><th>Customer ID</th><th>Bill Amount</th><th>Bill Type</th>
            // <th>Payment Status</th><th>Payment Date</th></tr>";

            // if(mysqli_num_rows($var)>0){
            //     echo "No. of Bills: " . mysqli_num_rows($var);
            //     while($arr=mysqli_fetch_row($var)){
            //         echo "<tr><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td><td>$arr[5]</td><td>$arr[6]</td><td>$arr[7]</td></tr>";
            //     }
            //     echo "</table>";
            //     mysqli_free_result($var);
            // }
            mysqli_close($con);
        ?>
        <br>
        <div class="button-container">
        <br>
        <button onclick="window.location.href='dispbill.php';">Go Back</button>
        </div>
    </div> 
</body>
</html>