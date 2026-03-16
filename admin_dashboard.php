<?php
session_start();
// જો લોગિન ન હોય તો પાછા મોકલો
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

// ડેટાબેઝ કનેક્શન (Port: 3307)
$conn = mysqli_connect("localhost:3306", "root", "", "brew_haven");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

// ૧. યુઝર ડિલીટ લોજિક
if (isset($_GET['delete_user'])) {
    $id = $_GET['delete_user'];
    mysqli_query($conn, "DELETE FROM users WHERE id=$id");
    header("Location: admin_dashboard.php?view=users");
}

// ૨. ઓર્ડર ડિલીટ લોજિક
if (isset($_GET['delete_order'])) {
    $id = $_GET['delete_order'];
    mysqli_query($conn, "DELETE FROM orders WHERE last_id=$id");
    header("Location: admin_dashboard.php?view=orders");
}

// વ્યૂ નક્કી કરવા માટે (યુઝર્સ કે ઓર્ડર્સ)
$view = isset($_GET['view']) ? $_GET['view'] : 'users';

// લિસ્ટ મેળવવું
$users = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
// ઓર્ડર લિસ્ટ મેળવવાની ક્વેરી (તમારા ડેટાબેઝ સ્ટ્રક્ચર મુજબ)
$orders_query = "SELECT * FROM orders ORDER BY last_id DESC";
$orders = mysqli_query($conn, $orders_query);

// જો ક્વેરીમાં કોઈ ભૂલ હોય તો તે જોવા માટે આ લાઈન તપાસો
if (!$orders) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="gu">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Brew Haven</title>
    <style>
        :root { --sidebar: #2b1b17; --accent: #795548; --bg: #f4f1ea; }
        body { font-family: 'Poppins', sans-serif; margin: 0; background: var(--bg); display: flex; }
        
        .sidebar { width: 260px; height: 100vh; background: var(--sidebar); color: white; position: fixed; box-shadow: 4px 0 10px rgba(0,0,0,0.2); }
        .sidebar h2 { text-align: center; padding: 25px; border-bottom: 1px solid #4e342e; color: #d7ccc8; margin: 0; }
        .sidebar a { display: block; padding: 15px 25px; color: #bcaaa4; text-decoration: none; border-bottom: 1px solid #3e2723; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: var(--accent); color: white; }

        .main { margin-left: 260px; width: 100%; padding: 40px; box-sizing: border-box; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }

        .table-box { background: white; padding: 25px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #efebe9; color: var(--sidebar); text-align: left; padding: 15px; border-bottom: 2px solid #ddd; }
        td { padding: 15px; border-bottom: 1px solid #eee; color: #555; }
        
        .btn-action { padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 600; transition: 0.3s; display: inline-block; }
        .edit-link { background: #e3f2fd; color: #1e88e5; border: 1px solid #90caf9; }
        .delete-link { background: #ffebee; color: #e53935; border: 1px solid #ffcdd2; }
        .edit-link:hover { background: #1e88e5; color: white; }
        .delete-link:hover { background: #e53935; color: white; }
        
        .status-badge { padding: 4px 10px; border-radius: 20px; font-size: 12px; background: #fff3e0; color: #ef6c00; font-weight: bold; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Brew Haven</h2>
        <a href="?view=users" class="<?php echo $view == 'users' ? 'active' : ''; ?>">👥 Manage Users</a>
        <a href="?view=orders" class="<?php echo $view == 'orders' ? 'active' : ''; ?>">☕ Manage Orders</a>
        <a href="index.php">🌐 Visit Site</a>
        <a href="logout.php" style="color: #ff8a80;">🚪 Logout Admin</a>
    </div>

    <div class="main">
        <div class="header">
            <h1><?php echo $view == 'users' ? 'User Management' : 'Order Management'; ?></h1>
        </div>

        <div class="table-box">
            <?php if($view == 'users'): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($users)) { ?>
                    <tr>
                        <td>#<?php echo $row['id']; ?></td>
                        <td><strong><?php echo $row['fullname']; ?></strong></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td>
                            <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn-action edit-link">Edit</a>
                            <a href="?delete_user=<?php echo $row['id']; ?>&view=users" class="btn-action delete-link" onclick="return confirm('Delete this user?')">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Items Ordered</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($orders)) { ?>
                    <tr>
                        <td>#<?php echo $row['last_id']; ?></td>
                        <td><strong><?php echo $row['customer_name']; ?></strong><br><small><?php echo $row['phone']; ?></small></td>
                        <td style="font-size: 13px;"><?php echo $row['items']; ?></td>
                        <td><strong>₹<?php echo $row['total_amount']; ?></strong></td>
                        <td><span class="status-badge"><?php echo $row['status']; ?></span></td>
                        <td>
                            <a href="?delete_order=<?php echo $row['last_id']; ?>&view=orders" class="btn-action delete-link" onclick="return confirm('Delete this order?')">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>