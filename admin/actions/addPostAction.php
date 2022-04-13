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
    if(isset($_FILES['image'])){
        $error = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        if(empty($error)==true){
            $random = uniqid();
            move_uploaded_file($file_tmp,"../uploads/.$random.$file_name");
        }
        else{
            print_r($error);
            die();
        }
    }
    $author = $_SESSION['userid'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $desc = $_POST['description'];
    $date = date("d M, Y");
    $insert_query = "INSERT INTO post (p_title,p_author,p_category,p_description,p_image,p_date) VALUES ('$title',$author,$category,'$desc','$random.$file_name','$date')";
    $db = new database();
    $result = $db->insert_data($insert_query);
    
    if($result == true){
        header("Location: ../dashboard/mainDashBoard.php");
    }
    else{
        echo "error";
    }
}
    ?>