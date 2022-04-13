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
        <div class="heading">
            <h2>All Categories.</h2>
        </div>
        <div class="allPosts">
        <?php
                $fetch_query = "SELECT * FROM category";
                $db = new database();
                $result = $db->fetch_data($fetch_query);
                if(mysqli_num_rows($result)){
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="post">     
            <div class="mainPart">
                <p>Category ID: <?php echo $row['c_id']; ?></p><br>
                <p>Category Name: <?php echo $row['c_name']; ?></p><br>
            </div>
            <div class="button">
            <a id="readmore" href="editCategory.php?c_id=<?php echo $row['c_id'];?>"> 
                <button id="edit">Edit</button>
            </a>
            <a id="readmore" href="../actions/dltCategoryAction.php?c_id=<?php echo $row['c_id'];?>"> 
                <button id="dlt">Delete</button>
            </a>
            </div>

        </div>
        <?php }  } ?>
        </div>
        </div>
    </div>

<?php include "../inc/adminFooter.php" ?>
<?php
}
?>