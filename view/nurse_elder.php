<?php
include_once "../model/connection.php";
session_start();

// Function to fetch assigned elders
function fetchAssignedElders($nurse_id) {
    $db = new Db();
    $conn = $db->createConObject();

    $stmt = $conn->prepare("
        SELECT ep.elder_ID, ep.full_name, ep.Phone, ep.Address 
        FROM Elder_Person ep
        JOIN ElderPerson_Nurse en ON ep.elder_ID = en.elder_ID
        WHERE en.nurse_id = ?
    ");
    $stmt->bind_param("i", $nurse_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $elders = [];
    while ($row = $result->fetch_assoc()) {
        $elders[] = $row;
    }

    $stmt->close();
    $conn->close();
    
    return $elders;
}

if (!isset($_SESSION['nurse_ID'])) {
    echo "Unauthorized Access!";
    exit;
}

$nurse_id =$_SESSION['nurse_ID'];
$elders = fetchAssignedElders($nurse_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse Dashboard</title>
    <link rel="stylesheet" href="../css/nurse_elder.css">
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
                <h1>Assigned Elders</h1>
            </header>

            <section class="elder-list">
    <!-- <h2>Assigned Elders</h2> -->

    <?php if (!empty($elders)): ?>
        <div class="elder-container">
            <?php foreach ($elders as $elder): ?>
                <div class="elder-card">
                    <div class="elder-info">
                        <h3><i class="fas fa-user"></i> <?= htmlspecialchars($elder['full_name']) ?></h3>
                        <p><i class="fas fa-phone-alt"></i> <strong>Contact:</strong> <?= htmlspecialchars($elder['Phone']) ?></p>
                        <p><i class="fas fa-map-marker-alt"></i> <strong>Address:</strong> <?= htmlspecialchars($elder['Address']) ?></p>
                    </div>
                    <div class="elder-actions">
                    <a href="medical_info.php?elder_id=<?= $elder['elder_ID'] ?>" class="update-btn">
                    <i class="fas fa-edit"></i> Update Medical Info
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No elders assigned to you.</p>
    <?php endif; ?>
</section>

        </main>
    </div>
</body>
</html>
