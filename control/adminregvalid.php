<?php
// Start by checking if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Initialize an array to store error messages
    $errors = [];
 
    // Retrieve and validate inputs
    $full_name = trim($_POST['full_name']);
    $nid = trim($_POST['nid']);
    $dob = trim($_POST['dob']);
    $gender = $_POST['gender'] ?? '';
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
 
 
 
    if (empty($full_name)) {
        $errors[] = "Full name is required.";
    }
    if (preg_match('/[\W_]/', $full_name) || preg_match('/[0-9]/', $full_name)) {
        $errors[] = "Name must contain only characters.";
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
 
 
        $formDataAdmin = [
            "account_ID" => $_COOKIE["account_id"],
            "fullname" => $_POST['full_name'],
            "nid" => $_POST["nid"],
            "dob" => $_POST["dob"],
            "gender" => $_POST["gender"],
            "address" => $_POST["address"],
            "phone" => $_POST["phone"],
            "email" => $_POST["email"],
        ];
 
        include "../model/table_value.php";
        $db = new Dbmodel();
        $conobj = $db->createConObject();
        $db->insertAdmin($conobj, $formDataAdmin);
        $db->closeCon($conobj);
 
       
    }
}
?>
