<?php
session_start();
$conn = mysqli_connect("localhost:3306", "root", "", "brew_haven");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$error_msg = "";

if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user_data['id']; // ID સ્ટોર કરવો પ્રોફાઇલ માટે જરૂરી છે
    $_SESSION['user_name'] = $user_data['fullname'];
    echo "<script>alert('Login Successful!'); window.location.href='index.php';</script>";
} else {
        $error_msg = "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Brew Haven</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085');
            background-size: cover; height: 100vh; display: flex; justify-content: center; align-items: center;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(15px);
            padding: 40px; border-radius: 20px; width: 380px; text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2); color: white; box-shadow: 0 15px 35px rgba(0,0,0,0.5);
        }
        .login-card h2 { color: #d7ccc8; margin-bottom: 25px; font-size: 30px; }
        .input-box { margin-bottom: 20px; }
        input {
            width: 100%; padding: 12px; background: rgba(255, 255, 255, 0.2);
            border: none; border-radius: 10px; color: white; outline: none; font-size: 16px;
        }
        .login-btn {
            width: 100%; padding: 12px; background: #795548; color: white;
            border: none; border-radius: 10px; font-weight: bold; cursor: pointer; transition: 0.3s;
        }
        .login-btn:hover { background: #5d4037; }
        .error-alert { background: rgba(255,0,0,0.2); color: #ff8a80; padding: 10px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; }
        .reg-link { margin-top: 20px; font-size: 14px; }
        a { color: #d7ccc8; text-decoration: none; font-weight: bold; }
        /* ઇનપુટ ફિલ્ડની અંદરના પ્લેસહોલ્ડર લખાણ માટે */
input::placeholder {
    color: #ffffff; /* તમે અહીં ક્રીમ કલર માટે #d7ccc8 પણ વાપરી શકો */
    opacity: 0.8;   /* થોડી પારદર્શકતા માટે (૦ થી ૧ ની વચ્ચે) */
}

/* જ્યારે યુઝર ઇનપુટ પર ક્લિક કરે ત્યારે પ્લેસહોલ્ડર વધુ સ્પષ્ટ કરવા */
input:focus::placeholder {
    color: #ffffff;
    opacity: 1;
}
    </style>
</head>
<body>
<div class="login-card">
    <h2>Brew Haven</h2>
    <?php if($error_msg != "") { echo "<div class='error-alert'>$error_msg</div>"; } ?>
    <form method="POST">
        <div class="input-box"><input type="email" name="email" placeholder="Email Address" required></div>
        <div class="input-box"><input type="password" name="password" placeholder="Password" required></div>
        <button type="submit" name="login_btn" class="login-btn">Login Now</button>
    </form>
    <p class="reg-link">Don't have an account? <a href="regestration.php">Register here</a></p>
</div>
</body>
</html>