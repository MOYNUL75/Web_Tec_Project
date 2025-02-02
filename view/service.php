<?php //include "../control/services_validation.php" 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Form</title>
 
    <link rel="stylesheet" href="../css/services.css">
 
 
</head>
<body>
 
    <form action="../control/services_validation.php" method="post">
   
        <fieldset>
            <legend>Service Identification</legend>
            
 
            <label for="service_name">Service Name:</label><br>
            <input type="text" id="service_name" name="service_name" required><br><br>
        </fieldset>
 
        <fieldset>
            <legend>Service Details</legend>
            <label for="details">Details:</label><br>
            <textarea id="details" name="details"></textarea><br><br>
        </fieldset>
 
        <fieldset>
            <legend>Service Category</legend>
            <p>Select the service category(ies):</p>
            <input type="checkbox" id="full_time_care_cat" name="service_category[]" value="Full-Time Care">
            <label for="full_time_care_cat">Full-Time Care</label><br>
            <input type="checkbox" id="day_care_cat" name="service_category[]" value="Day Care Only">
            <label for="day_care_cat">Day Care Only</label><br>
            <input type="checkbox" id="home_visits_cat" name="service_category[]" value="Home Visits">
            <label for="home_visits_cat">Home Visits</label><br>
        </fieldset>
 
        <fieldset>
            <legend>Service Pricing and Duration</legend>
            <label for="service_charge">Service Charge:</label><br>
            <input type="number" id="service_charge" name="service_charge" step="0.01" required><br><br>
 
            <label for="service_duration_from">Service Duration (From):</label><br>
            <input type="date" id="service_duration_from" name="service_duration_from" required><br><br>
 
            <label for="service_duration_to">Service Duration (To):</label><br>
            <input type="date" id="service_duration_to" name="service_duration_to" required><br><br>
        </fieldset>
 
        <fieldset>
            <legend>Service Status and Availability</legend>
            <label for="service_availability">Service Availability:</label><br>
            <select id="service_availability" name="service_availability">
                <option value="Available">Available</option>
                <option value="Not Available">Not Available</option>
            </select><br><br>
 
            <label for="service_status">Service Status:</label><br>
            <select id="service_status" name="service_status">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select><br><br>
        </fieldset>
 
        <input type="submit">
    </form>
 
</body>
</html>