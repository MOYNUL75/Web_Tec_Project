<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Count Dashboard</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="../css/admin_count01.css">
</head>
<body>
    <div class="container">
        <h1>Count Dashboard</h1>

        <!-- Count Section -->
        <div class="count-section">
            <!-- Nurse Count -->
            <div class="count-card">
                <img src="../image/nurse.png" alt="Available Nurse Icon">
                <h3>Available Nurses</h3>
                <p>5</p> <!-- Replace with dynamic count -->
                <button onclick="window.location.href='nurse_all.php'">View Nurses</button>
                
            </div>

            <!-- Patient Count -->
            <div class="count-card">
                <img src="../image/elder_person.png" alt="Available Patients Icon">
                <h3>Available Patients</h3>
                <p>20</p> <!-- Replace with dynamic count -->  
                <button onclick="window.location.href='view_elder.php'">View Patients</button>
            </div>

            <!-- Package Count -->
            <div class="count-card">
                <img src="../image/package.png" alt="Available Packages Icon">
                <h3>Available Packages</h3>
                <p>3</p> <!-- Replace with dynamic count -->
                <button onclick="window.location.href='available_packages01.php'">View Packages</button>
            </div>
        </div>
    </div>
</body>
</html>
