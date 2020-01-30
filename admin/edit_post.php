<?php include("includes/header.php"); ?>
<?php
$id=$_GET['id'];
  $db=new Database();

  $sql1="SELECT * FROM posts WHERE id=" . $id;

  $post=$db->select($sql1)->fetch_assoc();
  //kategorije
  $sql2="SELECT * FROM categories";

  $categories=$db->select($sql2);

?>
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
        $sql="UPDATE posts
        SET
        title='$title',
        body='$body',
        category='$category',
        author='$author',
        tags='$tags'
        WHERE id=" .$id;
        $update_row=$db->update($sql);
    }
}

?>
<?php
if(isset($_POST['delete']))
{
    $sql="DELETE FROM posts WHERE id=" .$id;
    $delete_row=$db->delete($sql);
}
?>

<form method="post" action="edit_post.php?id=<?=$id?>">
  <div class="form-group" >
    <label for="title">Post title</label>
    <input name ="title"type="text" class="form-control"   placeholder="Enter title" value="<?=$post['title']; ?>">
  </div>
  <div class="form-group" >
    <label for="body">Post Body</label>
   <textarea name="body" class="form-control"   placeholder="Enter text"><?=$post['body']; ?></textarea>
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
    <option value="<?=$row['id']; ?>"<?=$selected; ?>><?php echo $row['name']; ?>></option>
    <?php endwhile; ?>
    </select>
  </div>
  <div class="form-group" >
    <label for="author">Author</label>
    <input name="author" type="text" class="form-control"   placeholder="Enter authors name" value="<?=$post['author']?>";>
  </div>
  <div class="form-group" >
    <label for="tags">Tags</label>
    <input name="tags" type="text" class="form-control"   placeholder="Enter tags" value="<?=$post['tags']?>";>
  </div>
  <div>
  <input name="submit" type="submit" class="btn btn-primary" value="Submit">
  <a href="index.php" class="btn btn-primary">Cancel</a>
  <input name="delete" type="submit" class="btn btn-danger" value="Delete">
  </div>
</form>


<?php include("includes/footer.php"); ?>