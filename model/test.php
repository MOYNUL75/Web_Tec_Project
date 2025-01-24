<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elder_care_monitoring_XA";
 
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
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    account_type ENUM('Elder', 'Guardian', 'Nurse', 'Admin') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
 
 
// Medical_Info table
$table_queries[] = "
CREATE TABLE IF NOT EXISTS Medical_Info (
    medical_id INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
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
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
 
// Guardian table
$table_queries[] = "
CREATE TABLE IF NOT EXISTS Guardian (
    guardian_ID INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    account_ID INT(10) UNSIGNED,
    guardian_name VARCHAR(255) NOT NULL,
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
    elder_ID INT(10) UNSIGNED NOT NULL PRIMARY KEY,
    account_ID INT (10) UNSIGNED NOT NULL,
    guardian_ID INT (10) UNSIGNED,
    medical_id INT (10) UNSIGNED,
    email VARCHAR(255),
    full_name VARCHAR(255) NOT NULL,
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
    FOREIGN KEY (guardian_ID) REFERENCES Guardian(guardian_ID),
    FOREIGN KEY (medical_id) REFERENCES Medical_Info(medical_id)
)";
 
 
// Nurse table
$table_queries[] = "
CREATE TABLE IF NOT EXISTS Nurse (
    nurse_id INT (10) UNSIGNED NOT NULL PRIMARY KEY,
    account_ID INT (10) UNSIGNED NOT NULL,
    Nurse_name VARCHAR(255) NOT NULL,
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
 
 
 
$table_queries[] = "
CREATE TABLE IF NOT EXISTS ElderPerson_Nurse (
    elder_nurse_ID INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nurse_id INT(10) UNSIGNED NOT NULL,
    elder_ID INT(10) UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (nurse_id) REFERENCES Nurse(nurse_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (elder_ID) REFERENCES Elder_Person(elder_ID) ON DELETE CASCADE ON UPDATE CASCADE  
)";
 
 
// Admin table
$table_queries[] = "
CREATE TABLE IF NOT EXISTS Admin (
    admin_id INT(10) UNSIGNED NOT NULL PRIMARY KEY,
    account_ID INT(10) UNSIGNED NOT NULL,
    fullname VARCHAR(255) NOT NULL,
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
    service_ID INT(10) UNSIGNED NOT NULL PRIMARY KEY,
    service_name VARCHAR(255) NOT NULL,
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
    ServiceUser_ID INT (10) UNSIGNED NOT NULL PRIMARY KEY,
    service_ID INT(10) UNSIGNED NOT NULL,
    elder_ID INT(10) UNSIGNED NOT NULL,
    guardian_ID INT(10) UNSIGNED NOT NULL,
    FOREIGN KEY (service_ID) REFERENCES Service (service_ID),
    FOREIGN KEY (elder_ID) REFERENCES Elder_Person (elder_ID),
    FOREIGN KEY (guardian_ID) REFERENCES Guardian (guardian_ID)
)";
 
 
// Payment table
$table_queries[] = "
CREATE TABLE IF NOT EXISTS Payment (
    Payment_id INT(10) UNSIGNED NOT NULL PRIMARY KEY,
    payment_amount DECIMAL(10, 2) NOT NULL,
    payment_date DATE NOT NULL,
    payment_method ENUM('Cash', 'Card', 'Online') NOT NULL,
    guardian_ID INT(10) UNSIGNED NOT NULL,
    service_ID INT(10) UNSIGNED NOT NULL,
    transaction_ID VARCHAR(50),
    status ENUM('Pending', 'Completed', 'Failed') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (guardian_ID) REFERENCES Guardian(guardian_ID),
    FOREIGN KEY (service_ID) REFERENCES Service(service_ID)
)";
 
 
// Execute table creation queries
foreach ($table_queries as $query) {
    if ($conn->query($query) === TRUE) {
        echo "Table created successfully\n";
    } else {
        echo "Error creating table: " . $conn->error . "\n";
    }
}
 
// Close connection
$conn->close();
?>
 