<?php
include_once "../model/connection.php";
session_start();
 
function fetchNurse($account_ID) {
    if (!isset($_SESSION['user_id']) || !is_numeric($_SESSION['user_id'])) return null;
 
    $db = new Db();
    $conn = $db->createConObject();
    $stmt = $conn->prepare("SELECT * FROM Nurse WHERE account_ID = ?");
    $stmt->bind_param("i", $account_ID);
    $stmt->execute();
    $result = $stmt->get_result();
   
    $nurse = $result->fetch_assoc();
    $stmt->close();
    $db->closeCon($conn);
   
    return $nurse;
}
 
$nurse = fetchNurse($_SESSION['user_id']);
$_SESSION['nurse_ID'] = $nurse['nurse_id'];
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse Dashboard</title>
    <link rel="stylesheet" href="../css/nurse_update.css">
</head>
<body>
<div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Dashboard</h2>
            <div class="button-container">
                <button onclick="location.href='nurse12.php'">Profile</button>
                <button onclick="location.href='nurse_elder.php'">Appointments</button>
                <button onclick="location.href='nurse_messages.php'">Messages</button>
                <button onclick="location.href='nurse_update.php'">Update Info</button>
                <button onclick="location.href='../control/logout.php'">Logout</button>
            </div>
        </aside>
 
<main class="main-content">
 
 <header>
     <h1>Update Your Information</h1>
 </header>
 <section class="update-form">
     <form action="../model/nurse_update_mod.php" method="POST">
         <label>Name:</label>
         <input type="text" name="Nurse_name" value="<?= htmlspecialchars($nurse['Nurse_name']) ?>" required>

         <label>Phone:</label>
         <input type="text" name="Phone" value="<?= htmlspecialchars($nurse['Phone']) ?>" required>

         <label>Email:</label>
         <input type="email" name="email" value="<?= htmlspecialchars($nurse['email']) ?>" required>

         <label>Address:</label>
         <input type="text" name="Address" value="<?= htmlspecialchars($nurse['Address']) ?>" required>

         <label>City:</label>
         <input type="text" name="City" value="<?= htmlspecialchars($nurse['City']) ?>" required>

         <label>ZIP Code:</label>
         <input type="text" name="zip" value="<?= htmlspecialchars($nurse['zip']) ?>" required>

         <label>Available Days:</label>
         <input type="text" name="available_days" value="<?= htmlspecialchars($nurse['available_days']) ?>" required>

         <label>Shift:</label>
         <input type="text" name="shift" value="<?= htmlspecialchars($nurse['shift']) ?>" required>

         <input type="hidden" name="nurse_id" value="<?= $nurse['nurse_id'] ?>">

         <button type="submit">Update Info</button>
     </form>
 </section>
</main>
</div>
</body>
</html>
