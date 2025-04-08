#!/usr/local/bin/php
<?php
    session_start();
    session_unset(); // remove all session variables
    session_destroy(); // destroy the session
    header("Location: index.php");
    exit;
?>