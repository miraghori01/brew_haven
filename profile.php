<?php
session_start();
$conn = mysqli_connect("localhost:3306", "root", "", "brew_haven");

if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }

$user_id = $_SESSION['user_id'];
$success_msg = "";

// Update Profile Logic
if(isset($_POST['update_btn'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    
    $update = mysqli_query($conn, "UPDATE users SET fullname='$fullname', address='$address' WHERE id='$user_id'");
    if($update) {
        $_SESSION['user_name'] = $fullname;
        $success_msg = "Profile Updated Successfully!";
    }
}

$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Details - Brew Haven</title>
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f4f1ea; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .profile-card { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); width: 450px; }
        h2 { color: #3e2723; border-bottom: 2px solid #795548; padding-bottom: 10px; text-align: center; }
        .input-group { margin-top: 15px; }
        label { display: block; color: #5d4037; font-weight: bold; margin-bottom: 5px; }
        input, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        .readonly { background: #f9f9f9; color: #888; }
        .update-btn { width: 100%; background: #795548; color: white; border: none; padding: 12px; border-radius: 8px; margin-top: 20px; cursor: pointer; font-size: 16px; }
        .update-btn:hover { background: #3e2723; }
        .msg { color: green; text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="profile-card">
    <h2>Profile Details</h2>
    <?php if($success_msg != "") echo "<p class='msg'>$success_msg</p>"; ?>
    
    <form method="POST">
        <div class="input-group">
            <label>Full Name (Edit)</label>
            <input type="text" name="fullname" value="<?php echo $user['fullname']; ?>" required>
        </div>
        <div class="input-group">
            <label>Email (Cannot Edit)</label>
            <input type="email" value="<?php echo $user['email']; ?>" class="readonly" readonly>
        </div>
        <div class="input-group">
            <label>Phone</label>
            <input type="text" value="<?php echo $user['phone']; ?>" class="readonly" readonly>
        </div>
        <div class="input-group">
            <label>Address (Edit)</label>
            <textarea name="address" rows="3"><?php echo $user['address']; ?></textarea>
        </div>
        
        <button type="submit" name="update_btn" class="update-btn">Save Changes</button>
        <p style="text-align:center; margin-top:15px;"><a href="index.php" style="color:#795548; text-decoration:none;">Back to Home</a></p>
    </form>
</div>

</body>
</html>