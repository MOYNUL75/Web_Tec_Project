<?php
session_start();
session_destroy(); // Destroy the session
header("Location: ../view/home.php"); // Redirect to login page
exit();
?>