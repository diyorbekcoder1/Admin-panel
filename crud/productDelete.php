<?php
include './connect.php';
$connect = new DB();
if ($connect){
    $db = $connect->getConnect();
    if (isset($_GET) && isset($_GET['id'])) {
        $id = $_GET['id'];
        $queryProduct = $db->query("SELECT image FROM products where id = " . $id . " LIMIT 1");
        if ($queryProduct->num_rows > 0) {
            while ($queryAll = $queryProduct->fetch_object()) {
                $products[] = $queryAll;
            }
        }
        $product = $products[0];
        if ($product->image != null) {
            $oldpath = '../assets/images/' . $product->image;
            if (file_exists($oldpath)) {
                unlink($oldpath) or die("Couldn't delete file");
            }
        }
        $query = $db->query("DELETE FROM products WHERE id=".$id);
        if ($query) {
            echo '<script>alert("Product deleted!")</script>';
            header('Location: ../index.php');
        }
        else {
            echo '<script>alert("Product not deleted!")</script>';
        }

    }
}

?>