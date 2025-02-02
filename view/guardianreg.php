<?php 
include '..\control\guardianregvalid.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>Guardian Registration</title>
    <link rel="stylesheet" href="../css/elderreg.css">
    
</head>
<body>
  <h2>Guardian Person Registration Form</h2>
    <form action="..\control\guardianregvalid.php" method="post" onsubmit="return validateForm()">
        <fieldset>
            <legend>Guardian Information</legend>
            <table>
               
                <tr>
                    <td><label for="guardian_name">Guardian Name:</label></td>
                    <td><input type="text" id="guardian_name" name="guardian_name" >
                        <p id="errorguardian_name" </p>
                    </td>
                </tr>
        
                <tr>
                    <td><label for="relation">Relation to Patient:</label></td>
                    <td>
                        <select id="relation" name="relation">
                            <option value="">Select Relation</option>
                            <option value="Son">Son</option>
                            <option value="Daughter">Daughter</option>
                            <option value="Other">Other</option>
                        </select>
                        <p id="errorrelation" </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="guardian_profession">Guardian Profession:</label></td>
                    <td><input type="text" id="guardian_profession" name="guardian_profession">
                        <p id="errorguardian_profession" </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Guardian's Email:</label></td>
                    <td><input type="email" id="email" name="email" >
                        <p id="erroremail" </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="address">Address:</label></td>
                    <td><input type="text" id="address" name="address" >
                        <p id="erroraddress" </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="city">City:</label></td>
                    <td>
                        <select id="city" name="city">
                            <option value="">Select City</option>
                            <option value="City 1">City 1</option>
                            <option value="City 2">City 2</option>
                        </select>
                        <p id="errorcity" </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="phone">Phone No:</label></td>
                    <td><input type="tel" id="phone" name="phone" >
                        <p id="errorphone" </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="emergency_contact">Emergency Contact:</label></td>
                    <td><input type="tel" id="emergency_contact" name="emergency_contact" >
                        <p id="erroremergency_contact" </p>
                    </td>
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
    <script src="../js/guardianregvalid.js"></script>
</body>
</html>