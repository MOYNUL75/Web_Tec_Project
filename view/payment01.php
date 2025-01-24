<!DOCTYPE html>
<html>
<head>
    <title>Payment Registration Form</title>
</head>
<body>
<h2>Payment Information</h2>
<form action="../control/payment_validation01.php" method="post">
    <fieldset>
        <legend>Payment Details</legend>
        <table>
            <tr>
                <td><label for="payment_amount">Payment Amount:</label></td>
                <td><input type="number" id="payment_amount" name="payment_amount" step="0.01" required></td>
            </tr>
            <tr>
                <td><label for="payment_date">Payment Date:</label></td>
                <td><input type="date" id="payment_date" name="payment_date" required></td>
            </tr>
            <tr>
                <td><label for="payment_method">Payment Method:</label></td>
                <td>
                    <select id="payment_method" name="payment_method" required>
                        <option value="Cash">Cash</option>
                        <option value="Card">Card</option>
                        <option value="Online">Online</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="guardian_ID">Guardian ID:</label></td>
                <td><input type="number" id="guardian_ID" name="guardian_ID" required></td>
            </tr>
            <tr>
                <td><label for="service_ID">Service ID:</label></td>
                <td><input type="number" id="service_ID" name="service_ID" required></td>
            </tr>
            <tr>
                <td><label for="transaction_ID">Transaction ID:</label></td>
                <td><input type="text" id="transaction_ID" name="transaction_ID"></td>
            </tr>
            <tr>
                <td><label for="status">Payment Status:</label></td>
                <td>
                    <select id="status" name="status">
                        <option value="Pending">Pending</option>
                        <option value="Completed">Completed</option>
                        <option value="Failed">Failed</option>
                    </select>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <table>
            <tr>
                <td><input type="submit" value="Submit Payment"></td>
                <td><input type="reset" value="Reset"></td>
            </tr>
        </table>
    </fieldset>
</form>
</body>
</html>