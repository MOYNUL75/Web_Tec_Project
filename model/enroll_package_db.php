<?php
include_once "../model/connection.php"; // Include your database connection model
      
function getElderByGuardian($guardian_ID) {
    $db = new Db(); // Use your database connection class
    $conn = $db->createConObject();

    $query = "SELECT elder_ID FROM elder_person WHERE guardian_ID = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        $db->closeCon($conn);
        return null; // Return null if query preparation fails
    }

    $stmt->bind_param("i", $guardian_ID);
    $stmt->execute();
    $result = $stmt->get_result();

    $elder_ID = null;
    if ($row = $result->fetch_assoc()) {
        $elder_ID = (int) $row['elder_ID']; // Store the elder ID
    }

    $stmt->close();
    $db->closeCon($conn);

    return $elder_ID; // Return elder ID or null if not found
}


function getGuardianByAccount($account_ID) {
    $db = new Db(); // Use your database connection class
    $conn = $db->createConObject();

    $query = "SELECT guardian_ID FROM guardian WHERE account_ID = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        $db->closeCon($conn);
        return null; // Return null if query preparation fails
    }

    $stmt->bind_param("i", $account_ID);
    $stmt->execute();
    $result = $stmt->get_result();

    $guardian_ID = null;
    if ($row = $result->fetch_assoc()) {
        $guardian_ID = (int) $row['guardian_ID']; // Store the elder ID
    }

    $stmt->close();
    $db->closeCon($conn);

    return $guardian_ID; // Return elder ID or null if not found
}










function insertServiceUser($serviceID, $elderID, $guardianID) {
    $db = new Db();
    $conn = $db->createConObject();

    $stmt = $conn->prepare("
        INSERT INTO Service_User (service_ID, elder_ID, guardian_ID)
        VALUES (?, ?, ?)
    ");

    if ($stmt === false) {
        $db->closeCon($conn);
        return "Error preparing statement: " . $conn->error;
    }

    $stmt->bind_param("iii", $serviceID, $elderID, $guardianID);

    if ($stmt->execute()) {
        $stmt->close();
        $db->closeCon($conn);
        return true;
    } else {
        $error = $stmt->error;
        $stmt->close();
        $db->closeCon($conn);
        return "Error executing query: " . $error;
    }
}


function insertPayment($paymentData) {
    $db = new Db();
    $conn = $db->createConObject();

    $query = "INSERT INTO Payment (payment_amount, payment_date, payment_method, guardian_ID, service_ID, transaction_ID, status) 
              VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    
    if ($stmt === false) {
        die("Error preparing query: " . $conn->error);
    }

    $stmt->bind_param(
        "dssiiis", 
        $paymentData['payment_amount'], 
        $paymentData['payment_date'], 
        $paymentData['payment_method'], 
        $paymentData['guardian_ID'], 
        $paymentData['service_ID'], 
        $paymentData['transaction_ID'], 
        $paymentData['status']
    );

    $success = $stmt->execute();

    $stmt->close();
    $conn->close();

    return $success;
}
?>
