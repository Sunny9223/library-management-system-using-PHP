<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '_dbconnect.php';
        $book = $_POST['book'];
        $snoBook = $_POST['snoBook'];
        $author = $_POST['author'];
        $branch = $_POST['branch'];
        $quantity = $_POST['quantity']; 
        $sql = "INSERT INTO `books`(`book`, `author`, `branch`, `quantity`) VALUES ('$book', '$author', '$branch', '$quantity')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: /library/bookAdd.php?bookAdd=true");
        }
        else {
            header("Location: /library/bookAdd.php?bookAdd=false");
        }
    }
?>