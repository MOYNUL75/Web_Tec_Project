<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Validate Guardian ID (only numbers)
    $guardian_ID = $_POST['guardian_ID'];
    if (!preg_match("/^[0-9]+$/", $guardian_ID)) {
        $errors[] = "Guardian ID must contain only numbers.";
    }

    // Validate Account ID (only numbers)
    $account_ID = $_POST['account_ID'];
    if (!preg_match("/^[0-9]+$/", $account_ID)) {
        $errors[] = "Account ID must contain only numbers.";
    }

    // Validate Guardian Name (no numbers)
    $guardian_name = trim($_POST['guardian_name']);
    if (empty($guardian_name) || preg_match("/[0-9]/", $guardian_name)) {
        $errors[] = "Guardian Name cannot contain numbers and must not be empty.";
    }

    // Validate Password (at least 6 characters, contains alphabets, numbers, and special characters)
    $password = $_POST['password'];
    if (strlen($password) < 6 || 
        !preg_match("/[A-Za-z]/", $password) || 
        !preg_match("/\d/", $password) || 
        !preg_match("/[@$!%*#?&]/", $password)) {
        $errors[] = "Password must be at least 6 characters long and include alphabets, numbers, and special characters.";
    }

    // Validate Email (must be a Gmail address)
    $email = $_POST['email'];
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $email)) {
        $errors[] = "Email must be a valid Gmail address.";
    }

    // Validate Phone (must start with 0 and have at least 10 digits)
    $phone = trim($_POST['phone']);
    if (!preg_match("/^0[0-9]{9,}$/", $phone)) {
        $errors[] = "Phone number must start with 0 and contain at least 10 digits.";
    }

    // Validate Emergency Contact (cannot be empty)
    $emergency_contact = trim($_POST['emergency_contact']);
    if (empty($emergency_contact)) {
        $errors[] = "Emergency Contact cannot be empty.";
    }

    // Validate Address (cannot be empty)
    $address = trim($_POST['address']);
    if (empty($address)) {
        $errors[] = "Address cannot be empty.";
    }

    // Validate City (must be a valid selection)
    $allowed_cities = ['City 1', 'City 2', 'City 3'];
    if (!in_array($_POST['city'], $allowed_cities)) {
        $errors[] = "Invalid city selection.";
    }

    // Validate Relation (must be a valid option)
    $allowed_relations = ['Son', 'Daughter', 'Other'];
    if (!in_array($_POST['relation'], $allowed_relations)) {
        $errors[] = "Invalid relation selection.";
    }

    // Check if all validations passed
    if (empty($errors)) {
        echo "<h2>Registration Successful!</h2>";
        echo "<h3>Provided Information:</h3>";
        echo "<p><strong>Guardian ID:</strong> $guardian_ID</p>";
        echo "<p><strong>Account ID:</strong> $account_ID</p>";
        echo "<p><strong>Guardian Name:</strong> $guardian_name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Phone:</strong> $phone</p>";
        echo "<p><strong>Emergency Contact:</strong> $emergency_contact</p>";
        echo "<p><strong>Address:</strong> $address</p>";
        echo "<p><strong>City:</strong> " . $_POST['city'] . "</p>";
        echo "<p><strong>Relation:</strong> " . $_POST['relation'] . "</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>
