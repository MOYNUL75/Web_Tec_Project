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
                        <p><strong>Availability:</strong> <span class="available-time"><?= htmlspecialchars($service['service_availability']) ?></span></p>
                       <!-- <p><strong>Status:</strong> <?//= htmlspecialchars($service['service_status']) ?></p> -->
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No services available at the moment.</p>
            <?php endif; ?>
        </div>

        <!-- Add/Remove Buttons -->
        <div class="add-remove-btns">
        <button onclick="window.location.href='service.php'">Add Service</button>
        <button>Remove Service</button>
        </div>
    </div>
</body>
</html>
