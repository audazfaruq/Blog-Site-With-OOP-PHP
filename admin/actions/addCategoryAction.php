<?php
include "../inc/adminHeader.php";
require "../database/database.php";
session_start();
if(!isset($_SESSION ['username']))
{
    header("Location: ../index.php");
}
else
{
    $category = $_POST['category'];
    $insert_query = "INSERT INTO category (c_name) VALUES ('$category')";
    $db = new database();
    $result = $db->insert_data($insert_query);
    
    if($result == true){
        header("Location: ../dashboard/allCategory.php");
    }
    else{
        echo "error";
    }
}
    ?>