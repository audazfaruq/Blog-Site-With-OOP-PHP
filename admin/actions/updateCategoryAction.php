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
    
    $category_id = $_POST['c_id'];
    $category = $_POST['category'];
    $update_query = "UPDATE category SET c_name='$category' where c_id=$category_id";
    $db = new database();
    $result = $db->insert_data($update_query);
    
    if($result == true){
        header("Location: ../dashboard/allCategory.php");
    }
    else{
        echo "error";
    }
}
    ?>