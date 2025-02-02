<?php
include "../model/view_elder_model.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $elder_ID = $_POST["elder_ID"];
    $nurse_id = $_POST["nurse_id"];

    if (assignNurseToElder($elder_ID, $nurse_id)) {
        header("Location: ../view/view_elder.php?success=1");
        exit();
    } else {
        header("Location: ../view/view_elder.php?error=1");
        exit();
    }
}
?>