<?php
include_once "../model/connection.php";
session_start();

if (!isset($_POST['nurse_id']) || !isset($_SESSION['user_id'])) {
    header("Location: nurse_update.php");
    exit();
}

$db = new Db();
$conn = $db->createConObject();

$stmt = $conn->prepare("UPDATE Nurse SET Nurse_name=?, Phone=?, email=?, Address=?, City=?, zip=?, available_days=?, shift=? WHERE nurse_id=?");
$stmt->bind_param("ssssssssi",
    $_POST['Nurse_name'],
    $_POST['Phone'],
    $_POST['email'],
    $_POST['Address'],
    $_POST['City'],
    $_POST['zip'],
    $_POST['available_days'],
    $_POST['shift'],
    $_POST['nurse_id']
);

if ($stmt->execute()) {
    $_SESSION['success_message'] = "Profile updated successfully!";
} else {
    $_SESSION['error_message'] = "Error updating profile!";
}

$stmt->close();
$db->closeCon($conn);
header("Location: ../view/nurse12.php");
exit();
?>
