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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery for AJAX -->
</head>
<body>
    <div class="container">
        <h1>Elder Persons List</h1>

<!-- Search Bar -->
<div class="search-container">
    <input type="text" id="search" class="search-bar" placeholder="Search elder by name..." onkeyup="searchElder()">
</div>


        <div id="elder-list">
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
                <tbody id="elderTable">
                    <?php foreach ($elders as $elder): ?>
                        <?php $assigned_nurse = getAssignedNurse($elder['elder_ID']); ?>

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
                                        <option value=""><?= htmlspecialchars(!empty($assigned_nurse['Nurse_name']) ? $assigned_nurse['Nurse_name'] : 'Select Nurse') ?></option>
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
    </div>

    <!-- AJAX Script for Search -->
    <script>
        function searchElder() {
            var searchValue = document.getElementById("search").value;

            $.ajax({
                url: "../control/search_elder.php",
                type: "POST",
                data: { search: searchValue },
                success: function(response) {
                    $("#elderTable").html(response);
                }
            });
        }
    </script>

</body>
</html>
