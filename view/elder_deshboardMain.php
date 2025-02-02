<?php
include_once "../model/connection.php";
session_start();
 
function fetchElder($account_ID) {
    if (!isset($_SESSION['user_id']) || !is_numeric($_SESSION['user_id'])) return null;
 
    $db = new Db();
    $conn = $db->createConObject();
    $stmt = $conn->prepare("SELECT * FROM Elder_Person WHERE account_ID = ? LIMIT 1");
    $stmt->bind_param("i", $account_ID);
    $stmt->execute();
    $result = $stmt->get_result();
   
    $elder = $result->fetch_assoc();
    $stmt->close();
    $db->closeCon($conn);
   
    return $elder;
}
 
// Fetch elder info
$elder = fetchElder($_SESSION['user_id']);
$_SESSION['elder_ID'] = $elder['elder_ID'];


// Fetch medicine schedule
$medicineQuery = "SELECT * FROM Medicine_Schedule WHERE elder_ID = ? ORDER BY medicine_name ASC";
$db = new Db();
$conn = $db->createConObject();
$stmt = $conn->prepare($medicineQuery);
$stmt->bind_param("i", $elder['elder_ID']);
$stmt->execute();
$medicineResult = $stmt->get_result();
$stmt->close();
$db->closeCon($conn);
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
    <a href="../view/elder_Medicalinfo.php">
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
        <a href="../view/medicine_schedule.php">
            <button type="button">Medication Schedule</button>
        </a>
        <a href='../control/logout.php'>
            <button>Log Out</button>
        </a>
    </div>

    <div class="content">
        
        <header>
            <h2 id="greeting"></h2>
            <h1>Welcome, <?= htmlspecialchars($elder['full_name']) ?>!</h1>
        </header>

        <!-- Profile Card -->
        <div class="profile-card">

            <div class="profile-header">
             <!--<img src="../images/profile_placeholder.png" alt="Profile Picture" class="profile-image">             -->
                <h2><?= htmlspecialchars($elder['full_name']) ?></h2>
                <p class="sub-text">Mobility: <?= htmlspecialchars($elder['mobility']) ?></p>
            </div>

            <div class="profile-details">
                <div class="detail">
                    <i class="fas fa-user"></i>
                    <div class="info">
                        <span class="label">Gender</span>
                        <span class="value"><?= htmlspecialchars($elder['gender']) ?></span>
                    </div>
                </div>

                <div class="detail">
                    <i class="fas fa-birthday-cake"></i>
                    <div class="info">
                        <span class="label">Age</span>
                        <span class="value"><?= date_diff(date_create($elder['Elder_dob']), date_create('today'))->y ?> years</span>
                    </div>
                </div>

                <div class="detail">
                    <i class="fas fa-phone-alt"></i>
                    <div class="info">
                        <span class="label">Phone</span>
                        <span class="value"><?= htmlspecialchars($elder['Phone']) ?></span>
                    </div>
                </div>

                <div class="detail">
                    <i class="fas fa-envelope"></i>
                    <div class="info">
                        <span class="label">Email</span>
                        <span class="value"><?= htmlspecialchars($elder['email']) ?></span>
                    </div>
                </div>

                <div class="detail">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="info">
                        <span class="label">Address</span>
                        <span class="value"><?= htmlspecialchars($elder['Address']) ?></span>
                    </div>
                </div>

                <div class="detail">
                    <i class="fas fa-user-md"></i>
                    <div class="info">
                        <span class="label">Physician Contact</span>
                        <span class="value"><?= htmlspecialchars($elder['physician_contact']) ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Medicine Schedule -->
        <h2>Medicine Schedule</h2>
        <?php if ($medicineResult->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Medicine Name</th>
                    <th>Dosage</th>
                    <th>Timing</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Duration</th>
                </tr>
                <?php while ($row = $medicineResult->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['medicine_name']) ?></td>
                        <td><?= htmlspecialchars($row['dosage']) ?></td>
                        <td><?= htmlspecialchars($row['timing']) ?></td>
                        <td><?= htmlspecialchars($row['start_date']) ?></td>
                        <td><?= htmlspecialchars($row['end_date']) ?></td>
                        <td><?= htmlspecialchars($row['duration']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No medicine schedules found.</p>
        <?php endif; ?>
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
