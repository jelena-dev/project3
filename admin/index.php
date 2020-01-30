<?php include("includes/header.php"); ?>
<?php  
$db= new Database;//konekcija

$sql="SELECT posts.*, categories.name
FROM posts
INNER JOIN categories
ON posts.category=categories.id
ORDER BY posts.id DESC";//upit za postove
$posts=$db->select($sql);//realizacija za postove

$sql2="SELECT * FROM categories";//upit za kategorije
$categories=$db->select($sql2);//realizacija za kategorije
?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Post Id</th>
      <th scope="col">Post title</th>
      <th scope="col">Category</th>
      <th scope="col">Author</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row=$posts->fetch_assoc()): ?>
    <tr>
      <td><?=$row['id']; ?></td>
      <td><a href="edit_post.php?id=<?=$row['id']; ?>"><?=$row['title']; ?></a></td>
      <td><?=$row['name']; ?></td>
      <td><?=$row['author']; ?></td>
      <td><?=formatDate($row['date']); ?></td>
    </tr>
    <?php endwhile; ?>
    

  </tbody>
</table>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Category Id</th>
      <th scope="col">Category Name</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row=$categories->fetch_assoc()): ?>
    <tr>
     
      <td><?=$row['id']; ?></td>
      <td><a href="edit_category.php?id=<?=$row['id'];?>"><?=$row['name']; ?></a></td>
    </tr>
    <?php endwhile; ?>

  </tbody>
</table>

  <?php include("includes/footer.php"); ?>