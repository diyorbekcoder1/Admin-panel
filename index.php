<?php
session_start();

if (!isset($_SESSION['is_login'])) {
    header('Location: ./login.php');
}
include './crud/connect.php';
$connect = new DB();
if ($connect) {
    $db = $connect->getConnect();
    $query = $db->query("SELECT * FROM products");


    if ($query->num_rows > 0) {
        while ($queryAll = $query->fetch_object()) {
            $products[] = $queryAll;
        }
    }

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
<marquee> WELCOME <?= $_SESSION['user']->firstname  ?>  <?= $_SESSION['user']->lastname  ?>    </marquee>
<table class="table">
    <thead>
    <tr>
        <th scope="col">№</th>
        <th scope="col">title</th>
        <th scope="col">Description</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col" class="<?=  (isset($_SESSION) && !$_SESSION['is_admin']) ? 'd-none': '' ?>">Action</th>
    </tr>
    </thead>
    <tbody>
    <div class="d-flex justify-content-between align-items-center m-1">

        <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) { ?>
            <a href="./product_create.php" class="btn btn-primary m-1">Create</a>
        <?php } ?>
        <div class="d-flex justify-content-between justify-content-center col-2">
            <a class="btn btn-danger" href="./crud/logout.php">Logout</a>
            <a class="btn btn-primary" href="./registration.php">Registration</a>

        </div>
    </div>
    <?php
    if (isset($products)) {
        foreach ($products as $key => $product) { ?>
            <tr>
                <th scope="row"><?= ++$key ?></th>
                <td><?= $product->title ?></td>
                <td><?= $product->description ?></td>
                <td><?= $product->category_id ?></td>
                <td><?= $product->price ?></td>
                <td class=" "><img style="width: 50px; height: 50px; border-radius: 50%;" src="./assets/images/<?= $product->image ?>" alt=""></td>
                <td class="<?=  (isset($_SESSION) && !$_SESSION['is_admin']) ? 'd-none': '' ?>">
                    <a href="./product_edit.php?id= <?= $product->id ?>" class="btn btn-secondary">Edit</a>
                    <a href="./crud/productDelete.php?id= <?= $product->id ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php }
    } ?>

    </tbody>
</table>

<script src="./assets/js/jquery-3.6.0.slim.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!--<script src="assets/js/fontawesome.min.js"></script>-->
</body>

</html>