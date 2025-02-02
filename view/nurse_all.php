<?php
include_once "../model/connection.php";
?>
<?php
include '../control/nurseall.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Nurse Profiles</title>
    <link rel="stylesheet" href="../css/nurse01.css">
    
</head>
<body>
    <div class="container">
        <h1>All Nurse Profiles</h1>

        <?php if (count($nurses) > 0): ?>
            <?php foreach ($nurses as $nurse): ?>
                <!-- Nurse Profile -->
                <div class="profile-section">
                    <h2><?= htmlspecialchars($nurse['Nurse_name']) ?></h2>
                    <div class="details-section">
                        <div class="detail">
                            <strong>Gender:</strong>
                            <p><?= htmlspecialchars($nurse['Gender']) ?></p>
                        </div>
                        <div class="detail">
                            <strong>Phone Number:</strong>
                            <p><?= htmlspecialchars($nurse['Phone']) ?></p>
                        </div>
                        <div class="detail">
                            <strong>Email:</strong>
                            <p><?= htmlspecialchars($nurse['email']) ?></p>
                        </div>
                        <div class="detail">
                            <strong>Age:</strong>
                            <p><?= htmlspecialchars($nurse['Age']) ?></p>
                        </div>
                        <div class="detail">
                            <strong>Years of Experience:</strong>
                            <p><?= htmlspecialchars($nurse['Years_experience']) ?> years</p>
                        </div>
                        <div class="detail">
                            <strong>Address:</strong>
                            <p><?= htmlspecialchars($nurse['Address']) ?>, <?= htmlspecialchars($nurse['City']) ?>, <?= htmlspecialchars($nurse['zip']) ?></p>
                        </div>
                        <div class="detail">
                            <strong>Available Days:</strong>
                            <p><?= htmlspecialchars($nurse['available_days']) ?></p>
                        </div>
                        <div class="detail">
                            <strong>Shift:</strong>
                            <p><?= htmlspecialchars($nurse['shift']) ?></p>
                        </div>
                        <div class="detail">
                            <strong>Service Type:</strong>
                            <p><?= htmlspecialchars($nurse['service_type']) ?></p>
                        </div>
                        <div class="detail">
                            <strong>Created At:</strong>
                            <p><?= htmlspecialchars($nurse['created_at']) ?></p>
                        </div>
                        <div class="detail">
                            <strong>Updated At:</strong>
                            <p><?= htmlspecialchars($nurse['updated_at']) ?></p>
                        </div>
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No nurses found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
