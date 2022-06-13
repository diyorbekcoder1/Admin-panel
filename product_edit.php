<?php
include './crud/connect.php';
$connect = new DB();

if ($connect) {
    if ($_GET) {
        $id = $_GET['id'];
    }
    $db = $connect->getConnect();
    $queryCategory = $db->query("SELECT * FROM categories");
    $queryProduct = $db->query("SELECT * FROM products where id = " . $id . " LIMIT 1");


    if ($queryCategory->num_rows > 0) {
        while ($queryAll = $queryCategory->fetch_object()) {
            $categories[] = $queryAll;
        }
    }
    if ($queryProduct->num_rows > 0) {
        while ($queryAll = $queryProduct->fetch_object()) {
            $products[] = $queryAll;
        }
    }
    $products = $products[0];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>web site name</title>
</head>

<body>

<form class="m-5" action="./crud/productUpdate.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $products->id ?>">
    <div class="form-group m-2">
        <label for="title">Title</label>
        <input value="<?= $products->title ?? '' ?>" type="text" class="form-control" id="title" name="title"
               placeholder="Enter title">
    </div>
    <div class="form-group m-2">
        <label for="price">Price</label>
        <input value="<?= $products->price ?? '' ?>" type="text" class="form-control" id="price" name="price"
               placeholder="Enter price">
    </div>
    <div class="form-group m-2">
        <label for="description">description</label>
        <textarea class="form-control" id="description" name="description"
                  placeholder="Enter description"> <?= $products->description ?? '' ?></textarea>
    </div>
    <div class="form-group m-2">
        <label for="category">Category</label>
        <select class="form-control" id="category" name="category_id">
            <option selected disabled hidden>select Category</option>
            <?php if (isset($categories)) {
                foreach ($categories as $category) { ?>
                    <option value="<?= $category->id ?>"<?= $products->category_id == $category->id ? 'selected' : '' ?>><?= $category->Name ?></option>
                <?php }
            } ?>

        </select>
    </div>
    <div class="form-group m-2">
        <label for="Image">Image</label> <br>
        <img style="width: 50px; height: 50px; border-radius: 50%;" src="./assets/images/<?= $products->image ?>"
             alt="">
        <br> <input type="file" class="form-control-file" id="image" name="image">
    </div>


    <button type="submit" class="btn btn-primary m-2">Submit</button>
</form>


<script src="./assets/js/jquery-3.6.0.slim.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!--<script src="assets/js/fontawesome.min.js"></script>-->
</body>

</html>












