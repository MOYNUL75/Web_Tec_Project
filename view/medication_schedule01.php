<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Medication Schedule</title>
    <link rel="stylesheet" href="../css/medication_schedule01.css">
</head>
<body>
    <div class="header">
        <h1>Upcoming Medication Schedule</h1>
    </div>

    <div class="main-content">
        <div class="medication-table">
            <table>
                <thead>
                    <tr>
                        <th>Medicine Name</th>
                        <th>Morning</th>
                        <th>Evening</th>
                        <th>Night</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Paracetamol</td>
                        <td><input type="checkbox" name="morning"></td>
                        <td><input type="checkbox" name="evening"></td>
                        <td><input type="checkbox" name="night"></td>
                    </tr>
                    <tr>
                        <td>Amoxicillin</td>
                        <td><input type="checkbox" name="morning"></td>
                        <td><input type="checkbox" name="evening"></td>
                        <td><input type="checkbox" name="night"></td>
                    </tr>
                    <tr>
                        <td>Metformin</td>
                        <td><input type="checkbox" name="morning"></td>
                        <td><input type="checkbox" name="evening"></td>
                        <td><input type="checkbox" name="night"></td>
                    </tr>
                    <tr>
                        <td>Ibuprofen</td>
                        <td><input type="checkbox" name="morning"></td>
                        <td><input type="checkbox" name="evening"></td>
                        <td><input type="checkbox" name="night"></td>
                    </tr>
                    <tr>
                        <td>Atorvastatin</td>
                        <td><input type="checkbox" name="morning"></td>
                        <td><input type="checkbox" name="evening"></td>
                        <td><input type="checkbox" name="night"></td>
                    </tr>
                    <tr>
                        <td>Lisinopril</td>
                        <td><input type="checkbox" name="morning"></td>
                        <td><input type="checkbox" name="evening"></td>
                        <td><input type="checkbox" name="night"></td>
                    </tr>
                    <tr>
                        <td>Aspirin</td>
                        <td><input type="checkbox" name="morning"></td>
                        <td><input type="checkbox" name="evening"></td>
                        <td><input type="checkbox" name="night"></td>
                    </tr>
                    <tr>
                        <td>Omeprazole</td>
                        <td><input type="checkbox" name="morning"></td>
                        <td><input type="checkbox" name="evening"></td>
                        <td><input type="checkbox" name="night"></td>
                    </tr>
                    <tr>
                        <td>Losartan</td>
                        <td><input type="checkbox" name="morning"></td>
                        <td><input type="checkbox" name="evening"></td>
                        <td><input type="checkbox" name="night"></td>
                    </tr>
                    <tr>
                        <td>Levothyroxine</td>
                        <td><input type="checkbox" name="morning"></td>
                        <td><input type="checkbox" name="evening"></td>
                        <td><input type="checkbox" name="night"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="action-buttons">
            <button onclick="addRow()">Add</button>
            <button onclick="removeRow()">Remove</button>
        </div>
    </div>

    <script>
        function addRow() {
            const table = document.querySelector(".medication-table table tbody");
            const newRow = document.createElement("tr");
            newRow.innerHTML = ` 
                <td><input type="text" placeholder="Medicine Name"></td>
                <td><input type="checkbox" name="morning"></td>
                <td><input type="checkbox" name="evening"></td>
                <td><input type="checkbox" name="night"></td>
            `;
            table.appendChild(newRow);
        }

        function removeRow() {
            const table = document.querySelector(".medication-table table tbody");
            if (table.rows.length > 0) {
                table.deleteRow(table.rows.length - 1);
            }
        }
    </script>
</body>
</html>
