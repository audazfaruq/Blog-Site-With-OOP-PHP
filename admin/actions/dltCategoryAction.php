<?php 
require "../database/database.php";

    $category_id = $_GET['c_id'];

    $delete_query = "DELETE FROM category WHERE c_id = $category_id";
    $db = new database();
    $result = $db->delete_data($delete_query);
    if ($result == true) {
        header("Location: http://localhost:3000/admin/dashboard/allCategory.php");
    } else {
        echo "Error deleting the post. Try again later.";
    }

?>