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

$nurse = fetchNurse( $_SESSION['user_id']);
$_SESSION['nurse_ID']=    $nurse['nurse_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse Dashboard</title>
    <link rel="stylesheet" href="../css/nurse_dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Dashboard</h2>
            <div>
    <button onclick="location.href='../nurse_deshboard.php'">Profile</button>
    <button onclick="location.href='nurse_elder.php'">Appointments</button>
    <button onclick="location.href='#'">Messages</button>
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
                        <div class="profile-details">
    <div class="detail">
        <i class="fas fa-user"></i>
        <span><strong>Gender:</strong> <?= htmlspecialchars($nurse['Gender']) ?></span>
    </div>
    <div class="detail">
        <i class="fas fa-phone-alt"></i>
        <span><strong>Phone:</strong> <?= htmlspecialchars($nurse['Phone']) ?></span>
    </div>
    <div class="detail">
        <i class="fas fa-envelope"></i>
        <span><strong>Email:</strong> <?= htmlspecialchars($nurse['email']) ?></span>
    </div>
    <div class="detail">
        <i class="fas fa-birthday-cake"></i>
        <span><strong>Age:</strong> <?= htmlspecialchars($nurse['Age']) ?></span>
    </div>
    <div class="detail">
        <i class="fas fa-briefcase-medical"></i>
        <span><strong>Experience:</strong> <?= htmlspecialchars($nurse['Years_experience']) ?> years</span>
    </div>
    <div class="detail">
        <i class="fas fa-map-marker-alt"></i>
        <span><strong>Address:</strong> <?= htmlspecialchars($nurse['Address']) ?>, <?= htmlspecialchars($nurse['City']) ?>, <?= htmlspecialchars($nurse['zip']) ?></span>
    </div>
    <div class="detail">
        <i class="fas fa-calendar-alt"></i>
        <span><strong>Available Days:</strong> <?= htmlspecialchars($nurse['available_days']) ?></span>
    </div>
    <div class="detail">
        <i class="fas fa-clock"></i>
        <span><strong>Shift:</strong> <?= htmlspecialchars($nurse['shift']) ?></span>
    </div>
</div>

                <?php else: ?>
                    <p>No profile data found.</p>
                <?php endif; ?>
            </section>
        </main>
    </div>
</body>
</html>
