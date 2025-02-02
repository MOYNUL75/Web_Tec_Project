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
    <link rel="stylesheet" href="../css/nurse12.css">
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

        <!-- Main Content -->
        <main class="main-content">
            <header>
                <h1>Welcome, <?= $nurse ? htmlspecialchars($nurse['Nurse_name']) : "Nurse" ?>!</h1>
            </header>

            <section class="profile-card">
                <?php if ($nurse): ?>
                    <div class="profile-header">
                        <h2><?= htmlspecialchars($nurse['Nurse_name']) ?></h2>
                        <p><?= htmlspecialchars($nurse['service_type']) ?></p>
                    </div>
                    <div class="profile-details">
                        <div class="detail"><strong>Gender:</strong> <?= htmlspecialchars($nurse['Gender']) ?></div>
                        <div class="detail"><strong>Phone:</strong> <?= htmlspecialchars($nurse['Phone']) ?></div>
                        <div class="detail"><strong>Email:</strong> <?= htmlspecialchars($nurse['email']) ?></div>
                        <div class="detail"><strong>Age:</strong> <?= htmlspecialchars($nurse['Age']) ?></div>
                        <div class="detail"><strong>Experience:</strong> <?= htmlspecialchars($nurse['Years_experience']) ?> years</div>
                        <div class="detail"><strong>Address:</strong> <?= htmlspecialchars($nurse['Address']) ?>, <?= htmlspecialchars($nurse['City']) ?>, <?= htmlspecialchars($nurse['zip']) ?></div>
                        <div class="detail"><strong>Available Days:</strong> <?= htmlspecialchars($nurse['available_days']) ?></div>
                        <div class="detail"><strong>Shift:</strong> <?= htmlspecialchars($nurse['shift']) ?></div>
                    </div>
                <?php else: ?>
                    <p>No profile data found.</p>
                <?php endif; ?>
            </section>
        </main>
    </div>
</body>
</html>
