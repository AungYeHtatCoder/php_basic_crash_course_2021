<?php
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=product_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo '<pre>';
var_dump($_FILES);
echo '</pre>';

$errors = [];

$title = '';
$price = '';
$description = ''; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title']; // test
    $description = $_POST['description'];
    $price = $_POST['price'];
    $data = date('Y-m-d H:i:s');

    if (!$title) {
        $errors[] = 'Product title is reuired';
    }
    if (!$price) {
        $errors[] = 'Product price is reuired';
    }

    if (empty($errors)) {   
        $image = $_FILES['image'] ?? null;
        if ($image) {
            move_uploaded_file($image['tmp_name'], $image['name']);
        }
        exit; 

        $statement = $pdo->prepare("INSERT INTO products (title, imgae, description, price, create_date);
                  VALUE (:title, :image, :description, :price, :date)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', '');
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':data', $data);
        $statement->execute();
    }
}

function randomString($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCKEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i <$n; $i++){
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }
    return $str;
}
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>Products CRUD</title>
  </head>
  <body>
<h1>Create new Product</h1>


<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
    <?php foreach ($errors as $errors): ?>
        <div><?php echo $errors ?></div>
    <?php endforeach; ?>
</div> 
<?php endif; ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Product Image</label>
        <br>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label>Product title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
    </div>
    <div class="form-group">
        <label>Product description</label>
        <textarea class="form-control" name="description"><?php echo $description ?></textarea>
    </div>
    <div class="form-group">
        <label>Product price</label>
        <input type="number" step=".01" name="price" class="form-control" value="<?php echo $price ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
