<?php include("includes/header.php"); ?>
<?php
$db=new Database();
$id=$_GET['id'];

$sql1="SELECT* FROM categories WHERE id=" . $id;

$category=$db->select($sql1)->fetch_assoc();
//kategorije
$sql2="SELECT* FROM categories";

$categories=$db->select($sql2);


?>
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
        $sql="UPDATE categories
        SET
        name='$name'
        WHERE id=" .$id;
        $update_row=$db->update($sql);
    }
}

?>
<?php
if(isset($_POST['delete']))
{
    $sql="DELETE FROM categories WHERE id=" .$id;
    $delete_row=$db->delete($sql);
}
?>

<form method="post" action="edit_category.php?id=<?=$id; ?>">
  <div class="form-group" >
    <label for="category_name">Category name</label>
    <input name ="category_name" type="text" class="form-control" value="<?php echo $category['name']; ?>"  placeholder="Enter name">
  </div>
  <div>
  <input name="submit" type="submit" class="btn btn-primary" value="Submit">
  <a href="index.php" class="btn btn-primary">Cancel</a>
  <input name="delete" type="submit" class="btn btn-danger" value="Delete">
  </div>
</form>


<?php include("includes/footer.php"); ?>