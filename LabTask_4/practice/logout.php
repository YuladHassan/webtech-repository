<?php

session_start();
//require 'header.php';
if (isset($_SESSION['username'])) {
    session_destroy();
    header("location:normal.php");
    //  require 'footer.php';
} else {
    header("location:normal.php");
    // require 'footer.php';
}
