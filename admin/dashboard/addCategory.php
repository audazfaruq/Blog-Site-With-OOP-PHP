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
?>
    <div class="main">
        <h2>Add New Category</h2>
        <div class="form">
            <form action="../actions/addCategoryAction.php" method="post" enctype="multipart/form-data">
                <label for="">Category Name:</label><br>
                <input type="text" name="category" required><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <?php include "../inc/adminFooter.php" ?>
<?php
}
?>