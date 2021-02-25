<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $registration = $_POST['registration'];
    $name = $_POST['nameEdit'];
    $author = $_POST['authorEdit'];
    $quantity = $_POST['quantityEdit'];
    if ($quantity > 0) {
        include '_dbconnect.php';
        $amount = $quantity - 1;
        $changeSQL = "UPDATE `books` SET `quantity` = '$amount' WHERE `books`.`book`= '$name' AND `books`.`author`='$author'";
        $changeResult = mysqli_query($conn, $changeSQL);
        if ($changeResult) {
            $check = "SELECT * FROM `issued_books` WHERE `registration`='$registration'";
            $result = mysqli_query($conn, $check);
            $row = mysqli_num_rows($result);
            if ($row > 3) {
                header("Location: /bookList.php?getBook=error");
            }
            else{
            $sql = "INSERT INTO `issued_books`(`registration`, `name`, `status`) VALUES ('$registration', '$name', '0')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: /bookList.php?getBook=success");
            }
        }
        }
    }
    else if ($quantity == 0) {
        header("Location: /bookList.php?getBook=notAvailable");
    }
}