<?php
include '..\control\elderregvalid.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Elder Person Registration</title>
    
    <link rel="stylesheet" href="../css/mystyle1.css">
    
</head>
<body>
    <h1>Elder Person Registration Form</h1>

    <form action="..\control\elderregvalid.php" method="post">


        <!-- Personal Information Section -->
        <fieldset>
            <legend>Personal Information</legend>
            <table>
                <tr>
                    <td>Email:</td>
                    <td><input id="email" type="email" name="email"></td>
                    
                </tr>
                <tr>
                    <td>Full Name:</td>
                    <td><input id="fullName" type="text" name="full_name"></td>
                   
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="gender" value="Male"> Male
                        <input type="radio" name="gender" value="Female"> Female
                        <input type="radio" name="gender" value="Other"> Other
                    </td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" name="Elder_dob"></td>
                </tr>
            </table>
        </fieldset>

        <!-- Contact Information Section -->
        <fieldset>
            <legend>Contact Information</legend>
            <table>
                <tr>
                    <td>Phone Number:</td>
                    <td><input id="phone" type="tel" name="Phone" pattern="[0-9]{11}" placeholder="11-digit number"></td>
                    
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><textarea id="address" name="Address" rows="3"></textarea></td>
                    
                </tr>
            </table>
        </fieldset>

        <!-- Mobility Information Section -->
        <fieldset>
            <legend>Mobility Information</legend>
            <table>
                <tr>
                    <td>Mobility:</td>
                    <td>
                        <input type="radio" name="mobility" value="High"> High
                        <input type="radio" name="mobility" value="Medium"> Medium
                        <input type="radio" name="mobility" value="Low"> Low
                    </td>
                   
                </tr>
            </table>
        </fieldset>

        <!-- Emergency Contact Information Section -->
        <fieldset>
            <legend>Emergency Contact Information</legend>
            <table>
                <tr>
                    <td>Emergency Contact Name:</td>
                    <td><input id="emergencyName" type="text" name="emergency_contact_name"></td>
                    
                </tr>
                <tr>
                    <td>Relationship:</td>
                    <td><input id="emergencyRelationship" type="text" name="emergency_contact_relationship"></td>
                    
                </tr>
                <tr>
                    <td>Emergency Contact Phone:</td>
                    <td><input id="emergencyPhone" type="tel" name="emergency_contact_phone" pattern="[0-9]{11}"></td>
                    
                </tr>
            </table>
        </fieldset>

        <!-- Primary Care Physician Section -->
        <fieldset>
            <legend>Primary Care Physician</legend>
            <table>
                <tr>
                    <td>Physician Contact:</td>
                    <td><input id="physicianContact" type="tel" name="physician_contact" pattern="[0-9]{11}"></td>
                   
                </tr>
            </table>
        </fieldset>

        <!-- Submit Button -->
        <fieldset>
            <table>
                <tr>
                    <td><input type="reset" value="Reset"></td>
                    <td><input type="submit" value="Register"></td>
                </tr>
            </table>
        </fieldset>

    </form>
</body>
</html>