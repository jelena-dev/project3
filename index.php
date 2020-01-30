<?php include 'includes/header.php'; ?>

<?php
  $db=new Database();

  $sql1="SELECT * FROM posts ORDER BY id DESC";

  $posts=$db->select($sql1);

  //kategorije
  $sql2="SELECT * FROM categories";

  $categories=$db->select($sql2);
?>
<?php if($posts) : ?>
  <?php while($row=$posts->fetch_assoc()) : ?>
<div class="blog-post">
            <h2 class="blog-post-title"><?=$row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date'])?> by <a href="#"><?=$row['author']?></a></p>
            <?php echo shortenText($row['body']); ?>
           <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More</a>
          </div><!-- /.blog-post -->
  <?php endwhile; ?>
		  
          

<?php else : ?>
<p>There are no posts there</p>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>
