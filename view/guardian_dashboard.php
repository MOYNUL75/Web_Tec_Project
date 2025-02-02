<?php
include_once "../model/connection.php";
session_start();
 
function fetchGuardian($account_ID) {
    if (!isset($_SESSION['user_id']) || !is_numeric($_SESSION['user_id'])) return null;
 
    $db = new Db();
    $conn = $db->createConObject();
    $stmt = $conn->prepare("SELECT * FROM Guardian WHERE account_ID = ? LIMIT 1");
    $stmt->bind_param("i", $account_ID);
    $stmt->execute();
    $result = $stmt->get_result();
   
    $elder = $result->fetch_assoc();
    $stmt->close();
    $db->closeCon($conn);
   
    return $elder;
}
 
// Fetch elder info
$guardian = fetchGuardian($_SESSION['user_id']);
$guardian_ID = $guardian['guardian_ID'];

function getElderDetailsByGuardianID($guardian_ID) {
    $db = new Db();
    $conn = $db->createConObject();

    $query = "SELECT elder_ID, full_name FROM Elder_Person WHERE guardian_ID = ? ";
    
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $guardian_ID);
        $stmt->execute();
        $stmt->bind_result($elder_ID, $full_name);

        if ($stmt->fetch()) {
            $stmt->close();
            return [
                'elder_ID' => $elder_ID,
                'full_name' => $full_name
            ];
        } else {
            $stmt->close();
            return null; // Return null if no elder is found
        }
    }
    return null; // Return null in case of a query failure
}

$elder = getElderDetailsByGuardianID($guardian_ID);



$elder_ID = $elder['elder_ID'];
$elder_Name= $elder['full_name'];

$_SESSION['elder_ID'] = $elder_ID;
$_SESSION['full_name'] = $elder_Name;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elder Person Dashboard</title>
    <link rel="stylesheet" href="../css/elder_deshboard.css">
    <style>
        

    </style>
</head>
<body>

<div class="marquee">
    <div class="marquee-content">
        <span>Welcome to the Elder Care Monitoring System. Providing health and wellness monitoring for the elderly.</span>
        <span>Your one-stop solution for medical information, services, and packages.</span>
        <span>Contact us today for personalized care and support for your loved ones.</span>
    </div>
</div>

<div class="container">
    <div class="sidebar">
    <a href="../view/guardian_elder_medical.php">
        <button type="button">Medical Information</button>
        </a>
        <a href="../view/elder_services.php">
            <button type="button">Enrolled Services</button>
        </a>
        <a href="../view/enroll_package.php">
            <button type="button">Available Services</button>
        </a>
        <a href="../view/nurse_all.php">
            <button type="button">Nurse</button>
        </a>
        <a href="../view/medication_schedule01.php">
            <button type="button">Medication Schedule</button>
        </a>
        <a href="../control/logout.php">
            <button>Log Out</button>
        </a>
    </div>

    <div class="content">
        
        <header>
            <h2 id="greeting"></h2>
            <h1>Welcome, <?= htmlspecialchars($guardian['guardian_name']) ?>!</h1>
        </header>
<!-- Guardian Profile Card -->
<div class="profile-card">

    <div class="profile-header">
        <!--<img src="../images/profile_placeholder.png" alt="Profile Picture" class="profile-image">-->
        <h2><?= htmlspecialchars($guardian['guardian_name']) ?></h2>
        <p class="sub-text">Relation: <?= htmlspecialchars($guardian['relation']) ?></p>
    </div>

    <div class="profile-details">
        <div class="detail">
            <i class="fas fa-user-tie"></i>
            <div class="info">
                <span class="label">Profession</span>
                <span class="value"><?= htmlspecialchars($guardian['guardian_profession']) ?></span>
            </div>
        </div>

        <div class="detail">
            <i class="fas fa-envelope"></i>
            <div class="info">
                <span class="label">Email</span>
                <span class="value"><?= htmlspecialchars($guardian['email']) ?></span>
            </div>
        </div>

        <div class="detail">
            <i class="fas fa-map-marker-alt"></i>
            <div class="info">
                <span class="label">Address</span>
                <span class="value"><?= htmlspecialchars($guardian['address']) ?></span>
            </div>
        </div>

        <div class="detail">
            <i class="fas fa-city"></i>
            <div class="info">
                <span class="label">City</span>
                <span class="value"><?= htmlspecialchars($guardian['city']) ?></span>
            </div>
        </div>

        <div class="detail">
            <i class="fas fa-phone-alt"></i>
            <div class="info">
                <span class="label">Phone</span>
                <span class="value"><?= htmlspecialchars($guardian['phone']) ?></span>
            </div>
        </div>

        <div class="detail">
            <i class="fas fa-exclamation-triangle"></i>
            <div class="info">
                <span class="label">Emergency Contact</span>
                <span class="value"><?= htmlspecialchars($guardian['emergency_contact']) ?></span>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <p>Elder Care Monitoring System &copy; 2025</p>
</div>

<script>
    function setGreeting() {
        let hours = new Date().getHours();
        let greeting = (hours < 12) ? "Good Morning!" : (hours < 18) ? "Good Afternoon!" : "Good Evening!";
        document.getElementById("greeting").innerHTML = greeting;
    }
    setGreeting();
</script>
</body>
</html>
