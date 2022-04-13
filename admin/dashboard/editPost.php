<?php
include "../inc/adminHeader.php";
require "../database/database.php";
$post_id = $_GET['p_id'];
session_start();
if(!isset($_SESSION ['username']))
{
    header("Location: ../index.php");
}
else
{
?>
    <div class="main">
        <h2>Update Post</h2>
        <div class="form">
        <?php
                $fetch_query = "SELECT * FROM post INNER JOIN myadmin ON post.p_author = myadmin.ad_id 
                INNER JOIN category ON post.p_category = category.c_id where p_id = $post_id";
                $db = new database();
                $result = $db->fetch_data($fetch_query);
                $row = mysqli_fetch_assoc($result);
            ?>  
            <form action="../actions/updatePostAction.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="p_id" value="<?php echo$row['p_id'] ?>">
                <label for="">Title</label><br>
                <input type="text" name="title" required value="<?php echo$row['p_title'] ?>"><br>
                <label for="">Selected Category</label><br>
                <input type="text" name="catgory" required value="<?php echo$row['c_name'] ?>"><br>
                <label for="">Category</label><br>
                <select name="category" required>
                    <option value=""selected disabled>Select Catagory</option>
                       <?php
                         $db = new database();
                         $fetch_query = "SELECT * FROM category";
                         $result = $db->fetch_data($fetch_query);
                         while ($category = mysqli_fetch_assoc($result)) {
                        ?>
                    <option value="<?php echo $category['c_id']; ?>"><?php echo $category['c_name']; ?></option>
                        <?php  } ?>
                </select><br>
                <label for="">Description</label><br>
                <textarea rows = "5" cols="50" name = "description" required><?php echo$row['p_description']; ?></textarea><br>
                <label for="">Image</label><br>
                <input type="file" name="image" id="image" required><br>
                <p>Current Image:</p>
                <img id="editing" src="../uploads/.<?php echo $row['p_image']; ?>"><br>
                <input type="submit" value="Submit">
            </form>
            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
            <script>
                        CKEDITOR.replace( 'description' );
            </script>
        </div>
    </div>

    <?php include "../inc/adminFooter.php";
    } ?>