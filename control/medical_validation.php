<?php




if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_GET['elder_id'])) {
        $elder_id = $_GET['elder_id'];
    }
        // 
    // Collect form data
    $bmi = $_POST['bmi'];
    $sugar_level = $_POST['sugar_level'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $blood_pressure = $_POST['blood_pressure'];
    $vaccinations = $_POST['vaccinations'];
    $medical_conditions = $_POST['medical_conditions'];
    $blood_group = $_POST['blood_group'];
    $diabetics = $_POST['diabetics'];
    $temperature = $_POST['temperature'];
    $recommendation = $_POST['recommendation'];
 
    // Store data in an array (optional)
    $formData = [
        'elder_ID' => $elder_id,
        'BMI' =>  $_POST['sugar_level'],
        'sugar_level' =>  $_POST['sugar_level'],
        'height' => $_POST['height'],
        'weight' => $_POST['weight'],
        'blood_pressure' => $_POST['blood_pressure'],
        'vaccinations' => $_POST['vaccinations'],
        'medical_conditions' => $_POST['medical_conditions'],
        'blood_group' =>  $_POST['blood_group'],
        'diabetics' => $_POST['diabetics'],
        'temperature' => $_POST['temperature'],
        'recommendation' =>$_POST['recommendation']
    ];
    include "../model/table_value.php";
    $db = new Dbmodel();
    $conobj = $db->createConObject();
    //$db->insertMedicalInfo($conobj, $formData);
  //  $db->closeCon($conobj);



    // Check if elder's medical info already exists
    $checkQuery = "SELECT * FROM Medical_Info WHERE elder_ID = ?";
    $stmt = $conobj->prepare($checkQuery);
    $stmt->bind_param("i", $elder_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update existing medical info
        $updateQuery = "UPDATE Medical_Info SET BMI=?, sugar_level=?, height=?, weight=?, blood_pressure=?, vaccinations=?, medical_conditions=?, blood_group=?, diabetics=?, temperature=?, recommendation=? WHERE elder_ID=?";
        $stmt = $conobj->prepare($updateQuery);
        $stmt->bind_param("sssssssssssi", $bmi, $sugar_level, $height, $weight, $blood_pressure, $vaccinations, $medical_conditions, $blood_group, $diabetics, $temperature, $recommendation, $elder_id);
        $stmt->execute();
    } else {
        // Insert new medical info
        $insertQuery = "INSERT INTO Medical_Info (elder_ID, BMI, sugar_level, height, weight, blood_pressure, vaccinations, medical_conditions, blood_group, diabetics, temperature, recommendation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conobj->prepare($insertQuery);
        $stmt->bind_param("isssssssssss", $elder_id, $bmi, $sugar_level, $height, $weight, $blood_pressure, $vaccinations, $medical_conditions, $blood_group, $diabetics, $temperature, $recommendation);
        $stmt->execute();
    }

    $stmt->close();
    $db->closeCon($conobj);
    echo "<script>alert('Form data has been stored successfully!');</script>";
}
?>
