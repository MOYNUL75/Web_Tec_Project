<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elder person</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .marquee {
            background: #004A99;
            color: white;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            overflow: hidden;
            white-space: nowrap;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #004A99;
            padding: 10px;
            color: white;
            border-radius: 8px 8px 0 0;
        }
        .menu {
            background: #004A99;
            padding: 10px;
            color: white;
            display: flex;
            justify-content: space-between;
        }
        .sidebar {
            width: 20%;
            float: left;
            background: #004A99;
            color: white;
            padding: 10px;
            min-height: 400px;
            border-radius: 0 0 0 8px;
        }
        .sidebar button {
            width: 100%;
            background: white;
            color: #004A99;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px 0;
            text-align: left;
        }
        .sidebar button:hover {
            background: #ddd;
        }
        .content {
            width: 75%;
            float: right;
            padding: 20px;
            background: white;
        }
        .login-info {
            background: #E8F5E9;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
        }
        .footer {
            clear: both;
            background: #004A99;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            border-radius: 0 0 8px 8px;
        }
        button {
            background: #004A99;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .marquee {
    background: #004A99;
    color: white;
    padding: 10px;
    text-align: center;
    font-weight: bold;
    overflow: hidden;
    position: relative;
    white-space: nowrap;
    border-radius: 5px;
}

.marquee-content {
    display: flex;
    animation: marquee 35s linear infinite;
    gap: 40px;
}

.marquee-content span {
    font-size: 18px;
    font-weight: normal;
}

@keyframes marquee {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
}

    </style>
</head>
<body>
<div class="marquee">
    <div class="marquee-content">
        <span>Welcome to the Elder Care Monitoring System. Providing health and wellness monitoring for the elderly.</span>
        <span>Your one-stop solution for medical information, services, and packages.</span>
        <span>Welcome to the Elder Care Monitoring System. Providing health and wellness monitoring for the elderly.</span>
        <span>Your one-stop solution for medical information, services, and packages.</span>
        <span>Contact us today for personalized care and support for your loved ones.</span>
        <span>Access a wide range of services, including home visits, nursing, and medical scheduling.</span>
        <span>Our mission: Ensuring quality and compassionate care for elderly individuals.</span>
   
    </div>
</div>


    <div class="container">
        <div class="header">
            <h1>Elder Person</h1>
        </div>
        <div class="menu">
            <span>Elder Person Information</span>
            <a href="../view/user_selection01.php">
            <button type="button">Log Out</button>
            </a>

        </div>
        <div class="sidebar">
        <a href="../view/elder_deshboard.php">
        <button type="button">Medical Information</button>
        </a>
        <a href="../view/elder_services.php">
            <button type="button">Services</button>
        </a>
        <a href="../view/enroll_package.php">
            <button type="button">Enroll Package</button>
        </a>
        <a href="../view/available_packages01.php">
            <button type="button">Available Package</button>
        </a>
        <a href="../view/nurse_all.php">
            <button type="button">Nurse</button>
        </a>
        <a href="../view/medication_schedule01.php">
            <button type="button">Medication Schedule</button>
        </a>

        </div>
        <div class="content">
            <div class="login-info">
                <h3>Elder Information</h3>
                <p><strong>User Name:</strong> Moynul</p>
            </div>
        </div>
        <div class="footer">
            <p>Elder Care Monitoring System &copy; 2025</p>
        </div>
    </div>
</body>
</html>
