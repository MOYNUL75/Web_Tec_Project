<?php include "../control/account_validation.php" ; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="../css/account_create.css">
</head>
<body>
    <div class="form-container">
        <h1>Create Account</h1>
        <form action="" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="account_type">Account Type</label>
            <select id="account_type" name="account_type" required>
                <option value="">Select an account type</option>
                <option value="Elder">Elder</option>
                <option value="Guardian">Guardian</option>
                <option value="Nurse">Nurse</option>
                <option value="Admin">Admin</option>
            </select>

            <button type="submit">Create Account</button>
        </form>
    </div>
</body>
</html>
