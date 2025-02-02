<?php
// Retrieve elder_ID from cookie (assuming it's stored in a cookie)
if (!isset($_SESSION['user_id'])) {
    echo "Elder ID not found. Please log in.";
    exit;
}

$account_ID = $_SESSION['user_id'];
$user = $_SESSION['username'];


include "../model/connection.php";
$db = new Db();
    // Establish a database connection
$conn = $db->createConObject();


$sql = "SELECT elder_ID 
        FROM Elder_person 
        WHERE account_ID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $account_ID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $elder_ID = (int) $row['elder_ID'];}


// Query to fetch medical information for the specific elder
$sql = "SELECT 
            BMI, sugar_level, height, weight, blood_pressure, 
            vaccinations, medical_conditions, blood_group, diabetics, 
            temperature, recommendation, created_at, updated_at 
        FROM Medical_Info 
        WHERE elder_ID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $elder_ID);
$stmt->execute();
$result = $stmt->get_result();

$medical_info = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>