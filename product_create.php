<?php
include './crud/connect.php';
$connect = new DB();
if ($connect) {
    $db = $connect->getConnect();
    $query = $db->query("SELECT * FROM categories");


    if ($query->num_rows > 0) {
        while ($queryAll = $query->fetch_object()) {
            $categories[] = $queryAll;
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

<form class="m-5" action="./crud/productCreate.php" method="post" enctype="multipart/form-data">

    <div class="form-group m-2">
        <label for="title">Title</label>
        <input type="text"  class="form-control" id="title" name="title" placeholder="Enter title">
    </div>
    <div class="form-group m-2">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
    </div>
    <div class="form-group m-2">
        <label for="description">description</label>
        <textarea class="form-control" id="description" name="description" placeholder="Enter description"></textarea>
    </div>
    <div class="form-group m-2">
        <label for="category">Category</label>
        <select class="form-control" id="category" name="category_id">
             <option selected disabled hidden> select Category </option>
            <?php if (isset($categories)){

                foreach ($categories as $category){ ?>
                    <option value="<?= $category->id ?>"><?= $category->Name ?></option>
                <?php } 
            } ?>      
    
        </select>
    </div>
    <div class="form-group m-2">
        <label for="Image">Image</label> <br>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>


    <button type="submit" class="btn btn-primary m-2">Submit</button>
</form>


<script src="./assets/js/jquery-3.6.0.slim.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!--<script src="assets/js/fontawesome.min.js"></script>-->
</body>

</html>