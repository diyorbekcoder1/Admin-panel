<?php
include './connect.php';
$connect = new DB();
if ($connect) {
    $db = $connect->getConnect();
    if (isset($_POST)) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $queryProduct = $db->query("SELECT image FROM products where id = " . $id . " LIMIT 1");
        if ($queryProduct->num_rows > 0) {
            while ($queryAll = $queryProduct->fetch_object()) {
                $products[] = $queryAll;
            }
        }
        $product = $products[0];
        /*create product*/

        if (isset($_FILES['image']) && $_FILES['image']['name'] != null && $_FILES['image']['size'] != 0) {
            $image = $_FILES['image'];
            $image_name = $image['name'];
            $folder = '../assets/images/';
            $path = $folder . $image['name'];
            $oldpath = $folder . $product->image;
            if (file_exists($oldpath)) {
                unlink($oldpath) or die("Couldn't delete file");
            }

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
                                            $query = $db->query("UPDATE products SET title = '$title', price = '$price', description = '$description', image = '$image_name', category_id = '$category_id' WHERE id = '$id'");
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
        } else {
            if (isset($title)) {
                if (isset($description)) {
                    if (isset($price)) {
                        if (isset($category_id)) {
                            $query = $db->query("Update products SET title='$title', price='$price', description='$description', category_id='$category_id' WHERE id='$id'");
                            if ($query) {

                                echo '<script>alert("Product updated")</script>';
                                header('Location: ../index.php');
                            } else {
                                echo '<script>alert("Product not updated!")</script>';
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
    echo '<script>alert("db Connection Error!")</script>';
}


?>