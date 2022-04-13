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
        <h2>Upload a Post</h2>
        <div class="form">
            <form action="../actions/addPostAction.php" method="post" enctype="multipart/form-data">
                <label for="">Title</label><br>
                <input type="text" name="title" required><br>
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
                <textarea rows = "5" cols="50" name = "description" required></textarea><br>
                <label for="">Image</label><br>
                <input type="file" name="image" id="image" required><br>
                <input type="submit" value="Submit">
            </form>
            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
            <script>
                        CKEDITOR.replace( 'description' );
            </script>
        </div>
    </div>

    <?php include "../inc/adminFooter.php" ?>
<?php
}
?>