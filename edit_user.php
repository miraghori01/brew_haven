<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) { header("Location: admin_login.php"); exit(); }

$conn = mysqli_connect("localhost:3306", "root", "", "brew_haven");

$id = $_GET['id'];
$msg = "";

// જ્યારે 'Update' બટન દબાવવામાં આવે
if (isset($_POST['update_user'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $update_query = "UPDATE users SET fullname='$fullname', phone='$phone', city='$city', address='$address' WHERE id=$id";
    
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('User Updated!'); window.location.href='admin_dashboard.php';</script>";
    } else {
        $msg = "Error: " . mysqli_error($conn);
    }
}

// યુઝરની હાલની વિગતો મેળવો
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="gu">
<head>
    <title>Edit User - Brew Haven Admin</title>
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f4f1ea; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .edit-box { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 400px; }
        h2 { color: #3e2723; text-align: center; margin-bottom: 20px; border-bottom: 2px solid #795548; padding-bottom: 10px; }
        label { display: block; margin-top: 10px; color: #5d4037; font-weight: bold; }
        input, textarea { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        .readonly { background: #eee; cursor: not-allowed; }
        .btn-update { width: 100%; padding: 12px; background: #795548; color: white; border: none; border-radius: 8px; margin-top: 20px; cursor: pointer; font-weight: bold; }
        .btn-update:hover { background: #3e2723; }
    </style>
</head>
<body>

<div class="edit-box">
    <h2>Edit User Details</h2>
    <form method="POST">
        <label>Full Name</label>
        <input type="text" name="fullname" value="<?php echo $user['fullname']; ?>" required>

        <label>Email (Read Only)</label>
        <input type="email" value="<?php echo $user['email']; ?>" class="readonly" readonly>

        <label>Phone Number</label>
        <input type="text" name="phone" value="<?php echo $user['phone']; ?>" required>

        <label>City</label>
        <input type="text" name="city" value="<?php echo $user['city']; ?>" required>

        <label>Address</label>
        <textarea name="address" rows="3"><?php echo $user['address']; ?></textarea>

        <button type="submit" name="update_user" class="btn-update">Update User Info</button>
        <p style="text-align:center; margin-top:15px;"><a href="admin_dashboard.php" style="color:#795548; text-decoration:none;">Cancel</a></p>
    </form>
</div>

</body>
</html>