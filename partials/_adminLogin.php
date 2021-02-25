<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '_dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `admin_details` WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['admin'] = true;
            $_SESSION['dashboard'] = true;
            $_SESSION['username'] = $username;
            header("Location: /dashboard.php");
        } else {
            header("Location: /index.php?adminPass=false");
        }
    }
}
