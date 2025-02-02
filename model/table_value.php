<?php
class Dbmodel
{
    public $DBHostName = "";
    public $DBUserName = "";
    public $DBPassword = "";
    public $DBName = "";

    function __construct()
    {
        $this->DBHostName = "localhost";
        $this->DBUserName = "root";
        $this->DBPassword = "";
        $this->DBName = "elder_care_monitoring_system";  // Database for nurse registration
    }

    // Function to create a connection object
    function createConObject()
    {
        return new mysqli($this->DBHostName, $this->DBUserName, $this->DBPassword, $this->DBName);
    }

    // Function to close the database connection
    public function closeCon($conn)
    {
        $conn->close();
    }

// Function to insert data into Account_cteate
function insertAccount($conn, $formData) {
    $sql = "INSERT INTO Account_cteate (username, password, account_type) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $formData['username'], $formData['password'], $formData['account_type']);
    if ($stmt->execute()) {
        // Return the inserted account ID
        $account_id = $stmt->insert_id; // Fetch the last inserted ID
        $stmt->close();
        return $account_id; // Return the account ID
    } else {
        echo "Error: " . $stmt->error . "\n";
        $stmt->close();
        return false; // Return false if the insertion failed
    }
}


// Function to insert data into Guardian
function insertGuardian($conn, $formData) {
    $sql = "INSERT INTO Guardian (account_ID, guardian_name, relation, guardian_profession, email, address, phone, city, emergency_contact) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssssss", $formData['account_ID'], $formData['guardian_name'], $formData['relation'], $formData['guardian_profession'], $formData['email'], $formData['address'], $formData['phone'], $formData['city'], $formData['emergency_contact']);
    if ($stmt->execute()) {
        echo "Guardian created successfully!\n";
    } else {
        echo "Error: " . $stmt->error . "\n";
    }
    $stmt->close();
}

// Function to insert data into Elder_Person
function insertElderPerson($conn, $formData) {
    $sql = "INSERT INTO Elder_Person (account_ID, guardian_ID, email, full_name, gender, Elder_dob, Phone, Address, mobility, physician_contact, emergency_contract_name, emergency_contract_relationship, emergency_contact_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisssssssssss", $formData['account_ID'], $formData['guardian_ID'], $formData['email'], $formData['full_name'], $formData['gender'], $formData['Elder_dob'], $formData['Phone'], $formData['Address'], $formData['mobility'], $formData['physician_contact'], $formData['emergency_contract_name'], $formData['emergency_contract_relationship'], $formData['emergency_contact_phone']);
    if ($stmt->execute()) {
        echo "Elder Person created successfully!\n";
    } else {
        echo "Error: " . $stmt->error . "\n";
    }
    $stmt->close();
}

// Function to insert data into Medical_Info
function insertMedicalInfo($conn, $formData) {
    $sql = "INSERT INTO Medical_Info (elder_ID, BMI, sugar_level, height, weight, blood_pressure, vaccinations, medical_conditions, blood_group, diabetics, temperature, recommendation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idddsssssbds", $formData['elder_ID'], $formData['BMI'], $formData['sugar_level'], $formData['height'], $formData['weight'], $formData['blood_pressure'], $formData['vaccinations'], $formData['medical_conditions'], $formData['blood_group'], $formData['diabetics'], $formData['temperature'], $formData['recommendation']);
    if ($stmt->execute()) {
        echo "Medical Info added successfully!\n";
    } else {
        echo "Error: " . $stmt->error . "\n";
    }
    $stmt->close();
}

// Function to insert data into Nurse
function insertNurse($conn, $formData) {
    $sql = "INSERT INTO Nurse (nurse_id, account_ID, Nurse_name, Gender, Phone, email, Age, Years_experience, Address, City, zip, available_days, shift, service_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iissssisssssss", $formData['nurse_id'], $formData['account_ID'], $formData['Nurse_name'], $formData['Gender'], $formData['Phone'], $formData['email'], $formData['Age'], $formData['Years_experience'], $formData['Address'], $formData['City'], $formData['zip'], $formData['available_days'], $formData['shift'], $formData['service_type']);
    if ($stmt->execute()) {
        echo "Nurse added successfully!\n";
    } else {
        echo "Error: " . $stmt->error . "\n";
    }
    $stmt->close();
}

// Function to insert data into ElderPerson_Nurse
function insertElderPersonNurse($conn, $formData) {
    $sql = "INSERT INTO ElderPerson_Nurse (nurse_id, elder_ID) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $formData['nurse_id'], $formData['elder_ID']);
    if ($stmt->execute()) {
        echo "ElderPerson-Nurse relation added successfully!\n";
    } else {
        echo "Error: " . $stmt->error . "\n";
    }
    $stmt->close();
}

// Function to insert data into Admin
function insertAdmin($conn, $formData) {
    $sql = "INSERT INTO Admin (admin_id, account_ID, fullname, nid, dob, gender, address, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisssssss", $formData['admin_id'], $formData['account_ID'], $formData['fullname'], $formData['nid'], $formData['dob'], $formData['gender'], $formData['address'], $formData['phone'], $formData['email']);
    if ($stmt->execute()) {
        echo "Admin added successfully!\n";
    } else {
        echo "Error: " . $stmt->error . "\n";
    }
    $stmt->close();
}

// Function to insert data into Service
function insertService($conn, $formData) {
    $sql = "INSERT INTO Service (service_name, details, service_category, service_charge, service_duration, service_availability, service_status) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdsss", $formData['service_name'], $formData['details'], $formData['service_category'], $formData['service_charge'], $formData['service_duration'], $formData['service_availability'], $formData['service_status']);
    if ($stmt->execute()) {
        echo "Service added successfully!\n";
    } else {
        echo "Error: " . $stmt->error . "\n";
    }
    $stmt->close();
}

// Function to insert data into Service_User
function insertServiceUser($conn, $formData) {
    $sql = "INSERT INTO Service_User (ServiceUser_ID, service_ID, elder_ID, guardian_ID) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii", $formData['ServiceUser_ID'], $formData['service_ID'], $formData['elder_ID'], $formData['guardian_ID']);
    if ($stmt->execute()) {
        echo "Service User added successfully!\n";
    } else {
        echo "Error: " . $stmt->error . "\n";
    }
    $stmt->close();
}

// Function to insert data into Payment
function insertPayment($conn, $formData) {
    $sql = "INSERT INTO Payment (Payment_id, payment_amount, payment_date, payment_method, guardian_ID, service_ID, transaction_ID, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idssisds", $formData['Payment_id'], $formData['payment_amount'], $formData['payment_date'], $formData['payment_method'], $formData['guardian_ID'], $formData['service_ID'], $formData['transaction_ID'], $formData['status']);
    if ($stmt->execute()) {
        echo "Payment added successfully!\n";
    } else {
        echo "Error: " . $stmt->error . "\n";
    }
    $stmt->close();
}

}
?>
