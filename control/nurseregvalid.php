<?php
// nurseregvalid.php (Validation file)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    $Nurse_name = trim($_POST["Nurse_name"]);
    if (empty($Nurse_name) || strlen($Nurse_name) > 50) {
        $errors[] = "Name must be provided and should not exceed 50 characters.";
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
      

       

        $formData = [
            "account_ID" => $_COOKIE["account_id"],
                "Nurse_name" => $_POST["Nurse_name"],
                "Gender" => $_POST["Gender"],
                "Phone" => $_POST["Phone"],
                "email" => $_POST["email"],
                "Age" => $_POST["Age"],
                "Years_experience" => $_POST["Years_experience"],
                "Address" => $_POST["Address"],
                "City" => $_POST["City"],
                "zip" => $_POST["zip"],
                "available_days" => implode(", ", $_POST["available_days"]), // Convert array to string
                "shift" => $_POST["shift"],
                "service_type" => is_array($_POST["service_type"]) ? implode(", ", $_POST["service_type"]) : $_POST["service_type"], // Safely handle service_type
          
        ];


        include "../model/table_value.php";
        $db = new Dbmodel();
        $conobj = $db->createConObject();
        $db->insertNurse($conobj, $formData);
        $db->closeCon($conobj);

}






 else {
        // Validation failed
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>