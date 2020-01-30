<?php include("includes/header.php"); ?>
<?php 
 $db=new Database();

if(isset($_POST['submit']))
{
    $name=mysqli_real_escape_string($db->link, $_POST['category_name']);
    
    if($name=='')
    {
        $error="Please fill out all required fields";
    }
    else
    {
        $sql="INSERT INTO categories(name)
        VALUES('$name')";
        $update_row=$db->update($sql);
    }
}

?>


<form method="post" action="add_category.php">
  <div class="form-group">
    <label for="category_name">Category name</label>
    <input name ="category_name" type="text" class="form-control"   placeholder="Enter name">
  </div>
  <div>
  <input name="submit" type="submit" class="btn btn-primary" value="Submit">
  <a href="index.php" class="btn btn-primary">Cancel</a>
  </div>
</form>


<?php include("includes/footer.php"); ?>