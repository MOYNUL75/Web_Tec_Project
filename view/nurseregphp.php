<?php
include '..\control\nurseregvalid.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Elderly Care Management System - Nurse Registration Form</title>
    <link rel="stylesheet" href="../css/mystyle1.css">
</head>
<body>

<h2>Nurse Registration Form</h2>

<form action="..\control\nurseregvalid.php" method="post">

    <fieldset>
        <legend>Personal Information</legend>
        <table>
            <tr>
                <td><label for="Nurse_name">Full Name:</label></td>
                <td>
                    <input type="text" id="Nurse_name" name="Nurse_name" required>
                </td>
            </tr>
            <tr>
                <td><label for="Gender">Gender:</label></td>
                <td>
                    <input type="radio" id="male" name="Gender" value="Male" required>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="Gender" value="Female">
                    <label for="female">Female</label>
                </td>
            </tr>
            <tr>
                <td><label for="Age">Age:</label></td>
                <td><input type="number" id="Age" name="Age" required></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td>
                    <input type="email" id="email" name="email" required>
                </td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
        </table>
    </fieldset>

    <fieldset>
        <legend>Professional Information</legend>
        <table>
            <tr>
                <td><label for="nurse_id">Nurse ID:</label></td>
                <td>
                    <input type="text" id="nurse_id" name="nurse_id" required>
                </td>
            </tr>
            <tr>
                <td>Qualification:</td>
                <td>
                    <input type="checkbox" name="qualifications[]" value="Bachelor of Science in Nursing (BScN)">Bachelor of Science in Nursing (BScN)<br>
                    <input type="checkbox" name="qualifications[]" value="Diploma in Nursing">Diploma in Nursing<br>
                    <input type="checkbox" name="qualifications[]" value="Master of Science in Nursing (MScN)">Master of Science in Nursing (MScN)<br>
                </td>
            </tr>
            <tr>
                <td><label for="Years_experience">Years of Experience:</label></td>
                <td><input type="number" id="Years_experience" name="Years_experience" required></td>
            </tr>
            <tr>
                <td><label for="specialization">Specialization (if any):</label></td>
                <td><input type="text" id="specialization" name="specialization" placeholder="e.g., Elderly Care, Physical Therapy"></td>
            </tr>
        </table>
    </fieldset>

    <fieldset>
        <legend>Contact Information</legend>
        <table>
            <tr>
                <td><label for="Address">Address:</label></td>
                <td><input type="text" id="Address" name="Address" required></td>
            </tr>
            <tr>
                <td><label for="City">City:</label></td>
                <td>
                    <select id="City" name="City" required>
                        <option value="">Select City</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="chittagang">Chittagong</option>
                        <option value="khulna">Khulna</option>
                        <option value="Barishal">Barishal</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Mymensingh">Mymensingh</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="zip">Zip Code:</label></td>
                <td><input type="text" id="zip" name="zip" required></td>
            </tr>
            <tr>
                <td><label for="Phone">Phone No:</label></td>
                <td><input type="tel" id="Phone" name="Phone" required></td>
            </tr>
        </table>
    </fieldset>

    <fieldset>
        <legend>Availability</legend>
        <table>
        <tr>
    <td>Available Days:</td>
    <td>
        <label><input type="checkbox" name="available_days[]" value="Monday"> Monday</label>
        <label><input type="checkbox" name="available_days[]" value="Tuesday"> Tuesday</label>
        <label><input type="checkbox" name="available_days[]" value="Wednesday"> Wednesday</label>
        <label><input type="checkbox" name="available_days[]" value="Thursday"> Thursday</label>
        <label><input type="checkbox" name="available_days[]" value="Friday"> Friday</label>
        <label><input type="checkbox" name="available_days[]" value="Saturday"> Saturday</label>
        <label><input type="checkbox" name="available_days[]" value="Sunday"> Sunday</label>
    </td>
</tr>
            <tr>
                <td><label for="shift">Preferred shift:</label></td>
                <td>
                    <select id="shift" name="shift" required>
                        <option value="">Select Shift</option>
                        <option value="Morning">Morning</option>
                        <option value="Afternoon">Afternoon</option>
                        <option value="Night">Night</option>
                    </select>
                </td>
            </tr>
        </table>
    </fieldset>

    <fieldset>
        <table>
        <tr>
                <td><label for="service_type">Service Type:</label></td>
                <td>
                    <label><input type="checkbox" id="full_time_care" name="service_type[]" value="Full-Time Care"> Full-Time Care</label><br>
                    <label><input type="checkbox" id="day_care" name="service_type[]" value="Day Care Only"> Day Care Only</label><br>
                    <label><input type="checkbox" id="home_visits" name="service_type[]" value="Home Visits"> Home Visits</label><br>
                    
                </td>
            </tr>
        </table>
    </fieldset>

    <fieldset>
        <table>
            <tr>
                <td><input type="submit" value="Register"></td>
                <td><input type="reset" value="Reset"></td>
            </tr>
        </table>
    </fieldset>
</form>

</body>
</html>