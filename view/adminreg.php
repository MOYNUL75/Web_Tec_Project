<?php include '..\control\adminregvalid.php';?>
 
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="../css/elderreg.css">
 
</head>
 
<body>
    <h2>Admin Registration Form</h2>
 
    <form action="" method="POST" onsubmit="return validation();" enctype="multipart/form-data">
   
        <fieldset>
            <legend>
                <h3>Personal Information</h3>
            </legend>
            <table>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" id="full_name" >
                        <p id="errorfull_name" </p>
                    </td>
                </tr>
                <tr>
                    <td>NID Number:</td>
                    <td><input type="number" name="nid" id="nid" >
                        <p id="errornid" </p>
                    </td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" name="dob" id="dob" >
                        <p id="errordob" </p>
                    </td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="gender" value="female" id="gender_female">
                        <label for="gender_female">Female</label>
                        <input type="radio" name="gender" value="male" id="gender_male">
                        <label for="gender_male">Male</label>
                        <input type="radio" name="gender" value="other" id="gender_other">
                        <label for="gender_other">Other</label>
                        <p id="errorgender" </p>
                    </td>
                </tr>
                <tr>
                    <td>Permanent Address:</td>
                    <td><textarea name="address" id="address" ></textarea>
                        <p id="erroraddress" </p>
                    </td>
                </tr>
            </table>
        </fieldset>
 
        <fieldset>
            <legend>
                <h3>Contact Details</h3>
            </legend>
            <table>
                <tr>
                    <td><label for="phone">Phone Number:</label></td>
                    <td><input type="tel" id="phone" name="phone" >
                        <p id="errorphone" </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email Address:</label></td>
                    <td><input type="email" id="email" name="email">
                        <p id="erroremail" </p>
                    </td>
                </tr>
                <tr>
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
    <script src="../js/adminregvalid.js"></script>
</body>
 
</html>
 