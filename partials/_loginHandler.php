<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '_dbconnect.php';
        $registration = $_POST['registration'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `student_details` WHERE registration = '$registration'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
                
        }
        else {
            echo "error";
        }
    }
?>