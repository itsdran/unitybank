<?php
    session_start();
    session_unset();
    session_destroy();

    echo "<script>alert('Logout successful.')</script>"; 
    echo "<script>location.href='index.php';</script>";

    //header("location:index.php");
?>