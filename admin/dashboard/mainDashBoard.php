<?php
include "../inc/adminHeader.php";
require "../database/database.php";
session_start();
$id= $_SESSION ['userid']; 
if(!isset($_SESSION ['username']))
{
    header("Location: ../index.php");
}
else
{
    
?>
    <div class="main">
        <div class="heading">
        <?php 
        $fetch_query = "SELECT * FROM myadmin where ad_id = $id";
        $db = new database();
        $result = $db->fetch_data($fetch_query);
        $row = mysqli_fetch_assoc($result);
        ?>
            <h2>Welcome <?php echo $row['ad_name']; ?>.</h2>
        </div>
        <div class="allPosts">
        <?php
                $fetch_query = "SELECT * FROM post INNER JOIN myadmin ON post.p_author = myadmin.ad_id 
                INNER JOIN category ON post.p_category = category.c_id where ad_id = $id";
                $db = new database();
                $result = $db->fetch_data($fetch_query);
                if(mysqli_num_rows($result)){
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="post">     
            <div class="mainPart">
                <h3><?php echo $row['p_title']; ?></h3>
                <p><?php echo $row['c_name']; ?></p>
                <img src='../uploads/.<?php echo $row['p_image']; ?>'>
                <h3><?php echo $row['ad_name']; ?></h3>
                <p id="pdate"><?php echo $row['p_date']; ?></p>
                <p><?php echo $row['p_description'] ?></p>
            </div>
            <div class="button">
            <a id="readmore" href="editPost.php?p_id=<?php echo $row['p_id'];?>"> 
                <button id="edit">Edit</button>
            </a>
            <a id="readmore" href="../actions/dltPostAction.php?p_id=<?php echo $row['p_id'];?>"> 
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