<?php
include './connect.php';
$connect = new DB();
if ($connect) { 
    $db = $connect->getConnect();
    if (isset($_POST)) {
        $title = $_POST['title'] == '' ? null : $_POST['title'];
        $price = $_POST['price'] == '' ? null : $_POST['price'];
        $description = $_POST['description'] == '' ? null : $_POST['description'];
        $category_id = $_POST['category_id'] == '' ? null : $_POST['category_id'];
        /*create product*/
        if (isset($_FILES['image']) && $_FILES['image']['name'] != null && $_FILES['image']['size'] != 0) {
            $image = $_FILES['image'];
            $image_name = $image['name'];
            $folder = '../assets/images/';
            $path = $folder . $image['name'];
            if (file_exists($path)) {
                unlink($path); 
            } else {
                if ($image['size'] > 5000000) {
                    echo '<script>alert("File size is too big!")</script>';
                } else {
                    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif' || $ext == 'bmp') {
                        $image_name = uniqid() . '.' . $ext;
                       
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $folder . $image_name)) {
                            if (isset($title)) {
                                if (isset($description)) {
                                    if (isset($price)) {

                                        if (isset($category_id)) {
                                            $query = $db->query("INSERT INTO products (title, price, description, image, category_id) 
                                                                    VALUES ('$title', '$price', '$description', '$image_name', '$category_id')");
                                            if ($query) {

                                                echo '<script>alert("Product created!")</script>';
                                                header('Location: ../index.php');
                                            } else {
                                                echo '<script>alert("Product not created!")</script>';
                                            }
                                        } else {
                                            echo '<script>alert("Please select category!")</script>';
                                        }  

                                    } else {
                                        echo '<script>alert("Enter price!")</script>';
                                    }
                                } else {
                                    echo '<script>alert("Enter description!")</script>';
                                }
                            } else {
                                echo '<script>alert("Please enter title!")</script>';
                            }
                        }































                    } else {
                        echo '<script>alert("Error!")</script>';
                    }
                }
            }
        }
        else{
            echo '<script>alert("Please select image!")</script>';
        }

    }

} else {
    echo '<script>alert("db Connection Error!")</script>';
}


?>