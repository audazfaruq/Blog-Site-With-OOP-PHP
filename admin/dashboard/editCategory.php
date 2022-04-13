<?php
include "../inc/adminHeader.php";
require "../database/database.php";
$category_id = $_GET['c_id'];
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
        <?php
                $fetch_query = "SELECT * FROM category where c_id = $category_id";
                $db = new database();
                $result = $db->fetch_data($fetch_query);
                $row = mysqli_fetch_assoc($result);
            ?>
            <form action="../actions/updateCategoryAction.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="c_id" value="<?php echo$row['c_id'] ?>">
                <label for="">Category Name:</label><br>
                <input type="text" name="category" required value="<?php echo$row['c_name'] ?>"><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <?php include "../inc/adminFooter.php" ?>
<?php
}
?>