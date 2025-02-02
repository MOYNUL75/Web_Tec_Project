<?php
include '..\control\elderregvalid.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Elder Person Registration</title>
    <link rel="stylesheet" href="../css/elderreg.css">
   
</head>
<body>
    <h2>Elder Person Registration Form</h2>

    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">

        <!-- Personal Information Section -->
        <fieldset>
            <legend><h3>Elder Person Information</h3></legend>
            <table>
                <tr>
                    <td>Guardian User Name:</td>
                    <td><input id="GuardianName" type="text" name="Guardian_Name"></td>
                    <td><p id="errorGuardianName"></p></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input id="email" type="email" name="email"></td>
                    <td><p id="errorEmail"></p></td>
                </tr>
                <tr>
                    <td>Full Name:</td>
                    <td><input id="fullName" type="text" name="full_name"></td>
                    <td><p id="errorFullName"></p></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input id="gender" type="radio" name="gender" value="Male"> Male
                        <input id="gender" type="radio" name="gender" value="Female"> Female
                        <input id="gender" type="radio" name="gender" value="Other"> Other
                    </td>
                    <td><p id="errorGender"></p></td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input id="Elder_dob"type="date" name="Elder_dob"></td>
                    <td><p id="errorDOB"></p></td>
                </tr>
            </table>
        </fieldset>

        <!-- Contact Information Section -->
        <fieldset>
            <legend><h3>Contact Information</h3></legend>
            <table>
                <tr>
                    <td>Phone Number:</td>
                    <td><input id="phone" type="tel" name="Phone" placeholder="11-digit number"></td>
                    <td><p id="errorPhone"></p></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><textarea id="address" name="Address" rows="3"></textarea></td>
                    <td><p id="errorAddress"></p></td>
                </tr>
            </table>
        </fieldset>

        <!-- Mobility Information Section -->
        <fieldset>
            <legend><h3>Mobility Information</h3></legend>
            <table>
                <tr>
                    <td>Mobility:</td>
                    <td>
                        <input type="radio" name="mobility" value="High"> High
                        <input type="radio" name="mobility" value="Medium"> Medium
                        <input type="radio" name="mobility" value="Low"> Low
                    </td>
                    <td><p id="errorMobility"></p></td>
                </tr>
            </table>
        </fieldset>

        <!-- Emergency Contact Information Section -->
        <fieldset>
            <legend><h3>Emergency Contact Information</h3></legend>
            <table>
                <tr>
                    <td>Emergency Contact Name:</td>
                    <td><input id="emergencyName" type="text" name="emergency_contact_name"></td>
                    <td><p id="errorEmergencyName"></p></td>
                </tr>
                <tr>
                    <td>Relationship:</td>
                    <td><input id="emergencyRelationship" type="text" name="emergency_contact_relationship"></td>
                    <td><p id="errorEmergencyRelationship"></p></td>
                </tr>
                <tr>
                    <td>Emergency Contact Phone:</td>
                    <td><input id="emergencyPhone" type="tel" name="emergency_contact_phone" placeholder="11-digit number"></td>
                    <td><p id="errorEmergencyPhone"></p></td>
                </tr>
            </table>
        </fieldset>

        <!-- Primary Care Physician Section -->
        <fieldset>
            <legend><h3>Primary Care Physician</h3></legend>
            <table>
                <tr>
                    <td>Physician Contact:</td>
                    <td><input id="physicianContact" type="tel" name="physician_contact" placeholder="11-digit number"></td>
                    <td><p id="errorPhysicianContact"></p></td>
                </tr>
            </table>
        </fieldset>

        <!-- Submit Button Section -->
        <fieldset>
            <div class="button-container">
                <input type="reset" value="Reset">
                <input type="submit" value="Register">
            </div>
        </fieldset>


    </form>
    <script src="../js/elderegvalid.js" defer></script>
</body>
</html>
