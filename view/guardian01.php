<!DOCTYPE html>
<html>
<head>
    <title>Guardian Registration</title>
    <script src="../js/guardian_js_validation01.js"></script>
</head>
<body>
<form action="" method="post" onsubmit="return validateForm()">
    <fieldset>
        <legend>Guardian Information</legend>
        <table>
            <tr>
                <td><label for="guardian_ID">Guardian ID:</label></td>
                <td><input type="text" id="guardian_ID" name="guardian_ID" required></td>
            </tr>
            <tr>
                <td><label for="account_ID">Account ID:</label></td>
                <td><input type="text" id="account_ID" name="account_ID" required></td>
            </tr>
            <tr>
                <td><label for="guardian_name">Guardian Name:</label></td>
                <td><input type="text" id="guardian_name" name="guardian_name" required></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
            <tr>
                <td><label for="relation">Relation to Patient:</label></td>
                <td>
                    <select id="relation" name="relation">
                        <option value="Son">Son</option>
                        <option value="Daughter">Daughter</option>
                        <option value="Other">Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="guardian_profession">Guardian Profession:</label></td>
                <td><input type="text" id="guardian_profession" name="guardian_profession"></td>
            </tr>
            <tr>
                <td><label for="email">Guardian's Email:</label></td>
                <td><input type="email" id="email" name="email" required></td>
            </tr>
            <tr>
                <td><label for="address">Address:</label></td>
                <td><input type="text" id="address" name="address" required></td>
            </tr>
            <tr>
                <td><label for="city">City:</label></td>
                <td>
                    <select id="city" name="city">
                        <option value="Select City">Select City</option>
                        <option value="City 1">City 1</option>
                        <option value="City 2">City 2</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="phone">Phone No:</label></td>
                <td><input type="tel" id="phone" name="phone" required></td>
            </tr>
            <tr>
                <td><label for="emergency_contact">Emergency Contact:</label></td>
                <td><input type="tel" id="emergency_contact" name="emergency_contact" required></td>
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