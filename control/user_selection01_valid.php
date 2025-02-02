<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['account_type'])) {
        $_SESSION['account_type'] = $_POST['account_type'];
        header('Location: login01.php'); // Redirect to the login page
        exit();
    }
}
?>