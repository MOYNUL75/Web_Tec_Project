<?php
require_once 'connection.php'; // Update with the correct path to your Dbmodel file

function getGuardianIdByUsername($username)
{
    // Create a Dbmodel object
    $db = new Db();

    // Establish a database connection
    $conn = $db->createConObject();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch guardian ID by username
    $sql = "SELECT guardian_ID FROM Guardian WHERE guardian_name = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($guardian_id);

    // Fetch the result
    if ($stmt->fetch()) {
        $stmt->close();
        $db->closeCon($conn); // Close the connection
        return $guardian_id; // Return guardian ID if found
    } else {
        $stmt->close();
        $db->closeCon($conn); // Close the connection
        return null; // Return null if no username is found
    }
}


function deleteService($conn, $serviceId) {
    $deleteSql = "DELETE FROM Service WHERE id = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $serviceId);

    if ($stmt->execute()) {
        return "Service removed successfully.";
    } else {
        return "Error removing service: " . $conn->error;
    }
    $stmt->close();
}






?>