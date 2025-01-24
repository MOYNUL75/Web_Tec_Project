function validateGuardianID() {
    var guardianID = document.getElementById("guardian_ID").value.trim();
    if (guardianID === "") {
        document.getElementById("errorguardian_ID").innerHTML = "Guardian ID is required.";
        return false;
    } else if (!/^\d+$/.test(guardianID)) {
        document.getElementById("errorguardian_ID").innerHTML = "Invalid ID: must be a positive integer";
        return false;
    }
    document.getElementById("errorguardian_ID").innerHTML = "";
    return true;
}

function validateAccountID() {
    var accountID = document.getElementById("account_ID").value.trim();
    if (accountID === "") {
        document.getElementById("erroraccount_ID").innerHTML = "Account ID is required.";
        return false;
    } else if (!/^\d+$/.test(accountID)) {
        document.getElementById("erroraccount_ID").innerHTML = "Invalid ID: must be a positive integer";
        return false;
    }
    document.getElementById("erroraccount_ID").innerHTML = "";
    return true;
}

function validateGuardianName() {
    var guardianName = document.getElementById("guardian_name").value.trim();
    if (guardianName === "") {
        document.getElementById("errorguardian_name").innerHTML = "Guardian Name is required.";
        return false;
    }
    document.getElementById("errorguardian_name").innerHTML = "";
    return true;
}

function validatePassword() {
    var password = document.getElementById("password").value.trim(); // Trim whitespace
    if (password === "") {
        document.getElementById("errorpassword").innerHTML = "Password cannot be empty";
        return false;
    } else if (password.length < 6) {
        document.getElementById("errorpassword").innerHTML = "Password must be at least 6 characters";
        return false;
    } else if (!/[\W_]/.test(password) || !/[0-9]/.test(password)) {
        document.getElementById("errorpassword").innerHTML = "Password must contain at least one special and one numeric character";
        return false;
    } else {
        document.getElementById("errorpassword").innerHTML = "";
    }
    return true;
}

function validateRelation() {
    var relation = document.getElementById("relation").value;
    if (relation === "") {
        document.getElementById("errorrelation").innerHTML = "Relation to Patient is required.";
        return false;
    }
    document.getElementById("errorrelation").innerHTML = "";
    return true;
}

function validateGuardianProfession() {
    document.getElementById("errorguardian_profession").innerHTML = "";
    return true; // Not required
}

function validateEmail() {
    var email = document.getElementById("email").value.trim();
    if (email === "") {
        document.getElementById("erroremail").innerHTML = "Email is required.";
        return false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        document.getElementById("erroremail").innerHTML = "Invalid email format.";
        return false;
    }
    document.getElementById("erroremail").innerHTML = "";
    return true;
}

function validateAddress() {
    var address = document.getElementById("address").value.trim();
    if (address === "") {
        document.getElementById("erroraddress").innerHTML = "Address is required";
        return false;
    }
    document.getElementById("erroraddress").innerHTML = "";
    return true;
}

function validateCity() {
    var city = document.getElementById("city").value;
    if (city === "") {
        document.getElementById("errorcity").innerHTML = "Please select a city";
        return false;
    }
    document.getElementById("errorcity").innerHTML = "";
    return true;
}

function validatePhone() {
    var phone = document.getElementById("phone").value.trim();
    if (phone === "") {
        document.getElementById("errorphone").innerHTML = "Phone number is required";
        return false;
    } else if (!/^[0-9]{11}$/.test(phone)) {
        document.getElementById("errorphone").innerHTML = "Phone Number must be 11 digits";
        return false;
    }
    document.getElementById("errorphone").innerHTML = "";
    return true;
}

function validateEmergencyContact() {
    var emergencyContact = document.getElementById("emergency_contact").value.trim();
    if (emergencyContact === "") {
        document.getElementById("erroremergency_contact").innerHTML = "Emergency Contact is required";
        return false;
    } else if (!/^[0-9]{11}$/.test(emergencyContact)) {
        document.getElementById("erroremergency_contact").innerHTML = "Emergency Contact must be 11 digits";
        return false;
    }
    document.getElementById("erroremergency_contact").innerHTML = "";
    return true;
}

function validateForm() {
    if (
        !validateGuardianID() ||
        !validateAccountID() ||
        !validateGuardianName() ||
        !validatePassword() ||
        !validateRelation() ||
        !validateGuardianProfession() ||
        !validateEmail() ||
        !validateAddress() ||
        !validateCity() ||
        !validatePhone() ||
        !validateEmergencyContact()
    ) {
        return false;
    }
    return true;
}