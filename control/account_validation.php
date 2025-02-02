<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $account_type = trim($_POST['account_type']);
    $errors = [];

    // Validation
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }
    if (empty($account_type)) {
        $errors[] = "Account type is required.";
    }

    // Redirect back to the form with errors if any
    if (count($errors) > 0) {
      
    header("Location: account_create.php?errors=" . urlencode(json_encode($errors)));
     
        exit;
    }

    // Insert into the database
    $formData = [
        'username' => $username,
        'password' => $password,
        'account_type' => $account_type,
    ];

    include "../model/table_value.php";
    $db = new Dbmodel();
    $conobj = $db->createConObject();

    // Insert account and get account ID
    $account_id = $db->insertAccount($conobj, $formData); // Assuming insertAccount returns the account ID
    $db->closeCon($conobj);
    echo "hi".$account_id;

    if (!$account_id) {
     header("Location: account_create.php?errors=" . urlencode(json_encode(["Error creating account."])));   
        exit;
    }

    // Set cookies for account_id and account_type
    setcookie("account_id", $account_id, time() + (86400 * 30), "/"); // 30 days
    setcookie("account_type", $account_type, time() + (86400 * 30), "/"); // 30 days

    // Redirect based on account type
    switch ($account_type) {
        case 'Elder':
            header("Location: ../view/elderreg.php");
            break;
        case 'Guardian':
            header("Location: ../view/guardianreg.php");
            break;
        case 'Nurse':
            header("Location: ../view/nursereg.php");
            break;
        case 'Admin':
            header("Location: ../view/adminreg.php");
            break;
        default:
            echo "<h3 style='color: red;'>Invalid account type.</h3>";
            exit;
    }
    exit;
}
?>