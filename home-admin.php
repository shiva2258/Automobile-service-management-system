<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobile Services</title>
    <!-- <script src="auto.js"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Vesper+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <style>
        .container h1 {
            text-align: center;
            font-family: 'Italianno', cursive;
            font-size: 120px;
            background: cornflowerblue;
            color: black;
            padding: 7px 15px;
            font-weight: bolder;
            border: 5px solid black;
            border-radius: 10px;
        }
        .bg{
            opacity: 0.6;
        }
        p{
            margin-left: 25%;
        }
        p .btn{
            font-size: 20px;
            font-weight: bold;
            color: rgb(14 7 67);
            justify-content: center;
            background-color: lightskyblue;
            border: 2px solid crimson;
            border-radius: 12px;
            padding: 2px 14px;
            margin: 39px;
            outline: none;
        }
        p .btn:hover{
            background-color: crimson;
            color:white;
        }
    </style>
</head>
  
<body>
    <img class="bg" src="bg-main.jpg" alt="">
    <div class="container">
        <header>
            <!-- <img class="bghead" src="bg-header.jpg" alt=""> -->
            <br>
            <nav>
            <a href="home-admin.php" class="active">Home</a>
            <a href="emp-admin.html">Employee</a>
            <a href="cust-admin.html">Customer</a>
            <a href="service-admin.html">Services</a>
            <a href="auto-admin.html">Automobile</a>
            <a href="bill-admin.html">Bill</a>
            <a href="delivery-admin.html">Delivery</a>
            </nav>
            <br>
        </header>
        <br><br><br><br><br>
        <h1>Forged Automobiles</h1>
        <br><br><br>
        
        <!-- <marquee class="marq" behavior="sliding" direction="left">
        <h2>We provide you a platform to choose the suitable service center for your vehicles</h2>
        </marquee> -->
    </div>
    <br><br>
    <p>
        <a href="dispfeedback.php" class="btn btn-feed">View Feedbacks</a>
        <a href="reset-password.php" class="btn btn-warning">Reset Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out</a>
    </p>
</body>
</html>