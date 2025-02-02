<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data

    $formData = [
        'service_name' => $_POST['service_name'],
        'details' => $_POST['details'],
        'service_category' => isset($_POST['service_category']) ? implode(",", $_POST['service_category']) : "", // Combine selected categories
        'service_charge' => $_POST['service_charge'],
        'service_duration' => $_POST['service_duration_from'] . " to " . $_POST['service_duration_to'],
        'service_availability' => $_POST['service_availability'],
        'service_status' => $_POST['service_status']
    ];
 
    include "../model/table_value.php";
    $db = new Dbmodel();
    $conobj = $db->createConObject();
    $db->insertService($conobj, $formData);
    $db->closeCon($conobj);
   

    header("Location: ../view/available_packages01.php");
    

}

?>
