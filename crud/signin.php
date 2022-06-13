<?php
session_start();
include './connect.php';
$connect = new DB();
if ($connect) {
    $db = $connect->getConnect();
    $query = $db->query("SELECT * FROM users");
    if ($query->num_rows > 0) {
        while ($queryAll = $query->fetch_object()) {
            $users[] = $queryAll;
        }
    }

    if (isset($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $db->query("SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1");
        if ($query->num_rows > 0) {
            while ($queryAll = $query->fetch_object()) {
                $user[] = $queryAll;
            }
        }
        if (isset($user)) {
            $user = $user[0];
            $_SESSION['is_login'] = true;
            $_SESSION['is_admin'] = $user->is_admin == 1;
            $_SESSION['user'] = $user;

            header('Location: ../index.php');
        }


    }
}




