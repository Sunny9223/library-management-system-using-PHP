<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '_dbconnect.php';
        $book = $_POST['book'];
        // $snoBook = $_POST['snoBook'];
        $author = $_POST['author'];
        $branch = $_POST['branch'];
        $quantity = $_POST['quantity'];
        if ($branch != "Choose your Branch") {
            if (!empty($_POST['book']) && !empty($_POST['author']) && !empty($_POST['quantity'])) {

            $sql = "INSERT INTO `books`(`book`, `author`, `branch`, `quantity`) VALUES ('$book', '$author', '$branch', '$quantity')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: /bookAdd.php?bookAdd=added");
            }   
            else {
                header("Location: /bookAdd.php?bookAdd=error");
            }
        }
        else{   
        header("Location: /bookAdd.php?empty=error");
        }
    }
    else {
        header("Location: /bookAdd.php?branch=error");
    }
}
?>