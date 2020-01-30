<?php include("includes/header.php"); ?>
<?php 
 $db=new Database();

if(isset($_POST['submit']))
{
    $title=mysqli_real_escape_string($db->link, $_POST['title']);
    $body=mysqli_real_escape_string($db->link, $_POST['body']);
    $category=mysqli_real_escape_string($db->link, $_POST['category']);
    $author=mysqli_real_escape_string($db->link, $_POST['author']);
    $tags=mysqli_real_escape_string($db->link, $_POST['tags']);

    if($title==''|| $body=='' || $category==''|| $author=='')
    {
        $error="Please fill out all required fields";
    }
    else
    {
        $sql="INSERT INTO posts(title,body,category,author,tags)
        VALUES('$title','$body',$category,'$author','$tags')";
        $insert_row=$db->insert($sql);
    }
}

?>
<?php
 

  $sql2="SELECT * FROM categories";

  $categories=$db->select($sql2);

?>

<form method="post" action="add_post.php">
  <div class="form-group" >
    <label for="title">Post title</label>
    <input name ="title"type="text" class="form-control"   placeholder="Enter title">
  </div>
  <div class="form-group" >
    <label for="body">Post Body</label>
   <textarea name="body" class="form-control"   placeholder="Enter text" ></textarea>
  </div>
  <div class="form-group" >
  <label for="category">Category</label>
    <select class="form-control" name="category">
    <?php while($row=$categories->fetch_assoc()): ?>
    <?php if($row['id']== $post['category']){
        $selected='selected';
    }else {
        $selected='';
    }
    ?>
    <option <?=$selected; ?> value="<?=$row['id']; ?>"><?php echo $row['name']; ?></option>
    <?php endwhile; ?>
    </select>
  </div>
  <div class="form-group" >
    <label for="author">Author</label>
    <input name="author" type="text" class="form-control"   placeholder="Enter authors name">
  </div>
  <div class="form-group" >
    <label for="tags">Tags</label>
    <input name="tags" type="text" class="form-control"   placeholder="Enter tags">
  </div>
  <div>
  <input name="submit" type="submit" class="btn btn-primary" value="Submit">
  <a href="index.php" class="btn btn-primary">Cancel</a>
  
  </div>
</form>


<?php include("includes/footer.php"); ?>