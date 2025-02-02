<?php
session_start();


$medicine_data = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Validate and collect form data
    $medicine_data['medicine_name'] = $_POST['medicine_name'] ?? '';
    if (empty($medicine_data['medicine_name'])) {
        $errors[] = "Medicine Name is required.";
    }

    $medicine_data['dosage'] = $_POST['dosage'] ?? '';
    if (empty($medicine_data['dosage'])) {
        $errors[] = "Dosage is required.";
    }

    $medicine_data['timing'] = $_POST['timing'] ?? '';
    if (empty($medicine_data['timing'])) {
        $errors[] = "Please select a timing.";
    }

    $medicine_data['duration'] = $_POST['duration'] ?? '';
    if (empty($medicine_data['duration']) || !ctype_digit($medicine_data['duration'])) {
        $errors[] = "Duration must be a valid number.";
    }

    $medicine_data['start_date'] = $_POST['start_date'] ?? '';
    if (empty($medicine_data['start_date'])) {
        $errors[] = "Start Date is required.";
    }

    $medicine_data['end_date'] = $_POST['end_date'] ?? '';
    if (empty($medicine_data['end_date'])) {
        $errors[] = "End Date is required.";
    } elseif ($medicine_data['end_date'] < $medicine_data['start_date']) {
        $errors[] = "End Date cannot be earlier than Start Date.";
    }

    $medicine_data['elder_ID'] = $_SESSION['elder_ID'] ?? '';
   
    // If no errors, insert data into the database
    if (empty($errors)) {
        require '../model/demo_medi.php'; // Include database connection
        $inserted = insertMedicineSchedule($medicine_data);

        if ($inserted) {
            echo "<h3>Medicine Information Submitted Successfully!</h3>";
        } else {
            echo "<h3>Failed to Insert Data.</h3>";
        }
    } else {
        // Display errors
        echo "<h3>Errors:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}

?>