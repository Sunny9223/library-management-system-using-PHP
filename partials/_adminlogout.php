<?php
    echo 'Pl wait';
    session_start();
    session_destroy();
    header("Location: /library/index.php?adminlogout=success");
?>