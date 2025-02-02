<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elder_care_monitoring_system";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select database
$conn->select_db($dbname);

// Table creation queries
$table_queries = [];

// Account table
$table_queries[] = "
CREATE TABLE IF NOT EXISTS Account_cteate (
    account_ID INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    password VARCHAR(255),
    account_type ENUM('Elder', 'Guardian', 'Nurse', 'Admin'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Guardian table
$table_queries[] = "
CREATE TABLE IF NOT EXISTS Guardian (
    guardian_ID INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    account_ID INT(10) UNSIGNED,
    guardian_name VARCHAR(255),
    relation VARCHAR(50),
    guardian_profession VARCHAR(255),
    email VARCHAR(255),
    address TEXT,
    phone VARCHAR(15),
    city VARCHAR(100),
    emergency_contact VARCHAR(15),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (account_ID) REFERENCES Account_cteate(account_ID)
)";

// Elder_Person table
$table_queries[] = "
CREATE TABLE IF NOT EXISTS Elder_Person (
    elder_ID INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    account_ID INT(10) UNSIGNED,
    guardian_ID INT(10) UNSIGNED,
    email VARCHAR(255),
    full_name VARCHAR(255),
    gender ENUM('Male', 'Female', 'Other'),
    Elder_dob DATE,
    Phone VARCHAR(15),
    Address TEXT,
    mobility ENUM('High', 'Medium', 'Low'),
    physician_contact VARCHAR(255),
    emergency_contract_name VARCHAR(255),
    emergency_contract_relationship VARCHAR(255),
    emergency_contact_phone VARCHAR(15),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (account_ID) REFERENCES Account_cteate(account_ID),
    FOREIGN KEY (guardian_ID) REFERENCES Guardian(guardian_ID)
)";

// Medical_Info table
$table_queries[] = "
CREATE TABLE IF NOT EXISTS Medical_Info (
    medical_id INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    elder_ID INT(10) UNSIGNED,
    BMI FLOAT,
    sugar_level FLOAT,
    height FLOAT,
    weight FLOAT,
    blood_pressure VARCHAR(255),
    vaccinations TEXT,
    medical_conditions TEXT,
    blood_group ENUM('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'),
    diabetics BOOLEAN,
    temperature FLOAT,
    recommendation TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (elder_ID) REFERENCES Elder_Person(elder_ID) ON DELETE CASCADE ON UPDATE CASCADE
)";

// Nurse table
$table_queries[] = "
CREATE TABLE IF NOT EXISTS Nurse (
    nurse_id INT (10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    account_ID INT (10) UNSIGNED,
    Nurse_name VARCHAR(255),
    Gender ENUM('Male', 'Female', 'Other'),
    Phone VARCHAR(15),
    email VARCHAR(255),
    Age INT,
    Years_experience INT,
    Address TEXT,
    City VARCHAR(100),
    zip VARCHAR(10),
    available_days VARCHAR(255),
    shift VARCHAR(50),
    service_type VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (account_ID) REFERENCES Account_cteate(account_ID)
)";

// ElderPerson_Nurse table
$table_queries[] = "
CREATE TABLE IF NOT EXISTS ElderPerson_Nurse (
    elder_nurse_ID INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nurse_id INT(10) UNSIGNED,
    elder_ID INT(10) UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (nurse_id) REFERENCES Nurse(nurse_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (elder_ID) REFERENCES Elder_Person(elder_ID) ON DELETE CASCADE ON UPDATE CASCADE  
)";

// Admin table
$table_queries[] = "
CREATE TABLE IF NOT EXISTS Admin (
    admin_id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    account_ID INT(10) UNSIGNED,
    fullname VARCHAR(255),
    nid VARCHAR(20),
    dob DATE,
    gender ENUM('Male', 'Female', 'Other'),
    address TEXT,
    phone VARCHAR(15),
    email VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (account_ID) REFERENCES Account_cteate(account_ID)
)";

// Service table
$table_queries[] = "
CREATE TABLE IF NOT EXISTS Service (
    service_ID INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    service_name VARCHAR(255),
    details TEXT,
    service_category VARCHAR(255),
    service_charge DECIMAL(10, 2),
    service_duration VARCHAR(50),
    service_availability VARCHAR(255),
    service_status ENUM('Active', 'Inactive') DEFAULT 'Active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Service_User table
$table_queries[] = "
CREATE TABLE IF NOT EXISTS Service_User (
    ServiceUser_ID INT (10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    service_ID INT(10) UNSIGNED,
    elder_ID INT(10) UNSIGNED,
    guardian_ID INT(10) UNSIGNED,
    FOREIGN KEY (service_ID) REFERENCES Service (service_ID),
    FOREIGN KEY (elder_ID) REFERENCES Elder_Person (elder_ID),
    FOREIGN KEY (guardian_ID) REFERENCES Guardian (guardian_ID)
)";

// Payment table
$table_queries[] = "
CREATE TABLE IF NOT EXISTS Payment (
    Payment_id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    payment_amount DECIMAL(10, 2),
    payment_date DATE,
    payment_method ENUM('Cash', 'Card', 'Online'),
    guardian_ID INT(10) UNSIGNED,
    service_ID INT(10) UNSIGNED,
    transaction_ID VARCHAR(50),
    status ENUM('Pending', 'Completed', 'Failed') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (guardian_ID) REFERENCES Guardian(guardian_ID),
    FOREIGN KEY (service_ID) REFERENCES Service(service_ID)
)";

$table_queries[] = "
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nurse_id INT(10) UNSIGNED,
    guardian_id INT(10) UNSIGNED,
    message TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (nurse_id) REFERENCES Nurse(nurse_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (guardian_id) REFERENCES Guardian(guardian_ID) ON DELETE CASCADE ON UPDATE CASCADE
);";

$table_queries[] =  "
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

// Execute Queries
foreach ($table_queries as $query) {
    if ($conn->query($query) === TRUE) {
        echo "Table created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
}

// Close Connection
$conn->close();
?>