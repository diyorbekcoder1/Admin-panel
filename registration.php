<?php



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


<div class="m-auto  col-5 ">
    <form class="m-5" method="POST" action="./crud/signup.php">
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Firstname</label>
            <input type="text" class="form-control" name="firstname" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Lastname</label>
            <input type="text" class="form-control" name="lastname" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary text-center col-3">Submit</button>
    </form>
</div>

<script src="./assets/js/jquery-3.6.0.slim.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!--<script src="assets/js/fontawesome.min.js"></script>-->
</body>

</html>



