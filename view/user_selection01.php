<?php
include '..\control\user_selection01_valid.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Selection</title>
    <link rel="stylesheet" href="../css/user_selection01.css">
</head>
<body>
    <div class="user-selection">
        <h1>USER SELECTION</h1>
        <form method="POST">
            <div class="user-grid">
                <!-- Elder Card -->
                <div class="user-card">
                    <img src="../image/elder_person.png" alt="Elder Icon">
                    <button type="submit" name="account_type" value="elder">Elder</button>
                </div>

                <!-- Guardian Card -->
                <div class="user-card">
                    <img src="../image/guardian.png" alt="Guardian Icon">
                    <button type="submit" name="account_type" value="guardian">Guardian</button>
                </div>

                <!-- Admin Card -->
                <div class="user-card">
                    <img src="../image/admin.png" alt="Admin Icon">
                    <button type="submit" name="account_type" value="admin">Admin</button>
                </div>

                <!-- Nurse Card -->
                <div class="user-card">
                    <img src="../image/nurse.png" alt="Nurse Icon">
                    <button type="submit" name="account_type" value="nurse">Nurse</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
