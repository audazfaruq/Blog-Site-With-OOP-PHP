<?php include "inc/userHeader.php";
require "admin/database/database.php";?>

<div class="main">
    <div class="heading">
        <h2>All Posts</h3>
    </div>
    <div class="allPosts">
    <?php
                $fetch_query = "SELECT * FROM post INNER JOIN myadmin ON post.p_author = myadmin.ad_id 
                INNER JOIN category ON post.p_category = category.c_id";
                $db = new database();
                $result = $db->fetch_data($fetch_query);
                if(mysqli_num_rows($result)){
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>      
        <div class="post">
            <div class="mainPart">
                <h3><?php echo $row['p_title']; ?></h3>
                <p><a href="singleCategoryPost.php?category_id=<?php echo $row['p_category'];?>"><?php echo $row['c_name']; ?></a></p>
                <img src='admin/uploads/.<?php echo $row['p_image']; ?>'>
                <h3><a href="singleAuthorPost.php?author_id=<?php echo $row['p_author'];?>"> <?php echo $row['ad_name']; ?></a></h3>
                <p id="pdate"><?php echo $row['p_date']; ?></p>
                <p><?php echo $row['p_description'] ?></p>
            </div>
            <div class="button">
            <a id="readmore" href="singlePost.php?p_id=<?php echo $row['p_id'];?>"> 
                <button>Read More</button>
            </a>
            </div>

        </div>
        <?php }  } ?>
    </div>
</div>
<?php include "inc/userFooter.php"?>