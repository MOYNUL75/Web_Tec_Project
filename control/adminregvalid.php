<?php
// Start by checking if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Initialize an array to store error messages
    $errors = [];

    // Retrieve and validate inputs
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $full_name = trim($_POST['full_name']);
    $father_name = trim($_POST['father_name']);
    $mother_name = trim($_POST['mother_name']);
    $nid = trim($_POST['nid']);
    $dob = trim($_POST['dob']);
    $gender = $_POST['gender'] ?? '';
    $address = trim($_POST['address']);
    $code = trim($_POST['code']);
    $id = trim($_POST['id']);
    $job_title = $_POST['job_title'] ?? ''; // Corrected variable name
    $doj = trim($_POST['doj']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $imagePath = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
        $imagePath = $uploadDir . uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }
    // No $formData array needed since we are not storing in json or db

    // Validate each field
    if (empty($username)) {
        $errors[] = "Username is required.";
    } elseif (strlen($username) < 5) {
        $errors[] = "Username must be at least 5 characters long.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6 || !preg_match('/[\W_]/', $password) || !preg_match('/[0-9]/', $password)) {
        $errors[] = "Password must be more than 6 characters long, contain at least one numeric character, and include at least one special character (e.g., @, #, $, etc.).";
    }

    if (empty($full_name)) {
        $errors[] = "Full name is required.";
    }
    if (preg_match('/[\W_]/', $full_name) || preg_match('/[0-9]/', $full_name)) {
        $errors[] = "Name must contain only characters.";
    }

    if (empty($father_name)) {
        $errors[] = "Father's name is required.";
    }
    if (preg_match('/[\W_]/', $father_name) || preg_match('/[0-9]/',$father_name)) {
        $errors[] = "Father's Name must contain only characters.";
    }

    if (empty($mother_name)) {
        $errors[] = "Mother's name is required.";
    }
    if (preg_match('/[\W_]/', $mother_name) || preg_match('/[0-9]/', $mother_name)) {
        $errors[] = "Mother's Name must contain only characters.";
    }

    if (empty($nid) || !is_numeric($nid)) {
        $errors[] = "Valid NID number is required.";
    }

    if (empty($dob)) {
        $errors[] = "Date of birth is required.";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    if (empty($address)) {
        $errors[] = "Permanent address is required.";
    }

    if (empty($code)) {
        $errors[] = "Certification code is required.";
    }

    if (empty($id)) {
        $errors[] = "Employee ID is required.";
    }

    if (empty($job_title)) {
        $errors[] = "Job title is required.";
    }

    if (empty($doj)) {
        $errors[] = "Date of joining is required.";
    }

    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match('/^[0-9]{11}$/', $phone)) {
        $errors[] = "Phone number must be 11 digits."; // More precise message
    }

    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    // Check if there are errors
    if (!empty($errors)) {
        // Print errors
        echo "<h3>Validation Errors:</h3>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        // Validation successful!
        echo "<h2>Registration Successful!</h2>";
        //Optional display of submitted data
        echo "<h3>Provided Information:</h3>";
        echo "<p><strong>Username:</strong> $username</p>";
        echo "<p><strong>Full Name:</strong> $full_name</p>";
        echo "<p><strong>Father's Name:</strong> $father_name</p>";
        echo "<p><strong>Mother's Name:</strong> $mother_name</p>";
        echo "<p><strong>NID:</strong> $nid</p>";
        echo "<p><strong>Date of Birth:</strong> $dob</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>Address:</strong> $address</p>";
        echo "<p><strong>Certification Code:</strong> $code</p>";
        echo "<p><strong>Employee ID:</strong> $id</p>";
        echo "<p><strong>Job Title:</strong> $job_title</p>";
        echo "<p><strong>Date of Joining:</strong> $doj</p>";
        echo "<p><strong>Phone:</strong> $phone</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        if ($imagePath) {
            echo "<p><strong>Image Path:</strong> $imagePath</p>";
            echo "<img src='$imagePath' alt='Uploaded Image' width='200'>";
        }
    }
}
?>