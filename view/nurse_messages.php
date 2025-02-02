<?php
include_once "../model/connection.php";
session_start();

// Check if the nurse is logged in
if (!isset($_SESSION['nurse_ID'])) {
    header("Location: login.php");
    exit();
}

// Function to fetch guardians
function fetchGuardians() {
    $db = new Db();
    $conn = $db->createConObject();
    
    // Corrected query to fetch the correct columns from Guardian table
    $stmt = $conn->prepare("SELECT guardian_ID, guardian_name FROM Guardian");
    $stmt->execute();
    $result = $stmt->get_result();
    
    $guardians = [];
    while ($row = $result->fetch_assoc()) {
        $guardians[] = $row;
    }
    
    $stmt->close();
    $db->closeCon($conn);
    
    return $guardians;
}

$guardians = fetchGuardians();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message to Guardian</title>
    <link rel="stylesheet" href="../css/message_form.css">
</head>
<body>
    <div class="message-form-container">
        <h2>Send Message to Guardian</h2>
        <form method="POST" action="../model/send_message.php">
            <label for="guardian_id">Select Guardian:</label>
            <select name="guardian_id" required>
                <option value="">-- Select Guardian --</option>
                <?php foreach ($guardians as $guardian): ?>
                    <option value="<?= htmlspecialchars($guardian['guardian_ID']) ?>"><?= htmlspecialchars($guardian['guardian_name']) ?></option>
                <?php endforeach; ?>
            </select>
            
            <label for="message">Message:</label>
            <textarea name="message" required></textarea>
            
            <button type="submit">Send Message</button>
        </form>
    </div>
</body>
</html>
