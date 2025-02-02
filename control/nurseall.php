<?php
// Fetch Nurse Data
function fetchAllNurses() {
    $db = new Db();
    $conn = $db->createConObject();

    $query = "SELECT * FROM Nurse";
    $result = $conn->query($query);

    $nurses = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nurses[] = $row;
        }
    }

    $db->closeCon($conn);
    return $nurses;
}

// Fetch all nurse data
$nurses = fetchAllNurses();
?>