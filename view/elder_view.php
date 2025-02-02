<?php
include "../model/view_elder_model.php";
 
$elders = getAllElders();
$nurses = getAllNurses();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Elders</title>
    <link rel="stylesheet" href="../css/view_elder.css">
</head>
<body>
    <div class="container">
        <h1>Elder Persons List</h1>
        <?php if (isset($_GET['success'])): ?>
            <p class="success-msg">Nurse assigned successfully!</p>
        <?php elseif (isset($_GET['error'])): ?>
            <p class="error-msg">Failed to assign nurse. Try again.</p>
        <?php endif; ?>
 
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Assign Nurse</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($elders as $elder): ?>
                    <tr>
                        <td><?= htmlspecialchars($elder['full_name']) ?></td>
                        <td><?= htmlspecialchars($elder['gender']) ?></td>
                        <td><?= htmlspecialchars($elder['Elder_dob']) ?></td>
                        <td><?= htmlspecialchars($elder['Phone']) ?></td>
                        <td><?= htmlspecialchars($elder['Address']) ?></td>
                        <td>
                            <form action="../control/assign_nurse_control.php" method="post">
                                <input type="hidden" name="elder_ID" value="<?= $elder['elder_ID'] ?>">
                                <select name="nurse_id" required>
                                    <option value="">Select Nurse</option>
                                    <?php foreach ($nurses as $nurse): ?>
                                        <option value="<?= $nurse['nurse_id'] ?>">
                                            <?= htmlspecialchars($nurse['Nurse_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="submit">Assign</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>