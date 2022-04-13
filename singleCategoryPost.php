<?php 
include "inc/userHeader.php";
require "admin/database/database.php";
$category_id = $_GET['category_id']; ?>

<div class="main">
    <div class="heading">
        <?php
        $fetch_query = "SELECT * FROM category where c_id = $category_id";
        $db = new database();
        $result1 = $db->fetch_data($fetch_query);
        $row1 = mysqli_fetch_assoc($result1);
        ?>
        <h2>All Post of <?php echo $row1['c_name']; ?>.</h3>
    </div>
    <div class="allPosts">
    <?php
            $fetch_query = "SELECT * FROM post INNER JOIN myadmin ON post.p_author = myadmin.ad_id 
            INNER JOIN category ON post.p_category = category.c_id where c_id = $category_id";
            $db = new database();
            $result = $db->fetch_data($fetch_query);
                if(mysqli_num_rows($result)){
                    while ($row = mysqli_fetch_assoc($result)) {
            ?> 
        <div class="post">
            <div class="mainPart">
                <h3><?php echo $row['p_title']; ?></h2>
                <p><?php echo $row['c_name']; ?></p>
                <img src='admin/uploads/.<?php echo $row['p_image']; ?>'>
                <h3><a href="singleAuthorPost.php?author_id=<?php echo $row['p_author'];?>"> <?php echo $row['ad_name']; ?></a></h3>
                <p><?php echo $row['p_date']; ?></p>
                <p><?php echo $row['p_description'] ?></p>
            </div>
            <div class="button">
                <a id="readmore" href="singlePost.php?p_id=<?php echo $row['p_id'];?>"> 
                        <button>Read More..</button>
                </a>
            </div>

        </div>
        <?php }  } ?>
    </div>
</div>
<?php include "inc/userFooter.php"?>