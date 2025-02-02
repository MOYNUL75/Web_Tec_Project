<?php
include_once "../model/connection.php"; // Include your database connection file

function createMedicineScheduleTable() {
    $db = new Db();
    $conn = $db->createConObject();
    
    $query = "
    CREATE TABLE IF NOT EXISTS Medicine_Schedule (
        medicine_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        elder_ID INT(10) UNSIGNED NOT NULL,
        medicine_name VARCHAR(255) NOT NULL,
        dosage VARCHAR(50) NOT NULL,
        timing ENUM('Morning', 'Afternoon', 'Evening', 'Night', 'Before Meal', 'After Meal') NOT NULL,
        duration VARCHAR(100) NOT NULL,
        start_date DATE NOT NULL,
        end_date DATE NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (elder_ID) REFERENCES Elder_Person(elder_ID) ON DELETE CASCADE ON UPDATE CASCADE
    )";

    if ($conn->query($query) === TRUE) {
        echo "Medicine_Schedule table created successfully.<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
}

function insertDemoData() {
    $db = new Db();
    $conn = $db->createConObject();

    $demoData = [
        [1, 'Aspirin', '1 tablet', 'Morning', '10 days', '2025-02-01', '2025-02-10'],
        [1, 'Metformin', '500 mg', 'Before Meal', '30 days', '2025-02-01', '2025-03-01'],
        [1, 'Losartan', '50 mg', 'Night', '15 days', '2025-02-05', '2025-02-20'],
        [1, 'Paracetamol', '500 mg', 'After Meal', '5 days', '2025-02-03', '2025-02-08']
    ];

    foreach ($demoData as $data) {
        $query = "INSERT INTO Medicine_Schedule (elder_ID, medicine_name, dosage, timing, duration, start_date, end_date) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("issssss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);

        if ($stmt->execute()) {
            echo "Inserted demo data: " . $data[1] . "<br>";
        } else {
            echo "Error inserting data: " . $conn->error . "<br>";
        }
        $stmt->close();
    }
    
    $conn->close();
}

function insertMedicineSchedule($data) {

    $db = new Db();
    $conn = $db->createConObject();

    $query = "INSERT INTO Medicine_Schedule (elder_ID, medicine_name, dosage, timing, duration, start_date, end_date) 
              VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param(
            "issssss",
            $data['elder_ID'],
            $data['medicine_name'],
            $data['dosage'],
            $data['timing'],
            $data['duration'],
            $data['start_date'],
            $data['end_date']
        );

        if ($stmt->execute()) {
            $stmt->close();
            return true; // Successfully inserted
        } else {
            $stmt->close();
            return false; // Insertion failed
        }
    }
    return false; // Query preparation failed
}

?>
