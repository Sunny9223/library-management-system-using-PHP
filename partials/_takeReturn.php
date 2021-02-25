<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "_dbconnect.php";
    echo $registration = $_POST['registrationEdit'];
    echo $book = $_POST['bookEdit'];
    echo $bookSno = $_POST['bookSnoEdit'];
    $fetchSQL = "SELECT * FROM `books` WHERE `book`='$book'";
    $fetchResult = mysqli_query($conn, $fetchSQL);
    if ($fetchResult) {
        $row = mysqli_fetch_assoc($fetchResult);
        $quantity = $row['quantity'];
        $amount = $quantity + 1;
        $sql = "UPDATE `books` SET `quantity` = '$amount' WHERE `books`.`book` = '$book';";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $sql = "DELETE FROM `issued_books` WHERE `issued_books`.`bookSno` = '$bookSno'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: /library/returnBook.php?success=success");
            }
            else {
                header("Location: /library/returnBook.php?success=error");
            }
        }
    }
}

?>