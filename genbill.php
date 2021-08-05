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
            margin: 78px;
        }
        .btn-cont{
            text-align: center;
            aligin-items: center;
            background: rgb(238, 183, 81);
            margin: 15px 345px;
            border-radius:12px;
            position: relative;
            display: flex;
            flex-direction: column;
        }
        .btn-cont a{
            position: relative;
            /* width:60%; */
            border-radius:12px;
        }
        .btn-cont a:hover{
            background-color: purple;
            color:white;
            border: 2px solid white;
        }
    </style>
</head>
<body>
    <img class="bg" src="bg-bill3.jpg" alt="">
    <div class="container">
        <header>
            <!-- <h1>Select the store of your choice</h1> -->
            <br>
            <nav>
            <a href="home.php">Home</a>
            <a href="cust.html">Customer</a>
            <a href="service.html">Services</a>
            <a href="bill.html" class="active">Bill</a>
            <a href="delivery.html">Delivery</a>
            </nav>
            <br>
        </header>
        <h2>VIEW Bill</h2>
        <form action="genbill.php" method="post">
            <input type="varchar" name="cust_id" class="cust_id" placeholder="Enter Customer ID" required>
            <button class="btn" onclick="window.location.href='genbill.php';">VIEW</button>
        </form>
        <?php
            require_once "test.php";

            $id = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //Collect post variables
            $id = $_POST['cust_id'];
            }
            
            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }

            // $sql = "UPDATE bill B SET bill_amt=1.1*(SELECT serv_charge FROM services S, customer C 
            // WHERE B.serv_id=S.serv_id AND B.cust_id=C.cust_id) WHERE B.bill_no='$id';";

            // if ($con->query($sql) == true){
            //     // echo "Successfully inserted";
            // }
            // else {
            //     echo "ERROR: $sql <br> $con->error";
            // }

            $var = mysqli_query($con, "select * from BILL WHERE cust_id='$id';");
            if(mysqli_num_rows($var)>0){
                // echo "No. of Customers: " . mysqli_num_rows($var);
                while($arr=mysqli_fetch_row($var)){
                echo "
                <pre>
                <table border size=20>
                <tr><td>Sl No.</td><td>$arr[0]</td></tr>
                <tr><td>Bill No</td><td>$arr[1]</td></tr>
                <tr><td>Service ID</td><td>$arr[2]</td></tr>
                <tr><td>Customer ID</td><td>$arr[3]</td></tr>
                <tr><td>Bill Amount</td><td>$arr[4]</td></tr>
                <tr><td>Bill Type</td><td>$arr[5]</td></tr>
                <tr><td>Payment Status</td><td>$arr[6]</td></tr>
                <tr><td>Payment Date</td><td>$arr[7]</td></tr>
                </table>
                </pre>";
                if($arr[6]=='PENDING'){
                    echo" 
                    <div class='btn-cont'>
                        <a href='paybill.php'>PAY Now</button>
                    </div>";
                }
                }
            }
            mysqli_free_result($var);
            mysqli_close($con);
        ?>
    </div>
</body>
</html>