<?php
session_start();

if (isset($_POST['admin_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ફિક્સ આઈડી અને પાસવર્ડ ચેક
    if ($email === "admin@brewhaven.com" && $password === "admin123") {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_name'] = "Brew Haven Admin";
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Incorrect ID or password! Only admin can login.";
    }
}
?>

<!DOCTYPE html>
<html lang="gu">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - Brew Haven</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background: #1a0f0d; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-box { background: #3e2723; padding: 40px; border-radius: 15px; width: 380px; text-align: center; color: white; border: 1px solid #5d4037; box-shadow: 0 15px 35px rgba(0,0,0,0.5); }
        h2 { color: #d7ccc8; margin-bottom: 25px; }
        input { width: 100%; padding: 12px; margin-bottom: 20px; border-radius: 8px; border: none; background: #5d4037; color: white; outline: none; }
        input::placeholder { color: #ccc; }
        .btn { width: 100%; padding: 12px; background: #795548; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .btn:hover { background: #8d6e63; transform: translateY(-2px); }
        .error { background: rgba(255,0,0,0.2); color: #ff8a80; padding: 10px; border-radius: 5px; margin-bottom: 15px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Portal ☕</h2>
        <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Admin Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="admin_login" class="btn">Login to Dashboard</button>
        </form>
    </div>
</body>
</html>