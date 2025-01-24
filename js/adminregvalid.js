function validateUsername() {
    var username = document.getElementById("username").value.trim();
    if (username === "") {
        document.getElementById("errorusername").innerHTML = "Username is required.";
        return false;
    } else if (username.length < 5) {
        document.getElementById("errorusername").innerHTML = "Username must be at least 5 characters long.";
        return false;
    }
    document.getElementById("errorusername").innerHTML = "";
    return true;
}

function validatePassword() {
    var password = document.getElementById("password").value;
    if (password === "") {
        document.getElementById("errorpassword").innerHTML = "Password is required.";
        return false;
    } else if (password.length < 6 || !/[\W_]/.test(password) || !/[0-9]/.test(password)) {
        document.getElementById("errorpassword").innerHTML = "Password must be more than 6 characters long, contain at least one numeric character, and include at least one special character (e.g., @, #, $, etc.).";
        return false;
    }
    document.getElementById("errorpassword").innerHTML = "";
    return true;
}

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

function validateFatherName() {
    var fatherName = document.getElementById("father_name").value.trim();
    if (fatherName === "") {
        document.getElementById("errorfather_name").innerHTML = "Father's name is required.";
        return false;
    } else if (/[^a-zA-Z\s]/.test(fatherName)) {
        document.getElementById("errorfather_name").innerHTML = "Father's Name must contain only characters and spaces.";
        return false;
    }
    document.getElementById("errorfather_name").innerHTML = "";
    return true;
}

function validateMotherName() {
    var motherName = document.getElementById("mother_name").value.trim();
    if (motherName === "") {
        document.getElementById("errormother_name").innerHTML = "Mother's name is required.";
        return false;
    } else if (/[^a-zA-Z\s]/.test(motherName)) {
        document.getElementById("errormother_name").innerHTML = "Mother's Name must contain only characters and spaces.";
        return false;
    }
    document.getElementById("errormother_name").innerHTML = "";
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

function validateCode() {
    var code = document.getElementById("code").value.trim();
    if (code === "") {
        document.getElementById("errorcode").innerHTML = "Certification code is required.";
        return false;
    }
    document.getElementById("errorcode").innerHTML = "";
    return true;
}

function validateID() {
    var id = document.getElementById("id").value.trim();
    if (id === "") {
        document.getElementById("errorid").innerHTML = "Employee ID is required.";
        return false;
    }
    document.getElementById("errorid").innerHTML = "";
    return true;
}

function validateJobTitle() {
    var jobTitle = document.getElementsByName("job_title")[0].value; // Access select element by name
    if (jobTitle === "") {
        document.getElementById("errorjob_title").innerHTML = "Job title is required.";
        return false;
    }
    document.getElementById("errorjob_title").innerHTML = "";
    return true;
}

function validateDOJ() {
    var doj = document.getElementById("doj").value;
    if (doj === "") {
        document.getElementById("errordoj").innerHTML = "Date of joining is required.";
        return false;
    }
    document.getElementById("errordoj").innerHTML = "";
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
        !validateUsername() ||
        !validatePassword() ||
        !validateFullName() ||
        !validateFatherName() ||
        !validateMotherName() ||
        !validateNID() ||
        !validateDOB() ||
        !validateGender() ||
        !validateAddress() ||
        !validateCode() ||
        !validateID() ||
        !validateJobTitle() ||
        !validateDOJ() ||
        !validatePhone() ||
        !validateEmail()
    ) {
        return false;
    }
    return true;
}