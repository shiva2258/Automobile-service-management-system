<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobile Services - Pay Bill</title>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Vesper+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <!-- <script src="auto.js"></script> -->
    <style>
        nav a{
            margin: 79px;
        }
        .button-container{
            width: 175px;
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
            <a href="home.php">Home</a>
            <a href="cust.html">Customer</a>
            <a href="service.html">Services</a>
            <a href="bill.html" class="active">Bill</a>
            <a href="delivery.html">Delivery</a>
            </nav>
            <br>
        </header>
        <h2>PAY Bill</h2>
        <form action="downloadbill.php" method="post">
            <input type="varchar" name="cust_id" class="cust_id" placeholder="Enter Customer ID" required>
            <button class="btn" onclick="window.location.href='downloadbill.php';">PAY</button>
        </form>
        <?php
            // require('libs/fpdf.php');
            require_once 'test.php';

            $id = $aid = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //Collect post variables
                $id = $_POST['cust_id'];
            // $aid = $_POST['auto_id'];
            }
            
            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }
            
            // $sql = "UPDATE bill B SET bill_amt=1.1*(SELECT serv_charge FROM services S, customer C 
            // WHERE B.serv_id=S.serv_id AND B.cust_id=C.cust_id) WHERE B.bill_no=(select bill_no from bill where cust_id='$id');";

            // if ($con->query($sql) == true){
            //     // echo "Successfully inserted";
            // }
            // else {
            //     echo "ERROR: $sql <br> $con->error";
            // }

            // $sql = "UPDATE bill B SET bill_stat='PAID', bill_date=curdate() WHERE bill_no = (select bill_no from bill where cust_id='$id');";

            // if ($con->query($sql) == true){
            //     // echo "Successfully paid your bill";
            // }
            // else {
            //     echo "ERROR: $sql <br> $con->error";
            // }
            
            // $query=mysqli_query($con,"select * from bill where cust_id = '$id'");
            // while($arr=mysqli_fetch_array($query)){
            //     if($arr['6'] == "PAID"){
            //         echo '<script>alert("Your bill is already paid!!!")</script>';
            //     }
            // }
            
        ?>
        <!-- <div class="button-container">
        <br>
            <button onclick="window.location.href='genbill.php';">Go Back</button>
            <button onclick="window.location.href='downloadbill.php';">Download Bill</button>
        </div> -->
    </div> 
</body>
</html>