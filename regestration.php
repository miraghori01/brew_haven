<?php
session_start();
$conn = mysqli_connect("localhost:3306", "root", "", "brew_haven");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$msg = "";

if (isset($_POST['register_btn'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    if ($password !== $confirm_password) {
        $msg = "Password and Confirm Password do not match!";
    } else {
        $check_email = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($check_email) > 0) {
            $msg = "Email already registered!";
        } else {
            $sql = "INSERT INTO users (fullname, email, password, confirm_password, phone, address, city, pincode, gender) 
                    VALUES ('$fullname', '$email', '$password', '$confirm_password', '$phone', '$address', '$city', '$pincode', '$gender')";
            
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Registration Successful!'); window.location.href='login.php';</script>";
            } else {
                $msg = "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Brew Haven</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085');
            background-size: cover; background-attachment: fixed;
            display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px;
        }
        .reg-card {
            background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(15px);
            padding: 30px; border-radius: 20px; width: 550px;
            border: 1px solid rgba(255, 255, 255, 0.2); color: white; box-shadow: 0 15px 35px rgba(0,0,0,0.5);
        }
        .reg-card h2 { text-align: center; color: #d7ccc8; margin-bottom: 20px; font-size: 28px; }
        .grid-form { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .input-box { margin-bottom: 5px; }
        .full-width { grid-column: span 2; }
        input, textarea, select {
            width: 100%; padding: 12px; background: rgba(255, 255, 255, 0.2);
            border: none; border-radius: 8px; color: white; outline: none; font-size: 14px;
        }
        select option { background-color: #3e2723; color: white; }
        .reg-btn {
            grid-column: span 2; padding: 12px; background: #795548; color: white;
            border: none; border-radius: 10px; font-weight: bold; cursor: pointer; transition: 0.3s; margin-top: 10px;
        }
        .reg-btn:hover { background: #5d4037; transform: translateY(-2px); }
        .alert { background: rgba(255,0,0,0.2); color: #ff8a80; padding: 10px; border-radius: 8px; margin-bottom: 15px; text-align: center; font-size: 14px; }
        .login-link { text-align: center; margin-top: 15px; font-size: 14px; }
        a { color: #d7ccc8; text-decoration: none; font-weight: bold; }
        /* બધા ઇનપુટ ફિલ્ડના પ્લેસહોલ્ડર માટે */
input::placeholder, 
textarea::placeholder {
    color: #ffffff !important; /* અક્ષરોનો રંગ એકદમ સફેદ */
    opacity: 0.9;             /* થોડી પારદર્શકતા */
}

/* જ્યારે યુઝર ટાઈપ કરે ત્યારે અક્ષરોનો રંગ */
input, textarea, select {
    color: #ffffff !important;
}

/* જેન્ડર ડ્રોપડાઉન (Select) ના અક્ષરો માટે */
select {
    color: #ffffff !important;
}

/* ડ્રોપડાઉન વિકલ્પો (Options) માટે ડાર્ક બેકગ્રાઉન્ડ */
select option {
    background-color: #3e2723; /* ડાર્ક કોફી કલર */
    color: white;
}
    </style>
</head>
<body>
<div class="reg-card">
    <h2>Create Account</h2>
    <?php if($msg != "") { echo "<div class='alert'>$msg</div>"; } ?>
    <form method="POST" class="grid-form">
        <div class="input-box full-width"><input type="text" name="fullname" placeholder="Full Name" required></div>
        <div class="input-box"><input type="email" name="email" placeholder="Email" required></div>
        <div class="input-box"><input type="text" name="phone" placeholder="Phone Number" required></div>
        <div class="input-box"><input type="password" name="password" placeholder="Password" required></div>
        <div class="input-box"><input type="password" name="confirm_password" placeholder="Confirm Password" required></div>
        <div class="input-box"><input type="text" name="city" placeholder="City" required></div>
        <div class="input-box"><input type="text" name="pincode" placeholder="Pincode" required></div>
        <div class="input-box full-width">
            <select name="gender" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="input-box full-width"><textarea name="address" placeholder="Complete Address" rows="2" required></textarea></div>
        <button type="submit" name="register_btn" class="reg-btn">Register Now</button>
    </form>
    <p class="login-link">Already a member? <a href="login.php">Login here</a></p>
</div>
</body>
</html>