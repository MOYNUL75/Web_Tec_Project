<?php include '..\control\adminregvalid.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="../css/mystyle1.css">
</head>


<body>
    <h2>Admin Registration Form</h2>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

        <fieldset>
            <legend>
                <h3>Login Information</h3>
            </legend>
            <table>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" id="username" name="username" required></td>
                </tr>
                <tr>
                    <td><label for="password" > Password: </label></td>
                    <td><input type="password" id="password" name="password" placeholder= "Str0ng_P@ss"  required></td>
                </tr>
    
            </table>
        </fieldset>


        <!-- Personal Information Section -->
        <fieldset>
            <legend>
                <h3>Personal Information</h3>
            </legend>
            <table>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" required></td>
                </tr>
                <tr>
                    <td>Father's Name:</td>
                    <td><input type="text" name="father_name" required></td>
                </tr>
                <tr>
                    <td>Mother's Name:</td>
                    <td><input type="text" name="mother_name" required></td>
                </tr>
                <tr>
                    <td>NID Number:</td>
                    <td><input type="number" name="nid" required></td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" name="dob" required></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td><input type="radio" name="gender" value="female">Female
                        <input type="radio" name="gender" value="male">Male
                        <input type="radio" name="gender" value="other">Other
                    </td>
                </tr>
                <tr>
                    <td>Permanent Address:</td>
                    <td><textarea name="address" required></textarea></td>
                </tr>
                <tr>
                    <td>Upload Image:</td>
                    <td><input type="file" name="image" accept="image/*"></td>
                </tr>


            </table>
        </fieldset>

        <!-- Professional Information Section -->
        <fieldset>
            <legend>
                <h3>Professional Information</h3>
            </legend>
            <table>
                <tr>
                    <td>Certification Code:</td>
                    <td><input type="text" name="code" required></td>
                </tr>
                <tr>
                    <td>Employee ID:</td>
                    <td><input type="text" name="id" required></td>
                </tr>

                <tr>
    <td>Position / Job Title:</td>
    <td>
        <select name="job_title">  <option value="Admin">Admin</option>
            <option value="Nursing Assistant">Certified Nursing Assistant</option>
            <option value="Nurse">Geriatric Nurse</option>
            <option value="Coordinator">Elder Care Coordinator</option>
        </select>
    </td>
</tr>
                <tr>
                    <td>Date of Joining:</td>
                    <td><input type="date" name="doj" required></td>
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
                    <td><input type="tel" id="phone" name="phone" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email Address:</label></td>
                    <td><input type="email" id="email" name="email"></td>
                </tr>
                <tr>
                    <td><label for="address">Present Address:</label></td>
                    <td><textarea id="address" name="address"></textarea></td>
                </tr>
            </table>
        </fieldset>

        <!-- Emergency Contact 
        <fieldset>
            <legend><h3>Emergency Contact</h3></legend>
            <table>
                <tr>
                    <td><label for="emergencyName">Name:</label></td>
                    <td><input type="text" id="emergencyName" name="emergencyName" required></td>
                </tr>
                <tr>
                    <td><label for="relationship">Relationship:</label></td>
                    <td><input type="text" id="relationship" name="relationship"></td>
                </tr>
                <tr>
                    <td><label for="emergencyPhone">Phone Number:</label></td>
                    <td><input type="tel" id="emergencyPhone" name="emergencyPhone" required></td>
                </tr>
            </table>
        </fieldset>     
        -->


        <fieldset>
            <div>
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
        </fieldset>
    </Form>
   
</body>

</html>