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
            font-size: 100px;
            background: cornflowerblue;
            color: black;
            padding: 7px;
            font-weight: bolder;
            border: 5px solid black;
            border-radius: 10px;
        }
        p{
            margin-left: 20%;
        }
        p .btn{
            font-size: 20px;
            font-weight: bold;
            color: rgb(14 7 67);
            justify-content: center;
            background-color: lightskyblue;
            border: 2px solid crimson;
            border-radius: 12px;
            padding: 2px 15px;
            margin: 39px;
            outline: none;
        }
        p .btn:hover{
            background-color: crimson;
            color:white;
        }
        .bg{
            opacity: 0.6;
        }
        nav a{
            margin: 79px;
        }
        .container p{
            color: beige;
            background-color: dimgray;
        }
        .container p h2{
            color: blue;
        }
    </style>
</head>
  
<body>
    <img class="bg" src="bg-main.jpg" alt="">
    <div class="container">
        <header>
            <br>
            <nav>
            <a href="home.php" class="active">Home</a>
            <a href="cust.html">Customer</a>
            <a href="service.html">Services</a>
            <a href="bill.html">Bill</a>
            <a href="delivery.html">Delivery</a>
            </nav>
            <br>
        </header>
        <br>
        <h1>Forged   Automobiles</h1>
        <br><br>
        <marquee class="marq" behavior="sliding" direction="left">
        <h2>One Stop Solution for all your Automobile Service related issues and concerns.</h2>
        </marquee>
        <p><h2>Contact Us</h2>Shesha Sai Balaji K P - 9448673325<br>
        Rithvik M N - 8659493271<br>Sachin P - 7892654352</p>

    </div>
    <br>
    <p>
        <a href="addfeedback.php" class="btn btn-feed">Provide Feedback</a>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>