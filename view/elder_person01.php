<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elder Person Page</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="../css/elder_person01.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>ELDER PERSON</h1>
            <div class="user-type">Elder</div>
        </div>

        <div class="main-content">
            <div class="section">
                <h2>Health Information</h2>
                <div class="option">
                    <label for="bmi">BMI:</label>
                    <input type="text" id="bmi" placeholder="Enter BMI">
                    <span class="icon"><!-- Icon for BMI --></span>
                </div>
                <div class="option">
                    <label for="sugar-level">Sugar Level:</label>
                    <input type="text" id="sugar-level" placeholder="Enter sugar level">
                    <span class="icon"><!-- Icon for Sugar Level --></span>
                </div>
                <div class="option">
                    <label for="temperature">Temperature:</label>
                    <input type="text" id="temperature" placeholder="Enter temperature">
                    <span class="icon"><!-- Icon for Temperature --></span>
                </div>
                <!-- Add more health options as needed -->
            </div>

            <div class="section">
                <h2>Medical Information</h2>
                <div class="option">
                    <label for="height">Height:</label>
                    <input type="text" id="height" placeholder="Enter height">
                    <span class="icon"><!-- Icon for Height --></span>
                </div>
                <div class="option">
                    <label for="weight">Weight:</label>
                    <input type="text" id="weight" placeholder="Enter weight">
                    <span class="icon"><!-- Icon for Weight --></span>
                </div>
                <div class="option">
                    <label for="blood-pressure">Blood Pressure:</label>
                    <input type="text" id="blood-pressure" placeholder="Enter blood pressure">
                    <span class="icon"><!-- Icon for Blood Pressure --></span>
                </div>
                <div class="option">
                    <label for="blood-group">Blood Group:</label>
                    <input type="text" id="blood-group" placeholder="Enter blood group">
                    <span class="icon"><!-- Icon for Blood Group --></span>
                </div>
                <div class="option">
                    <label for="vaccinations">Vaccinations:</label>
                    <input type="text" id="vaccinations" placeholder="Enter vaccinations">
                    <span class="icon"><!-- Icon for Vaccinations --></span>
                </div>
                <div class="option">
                    <label for="medical-conditions">Medical Conditions:</label>
                    <input type="text" id="medical-conditions" placeholder="Enter medical conditions">
                    <span class="icon"><!-- Icon for Medical Conditions --></span>
                </div>
                <div class="option">
                    <label for="diabetes">Diabetes:</label>
                    <input type="text" id="diabetes" placeholder="Enter diabetes status">
                    <span class="icon"><!-- Icon for Diabetes --></span>
                </div>
                <!-- Add more medical options as needed -->
            </div>
        </div>

        <div class="schedule-btn-container">
            <button class="schedule-btn">Schedule</button>
        </div>
    </div>
</body>
</html>
