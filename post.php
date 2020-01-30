<?php include 'includes/header.php'; ?>
<?php
  $db=new Database();

  $sql1="SELECT * FROM posts WHERE id=" . $_GET['id'];

  $post=$db->select($sql1)->fetch_assoc();
  //kategorije
  $sql2="SELECT * FROM categories";

  $categories=$db->select($sql2);

  
?>
<div class="blog-post">
            <h2 class="blog-post-title"><?=$post['title']?></h2>
            <p class="blog-post-meta"><?php echo formatDate($post['date'])?> by <a href="#"><?=$post['author']?></a></p>
				<?=$post['body']; ?>
          </div><!-- /.blog-post -->		      
<?php include 'includes/footer.php'; ?>