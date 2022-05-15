<?php
session_start();
if(isset($_SESSION ['username']))
{
    header("Location:http://localhost:3000/admin/dashboard/mainDashBoard.php");
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../images/fIcon.png"/>
    <link rel="stylesheet" href="../../css/adminLogin.css">
    <script src="https://kit.fontawesome.com/57f7011f47.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Microbe&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>No User Found</title>
</head>
<body>
    <div class="container">
        <div class="top">
            <h1>No User Found</h1>
            <a href="../index.php"><img src="../../images/flogo.png" alt=""></a>
        </div>
    </div>
 <?php } ?>
 <?php
 include "../../inc/userFooter.php"
 ?>
