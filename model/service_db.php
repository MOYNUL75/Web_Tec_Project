<?php
require_once 'connection.php'; // Update with the correct path to your Dbmodel file




// Fetch all services from the database
function fetchServices() {
    $db = new Db();
    $conn = $db->createConObject();

    $sql = "SELECT service_ID, service_name, details, service_category, service_charge, service_duration, service_availability, service_status FROM Service";
    $result = $conn->query($sql);

    $services = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $services[] = $row;
        }
    }
    return $services;
    $conn->close();
}

function ElderServices($elder_ID) {
    $db = new Db();
    $conn = $db->createConObject();
    
    $sql = "SELECT service_ID
    FROM service_user
    WHERE elder_ID = $elder_ID";
    $result = $conn->query($sql);

    $services = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $services[] = $row;
        }
    }
    return $services;
    $conn->close();
}

function ElderServicesInfo($service_ID)
{
    $db = new Db();
    $conn = $db->createConObject();

    $sql = "SELECT service_ID, service_name, details, service_category, service_charge, service_duration, service_availability, service_status 
            FROM Service 
            WHERE service_ID = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $service_ID);
    $stmt->execute();
    $result = $stmt->get_result();

    $service = $result->fetch_assoc(); // Fetch single row

    $stmt->close();
    $conn->close();

    return $service; // Return single service as an associative array
}










?>
