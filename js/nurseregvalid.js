function validateNurse_name() {
    var Nurse_name = document.getElementById("Nurse_name").value.trim();
    if (Nurse_name === "") {
        document.getElementById("errorname").innerHTML = "Invalid name: cannot be empty";
        return false;
    }
    document.getElementById("errorname").innerHTML = "";
    return true;
}

function validateGender() {
    var gender = document.querySelector('input[name="Gender"]:checked');
    if (!gender) {
        document.getElementById("errorgender").innerHTML = "Please select a gender";
        return false;
    }
    document.getElementById("errorgender").innerHTML = "";
    return true;
}

function validateAge() {
    var Age = document.getElementById("Age").value;
    if (Age <= 0 || isNaN(Age)) {
        document.getElementById("errorage").innerHTML = "Age must be a positive number";
        return false;
    }
    document.getElementById("errorage").innerHTML = "";
    return true;
}

function validateEmail() {
    var email = document.getElementById("email").value.trim();
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === "" || !emailPattern.test(email)) {
        document.getElementById("erroremail").innerHTML = "Invalid email";
        return false;
    }
    document.getElementById("erroremail").innerHTML = "";
    return true;
}

function validatePassword() {
    var password = document.getElementById("password").value;
    if (password.length < 6) {
        document.getElementById("errorpassword").innerHTML = "Password must be at least 6 characters long";
        return false;
    }
    document.getElementById("errorpassword").innerHTML = "";
    return true;
}

function validatenurse_id() {
    var nurse_id = document.getElementById("nurse_id").value;
    if (!/^\d+$/.test(nurse_id)) {
        document.getElementById("errornurse_id").innerHTML = "Invalid ID: must be an integer";
        return false;
    }
    document.getElementById("errornurse_id").innerHTML = "";
    return true;
}

function validateQualifications() {
    var qualifications = document.getElementById("qualifications[]").value;
    if (qualifications.length === 0) {
        document.getElementById("errorqualification").innerHTML = "Please select at least one qualification";
        return false;
    }
    document.getElementById("errorqualification").innerHTML = "";
    return true;
}

function validateYears() {
    var years = document.getElementById("Years_experience").value;
    if (years < 0 || isNaN(years)) {
        document.getElementById("erroryears").innerHTML = "Years of experience cannot be negative";
        return false;
    }
    document.getElementById("erroryears").innerHTML = "";
    return true;
}

function validateSpecialization() {
    var specialization = document.getElementById("specialization").value.trim();
    if (specialization.length > 0 && specialization.length < 3) {
        document.getElementById("errorspecialization").innerHTML = "Specialization should be at least 3 characters long";
        return false;
    }
    document.getElementById("errorspecialization").innerHTML = "";
    return true;
}

function validateAddress() {
    var Address = document.getElementById("Address").value.trim();
    if (Address === "") {
        document.getElementById("erroraddress").innerHTML = "Address is required";
        return false;
    }
    document.getElementById("erroraddress").innerHTML = "";
    return true;
}

function validateCity() {
    var City = document.getElementById("City").value;
    if (City.length === 0) {
        document.getElementById("errorcity").innerHTML = "Please select a City";
        return false;
    }
    document.getElementById("errorcity").innerHTML = "";
    return true;
}

function validatePhone() {
    var Phone = document.getElementById("Phone").value.trim();
    if (Phone === "") {
        document.getElementById("errorphone").innerHTML = "Phone number is required";
        return false;
    }
    document.getElementById("errorphone").innerHTML = "";
    return true;
}

function validateDays() {
    var days = document.getElementById("available_days").value;
    if (days.length === 0) {
        document.getElementById("errordays").innerHTML = "Please select at least one available day";
        return false;
    }
    document.getElementById("errordays").innerHTML = "";
    return true;
}

function validateshift() {
    var shift = document.getElementById("shift").value;
    if (shift === "") {
        document.getElementById("errorshift").innerHTML = "Please select a shift";
        return false;
    }
    document.getElementById("errorshift").innerHTML = "";
    return true;
}

function validateserviceType() {
    var services = document.getElementById("service_type").value;
    if (services.length === 0) {
        document.getElementById("errortype").innerHTML = "Please select at least one service type";
        return false;
    }
    document.getElementById("errortype").innerHTML = "";
    return true;
}

function validation() {
    if (
        !validateNurse_name() ||
        !validateGender() ||
        !validateAge() ||
        !validateEmail() ||
        !validatePassword() ||
        !validatenurse_id() ||
        !validateQualifications() ||
        !validateYears() ||
        !validateAddress() ||
        !validateCity() ||
        !validatePhone() ||
        !validateDays() ||
        !validateshift() ||
        !validateserviceType() ||
        !validateSpecialization()
    ) {
        return false; // Prevent form submission if any validation fails
    }
    return true; // Allow form submission if all validations pass
}
