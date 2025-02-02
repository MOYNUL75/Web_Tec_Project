<?php
include '../control/medicineValid.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Form</title>
    <link rel="stylesheet" href="../css/medicine.css">
   
</head>
<body>
    <div class="form-container">
        <h2>Medicine Information</h2>
        <form action="" method="post">
            <table>
                <tr>
                    <th>Medicine Name</th>
                    <th>Dosage</th>
                    <th>Timing</th>
                    <th>Duration</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
                <tr>
                    <td><input type="text" name="medicine_name" ></td>
                    <td><input type="text" name="dosage" ></td>
                    <td>
                        <select name="timing" >
                            <option value="Morning">Morning</option>
                            <option value="Afternoon">Afternoon</option>
                            <option value="Evening">Evening</option>
                            <option value="Night">Night</option>
                        </select>
                    </td>
                    <td><input type="text" name="duration" ></td>
                    <td><input type="date" name="start_date" ></td>
                    <td><input type="date" name="end_date" ></td>
                </tr>
            </table>
            </a>
            <a href="elder_deshboardMain.php">
                <button type="button">Back</button>
            </a>
            <button type="reset">Reset</button>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>