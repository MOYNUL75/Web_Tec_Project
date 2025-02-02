<?php
session_start();
include "../model/connection.php";
$db = new Db();
    // Establish a database connection
$conn = $db->createConObject();

$elder_ID = $_SESSION['elder_ID'];
$elder_Name= $_SESSION['full_name'] ;


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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elder Dashboard - Medical Information</title>
    <link rel="stylesheet" href="../css/medicalinfo.css">
</head>
<body>
    <div class="medical-info">
        <h2>Medical Information For  <?php echo $elder_Name ; ?> </h2>
        <?php if ($medical_info): ?>
            <p><span class="highlight">BMI:</span> <?php echo htmlspecialchars($medical_info['BMI']); ?></p>
            <p><span class="highlight">Sugar Level:</span> <?php echo htmlspecialchars($medical_info['sugar_level']); ?></p>
            <p><span class="highlight">Height:</span> <?php echo htmlspecialchars($medical_info['height']); ?> cm</p>
            <p><span class="highlight">Weight:</span> <?php echo htmlspecialchars($medical_info['weight']); ?> kg</p>
            <p><span class="highlight">Blood Pressure:</span> <?php echo htmlspecialchars($medical_info['blood_pressure']); ?></p>
            <p><span class="highlight">Vaccinations:</span> <?php echo htmlspecialchars($medical_info['vaccinations']); ?></p>
            <p><span class="highlight">Medical Conditions:</span> <?php echo htmlspecialchars($medical_info['medical_conditions']); ?></p>
            <p><span class="highlight">Blood Group:</span> <?php echo htmlspecialchars($medical_info['blood_group']); ?></p>
            <p><span class="highlight">Diabetics:</span> <?php echo $medical_info['diabetics'] ? 'Yes' : 'No'; ?></p>
            <p><span class="highlight">Temperature:</span> <?php echo htmlspecialchars($medical_info['temperature']); ?>°C</p>
            <p><span class="highlight">Recommendation:</span> <?php echo htmlspecialchars($medical_info['recommendation']); ?></p>
            <p><span class="highlight">Last Updated:</span> <?php echo htmlspecialchars($medical_info['updated_at']); ?></p>
        <?php else: ?>
            <p>No medical information available for this elder.</p>
        <?php endif; ?>
    <button onclick="window.location.href='guardian_dashboard.php'">Back</button>

    </div>
</body>
</html>
