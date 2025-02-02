function validateFullName() {
    var fullName = document.getElementById("full_name").value.trim();
    if (fullName === "") {
        document.getElementById("errorfull_name").innerHTML = "Full name is required.";
        return false;
    } else if (/[^a-zA-Z\s]/.test(fullName)) { // Check for non-alphabetic characters and spaces
        document.getElementById("errorfull_name").innerHTML = "Name must contain only characters and spaces.";
        return false;
    }
    document.getElementById("errorfull_name").innerHTML = "";
    return true;
}
 
 
 
 
function validateNID() {
    var nid = document.getElementById("nid").value;
    if (nid === "" || isNaN(nid)) {
        document.getElementById("errornid").innerHTML = "Valid NID number is required.";
        return false;
    }
    document.getElementById("errornid").innerHTML = "";
    return true;
}
 
function validateDOB() {
    var dob = document.getElementById("dob").value;
    if (dob === "") {
        document.getElementById("errordob").innerHTML = "Date of birth is required.";
        return false;
    }
    document.getElementById("errordob").innerHTML = "";
    return true;
}
 
function validateGender() {
    var genderRadios = document.getElementsByName("gender");
    var isChecked = false;
    for (var i = 0; i < genderRadios.length; i++) {
        if (genderRadios[i].checked) {
            isChecked = true;
            break;
        }
    }
    if (!isChecked) {
        document.getElementById("errorgender").innerHTML = "Gender is required.";
        return false;
    }
    document.getElementById("errorgender").innerHTML = "";
    return true;
}
 
function validateAddress() {
    var address = document.getElementById("address").value.trim();
    if (address === "") {
        document.getElementById("erroraddress").innerHTML = "Permanent address is required.";
        return false;
    }
    document.getElementById("erroraddress").innerHTML = "";
    return true;
}
 
 
 
function validatePhone() {
    var phone = document.getElementById("phone").value.trim();
    if (phone === "") {
        document.getElementById("errorphone").innerHTML = "Phone number is required.";
        return false;
    } else if (!/^[0-9]{11}$/.test(phone)) {
        document.getElementById("errorphone").innerHTML = "Phone number must be 11 digits.";
        return false;
    }
    document.getElementById("errorphone").innerHTML = "";
    return true;
}
 
function validateEmail() {
    var email = document.getElementById("email").value.trim();
    if (email !== "" && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { // Only validate if not empty
        document.getElementById("erroremail").innerHTML = "Invalid email address.";
        return false;
    }
    document.getElementById("erroremail").innerHTML = "";
    return true;
}
 
function validation() {
    if (
        !validateFullName() ||
        !validateNID() ||
        !validateDOB() ||
        !validateGender() ||
        !validateAddress() ||
        !validatePhone() ||
        !validateEmail()
    ) {
        return false;
    }
    return true;
}