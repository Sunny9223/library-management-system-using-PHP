<?php  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sno = $_POST['snoVal'];
    $registration = $_POST['registrationEdit'];
    $book = $_POST['bookEdit'];
    $bookSno = $_POST['bookSno'];
    include '_dbconnect.php';   
    if (!empty($_POST['bookSno'])) {
    $sql = "UPDATE `issued_books` SET `bookSno` = '$bookSno' WHERE `issued_books`.`sno` = $sno;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql = "UPDATE `issued_books` SET `status` = '1' WHERE `issued_books`.`sno` = '$sno';";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: /dashboard.php?issueReport=success");
        }
    }    
    else {
        header("Location: /dashboard.php?bookSno=repeat");
    }
}
else {
    header("Location: /dashboard.php?bookSno=error");
}
}
?>