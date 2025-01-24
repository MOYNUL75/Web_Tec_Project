<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Link to the CSS file -->
    <link rel="stylesheet" href="../css/login01.css">
</head>
<body>
    <div class="login-container">
        <h1>LOGIN</h1>
        <form>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group password">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Enter your password" required>
                <span class="toggle-password">👁</span>
            </div>
            <button type="submit" class="login-btn">LOGIN</button>
        </form>
    </div>
</body>
</html>
