<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $registration = $_POST['registration'];
        $roll = $_POST['roll'];
        $phone = $_POST['phone'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $branch = $_POST['branch'];
        $session = $_POST['session-year'];
        $passwd = $_POST['password'];
        $cpasswd = $_POST['cpassword'];
        $hash = password_hash($passwd, PASSWORD_DEFAULT);
        if ($passwd == $cpasswd) {
            include '_dbconnect.php';
            $sql = "INSERT INTO `student_details`(`registration`, `roll`, `phone`, `name`, `email`, `branch`, `session`, `password`) VALUES ('$registration', '$roll', '$phone', '$name', '$email', '$branch', '$session', '$hash')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: /library/index.php?signupsuccess=true");
            }
            else {
                header("Location: /library/index.php?signuperror=user");
            }
        }
        else {
            header("Location: /library/index.php?signuperror=wpass");
        }
    }
?>