<!-- <?php include '..\control\adminregvalid.php';?> -->
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Registration</title>

    <link rel="stylesheet" href="../css/mystyle1.css">

    
    <form action="" method="POST" onsubmit="return validation();" enctype="multipart/form-data">
    
</head>

<body>
    <h2>Admin Registration Form</h2>


        <fieldset>
            <legend>
                <h3>Login Information</h3>
            </legend>
            <table>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" id="username" name="username" >
                        <p id="errorusername" </p>
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" id="password" name="password" placeholder="Str0ng_P@ss" >
                        <p id="errorpassword" </p>
                    </td>
                </tr>
            </table>
        </fieldset>

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
                    <td>Father's Name:</td>
                    <td><input type="text" name="father_name" id="father_name" >
                        <p id="errorfather_name" </p>
                    </td>
                </tr>
                <tr>
                    <td>Mother's Name:</td>
                    <td><input type="text" name="mother_name" id="mother_name" >
                        <p id="errormother_name" </p>
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
                <tr>
                    <td>Upload Image:</td>
                    <td><input type="file" name="image" accept="image/*" id="image">
                        <p id="errorimage" </p>
                    </td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>
                <h3>Professional Information</h3>
            </legend>
            <table>
                <tr>
                    <td>Certification Code:</td>
                    <td><input type="text" name="code" id="code" >
                        <p id="errorcode" </p>
                    </td>
                </tr>
                <tr>
                    <td>Employee ID:</td>
                    <td><input type="text" name="id" id="id" >
                        <p id="errorid" </p>
                    </td>
                </tr>
                <tr>
                    <td>Position / Job Title:</td>
                    <td>
                        <select name="job_title" id="job_title">
                            <option value="">Select a Job Title</option>
                            <option value="Admin">Admin</option>
                            <option value="Nursing Assistant">Certified Nursing Assistant</option>
                            <option value="Nurse">Geriatric Nurse</option>
                            <option value="Coordinator">Elder Care Coordinator</option>
                        </select>
                        <p id="errorjob_title" </p>
                    </td>
                </tr>
                <tr>
                    <td>Date of Joining:</td>
                    <td><input type="date" name="doj" id="doj" >
                        <p id="errordoj" </p>
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
                    <td><label for="address">Present Address:</label></td>
                    <td><textarea id="address" name="address"></textarea>
                        <p id="erroraddress" </p>
                    </td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <div>
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
        </fieldset>
    </form>
    <script src="../js/adminregvalid.js"></script> 
</body>

</html>