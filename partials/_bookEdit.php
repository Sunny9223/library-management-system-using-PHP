<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "_dbconnect.php";
    $sno = $_POST['snoVal'];
    $book = $_POST['nameEdit'];
    $bookVal = $_POST['bookVal'];
    echo $book . "<br>";
    echo $bookVal . "<br>";
    $author = $_POST['authorEdit'];
    $quantity = $_POST['quantityEdit'];
    $sql = "UPDATE `issued_books` SET `name` = '$book' WHERE `name` = '$bookVal'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql = "UPDATE `books` SET `book` = '$book' WHERE `books`.`sno` = '$sno';";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $sql = "UPDATE `books` SET `author` = '$author' WHERE `books`.`sno` = '$sno';";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $sql = "UPDATE `books` SET `quantity` = '$quantity' WHERE `books`.`sno` = '$sno';";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("Location: /bookDetails.php?edit=success");
                }
            }
        }
        } else {
        echo mysqli_error($conn);
    }
    
}