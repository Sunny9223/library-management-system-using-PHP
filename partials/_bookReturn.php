<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include "_dbconnect.php";
        $book = $_POST['nameEdit'];
        $registration = $_POST['registration'];
        $bookSno = $_POST['bookSnoEdit'];
        $tstamp = $_POST['tstampEdit'];
        $sql = "UPDATE `issued_books` SET `status` = '2' WHERE `issued_books`.`bookSno` = '$bookSno';";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: /issuedBook.php?returnStatus=success");
        }
    }
    ?>