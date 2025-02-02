<?php
include_once "../model/connection.php";
session_start();

// Check if the nurse is logged in
if (!isset($_SESSION['nurse_ID'])) {
    header("Location: login.php");
    exit();
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nurse_id = $_SESSION['nurse_ID'];
    $guardian_id = $_POST['guardian_id'];
    $message = $_POST['message'];

    // Validate input
    if (empty($guardian_id) || empty($message)) {
        echo "Please fill in all fields.";
        exit();
    }

    // Insert the message into the database
    $db = new Db();
    $conn = $db->createConObject();
    $stmt = $conn->prepare("INSERT INTO messages (nurse_id, guardian_id, message) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $nurse_id, $guardian_id, $message);

    if ($stmt->execute()) {
        // Success message
        echo "<p style='color: green; font-weight: bold;'>Message sent to the guardian successfully!</p>";
    } else {
        // Error message
        echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
    }

    // Close the statement and connection
    $stmt->close();
    $db->closeCon($conn);
}
?>

<!-- Optional HTML to include a back button or further navigation -->
<p><a href="../view/nurse12.php">Go back to profile</a></p>