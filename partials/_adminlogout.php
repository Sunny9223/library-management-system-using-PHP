<?php
    echo 'Pl wait';
    session_start();
    session_destroy();
    header("Location: /index.php?adminlogout=success");
?>