<?php

session_start();


include "../model/enroll_package_db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paymentData = [
        'payment_amount' => $_POST['payment_amount'],
        'payment_date' => $_POST['payment_date'],
        'payment_method' => $_POST['payment_method'],
        'guardian_ID' => $_SESSION['guardian_ID'],
        'service_ID' => $_SESSION['service_id'],
        'transaction_ID' => !empty($_POST['transaction_ID']) ? $_POST['transaction_ID'] : NULL,
        'status' => "Completed"
    ];

    if (insertPayment($paymentData)) {
        header("Location: ../view/elder_services.php");
        exit();
    } else {
        echo "Error in processing payment.";
    }
} else {
    echo "Invalid request.";
}

?>
