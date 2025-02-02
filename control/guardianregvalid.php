<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    

    // Validate Guardian Name (no numbers)
    $guardian_name = trim($_POST['guardian_name']);
    if (empty($guardian_name) || preg_match("/[0-9]/", $guardian_name)) {
        $errors[] = "Guardian Name cannot contain numbers and must not be empty.";
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
        $formDataGuardian = [
            "account_ID" => $_COOKIE["account_id"],
            "guardian_name" => $_POST["guardian_name"],
            "relation" => $_POST["relation"],
            "guardian_profession" => $_POST["guardian_profession"],
            "email" => $_POST["email"],
            "address" => $_POST["address"],
            "phone" => $_POST["phone"],
            "city" => $_POST["city"],
            "emergency_contact" => $_POST["emergency_contact"],
        ];

       
        include "../model/table_value.php";
        $db = new Dbmodel();
        $conobj = $db->createConObject();
        $db->insertGuardian($conobj, $formDataGuardian);
        $db->closeCon($conobj);
      


}



 else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>
