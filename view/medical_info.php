<?php include "../control/medical_validation.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Info Form</title>
    <link rel="stylesheet" href="../css/medical_info01.css">
</head>
<body>
    <div class="container">
        <h1>Medical Information Form</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="bmi">BMI</label>
                <input type="number" step="0.01" id="bmi" name="bmi" placeholder="Enter BMI">
            </div>
            <div class="form-group">
                <label for="sugar_level">Sugar Level</label>
                <input type="number" step="0.01" id="sugar_level" name="sugar_level" placeholder="Enter Sugar Level">
            </div>
            <div class="form-group">
                <label for="height">Height (cm)</label>
                <input type="number" id="height" name="height" placeholder="Enter Height">
            </div>
            <div class="form-group">
                <label for="weight">Weight (kg)</label>
                <input type="number" id="weight" name="weight" placeholder="Enter Weight">
            </div>
            <div class="form-group">
                <label for="blood_pressure">Blood Pressure</label>
                <input type="text" id="blood_pressure" name="blood_pressure" placeholder="Enter Blood Pressure">
            </div>
            <div class="form-group">
                <label for="vaccinations">Vaccinations</label>
                <textarea id="vaccinations" name="vaccinations" rows="3" placeholder="Enter Vaccination Details"></textarea>
            </div>
            <div class="form-group">
                <label for="medical_conditions">Medical Conditions</label>
                <textarea id="medical_conditions" name="medical_conditions" rows="3" placeholder="Enter Medical Conditions"></textarea>
            </div>
            <div class="form-group">
                <label for="blood_group">Blood Group</label>
                <select id="blood_group" name="blood_group">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="form-group">
                <label for="diabetics">Diabetes</label>
                <select id="diabetics" name="diabetics">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="temperature">Temperature (°C)</label>
                <input type="number" step="0.01" id="temperature" name="temperature" placeholder="Enter Temperature">
            </div>
            <div class="form-group">
                <label for="recommendation">Recommendation</label>
                <textarea id="recommendation" name="recommendation" rows="3" placeholder="Enter Recommendations"></textarea>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn btn-submit">Submit</button>
                <button type="reset" class="btn btn-reset">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>