
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Category</title>
  <link rel="stylesheet" href="add catugy.css"></head>
<body>
<form action="add_category.php" method="post">


  <div class="container mt-5">
    <h1>Add Category</h1>
    <form method="post" >
  <label>Name:</label>
  <input type="text" name="categories_name"><br>

  <label>Description:</label>
  <textarea name="description"></textarea><br>

  <label>Price:</label>
  <input type="number" name="amount"><br>

  <input type="submit" value="Add Category">
</form>
</body>
</html>