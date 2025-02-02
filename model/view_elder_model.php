<?php
include "connection.php";

// Get all elders
function getAllElders() {

    $db = new Db();
    $conn = $db->createConObject();

    $query = "SELECT elder_ID, full_name, gender, Elder_dob, Phone, Address FROM Elder_Person";
    $result = $conn->query($query);

    $elders = [];
    while ($row = $result->fetch_assoc()) {
        $elders[] = $row;
    }

    $conn->close();
    return $elders;
}

// Get all nurses
function getAllNurses() {
     $db = new Db();
    $conn = $db->createConObject();

    $query = "SELECT nurse_id, Nurse_name FROM Nurse";
    $result = $conn->query($query);

    $nurses = [];
    while ($row = $result->fetch_assoc()) {
        $nurses[] = $row;
    }

    $conn->close();
    return $nurses;
}

// Function to fetch assigned nurse for an elder
function getAssignedNurse($elder_ID) {

    $db = new Db();
    $conn = $db->createConObject();

    $stmt = $conn->prepare("SELECT Nurse.Nurse_name 
                            FROM ElderPerson_Nurse 
                            JOIN Nurse ON ElderPerson_Nurse.nurse_id = Nurse.nurse_id 
                            WHERE ElderPerson_Nurse.elder_ID = ?");
    $stmt->bind_param("i", $elder_ID);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}






// Assign nurse to elder
function assignNurseToElder($elder_ID, $nurse_id) {
     $db = new Db();
    $conn = $db->createConObject();

    // Check if an assignment already exists
    $checkQuery = "SELECT * FROM ElderPerson_Nurse WHERE elder_ID = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("i", $elder_ID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update existing assignment
        $query = "UPDATE ElderPerson_Nurse SET nurse_id = ? WHERE elder_ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $nurse_id, $elder_ID);
    } else {
        // Insert new assignment
        $query = "INSERT INTO ElderPerson_Nurse (elder_ID, nurse_id) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $elder_ID, $nurse_id);
    }

    $success = $stmt->execute();
    $stmt->close();
    $conn->close();

    return $success;
}

function searchElders($searchTerm) {
    $db = new Db();
    $conn = $db->createConObject();

    $stmt = $conn->prepare("SELECT * FROM Elder_Person WHERE full_name LIKE ?");
    $likeTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("s", $likeTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    $elders = [];
    while ($row = $result->fetch_assoc()) {
        $elders[] = $row;
    }

    $stmt->close();
    $db->closeCon($conn);

    return $elders;
}







?>
