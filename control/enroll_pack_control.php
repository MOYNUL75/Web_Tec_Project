<?php
session_start();


if (isset($_GET['service_id'])) {
    $service_id = intval($_GET['service_id']);

    if ($service_id > 0) {
        // Example: Record the enrollment in the database (logic here)
        echo "Successfully enrolled in service with ID: $service_id";
        include "../model/enroll_package_db.php";
        
        $guardian_ID = getGuardianByAccount($_SESSION['user_id']);
        $guardian_name = $_SESSION['username'];
        $elder_ID = getElderByGuardian($guardian_ID);
       insertServiceUser( $service_id, $elder_ID, $guardian_ID) ;

       $_SESSION['guardian_ID'] = $guardian_ID;
       $_SESSION['service_id'] = $service_id;


       header("Location: ../view/payment.php");
       

    } else {
        echo "Invalid service ID.";
    }
} else {
    echo "No service selected.";
}
 //session_destroy()
?>
