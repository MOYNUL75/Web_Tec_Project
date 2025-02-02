<?php
include "../model/view_elder_model.php";

if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $elders = searchElders($searchTerm);
    $nurses = getAllNurses();

    foreach ($elders as $elder) {
        $assigned_nurse = getAssignedNurse($elder['elder_ID']);
        echo "<tr>
                <td>" . htmlspecialchars($elder['full_name']) . "</td>
                <td>" . htmlspecialchars($elder['gender']) . "</td>
                <td>" . htmlspecialchars($elder['Elder_dob']) . "</td>
                <td>" . htmlspecialchars($elder['Phone']) . "</td>
                <td>" . htmlspecialchars($elder['Address']) . "</td>
                <td>
                    <form action='../control/assign_nurse_control.php' method='post'>
                        <input type='hidden' name='elder_ID' value='" . $elder['elder_ID'] . "'>
                        <select name='nurse_id' required>
                            <option value=''>" . htmlspecialchars(!empty($assigned_nurse['Nurse_name']) ? $assigned_nurse['Nurse_name'] : 'Select Nurse') . "</option>";
                            
                            foreach ($nurses as $nurse) {
                                echo "<option value='" . $nurse['nurse_id'] . "'>" . htmlspecialchars($nurse['Nurse_name']) . "</option>";
                            }
        echo "          </select>
                        <button type='submit'>Assign</button>
                    </form>
                </td>
            </tr>";
    }
}
?>
