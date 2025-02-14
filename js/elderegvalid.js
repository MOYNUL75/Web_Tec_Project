function validateGuardianName() {
    var GuardianName = document.getElementById("GuardianName").value;
    var nameRegex = /^[a-zA-Z\s]+$/;

    if (GuardianName === "" || !nameRegex.test(GuardianName)) {
        document.getElementById("errorGuardianName").innerHTML = "Guardian Name must only contain letters and spaces.";
        return false;
    } else {
        document.getElementById("errorGuardianName").innerHTML = "";
        return true;
    }
}

function validateEmail() {
    var email = document.getElementById("email").value;
    var emailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

    if (email === "" || !emailRegex.test(email)) {
        document.getElementById("errorEmail").innerHTML = "Please enter a valid Gmail address.";
        return false;
    } else {
        document.getElementById("errorEmail").innerHTML = "";
        return true;
    }
}

function validateFullName() {
    var fullName = document.getElementById("fullName").value;
    var nameRegex = /^[a-zA-Z\s]+$/;

    if (fullName === "" || !nameRegex.test(fullName)) {
        document.getElementById("errorFullName").innerHTML = "Full Name must only contain letters and spaces.";
        return false;
    } else {
        document.getElementById("errorFullName").innerHTML = "";
        return true;
    }
}

function validateGender() {
    var gender = document.querySelector('input[name="gender"]:checked');
    if (!gender) {
        document.getElementById("errorGender").innerHTML = "Please select a gender.";
        return false;
    } else {
        document.getElementById("errorGender").innerHTML = "";
        return true;
    }
}

function validateDOB() {
    var dob = document.querySelector('input[name="Elder_dob"]').value;
    if (!dob) {
        document.getElementById("errorDOB").innerHTML = "Please enter the date of birth.";
        return false;
    } else {
        document.getElementById("errorDOB").innerHTML = "";
        return true;
    }
}

function validatePhoneNumber() {
    var phone = document.getElementById("phone").value;
    var phoneRegex = /^[0-9]{11}$/;

    if (phone === "" || !phoneRegex.test(phone)) {
        document.getElementById("errorPhone").innerHTML = "Please enter a valid 11-digit phone number.";
        return false;
    } else {
        document.getElementById("errorPhone").innerHTML = "";
        return true;
    }
}

function validateAddress() {
    var address = document.getElementById("address").value;

    if (address.trim() === "") {
        document.getElementById("errorAddress").innerHTML = "Please enter an address.";
        return false;
    } else {
        document.getElementById("errorAddress").innerHTML = "";
        return true;
    }
}

function validateMobility() {
    var mobility = document.querySelector('input[name="mobility"]:checked');
    if (!mobility) {
        document.getElementById("errorMobility").innerHTML = "Please select the mobility level.";
        return false;
    } else {
        document.getElementById("errorMobility").innerHTML = "";
        return true;
    }
}

function validateEmergencyName() {
    var name = document.getElementById("emergencyName").value;

    if (name === "") {
        document.getElementById("errorEmergencyName").innerHTML = "Please enter the emergency contact name.";
        return false;
    } else {
        document.getElementById("errorEmergencyName").innerHTML = "";
        return true;
    }
}


function validateEmergencyRelationship() {
    var relationship = document.getElementById("emergencyRelationship").value;

    if (relationship === "") {
        document.getElementById("errorEmergencyRelationship").innerHTML = "Please enter the relationship.";
        return false;
    } else {
        document.getElementById("errorEmergencyRelationship").innerHTML = "";
    return true;
    }
}

function validateEmergencyPhone() {
    var phone = document.getElementById("emergencyPhone").value;
    var phoneRegex = /^[0-9]{11}$/;

    if (phone === "" || !phoneRegex.test(phone)) {
        document.getElementById("errorEmergencyPhone").innerHTML = "Please enter a valid 11-digit phone number.";
        return false;
    } else {
        document.getElementById("errorEmergencyPhone").innerHTML = "";
    return true;
    }
}


/*
function validateEmergencyContact() {
    var name = document.getElementById("emergencyName").value;
    var relationship = document.getElementById("emergencyRelationship").value;
    var phone = document.getElementById("emergencyPhone").value;
    var phoneRegex = /^[0-9]{11}$/;

    if (name === "") {
        document.getElementById("errorEmergencyName").innerHTML = "Please enter the emergency contact name.";
        return false;
    } else {
        document.getElementById("errorEmergencyName").innerHTML = "";
    }

    if (relationship === "") {
        document.getElementById("errorEmergencyRelationship").innerHTML = "Please enter the relationship.";
        return false;
    } else {
        document.getElementById("errorEmergencyRelationship").innerHTML = "";
    }

    if (phone === "" || !phoneRegex.test(phone)) {
        document.getElementById("errorEmergencyPhone").innerHTML = "Please enter a valid 11-digit phone number.";
        return false;
    } else {
        document.getElementById("errorEmergencyPhone").innerHTML = "";
    }
    return true;
}
*/
function validatePhysicianContact() {
    var phone = document.getElementById("physicianContact").value;
    var phoneRegex = /^[0-9]{11}$/;

    if (phone === "" || !phoneRegex.test(phone)) {
        document.getElementById("errorPhysicianContact").innerHTML = "Please enter a valid 11-digit phone number.";
        return false;
    } else {
        document.getElementById("errorPhysicianContact").innerHTML = "";
        return true;
    }
}

function validateForm() {
    return (
        validateGuardianName() ||
        validateEmail() ||
        validateFullName() ||
        validateGender() ||
        validateDOB() ||
        validatePhoneNumber() ||
        validateAddress() ||
        validateMobility() ||
        validateEmergencyName() ||
        validateEmergencyRelationship() ||
        validateEmergencyPhone() ||
        validatePhysicianContact()
    );
}
