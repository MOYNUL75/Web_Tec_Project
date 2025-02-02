<?php
session_start();
$account_type = isset($_SESSION['account_type']) ? $_SESSION['account_type'] : null;

if (!$account_type) {
    header('Location: user_selection.php'); // Redirect if account type is not set
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login01.css">
    <script>
        function validateLoginForm() {
            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();
            const errorMessage = document.getElementById("errorMessage");

            errorMessage.textContent = "";

            if (!username) {
                errorMessage.textContent = "Username is required.";
                return false;
            }

            if (!password) {
                errorMessage.textContent = "Password is required.";
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h1>Login for <?php echo htmlspecialchars($account_type); ?></h1>
        <form action="../model/log_model.php" method="POST" onsubmit="return validateLoginForm()">
            <input type="hidden" name="account_type" value="<?php echo htmlspecialchars($account_type); ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
            </div>
            <div class="error-message" id="errorMessage" style="color: red; font-size: 14px;"></div>
            <div class="button-group">
                <button type="button" class="back-btn" onclick="window.location.href='user_selection01.php'">Back</button>
                <button type="submit" class="login-btn">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
