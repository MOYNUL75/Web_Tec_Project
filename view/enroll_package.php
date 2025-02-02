<?php include "../control/service_control.php"; 
$services = fetchServices();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Services</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="../css/available_packages01.css">
</head>
<body>
    <div class="container">
        <h1>Available Services</h1>

        <div class="package-list">
            <?php if (count($services) > 0): ?>
                <?php foreach ($services as $service): ?>
                    <div class="package-card">
                        <h3><?= htmlspecialchars($service['service_name']) ?></h3>
                        <p><strong>Category:</strong> <?= htmlspecialchars($service['service_category']) ?></p>
                        <p><strong>Duration:</strong> <?= htmlspecialchars($service['service_duration']) ?></p>
                        <p><strong>Price:</strong> $<?= htmlspecialchars($service['service_charge']) ?></p>
                        <p><strong>Details:</strong> <?= htmlspecialchars($service['details']) ?></p>
                        <p><strong>Available Time:</strong> <span class="available-time"><?= htmlspecialchars($service['service_availability']) ?></span></p>
    <!-- Enroll Button -->
    <form action="../control/enroll_pack_control.php" method="GET">
    <input type="hidden" name="service_id"  value="<?= htmlspecialchars($service['service_ID']) ?>">
    <button type="submit" class="enroll-button">Enroll</button>
    </form>

                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No services available at the moment.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
