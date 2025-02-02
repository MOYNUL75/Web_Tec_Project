<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elder_care_monitoring_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $account_type = $_SESSION['account_type'];



    if (empty($username) || empty($password) || empty($account_type)) {
        echo "<h3 style='color: red;'>All fields are required!</h3>";
        exit;
    }

    // Prepare query to fetch user with the correct account type
    $sql = "SELECT * FROM Account_cteate WHERE username = ? AND account_type = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $account_type);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        echo  $user['account_ID']."  ".$user['username']."  ".$user['account_type']."  ".$user['password'];

        // Verify password
        if ($password === $user['password']) {
            // Start a session for the logged-in user
            $_SESSION['user_id'] = $user['account_ID'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['account_type'] = $user['account_type'];

            // Redirect based on account type
            switch ($user['account_type']) {
                case 'Elder':
                    header("Location: ../view/elder_deshboardMain.php");
                    break;
                case 'Guardian':
                    header("Location: ../view/guardian_dashboard.php");
                    break;
                case 'Nurse':
                    header("Location: ../view/nurse12.php");
                    break;
                case 'Admin':
                    header("Location: ../view/admin_count01.php");
                    break;
                default:
                    echo "<h3 style='color: red;'>Invalid account type.</h3>";
                    exit;
            }
        } else {
            echo "<h3 style='color: red;'>Invalid password!</h3>";
        }
    } else {
        echo "<h3 style='color: red;'>No account found with this username and account type!</h3>";
    }

    $stmt->close();
}

$conn->close();
?>
