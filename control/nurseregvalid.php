<?php
// nurseregvalid.php (Validation file)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    $Nurse_name = trim($_POST["Nurse_name"]);
    if (empty($Nurse_name) || strlen($Nurse_name) > 50) {
        $errors[] = "Name must be provided and should not exceed 50 characters.";
    }

    $password = $_POST["password"];
    if (strlen($password) < 6 || !preg_match('/[a-z]/', $password)) {
        $errors[] = "Password must be at least 6 characters long and contain at least one lowercase letter.";
    }

    if (!isset($_POST["Gender"])) {
        $errors[] = "Please select your Gender.";
    } else {
        $Gender = $_POST["Gender"];
    }

    $Phone = $_POST["Phone"];
    if (!preg_match('/^0[0-9]{9,}$/', $Phone)) {
        $errors[] = "Phone number must start with 0 and contain at least 10 digits.";
    }

    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    $Age = $_POST["Age"];
    if ($Age <= 0) {
        $errors[] = "Age must be a positive number.";
    }

    $nurse_id = trim($_POST["nurse_id"]);
    if (empty($nurse_id)) {
        $errors[] = "Nurse ID is required.";
    }

    $Years_experience = $_POST["Years_experience"];
    if ($Years_experience < 0) {
        $errors[] = "Years of experience cannot be negative.";
    }

    $Address = trim($_POST["Address"]);
    if (empty($Address)) {
        $errors[] = "Address is required.";
    }

    $City = $_POST["City"];
    if (empty($City)) {
        $errors[] = "Please select a City.";
    }

    if (!isset($_POST["shift"]) || empty($_POST["shift"])) {
        $errors[] = "Please select a Shift.";
    } else {
        $shift = $_POST["shift"];
    }

    if (!isset($_POST["available_days"]) || empty($_POST["available_days"])) {
        $errors[] = "Please select at least one Available Day.";
    } else {
        $available_days = $_POST["available_days"];
    }

    if (!isset($_POST["service_type"]) || empty($_POST["service_type"])) {
        $errors[] = "Please select a Service Type.";
    } else {
        $service_type = $_POST["service_type"];
    }

    if (empty($errors)) {
        // Validation successful - You would normally process the data here (e.g., database insert)
        // For this example, we'll just display a success message and the data.
        echo "<h2>Registration Successful!</h2>";
        echo "<h3>Provided Information:</h3>";
        echo "<p><strong>Full Name:</strong> $Nurse_name</p>";
        echo "<p><strong>Gender:</strong> $Gender</p>";
        echo "<p><strong>Age:</strong> $Age</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Nurse ID:</strong> $nurse_id</p>";
        echo "<p><strong>Years of Experience:</strong> $Years_experience</p>";
        echo "<p><strong>Specialization:</strong> " . $_POST["specialization"] . "</p>";
        echo "<p><strong>Address:</strong> $Address</p>";
        echo "<p><strong>City:</strong> $City</p>";
        echo "<p><strong>Zip Code:</strong> " . $_POST["zip"] . "</p>";
        echo "<p><strong>Phone No:</strong> $Phone</p>";
        echo "<p><strong>Shift:</strong> $shift</p>";
        echo "<p><strong>Available Days:</strong>" . implode(", ", $available_days) . "</p>";
        echo "<p><strong>Service Type:</strong>". implode(", ", $service_type) . "</p>"; 
    } else {
        // Validation failed
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        //include 'your_form_file.php'; // Re-include the form to display errors
    }
}
?>