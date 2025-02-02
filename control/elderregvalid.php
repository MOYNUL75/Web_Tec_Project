<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Full Name validation
     if (empty($_POST['Guardian_Name']) || !preg_match("/^[a-zA-Z\s]+$/", $_POST['Guardian_Name'])) {
        $errors[] = "Guardian Name must contain only letters and spaces.";
    }
    // Email validation
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email address is required.";
    }

    // Full Name validation
    if (empty($_POST['full_name']) || !preg_match("/^[a-zA-Z\s]+$/", $_POST['full_name'])) {
        $errors[] = "Full Name must contain only letters and spaces.";
    }

    // Gender validation
    if (empty($_POST['gender'])) {
        $errors[] = "Please select your gender.";
    }

    // Date of Birth validation
    if (empty($_POST['Elder_dob'])) {
        $errors[] = "Date of Birth is required.";
    }

    // Phone number validation
    if (empty($_POST['Phone']) || !preg_match("/^[0-9]{11}$/", $_POST['Phone'])) {
        $errors[] = "Phone Number must be an 11-digit numeric value.";
    }

    // Address validation
    if (empty($_POST['Address'])) {
        $errors[] = "Address is required.";
    }

    // Mobility validation
    if (empty($_POST['mobility'])) {
        $errors[] = "Please select the mobility level.";
    }

    // Emergency contact name validation
    if (empty($_POST['emergency_contact_name']) || !preg_match("/^[a-zA-Z\s]+$/", $_POST['emergency_contact_name'])) {
        $errors[] = "Emergency Contact Name must contain only letters and spaces.";
    }

    // Emergency contact relationship validation
    if (empty($_POST['emergency_contact_relationship'])) {
        $errors[] = "Emergency Contact Relationship is required.";
    }

    // Emergency contact phone number validation
    if (empty($_POST['emergency_contact_phone']) || !preg_match("/^[0-9]{11}$/", $_POST['emergency_contact_phone'])) {
        $errors[] = "Emergency Contact Phone must be an 11-digit numeric value.";
    }

    // Primary care physician contact validation
    if (empty($_POST['physician_contact']) || !preg_match("/^[0-9]{11}$/", $_POST['physician_contact'])) {
        $errors[] = "Primary Care Physician Contact must be an 11-digit numeric value.";
    }


    // If there are no errors, save the data to a file or database
    if (empty($errors)) {

        include "../model/search_db.php";
        $guardian_ID = getGuardianIdByUsername($_POST['Guardian_Name']);

    // Check if a Guardian ID was found
    if ($guardian_ID) {
        // Prepare the data to save
        $formDataElderPerson = [
            "account_ID" => $_COOKIE["account_id"],
            "guardian_ID" => $guardian_ID,
            "Guardian_Name" => $_POST["Guardian_Name"],
            "email" => $_POST["email"],
            "full_name" => $_POST["full_name"],
            "gender" => $_POST["gender"],
            "Elder_dob" => $_POST["Elder_dob"],
            "Phone" => $_POST["Phone"],
            "Address" => $_POST["Address"],
            "mobility" => $_POST["mobility"],
            "physician_contact" => $_POST["physician_contact"],
            "emergency_contract_name" => $_POST["emergency_contact_name"],
            "emergency_contract_relationship" => $_POST["emergency_contact_relationship"],
            "emergency_contact_phone" => $_POST["emergency_contact_phone"]
        ];
        

    include "../model/table_value.php";
    $db = new Dbmodel();
    $conobj = $db->createConObject();
    $db->insertElderPerson($conobj, $formDataElderPerson);
    $db->closeCon($conobj);


    

    // // Define the file path to store the data
    // $filePath = '../data/elder_registration.json';

    // // Check if the file exists and read existing data
    // if (file_exists($filePath)) {
    //     $existingData = json_decode(file_get_contents($filePath), true);
    //     if (!$existingData) {
    //         $existingData = [];
    //     }
    // } else {
    //     $existingData = [];
    // }

    // // Add the new user data to the existing data
    // $existingData[] = $userData;

    // // Save the updated data to the JSON file
    // if (file_put_contents($filePath, json_encode($existingData, JSON_PRETTY_PRINT))) {
    //     echo "<h2>Registration Successful!</h2>";
    //     echo "<p>Your data has been saved successfully.</p>";
    // } else {
    //     echo "<h2>Registration Successful!</h2>";
    //     echo "<p>But there was an error saving the data.</p>";
    // }
    } else {
        echo "No guardian found with the name '{$_POST['Guardian_Name']}'.";
    }

    } else {
        // Display validation errors
        echo "<h3>Errors:</h3>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}
?>
